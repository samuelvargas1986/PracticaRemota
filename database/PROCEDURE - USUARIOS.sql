-- STORE PROCEDURE - USUARIOS

DELIMITER $$
CREATE PROCEDURE spu_register_usuarios
(	IN _idpersona 	INT,
	IN _nombreusuario	VARCHAR(30),
	IN _passworduser	VARCHAR(100)
)
BEGIN

	INSERT INTO usuarios (idpersona, nombreusuario, passworduser) 
	VALUES(_idpersona, _nombreusuario, _passworduser);
END $$ 

CALL spu_getNameuser_usuarios('angel2001');
DELIMITER $$
CREATE PROCEDURE spu_getNameuser_usuarios(IN _nameuser VARCHAR(30))
BEGIN 
	SELECT usuarios.`idusuario`, usuarios.`nombreusuario`, usuarios.`passworduser`,
		personas.`foto`, usuarios.`estado`,
		personas.`apellidos`,personas.`nombres`,personas.`tipodoc`,personas.`nrodoc`,personas.`telefono`,
		personas.`correo`
	 FROM usuarios
	INNER JOIN personas ON personas.`idpersona` = usuarios.`idpersona`
	WHERE usuarios.`nombreusuario` = _nameuser AND usuarios.`estado` = 'A';
END $$


CALL spu_getActivoOrDesactivos_usuarios('A');
DELIMITER $$
CREATE PROCEDURE spu_getActivoOrDesactivos_usuarios(IN _estado CHAR(1))
BEGIN
	SELECT usuarios.`idusuario`, usuarios.`nombreusuario`, usuarios.`passworduser`, usuarios.`fecharegistro`,usuarios.`fechabaja`,
		personas.`foto`, usuarios.`estado`,
		personas.`apellidos`,personas.`nombres`,personas.`tipodoc`,personas.`nrodoc`,personas.`telefono`,
		personas.`correo`
	 FROM usuarios
	INNER JOIN personas ON personas.`idpersona` = usuarios.`idpersona`
	WHERE usuarios.`estado` = _estado;
END $$