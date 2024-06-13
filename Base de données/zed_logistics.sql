-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 10 oct. 2019 à 20:59
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zed_logistics`
--

-- --------------------------------------------------------

--
-- Structure de la table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account_types`
--

INSERT INTO `account_types` (`id`, `code`, `label`) VALUES
(1, 'AGS', 'Agent Suisse'),
(2, 'AGC', 'Agent Cameroun'),
(3, 'ADM', 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `cni` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `firstName`, `lastName`, `gender`, `cni`, `phone`, `email`, `adress`, `created_at`, `updated_at`) VALUES
(2, 'Dabs', 'Du 93', 'Homme', '452145', '698674513', 'dabsdu93@gmail.com', 'Paris 93', '2019-09-18 02:46:48', '2019-09-18 02:50:44'),
(3, 'Kalash', 'Criminel', 'Homme', '451245022', '678451245', 'kalash.crimi@gmail.com', '93 Rue d\'Evry', '2019-09-27 10:54:44', '2019-09-27 10:54:44'),
(4, 'toto', 'toto', 'Homme', '4154515485415', '695432166', 'toto@gmail.com', 'monti', '2019-09-27 22:30:56', '2019-09-27 22:30:56'),
(5, 'Bikoe', 'Geordane', 'Homme', '656213264562', '698465213', 'caro@gmail.com', 'Paris 18', '2019-09-27 22:31:42', '2019-09-27 22:31:42');

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE `colis` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `nature` varchar(500) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `contenance` text,
  `poids` double DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `valeur_euro` double DEFAULT NULL,
  `date_entree` date DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `moyen_envoi` text,
  `country` varchar(50) DEFAULT NULL,
  `statut` varchar(50) DEFAULT 'En attente',
  `tarif_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `colis`
--

INSERT INTO `colis` (`id`, `client_id`, `receiver_id`, `nature`, `nom`, `contenance`, `poids`, `quantite`, `valeur_euro`, `date_entree`, `date_arrivee`, `moyen_envoi`, `country`, `statut`, `tarif_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Documents', 'Acte de mariage', 'Documents', 0.2, 2, 2, '2019-09-27', '2019-09-26', 'Bâteau', 'Suisse', 'Envoyé', 1, '2019-09-18 04:26:32', '2019-09-27 21:40:39'),
(6, 2, 3, 'Véhicule', 'Voiture', 'Voiture nor', 10000, 1, 6500, '2019-09-27', '2019-10-04', 'Bâteau', 'Cameroun', 'Retiré', 1, '2019-09-27 10:55:28', '2019-10-06 21:52:44'),
(7, 5, 4, 'mobile', 'téléphone', 'deux téléphones iphones', 0.5, 2, 5, '2019-09-27', '2020-01-01', 'Avion', 'Suisse', 'Retiré', 1, '2019-09-27 22:34:11', '2019-10-06 14:57:34'),
(8, 2, 2, 'rien', 'rien', 'rien', 4, 5, 5, '2019-09-27', '2020-02-01', 'Bâteau', 'Suisse', 'Envoyé', 1, '2019-09-27 22:49:20', '2019-09-27 22:55:38'),
(9, 4, 3, 'Electroménager', 'congelateur', 'appareils', 25, 1, 3, '2019-09-27', '2020-10-10', 'Bâteau', 'Cameroun', 'En attente', 1, '2019-09-27 23:03:04', '2019-09-27 23:03:04'),
(10, 4, 3, 'Electroménager', 'congelateur', 'appareils', 25, 1, 3, '2019-09-27', '2020-10-10', 'Bâteau', 'Cameroun', 'Retiré', 1, '2019-09-27 23:03:33', '2019-10-05 11:01:49'),
(11, 4, 5, 'tatatatta', 'tatatatata', 'tatatatatatat', 2, 2, 15, '2019-10-02', '2019-10-23', 'Avion', 'Suisse', 'Retiré', 2, '2019-10-02 12:32:14', '2019-10-02 12:36:19'),
(12, 5, 3, 'document', 'CNI', 'carte', 1, 1, 15, '2019-10-06', '2019-10-03', 'Avion', 'Suisse', 'Envoyé', 5, '2019-10-06 21:37:16', '2019-10-06 21:51:26');

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text,
  `state` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `subject`, `message`, `state`, `created_at`, `updated_at`) VALUES
