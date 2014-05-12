-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 12 mei 2014 om 15:59
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `tblmenu`
--

INSERT INTO `tblmenu` (`menu_id`, `menu_name`, `menu_starter`, `menu_main`, `menu_dessert`, `menu_price`, `fk_restaurant_id`) VALUES
(1, 'chefmenu', 'caviar', 'entrecote', 'puddin', '52.99', 1),
(2, 'kids''s menu', 'shrimp cocktail', 'french fries with vol-au-vent', 'ice cream sunday', '22.50', 2),
(3, 'adult food', 'oysters', 'lobster', 'chocolate', '58.90', 1),
(4, 'texas menu', 'meat', 'more meat', 'all the meat', '30.99', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
