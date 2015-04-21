-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 03 jun 2014 om 12:52
-- Serverversie: 5.5.23
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `rot`
--
CREATE DATABASE IF NOT EXISTS `rot` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rot`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `betaling`
--

CREATE TABLE IF NOT EXISTS `betaling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afschriftnummer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bedrag` double NOT NULL,
  `betaaldatum` date NOT NULL,
  `afschriftnummer2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bedrag2` double DEFAULT NULL,
  `betaaldatum2` date DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `betrokkene`
--

CREATE TABLE IF NOT EXISTS `betrokkene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parkeerkaartid` int(11) DEFAULT NULL,
  `organisatieid` int(11) DEFAULT NULL,
  `voornaam` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `achternaam` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soort` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5C775C1E1F1D55` (`parkeerkaartid`),
  KEY `IDX_5C775C16E1CF7A` (`organisatieid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boot`
--

CREATE TABLE IF NOT EXISTS `boot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `klasse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `normalrating` double NOT NULL,
  `spinnakerrating` double NOT NULL,
  `iscustom` tinyint(1) NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=149 ;

--
-- Gegevens worden uitgevoerd voor tabel `boot`
--

INSERT INTO `boot` (`id`, `type`, `klasse`, `normalrating`, `spinnakerrating`, `iscustom`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'a-cat large spi (1)', 'default', 101, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(2, 'a-cat (1)', 'formule 18', 101, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(3, 'bim 20 speciaal 2007', 'default', 100, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(4, 'bim javelin F18 HT', 'default', 102, 97, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(5, 'blade F16 (2)', 'default', 106, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(6, 'C2', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(7, 'capricorn F18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(8, 'cirrus F18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(9, 'coolcat 18', 'default', 115, 109, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(10, 'dart 16', 'default', 128, 121, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(11, 'dart 18 (1)', 'default', 121, 113, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(12, 'dart 18 (2)', 'default', 120, 112, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(13, 'dart 20', 'default', 107, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(14, 'dart hawk', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(15, 'dominator', 'default', 100, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(16, 'eagle 18 carbon SL', 'default', 103, 98, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(17, 'eagle 20 carbon', 'default', 94, 90, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(18, 'eagle 20 carbon T', 'default', 96, 91, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(19, 'eagle 20 Hilger', 'default', 97, 93, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(20, 'eagle 20 strabr large', 'default', 91, 87, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(21, 'eagle 20 strabr small', 'default', 96, 91, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(22, 'eagle F20', 'default', 101, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(23, 'eagle strabr small no jib', 'default', 102, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(24, 'exploder 20', 'default', 102, 97, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(25, 'exploder 20 carbon', 'default', 98, 93, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(26, 'exploder F18', 'default', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(27, 'extreme 20', 'default', 93, 87, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(28, 'extreme 20 BW code0', 'default', 82, 81, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(29, 'extreme 20 BW spi', 'default', 97, 89, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(30, 'extreme 20 NED1', 'default', 92, 87, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(31, 'extreme 20 SW code0', 'default', 83, 83, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(32, 'extreme 20 SW spi', 'default', 101, 92, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(33, 'extreme 20 vs', 'default', 91, 87, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(34, 'falcon F16 (1)', 'default', 107, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(35, 'falcon F16 (2)', 'default', 106, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(36, 'flaXcat proto 2 2003', 'default', 112, 107, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(37, 'formule 16 (2)', 'default', 106, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(38, 'formule 18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(39, 'formule 18 Hightech', 'default', 102, 97, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(40, 'formule 20', 'formule 20', 101, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(41, 'G-Cat 5.7', 'default', 111, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(42, 'hobie 14 (1)', 'default', 136, 128, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(43, 'hobie 14s (1)', 'default', 125, 120, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(44, 'hobie 16', 'default', 118, 112, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(45, 'hobie 17 (1)', 'default', 120, 114, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(46, 'hobie 17s (1)', 'default', 112, 108, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(47, 'hobie 18', 'default', 112, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(48, 'hobie 18 form.', 'default', 107, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(49, 'hobie 18 magnum', 'default', 112, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(50, 'hobie 18 tiger', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(51, 'hobie 20 fox', 'formule 20', 101, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(52, 'hobie fox concept', 'default', 93, 89, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(53, 'hobie Fox extreme', 'default', 100, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(54, 'hobie fx one (1)', 'default', 111, 105, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(55, 'hobie fx one (2)', 'default', 109, 105, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(56, 'hobie max', 'default', 123, 117, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(57, 'hobie pacific', 'default', 110, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(58, 'hobie tatoo', 'default', 127, 123, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(59, 'hobie wild cat', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(60, 'hunter 18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(61, 'hurricane 5.9', 'default', 104, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(62, 'hydra 16', 'default', 123, 115, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(63, 'KL 17.5', 'default', 118, 111, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(64, 'KL F18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(65, 'M18 (1)', 'default', 99, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(66, 'M20', 'default', 98, 92, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(67, 'M20 AN1', 'default', 97, 91, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(68, 'M20 GT / Large Spi', 'default', 98, 91, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(69, 'M20 GTI large spi', 'default', 93, 88, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(70, 'M20 HD1', 'default', 94, 89, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(71, 'M20 JPS', 'default', 90, 86, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(72, 'M20 RH1', 'default', 99, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(73, 'M20 RH3', 'default', 106, 99, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(74, 'M20 RK1', 'default', 103, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(75, 'M20 RK2', 'default', 97, 91, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(76, 'M20 Vampire', 'default', 90, 86, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(77, 'M20 XP1', 'default', 89, 85, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(78, 'mattia 18', 'default', 107, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(79, 'mattia F18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(80, 'miracle 6.0', 'default', 104, 99, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(81, 'mystere 5.0 xl', 'default', 116, 110, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(82, 'mystere 5.5', 'default', 105, 101, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(83, 'nacra 18 (2)(3.3)', 'default', 113, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(84, 'nacra 18m2 (1)', 'default', 103, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(85, 'nacra 20 large', 'default', 101, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(86, 'nacra 4.5 (1)', 'default', 123, 118, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(87, 'nacra 4.5 (1) jib', 'default', 115, 113, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(88, 'nacra 4.5 (2)', 'default', 122, 116, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(89, 'nacra 500 (2)', 'default', 118, 111, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(90, 'nacra 570', 'default', 110, 105, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(91, 'nacra 580(provisional)', 'default', 108, 101, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(92, 'nacra 5.0 (2)', 'default', 119, 112, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(93, 'nacra 5.2', 'default', 111, 105, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(94, 'nacra 5.5 sl', 'default', 106, 101, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(95, 'nacra 5.7', 'default', 112, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(96, 'nacra 5.8', 'default', 106, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(97, 'nacra 6.0', 'default', 104, 99, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(98, 'nacra 6.0 SE 006-007', 'default', 98, 94, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(99, 'nacra blast', 'default', 122, 117, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(100, 'nacra F17 Sloop', 'default', 109, 104, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(101, 'nacra F17 (1)', 'default', 112, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(102, 'nacra F18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(103, 'nacra F20 carbon', 'default', 93, 89, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(104, 'nacra infusion', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(105, 'nacra inter 17 (1)', 'default', 115, 108, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(106, 'nacra inter 17 (1) jib', 'default', 108, 103, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(107, 'nacra inter 17 (2)', 'default', 113, 107, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(108, 'nacra inter 18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(109, 'nacra inter 20', 'formule 20', 101, 96, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(110, 'piranha 17', 'default', 114, 108, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(111, 'predator 20', 'default', 102, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(112, 'predator 20C', 'default', 100, 93, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(113, 'prindle 15 (1)', 'default', 125, 119, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(114, 'prindle 16', 'default', 121, 114, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(115, 'prindle 18', 'default', 115, 109, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(116, 'prindle 18-2', 'default', 108, 103, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(117, 'prindle 18-2 torrig', 'default', 106, 101, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(118, 'prindle 18 escape', 'default', 116, 109, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(119, 'prindle 19', 'default', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(120, 'shockwave F18', 'formule 18', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(121, 'SL 16', 'default', 120, 115, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(122, 'stealth F16 (2)', 'default', 106, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(123, 'stealth F18 HT', 'default', 102, 97, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(124, 'supercat 17', 'default', 112, 107, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(125, 'supercat 20 Texel', 'default', 97, 92, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(126, 'swell spitfire', 'default', 108, 104, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(127, 'swell spitfire RW', 'default', 107, 103, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(128, 'topcat F2 (2)', 'default', 127, 120, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(129, 'topcat k1 big jib', 'default', 111, 106, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(130, 'topcat k2 (2)', 'default', 114, 108, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(131, 'topcat k2 (2) small jib', 'default', 115, 109, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(132, 'topcat K3 (1)', 'default', 120, 114, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(133, 'topcat K3 (2)', 'default', 119, 112, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(134, 'tornado', 'default', 99, 94, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(135, 'tornado 420 (minicorn) (1)', 'default', 124, 118, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(136, 'tornado classic', 'default', 100, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(137, 'ventilo 18', 'default', 108, 102, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(138, 'viper (1)', 'default', 110, 105, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(139, 'viper (2)', 'default', 108, 104, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(140, 'White Formula 20', 'default', 100, 95, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(141, 'Wildcat Lynx', 'default', 109, 104, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(142, 'X19', 'default', 102, 97, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(143, 'cirrus R', 'formule 18, default', 105, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(144, 'nacra 17 (2)', 'default', 104, 100, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(146, 'nacra F16 (2)', 'default', 108, 104, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(147, 'nacra F16 (1)', 'default', 110, 105, 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(148, 'Dart 15 default', 'NogGeenKlasse', 0, 0, 1, NULL, NULL, '2014-02-13 11:15:40', '2014-02-13 11:15:40');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `borg`
--

CREATE TABLE IF NOT EXISTS `borg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `betaalwijze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `betaaldatum` date NOT NULL,
  `terugbetaald` tinyint(1) NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `configuratie`
--

CREATE TABLE IF NOT EXISTS `configuratie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenttarget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nederlands` tinyint(1) NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Gegevens worden uitgevoerd voor tabel `configuratie`
--

INSERT INTO `configuratie` (`id`, `contenttarget`, `content`, `nederlands`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'registrationstep1', '<p>Welkom bij het online inschrijfformulier van de Ronde om Texel.<br />\r\nSelecteer hier uw taal.</p>\r\n\r\n<p>Welcome at the online registrationform of the Round of Texel<br />\r\nYou can select your language here.</p>', 0, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:18:35'),
(2, 'registrationstep1', '<p>Welkom bij het online inschrijfformulier van de Ronde om Texel.<br />\r\nSelecteer hier uw taal.</p>\r\n\r\n<p>Welcome at the online registrationform of the Round of Texel<br />\r\nYou can select your language here.</p>', 1, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:18:35'),
(3, 'registrationstep2', '<p>Before filling in the Entry-form you have to read the Notice of Race carefully and accept the rules.<br />\r\nUnder this Notice of Race you find a button to proceed to the next step.</p>', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:33:32'),
(4, 'registrationstep2', '<p>Voordat u zich inschrijft bent u verplicht de Notice of Race goed te lezen en dient u akkoord te gaan met het regelement.<br />\r\nOnder de Notice of Race vindt u een knop om door te gaan naar de volgende stap.</p>', 1, NULL, 'g.le.grand', '2013-11-11 10:56:33', '2014-01-27 09:07:55'),
(5, 'registrationstep3', '<p>\r\n	<strong>Sailor type</strong></p>\r\n<div>\r\n	You can choose to participate in either the <strong>Gold Fleet </strong>or in the <strong>Silver Fleet</strong>:</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The <strong>Gold Fleet</strong> is the race class for competing sailors. Participants in the <strong>Gold Fleet</strong> can also take part in the races for the Zwitserleven Open Dutch Championship (Texel Dutch Open en het Nacra Infusion World Championship) and in the Horstocht.</div>\r\n<div>\r\n	Participants with the Dutch nationality must be member of a sailing club which is associated with the Dutch Watersportverbond; they must have a personal starting license and (if required by their boat&#39;s Class Association) a measurement certificate for the boat. If they want to display advertising on boat and/or sails, they must also have an advertising license and can only participate in the <strong>Gold Fleet</strong>.</div>\r\n<div>\r\n	Further details in the Notice of Race.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The Silver Fleet is the endurance challenge for recreational sailors. Participants in the <strong>Silver Fleet</strong> can also take part in the Horstocht.</div>\r\n<div>\r\n	There are no further requirements for participants with the Dutch nationality. If they want to display advertising on boat and/or sails, they cannot participate in the <strong>Silver Fleet.</strong></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Further details in the Notice of Race.</div>\r\n<div>\r\n	&nbsp;</div>\r\n', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(6, 'registrationstep3', '<p>\r\n	<strong>Keuze deelname</strong></p>\r\n<p>\r\n	U kunt er voor kiezen deel te nemen in de <strong>Gold Fleet</strong> of in de <strong>Silver Fleet</strong>:</p>\r\n<p>\r\n	De <strong>Gold Fleet</strong> is de wedstrijdklasse voor de wedstrijdzeilers. Deelnemers in de <strong>Gold Fleet</strong> mogen ook deelnemen aan de wedstrijden van het Zwitserleven Open Nederlands Kampioenschap (Texel Dutch Open en het Nacra Infusion World Championship) en de Horstocht. Deelnemers met de Nederlandse nationaliteit moeten lid zijn van een bij het Watersportverbond aangesloten watersportvereniging, een persoonlijke startlicentie en een meetbrief voor hun boot hebben (indien van toepassing voor betreffende klasse). Indien u reclame op boot en/of zeilen voert, dient u bovendien te beschikken over een reclamecertificaat van het Watersportverbond en kunt u uitsluitend deelnemen in de <strong>Gold Fleet</strong>.</p>\r\n<p>\r\n	De <strong>Silver Fleet</strong> is de prestatie-/toertocht voor de recreatieve zeilers. Deelnemers in de <strong>Silver Fleet</strong> mogen ook deelnemen aan de Horstocht. Er zijn geen verdere vereisten voor deelnemers met de Nederlandse nationaliteit. Indien u reclame op boot en/of zeilen voert, kunt u niet deelnemen in de <strong>Silver Fleet</strong>.</p>\r\n<p>\r\n	Verdere details vindt u in de Notice of Race.</p>\r\n', 1, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(7, 'registrationstep4', '<p>Gegevens van de stuurman.</p>', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:34:43'),
(8, 'registrationstep4', '<p>Information about the sailor.</p>', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:34:43'),
(9, 'registrationstep5', '<p>Gegevens van de fokkemaat.</p>', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:35:00'),
(10, 'registrationstep5', '<p>Information about the co-sailor.</p>', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:35:00'),
(11, 'registrationstep6', '<p>Boot gegevens</p>', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:36:07'),
(12, 'registrationstep6', '<p>Information about the boat</p>', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-11 12:36:07'),
(13, 'registrationstep7', '<p>\r\n	<strong>Overzicht</strong></p>\r\n<p>\r\n	Controleer de informatie die u heeft ingevoerd en verander deze indien nodig.</p>\r\n', 1, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(14, 'registrationstep7', '<p>\r\n	<strong>Overview</strong></p>\r\n<p>\r\n	Please check the information you entered and adapt if necessary.</p>\r\n', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(15, 'registrationstep8', '<p>\r\n	<strong>Akkoord</strong></p>\r\n<p>\r\n	Als u op &#39;Volgende&#39; klikt verklaart u geheel voor eigen rekening en risico aan de Zwitserleven Ronde Om Texel mee te doen. Het wedstrijdcomit&eacute;&nbsp;is niet aansprakelijk voor enige schade, welke dan ook, waaronder begrepen schade aan schip, aan de opvarende (incl. dodelijk ongeval) en aan boord aanwezige goederen, welke direct of indirect in verband met de deelneming aan de wedstrijd zou kunnen ontstaan. Door het versturen van het inschrijfformulier verklaart de deelnemer zich te onderwerpen aan: de Notice of Race, het wedstrijdreglement van de ISAF, de wedstrijdbepalingen Zwitserleven Ronde om Texel, de Texel-Rating reglementen en aan de Klassenvoorschriften.</p>\r\n', 1, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(16, 'registrationstep8', '<p>\r\n	<strong>Agree</strong></p>\r\n<p>\r\n	When you click the &#39;next&#39; button on this form the competitor declares to take part in the Zwitserleven Ronde om Texel at their own risk. The Organising Authority or any party of person involved in the organisation of the Zwitserleven Ronde om Texel 2012 will not accept any liability whatsoever for any injury (including death) personal or material damage, loss or claim sustained by a competitor, or prior to, during or after the Zwitserleven Ronde om Texel. Competitors agree to be bound by the Notice of Race, the Racing Rules of Sailing of the ISAF, the Class Rules, the Texel-Rating rules and by the Sailing Instructions.</p>\r\n', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(17, 'registrationstep9', '<p>\r\n	<strong>Verzonden</strong></p>\r\n<p>\r\n	Het formulier is succesvol verzonden!<br />\r\n	Je staat nu ingeschreven voor de Ronde van Texel.</p>\r\n<p>\r\n	U ontvangt binnen 10 minuten een mail met extra informatie.<br />\r\n	Indien u de mail niet ontvangt, kijk dan in uw map met ongewenste mail.</p>\r\n<p>\r\n	&lt;&lt;&lt;#Indien de registratie fout is gegaan -Deze regel niet verwijderen-#&gt;&gt;&gt;</p>\r\n<p>\r\n	<strong>Mislukt</strong></p>\r\n<p>\r\n	Er is een fout opgetreden tijdens het aanmaken van uw deelname.<br />\r\n	Probeer het later opnieuw of neem contact op met de RoT.</p>\r\n', 1, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(18, 'registrationstep9', '<p>\r\n	<strong>Sent</strong></p>\r\n<p>\r\n	The form is sent successfully!<br />\r\n	You are now registered for the Round of Texel.</p>\r\n<p>\r\n	You will receive a mail within the next 10 minutes with additional information.<br />\r\n	When you don&#39;t receive the mail, check your unwanted mail folder.</p>\r\n<p>\r\n	&lt;&lt;&lt;#Indien de registratie fout is gegaan -Deze regel niet verwijderen- #&gt;&gt;&gt;</p>\r\n<p>\r\n	<strong>Failed</strong></p>\r\n<p>\r\n	An error occured during the process of creating your registration.<br />\r\n	Try again later or contact the RoT crew.</p>\r\n', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(19, 'aanmeldingmailhtml', '<p><strong>Beste [aanmelder],</strong></p>\r\n\r\n<p>Hartelijk dank voor uw aanmelding voor de Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.<br />\r\nUw aanvraag wordt behandeld als uw betaling op onze rekening staat.<br />\r\nUw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.</p>\r\n\r\n<p><strong>Inschrijfgeld</strong></p>\r\n\r\n<p>GOLD FLEET (wedstrijd)Een-mansbootTwee-mansbootInschrijvingen voor 15 mei&euro; 105,-&euro; 115,-Inschrijvingen op of na 15 mei&euro; 145,-&euro; 155,0</p>\r\n\r\n<p><br />\r\nSILVER FLEET (recreatief)Een-mansbootTwee-mansbootInschrijvingen voor 15 mei&euro; 95,-&euro; 115,-Inschrijvingen op of na 15 mei&euro; 135,-&euro; 145,-</p>\r\n\r\n<p>De ontvangst van uw betaling geldt als officie&Igrave;&circ;le datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:<br />\r\nRekeningnummer: 36 25 85 733 Ten name van &quot;Stichting Ronde om Texel&quot;, Den Burg</p>\r\n\r\n<p>Rabobank Noord-Holland Noord Postbus 106<br />\r\n1780 AC Den Helder<br />\r\nHolland</p>\r\n\r\n<p>*Voor betalingen vanuit het buitenland:<br />\r\n*BIC-code: RABONL2U<br />\r\n*IBAN nummer: NL61RABO 0362585733<br />\r\n<br />\r\nGelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER</p>\r\n\r\n<p>Betalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.</p>\r\n\r\n<p>Zodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.<br />\r\nRond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.<br />\r\nOverige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.</p>\r\n\r\n<p>Betalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.</p>\r\n\r\n<p><strong>Informatie over Inschrijvingen</strong><br />\r\nMarie-Christine Pijnenburg<br />\r\nE-mail: info@roundtexel.com<br />\r\nTelefoon: +31.222.32 70 79<br />\r\nFax: +31.222.32 04 20</p>', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:25:57'),
(20, 'aanmeldingmailhtml', '<p><strong>Dear [aanmelder],</strong></p>\r\n\r\n<p>Hartelijk dank voor uw aanmelding voor de&nbsp;Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.<br />\r\nUw aanvraag wordt behandeld als uw betaling op onze rekening staat.<br />\r\nUw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.</p>\r\n\r\n<p><strong>Inschrijfgeld</strong></p>\r\n\r\n<p>GOLD FLEET (wedstrijd)Een-mansbootTwee-mansbootInschrijvingen voor 15 mei&euro; 105,-&euro; 115,-Inschrijvingen op of na 15 mei&euro; 145,-&euro; 155,0</p>\r\n\r\n<p><br />\r\nSILVER FLEET (recreatief)Een-mansbootTwee-mansbootInschrijvingen voor 15 mei&euro; 95,-&euro; 115,-Inschrijvingen op of na 15 mei&euro; 135,-&euro; 145,-</p>\r\n\r\n<p>De ontvangst van uw betaling geldt als officie&Igrave;&circ;le datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:<br />\r\nRekeningnummer: 36 25 85 733 Ten name van &quot;Stichting Ronde om Texel&quot;, Den Burg</p>\r\n\r\n<p>Rabobank Noord-Holland Noord Postbus 106<br />\r\n1780 AC Den Helder<br />\r\nHolland</p>\r\n\r\n<p>*Voor betalingen vanuit het buitenland:<br />\r\n*BIC-code: RABONL2U<br />\r\n*IBAN nummer: NL61RABO 0362585733<br />\r\n<br />\r\nGelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER</p>\r\n\r\n<p>Betalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.</p>\r\n\r\n<p>Zodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.<br />\r\nRond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.<br />\r\nOverige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.</p>\r\n\r\n<p>Betalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.</p>\r\n\r\n<p><strong>Informatie over Inschrijvingen</strong><br />\r\nMarie-Christine Pijnenburg<br />\r\nE-mail: info@roundtexel.com<br />\r\nTelefoon: +31.222.32 70 79<br />\r\nFax: +31.222.32 04 20</p>', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:25:57'),
(21, 'aanmeldingmailplain', 'Beste [aanmelder],\r\n\r\nHartelijk dank voor uw aanmelding voor de Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.\r\nUw aanvraag wordt behandeld als uw betaling op onze rekening staat.\r\nUw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.\r\n\r\nInschrijfgeld\r\nGOLD FLEET (wedstrijd)	Een-mansboot	Twee-mansboot\r\nInschrijvingen voor 15 mei	Euro 105,-	Euro 115,-\r\nInschrijvingen op of na 15 mei	Euro 145,-	Euro 155,0\r\nSILVER FLEET (recreatief)	Een-mansboot	Twee-mansboot\r\nInschrijvingen voor 15 mei	Euro 95,-	Euro 115,-\r\nInschrijvingen op of na 15 mei	Euro 135,-	Euro 145,-\r\n\r\nDe ontvangst van uw betaling geldt als officie├î╦åle datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:\r\nRekeningnummer: 36 25 85 733 Ten name van "Stichting Ronde om Texel", Den Burg\r\n\r\nRabobank Noord-Holland Noord Postbus 106\r\n1780 AC Den Helder\r\nHolland\r\n\r\n*Voor betalingen vanuit het buitenland:\r\n*BIC-code: RABONL2U\r\n*IBAN nummer: NL61RABO 0362585733\r\n\r\nGelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER\r\n\r\nBetalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.\r\n\r\nZodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.\r\nRond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.\r\nOverige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.\r\n\r\nBetalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.\r\n\r\nInformatie over Inschrijvingen\r\nMarie-Christine Pijnenburg\r\nE-mail: info@roundtexel.com\r\nTelefoon: +31.222.32 70 79\r\nFax: +31.222.32 04 20', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:25:57'),
(22, 'aanmeldingmailplain', 'Dear [aanmelder],\r\n\r\nHartelijk dank voor uw aanmelding voor de Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.\r\nUw aanvraag wordt behandeld als uw betaling op onze rekening staat.\r\nUw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.\r\n\r\nInschrijfgeld\r\nGOLD FLEET (wedstrijd)	Een-mansboot	Twee-mansboot\r\nInschrijvingen voor 15 mei	Euro 105,-	Euro 115,-\r\nInschrijvingen op of na 15 mei	Euro 145,-	Euro 155,0\r\nSILVER FLEET (recreatief)	Een-mansboot	Twee-mansboot\r\nInschrijvingen voor 15 mei	Euro 95,-	Euro 115,-\r\nInschrijvingen op of na 15 mei	Euro 135,-	Euro 145,-\r\n\r\nDe ontvangst van uw betaling geldt als officie├î╦åle datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:\r\nRekeningnummer: 36 25 85 733 Ten name van "Stichting Ronde om Texel", Den Burg\r\n\r\nRabobank Noord-Holland Noord Postbus 106\r\n1780 AC Den Helder\r\nHolland\r\n\r\n*Voor betalingen vanuit het buitenland:\r\n*BIC-code: RABONL2U\r\n*IBAN nummer: NL61RABO 0362585733\r\n\r\nGelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER\r\n\r\nBetalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.\r\n\r\nZodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.\r\nRond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.\r\nOverige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.\r\n\r\nBetalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.\r\n\r\nInformatie over Inschrijvingen\r\nMarie-Christine Pijnenburg\r\nE-mail: info@roundtexel.com\r\nTelefoon: +31.222.32 70 79\r\nFax: +31.222.32 04 20', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:25:57'),
(23, 'aanmeldingmailsubject', 'Bevestiging inschrijving Ronde Om Texel', 1, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(24, 'aanmeldingmailsubject', 'Confirmation registration Round of Texel', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(25, 'bevestigingmailhtml', '<p>Beste [aanmelder],</p>\r\n\r\n<p>Wij hebben uw inschrijving en betaling ontvangen. Tot ons genoegen kunnen wij u mededelen dat u definitief bent ingeschreven. Rond 20 mei ontvangt u ter bevestiging het nieuwe &quot;Ronde om TexeL&quot;- boekje en de wedstrijdbepaling.</p>\r\n\r\n<p>Met vriendelijke groet,</p>\r\n\r\n<p>Marie Christine Pijnenburg (inschrijvingen Ronde om Texel)</p>\r\n\r\n<p>Email: info@roundtexel.com<br />\r\nTelefoon: 0222-327079<br />\r\n&nbsp;</p>', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:26:39'),
(26, 'bevestigingmailhtml', '<p>Dear [aanmelder],</p>\r\n\r\n<p>We received your entry-form and payment. We are happy to inform you that your entry is complete. By May 20th we will send you the &quot;Ronde om Texel&quot; booklet and the sailing instructions.</p>\r\n\r\n<p>Kind regards,</p>\r\n\r\n<p>Marie Christine Pijnenburg (Registration Office)</p>\r\n\r\n<p>Email: info@roundtexel.com<br />\r\nTelefoon: 0222-327079<br />\r\n&nbsp;</p>', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:26:39'),
(27, 'bevestigingmailplain', 'Beste [aanmelder],\r\n\r\nWij hebben uw inschrijving en betaling ontvangen. Tot ons genoegen kunnen wij u mededelen dat u definitief bent ingeschreven. Rond 20 mei ontvangt u ter bevestiging het nieuwe "Ronde om TexeL"- boekje en de wedstrijdbepaling.\r\n\r\nMet vriendelijke groet,\r\n\r\nMarie Christine Pijnenburg (inschrijvingen Ronde om Texel)\r\n\r\nEmail: info@roundtexel.com\r\nTelefoon: 0222-327079', 1, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:26:39'),
(28, 'bevestigingmailplain', 'Dear [aanmelder],\r\n\r\nWe received your entry-form and payment. We are happy to inform you that your entry is complete. By May 20th we will send you the "Ronde om Texel" booklet and the sailing instructions.\r\n\r\nKind regards,\r\n\r\nMarie Christine Pijnenburg (Registration Office)\r\n\r\nEmail: info@roundtexel.com\r\nTelefoon: 0222-327079', 0, NULL, 'r.verweij', '2013-11-11 10:56:33', '2013-11-14 09:26:39'),
(29, 'bevestigingmailsubject', 'Bevestiging deelname Ronde om Texel', 1, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(30, 'bevestigingmailsubject', 'Confirmation participation Round of Texel', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(31, 'sitetitel', 'Ronde om Texel', 1, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:15:55'),
(32, 'sitetitel', 'Round of Texel', 0, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:15:55'),
(33, 'siteondertitel', 'Ronde om Texel op 28 juni 2014', 1, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:15:55'),
(34, 'siteondertitel', 'Round of Texel on 28 June 2014', 0, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:15:55'),
(35, 'siteregistratietitel', 'Inschrijfformulier', 1, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:15:55'),
(36, 'siteregistratietitel', 'Registrationform', 0, NULL, 'root', '2013-11-11 10:56:33', '2014-03-27 12:15:55');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelname`
--

