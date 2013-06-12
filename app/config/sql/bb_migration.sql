/**
Carga de base de datos de Catálogo.

Requerimientos:
Base de datos de Registro (fuente): rfietp
Base de datos de Catálogo (destino) con sus tablas y esquema construido.

La migración consiste en seleccionar los registros que se quieren migrar de la
fuente al destino e insertarlos.

*/

begin transaction;


/* Se utiliza el módulo dblink para acceder a la base de datos de Registro */
CREATE EXTENSION dblink;

select dblink_connect('rfietp','host=127.0.0.1 port=5432
    dbname=rfietp user=postgres password=postgres');

INSERT INTO etp_estados (id, name) VALUES (1, 'Institución de Otro Nivel y/o Modalidad');

/* Instits */
INSERT INTO instits_bb (id, gestion_id,
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
  FROM dblink('rfietp', 'SELECT 
                i.id,i.gestion_id,i.dependencia_id,i.nombre_dep,i.tipoinstit_id,i.jurisdiccion_id,
                i.cue,i.anexo,i.esanexo,i.nombre,i.nroinstit,i.direccion,i.cp,i.telefono,i.mail,
                i.web,i.activo,i.created,i.modified,i.localidad_id,i.departamento_id,
                i.lugar,i.mail_alternativo,i.telefono_alternativo,i.etp_estado_id,i.claseinstit_id,
                i.orientacion_id 
        FROM 
            (SELECT anios.plan_id, anios.ciclo_id FROM anios
                    JOIN (SELECT plan_id, max(ciclo_id) as maxciclo_id FROM anios GROUP BY plan_id ORDER BY plan_id) AS myanios 
                    ON anios.plan_id = myanios.plan_id AND anios.ciclo_id = myanios.maxciclo_id
            GROUP BY anios.plan_id, anios.ciclo_id) AS a
            INNER JOIN planes AS p ON (a.plan_id = p.id)
            INNER JOIN instits AS i ON (p.instit_id = i.id)
            INNER JOIN titulos AS t ON (p.titulo_id = t.id)
        WHERE
            i.activo = 1 AND 
            p.plan_estado_id = 1 AND 
            p.id NOT IN(SELECT plan_id FROM anios WHERE etapa_id IN (1,4,102)) AND 
            a.ciclo_id > 2010 AND 
            t.es_bb = TRUE
        GROUP BY i.id')
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

/* Titulos */
INSERT INTO titulos_bb (id, name, marco_ref, oferta_id)
  SELECT id, name, marco_ref, oferta_id
  FROM dblink('rfietp', 'SELECT t.id, t.name, t.marco_ref, t.oferta_id
            FROM 
                (SELECT anios.plan_id, anios.ciclo_id FROM anios
                        JOIN (SELECT plan_id, max(ciclo_id) as maxciclo_id FROM anios GROUP BY plan_id ORDER BY plan_id) AS myanios 
                        ON anios.plan_id = myanios.plan_id AND anios.ciclo_id = myanios.maxciclo_id
                GROUP BY anios.plan_id, anios.ciclo_id) AS a
                INNER JOIN planes AS p ON (a.plan_id = p.id)
                INNER JOIN instits AS i ON (p.instit_id = i.id)
                INNER JOIN titulos AS t ON (p.titulo_id = t.id)
            WHERE 
                t.oferta_id NOT IN(2,5,6) AND 
                i.activo = 1 AND 
                p.plan_estado_id = 1 AND 
                p.id NOT IN(SELECT plan_id FROM anios WHERE etapa_id IN (1,4,102)) AND 
                a.ciclo_id > 2010 AND
                t.es_bb = TRUE
            GROUP BY t.id')
  AS t(id integer, name character varying(200), marco_ref boolean, oferta_id integer)
WHERE 
        id NOT IN(select titulo_id from sectores_titulos where sector_id IN(5,39,14)) AND 
        oferta_id NOT IN(2,5,6);

/* Sectores_titulos */
INSERT INTO sectores_titulos_bb (id, titulo_bb_id, sector_id, subsector_id, prioridad)
  SELECT id, titulo_id, sector_id, subsector_id, prioridad
    FROM dblink('rfietp', 'SELECT st.id, t.id, st.sector_id, st.subsector_id, st.prioridad 
                FROM 
                (SELECT anios.plan_id, anios.ciclo_id FROM anios
                        JOIN (SELECT plan_id, max(ciclo_id) as maxciclo_id FROM anios GROUP BY plan_id ORDER BY plan_id) AS myanios 
                        ON anios.plan_id = myanios.plan_id AND anios.ciclo_id = myanios.maxciclo_id
                GROUP BY anios.plan_id, anios.ciclo_id) AS a
                INNER JOIN planes AS p ON (a.plan_id = p.id)
                INNER JOIN titulos AS t ON (p.titulo_id = t.id)
                INNER JOIN instits AS i ON (p.instit_id = i.id)
                INNER JOIN sectores_titulos AS st ON (st.titulo_id = t.id)
            WHERE 
                st.sector_id NOT IN(5,39,14) AND  
                st.titulo_id NOT IN(select id from titulos where oferta_id IN(2,5,6)) AND 
                i.activo = 1 AND 
                p.plan_estado_id = 1 AND 
                p.id NOT IN(SELECT plan_id FROM anios WHERE etapa_id IN (1,4,102)) AND 
                a.ciclo_id > 2010 AND 
                t.es_bb = TRUE
            GROUP BY st.id, t.id, st.sector_id, st.subsector_id, st.prioridad')
  AS t(id integer, titulo_bb_id integer, sector_id integer, subsector_id integer, prioridad integer);


INSERT INTO planes_bb (id, instit_bb_id, oferta_id, nombre, ciclo_alta, created, modified, ultimo_ciclo, titulo_bb_id)
  SELECT id, instit_id, oferta_id, nombre, ciclo_alta, created, modified, ultimo_ciclo, titulo_id
  FROM dblink('rfietp', 'SELECT p.id, p.instit_id, p.oferta_id, p.nombre, p.ciclo_alta, p.created, p.modified, max(a.ciclo_id) AS ultimo_ciclo, t.id
        FROM
            (SELECT anios.plan_id, anios.ciclo_id
		FROM anios
		JOIN 
		(SELECT plan_id, max(ciclo_id) as maxciclo_id FROM anios GROUP BY plan_id ORDER BY plan_id) AS myanios 
		ON anios.plan_id = myanios.plan_id AND anios.ciclo_id = myanios.maxciclo_id
            GROUP BY anios.plan_id, anios.ciclo_id) AS a
            INNER JOIN planes AS p ON (a.plan_id = p.id)
            INNER JOIN titulos AS t ON (p.titulo_id = t.id) 
            INNER JOIN instits AS i ON (p.instit_id = i.id)
        WHERE
            p.titulo_id NOT IN(select titulo_id from sectores_titulos where sector_id IN(5,39,14)) AND 
            p.titulo_id NOT IN(select id from titulos where oferta_id IN(2,5,6)) AND 
            p.oferta_id NOT IN(2,5,6) AND 
            i.activo = 1 AND 
            p.plan_estado_id = 1 AND 
            p.id NOT IN(SELECT plan_id FROM anios WHERE etapa_id IN (1,4,102)) AND 
            a.ciclo_id > 2010 AND
            t.es_bb = TRUE
        GROUP BY p.id, p.instit_id, p.oferta_id, p.nombre, p.ciclo_alta, t.id')
  AS t(id integer, instit_bb_id integer, oferta_id integer, nombre character varying(200), 
        ciclo_alta integer, created timestamp without time zone, modified timestamp without time zone, 
        ultimo_ciclo integer, titulo_bb_id integer);


/*rollback;*/
commit;