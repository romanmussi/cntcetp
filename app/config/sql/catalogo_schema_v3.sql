
CREATE SEQUENCE users_id_seq;
ALTER SEQUENCE users_id_seq OWNER TO www;

CREATE TABLE users (
                id INTEGER DEFAULT nextval('users_id_seq'::regclass) NOT NULL,
                username VARCHAR(20) NOT NULL,
                nombre VARCHAR(50) NOT NULL,
                apellido VARCHAR(50) NOT NULL,
                password VARCHAR(50) NOT NULL,
                mail VARCHAR(60) NOT NULL,
                role VARCHAR(20) NOT NULL,
                jurisdiccion_id INTEGER DEFAULT 0 NOT NULL,
                created TIMESTAMP,
                modified TIMESTAMP,
                password_reset_token VARCHAR(24),
                CONSTRAINT users_pkey PRIMARY KEY (id)
);
ALTER TABLE users OWNER to www;

ALTER SEQUENCE users_id_seq OWNED BY users.id;

CREATE SEQUENCE orientaciones_id_seq;
ALTER SEQUENCE orientaciones_id_seq OWNER TO www;

CREATE TABLE orientaciones (
                id INTEGER NOT NULL DEFAULT nextval('orientaciones_id_seq'),
                name VARCHAR(100) DEFAULT ''::character varying NOT NULL,
                CONSTRAINT orientaciones_pkey PRIMARY KEY (id)
);
ALTER TABLE orientaciones OWNER to www;

ALTER SEQUENCE orientaciones_id_seq OWNED BY orientaciones.id;

CREATE SEQUENCE sectores_id_seq;
ALTER SEQUENCE sectores_id_seq OWNER TO www;

CREATE TABLE sectores (
                id INTEGER NOT NULL DEFAULT nextval('sectores_id_seq'),
                name VARCHAR(64),
                orientacion_id INTEGER NOT NULL,
                CONSTRAINT id PRIMARY KEY (id)
);
ALTER TABLE sectores OWNER to www;

ALTER SEQUENCE sectores_id_seq OWNED BY sectores.id;

CREATE SEQUENCE subsectores_id_seq;
ALTER SEQUENCE subsectores_id_seq OWNER TO www;

CREATE TABLE subsectores (
                id INTEGER NOT NULL DEFAULT nextval('subsectores_id_seq'),
                name VARCHAR(64),
                sector_id INTEGER NOT NULL,
                CONSTRAINT subsectores_id PRIMARY KEY (id)
);
ALTER TABLE subsectores OWNER to www;

ALTER SEQUENCE subsectores_id_seq OWNED BY subsectores.id;

CREATE SEQUENCE ofertas_id_seq;
ALTER SEQUENCE ofertas_id_seq OWNER TO www;

CREATE TABLE ofertas (
                id INTEGER NOT NULL DEFAULT nextval('ofertas_id_seq'),
                abrev VARCHAR(10) NOT NULL,
                name VARCHAR(30) NOT NULL,
                orden INTEGER DEFAULT 0,
                CONSTRAINT ofertas_pkey PRIMARY KEY (id)
);
ALTER TABLE ofertas OWNER to www;

ALTER SEQUENCE ofertas_id_seq OWNED BY ofertas.id;

CREATE SEQUENCE jurisdicciones_id_seq;
ALTER SEQUENCE jurisdicciones_id_seq OWNER TO www;

CREATE TABLE jurisdicciones (
                id INTEGER DEFAULT nextval('jurisdicciones_id_seq'::regclass) NOT NULL,
                name VARCHAR(40) NOT NULL,
                CONSTRAINT jurisdicciones_pkey PRIMARY KEY (id)
);
ALTER TABLE jurisdicciones OWNER to www;

ALTER SEQUENCE jurisdicciones_id_seq OWNED BY jurisdicciones.id;

CREATE SEQUENCE matriculados_id_seq;
ALTER SEQUENCE matriculados_id_seq OWNER TO www;

CREATE TABLE matriculados (
                id INTEGER NOT NULL DEFAULT nextval('matriculados_id_seq'),
                jurisdiccion_id INTEGER NOT NULL,
                oferta_id INTEGER NOT NULL,
                cantidad BIGINT DEFAULT 0 NOT NULL,
                CONSTRAINT matriculados_pkey PRIMARY KEY (id)
);
ALTER TABLE matriculados OWNER to www;

ALTER SEQUENCE matriculados_id_seq OWNED BY matriculados.id;

CREATE SEQUENCE tipoinstits_id_seq;
ALTER SEQUENCE tipoinstits_id_seq OWNER TO www;

CREATE TABLE tipoinstits (
                id INTEGER NOT NULL DEFAULT nextval('tipoinstits_id_seq'),
                jurisdiccion_id INTEGER NOT NULL,
                name VARCHAR(100) NOT NULL,
                CONSTRAINT tipoinstits_pkey PRIMARY KEY (id)
);
ALTER TABLE tipoinstits OWNER to www;

