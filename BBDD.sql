-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2020 a las 19:49:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `films_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `idFacturacion` int(11) NOT NULL,
  `fechaFacturacion` date NOT NULL,
  `fechaExpiracion` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPrecios` int(11) NOT NULL,
  `nombreFacturacion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`idFacturacion`, `fechaFacturacion`, `fechaExpiracion`, `idUsuario`, `idPrecios`, `nombreFacturacion`, `tipo`) VALUES
(10, '2020-11-22', '2020-10-05', 28, 2, 'Borja_spharta@hotmail.com', 'Paypal'),
(15, '2020-11-22', '2021-11-17', 28, 3, 'Borja_spharta@hotmail.com', 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `milista`
--

CREATE TABLE `milista` (
  `idUsuario` int(11) NOT NULL,
  `idPeliculasSerie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculasseries`
--

CREATE TABLE `peliculasseries` (
  `idPeliculasSeries` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `director` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `actores` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `categoria` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `votos` int(11) NOT NULL,
  `numeroVotos` int(11) NOT NULL,
  `rating` double NOT NULL,
  `rutaVideo` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rutaImg` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `año` int(4) DEFAULT NULL,
  `rutaImgPromo` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fechaActualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `peliculasseries`
--

INSERT INTO `peliculasseries` (`idPeliculasSeries`, `nombre`, `descripcion`, `director`, `actores`, `categoria`, `votos`, `numeroVotos`, `rating`, `rutaVideo`, `rutaImg`, `tipo`, `año`, `rutaImgPromo`, `fechaActualizacion`) VALUES
(3, '1917', '6 de abril de 1917. Mientras un regimiento se reúne para librar una guerra en el territorio enemigo, dos soldados son asignados para correr contra el tiempo y entregar un mensaje que evitará que 1.600 hombres caminen directamente hacia una trampa mortal.', 'Sam Mendes', ' Dean-Charles Chapman, George MacKay, Daniel Mays', 'Drama,Guerra', 0, 0, 0, NULL, '\\img\\peliculas\\1917\\1917_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\1917\\1917_promo.jpg', '0000-00-00'),
(4, 'Vengadores: End Game', 'Después de los devastadores eventos de Vengadores: Infinity War, el universo está en ruinas. Con la ayuda de los aliados restantes, los Vengadores se reúnen una vez más para revertir las acciones de Thanos y restablecer el equilibrio en el universo.', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'Acción,Aventura,Drama', 0, 0, 0, NULL, '\\img\\peliculas\\AvengersEndGame\\AvengersEndGame_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\AvengersEndGame\\AvengersEndGame_promo.jpg', '0000-00-00'),
(5, 'Aves de Presa', 'Después de separarse del Joker, Harley Quinn se une a los superhéroes Black Canary, Huntress y Renee Montoya para salvar a una joven de un malvado señor del crimen.', ' Cathy Yan', ' Margot Robbie, Rosie Perez, Mary Elizabeth Winstead', 'Acción,Aventura,Crimen', 0, 0, 0, NULL, '\\img\\peliculas\\Avesdepresa\\Avesdepresa_cartel.jpg\r\n', 'pelicula', 2020, '\\img\\peliculas\\Avesdepresa\\Avesdepresa_promo.jpg', '0000-00-00'),
(6, 'Glass (Cristal)', 'El guardia de seguridad David Dunn usa sus habilidades sobrenaturales para rastrear a Kevin Wendell Crumb, un hombre perturbado que tiene veinticuatro personalidades.', ' M. Night Shyamalan', ' James McAvoy, Bruce Willis, Samuel L. Jackson ', 'Drama,Thriller,Sci-Fi', 0, 0, 0, NULL, '\\img\\peliculas\\Glass\\Glass_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Glass\\Glass_promo.jpg', '0000-00-00'),
(7, 'John Wick: Parabellum', 'John Wick está huyendo después de matar a un miembro del gremio internacional de asesinos, y con un precio de $ 14 millones en la cabeza, es el blanco de hombres y mujeres asesinos en todas partes.', 'Chad Stahelski', 'Keanu Reeves, Halle Berry, Ian McShane', 'Acción,Crimen,Thriller', 0, 0, 0, NULL, '\\img\\peliculas\\JhonWick3\\johnWick3_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\JhonWick3\\johnWick3_promo.jpg', '0000-00-00'),
(8, 'Jojo Rabbit', 'Un niño del ejército de Hitler descubre que su madre está escondiendo a una niña judía en su casa.', 'Taika Waititi', 'Roman Griffin Davis, Thomasin McKenzie, Scarlett Johansson', 'Comedia,Drama,Guerra', 0, 0, 0, NULL, '\\img\\peliculas\\JojoRabbit\\JojoRabbit_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\JojoRabbit\\JojoRabbit_promo.jpg', '0000-00-00'),
(9, 'Joker', 'En Gotham City, el comediante con problemas mentales Arthur Fleck es ignorado y maltratado por la sociedad. Luego se embarca en una espiral descendente de revolución y crímenes sangrientos. Este camino lo pone cara a cara con su alter ego: el Joker.', 'Todd Phillips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz ', 'Thriller,Drama,Crimen', 0, 0, 0, NULL, '\\img\\peliculas\\Joker\\Joker_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Joker\\joker_promo.jpeg', '0000-00-00'),
(10, 'Historia de un Matrimonio', 'La mirada incisiva y compasiva de Noah Baumbach sobre un matrimonio que se separa y una familia que se mantiene unida.', 'Noah Baumbach', 'Adam Driver, Scarlett Johansson, Julia Greer', 'Drama,Comedia,Romance', 0, 0, 0, NULL, '\\img\\peliculas\\Marriagestory\\Marriagestory_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Marriagestory\\marriagestory_promo.jpg', '0000-00-00'),
(11, 'Mujercitas', 'Jo March reflexiona una y otra vez sobre su vida, contando la amada historia de las hermanas March: cuatro mujeres jóvenes, cada una decidida a vivir la vida en sus propios términos.', ' Greta Gerwig', ' Saoirse Ronan, Emma Watson, Florence Pugh', 'Drama,Romance', 0, 0, 0, NULL, '\\img\\peliculas\\Mujercitas\\Mujercitas_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Mujercitas\\Mujercitas_promo.jpg', '2020-06-10'),
(12, 'Parásitos', 'La codicia y la discriminación de clase amenazan la relación simbiótica recién formada entre la acaudalada familia de Park y el indigente clan Kim.', 'Bong Joon Ho', 'Kang-ho Song, Sun-kyun Lee, Yeo-jeong Jo', 'Comedia,Drama,Thriller', 0, 0, 0, NULL, '\\img\\peliculas\\Parasitos\\Parasitos_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Parasitos\\Parasitos_promo.jpg', '0000-00-00'),
(14, 'Juego de Tronos', 'Nueve familias nobles luchan por el control de las tierras de Poniente, mientras que un antiguo enemigo regresa después de estar inactivo durante milenios.', 'David Benioff, D.B. Weiss', ' Emilia Clarke, Peter Dinklage, Kit Harington', 'Acción,Drama,Aventura', 0, 0, 0, NULL, '\\img\\series\\Juegodetronos\\juegodetronos.jpeg', 'serie', 2011, '\\img\\series\\Juegodetronos\\juegodetronos_promo.jpg', '2020-06-05'),
(15, 'La Casa de Papel', 'Un grupo inusual de ladrones intenta llevar a cabo el robo más perfecto de la historia española: robar 2.400 millones de euros de la Royal Mint de España.', 'Álex Pina', 'Úrsula Corberó, Álvaro Morte, Itziar Ituño ', 'Acción,Crimen,Misterio', 0, 0, 0, NULL, '\\img\\series\\Lacasadepapel\\lacasadepapel.jpg', 'serie', 2017, '\\img\\series\\Lacasadepapel\\lacasadepapel_promo.jpg', '2020-06-07'),
(16, 'Los Simpson', 'Las aventuras satíricas de una familia de clase trabajadora en la ciudad inadaptada de Springfield.', ' James L. Brooks, Matt Groening, Sam Simon', ' Dan Castellaneta, Nancy Cartwright, Harry Shearer', 'Comedia,Animación', 0, 0, 0, NULL, '\\img\\series\\Lossimpson\\lossimpson.jpg', 'serie', 1989, '\\img\\series\\Lossimpson\\lossimpson_promo.jpg', '0000-00-00'),
(19, 'Lost (perdidos)', 'Los sobrevivientes de un accidente aéreo se ven obligados a trabajar juntos para sobrevivir en una isla tropical aparentemente desierta.', ' J.J. Abrams, Jeffrey Lieber, Damon Lindelof', ' Jorge Garcia, Josh Holloway, Yunjin Kim ', 'Aventura,Drama,Fantasia', 0, 0, 0, NULL, '\\img\\series\\Lost\\lost.jpg', 'serie', 2004, '\\img\\series\\Lost\\lost_promo.jpeg', '0000-00-00'),
(20, 'The Mandalorian', 'Los viajes de un solitario cazarrecompensas en los confines de la galaxia, lejos de la autoridad de la Nueva República.', ' Jon Favreau', ' Pedro Pascal, Carl Weathers, Rio Hackford', 'Acción,Aventura,Sci-Fi', 0, 0, 0, NULL, '\\img\\series\\Mandalorian\\mandalorian.jpeg', 'serie', 2019, '\\img\\series\\Mandalorian\\mandalorian_promo.jpg', '0000-00-00'),
(21, 'Peaky Blinders', 'Una épica familia de gángsters ambientada en 1919 en Birmingham, Inglaterra; centrado en una pandilla que cosía cuchillas de afeitar en los picos de sus gorras, y su feroz jefe Tommy Shelby.', ' Steven Knight', ' Cillian Murphy, Paul Anderson, Helen McCrory ', 'Crimen,Drama', 0, 0, 0, NULL, '\\img\\series\\PeakyBlinders\\Peakyblinders.jpg', 'serie', 2013, '\\img\\series\\PeakyBlinders\\peakyblinder_promo.jpeg', '0000-00-00'),
(22, 'Rick y Morty', 'Una serie animada que sigue las hazañas de un súper científico y su nieto no tan brillante.', 'Dan Harmon, Justin Roiland', ' Justin Roiland, Chris Parnell, Spencer Grammer', 'Aventura,Comedia, Animación', 0, 0, 0, NULL, '\\img\\series\\Rickymorty\\rickymorty.jpg', 'serie', 2013, '\\img\\series\\Rickymorty\\rickymorty_promo.jpg', '0000-00-00'),
(23, 'The Magicians', 'Después de ser reclutados para una academia secreta, un grupo de estudiantes descubre que la magia sobre la que leen cuando eran niños es muy real y más peligrosa de lo que alguna vez imaginaron.', 'Sera Gamble, John McNamara', 'Stella Maeve, Hale Appleman, Arjun Gupta', 'Drama,Fantasia,Misterio', 0, 0, 0, NULL, '\\img\\series\\Themagicians\\Themagicians.jpg', 'serie', 2015, '\\img\\series\\Themagicians\\themagicians_promo.jpg', '0000-00-00'),
(24, 'Vikingos', 'Los vikingos nos transportan al mundo brutal y misterioso de Ragnar Lothbrok, un guerrero y granjero vikingo que anhela explorar y atacar las costas distantes a través del océano.', 'Michael Hirst', ' Katheryn Winnick, Gustaf Skarsgård, Alexander Ludwig', 'Accion,Aventura,Drama', 0, 0, 0, NULL, '\\img\\series\\Vikingos\\Vikingos.jpg', 'serie', 2013, '\\img\\series\\Vikingos\\vikingos_promo.jpg', '0000-00-00'),
(25, 'Westworld', 'Ubicado en la intersección del futuro cercano y el pasado reinventado, explore un mundo en el que cada apetito humano se pueda satisfacer sin consecuencias.', 'Lisa Joy, Jonathan Nolan', 'Evan Rachel Wood, Jeffrey Wright, Ed Harris', 'Drama,Misterio,Sci-Fi', 0, 0, 0, NULL, '\\img\\series\\Westworld\\Westworld.jpg', 'serie', 2016, '\\img\\series\\Westworld\\westworld_promo.jpg', '0000-00-00'),
(26, '1917-2', '6 de abril de 1917. Mientras un regimiento se reúne para librar una guerra en el territorio enemigo, dos soldados son asignados para correr contra el tiempo y entregar un mensaje que evitará que 1.600 hombres caminen directamente hacia una trampa mortal.', 'Sam Mendes', ' Dean-Charles Chapman, George MacKay, Daniel Mays', 'Drama,Guerra', 0, 0, 0, NULL, '\\img\\peliculas\\1917\\1917_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\1917\\1917_promo.jpg', '0000-00-00'),
(27, 'Vengadores: End Game-2', 'Después de los devastadores eventos de Vengadores: Infinity War, el universo está en ruinas. Con la ayuda de los aliados restantes, los Vengadores se reúnen una vez más para revertir las acciones de Thanos y restablecer el equilibrio en el universo.', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'Acción,Aventura,Drama', 0, 0, 0, NULL, '\\img\\peliculas\\AvengersEndGame\\AvengersEndGame_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\AvengersEndGame\\AvengersEndGame_promo.jpg', '0000-00-00'),
(28, 'Aves de Presa-2', 'Después de separarse del Joker, Harley Quinn se une a los superhéroes Black Canary, Huntress y Renee Montoya para salvar a una joven de un malvado señor del crimen.', ' Cathy Yan', ' Margot Robbie, Rosie Perez, Mary Elizabeth Winstead', 'Acción,Aventura,Crimen', 0, 0, 0, NULL, '\\img\\peliculas\\Avesdepresa\\Avesdepresa_cartel.jpg\r\n', 'pelicula', 2020, '\\img\\peliculas\\Avesdepresa\\Avesdepresa_promo.jpg', '0000-00-00'),
(29, 'Glass (Cristal)-2', 'El guardia de seguridad David Dunn usa sus habilidades sobrenaturales para rastrear a Kevin Wendell Crumb, un hombre perturbado que tiene veinticuatro personalidades.', ' M. Night Shyamalan', ' James McAvoy, Bruce Willis, Samuel L. Jackson ', 'Drama,Thriller,Sci-Fi', 0, 0, 0, NULL, '\\img\\peliculas\\Glass\\Glass_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Glass\\Glass_promo.jpg', '0000-00-00'),
(30, 'John Wick: Parabellum-2', 'John Wick está huyendo después de matar a un miembro del gremio internacional de asesinos, y con un precio de $ 14 millones en la cabeza, es el blanco de hombres y mujeres asesinos en todas partes.', 'Chad Stahelski', 'Keanu Reeves, Halle Berry, Ian McShane', 'Acción,Crimen,Thriller', 0, 0, 0, NULL, '\\img\\peliculas\\JhonWick3\\johnWick3_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\JhonWick3\\johnWick3_promo.jpg', '0000-00-00'),
(31, 'Jojo Rabbit-2', 'Un niño del ejército de Hitler descubre que su madre está escondiendo a una niña judía en su casa.', 'Taika Waititi', 'Roman Griffin Davis, Thomasin McKenzie, Scarlett Johansson', 'Comedia,Drama,Guerra', 0, 0, 0, NULL, '\\img\\peliculas\\JojoRabbit\\JojoRabbit_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\JojoRabbit\\JojoRabbit_promo.jpg', '0000-00-00'),
(32, 'Joker-2', 'En Gotham City, el comediante con problemas mentales Arthur Fleck es ignorado y maltratado por la sociedad. Luego se embarca en una espiral descendente de revolución y crímenes sangrientos. Este camino lo pone cara a cara con su alter ego: el Joker.', 'Todd Phillips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz ', 'Thriller,Drama,Crimen', 0, 0, 0, NULL, '\\img\\peliculas\\Joker\\Joker_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Joker\\joker_promo.jpeg', '0000-00-00'),
(33, 'Historia de un Matrimonio-2', 'La mirada incisiva y compasiva de Noah Baumbach sobre un matrimonio que se separa y una familia que se mantiene unida.', 'Noah Baumbach', 'Adam Driver, Scarlett Johansson, Julia Greer', 'Drama,Comedia,Romance', 0, 0, 0, NULL, '\\img\\peliculas\\Marriagestory\\Marriagestory_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Marriagestory\\marriagestory_promo.jpg', '0000-00-00'),
(34, 'Mujercitas-2', 'Jo March reflexiona una y otra vez sobre su vida, contando la amada historia de las hermanas March: cuatro mujeres jóvenes, cada una decidida a vivir la vida en sus propios términos.', ' Greta Gerwig', ' Saoirse Ronan, Emma Watson, Florence Pugh', 'Drama,Romance', 0, 0, 0, NULL, '\\img\\peliculas\\Mujercitas\\Mujercitas_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Mujercitas\\Mujercitas_promo.jpg', '2020-06-10'),
(35, 'Parásitos-2', 'La codicia y la discriminación de clase amenazan la relación simbiótica recién formada entre la acaudalada familia de Park y el indigente clan Kim.', 'Bong Joon Ho', 'Kang-ho Song, Sun-kyun Lee, Yeo-jeong Jo', 'Comedia,Drama,Thriller', 0, 0, 0, NULL, '\\img\\peliculas\\Parasitos\\Parasitos_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Parasitos\\Parasitos_promo.jpg', '0000-00-00'),
(36, 'Juego de Tronos-2', 'Nueve familias nobles luchan por el control de las tierras de Poniente, mientras que un antiguo enemigo regresa después de estar inactivo durante milenios.', 'David Benioff, D.B. Weiss', ' Emilia Clarke, Peter Dinklage, Kit Harington', 'Acción,Drama,Aventura', 0, 0, 0, NULL, '\\img\\series\\Juegodetronos\\juegodetronos.jpeg', 'serie', 2011, '\\img\\series\\Juegodetronos\\juegodetronos_promo.jpg', '2020-06-05'),
(37, 'La Casa de Papel-2', 'Un grupo inusual de ladrones intenta llevar a cabo el robo más perfecto de la historia española: robar 2.400 millones de euros de la Royal Mint de España.', 'Álex Pina', 'Úrsula Corberó, Álvaro Morte, Itziar Ituño ', 'Acción,Crimen,Misterio', 0, 0, 0, NULL, '\\img\\series\\Lacasadepapel\\lacasadepapel.jpg', 'serie', 2017, '\\img\\series\\Lacasadepapel\\lacasadepapel_promo.jpg', '2020-06-07'),
(38, 'Los Simpson-2', 'Las aventuras satíricas de una familia de clase trabajadora en la ciudad inadaptada de Springfield.', ' James L. Brooks, Matt Groening, Sam Simon', ' Dan Castellaneta, Nancy Cartwright, Harry Shearer', 'Comedia,Animación', 0, 0, 0, NULL, '\\img\\series\\Lossimpson\\lossimpson.jpg', 'serie', 1989, '\\img\\series\\Lossimpson\\lossimpson_promo.jpg', '0000-00-00'),
(39, 'Lost (perdidos)-2', 'Los sobrevivientes de un accidente aéreo se ven obligados a trabajar juntos para sobrevivir en una isla tropical aparentemente desierta.', ' J.J. Abrams, Jeffrey Lieber, Damon Lindelof', ' Jorge Garcia, Josh Holloway, Yunjin Kim ', 'Aventura,Drama,Fantasia', 0, 0, 0, NULL, '\\img\\series\\Lost\\lost.jpg', 'serie', 2004, '\\img\\series\\Lost\\lost_promo.jpeg', '0000-00-00'),
(40, 'The Mandalorian-2', 'Los viajes de un solitario cazarrecompensas en los confines de la galaxia, lejos de la autoridad de la Nueva República.', ' Jon Favreau', ' Pedro Pascal, Carl Weathers, Rio Hackford', 'Acción,Aventura,Sci-Fi', 0, 0, 0, NULL, '\\img\\series\\Mandalorian\\mandalorian.jpeg', 'serie', 2019, '\\img\\series\\Mandalorian\\mandalorian_promo.jpg', '0000-00-00'),
(41, 'Peaky Blinders-2', 'Una épica familia de gángsters ambientada en 1919 en Birmingham, Inglaterra; centrado en una pandilla que cosía cuchillas de afeitar en los picos de sus gorras, y su feroz jefe Tommy Shelby.', ' Steven Knight', ' Cillian Murphy, Paul Anderson, Helen McCrory ', 'Crimen,Drama', 0, 0, 0, NULL, '\\img\\series\\PeakyBlinders\\Peakyblinders.jpg', 'serie', 2013, '\\img\\series\\PeakyBlinders\\peakyblinder_promo.jpeg', '0000-00-00'),
(42, 'Rick y Morty-2', 'Una serie animada que sigue las hazañas de un súper científico y su nieto no tan brillante.', 'Dan Harmon, Justin Roiland', ' Justin Roiland, Chris Parnell, Spencer Grammer', 'Aventura,Comedia, Animación', 0, 0, 0, NULL, '\\img\\series\\Rickymorty\\rickymorty.jpg', 'serie', 2013, '\\img\\series\\Rickymorty\\rickymorty_promo.jpg', '0000-00-00'),
(43, 'The Magicians-2', 'Después de ser reclutados para una academia secreta, un grupo de estudiantes descubre que la magia sobre la que leen cuando eran niños es muy real y más peligrosa de lo que alguna vez imaginaron.', 'Sera Gamble, John McNamara', 'Stella Maeve, Hale Appleman, Arjun Gupta', 'Drama,Fantasia,Misterio', 0, 0, 0, NULL, '\\img\\series\\Themagicians\\Themagicians.jpg', 'serie', 2015, '\\img\\series\\Themagicians\\themagicians_promo.jpg', '0000-00-00'),
(44, 'Vikingos-2', 'Los vikingos nos transportan al mundo brutal y misterioso de Ragnar Lothbrok, un guerrero y granjero vikingo que anhela explorar y atacar las costas distantes a través del océano.', 'Michael Hirst', ' Katheryn Winnick, Gustaf Skarsgård, Alexander Ludwig', 'Accion,Aventura,Drama', 0, 0, 0, NULL, '\\img\\series\\Vikingos\\Vikingos.jpg', 'serie', 2013, '\\img\\series\\Vikingos\\vikingos_promo.jpg', '0000-00-00'),
(45, 'Westworld-2', 'Ubicado en la intersección del futuro cercano y el pasado reinventado, explore un mundo en el que cada apetito humano se pueda satisfacer sin consecuencias.', 'Lisa Joy, Jonathan Nolan', 'Evan Rachel Wood, Jeffrey Wright, Ed Harris', 'Drama,Misterio,Sci-Fi', 0, 0, 0, NULL, '\\img\\series\\Westworld\\Westworld.jpg', 'serie', 2016, '\\img\\series\\Westworld\\westworld_promo.jpg', '0000-00-00'),
(46, '1917-3', '6 de abril de 1917. Mientras un regimiento se reúne para librar una guerra en el territorio enemigo, dos soldados son asignados para correr contra el tiempo y entregar un mensaje que evitará que 1.600 hombres caminen directamente hacia una trampa mortal.', 'Sam Mendes', ' Dean-Charles Chapman, George MacKay, Daniel Mays', 'Drama,Guerra', 0, 0, 0, NULL, '\\img\\peliculas\\1917\\1917_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\1917\\1917_promo.jpg', '0000-00-00'),
(47, 'Vengadores: End Game-3', 'Después de los devastadores eventos de Vengadores: Infinity War, el universo está en ruinas. Con la ayuda de los aliados restantes, los Vengadores se reúnen una vez más para revertir las acciones de Thanos y restablecer el equilibrio en el universo.', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'Acción,Aventura,Drama', 0, 0, 0, NULL, '\\img\\peliculas\\AvengersEndGame\\AvengersEndGame_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\AvengersEndGame\\AvengersEndGame_promo.jpg', '0000-00-00'),
(48, 'Aves de Presa-3', 'Después de separarse del Joker, Harley Quinn se une a los superhéroes Black Canary, Huntress y Renee Montoya para salvar a una joven de un malvado señor del crimen.', ' Cathy Yan', ' Margot Robbie, Rosie Perez, Mary Elizabeth Winstead', 'Acción,Aventura,Crimen', 0, 0, 0, NULL, '\\img\\peliculas\\Avesdepresa\\Avesdepresa_cartel.jpg\r\n', 'pelicula', 2020, '\\img\\peliculas\\Avesdepresa\\Avesdepresa_promo.jpg', '0000-00-00'),
(49, 'Glass (Cristal)-3', 'El guardia de seguridad David Dunn usa sus habilidades sobrenaturales para rastrear a Kevin Wendell Crumb, un hombre perturbado que tiene veinticuatro personalidades.', ' M. Night Shyamalan', ' James McAvoy, Bruce Willis, Samuel L. Jackson ', 'Drama,Thriller,Sci-Fi', 0, 0, 0, NULL, '\\img\\peliculas\\Glass\\Glass_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Glass\\Glass_promo.jpg', '0000-00-00'),
(50, 'John Wick: Parabellum-3', 'John Wick está huyendo después de matar a un miembro del gremio internacional de asesinos, y con un precio de $ 14 millones en la cabeza, es el blanco de hombres y mujeres asesinos en todas partes.', 'Chad Stahelski', 'Keanu Reeves, Halle Berry, Ian McShane', 'Acción,Crimen,Thriller', 0, 0, 0, NULL, '\\img\\peliculas\\JhonWick3\\johnWick3_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\JhonWick3\\johnWick3_promo.jpg', '0000-00-00'),
(51, 'Jojo Rabbit-3', 'Un niño del ejército de Hitler descubre que su madre está escondiendo a una niña judía en su casa.', 'Taika Waititi', 'Roman Griffin Davis, Thomasin McKenzie, Scarlett Johansson', 'Comedia,Drama,Guerra', 0, 0, 0, NULL, '\\img\\peliculas\\JojoRabbit\\JojoRabbit_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\JojoRabbit\\JojoRabbit_promo.jpg', '0000-00-00'),
(52, 'Joker-3', 'En Gotham City, el comediante con problemas mentales Arthur Fleck es ignorado y maltratado por la sociedad. Luego se embarca en una espiral descendente de revolución y crímenes sangrientos. Este camino lo pone cara a cara con su alter ego: el Joker.', 'Todd Phillips', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz ', 'Thriller,Drama,Crimen', 0, 0, 0, NULL, '\\img\\peliculas\\Joker\\Joker_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Joker\\joker_promo.jpeg', '0000-00-00'),
(53, 'Historia de un Matrimonio-3', 'La mirada incisiva y compasiva de Noah Baumbach sobre un matrimonio que se separa y una familia que se mantiene unida.', 'Noah Baumbach', 'Adam Driver, Scarlett Johansson, Julia Greer', 'Drama,Comedia,Romance', 0, 0, 0, NULL, '\\img\\peliculas\\Marriagestory\\Marriagestory_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Marriagestory\\marriagestory_promo.jpg', '0000-00-00'),
(54, 'Mujercitas-3', 'Jo March reflexiona una y otra vez sobre su vida, contando la amada historia de las hermanas March: cuatro mujeres jóvenes, cada una decidida a vivir la vida en sus propios términos.', ' Greta Gerwig', ' Saoirse Ronan, Emma Watson, Florence Pugh', 'Drama,Romance', 0, 0, 0, NULL, '\\img\\peliculas\\Mujercitas\\Mujercitas_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Mujercitas\\Mujercitas_promo.jpg', '2020-06-10'),
(55, 'Parásitos-3', 'La codicia y la discriminación de clase amenazan la relación simbiótica recién formada entre la acaudalada familia de Park y el indigente clan Kim.', 'Bong Joon Ho', 'Kang-ho Song, Sun-kyun Lee, Yeo-jeong Jo', 'Comedia,Drama,Thriller', 0, 0, 0, NULL, '\\img\\peliculas\\Parasitos\\Parasitos_cartel.jpg', 'pelicula', 2019, '\\img\\peliculas\\Parasitos\\Parasitos_promo.jpg', '0000-00-00'),
(56, 'Juego de Tronos-3', 'Nueve familias nobles luchan por el control de las tierras de Poniente, mientras que un antiguo enemigo regresa después de estar inactivo durante milenios.', 'David Benioff, D.B. Weiss', ' Emilia Clarke, Peter Dinklage, Kit Harington', 'Acción,Drama,Aventura', 0, 0, 0, NULL, '\\img\\series\\Juegodetronos\\juegodetronos.jpeg', 'serie', 2011, '\\img\\series\\Juegodetronos\\juegodetronos_promo.jpg', '2020-06-05'),
(57, 'La Casa de Papel-3', 'Un grupo inusual de ladrones intenta llevar a cabo el robo más perfecto de la historia española: robar 2.400 millones de euros de la Royal Mint de España.', 'Álex Pina', 'Úrsula Corberó, Álvaro Morte, Itziar Ituño ', 'Acción,Crimen,Misterio', 0, 0, 0, NULL, '\\img\\series\\Lacasadepapel\\lacasadepapel.jpg', 'serie', 2017, '\\img\\series\\Lacasadepapel\\lacasadepapel_promo.jpg', '2020-06-07'),
(58, 'Los Simpson-3', 'Las aventuras satíricas de una familia de clase trabajadora en la ciudad inadaptada de Springfield.', ' James L. Brooks, Matt Groening, Sam Simon', ' Dan Castellaneta, Nancy Cartwright, Harry Shearer', 'Comedia,Animación', 0, 0, 0, NULL, '\\img\\series\\Lossimpson\\lossimpson.jpg', 'serie', 1989, '\\img\\series\\Lossimpson\\lossimpson_promo.jpg', '0000-00-00'),
(59, 'Lost (perdidos)-3', 'Los sobrevivientes de un accidente aéreo se ven obligados a trabajar juntos para sobrevivir en una isla tropical aparentemente desierta.', ' J.J. Abrams, Jeffrey Lieber, Damon Lindelof', ' Jorge Garcia, Josh Holloway, Yunjin Kim ', 'Aventura,Drama,Fantasia', 0, 0, 0, NULL, '\\img\\series\\Lost\\lost.jpg', 'serie', 2004, '\\img\\series\\Lost\\lost_promo.jpeg', '0000-00-00'),
(60, 'The Mandalorian-3', 'Los viajes de un solitario cazarrecompensas en los confines de la galaxia, lejos de la autoridad de la Nueva República.', ' Jon Favreau', ' Pedro Pascal, Carl Weathers, Rio Hackford', 'Acción,Aventura,Sci-Fi', 0, 0, 0, NULL, '\\img\\series\\Mandalorian\\mandalorian.jpeg', 'serie', 2019, '\\img\\series\\Mandalorian\\mandalorian_promo.jpg', '0000-00-00'),
(61, 'Peaky Blinders-3', 'Una épica familia de gángsters ambientada en 1919 en Birmingham, Inglaterra; centrado en una pandilla que cosía cuchillas de afeitar en los picos de sus gorras, y su feroz jefe Tommy Shelby.', ' Steven Knight', ' Cillian Murphy, Paul Anderson, Helen McCrory ', 'Crimen,Drama', 0, 0, 0, NULL, '\\img\\series\\PeakyBlinders\\Peakyblinders.jpg', 'serie', 2013, '\\img\\series\\PeakyBlinders\\peakyblinder_promo.jpeg', '0000-00-00'),
(62, 'Rick y Morty-3', 'Una serie animada que sigue las hazañas de un súper científico y su nieto no tan brillante.', 'Dan Harmon, Justin Roiland', ' Justin Roiland, Chris Parnell, Spencer Grammer', 'Aventura,Comedia, Animación', 0, 0, 0, NULL, '\\img\\series\\Rickymorty\\rickymorty.jpg', 'serie', 2013, '\\img\\series\\Rickymorty\\rickymorty_promo.jpg', '0000-00-00'),
(63, 'The Magicians-3', 'Después de ser reclutados para una academia secreta, un grupo de estudiantes descubre que la magia sobre la que leen cuando eran niños es muy real y más peligrosa de lo que alguna vez imaginaron.', 'Sera Gamble, John McNamara', 'Stella Maeve, Hale Appleman, Arjun Gupta', 'Drama,Fantasia,Misterio', 0, 0, 0, NULL, '\\img\\series\\Themagicians\\Themagicians.jpg', 'serie', 2015, '\\img\\series\\Themagicians\\themagicians_promo.jpg', '0000-00-00'),
(64, 'Vikingos-3', 'Los vikingos nos transportan al mundo brutal y misterioso de Ragnar Lothbrok, un guerrero y granjero vikingo que anhela explorar y atacar las costas distantes a través del océano.', 'Michael Hirst', ' Katheryn Winnick, Gustaf Skarsgård, Alexander Ludwig', 'Accion,Aventura,Drama', 0, 0, 0, NULL, '\\img\\series\\Vikingos\\Vikingos.jpg', 'serie', 2013, '\\img\\series\\Vikingos\\vikingos_promo.jpg', '0000-00-00'),
(65, 'Westworld-3', 'Ubicado en la intersección del futuro cercano y el pasado reinventado, explore un mundo en el que cada apetito humano se pueda satisfacer sin consecuencias.', 'Lisa Joy, Jonathan Nolan', 'Evan Rachel Wood, Jeffrey Wright, Ed Harris', 'Drama,Misterio,Sci-Fi', 0, 0, 0, NULL, '\\img\\series\\Westworld\\Westworld.jpg', 'serie', 2016, '\\img\\series\\Westworld\\westworld_promo.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `idPrecios` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`idPrecios`, `tipo`, `precio`) VALUES
(1, 30, 8),
(2, 90, 16),
(3, 360, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `idTemporadas` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ruta` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `idPeliculasSeries` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoUsuario` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `hashpass` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `email`, `hashpass`, `direccion`, `telefono`, `nivel`) VALUES
(28, 'Borja', 'Martin Corcobado', 'borja_spharta@hotmail.com', '$2y$10$/tArXzaj3TkD6YGyv8umlOvl/2FThQf5oGgIJhwft8r5r9Pr/ViMi', 'Benito Perez Galdos 7 2º1', 600603121, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`idFacturacion`),
  ADD KEY `idUsuarios` (`idUsuario`) USING BTREE,
  ADD KEY `idPrecios` (`idPrecios`);

--
-- Indices de la tabla `milista`
--
ALTER TABLE `milista`
  ADD UNIQUE KEY `lista` (`idUsuario`,`idPeliculasSerie`),
  ADD KEY `idPeliculasSerie` (`idPeliculasSerie`);

--
-- Indices de la tabla `peliculasseries`
--
ALTER TABLE `peliculasseries`
  ADD PRIMARY KEY (`idPeliculasSeries`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`idPrecios`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`idTemporadas`),
  ADD KEY `idPeliculasSeries` (`idPeliculasSeries`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `idFacturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `peliculasseries`
--
ALTER TABLE `peliculasseries`
  MODIFY `idPeliculasSeries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `idTemporadas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `idPrecios` FOREIGN KEY (`idPrecios`) REFERENCES `precios` (`idPrecios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `milista`
--
ALTER TABLE `milista`
  ADD CONSTRAINT `milista_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milista_ibfk_2` FOREIGN KEY (`idPeliculasSerie`) REFERENCES `peliculasseries` (`idPeliculasSeries`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD CONSTRAINT `idPeliculasSeries` FOREIGN KEY (`idPeliculasSeries`) REFERENCES `peliculasseries` (`idPeliculasSeries`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
