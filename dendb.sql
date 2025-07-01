-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 09:48 PM
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
  `raza_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `especie`, `genero`, `fecha_nacimiento`, `edad_minima`, `edad_maxima`, `descripcion`, `estatus`, `fecha_ingreso`, `rescatada`, `estado`, `altura`, `peso`, `color`, `usuario_origen_id`, `raza_id`) VALUES
(00001, 'Max', 'perro', 1, '2022-03-15', 1, 2, 'Juguetón y amigable', 'adopcion', '2024-06-01 00:00:00', 1, 'Distrito Cap', 60.00, 25.00, 'Marrón', 00001, 2),
(00002, 'Luna', 'gato', 1, '2021-08-10', 2, 4, 'Muy cariñosa', 'adoptada', '2024-05-12 00:00:00', 0, 'Lara', 30.00, 5.00, 'Blanco', 00002, 6),
(00003, 'Rocky', 'perro', 1, '2023-01-20', 0, 1, 'Cachorro activo', 'adopcion', '2024-06-15 00:00:00', 1, 'Zulia', 40.00, 10.00, 'Negro', 00001, 1),
(00004, 'Milo', 'gato', 1, '2020-05-25', 3, 5, 'Tranquilo y observador', 'rescatada', '2024-04-20 00:00:00', 1, 'Miranda', 35.00, 6.00, 'Gris', 00001, 7),
(00005, 'Nala', 'perro', 1, '2022-12-01', 1, 2, 'Muy juguetona', 'adopcion', '2024-06-10 00:00:00', 0, 'Carabobo', 50.00, 20.00, 'Dorado', 00001, 3),
(00006, 'Simba', 'gato', 1, '2023-03-05', 0, 1, 'Curioso y sociable', 'adopcion', '2024-06-18 00:00:00', 1, 'Anzoátegui', 32.00, 4.00, 'Naranja', 00001, 8),
(00007, 'Toby', 'perro', 1, '2021-09-14', 2, 3, 'Le encanta correr', 'adoptada', '2024-05-22 00:00:00', 0, 'Táchira', 55.00, 18.00, 'Negro y blanco', 00001, 4),
(00008, 'Mía', 'gato', 1, '2022-07-30', 1, 2, 'Muy tranquila', 'adopcion', '2024-06-05 00:00:00', 1, 'Mérida', 28.00, 3.00, 'Blanco y gris', 00001, 11),
(00009, 'Thor', 'perro', 1, '2020-11-22', 3, 5, 'Fuerte y protector', 'adopcion', '2024-05-30 00:00:00', 1, 'Aragua', 65.00, 30.00, 'Marrón oscuro', 00001, 5),
(00010, 'Cleo', 'gato', 1, '2023-02-14', 0, 1, 'Pequeña y juguetona', 'rescatada', '2024-06-20 00:00:00', 0, 'Bolívar', 29.00, 4.00, 'Negro', 00001, 9);

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
(1, 00001, 'https://ejemplo.com/fotos/max_1.jpg', 1),
(2, 00001, 'https://ejemplo.com/fotos/max_2.jpg', 2),
(3, 00002, 'https://ejemplo.com/fotos/luna_1.jpg', 1),
(4, 00002, 'https://ejemplo.com/fotos/luna_2.jpg', 2),
(5, 00003, 'https://ejemplo.com/fotos/rocky_1.jpg', 1),
(6, 00003, 'https://ejemplo.com/fotos/rocky_2.jpg', 2),
(7, 00004, 'https://ejemplo.com/fotos/milo_1.jpg', 1),
(8, 00004, 'https://ejemplo.com/fotos/milo_2.jpg', 2),
(9, 00005, 'https://ejemplo.com/fotos/nala_1.jpg', 1),
(10, 00005, 'https://ejemplo.com/fotos/nala_2.jpg', 2),
(11, 00006, 'https://ejemplo.com/fotos/simba_1.jpg', 1),
(12, 00006, 'https://ejemplo.com/fotos/simba_2.jpg', 2),
(13, 00007, 'https://ejemplo.com/fotos/toby_1.jpg', 1),
(14, 00007, 'https://ejemplo.com/fotos/toby_2.jpg', 2),
(15, 00008, 'https://ejemplo.com/fotos/mia_1.jpg', 1),
(16, 00008, 'https://ejemplo.com/fotos/mia_2.jpg', 2),
(17, 00009, 'https://ejemplo.com/fotos/thor_1.jpg', 1),
(18, 00009, 'https://ejemplo.com/fotos/thor_2.jpg', 2),
(19, 00010, 'https://ejemplo.com/fotos/cleo_1.jpg', 1),
(20, 00010, 'https://ejemplo.com/fotos/cleo_2.jpg', 2);

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
(1, 'Pastor Alemán', 'perro'),
(2, 'Labrador Retriever', 'perro'),
(3, 'Golden Retriever', 'perro'),
(4, 'Pug', 'perro'),
(5, 'Bulldog Francés', 'perro'),
(6, 'Siamés', 'gato'),
(7, 'Persa', 'gato'),
(8, 'Maine Coon', 'gato'),
(9, 'Bengalí', 'gato'),
(10, 'Mestizo', 'perro'),
(11, 'Mestizo', 'gato');

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
(00001, 'pingo', NULL, 'd@gmail.com', '$2y$10$xoshdLXOYkunPDL2y/mbuOPcNjjEuppxuBPHSfiBAY0fQn1fee8va', 0, NULL, '2025-06-30 12:15:59', NULL, NULL, NULL),
(00002, 'Orlando Marcano', NULL, 'ds@gmail.com', '$2y$10$uMAebTqBzFoJBNKZy4mel.IZfZTkovphVUDkJcuFukbvFvJGemaDC', 0, NULL, '2025-07-01 09:44:41', NULL, NULL, NULL);

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
-- Indexes for table `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mascota_usuario_origen` (`usuario_origen_id`),
  ADD KEY `fk_mascota_raza` (`raza_id`);

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
-- AUTO_INCREMENT for table `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mascota_fotos`
--
ALTER TABLE `mascota_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rehome`
--
ALTER TABLE `rehome`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
