-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 19 nov. 2021 à 18:43
-- Version du serveur :  5.5.45
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `Smartphone`
--

DROP TABLE IF EXISTS `smatphone`; 
CREATE TABLE IF NOT EXISTS `smartphone` (
  `Id_smartphone` int(11) NOT NULL AUTO_INCREMENT,
  `Name_smartphone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_smartphone`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `Features`
-- 	 		

INSERT INTO `smartphone` (`Id_smartphone`, `Name_smartphone`) VALUES
(1, 'Xiaomi Redmi Note 12'),
(2, 'Apple iPhone 15 plus'),
(3, 'Samsung Galaxy 21 Ultra'),
(4, 'Huawei P30 LiteHaricot');

-- --------------------------------------------------------

--
-- Structure de la table `Features`
--

DROP TABLE IF EXISTS `Features`;
CREATE TABLE IF NOT EXISTS `Features` (
  `Id_Features` int(11) NOT NULL AUTO_INCREMENT,
  `Name_Features` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Features`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `Features`
--

INSERT INTO `Features` (`Id_Features`, `Name_features`) VALUES
(1, 'Display'),
(2, 'RAM'),
(3, 'Storage'),
(4, 'OS'),
(5, 'Removable battery'),
(6, 'Wireless charging');


-- --------------------------------------------------------

--
-- Structure de la table `Smartphone-features`
--

DROP TABLE IF EXISTS `Smartphone_Features`;
CREATE TABLE IF NOT EXISTS `Smartphone_Features` (
  `Id_Smartphone_Features` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Smartphone` int(11),
  `Id_Features` int(11),
  `Value_Smartphone_Features` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Id_Smartphone_Features`),
  FOREIGN KEY (`Id_Smartphone`) REFERENCES `Smartphone` (`Id_Smartphone`),
  FOREIGN KEY (`Id_Features`) REFERENCES `Features` (`Id_Features`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Déchargement des données de la table `Smartphone-features`
--

INSERT INTO `Smartphone_Features` (`Id_Smartphone_Features`,`Id_Smartphone`,`Id_Features`,`Value_Smartphone_Features`) VALUES
(1,1,1, '6.67 inch'),
(2,1,2, '6 GB'),
(3,1,3, '128 GB'),
(4,1,4, 'Android'),
(5,1,5, 'No'),
(6,1,6, 'No'),
(7,2,1, '6.70 inch'),
(8,2,2, '8 GB'),
(9,2,3, '512 GB'),
(10,2,4, 'iOS'),
(11,2,5, 'No'),
(12,2,6, 'Yes'),
(13,3,1, '6.80 inch'),
(14,3,2, '12 GB'),
(15,3,3, '1 TB'),
(16,3,4, 'Android'),
(17,3,5, 'No'),
(18,3,6, 'Yes'),
(19,4,1, '6.15 inch'),
(20,4,2, '4 GB'),
(21,4,3, '128 GB'),
(22,4,4, 'Android'),
(23,4,5, 'No'),
(24,4,6, 'No');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
