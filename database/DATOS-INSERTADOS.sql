-- INsercciones de datos 


-- MASCOTAS
SELECT * FROM mascotas
INSERT INTO mascotas(idraza,nombre,sexo)VALUES
(195,'negrito','M'),
(197,'layja','H'),
(95,'fido','M'),
(62,'boby','M'),
(286,'nano','M');


-- Procesos Medicos
SELECT * FROM procesosmedicos
INSERT INTO procesosmedicos(procesomedico)VALUES
('Vacunación'),
('Desparacitación'),
('Cirujias'),
('Chequeo Médico');


-- PERSONAS
SELECT * FROM personas
INSERT INTO personas(nombres,apellidos,fechanac,nrodoc,tipodoc,telefono,correo,iddistrito)VALUES
('Angel','Crisóstomo Gómez','2001-10-01','70460832','D','922481102','1309013@senati.pe','100902'),
('Rosalinda','Mendoza Apolaya','2000-02-10','70512032','D','98512536','rmendoza@gmail.com','100904'),
('Arturo','Quispe Loyola','1999-12-25','98565236','D','956321236','aquipe@gmail.com','100803'),
('Giannina','Aranza Lola','1998-12-10','65956362','D','956236596','garanza@gmail.com','100803');



-- ROLES de voluntarios
SELECT * FROM roles
INSERT INTO roles(rol)VALUES
('Alimentacion de Animales rescatados'),
('Identificación y rescate de animales vulnerables'),
('Limpieza del refugio animal');



-- HISTORIAL VOLUNTARIO 
SELECT * FROM historialvol
INSERT INTO historialvol(idpersona, idrol) VALUES
(2,2),
(4,1);


-- USUARIOS
SELECT * FROM usuarios
INSERT INTO usuarios(idpersona,nombreusuario,passworduser)VALUES
(1,'angel2001','123456'); -- faltaría encriptar la contraseña 



-- ADOPCIONES
SELECT * FROM adopciones
INSERT INTO adopciones(idmascota,idpersona,idusuario)VALUES
(8,3,1),
(9,2,1);



-- DONACIONES
SELECT * FROM donaciones
INSERT INTO donaciones(idpersona,idusuario,tipodonacion)VALUES
(2,1,'Monetaria'),
(4,1,'Material');



-- DETALLE DONACIONES
SELECT * FROM detdonacion
INSERT INTO detdonacion(iddonacion,cantidad,descripcion)VALUES
(1,500,'Dinero en efectivo en Soles Peruanos (S/.)'),
(2,2,'Bolsa de alimento para perro de 15kg'),


-- COMPRAS
SELECT * FROM compras
INSERT INTO compras(idusuario,nota)VALUES
(1,'Compra realizada por la falta de alimento, pagodo con dinero donado');

-- DETALLE DE COMPRA
SELECT * FROM detcompra
INSERT INTO detcompra(idcompra,nombreproducto,cantidad,preciounidad)VALUES
(1,'Mimascot 15 kg',2,90.00),
(1,'Lejía Clorox 1L',2,5.00),
(1,'RicoCat 15kg',1,90.00);