-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 06:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeworkhelper`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` int(8) NOT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `s_password` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_ID`, `s_name`, `email`, `username`, `s_password`, `school`) VALUES
(12, 'Alexis Lappe', 'alexislappe04@gmail.com', 'lappe04', 'password', 'uwec'),
(13, 'Jeffrey Lappe', 'jeff@gmail.com', 'Jeff04', 'password', 'chip_tech'),
(14, 'Jonathan Viegut', 'jon@gmail.com', 'hotman69', 'nice', 'regis'),
(15, 'Zach Menter ', 'zach05@gmail.com', 'WickedFresh37', 'password', 'memorial'),
(16, 'Heather Baranek', 'heather02@gmail.com', 'Baraneha5997', 'coolbeans', 'uwec'),
(0, 'test2', 'test2@gmail.com', 'test2', 'password', 'uwec'),
(0, 'Test', 'test@gmail.com', 'test', 'password', 'uwec');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
