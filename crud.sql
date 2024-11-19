-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 04:10:20
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `producto`, `precio`, `cantidad`) VALUES
(10, '8523', 'televisor lg', '85.00', 91),
(11, '963', 'laptop hp', '56.00', 9),
(18, '7897685', 'nuevo', '896.00', 6),
(20, '78799', 'impresora epson', '45.00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `email`, `password`) VALUES
('Luis', 'Luis@gmail.com', 'majo12'),
('Luis', 'Luis@gmail.com', 'majo12'),
('Maria', 'Maria@gmail.com', 'Maria12'),
('Maria', 'Maria@gmail.com', '1'),
('Maria', 'Maria@gmail.com', '1'),
('majo', 'a@a.com', '$2y$10$VGxjZZftJl28bs.UM8BcmO2ypKXEgJ9Xw03lZKTpcRpTliyF2JZ6G'),
('majo', 'majoobregon20@outlook.com', '$2y$10$6TnZI32DS21eOUBpV6/gz.ef2mNEe3XGTPWf4KwRYhujPwR5RAQNy'),
('Maria', 'majoobregon20@outlok.com', '$2y$10$P3EUPmlMJwuqaT7S3nUNEOg3GQ0QLAA2X4Y9K6FtH9Amd72Uf46vC'),
('Maria', 'obregonmajo03@gmail.com', '$2y$10$Cc7OBsC0t65cc0AeYEMAuOQ56rVm6O0ny14Lm844cL95ojj4smqpO'),
('Maria', '1', '$2y$10$k.ytxVs0YmWSB4a5CT7/U.XHCMcbC.XvlH6eBFcQbsigiVswzRUG6'),
('a', 'a', '$2y$10$LPEVtyxZsPP/YcgGLaFTW.yMFxJwCZuLqkuU6IOQY56SmRf1cwXJG'),
('q', 'q', '$2y$10$VSLYD0BpUiI4N8tYUJNUjO3SeS6iWgZPNIJpMMSTzgK8od9vOMl9S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
