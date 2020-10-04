-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2020 a las 22:13:56
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
-- Base de datos: `prueba_disfarma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `doc_cliente` varchar(15) NOT NULL,
  `nom_apeCliente` varchar(50) NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `tel_cliente` varchar(20) NOT NULL,
  `cel_cliente` varchar(20) NOT NULL,
  `dir_cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla con información de clientes';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `doc_cliente`, `nom_apeCliente`, `email_cliente`, `tel_cliente`, `cel_cliente`, `dir_cliente`) VALUES
(1, '1234567890', 'Pedro Antonio Alferez Cuellar', 'pedroa2c@hotmail.com', '6543210', '3213213210', 'Cra 55 # 43-22, Torres de Alabarda, Barrio San Victor, Cartagena, Colombia'),
(2, '1234432190', 'Laura Patricia Castillo Parra', 'laurapcp@hotmail.com', '6654321', '3103103102', 'Cra 15 # 42-29, Jardines de Oliva, Bogotá, Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `cod_item` int(11) NOT NULL,
  `nom_item` varchar(50) NOT NULL,
  `des_item` text NOT NULL,
  `cant_item` int(11) NOT NULL,
  `vlr_item` int(11) NOT NULL,
  `img_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla con información de inventario';

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`cod_item`, `nom_item`, `des_item`, `cant_item`, `vlr_item`, `img_item`) VALUES
(1, 'Enalapril Tab 500mg x10 und', 'Tabletas de Enalapril, concentración 500mg, en caja por 10 unidades', 15, 13500, '../img/enalapril.jpg'),
(2, 'Acetaminofén Tabx20und', 'Tabletas de Acetaminofén, concentración 500mg, por 20 unidades en láminas de 10 tabletas.', 50, 8750, '../img/acetaminofen.jpg'),
(3, 'Diclofenaco Tab 500mg 20 und', 'Caja de diclofenaco de 20 tabletas, concentración 500mg', 30, 4550, '../img/diclofenaco.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `cod_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `cod_item` int(11) NOT NULL,
  `und_item` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `medio_pago` enum('TC','TD','EF','TF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla con información de ventas';

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`cod_venta`, `fecha_venta`, `cod_item`, `und_item`, `cod_cliente`, `medio_pago`) VALUES
(1, '2020-10-03', 1, 15, 1, 'EF'),
(2, '2020-10-04', 1, 5, 2, 'TD'),
(2, '2020-10-04', 3, 10, 2, 'TD');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`cod_item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `cod_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
