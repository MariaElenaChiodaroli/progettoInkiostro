-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2024 at 05:17 PM
-- Server version: 5.5.37
-- PHP Version: 5.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mcm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrello`
--

CREATE TABLE `carrello` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `utente` varchar(255) DEFAULT NULL,
  `articolo` varchar(255) DEFAULT NULL,
  `qnt` int(11) DEFAULT NULL,
  PRIMARY KEY (`numero`),
  KEY `articolo` (`articolo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `carrello`
--

INSERT INTO `carrello` (`numero`, `utente`, `articolo`, `qnt`) VALUES
(3, 'a.fragola@tmt.it', 'USB_1', 2),
(4, 'eleonora.montanari@hotmail.com', 'USB_2', 1),
(5, 'eleonora.montanari@hotmail.com', 'USB_2', 1),
(7, 'a.fragola@tmt.it', 'PEN_1', 3),
(8, 'a.fragola@tmt.it', 'FALD_1', 1),
(9, 'a.fragola@tmt.it', 'BUC_1', 0),
(10, 'a.fragola@tmt.it', 'fald_3', 1),
(11, 'gartom@libero.it', 'PEN_1', 10),
(12, 'gartom@libero.it', 'SCO_1', 3),
(13, 'gartom@libero.it', 'FALD_5', 8),
(14, 'gartom@libero.it', 'PEN_4', 10),
(15, 's.valdis@arkotech.it', 'POST_1', 1),
(16, 's.valdis@arkotech.it', 'POST_1', 1),
(17, 'userfake@fake.it', 'FALD_5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `ID` varchar(50) NOT NULL DEFAULT '',
  `DESCRI` varchar(50) DEFAULT NULL,
  `IMM` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`ID`, `DESCRI`, `IMM`) VALUES
