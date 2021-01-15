-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 jan. 2021 à 11:39
-- Version du serveur :  10.3.27-MariaDB
-- Version de PHP : 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fvqnxxeh_mybocuse`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(10) UNSIGNED NOT NULL,
  `fk_id_user` int(10) UNSIGNED NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `day` date NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`ID`, `fk_id_user`, `email_user`, `day`, `check_in`, `check_out`) VALUES
(2, 4, 'ayoube@becode.be', '2021-01-14', '2021-01-14 13:20:22', '2021-01-14 22:55:33'),
(3, 5, 'wassim011098@hotmail.com', '2021-01-14', '2021-01-14 13:20:56', '2021-01-14 13:20:58'),
(4, 7, 'Sifedineleplusfort@vaincraquipourra.bg', '2021-01-14', '2021-01-14 13:21:52', '2021-01-14 13:21:53'),
(5, 3, 'matei.popescu@hotmail.com', '2021-01-14', '2021-01-14 13:27:25', '2021-01-14 13:27:30'),
(6, 2, 'guillaumevanleynseele@outlook.com', '2021-01-14', '2021-01-14 19:30:28', '2021-01-14 19:30:29'),
(7, 4, 'ayoube@becode.be', '2021-01-15', '2021-01-15 00:18:42', '2021-01-15 00:19:22'),
(8, 3, 'matei.popescu@hotmail.com', '2021-01-15', '2021-01-15 10:21:31', NULL),
(9, 12, 'jeanjean@coucou.be', '2021-01-15', '2021-01-15 10:49:50', '2021-01-15 10:49:51'),
(10, 13, 'mouettemouette@mouette.com', '2021-01-15', '2021-01-15 10:51:18', '2021-01-15 10:53:58');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `ID` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `promo` enum('bocuse','ramsey','lignac') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('Student','Chef') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`ID`, `first_name`, `last_name`, `promo`, `email`, `password`, `account_type`) VALUES
(1, 'Kill', 'Coach', 'bocuse', 'kill@coach.be', '$2y$10$KVhgy0KGM83sf6w1DIx9uOjvzGsIDAwLhAgcM5RWgB22MLa1eK0wm', 'Chef'),
(2, 'Guillaume', 'Vanleynseele', 'bocuse', 'guillaumevanleynseele@outlook.com', '$2y$10$DSQvoKKNtGSafLQbh.K9VeAj5WuzYMMaR01vk8dRm88dwhWQGM3/6', 'Student'),
(3, 'Matei', 'Popescu', 'ramsey', 'matei.popescu@hotmail.com', '$2y$10$OBbvVtYd6XRmqWi5N2vUK./86Va7duHXC30z5Bu9soCXlZ3UWQ5RO', 'Student'),
(4, 'Ayoube', 'El Yazizi', 'ramsey', 'ayoube@becode.be', '$2y$10$z9RDnu99ZTrt2FWNOZH5X.Hp.2ga1/FtHTosVAvkIH0wjMupXfOgS', 'Student'),
(5, 'wassim', 'jniouen', 'lignac', 'wassim011098@hotmail.com', '$2y$10$WArYP410sJ7M2hokGBIVCu5.0OcVsHllb3KaFIthw2eMRQy0zxKvi', 'Student'),
(6, 'Cemil', 'Yilmaz', 'lignac', 'cemil.yilmaz@gmail.com', '$2y$10$xDQHw2fv2Ka/lajjJCnhDOmRr94YXHylSBVdN/qQQCHI2/jj8U4oS', 'Student'),
(7, 'Sifedine', 'Hajji', 'bocuse', 'Sifedineleplusfort@vaincraquipourra.bg', '$2y$10$QmmZfrScipvv6/5STfjBQ.tiGI7RMQOxDJRjyH1t3yeyenpbOWIBC', 'Student'),
(8, 'westbrook', 'Yilmaz', 'bocuse', 'wstbrk@gmail.com', '$2y$10$Sc4IVNrlG82t6q1KWDCuk.oC6xPcUQJAlCNK4mzBbEALdr/7BDSAq', 'Student'),
(9, 'Simon', 'Doneux', 'lignac', 'doneuxsimon@gmail.com', '$2y$10$kaEwsVMZ1ugqA2Dm1y2KGeyEAS8hj.kaE.UKvzxvuDsN4Zd1dK156', 'Student'),
(11, 'Madeline', 'Henry', 'ramsey', 'madelinehenry04101996@gmail.com', '$2y$10$9WXUuFAKuPfHuwnkL15GJO6bs.M7ABtwT7qBa/yLS9LRuF4wLmt6K', 'Student'),
(12, 'Jean', 'Fab', 'bocuse', 'jeanjean@coucou.be', '$2y$10$b6a9PgGtDQhkL665yN5n9eMamcQLJDQbc9vNz8wBtuXKvuKsmdP0u', 'Student'),
(13, 'Mouette', 'Miedepain', 'lignac', 'mouettemouette@mouette.com', '$2y$10$yUkoTOPMFuv641bD4pb6qOgvqBnl1Pqg35bXBSCohYCY09yi4n0fK', 'Student');

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `fk_id_user` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`ID`, `title`, `fk_id_user`, `description`, `date`) VALUES
(1, 'Crêpes au sucre', 2, 'Crêpes avec du sucre', '2021-01-14'),
(2, 'Cat Meat Burger', 4, 'A burger of first quality, the best cats in the world', '2021-03-25'),
(3, 'tajin', 5, 'tajin qui t\'éclate le bide', '2021-01-20'),
(4, 'Steack d\'aubergine', 7, 'c\'est bon mais pas trop', '2021-01-22'),
(5, 'bull balls', 3, 'the balls of the bull mmmm', '2021-01-28'),
(6, 'Boulette', 13, 'Des boulettes, boulettes toujours des boulettes ', '2021-01-23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `attendance_foreign_key` (`fk_id_user`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_id_user` (`fk_id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_foreign_key` FOREIGN KEY (`fk_id_user`) REFERENCES `people` (`ID`);

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`fk_id_user`) REFERENCES `people` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
