-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2023 a las 22:15:24
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
-- Base de datos: `login_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `foto`, `name`, `bio`, `phone`) VALUES
(2, 'test@test', '$2y$10$t6F1QRBBaliErMlZMf6CaubdtGercTgRRS.bG7MWrAuqOVMgKFn4y', '/assets/urko_Front_angle_medium_shot_portrait_photography_of_a_25_year__1414774f-0fe5-4150-b122-355f4d744ea0.jpg', 'Paola Rivera', 'odontóloga', 986096404),
(3, 'admin@admin', '$2y$10$NVuG/MkMPMCkoWN.BDIeQe9hS/i0hcvI5/YAvshHSiWZm7Tq5llxa', '/assets/WhatsApp Image 2023-08-28 at 5.14.55 PM.jpeg', 'Jonathan Murillo', 'soy programador', 917594246),
(4, 'prueba@prueba', '$2y$10$z40WMvDKgzkjXJrQXIvUB.u1nDkWqEJpLa30mEEqP9yFylY6n3Zre', '/assets/eperper_cat_wearing_a_hat_2ead2aa6-b2ba-4fc7-8ac7-9226280752d2.jpg', 'yuyin', 'un gaturro con sombrero', 999999999);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
