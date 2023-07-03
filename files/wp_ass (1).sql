-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 09:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_ass`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `caregory` varchar(150) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `first_name`, `last_name`, `email`, `caregory`, `filename`) VALUES
(42, 'Akash', 'Amrolkar', 'akashamrolkar10@gmail.com', 'cat1', 'images/11401586_602504743185873_110922859649885696_n.jpg'),
(43, 'Pratik', 'Mali', 'pratik@gmail.com', 'cat2', ' images/pexels-ravi-k-938642.jpg '),
(44, 'prakash', 'Patil', 'prakash@gmail.com', 'cat3', ' images/pexels-hasibullah-zhowandai-819530.jpg '),
(45, 'Raj', 'Patil', 'raj@gmail.com', 'cat2', ' images/images.jpeg '),
(46, 'Rohan', 'Patil', 'rohan@gmail.com', 'cat2', 'slider 2 copy.jpg'),
(47, 'santosh', 'B', 'santosh@gmail.com', 'cat1', ' images/pexels-ravi-k-938642.jpg '),
(49, 'Ram', 't', 'ram@gmail.com', 'cat3', ' images/pexels-ravi-k-938642.jpg '),
(50, 'Pooja', 'A', 'pooja@gmail.com', 'cat2', 'images/images.jpg'),
(51, 'Ashwini', 'A', 'ashwini@gmail.com', 'cat1', ' images/cheerful-business-woman-make-winner-gesture.jpg '),
(52, 'Rushi', 'R', 'rushi@gmail.com', 'cat2', ' images/pexels-ravi-k-938642.jpg '),
(53, 'vaibhav', 'p', 'vaibhav@gmail.com', 'cat3', ' images/pexels-ravi-k-938642.jpg '),
(54, 'Pratik', 'Mane', 'pm@gmail.com', 'cat2', ' images/images.jpeg '),
(55, 'shree', 's', 'shree@gmail.com', 'cat2', ' images/Yaoundé logo-01.jpg '),
(56, 'Aditya', 'patil', 'adi@gmail.com', 'cat1', ' images/slider 4 copy.jpg ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
