-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 03:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcodedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` varchar(13) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Date_Registered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `RollNo`, `Name`, `Type`, `EmailId`, `MobNo`, `Password`, `image`, `Date_Registered`) VALUES
(38, 'admin', 'admin', 'sadmin', 'admin', '+639760120148', '$2y$10$vzpC6cub9ZQpsqnx5bbdDeT7LOO7TewPFRjgjEwLqqbJdsgwgXcUe', 'generated_qr_code.png', '2024-04-01 22:51:05'),
(39, 'emptest', 'emptest', 'emp', 'emptest', 'emptest', '$2y$10$ZR9AGJlxB9tlULFDagCCjudpeGTznohh5641lLK6qqDrFBg/TA7k2', 'IMG-660aca2a943e24.62254703.png', '2024-04-01 22:52:26'),
(40, 'AAAAA', 'AAAAA', 'admin', 'AAAAA', 'AAAAA', '$2y$10$I8cMw/l2IISIZj6lAlWfu.mK7IxkTeZotzG1UaJqTXDtQkPXbmNcC', 'IMG-663e16bb24a172.73712061.png', '2024-05-10 20:44:43'),
(41, 'admintest', 'admintest', 'admin', 'admintest', 'admintest', '$2y$10$R95B8m06l0JFd12rqA7PT.QcNt/iV2046T9Du63BMs.BRotwqxfwa', 'IMG-663e265b4ca0d2.35740508.png', '2024-05-10 21:51:23'),
(42, 'emptestt', 'emptestt', 'emp', 'emptestt', 'emptestt', '$2y$10$uXVAivoow/8LfRFBL7JHSeEZDd1cdzSrmPf.EL1XpC3wVlXYZg.G2', 'IMG-663e268e750d89.23475175.png', '2024-05-10 21:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_log`
--

CREATE TABLE `vehicle_log` (
  `ID` int(11) NOT NULL,
  `V_USERID` varchar(250) NOT NULL,
  `TIMEIN` varchar(255) NOT NULL DEFAULT 'current_timestamp(6)',
  `TIMEOUT` varchar(255) NOT NULL,
  `LOGDATE` varchar(255) NOT NULL,
  `STATUS` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_log`
--

INSERT INTO `vehicle_log` (`ID`, `V_USERID`, `TIMEIN`, `TIMEOUT`, `LOGDATE`, `STATUS`) VALUES
(255, '0007', '2024-05-12 20:03:45', '2024-05-12 20:10:43', '', '1'),
(256, '0010', '2024-05-12 20:04:03', '2024-05-12 20:10:55', '', '1'),
(257, '0001', '2024-05-12 20:05:21', '2024-05-12 20:11:04', '', '1'),
(258, '0002', '2024-05-12 20:05:26', '', '', '0'),
(259, '0006', '2024-05-12 20:05:31', '', '', '0'),
(260, '0009', '2024-05-12 20:05:56', '', '', '0'),
(261, '0012', '2024-05-12 20:06:33', '', '', '0'),
(262, '0011', '2024-05-12 20:07:49', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `v_user`
--

CREATE TABLE `v_user` (
  `id` int(11) NOT NULL,
  `V_USERID` varchar(20) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `Rank` varchar(50) NOT NULL,
  `Branch_of_Service` varchar(50) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Cellphone_Number` varchar(15) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Office` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Vehicle_Model` varchar(50) NOT NULL,
  `Vehicle_Type` varchar(50) NOT NULL,
  `Vehicle_Color` varchar(50) NOT NULL,
  `Vehicle_Plate_Number` varchar(20) NOT NULL,
  `Date_Registered` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `imageDL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_user`
--

INSERT INTO `v_user` (`id`, `V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `Date_Registered`, `image`, `imageDL`) VALUES
(75, '0001', 'PSG', '1LT', 'PAF', 'JUAN A. DELA CRUZ SR.', '+639788888888', '1998-10-31', 'ADDRESS EDIT', 'OFFICE', 'Male', 'VMODEL', 'VTYPE', 'BLUE', 'XYZ1234', '2024-04-01 21:47:01', '0001 - JUAN A. DELA CRUZ SR..jpg', ''),
(82, '0002', 'OP', '2LT', 'PAF', 'JOHN A. DOE', '+639123456789', '1980-01-01', 'ADDRESS', 'OFFICE', 'Male', 'Toyota Vios', 'Sedan', 'Black', 'XYZ 123', '2024-04-01 22:03:38', 'DOE_JOHN.jpg', ''),
(89, '0005', 'RESIDENT', '2LT', 'PAF', 'JOHN A. DOE', '+639123456789', '1980-01-01', 'MALACAÑANG PARK, MANILA', 'PPSFU, PSC', 'Male', 'Toyota Vios', 'Sedan', 'Black', 'XYZ 123', '2024-05-10 22:38:18', 'DOE_JOHN.jpg', ''),
(90, '0006', 'PT', '2LT', 'PNP', 'JANE B. SMITH', '+639876543211', '1985-02-11', 'MALACAÑANG PARK, MANILA', '5CAV, PSC', 'Female', 'Honda Civic', 'Coupe', 'White', 'ABC 789', '2024-05-10 22:38:18', 'SMITH_JANE.jpg', ''),
(91, '0007', 'ST JUDE', '2LT', 'PAF', 'JUAN C. DELA CRUZ JR.', '+639876543211', '1999-11-20', 'MALACAÑANG PARK, MANILA', 'PPSFU, PSC', 'Male', 'Toyota Vios', 'Sedan', 'Black', 'XYZ 123', '2024-05-10 22:38:18', 'DELACRUZ_JUAN_JR.jpg', ''),
(95, '0009', 'LPLP', 'testtdl', 'testtdl', 'testtdl', '+639760120147', '2024-05-08', 'testtdl', 'testtdl', 'Female', 'testtdl', 'testtdl', 'testtdl', 'testtdl', '2024-05-11 02:43:14', '0009 - testtdl.png', '0009 - testtdl.png'),
(97, '0010', 'VISITOR', '1', '1', '1', '+639760120147', '2024-05-08', '1', '1', 'Female', '1', '1', '1', '1', '2024-05-11 13:44:28', '0010 - 1.png', '0010 - 1.png'),
(98, '0011', '', '2', '2', '2', '+639760120147', '2024-04-30', '2', '2', 'Female', '2', '2', '2jhgj', '2', '2024-05-11 13:45:08', '0011 - 2.png', '0011 - 2.png'),
(100, '0012', 'Type2', 'type1', 'type1', 'type1', '+639760120147', '2024-05-08', 'type1', 'type1', 'Female', 'type1', 'type1', 'type1', 'type1', '2024-05-11 15:51:42', '0012 - type1.png', '0012 - type1.png'),
(101, '0013', 'PSG', 'PSGTEST', 'PSGTEST', 'PSGTEST', '+639760120148', '2024-05-09', 'PSGTEST', 'PSGTEST', 'Female', 'PSGTEST', 'PSGTEST', 'PSGTEST', 'PSGTEST', '2024-05-11 22:54:37', '0013 - PSGTEST.jpg', '0013 - PSGTEST.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RollNo` (`RollNo`) USING BTREE;

--
-- Indexes for table `vehicle_log`
--
ALTER TABLE `vehicle_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `v_user`
--
ALTER TABLE `v_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `V_USERID` (`V_USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vehicle_log`
--
ALTER TABLE `vehicle_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `v_user`
--
ALTER TABLE `v_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
