-- CIFO Vallès, CIFO La Violeta
-- Robert Sallent

-- EJERCICIO 2: MASCOTAS
-- elimina la base de datos mascota si existe
-- DROP DATABASE IF EXISTS EJERCICIO02_mascotas;

-- crea la base de datos mascotas
-- CREATE DATABASE EJERCICIO02_mascotas 
-- DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- usa la base de datos mascotas
USE ej_mascotas;

-- crea la tabla tipos
-- CREATE TABLE IF NOT EXISTS tipos (
--  id int(11) NOT NULL AUTO_INCREMENT,
--  nombre varchar(64) NOT NULL,
--  descripcion text NOT NULL,
--  PRIMARY KEY (id)
-- ) ENGINE=InnoDB;

-- inserta los registros en la tabla tipos
INSERT INTO tipos
VALUES
(1, 'Leon', 'El rey de la jungla'),
(2, 'Gato', 'Animal doméstico autónomo'),
(3, 'Paquidermo', 'Animal muy grande'),
(4, 'Pájaro', 'Animal pequeño y ruidoso'),
(5, 'Reptil', 'A la lengua y a las serpientes hay que temerles'),
(6, 'Gamusino', 'Animal autóctono de España, Portugal y Cuba'),
(7, 'Perro', 'Animal doméstico y para guardar cabras');

-- crea la tabla razas
-- CREATE TABLE IF NOT EXISTS razas (
--  id int(11) NOT NULL AUTO_INCREMENT,
--  nombre varchar(64) NOT NULL,
--  descripcion text NOT NULL,
--  idtipo int(11) NOT NULL,
--  PRIMARY KEY (id),
--  INDEX(idtipo),
--  FOREIGN KEY (idtipo) REFERENCES tipos (id) 
--  ON DELETE RESTRICT ON UPDATE CASCADE
-- ) ENGINE=InnoDB;

-- inserta las razas
INSERT INTO razas 
VALUES
(1, 'León africano', 'León de la jungla africana', 1),
(2, 'Persa', 'Gato peludo', 2),
(3, 'Siamés', 'Gato blanco de cara negra', 2),
(4, 'Elefante', 'Gran animal con trompa', 3),
(5, 'Gorrión', 'Pájaro urbano', 4),
(6, 'Canario', 'Pájaro doméstico cantarín', 4),
(7, 'Jilguero', 'Pájaro cantarín de colorines', 4),
(8, 'Cotorra', 'Pájaro hablador molesto', 4),
(9, 'Camaleón', 'Reptil pequeño que muta de color', 5),
(10, 'Boa', 'Gran serpiente', 5),
(11, 'Dragón', 'Pequeño reptil', 5),
(12, 'Gamusino extremeño', 'Gamusino propio de los campos de Badajoz', 6),
(13, 'Dogo', 'Perro de gran tamaño', 7),
(14, 'Bulldog', 'Perro gordo', 7),
(15, 'Yorkshire', 'Perro pequeño color gris', 7),
(16, 'Dálmata', 'Perro blanco con manchas negras', 7),
(17, 'Galgo', 'Perro muy delgado y muy rápido', 7);

-- crea la tabla usuarios
-- CREATE TABLE IF NOT EXISTS usuarios (
--  user varchar(16) NOT NULL,
--  pass varchar(32) NOT NULL,
--  nombre varchar(32) NOT NULL,
--  apellidos varchar(128) NOT NULL,
--  email varchar(128) NOT NULL,
--  direccion varchar(256) NOT NULL,
--  poblacion varchar(128) NOT NULL,
--  provincia varchar(128) NOT NULL,
--  cp varchar(5) NOT NULL,
--  PRIMARY KEY (user)
-- ) ENGINE=InnoDB;

