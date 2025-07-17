-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 09:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dendb`
--
CREATE DATABASE IF NOT EXISTS `dendb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dendb`;

-- --------------------------------------------------------

--
-- Table structure for table `adopcion`
--

CREATE TABLE `adopcion` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `mascota_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `confirmar` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopcion`
--

INSERT INTO `adopcion` (`id`, `fecha`, `usuario_id`, `mascota_id`, `confirmar`) VALUES
(0000000001, '2025-07-17 15:45:26', 00002, 00120, 0),
(0000000002, '2025-07-17 15:45:41', 00002, 00120, 0),
(0000000004, '2025-07-17 15:47:39', 00002, 00120, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donacion`
--

CREATE TABLE `donacion` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `referencia` varchar(50) DEFAULT NULL,
  `usuario_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `metodo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donacion`
--

INSERT INTO `donacion` (`id`, `nombre`, `correo`, `monto`, `fecha`, `referencia`, `usuario_id`, `metodo`) VALUES
(00001, 'sads', 'GedeonP2312@gmail.com', 25.00, '2025-07-10 14:12:30', NULL, 00001, 'paypal'),
(00002, 'asdsa', 'GedeonP2312@gmail.com', 25.00, '2025-07-10 14:14:22', NULL, 00001, 'paypal'),
(00003, 'Orlando', 'GedeonP2312@gmail.com', 25.00, '2025-07-10 14:17:24', NULL, 00001, 'paypal'),
(00004, 'Orlando', 'GedeonP2312@gmail.com', 25.00, '2025-07-10 14:24:49', NULL, 00001, 'paypal'),
(00005, 'dsa', 'GedeonP2312@gmail.com', 50.00, '2025-07-10 14:26:43', NULL, 00001, 'paypal'),
(00006, 'asd', 'GedeonP2312@gmail.com', 50.00, '2025-07-10 14:27:33', NULL, 00001, 'paypal'),
(00007, 'Orlando', 'GedeonP2312@gmail.com', 100.00, '2025-07-10 14:32:34', NULL, 00001, 'paypal'),
(00008, 'Orlando', 'GedeonP2312@gmail.com', 25.00, '2025-07-10 14:34:39', NULL, 00001, 'paypal'),
(00009, 'asdsa', 'GedeonP2312@gmail.com', 25.00, '2025-07-10 14:38:28', NULL, 00001, 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `etiqueta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `etiqueta`) VALUES
(5, 'activo'),
(11, 'adapta a espacios pequeños'),
(10, 'amigable con niños'),
(16, 'Arisca'),
(20, 'Asustadiza'),
(7, 'cariñoso'),
(19, 'comelona'),
(17, 'curiosa'),
(15, 'fácil de entrenar'),
(8, 'guardian'),
(9, 'independiente'),
(14, 'inteligente'),
(1, 'juguetón'),
(12, 'le gusta correr'),
(6, 'obediente'),
(3, 'peludo'),
(18, 'seria'),
(13, 'sifrino'),
(2, 'sociable'),
(4, 'tranquilo');

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `usuario_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `mascota_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `fecha_agregado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favoritos`
--

INSERT INTO `favoritos` (`usuario_id`, `mascota_id`, `fecha_agregado`) VALUES
(00001, 00117, '2025-07-09 18:46:32'),
(00001, 00118, '2025-07-09 18:39:35'),
(00001, 00122, '2025-07-09 18:45:39'),
(00002, 00119, '2025-07-09 18:52:23'),
(00002, 00120, '2025-07-09 18:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `mascota`
--

CREATE TABLE `mascota` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `especie` enum('perro','gato') NOT NULL,
  `genero` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_nacimiento` date DEFAULT NULL,
  `edad_minima` tinyint(3) UNSIGNED DEFAULT NULL,
  `edad_maxima` tinyint(3) UNSIGNED DEFAULT NULL,
  `descripcion` text NOT NULL,
  `estatus` enum('adopcion','adoptada','rescatada') NOT NULL,
  `fecha_ingreso` datetime NOT NULL DEFAULT current_timestamp(),
  `rescatada` tinyint(1) NOT NULL DEFAULT 0,
  `estado` varchar(12) NOT NULL,
  `altura` decimal(5,2) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `color` varchar(20) NOT NULL,
  `usuario_origen_id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `raza_id` int(11) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `especie`, `genero`, `fecha_nacimiento`, `edad_minima`, `edad_maxima`, `descripcion`, `estatus`, `fecha_ingreso`, `rescatada`, `estado`, `altura`, `peso`, `color`, `usuario_origen_id`, `raza_id`, `direccion`) VALUES
