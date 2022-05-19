CREATE DATABASE helpets;
USE helpets;

CREATE TABLE especies
(
    idespecie	INT  AUTO_INCREMENT PRIMARY KEY,
    especie	VARCHAR(30) 	NOT NULL,
    CONSTRAINT uk_especies_esp UNIQUE (especie)	
    
)ENGINE= INNODB;


CREATE TABLE razas
(
    idraza     INT AUTO_INCREMENT PRIMARY KEY,
    raza       VARCHAR(50) NOT NULL,
    idespecie  INT 	   NOT NULL,
    CONSTRAINT fk_idespecie_raz  FOREIGN KEY (idespecie) REFERENCES especies(idespecie),
    CONSTRAINT uk_raza_raz UNIQUE(idespecie,raza)	
)ENGINE=INNODB;

CREATE TABLE mascotas
(
    idmascota 		INT AUTO_INCREMENT PRIMARY KEY,
    idraza    		INT  		NOT NULL,
    nombre    		VARCHAR(50) 	NOT NULL,
    fecharescate	DATE        	NOT NULL DEFAULT DATE(NOW()),
    disponibilidad      CHAR(1)         NOT NULL DEFAULT 0, -- 0 Disponible / 1 NO Disponible
    foto		VARCHAR(200)	NULL,
    vive		CHAR(1)		NOT NULL DEFAULT 'S', -- S --> Sí vive /   N --> No vive
    sexo		CHAR(1)		NOT NULL , -- H--> Hembra M --> Macho
    CONSTRAINT fk_idraza_mas  FOREIGN KEY (idraza) REFERENCES razas(idraza)
)ENGINE = INNODB;




CREATE TABLE procesosmedicos
(
    idprocesomedico	INT AUTO_INCREMENT PRIMARY KEY,
    procesomedico	VARCHAR(50) NOT NULL,
    CONSTRAINT uk_proceso_pro UNIQUE (procesomedico)
)
ENGINE = INNODB;

CREATE TABLE HistorialMed
(
	idhistorial		INT AUTO_INCREMENT PRIMARY KEY,
	idmascota		INT NOT NULL,
	idproceso		INT NOT NULL,
	descripcion		VARCHAR(300) NOT NULL,
	fechaatencion		DATETIME NOT NULL DEFAULT NOW(),
	peso			DECIMAL(4,2) NOT NULL,
	CONSTRAINT fk_mascota_his FOREIGN KEY (idmascota) REFERENCES mascotas(idmascota),
	CONSTRAINT fk_proceso_his FOREIGN KEY (idproceso) REFERENCES procesosmedicos(idprocesomedico)
)
ENGINE = INNODB;



CREATE TABLE departamentos
(
  iddepartamento	VARCHAR(2) NOT NULL PRIMARY KEY,
  departamento		VARCHAR(45) NOT NULL
)
ENGINE = INNODB;

CREATE TABLE provincias 
(
  idprovincia		VARCHAR(4)	NOT NULL PRIMARY KEY,
  provincia		VARCHAR(45) NOT NULL,
  iddepartamento	VARCHAR(2)	NOT NULL,
  CONSTRAINT fk_iddepartamento_pro FOREIGN KEY (iddepartamento) REFERENCES departamentos (iddepartamento)
)
ENGINE = INNODB;


CREATE TABLE distritos(
  iddistrito VARCHAR(6) 	NOT NULL PRIMARY KEY,
  distrito VARCHAR(45)  	NOT NULL,
  idprovincia VARCHAR(4) 	NOT NULL,
  iddepartamento VARCHAR(2) 	NOT NULL,
  CONSTRAINT fk_idprovincia_dis FOREIGN KEY (idprovincia) REFERENCES provincias (idprovincia),
  CONSTRAINT fk_iddepartamento_dis FOREIGN KEY (iddepartamento) REFERENCES departamentos(iddepartamento)
) ENGINE=INNODB;



-- --------------------------------------------------------


CREATE TABLE personas
(
	idpersona	INT AUTO_INCREMENT PRIMARY KEY,
	nombres		VARCHAR(200)	NOT NULL,
	apellidos	VARCHAR(200)	NOT NULL,
	fechanac	DATE 		NOT NULL,
	nrodoc		CHAR(8)		NOT NULL,
	tipodoc		CHAR(1)		NOT NULL, -- D = DNI  /   C= Carnet Extranjeria 
	telefono	CHAR(9)		NOT NULL,
	correo		VARCHAR(100) 	NOT NULL,
	nivelconfianza	CHAR(1)		NOT NULL DEFAULT '1', -- 3 niveles = 1  2   3
	iddistrito	VARCHAR(6) 	NOT NULL,
	foto		VARCHAR(100)	NULL,
	CONSTRAINT fk_iddistrito_per FOREIGN KEY (iddistrito) REFERENCES distritos(iddistrito),
	CONSTRAINT uk_nrodoc_per UNIQUE(tipodoc,nrodoc)
)ENGINE = INNODB;


