-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2015 at 10:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wt8`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `kom_email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `kom_text` varchar(1000) COLLATE utf8_slovenian_ci NOT NULL,
  `kom_autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `kom_vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vijest` int(11) NOT NULL,
  PRIMARY KEY (`komentar_id`),
  KEY `vrijest` (`vijest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `kom_email`, `kom_text`, `kom_autor`, `kom_vrijeme`, `vijest`) VALUES
(1, 'mail@mail.com', 'Blablablabla', 'Neki kom', '2015-08-30 08:07:47', 9),
(2, 'bla@bl.BL', 'Komentar za testiranje', 'Neko', '2015-08-30 08:08:20', 9),
(3, 'dunja@bla.com', 'Komentarisem ovu vijest', 'jos jedan', '2015-08-30 08:08:59', 6);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`UserID`, `Username`, `Password`, `Email`, `Admin`) VALUES
(12, 'Admin', 'Admin', 'Admin@gmail.com', 1),
(13, 'Tester', 'test1', 'test@gmail.com', 0),
(14, 'Tester2', 'test2', 'test2@gmail.com', 0),
(15, 'Tester3', 'test3', 'test@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `skraceno` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`, `skraceno`, `slika`) VALUES
(6, 'LJubazni Revizori u Tramsu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis nisi est, vel pellentesque diam euismod vel. Sed malesuada rhoncus enim, eget sollicitudin nisi dictum non. Nullam dapibus commodo dignissim. Curabitur neque elit, faucibus non odio ac, bibendum molestie turpis. Nulla quis tortor lobortis, ullamcorper ipsum quis, luctus lacus. Mauris rhoncus ut justo vel molestie. Nunc lorem ex, pharetra vitae quam eu, faucibus vulputate nunc. Cras lacus tortor, ornare ut mi non, sodales luctus tellus. Donec molestie odio in vestibulum aliquam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi lobortis risus sed augue porttitor, eu sagittis tellus rutrum. Nulla efficitur urna augue, ut lobortis nibh scelerisque eget. Nulla odio mauris, fringilla nec sapien eget, mollis bibendum lectus. Sed molestie velit purus, a venenatis dui pretium in. Nulla volutpat, magna a placerat dignissim, mi nibh fermentum ligula, convallis pulvinar nibh erat quis mi. Suspendisse nec imperdiet eros, et bibendum ligula.\r\n\r\nEtiam non erat eleifend, dapibus elit at, pretium diam.', 14, '2015-08-30 07:59:58', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis nisi est, vel pellentesque diam euismod vel. Sed malesuada rhoncus enim, eget sollicitudin nisi dictum non. ', 'http://www.fot-o-grafiti.hr/slike/nauchi/estetiku_fotografije/_kompozicija/centar-slike.jpg'),
(9, 'Naslov vijesti', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis nisi est, vel pellentesque diam euismod vel. Sed malesuada rhoncus enim, eget sollicitudin nisi dictum non. Nullam dapibus commodo dignissim. Curabitur neque elit, faucibus non odio ac, bibendum molestie turpis. Nulla quis tortor lobortis, ullamcorper ipsum quis, luctus lacus. Mauris rhoncus ut justo vel molestie. Nunc lorem ex, pharetra vitae quam eu, faucibus vulputate nunc. Cras lacus tortor, ornare ut mi non, sodales luctus tellus. Donec molestie odio in vestibulum aliquam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi lobortis risus sed augue porttitor, eu sagittis tellus rutrum. Nulla efficitur urna augue, ut lobortis nibh scelerisque eget. Nulla odio mauris, fringilla nec sapien eget, mollis bibendum lectus. Sed molestie velit purus, a venenatis dui pretium in. Nulla volutpat, magna a placerat dignissim, mi nibh fermentum ligula, conv', 13, '2015-08-30 08:07:22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis nisi est, vel pellentesque diam euismod vel. ', 'http://www.takolako.rs/user/include/takolako/images/items/lopta_odbojka_mva200.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`);

--
-- Constraints for table `vijest`
--
ALTER TABLE `vijest`
  ADD CONSTRAINT `fk1_user` FOREIGN KEY (`autor`) REFERENCES `korisnik` (`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
