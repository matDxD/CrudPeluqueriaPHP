-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-06-2023 a las 19:59:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peluqueriabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `cedulac` int(11) NOT NULL,
  `cedulap` int(11) NOT NULL,
  `id_Corte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_citas`, `cedulac`, `cedulap`, `id_Corte`) VALUES
(1, 201, 103, 504),
(2, 201, 103, 504),
(3, 202, 103, 503),
(4, 202, 103, 502),
(5, 202, 103, 501),
(8, 201, 101, 503),
(9, 201, 102, 503),
(11, 201, 101, 501),
(14, 201, 103, 502),
(15, 202, 103, 503),
(16, 202, 103, 503),
(17, 201, 103, 502),
(18, 201, 102, 502),
(19, 201, 101, 502),
(20, 201, 101, 502);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cedulaC` int(11) NOT NULL,
  `nombreC` varchar(50) NOT NULL,
  `Numero` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `Rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cedulaC`, `nombreC`, `Numero`, `Correo`, `Pass`, `Rol`) VALUES
(201, 'carlos', '3215221', 'Carlos@gmail.com', '123', 0),
(202, 'laura', '3128965', 'laura@gmail.com', '123', 1),
(203, 'pepe', '326452', 'Pepe@gmail.com', '123', 0),
(206, 'carla', '564211', 'carla@gmail.com', '123', 0),
(207, 'andres', '45884', 'andres@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortes`
--

CREATE TABLE `cortes` (
  `id_Corte` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `Descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cortes`
--

INSERT INTO `cortes` (`id_Corte`, `nombre`, `precio`, `Descripcion`) VALUES
(501, 'corte', 20000, 'corte a un muchacho'),
(502, 'Hongo', 70000, 'Corte con estilo hongo'),
(503, 'alisado', 20000, ' alisado para cliente'),
(504, 'corte con tijeras', 10000, 'corte con finas tijeras ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numerocortes`
--

CREATE TABLE `numerocortes` (
  `idNcortes` int(11) NOT NULL,
  `cedulaP` int(11) NOT NULL,
  `mes` varchar(25) DEFAULT NULL,
  `Ncortes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numerocortes`
--

INSERT INTO `numerocortes` (`idNcortes`, `cedulaP`, `mes`, `Ncortes`) VALUES
(701, 101, 'mayo', 50),
(702, 102, 'mayo', 60),
(703, 103, 'mayo', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peluquero`
--

CREATE TABLE `peluquero` (
  `cedulaP` int(11) NOT NULL,
  `nombreP` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Fechacontratacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peluquero`
--

INSERT INTO `peluquero` (`cedulaP`, `nombreP`, `Direccion`, `Fechacontratacion`) VALUES
(101, 'camilo', 'carrer30#129-32', '2019-12-11'),
(102, 'carlos', 'carrera 4 sur # 19 B 174', '2023-02-15'),
(103, 'fernando', 'calle65#12-54', '2020-02-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `cedulap` (`cedulap`),
  ADD KEY `cedulac` (`cedulac`),
  ADD KEY `id_Corte` (`id_Corte`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cedulaC`);

--
-- Indices de la tabla `cortes`
--
ALTER TABLE `cortes`
  ADD PRIMARY KEY (`id_Corte`);

--
-- Indices de la tabla `numerocortes`
--
ALTER TABLE `numerocortes`
  ADD PRIMARY KEY (`cedulaP`);

--
-- Indices de la tabla `peluquero`
--
ALTER TABLE `peluquero`
  ADD PRIMARY KEY (`cedulaP`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`cedulap`) REFERENCES `peluquero` (`cedulaP`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`cedulac`) REFERENCES `clientes` (`cedulaC`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_Corte`) REFERENCES `cortes` (`id_Corte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
