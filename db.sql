-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 12 Avril 2016 à 19:39
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `semaine_intensive`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor_leading_role`
--

CREATE TABLE `actor_leading_role` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `id_api_actor` int(11) NOT NULL,
  `id_api_movie` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `actor_supporting_role`
--

CREATE TABLE `actor_supporting_role` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `id_api_actor` int(11) NOT NULL,
  `id_api_movie` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `actress_leading_role`
--

CREATE TABLE `actress_leading_role` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `id_api_actor` int(11) NOT NULL,
  `id_api_movie` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `actress_supporting_role`
--

CREATE TABLE `actress_supporting_role` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `id_api_actor` int(11) NOT NULL,
  `id_api_movie` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `best_picture`
--

CREATE TABLE `best_picture` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `id_api_movie` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `directing`
--

CREATE TABLE `directing` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `id_api_director` int(11) NOT NULL,
  `id_api_movie` int(11) NOT NULL,
  `winner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `graph1`
--

CREATE TABLE `graph1` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `name_movie` varchar(100) NOT NULL,
  `budget_movie` int(11) NOT NULL,
  `category_movie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `graph2`
--

CREATE TABLE `graph2` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `adventure` int(11) NOT NULL,
  `animation` int(11) NOT NULL,
  `comedy` int(11) NOT NULL,
  `crime` int(11) NOT NULL,
  `documentary` int(11) NOT NULL,
  `drama` int(11) NOT NULL,
  `family` int(11) NOT NULL,
  `fantasy` int(11) NOT NULL,
  `foreignNoBug` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `horror` int(11) NOT NULL,
  `music` int(11) NOT NULL,
  `mystery` int(11) NOT NULL,
  `romance` int(11) NOT NULL,
  `science_fiction` int(11) NOT NULL,
  `thriller` int(11) NOT NULL,
  `war` int(11) NOT NULL,
  `western` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `graph3`
--

CREATE TABLE `graph3` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `old00_20` int(11) NOT NULL,
  `old20_30` int(11) NOT NULL,
  `old30_40` int(11) NOT NULL,
  `old40_50` int(11) NOT NULL,
  `old50_60` int(11) NOT NULL,
  `old60_70` int(11) NOT NULL,
  `old70_00` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `oscar`
--

CREATE TABLE `oscar` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `edition` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `oscar`
--

INSERT INTO `oscar` (`id`, `year`, `edition`) VALUES
(1, 2015, 88);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actor_leading_role`
--
ALTER TABLE `actor_leading_role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actor_supporting_role`
--
ALTER TABLE `actor_supporting_role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actress_leading_role`
--
ALTER TABLE `actress_leading_role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `actress_supporting_role`
--
ALTER TABLE `actress_supporting_role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `best_picture`
--
ALTER TABLE `best_picture`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directing`
--
ALTER TABLE `directing`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `graph1`
--
ALTER TABLE `graph1`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `graph2`
--
ALTER TABLE `graph2`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oscar`
--
ALTER TABLE `oscar`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actor_leading_role`
--
ALTER TABLE `actor_leading_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `actor_supporting_role`
--
ALTER TABLE `actor_supporting_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `actress_leading_role`
--
ALTER TABLE `actress_leading_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `actress_supporting_role`
--
ALTER TABLE `actress_supporting_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `best_picture`
--
ALTER TABLE `best_picture`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `directing`
--
ALTER TABLE `directing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `graph1`
--
ALTER TABLE `graph1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `graph2`
--
ALTER TABLE `graph2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `oscar`
--
ALTER TABLE `oscar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;