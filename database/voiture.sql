-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 01 Octobre 2021 à 09:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `location`
--

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE IF NOT EXISTS `voiture` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `prix_location` int(200) NOT NULL,
  `etat_voiture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_voiture`),
  UNIQUE KEY `matricule` (`matricule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `matricule`, `model`, `marque`, `categorie`, `prix_location`, `etat_voiture`) VALUES
(4, 'ma04fes', 'clio', 'renault', 'FYUH', 8, '  RAYURE PORTE\r\nFEUX GRILLE'),
(5, 'dz203BFR', '206', 'peugeot', 'berline', 14, '  bruit porte arriÃ¨re gauche'),
(6, 'mok46tt', 'X2', 'bmw', '4x4', 25, 'lampe coffre grillÃ© \r\nrayure par-choc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