ALTER SEQUENCE tipoinstits_id_seq OWNED BY tipoinstits.id;

CREATE SEQUENCE gestiones_id_seq;
ALTER SEQUENCE gestiones_id_seq OWNER TO www;

CREATE TABLE gestiones (
                id INTEGER NOT NULL DEFAULT nextval('gestiones_id_seq'),
                name VARCHAR(20) NOT NULL,
                CONSTRAINT gestiones_pkey PRIMARY KEY (id)
);
ALTER TABLE gestiones OWNER to www;

ALTER SEQUENCE gestiones_id_seq OWNED BY gestiones.id;

CREATE SEQUENCE etp_estados_id_seq;
ALTER SEQUENCE etp_estados_id_seq OWNER TO www;

CREATE TABLE etp_estados (
                id INTEGER NOT NULL DEFAULT nextval('etp_estados_id_seq'),
                name VARCHAR(60) DEFAULT ''::character varying NOT NULL,
                CONSTRAINT etp_estados_pkey PRIMARY KEY (id)
);
ALTER TABLE etp_estados OWNER to www;

ALTER SEQUENCE etp_estados_id_seq OWNED BY etp_estados.id;

CREATE SEQUENCE dependencias_id_seq;
ALTER SEQUENCE dependencias_id_seq OWNER TO www;

CREATE TABLE dependencias (
                id INTEGER NOT NULL DEFAULT nextval('dependencias_id_seq'),
                name VARCHAR(40) NOT NULL,
                CONSTRAINT dependencias_pkey PRIMARY KEY (id)
);
ALTER TABLE dependencias OWNER to www;

ALTER SEQUENCE dependencias_id_seq OWNED BY dependencias.id;

CREATE SEQUENCE departamentos_id_seq;
ALTER SEQUENCE departamentos_id_seq OWNER TO www;

CREATE TABLE departamentos (
                id INTEGER NOT NULL DEFAULT nextval('departamentos_id_seq'),
                jurisdiccion_id INTEGER,
                name VARCHAR(64),
                CONSTRAINT departamento_id PRIMARY KEY (id)
);
ALTER TABLE departamentos OWNER to www;

ALTER SEQUENCE departamentos_id_seq OWNED BY departamentos.id;

CREATE SEQUENCE localidades_id_seq;
ALTER SEQUENCE localidades_id_seq OWNER TO www;

CREATE TABLE localidades (
                id INTEGER NOT NULL DEFAULT nextval('localidades_id_seq'),
                departamento_id INTEGER,
                name VARCHAR(64),
                CONSTRAINT localidades_id PRIMARY KEY (id)
);
ALTER TABLE localidades OWNER to www;

ALTER SEQUENCE localidades_id_seq OWNED BY localidades.id;

CREATE SEQUENCE claseinstits_id_seq;
ALTER SEQUENCE claseinstits_id_seq OWNER TO www;

CREATE TABLE claseinstits (
                id INTEGER NOT NULL DEFAULT nextval('claseinstits_id_seq'),
                name VARCHAR(60) DEFAULT ''::character varying NOT NULL,
                CONSTRAINT claseinstits_pkey PRIMARY KEY (id)
);
ALTER TABLE claseinstits OWNER to www;

ALTER SEQUENCE claseinstits_id_seq OWNED BY claseinstits.id;

CREATE SEQUENCE titulos_id_seq;
ALTER SEQUENCE titulos_id_seq OWNER TO www;

CREATE TABLE titulos (
                id INTEGER NOT NULL DEFAULT nextval('titulos_id_seq'),
                name VARCHAR(200) NOT NULL,
                marco_ref BOOLEAN DEFAULT false NOT NULL,
                oferta_id INTEGER NOT NULL,
                CONSTRAINT titulos_pkey PRIMARY KEY (id)
);
ALTER TABLE titulos OWNER to www;

ALTER SEQUENCE titulos_id_seq OWNED BY titulos.id;

CREATE SEQUENCE sectores_titulos_id_seq;
ALTER SEQUENCE sectores_titulos_id_seq OWNER TO www;

CREATE TABLE sectores_titulos (
                id INTEGER NOT NULL DEFAULT nextval('sectores_titulos_id_seq'),
                titulo_id INTEGER NOT NULL,
                sector_id INTEGER NOT NULL,
                subsector_id INTEGER DEFAULT 0 NOT NULL,
                prioridad INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT sectores_titulos_pk PRIMARY KEY (id)
);
ALTER TABLE sectores_titulos OWNER to www;

ALTER SEQUENCE sectores_titulos_id_seq OWNED BY sectores_titulos.id;

CREATE SEQUENCE instits_id_seq;
ALTER SEQUENCE instits_id_seq OWNER TO www;

