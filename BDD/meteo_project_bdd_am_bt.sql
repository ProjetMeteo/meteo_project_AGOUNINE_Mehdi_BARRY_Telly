-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 oct. 2021 à 12:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meteo_project_bdd_am_bt`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajoute`
--

DROP TABLE IF EXISTS `ajoute`;
CREATE TABLE IF NOT EXISTS `ajoute` (
  `id` int(11) NOT NULL,
  `id_1` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_1`),
  KEY `id_1` (`id_1`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ajoute`
--

INSERT INTO `ajoute` (`id`, `id_1`) VALUES
(1, 16),
(1, 17),
(1, 18);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` datetime DEFAULT NULL,
  `villeName` varchar(50) DEFAULT NULL,
  `temperature` int(11) DEFAULT NULL,
  `meteo` varchar(50) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=939 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id`, `creation`, `villeName`, `temperature`, `meteo`, `idUtilisateur`) VALUES
(938, '2021-10-15 11:45:56', 'Biarritz', 18, 'couvert', 1),
(937, '2021-10-15 11:45:47', 'DubaÃ¯', 35, 'ciel dÃ©gagÃ©', 1),
(936, '2021-10-15 11:45:40', 'Paris', 15, 'ciel dÃ©gagÃ©', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `mdp`, `nom`, `prenom`) VALUES
(1, 'test@test.test', 'test', 'Dupont', 'Michel');

-- --------------------------------------------------------

--
-- Structure de la table `ville_favorite`
--

DROP TABLE IF EXISTS `ville_favorite`;
CREATE TABLE IF NOT EXISTS `ville_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville_favorite`
--

INSERT INTO `ville_favorite` (`id`, `Nom`) VALUES
(18, 'Biarritz'),
(17, 'DubaÃ¯'),
(16, 'Paris');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
