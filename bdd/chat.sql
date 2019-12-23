-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 23 déc. 2019 à 13:13
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
-- Base de données :  `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `ID` int(10) UNSIGNED NOT NULL,
  `txt` varchar(250) NOT NULL,
  `pseudo` text NOT NULL,
  `date_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`ID`, `txt`, `pseudo`, `date_post`) VALUES
(1, 'bonjour', 'toto', '2019-12-16 11:18:09'),
(2, 'bonjour', 'toto', '2019-12-16 11:27:37'),
(3, 'bonjour', 'toto', '2019-12-16 11:28:23'),
(4, 'bonjour', 'toto', '2019-12-16 11:29:42'),
(5, 'bonjour Ã  toi', 'tata', '2019-12-16 11:31:16'),
(6, 'bonjour Ã  toi', 'tata', '2019-12-16 11:34:57'),
(7, 'bonjour Ã  toi', 'tata', '2019-12-16 11:38:51'),
(8, 'bonjour Ã  toi', 'tata', '2019-12-16 11:43:26'),
(9, 'bonjour Ã  toi', 'tata', '2019-12-16 11:43:37'),
(10, 'bonjour Ã  toi', 'tata', '2019-12-16 11:43:59'),
(11, 'bonjour Ã  toi', 'tata', '2019-12-16 11:47:14'),
(12, 'bonjour Ã  toi', 'tata', '2019-12-16 11:47:42'),
(13, 'bonjour Ã  toi', 'tata', '2019-12-16 11:56:07'),
(14, 'bonjour Ã  toi', 'tata', '2019-12-16 11:57:13'),
(15, 'bonjour Ã  toi', 'tata', '2019-12-16 11:57:48'),
(16, 'bonjour Ã  toi', 'tata', '2019-12-16 11:59:17'),
(17, 'bonjour Ã  toi', 'tata', '2019-12-16 12:00:51'),
(18, 'salut', 'chrystelle', '2019-12-16 16:29:14'),
(19, 'salut', 'chrystelle', '2019-12-16 17:12:22');

-- --------------------------------------------------------

--
-- Structure de la table `message_vote`
--

CREATE TABLE `message_vote` (
  `ID` int(10) UNSIGNED NOT NULL,
  `vote` int(11) NOT NULL,
  `id_message` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `identifiant`, `mot_de_passe`, `mail`) VALUES
(1, 'chrystelle', '$2y$10$KhwfpVzN4rwg8EwqLWeg9uv8hLk57LnPMiySi7zNyWs3vRdNVunFW', 'chrystelle@mail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `message_vote`
--
ALTER TABLE `message_vote`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_message` (`id_message`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `message_vote`
--
ALTER TABLE `message_vote`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message_vote`
--
ALTER TABLE `message_vote`
  ADD CONSTRAINT `message_vote_ibfk_1` FOREIGN KEY (`id_message`) REFERENCES `messages` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
