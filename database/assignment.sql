-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 11:27 PM
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
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `email` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `grade` double DEFAULT NULL,
  `sep` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`email`, `id`, `name`, `description`, `date`, `time`, `status`, `grade`, `sep`) VALUES
('test2@gmail.com', 0, 'Test Name', 'This assignment is for user number 2.', '2021-04-29', '00:00:00', 0, 0, 0),
('test@gmail.com', 0, 'Test Name', 'This is a hard coded Canvas assignment.', '2021-04-01', '23:59:00', 2, 95, 1),
('test@gmail.com', 1, 'Test Name Number 2', 'This is another hard coded Canvas assignment.', '2021-04-15', '00:00:00', 1, 0, 1),
('test@gmail.com', 2, 'Assignment 2', 'This assignment is for user 1 and is from the client side.', '2000-04-07', '00:00:00', 1, 0, 0),
('test@gmail.com', 3, 'Math Homework', 'User inputted assignment.', '2021-05-12', '23:59:00', 0, 0, 0),
('test@gmail.com', 4, 'Physics Homework', 'User inputted assignment.', '2021-05-11', '20:00:00', 0, 0, 0),
('test@gmail.com', 5, 'CS Homework', 'User inputted assignment.', '2021-06-01', '23:59:00', 0, 0, 0),
('test@gmail.com', 6, 'Essay', 'Assignment from Canvas.', '2021-05-13', '23:59:00', 0, 88, 1),
('test@gmail.com', 7, '355 Project', 'Another graded assignment.', '2021-05-06', '23:59:00', 2, 100, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`email`,`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
