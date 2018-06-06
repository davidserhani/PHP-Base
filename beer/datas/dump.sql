-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 06 juin 2018 à 16:36
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `beer_pdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `beer`
--

CREATE TABLE `beer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `degree` float(3,1) DEFAULT NULL,
  `volum` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `ebc_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `beer`
--

INSERT INTO `beer` (`id`, `name`, `degree`, `volum`, `image`, `price`, `ebc_id`, `brand_id`) VALUES
(1, 'Chimay Bleue', 9.0, 330, 'img/chimay-chimay-bleue.jpg', 1.79, 3, 1),
(2, 'Chimay Blanche', 8.0, 330, 'img/chimay-chimay-blanche.jpg', 1.65, 1, 1),
(3, 'Duvel', 8.5, 330, 'img/duvel-duvel.jpg', 1.99, 1, 2),
(4, 'Duvel Triple hop', 9.5, 330, 'img/duvel-duvel-triple-hop.jpg', 1.95, 1, 2),
(5, 'Ch\'ti Blonde', 6.4, 330, 'img/chti-chti-blonde.jpg', 1.84, 1, 1),
(6, 'Ch\'ti Ambrée', 5.9, 330, 'img/chti-chti-ambree.jpg', 1.46, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Chimay'),
(2, 'Duvel'),
(3, 'Kwak'),
(4, 'Guinness'),
(5, 'Ch\'ti');

-- --------------------------------------------------------

--
-- Structure de la table `brewery`
--

CREATE TABLE `brewery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(2555) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `brewery`
--

INSERT INTO `brewery` (`id`, `name`, `address`, `city`, `zip`, `country`) VALUES
(1, 'Buxton', '1, rue Henri', 'Lille', '59650', 'France'),
(2, 'Frontalier', '3, rue Jean', 'Bailleul', '59270', 'Belgique'),
(3, 'Claude le Brasseur', 'Disneyland Paris', 'Marne-la-Vallée', '77777', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `brewery_made_brand`
--

CREATE TABLE `brewery_made_brand` (
  `brewery_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `brewery_made_brand`
--

INSERT INTO `brewery_made_brand` (`brewery_id`, `brand_id`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ebc`
--

CREATE TABLE `ebc` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `color` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ebc`
--

INSERT INTO `ebc` (`id`, `code`, `color`) VALUES
(1, '4', 'F8F753'),
(2, '26', 'BC6733'),
(3, '39', '5D341A'),
(4, '57', '0F0B0A');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `comment` longtext,
  `Beer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beer`
--
ALTER TABLE `beer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Beer_ebc_idx` (`ebc_id`),
  ADD KEY `fk_Beer_brand1_idx` (`brand_id`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brewery`
--
ALTER TABLE `brewery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brewery_made_brand`
--
ALTER TABLE `brewery_made_brand`
  ADD KEY `fk_brewery_has_brand_brand1_idx` (`brand_id`),
  ADD KEY `fk_brewery_has_brand_brewery1_idx` (`brewery_id`);

--
-- Index pour la table `ebc`
--
ALTER TABLE `ebc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_note_Beer1_idx` (`Beer_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `beer`
--
ALTER TABLE `beer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `brewery`
--
ALTER TABLE `brewery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ebc`
--
ALTER TABLE `ebc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beer`
--
ALTER TABLE `beer`
  ADD CONSTRAINT `fk_Beer_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Beer_ebc` FOREIGN KEY (`ebc_id`) REFERENCES `ebc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `brewery_made_brand`
--
ALTER TABLE `brewery_made_brand`
  ADD CONSTRAINT `fk_brewery_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_brewery_has_brand_brewery1` FOREIGN KEY (`brewery_id`) REFERENCES `brewery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_note_Beer1` FOREIGN KEY (`Beer_id`) REFERENCES `beer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
