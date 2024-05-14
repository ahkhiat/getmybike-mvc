-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 14 mai 2024 à 22:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `get-my-bike-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `note_moto` int(11) DEFAULT NULL,
  `texte_moto` longtext DEFAULT NULL,
  `note_proprio` int(11) DEFAULT NULL,
  `texte_proprio` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`commentaire_id`, `reservation_id`, `note_moto`, `texte_moto`, `note_proprio`, `texte_proprio`, `created_at`) VALUES
(1, 21, 4, 'Excellente Moto !', 1, 'Il a su être rassurant, très bonne expérience !', '2024-03-13 15:57:11'),
(2, 22, 5, 'Vraiment une moto très bien entretenue et très agréable à conduire !', 4, 'Serieux et ponctuel, parfait !', '2024-04-23 10:32:34'),
(3, 23, 3, 'Je me suis regalé, à refaire !', 1, 'Il a su être rassurant, très bonne expérience !', '2024-02-05 06:22:54'),
(4, 24, 4, 'Malgré le fait de ne pas avoir conduit pendant des années, la plaisir était toujours là !', 3, 'Une expérience hors-norme grâce à elle, à recommander !', '2024-05-02 10:29:11'),
(5, 25, 2, 'Très bon véhicule !', 4, 'Personne très sympathique !', '2024-04-19 17:50:29'),
(7, 31, 5, 'Super', 5, 'Super', '2024-05-12 16:57:13'),
(15, 26, 5, 'super', 5, 'super', '2024-05-13 15:13:28'),
(16, 32, 1, 'nul', 1, 'nul', '2024-05-13 15:14:07'),
(17, 34, 5, 'super', 5, 'cette personne est géniale', '2024-05-13 15:16:20');

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

CREATE TABLE `favori` (
  `user_id` int(11) NOT NULL,
  `moto_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favori`
--

INSERT INTO `favori` (`user_id`, `moto_id`, `created_at`) VALUES
(23, 28, '2024-05-12 14:10:20'),
(26, 24, '2024-05-13 15:14:28'),
(26, 28, '2024-05-14 22:12:08'),
(28, 27, '2024-05-11 15:58:35'),
(28, 28, '2024-05-11 15:18:59'),
(29, 27, '2024-05-13 15:15:29');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `marque_id` int(11) NOT NULL,
  `marque_libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`marque_id`, `marque_libelle`) VALUES
(7, 'Yamaha'),
(8, 'Triumph');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `modele_id` int(11) NOT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `modele_libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`modele_id`, `marque_id`, `modele_libelle`) VALUES
(10, 7, 'Fazer 600'),
(11, 7, 'Fazer 1000'),
(12, 8, 'Tiger 800'),
(13, 8, 'Tiger 1200');

-- --------------------------------------------------------

--
-- Structure de la table `moto`
--

CREATE TABLE `moto` (
  `moto_id` int(11) NOT NULL,
  `proprietaire_id` int(11) DEFAULT NULL,
  `modele_id` int(11) DEFAULT NULL,
  `annee` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `prix_jour` int(11) NOT NULL,
  `dispo` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `moto_image_name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `bagagerie` tinyint(1) NOT NULL,
  `adresse_moto` varchar(255) DEFAULT NULL,
  `code_postal_moto` varchar(5) DEFAULT NULL,
  `ville_moto` varchar(255) DEFAULT NULL,
  `cylindree` varchar(255) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `puissance` int(11) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `moto`
--

