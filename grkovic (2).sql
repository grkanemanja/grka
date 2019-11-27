-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2019 at 08:07 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grkovic`
--

-- --------------------------------------------------------

--
-- Table structure for table `dobavljac`
--

DROP TABLE IF EXISTS `dobavljac`;
CREATE TABLE IF NOT EXISTS `dobavljac` (
  `Sifra` varchar(255) NOT NULL,
  `Ime` varchar(255) NOT NULL,
  PRIMARY KEY (`Sifra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dobavljac`
--

INSERT INTO `dobavljac` (`Sifra`, `Ime`) VALUES
('A1', 'MobileShop.com'),
('A2', 'Mobis.hr'),
('E1', 'WinWin.rs'),
('E2', 'Telenor.rs'),
('E3', 'Vip.rs'),
('F1', 'Alibaba.com');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `Email` varchar(255) NOT NULL,
  `Ime` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`Email`, `Ime`, `Password`) VALUES
('grky98@gmail.com', 'Nemanja', 'nemanja123456'),
('nevena@gmai.com', 'Nevena', 'nevena12345'),
('nikolic@gmail.com', 'Nikola', 'nikola111');

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

DROP TABLE IF EXISTS `kupovina`;
CREATE TABLE IF NOT EXISTS `kupovina` (
  `Korisnik` varchar(255) NOT NULL,
  `SifraTelefon` varchar(255) NOT NULL,
  PRIMARY KEY (`Korisnik`,`SifraTelefon`),
  KEY `SifraTelefon` (`SifraTelefon`) USING BTREE,
  KEY `Korisnik` (`Korisnik`,`SifraTelefon`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`Korisnik`, `SifraTelefon`) VALUES
('grky98@gmail.com', 'X2');

-- --------------------------------------------------------

--
-- Table structure for table `serijski_broj`
--

DROP TABLE IF EXISTS `serijski_broj`;
CREATE TABLE IF NOT EXISTS `serijski_broj` (
  `Sifra` varchar(255) NOT NULL,
  `Broj` varchar(255) NOT NULL,
  PRIMARY KEY (`Sifra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serijski_broj`
--

INSERT INTO `serijski_broj` (`Sifra`, `Broj`) VALUES
('34', 'G3L5NB6'),
('35', '895JQ43'),
('36', 'PNB328G'),
('38', 'LNS2867'),
('39', '107CZ2I'),
('40', 'P20VK66'),
('45', '97GV32B'),
('47', 'ISP4FB1'),
('48', '92HX1LZ');

-- --------------------------------------------------------

--
-- Table structure for table `sliketelefona`
--

DROP TABLE IF EXISTS `sliketelefona`;
CREATE TABLE IF NOT EXISTS `sliketelefona` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliketelefona`
--

INSERT INTO `sliketelefona` (`ID`, `Path`) VALUES
(9, 'galerija/__p30pro.png'),
(10, 'galerija/__iphone-xs-max.png'),
(11, 'galerija/__iphone8-plus.png'),
(12, 'galerija/_G7.jpg'),
(13, 'galerija/__mi9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `telefon`
--

DROP TABLE IF EXISTS `telefon`;
CREATE TABLE IF NOT EXISTS `telefon` (
  `Sifra` varchar(255) NOT NULL,
  `Naziv` varchar(255) NOT NULL,
  `Cena` int(20) NOT NULL,
  `SifraDobavljac` varchar(255) NOT NULL,
  `SifraSerijski` varchar(255) NOT NULL,
  PRIMARY KEY (`Sifra`),
  KEY `SifraDobavljac` (`SifraDobavljac`),
  KEY `SifraSerijski` (`SifraSerijski`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telefon`
--

INSERT INTO `telefon` (`Sifra`, `Naziv`, `Cena`, `SifraDobavljac`, `SifraSerijski`) VALUES
('AI1', 'Apple Iphone XS Max', 130000, 'F1', '36'),
('AI2', 'Apple Iphone 8 Plus', 91000, 'F1', '36'),
('H1', 'Huawei P30 Pro', 90000, 'A1', '34'),
('H11', 'Honor View 20', 90000, 'A1', '34'),
('H2', 'Huawei Mate 20X', 79000, 'E1', '39'),
('H22', 'Honor 9', 55000, 'E2', '34'),
('L1', 'LG G7', 58000, 'A1', '48'),
('N1', 'Nokia 9', 70000, 'F1', '47'),
('N2', 'Nokia 8', 54000, 'E1', '47'),
('SG1', 'Samsung Galaxy S10 Plus', 100000, 'F1', '35'),
('SG2', 'Samsung Galaxy Note 9', 85000, 'E1', '35'),
('SX1', 'Sony Xperia 10 Plus', 52000, 'E3', '45'),
('SX2', 'Sony Xperia 10', 42000, 'E3', '45'),
('T1', 'Tesla 9.1', 27000, 'E1', '40'),
('X1', 'Xiaomi Mi 9', 60000, 'E2', '38'),
('X2', 'Xiaomi Mi Mix', 55000, 'E3', '38');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD CONSTRAINT `kupovina_ibfk_1` FOREIGN KEY (`SifraTelefon`) REFERENCES `telefon` (`Sifra`),
  ADD CONSTRAINT `kupovina_ibfk_2` FOREIGN KEY (`Korisnik`) REFERENCES `korisnici` (`Email`);

--
-- Constraints for table `telefon`
--
ALTER TABLE `telefon`
  ADD CONSTRAINT `telefon_ibfk_1` FOREIGN KEY (`SifraDobavljac`) REFERENCES `dobavljac` (`Sifra`),
  ADD CONSTRAINT `telefon_ibfk_2` FOREIGN KEY (`SifraSerijski`) REFERENCES `serijski_broj` (`Sifra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