('SCRI', 'SCRITTURA', 'SCRI.JPG'),
('ACC', 'ACCESSORI', 'ACC.JPG'),
('ARCH', 'ARCHIVIAZIONE', 'ARCH.JPG'),
('TECNO', 'TECNOLOGIA', 'TECNO.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `CLIENTIID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) NOT NULL DEFAULT '',
  `LOCATION` varchar(255) DEFAULT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `COGNOME` varchar(50) DEFAULT NULL,
  `DATANASCITA` date DEFAULT NULL,
  PRIMARY KEY (`CLIENTIID`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`CLIENTIID`, `EMAIL`, `LOCATION`, `NOME`, `COGNOME`, `DATANASCITA`) VALUES
(1, 'provadiutente@libero.it', 'Italy', 'SANDRO', 'MAGNO', '0000-00-00'),
(2, 'pincopallo@hotmail.it', 'romania', 'GAIA', 'PARIONI', '1985-11-23'),
(3, 'userfake@fake.it', 'Poland', 'LUIGI', 'DONATO', '1958-09-09'),
(4, 'a.fragola@tmt.it', 'Milano (IT)', 'Anna', 'Fragoletti', '1999-01-15'),
(5, 's.pertini@gmail.com', 'Irlanda (EE)', 'Sara', 'Pertini', '2004-07-07'),
(6, 'pat.loca89@hotmail.com', 'Torino (IT)', 'Patrizia', 'Locatelli', '1958-09-22'),
(7, 'UFFACQUISTI@GERALD.COM', 'Como (IT)', 'Carmen', 'Rossi', '1963-06-14'),
(8, 'gartom@libero.it', 'Firenze (IT)', 'Tommaso', 'Garavelli', '1995-03-15'),
(9, 'giulio.franco@libero.it', 'Roma (IT)', 'Giulio Franco', 'Romaneschi', '1958-03-07'),
(10, 'eleonora.montanari@hotmail.com', 'Aosta (IT)', 'Eleonora', 'Montanari', '2000-02-16'),
(11, 's.valdis@arkotech.it', 'Bergamo (IT)', 'Sabrina', 'Valdis', '1980-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `SEQ` int(11) NOT NULL AUTO_INCREMENT,
  `IDPRODOTTO` varchar(255) DEFAULT NULL,
  `EMAILCLI` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SEQ`),
  KEY `IDPRODOTTO` (`IDPRODOTTO`),
  KEY `EMAILCLI` (`EMAILCLI`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`SEQ`, `IDPRODOTTO`, `EMAILCLI`) VALUES
(9, 'PEN_2', 'provadiutente@libero.it'),
(55, 'POST_1', 'gartom@libero.it'),
(12, 'PEN_5', 'provadiutente@libero.it'),
(58, 'POST_1', 's.valdis@arkotech.it'),
(19, 'PEN_3', 'provadiutente@libero.it'),
(56, 'fald_3', 's.valdis@arkotech.it'),
(27, 'PENC_1', 'provadiutente@libero.it'),
(57, 'POST_1', 's.valdis@arkotech.it'),
(42, 'FALD_4', 'a.fragola@tmt.it'),
(43, 'USB_3', 'a.fragola@tmt.it'),
(45, 'PENC_1', 'a.fragola@tmt.it'),
(47, 'FALD_1', 'pincopallo@hotmail.it'),
(54, 'MARK_2', 'gartom@libero.it'),
(52, 'USB_1', 'a.fragola@tmt.it');

-- --------------------------------------------------------

--
-- Table structure for table `ordini`
--

CREATE TABLE `ordini` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) NOT NULL,
  `importo` double(5,2) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `CODICE` varchar(10) NOT NULL DEFAULT '',
  `NOME2` varchar(50) DEFAULT NULL,
  `DESCR` varchar(100) DEFAULT NULL,
  `PRICE` double(5,2) DEFAULT NULL,
  `CATEGORIA` varchar(20) DEFAULT NULL,
  `VALUTA` varchar(3) DEFAULT NULL,
  `IMM` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CODICE`),
  KEY `CATEGORIA` (`CATEGORIA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`CODICE`, `NOME2`, `DESCR`, `PRICE`, `CATEGORIA`, `VALUTA`, `IMM`) VALUES
('PEN_1', 'PENNA BLU', 'PENNA SFERA DAL TRATTO FINE BLU', 0.30, 'scri', 'EUR', 'img/pen1.jpg'),
('PEN_2', 'PENNA ROSSA', 'PENNA SFERA DAL TRATTO FINE ROSSA', 0.30, 'scri', 'EUR', 'IMG/PEN2.JPG'),
('PEN_3', 'PENNA VERDE', 'PENNNA SFERA DAL TRATTO FINE VERDE', 0.30, 'scri', 'EUR', 'IMG/PEN3.JPEG'),
('PEN_4', 'PENNA NERA', 'PENNA SFERA DAL TRATTO FINE NERA', 0.30, 'scri', 'EUR', 'IMG/PEN4.JPG'),
('PEN_5', 'PENNA BLU', 'PENNA BLU DAL TRATTO GROSSO', 0.55, 'scri', 'EUR', 'IMG/PEN5.JPG'),
('PEN_6', 'PENNA NERA', 'PENNA NERA DAL TRATTO GROSSO', 0.55, 'scri', 'EUR', 'IMG/PEN5.JPG'),
('PENC_1', 'MATITA HB', 'MATITA DALLA COPERTURA NERA - MINA HB', 0.35, 'scri', 'EUR', 'IMG/PENC1.JPG'),
('PENC_2', 'MATITA 2H', 'MATITA DALLA COPERTURA NERA - MINA 2H', 0.45, 'scri', 'EUR', 'IMG/PENC1.JPG'),
('SCO_1', 'SCOLORINA A NASTRO', 'SCOLORINA A NASTRO, 2 MT', 1.55, 'ACC', 'EUR', 'IMG/SCO1.JPG'),
('BUC_1', 'BUCATRICE 2 FORI', 'BUCA FOGLI, 2 FORI, COLORI ASSORTITI', 5.50, 'ACC', 'EUR', 'IMG/BUC1.JPG'),
('FALD_1', 'RACCOGLITORE AD ANELLI', 'Raccoglitore ad anelli, 2 fori. Colore Giallo. \nDimensioni: dorso 8 cm, altezza 40 cm', 8.00, 'ARCH', 'EUR', 'IMG/RACC1.JPG'),
('POST_1', 'POSTIT', 'POSTIT QUADRATI GIALLI 5X5', 3.00, 'ACC', 'EUR', 'img/post1.jpg'),
('MARK_1', 'EVIDENZIATORE GIALLO', 'EVIDENZIATORE GIALLO STANDARD', 0.85, 'scri', 'EUR', 'img/mark1.jpg'),
('POST_2', 'POSTIT MINI', 'POST IT GIALLI 2,5X5', 3.50, 'ACC', 'EUR', 'img/post2.jpg'),
('POST_3', 'POST IT', 'POST IT QUADRATI ROSA', 3.00, 'ACC', 'EUR', 'img/post3.jpg'),
('PEN_7', 'PENNA STILOGRAFICA', 'PENNA STILOGRAFICA BLU', 9.99, 'scri', 'EUR', 'img/pen7b.jpg'),
('FALD_2', 'RACCOGLITORE AD ANELLI', 'RACCOGLITORE AD ANELLI ROSSO, 2 FORI, DORSO 8 CM ALTEZZA 40 CM', 8.00, 'ARCH', 'EUR', 'img/racc2.jpg'),
('USB_1', 'CHIAVETTA USB CON TAPPO', 'CHIAVETTA USB DA 8 GB CON TAPPO. Colori assortiti', 14.00, 'TECNO', 'EUR', 'img/usb1.jpg'),
('MARK_2', 'EVIDENZIATORE VERDE', 'EVIDENZIATORE VERDE FLUO TRATTO SPESSO', 2.00, 'scri', 'EUR', 'img/mark2.jpg'),
('mark_3', 'evidenziatore verde fine', 'evidenziatore verde dal tratto fine', 3.00, 'scri', 'eur', 'img/mark3.jpg'),
('MARK_4', 'EVIDENZIATORE AZZURRO', 'Evidenziatore azzurro, tratto standard', 1.85, 'scri', 'eur', 'img/mark4.jpg'),
('fald_3', 'RACCOGLITORE AD ANELLI', 'Raccoglitore ad anelli, 2 fori. Colore arancione', 8.00, 'arch', 'EUR', 'IMG/RACC3.JPG'),
('FALD_4', 'RACCOGLITORE AD ANELLI', 'Raccoglitore ad anelli, 2 fori. Colore azzurro', 8.00, 'arch', 'EUR', 'IMG/RACC4.JPG'),
('FALD_5', 'RACCOGLITORE AD ANELLI', 'Raccoglitore ad anelli, 2 fori. Colore fucsia', 8.00, 'arch', 'EUR', 'IMG/RACC5.JPG'),
('USB_2', 'CHIVETTA USB', 'Chiavetta USB - TypeC', 24.99, 'TECNO', 'EUR', 'IMG/USB2.JPG'),
('USB_3', 'CHIAVETTA USB', 'Chiavetta USB 64 GB', 17.99, 'TECNO', 'EUR', 'IMG/USB3.JPG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
