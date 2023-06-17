CREATE TABLE usuarios(
idUsuario INT(100) AUTO_INCREMENT,
nombre VARCHAR(20) NOT NULL,
email VARCHAR(30) NOT NULL,
contrasenia VARCHAR(15) NOT NULL,
telefono INT(10) NOT NULL,
fecha_nac DATE NOT NULL,
PRIMARY KEY(idUsuario));


CREATE TABLE eventos(
idEventos INT(100) AUTO_INCREMENT,
tipo VARCHAR(15) NOT NULL,
localidad VARCHAR(25) NOT NULL,
calle VARCHAR(35) NOT NULL,
fecha DATE NOT NULL,
hora TIME NOT NULL,
descripcion VARCHAR(300) NOT NULL,
idUsuario INT(100) NOT NULL,
PRIMARY KEY (idEventos),
CONSTRAINT fk_idUsuario FOREIGN KEY (idUsuario) REFERENCES usuarios (idUsuario));


DROP TABLE eventos
SELECT * FROM usuarios
SELECT * FROM eventos