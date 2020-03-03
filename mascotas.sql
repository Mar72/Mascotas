-- Actividad

-- borra la base de datos de la actividad
DROP DATABASE IF EXISTS ej_mascotas;

-- crea la base de datos
CREATE DATABASE IF NOT EXISTS ej_mascotas
   CHARACTER SET = utf8 COLLATE utf8_spanish_ci;
   
-- accede a la base de datos del ejercicio 1
USE ej_mascotas;

-- creación de la tabla usuaris 
CREATE TABLE usuarios(
  id int(11) NOT NULL PRIMARY KEY auto_increment,
  usuario varchar(32) NOT NULL UNIQUE KEY,
  clave varchar(32) NOT NULL,
  nombre varchar(32) NOT NULL,
  apellido1 varchar(32) NOT NULL,
  apellido2 varchar(32) NOT NULL,
  poblacion varchar(32) NOT NULL,
  cp char(5) NOT NULL,
  privilegio int (11) NOT NULL DEFAULT '0',
  administador tinyint(1) NOT NULL DEFAULT '0',
  email varchar(128) NOT NULL,
  imagen varchar(512) DEFAULT NULL, 
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT NULL,
  bloqueado tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB;

CREATE TABLE mascotas (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(64) NOT NULL,
  sexo CHAR(1) NOT NULL,
  biografia TEXT NOT NULL,
  fechaNacimiento DATE NOT NULL,
  fechaFallecimiento DATE NULL,
  idUsuario int(11) NOT NULL,
  idRaza INT(11)
)ENGINE=InnoDB;

CREATE TABLE fotos (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fichero VARCHAR(256) NOT NULL,
  ubicacion VARCHAR(128) NULL,
  idmascota INT(11)
)ENGINE=InnoDB;

CREATE TABLE razas (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(64) NOT NULL,
  descripcion TEXT NOT NULL,
  idTipo INT(11)
)ENGINE=InnoDB;

CREATE TABLE tipos (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(64) NOT NULL,
  descripcion TEXT NOT NULL
)ENGINE=InnoDB;

ALTER TABLE mascotas ADD FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
  ON UPDATE CASCADE ON DELETE RESTRICT;  
  
ALTER TABLE mascotas ADD FOREIGN KEY (idraza) REFERENCES razas(id)
  ON UPDATE CASCADE ON DELETE CASCADE;
  
ALTER TABLE fotos ADD FOREIGN KEY (idmascota) REFERENCES mascotas(id)
  ON UPDATE CASCADE ON DELETE CASCADE;
 
ALTER TABLE razas ADD FOREIGN KEY (idTipo) REFERENCES tipos(id)
  ON UPDATE CASCADE ON DELETE CASCADE; 