-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-06-2020 a las 22:16:34
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_dupont`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estante_est`
--

CREATE TABLE `tbl_estante_est` (
  `est_id` int(11) NOT NULL,
  `est_nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estante_est`
--

INSERT INTO `tbl_estante_est` (`est_id`, `est_nombre`) VALUES
(1, 'A'),
(2, 'AA'),
(3, 'AB'),
(4, 'AC'),
(5, 'AD'),
(6, 'AE'),
(7, 'AF'),
(8, 'AG'),
(9, 'AH'),
(10, 'AI'),
(11, 'AJ'),
(12, 'AK'),
(13, 'AL'),
(14, 'ALMACEN'),
(15, 'ALMACEN DE PLANTA'),
(16, 'ALMACÉN'),
(17, 'AM'),
(18, 'AN'),
(19, 'AO'),
(20, 'AP'),
(21, 'ATRÁS DE ESTANTE DE MOTOREDUCTORES'),
(22, 'AUN COSTADO DE MALLAS UF'),
(23, 'B'),
(24, 'C'),
(25, 'CAJA DE INOXIDABLE'),
(26, 'CON REDUCTOR DE PRENSA L2'),
(27, 'CUARTO DE LIMPIEZA'),
(28, 'D'),
(29, 'E'),
(30, 'EN LA ENTRADA'),
(31, 'ENTRADA'),
(32, 'ENTRADA DE LA BODEGA'),
(33, 'ENTRADA DE LA BODEGA MANO IZQUIERDA'),
(34, 'ESTANTE DE PLACAS'),
(35, 'F'),
(36, 'G'),
(37, 'H'),
(38, 'I'),
(39, 'J'),
(40, 'JUNTO ALA BARDA A UN COSTADO DE LAS FLECAHAS DE LA UF'),
(41, 'K'),
(42, 'L'),
(43, 'M'),
(44, 'N'),
(45, 'O'),
(46, 'P'),
(47, 'Q'),
(48, 'R'),
(49, 'R-106'),
(50, 'R-121'),
(51, 'R-124'),
(52, 'R-136'),
(53, 'R-214'),
(54, 'R-219'),
(55, 'R-7'),
(56, 'R-77'),
(57, 'R-78'),
(58, 'RACK DE TUBERIA'),
(59, 'RACK TUBERIA'),
(60, 'RECUPERABLES'),
(61, 'S'),
(62, 'T'),
(63, 'V'),
(64, 'W'),
(65, 'X'),
(66, 'Y'),
(67, 'Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_pdt`
--

CREATE TABLE `tbl_producto_pdt` (
  `pdt_id` int(11) NOT NULL,
  `pdt_sku` varchar(100) NOT NULL,
  `pdt_estante` text NOT NULL,
  `pdt_vendedor` text NOT NULL,
  `pdt_descripcion` text NOT NULL,
  `pdt_categoria` text NOT NULL,
  `pdt_cantidad` int(11) NOT NULL,
  `pdt_um` varchar(50) NOT NULL,
  `pdt_costo` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vendedor_vdr`
--

CREATE TABLE `tbl_vendedor_vdr` (
  `vdr_id` int(11) NOT NULL,
  `vdr_nombre` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_vendedor_vdr`
--

INSERT INTO `tbl_vendedor_vdr` (`vdr_id`, `vdr_nombre`) VALUES
(1, '256500 BOMBAS INDUSTRIALES'),
(2, '295996 EQUIPO BOMBAS SA DE CV'),
(3, 'AESSEAL MEXICO'),
(4, 'ALFA LAVAL ,SA DE CV'),
(5, 'ALFA LAVAL S.A. DE C.V.'),
(6, 'ALFALAVAL'),
(7, 'ALFALAVAL S.A. DE C.V.'),
(8, 'ALLENCO FLUID PRODUCTS  SA DE CV'),
(9, 'ALLENCO FLUID PRODUCTS S.A. DE C.V.'),
(10, 'ALMACEN DUPONT'),
(11, 'APIVAL'),
(12, 'APLICACIONES INTLIGENTES DE VALVULAS'),
(13, 'ARMSTRONG'),
(14, 'ARNOR'),
(15, 'ASCOMATICA S.A DE C.V'),
(16, 'ATLAS COPCO'),
(17, 'ATLASCOPCO'),
(18, 'BEPEX'),
(19, 'BEPEX INTERNATIONAL LLC'),
(20, 'BMS'),
(21, 'BMS COMPONENTES Y EQUIPOS'),
(22, 'BMS COMPONENTES YEQUIPOS INDUSTRIALES'),
(23, 'BODEGA KIT´S'),
(24, 'BRANHAM CORPORATION'),
(25, 'BSYB SAFETY SYSTEMS, LLC'),
(26, 'BSYB SAFETY SYSTEMS,LLC'),
(27, 'CARLOS ENRIQUE VAZQUEZ CACHON'),
(28, 'CB SOLUCIONE TERMICAS SA DE CV'),
(29, 'CB SOLUCIONES TERMICAS SA DE CV'),
(30, 'CENTURIUS'),
(31, 'CITLALLI'),
(32, 'CMT TECHNOLOGY EXPERTS'),
(33, 'COEBSA'),
(34, 'CONECXIONES,EQUIPOS Y BOMBAS,'),
(35, 'CONSTRUCTORA CITLALLI SA DE SV'),
(36, 'CORROSOLUTIONS  DE MEXICO S.A DE C.V'),
(37, 'DE DIETRICH PROCESS SYSTEMS INC'),
(38, 'DELPHY BOMBAS Y EQUIPOS'),
(39, 'DELPHY BOMBAS Y EQUIPOS, S.A. DE C.V.'),
(40, 'DELPY'),
(41, 'DEMSAMEX S.A DE C.V'),
(42, 'DINAMIC AIR'),
(43, 'DISTRIBUIDORA DE AQUAEQUIPOS SA DE CV'),
(44, 'EAGLEBURGMANN MEXICO, SA DE CV'),
(45, 'ELECTRO CONTROLES DEL NOROESTE,'),
(46, 'EMPAQUETADURAS Y SUMINISTROS INDUSTRIALES'),
(47, 'EQUIPOS REFACCIONES Y CONTROLES DE OCCIDENTE S.A. DE C.V.'),
(48, 'ERI GARELI, S.A. DE C.V.'),
(49, 'FERRETERIA Y MATERIALES DESECHABLES S.A DE C.V'),
(50, 'FESTO PNEUMATIC, SA'),
(51, 'FLOTTWEG MEXICO S.A DE C.V'),
(52, 'FLOW-VAL'),
(53, 'FLUID CONTROL CORPORATION, S.A. DE C.V.'),
(54, 'GAE WESTFALIA SEPARATOR'),
(55, 'GARLOCK'),
(56, 'GEA WESTFALIA'),
(57, 'GEA WESTFALIA SEPARATOR MEXICANA'),
(58, 'GEA WESTFALIA SEPARATOR MEXICANA, S.A DE C.V.'),
(59, 'GLORIA PUNSO PARRA'),
(60, 'GLORIA PUNZO PARRA'),
(61, 'GRAINGER'),
(62, 'GRAINGER, SA. DE C.V.'),
(63, 'GRUPO BINASA  DEL NORTE S.A DE C.V'),
(64, 'GRUPO RETES SA DE CV'),
(65, 'GRUPPO BINASA DEL NORTE  S.A DE C.V.'),
(66, 'HIDRAULICA DE VANGUARDIA Y SERVICIO'),
(67, 'HONEYWELL'),
(68, 'HYH DESING Y MANUFACTURING,LLC'),
(69, 'INACASA, MR.'),
(70, 'INGENIERIA Y EQUIPO PARA FLUIDO'),
(71, 'INSTRUMENTACION Y SERVICIOS ELECTRONICOS, SA DE C.V.'),
(72, 'ISME IDEAS Y SOLUCIONES SA DE CV'),
(73, 'J.A. DIAZ Y CIA, SA DE CV'),
(74, 'JRA'),
(75, 'JUAN MANUEL SANCHEZ VILLALVASO'),
(76, 'KAESER'),
(77, 'LA CAPITAL'),
(78, 'MAKO'),
(79, 'MARLEY MEXICANA S.A DE C.V'),
(80, 'MARTHA SANCHEZ CAMACHO'),
(81, 'MENDOZA LOMAS LUIS SERGIO'),
(82, 'N/A'),
(83, 'NETZSCH MEXICO S.A. DE C.V.'),
(84, 'POTENCIA ELECTROMECANICA S.S DE C.V.'),
(85, 'PRODUCTOS MAV, SA DE CV'),
(86, 'PROMINENT'),
(87, 'REFACTARIOS SAJURI S.A DE C.V.'),
(88, 'REINMEX SA DE CV'),
(89, 'RODAMIENTOS Y ACCESORIOS, SA DE CV.'),
(90, 'RODILLOS RODAMIENTOS Y'),
(91, 'RODMIENTOS Y ACCESORIOS, SA DE CV'),
(92, 'RYASA'),
(93, 'RYASSA'),
(94, 'SELLLOS MECANICOS DE OCCIDENTE S.A DE C.V.'),
(95, 'SERVICIE & TRAINING'),
(96, 'SETESEG'),
(97, 'SISTEMAS DE FLUIDOS INDUSTRIALES S.A DE C.V.'),
(98, 'SPIRAX SARCO'),
(99, 'SURTIDORA DE FERRETERIA Y MATERIALES'),
(100, 'SURTIDORA FERRETERA'),
(101, 'SWEQUIPOS S.A  DE  C.V.'),
(102, 'SYDEC EQUIPOS INDUSTRIALES S.A. DE C.V.'),
(103, 'TALLER MORALES'),
(104, 'TECNO MARINE'),
(105, 'TELECONTROLES DE GUADALAJARA SA DE CV'),
(106, 'VALTUINA'),
(107, 'VALTUINSA'),
(108, 'VALVUAS  Y SERVICIOS CREAR SA DE CV'),
(109, 'VALVULAS ACTUADORES Y TERMOPLÁSTICOS S.A DE C.V.'),
(110, 'VALVULAS DE SEGURIDAD, S.A. DE  C.V.'),
(111, 'VALVULAS Y SERVICIOS CREAR S.A. DE C.V.'),
(112, 'VALVULAS Y SERVICIOS CREAR SA DE CV'),
(113, 'WATSON MCDANIEL'),
(114, 'WESTWARD');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_estante_est`
--
ALTER TABLE `tbl_estante_est`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `tbl_producto_pdt`
--
ALTER TABLE `tbl_producto_pdt`
  ADD PRIMARY KEY (`pdt_id`),
  ADD UNIQUE KEY `pdt_sku` (`pdt_sku`);

--
-- Indices de la tabla `tbl_vendedor_vdr`
--
ALTER TABLE `tbl_vendedor_vdr`
  ADD PRIMARY KEY (`vdr_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_estante_est`
--
ALTER TABLE `tbl_estante_est`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_pdt`
--
ALTER TABLE `tbl_producto_pdt`
  MODIFY `pdt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_vendedor_vdr`
--
ALTER TABLE `tbl_vendedor_vdr`
  MODIFY `vdr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
