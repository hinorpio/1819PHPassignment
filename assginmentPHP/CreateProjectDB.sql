-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 05:42 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

CREATE DATABASE IF NOT EXISTS `projectdb`;
USE `projectdb`;
-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `email` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`email`, `firstName`, `lastName`, `password`) VALUES
('admin@ada.com', 'John', 'Wick', 'admin'),
('hinorpiodhs@gmail.com', 'Hin', 'Lee', 'y7116746');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `dealerID` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealerID`, `password`, `name`, `phoneNumber`, `address`) VALUES
('1@2.com', '123', '123', '123', '123'),
('1@21.com', '2', '12', '12', '2'),
('dealer@ada.com', 'dealer', 'John Doe', '91234567', 'DILWL'),
('hinscorpio@gmail.com', 'fxzv7777', 'Hinorpio', '95333510', 'Kwun Tong, Kowloon, HK'),
('test@test.com', '1', 'q', 'dd', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `orderpart`
--

CREATE TABLE `orderpart` (
  `orderID` int(11) NOT NULL,
  `partNumber` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderpart`
--

INSERT INTO `orderpart` (`orderID`, `partNumber`, `quantity`, `price`) VALUES
(16001, 1001, 1, '138.00'),
(16001, 1002, 1, '168.00'),
(16002, 1001, 1, '138.00'),
(16002, 1002, 1, '168.00'),
(16002, 1003, 1, '168.00'),
(16003, 1001, 2, '250.00'),
(16009, 1001, 1, '138.00'),
(16010, 1001, 12, '1656.00'),
(16011, 1001, 7, '966.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `dealerID` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `deliveryAddress` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `dealerID`, `date`, `deliveryAddress`, `status`) VALUES
(16001, 'dealer@ada.com', '2019-06-09', 'Zone 24, DILWL', 2),
(16002, 'hinscorpio@gmail.com', '2019-06-09', 'KT, Kowloon, HK', 2),
(16003, 'hinscorpio@gmail.com', '2019-06-10', 'zone24', 3),
(16009, 'hinscorpio@gmail.com', '2019-06-19', 'Kwun Tong, Kowloon, HK', 2),
(16010, 'hinscorpio@gmail.com', '2019-06-21', 'Kwun Tong, Kowloon, HK', 2),
(16011, 'hinscorpio@gmail.com', '2019-06-21', 'Kwun Tong, Kowloon, HK', 4);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `partNumber` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `partName` varchar(100) NOT NULL,
  `stockQuantity` int(11) NOT NULL,
  `stockPrice` decimal(10,2) NOT NULL,
  `stockStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`partNumber`, `email`, `partName`, `stockQuantity`, `stockPrice`, `stockStatus`) VALUES
(1001, 'admin@ada.com', 'Shashmi Scallop', 70, '138.00', 1),
(1002, 'admin@ada.com', 'M4+ Waygu Ribeye Steak', 55, '168.00', 1),
(1003, 'admin@ada.com', 'M4+ Waygu Sirloin Steak', 55, '168.00', 1),
(1004, 'admin@ada.com', 'Sanuki Udon(Little)', 46, '6.50', 1),
(1005, 'admin@ada.com', 'Hiroshima Oyster', 45, '148.00', 2),
(1006, 'admin@ada.com', 'Japanese Hotate Scallop', 45, '148.00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`dealerID`);

--
-- Indexes for table `orderpart`
--
ALTER TABLE `orderpart`
  ADD KEY `FKOrderPart506452` (`orderID`),
  ADD KEY `FKOrderPart737123` (`partNumber`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FKOrder816882` (`dealerID`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`partNumber`),
  ADD UNIQUE KEY `partName` (`partName`),
  ADD KEY `FKPart451022` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16033;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `partNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderpart`
--
ALTER TABLE `orderpart`
  ADD CONSTRAINT `FKOrderPart506452` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `FKOrderPart737123` FOREIGN KEY (`partNumber`) REFERENCES `part` (`partNumber`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FKOrder816882` FOREIGN KEY (`dealerID`) REFERENCES `dealer` (`dealerID`);

--
-- Constraints for table `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `FKPart451022` FOREIGN KEY (`email`) REFERENCES `administrator` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