CREATE TABLE instits (
                id INTEGER NOT NULL DEFAULT nextval('instits_id_seq'),
                gestion_id INTEGER NOT NULL,
                dependencia_id INTEGER NOT NULL,
                nombre_dep VARCHAR(100) NOT NULL,
                tipoinstit_id INTEGER NOT NULL,
                jurisdiccion_id INTEGER NOT NULL,
                cue INTEGER DEFAULT 0 NOT NULL,
                anexo INTEGER DEFAULT 0 NOT NULL,
                esanexo INTEGER DEFAULT 0 NOT NULL,
                nombre VARCHAR(150) NOT NULL,
                nroinstit VARCHAR(20) NOT NULL,
                direccion VARCHAR(100) NOT NULL,
                cp VARCHAR(8) NOT NULL,
                telefono VARCHAR(60) NOT NULL,
                mail VARCHAR(60) NOT NULL,
                web VARCHAR(100) NOT NULL,
                activo INTEGER DEFAULT 0 NOT NULL,
                created TIMESTAMP,
                modified TIMESTAMP,
                localidad_id INTEGER NOT NULL,
                departamento_id INTEGER NOT NULL,
                lugar VARCHAR(110) DEFAULT ''::character varying NOT NULL,
                mail_alternativo VARCHAR(60) DEFAULT ''::character varying NOT NULL,
                telefono_alternativo VARCHAR(60) DEFAULT ''::character varying NOT NULL,
                etp_estado_id INTEGER NOT NULL,
                claseinstit_id INTEGER NOT NULL,
                orientacion_id INTEGER NOT NULL,
                CONSTRAINT instits_pkey PRIMARY KEY (id)
);
ALTER TABLE instits OWNER to www;

ALTER SEQUENCE instits_id_seq OWNED BY instits.id;

CREATE SEQUENCE planes_id_seq;
ALTER SEQUENCE planes_id_seq OWNER TO www;

CREATE TABLE planes (
                id INTEGER NOT NULL DEFAULT nextval('planes_id_seq'),
                instit_id INTEGER NOT NULL,
                oferta_id INTEGER NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                ciclo_alta INTEGER DEFAULT 0 NOT NULL,
                created TIMESTAMP,
                modified TIMESTAMP,
		ultimo_ciclo INTEGER,
                titulo_id INTEGER NOT NULL,
                CONSTRAINT planes_pkey PRIMARY KEY (id)
);
ALTER TABLE planes OWNER to www;

ALTER SEQUENCE planes_id_seq OWNED BY planes.id;

CREATE INDEX plan_instit_pkey
 ON planes USING BTREE
 ( instit_id, id, oferta_id );

ALTER TABLE instits ADD CONSTRAINT orientaciones_instits_fk
FOREIGN KEY (orientacion_id)
REFERENCES orientaciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE sectores ADD CONSTRAINT orientaciones_sectores_fk
FOREIGN KEY (orientacion_id)
REFERENCES orientaciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE sectores_titulos ADD CONSTRAINT sectores_sectores_titulos_fk
FOREIGN KEY (sector_id)
REFERENCES sectores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE subsectores ADD CONSTRAINT sectores_subsectores_fk
FOREIGN KEY (sector_id)
REFERENCES sectores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE planes ADD CONSTRAINT ofertas_planes_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE titulos ADD CONSTRAINT ofertas_titulos_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE matriculados ADD CONSTRAINT ofertas_matriculados_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE departamentos ADD CONSTRAINT jurisdicciones_departamentos_fk
FOREIGN KEY (jurisdiccion_id)
REFERENCES jurisdicciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT jurisdicciones_instits_fk
FOREIGN KEY (jurisdiccion_id)
REFERENCES jurisdicciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE tipoinstits ADD CONSTRAINT jurisdicciones_tipoinstits_fk
FOREIGN KEY (jurisdiccion_id)
REFERENCES jurisdicciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE matriculados ADD CONSTRAINT jurisdicciones_matriculados_fk
FOREIGN KEY (jurisdiccion_id)
REFERENCES jurisdicciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT tipoinstits_instits_fk
FOREIGN KEY (tipoinstit_id)
REFERENCES tipoinstits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT gestiones_instits_fk
FOREIGN KEY (gestion_id)
REFERENCES gestiones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT etp_estados_instits_fk
FOREIGN KEY (etp_estado_id)
REFERENCES etp_estados (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT dependencias_instits_fk
FOREIGN KEY (dependencia_id)
REFERENCES dependencias (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE localidades ADD CONSTRAINT departamentos_localidades_fk
FOREIGN KEY (departamento_id)
REFERENCES departamentos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT departamentos_instits_fk
FOREIGN KEY (departamento_id)
REFERENCES departamentos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT localidades_instits_fk
FOREIGN KEY (localidad_id)
REFERENCES localidades (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits ADD CONSTRAINT claseinstits_instits_fk
FOREIGN KEY (claseinstit_id)
REFERENCES claseinstits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE planes ADD CONSTRAINT titulos_planes_fk
FOREIGN KEY (titulo_id)
REFERENCES titulos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE sectores_titulos ADD CONSTRAINT titulos_sectores_titulos_fk
FOREIGN KEY (titulo_id)
REFERENCES titulos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE planes ADD CONSTRAINT instits_planes_fk
FOREIGN KEY (instit_id)
REFERENCES instits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

