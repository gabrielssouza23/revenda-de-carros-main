-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2023 at 02:52 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_revenda_de_carros`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `street` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `complement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_addresses_users_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `number`, `complement`) VALUES
(1, 17, 'centro', '1668', 'casa');

-- --------------------------------------------------------

--
-- Table structure for table `adms`
--

DROP TABLE IF EXISTS `adms`;
CREATE TABLE IF NOT EXISTS `adms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adms`
--

INSERT INTO `adms` (`id`, `name`, `email`, `password`) VALUES
(1, 'gabriel', 'gabriel@adm.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Chevrolet'),
(2, 'Ford'),
(3, 'Renault'),
(4, 'Nissan'),
(5, 'Volkswagen'),
(6, 'Chery');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(300) DEFAULT NULL,
  `brands_id` int DEFAULT NULL,
  `price` varchar(550) DEFAULT NULL,
  `year` varchar(150) DEFAULT NULL,
  `description` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cars_brands1_idx` (`brands_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `model`, `brands_id`, `price`, `year`, `description`) VALUES
(2, 'KA', 2, '29.559,99', '2011', '1.0 8v, C/ar condicionado, Flex MT'),
(1, 'Fiesta 1.6', 2, '24.480,55', '2008', 'Completo, 8v, flex, 4P, Manual'),
(12, 'Clio', 3, '27.990', '2015', 'Expression Hi-power 1.0 16v 5p'),
(4, 'Onix', 1, '62.990', '2021', 'Hatch Lt 1.0 12v Flex 5p Mec.'),
(5, 'Cruze', 1, '15.990', '2022', 'Lt 1.4 16v Turbo Flex 4p Aut.'),
(6, 'Kicks', 4, '46.990', '2022', 'Sense 1.6 16v Flex Aut.'),
(7, 'Saveiro', 5, '21.990', '2022', 'Robust 1.6 Total Flex 8v'),
(8, 'Tiggo 3x', 6, '76.990', '2023', 'Pro 1.0 Turbo Flex Aut.'),
(9, 'Kwid', 3, '23.990', '2022', 'Zen 1.0 Flex 12v 5p Mec.'),
(10, 'Virtus', 5, '35.990', '2021', 'Comfort. 200 Tsi 1.0 Flex 12v Aut'),
(11, 'Ka', 2, '32.990', '2013', '1.0 8v/1.0 8v St Flex 3p'),
(3, 'Focus', 2, '23.550', '2005', 'Expression Hi-power 1.0 16v 5p');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'Onde fica nossa localização?', 'Em Charqueadas - Rio Grande do Sul'),
(2, 'Os carros são bons?', 'Sim, são ótimos e com garantia.'),
(3, 'Os carros são potentes?', 'São, todos revisados e com peças de ponta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `id`) VALUES
('gabriel', 'gabriel22@gmail.com', '$2y$10$uHiZRAgu3x88UfnmirhIU.CcXmnVrGEYwRgVO/kS6P9jx.nU/MawO', 17),
('belli', 'belli@gmail.com', '$2y$10$3IZPM12kwVrG6jxi5GX04O7q8tgvPqanfOLjHLpiy9HQLFaJnzIty', 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
