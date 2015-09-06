-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2015 at 04:41 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `text` varchar(1000) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vijest` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vrijest` (`vijest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `email`, `text`, `autor`, `vrijeme`, `vijest`) VALUES
(1, 'dunjabihorac@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula mauris a libero dapibus cursus. ', 'Autor Komentarovic', '2015-06-23 11:34:30', 1),
(2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula mauris a libero dapibus cursus. ', 'Komentar Ostavio', '2015-06-23 11:34:36', 1),
(3, 'aa', 'aaaa', 'aa', '2015-06-23 14:39:45', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `skraceno` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`, `skraceno`, `slika`) VALUES
(1, 'TRAMS DAJE BESPLATNE KARTE ZA STUDENTE\n', 'Curabitur feugiat odio vitae velit tincidunt, in dictum arcu tristique. Duis aliquam, elit eget maximus tempus, dui magna ultricies metus, eu pellentesque erat elit eget felis. Proin a scelerisque lacus. Duis arcu leo, commodo sit amet fringilla vel, suscipit posuere mi. Aliquam accumsan dolor sit amet pulvinar laoreet. Fusce mollis at diam eget auctor. Nam pharetra augue quis ligula sagittis, nec egestas diam luctus.', 'Tramo Prevoznikovic\n', '2015-06-23 10:08:33', 'Sed porttitor dolor sit amet auctor bibendum. ', 'Content\\transport4.jpg\n\n\n'),
(2, 'TRAMS OBARA REKORDE\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula mauris a libero dapibus cursus. Curabitur feugiat odio vitae velit tincidunt, in dictum arcu tristique. Duis aliquam, elit eget maximus tempus, dui magna ultricies metus, eu pellentesque erat elit eget felis. Proin a scelerisque lacus. Duis arcu leo, commodo sit amet fringilla vel, suscipit posuere mi. Aliquam accumsan dolor sit amet pulvinar laoreet. Fusce mollis at diam eget auctor. Nam pharetra augue quis ligula sagittis, nec egestas diam luctus. Curabitur condimentum, nisl ac placerat imperdiet, lectus est suscipit nulla, quis auctor nisi purus fringilla mauris. Morbi tincidunt interdum commodo. Etiam eu metus sit amet elit feugiat vestibulum ac ut elit. In pharetra sollicitudin tellus eget pharetra. ', 'Bihorac Dunja', '2015-04-08 10:09:39', 'Curabitur hendrerit blandit dolor quis venenatis. Proin posuere consequat quam. Sed porttitor dolor sit amet auctor bibendum. ', '\nContent\\transport3.jpg'),
(3, 'RADNICI U TRAMSU PREZADOVOLJNI PLATAMA\r\n', '', 'Imenko Prezimns', '2015-06-23 10:12:11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...\r\n', 'Content\\transport1.jpg\r\n'),
(4, 'LJUBAZNI REVIZORI U TRAMS-U', 'Mauris luctus gravida magna vel hendrerit. Sed egestas faucibus ante, molestie ullamcorper tortor ornare eget. Integer nec ullamcorper dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus bibendum posuere mattis. Integer at eleifend arcu. Ut in libero ut nisl tincidunt elementum. Sed nec magna facilisis, porta nisl ut, aliquam libero. Nam id eros viverra, cursus sem a, faucibus elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris nec tincidunt sem. Morbi vel libero dui.', 'Webo Tehnologic', '2015-06-23 10:14:34', 'Mauris nec tincidunt sem. Morbi vel libero dui.', 'Content\\transport2.jpg\r\n');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