(2, 'Test', 'test@email.com', 'Test', 'test', 1, '2019-09-19 16:34:49', '2019-09-19 16:34:51'),
(3, 'moi', 'ecole@gmail.com', 'qualité', 'je suis fier', 1, '2019-09-28 00:21:17', '2019-09-28 00:21:17'),
(4, 'hfgfgv', 'toto@gmail.com', 'jgfjgv', 'chgc', 0, '2019-10-02 13:39:16', '2019-10-02 13:39:16');

-- --------------------------------------------------------

--
-- Structure de la table `incidents`
--

CREATE TABLE `incidents` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `colis_id` int(11) DEFAULT NULL,
  `motif` text,
  `statut` varchar(50) DEFAULT 'En attente',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `incidents`
--

INSERT INTO `incidents` (`id`, `titre`, `colis_id`, `motif`, `statut`, `created_at`, `updated_at`) VALUES
(3, 'plainte', 7, 'rien', 'Résolu', '2019-09-28 14:27:59', '2019-09-28 14:28:06'),
(4, 'tata', 8, 'tatatatatata', 'Résolu', '2019-10-01 22:40:27', '2019-10-06 15:02:58'),
(5, 'plainte', 7, 'dyxcghfvjhfvhjbvhj', 'Résolu', '2019-10-02 12:37:36', '2019-10-02 12:37:55');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

CREATE TABLE `tarifs` (
  `id` int(11) NOT NULL,
  `montant` double DEFAULT '0',
  `libelle` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tarifs`
--

INSERT INTO `tarifs` (`id`, `montant`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 700000, 'Véhicules légers', '2019-09-18 05:19:54', '2019-10-06 17:04:20'),
(4, 50000, 'Appareils électroménager de moins de 100 KG', '2019-10-06 16:54:37', '2019-10-06 17:04:34'),
(5, 40000, 'Document d\'état civil', '2019-10-06 16:55:29', '2019-10-06 17:04:47'),
(6, 50000, 'Produits textiles de moins de moins de 100 kg', '2019-10-06 16:57:01', '2019-10-06 17:04:05'),
(7, 20000, 'Produits alimentaires de moins de 50 kg', '2019-10-06 16:57:54', '2019-10-06 17:05:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `login`, `country`, `email_verified_at`, `password`, `remember_token`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin', 'Suisse', NULL, '$2y$10$z5mdwLWOtmsfMzykOxyDtuOLSYt5pQHkj6jt9HtAZmHVocfGKYnbG', NULL, 3, '2019-09-18 02:33:00', '2019-09-18 02:33:01'),
(3, 'test', 'test', 'test', 'Suisse', NULL, '$2y$10$XpvCrSgx9C7V.PgDPj1mheQ8WFmukaZmNqJPypNnzCsWj3NMzPvg.', NULL, 1, NULL, NULL),
(6, 'camer', 'camer', 'camer', 'Cameroun', NULL, '$2y$10$YJPhYN.k5twGt73495V5..fQNE/hChRjgrPjYEGZ4qmQISvAGryue', NULL, 2, NULL, NULL),
(7, 'IAI-CAMEROUN', 'IAI', 'iai', 'Suisse', NULL, '$2y$10$PGcRlaLhmodpgfJdPxc71.hwv5gyRwQRqpRwPtLL/RNkBX.ViNrGi', NULL, 1, NULL, NULL),
(8, 'IFTIC', 'toto', 'iftic', 'Cameroun', NULL, '$2y$10$2lH1DhS5G.tjn3pREIscgOoD/vCeb9qtz4KY83D9jyf5DF4PJhqnu', NULL, 2, NULL, NULL),
(9, 'bik', 'bik', 'bik', 'Cameroun', NULL, '$2y$10$9bprDJgg4md1Bh3NNYXy4.8MUE8KhRhGhiP8jbtZzjsbqg8Y7et9u', NULL, 3, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_colis_clients` (`client_id`);

--
-- Index pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_incidents_colis` (`colis_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_account_types` (`account_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `FK_colis_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `FK_incidents_colis` FOREIGN KEY (`colis_id`) REFERENCES `colis` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_account_types` FOREIGN KEY (`account_id`) REFERENCES `account_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
