-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2019 at 06:37 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `comment_access` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_privilege`
--

CREATE TABLE `account_privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `account_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commune`
--

CREATE TABLE `commune` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `wilaya_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commune`
--

INSERT INTO `commune` (`id`, `name`, `wilaya_id`) VALUES
(18, 'Ain-El-Turk', 31),
(7, 'Akbou', 6),
(17, 'Béni Abbès', 8),
(3, 'Boumerdes-centre', 35),
(14, 'Chéraga', 16),
(21, 'Cherchell', 42),
(23, 'Dar-El-Beida', 16),
(5, 'Djamaa', 39),
(9, 'El-Eulma', 19),
(22, 'El-Menia', 47),
(8, 'Es-Senia', 15),
(2, 'Es-Senia', 31),
(6, 'Freha', 15),
(16, 'Hennaya', 13),
(15, 'Hussein-Dey', 16),
(13, 'Ibn-Badis', 25),
(20, 'Lakhdaria', 10),
(0, 'Mansoura', 27),
(4, 'Oued Smar', 16),
(11, 'Rouiba', 16),
(12, 'Saoura', 8),
(24, 'Sidi Brahim', 22),
(10, 'Soûmaa', 9),
(19, 'Tenès', 2);

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id`, `name`) VALUES
(6, 'Agronomie'),
(4, 'Commerce et finance'),
(8, 'Electronique'),
(2, 'Hôtellerie'),
(7, 'Informatique'),
(3, 'Mécanique'),
(1, 'Plomberie'),
(5, 'Vétérnaire');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `hours_volume` int(11) NOT NULL,
  `ht` int(11) NOT NULL,
  `percentage_ttc` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formation_type`
--

CREATE TABLE `formation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formation_type`
--

INSERT INTO `formation_type` (`id`, `name`) VALUES
(1, 'database');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(5) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `domain` int(11) DEFAULT NULL,
  `commune_id` int(11) NOT NULL,
  `adress` varchar(120) NOT NULL,
  `phone_number` varchar(120) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `type_id`, `domain`, `commune_id`, `adress`, `phone_number`, `online`) VALUES