-- inserta en la tabla usuarios
-- INSERT INTO usuarios
-- VALUES
-- ('albertito', '1234', 'alberto', 'sanchez', 'alberto02@gmail.com', 'terrasa65', 'Terrassa', 'Barcelona', '08023'),
-- ('andreu', '1234', 'Andrade', 'Campo Sol', 'andreu@yahoo.com', 'c/ del Pinar', 'Manresa', 'Barcelona', '08265'),
-- ('Antoninos', '1234', 'Antonio', 'Manao Cetruera', 'amc@vetetuasaber.com', 'c/la no tan mejor, 75', 'Cornellá Ll', 'Barcelona', '08037'),
-- ('berto', '1234', 'Berto', 'Matt', 'bertomatt@gmail.com', 'C/Pepairas', 'Sabadell', 'Barcelona', '08204'),
-- ('carlota95', '1234', 'carlota', 'perez', 'carlota1955@gmail.com', ' barcelona06', 'Sabadell', 'Barcelona', '08207'),
-- ('cinguango', '1234', 'David', 'Smith Wesson', 'smith@gmail.com', 'C/Del Corral', 'Sabadell', 'Barcelona', '08206'),
-- ('davidito', '1234', 'david', 'lopez', 'david07@gmail.com', 'santquirze01', 'Ripollet', 'Barcelona', '02145'),
-- ('Elemental33', '1234', 'Esteban', 'Martínez Gómez', 'martinezgomez@gmail.com', 'C/Dominó', 'Bellaterra', 'Barcelona', '08318'),
-- ('felipo', '1234', 'Felipe', 'Sanchez Perez', 'felipesanchez@yahoo.com', 'Pasaje ribatallada', 'Sabadell', 'Barcelona', '08206'),
-- ('francisco', '1234', 'fran', 'garcia toledo', 'frangar@yahoo.es', 'c/del Alamo', 'Terrassa', 'Barcelona', '08222'),
-- ('Hommer', '1234', 'Hommer', 'Simpson', 'hommer@gmail.com', 'C/Avenida siempre viva 742', 'Springfield', 'Massachusetts', '01101'),
-- ('Juanico', '1234', 'Juan', 'Mariano Garcia', 'jmg@vetetuasaber.com', 'c/la peor, 61', 'Badalona', 'Barcelona', '08114'),
-- ('jupe', '1234', 'Juan', 'Perez', 'juan@gmail.com', 'tamarit 53', 'Sabadell', 'Barcelona', '08021'),
-- ('lola', '1234', 'Dolores', 'Pepin ocho', 'lola@yahoo.com', 'c/ de la serna', 'Rio Tinto', 'Huelva', '34565'),
-- ('lolailo', '1234', 'Lolo', 'Cercezo', 'lolailo@hotmail.es', 'C/Quetedije', 'Terrassa', 'Barcelona', '08208'),
-- ('maica', '1234', 'maica', 'ferrer cas', 'maica@gmail.com', 'plza cerca', 'viladecavalls', 'barcelona', '08220'),
-- ('manu', '1234', 'manuel', 'ferrero caso', 'manu@gmail.com', 'plza de la vila', 'barcelona', 'barcelona', '08025'),
-- ('maria', '1234', 'Maria', 'Leon Grados', 'marialg@hotmail.com', 'C/ Rambla', 'Sabadell', 'Barcelona', '08201'),
-- ('mayelakb', '1234', 'Filomeno', 'De los Palotes', 'palotesfilemon@yahoo.com', 'C/sallares i pla', 'Sabadell', 'Barcelona', '08201'),
-- ('Mnlo', '1234', 'Manolo', 'Rodriguez Sánchez', 'manolico@vetetuasaber.com', 'c/la mejor, 5', 'Hospitalet Ll', 'Barcelona', '08015'),
-- ('Mortadelo', '1234', 'Filemon', 'Carmona Gonzalez', 'Mortadelo@gmail.com', 'C/ 13 Rue del Percebe', 'Sabadell', 'Barcelona', '08206'),
-- ('one', '1234', 'oscar', 'nicolas espino', 'one@msn.com', 'c/contanti', 'sabadell', 'barcelona', '08206'),
-- ('pepe', '1234', 'José', 'López López', 'pepelopezlopez@hotmail.com', 'C/los pinos', 'Sabadell', 'Barcelona', '08205'),
-- ('programeitor', '1234', 'Friki', 'Frikazo', 'frikifrikazo@gmail.com', 'Plaza del Mas Allá', 'Rubí', 'Barcelona', '08218'),
-- ('tito', '1234', 'Carlos', 'Martinez Luengo', 'titocm@gmail.com', 'C/ Lacy', 'Sabadell', 'Barcelona', '08202'),
-- ('txema', '1234', 'Jesús', 'Arias Pur', 'txema@gmail.com', 'provença 50', 'barcelona', 'barcelona', '08029'),
-- ('yek', '1234', 'Yesika', 'lopez', 'yesika@gmail.com', 'canigo 90', 'Terrassa', 'Barcelona', '08211'),
-- ('zenvi', '1234', 'unai', 'guillen', 'unai@gmail.com', 'nord 32', 'Ripollet', 'Barcelona', '08222');

