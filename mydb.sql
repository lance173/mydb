-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 10:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `AttendanceID` int(25) NOT NULL,
  `TimeIn` datetime NOT NULL DEFAULT current_timestamp(),
  `OutTime` datetime DEFAULT NULL,
  `EmployeeID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceID`, `TimeIn`, `OutTime`, `EmployeeID`) VALUES
(1, '2023-10-27 07:59:02', '2023-10-27 17:09:00', 1),
(2, '2023-10-27 09:02:28', '2023-10-27 16:22:00', 2),
(4, '2023-10-27 15:00:19', '2023-10-28 00:05:00', 3),
(6, '2023-10-29 19:29:57', NULL, 1),
(7, '2023-11-05 13:27:44', '2023-11-05 16:20:03', 2),
(8, '2023-11-05 13:27:57', '2023-11-05 16:19:51', 3),
(9, '2023-11-05 16:04:48', '2023-11-05 16:20:17', 1),
(10, '2023-11-05 16:22:23', '2023-11-05 16:26:03', 4),
(11, '2023-11-08 16:09:21', NULL, 1),
(12, '2023-11-08 16:09:44', '2023-11-08 17:12:28', 3),
(13, '2023-11-09 09:13:36', NULL, 1),
(15, '2023-11-09 09:13:58', '2023-11-09 17:03:16', 4),
(16, '2023-11-09 09:14:36', '2023-11-09 17:02:55', 3),
(17, '2023-11-10 15:29:32', NULL, 2),
(18, '2023-11-10 15:29:42', '2023-11-10 16:22:06', 1),
(19, '2023-11-10 16:28:42', NULL, 3),
(20, '2023-11-13 13:40:58', NULL, 1),
(23, '2023-11-18 16:08:19', NULL, 2),
(24, '2023-11-18 16:25:02', '2023-11-18 20:13:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `home_address` varchar(45) NOT NULL,
  `contact_number` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `home_address`, `contact_number`) VALUES
(1, 'Juan', 'Wick', 'Manila', '09123456789'),
(3, 'Jose', 'Rizal', 'Calamba', '0906191861'),
(4, 'Marcus', 'Alexander', 'United States', '09887775555');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `CompanyID` int(25) NOT NULL,
  `ScreenName` varchar(50) NOT NULL,
  `ShiftStart` time NOT NULL,
  `ShiftEnd` time NOT NULL,
  `Photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`CompanyID`, `ScreenName`, `ShiftStart`, `ShiftEnd`, `Photo`) VALUES
(1, 'George', '08:00:00', '17:00:00', 'img/george.png'),
(2, 'Diane', '09:00:00', '18:00:00', 'img/diane.png'),
(3, 'John', '15:00:00', '00:00:00', 'img/john.png'),
(4, 'Jill', '10:00:00', '18:00:00', 'img/image-default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`AttendanceID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`CompanyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `AttendanceID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`CompanyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
