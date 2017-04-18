-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 18 Avril 2017 à 07:17
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id_activite` int(11) NOT NULL,
  `nom_activite` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_activite` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_activite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validation_activite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `nom_activite`, `description_activite`, `date_activite`, `validation_activite`) VALUES
(1, 'futsal', 'allons au foot', '2017-04-19', 1),
(2, 'cinema', 'Le cinema ! ', '2018-05-02', 1),
(5, 'Projet ', 'Super!', '2017-04-19', 1),
(6, 'Osu', 'PIm poom pim', '2017-04-20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `text_Comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_activite` int(11) DEFAULT NULL,
  `date_comment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_activite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `id_users`, `id_activite`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `jaime`
--

CREATE TABLE `jaime` (
  `id_jaime` int(11) NOT NULL,
  `id_Photo` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_Photo` int(11) NOT NULL,
  `url_photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `alt_photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_activite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nom_users` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email_users` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password_users` longtext COLLATE utf8_unicode_ci NOT NULL,
  `avatar_users` longtext COLLATE utf8_unicode_ci NOT NULL,
  `role_users` longtext COLLATE utf8_unicode_ci NOT NULL,
  `_prenom_users` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `nom_users`, `email_users`, `password_users`, `avatar_users`, `role_users`, `_prenom_users`) VALUES
(1, 'Hugo', 'hugo.pette@viacesi.fr', 'azerty', 'yolo', 'BDE', 'PETTE'),
(2, 'Hugo', 'hugo.pette@hotmail.fr', 'azerty', 'yolo', 'etudiant', 'PETTE'),
(3, 'Banteignie', 'coco@lapedale.fr', 'azerty', 'yolo', 'etudiant', 'Coco'),
(4, 'Malo', 'julien.malo@cesi.fr', '1234', 'yolo', 'etudiant', 'julien'),
(5, 'fontana', 'antoine.fontana@viacesi.fr', '1234', 'yolo', 'etudiant', 'Antoine'),
(6, 'Bouchet', 'Andre.Bouchet@viacesi.fr', 'Passe-partout', 'yolo', 'Admin', 'André'),
(7, 'Hugo', 'hugo.pette@gmail', 'azerty', 'yolo', 'etudiant', 'PETTE');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_activite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD UNIQUE KEY `UNIQ_67F068BCE8AEB980` (`id_activite`),
  ADD KEY `IDX_67F068BCFA06E4D9` (`id_users`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`),
  ADD UNIQUE KEY `UNIQ_5E90F6D6FA06E4D9` (`id_users`),
  ADD UNIQUE KEY `UNIQ_5E90F6D6E8AEB980` (`id_activite`);

--
-- Index pour la table `jaime`
--
ALTER TABLE `jaime`
  ADD PRIMARY KEY (`id_jaime`),
  ADD UNIQUE KEY `UNIQ_3CB77805FA32C528` (`id_Photo`),
  ADD UNIQUE KEY `UNIQ_3CB77805FA06E4D9` (`id_users`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_Photo`),
  ADD UNIQUE KEY `UNIQ_14B78418FA06E4D9` (`id_users`),
  ADD KEY `IDX_14B78418E8AEB980` (`id_activite`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD UNIQUE KEY `UNIQ_5A108564FA06E4D9` (`id_users`),
  ADD UNIQUE KEY `UNIQ_5A108564E8AEB980` (`id_activite`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `jaime`
--
ALTER TABLE `jaime`
  MODIFY `id_jaime` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_Photo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BCE8AEB980` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `FK_67F068BCFA06E4D9` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D6E8AEB980` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `FK_5E90F6D6FA06E4D9` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `jaime`
--
ALTER TABLE `jaime`
  ADD CONSTRAINT `FK_3CB778053BF3EA2C` FOREIGN KEY (`id_Photo`) REFERENCES `photo` (`id_Photo`),
  ADD CONSTRAINT `FK_3CB77805FA06E4D9` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_14B78418E8AEB980` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `FK_14B78418FA06E4D9` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `FK_5A108564E8AEB980` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `FK_5A108564FA06E4D9` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
