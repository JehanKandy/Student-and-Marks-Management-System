-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 06:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) NOT NULL,
  `English` int(10) NOT NULL,
  `IT` int(10) NOT NULL,
  `Maths` int(10) NOT NULL,
  `Science` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `average` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `English`, `IT`, `Maths`, `Science`, `total`, `average`) VALUES
(1000, 45, 77, 88, 95, 305, 76.25),
(1001, 55, 66, 77, 88, 286, 71.5);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `infor` varchar(15) NOT NULL,
  `year_enroll` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `fname`, `lname`, `grade`, `gender`, `dob`, `email`, `infor`, `year_enroll`) VALUES
(1000, 'Nimal', 'kandy', '6', 'male', '2022-03-22', 'dbjehan@gmail.com', '96857412V', '2022'),
(1001, 'Amara', 'kandy', '8', 'male', '2022-03-30', 'kandy@gmail.com', '+94856321456', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_status` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `email`, `pass`, `user_type`, `user_status`, `time`) VALUES
(1, 'jehan123', '123@456.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2022-03-12 04:54:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
