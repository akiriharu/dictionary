-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 02:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `english`
--

CREATE TABLE `english` (
  `id` int(11) NOT NULL,
  `phrase` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `french`
--

CREATE TABLE `french` (
  `id` int(11) NOT NULL,
  `phraseFr` text DEFAULT NULL,
  `english_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `german`
--

CREATE TABLE `german` (
  `id` int(11) NOT NULL,
  `phraseGr` text DEFAULT NULL,
  `english_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `russian`
--

CREATE TABLE `russian` (
  `id` int(11) NOT NULL,
  `phraseRu` text DEFAULT NULL,
  `english_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spanish`
--

CREATE TABLE `spanish` (
  `id` int(11) NOT NULL,
  `phraseSp` text DEFAULT NULL,
  `english_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `english`
--
ALTER TABLE `english`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `french`
--
ALTER TABLE `french`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_id` (`english_id`);

--
-- Indexes for table `german`
--
ALTER TABLE `german`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_id` (`english_id`);

--
-- Indexes for table `russian`
--
ALTER TABLE `russian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_id` (`english_id`);

--
-- Indexes for table `spanish`
--
ALTER TABLE `spanish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `english_id` (`english_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `english`
--
ALTER TABLE `english`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `french`
--
ALTER TABLE `french`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `german`
--
ALTER TABLE `german`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `russian`
--
ALTER TABLE `russian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spanish`
--
ALTER TABLE `spanish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `french`
--
ALTER TABLE `french`
  ADD CONSTRAINT `french_ibfk_1` FOREIGN KEY (`english_id`) REFERENCES `english` (`id`);

--
-- Constraints for table `german`
--
ALTER TABLE `german`
  ADD CONSTRAINT `german_ibfk_1` FOREIGN KEY (`english_id`) REFERENCES `english` (`id`);

--
-- Constraints for table `russian`
--
ALTER TABLE `russian`
  ADD CONSTRAINT `russian_ibfk_1` FOREIGN KEY (`english_id`) REFERENCES `english` (`id`);

--
-- Constraints for table `spanish`
--
ALTER TABLE `spanish`
  ADD CONSTRAINT `spanish_ibfk_1` FOREIGN KEY (`english_id`) REFERENCES `english` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
