-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 04:57 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `adopcion`
--

CREATE TABLE `adopcion` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `mascota_id` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donacion`
--

CREATE TABLE `donacion` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `referencia` varchar(50) NOT NULL,
  `usuario_id` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(7, 'cariñoso'),
(15, 'fácil de entrenar'),
(8, 'guardian'),
(9, 'independiente'),
(14, 'inteligente'),
(1, 'juguetón'),
(12, 'necesita mucho ejercicio'),
(13, 'no ladra mucho'),
(6, 'obediente'),
(3, 'peludo'),
(2, 'sociable'),
(4, 'tranquilo');

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
(00001, 'Luna', 'perro', 1, '2021-04-15', NULL, NULL, 'We have had Luna since she was a puppy. She currently lives with a family and is very loving with children. Luna gets along well with other dogs and doesn’t react negatively to cats or birds. She enjoys outdoor play and is fully house-trained.', 'adopcion', '2024-06-10 00:00:00', 1, 'Zulia', 45.00, 15.20, 'Negro con blanco', 00001, 1, 'Calle 67 con Av 15, Maracaibo'),
(00002, 'Michi', 'gato', 0, NULL, 2, 3, 'Michi is a young and energetic male cat. He loves to chase feather toys and sleep near sunny windows. He is used to people, including children, and enjoys both company and independence. Ideal for someone looking for a playful companion.', 'adopcion', '2024-05-20 00:00:00', 0, 'Carabobo', 22.00, 3.80, 'Gris', 00002, 24, 'Calle Comercio, Valencia'),
(00003, 'Rocky', 'perro', 0, '2019-11-10', NULL, NULL, 'Rocky was rescued from the streets in bad shape, but he recovered wonderfully. He is calm, obedient, and protective. He’s used to living in a house with a yard and is a great companion for adults. He was recently adopted by a loving family.', 'adoptada', '2023-12-01 00:00:00', 1, 'Miranda', 60.50, 23.40, 'Marrón oscuro', 00003, 15, 'Av. Principal de Guatire'),
(00004, 'Nieve', 'gato', 1, '2023-03-01', NULL, NULL, 'Nieve is a gentle Persian cat with a calm temperament. She enjoys lounging on soft surfaces and is not a fan of loud noises. Perfect for a quiet home or apartment. Gets along with adults and older children.', 'adopcion', '2024-07-01 00:00:00', 0, 'Distrito Cap', 28.00, 4.20, 'Blanco', 00001, 26, 'Av Urdaneta, Caracas'),
(00005, 'Max', 'perro', 0, NULL, 0, 1, 'Max was found abandoned near a park. Despite a rough start, he is very playful and curious. He is currently learning basic obedience and adapting well to home life. He will need regular checkups and a loving family to continue thriving.', 'rescatada', '2024-06-22 00:00:00', 1, 'Lara', 30.00, 7.00, 'Beige', 00002, 22, 'Sector el Cuji, Barquisimeto'),
(00006, 'Tigre', 'gato', 0, NULL, 1, 2, 'Tigre has a strong personality and loves to climb and jump. He needs space to play and loves exploring high places. Not ideal for very young kids, but great with teens and adults. Fully litter-trained and independent.', 'adopcion', '2024-06-15 00:00:00', 1, 'Anzoátegui', 26.00, 3.50, 'Atigrado', 00003, 24, 'Calle principal de Puerto La Cruz'),
(00007, 'Coco', 'perro', 0, '2020-09-30', NULL, NULL, 'Coco is an affectionate labrador who thrives on human interaction. He enjoys long walks, fetching balls, and being brushed. Gets along with other dogs and is perfect for a family with children or an active individual.', 'adopcion', '2024-06-28 00:00:00', 0, 'Aragua', 58.00, 26.00, 'Amarillo', 00002, 18, 'La Victoria, calle Bolívar'),
(00008, 'Shadow', 'gato', 0, NULL, 2, 4, 'Shadow is a reserved cat who takes time to warm up to new people, but once he does, he’s extremely loyal. He’s perfect for someone patient looking for a calm indoor companion. Best in a home without other pets.', 'adopcion', '2024-05-10 00:00:00', 0, 'Mérida', 27.50, 4.00, 'Gris azulado', 00001, 30, 'Urbanización Los Sauzales, Mérida');

-- --------------------------------------------------------

--
-- Table structure for table `mascota_etiquetas`
--

CREATE TABLE `mascota_etiquetas` (
  `mascota_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `etiqueta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 00001, 'assets/img/mascotas/luna_1.jpg', 1),
(2, 00001, 'assets/img/mascotas/luna_2.jpg', 2),
(3, 00002, 'assets/img/mascotas/michi_1.jpg', 1),
(4, 00002, 'assets/img/mascotas/michi_2.jpg', 2),
(5, 00003, 'assets/img/mascotas/rocky_1.jpg', 1),
(6, 00003, 'assets/img/mascotas/rocky_2.jpg', 2),
(7, 00004, 'assets/img/mascotas/nieve_1.jpg', 1),
(8, 00004, 'assets/img/mascotas/nieve_2.jpg', 2),
(9, 00005, 'assets/img/mascotas/max_1.jpg', 1),
(10, 00005, 'assets/img/mascotas/max_2.jpg', 2),
(11, 00006, 'assets/img/mascotas/tigre_1.jpg', 1),
(12, 00006, 'assets/img/mascotas/tigre_2.jpg', 2),
(13, 00007, 'assets/img/mascotas/coco_1.jpg', 1),
(14, 00007, 'assets/img/mascotas/coco_2.jpg', 2),
(15, 00008, 'assets/img/mascotas/shadow_1.jpg', 1),
(16, 00008, 'assets/img/mascotas/shadow_2.jpg', 2);

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
  `direccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `correo`, `clave`, `admin`, `redes`, `fecha_registro`, `estado`, `descripcion`, `direccion`) VALUES
(00001, 'Orlando Marcano', NULL, 'GedeonP2312@gmail.com', '$2y$10$ysze3eSAwztDrvv6WFzvsu.kVCFEusZI7Abbc7N1J5k49ZpbpGMiS', 0, NULL, '2025-07-04 12:51:57', NULL, NULL, NULL),
(00002, 'Paola Reyes', NULL, 'pvrs400@gmail.com', '$2y$10$yyWFl9kPmEXOVu70k1zINevQM17WDjNteVbtPZrjZVmW2Cg89i1Je', 0, NULL, '2025-07-04 12:52:17', NULL, NULL, NULL),
(00003, 'Gasperini', NULL, 'qwertyuiop@gmail.com', '$2y$10$gLWz6dKYcG9YdZ9olc6rWu6xgGysLxMWodvB8W2q3b6Bp9ssaQKBq', 0, NULL, '2025-07-04 12:52:38', NULL, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donacion`
--
ALTER TABLE `donacion`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mascota_fotos`
--
ALTER TABLE `mascota_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
