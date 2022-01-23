-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 jan. 2022 à 21:37
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_exam_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `CreationDate` date NOT NULL,
  `Creator` text DEFAULT NULL,
  `CreatorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`Id`, `Title`, `Description`, `CreationDate`, `Creator`, `CreatorId`) VALUES
(1, 'Bievenue', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus dolor quidem distinctio doloribus exercitationem reiciendis, tempore beatae quam nesciunt temporibus eligendi aperiam fugit nostrum excepturi voluptatibus et ratione corporis dolorum!', '2022-01-23', 'andre', 2),
(2, 'Meilleur manga', 'Top 1 : 177013&lt;br /&gt;<br />\r\nTop 2 : 325479<br />\r\nTop 3 : 371882', '2022-01-23', 'andre', 2),
(4, 'J&#039;ai finis Twitter', 'RATIO + MENFOU + PALU + CE FLOP M&#039;EMPECHE DE DORMIR', '2022-01-23', 'duane', 6),
(5, 'Main jungle', 'Kayn c&#039;est broken, mais Viego c&#039;est archi broken', '2022-01-23', 'duane', 6),
(6, 'Les secrets de la scroll bar', 'Google est ton ami<br />\r\n::-webkit-scrollbar {<br />\r\n    width: 8px;<br />\r\n    background-color: black;<br />\r\n}<br />\r\n<br />\r\n::-webkit-scrollbar-thumb {<br />\r\n    background-color: #2a9df4;<br />\r\n}<br />\r\n<br />\r\n::-webkit-scrollbar-thumb:hover {<br />\r\n    background-color: cyan;<br />\r\n}<br />\r\n<br />\r\n::-webkit-scrollbar-button {<br />\r\n    height: 8px;<br />\r\n    background-color: #2a9df4;<br />\r\n}<br />\r\n', '2022-01-23', 'florian', 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Username` varchar(24) NOT NULL,
  `Password` text NOT NULL,
  `Role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `Email`, `Username`, `Password`, `Role`) VALUES
(1, 'admin@ynov.com', 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'Admin'),
(2, 'andre@gmail.com', 'andre', '19984dcaea13176bbb694f62ba6b5b35', NULL),
(5, 'theodore@gmail.com', 'theodore', '56a525aa777f9e85e239bae7a958b02c', NULL),
(6, 'duane@gmail.com', 'duane', '357ddb585594fe6400d3114fc94239c2', NULL),
(7, 'florian@gmail.com', 'florian', '7e1e91156f7c4e1bd0831cf008ad5fdf', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
