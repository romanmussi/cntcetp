CREATE SEQUENCE titulos_bb_id_seq;
ALTER SEQUENCE titulos_bb_id_seq OWNER TO www;

CREATE TABLE titulos_bb (
                id INTEGER NOT NULL DEFAULT nextval('titulos_bb_id_seq'),
                name VARCHAR(200) NOT NULL,
                marco_ref BOOLEAN DEFAULT false NOT NULL,
                oferta_id INTEGER NOT NULL,
                CONSTRAINT titulos_bb_pkey PRIMARY KEY (id)
);
ALTER TABLE titulos_bb OWNER to www;

ALTER SEQUENCE titulos_bb_id_seq OWNED BY titulos_bb.id;

CREATE SEQUENCE sectores_titulos_bb_id_seq;
ALTER SEQUENCE sectores_titulos_bb_id_seq OWNER TO www;

CREATE TABLE sectores_titulos_bb (
                id INTEGER NOT NULL DEFAULT nextval('sectores_titulos_bb_id_seq'),
                titulo_bb_id INTEGER NOT NULL,
                sector_id INTEGER NOT NULL,
                subsector_id INTEGER DEFAULT 0 NOT NULL,
                prioridad INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT sectores_titulos_bb_pk PRIMARY KEY (id)
);
ALTER TABLE sectores_titulos_bb OWNER to www;

ALTER SEQUENCE sectores_titulos_bb_id_seq OWNED BY sectores_titulos_bb.id;

CREATE SEQUENCE instits_bb_id_seq;
ALTER SEQUENCE instits_bb_id_seq OWNER TO www;

CREATE TABLE instits_bb (
                id INTEGER NOT NULL DEFAULT nextval('instits_bb_id_seq'),
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
                CONSTRAINT instits_bb_pkey PRIMARY KEY (id)
);
ALTER TABLE instits_bb OWNER to www;

ALTER SEQUENCE instits_bb_id_seq OWNED BY instits_bb.id;

CREATE SEQUENCE planes_bb_id_seq;
ALTER SEQUENCE planes_bb_id_seq OWNER TO www;

CREATE TABLE planes_bb (
                id INTEGER NOT NULL DEFAULT nextval('planes_bb_id_seq'),
                instit_bb_id INTEGER NOT NULL,
                oferta_id INTEGER NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                ciclo_alta INTEGER DEFAULT 0 NOT NULL,
                created TIMESTAMP,
                modified TIMESTAMP,
		ultimo_ciclo INTEGER,
                titulo_bb_id INTEGER NOT NULL,
                CONSTRAINT planes_bb_pkey PRIMARY KEY (id)
);
ALTER TABLE planes_bb OWNER to www;

ALTER SEQUENCE planes_bb_id_seq OWNED BY planes_bb.id;

CREATE INDEX plan_bb_instit_bb_pkey
 ON planes_bb USING BTREE
 ( instit_bb_id, id, oferta_id );

ALTER TABLE instits_bb ADD CONSTRAINT orientaciones_instits_bb_fk
FOREIGN KEY (orientacion_id)
REFERENCES orientaciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE sectores_titulos_bb ADD CONSTRAINT sectores_sectores_titulos_bb_fk
FOREIGN KEY (sector_id)
REFERENCES sectores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE planes_bb ADD CONSTRAINT ofertas_planes_bb_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE titulos_bb ADD CONSTRAINT ofertas_titulos_bb_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT jurisdicciones_instits_bb_fk
FOREIGN KEY (jurisdiccion_id)
REFERENCES jurisdicciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT tipoinstits_instits_bb_fk
FOREIGN KEY (tipoinstit_id)
REFERENCES tipoinstits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT gestiones_instits_bb_fk
FOREIGN KEY (gestion_id)
REFERENCES gestiones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT etp_estados_instits_bb_fk
FOREIGN KEY (etp_estado_id)
REFERENCES etp_estados (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT dependencias_instits_bb_fk
FOREIGN KEY (dependencia_id)
REFERENCES dependencias (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT departamentos_instits_bb_fk
FOREIGN KEY (departamento_id)
REFERENCES departamentos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT localidades_instits_bb_fk
FOREIGN KEY (localidad_id)
REFERENCES localidades (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE instits_bb ADD CONSTRAINT claseinstits_instits_bb_fk
FOREIGN KEY (claseinstit_id)
REFERENCES claseinstits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE planes_bb ADD CONSTRAINT titulos_bb_planes_bb_fk
FOREIGN KEY (titulo_bb_id)
REFERENCES titulos_bb (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE sectores_titulos_bb ADD CONSTRAINT titulos_bb_sectores_titulos_bb_fk
FOREIGN KEY (titulo_bb_id)
REFERENCES titulos_bb (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE planes_bb ADD CONSTRAINT instits_bb_planes_bb_fk
FOREIGN KEY (instit_bb_id)
REFERENCES instits_bb (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

