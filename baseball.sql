-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2017 at 12:46 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baseball`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL,
  `bb_year` int(5) DEFAULT NULL,
  `bb_rnd` int(2) DEFAULT NULL,
  `bb_dt` int(5) NOT NULL,
  `bb_ovpck` int(5) NOT NULL,
  `bb_frrnd` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_rdpck` int(5) NOT NULL,
  `bb_tm` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_name` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_pos` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_war` float NOT NULL,
  `bb_g` int(5) NOT NULL,
  `bb_ab` int(5) NOT NULL,
  `bb_hr` int(5) NOT NULL,
  `bb_ba` float NOT NULL,
  `bb_ops` float NOT NULL,
  `bb_g2` int(5) NOT NULL,
  `bb_w` int(5) NOT NULL,
  `bb_l` int(5) NOT NULL,
  `bb_era` float NOT NULL,
  `bb_whip` float NOT NULL,
  `bb_sv` int(5) NOT NULL,
  `bb_type` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_doo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_state` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_signed` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `bb_pv` float NOT NULL,
  `bb_bonus` float NOT NULL,
  `bb_diff` float NOT NULL,
  `bb_bonus_per` float NOT NULL,
  `bb_when` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id_team` int(11) NOT NULL,
  `name_team` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `desc_team` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id_team`, `name_team`, `desc_team`) VALUES
(1, 'Angels', 'This team is from L.A., California'),
(2, 'Astros', 'This team is from Houston, Texas'),
(3, 'Athletics', ''),
(4, 'Blue Jays', ''),
(5, 'Blue Jays', ''),
(6, 'Braves', ''),
(7, 'Braves', ''),
(8, 'Brewers', ''),
(9, 'Brewers', ''),
(10, 'Cardinals', ''),
(11, 'Cardinals', ''),
(12, 'Cubs', ''),
(13, 'Cubs', ''),
(14, 'Diamondbacks', ''),
(15, 'Diamondbacks', ''),
(16, 'Dodgers', ''),
(17, 'Dodgers', ''),
(18, 'Giants', ''),
(19, 'Giants', ''),
(20, 'Indians', ''),
(21, 'Indians', ''),
(22, 'Mariners', ''),
(23, 'Mariners', ''),
(24, 'Marlins', ''),
(25, 'Marlins', ''),
(26, 'Mets', ''),
(27, 'Mets', ''),
(28, 'Orioles', ''),
(29, 'Orioles', ''),
(30, 'Padres', ''),
(31, 'Padres', ''),
(32, 'Phillies', ''),
(33, 'Phillies', ''),
(34, 'Pirates', ''),
(35, 'Pirates', ''),
(36, 'Rangers', ''),
(37, 'Rangers', ''),
(38, 'Rays', ''),
(39, 'Red Sox', ''),
(40, 'Red Sox', ''),
(41, 'Reds', ''),
(42, 'Reds', ''),
(43, 'Rockies', ''),
(44, 'Rockies', ''),
(45, 'Royals', ''),
(46, 'Royals', ''),
(47, 'Tigers', ''),
(48, 'Tigers', ''),
(49, 'Twins', ''),
(50, 'Twins', ''),
(51, 'White Sox', ''),
(52, 'White Sox', ''),
(53, 'Yankees', ''),
(54, 'Yankees', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id_team`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
