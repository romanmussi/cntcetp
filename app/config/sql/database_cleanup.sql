/**
Carga de base de datos de Catálogo.

Requerimientos:
Base de datos de Registro (fuente): regetp
Base de datos de Catálogo (destino) con sus tablas y esquema construido.

La migración consiste en seleccionar los registros que se quieren migrar de la
fuente al destino e insertarlos.

*/

begin transaction;

/* Se utiliza el módulo dblink para acceder a la base de datos de Registro */
CREATE EXTENSION dblink;

INSERT INTO claseinstits
  SELECT id, name
  FROM dblink('dbname=regetp', 'SELECT id, name FROM claseinstits')
  AS t(id integer, name character varying(60));

INSERT INTO dependencias
  SELECT id, name
  FROM dblink('dbname=regetp', 'SELECT id, name FROM dependencias')
  AS t(id integer, name character varying(40));

INSERT INTO etp_estados
  SELECT id, name
  FROM dblink('dbname=regetp', 'SELECT id, name FROM etp_estados')
  AS t(id integer, name character varying(60))
  WHERE id = 2;

INSERT INTO gestiones
  SELECT id, name
  FROM dblink('dbname=regetp', 'SELECT id, name FROM gestiones')
  AS t(id integer, name character varying(20));

/* sin ofertas No Técnicas */
INSERT INTO ofertas
  SELECT id, abrev, name, orden
  FROM dblink('dbname=regetp', 'SELECT id, abrev, name, "order" FROM ofertas
    WHERE id NOT IN(2,5,6)')
  AS t(id integer, abrev character varying(10), name character varying(30), orden integer);

INSERT INTO orientaciones
  SELECT id, name
  FROM dblink('dbname=regetp', 'SELECT id, name FROM orientaciones')
  AS t(id integer, name character varying(100));
INSERT INTO orientaciones (id,name) VALUES (0,''); /* TODO: corregir porque tiene Constrain y en instits existen casos de orientacion_id=0 */

INSERT INTO jurisdicciones
  SELECT id, name
  FROM dblink('dbname=regetp', 'SELECT id, name FROM jurisdicciones ')
  AS t(id integer, name character varying(40));

INSERT INTO departamentos
  SELECT id, jurisdiccion_id, name
  FROM dblink('dbname=regetp', 'SELECT id, jurisdiccion_id, name FROM departamentos ')
  AS t(id integer, jurisdiccion_id integer, name character varying(64));

INSERT INTO localidades
  SELECT id, departamento_id, name
  FROM dblink('dbname=regetp', 'SELECT id, departamento_id, name FROM localidades ')
  AS t(id integer, departamento_id integer, name character varying(64));

INSERT INTO tipoinstits
  SELECT id, jurisdiccion_id, name
  FROM dblink('dbname=regetp', 'SELECT id, jurisdiccion_id, name FROM tipoinstits ')
  AS t(id integer, jurisdiccion_id integer, name character varying(100))
  WHERE id > 0; /* SIN DATOS es id = 0 */

/* Sector "Otros" y "tecnico" y sus Subsectores */
INSERT INTO sectores (id, name, orientacion_id )
  SELECT id, name, orientacion_id
  FROM dblink('dbname=regetp', 'SELECT id, name, orientacion_id FROM sectores
    WHERE id NOT IN(5,39)')
  AS t(id integer, name character varying(100), orientacion_id integer);

INSERT INTO subsectores (id, name, sector_id )
  SELECT id, name, sector_id
  FROM dblink('dbname=regetp', 'SELECT id, name, sector_id FROM subsectores
    WHERE sector_id NOT IN(5,39)')
  AS t(id integer, name character varying(100), sector_id integer);


INSERT INTO instits (id, gestion_id,
                dependencia_id,
                nombre_dep,
                tipoinstit_id,
                jurisdiccion_id,
                cue,
                anexo,
                esanexo,
                nombre,
                nroinstit,
                direccion,
                cp,
                telefono,
                mail,
                web,
                activo,
                created,
                modified,
                localidad_id,
                departamento_id,
                lugar,
                mail_alternativo,
                telefono_alternativo,
                etp_estado_id,
                claseinstit_id,
                orientacion_id )
  SELECT id,
                gestion_id,
                dependencia_id,
                nombre_dep,
                tipoinstit_id,
                jurisdiccion_id,
                cue,
                anexo,
                esanexo,
                nombre,
                nroinstit,
                direccion,
                cp,
                telefono,
                mail,
                web,
                activo,
                created,
                modified,
                localidad_id,
                departamento_id,
                lugar,
                mail_alternativo,
                telefono_alternativo,
                etp_estado_id,
                claseinstit_id,
                orientacion_id
  FROM dblink('dbname=regetp', 'SELECT 
                id,
                gestion_id,
                dependencia_id,
                nombre_dep,
                tipoinstit_id,
                jurisdiccion_id,
                cue,
                anexo,
                esanexo,
                nombre,
                nroinstit,
                direccion,
                cp,
                telefono,
                mail,
                web,
                activo,
                created,
                modified,
                localidad_id,
                departamento_id,
                lugar,
                mail_alternativo,
                telefono_alternativo,
                etp_estado_id,
                claseinstit_id,
                orientacion_id FROM instits
        WHERE activo = 1 AND 
        etp_estado_id = 2')
  AS t( id INTEGER,
        gestion_id INTEGER,
        dependencia_id INTEGER,
        nombre_dep VARCHAR(100),
        tipoinstit_id INTEGER,
        jurisdiccion_id INTEGER,
        cue INTEGER,
        anexo INTEGER,
        esanexo INTEGER,
        nombre VARCHAR(150),
        nroinstit VARCHAR(20),
        direccion VARCHAR(100),
        cp VARCHAR(8),
        telefono VARCHAR(60),
        mail VARCHAR(60),
        web VARCHAR(100),
        activo INTEGER,
        created TIMESTAMP,
        modified TIMESTAMP,
        localidad_id INTEGER,
        departamento_id INTEGER,
        lugar VARCHAR(110),
        mail_alternativo VARCHAR(60),
        telefono_alternativo VARCHAR(60),
        etp_estado_id INTEGER,
        claseinstit_id INTEGER,
        orientacion_id INTEGER);


INSERT INTO titulos (id, name, marco_ref, oferta_id)
  SELECT id, name, marco_ref, oferta_id
  FROM dblink('dbname=regetp', 'SELECT id, name, marco_ref, oferta_id FROM titulos
    WHERE 
        id NOT IN(select titulo_id from sectores_titulos where sector_id IN(5,39)) AND 
        oferta_id NOT IN(2,5,6)')
  AS t(id integer, name character varying(200), marco_ref boolean, oferta_id integer)
WHERE 
        id NOT IN(select titulo_id from sectores_titulos where sector_id IN(5,39)) AND 
        oferta_id NOT IN(2,5,6);

INSERT INTO sectores_titulos (id, titulo_id, sector_id, subsector_id, prioridad)
  SELECT id, titulo_id, sector_id, subsector_id, prioridad
  FROM dblink('dbname=regetp', 'SELECT st.id, t.id, st.sector_id, st.subsector_id, st.prioridad FROM sectores_titulos st
    INNER JOIN titulos t ON t.id = st.titulo_id
    WHERE 
        st.sector_id NOT IN(5,39) AND 
        st.titulo_id NOT IN(select id from titulos where oferta_id IN(2,5,6))')
  AS t(id integer, titulo_id integer, sector_id integer, subsector_id integer, prioridad integer);


INSERT INTO planes (id, instit_id, oferta_id, nombre, ciclo_alta, created, modified, ultimo_ciclo, titulo_id)
  SELECT id, instit_id, oferta_id, nombre, ciclo_alta, created, modified, ultimo_ciclo, titulo_id
  FROM dblink('dbname=regetp', 'SELECT p.id, p.instit_id, p.oferta_id, p.nombre, p.ciclo_alta, p.created, p.modified, max(a.ciclo_id) AS ultimo_ciclo, t.id FROM planes p 
    INNER JOIN titulos t ON t.id = p.titulo_id
    INNER JOIN anios a ON a.plan_id = p.id
    WHERE 
        p.titulo_id NOT IN(select titulo_id from sectores_titulos where sector_id IN(5,39)) AND 
        p.titulo_id NOT IN(select id from titulos where oferta_id IN(2,5,6)) AND 
        p.oferta_id NOT IN(2,5,6) AND 
        p.instit_id NOT IN(select id from instits where activo = 0 OR etp_estado_id <> 2) AND 
        p.plan_estado_id = 1 AND 
        p.id NOT IN(SELECT plan_id FROM anios WHERE etapa_id IN (1,4,102))
    GROUP BY p.id, p.instit_id, p.oferta_id, p.nombre, p.ciclo_alta, t.id')
  AS t(id integer, instit_id integer, oferta_id integer, nombre character varying(200), 
        ciclo_alta integer, created timestamp without time zone, modified timestamp without time zone, 
        ultimo_ciclo integer, titulo_id integer);



/*creo el usuario "invitado":"catalogo2011"*/
INSERT INTO users(username, nombre, apellido, "password", mail,"role", jurisdiccion_id, created, modified)
            VALUES ('invitado', 'invitado', 'invitado','0154538b07449bae7673573bda20011340894a2e', 
		   'invitado@test.com','invitados',0,now(), now());


/* FP */
INSERT INTO matriculados VALUES (5, 6, 1, 95137);
INSERT INTO matriculados VALUES (6, 10, 1, 4965);
INSERT INTO matriculados VALUES (7, 22, 1, 9706);
INSERT INTO matriculados VALUES (8, 26, 1, 3047);
INSERT INTO matriculados VALUES (9, 2, 1, 17811);
INSERT INTO matriculados VALUES (10, 14, 1, 6224);
INSERT INTO matriculados VALUES (11, 18, 1, 4992);
INSERT INTO matriculados VALUES (12, 30, 1, 7364);
INSERT INTO matriculados VALUES (13, 34, 1, 6924);
INSERT INTO matriculados VALUES (14, 38, 1, 5320);
INSERT INTO matriculados VALUES (15, 42, 1, 1681);
INSERT INTO matriculados VALUES (16, 46, 1, 1841);
INSERT INTO matriculados VALUES (17, 50, 1, 14294);
INSERT INTO matriculados VALUES (18, 54, 1, 2330);
INSERT INTO matriculados VALUES (19, 58, 1, 10464);
INSERT INTO matriculados VALUES (20, 62, 1, 1822);
INSERT INTO matriculados VALUES (21, 66, 1, 4140);
INSERT INTO matriculados VALUES (22, 70, 1, 12907);
INSERT INTO matriculados VALUES (23, 74, 1, 0);
INSERT INTO matriculados VALUES (24, 78, 1, 593);
INSERT INTO matriculados VALUES (25, 82, 1, 6018);
INSERT INTO matriculados VALUES (26, 86, 1, 7271);
INSERT INTO matriculados VALUES (27, 94, 1, 399);
INSERT INTO matriculados VALUES (28, 90, 1, 10406);
/* SEC */
INSERT INTO matriculados VALUES (29, 6, 3, 173540);
INSERT INTO matriculados VALUES (30, 10, 3, 4799);
INSERT INTO matriculados VALUES (31, 22, 3, 11883);
INSERT INTO matriculados VALUES (32, 26, 3, 14471);
INSERT INTO matriculados VALUES (33, 2, 3, 45014);
INSERT INTO matriculados VALUES (34, 14, 3, 80339);
INSERT INTO matriculados VALUES (35, 18, 3, 12109);
INSERT INTO matriculados VALUES (36, 30, 3, 21449);
INSERT INTO matriculados VALUES (37, 34, 3, 7455);
INSERT INTO matriculados VALUES (38, 38, 3, 9381);
INSERT INTO matriculados VALUES (39, 42, 3, 2726);
INSERT INTO matriculados VALUES (40, 46, 3, 7341);
INSERT INTO matriculados VALUES (41, 50, 3, 32370);
INSERT INTO matriculados VALUES (42, 54, 3, 15184);
INSERT INTO matriculados VALUES (43, 58, 3, 13002);
INSERT INTO matriculados VALUES (44, 62, 3, 9767);
INSERT INTO matriculados VALUES (45, 66, 3, 24040);
INSERT INTO matriculados VALUES (46, 70, 3, 13126);
INSERT INTO matriculados VALUES (47, 74, 3, 8823);
INSERT INTO matriculados VALUES (48, 78, 3, 2351);
INSERT INTO matriculados VALUES (49, 82, 3, 60808);
INSERT INTO matriculados VALUES (50, 86, 3, 14353);
INSERT INTO matriculados VALUES (51, 94, 3, 4019);
INSERT INTO matriculados VALUES (52, 90, 3, 22549);
/* SUP */
INSERT INTO matriculados VALUES (53, 6, 4, 23929);
INSERT INTO matriculados VALUES (54, 10, 4, 1951);
INSERT INTO matriculados VALUES (55, 22, 4, 2703);
INSERT INTO matriculados VALUES (56, 26, 4, 947);
INSERT INTO matriculados VALUES (57, 2, 4, 46951);
INSERT INTO matriculados VALUES (58, 14, 4, 26125);
INSERT INTO matriculados VALUES (59, 18, 4, 4118);
INSERT INTO matriculados VALUES (60, 30, 4, 1984);
INSERT INTO matriculados VALUES (61, 34, 4, 1878);
INSERT INTO matriculados VALUES (62, 38, 4, 3777);
INSERT INTO matriculados VALUES (63, 42, 4, 1068);
INSERT INTO matriculados VALUES (64, 46, 4, 572);
INSERT INTO matriculados VALUES (65, 50, 4, 5633);
INSERT INTO matriculados VALUES (66, 54, 4, 6557);
INSERT INTO matriculados VALUES (67, 58, 4, 2255);
INSERT INTO matriculados VALUES (68, 62, 4, 1318);
INSERT INTO matriculados VALUES (69, 66, 4, 4242);
INSERT INTO matriculados VALUES (70, 70, 4, 2442);
INSERT INTO matriculados VALUES (71, 74, 4, 0);
INSERT INTO matriculados VALUES (72, 78, 4, 0);
INSERT INTO matriculados VALUES (73, 82, 4, 26424);
INSERT INTO matriculados VALUES (74, 86, 4, 628);
INSERT INTO matriculados VALUES (75, 94, 4, 1602);
INSERT INTO matriculados VALUES (76, 90, 4, 9713);


/*rollback;*/
commit;
