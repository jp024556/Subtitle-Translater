-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 05:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subtitles`
--

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `downloads` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id`, `name`, `downloads`) VALUES
(31, 'Batman Begins 2005 1080p BrRip x264 Dual-Audio [English-Hindi 5.1] NimitMak SilverRG.srt-orig.srt', '2'),
(32, 'The Monkey King 3.srt-orig.srt', '2');

-- --------------------------------------------------------

--
-- Table structure for table `subs_list`
--

CREATE TABLE `subs_list` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_list`
--

INSERT INTO `subs_list` (`id`, `sub_id`, `name`, `lang`) VALUES
(36, 32, 'The Monkey King 3.srt-orig.srt-hi.srt', 'hi'),
(37, 31, 'Batman Begins 2005 1080p BrRip x264 Dual-Audio [English-Hindi 5.1] NimitMak SilverRG.srt-orig.srt-af.srt', 'af');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subs_list`
--
ALTER TABLE `subs_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `subs_list`
--
ALTER TABLE `subs_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