INSERT INTO `moto` (`moto_id`, `proprietaire_id`, `modele_id`, `annee`, `couleur`, `prix_jour`, `dispo`, `created_at`, `moto_image_name`, `description`, `bagagerie`, `adresse_moto`, `code_postal_moto`, `ville_moto`, `cylindree`, `poids`, `puissance`, `options`) VALUES
(21, 21, 11, '1994', 'green', 163, 0, '2024-05-06 17:00:33', 'Besnard_2024.05.11_01.24.32pm.jpg', 'Mon véhicule est bien entretenu et en très bon état. Il dispose de toutes les options possible pour ce véhicule (kit Bluetooth, caméra de recule, etc …) pour le confort de tous. Le véhicule est livré avec une batterie pleine, il n\'est pas nécessaire de recharger le véhicule s\'il est rendu avec au moins 30 km d\'autonomie.', 0, NULL, NULL, 'Marseille', '800', 166, 122, NULL),
(22, 21, 13, '1971', 'blue', 166, 0, '2024-05-06 17:00:33', 'Besnard_2024.05.11_01.24.55pm.jpg', 'Mon véhicule est bien entretenu et en très bon état. Il dispose de toutes les options possible pour ce véhicule (kit Bluetooth, caméra de recule, etc …) pour le confort de tous. Le véhicule est livré avec une batterie pleine, il n\'est pas nécessaire de recharger le véhicule s\'il est rendu avec au moins 30 km d\'autonomie.', 1, NULL, NULL, NULL, '1300', 296, 96, NULL),
(23, 21, 12, '2010', 'teal', 211, 0, '2024-05-06 17:00:33', 'Besnard_2024.05.11_01.25.08pm.jpg', 'Mon véhicule est bien entretenu et en très bon état. Il dispose de toutes les options possible pour ce véhicule (kit Bluetooth, caméra de recule, etc …) pour le confort de tous. Le véhicule est livré avec une batterie pleine, il n\'est pas nécessaire de recharger le véhicule s\'il est rendu avec au moins 30 km d\'autonomie.', 1, NULL, NULL, NULL, '600', 294, 163, NULL),
(24, 22, 12, '1985', 'fuchsia', 173, 1, '2024-05-06 17:00:33', 'Millet_2024.05.11_01.29.50pm.jpg', 'Moto avec marche arrière pour une plus grande facilité de manœuvre en ville. Confortable et entretenue, elle consomme peu et vous emmènera avec facilité aussi bien en ville que sur autoroute.', 1, NULL, NULL, NULL, '800', 253, 101, NULL),
(25, NULL, NULL, '2012', 'Grise', 185, 1, '2024-05-10 17:34:43', NULL, 'ptdrr', 1, '', '', '', '1200', 215, 190, NULL),
(27, 26, 13, '2012', 'Jaune', 200, 1, '2024-05-10 18:21:52', 'Leung_2024.05.11_01.37.37pm.jpg', '', 1, '', '', '', '1200', 215, 190, NULL),
(28, 28, 10, '2000', 'Jaune canari', 90, 1, '2024-05-10 18:43:42', 'Leung_2024.05.11_08.46.34am.jpeg', 'C\'est une très belle moto que j\'adore ahahahah !', 1, '', '', '', '600', 170, 96, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `proprietaire_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `est_super_hote` tinyint(1) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `is_verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`proprietaire_id`, `user_id`, `est_super_hote`, `iban`, `created_at`, `is_verified`) VALUES
(21, 22, 0, NULL, '2024-05-06 17:00:33', 0),
(22, 23, 0, NULL, '2024-05-06 17:00:33', 1),
(23, 24, 0, NULL, '2024-05-06 17:00:33', 1),
(24, 25, 1, NULL, '2024-05-06 17:00:33', 1),
(26, 26, NULL, 'FR763000400050006000', '2024-05-10 00:11:14', NULL),
(27, 27, NULL, 'FR761000200030004000', '2024-05-10 08:33:26', NULL),
(28, 28, NULL, 'gnignignignigni', '2024-05-10 18:24:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `moto_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_id`, `moto_id`, `date_debut`, `date_fin`, `created_at`) VALUES
(21, 22, 21, '2024-05-01 21:30:45', '2024-05-09 01:58:25', '2024-05-11 18:40:45'),
(22, 23, 22, '2024-05-06 02:55:56', '2024-05-07 09:00:54', '2024-05-11 18:40:45'),
(23, 24, 23, '2024-05-03 12:03:38', '2024-05-08 01:59:04', '2024-05-11 18:40:45'),
(24, 24, 24, '2024-05-05 02:50:18', '2024-05-13 16:16:26', '2024-05-11 18:40:45'),
(25, 23, 24, '2024-05-16 14:57:47', '2024-05-18 14:57:47', '2024-05-11 18:40:45'),
(26, 26, 22, '2024-05-07 16:02:01', '2024-05-07 16:02:01', '2024-05-11 18:40:45'),
(30, 23, 24, '2024-06-09 00:00:00', '2024-06-13 00:00:00', '2024-05-11 23:38:16'),
(31, 23, 28, '2024-06-19 00:00:00', '2024-06-20 00:00:00', '2024-05-12 14:10:41'),
(32, 26, 24, '2024-05-02 11:30:52', '2024-05-04 11:30:52', '2024-05-13 11:31:33'),
(33, 23, 21, '2024-05-02 00:00:00', '2024-05-04 00:00:00', '2024-05-13 12:26:36'),
(34, 29, 27, '2024-05-10 00:00:00', '2024-05-11 00:00:00', '2024-05-13 15:15:42');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `lastActivityTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `email`, `pswd`, `roles`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `telephone`, `created_at`, `updated_at`, `is_verified`, `image_name`, `date_naissance`, `bio`, `lastActivityTime`) VALUES
(22, 'aurelie@gmail.com', '$2y$10$rv9Pevj7qSXUa9NYwmWhUO682JTPflCzI2GtOzpyUFPf8qkEguqL6', NULL, 'Besnard', 'Aurélie', '3, impasse Madeleine Schneider', '22 63', 'Lyon', '0967597826', '2024-05-06 17:00:33', NULL, 0, 'Besnard_2024.05.11_01.23.48pm.png', '1977-05-05', 'Rerum non quisquam dolores eaque beatae eum atque.', '2024-05-13 11:11:29'),
(23, 'thomas@gmail.com', '$2y$10$rv9Pevj7qSXUa9NYwmWhUO682JTPflCzI2GtOzpyUFPf8qkEguqL6', NULL, 'Millet', 'Thomas', 'avenue Guyot', '10273', 'Arles', '0612345699', '2024-05-06 17:00:33', '2024-05-11 16:39:14', 1, 'Millet_2024.05.11_01.36.20pm.jpeg', '1988-08-15', 'Je n\'aime pas écrire de description, cependant je vais faire un petit effort si ça peut permettre qu\'on me loue ma moto.', '2024-05-13 11:11:44'),
(24, 'renee@gmail.com', '$2y$10$rv9Pevj7qSXUa9NYwmWhUO682JTPflCzI2GtOzpyUFPf8qkEguqL6', NULL, 'Marie', 'Renée', '4, chemin Raymond Vasseur', '56 63', 'Angers', '+33 (0)1 44 50 28 10', '2024-05-06 17:00:33', NULL, 0, 'user_1144760.png', '2002-12-14', 'Ut distinctio exercitationem distinctio quisquam animi et enim.', '2024-05-07 13:37:55'),
(25, 'lucas@gmail.com', '$2y$10$rv9Pevj7qSXUa9NYwmWhUO682JTPflCzI2GtOzpyUFPf8qkEguqL6', NULL, 'Hoarau', 'Lucas', '69, avenue Odette Thomas', '12901', 'Strasbourg', '04 65 58 50 33', '2024-05-06 17:00:33', NULL, 1, 'user_1144760.png', '1978-09-11', 'Veniam unde assumenda cum fugiat iure nihil.', '2024-05-07 13:37:55'),
(26, 'ahkhiat@hotmail.com', '$2y$10$xMDoaIZcTw49gda6j31GeO3jmbaHvpKHKZd.hM6tY3yqJJSD6c6xG', 'admin', 'Leung', 'Thierry', '15 rue des roses', '13005', 'Marseille', '0612345678', '0000-00-00 00:00:00', NULL, NULL, 'Leung_2024.05.11_01.37.02pm.png', '2000-01-01', NULL, '2024-05-14 22:15:39'),
(27, 'macron@gmail.com', '$2y$10$rv9Pevj7qSXUa9NYwmWhUO682JTPflCzI2GtOzpyUFPf8qkEguqL6', 'user', 'Macron', 'Manu', NULL, NULL, 'Nanterre', NULL, '2024-05-10 08:10:49', NULL, NULL, NULL, NULL, NULL, '2024-05-10 18:22:51'),
(28, 'sophie@gmail.com', '$2y$10$s1FR3jUrPn.FhOzTPIs2PuFzvDsFNnixXV5DoftL/amTFcuKQYJ06', 'user', 'Leung', 'Sophie', '99 bd Jeanne d\'Arc', '13005', 'Marseille', '0612345655', '2024-05-10 18:23:40', '2024-05-11 16:38:13', NULL, 'Leung_2024.05.11_08.34.51am.webp', '2009-12-10', 'J\'aime l\'ecole et j\'aime les motos', '2024-05-11 13:38:31'),
(29, 'mustapha@gmail.com', '$2y$10$oPfoEKP8YuUvWd2JloTp4.7wuNUMaXNvbrPhIhepRE6QqLbJV77sC', 'user', 'Mabrouk', 'Mustapha', NULL, NULL, 'Vitrolles', NULL, '2024-05-13 15:15:13', NULL, NULL, 'Mabrouk_2024.05.13_03.16.32pm.png', NULL, NULL, '2024-05-13 15:15:13'),
(30, 'sabri@gmail.com', '$2y$10$SVKj/Hic.iGhkjfqNzQV0eVprttSh.volinofwghI/SUOwfnLpCiO', 'user', 'Chafroud', 'Sabri', NULL, NULL, 'La Seyne', NULL, '2024-05-13 15:28:44', NULL, NULL, NULL, NULL, NULL, '2024-05-13 15:28:44');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`commentaire_id`),
  ADD UNIQUE KEY `reservation_id` (`reservation_id`),
  ADD UNIQUE KEY `reservation_id_2` (`reservation_id`),
  ADD KEY `IDX_67F068BCB83297E7` (`reservation_id`);

--
-- Index pour la table `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`user_id`,`moto_id`),
  ADD KEY `moto_id` (`moto_id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`marque_id`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`modele_id`),
  ADD KEY `IDX_100285584827B9B2` (`marque_id`);

--
-- Index pour la table `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`moto_id`),
  ADD KEY `IDX_3DDDBCE476C50E4A` (`proprietaire_id`),
  ADD KEY `IDX_3DDDBCE4AC14B70A` (`modele_id`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`proprietaire_id`),
  ADD KEY `IDX_69E399D6A76ED395` (`user_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `IDX_42C84955A76ED395` (`user_id`),
  ADD KEY `IDX_42C8495578B8F2AC` (`moto_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `commentaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `marque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `modele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `moto`
--
ALTER TABLE `moto`
  MODIFY `moto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `proprietaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BCB83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`);

--
-- Contraintes pour la table `favori`
--
ALTER TABLE `favori`
  ADD CONSTRAINT `favori_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `favori_ibfk_2` FOREIGN KEY (`moto_id`) REFERENCES `moto` (`moto_id`);

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `FK_100285584827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`marque_id`);

--
-- Contraintes pour la table `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `FK_3DDDBCE476C50E4A` FOREIGN KEY (`proprietaire_id`) REFERENCES `proprietaire` (`proprietaire_id`),
  ADD CONSTRAINT `FK_3DDDBCE4AC14B70A` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`modele_id`);

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `FK_69E399D6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C8495578B8F2AC` FOREIGN KEY (`moto_id`) REFERENCES `moto` (`moto_id`),
  ADD CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