-- crea la tabla mascotas
-- CREATE TABLE IF NOT EXISTS mascotas (
--  id int(11) NOT NULL AUTO_INCREMENT,
--  nombre varchar(64) NOT NULL,
--  sexo char(1) NOT NULL COMMENT 'M macho, H hembra',
--  biografia text NOT NULL,
--  fechanacimiento date NOT NULL,
--  fechafallecimiento date DEFAULT NULL,
--  user varchar(16) NOT NULL,
--  idraza int(11) NOT NULL,
--  PRIMARY KEY (id),
--  INDEX(user),
--  INDEX(idraza),
--  FOREIGN KEY (user) REFERENCES usuarios (user) 
--  ON DELETE CASCADE ON UPDATE CASCADE,
--  FOREIGN KEY (idraza) REFERENCES razas (id) 
--  ON DELETE RESTRICT ON UPDATE CASCADE
-- )ENGINE=InnoDB;

-- inserta en la tabla mascotas
INSERT INTO mascotas
(id,nombre,sexo,biografia,fechaNacimiento,fechaFallecimiento,idUsuario,idRaza)
VALUES
(1, 'Toby', 'M', 'Mascota muy graciosa', '2009-11-16', NULL, 2, 2),
(2, 'Chuli', 'H', 'Mascota de la família desde hace muchos años.', '2014-04-14', NULL, 2, 3),
(3, 'Cali', 'M', 'Animal que hace mucha compañía.', '2006-09-04', '2014-12-10', 2, 9),
(4, 'Rocky', 'M', 'El alma de la casa.', '2009-09-17', NULL, 2, 8),
(5, 'Tin', 'M', 'Bicho bastante molesto que anda por casa.', '2009-08-29', NULL, 2, 15),
(6, 'Pancho', 'M', 'La mascota de mi hija.', '2015-02-12', '2015-05-03', 2, 15),
(7, 'Comotu', 'M', 'No hace nada más que comer y dormir.', '2010-03-27', NULL, 2, 2),
(8, 'Ally', 'H', 'Salta, corre, baila y hace el pino.', '2012-05-11', NULL, 2, 12),
(9, 'Perri', 'H', 'Animalillo que encontramos y adoptamos.', '2011-07-17', NULL, 2, 17),
(10, 'Rock', 'M', 'Es muy divertido.', '2002-12-07', NULL, 2, 9),
(11, 'Tali', 'M', 'Lo cogimos en adopción.', '2004-09-16', NULL, 2, 9),
(12, 'Molli', 'H', 'Proviene de la protectora de Mataró.', '2008-02-26', '2015-05-31', 2, 6),
(13, 'Wilson', 'M', 'Ha pasado mucho tiempo con nosotros.', '2015-05-25', NULL, 2, 10),
(14, 'Lucy', 'H', 'Es un animal muy inteligente.', '2015-06-11', '2015-07-25', 2, 9),
(15, 'Cas', 'M', 'Es torpe, gordo y se tira pedos.', '2005-09-13', '2014-06-18', 2, 6),
(16, 'Peltu', 'M', 'No hace más que girar sobre sí mismo.', '2014-07-18', NULL, 2, 3),
(17, 'Peludo', 'M', 'La abuela le tiene mucho cariño.', '2006-03-27', NULL, 2, 13),
(18, 'Luna', 'H', 'No sabemos de dónde procede.', '2012-04-29', '2015-01-07', 2, 16),
(19, 'Pancho', 'M', 'Nos lo encontramos en una gasolinera.', '2013-09-20', NULL, 2, 4),
(20, 'Spider', 'M', 'El anterior dueño no lo podía cuidar.', '2002-10-14', '2002-12-16', 2, 16),
(21, 'Mack', 'M', 'Va cada verano a un hotel para mascotas.', '2013-01-18', '2015-05-31', 2, 1),
(22, 'Rulo', 'M', 'Nos hace dejarnos la pasta en el veterinario.', '2010-09-16', NULL, 2, 13),
(23, 'Resti', 'H', 'Duerme en un colchón en el comedor.', '2007-10-07', NULL, 2, 14),
(24, 'Festa', 'H', 'Se hace pis por toda la casa.', '2014-12-25', '2015-01-09', 2, 8),
(25, 'Black', 'M', 'Sabe contar los números del 1 al 10.', '2005-05-16', '2005-09-18', 2, 11),
(26, 'Nico', 'M', 'Es capaz de arrastrar un trineo.', '2007-01-22', NULL, 2, 15),
(27, 'Tayo', 'M', 'Muerde el parachoques del coche cuando salimos.', '2005-10-18', '2015-01-08', 2, 16),
(28, 'Multto', 'M', 'Corre como un galgo.', '2009-04-16', '2014-06-20', 2, 6),
(29, 'Ari', 'H', 'Había vivido en una pensión de mala muerte.', '2013-03-14', '2015-03-17', 2, 12),
(30, 'Licky', 'H', 'Vive una vida feliz.', '2008-12-04', NULL, 2, 11),
(31, 'Uma', 'H', 'Tiene su propio cojín en casa.', '2010-12-21', '2014-12-06', 2, 4),
(50, 'Terrano', 'M', 'Sabe jugar y saltar.', '2013-02-10', NULL, 2, 14);

