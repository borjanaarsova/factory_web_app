-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2017 at 12:23 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika`
--
CREATE DATABASE IF NOT EXISTS `internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika`;

-- --------------------------------------------------------

--
-- Table structure for table `masini`
--

CREATE TABLE IF NOT EXISTS `masini` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ime_na_masina` varchar(50) NOT NULL,
  `namena` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10003 ;

--
-- Dumping data for table `masini`
--

INSERT INTO `masini` (`ID`, `ime_na_masina`, `namena`) VALUES
(7777, 'Mikser za crno cokolado', 'za site'),
(8888, 'Mikser za belo cokolado', 'za site'),
(9999, 'Лента', 'za site'),
(10000, 'Печка', 'za site'),
(10002, 'Рендалка', 'za site');

-- --------------------------------------------------------

--
-- Table structure for table `naredbi`
--

CREATE TABLE IF NOT EXISTS `naredbi` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_masina` int(10) NOT NULL,
  `ID_proizvod` int(10) NOT NULL,
  `ID_kolicina` int(10) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `naredbi`
--

INSERT INTO `naredbi` (`ID`, `ID_masina`, `ID_proizvod`, `ID_kolicina`) VALUES
(10, 9999, 505050, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `poraki`
--

CREATE TABLE IF NOT EXISTS `poraki` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_isprakjac` int(10) NOT NULL,
  `isprakjac` varchar(30) NOT NULL,
  `uloga_isprakjac` varchar(30) NOT NULL,
  `ID_primatel` int(10) NOT NULL,
  `primatel` varchar(30) NOT NULL,
  `uloga_primatel` varchar(30) NOT NULL,
  `sodrzina` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_isprakjac` (`ID_isprakjac`,`ID_primatel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `poraki`
--

INSERT INTO `poraki` (`ID`, `ID_isprakjac`, `isprakjac`, `uloga_isprakjac`, `ID_primatel`, `primatel`, `uloga_primatel`, `sodrzina`) VALUES
(2, 101011, 'andrej_jovanov', 'shef', 111010, 'stole_andonov', 'rabotnik', 'Zdravo Stole, te molam dojdi vo magacinot.'),
(3, 101010, 'goran_kolev', 'sopstvenik', 111010, 'stole_andonov', 'rabotnik', 'Stole, te molam dojdi posle rabotnoto vreme kaj mene vo kancelarija.'),
(4, 101010, 'goran_kolev', 'sopstvenik', 111010, 'stole_andonov', 'rabotnik', 'Stole, vasata plata e isplatena na smetka.');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE IF NOT EXISTS `proizvodi` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ime_na_proizvod` varchar(30) NOT NULL,
  `tezina` int(10) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=707073 ;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`ID`, `ime_na_proizvod`, `tezina`) VALUES
(505050, 'Fruti rolat', 500),
(606060, 'Choko rolat', 1000),
(707070, 'resani', 800),
(707071, 'Кроасан', 50),
(707072, 'Штрудла', 200);

-- --------------------------------------------------------

--
-- Table structure for table `sefovi`
--

CREATE TABLE IF NOT EXISTS `sefovi` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(20) NOT NULL,
  `korisnicko_ime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `telefonski_br` int(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101014 ;

--
-- Dumping data for table `sefovi`
--

INSERT INTO `sefovi` (`ID`, `Ime`, `Prezime`, `korisnicko_ime`, `lozinka`, `telefonski_br`) VALUES
(101011, 'Andrej', 'Jovanov', 'andrej_jovanov', '10101110', 78321654),
(101012, 'Simo', 'Tasev', 'simo_tasev', '10101210', 78789654),
(101013, 'Jovan', 'Jovanov', 'jovan_jovanov', '10101310', 78369852);

-- --------------------------------------------------------

--
-- Table structure for table `sopstvenik`
--

CREATE TABLE IF NOT EXISTS `sopstvenik` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(20) NOT NULL,
  `korisnicko_ime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `kancelarija_br` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Prezime` (`Prezime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101011 ;

--
-- Dumping data for table `sopstvenik`
--

INSERT INTO `sopstvenik` (`ID`, `Ime`, `Prezime`, `korisnicko_ime`, `lozinka`, `kancelarija_br`) VALUES
(101010, 'Goran', 'Kolev', 'goran_kolev', 'g.kolev', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vraboteni`
--

CREATE TABLE IF NOT EXISTS `vraboteni` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(20) NOT NULL,
  `korisnicko_ime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `telefonski_broj` int(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=161011 ;

--
-- Dumping data for table `vraboteni`
--

INSERT INTO `vraboteni` (`ID`, `Ime`, `Prezime`, `korisnicko_ime`, `lozinka`, `telefonski_broj`) VALUES
(111010, 'Stole', 'Andonov', 'stole_andonov', 'stole', 78852147),
(121010, 'Martin', 'Kocev', 'martin_kocev', 'martin', 78159357),
(131010, 'Ivan', 'Ivanov', 'ivan_ivanov', 'ivan', 75369852),
(141010, 'Todor', 'Spasov', 'todor_spasov', 'todor', 75145632),
(151010, 'David', 'Davidoski', 'david_davidoski', 'david', 77123654),
(161010, 'Stefan', 'Popov', 'stefan_popov', 'stefan', 77789654);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
