-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 07:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_doc`
--

CREATE TABLE `employee_doc` (
  `adhar_id` int(11) NOT NULL,
  `aadharCard` varchar(50) NOT NULL,
  `aadharCardfile` varchar(500) NOT NULL,
  `crtTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_doc`
--

INSERT INTO `employee_doc` (`adhar_id`, `aadharCard`, `aadharCardfile`, `crtTime`) VALUES
(1, '098765432112', 'image/adhar.jpg', '2023-01-26 11:36:34'),
(2, '098765432112', 'image/adhar.jpg', '2023-01-26 11:42:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_doc`
--
ALTER TABLE `employee_doc`
  ADD PRIMARY KEY (`adhar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_doc`
--
ALTER TABLE `employee_doc`
  MODIFY `adhar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
