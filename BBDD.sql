-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2021 a las 01:26:43
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
(35, '2021-01-14', '2022-01-09', 39, 3, 'Admin@admin.com', 'Paypal');

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
  `rating` int(11) NOT NULL,
  `rutaVideo` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rutaTrailer` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `rutaImg` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `año` int(4) DEFAULT NULL,
  `rutaImgPromo` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fechaActualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `peliculasseries`
--

INSERT INTO `peliculasseries` (`idPeliculasSeries`, `nombre`, `descripcion`, `director`, `actores`, `categoria`, `votos`, `numeroVotos`, `rating`, `rutaVideo`, `rutaTrailer`, `rutaImg`, `tipo`, `año`, `rutaImgPromo`, `fechaActualizacion`) VALUES
(1, '1917', 'Nos encontramos en el año 1917. La Guerra Mundial amenazaba con cambiar, para siempre, el orden mundial. Ante la amenaza que se cernía, Estados Unidos decidió entrar en el conflicto con el objetivo de desequilibrar la balanza que caracterizaba a la contienda.', ' Sam Mendes', 'George MacKay,Dean-Charles Chapman,Mark Strong', 'Drama,Guerra,Acción', 11, 3, 4, '/video/peliculas/1917/video.mp4', '/video/peliculas/1917/trailer.mp4', '/img/peliculas/1917/Cartel.jpg', 'pelicula', 2019, '/img/peliculas/1917/promo.jpg', '2020-12-07'),
(2, 'Avatar', 'Año 2154. Jake Sully, un ex-marine condenado a vivir en una silla de ruedas, sigue siendo un auténtico guerrero. Por ello ha sido designado para ir a Pandora, donde algunas empresas están extrayendo un mineral extraño que podría resolver la crisis energética de la Tierra. Para contrarrestar la toxicidad de la atmósfera de Pandora, ......', 'James Cameron', 'Sam Worthington,CCH Pounder,Zoe Saldana', 'Sci-Fi,Aventura,Acción', 8, 3, 3, '/video/peliculas/Avatar/Video.mp4', '/video/peliculas/Avatar/Trailer.mp4', '/img/peliculas/Avatar/Cartel.jpg', 'pelicula', 2009, '/img/peliculas/Avatar/Promo.jpg', '2020-12-01'),
(3, 'Vengadores Endgame', 'Después de los eventos devastadores de Vengadores: Infinity War, el universo está en ruinas debido a las acciones de Thanos. Con la ayuda de los aliados que quedaron, los Vengadores deberán reunirse una vez más para intentar deshacer sus acciones y restaurar el orden en el universo de una vez por todas, sin importar cuáles sean las c...', ' Anthony Russo', 'Greg Tiffan,Lauren Young,Daniela Gaskie, Chris Hemsworth,Scarlett Johansson,Brie Larson', 'Sci-Fi,Aventura,Acción', 11, 3, 4, '/video/peliculas/Vengadores-Endgame/Video.mp4', '/video/peliculas/Vengadores-Endgame/Trailer.mp4', '/img/peliculas/Vengadores-Endgame/Cartel.jpg', 'pelicula', 2019, '/img/peliculas/Vengadores-Endgame/Promo.jpg', '2020-12-06'),
(4, 'Aves de presa', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas Canario Negro, Cazadora y Renée Montoya unen sus fuerzas para salvar a una niña del malvado rey del crimen, Máscara Negra.', ' Cathy Yan', 'Ali Wong,Margot Robbie,Jurnee Smollett', 'Crimen,Comedia,Acción', 3, 1, 3, '/video/peliculas/Aves-de-presa/Video.mp4', '/video/peliculas/Aves-de-presa/Trailer.mp4', '/img/peliculas/Aves-de-presa/cartel.jpg', 'pelicula', 2020, '/img/peliculas/Aves-de-presa/promo.jpg', '2020-12-03'),
(5, 'Capitana Marvel', 'La historia sigue a Carol Danvers mientras se convierte en uno de los héroes más poderosos del universo, cuando la Tierra se encuentra atrapada en medio de una guerra galáctica entre dos razas alienígenas. Situada en los años 90,Capitana Marvel es una historia nueva de un período de tiempo nunca antes visto en la historia del Univer...', ' Ryan Fleck', 'Adam Hart,Gastón Dalmau,Brie Larson', 'Sci-Fi,Aventura,Acción', 4, 1, 4, '/video/peliculas/Capitana-Marvel/video.mp4', '/video/peliculas/Capitana-Marvel/trailer.mp4', '/img/peliculas/Capitana-Marvel/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Capitana-Marvel/promo.jpeg', '2020-12-04'),
(6, 'Cuestión de justicia', 'Cuenta la historia real del joven abogado Bryan Stevenson y de su histórica batalla por la justicia. Después de licenciarse en Harvard, Bryan recibe ofertas de trabajo muy lucrativas. Pero él prefiere poner rumbo a Alabama para defender a personas que han sido condenadas erróneamente o que carecían de recursos para tener una r...', 'Destin Daniel Cretton', 'Michael B. Jordan,Jamie Foxx,Brie Larson', 'Drama,Crimen,Historia', 4, 1, 4, '/video/peliculas/Cuestión-de-justicia/video.mp4', '/video/peliculas/Cuestión-de-justicia/trailer.mp4', '/img/peliculas/Cuestión-de-justicia/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Cuestión-de-justicia/promo.jpg', '2020-12-05'),
(7, 'Hobbs and Shaw', 'Desde que Hobbs, agente del Servicio de Seguridad Diplomática de Estados Unidos, y el británico Shaw, proscrito sin ley, se enfrentaron por primera vez, solo han intercambiado bofetadas y malas palabras. Pero cuando las despiadadas acciones de Brixton, un anarquista cibergenéticamente mejorado, amenazan el futuro de la humanidad, ambos...', ' David Leitch', ' Dwayne Johnson,Jason Statham,Idris Elba', 'Drama,Crimen,Aventura', 3, 1, 3, '/video/peliculas/Hobbs-and-Shaw/video.mp4', '/video/peliculas/Hobbs-and-Shaw/trailer.mp4', '/img/peliculas/Hobbs-and-Shaw/trailer.jpg', 'pelicula', 2019, '/img/peliculas/Hobbs-and-Shaw/promo.jpg', '2020-12-03'),
(8, 'Géminis', 'Henry Bogan, un asesino a sueldo, pretende retirarse porque se siente viejo. Sin embargo, hay alguien que no está dispuesto a permitírselo porque tiene la misión de matarlo: un clon suyo más joven, más rápido y más fuerte.', 'Ang Lee', 'Will Smith,Mary Elizabeth Winstead,Clive Owen', 'Drama,Acción,Sci-Fi', 1, 3, 0, '/video/peliculas/Géminis/video.mp4', '/video/peliculas/Géminis/trailer.mp4', '/img/peliculas/Géminis/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Géminis/promo.jpg', '2020-12-07'),
(9, 'Geostorm', 'Un ingeniero diseñador de satélites, tras un fallo en cadena de la mayor parte de los satélites meteorológicos de la Tierra, deberá formar equipo con su hermano, con quien hace años que no se habla, para viajar al espacio y salvar al planeta de una tormenta artificial de proporciones épicas... todo ello mientras en la superficie del pl...', 'Dean Devlin', 'Katheryn Winnick,Robert Sheehan,Jodi Lyn Brockton', 'Sci-Fi,Acción,Suspense', 2, 1, 2, '/video/peliculas/Geostorm/video.mp4', '/video/peliculas/Geostorm/trailer.mp4', '/img/peliculas/Geostorm/cartel.jpg', 'pelicula', 2017, '/img/peliculas/Geostorm/promo.jpg', '2020-12-01'),
(10, 'Glass', 'Cristal sigue los pasos de David Dunn en su búsqueda de la figura superhumana de La Bestia. En la sombra, Elijah Price parece emerger como una figura clave que conoce los secretos de ambos.', 'M Night Shyamalan', ' James McAvoy,Bruce Willis,Samuel L. Jackson', 'Misterio,Sci-Fi,Drama', 6, 2, 3, '/video/peliculas/Glass/video.mp4', '/video/peliculas/Glass/trailer.mp4', '/img/peliculas/Glass/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Glass/promo.jpg', '2020-11-02'),
(11, 'Greyhound', 'Durante los primeros días de la participación de Estados Unidos en la Segunda Guerra Mundial, un convoy internacional de 37 barcos aliados, encabezado por el comandante Ernest Krause, cruza el Atlántico Norte mientras es perseguido por submarinos alemanes.', 'Aaron Schneider', 'Tom Hanks,Elisabeth Shue,Matt Helm', 'Drama,Guerra,Acción', 5, 1, 5, '/video/peliculas/Greyhound/video.mp4', '/video/peliculas/Greyhound/trailer.mp4', '/img/peliculas/Greyhound/cartel.jpg', 'pelicula', 2020, '/img/peliculas/Greyhound/promo.jpg', '2020-11-23'),
(12, 'Interstellar', 'Narra las aventuras de un grupo de exploradores que hacen uso de un agujero de gusano recientemente descubierto para superar las limitaciones de los viajes espaciales tripulados y vencer las inmensas distancias que tiene un viaje interestelar.', 'Christopher Nolan', 'Matthew McConaughey,Jessica Chastain,Anne Hathaway', 'Sci-Fi,Aventura,Drama', 14, 3, 5, '/video/peliculas/Interstellar/video.mp4', '/video/peliculas/Interstellar/trailer.mp4', '/img/peliculas/Interstellar/cartel.jpg', 'pelicula', 2014, '/img/peliculas/Interstellar/promo.jpg', '2020-11-23'),
(13, 'It Capítulo 2', 'Han pasado casi 30 años desde que el Club de los Perdedores, formado por Bill, Beverly, Richie, Ben, Eddie, Mike y Stanley, se enfrentaran al macabro y despiadado Pennywise. En cuanto tuvieron oportunidad, abandonaron el pueblo de Derry, en el estado de Maine, que tantos problemas les había ocasionado.', ' Andy Muschietti', 'Stephen King,Taylor Marie Frey,Jessica Chastain', 'Terror,Drama,Fantasía', 7, 3, 2, '/video/peliculas/It-Capítulo-2/video.mp4', '/video/peliculas/It-Capítulo-2/trailer.mp4', '/img/peliculas/It-Capítulo-2/cartel.jpg', 'pelicula', 2019, '/img/peliculas/It-Capítulo-2/promo.jpg', '2020-11-03'),
(14, 'John Wick Capítulo 3 Parabellum', 'John Wick regresa a la acción, solo que esta vez con una recompensa de 14 millones de dólares sobre su cabeza y con un ejército de mercenarios intentando darle caza. Tras asesinar a uno de los miembros del gremio de asesinos al que pertenecía, Wick es expulsado de la organización, pasando a convertirse en el centro de at...', 'Chad Stahelski', 'Keanu Reeves,Common,Halle Berry', 'Crimen,Acción,Suspense', 10, 2, 5, '/video/peliculas/John-Wick-Capítulo-3-Parabellum/video.mp4', '/video/peliculas/John-Wick-Capítulo-3-Parabellum/trailer.mp4', '/img/peliculas/John-Wick-Capítulo-3-Parabellum/johnWick3_cartel.jpg', 'pelicula', 2019, '/img/peliculas/John-Wick-Capítulo-3-Parabellum/johnWick3_promo.jpg', '2020-12-19'),
(15, 'Jojo Rabbit', 'Jojo Rabbit es un niño viviendo en plena 2ª Guerra Mundial. Su única vía de escape es su amigo imaginario, una versión de Hitler étnicamente incorrecta que incita los ciegos ideales patrióticos del niño. Todo esto cambia cuando descubre que su madre Rosie está escondiendo a una joven judía en su ático.', 'Taika Waititi', ' Thomasin McKenzie,Roman Griffin Davis,Taika Waititi', 'Drama,Guerra,Comedia', 2, 1, 2, '/video/peliculas/Jojo-Rabbit/video.mp4', '/video/peliculas/Jojo-Rabbit/trailer.mp4', '/img/peliculas/Jojo-Rabbit/JojoRabbit_cartel.jpg', 'pelicula', 2019, '/img/peliculas/Jojo-Rabbit/JojoRabbit_promo.jpg', '2020-12-06'),
(16, 'Joker', 'Arthur Fleck es un hombre ignorado por la sociedad, cuya motivación en la vida es hacer reír. Pero una serie de trágicos acontecimientos le llevarán a ver el mundo de otra forma. Película basada en Joker, el popular personaje de DC Comics y archivillano de Batman, pero que en este film toma un cariz más realista y oscuro.', 'Todd Phillips', 'Joaquin Phoenix,Zazie Beetz,Brett Cullen', 'Cimen,Fantasía,Suspense', 19, 4, 5, '/video/peliculas/Joker/video.mp4', '/video/peliculas/Joker/trailer.mp4', '/img/peliculas/Joker/joker_cartel.jpg', 'pelicula', 2019, '/img/peliculas/Joker/joker_promo.jpeg', '2020-10-11'),
(17, 'Historia de un matrimonio', 'Un director de teatro y su mujer, actriz, luchan por superar un divorcio que les lleva al extremo tanto en lo personal como en lo creativo. Además de aprender a convivir para lograr una estabilidad en la vida de su pequeño hijo.', 'Noah Baumbach', 'Mark O Brien,Adam Driver,Scarlett Johansson', 'Drama,Comedia,Romance', 2, 2, 1, '/video/peliculas/Historia-de-un-matrimonio/video.mp4', '/video/peliculas/Historia-de-un-matrimonio/trailer.mp4', '/img/peliculas/Historia-de-un-matrimonio/marriagestory_cartel.jpg', 'pelicula', 2019, '/img/peliculas/Historia-de-un-matrimonio/marriagestory_promo.jpg', '2020-07-12'),
(18, 'Men in Black International', 'Los Hombres de Negro siempre han protegido a la Tierra de la escoria del universo. Ahora deben abordar su mayor amenaza hasta la fecha: un infiltrado dentro de la organización.', ' F. Gary Gray', ' Chris Hemsworth,Les Twins,Rebecca Ferguson', 'Sci-Fi,Comedia,Aventura', 7, 3, 2, '/video/peliculas/Men-in-Black-International/video.mp4', '/video/peliculas/Men-in-Black-International/trailer.mp4', '/img/peliculas/Men-in-Black-International/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Men-in-Black-International/promo.jpg', '2020-10-04'),
(19, 'Mulán', 'El emperador de China emite un decreto para reclutar a un varón por cada familia que deberá servir en el ejército imperial para defender al país de los invasores del norte. Hua Mulán, hija única de un condecorado guerrero, se presenta para evitar que su anciano padre sea llamado a filas. Se hace pasar por un hombre, Hua Jun y se somete...', ' Niki Caro', ' Jet Li,Gong Li,Liu Yifei', 'Drama,Aventura', 0, 1, 0, '/video/peliculas/Mulán/video.mp4', '/video/peliculas/Mulán/trailer.mp4', '/img/peliculas/Mulán/cartel.jpg', 'pelicula', 2020, '/img/peliculas/Mulán/promo.jpg', '2019-12-02'),
(20, 'Parásitos', 'Tanto Gi Taek como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo, empieza a recibir clases particulares en casa de Park, las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, comienzan una interrelación de resultados imprevisibles.', ' Bong Joon-ho', 'Lee Jung-eun,Choi Woo-shik,Park So-dam', 'Drama,Comedia,Suspense', 5, 1, 5, '/video/peliculas/Parásitos/video.mp4', '/video/peliculas/Parásitos/trailer.mp4', '/img/peliculas/Parásitos/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Parásitos/promo.jpg', '2020-09-14'),
(21, 'El Rey León', 'Simba es el hijo del rey de los leones, Mufasa, y heredero de todo el reino. Pero cuando su padre es brutalmente asesinado por su tío Scar, decidirá huir, dejando vía libre para que su tío tome el puesto de su padre como líder de la manada. En su camino, Simba se encuentra con el suricato Timón y el jabalí Pumba, que le enseñarán a vi..', ' Jon Favreau', ' Hugh Jackman,Beyoncé,James Earl Jones', 'Drama,Aventura,Animación', 8, 3, 3, '/video/peliculas/El-Rey-León/video.mp4', '/video/peliculas/El-Rey-León/trailer.mp4', '/img/peliculas/El-Rey-León/cartel.jpg', 'pelicula', 2019, '/img/peliculas/El-Rey-León/promo.jpg', '2020-10-11'),
(22, 'Proyecto Rampage', 'Davis Okoye es un especialista en primates de reconocido prestigio que mantiene un vínculo muy importante con un singular gorila albino llamado George, un animal que posee una inteligencia extraordinaria y al que lleva cuidando desde su nacimiento. Cuando este gorila es víctima de una peligrosa modificación genética, su ADN mutará rápi...', ' Brad Peyton', ' Dwayne Johnson,Naomie Harris,Malin Åkerman', 'Aventura,Acción,Fantasía', 10, 4, 3, '/video/peliculas/Proyecto-Rampage/video.mp4', '/video/peliculas/Proyecto-Rampage/trailer.mp4', '/img/peliculas/Proyecto-Rampage/cartel.jpg', 'pelicula', 2018, '/img/peliculas/Proyecto-Rampage/promo.jpg', '2020-10-05'),
(23, 'Sonic', 'Sonic, el descarado erizo azul basado en la famosa serie de videojuegos de Sega, vivirá aventuras y desventuras cuando conoce a su amigo humano y policía, Tom Wachowski (James Marsden). Sonic y Tom unirán sus fuerzas para tratar de detener los planes del malvado Dr. Robotnik (Jim Carrey), que intenta atrapar a Sonic con el fin de emple..', ' Jeff Fowler', ' ????? ?????,Cyrill Geshev,Ben Schwartz', 'Animación,Aventura,Comedia', 2, 1, 2, '/video/peliculas/Sonic/video.mp4', '/video/peliculas/Sonic/trailer.mp4', '/img/peliculas/Sonic/cartel.jpg', 'pelicula', 2020, '/img/peliculas/Sonic/promo.jpeg', '2020-10-05'),
(24, 'Tenet', 'Armado solamente con una palabra, Tenet, el protagonista deberá luchar por la supervivencia del mundo entero y evitar la Tercera Guerra Mundial, en una historia de espionaje internacional. La misión se desplegará más allá del tiempo real. No son viajes en el tiempo, es inversión.', ' Christopher Nolan', 'John David Washington,Robert Pattinson,Elizabeth Debicki', 'Sci-Fi,Acción,Suspense', 4, 1, 4, '/video/peliculas/Tenet/video.mp4', '/video/peliculas/Tenet/trailer.mp4', '/img/peliculas/Tenet/cartel.jpg', 'pelicula', 2020, '/img/peliculas/Tenet/promo.jpg', '2020-10-04'),
(25, 'Terminator destino oscuro', 'Sarah Connor une todas sus fuerzas con una mujer cyborg para proteger a una joven de un extremadamente poderoso y nuevo Terminator.', ' Tim Miller', ' Mackenzie Davis,Arnold Schwarzenegger,Linda Hamilton', 'Sci-Fi,Aventura,Acción', 3, 2, 2, '/video/peliculas/Terminator-destino-oscuro/video.mp4', '/video/peliculas/Terminator-destino-oscuro/trailer.mp4', '/img/peliculas/Terminator-destino-oscuro/cartel.jpg', 'pelicula', 2019, '/img/peliculas/Terminator-destino-oscuro/promo.jpeg', '2020-10-19'),
(26, 'El rey del barrio', 'Scott ha sido un caso de desarrollo arrestado desde que su padre bombero murió cuando él tenía siete años. Ahora ha alcanzado la mitad de sus 20 años y ha logrado poco, persiguiendo el sueño de convertirse en un artista del tatuaje que parece estar fuera de su alcance. Mientras su ambiciosa hermana menor se va a la universidad, Scott t...', ' Judd Apatow', 'Jimmy Tatro,Pete Davidson,Bel Powley', 'Drama,Comedia', 2, 1, 2, '/video/peliculas/El-rey-del-barrio/video.mp4', '/video/peliculas/El-rey-del-barrio/trailer.mp4', '/img/peliculas/El-rey-del-barrio/cartel.jpg', 'pelicula', 2020, '/img/peliculas/El-rey-del-barrio/promo.jpg', '2020-09-02'),
(27, 'El lobo de Wall Street', 'Película basada en hechos reales del corredor de bolsa neoyorquino Jordan Belfort. A mediados de los años 80, Belfort era un joven honrado que perseguía el sueño americano, pero pronto en la agencia de valores aprendió que lo más importante no era hacer ganar a sus clientes, sino ser ambicioso y ganar una buena comisión. Su enorme éxit..', ' Martin Scorsese', 'Leonardo DiCaprio,Gregory Brown,Jonah Hill', 'Drama,Crimen,Comedia', 7, 2, 4, '/video/peliculas/El-lobo-de-Wall-Street/video.mp4', '/video/peliculas/El-lobo-de-Wall-Street/trailer.mp4', '/img/peliculas/El-lobo-de-Wall-Street/cartel.jpg', 'pelicula', 2013, '/img/peliculas/El-lobo-de-Wall-Street/promo.jpg', '2020-10-20'),
(28, 'Venom', 'Eddie Brock es un consolidado periodista y astuto reportero que está investigando una empresa llamada Fundación Vida. Esta fundación, dirigida por el eminente científico Carlton Drake, está ejecutando secretamente experimentos ilegales en seres humanos y realizando pruebas que involucran formas de vida extraterr...', 'Ruben Fleischer', ' John Lobato,Chris Ward,Paul Barlow Jr, Tom Hardy', 'Sci-Fi,Acción', 14, 4, 4, '/video/peliculas/Venom/video.mp4', '/video/peliculas/Venom/trailer.mp4', '/img/peliculas/Venom/cartel.jpg', 'pelicula', 2018, '/img/peliculas/Venom/promo.jpg', '2020-11-04'),
(29, 'Juego de tronos', 'En una tierra donde los veranos duran décadas y los inviernos pueden durar toda una vida, los problemas acechan. Desde las maquinaciones del sur a las salvajes tierras del este, pasando por el helado norte y el milenario muro que protege el reino de las fuerzas tenebrosas, dos poderosas familias mantienen un enfrentamiento letal por go...', 'David Benioff,DB Weiss', 'Ian Gelder,Pedro Pascal,Sara Dylan', 'Acción,Aventura,Drama,Misterio', 19, 4, 5, NULL, '/video/series/Juego-de-tronos/trailer.mp4', '/img/series/Juego-de-tronos/cartel.jpeg', 'serie', 2011, '/img/series/Juego-de-tronos/promo.jpg', '2020-11-10'),
(30, 'The Mandalorian', 'Ambientada tras la caída del Imperio y antes de la aparición de la Primera Orden, la serie sigue los pasos de Mando, un cazarrecompensas perteneciente a la legendaria tribu de los Mandalorian, un pistolero solitario que trabaja en los confines de la galaxia, donde no alcanza la autoridad de la Nueva República.', 'Jon Favreau', 'Pedro Pascal,Carl Weathers,Giancarlo Esposito', 'Sci-Fi,Acción,Aventura', 30, 6, 5, NULL, '/video/series/The-Mandalorian/trailer.mp4', '/img/series/The-Mandalorian/cartel.jpg', 'serie', 2019, '/img/series/The-Mandalorian/promo.jpg', '2020-11-09'),
(31, 'Vikingos', 'Sigue las aventuras de Ragnar Lothbrok, el héroe más grande de su época. La serie narra las sagas de la banda de hermanos vikingos de Ragnar y su familia, cuando él se levanta para convertirse en el rey de las tribus vikingas. Además de ser un guerrero valiente, Ragnar encarna las tradiciones nórdicas de la devoción a los dioses, la leyenda dice que él era un descendiente directo de Odín, el dios de la guerra y los guerreros.', 'Michael Hirst', 'Katheryn Winnick,Peter Franzén,Alexander Ludwig', 'Acción,Aventura,Drama', 11, 3, 4, NULL, '/video/series/Vikingos/trailer.mp4', '/img/series/Vikingos/cartel.jpg', 'serie', 2013, '/img/series/Vikingos/promo.jpg', '2020-12-14'),
(32, 'Doctor Who', 'Doctor Who es una serie de televisión británica de ciencia ficción producida por la BBC. El programa muestra las aventuras de un Señor del Tiempo conocido como El Doctor, que explora el universo en su TARDIS, una nave espacial con conciencia propia capaz de viajar a través del tiempo y el espacio. Con la ayuda de distintos acompañantes, el Doctor se enfrenta a una variedad de enemigos mientras salva civilizaciones, visita tanto el pasado como el futuro, ayuda a gente común y corrige injusticias.', 'Sydney Newman,Donald Wilson', 'David Tennant,Jenna Coleman,Karen Gillan', 'Acción,Drama,Sci-Fi ', 14, 3, 5, NULL, '/video/series/Doctor-Who/trailer.mp4', '/img/series/Doctor-Who/cartel.jpg', 'serie', 2005, '/img/series/Doctor-Who/promo.jpg', '2020-10-04'),
(33, 'Las escalofriantes aventuras de Sabrina ', 'La magia y las diabluras se dan la mano cuando Sabrina, mitad humana, mitad bruja, navega por dos mundos: el de los mortales y el de su familia, la Iglesia de la Noche.', 'Roberto Aguirre-Sacasa', 'Kiernan Shipka,Ross Lynch,Lucy Davis', 'Misterio,Sci-Fi ,Drama', 7, 2, 4, NULL, '/video/series/Las-escalofriantes-aventuras-de-Sabrina-/trailer.mp4', '/img/series/Las-escalofriantes-aventuras-de-Sabrina-/cartel.jpg', 'serie', 2018, '/img/series/Las-escalofriantes-aventuras-de-Sabrina-/promo.jpg', '2020-12-01'),
(34, 'The Good Doctor ', 'Un cirujano joven y autista que padece el síndrome del sabio empieza a trabajar en un hospital prestigioso. Allá tendrá que vencer el escepticismo con el que sus colegas lo reciben.', 'David Shore', 'Freddie Highmore,Antonia Thomas,Hill Harper', 'Drama', 12, 3, 4, NULL, '/video/series/The-Good-Doctor-/trailer.mp4', '/img/series/The-Good-Doctor-/cartel.jpg', 'serie', 2017, '/img/series/The-Good-Doctor-/promo.jpg', '2020-08-03'),
(35, 'The Expanse', 'Doscientos años en el futuro, en un sistema solar totalmente colonizado, el detective de la policía Miller, nacido en el Cinturón de Asteroides, es encargado con la misión de encontrar a una joven mujer desaparecida llamada Julie Mao. Acompañando a Miller en su misión se encuentra James Holden, anteriormente primer oficial en un carguero de hielo, y quien estuvo incolucrado en un incidente causado por las tensas relaciones entre la Tierra, Marte y el Cinturón. Pronto, ambos descubrirán que la mu', 'Mark Fergus,Hawk Ostby', 'Steven Strait,Cas Anvar,Dominique Tipper', 'Drama,Misterio,Sci-Fi ', 0, 1, 0, NULL, '/video/series/The-Expanse/trailer.mp4', '/img/series/The-Expanse/cartel.jpg', 'serie', 2015, '/img/series/The-Expanse/promo.jpg', '2020-10-04'),
(36, 'The Gifted', 'En un mundo en el que los humanos con mutaciones son tratados con miedo y falta de confianza, un instituto de mutantes nace para combatir esta situación y lograr la coexistencia pacífica con la humanidad.', 'Matt Nix', 'Stephen Moyer,Amy Acker,Natalie Alyn Lind', 'Acción,Drama,Sci-Fi', 5, 3, 2, NULL, '/video/series/The-Gifted/trailer.mp4', '/img/series/The-Gifted/cartel.jpg', 'serie', 2017, '/img/series/The-Gifted/promo.jpg', '2020-12-15'),
(37, 'Lucifer', 'La serie se centrará en Lucifer (Tom Ellis) quien, aburrido e infeliz como el Señor del Infierno, dimite de su trono y abandona su reino para trasladarse a la ciudad de Los Angeles y abrir un lujoso piano-bar llamado Lux. Una vez allí ayudará a la policía a castigar a los más peligrosos criminales de la ciudad.', 'Tom Kapinos', 'Tom Ellis,Lauren German,Kevin Alejandro', 'Crimen,Sci-Fi ', 3, 1, 3, NULL, '/video/series/Lucifer/trailer.mp4', '/img/series/Lucifer/cartel.jpg', 'serie', 2016, '/img/series/Lucifer/promo.jpg', '2020-12-17'),
(38, 'Fear the Walking Dead ', 'En el seno de una ciudad a la que las personas acuden para escapar, esconder sus secretos y enterrar su pasado, un brote misterioso amenaza con perturbar la poca estabilidad que Madison Clark -asesora escolar de un instituto- y Travis Manawa –profesor de lengua- han conseguido alcanzar.', 'Dave Erickson,Robert Kirkman', 'Alycia Debnam-Carey,Danay García,Colman Domingo', 'Acción,Aventura,Drama', 1, 1, 1, NULL, '/video/series/Fear-the-Walking-Dead-/trailer.mp4', '/img/series/Fear-the-Walking-Dead-/cartel.jpg', 'serie', 2015, '/img/series/Fear-the-Walking-Dead-/promo.jpg', '2020-11-29'),
(39, 'Gambito de dama', 'Kentucky, años 50. En el orfanato, una chica descubre que posee un talento extraordinario para el ajedrez mientras intenta superar una adicción.', 'Scott Frank,Allan Scott', 'Anya Taylor-Joy,Janina Elkin,Matthew Dennis Lewis', 'Drama', 4, 1, 4, NULL, '/video/series/Gambito-de-dama/trailer.mp4', '/img/series/Gambito-de-dama/cartel.jpg', 'serie', 2020, '/img/series/Gambito-de-dama/promo.jpg', '2020-12-17'),
(40, 'Los 100', 'Situada 97 años después de una guerra nuclear que ha destruido la civilización, los supervivientes de una nave espacial, que han sobrevivido durante 3 generaciones en el espacio, envían 100 delincuentes juveniles para testear las condiciones de la Tierra, con la esperanza de eventualmente volver a poblar el planeta. El grupo de jóvenes tratará de sobrevivir en un entorno desconocido y hostil a pesar de las brechas que se abren entre ellos, unos partidarios de seguir en conexión con la nave, otro', 'Jason Rothenberg', 'Eliza Taylor,Marie Avgeropoulos,Lindsey Morgan', 'Sci-Fi,Drama,Acción', 1, 1, 1, NULL, '/video/series/Los-100/trailer.mp4', '/img/series/Los-100/cartel.jpg', 'serie', 2014, '/img/series/Los-100/promo.jpg', '2020-10-12'),
(41, 'Anatomía de Grey', 'La vida de Meredith Grey no es nada fácil. Intenta tomar las riendas de su vida, aunque su trabajo sea de esos que te hacen la vida imposible. Meredith es una cirujana interna de primer año en el Hospital Grace de Seattle, el programa de prácticas más duro de la Facultad de Medicina de Harvard. Y ella lo va a comprobar. Pero no estará sola. Un elenco de compañeros de promoción tendrán que superar la misma prueba. Ahora están en el mundo real, son doctores del hospital. Y en un mundo donde la exp', 'Shonda Rhimes', 'Ellen Pompeo,Justin Chambers,James Pickens Jr.', 'Drama', 13, 3, 4, NULL, '/video/series/Anatomía-de-Grey/trailer.mp4', '/img/series/Anatomía-de-Grey/cartel.jpg', 'serie', 2005, '/img/series/Anatomía-de-Grey/promo.jpg', '2020-11-15'),
(42, 'Rick y Morty', 'Comedia animada que narra las aventuras de un científico loco Rick Sánchez, que regresa después de 20 años para vivir con su hija, su marido y sus hijos Morty y Summer.', 'Dan Harmon,Justin Roiland', 'Justin Roiland,Spencer Grammer,Chris Parnell', 'Animación,Comedia,Sci-Fi ', 13, 3, 4, NULL, '/video/series/Rick-y-Morty/trailer.mp4', '/img/series/Rick-y-Morty/cartel.jpg', 'serie', 2013, '/img/series/Rick-y-Morty/promo.jpg', '2020-11-01'),
(43, 'The Boys', 'La serie tiene lugar en un mundo en el que los superhéroes representan el lado oscuro de la celebridad y la fama. Un grupo de vigilantes que se hacen llamar The Boys decide hacer todo lo posible por frenar a los superhéroes que están perjudicando a la sociedad, independientemente de los riesgos que ello conlleva.\r\n', 'Eric Kripke', 'Karl Urban,Jack Quaid,Erin Moriarty', 'Sci-Fi,Acción,Aventura', 5, 1, 5, NULL, '/video/series/The-Boys/trailer.mp4', '/img/series/The-Boys/cartel.jpg', 'serie', 2019, '/img/series/The-Boys/promo.jpg', '2020-10-05'),
(44, 'The Blacklist', 'El criminal más buscado del mundo, Thomas Raymond Reddington (James Spader), se entrega misteriosamente y se ofrece a delatar a todos los que alguna vez han colaborado con él. Su única condición: sólo colaborará con Elisabeth King (Megan Boone), una nueva agente del FBI, con quien parece tener alguna conexión que ella desconoce.', 'Jon Bokenkamp', 'James Spader,Megan Boone,Harry Lennix', 'Drama,Crimen,Misterio', 2, 1, 2, NULL, '/video/series/The-Blacklist/trailer.mp4', '/img/series/The-Blacklist/cartel.jpg', 'serie', 2013, '/img/series/The-Blacklist/promo.jpg', '2020-10-04'),
(45, 'La Materia Oscura', 'yra es una huérfana que vive en un universo paralelo en el que la ciencia, la teología y la magia están entrelazadas. La búsqueda de Lyra de un amigo secuestrado descubre un siniestro complot que involucra a niños robados, y se convierte en una búsqueda para comprender un fenómeno misterioso llamado Dust. Más tarde, en su viaje, se une a Will, un niño que posee un cuchillo que puede cortar ventanas entre mundos. A medida que Lyra se entera de la verdad sobre sus padres y su destino profetizado, ', 'Will Keen', 'Dafne Keen,Ruth Wilson,Ariyon Bakare', 'Drama,Sci-Fi', 3, 1, 3, NULL, '/video/series/La-Materia-Oscura/trailer.mp4', '/img/series/La-Materia-Oscura/cartel.jpg', 'serie', 2019, '/img/series/La-Materia-Oscura/promo.jpg', '2020-10-04'),
(46, 'Bones', 'Una antropóloga forense y un engreído agente del FBI forman equipo para investigar las causas de los homicidios que investigan.', 'Hart Hanson', 'Emily Deschanel,David Boreanaz,Michaela Conlin', 'Crimen,Drama', 1, 1, 1, NULL, '/video/series/Bones/trailer.mp4', '/img/series/Bones/cartel.jpg', 'serie', 2005, '/img/series/Bones/promo.jpg', '2020-10-04'),
(47, 'Smallville', 'Serie que narra los inicios de Superman -Clark Kent- en su pueblo natal, Smallville. Allí vivía con sus padres, estudiaba en el instituto local y conoció a su primera novia, Lana Lang, y a su futuro rival, Lex Luthor.', 'Miles Millar', 'Tom Welling,Tom Welling,Kristin Kreuk', 'Acción,Sci-Fi,Drama', 3, 1, 3, NULL, '/video/series/Smallville/trailer.mp4', '/img/series/Smallville/cartel.jpg', 'serie', 2001, '/img/series/Smallville/promo.jpg', '2020-10-04'),
(48, 'Breaking Bad', 'Tras cumplir 50 años, Walter White (Bryan Cranston), un profesor de química de un instituto de Albuquerque, Nuevo México, se entera de que tiene un cáncer de pulmón incurable. Casado con Skyler (Anna Gunn) y con un hijo discapacitado (RJ Mitte), la brutal noticia lo impulsa a dar un drástico cambio a su vida: decide, con la ayuda de un antiguo alumno (Aaron Paul), fabricar anfetaminas y ponerlas a la venta. Lo que pretende es liberar a su familia de problemas económicos cuando se produzca el fat', 'Vince Gilligan', 'Bryan Cranston,Aaron Paul,Anna Gunn', 'Drama', 7, 2, 4, NULL, '/video/series/Breaking-Bad/trailer.mp4', '/img/series/Breaking-Bad/cartel.jpg', 'serie', 2008, '/img/series/Breaking-Bad/promo.jpg', '2020-10-07'),
(49, 'House', 'House M. D. es un drama médico Estadounidense que se emitió originalmente por la cadena Fox durante ocho temporadas, desde el 16 de noviembre de 2004 al 21 de mayo de 2012. El protagonista de la serie es el Dr. Gregory House, un médico nada convencional, genio, misántropo y adicto a las drogas que dirige un equipo de diagnósticos en el \"Princeton-Plainsboro Teaching Hospital\" (nombre ficticio) en Nueva Jersey.', 'David Shore', 'Hugh Laurie,Omar Epps,Robert Sean Leonard', 'Drama,Comedia,Misterio', 8, 2, 4, NULL, '/video/series/House/trailer.mp4', '/img/series/House/cartel.jpg', 'serie', 2004, '/img/series/House/promo.jpg', '2020-10-13'),
(50, 'Suits', 'Michael Ross se gana la vida sobre la delgada línea de la legalidad. Es un joven con una inteligencia abrumadora, pero las malas compañías con las que se junta en la universidad le hicieron salirse y buscar una opción más vistosa a corto plazo, mejorar su economía. Entre sus triquiñuelas destaca el número de veces que se presenta en nombre de otros a los exámenes de corte de derecho. El azar le acabará situando en el despacho de uno de los abogados más jóvenes y brillantes de Manhattan, Harvey S', 'Aaron Korsh', 'Gabriel Macht,Rick Hoffman,Sarah Rafferty', 'Drama', 1, 1, 1, NULL, '/video/series/Suits/trailer.mp4', '/img/series/Suits/cartel.jpg', 'serie', 2011, '/img/series/Suits/promo.jpg', '2020-10-20'),
(51, 'La Casa de Papel', 'Un enigmático personaje llamado el Profesor planea algo grande: llevar a cabo el mayor atraco de la historia. Para ello recluta una banda de ocho personas que reúnen un único requisito, ninguno tiene nada que perder. Cinco meses de reclusión memorizando cada paso, cada detalle, cada probabilidad… y por fin, once días de encierro en la Fábrica Nacional de Moneda, rodeados de cuerpos de policía y con decenas de rehenes en su poder para saber si su apuesta suicida será todo o nada.', 'Álex Pina', 'Úrsula Corberó,Álvaro Morte,Itziar Ituño', 'Crimen,Drama', 7, 2, 4, NULL, '/video/series/La-Casa-de-Papel/trailer.mp4', '/img/series/La-Casa-de-Papel/cartel.jpg', 'serie', 2017, '/img/series/La-Casa-de-Papel/promo.jpg', '2020-10-28'),
(52, 'Stranger Things', 'A raíz de la desaparición de un niño, un pueblo desvela un misterio relacionado con experimentos secretos, fuerzas sobrenaturales aterradoras y una niña muy extraña.', 'Matt Duffer, Creador  Ross Duffer', 'Winona Ryder,David Harbour,Finn Wolfhard', 'Misterio,Sci-Fi,Drama', 10, 2, 5, NULL, '/video/series/Stranger-Things/trailer.mp4', '/img/series/Stranger-Things/cartel.jpg', 'serie', 2016, '/img/series/Stranger-Things/promo.jpg', '2020-11-17'),
(53, 'Dos hombres y medio', 'Two and a Half Men (conocida como Dos hombres y medio en Iberoamérica) es una comedia de situación estadounidense, protagonizada desde la novena temporada por Jon Cryer y Ashton Kutcher, y anteriormente por Cryer, Charlie Sheen y Angus T. Jones. Two And A Half Men es una comedia sobre hombres, mujeres, citas, divorcios, madres, paternidad de soltero, relaciones entre hermanos, familia, dinero; y lo más importante, el amor. En otras palabras, es una comedia sobre la vida, más específicamente, la ', 'Chuck Lorre', 'Jon Cryer,Conchata Ferrell,Angus T. Jones', 'Comedia', 10, 3, 3, NULL, '/video/series/Dos-hombres-y-medio/trailer.mp4', '/img/series/Dos-hombres-y-medio/cartel.jpg', 'serie', 2003, '/img/series/Dos-hombres-y-medio/promo.jpg', '2020-11-11');

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

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`idTemporadas`, `numero`, `nombre`, `ruta`, `idPeliculasSeries`) VALUES
(13, 1, 'Winter Is Coming', '/video/series/Juego-de-tronos/promo1x1.mp4', 29),
(14, 1, 'The Kingsroad', '/video/series/Juego-de-tronos/promo1x2.mp4', 29),
(15, 2, 'The North Remembers', '/video/series/Juego-de-tronos/promo2x1.mp4', 29),
(16, 3, 'Valar Dohaeris', '/video/series/Juego-de-tronos/promo3x1.mp4', 29),
(17, 3, 'Dark Wings, Dark Words', '/video/series/Juego-de-tronos/promo3x2.mp4', 29),
(18, 1, 'Chapter one', '/video/series/The-Mandalorian/trailer1.mp4', 30),
(19, 1, 'The Child', '/video/series/The-Mandalorian/trailer2.mp4', 30),
(20, 1, 'The Sin', '/video/series/The-Mandalorian/trailer3.mp4', 30),
(21, 1, 'Sanctuary', '/video/series/The-Mandalorian/trailer4.mp4', 30),
(22, 1, 'The Gunslinger', '/video/series/The-Mandalorian/trailer5.mp4', 30),
(23, 1, 'The Prisioner', '/video/series/The-Mandalorian/trailer6.mp4', 30),
(24, 1, 'The Reckoning', '/video/series/The-Mandalorian/trailer7.mp4', 30),
(25, 1, 'Redemption', '/video/series/The-Mandalorian/trailer8.mp4', 30),
(26, 1, 'Paternidad', '/video/series/House/trailer1.mp4', 49),
(27, 1, 'La navaja de Occam', '/video/series/House/trailer2.mp4', 49),
(28, 2, 'Aceptación', '/video/series/House/trailer3.mp4', 49),
(29, 3, 'Sentido', '/video/series/House/trailer4.mp4', 49),
(30, 3, 'Caín y Abel', '/video/series/House/trailer5.mp4', 49),
(31, 1, 'Las Reglas de Juego', '/video/series/The-Boys/trailer1.mp4', 43),
(32, 1, 'Cherry', '/video/series/The-Boys/trailer2.mp4', 43),
(33, 2, 'El tiovivo', '/video/series/The-Boys/trailer3.mp4', 43),
(34, 2, 'Preparación y planificación', '/video/series/The-Boys/trailer4.mp4', 43);

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
(39, 'Admin', ' Admin', 'admin@admin.com', '$2y$10$DOlTdbAhoof5MrZBqOQ9m.YCkf7fYNCgv5x8rRwYImYmSoX0UOIge', 'Null', NULL, 0);

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
  MODIFY `idFacturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `peliculasseries`
--
ALTER TABLE `peliculasseries`
  MODIFY `idPeliculasSeries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `idTemporadas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
