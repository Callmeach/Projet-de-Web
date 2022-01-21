-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 jan. 2022 à 20:17
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetwebv1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `username` char(8) NOT NULL DEFAULT 'admin',
  `password` char(100) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `idArticle` tinyint(5) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT 'Titre',
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `title`, `content`) VALUES
(1, 'Il etait une fois', 'Au clair de la lune...'),
(3, 'CONCOURS D\'ENTREE A L\'IAI-TOGO', 'Le Ministre de la Planification du Développement porte à la connaissance du public qu’il est ouvert chaque année un concours d’entrée en 1ère année du Cycle « Ingénieur des Travaux Informatiques (Licence Professionnelle) » options Génie Logiciel (GL), Systèmes et Réseaux (SR) de l’Institut Africain d’Informatique, Représentation du Togo (IAI-TOGO).\r\n\r\nLe concours se déroulera dans les centres d’écrit suivants :\r\nCentre National d’Etudes et de Traitements Informatiques (CENETI) à Lomé\r\nLycée de Kara 1 (Kara) à Lama Kara (Préfecture de la Kozah).\r\n\r\nLe concours comportera les épreuves écrites suivantes :\r\nPour les deux (2) options:\r\nTechniques d’expression française, durée 2 heures, coefficient 2,\r\nAnglais, durée 2 heures, coefficient 3,\r\nMathématiques, durée 4 heures, coefficient 6\r\n\r\nLes dossiers de candidature sont à déposer dans les centres d\'écrit au plus tard le jeudi 30 septembre 2021 à 17 heures la date du concours est prevue sur le mardi 05 octobre 2021 à 07 heures 00.\r\n\r\nPour plus de détail Téléchargez TERMES DE REFERENCE: COURS DU JOUR 2021-2022 et TERMES DE REFERENCE: COURS DU SOIR 2021-2022\r\nTéléchargez le communiqué du cours du jour et du cours du soir du concours\r\nTéléchargez le communiqué du report du concours\r\nQuelques anciennes épreuves Français, Anglais et Mathématique'),
(4, 'A l\'ecole', 'Eh bah on travaille ce soir?	'),
(5, 'A l\'ecole', 'Eh bah...'),
(8, 'Concours 2', '<p>Le Ministre de la Planification du Développement porte à la connaissance du public qu’il est ouvert chaque année un concours d’entrée en 1ère année du Cycle « Ingénieur des Travaux Informatiques (Licence Professionnelle) » options Génie Logiciel (GL), Systèmes et Réseaux (SR) de l’Institut Africain d’Informatique, Représentation du Togo (IAI-TOGO).</p>\r\n<p>Le concours se déroulera dans les centres d’écrit suivants :<br>\r\nCentre National d’Etudes et de Traitements Informatiques (CENETI) à Lomé<br>\r\nLycée de Kara 1 (Kara) à Lama Kara (Préfecture de la Kozah).</p>\r\n<p>Le concours comportera les épreuves écrites suivantes :<br>\r\nPour les deux (2) options:<br>\r\nTechniques d’expression française, durée 2 heures, coefficient 2,<br>\r\nAnglais, durée 2 heures, coefficient 3,<br>\r\nMathématiques, durée 4 heures, coefficient 6</p>\r\n<p>Les dossiers de candidature sont à déposer dans les centres d\'écrit au plus tard le jeudi 30 septembre 2021 à 17 heures la date du concours est prevue sur le mardi 05 octobre 2021 à 07 heures 00.</p>\r\n<p>Pour plus de détail Téléchargez TERMES DE REFERENCE: COURS DU JOUR 2021-2022 et TERMES DE REFERENCE: COURS DU SOIR 2021-2022<br>\r\nTéléchargez le communiqué du cours du jour et du cours du soir du concours<br>\r\n<p></p>\r\nTéléchargez le communiqué du report du concours<br>\r\n<p></p>\r\nQuelques anciennes épreuves Français, Anglais et Mathématique</p>'),
(10, 'Article Test', 'Ceci est un article de test du projet web.');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `sexe` char(2) NOT NULL,
  `dateNaiss` date NOT NULL,
  `nationalite` text NOT NULL,
  `serie` char(1) NOT NULL,
  `annee_bac` smallint(6) NOT NULL,
  `idEtudiant` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`nom`, `prenom`, `sexe`, `dateNaiss`, `nationalite`, `serie`, `annee_bac`, `idEtudiant`) VALUES
('AVA', 'Max', 'F', '2002-12-12', 'France', 'D', 2020, 1),
('TADE', 'Elvira', 'F', '2000-04-23', 'Togo', 'C', 2021, 2),
('OKRAS', 'Martine', 'F', '2002-11-13', 'Togolaise', 'D', 2020, 3),
('Pana', 'Koroka', 'M', '2001-02-28', 'Togolaise', 'D', 2021, 4),
('Djakpo', 'Achille', 'M', '2001-11-24', 'Togolaise', 'C', 2018, 5),
('ALIOU', 'kodjo', 'M', '1998-04-11', 'Ivoirienne', 'G', 2021, 6),
('Mac', 'Donald', 'M', '2002-07-02', 'Algerienne', 'F', 2020, 7),
('COUBAGEAT-TOURE', 'Mahdiya', 'F', '2003-01-22', 'Togolaise', 'D', 2021, 8),
('AGOKLA', 'Sergio', 'M', '2000-01-17', 'Togolaise', 'D', 2018, 9),
('BLINANI', 'Edwige', 'F', '2001-03-14', 'Togolaise', 'C', 2018, 10),
('TADEMANA', 'Lidwine', 'F', '2000-11-22', 'Togolaise', 'A', 2021, 11),
('Kokoroko', 'Koko', 'M', '2002-10-12', 'Togo', 'A', 2017, 12);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `idfile` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `chemin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`idfile`, `nom`, `chemin`) VALUES
(1, 'MoocTuto.pdf', '/uploads/MoocTuto.pdf'),
(2, 'MoocTuto.pdf', '/uploads/963MoocTuto.pdf'),
(3, 'ExerciceSemaine2.pdf', '/uploads/ExerciceSemaine2.pdf'),
(4, 'LANGAGE_SQL_-_Support.pdf', '/uploads/LANGAGE_SQL_-_Support.pdf'),
(5, 'QUESTIONS DE REVISION ENVIRONNEMENT ECONOMIQUE.pdf', '/uploads/QUESTIONS DE REVISION ENVIRONNEMENT ECONOMIQUE.pdf'),
(6, 'TD1-POO.pdf', '/uploads/TD1-POO.pdf'),
(7, 'ENVI ECO LMD 2020 - 2021.pdf', '/uploads/ENVI ECO LMD 2020 - 2021.pdf'),
(8, 'L1-D Projet.pdf', '/uploads/L1-D Projet.pdf'),
(9, 'Djakpo Achille.pdf', '/uploads/Djakpo Achille.pdf'),
(10, 'Cours_php 2e année AMEVOR.pdf', '/uploads/Cours_php 2e année AMEVOR.pdf'),
(11, 'EXPOSÉ PASCAL.pdf', '/uploads/EXPOSÉ PASCAL.pdf'),
(12, 'Cours_php 2e année AMEVOR.pdf', '/uploads/674Cours_php 2e année AMEVOR.pdf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`idEtudiant`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idfile`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticle` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `idEtudiant` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
