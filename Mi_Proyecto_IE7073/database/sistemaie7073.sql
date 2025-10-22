-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2025 a las 17:29:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaie7073`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `grado` varchar(20) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `nivel` varchar(10) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `dni`, `nombres`, `apellidos`, `genero`, `grado`, `seccion`, `nivel`, `fecha_registro`) VALUES
(1, '92369825', 'BRAYAN', 'ABADO ESPINOZA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(2, '92304071', 'MAEL KALEB', 'ACUÑA MAYHUA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(3, '92336459', 'DANNA THAIS', 'CASTRO BERNILLA', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(4, '92625055', 'CRISTEL YULIANA', 'CATASHUNGA JURADO', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(5, '92299817', 'ADIRA BAYOLETH', 'CCALLOQUISPE FLORES', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(6, '92408917', 'MATEO IBRAHIM', 'CERNA CHAFLOQUE', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(7, '92632979', 'ZOÉ BRIANA VALENTINA', 'CHIPANA SANCHEZ', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(8, '92678856', 'VICTOR MANUEL', 'CHUQUITUCTO CONTRERAS', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(9, '25165604000260', 'GEANNELYS ANDRELINA', 'CUADRO MATUTE', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(10, '92596438', 'NOAH VHADIR', 'ESCOBAR GALARZA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(11, '92319422', 'MAXWELL ISAAC BENGHAMIN', 'GARCIA ABAD', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(12, '92668514', 'MIKEYLA JAZMIN', 'HUACACHI CACERES', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(13, '92699920', 'EITHAN YAMIR', 'HUAMAN VARGAS GUERRA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(14, '92416094', 'JOSE ARMANDO', 'LANDA POMASUNCO', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(15, '92489507', 'ANTHON DARIO', 'LAURA RIVAS', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(16, '92598827', 'JAIRETH FRANCHESKA', 'MELENDEZ PERAZA', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(17, '92533219', 'AARON YAMIL', 'MEZA MURGUIA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(18, '92754579', 'THIAGO MATHIAS', 'MORE SOTELO', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(19, '92505834', 'JOB BARUJ', 'MOSCOL DELGADO', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(20, '92702755', 'MAYTE PILAR', 'NAVARRO SALINAS', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(21, '92309536', 'MIA CATALEYA', 'PEREZ CORREA', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(22, '92599704', 'ADELE AYSÉ', 'RAMOS RAMOS', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(23, '92443430', 'DARIO AXEL', 'RODRIGUEZ LIMA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(24, '92710338', 'AITANA BELEN', 'SALAZAR CHANAME', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(25, '92811814', 'MIGUEL ANGEL', 'SOLIS CAYCHO', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(26, '92531301', 'HÉCTOR MIGUEL', 'TAPIA DEL AGUILA', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(27, '92335702', 'BRIANA NAISUT', 'UCANCIAL CASAS', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(28, '92629026', 'AMERICO ARTHUR', 'VELIZ FUENTES', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(29, '92303833', 'MIA AMAHIA', 'VILCATOMA APONTE', 'FEMENINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(30, '92376288', 'LIAM RAMSES', 'VITELA SANDOVAL', 'MASCULINO', '3', 'A', 'Inicial', '2025-10-01 22:34:26'),
(31, '91959177', 'THIAGO YARED', 'ANCAJIMA LLOCLLA', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(32, '92044130', 'ROSANNI BELLA', 'APAZA CORILLA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(33, '92057634', 'VALENTINO YGNASIO', 'AREVALO SHUÑA', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(34, '91880361', 'GIA MICAELA', 'BARZOLA CERDA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(35, '91936404', 'ALICE AMELIA', 'CABALLERO GUTIERREZ', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(36, '91808981', 'NAIA GYMENA', 'CAMARENA ODICIO', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(37, '91818142', 'LIA GEORGETTE', 'CAMERO MARQUINA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(38, '92284756', 'IRINA KATHALEYA', 'CHIHUANTITO CANCHAYA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(39, '91859864', 'YASHIRA ANTHONELLA', 'CLEMENTE CONDEZO', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(40, '23374101600030', 'FABHIAN MATHEO', 'COLLANTE PERAZA', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(41, '91979026', 'SOPHIE RAFFAELA', 'DELGADO QUISPE', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(42, '91935436', 'NICOL VALESKA', 'ESPINOZA GARAMENDI', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(43, '92261655', 'DAYSU VALENTINA', 'FARFAN SILVA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(44, '92152428', 'MARIA ANGELINA', 'FUENTES GARCIA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(45, '92081844', 'LEIDY JIMENA', 'HINOSTROZA ESPINOZA', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(46, '92092596', 'KIARA CAMILA', 'HUAMAN NAVARRO', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(47, '91900457', 'AIXA YAMELI', 'HUAMANCAYO QUISPE', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(48, '92025284', 'HECTOR GAEL', 'LAICHE FACHIN', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(49, '91877919', 'CRISTOFER VALENTIN', 'LANDA ROSALES', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(50, '92053361', 'EYKEL DEBRAM', 'LEON VALLE', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(51, '91981330', 'ASHLEY YULIETH', 'MARCELO DIAZ', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(52, '92274553', 'MALENA ISABEL', 'PALOMINO ROBLES', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(53, '92074216', 'MARIAM CAMILA', 'PEÑA VEREDAS', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(54, '92124735', 'JOAN MATEO', 'PONCE TORREBLANCA', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(55, '91756170', 'JUAN SANTIAGO', 'QUISPE MATEO', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(56, '25165604000270', 'RONNIEL ALEXANDER', 'RAMIREZ MATUTE', 'MASCULINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(57, '91933524', 'SIGRID CALEXI ANTHUANET', 'REQUELME LIGAS', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(58, '92006864', 'FRESCIA SAMANTA', 'SALINAS ACEVEDO', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(59, '91869357', 'BRENDA DANIELA', 'TITO POLO', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(60, '92066630', 'EVALUNA KIMBERLY', 'VARGAS GREGORIO', 'FEMENINO', '4', 'A', 'Inicial', '2025-10-01 22:34:26'),
(61, '91770106', 'GAEL JESUS', 'AÑANCA ROJAS', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(62, '91511631', 'MACARENA ALEXANDRA', 'APONTE LIVIAS', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(63, '91530122', 'ALESSIA FABIANA', 'BENAVIDES DAVILA', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(64, '91270433', 'JAIRITO JUNIOR', 'CAHUASA REATEGUI', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(65, '91674142', 'JEICOB GHAEL', 'CASTILLA HUAMACTO', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(66, '91329181', 'JOAO GIANFRANCO', 'CASTILLO SANTOS', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(67, '91677297', 'EMMANUEL DAVID', 'CASTRO HERNANDEZ', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(68, '91699796', 'CARLA ANIGEN', 'CHICANA QUINTO', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(69, '91770473', 'DYLAN ANTHONY', 'CONCEPCION FUENTES', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(70, '81862721', 'BLADIMIR ALESSANDRO', 'CRUZADO LOPEZ', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(71, '91399560', 'LUDWING ALESSANDRO ALIGHIERI', 'GARCIA ABAD', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(72, '91624843', 'HARLIN GIOVANNI', 'GREGORIO VALENZUELA', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(73, '81852733', 'GIA TIANA', 'HINOSTROZA AQUIJE', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(74, '91660118', 'ALESKA LIA', 'INGUNZA CUSI', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(75, '91442683', 'DIEGO ALONSO', 'LA ROSA SHUÑA', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(76, '91751564', 'JORGE MATHIAS', 'LEON MARCOS', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(77, '91317709', 'RYAN LEONARDO', 'LUCERO AMAO', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(78, '91665758', 'STACY LUCIANA', 'MENDOZA MENDOZA', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(79, '91718688', 'MAXIMO JAVIER', 'PANTA PAIVA', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(80, '91405189', 'URIEL ALESSIO', 'RAVELO RIVAS', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(81, '91563747', 'MIA ISABELLA', 'SILVA CABELLO', 'FEMENINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(82, '91769087', 'FABRIZIO NICOLAS', 'SILVA QUISPE', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(83, '91554238', 'DANIEL CALEB', 'TORRES TITO', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(84, '91759025', 'MATEO FABRIZIO', 'URBINA MELENDEZ', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(85, '91596191', 'LUCCIANO ANDREE', 'VALENCIA LLOCCLLA', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(86, '91434014', 'RONALD ADRIANO PEDRO', 'VERAMENDI DURAND', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(87, '91725701', 'NICOLÁS GADHIEL', 'ZUÑIGA HOCES', 'MASCULINO', '5', 'A', 'Inicial', '2025-10-01 22:34:26'),
(88, '91764605', 'ALONSO MATHIAS', 'ARONE CAHUANA', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(89, '91410320', 'ALESSIA KAORI', 'AVALOS SANCHEZ', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(90, '22374101900018', 'ALICE', 'BONIFAZ PEREZ', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(91, '91735159', 'MARIA BELEN', 'CARDENAS TAPAHUASCO', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(92, '91401662', 'MARIANO', 'CARITIMARI HUAYA', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(93, '91630088', 'SAID ALESSANDRO', 'CHAVEZ RAMOS', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(94, '91327818', 'LUIS AHITANO', 'CONDORI LLASA', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(95, '91546750', 'JAIME ALEXIS', 'ELESCANO SOTELO', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(96, '91738799', 'MATEO GAEL', 'FELIX DE LA CRUZ', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(97, '91769690', 'MATHIAS ADRIANO', 'FLORES ALVITES', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(98, '91735186', 'HANNAH LETICIA GUADALUPE', 'FLORES HUAMANI', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(99, '91446454', 'DANIELA VICTORIA', 'GOMEZ CAPIRA', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(100, '91588966', 'MAFER VALENTINA', 'HUAMAN CHAVEZ', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(101, '91784310', 'MICAELA LARISSA', 'IZQUIERDO BACA', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(102, '91687472', 'SUMMER KATHLEEN', 'LAGOS HERNANDEZ', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(103, '91617203', 'MATTHEW RAÚL', 'LINARES SANCHEZ', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(104, '91654163', 'GAHEL BASTHIAN', 'LLONTOP HUANCCOLLUCHO', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(105, '91727152', 'AMIRA GISSELLE', 'LUZON AYASTA', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(106, '91338095', 'MAIKEYLI KATHERINE', 'OCAMPO JIMENEZ', 'FEMENINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(107, '91389219', 'SANTIAGO SALVADOR', 'PALOMINO ALZAMORA', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(108, '91261124', 'KRAL ANGELLO', 'PEZO CHAVEZ', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(109, '91724524', 'ALESSIO ALESSANDRO', 'QUISPE CASTILLA', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(110, '81862966', 'GAEL JOSE MATEO', 'RUIZ QUIROZ', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(111, '91441017', 'LUKAS GADHIEL', 'SALAS BOSMEDIANO', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(112, '91386496', 'ELIAS URIEL', 'SANJINEZ INFANTE', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(113, '91628228', 'JHUDIEL PATRICK', 'SOLIER COSTILLA', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(114, '91312136', 'BENJHAMIN ARTURO', 'TORRES YUMBATO', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26'),
(115, '91403424', 'DYLAN JAIME', 'YAULILAHUA ELESCANO', 'MASCULINO', '5', 'B', 'Inicial', '2025-10-01 22:34:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `dni` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `curso/especialidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`dni`, `nombres`, `apellidos`, `nivel`, `curso/especialidad`) VALUES
('10086912', 'SOFIA LEONOR', 'RIVERA HUAMAN', 'INICIAL', ''),
('40134077', 'FIORELLA', 'CERVANTES RODRIGUEZ', 'INICIAL', ''),
('41546200', 'CONSUELO JOSEFINA', 'RODAS MEDINA', 'INICIAL', ''),
('43251979', 'URSULA JACQUELINE', 'ZUÑIGA VILLAR', 'INICIAL', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nivel` enum('Secundaria') NOT NULL,
  `grado` varchar(20) NOT NULL,
  `seccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nivel`, `grado`, `seccion`) VALUES
(1, 'Secundaria', '1ro', 'A'),
(2, 'Secundaria', '1ro', 'B'),
(3, 'Secundaria', '2do', 'A'),
(4, 'Secundaria', '2do', 'B'),
(5, 'Secundaria', '3ro', 'A'),
(6, 'Secundaria', '3ro', 'B'),
(7, 'Secundaria', '4to', 'A'),
(8, 'Secundaria', '4to', 'B'),
(9, 'Secundaria', '5to', 'A'),
(10, 'Secundaria', '5to', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` enum('Masculino','Femenino') CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `nivel` enum('Inicial','Primaria','Secundaria') NOT NULL,
  `grado` varchar(20) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `dni_apoderado` varchar(20) NOT NULL,
  `nombre_apoderado` varchar(150) NOT NULL,
  `telefono_apoderado` varchar(20) DEFAULT NULL,
  `correo_apoderado` varchar(100) DEFAULT NULL,
  `parentesco` varchar(50) NOT NULL,
  `fecha_matricula` date DEFAULT curdate(),
  `estado` enum('pendiente','aprobado','rechazado') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `dni`, `apellido_paterno`, `apellido_materno`, `nombres`, `fecha_nacimiento`, `genero`, `direccion`, `telefono`, `correo`, `nivel`, `grado`, `seccion`, `dni_apoderado`, `nombre_apoderado`, `telefono_apoderado`, `correo_apoderado`, `parentesco`, `fecha_matricula`, `estado`) VALUES
