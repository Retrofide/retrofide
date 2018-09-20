-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sept 11, 2019 at 12:05 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `retrofide`
--

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `game` varchar(50) NOT NULL,
  `console` int(50) NOT NULL,
  `style` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `plays` int(100) NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  `hot` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Songs`
-- NOTE: INSERT INTO, NEEDS COMMA BETWEEN SONGS, END WITH ;

INSERT INTO `songs` (`id`, `title`, `artist`, `publisher`, `game`, `console`, `style`, `duration`, `path`, `plays`, `artworkPath`, `hot`) VALUES
(4, 'Main Menu Theme Song (Sky Remix)', 'SKYL1NK', 'Epic Games', 1, 1, 3, '4:31', 'assets/music/FortniteMainMenuThemeSong(SkyRemix).mp3', 0, 'assets/images/artwork/fortnite1.png', 2);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `Songs`
--
ALTER TABLE `songs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `songs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
