CREATE SEQUENCE bb_titulos_id_seq;
ALTER SEQUENCE bb_titulos_id_seq OWNER TO www;

CREATE TABLE bb_titulos (
                id INTEGER NOT NULL DEFAULT nextval('bb_titulos_id_seq'),
                name VARCHAR(200) NOT NULL,
                marco_ref BOOLEAN DEFAULT false NOT NULL,
                oferta_id INTEGER NOT NULL,
                CONSTRAINT bb_titulos_pkey PRIMARY KEY (id)
);
ALTER TABLE bb_titulos OWNER to www;

ALTER SEQUENCE bb_titulos_id_seq OWNED BY bb_titulos.id;

CREATE SEQUENCE bb_sectores_titulos_id_seq;
ALTER SEQUENCE bb_sectores_titulos_id_seq OWNER TO www;

CREATE TABLE bb_sectores_titulos (
                id INTEGER NOT NULL DEFAULT nextval('bb_sectores_titulos_id_seq'),
                bb_titulo_id INTEGER NOT NULL,
                sector_id INTEGER NOT NULL,
                subsector_id INTEGER DEFAULT 0 NOT NULL,
                prioridad INTEGER DEFAULT 0 NOT NULL,
                CONSTRAINT bb_sectores_titulos_pk PRIMARY KEY (id)
);
ALTER TABLE bb_sectores_titulos OWNER to www;

ALTER SEQUENCE bb_sectores_titulos_id_seq OWNED BY bb_sectores_titulos.id;

CREATE SEQUENCE bb_instits_id_seq;
ALTER SEQUENCE bb_instits_id_seq OWNER TO www;

CREATE TABLE bb_instits (
                id INTEGER NOT NULL DEFAULT nextval('bb_instits_id_seq'),
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
                CONSTRAINT bb_instits_pkey PRIMARY KEY (id)
);
ALTER TABLE bb_instits OWNER to www;

ALTER SEQUENCE bb_instits_id_seq OWNED BY bb_instits.id;

CREATE SEQUENCE bb_planes_id_seq;
ALTER SEQUENCE bb_planes_id_seq OWNER TO www;

CREATE TABLE bb_planes (
                id INTEGER NOT NULL DEFAULT nextval('bb_planes_id_seq'),
                bb_instit_id INTEGER NOT NULL,
                oferta_id INTEGER NOT NULL,
                nombre VARCHAR(200) NOT NULL,
                ciclo_alta INTEGER DEFAULT 0 NOT NULL,
                created TIMESTAMP,
                modified TIMESTAMP,
		ultimo_ciclo INTEGER,
                bb_titulo_id INTEGER NOT NULL,
                CONSTRAINT bb_planes_pkey PRIMARY KEY (id)
);
ALTER TABLE bb_planes OWNER to www;

ALTER SEQUENCE bb_planes_id_seq OWNED BY bb_planes.id;

CREATE INDEX bb_plan_bb_instit_pkey
 ON bb_planes USING BTREE
 ( bb_instit_id, id, oferta_id );

ALTER TABLE bb_instits ADD CONSTRAINT orientaciones_bb_instits_fk
FOREIGN KEY (orientacion_id)
REFERENCES orientaciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_sectores_titulos ADD CONSTRAINT sectores_bb_sectores_titulos_fk
FOREIGN KEY (sector_id)
REFERENCES sectores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_planes ADD CONSTRAINT ofertas_bb_planes_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_titulos ADD CONSTRAINT ofertas_bb_titulos_fk
FOREIGN KEY (oferta_id)
REFERENCES ofertas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT jurisdicciones_bb_instits_fk
FOREIGN KEY (jurisdiccion_id)
REFERENCES jurisdicciones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT tipoinstits_bb_instits_fk
FOREIGN KEY (tipoinstit_id)
REFERENCES tipoinstits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT gestiones_bb_instits_fk
FOREIGN KEY (gestion_id)
REFERENCES gestiones (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT etp_estados_bb_instits_fk
FOREIGN KEY (etp_estado_id)
REFERENCES etp_estados (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT dependencias_bb_instits_fk
FOREIGN KEY (dependencia_id)
REFERENCES dependencias (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT departamentos_bb_instits_fk
FOREIGN KEY (departamento_id)
REFERENCES departamentos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT localidades_bb_instits_fk
FOREIGN KEY (localidad_id)
REFERENCES localidades (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_instits ADD CONSTRAINT claseinstits_bb_instits_fk
FOREIGN KEY (claseinstit_id)
REFERENCES claseinstits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_planes ADD CONSTRAINT bb_titulos_bb_planes_fk
FOREIGN KEY (bb_titulo_id)
REFERENCES bb_titulos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_sectores_titulos ADD CONSTRAINT bb_titulos_bb_sectores_titulos_fk
FOREIGN KEY (bb_titulo_id)
REFERENCES bb_titulos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE bb_planes ADD CONSTRAINT bb_instits_bb_planes_fk
FOREIGN KEY (bb_instit_id)
REFERENCES bb_instits (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

