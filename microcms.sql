-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Août 2017 à 12:11
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `microcms`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_article`
--

CREATE TABLE `t_article` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `art_content` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_article`
--

INSERT INTO `t_article` (`art_id`, `art_title`, `art_content`) VALUES
(1, 'First article', 'Hi there! This is the very first article.'),
(2, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit mauris ac porttitor accumsan. Nunc vitae pulvinar odio, auctor interdum dolor. Aenean sodales dui quis metus iaculis, hendrerit vulputate lorem vestibulum. Suspendisse pulvinar, purus at euismod semper, nulla orci pulvinar massa, ac placerat nisi urna eu tellus. Fusce dapibus rutrum diam et dictum. Sed tellus ipsum, ullamcorper at consectetur vitae, gravida vel sem. Vestibulum pellentesque tortor et elit posuere vulputate. Sed et volutpat nunc. Praesent nec accumsan nisi, in hendrerit nibh. In ipsum mi, fermentum et eleifend eget, eleifend vitae libero. Phasellus in magna tempor diam consequat posuere eu eget urna. Fusce varius nulla dolor, vel semper dui accumsan vitae. Sed eget risus neque.'),
(3, 'Lorem ipsum in french', 'J’en dis autant de ceux qui, par mollesse d’esprit, c’est-à-dire par la crainte de la peine et de la douleur, manquent aux devoirs de la vie. Et il est très facile de rendre raison de ce que j’avance. Car, lorsque nous sommes tout à fait libres, et que rien ne nous empêche de faire ce qui peut nous donner le plus de plaisir, nous pouvons nous livrer entièrement à la volupté et chasser toute sorte de douleur ; mais, dans les temps destinés aux devoirs de la société ou à la nécessité des affaires, souvent il faut faire divorce avec la volupté, et ne se point refuser à la peine. La règle que suit en cela un homme sage, c’est de renoncer à de légères voluptés pour en avoir de plus grandes, et de savoir supporter des douleurs légères pour en éviter de plus fâcheuses.'),
(4, 'je suis un article', 'zgefoapfanfkjabidhab ljaendkjabkjab aldnakjek aodnkj');

-- --------------------------------------------------------

--
-- Structure de la table `t_comment`
--

CREATE TABLE `t_comment` (
  `com_id` int(11) NOT NULL,
  `com_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `art_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_comment`
--

INSERT INTO `t_comment` (`com_id`, `com_content`, `art_id`, `usr_id`) VALUES
(1, 'kdhgierhuginsiurnijrg', 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `t_experience`
--

CREATE TABLE `t_experience` (
  `xp_id` int(11) NOT NULL,
  `xp_contrat` varchar(255) NOT NULL,
  `xp_debut` date NOT NULL,
  `xp_fin` date NOT NULL,
  `xp_descriptif` varchar(255) NOT NULL,
  `xp_poste` varchar(255) NOT NULL,
  `xp_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_experience`
--

INSERT INTO `t_experience` (`xp_id`, `xp_contrat`, `xp_debut`, `xp_fin`, `xp_descriptif`, `xp_poste`, `xp_img`) VALUES
(1, 'CDI', '2015-12-05', '2058-12-12', 'reggrgqr  rqf', 'marchand de sable', 'https://i.skyrock.net/7744/78437744/pics/3128557686_1_2_a8PPmyge.jpg'),
(2, 'CDI', '2012-05-14', '2013-11-05', 'En charge de la flote', 'Armateur dans la Marine Royale', 'https://troisponts.files.wordpress.com/2011/10/quibcardinaux2.jpg'),
(3, 'CDI', '0000-00-00', '2015-08-05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent condimentum pretium sodales. Nunc faucibus rhoncus sollicitudin. Curabitur vel dui ac felis egestas scelerisque ac sed sem. Mauris erat urna, consectetur ut lobortis vitae, feugiat a purus.', 'neo', 'http://wallpapercave.com/wp/70zTJIp.jpg'),
(4, 'CDI', '2012-05-14', '2013-11-05', 'avec mon chien Moumoute', 'Punk à chien', 'https://lappartementcollectif.files.wordpress.com/2011/12/punkachiens.jpg'),
(5, 'CDI', '2015-12-05', '2058-12-12', 'En charge des produits manufacturé', 'President d''une PME', 'https://www.challenges.fr/assets/img/2013/08/06/cover-r4x3w1000-579689287e549-canettes-de-coca-cola.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `loisir_id` int(11) NOT NULL,
  `loisir_nom` varchar(255) NOT NULL,
  `loisir_descriptif` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`loisir_id`, `loisir_nom`, `loisir_descriptif`) VALUES
(1, 'luge', 'j''aime faire de la luge dans les descentes !!');

-- --------------------------------------------------------

--
-- Structure de la table `t_perso`
--

CREATE TABLE `t_perso` (
  `perso_id` int(11) NOT NULL,
  `perso_nom` varchar(255) NOT NULL,
  `perso_prenom` varchar(255) NOT NULL,
  `perso_poste` varchar(255) NOT NULL,
  `perso_img` varchar(300) NOT NULL,
  `perso_facebook` varchar(300) NOT NULL,
  `perso_github` varchar(300) NOT NULL,
  `perso_codepen` varchar(300) NOT NULL,
  `perso_tel` varchar(255) NOT NULL,
  `perso_adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_perso`
--

INSERT INTO `t_perso` (`perso_id`, `perso_nom`, `perso_prenom`, `perso_poste`, `perso_img`, `perso_facebook`, `perso_github`, `perso_codepen`, `perso_tel`, `perso_adresse`) VALUES
(1, 'Bawaka', 'Shawn', 'Developpeur web', 'http://digitalspyuk.cdnds.net/12/44/768x993/gallery_movies_star_wars_bts_pics_13.jpg', 'https://www.facebook.com/profile.php?id=100008801719489', 'https://github.com/adricen', 'https://codepen.io/Adricen/', '05 16 48 16', '45 Rue du foutoire 45023 Creuzie');

-- --------------------------------------------------------

--
-- Structure de la table `t_portfolio`
--

CREATE TABLE `t_portfolio` (
  `port_id` int(11) NOT NULL,
  `port_name` varchar(255) NOT NULL,
  `port_lieu` varchar(255) NOT NULL,
  `port_descriptif` varchar(1000) NOT NULL,
  `port_date` date NOT NULL,
  `port_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_portfolio`
--

INSERT INTO `t_portfolio` (`port_id`, `port_name`, `port_lieu`, `port_descriptif`, `port_date`, `port_img`) VALUES
(1, 'Site de la prefecture', 'Paris', 'J''ai fait le sit de la prefecture', '2017-08-09', 'https://cms-assets.tutsplus.com/uploads/users/30/posts/27134/image/elelemnents.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `usr_salt` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `usr_role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`usr_id`, `usr_name`, `usr_password`, `usr_salt`, `usr_role`) VALUES
(3, 'admin', '$2y$13$A8MQM2ZNOi99EW.ML7srhOJsCaybSbexAj/0yXrJs4gQ/2BqMMW2K', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN'),
(6, 'Adricen', '$2y$13$Jz8z9URQQhtMSrJxv.B/iOmudR.ILGk84DN4f31/5YwmDtUZ.Vgc.', '01643b5402b3f86883d75fb', 'ROLE_ADMIN');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_article`
--
ALTER TABLE `t_article`
  ADD PRIMARY KEY (`art_id`);

--
-- Index pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_com_art` (`art_id`),
  ADD KEY `fk_com_usr` (`usr_id`);

--
-- Index pour la table `t_experience`
--
ALTER TABLE `t_experience`
  ADD PRIMARY KEY (`xp_id`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`loisir_id`);

--
-- Index pour la table `t_perso`
--
ALTER TABLE `t_perso`
  ADD PRIMARY KEY (`perso_id`);

--
-- Index pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  ADD PRIMARY KEY (`port_id`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_article`
--
ALTER TABLE `t_article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_experience`
--
ALTER TABLE `t_experience`
  MODIFY `xp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `loisir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_perso`
--
ALTER TABLE `t_perso`
  MODIFY `perso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `fk_com_art` FOREIGN KEY (`art_id`) REFERENCES `t_article` (`art_id`),
  ADD CONSTRAINT `fk_com_usr` FOREIGN KEY (`usr_id`) REFERENCES `t_user` (`usr_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
