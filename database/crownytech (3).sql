-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2023 a las 01:14:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crownytech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_table`
--

CREATE TABLE `category_table` (
  `id_categoria` int(11) NOT NULL,
  `categoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category_table`
--

INSERT INTO `category_table` (`id_categoria`, `categoryName`) VALUES
(100, 'Telefono Movil'),
(101, 'Audiovisual'),
(103, 'Computadora Portatil'),
(104, 'Dispositivo Portatil'),
(105, 'Sonido'),
(106, 'Audio'),
(107, 'Escritorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_table`
--

CREATE TABLE `product_table` (
  `id_product` int(11) NOT NULL,
  `productName` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `weightKG` float NOT NULL,
  `height_cm` float NOT NULL,
  `storageGB` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_table`
--

INSERT INTO `product_table` (`id_product`, `productName`, `model`, `price`, `weightKG`, `height_cm`, `storageGB`, `id_categoria`) VALUES
(2, 'Celular', 'Iphone \'11\' Pro Max', 549999, 0.35, 13.2, 128, 100),
(3, 'Tablet', 'Tablet Samsung Galaxy Tab A\'7\'', 220000, 0.45, 21.4, 64, 104),
(4, 'Parlante', 'Genius TotalSound', 420000, 2.8, 30.8, NULL, 105),
(5, 'TV', ' Smart Tv Uhd \'4\'k BGH', 670000, 31.4, 60.3, NULL, 101),
(6, 'Notebook', ' Lenovo Ideapad i \'5\'', 700000, 1.7, 24.7, 280, 103),
(7, 'Microfono', 'Red Dragon B\'445\'', 200000, 0.45, 13.2, NULL, 106),
(8, 'Auriculares', 'Red Dragon UltraSound Griffin', 45000, 0.321, 14.3, NULL, 105),
(9, 'Computadora', 'Computadora Pc Cpu Solarmax Intel Core I\'7\' \'', 539999, 21.4, 46.4, 960, 107);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `idCategoriafk` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product_table`
--
ALTER TABLE `product_table`
  ADD CONSTRAINT `idCategoriafk` FOREIGN KEY (`id_categoria`) REFERENCES `category_table` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
