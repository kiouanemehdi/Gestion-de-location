-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 01 oct. 2021 à 10:11
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(100) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Prenom` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `Nom`, `Prenom`, `tel`, `mail`, `adresse`) VALUES
(1, 'sabouni', 'ahmed', '0276355360', 'ahmed;sabouni11@gmail.com', '13 Boulevard leon gambetta'),
(2, 'mehdi', 'el kiouane ', '0367537638', 'mehdi.kiounae@gmail.com', '17 Boulevard dchira'),
(3, 'nadini', 'aya', '0276537637', 'aya.nadini17@gmail.com', 'Doukala');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(50) NOT NULL,
  `id_client` int(200) NOT NULL,
  `id_voiture` int(200) NOT NULL,
  `date_location` date NOT NULL,
  `date_retour` date NOT NULL,
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_client`, `id_voiture`, `date_location`, `date_retour`, `montant`) VALUES
(1, 1, 4, '2021-10-16', '2021-11-07', 8),
(2, 1, 7, '2021-11-07', '2021-10-23', 4141),
(3, 1, 4, '2021-09-28', '2021-10-31', 8);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id_voiture` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `prix_location` int(200) NOT NULL,
  `etat_voiture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `matricule`, `model`, `marque`, `categorie`, `prix_location`, `etat_voiture`) VALUES
(4, 'ma04fes', 'clio', 'renault', 'FYUH', 8, '  RAYURE PORTE\r\nFEUX GRILLE'),
(5, 'dz203BFR', '206', 'peugeot', 'berline', 14, '  bruit porte arriÃ¨re gauche'),
(6, 'mok46tt', 'X2', 'bmw', '4x4', 25, 'lampe coffre grillÃ© \r\nrayure par-choc'),
(7, 'frrg', 'htht', 'gtht', 'fff', 4141, '  gggggggggggggggggggggggggggggggg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id_voiture`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
