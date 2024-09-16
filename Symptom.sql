-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2024 at 04:55 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22035291_allyxir`
--

-- --------------------------------------------------------

--
-- Table structure for table `Symptom`
--

CREATE TABLE `Symptom` (
  `Id` bigint(20) NOT NULL,
  `UserId` bigint(20) NOT NULL,
  `SymptomOn` tinyint(1) NOT NULL DEFAULT 1,
  `StartDate` date DEFAULT current_timestamp(),
  `EndDate` date DEFAULT NULL,
  `SymptomTypes` varchar(1000) NOT NULL,
  `Severity` varchar(50) NOT NULL DEFAULT 'Mild',
  `TakingMedicine` tinyint(1) NOT NULL,
  `Note` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Symptom`
--
ALTER TABLE `Symptom`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Symptom`
--
ALTER TABLE `Symptom`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
