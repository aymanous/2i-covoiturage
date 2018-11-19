-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 19 nov. 2018 à 07:12
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kovoit`
--

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idConducteur` int(11) NOT NULL,
  `placeTotal` int(11) NOT NULL,
  `date` time NOT NULL,
  `commentaire` text NOT NULL,
  `villeDepart` varchar(50) NOT NULL,
  `villeArrive` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(75) NOT NULL,
  `password` text NOT NULL,
  `prenom` varchar(75) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `prenom`, `nom`, `telephone`) VALUES
(1, 'login', 'pass', 'theo', 'theo', '0000000000');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurtrajet`
--

DROP TABLE IF EXISTS `utilisateurtrajet`;
CREATE TABLE IF NOT EXISTS `utilisateurtrajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `idTrajet` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
