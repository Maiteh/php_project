-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
<<<<<<< HEAD
-- Genereertijd: 12 mei 2014 om 20:43
=======
-- Genereertijd: 12 mei 2014 om 22:18
>>>>>>> master
-- Serverversie: 5.6.14
-- PHP-versie: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `justintime`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblgebruiker`
--

INSERT INTO `tblgebruiker` (`Klant_Id`, `email`, `password`, `firstname`, `lastname`, `phone`, `admin`) VALUES
(7, 'piet@gmail.be', '10ddc974b3d38fc081fb6223ee0a4a07', 'piet', 'broek', '015456', 'yes'),
(8, 'bo@terham.be', '141c73ee75e53f944140b9461bd5d8c7', 'bo', 'terham', '0765326', 'yes'),
(9, 'andry@gmail.be', 'e37c8218da4bfd135b0c2f45c55e43dd', 'andry', 'charlier', '0456598', 'yes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblmenu`
--

CREATE TABLE IF NOT EXISTS `tblmenu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_starter` varchar(255) NOT NULL,
  `menu_main` varchar(255) NOT NULL,
  `menu_dessert` varchar(255) NOT NULL,
  `menu_price` decimal(19,2) NOT NULL,
  `fk_restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;
>>>>>>> master

--
-- Gegevens worden uitgevoerd voor tabel `tblmenu`
--

INSERT INTO `tblmenu` (`menu_id`, `menu_name`, `menu_starter`, `menu_main`, `menu_dessert`, `menu_price`, `fk_restaurant_id`) VALUES
(1, 'chefmenu', 'caviar', 'entrecote', 'puddin', '52.99', 1),
<<<<<<< HEAD
(2, 'kids''s menu', 'shrimp cocktail', 'french fries with vol-au-vent', 'ice cream sunday', '22.50', 2),
(3, 'adult food', 'oysters', 'lobster', 'chocolate', '58.90', 1),
(4, 'texas menu', 'meat', 'more meat', 'all the meat', '30.99', 1);
=======
(3, 'adult food', 'oysters', 'lobster', 'chocolate', '58.90', 1),
(4, 'texas menu', 'meat', 'more meat', 'all the meat', '30.99', 1),
(5, 'wild menu', 'carpaccio', 'deer', 'crumble', '34.20', 4),
(8, 'mexican menu', 'mini taco''s', 'quesedilla', 'piÃ±ata', '17.35', 2);
>>>>>>> master

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
  PRIMARY KEY (`Reservatie_Id`),
  KEY `Klant_Id` (`Klant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblrestaurant`
--

CREATE TABLE IF NOT EXISTS `tblrestaurant` (
  `restaurant_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL DEFAULT '',
  `restaurant_address` varchar(255) NOT NULL DEFAULT '',
  `restaurant_zip` varchar(255) NOT NULL DEFAULT '',
  `restaurant_city` varchar(255) NOT NULL DEFAULT '',
  `restaurant_email` varchar(255) NOT NULL DEFAULT '',
  `restaurant_phone` varchar(255) NOT NULL DEFAULT '',
  `fk_user_id` int(11) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `restaurant_zip`, `restaurant_city`, `restaurant_email`, `restaurant_phone`, `fk_user_id`) VALUES
(2, 'brood', 'dsgsdg', '542', 'dsvsdv', 'dsvsdv', '56489', 8),
(3, 'etenstijd', 'fgdd', '455', 'dgsdg', 'dfdhrh', '55464', 7),
(4, 'farmhouse', 'fdbfd', '6464', 'sdvdv', 'dsvsdv', '565', 8),
(5, 'andry''s bar', 'dsvsdv', '1256', 'sdvsdv', 'sdvsv', '654864', 9),
(6, 'poop bar', 'lints', '2570', 'duffel', 'poop@poop', '1024541', 9),
(7, 'bo''s place', 'somewhere 52', '2540', 'baha', 'bosplace@bo.com', '0136876', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbltafel`
--

CREATE TABLE IF NOT EXISTS `tbltafel` (
  `Tafel_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Tafel_Nummering` int(255) NOT NULL,
  `Tafel_AantalPersonen` int(25) NOT NULL,
  `Tafel_BezetTijd` time NOT NULL,
  `Reservatie_Id` int(11) NOT NULL,
  PRIMARY KEY (`Tafel_Id`),
  KEY `Reservatie_Id` (`Reservatie_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbltafel`
--

INSERT INTO `tbltafel` (`Tafel_Id`, `Tafel_Nummering`, `Tafel_AantalPersonen`, `Tafel_BezetTijd`, `Reservatie_Id`) VALUES
(1, 1, 4, '00:05:00', 0),
(2, 1, 4, '00:05:00', 0),
(3, 1, 4, '00:05:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