-- crea la tabla fotos
-- CREATE TABLE IF NOT EXISTS fotos(
--  id int(11) NOT NULL AUTO_INCREMENT,
--  fichero varchar(256) NOT NULL,
--  ubicacion varchar(128) DEFAULT NULL,
--  idmascota int(11) NOT NULL,
--  PRIMARY KEY (id),
--  INDEX(idmascota),
--  FOREIGN KEY (idmascota) REFERENCES mascotas (id) 
--  ON DELETE CASCADE ON UPDATE CASCADE
-- ) ENGINE=InnoDB;

-- inserta en la tabla fotos
INSERT INTO fotos
VALUES
(1, 'imagen1361.jpg', 'Barcelona', 18),
(2, 'imagen1346.jpg', 'Barcelona', 31),
(3, 'imagen938.jpg', 'Barcelona', 3),
(4, 'imagen369.jpg', 'Barcelona', 32),
(5, 'imagen46.jpg', 'Barcelona', 7),
(6, 'imagen422.jpg', 'Barcelona', 39),
(7, 'imagen1667.jpg', 'Barcelona', 10),
(8, 'imagen1144.jpg', 'Barcelona', 46),
(9, 'imagen1682.jpg', 'Sabadell', 30),
(10, 'imagen881.jpg', 'Sabadell', 9),
(11, 'imagen1196.jpg', 'Sabadell', 26),
(12, 'imagen1760.jpg', 'Sabadell', 7),
(13, 'imagen754.jpg', 'Sabadell', 30),
(14, 'imagen122.jpg', 'Terrassa', 25),
(15, 'imagen157.jpg', 'Terrassa', 5),
(16, 'imagen1736.jpg', 'Terrassa', 16),
(17, 'imagen746.jpg', 'Terrassa', 6),
(18, 'imagen1050.jpg', 'Terrassa', 38),
(19, 'imagen190.jpg', 'Terrassa', 27),
(20, 'imagen1852.jpg', 'Sant Cugat', 22),
(21, 'imagen121.jpg', 'Sant Cugat', 22),
(22, 'imagen983.jpg', 'Sant Cugat', 32),
(23, 'imagen977.jpg', 'Sant Cugat', 39),
(24, 'imagen1363.jpg', 'Murcia', 28),
(25, 'imagen363.jpg', 'Terrassa', 21),
(26, 'imagen163.jpg', 'Murcia', 48),
(27, 'imagen133.jpg', 'Alicante', 28),
(28, 'imagen689.jpg', 'Alicante', 12),
(29, 'imagen348.jpg', 'Alicante', 38),
(30, 'imagen63.jpg', 'Valencia', 7),
(31, 'imagen1243.jpg', 'Cartagena', 23),
(32, 'imagen1964.jpg', 'Madrid', 7),
(33, 'imagen1252.jpg', 'Madrid', 12),
(34, 'imagen456.jpg', 'Madrid', 17),
(35, 'imagen1415.jpg', 'Madrid', 3),
(36, 'imagen1414.jpg', 'Madrid', 15),
(37, 'imagen289.jpg', 'Madrid', 22),
(38, 'imagen312.jpg', 'Madrid', 6),
(39, 'imagen203.jpg', 'Madrid', 16),
(40, 'imagen1263.jpg', 'Madrid', 10),
(41, 'imagen127.jpg', 'San Sebastián', 28),
(42, 'imagen1187.jpg', 'San Sebastián', 31),
(43, 'imagen563.jpg', 'Sabadell', 13),
(44, 'imagen1981.jpg', 'Bilbao', 26),
(45, 'imagen1604.jpg', 'Bilbao', 1),
(46, 'imagen1377.jpg', 'Bilbao', 12),
(47, 'imagen283.jpg', 'Bilbao', 9),
(48, 'imagen166.jpg', 'Bilbao', 17),
(49, 'imagen877.jpg', 'Manchester', 3),
(50, 'imagen1107.jpg', 'Manchester', 39),
(51, 'imagen1359.jpg', 'New York', 32),
(52, 'imagen849.jpg', 'New York', 32),
(53, 'imagen1615.jpg', 'New York', 16),
(54, 'imagen784.jpg', 'Valencia', 28),
(55, 'imagen1244.jpg', 'Valencia', 26),
(56, 'imagen1822.jpg', 'Valencia', 27),
(57, 'imagen1863.jpg', 'Sabadell', 49),
(58, 'imagen1595.jpg', 'La Coruña', 8),
(59, 'imagen1108.jpg', 'La Coruña', 21),
(60, 'imagen2363.jpg', 'Sabadell', 10),
(61, 'imagen1373.jpg', 'La Coruña', 15),
(62, 'imagen474.jpg', 'La Coruña', 27),
(63, 'imagen1477.jpg', 'La Coruña', 12),
(64, 'imagen1847.jpg', 'Lima', 48),
(65, 'imagen641.jpg', 'Pamplona', 11),
(66, 'imagen1994.jpg', 'Pamplona', 36),
(67, 'imagen845.jpg', 'Pamplona', 30),
(68, 'imagen1161.jpg', 'Pamplona', 38),
(69, 'imagen1386.jpg', 'Pamplona', 20),
(70, 'imagen1073.jpg', 'Pamplona', 8),
(71, 'imagen893.jpg', 'Pamplona', 21),
(72, 'imagen1768.jpg', 'Pamplona', 31),
(73, 'imagen1778.jpg', 'Pamplona', 28),
(74, 'imagen4363.jpg', 'Sabadell', 40),
(75, 'imagen1302.jpg', 'Pamplona', 36),
(76, 'imagen3.jpg', 'Sabadell', 38),
(77, 'imagen1.jpg', 'Sabadell', 48),
(78, 'imagen1987.jpg', 'Sant Quirze', 47),
(79, 'imagen1599.jpg', 'Sant Quirze', 35),
(80, 'imagen433.jpg', 'Sabadell', 42),
(81, 'imagen59.jpg', 'Sant Quirze', 23),
(82, 'imagen1144.jpg', 'Barcelona', 31),
(83, 'imagen1243.jpg', 'Barcelona', 4),
(84, 'imagen497.jpg', 'Terrassa', 11),
(85, 'imagen685.jpg', 'Barcelona', 6),
(86, 'imagen284.jpg', 'Pamplona', 3),
(87, 'imagen730.jpg', 'Barcelona', 34),
(88, 'imagen1873.jpg', 'Irún', 18),
(89, 'imagen364.jpg', 'Barcelona', 8),
(90, 'imagen1442.jpg', 'El Bierzo', 2),
(91, 'imagen342.jpg', 'Barcelona', 35),
(92, 'imagen4443.jpg', 'Sant Quirze', 25),
(93, 'imagen2222.jpg', 'Barcelona', 15),
(94, 'imagen1212.jpg', 'Sant Cugat', 25),
(95, 'imagen45.jpg', 'Sant Celoni', 22),
(96, 'imagen544.jpg', 'Sant Celoni', 5),
(97, 'imagen345.jpg', 'Barcelona', 7),
(98, 'imagen234.jpg', 'Manresa', 3),
(99, 'imagen654.jpg', 'Sallent', 4),
(100, 'imagen4342.jpg', 'Barcelona', 1);

INSERT INTO usuarios
(usuario,clave,nombre,apellido1,apellido2,poblacion,cp,privilegio,administrador,email,imagen,bloqueado)
VALUES  
('admin',md5(1234),'Administrador','CIFO','','Sabadell','08205',1000,'1','admin@gmail.com','','0'),
('supervisor',md5(1234),'Supervisor','CIFO','','Sabadell','08205',500,'0','supervisor@gmail.com','','0'),
('pepe',md5(1234),'Pepe','Blas','López','Sabadell','08205',0,'0','pepe@gmail.com','','0');