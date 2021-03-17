-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 05:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antigaspi`
--

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

CREATE TABLE `association` (
  `idassoc` int(10) NOT NULL,
  `numSIREN` varchar(10) DEFAULT NULL,
  `nomassoc` varchar(35) NOT NULL,
  `objetassoc` varchar(35) NOT NULL,
  `rpzassoc` varchar(35) NOT NULL,
  `telassoc` varchar(10) NOT NULL,
  `emailassoc` varchar(50) NOT NULL,
  `siegesocialassoc` varchar(50) DEFAULT NULL,
  `adresseassoc` varchar(80) NOT NULL,
  `cpassoc` varchar(5) NOT NULL,
  `villeassoc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`idassoc`, `numSIREN`, `nomassoc`, `objetassoc`, `rpzassoc`, `telassoc`, `emailassoc`, `siegesocialassoc`, `adresseassoc`, `cpassoc`, `villeassoc`) VALUES
(1, '4578', 'Cora', 'nonbenefit', 'xcx', '1028373939', 'HJ@GMAIL', '8', 'avenu de paris', '91444', 'GIF SUR YVETTE'),
(2, 'uiui', 'zz', 'rr', 'tt', 'tttr', 'eze@gmail.com', 'zt', 'tt', 'tt', 'bn'),
(3, '1464', 'HGTY', 'GF', 'JDF', '1028373939', 'HJ@GMAIL', '', 'avenu de paris', '91444', 'GIF SUR YVETTE'),
(4, '1464', 'HGTY', 'GF', 'JDF', '1028373939', 'HJ@GMAIL', '', 'avenu de paris', '91444', 'GIF SUR YVETTE');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idcat` int(10) NOT NULL,
  `nomcat` varchar(35) NOT NULL,
  `souscat` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idcat`, `nomcat`, `souscat`) VALUES
(1, 'yaout', 'sub lait');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `iddem` int(10) NOT NULL,
  `datedem` date NOT NULL,
  `qtedem` int(10) NOT NULL,
  `idassoc` int(10) NOT NULL,
  `idoffre` int(10) NOT NULL,
  `statut` varchar(10) NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`iddem`, `datedem`, `qtedem`, `idassoc`, `idoffre`, `statut`) VALUES
(1, '2021-03-03', 80, 1, 1, 'fini'),
(2, '2021-03-04', 80, 2, 2, 'fini');

-- --------------------------------------------------------

--
-- Table structure for table `enseigne`
--

CREATE TABLE `enseigne` (
  `numSIRET` varchar(10) NOT NULL,
  `nomens` varchar(35) NOT NULL,
  `statutens` varchar(35) NOT NULL,
  `typeens` varchar(35) NOT NULL,
  `directeur` varchar(70) NOT NULL,
  `siegesocialens` varchar(50) DEFAULT NULL,
  `adresseens` varchar(80) NOT NULL,
  `villeens` varchar(30) NOT NULL,
  `cpens` varchar(5) NOT NULL,
  `responsable` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enseigne`
--

INSERT INTO `enseigne` (`numSIRET`, `nomens`, `statutens`, `typeens`, `directeur`, `siegesocialens`, `adresseens`, `villeens`, `cpens`, `responsable`) VALUES
('abcd', 'Fanta', 'alimentaire', 'htgh', 'robert', 'fhf', '102 Route de Chartres, Porte G', 'Bures sur Yvette', '91440', 'Mary Jane'),
('ghgk', 'fgf', 'gshg', 'ghsf', 'ghsfh', 'fsjyu', 'uyuy', 'ju', 'jyutj', 'rrjuy');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `idoffre` int(10) NOT NULL,
  `objetoffre` varchar(35) NOT NULL,
  `qteoffre` int(10) NOT NULL,
  `dateoffre` date NOT NULL,
  `datefinoffre` date DEFAULT NULL,
  `numSIRET` varchar(10) NOT NULL,
  `codeprod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`idoffre`, `objetoffre`, `qteoffre`, `dateoffre`, `datefinoffre`, `numSIRET`, `codeprod`) VALUES
(1, 'REPAS', 20, '2021-02-03', '2021-03-13', 'abcd', '23'),
(2, 'manger', 40, '2021-03-03', '2021-03-05', 'ghgk', '23');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `codeprod` varchar(10) NOT NULL,
  `nomprod` varchar(35) NOT NULL,
  `marque` varchar(35) NOT NULL,
  `idcat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`codeprod`, `nomprod`, `marque`, `idcat`) VALUES
('23', 'lait_type1', 'auchan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rdv`
--

CREATE TABLE `rdv` (
  `idrdv` int(10) NOT NULL,
  `daterdv` datetime NOT NULL,
  `adresserdv` varchar(35) NOT NULL,
  `cprdv` varchar(5) NOT NULL,
  `villerdv` varchar(30) NOT NULL,
  `iddem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rdv`
--

INSERT INTO `rdv` (`idrdv`, `daterdv`, `adresserdv`, `cprdv`, `villerdv`, `iddem`) VALUES
(1, '2021-02-16 00:00:00', '102 Route de Chartres, Porte G', '91440', 'Bures sur Yvette', 1),
(2, '2021-03-12 00:00:00', 'dfhf', 'hfdh', 'dh', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`idassoc`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcat`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`iddem`),
  ADD KEY `idassoc` (`idassoc`),
  ADD KEY `idoffre` (`idoffre`);

--
-- Indexes for table `enseigne`
--
ALTER TABLE `enseigne`
  ADD PRIMARY KEY (`numSIRET`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idoffre`),
  ADD KEY `codeprod` (`codeprod`),
  ADD KEY `numSIRET` (`numSIRET`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`codeprod`),
  ADD KEY `idcat` (`idcat`);

--
-- Indexes for table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`idrdv`),
  ADD KEY `iddem` (`iddem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `association`
--
ALTER TABLE `association`
  MODIFY `idassoc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `iddem` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `idoffre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `idrdv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`idassoc`) REFERENCES `association` (`idassoc`),
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`idoffre`) REFERENCES `offre` (`idoffre`);

--
-- Constraints for table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`codeprod`) REFERENCES `produit` (`codeprod`),
  ADD CONSTRAINT `offre_ibfk_2` FOREIGN KEY (`numSIRET`) REFERENCES `enseigne` (`numSIRET`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `categorie` (`idcat`);

--
-- Constraints for table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`iddem`) REFERENCES `demande` (`iddem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
