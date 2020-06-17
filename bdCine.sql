
-- Creacion BD
CREATE DATABASE cine;
USE cine;

-- Creación del usuario para acceder a la BD.
CREATE USER 'cine'@'localhost' IDENTIFIED BY 'cine';

GRANT ALL PRIVILEGES ON cine.* TO 'cine'@'localhost';
FLUSH PRIVILEGES;

-- Creación de tablas

CREATE TABLE USUARIO
(
	DNI       VARCHAR (9) NOT NULL,
    Nombre    VARCHAR (20) NOT NULL,
    Apellidos VARCHAR (50) NOT NULL,
    Email     VARCHAR (100) NOT NULL,
    Password  VARCHAR (50) NOT NULL,
    Admin     VARCHAR (1),
    CONSTRAINT PK_USUARIO PRIMARY KEY (DNI)
);

CREATE TABLE PELICULA
(
	IdPelicula   INT NOT NULL AUTO_INCREMENT,
    Año          NUMERIC (4),
    Titulo       VARCHAR (50) NOT NULL,
    Pais         VARCHAR (50),
    Genero       VARCHAR (50),
    Duracion     VARCHAR (20),
    FechaEstreno VARCHAR (10),
    Valoracion   NUMERIC (3,1),
    Sinopsis     VARCHAR (500),
    Enlace       VARCHAR (100),
    CONSTRAINT PK_PELICULA PRIMARY KEY (IdPelicula)
);

CREATE TABLE SALA 
(
	IdSala   VARCHAR (10) NOT NULL,
    Butacas  NUMERIC (3) NOT NULL,
    TipoSala VARCHAR (20) NOT NULL,
    CONSTRAINT PK_SALA PRIMARY KEY (IdSala)
);

CREATE TABLE TARIFA
(
	IdTarifa   INT NOT NULL AUTO_INCREMENT,
    TipoTarifa VARCHAR (100) NOT NULL,
    Precio     NUMERIC (3) NOT NULL,
    CONSTRAINT PK_TARIFA PRIMARY KEY (IdTarifa)
);

