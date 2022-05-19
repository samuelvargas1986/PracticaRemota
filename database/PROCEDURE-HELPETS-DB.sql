-- STORE PROCEDURE - PERSONAS - DEPARTAMENTOS - PROVINCIAS - DISTRITOS



-- PERSONAS
DELIMITER $$
CREATE PROCEDURE spu_personas_registrar -- Implementado
(
	IN _nombres VARCHAR(200),
	IN _apellidos VARCHAR(200),
	IN _fechanac DATE,
	IN _nrodoc CHAR(8),
	IN _tipodoc CHAR(1),
	IN _telefono CHAR(9),
	IN _correo VARCHAR(100),
	IN _iddistrito INT
)
BEGIN
		INSERT INTO personas (nombres, apellidos, fechanac, nrodoc, tipodoc, telefono, correo, nivelconfianza, iddistrito)
		VALUES (_nombres, _apellidos, _fechanac, _nrodoc, _tipodoc, _telefono, _correo, '1', _iddistrito);
	
END $$


DELIMITER $$
CREATE PROCEDURE spu_personas_listarporConfianza(IN _nivelconfianza CHAR(1)) -- No Implementado
BEGIN 
	SELECT personas.`nombres`, personas.`apellidos`, personas.`fechanac`,
		personas.`nrodoc`,personas.`tipodoc`,personas.`telefono`,
		distritos.`distrito`, `provincias`.`provincia`,departamentos.`departamento`
	 FROM personas 
	INNER JOIN `distritos` ON `distritos`.`iddistrito` = personas.`iddistrito`
	INNER JOIN provincias ON `provincias`.`idprovincia` = distritos.`idprovincia`
	INNER JOIN departamentos ON departamentos.`iddepartamento` = provincias.`iddepartamento`
	WHERE nivelconfianza = _nivelconfianza;
END $$

DELIMITER $$
CREATE PROCEDURE spu_personas_listar() -- Implementado 
BEGIN 
	SELECT personas.`idpersona`,personas.`nombres`, personas.`apellidos`, personas.`fechanac`,
		personas.`nrodoc`,personas.`tipodoc`,personas.`telefono`, distritos.`distrito`,
		provincias.`provincia`, departamentos.`departamento`
	 FROM personas 
	INNER JOIN `distritos` ON `distritos`.`iddistrito` = personas.`iddistrito`
	INNER JOIN provincias ON `provincias`.`idprovincia` = distritos.`idprovincia`
	INNER JOIN departamentos ON departamentos.`iddepartamento` = provincias.`iddepartamento`;
END $$

DELIMITER $$
CREATE PROCEDURE spu_personas_getNumeroDOc(IN _tipodoc CHAR(1), IN _numerodoc CHAR(8)) -- No implementado
BEGIN

	SELECT personas.`nombres`, personas.`apellidos`, personas.`fechanac`,
		personas.`nrodoc`,personas.`tipodoc`,personas.`telefono`
	 FROM personas 
	INNER JOIN `distritos` ON `distritos`.`iddistrito` = personas.`iddistrito`
	INNER JOIN provincias ON `provincias`.`idprovincia` = distritos.`idprovincia`
	INNER JOIN departamentos ON departamentos.`iddepartamento` = provincias.`iddepartamento`
	WHERE personas.`tipodoc` = _tipodoc AND personas.`nrodoc` = _numerodoc;

END $$

DELIMITER $$
CREATE PROCEDURE spu_personas_actualizar  -- Implementado
(
	IN _nombres VARCHAR(200),
	IN _apellidos VARCHAR(200),
	IN _fechanac DATE,
	IN _nrodoc CHAR(8),
	IN _tipodoc CHAR(1),
	IN _telefono CHAR(9),
	IN _correo VARCHAR(100),
	IN _iddistrito INT,
	IN _idpersona INT	
)
BEGIN
	UPDATE personas SET nombres = _nombres, apellidos = _apellidos, fechanac = _fechanac,
	 nrodoc = _nrodoc, tipodoc = _tipodoc, telefono = _telefono, correo = _correo, 
	 iddistrito = _iddistrito
	 WHERE idpersona = _idpersona;
END $$

DELIMITER $$
CREATE PROCEDURE spu_personas_getbyID( IN _idpersona INT)
BEGIN
	SELECT personas.`idpersona`,personas.`nombres`,personas.`apellidos`,personas.`fechanac`,personas.`nrodoc`,
	personas.`tipodoc`,personas.`telefono`,personas.`correo`,personas.`nivelconfianza`,personas.`foto`,
	distritos.`iddistrito`,distritos.`distrito`,provincias.`idprovincia`,provincias.`provincia`,
	departamentos.`iddepartamento`,departamentos.`departamento`
	 FROM personas
	INNER JOIN distritos ON distritos.`iddistrito` = personas.`iddistrito`
	INNER JOIN provincias ON provincias.`idprovincia` = distritos.`idprovincia`
	INNER JOIN departamentos ON departamentos.`iddepartamento` = provincias.`iddepartamento`
	WHERE  personas.`idpersona` = _idpersona;
END $$



-- DEPARTAMENTOS

DELIMITER $$
CREATE PROCEDURE spu_cargar_departamentos()
BEGIN 

	SELECT * FROM departamentos;

END $$

-- PROVINCIAS
DELIMITER $$
CREATE PROCEDURE spu_carga_provincias(IN _iddepartamento VARCHAR(2))
BEGIN
	SELECT * FROM provincias WHERE iddepartamento = _iddepartamento;
END $$


-- DISTRITOS 
DELIMITER $$
CREATE PROCEDURE spu_cargar_distritos(IN _idprovincia VARCHAR(4))
BEGIN
	SELECT * FROM distritos WHERE idprovincia = _idprovincia; 
END $$