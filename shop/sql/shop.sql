-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 fév. 2022 à 19:11
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'sweat a capuche N', '<div>toto</div>'),
(2, 't-shirt  n', '<div>jthrgef</div>'),
(3, 'Sweatshirt N', '<div>ikiytynrbtev</div>');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220212190442', '2022-02-12 19:04:54', 774),
('DoctrineMigrations\\Version20220213150755', '2022-02-13 15:08:02', 56);

-- --------------------------------------------------------

--
-- Structure de la table `line_order`
--

DROP TABLE IF EXISTS `line_order`;
CREATE TABLE IF NOT EXISTS `line_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AADB41BCFFE9AD6` (`orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `line_order`
--

INSERT INTO `line_order` (`id`, `orders_id`, `quantity`, `subtotal`) VALUES
(1, 1, 4, 4),
(2, 1, 4, 76),
(3, 2, 4, 4),
(4, 2, 4, 76),
(5, 3, 4, 4),
(6, 3, 4, 76),
(7, 4, 4, 4),
(8, 4, 4, 76),
(9, 5, 4, 4),
(10, 5, 4, 76),
(11, 6, 4, 4),
(12, 6, 4, 76),
(13, 7, 4, 4),
(14, 7, 4, 76),
(15, 8, 4, 4),
(16, 8, 4, 76),
(17, 9, 4, 4),
(18, 9, 4, 76),
(19, 10, 4, 4),
(20, 10, 4, 76),
(21, 11, 4, 4),
(22, 11, 4, 76),
(23, 12, 4, 4),
(24, 12, 4, 76),
(25, 13, 4, 4),
(26, 13, 4, 76),
(27, 13, 1, 19),
(28, 14, 4, 4),
(29, 14, 4, 76),
(30, 14, 1, 19),
(31, 15, 4, 76),
(32, 15, 3, 89.97),
(33, 16, 4, 76),
(34, 16, 3, 89.97),
(35, 17, 4, 76),
(36, 17, 3, 89.97),
(37, 18, 8, 8),
(38, 19, 1, 19),
(39, 20, 3, 3),
(40, 21, 3, 57),
(41, 22, 4, 4),
(42, 23, 3, 57),
(43, 24, 6, 114),
(44, 25, 4, 4),
(45, 26, 6, 6),
(46, 27, 6, 6),
(47, 28, 6, 114),
(48, 29, 5, 95),
(49, 30, 7, 133),
(50, 30, 4, 76),
(51, 31, 6, 114),
(52, 32, 4, 76),
(53, 32, 4, 76);

-- --------------------------------------------------------

--
-- Structure de la table `line_order_product`
--

DROP TABLE IF EXISTS `line_order_product`;
CREATE TABLE IF NOT EXISTS `line_order_product` (
  `line_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`line_order_id`,`product_id`),
  KEY `IDX_BDDBB98F5EFC3D42` (`line_order_id`),
  KEY `IDX_BDDBB98F4584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `totalprice` double NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F5299398A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `user_id`, `totalprice`, `date`) VALUES
(1, 1, 80, '2022-02-14 13:13:07'),
(2, NULL, 80, '2022-02-14 13:14:43'),
(3, NULL, 80, '2022-02-14 13:14:48'),
(4, NULL, 80, '2022-02-14 13:15:41'),
(5, NULL, 80, '2022-02-14 13:16:16'),
(6, NULL, 80, '2022-02-14 13:48:55'),
(7, NULL, 80, '2022-02-14 13:50:40'),
(8, NULL, 80, '2022-02-14 14:29:36'),
(9, NULL, 80, '2022-02-14 14:29:56'),
(10, 1, 80, '2022-02-14 15:51:37'),
(11, 1, 80, '2022-02-14 15:52:19'),
(12, 1, 80, '2022-02-14 16:34:33'),
(13, 1, 99, '2022-02-15 10:24:07'),
(14, 1, 99, '2022-02-15 10:25:42'),
(15, 2, 165.97, '2022-02-15 11:47:42'),
(16, 2, 165.97, '2022-02-15 12:31:12'),
(17, 2, 165.97, '2022-02-15 12:31:16'),
(18, 2, 8, '2022-02-15 12:43:15'),
(19, 2, 19, '2022-02-16 14:59:27'),
(20, 2, 3, '2022-02-16 15:05:05'),
(21, 2, 57, '2022-02-16 15:07:39'),
(22, 2, 4, '2022-02-16 15:20:26'),
(23, 2, 57, '2022-02-16 15:50:33'),
(24, 2, 114, '2022-02-17 10:19:34'),
(25, 1, 4, '2022-02-17 13:54:23'),
(26, NULL, 6, '2022-02-17 14:36:34'),
(27, NULL, 6, '2022-02-17 14:37:32'),
(28, 3, 114, '2022-02-17 16:02:11'),
(29, 1, 95, '2022-02-17 16:08:32'),
(30, 1, 209, '2022-02-17 16:12:20'),
(31, 1, 114, '2022-02-17 16:21:34'),
(32, 1, 152, '2022-02-17 18:43:58');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `description`, `image`) VALUES
(3, 2, 'black N', 19, 'noir', 'f4cd7c71-60db-49de-b60b-bb9cbbe6b9ec.JPG97523.jpg'),
(4, 2, 'blanc N', 19, 'blanc', '2d9b4001-fdc3-4552-837a-7c0a2f77d5d2.JPG25611.jpg'),
(5, 2, 'bleu N', 19, 'bleu', '80ec0ea0-39b3-4ad9-88b3-059544e90328.JPG46224.jpg'),
(6, 1, 'cap bleu N', 29.99, 'bleu capuche', '37a429a8-f3ad-4f12-b402-6528b8dc3cd0.JPG92936.jpg'),
(7, 1, 'cap noir N', 30, 'NOIR capuche', 'e57aa8b8-3ce5-4ffb-af36-0d41a242bfd2.JPG94825.jpg'),
(8, 1, 'cap blanc N', 30, 'blanc capuche', '6f1ea102-82d1-4d03-958f-9886636d15e2.JPG30083.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `adress`, `phone`) VALUES
(1, 'ihyppolite971@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$Hwik0wk4OdvPJPEl2vd/QurmmxMmPYfVGtJNF7kAWz7h.vf91klZ6', 'Nathan', 'HYPPOLITE', '4 allée des sophoras', '0769323559'),
(2, 'toto@gmail.com', '[]', '$2y$13$2u4wiraNm..CBlAwwyszfuHfZM8CrTzKlaQTBmCyMlwId3DWVXlTy', 'Nathan', 'HYPPOLITE', '4 allée des sophoras', '0769323559'),
(3, 'azet@gmail.com', '[]', '$2y$13$ov/zD5wWay5//hHMfVggYu030HK8blyaB1zmHqzGSEeOOecyMAmXu', 'aqw', 'zdc', '4 allée des sophoras', '0769323559');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `line_order`
--
ALTER TABLE `line_order`
  ADD CONSTRAINT `FK_AADB41BCFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `line_order_product`
--
ALTER TABLE `line_order_product`
  ADD CONSTRAINT `FK_BDDBB98F4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BDDBB98F5EFC3D42` FOREIGN KEY (`line_order_id`) REFERENCES `line_order` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