CREATE TABLE IF NOT EXISTS `deelname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uitzonderingid` int(11) DEFAULT NULL,
  `bootid` int(11) NOT NULL,
  `parkeerkaartid` int(11) DEFAULT NULL,
  `kenteken` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stuurmanid` int(11) NOT NULL,
  `verenigingid` int(11) DEFAULT NULL,
  `betalingid` int(11) DEFAULT NULL,
  `borgid` int(11) DEFAULT NULL,
  `fokkemaatid` int(11) DEFAULT NULL,
  `inschrijfdatum` date NOT NULL,
  `nederlands` tinyint(1) DEFAULT NULL,
  `reserveringscode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zeilnummer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startnummer` int(11) DEFAULT NULL,
  `meetbrief` tinyint(1) DEFAULT NULL,
  `meetbriefnummer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persoonlijkereclamelicentie` tinyint(1) DEFAULT NULL,
  `persoonlijkereclamelicentienummer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bootklasse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reclame` tinyint(1) DEFAULT NULL,
  `sponsor` tinyint(1) DEFAULT NULL,
  `spinnaker` tinyint(1) DEFAULT NULL,
  `fleet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finishtijd` int(11) DEFAULT NULL,
  `modrating` int(11) DEFAULT NULL,
  `gecorrigeerdefinishtijd` int(11) DEFAULT NULL,
  `memberstatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `racestatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verzekeringsbewijsstatus` tinyint(1) DEFAULT NULL,
  `xcbstatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dutchopenstatus` tinyint(1) DEFAULT NULL,
  `aanmeldingsmail` datetime DEFAULT NULL,
  `bevestigingsmail` datetime DEFAULT NULL,
  `bevestigingbriefstatus` tinyint(1) DEFAULT NULL,
  `helaasbriefstatus` tinyint(1) DEFAULT NULL,
  `horstochtstatus` tinyint(1) DEFAULT NULL,
  `nacrachampstatus` tinyint(1) DEFAULT NULL,
  `tochtnoordstatus` tinyint(1) DEFAULT NULL,
  `aangemeld` tinyint(1) DEFAULT NULL,
  `afgemeld` tinyint(1) DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9391B7D51120B899` (`stuurmanid`),
  UNIQUE KEY `UNIQ_9391B7D51E1F1D55` (`parkeerkaartid`),
  UNIQUE KEY `UNIQ_9391B7D5A62252CC` (`betalingid`),
  UNIQUE KEY `UNIQ_9391B7D59DD22F73` (`borgid`),
  UNIQUE KEY `UNIQ_9391B7D547891580` (`fokkemaatid`),
  KEY `IDX_9391B7D58EFB9DA1` (`uitzonderingid`),
  KEY `IDX_9391B7D521C1BD18` (`bootid`),
  KEY `IDX_9391B7D54774F014` (`verenigingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=133 ;