(1, 'Ecole El-Falah', 3, NULL, 0, '50 Rue de la liberte', '021 56 25 70', 1),
(2, 'Ecole El-Nadjah', 0, NULL, 13, '50 Rue des oliviers', '021 56 25 70', 1),
(3, 'Ecole Les glycines', 3, NULL, 14, '50 Rue de la gare', '021 56 25 70', 1),
(4, 'Institue de mecanique', 4, 3, 10, '50 Rue de la gare', '021 56 25 70', 1),
(5, 'Ecole Superieure d’Electronique', NULL, 8, 3, '3500 Rue de la liberte', '035 56 25 70', 1),
(6, 'Ecole Superieure de Commerce', NULL, NULL, 2, '50 Rue des martyrs', '031 56 25 70', 1),
(7, 'Institue des métiers du bâtiments', 4, 1, 12, '50 Rue des oliviers', '021 56 25 70', 1),
(8, 'Ecole El-Moutafawikines', 2, NULL, 19, '50 Rue des martyrs', '021 56 25 70', 1),
(9, 'Ecole El-Nadjihine', 1, NULL, 20, '50 Rue des dunes', '021 56 25 70', 1),
(11, 'Ecole Les Poussins', 0, NULL, 23, '50 Rue de la liberte', '021 56 25 70', 1),
(12, 'Ecole Supérieure d’Informatique', 5, 7, 4, '68 rue de la gare', '023 56 25 70', 1),
(13, 'Ecole Supérieure d’Agronomie', 5, 6, 5, '30 Rue des dunes', '026 56 25 70', 1),
(14, 'Ecole Supérieure Vétérinaire', 5, 5, 6, '10 Rue des oliviers', '025 56 25 70', 1),
(15, 'Institue Supérieure de commerce', 5, 4, 7, '20 Rue de la montagne', '032 56 25 70', 1),
(16, 'Institue d’hôtellerie et restauration', 4, 2, 8, '0 Rue des martyrs', '021 56 25 70', 1),
(17, 'Institue des métiers de plomberie et chauffage', 4, 1, 9, '50 Rue de la liberté', '021 56 25 70', 1),
(18, 'Institue d’hygiène et sécurité', 4, 4, 11, '50 Rue des dunes', '021 56 25 70', 1),
(19, 'Ecole Madrassati', 3, NULL, 15, '50 Rue des oliviers', '021 56 25 70', 1),
(20, 'Ecole El-Fath', 2, NULL, 16, '50 Rue des dunes', '021 56 25 70', 1),
(21, 'Ecole El-Oumma', 3, NULL, 21, '50 Rue des dunes.', '021 56 25 70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_account`
--

CREATE TABLE `school_account` (
  `id_school` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_type`
--

CREATE TABLE `school_type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_type`
--

INSERT INTO `school_type` (`id`, `name`) VALUES
(0, 'maternelle'),
(1, 'primaire'),
(2, 'moyen'),
(3, 'secondaire'),
(4, 'formation professionnelle'),
(5, 'universitaire');

-- --------------------------------------------------------

--
-- Table structure for table `wilaya`
--

CREATE TABLE `wilaya` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilaya`
--

INSERT INTO `wilaya` (`id`, `name`) VALUES
(1, 'Adrar'),
(2, 'Chlef'),
(3, 'Laghouat'),
(4, 'Oum El Bouaghi'),
(5, 'Batna'),
(6, 'Béjaïa'),
(7, 'Biskra'),
(8, 'Béchar'),
(9, 'Blida'),
(10, 'Bouira'),
(11, 'Tamanrasset'),
(12, 'Tébessa'),
(13, 'Tlemcen'),
(14, 'Tiaret'),
(15, 'Tizi Ouzou'),
(16, 'Alger'),
(17, 'Djelfa'),
(18, 'Jijel'),
(19, 'Sétif'),
(20, 'Saïda'),
(21, 'Skikda'),
(22, 'Sidi Bel Abbès'),
(23, 'Annaba'),
(24, 'Guelma'),
(25, 'Constantine'),
(26, 'Médéa'),
(27, 'Mostaganem'),
(28, 'M\'Sila'),
(29, 'Mascara'),
(30, 'Ouargla'),
(31, 'Oran'),
(32, 'El Bayadh'),
(33, 'Illizi'),
(34, 'Bordj Bou Arreridj'),
(35, 'Boumerdès'),
(36, 'El Tarf'),
(37, 'Tindouf'),
(38, 'Tissemsilt'),
(39, 'El Oued'),
(40, 'Khenchela'),
(41, 'Souk Ahras'),
(42, 'Tipaza'),
(43, 'Mila'),
(44, 'Aïn Defla'),
(45, 'Naâma'),
(46, 'Aïn Témouchent'),
(47, 'Ghardaïa'),
(48, 'Relizane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- Indexes for table `account_privilege`
--
ALTER TABLE `account_privilege`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`wilaya_id`),
  ADD KEY `wilaya_id` (`wilaya_id`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_id` (`type_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `formation_type`
--
ALTER TABLE `formation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nom` (`name`,`commune_id`),
  ADD KEY `commune_id` (`commune_id`),
  ADD KEY `domain_fk` (`domain`),
  ADD KEY `tfk` (`type_id`);

--
-- Indexes for table `school_account`
--
ALTER TABLE `school_account`
  ADD UNIQUE KEY `id_account` (`id_account`),
  ADD KEY `id_school` (`id_school`),
  ADD KEY `id_account_2` (`id_account`);

--
-- Indexes for table `school_type`
--
ALTER TABLE `school_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilaya`
--
ALTER TABLE `wilaya`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_privilege`
--
ALTER TABLE `account_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formation_type`
--
ALTER TABLE `formation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `school_type`
--
ALTER TABLE `school_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilaya`
--
ALTER TABLE `wilaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `privilege_fk` FOREIGN KEY (`privilege_id`) REFERENCES `account_privilege` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `account_fk` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `sfk` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `wilaya_id_constraint` FOREIGN KEY (`wilaya_id`) REFERENCES `wilaya` (`id`);

--
-- Constraints for table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `school_fk` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`),
  ADD CONSTRAINT `type_fk` FOREIGN KEY (`type_id`) REFERENCES `formation_type` (`id`);

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `commune_fk` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`id`),
  ADD CONSTRAINT `domain_fk` FOREIGN KEY (`domain`) REFERENCES `domain` (`id`),
  ADD CONSTRAINT `tfk` FOREIGN KEY (`type_id`) REFERENCES `school_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `school_account`
--
ALTER TABLE `school_account`
  ADD CONSTRAINT `afk` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `scfk` FOREIGN KEY (`id_school`) REFERENCES `school` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