(00117, 'Kawasakis', 'perro', 1, NULL, 3, 4, 'Conoce a Kawasaki, el bulldog que ha conquistado corazones con su ternura y ese carácter tan especial de los suyos. Este pequeño gigante es la definición de cariñoso. No hay un día en el que no te regale un gesto de amor, ya sea con sus suaves empujones buscando caricias, sus ronquidos apacibles mientras se acurruca a tu lado, o esas lengüetadas inesperadas que te sacan una sonrisa.', 'adopcion', '2025-07-08 16:19:06', 0, 'Guárico', 20.00, 20.00, 'marron', 00001, 10, 'cerca del rincon de las nenas'),
(00118, 'Eduardoa', 'perro', 1, '2023-02-08', NULL, NULL, 'Pesssssssssssssssssssssrmítanme presentarles a Eduardo, un chihuahua que encarna perfectamente la frase \"el tamaño no lo es todo\". Eduardo es el tipo de perro que, a pesar de su diminuto tamaño, tiene una personalidad que llena cualquier habitación... y a veces, un poco más. Digamos que es un \"pequeño tirano encantador\".ssssssssssss', 'adopcion', '2025-07-08 16:23:18', 0, 'Zulia', 10.00, 5.00, 'marron', 00001, 10, 'Bella vista vo sabeis'),
(00119, 'Ken', 'gato', 1, '2023-09-10', NULL, NULL, 'Permítanme presentarles a Ken, el felino que domina el arte de la distinción. Con su pelaje siempre impecable y ese aire de \"aquí mando yo\" que solo un gato puede poseer, Ken es el epítome de la elegancia. Es el \"sifrino\" por excelencia del hogar: se pasea con una gracia innata, elige los lugares más altos y cómodos para sus siestas de realeza, y no te regalará afecto a la primera de cambio. Él decide cuándo y cómo, y rara vez es con efusividad ruidosa.', 'adopcion', '2025-07-08 16:25:41', 0, 'Zulia', 20.00, 10.00, 'blanco', 00001, 27, 'AV.40'),
(00120, 'Sifrina', 'gato', 0, NULL, 5, 6, 'Permítanme presentarles a Sifrina, la gatita que lleva su nombre con total distinción y que ha perfeccionado el arte de la vida de lujo y la alta exigencia. Ella no camina; desfila. Cada movimiento de Sifrina es una declaración de su nobleza, y su mirada, a menudo un poco altiva, te hace saber que el mundo entero gira en torno a sus necesidades y deseos. Es la \"sifrina\" por excelencia, la que espera que su comida sea servida en el momento justo, que su cama esté siempre impecable y que las caricias se le ofrezcan solo cuando ella lo decida.', 'adopcion', '2025-07-08 16:28:18', 0, 'Miranda', 20.00, 20.00, 'gris', 00001, 28, 'Alola'),
(00121, 'Luna', 'perro', 0, NULL, 3, 4, 'Permítanme presentarles a Luna, una perrita de tamaño mediano, con un pelaje suave que invita a las caricias y unos ojos grandes y expresivos que parecen guardar mil historias. Luna es una perrita con un alma un poco soñadora y un espíritu aventurero, pero siempre en su propio ritmo.', 'adopcion', '2025-07-08 16:32:04', 0, 'Amazonas', 45.00, 31.00, 'marron', 00001, 17, 'Valle colocolo'),
(00122, 'Tumbarranchos', 'gato', 1, NULL, 1, 2, 'Tumbarranchos,', 'adopcion', '2025-07-08 16:35:15', 0, 'Monagas', 30.00, 7.00, 'gris', 00001, 28, 'en la casa del profesor Escalona'),
(00123, 'kosobo', 'gato', 1, NULL, 3, 4, 'sadasd', 'rescatada', '2025-07-17 12:48:39', 0, 'Mérida', 23.00, 12.00, 'Negro', NULL, 28, 'dfs');

-- --------------------------------------------------------

--
-- Table structure for table `mascota_etiquetas`
--

