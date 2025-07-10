-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 09:00 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`),
  ADD KEY `fk_donacion_usuario` (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donacion`
--
ALTER TABLE `donacion`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `fk_donacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