(1, '70600142', 'Perez', 'Valdes', 'Juan', '2000-06-14', 'Masculino', 'Jr Bolivar Mz H2A lote 6', '954631140', 'arinazcona@nexostore.com', 'Secundaria', '5', 'A', '09524743', 'Pablo Perez Manrique', '958698117', 'neliabendezu@hotmail.com', 'Padre', '2025-09-03', 'aprobado'),
(5, '08979905', 'Polanco', 'Potocarrero', 'Maria', '2000-01-25', 'Femenino', 'Jr Moyobamba', '951753258', 'maria@hotmail.com', 'Secundaria', '5', 'B', '7894561', 'Rosa Potocarrero Perez', '987654321', 'rosa@hotmail.com', 'Madre', '2025-09-03', 'aprobado'),
(6, '75429208', 'Geldres', 'Valderrama', 'Arturo', '2000-01-01', 'Masculino', 'Jr Monasterio 123', '987456321', 'arturo@hotmail.com', 'Secundaria', '4', 'C', '7412589', 'Luis Geldres', '987456321', 'luis@hotmail.com', 'Padre', '2025-09-15', 'aprobado'),
(7, '7894563', 'Perez', 'Marol', 'Pablo', '2010-06-14', 'Masculino', 'Jr Bolivar Mza H2A Lte 6 Lurin', '954631140', 'arinazcona@nexostore.com', 'Secundaria', '5', 'C', '7539516', 'Luis Perez', '951753698', 'luis@hotmail.com', 'Padre', '2025-09-15', 'aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `rol`) VALUES
(1, 'Administrador', 'admin', 'admin123', 1),
(2, 'Secretarío', 'secretaria', 'secre123', 1),
(3, 'Juan Perez', 'juan', 'juan123', 2),
(4, 'Maria Polanco', 'maria', 'maria123', 2),
(5, 'Arturo Geldres', 'Arturo', 'arturo123', 2),
(6, 'Pablo Marmol', 'pablo', 'pablo123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
