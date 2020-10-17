-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2020 a las 04:26:26
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsolutec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cajamovimiento`
--

CREATE TABLE `tb_cajamovimiento` (
  `code` int(11) NOT NULL,
  `Actual` decimal(10,2) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `Op` int(11) NOT NULL,
  `Concepto` varchar(50) NOT NULL,
  `NewSaldo` decimal(10,2) NOT NULL,
  `Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cajatotal`
--

CREATE TABLE `tb_cajatotal` (
  `code` int(11) NOT NULL,
  `Monto` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_cajatotal`
--

INSERT INTO `tb_cajatotal` (`code`, `Monto`) VALUES
(1, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `teloffice` varchar(30) NOT NULL,
  `telother` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notes` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inventario`
--

CREATE TABLE `tb_inventario` (
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `codeP` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `codeProovedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inventariomovimiento`
--

CREATE TABLE `tb_inventariomovimiento` (
  `code` int(11) NOT NULL,
  `codePro` int(11) NOT NULL,
  `op` int(11) NOT NULL,
  `concepto` varchar(1000) NOT NULL,
  `date` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ordendata`
--

CREATE TABLE `tb_ordendata` (
  `code` int(11) NOT NULL,
  `codeOrden` int(11) NOT NULL,
  `work` varchar(300) NOT NULL,
  `articulo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `falla` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ordenmain`
--

CREATE TABLE `tb_ordenmain` (
  `code` int(11) NOT NULL,
  `codeCliente` int(11) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `tecCode` int(11) NOT NULL,
  `UNeta` varchar(10) NOT NULL,
  `UTec` varchar(10) NOT NULL,
  `iva` tinyint(1) NOT NULL,
  `codFactura` varchar(15) NOT NULL,
  `tipoPago` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ordenmateriales`
--

CREATE TABLE `tb_ordenmateriales` (
  `code` int(11) NOT NULL,
  `codeOrden` int(11) NOT NULL,
  `codeInventario` int(11) NOT NULL,
  `cantidad` varchar(5) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `code` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `telcontacto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tecnico`
--

CREATE TABLE `tb_tecnico` (
  `code` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `telemer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_users`
--

CREATE TABLE `tb_users` (
  `code` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_users`
--

INSERT INTO `tb_users` (`code`, `user`, `pass`) VALUES
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_cajamovimiento`
--
ALTER TABLE `tb_cajamovimiento`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `tb_cajatotal`
--
ALTER TABLE `tb_cajatotal`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `tb_inventario`
--
ALTER TABLE `tb_inventario`
  ADD PRIMARY KEY (`code`),
  ADD KEY `codeProovedor` (`codeProovedor`);

--
-- Indices de la tabla `tb_inventariomovimiento`
--
ALTER TABLE `tb_inventariomovimiento`
  ADD PRIMARY KEY (`code`),
  ADD KEY `codePro` (`codePro`);

--
-- Indices de la tabla `tb_ordendata`
--
ALTER TABLE `tb_ordendata`
  ADD PRIMARY KEY (`code`),
  ADD KEY `codeOrden` (`codeOrden`);

--
-- Indices de la tabla `tb_ordenmain`
--
ALTER TABLE `tb_ordenmain`
  ADD PRIMARY KEY (`code`),
  ADD KEY `codeCliente` (`codeCliente`),
  ADD KEY `tecCode` (`tecCode`);

--
-- Indices de la tabla `tb_ordenmateriales`
--
ALTER TABLE `tb_ordenmateriales`
  ADD PRIMARY KEY (`code`),
  ADD KEY `codeOrden` (`codeOrden`),
  ADD KEY `tb_ordenmateriales_ibfk_1` (`codeInventario`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_cajamovimiento`
--
ALTER TABLE `tb_cajamovimiento`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tb_cajatotal`
--
ALTER TABLE `tb_cajatotal`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tb_inventario`
--
ALTER TABLE `tb_inventario`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_inventariomovimiento`
--
ALTER TABLE `tb_inventariomovimiento`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tb_ordendata`
--
ALTER TABLE `tb_ordendata`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tb_ordenmain`
--
ALTER TABLE `tb_ordenmain`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT de la tabla `tb_ordenmateriales`
--
ALTER TABLE `tb_ordenmateriales`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tb_tecnico`
--
ALTER TABLE `tb_tecnico`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_inventario`
--
ALTER TABLE `tb_inventario`
  ADD CONSTRAINT `tb_inventario_ibfk_1` FOREIGN KEY (`codeProovedor`) REFERENCES `tb_proveedores` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_inventariomovimiento`
--
ALTER TABLE `tb_inventariomovimiento`
  ADD CONSTRAINT `tb_inventariomovimiento_ibfk_1` FOREIGN KEY (`codePro`) REFERENCES `tb_inventario` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ordendata`
--
ALTER TABLE `tb_ordendata`
  ADD CONSTRAINT `tb_ordendata_ibfk_1` FOREIGN KEY (`codeOrden`) REFERENCES `tb_ordenmain` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ordenmain`
--
ALTER TABLE `tb_ordenmain`
  ADD CONSTRAINT `tb_ordenmain_ibfk_1` FOREIGN KEY (`codeCliente`) REFERENCES `tb_clientes` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ordenmain_ibfk_2` FOREIGN KEY (`tecCode`) REFERENCES `tb_tecnico` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ordenmateriales`
--
ALTER TABLE `tb_ordenmateriales`
  ADD CONSTRAINT `tb_ordenmateriales_ibfk_1` FOREIGN KEY (`codeInventario`) REFERENCES `tb_inventario` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ordenmateriales_ibfk_2` FOREIGN KEY (`codeOrden`) REFERENCES `tb_ordenmain` (`code`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
