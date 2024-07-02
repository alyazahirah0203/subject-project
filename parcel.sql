-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2024 at 02:31 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcel`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

DROP TABLE IF EXISTS `parcels`;
CREATE TABLE IF NOT EXISTS `parcels` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `parcelnum` varchar(255) DEFAULT NULL,
  `pdate` date DEFAULT NULL,
  `courier` varchar(255) DEFAULT NULL,
  `rack` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `stdID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pID`),
  KEY `stdID` (`stdID`(250))
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`pID`, `parcelnum`, `pdate`, `courier`, `rack`, `status`, `stdID`) VALUES
(1, 'ABCDE12345', '2024-06-05', 'JNT', 'A', '2', '1'),
(2, 'CBA123', '2024-06-04', 'POSLAJU', 'C', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `stdID` int NOT NULL AUTO_INCREMENT,
  `stdname` varchar(255) NOT NULL,
  `stdphone` varchar(255) DEFAULT NULL,
  `stdmatric` varchar(255) DEFAULT NULL,
  `ID` int DEFAULT NULL,
  PRIMARY KEY (`stdID`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stdID`, `stdname`, `stdphone`, `stdmatric`, `ID`) VALUES
(1, 'ADEELA ARIS', '01152414567', 'RC22276', NULL),
(2, 'ALEEYA NAJWA', '0137956397', 'RC22162', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `matricID` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `matricID`, `password`, `status`) VALUES
(1, 'FATIN ARISYA', 'RC22117', '$2y$10$236QU.DEuwDLZ5vk89K2I.RgnnY05Y.zqbcxItrneGqWRJi974.NO', 'Staff'),
(2, 'ADEELA', 'RC22276', '$2y$10$dEsjg3487HByFGeUZ1wPxe.FUG7OROrwfpCFZV8kCDi3T0m3pQf2S', 'Student');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