--
-- Gegevens worden uitgevoerd voor tabel `deelname`
--

INSERT INTO `deelname` (`id`, `uitzonderingid`, `bootid`, `parkeerkaartid`, `kenteken`, `stuurmanid`, `verenigingid`, `betalingid`, `borgid`, `fokkemaatid`, `inschrijfdatum`, `nederlands`, `reserveringscode`, `zeilnummer`, `startnummer`, `meetbrief`, `meetbriefnummer`, `persoonlijkereclamelicentie`, `persoonlijkereclamelicentienummer`, `bootklasse`, `reclame`, `sponsor`, `spinnaker`, `fleet`, `finishtijd`, `modrating`, `gecorrigeerdefinishtijd`, `memberstatus`, `racestatus`, `verzekeringsbewijsstatus`, `xcbstatus`, `dutchopenstatus`, `aanmeldingsmail`, `bevestigingsmail`, `bevestigingbriefstatus`, `helaasbriefstatus`, `horstochtstatus`, `nacrachampstatus`, `tochtnoordstatus`, `aangemeld`, `afgemeld`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(122, NULL, 8, NULL, NULL, 124, 4, NULL, NULL, NULL, '2014-03-27', 0, 'gMWXLhqwkA', '321321', 4, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 1043918, 90, 939526, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', NULL, '2014-03-27 12:23:52', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'root', '2014-03-27 12:23:52', '2014-04-15 10:33:01'),
(123, NULL, 3, NULL, NULL, 125, 2, NULL, NULL, 109, '2014-03-27', 0, 'QOWPS8eZtJ', 'asdf', 3, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1043861, 100, 1043861, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', NULL, '2014-03-27 13:09:59', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'root', '2014-03-27 13:09:58', '2014-04-15 10:33:01'),
(125, NULL, 17, 8, '1-ABC-23', 127, 3, NULL, NULL, 110, '2014-04-24', 1, 'LDbNFqKVOi', '321321', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', NULL, '2014-04-24 11:22:33', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'root', '2014-04-24 11:22:33', '2014-05-20 13:38:04'),
(127, NULL, 15, NULL, 'unique', 129, 2, NULL, NULL, NULL, '2014-05-13', 1, '02vgxz1cCT', 'asdf', NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', 1, '2014-05-13 14:34:17', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-05-13 14:34:17', '2014-05-13 14:34:17'),
(128, NULL, 17, NULL, 'asdf', 130, 3, NULL, NULL, NULL, '2014-05-28', 1, 'Vvg16ZHK2m', '321321', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', 0, '2014-05-28 12:35:44', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-05-28 12:35:43', '2014-05-28 12:35:43'),
(129, NULL, 16, NULL, 'TEST12', 131, 2, NULL, NULL, NULL, '2014-05-28', 1, 'Yrjwfo6uQh', 'asdf', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', 0, '2014-05-28 12:42:04', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-05-28 12:42:04', '2014-05-28 12:42:04'),
(130, NULL, 17, NULL, 'TEST12', 132, 4, NULL, NULL, NULL, '2014-05-28', 1, '12N9E5QacG', 'asdf', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', 0, '2014-05-28 12:51:46', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-05-28 12:51:46', '2014-05-28 12:51:46'),
(131, NULL, 16, NULL, 'TEST12', 133, 5, NULL, NULL, NULL, '2014-05-28', 1, 'uWP34DF5hY', 'asdf', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', 0, '2014-05-28 13:22:13', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-05-28 13:22:12', '2014-05-28 13:22:12'),
(132, NULL, 17, NULL, 'TEST12', 134, 4, NULL, NULL, 111, '2014-05-28', 1, 'QLhtIGwlKe', 'asdf', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'Geen member', 'Nog niet gestart', NULL, 'Geen Xcb', 1, '2014-05-28 13:27:10', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2014-05-28 13:27:10', '2014-05-28 13:27:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemer`
--

CREATE TABLE IF NOT EXISTS `deelnemer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationaliteitid` int(11) NOT NULL,
  `voornaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huisnummer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `woonplaats` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `land` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geslacht` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `noodtelefoon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefoon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geboortedatum` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rotmember` tinyint(1) DEFAULT NULL,
  `rotmembernumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1541DF2652DDB5FD` (`nationaliteitid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=246 ;

--
-- Gegevens worden uitgevoerd voor tabel `deelnemer`
--

INSERT INTO `deelnemer` (`id`, `nationaliteitid`, `voornaam`, `achternaam`, `tussenvoegsel`, `adres`, `huisnummer`, `woonplaats`, `postcode`, `land`, `geslacht`, `noodtelefoon`, `telefoon`, `geboortedatum`, `email`, `rotmember`, `rotmembernumber`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(232, 4, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1972-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-03-27 12:23:52', '2014-03-27 12:23:52'),
(233, 4, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1972-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-03-27 13:09:59', '2014-03-27 13:09:59'),
(234, 1, 'Henk', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1952-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-03-27 13:09:59', '2014-03-27 13:09:59'),
(235, 16, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1974-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-04-24 11:02:39', '2014-04-24 11:02:39'),
(236, 7, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1975-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-04-24 11:22:33', '2014-04-24 11:22:33'),
(237, 17, 'Truus', 'Haan', 'de', 'Churchilllaan', '83', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Vrouw', '31633349975', '31633349975', '1969-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-04-24 11:22:33', '2014-04-24 11:22:33'),
(238, 2, 'Bas', 'Haan', 'de', 'Churchilllaan', 'asdf', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1954-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-13 14:16:17', '2014-05-13 14:16:17'),
(239, 1, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1961-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-13 14:34:17', '2014-05-13 14:34:17'),
(240, 3, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1983-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-28 12:35:44', '2014-05-28 12:35:44'),
(241, 16, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1946-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-28 12:42:04', '2014-05-28 12:42:04'),
(242, 17, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1949-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-28 12:51:46', '2014-05-28 12:51:46'),
(243, 8, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1944-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-28 13:22:13', '2014-05-28 13:22:13'),
(244, 17, 'Bas', 'Haan', 'de', 'Churchilllaan', '1234', 'NIEUWKOOP', '2421GS', 'Netherlands', 'Man', '31633349975', '31633349975', '1945-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-28 13:27:10', '2014-05-28 13:27:10'),
(245, 16, 'Truus', 'Haan', 'de', 'Churchilllaan', '83', 'NIEUWKOOP', '2333DH', 'Netherlands', 'Vrouw', '31633349975', '31633349975', '1942-01-01', 'basdehaan@live.com', NULL, NULL, NULL, NULL, '2014-05-28 13:27:10', '2014-05-28 13:27:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemer_verwijderd`
--

CREATE TABLE IF NOT EXISTS `deelnemer_verwijderd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationaliteitid` int(11) NOT NULL,
  `voornaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huisnummer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `woonplaats` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `land` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geslacht` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `noodtelefoon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefoon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geboortedatum` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rotmember` tinyint(1) DEFAULT NULL,
  `rotmembernumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1541DF2652DDB5FD` (`nationaliteitid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fokkemaat`
--

CREATE TABLE IF NOT EXISTS `fokkemaat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deelnemerid` int(11) NOT NULL,
  `bemanningslicentie` tinyint(1) DEFAULT NULL,
  `bemanningslicentienummer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D13C20266A8B3E70` (`deelnemerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

--
-- Gegevens worden uitgevoerd voor tabel `fokkemaat`
--

INSERT INTO `fokkemaat` (`id`, `deelnemerid`, `bemanningslicentie`, `bemanningslicentienummer`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(109, 234, 0, NULL, NULL, NULL, '2014-03-27 13:09:59', '2014-03-27 13:09:59'),
(110, 237, 0, NULL, NULL, NULL, '2014-04-24 11:22:33', '2014-04-24 11:22:33'),
(111, 245, 0, NULL, NULL, NULL, '2014-05-28 13:27:10', '2014-05-28 13:27:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE IF NOT EXISTS `gebruiker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klasse`
--

CREATE TABLE IF NOT EXISTS `klasse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klasse_deelnames`
--

CREATE TABLE IF NOT EXISTS `klasse_deelnames` (
  `klasse_id` int(11) NOT NULL,
  `deelname_id` int(11) NOT NULL,
  PRIMARY KEY (`klasse_id`,`deelname_id`),
  KEY `IDX_AF63A78F34860711` (`klasse_id`),
  KEY `IDX_AF63A78FC18FA9D5` (`deelname_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logentry`
--

CREATE TABLE IF NOT EXISTS `logentry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nationaliteit`
--

CREATE TABLE IF NOT EXISTS `nationaliteit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationaliteit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `landcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=246 ;

--
-- Gegevens worden uitgevoerd voor tabel `nationaliteit`
--

INSERT INTO `nationaliteit` (`id`, `nationaliteit`, `landcode`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'Afghanistan', 'AF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(2, 'Albania', 'AL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(3, 'Algeria', 'DZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(4, 'American Samoa', 'AS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(5, 'Andorra', 'AD', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(6, 'Angola', 'AO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(7, 'Anguilla', 'AI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(8, 'Antarctica', 'AQ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(9, 'Antigua and Barbuda', 'AG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(10, 'Argentina', 'AR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(11, 'Armenia', 'AM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(12, 'Aruba', 'AW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(13, 'Australia', 'AU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(14, 'Austria', 'AT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(15, 'Azerbaijan', 'AZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(16, 'Bahamas', 'BS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(17, 'Bahrain', 'BH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(18, 'Bangladesh', 'BD', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(19, 'Barbados', 'BB', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(20, 'Belarus', 'BY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(21, 'Belgium', 'BE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(22, 'Belize', 'BZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(23, 'Benin', 'BJ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(24, 'Bermuda', 'BM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(25, 'Bhutan', 'BT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(26, 'Bolivia', 'BO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(27, 'Bosnia and Herzegovina', 'BA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(28, 'Botswana', 'BW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(29, 'Bouvet Island', 'BV', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(30, 'Brazil', 'BR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(31, 'British Indian Ocean Territory', 'IO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(32, 'Brunei Darussalam', 'BN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(33, 'Bulgaria', 'BG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(34, 'Burkina Faso', 'BF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(35, 'Burundi', 'BI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(36, 'Cambodia', 'KH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(37, 'Cameroon', 'CM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(38, 'Canada', 'CA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(39, 'Cape Verde', 'CV', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(40, 'Cayman Islands', 'KY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(41, 'Central African Republic', 'CF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(42, 'Chad', 'TD', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(43, 'Chile', 'CL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(44, 'China', 'CN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(45, 'Christmas Island', 'CX', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(46, 'Cocos (Keeling) Islands', 'CC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(47, 'Colombia', 'CO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(48, 'Comoros', 'KM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(49, 'Congo', 'CG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(50, 'Cook Islands', 'CK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(51, 'Costa Rica', 'CR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(52, 'Cote D''Ivoire (Ivory Coast)', 'CI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(54, 'Cuba', 'CU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(55, 'Cyprus', 'CY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(56, 'Czech Republic', 'CZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(57, 'Czechoslovakia (former)', 'CS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(58, 'Denmark', 'DK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(59, 'Djibouti', 'DJ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(60, 'Dominica', 'DM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(61, 'Dominican Republic', 'DO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(62, 'Dutch', 'NL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(63, 'East Timor', 'TP', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(64, 'Ecuador', 'EC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(65, 'Egypt', 'EG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(66, 'El Salvador', 'SV', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(67, 'Equatorial Guinea', 'GQ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(68, 'Eritrea', 'ER', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(69, 'Estonia', 'EE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(70, 'Ethiopia', 'ET', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(71, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(72, 'Faroe Islands', 'FO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(73, 'Fiji', 'FJ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(74, 'Finland', 'FI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(75, 'France', 'FR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(76, 'France, Metropolitan', 'FX', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(77, 'French Guiana', 'GF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(78, 'French Polynesia', 'PF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(79, 'French Southern Territories', 'TF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(80, 'Gabon', 'GA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(81, 'Gambia', 'GM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(82, 'Georgia', 'GE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(83, 'Germany', 'DE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(84, 'Ghana', 'GH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(85, 'Gibraltar', 'GI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(86, 'Great Britain (UK)', 'GB', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(87, 'Greece', 'GR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(88, 'Greenland', 'GL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(89, 'Grenada', 'GD', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(90, 'Guadeloupe', 'GP', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(91, 'Guam', 'GU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(92, 'Guatemala', 'GT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(93, 'Guinea', 'GN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(94, 'Guinea-Bissau', 'GW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(95, 'Guyana', 'GY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(96, 'Haiti', 'HT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(97, 'Heard and McDonald Islands', 'HM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(98, 'Honduras', 'HN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(99, 'Hong Kong', 'HK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(100, 'Hungary', 'HU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(101, 'Iceland', 'IS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(102, 'India', 'IN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(103, 'Indonesia', 'ID', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(104, 'Iran', 'IR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(105, 'Iraq', 'IQ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(106, 'Ireland', 'IE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(107, 'Israel', 'IL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(108, 'Italy', 'IT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(109, 'Jamaica', 'JM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(110, 'Japan', 'JP', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(111, 'Jordan', 'JO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(112, 'Kazakhstan', 'KZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(113, 'Kenya', 'KE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(114, 'Kiribati', 'KI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(115, 'Korea (North)', 'KP', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(116, 'Korea (South)', 'KR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(117, 'Kuwait', 'KW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(118, 'Kyrgyzstan', 'KG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(119, 'Laos', 'LA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(120, 'Latvia', 'LV', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(121, 'Lebanon', 'LB', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(122, 'Lesotho', 'LS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(123, 'Liberia', 'LR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(124, 'Libya', 'LY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(125, 'Liechtenstein', 'LI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(126, 'Lithuania', 'LT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(127, 'Luxembourg', 'LU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(128, 'Macau', 'MO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(129, 'Macedonia', 'MK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(130, 'Madagascar', 'MG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(131, 'Malawi', 'MW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(132, 'Malaysia', 'MY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(133, 'Maldives', 'MV', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(134, 'Mali', 'ML', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(135, 'Malta', 'MT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(136, 'Marshall Islands', 'MH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(137, 'Martinique', 'MQ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(138, 'Mauritania', 'MR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(139, 'Mauritius', 'MU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(140, 'Mayotte', 'YT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(141, 'Mexico', 'MX', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(142, 'Micronesia', 'FM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(143, 'Moldova', 'MD', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(144, 'Monaco', 'MC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(145, 'Mongolia', 'MN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(146, 'Montserrat', 'MS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(147, 'Morocco', 'MA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(148, 'Mozambique', 'MZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(149, 'Myanmar', 'MM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(150, 'Namibia', 'NA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(151, 'Nauru', 'NR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(152, 'Nepal', 'NP', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(153, 'Netherlands', 'NL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(154, 'Netherlands Antilles', 'AN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(155, 'Neutral Zone', 'NT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(156, 'New Caledonia', 'NC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(157, 'New Zealand (Aotearoa)', 'NZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(158, 'Nicaragua', 'NI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(159, 'Niger', 'NE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(160, 'Nigeria', 'NG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(161, 'Niue', 'NU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(162, 'Norfolk Island', 'NF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(163, 'Northern Mariana Islands', 'MP', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(164, 'Norway', 'NO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(165, 'Oman', 'OM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(166, 'Pakistan', 'PK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(167, 'Palau', 'PW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(168, 'Panama', 'PA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(169, 'Papua New Guinea', 'PG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(170, 'Paraguay', 'PY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(171, 'Peru', 'PE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(172, 'Philippines', 'PH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(173, 'Pitcairn', 'PN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(174, 'Poland', 'PL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(175, 'Portugal', 'PT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(176, 'Puerto Rico', 'PR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(177, 'Qatar', 'QA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(178, 'Reunion', 'RE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(179, 'Romania', 'RO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(180, 'Russian Federation', 'RU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(181, 'Rwanda', 'RW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(182, 'Saint Kitts and Nevis', 'KN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(183, 'Saint Lucia', 'LC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(184, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(185, 'Samoa', 'WS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(186, 'San Marino', 'SM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(187, 'Sao Tome and Principe', 'ST', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(188, 'Saudi Arabia', 'SA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(189, 'Senegal', 'SN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(190, 'Seychelles', 'SC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(191, 'Sierra Leone', 'SL', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(192, 'Singapore', 'SG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(193, 'Slovak Republic', 'SK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(194, 'Slovenia', 'SI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(195, 'Solomon Islands', 'Sb', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(196, 'Somalia', 'SO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(197, 'South Africa', 'ZA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(198, 'Spain', 'ES', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(199, 'Sri Lanka', 'LK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(200, 'St. Helena', 'SH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(201, 'St. Pierre and Miquelon', 'PM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(202, 'Sudan', 'SD', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(203, 'Suriname', 'SR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(204, 'Svalbard and Jan Mayen Islands', 'SJ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(205, 'Swaziland', 'SZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(206, 'Sweden', 'SE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(207, 'Switzerland', 'CH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(208, 'Syria', 'SY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(209, 'S. Georgia and S. Sandwich Isls.', 'GS', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(210, 'Taiwan', 'TW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(211, 'Tajikistan', 'TJ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(212, 'Tanzania', 'TZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(213, 'Texel', 'TX', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(214, 'Thailand', 'TH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(215, 'Togo', 'TG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(216, 'Tokelau', 'TK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(217, 'Tonga', 'TO', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(218, 'Trinidad and Tobago', 'TT', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(219, 'Tunisia', 'TN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(220, 'Turkey', 'TR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(221, 'Turkmenistan', 'TM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(222, 'Turks and Caicos Islands', 'TC', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(223, 'Tuvalu', 'TV', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(224, 'Uganda', 'UG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(225, 'Ukraine', 'UA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(226, 'United Arab Emirates', 'AE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(227, 'United Kingdom', 'UK', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(228, 'United States', 'US', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(229, 'Uruguay', 'UY', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(230, 'US Minor Outlying Islands', 'UM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(231, 'USSR (former)', 'SU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(232, 'Uzbekistan', 'UZ', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(233, 'Vanuatu', 'VU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(234, 'Vatican City State (Holy See)', 'VA', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(235, 'Venezuela', 'VE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(236, 'Viet Nam', 'VN', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(237, 'Virgin Islands (British)', 'VG', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(238, 'Virgin Islands (U.S.)', 'VI', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(239, 'Wallis and Futuna Islands', 'WF', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(240, 'Western Sahara', 'EH', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(241, 'Yemen', 'YE', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(242, 'Yugoslavia', 'YU', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(243, 'Zaire', 'ZR', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(244, 'Zambia', 'ZM', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32'),
(245, 'Zimbabwe', 'ZW', NULL, NULL, '2013-11-11 10:56:32', '2013-11-11 10:56:32');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `norfile`
--

CREATE TABLE IF NOT EXISTS `norfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `norfilename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `selected` tinyint(1) NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `norfile`
--

INSERT INTO `norfile` (`id`, `norfilename`, `extension`, `selected`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'NORROT2012-v1.pdf', 'pdf', 0, NULL, NULL, '2013-11-11 10:56:34', '2013-11-11 10:56:34'),
(2, 'NORROT2012.pdf', 'pdf', 1, NULL, NULL, '2013-11-11 10:56:34', '2013-11-11 10:56:34'),
(3, 'Baantekening.png', 'img', 1, NULL, NULL, '2013-11-11 10:56:34', '2013-11-11 10:56:34'),
(4, 'NORROT2012.html', 'html', 1, NULL, NULL, '2013-11-11 10:56:34', '2013-11-11 10:56:34'),
(5, 'NORROT2012-v2.html', 'html', 0, NULL, NULL, '2013-11-11 10:56:34', '2013-11-11 10:56:34');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `organisatie`
--

CREATE TABLE IF NOT EXISTS `organisatie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6DD12C196DD12C19` (`organisatie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `parkeerkaart`
--

CREATE TABLE IF NOT EXISTS `parkeerkaart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kenteken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kaarttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strandvergunningsoort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vergunningsoort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donderdag` tinyint(1) DEFAULT NULL,
  `vrijdag` tinyint(1) DEFAULT NULL,
  `zaterdag` tinyint(1) DEFAULT NULL,
  `zondag` tinyint(1) DEFAULT NULL,
  `uitgegeven` tinyint(1) DEFAULT NULL,
  `uitgavecount` int(11) DEFAULT NULL,
  `uitgavedatum` datetime DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `parkeerkaart`
--

INSERT INTO `parkeerkaart` (`id`, `kenteken`, `kaarttype`, `strandvergunningsoort`, `vergunningsoort`, `donderdag`, `vrijdag`, `zaterdag`, `zondag`, `uitgegeven`, `uitgavecount`, `uitgavedatum`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(6, 'ASDF-234', 'Vergunning - Strand17 - transport', 'Strand17', 'transport', NULL, NULL, NULL, NULL, 1, 1, '2014-05-20 00:00:00', 'root', 'root', '2014-05-20 13:19:20', '2014-05-20 13:19:20'),
(7, 'ASD-123', 'Pers/sponsor - Baaaah', 'geen', 'geen', NULL, NULL, NULL, NULL, 1, 1, '2014-05-20 00:00:00', 'root', 'root', '2014-05-20 13:32:28', '2014-05-20 13:32:28'),
(8, '1-ABC-23', 'Zeiler', 'geen', 'geen', NULL, NULL, NULL, NULL, 1, 1, '2014-05-20 00:00:00', 'root', 'root', '2014-05-20 13:38:04', '2014-05-20 13:38:04'),
(9, 'asdf', 'Strandhuisje', 'geen', 'geen', 0, 1, 1, NULL, 1, 1, '2014-05-20 00:00:00', 'root', 'root', '2014-05-20 13:47:59', '2014-05-20 13:47:59'),
(10, 'asdf', 'Strandhuisje', 'geen', 'geen', 0, 1, 0, NULL, 1, 1, '2014-05-20 00:00:00', 'root', 'root', '2014-05-20 13:52:44', '2014-05-20 13:52:44');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stuurman`
--

CREATE TABLE IF NOT EXISTS `stuurman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deelnemerid` int(11) NOT NULL,
  `startlicentie` tinyint(1) DEFAULT NULL,
  `startlicentienummer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_62D268326A8B3E70` (`deelnemerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=135 ;

--
-- Gegevens worden uitgevoerd voor tabel `stuurman`
--

INSERT INTO `stuurman` (`id`, `deelnemerid`, `startlicentie`, `startlicentienummer`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(124, 232, 0, NULL, NULL, NULL, '2014-03-27 12:23:52', '2014-03-27 12:23:52'),
(125, 233, 0, NULL, NULL, NULL, '2014-03-27 13:09:59', '2014-03-27 13:09:59'),
(126, 235, 0, NULL, NULL, NULL, '2014-04-24 11:02:39', '2014-04-24 11:02:39'),
(127, 236, 0, NULL, NULL, NULL, '2014-04-24 11:22:33', '2014-04-24 11:22:33'),
(128, 238, 0, NULL, NULL, NULL, '2014-05-13 14:16:17', '2014-05-13 14:16:17'),
(129, 239, 0, NULL, NULL, NULL, '2014-05-13 14:34:17', '2014-05-13 14:34:17'),
(130, 240, 0, NULL, NULL, NULL, '2014-05-28 12:35:44', '2014-05-28 12:35:44'),
(131, 241, 0, NULL, NULL, NULL, '2014-05-28 12:42:04', '2014-05-28 12:42:04'),
(132, 242, 0, NULL, NULL, NULL, '2014-05-28 12:51:46', '2014-05-28 12:51:46'),
(133, 243, 0, NULL, NULL, NULL, '2014-05-28 13:22:13', '2014-05-28 13:22:13'),
(134, 244, 0, NULL, NULL, NULL, '2014-05-28 13:27:10', '2014-05-28 13:27:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `uitzondering`
--

CREATE TABLE IF NOT EXISTS `uitzondering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afkorting` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uitzondering` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vereniging`
--

CREATE TABLE IF NOT EXISTS `vereniging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iscustom` tinyint(1) NOT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Gegevens worden uitgevoerd voor tabel `vereniging`
--

INSERT INTO `vereniging` (`id`, `naam`, `iscustom`, `createdBy`, `updatedBy`, `createdAt`, `updatedAt`) VALUES
(1, 'Botenvereniging Callantsoog', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(2, 'Botenvereniging De Werf Egmond', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(3, 'Cat Club 7.2 Hargen aan Zee', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(4, 'Cat Club Bloemendaal', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(5, 'Cat Club Noordzee', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(6, 'Catamaranver. Castricum', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(7, 'Catamaranver. Oostmahorn', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(8, 'Catclub Bad Hoophuizen', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(9, 'Catclub BRU', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(10, 'Catclub Den Osse', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(11, 'Catclub Zeeland', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(12, 'Catver. CAT-POINT', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(13, 'Catver. HELLECAT', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(14, 'Cocksdorper KzV', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(15, 'Datchet SC', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(16, 'Exploder Sailing Team', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(17, 'Haagsche KzV', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(18, 'Hoekse WsV', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(19, 'KR&ZV De Maas', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(20, 'Kustzeilver. Rockanje', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(21, 'KzV Den Helder', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(22, 'KzV Monster', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(23, 'KzV Paal 15', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(24, 'KzV Scheveningen', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(25, 'KzV Velsen', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(26, 'KzV Wassenaar', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(27, 'KzV Westerslag', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(28, 'KZVG (''s-Gravenzande)', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(29, 'KZ&BV Bergen', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(30, 'KZ&BV Wijk aan Zee', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(31, 'Noord West 9 Petten', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(32, 'RBSC Duinbergen', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(33, 'RBSC Zoute', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(34, 'Sail Center 107 Kijkduin', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(35, 'Segelclub Wendelsee SCWe', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(36, 'Segelklub Bayer Uerdingen (SKBUe)', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(37, 'SLRV Sail Lollipop', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(38, 'Stokes Bay Sailing Club', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(39, 'SYCOD Oostduinkerke', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(40, 'Thorpe Bay Yacht Club', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(41, 'VVW Heist', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(42, 'WsV Ameland', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(43, 'WsV Bestevaer', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(44, 'WsV Braassemermeer', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(45, 'WsV De Eemhof', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(46, 'WsV De Zandmeren', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(47, 'Wsv Flevo Harderwijk', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(48, 'WsV Giesbeek', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(49, 'WsV Hoorn', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(50, 'WsV Muiderberg', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(51, 'WsV Nulde', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(52, 'WsV Skuytevaert', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(53, 'WsV Surfcats Beverwijk', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(54, 'WsV Veluwemeer', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(55, 'WsV Warder', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(56, 'WV Arne', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(57, 'WV De Kreupel', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(58, 'WV Het Bovenwater', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(59, 'WV Het Witte Huis', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(60, 'WV Lelystad', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(61, 'WV Noord AA', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(62, 'WV Spakenburg', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(63, 'WV Zandvoort', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(64, 'Zeilclub Mifune', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(65, 'ZV De Roerkoning', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(66, 'ZV Noordwijk', 0, NULL, NULL, '2013-11-11 10:56:33', '2013-11-11 10:56:33'),
(70, 'KWS Sneek', 1, NULL, NULL, '2014-02-07 17:42:04', '2014-02-07 17:42:04'),
(71, 'Wwra', 1, NULL, NULL, '2014-02-13 10:33:22', '2014-02-13 10:33:22'),
(72, 'Arzv Akersloot', 1, NULL, NULL, '2014-02-13 10:39:42', '2014-02-13 10:39:42'),
(73, 'Zsvo Julianadorp', 1, NULL, NULL, '2014-02-13 11:05:36', '2014-02-13 11:05:36');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `betrokkene`
--
ALTER TABLE `betrokkene`
  ADD CONSTRAINT `FK_5C775C16E1CF7A` FOREIGN KEY (`organisatieid`) REFERENCES `organisatie` (`id`),
  ADD CONSTRAINT `FK_5C775C1E1F1D55` FOREIGN KEY (`parkeerkaartid`) REFERENCES `parkeerkaart` (`id`);

--
-- Beperkingen voor tabel `deelname`
--
ALTER TABLE `deelname`
  ADD CONSTRAINT `FK_9391B7D51120B899` FOREIGN KEY (`stuurmanid`) REFERENCES `stuurman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D51E1F1D55` FOREIGN KEY (`parkeerkaartid`) REFERENCES `parkeerkaart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D521C1BD18` FOREIGN KEY (`bootid`) REFERENCES `boot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D54774F014` FOREIGN KEY (`verenigingid`) REFERENCES `vereniging` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D547891580` FOREIGN KEY (`fokkemaatid`) REFERENCES `fokkemaat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D58EFB9DA1` FOREIGN KEY (`uitzonderingid`) REFERENCES `uitzondering` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D59DD22F73` FOREIGN KEY (`borgid`) REFERENCES `borg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9391B7D5A62252CC` FOREIGN KEY (`betalingid`) REFERENCES `betaling` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `deelnemer`
--
ALTER TABLE `deelnemer`
  ADD CONSTRAINT `FK_1541DF2652DDB5FD` FOREIGN KEY (`nationaliteitid`) REFERENCES `nationaliteit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `fokkemaat`
--
ALTER TABLE `fokkemaat`
  ADD CONSTRAINT `FK_D13C20266A8B3E70` FOREIGN KEY (`deelnemerid`) REFERENCES `deelnemer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `klasse_deelnames`
--
ALTER TABLE `klasse_deelnames`
  ADD CONSTRAINT `FK_AF63A78F34860711` FOREIGN KEY (`klasse_id`) REFERENCES `klasse` (`id`),
  ADD CONSTRAINT `FK_AF63A78FC18FA9D5` FOREIGN KEY (`deelname_id`) REFERENCES `deelname` (`id`);

--
-- Beperkingen voor tabel `stuurman`
--
ALTER TABLE `stuurman`
  ADD CONSTRAINT `FK_62D268326A8B3E70` FOREIGN KEY (`deelnemerid`) REFERENCES `deelnemer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
