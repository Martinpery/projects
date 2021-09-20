-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 31 mars 2021 à 00:24
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `roulette`
--
CREATE DATABASE IF NOT EXISTS `roulette` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `roulette`;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `annee` varchar(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `affichage` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `annee`, `image`, `affichage`) VALUES
(1, 'Pery-Kasza', 'Martin', '2021', 'Eleve_classic.jpg', 'Oui'),
(2, 'Singe', 'Carre', '2021', 'Eleve_mage.jpg', 'Oui'),
(10, 'Florestal', 'Bryan', '2004', 'Eleve_indiana.jpg', 'Oui'),
(7, 'Larchouma', 'Sony', '2008', 'Eleve_italien.jpg', 'Oui'),
(11, 'Spartak', 'Jacky', '1939', 'Eleve_robot.jpg', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `nom`) VALUES
(4, 'Eleve_classic.jpg'),
(5, 'Eleve_clown.jpg'),
(6, 'Eleve_goku.jpg'),
(7, 'Eleve_indiana.jpg'),
(8, 'Eleve_italien.jpg'),
(9, 'Eleve_japonais.jpg'),
(10, 'Eleve_mage.jpg'),
(11, 'Eleve_pharaon.jpg'),
(12, 'Eleve_robot.jpg'),
(23, 'Eleve_sirene.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `droits` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `password`, `droits`) VALUES
(1, 'Pery-Kasza', 'Martin', 'pataxus', 'marty', 'Admin'),
(7, 'jean', 'jean', 'jean', 'jean', 'Admin'),
(18, 'nice', 'brice', 'fabrice', 'glisse', 'Sbire'),
(19, 'carré', 'squares', 'stairs', 'escalier', 'Sbire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
