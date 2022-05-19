-- ADOPCIONES -- PROCEDIMIENOS 

DELIMITER $$
CREATE PROCEDURE spu_adopciones_registrar
(
	IN _idmascota INT,
	IN _idpersona INT,
	IN _idusuario INT,
	IN _comentarios VARCHAR(200)	
)
BEGIN 
	IF _comentarios = '' THEN SET _comentarios = NULL; END IF;
	
	INSERT INTO adopciones (idmascota, idpersona, idusuario,comentarios)
	VALUES (_idmascota, _idpersona, _idusuario, _comentarios);
END $$

DELIMITER $$
CREATE PROCEDURE spu_adopciones_listar()
BEGIN
	SELECT adopciones.`idadopcion`, mascotas.`nombre`, especies.`especie`, razas.`raza`,
		adopciones.`fechaadopcion`, adopciones.`fechadevolucion`,adopciones.`comentarios`,
		CONCAT(personas.`apellidos`," ", personas.`nombres`) AS 'Dueño', usuarios.`nombreusuario`
	 FROM adopciones
	INNER JOIN personas ON personas.`idpersona` = adopciones.`idpersona`
	INNER JOIN mascotas ON mascotas.`idmascota` = adopciones.`idmascota`
	INNER JOIN usuarios ON usuarios.`idusuario` = adopciones.`idusuario`
	INNER JOIN razas ON razas.`idraza` = mascotas.`idraza`
	INNER JOIN especies ON especies.`idespecie` = razas.`idespecie`;
END $$

SELECT * FROM especies