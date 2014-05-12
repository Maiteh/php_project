# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: JustInTime
# Generation Time: 2014-04-28 12:15:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tblBestelling
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblBestelling`;

CREATE TABLE `tblBestelling` (
  `Bestelling_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Bestelling_AantalBestellingen` int(255) NOT NULL,
  `Bestelling_BestellingGeplaatst` int(255) NOT NULL,
  `Bestelling_BestellingVoltooid` int(255) NOT NULL,
  `Tafel_Id` int(255) NOT NULL,
  PRIMARY KEY (`Bestelling_Id`),
  KEY `Tafel_Id` (`Tafel_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblBestellingMenu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblBestellingMenu`;

CREATE TABLE `tblBestellingMenu` (
  `BestellingMenu_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Bestelling_Id` int(11) NOT NULL,
  `Menu_Id` int(11) NOT NULL,
  PRIMARY KEY (`BestellingMenu_Id`),
  UNIQUE KEY `Bestelling_Id` (`Bestelling_Id`),
  UNIQUE KEY `Menu_Id` (`Menu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblEigenaar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblEigenaar`;

CREATE TABLE `tblEigenaar` (
  `Eigenaar_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Eigenaar_Naam` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Voornaam` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Adres` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Postcode` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Gemeente` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Website` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Email` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_Telefoonnr` varchar(255) NOT NULL DEFAULT '',
  `Eigenaar_GSM` varchar(255) NOT NULL DEFAULT '',
  `RestaurantEigenaar_Id` int(11) NOT NULL,
  PRIMARY KEY (`Eigenaar_Id`),
  KEY `RestaurantEigenaar_Id` (`RestaurantEigenaar_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblFeedback
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblFeedback`;

CREATE TABLE `tblFeedback` (
  `Feedback_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Feedback_Feedback` varchar(500) NOT NULL DEFAULT '',
  `Feedback_Rating` int(11) NOT NULL,
  `Klant_Id` int(11) NOT NULL,
  PRIMARY KEY (`Feedback_Id`),
  KEY `Klant_Id` (`Klant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblKlant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblKlant`;

CREATE TABLE `tblKlant` (
  `Klant_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Klant_Naam` varchar(255) NOT NULL,
  `Klant_Voornaam` varchar(255) NOT NULL,
  `Klant_GSM` varchar(255) NOT NULL,
  `Klant_Email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Klant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblMenu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblMenu`;

CREATE TABLE `tblMenu` (
  `Menu_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Menu_Gerecht` varchar(255) NOT NULL DEFAULT '',
  `Menu_Beschrijving` varchar(255) NOT NULL DEFAULT '',
  `Menu_Prijs` int(255) NOT NULL,
  PRIMARY KEY (`Menu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblReservatie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblReservatie`;

CREATE TABLE `tblReservatie` (
  `Reservatie_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Reservatie_Datum` date NOT NULL,
  `Reservatie_Uur` time NOT NULL,
  `Reservatie_AantalPersonen` int(25) NOT NULL,
  `Klant_Id` int(11) NOT NULL,
  PRIMARY KEY (`Reservatie_Id`),
  KEY `Klant_Id` (`Klant_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblRestaurant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblRestaurant`;

CREATE TABLE `tblRestaurant` (
  `Restaurant_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Restaurant_Naam` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Voornaam` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Adres` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Postcode` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Gemeente` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Website` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Email` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_Telefoonnr` varchar(255) NOT NULL DEFAULT '',
  `Restaurant_GSM` varchar(255) NOT NULL DEFAULT '',
  `RestaurantEigenaar_Id` int(11) NOT NULL,
  `Tafel_Id` int(11) NOT NULL,
  `Reservatie_Id` int(11) NOT NULL,
  `Menu_Id` int(11) NOT NULL,
  PRIMARY KEY (`Restaurant_Id`),
  KEY `RestaurantEigenaar_Id` (`RestaurantEigenaar_Id`),
  KEY `Tafel_Id` (`Tafel_Id`),
  KEY `Reservatie_Id` (`Reservatie_Id`),
  KEY `Menu_Id` (`Menu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblRestaurantEigenaar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblRestaurantEigenaar`;

CREATE TABLE `tblRestaurantEigenaar` (
  `RestaurantEigenaar_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`RestaurantEigenaar_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tblTafel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblTafel`;

CREATE TABLE `tblTafel` (
  `Tafel_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Tafel_Nummering` int(255) NOT NULL,
  `Tafel_AantalPersonen` int(25) NOT NULL,
  `Tafel_BezetTijd` time NOT NULL,
  `Reservatie_Id` int(11) NOT NULL,
  PRIMARY KEY (`Tafel_Id`),
  KEY `Reservatie_Id` (`Reservatie_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
