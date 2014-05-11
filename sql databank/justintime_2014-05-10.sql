-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 10 mei 2014 om 18:08
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `justintime`
--
CREATE DATABASE IF NOT EXISTS `justintime` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `justintime`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblbestelling`
--

CREATE TABLE IF NOT EXISTS `tblbestelling` (
  `Bestelling_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Bestelling_AantalBestellingen` int(255) NOT NULL,
  `Bestelling_BestellingGeplaatst` int(255) NOT NULL,
  `Bestelling_BestellingVoltooid` int(255) NOT NULL,
  `Tafel_Id` int(255) NOT NULL,
  PRIMARY KEY (`Bestelling_Id`),
  KEY `Tafel_Id` (`Tafel_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblbestellingmenu`
--

CREATE TABLE IF NOT EXISTS `tblbestellingmenu` (
  `BestellingMenu_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Bestelling_Id` int(11) NOT NULL,
  `Menu_Id` int(11) NOT NULL,
  PRIMARY KEY (`BestellingMenu_Id`),
  UNIQUE KEY `Bestelling_Id` (`Bestelling_Id`),
  UNIQUE KEY `Menu_Id` (`Menu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblfeedback`
--

CREATE TABLE IF NOT EXISTS `tblfeedback` (
  `Feedback_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Feedback_Feedback` varchar(500) NOT NULL DEFAULT '',
  `Feedback_Rating` int(11) NOT NULL,
  `Klant_Id` int(11) NOT NULL,
  PRIMARY KEY (`Feedback_Id`),
  KEY `Klant_Id` (`Klant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblgebruiker`
--

CREATE TABLE IF NOT EXISTS `tblgebruiker` (
  `Klant_Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `admin` varchar(5) NOT NULL,
  PRIMARY KEY (`Klant_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblmenu`
--

CREATE TABLE IF NOT EXISTS `tblmenu` (
  `Menu_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Menu_Gerecht` varchar(255) NOT NULL DEFAULT '',
  `Menu_Beschrijving` varchar(255) NOT NULL DEFAULT '',
  `Menu_Prijs` int(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`Menu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblreservatie`
--

CREATE TABLE IF NOT EXISTS `tblreservatie` (
  `Reservatie_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Reservatie_Datum` date NOT NULL,
  `Reservatie_Uur` time NOT NULL,
  `Reservatie_AantalPersonen` int(25) NOT NULL,
  `Klant_Id` int(11) NOT NULL,
  `Restaurant_id` int(11) NOT NULL,
  `Tafel_id` int(11) NOT NULL,
  PRIMARY KEY (`Reservatie_Id`),
  KEY `Klant_Id` (`Klant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblrestaurant`
--

CREATE TABLE IF NOT EXISTS `tblrestaurant` (
  `Restaurant_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Restaurant_Naam` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Adres` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Postcode` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Gemeente` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Website` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Email` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Telefoonnr` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_GSM` varchar(255) NOT NULL DEFAULT '',
  `RestaurantEigenaar_Id` int(11) NOT NULL,
  PRIMARY KEY (`Restaurant_Id`),
  KEY `RestaurantEigenaar_Id` (`RestaurantEigenaar_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbltafel`
--

CREATE TABLE IF NOT EXISTS `tbltafel` (
  `Tafel_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Tafel_Nummering` int(255) NOT NULL,
  `Tafel_AantalPersonen` int(25) NOT NULL,
  `Tafel_BezetTijd` time NOT NULL,
  `restaurant_Id` int(11) NOT NULL,
  PRIMARY KEY (`Tafel_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbluserrestaurant`
--

CREATE TABLE IF NOT EXISTS `tbluserrestaurant` (
  `gebruikerrestaurant_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`gebruikerrestaurant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
