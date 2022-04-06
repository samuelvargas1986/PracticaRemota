


DROP DATABASE IF EXISTS comercialzero;   -- codigo eliminar base de datos drop database if exists nombre_bd


CREATE DATABASE comecialzero;
USE comercialzero;

CREATE TABLE marcas
(
	idmarca	 	INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	marca		VARCHAR (30) 	NOT NULL,
	CONSTRAINT uk_marca_mar UNIQUE (marca)
	
)
ENGINE = INNODB;

CREATE TABLE tipoproductos
(
idtipoproducto		INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
tipoproducto		VARCHAR (50)	NOT NULL,
CONSTRAINT 	uk_tipoproducto_tpr UNIQUE (tipoproducto)

)
ENGINE = INNODB;


CREATE TABLE productos
(
idproducto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
idtipoproducto INT NOT NULL,
idmarca		INT NULL,
descripcion	VARCHAR (100) NULL,
precio		DECIMAL (7,2) NOT NULL,
fotografia 	VARCHAR (200) NULL,
fecharegistro 	DATETIME NOT NULL DEFAULT NOW(),
CONSTRAINT fk_idtipoproducto_prd FOREIGN KEY (idtipoproducto) REFERENCES tipoproductos	(idtipoproducto),
CONSTRAINT fk_idmarca_prd FOREIGN KEY (idmarca) REFERENCES marcas (idmarca)
)
ENGINE = INNODB;


INSERT INTO tipoproductos (tipoproducto) VALUES 
('Electrodomesticos'),  -- 1
('Muebles'),		-- 2
('Computo');		-- 3


INSERT INTO marcas (marca) VALUES 
('LG'),			-- 1
('Samsung'),		-- 2
('Atlantis'),		-- 3
('Razer'),		-- 4
('Epson'),		-- 5
('Lenovo'),		-- 6
('HP');			-- 7


INSERT INTO productos (idtipoproducto, idmarca, descripcion, precio) VALUES
(1, 2, 'refrigeradora 25L', 1200),
(2, 3, 'silla gamer rgb', 1250),
(2, 4, 'silla gamer rgb', 1250),
(3, 5, 'impresora modelo l555', 750),
(3, 7, 'portatil ultra boock', 3550);

SELECT * FROM productos;

DELIMITER $$
CREATE PROCEDURE spu_productos_listar()
BEGIN
	SELECT 	PRD.idproducto,
		TPR.tipoproducto,
		MAR.marca,
		PRD.descripcion,
		PRD.precio,
		PRD.fotografia
	 
	FROM productos PRD
	INNER JOIN tipoproductos TPR ON TPR.idtipoproducto = PRD.idtipoproducto
	LEFT JOIN marcas MAR ON MAR.idmarca = PRD.idmarca;
	
END $$

CALL spu_productos_listar ();