CREATE TABLE `mascota_etiquetas` (
  `mascota_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `etiqueta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mascota_etiquetas`
--

INSERT INTO `mascota_etiquetas` (`mascota_id`, `etiqueta_id`) VALUES
(0000000117, 1),
(0000000117, 6),
(0000000117, 7),
(0000000117, 8),
(0000000117, 10),
(0000000118, 1),
(0000000118, 5),
(0000000118, 9),
(0000000118, 13),
(0000000118, 14),
(0000000119, 1),
(0000000119, 3),
(0000000119, 4),
(0000000119, 7),
(0000000119, 8),
(0000000119, 9),
(0000000119, 11),
(0000000119, 13),
(0000000120, 2),
(0000000120, 3),
(0000000120, 4),
(0000000120, 5),
(0000000120, 7),
(0000000120, 8),
(0000000120, 9),
(0000000120, 12),
(0000000120, 13),
(0000000120, 14),
(0000000120, 17),
(0000000121, 1),
(0000000121, 2),
(0000000121, 3),
(0000000121, 5),
(0000000121, 6),
(0000000121, 7),
(0000000121, 10),
(0000000121, 14),
(0000000122, 2),
(0000000122, 3),
(0000000122, 4),
(0000000122, 7),
(0000000122, 13),
(0000000122, 14),
(0000000123, 2),
(0000000123, 3),
(0000000123, 10),
(0000000123, 11),
(0000000123, 17),
(0000000123, 18);

-- --------------------------------------------------------

--
-- Table structure for table `mascota_fotos`
--

CREATE TABLE `mascota_fotos` (
  `id` int(11) NOT NULL,
  `mascota_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `url_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mascota_fotos`
--

INSERT INTO `mascota_fotos` (`id`, `mascota_id`, `url_foto`, `orden`) VALUES
(1029, 00119, 'Assets/images/mascotas/686d7ec59ac93-WhatsApp Image 2025-07-08 at 10.33.44_741867d9.jpg', 1),
(1030, 00119, 'Assets/images/mascotas/686d7ec59b06b-WhatsApp Image 2025-07-08 at 10.34.07_eefec6b1.jpg', 2),
(1031, 00119, 'Assets/images/mascotas/686d7ec59b40a-WhatsApp Image 2025-07-08 at 10.33.17_5983cac2.jpg', 3),
(1035, 00121, 'Assets/images/mascotas/686d804443523-Georgie-web.jpg', 1),
(1111, 00122, 'Assets/images/mascotas/686d810313675-photo-1689871404673-cc43adec4ae8.jpeg', 1),
(1112, 00120, 'Assets/images/mascotas/686d7f62b8e40-a8dc00d41c2a6882d693721e8c5ccfe7.jpg', 1),
(1113, 00120, 'Assets/images/mascotas/686d7f62b9304-800px-Persian_de_Alola.png', 2),
(1114, 00120, 'Assets/images/mascotas/686d7f62b97ef-EP1020_Persian_de_Denio.png', 3),
(1115, 00120, 'Assets/images/mascotas/68768cd2c1cb7-photo-1689871404673-cc43adec4ae8.jpeg', 4),
(1116, 00123, 'Assets/images/mascotas/687929670be54-d3a193f64546e1127c911bb5c8ddda81.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `razas`
--

CREATE TABLE `razas` (
  `id` int(11) NOT NULL,
  `nombre_raza` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `especie` enum('perro','gato') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `razas`
--

INSERT INTO `razas` (`id`, `nombre_raza`, `especie`) VALUES
(1, 'Poodle mini toy', 'perro'),
(2, 'Chihuahua', 'perro'),
(3, 'Schnauzer miniatura', 'perro'),
(4, 'Pomerania', 'perro'),
(5, 'Yorkshire Terrier', 'perro'),
(6, 'Shih Tzu', 'perro'),
(7, 'Maltés', 'perro'),
(8, 'Poodle mediano', 'perro'),
(9, 'Cocker Spaniel', 'perro'),
(10, 'Beagle', 'perro'),
(11, 'French Bulldog', 'perro'),
(12, 'Fox Terrier', 'perro'),
(13, 'Border Collie', 'perro'),
(14, 'Dachshund (Salchicha)', 'perro'),
(15, 'Pastor Alemán', 'perro'),
(16, 'Rottweiler', 'perro'),
(17, 'Golden Retriever', 'perro'),
(18, 'Labrador Retriever', 'perro'),
(19, 'Dóberman', 'perro'),
(20, 'Husky Siberiano', 'perro'),
(21, 'Boxer', 'perro'),
(22, 'Mestizo pequeño', 'perro'),
(23, 'Mestizo mediano', 'perro'),
(24, 'Mestizo grande', 'perro'),
(25, 'Criollo', 'gato'),
(26, 'Siamés', 'gato'),
(27, 'Persa', 'gato'),
(28, 'Angora Turco', 'gato'),
(29, 'Maine Coon', 'gato'),
(30, 'Ragdoll', 'gato'),
(31, 'British Shorthair', 'gato'),
(32, 'Azul Ruso', 'gato'),
(33, 'Mestizo de pelo corto', 'gato'),
(34, 'Mestizo de pelo largo', 'gato');

-- --------------------------------------------------------

--
-- Table structure for table `rehome`
--

CREATE TABLE `rehome` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `usuario_origen_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `mascota_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `fecha_solicitud` datetime NOT NULL DEFAULT current_timestamp(),
  `estado_rehome` enum('pendiente','aceptado','en_espera','rechazado') NOT NULL DEFAULT 'pendiente',
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `redes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`redes`)),
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(12) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `correo`, `clave`, `admin`, `redes`, `fecha_registro`, `estado`, `descripcion`, `direccion`, `bloqueado`) VALUES
(00001, '      Orlando marcano', '123', 'GedeonP2312@gmail.com', '$2y$10$dKPyyqXrnMK6VYkVSm94aOqqYj1BNt1e4tFxjySRMug791B1I0dwW', 1, NULL, '2025-07-04 12:51:57', 'Amazonas', NULL, 'sadsa', 0),
(00002, 'Paola Reyes', NULL, 'pvrs400@gmail.com', '$2y$10$yyWFl9kPmEXOVu70k1zINevQM17WDjNteVbtPZrjZVmW2Cg89i1Je', 0, NULL, '2025-07-04 12:52:17', NULL, NULL, NULL, 0),
(00003, 'Gasperini', NULL, 'qwertyuiop@gmail.com', '$2y$10$gLWz6dKYcG9YdZ9olc6rWu6xgGysLxMWodvB8W2q3b6Bp9ssaQKBq', 0, NULL, '2025-07-04 12:52:38', NULL, NULL, NULL, 0),
(00004, 'pingo', NULL, 'correoxd@gmail.com', '$2y$10$kgbA4QkUPqZEPeoA7INgxuvbidPMQ5l962CpR/8odfMx9Zvd6ADbW', 0, NULL, '2025-07-09 20:20:26', NULL, NULL, NULL, 0),
(00005, 'pingo', NULL, 'dsadsad@gmail.com', '$2y$10$sP8KxJHh6Atm60LS1CXN2.opaJ4JOQjTA0xke9jAOnPYExf30KNwK', 0, NULL, '2025-07-09 22:54:04', NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adopcion_usuario` (`usuario_id`),
  ADD KEY `fk_adopcion_mascota` (`mascota_id`);

--
-- Indexes for table `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`),
  ADD KEY `fk_donacion_usuario` (`usuario_id`);

--
-- Indexes for table `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etiqueta` (`etiqueta`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`usuario_id`,`mascota_id`),
  ADD KEY `mascota_id` (`mascota_id`);

--
-- Indexes for table `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mascota_usuario_origen` (`usuario_origen_id`),
  ADD KEY `fk_mascota_raza` (`raza_id`);

--
-- Indexes for table `mascota_etiquetas`
--
ALTER TABLE `mascota_etiquetas`
  ADD PRIMARY KEY (`mascota_id`,`etiqueta_id`),
  ADD KEY `etiqueta_id` (`etiqueta_id`);

--
-- Indexes for table `mascota_fotos`
--
ALTER TABLE `mascota_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foto_mascota` (`mascota_id`);

--
-- Indexes for table `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rehome`
--
ALTER TABLE `rehome`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rehome_usuario` (`usuario_origen_id`),
  ADD KEY `fk_rehome_mascota` (`mascota_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopcion`
--
ALTER TABLE `adopcion`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donacion`
--
ALTER TABLE `donacion`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `mascota_fotos`
--
ALTER TABLE `mascota_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1117;

--
-- AUTO_INCREMENT for table `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rehome`
--
ALTER TABLE `rehome`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `fk_adopcion_mascota` FOREIGN KEY (`mascota_id`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `fk_adopcion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `fk_donacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_mascota_raza` FOREIGN KEY (`raza_id`) REFERENCES `razas` (`id`),
  ADD CONSTRAINT `fk_mascota_usuario_origen` FOREIGN KEY (`usuario_origen_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `mascota_etiquetas`
--
ALTER TABLE `mascota_etiquetas`
  ADD CONSTRAINT `mascota_etiquetas_ibfk_1` FOREIGN KEY (`mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mascota_etiquetas_ibfk_2` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mascota_fotos`
--
ALTER TABLE `mascota_fotos`
  ADD CONSTRAINT `fk_foto_mascota` FOREIGN KEY (`mascota_id`) REFERENCES `mascota` (`id`);

--
-- Constraints for table `rehome`
--
ALTER TABLE `rehome`
  ADD CONSTRAINT `fk_rehome_mascota` FOREIGN KEY (`mascota_id`) REFERENCES `mascota` (`id`),
  ADD CONSTRAINT `fk_rehome_usuario` FOREIGN KEY (`usuario_origen_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
