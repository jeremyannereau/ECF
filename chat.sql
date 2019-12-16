-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 16 déc. 2019 à 16:51
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

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
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `contributeur` varchar(30) COLLATE utf8_bin NOT NULL,
  `contenu_message` text COLLATE utf8_bin NOT NULL,
  `time_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='messages du chat';

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `contributeur`, `contenu_message`, `time_post`) VALUES
(50, 'Jeremy', 'Mon premier message !', '2019-12-16 10:32:00'),
(51, 'JohnDoe', 'Trop cool !', '2019-12-16 10:32:19'),
(54, 'Jeremy', 'Ouais je sais !', '2019-12-16 10:34:04'),
(55, 'JohnDoe', 'Et hop ! un commit', '2019-12-16 10:35:01'),
(56, '', 'vvf', '2019-12-16 12:47:52'),
(57, '', 'vvf', '2019-12-16 12:48:11'),
(58, 'jeremy', 'fredfredfred', '2019-12-16 14:29:50'),
(59, 'jeremy', 'fredfredfred', '2019-12-16 14:32:48'),
(60, 'jeremy', 'fredfredfred', '2019-12-16 14:33:46'),
(61, 'jeremy', 'fredfredfred', '2019-12-16 14:36:00'),
(62, 'admin', 'c\'est moi le chef !', '2019-12-16 15:26:51'),
(63, 'admin', 'c\'est moi le chef !', '2019-12-16 15:27:32'),
(64, 'admin', 'c\'est moi le chef !', '2019-12-16 15:28:22'),
(65, 'admin', 'oui 3 fois meme !', '2019-12-16 15:28:33'),
(66, 'jeremy', 'c\'est re moi !', '2019-12-16 15:31:46'),
(67, 'jeremy', 'c\'est re moi !', '2019-12-16 15:32:44'),
(68, 'jeremy', 'ahaaaaaah', '2019-12-16 15:32:54'),
(69, 'jeremy', 'sgthrg    yyyn n,', '2019-12-16 15:42:02'),
(70, 'jeremy', 'sgthrg    yyyn n,', '2019-12-16 15:42:14'),
(71, 'jeremy', 'd fv', '2019-12-16 15:48:35'),
(72, 'admin', 'qfsrg', '2019-12-16 15:49:47'),
(73, 'jeremy', 'enfin !!', '2019-12-16 15:51:11');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(15) COLLATE utf8_bin NOT NULL,
  `mail` varchar(40) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='table de connexion';

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `pseudo`, `mail`, `password`) VALUES
(1, 'jeremy', 'jeremyannereau@gmail.com', '$2y$10$SnkBViJv6FRcint9pucxuu/RHHkvS3/MkIwUBb24DwXyo8JjLkDuK'),
(3, 'admin', 'admin@gmail.com', '$2y$10$aIhFwGKqDfhKreh6FiC1Leje0e/yQ5MKJRMS20sCd7x46ciwQ6ivu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
