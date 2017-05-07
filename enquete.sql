-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 07 Mai 2017 à 21:37
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `enquete`
--

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `libelle`, `detail`, `dateDebut`, `dateFin`) VALUES
(1, 'Etes-vous d''accord avec le projet de fusion avec l''entreprise X ?', 'Details sur l''intranet section Fusion', '2017-04-06', '2017-04-29'),
(2, 'Etes-vous d''accord avec le nouveau projet d''amenagement des locaux ?', 'Projet disponible sur l''intranet', '2017-04-19', '2017-04-29'),
(3, 'Trouvez-vous que le climat social s''est ameliore ces derniers mois ?', NULL, '2017-04-05', '2017-06-15'),
(4, 'Etes-vous d''accord avec la propreter des locaux?', 'Projet sanitaire', '2017-04-26', '2017-05-26'),
(5, 'Voulez vous une  intervention du RPCA', 'Securité', '2017-04-06', '2017-04-29'),
(6, 'Aimez vous le boulot?', 'Etudes travail', '2017-04-01', '2017-05-01'),
(7, 'Aimez vous la responsable', 'Etudes social', '2017-04-01', '2017-05-01'),
(8, 'Avez vous des suggestions ?', 'Etudes', '2017-04-01', '2017-05-21'),
(9, 'Avez vous des choses qui vous d''éplaisent', 'Etudes', '2017-04-01', '2017-05-10'),
(10, 'Voulez vous une intervention d''une association d''intervention?', 'Etudes', '2017-04-01', '2017-05-20');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idSalarie` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `reponseON` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`idSalarie`, `idQuestion`, `reponseON`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, 'O'),
(1, 4, 'O'),
(2, 2, 'N'),
(2, 3, 'O'),
(2, 4, 'O'),
(3, 1, 'O'),
(3, 2, 'O'),
(3, 3, 'O'),
(3, 4, 'O'),
(4, 1, 'O'),
(4, 2, 'O'),
(4, 3, 'O'),
(4, 4, 'O'),
(4, 5, 'O'),
(4, 6, ''),
(4, 8, 'O'),
(4, 9, 'O'),
(4, 10, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE `salarie` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(30) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salarie`
--

INSERT INTO `salarie` (`id`, `prenom`, `nom`, `login`, `mdp`, `idService`) VALUES
(1, 'Jean', 'MARTIN', 'jmartin', '123', 1),
(2, 'Eric', 'DUPOND', 'edupond', '123', 1),
(3, 'Laure', 'DURAND', 'ldurand', '123', 2),
(4, 'Lionel', 'DARCY', 'illy', 'LDARCY', 2);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `nom`) VALUES
(1, 'Ressources humaines'),
(2, 'Comptabilité');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idSalarie`,`idQuestion`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- Index pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idService` (`idService`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `salarie`
--
ALTER TABLE `salarie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`idSalarie`) REFERENCES `salarie` (`id`),
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `salarie_ibfk_1` FOREIGN KEY (`idService`) REFERENCES `service` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