CREATE TABLE roles
(
	idrol 		INT AUTO_INCREMENT PRIMARY KEY,
	rol 		VARCHAR (100) NOT NULL,
	CONSTRAINT uk_rol_roles UNIQUE KEY (rol)
)ENGINE = INNODB

CREATE TABLE historialvol
(
	idhistorial 	INT 	AUTO_INCREMENT PRIMARY KEY,
	idpersona 	INT   	NOT NULL,
	fechainicio	DATE    NOT NULL DEFAULT DATE(NOW()),
	fechafin	DATE    NULL,
	estado		CHAR(1) 	NOT NULL DEFAULT '1', -- 1 Disponible / 0 NO Disponible
	idrol		INT 	NOT NULL,
	CONSTRAINT fk_idpersona_hist FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
	CONSTRAINT fk_idrol_hist  FOREIGN KEY (idrol) REFERENCES roles(idrol)
)ENGINE = INNODB;

CREATE TABLE usuarios
(
	idusuario	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT NOT NULL,
	nombreusuario	VARCHAR(30) NOT NULL,
	passworduser	VARCHAR(100) NOT NULL,
	estado		CHAR(1) DEFAULT 'A',
	fecharegistro	DATETIME DEFAULT NOW(),
	fechabaja	DATETIME NULL,
	CONSTRAINT fk_idpersona_usu FOREIGN KEY (idpersona)REFERENCES personas(idpersona),
	CONSTRAINT uk_nameuser_usu UNIQUE(nombreusuario)
)ENGINE=INNODB;

CREATE TABLE adopciones
(
	idadopcion	INT AUTO_INCREMENT PRIMARY KEY,
	idmascota	INT 		NOT NULL,
	idpersona	INT 		NOT NULL,
	idusuario	INT 		NOT NULL,
	fechaadopcion	DATETIME	NOT NULL DEFAULT NOW(),
	fechadevolucion DATE 		NULL,
	comentarios	VARCHAR(200)	NULL,
	CONSTRAINT fk_idmascota_adop FOREIGN KEY (idmascota) REFERENCES mascotas(idmascota),
	CONSTRAINT fk_idpersona_adop FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
	CONSTRAINT fk_idusuario_adop FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario),	
	CONSTRAINT uk_idmascota_adop UNIQUE(idpersona,idmascota)
)ENGINE= INNODB;

CREATE TABLE donaciones
(
	iddonacion  	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona 	INT NOT NULL,
	idusuario 	INT NOT NULL,
	tipodonacion 	VARCHAR(20) NOT NULL,
	fechadonacion 	DATETIME NOT NULL DEFAULT NOW(),
   	CONSTRAINT fk_idpersona_dona  	FOREIGN KEY (idpersona)	REFERENCES personas(idpersona) ,
   	CONSTRAINT fk_idusuario_dona  	FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario)
)ENGINE = INNODB;




CREATE TABLE  detdonacion
(
	iddetdonacion   INT AUTO_INCREMENT PRIMARY KEY,
	iddonacion	INT NOT NULL,
	cantidad	INT NOT NULL,
	descripcion	VARCHAR NULL(500),
	CONSTRAINT fk_iddonacion_det FOREIGN KEY (iddonacion) REFERENCES donaciones(iddonacion)	
)ENGINE = INNODB;

CREATE TABLE compras
(
	idcompra		INT AUTO_INCREMENT PRIMARY KEY,
	fechcompra		DATETIME NOT NULL DEFAULT DATE(NOW()),
	idusuario		INT NOT NULL,
	nota			VARCHAR(250) NULL,
	CONSTRAINT fk_idusuario_comp  FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario)
)ENGINE = INNODB;

CREATE TABLE detcompra
(
	iddetallecompra 	INT AUTO_INCREMENT PRIMARY KEY,
	idcompra		INT NOT NULL,
	nombreproducto		VARCHAR(200) NOT NULL,
	cantidad		INT NOT NULL,
	preciounidad		DECIMAL(7,2) NOT NULL,
	CONSTRAINT fk_idcompra_detc FOREIGN KEY (idcompra) REFERENCES compras(idcompra)	
)
ENGINE=INNODB;

CREATE TABLE almacen
(
	idalmacen	INT AUTO_INCREMENT PRIMARY KEY,
	tipooperacion 	CHAR(1) NOT NULL, -- R --> Recepcion  / S --> Salida 
	idusuario	INT NOT NULL,
	fechaalmacen	DATE DEFAULT NOW(),
	descripcion	VARCHAR(200) NULL,
	unidadmedida	VARCHAR(20)  NOT NULL,	
	CONSTRAINT fk_idusuario_alm FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario)
)ENGINE=INNODB;
