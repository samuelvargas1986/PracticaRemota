-- STORE PROCEDURE - VOLUNTARIOS - HistorialVOL - ROLES



-- HISTORIAL VOLUNTARIO
DELIMITER $$
CREATE PROCEDURE spu_histVolunrario_registrar
(
	IN _idpersona INT,
	IN _idrol INT
)
BEGIN 

	INSERT INTO historialvol (idvoluntario, idrol) VALUES(_idvoluntario, _idrol);
	
END $$



-- ROLES

DELIMITER $$
CREATE PROCEDURE spu_roles_registrar(IN _rol VARCHAR(20))
BEGIN 
	INSERT INTO roles (rol) VALUES (_rol);
END $$


DELIMITER $$
CREATE PROCEDURE spu_roles_listar()
BEGIN
	SELECT * FROM roles;
END $$
