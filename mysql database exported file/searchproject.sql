-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 11:58 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `searchproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_productlisting`
--

CREATE TABLE `table_productlisting` (
  `ProductCode` int(3) NOT NULL,
  `ProductName` varchar(10) DEFAULT NULL,
  `SubcategoryName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_productlisting`
--

INSERT INTO `table_productlisting` (`ProductCode`, `ProductName`, `SubcategoryName`) VALUES
(1, 'Kookabura', 'Bat'),
(2, 'MT', 'Bat'),
(3, 'Yonex', 'Stud'),
(4, 'MRF', 'Ball');

-- --------------------------------------------------------

--
-- Table structure for table `table_subcategory`
--

CREATE TABLE `table_subcategory` (
  `SubcategoryCode` int(3) NOT NULL,
  `CategoryName` varchar(10) DEFAULT NULL,
  `SubcategoryName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_subcategory`
--

INSERT INTO `table_subcategory` (`SubcategoryCode`, `CategoryName`, `SubcategoryName`) VALUES
(1, 'Cricket', 'Bat'),
(2, 'Football', 'Stud'),
(3, 'Football', 'Shin Pad'),
(4, 'Cricket', 'Ball');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_productlisting`
--
ALTER TABLE `table_productlisting`
  ADD PRIMARY KEY (`ProductCode`);

--
-- Indexes for table `table_subcategory`
--
ALTER TABLE `table_subcategory`
  ADD PRIMARY KEY (`SubcategoryCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