CREATE TABLE SESION 
(
	IdSesion        INT NOT NULL AUTO_INCREMENT,
    Fecha           VARCHAR (10) NOT NULL,
    Hora            VARCHAR (5) NOT NULL ,
    ButacasDisp     NUMERIC (3) NOT NULL,
    IdSala     VARCHAR (10) NOT NULL,
    IdTarifa INT NOT NULL,
    IdPelicula INT NOT NULL,
    CONSTRAINT PK_SESION PRIMARY KEY (IdSesion),
    CONSTRAINT FK_SALA_SESION FOREIGN KEY (IdSala)
	REFERENCES SALA (IdSala)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	CONSTRAINT FK_TARIFA_SESION FOREIGN KEY (IdTarifa)
	REFERENCES TARIFA (IdTarifa)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	CONSTRAINT FK_PELICULA_SESION FOREIGN KEY (IdPelicula)
	REFERENCES PELICULA (IdPelicula)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE RESERVA
(
	DNI     VARCHAR (9) NOT NULL,
    IdSesion INT NOT NULL,
    numButacas      NUMERIC (3) NOT NULL,
    CONSTRAINT PK_RESERVA PRIMARY KEY (DNI, IdSesion),
    CONSTRAINT FK_USUARIO_RESERVA FOREIGN KEY (DNI)
	REFERENCES USUARIO (DNI)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	CONSTRAINT FK_SESION_RESERVA FOREIGN KEY (IdSesion)
	REFERENCES SESION (IdSesion)
	ON DELETE CASCADE
	ON UPDATE CASCADE
); 

CREATE TABLE VALORACION
(
	DNI          VARCHAR (9) NOT NULL,
    IdPelicula   INT NOT NULL,
    Puntuacion   NUMERIC (3,1),
    CONSTRAINT PK_VALORACION PRIMARY KEY (DNI, IdPelicula),
    CONSTRAINT FK_USUARIO_VALORACION FOREIGN KEY (DNI)
	REFERENCES USUARIO (DNI)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	CONSTRAINT FK_PELICULA_VALORACION FOREIGN KEY (IdPelicula)
	REFERENCES PELICULA (IdPelicula)
	ON DELETE CASCADE
	ON UPDATE CASCADE

);

-- Inserts --

-- Tabla Usuarios --
INSERT INTO USUARIO (DNI, Nombre, Apellidos, Email, Password, Admin)
VALUES ('99999999A', 'Admin', 'admin', 'admin@mediacines.com', 'admin', 'X');
INSERT INTO USUARIO (DNI, Nombre, Apellidos, Email, Password)
VALUES ('11111111Z', 'Eddy', 'Gonzalez', 'david@gmail.com', 'eddy');
INSERT INTO USUARIO (DNI, Nombre, Apellidos, Email, Password)
VALUES ('88888888B', 'Paula', 'Sánchez', 'paula@gmail.com', 'paula');

-- Tabla Salas --

INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('1', '30', 'Normal');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('2', '30', 'Normal');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('3', '30', 'Normal');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('4', '30', 'Normal');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('5', '30', 'Normal');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('6', '30', '3D');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('7', '30', 'Normal');
INSERT INTO SALA (IdSala, Butacas, TipoSala)
VALUES ('8', '30', 'Normal');

-- Tabla Tarifas --

INSERT INTO TARIFA (TipoTarifa, Precio)
VALUES ('LUNES A JUEVES - ADULTO', 6);
INSERT INTO TARIFA (TipoTarifa, Precio)
VALUES ('LUNES A JUEVES - INFANTIL', 3);
INSERT INTO TARIFA (TipoTarifa, Precio)
VALUES ('FINES DE SEMANA, FESTIVO Y VÍSPERAS DE FESTIVO', 7);
INSERT INTO TARIFA (TipoTarifa, Precio)
VALUES ('MIÉRCOLES "DIA DEL ESPECTADOR"', 4);
INSERT INTO TARIFA (TipoTarifa, Precio)
VALUES ('SOCIOS', 4);

-- Tabla películas --
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'Parásitos', 'Corea del Sur', 'Suspenso/Comedia', '2h 12m', '25/10/2019', 8, 'Tanto Gi Taek como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo, empieza a impartir clases particulares en la adinerada casa de los Park, las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, entablan una relación de resultados imprevisibles.', '../Views/images/parasitos.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'El irlandés', 'Estados Unidos', 'Policíaco/Drama', '3h 30m', '14/11/2019', 7, 'Frank Sheeran, veterano de la Segunda Guerra Mundial, estafador y asesino a sueldo recuerda su participación en el asesinato de Jimmy Hoffa. Uno de los grandes misterios sin resolver del país: la desaparición del legendario sindicalista Jimmy Hoffa. Un gran viaje por los turbios entresijos del crimen organizado: sus mecanismos internos, rivalidades y su conexión con la política.', '../Views/images/el-irlandes.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'Avengers: Endgame', 'Estados Unidos', 'Acción/Ciencia ficción', '3h 2m', '26/04/2019', 9, 'Los Vengadores restantes deben encontrar una manera de recuperar a sus aliados para un enfrentamiento épico con Thanos, el malvado que diezmó el planeta y el universo.', '../Views/images/vengadores-endgame.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'Joker', 'Estados Unidos', 'Policíaco/Drama', '2h 2m', '04/10/2019', 8, 'Arthur Fleck adora hacer reír a la gente, pero su carrera como comediante es un fracaso. El repudio social, la marginación y una serie de trágicos acontecimientos lo conducen por el sendero de la locura y, finalmente, cae en el mundo del crimen.', '../Views/images/joker.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'Toy Story 4', 'Estados Unidos', 'Familiar/Comedia', '1h 40m', '11/06/2019', 7, 'Woody siempre ha tenido claro cuál es su labor en el mundo y cuál es su prioridad: cuidar a su dueño, ya sea Andy o Bonnie. Sin embargo, Woody descubrirá lo grande que puede ser el mundo para un juguete cuando Forky se convierta en su nuevo compañero de habitación. Los juguetes se embarcarán en una aventura de la que no se olvidarán jamás.', '../Views/images/toystory4.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'Star Wars: Episodio IX - El ascenso de Skywalker', 'Canadá', 'Ciencia ficción/Aventura', '2h 22m', '20/12/2019', 8, 'La Resistencia sobreviviente se enfrenta a la Primera Orden, y Rey, Finn, Poe y el resto de los héroes encararán nuevos retos y una batalla final con la sabiduría de las generaciones anteriores.', '../Views/images/starwars9.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'Spider-Man: Lejos de casa', 'Estados Unidos', 'Acción/Comedia', '2h 9m', '28/06/2019', 6, 'Peter Parker decide pasar unas merecidas vacaciones en Europa junto a MJ, Ned y el resto de sus amigos. Sin embargo, Peter debe volver a ponerse el traje de Spider-Man cuando Nick Fury le encomienda una nueva misión: frenar el ataque de unas criaturas que están causando el caos en el continente.', '../Views/images/spiderman-lejoscasa.jpg');
INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace)
VALUES (2019, 'El Hoyo', 'España', 'Ciencia ficción/Suspenso', '1h 34m', '21/02/2019', 6, 'En el futuro, los prisioneros se alojan en celdas verticales, observando cómo los presos de las celdas superiores son alimentados mientras los de abajo mueren de hambre. Una jungla de supervivencia donde solo hay tres tipos de personas: los que están arriba, los que están abajo y los que deciden saltar, incapaces de soportar esa agonía por más tiempo.', '../Views/images/el-hoyo.jpg');

-- Tabla valoraciones --

INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 1, 8);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 2, 7);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 3, 9);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 4, 8);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 5, 7);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 6, 8);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 7, 6);
INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion)
VALUES ('99999999A', 8, 6);

-- Tabla sesion --
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '1', 1, 1);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '1', 1, 1);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '1', 1, 1);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '2', 1, 2);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '2', 1, 2);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '2', 1, 2);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '3', 1, 3);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '3', 1, 3);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '3', 1, 3);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '4', 1, 4);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '4', 1, 4);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '4', 1, 4);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '5', 1, 5);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '5', 1, 5);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '5', 1, 5);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '6', 1, 6);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '6', 1, 6);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '6', 1, 6);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '7', 1, 7);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '7', 1, 7);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '7', 1, 7);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '8:00', '30', '8', 1, 8);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '15:00', '30', '8', 1, 8);
INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula)
VALUES ('20/06/2020', '20:00', '30', '8', 1, 8);


-- Tabla reserva --

INSERT INTO RESERVA (DNI, IdSesion, numButacas)
VALUES ('99999999A', '1', '1');
INSERT INTO RESERVA (DNI, IdSesion, numButacas)
VALUES ('88888888B', '1', '1');
INSERT INTO RESERVA (DNI, IdSesion, numButacas)
VALUES ('11111111Z', '20', '3');