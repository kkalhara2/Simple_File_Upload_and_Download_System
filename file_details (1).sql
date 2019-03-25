-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2018 at 06:03 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_details`
--

CREATE TABLE `file_details` (
  `File_ID` bigint(100) NOT NULL,
  `File_Name` varchar(100) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `Level` varchar(100) NOT NULL,
  `No_of_Downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_details`
--

INSERT INTO `file_details` (`File_ID`, `File_Name`, `Link`, `Subject`, `Year`, `Semester`, `Level`, `No_of_Downloads`) VALUES
(1, '1.jpg', 'uploads/Maths/2014/level1/sem1', 'Maths', '2014', 'sem1', 'level1', 0),
(2, '3.jpg', 'uploads/Maths/2014/level1/sem1', 'Maths', '2014', 'sem1', 'level1', 0),
(3, '4.jpg', 'uploads/Maths/2014/level1/sem1', 'Maths', '2014', 'sem1', 'level1', 1),
(4, '13.jpg', 'uploads/Maths/2014/level1/sem1', 'Maths', '2014', 'sem1', 'level1', 0),
(5, '20.jpg', 'uploads/Maths/2014/level1/sem1', 'Maths', '2014', 'sem1', 'level1', 0),
(6, '7.jpg', 'uploads/Bot/2017/level3/sem2', 'Bot', '2017', 'sem2', 'level3', 0),
(7, '1.jpg', 'uploads/Maths/2014/level1/sem1', 'Maths', '2014', 'sem1', 'level1', 0),
(8, '1.jpg', 'uploads/Maths/2015/level1/sem1', 'Maths', '2015', 'sem1', 'level1', 0),
(9, '1.jpg', 'uploads/Maths/2016/level1/sem1', 'Maths', '2016', 'sem1', 'level1', 0),
(10, '1.jpg', 'uploads/Maths/2017/level1/sem1', 'Maths', '2017', 'sem1', 'level1', 0),
(11, '1.jpg', 'uploads/Maths/2017/level2/sem1', 'Maths', '2017', 'sem1', 'level2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_details`
--
ALTER TABLE `file_details`
  ADD PRIMARY KEY (`File_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
