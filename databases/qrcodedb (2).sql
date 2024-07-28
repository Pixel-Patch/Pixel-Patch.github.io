-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 02:40 PM
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
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_column` varchar(50) NOT NULL,
  `old_value` varchar(255) DEFAULT NULL,
  `new_value` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`) VALUES
(1, 'we', 'we', 'we', 'we', 'wqe', 'qwe', 'qwe', '2024-05-30 21:56:26'),
(2, '', 'Time In', '0014', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 04:01:11'),
(3, 'admintest', 'Time In', '0015', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 04:07:10'),
(4, 'admintest', 'Time In', '0014', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 04:08:10'),
(5, 'admintest', 'Time Out', '0007', 'vehicle_log', 'STATUS', '0', '1', '2024-05-31 04:08:19'),
(6, 'admintest', 'Time In', '0005', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 04:24:57'),
(7, 'admintest', 'Timed In', '0011', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 04:27:53'),
(8, 'admintest', 'Timed Out', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-05-31 04:28:08'),
(9, 'admintest', 'Timed In', '0002', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 04:36:19'),
(10, 'admintest', 'Timed Out', '0011', 'vehicle_log', 'STATUS', '0', '1', '2024-05-31 04:36:24'),
(11, 'admintest', ' Added', '', '<table_name>', '<table_column>', '<old_value>', '<new_value>', '2024-05-31 04:51:11'),
(12, 'admintest', ' Added', '', '<table_name>', '<table_column>', '<old_value>', '<new_value>', '2024-05-31 05:38:56'),
(13, 'admintest', 'Added', '0031', 'v_user', 'All', NULL, 'All', '2024-05-31 05:43:55'),
(19, 'admintest', 'Updated', '0010', 'v_user', 'Rank, Branch_of_Service, Fullname, Cellphone_Numbe', '1, 1, 1, +639760120147, 2024-05-08, 1, 2, Female, 1, 1, 1, 1', ', , , , , , , , , , , ', '2024-05-31 00:10:55'),
(20, 'admintest', 'Updated', '0010', 'v_user', 'Rank, Branch_of_Service, Fullname, Cellphone_Numbe', '1, 1, 1, +639760120147, 2024-05-08, 3, 2, Female, 1, 1, 1, 1', '', '2024-05-31 00:24:09'),
(21, 'admintest', 'Updated', '0007', 'v_user', 'Address', 'MALACAÑANG PARK, MANILA', 'MALACAÑANG PARK, MANILAsf', '2024-05-31 00:28:49'),
(22, 'admintest', 'Updated', '0006', 'v_user', 'Gender', 'Female', 'Male', '2024-05-31 00:29:22'),
(23, 'admintest', 'Updated', '0006', 'v_user', 'Vehicle_Model', 'Honda Civic', 'Honda Civicsdf', '2024-05-31 00:29:22'),
(24, 'admintest', 'Updated', '0009', 'v_user', 'userType', 'LPLP', 'VISITOR', '2024-05-31 00:33:48'),
(25, 'admintest', 'Updated', '0009', 'v_user', 'Address', 'testtdl', 'testtdlfdgdfg', '2024-05-31 00:33:48'),
(26, 'admintest', 'Updated', '0009', 'v_user', 'Office', 'testtdl', 'testtdlfdgdfg', '2024-05-31 00:33:48'),
(27, 'admintest', 'Updated', '0007', 'v_user', 'Address', 'MALACAÑANG PARK, MANILAsf', 'MALACAÑANG PARK, MANILA', '2024-05-31 06:36:36'),
(28, '', 'Archived', '117', 'v_user', 'All', 'All', NULL, '2024-05-31 06:46:59'),
(29, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 06:50:32'),
(30, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:03:18'),
(31, 'admintest', 'Archived', '0010', 'v_user', 'All', 'All', NULL, '2024-05-31 07:06:47'),
(32, 'admintest', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:13:37'),
(33, 'admintest', 'Archived', '0028', 'v_user', 'All', 'All', NULL, '2024-05-31 07:13:49'),
(34, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:14:13'),
(35, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:15:17'),
(36, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:15:37'),
(37, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:17:15'),
(38, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:18:54'),
(39, '', 'Deleted', '110', 'v_user', 'All', 'All', NULL, '2024-05-31 07:22:07'),
(40, '', 'Deleted', '109', 'v_user', 'All', 'All', NULL, '2024-05-31 07:26:22'),
(41, '', 'Deleted', '108', 'v_user', 'All', 'All', NULL, '2024-05-31 07:27:44'),
(42, 'admintest', 'Archived', '0020', 'v_user', 'All', 'All', NULL, '2024-05-31 07:29:31'),
(43, 'admintest', 'Archived', '0020', 'v_user', 'All', 'All', NULL, '2024-05-31 07:31:47'),
(44, 'admintest', 'Archived', '0020', 'v_user', 'All', 'All', NULL, '2024-05-31 07:31:57'),
(45, 'admintest', 'Archived', '0019', 'v_user', 'All', 'All', NULL, '2024-05-31 07:34:09'),
(46, 'admintest', 'Archived', '0020', 'v_user', 'All', 'All', NULL, '2024-05-31 07:35:03'),
(47, 'admintest', 'Archived', '0018', 'v_user', 'All', 'All', NULL, '2024-05-31 07:35:37'),
(48, 'admintest', 'Archived', '0018', 'v_user', 'All', 'All', NULL, '2024-05-31 07:35:50'),
(49, 'admintest', 'Archived', '0011', 'v_user', 'All', 'All', NULL, '2024-05-31 07:36:01'),
(50, '', 'Deleted', '98', 'v_user', 'All', 'All', NULL, '2024-05-31 07:36:13'),
(51, 'admintest', 'Archived', '0014', 'v_user', 'All', 'All', NULL, '2024-05-31 07:36:58'),
(52, 'admintest', 'Archived', '0018', 'v_user', 'All', 'All', NULL, '2024-05-31 07:37:51'),
(53, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:39:36'),
(54, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:40:21'),
(55, '', 'Archived', '0014', 'v_user', 'All', 'All', NULL, '2024-05-31 07:42:47'),
(56, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:47:46'),
(57, '', 'Archived', '', 'v_user', 'All', 'All', NULL, '2024-05-31 07:51:07'),
(58, '', 'Archived', '0006', 'v_user', 'All', 'All', NULL, '2024-05-31 07:56:17'),
(59, '', 'Archived', '0005', 'v_user', 'All', 'All', NULL, '2024-05-31 07:59:06'),
(60, 'admintest', 'Added', '0003', 'v_user', 'All', NULL, 'All', '2024-05-31 08:01:07'),
(61, 'admintest', 'Archived', '0003', 'v_user', 'All', 'All', NULL, '2024-05-31 08:01:23'),
(62, 'admintest', 'Added', '0003', 'v_user', 'All', NULL, 'All', '2024-05-31 09:12:27'),
(63, 'admintest', 'Added', '0003', 'v_user', 'All', NULL, 'All', '2024-05-31 09:15:54'),
(64, 'admintest', 'Added', '0004', 'v_user', 'All', NULL, 'All', '2024-05-31 09:26:41'),
(65, 'admintest', 'Timed Out', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-05-31 11:47:08'),
(66, 'admintest', 'Timed In', '0001', 'vehicle_log', 'STATUS', NULL, '0', '2024-05-31 11:47:14'),
(67, 'admintest', 'Declined', 'V0001', 'temp_visitor', 'All', 'All', '', '2024-06-03 15:45:38'),
(68, 'admintest', 'Declined', 'V0002', 'temp_visitor', 'All', 'All', 'the sponsor did\'nt confirm', '2024-06-03 15:50:08'),
(69, 'admintest', 'Declined', 'V0004', 'temp_visitor', 'All', 'All', 'test', '2024-06-03 15:56:58'),
(70, 'admintest', 'Added', '0005', 'v_user', 'All', NULL, 'All', '2024-06-03 16:22:08'),
(71, 'admintest', 'Timed Out', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-06-03 17:00:02'),
(72, 'admintest', 'Timed In', '0002', 'vehicle_log', 'STATUS', NULL, '0', '2024-06-03 17:00:08'),
(73, 'admintest', 'Timed In', '0003', 'vehicle_log', 'STATUS', NULL, '0', '2024-06-03 17:00:28'),
(74, 'admintest', 'Declined', '', 'temp_visitor', 'All', 'All', 'rwerwer', '2024-06-03 17:03:09'),
(75, 'admintest', 'Declined', '', 'temp_visitor', 'All', 'All', 'hgfh', '2024-06-03 17:03:44'),
(76, 'admintest', 'Declined', '', 'temp_visitor', 'All', 'All', 'nvbnvbn', '2024-06-03 17:10:14'),
(77, '', 'Timed In', '0001', 'vehicle_log', 'STATUS', NULL, '0', '2024-06-03 18:21:12'),
(78, 'Patricia Ann E. Bagarra', 'Timed Out', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-03 18:22:43'),
(79, 'pat', 'Timed In', '0002', 'vehicle_log', 'STATUS', NULL, '0', '2024-06-03 19:27:19'),
(80, 'pat', 'Added', '0006', 'v_user', 'All', NULL, 'All', '2024-06-03 19:28:12'),
(81, 'pat', 'Declined', '', 'temp_visitor', 'All', 'All', 'gvthn', '2024-06-03 19:43:35'),
(82, 'pat', 'Declined', 'V0015', 'temp_visitor', 'All', 'All', 'hjkhjk', '2024-06-03 19:46:03'),
(83, 'pat', 'Declined', 'V0016', 'temp_visitor', 'All', 'All', 'eqweqwe', '2024-06-03 19:48:05'),
(84, 'pat', 'Declined', 'V0017', 'temp_visitor', 'All', 'All', 'trststwerterdterdthgfjhfth', '2024-06-03 19:51:39'),
(85, 'pat', 'Declined', '', 'temp_visitor', 'All', 'All', 'gdfgdf', '2024-06-03 19:57:05'),
(86, 'pat', 'Declined', '', 'temp_visitor', 'All', 'All', 'hgdfgd', '2024-06-03 19:57:37'),
(87, 'pat', 'Declined', 'V0001', 'temp_visitor', 'All', 'All', 'ghdfgdf', '2024-06-03 20:05:16'),
(88, 'pat', 'Declined', 'V0006', 'temp_visitor', 'All', 'All', 'test', '2024-06-03 20:08:36'),
(89, 'pat', 'Declined', 'V0007', 'temp_visitor', 'All', 'All', 'dgdfgdfg', '2024-06-03 20:19:18'),
(90, 'pat', 'Declined', 'V0008', 'temp_visitor', 'All', 'All', 'vgdfg', '2024-06-03 21:42:33'),
(91, 'Patricia Ann E. Bagarra', 'Declined', 'V0018', 'temp_visitor', 'All', 'All', 'gdfgdfg', '2024-06-03 22:45:37'),
(92, 'pat', 'Declined', 'V0020', 'temp_visitor', 'All', 'All', 'gfhfgh', '2024-06-03 22:48:00'),
(93, 'pat', 'Declined', 'V0019', 'temp_visitor', 'All', 'All', 'fsdfsdf', '2024-06-03 22:55:35'),
(94, 'Patricia Ann E. Bagarra', 'Declined', 'V0021', 'temp_visitor', 'All', 'All', 'gdfgdfg', '2024-06-03 22:58:36'),
(95, 'Patricia Ann E. Bagarra', 'Declined', 'V0022', 'temp_visitor', 'All', 'All', 'ERTERTET', '2024-06-03 23:27:34'),
(96, 'Patricia Ann E. Bagarra', 'Declined', 'V0023', 'temp_visitor', 'All', 'All', 'gdfgdfg', '2024-06-04 00:01:50'),
(97, 'admintest', 'Declined', 'V0024', 'temp_visitor', 'All', 'All', 'Driver\\\'s License Expired', '2024-06-08 21:13:23'),
(98, 'admintest', 'Declined', 'V0026', 'temp_visitor', 'All', 'All', 'The sponsor didn\\\'t respond to any QRv Staff inquiries. Please contact again your sponsor.', '2024-06-08 21:50:13'),
(99, 'admintest', 'Declined', 'V0025', 'temp_visitor', 'All', 'All', 'didn\\\'t fgf;f gfdg/gfdgfgd\\\'f dgg  gdfg\\\"GDgdfg', '2024-06-08 21:58:44'),
(100, 'admintest', 'Declined', 'V0001', 'temp_visitor', 'All', 'All', 'The sponsor didn\\\'t confirm.', '2024-06-08 22:59:32'),
(101, 'admintest', 'Declined', 'V0002', 'temp_visitor', 'All', 'All', 'gdfg', '2024-06-08 23:23:12'),
(102, 'admintest', 'Declined', 'V0003', 'temp_visitor', 'All', 'All', 'dasdsa', '2024-06-08 23:29:02'),
(103, 'admintest', 'Declined', 'V0004', 'temp_visitor', 'All', 'All', 'fgfdgertret', '2024-06-08 23:33:42'),
(104, 'admintest', 'Declined', 'V0005', 'temp_visitor', 'All', 'All', 'dfgdf', '2024-06-08 23:48:31'),
(105, 'admintest', 'Declined', 'V0012', 'temp_visitor', 'All', 'All', 'fdgdf', '2024-06-08 23:52:01'),
(106, 'admintest', 'Declined', 'V0006', 'temp_visitor', 'All', 'All', 'sfsd', '2024-06-08 23:52:47'),
(107, 'admintest', 'Declined', 'V0007', 'temp_visitor', 'All', 'All', 'gdf', '2024-06-08 23:53:11'),
(108, 'admintest', 'Declined', 'V0008', 'temp_visitor', 'All', 'All', 'dfgdf', '2024-06-09 23:38:40'),
(109, 'admintest', 'Declined', 'V0009', 'temp_visitor', 'All', 'All', 'vgrvb', '2024-06-10 03:09:23'),
(110, 'admintest', 'Declined', 'V0010', 'temp_visitor', 'All', 'All', 'wqert', '2024-06-10 03:20:28'),
(111, 'admintest', 'Declined', 'V0011', 'temp_visitor', 'All', 'All', 'GDFG', '2024-06-10 03:29:26'),
(112, 'admintest', 'APPROVED', 'V0013', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 03:41:53'),
(113, 'admintest', 'APPROVED', 'V0014', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:04:39'),
(114, 'admintest', 'APPROVED', 'V0015', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:24:58'),
(115, 'admintest', 'APPROVED', 'V0016', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:28:51'),
(116, 'admintest', 'APPROVED', 'V0017', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:35:32'),
(117, 'admintest', 'APPROVED', 'V0018', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:36:29'),
(118, 'admintest', 'APPROVED', 'V0019', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:39:35'),
(119, 'admintest', 'APPROVED', 'V0020', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:41:10'),
(120, 'admintest', 'APPROVED', 'V0001', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:57:53'),
(121, 'admintest', 'APPROVED', 'V0002', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 04:58:39'),
(122, 'admintest', 'APPROVED', 'V0003', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 05:01:51'),
(123, 'admintest', 'APPROVED', 'V0004', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 05:03:10'),
(124, 'admintest', 'APPROVED', 'V0005', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 05:03:49'),
(125, 'admintest', 'APPROVED', 'V0006', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 05:05:04'),
(126, 'admintest', 'APPROVED', 'V0007', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 05:09:41'),
(127, 'admintest', 'Timed Out', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-06-10 09:54:35'),
(128, 'admintest', 'Timed In', '0003', 'vehicle_log', 'STATUS', NULL, '0', '2024-06-10 11:06:54'),
(129, 'admintest', 'APPROVED', 'V0008', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 11:26:46'),
(130, 'admintest', 'APPROVED', 'V0023', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 11:32:00'),
(131, 'admintest', 'APPROVED', 'V0077', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 11:47:29'),
(132, 'admintest', 'Declined', 'V0013', 'temp_visitor', 'All', 'All', 'Sponsor didn\\\'t confirm', '2024-06-10 11:49:53'),
(133, 'admintest', 'APPROVED', 'V0009', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 11:51:47'),
(134, 'admintest', 'APPROVED', 'V0078', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 12:04:19'),
(135, 'admintest', 'APPROVED', 'V0079', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 12:45:43'),
(136, 'admintest', 'Declined', 'V0010', 'temp_visitor', 'All', 'All', 'Do not have clear photo', '2024-06-10 13:20:58'),
(137, 'admintest', 'Declined', 'V0011', 'temp_visitor', 'All', 'All', 'Do not have address', '2024-06-10 13:22:30'),
(138, 'admintest', 'APPROVED', 'V0012', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 13:22:57'),
(139, 'admintest', 'APPROVED', 'V0080', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 13:26:30'),
(140, 'admintest', 'APPROVED', 'V0081', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 14:10:44'),
(141, 'admintest', 'APPROVED', 'V0082', 'temp_visitor', 'All', 'All', 'APPROVED', '2024-06-10 14:15:12'),
(142, 'pat', 'TIMED OUT', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 21:10:17'),
(143, 'pat', 'TIMED IN', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 21:12:30'),
(144, 'pat', 'TIMED IN', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 21:17:11'),
(145, 'pat', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 21:18:04'),
(146, 'pat', 'TIMED IN', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 21:20:03'),
(147, 'pat', 'TIMED OUT', 'V0082', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 21:20:27'),
(148, 'pat', 'TIMED OUT', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:18:18'),
(149, 'pat', 'TIMED IN', '0003', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 22:18:30'),
(150, 'pat', 'TIMED OUT', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:19:16'),
(151, 'pat', 'TIMED IN', 'V0082', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 22:19:28'),
(152, 'admin', 'TIMED IN', '0001', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 22:21:48'),
(153, 'admin', 'TIMED OUT', '0004', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:22:34'),
(154, 'admintest', 'TIMED IN', 'V0080', 'vehicle_log', 'STATUS', 'NULL', '0', '2024-06-11 22:32:51'),
(155, 'admintest', 'TIMED IN', '0002', 'vehicle_log', 'STATUS', 'NULL', '0', '2024-06-11 22:33:16'),
(156, 'admintest', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:33:25'),
(157, 'admintest', 'TIMED IN', 'V0077', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 22:34:16'),
(158, 'AAAAA', 'TIMED OUT', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:55:28'),
(159, 'AAAAA', 'TIMED OUT', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:55:54'),
(160, 'AAAAA', 'TIMED IN', '0003', 'vehicle_log', 'STATUS', 'NULL', '0', '2024-06-11 22:56:11'),
(161, 'AAAAA', 'TIMED OUT', 'V0080', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:57:10'),
(162, 'AAAAA', 'TIMED OUT', 'V0082', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 22:57:40'),
(163, 'AAAAA', 'TIMED IN', 'V0081', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 22:58:36'),
(164, 'AAAAA', 'TIMED IN', '0004', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 23:02:22'),
(165, 'AAAAA', 'TIMED OUT', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:02:42'),
(166, 'AAAAA', 'TIMED IN', 'V0077', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 23:02:59'),
(167, 'AAAAA', 'TIMED IN', 'V0007', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 23:03:28'),
(168, 'AAAAA', 'TIMED OUT', '0005', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:03:48'),
(169, 'AAAAA', 'TIMED OUT', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:24:37'),
(170, 'AAAAA', 'TIMED OUT', '0004', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:25:39'),
(171, 'AAAAA', 'TIMED IN', '0002', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 23:25:49'),
(172, 'AAAAA', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:26:06'),
(173, 'AAAAA', 'TIMED OUT', '0006', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:26:48'),
(174, 'AAAAA', 'TIMED OUT', 'V0081', 'vehicle_log', 'STATUS', '0', '1', '2024-06-11 23:27:10'),
(175, 'AAAAA', 'TIMED IN', '0001', 'vehicle_log', 'STATUS', '', '0', '2024-06-11 23:28:52'),
(176, 'AAAAA', 'TIMED IN', 'V0081', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 00:10:11'),
(177, 'AAAAA', 'TIMED OUT', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 00:11:39'),
(178, 'admintest', 'TIMED IN', 'V0077', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 00:16:23'),
(179, 'AAAAA', 'TIMED IN', '0003', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 00:17:03'),
(180, 'AAAAA', 'TIMED OUT', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 00:17:11'),
(181, 'admintest', 'TIMED OUT', 'V0007', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 00:17:38'),
(182, 'admintest', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 00:31:26'),
(183, 'admintest', 'TIMED IN', '0005', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 00:33:37'),
(184, 'admintest', 'TIMED IN', 'V0007', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 00:34:28'),
(185, 'admintest', 'TIMED IN', '0001', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 00:38:06'),
(186, 'admintest', 'TIMED OUT', 'V0081', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 00:39:23'),
(187, 'admintest', 'TIMED OUT', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 00:40:43'),
(188, 'AAAAA', 'TIMED IN', 'V0077', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 10:36:27'),
(189, 'admintest', 'TIMED IN', '0002', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 10:37:29'),
(190, 'admintest', 'TIMED IN', '0003', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 10:37:36'),
(191, 'admintest', 'TIMED OUT', '0005', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 10:37:45'),
(192, 'admintest', 'TIMED OUT', 'V0007', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 10:38:04'),
(193, 'admintest', 'TIMED OUT', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 10:38:20'),
(194, 'admintest', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 12:18:53'),
(195, 'AAAAA', 'TIMED OUT', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 12:33:25'),
(196, 'AAAAA', 'TIMED OUT', 'V0077', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 12:33:37'),
(197, 'emptestt', 'TIMED IN', '0001', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 12:55:47'),
(198, 'emptestt', 'TIMED OUT', '0006', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 12:56:02'),
(199, 'emptestt', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 16:18:21'),
(200, 'emptestt', 'TIMED IN', '0006', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 16:18:55'),
(201, 'emptestt', 'TIMED IN', 'V0077', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 16:38:29'),
(202, 'emptestt', 'TIMED IN', 'V0080', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 16:38:55'),
(203, 'emptestt', 'TIMED IN', '0002', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 16:39:07'),
(204, 'emptestt', 'TIMED OUT', '0001', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 16:39:15'),
(205, 'emptestt', 'TIMED IN', 'V0082', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 16:40:00'),
(206, 'emptestt', 'TIMED OUT', 'V0023', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 16:40:50'),
(207, 'emptestt', 'TIMED IN', '0003', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 16:49:26'),
(208, 'emptestt', 'TIMED OUT', 'V0080', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 16:49:36'),
(209, 'emptestt', 'TIMED OUT', '0002', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 16:50:00'),
(210, 'emptestt', 'TIMED OUT', '0006', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 16:50:09'),
(211, 'emptestt', 'TIMED OUT', '0003', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 17:47:01'),
(212, 'emptestt', 'TIMED OUT', 'V0082', 'vehicle_log', 'STATUS', '0', '1', '2024-06-12 17:47:11'),
(213, 'emptestt', 'TIMED IN', 'V0080', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 17:47:22'),
(214, 'emptestt', 'TIMED IN', '0001', 'vehicle_log', 'STATUS', '', '0', '2024-06-12 17:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `archived_user`
--

CREATE TABLE `archived_user` (
  `id` int(11) NOT NULL,
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` varchar(13) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Date_Registered` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archived_visitor`
--

CREATE TABLE `archived_visitor` (
  `id` int(11) NOT NULL,
  `V_USERID` varchar(20) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `visitReason` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `cellphoneNumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vModel` varchar(50) NOT NULL,
  `vType` varchar(50) NOT NULL,
  `vColor` varchar(50) NOT NULL,
  `vPlateNumber` varchar(20) NOT NULL,
  `avatarImage` varchar(255) NOT NULL,
  `driversLicenseImage` varchar(255) NOT NULL,
  `vehicleImage` varchar(255) NOT NULL,
  `dateRegistered` datetime NOT NULL,
  `visitDate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `declineReason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_visitor`
--

INSERT INTO `archived_visitor` (`id`, `V_USERID`, `userType`, `sponsor`, `visitReason`, `name`, `email`, `gender`, `birthdate`, `cellphoneNumber`, `address`, `vModel`, `vType`, `vColor`, `vPlateNumber`, `avatarImage`, `driversLicenseImage`, `vehicleImage`, `dateRegistered`, `visitDate`, `status`, `declineReason`) VALUES
(5, 'V0005', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar5.jpg', 'license5.jpg', 'vehicle5.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'dfgdf'),
(6, 'V0006', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar6.jpg', 'license6.jpg', 'vehicle6.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'sfsd'),
(7, 'V0007', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar7.jpg', 'license7.jpg', 'vehicle7.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'gdf'),
(8, 'V0008', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar8.jpg', 'license8.jpg', 'vehicle8.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'dfgdf'),
(9, 'V0009', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar9.jpg', 'license9.jpg', 'vehicle9.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'vgrvb'),
(10, 'V0010', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar10.jpg', 'license10.jpg', 'vehicle10.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'wqert'),
(11, 'V0011', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar11.jpg', 'license11.jpg', 'vehicle11.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'GDFG'),
(12, 'V0012', 'VISITOR', 'John Doe', 'meeting', 'Jane Smith', 'bagarrap@gmail.com', 'female', '1985-06-15', '555-1234', '123 Main St, Anytown, AN', 'Toyota', 'Sedan', 'Blue', 'ABC123', 'avatar12.jpg', 'license12.jpg', 'vehicle12.jpg', '2024-06-08 14:30:00', '0000-00-00', 'Declined', 'fdgdf'),
(36, 'V0010', 'VISITOR', 'Sponsor10', 'Reason10', 'Ivy White', 'bagarrap@gmail.com', 'Female', '1983-10-10', '8374659201', '456 Redwood Boulevard', 'Model10', 'Type10', 'Black', 'BCD890', 'avatar10.png', 'license10.png', 'vehicle10.png', '2023-01-10 00:00:00', '0000-00-00', 'Declined', 'Do not have clear photo'),
(37, 'V0011', 'VISITOR', 'Sponsor11', 'Reason11', 'Jack Black', 'bagarrap@gmail.com', 'Male', '1992-11-11', '1273485960', '321 Cypress Drive', 'Model11', 'Type11', 'Red', 'EFG123', 'avatar11.png', 'license11.png', 'vehicle11.png', '2023-01-11 00:00:00', '0000-00-00', 'Declined', 'Do not have address'),
(39, 'V0013', 'VISITOR', 'Sponsor13', 'Reason13', 'Larry Red', 'bagarrap@gmail.com', 'Male', '1979-01-13', '3948571620', '654 Magnolia Street', 'Model13', 'Type13', 'Green', 'KLM789', 'avatar13.png', 'license13.png', 'vehicle13.png', '2023-01-13 00:00:00', '0000-00-00', 'Declined', 'Sponsor didn\\\'t confirm');

-- --------------------------------------------------------

--
-- Table structure for table `archived_v_user`
--

CREATE TABLE `archived_v_user` (
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
  `imageDL` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archived_v_user`
--

INSERT INTO `archived_v_user` (`id`, `V_USERID`, `userType`, `Rank`, `Branch_of_Service`, `Fullname`, `Cellphone_Number`, `Date_of_Birth`, `Address`, `Office`, `Gender`, `Vehicle_Model`, `Vehicle_Type`, `Vehicle_Color`, `Vehicle_Plate_Number`, `Date_Registered`, `image`, `imageDL`, `status`) VALUES
(1, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', 'Archived'),
(98, '0011', '', '2', '2', '2', '+639760120147', '2024-04-30', '2', '2', 'Female', '2', '2', '2jhgj', '2', '2024-05-11 13:45:08', '0011 - 2.png', '0011 - 2.png', 'Archived'),
(108, '0021', 'OP', 'test', 'test', 'test', '+639999999997', '2024-05-14', 'test', 'test', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 05:07:30', '0021 - test.png', '0021 - test.png', 'Archived'),
(109, '0022', 'OP', 'test', 'test', 'test', '+639999999997', '2024-05-14', 'test', 'test', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 05:09:48', '0022 - test.png', '0022 - test.png', 'Archived'),
(110, '0023', 'OP', 'test', 'test', 'test', '+639999999997', '2024-05-14', 'test', 'test', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 05:13:12', '0023 - test.png', '0023 - test.png', 'Archived'),
(111, '0024', 'OP', 'test', 'test', 'test', '+639999999997', '2024-05-14', 'test', 'test', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 05:17:44', '0024 - test.png', '0024 - test.png', 'Archived'),
(112, '0025', 'OP', 'test', 'test', 'test', '+639999999997', '2024-05-14', 'test', 'test', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 05:26:57', '0025 - test.png', '0025 - test.png', 'Archived'),
(113, '0026', 'PSG', 'tt', 'tt', 'tt', '+639999999997', '2024-05-06', 'tt', 'tt', 'Female', 'tt', 'tt', 'tt', 'tt', '2024-05-31 05:27:44', '0026 - tt.png', '0026 - tt.png', 'Archived'),
(114, '0027', 'OP', 'tt', 'tt', 'tt', '+639999999997', '2024-05-14', 'tt', 'tt', 'Female', 'tt', 'tt', 'tt', 'tt', '2024-05-31 05:34:10', '0027 - tt.png', '0027 - tt.png', 'Archived'),
(115, '0028', 'OP', 'tt', 'tt', 'tt', '+639999999997', '2024-05-14', 'tt', 'tt', 'Female', 'tt', 'tt', 'tt', 'tt', '2024-05-31 05:36:23', '0028 - tt.png', '0028 - tt.png', 'Archived'),
(116, '0029', 'OP', 'tt', 'tt', 'tt', '+639999999997', '2024-05-14', 'tt', 'tt', 'Female', 'tt', 'tt', 'tt', 'tt', '2024-05-31 05:36:28', '0029 - tt.png', '0029 - tt.png', 'Archived'),
(117, '0030', 'OP', 'tt', 'tt', 'tt', '+639999999997', '2024-05-14', 'tt', 'tt', 'Female', 'tt', 'tt', 'sdsd', 'tt', '2024-05-31 05:38:56', '0030 - tt.png', '0030 - tt.png', 'Archived'),
(118, '0031', 'ST JUDE', 't', 't', 't', '+639999999997', '2024-04-30', 't', 't', 'Female', 't', 't', 't', 't', '2024-05-31 05:43:55', '0031 - t.png', '0031 - t.png', 'Archived'),
(119, '0018', 'OP', 'test', 'test', 'test', '+639999999997', '2024-05-14', 'test', 'test', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 05:07:28', '0018 - test.png', '0018 - test.png', 'Archived'),
(120, '0015', 'OP', '2LT', 'PAF', 'JOHN A. DOE', '+639123456789', '1980-01-01', 'ADDRESS,EDIT', 'OFFICE,OFFICE2', 'Male', 'ToyotaVios', 'Sedan', 'Black', 'XYZ123', '2024-05-20 12:41:44', '0015 - JOHN A. DOE.jpg', '0015 - JOHN A. DOE.jpg', 'Archived'),
(121, '0014', 'PSG', '1LT', 'PAF', 'JUAN A. DELA CRUZ SR.', '+639788888888', '1998-10-31', 'MALACANANG,PARKEDIT', 'OFFICE,OFFICE2', 'Male', 'VMODEL', 'VTYPE', 'BLUE', 'XYZ1234', '2024-05-20 12:41:44', '0014 - JUAN A. DELA CRUZ SR..jpg', '0014 - JUAN A. DELA CRUZ SR..jpg', 'Archived'),
(122, '0009', 'VISITOR', 'testtdl', 'testtdl', 'testtdl', '+639760120147', '2024-05-08', 'testtdlfdgdfg', 'testtdlfdgdfg', 'Female', 'testtdl', 'testtdl', 'testtdl', 'testtdl', '2024-05-11 02:43:14', '0009 - testtdl.png', '0009 - testtdl.png', 'Archived'),
(123, '0007', 'ST JUDE', '2LT', 'PAF', 'JUAN C. DELA CRUZ JR.', '+639876543211', '1999-11-20', 'MALACAÑANG PARK, MANILA', 'PPSFU, PSC', 'Male', 'Toyota Vios', 'Sedan', 'Black', 'XYZ 123', '2024-05-10 22:38:18', 'DELACRUZ_JUAN_JR.jpg', '', 'Archived'),
(124, '0006', 'PT', '2LT', 'PNP', 'JANE B. SMITH', '+639876543211', '1985-02-11', 'MALACAÑANG PARK, MANILArter', '5CAV, PSC', 'Male', 'Honda Civicsdf', 'Coupe', 'White', 'ABC 789', '2024-05-10 22:38:18', 'SMITH_JANE.jpg', '0006 - JANE B. SMITH.png', 'Archived'),
(125, '0005', 'RESIDENT', '2LT', 'PAF', 'JOHN A. DOE', '+639123456789', '1980-01-01', 'MALACAÑANG PARK, MANILA', 'PPSFU, PSC', 'Male', 'Toyota Vios', 'Sedan', 'Black', 'XYZ 123', '2024-05-10 22:38:18', 'DOE_JOHN.jpg', '', 'Archived'),
(126, '0003', 'RESIDENT', 'q', 'q', 'q', '+639760120148', '2024-05-23', 'q', 'q', 'Other', 'q', 'q', 'q', 'q', '2024-05-31 08:01:07', '0003 - q.png', '0003 - q.png', 'Archived');

-- --------------------------------------------------------

--
-- Table structure for table `temp_visitor`
--

CREATE TABLE `temp_visitor` (
  `id` int(11) NOT NULL,
  `V_USERID` varchar(20) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `visitReason` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `cellphoneNumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vModel` varchar(50) NOT NULL,
  `vType` varchar(50) NOT NULL,
  `vColor` varchar(50) NOT NULL,
  `vPlateNumber` varchar(20) NOT NULL,
  `avatarImage` varchar(255) NOT NULL,
  `driversLicenseImage` varchar(255) NOT NULL,
  `vehicleImage` varchar(255) NOT NULL,
  `dateRegistered` datetime DEFAULT NULL,
  `visitDate` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_visitor`
--

INSERT INTO `temp_visitor` (`id`, `V_USERID`, `userType`, `sponsor`, `visitReason`, `name`, `email`, `gender`, `birthdate`, `cellphoneNumber`, `address`, `vModel`, `vType`, `vColor`, `vPlateNumber`, `avatarImage`, `driversLicenseImage`, `vehicleImage`, `dateRegistered`, `visitDate`, `status`) VALUES
(40, 'V0014', 'VISITOR', 'Sponsor14', 'Reason14', 'Mia Yellow', 'bagarrap@gmail.com', 'Female', '1986-02-14', '4859612730', '321 Birch Avenue', 'Model14', 'Type14', 'Blue', 'NOP012', 'avatar14.png', 'license14.png', 'vehicle14.png', '2023-01-14 00:00:00', '2023-06-14', 'PENDING'),
(41, 'V0015', 'VISITOR', 'Sponsor15', 'Reason15', 'Nina Purple', 'bagarrap@gmail.com', 'Female', '1993-03-15', '5761928340', '987 Willow Boulevard', 'Model15', 'Type15', 'Yellow', 'QRS345', 'avatar15.png', 'license15.png', 'vehicle15.png', '2023-01-15 00:00:00', '2023-06-15', 'PENDING'),
(42, 'V0016', 'VISITOR', 'Sponsor16', 'Reason16', 'Oscar Brown', 'bagarrap@gmail.com', 'Male', '1984-04-16', '6574839201', '654 Poplar Drive', 'Model16', 'Type16', 'Black', 'TUV678', 'avatar16.png', 'license16.png', 'vehicle16.png', '2023-01-16 00:00:00', '2023-06-16', 'PENDING'),
(43, 'V0017', 'VISITOR', 'Sponsor17', 'Reason17', 'Paula Orange', 'bagarrap@gmail.com', 'Female', '1973-05-17', '7482916350', '321 Hickory Lane', 'Model17', 'Type17', 'White', 'WXY901', 'avatar17.png', 'license17.png', 'vehicle17.png', '2023-01-17 00:00:00', '2023-06-17', 'PENDING'),
(44, 'V0018', 'VISITOR', 'Sponsor18', 'Reason18', 'Quincy Gold', 'bagarrap@gmail.com', 'Male', '1994-06-18', '8391027465', '987 Mulberry Street', 'Model18', 'Type18', 'Red', 'ZAB234', 'avatar18.png', 'license18.png', 'vehicle18.png', '2023-01-18 00:00:00', '2023-06-18', 'PENDING'),
(45, 'V0019', 'VISITOR', 'Sponsor19', 'Reason19', 'Rachel Silver', 'bagarrap@gmail.com', 'Female', '1982-07-19', '9203746581', '654 Juniper Avenue', 'Model19', 'Type19', 'Blue', 'CDE567', 'avatar19.png', 'license19.png', 'vehicle19.png', '2023-01-19 00:00:00', '2023-06-19', 'PENDING'),
(46, 'V0020', 'VISITOR', 'Sponsor20', 'Reason20', 'Steve Green', 'bagarrap@gmail.com', 'Male', '1976-08-20', '2938475610', '321 Oak Boulevard', 'Model20', 'Type20', 'Yellow', 'FGH890', 'avatar20.png', 'license20.png', 'vehicle20.png', '2023-01-20 00:00:00', '2023-06-20', 'PENDING'),
(47, 'V0021', 'VISITOR', 'Sponsor21', 'Reason21', 'Tina Black', 'bagarrap@gmail.com', 'Female', '1981-09-21', '3948571620', '987 Pine Drive', 'Model21', 'Type21', 'Green', 'IJK123', 'avatar21.png', 'license21.png', 'vehicle21.png', '2023-01-21 00:00:00', '2023-06-21', 'PENDING'),
(48, 'V0022', 'VISITOR', 'Sponsor22', 'Reason22', 'Uma Blue', 'bagarrap@gmail.com', 'Female', '1977-10-22', '4859612730', '654 Cedar Lane', 'Model22', 'Type22', 'Black', 'LMN456', 'avatar22.png', 'license22.png', 'vehicle22.png', '2023-01-22 00:00:00', '2023-06-22', 'PENDING'),
(50, 'V0024', 'VISITOR', 'Sponsor24', 'Reason24', 'Wendy Green', 'bagarrap@gmail.com', 'Female', '1990-12-24', '6574839201', '987 Palm Avenue', 'Model24', 'Type24', 'Blue', 'RST012', 'avatar24.png', 'license24.png', 'vehicle24.png', '2023-01-24 00:00:00', '2023-06-24', 'PENDING'),
(51, 'V0025', 'VISITOR', 'Sponsor25', 'Reason25', 'Xander Brown', 'bagarrap@gmail.com', 'Male', '1985-01-25', '7482916350', '654 Pine Boulevard', 'Model25', 'Type25', 'White', 'UVW345', 'avatar25.png', 'license25.png', 'vehicle25.png', '2023-01-25 00:00:00', '2023-06-25', 'PENDING'),
(52, 'V0026', 'VISITOR', 'Sponsor26', 'Reason26', 'Yara Yellow', 'bagarrap@gmail.com', 'Female', '1987-02-26', '8391027465', '321 Oak Drive', 'Model26', 'Type26', 'Red', 'XYZ678', 'avatar26.png', 'license26.png', 'vehicle26.png', '2023-01-26 00:00:00', '2023-06-26', 'PENDING'),
(53, 'V0027', 'VISITOR', 'Sponsor27', 'Reason27', 'Zane Purple', 'bagarrap@gmail.com', 'Male', '1992-03-27', '9203746581', '987 Spruce Lane', 'Model27', 'Type27', 'Yellow', 'ABC901', 'avatar27.png', 'license27.png', 'vehicle27.png', '2023-01-27 00:00:00', '2023-06-27', 'PENDING'),
(54, 'V0028', 'VISITOR', 'Sponsor28', 'Reason28', 'Amy Silver', 'bagarrap@gmail.com', 'Female', '1978-04-28', '2938475610', '654 Palm Street', 'Model28', 'Type28', 'Black', 'DEF234', 'avatar28.png', 'license28.png', 'vehicle28.png', '2023-01-28 00:00:00', '2023-06-28', 'PENDING'),
(55, 'V0029', 'VISITOR', 'Sponsor29', 'Reason29', 'Brian Gold', 'bagarrap@gmail.com', 'Male', '1980-05-29', '3948571620', '321 Cedar Boulevard', 'Model29', 'Type29', 'Blue', 'GHI567', 'avatar29.png', 'license29.png', 'vehicle29.png', '2023-01-29 00:00:00', '2023-06-29', 'PENDING'),
(56, 'V0030', 'VISITOR', 'Sponsor30', 'Reason30', 'Cathy Red', 'bagarrap@gmail.com', 'Female', '1976-06-30', '4859612730', '987 Oak Drive', 'Model30', 'Type30', 'White', 'JKL890', 'avatar30.png', 'license30.png', 'vehicle30.png', '2023-01-30 00:00:00', '2023-06-30', 'PENDING'),
(57, 'V0031', 'VISITOR', 'Sponsor31', 'Reason31', 'David Black', 'bagarrap@gmail.com', 'Male', '1994-07-31', '5761928340', '654 Pine Lane', 'Model31', 'Type31', 'Red', 'MNO123', 'avatar31.png', 'license31.png', 'vehicle31.png', '2023-01-31 00:00:00', '0000-00-00', 'PENDING'),
(58, 'V0032', 'VISITOR', 'Sponsor32', 'Reason32', 'Eva Blue', 'bagarrap@gmail.com', 'Female', '1981-08-01', '6574839201', '321 Maple Street', 'Model32', 'Type32', 'Yellow', 'PQR456', 'avatar32.png', 'license32.png', 'vehicle32.png', '2023-01-01 00:00:00', '2023-07-01', 'PENDING'),
(59, 'V0033', 'VISITOR', 'Sponsor33', 'Reason33', 'Frank Green', 'bagarrap@gmail.com', 'Male', '1989-09-02', '7482916350', '987 Palm Avenue', 'Model33', 'Type33', 'Black', 'STU789', 'avatar33.png', 'license33.png', 'vehicle33.png', '2023-01-02 00:00:00', '2023-07-02', 'PENDING'),
(60, 'V0034', 'VISITOR', 'Sponsor34', 'Reason34', 'Gina White', 'bagarrap@gmail.com', 'Female', '1973-10-03', '8391027465', '654 Spruce Lane', 'Model34', 'Type34', 'Blue', 'VWX012', 'avatar34.png', 'license34.png', 'vehicle34.png', '2023-01-03 00:00:00', '2023-07-03', 'PENDING'),
(61, 'V0035', 'VISITOR', 'Sponsor35', 'Reason35', 'Hank Yellow', 'bagarrap@gmail.com', 'Male', '1977-11-04', '9203746581', '321 Pine Drive', 'Model35', 'Type35', 'White', 'YZA345', 'avatar35.png', 'license35.png', 'vehicle35.png', '2023-01-04 00:00:00', '2023-07-04', 'PENDING'),
(62, 'V0036', 'VISITOR', 'Sponsor36', 'Reason36', 'Ivy Red', 'bagarrap@gmail.com', 'Female', '1992-12-05', '2938475610', '987 Maple Lane', 'Model36', 'Type36', 'Red', 'BCD678', 'avatar36.png', 'license36.png', 'vehicle36.png', '2023-01-05 00:00:00', '2023-07-05', 'PENDING'),
(63, 'V0037', 'VISITOR', 'Sponsor37', 'Reason37', 'Jack Black', 'bagarrap@gmail.com', 'Male', '1980-01-06', '3948571620', '654 Palm Street', 'Model37', 'Type37', 'Blue', 'EFG901', 'avatar37.png', 'license37.png', 'vehicle37.png', '2023-01-06 00:00:00', '2023-07-06', 'PENDING'),
(64, 'V0038', 'VISITOR', 'Sponsor38', 'Reason38', 'Karen Blue', 'bagarrap@gmail.com', 'Female', '1976-02-07', '4859612730', '321 Oak Drive', 'Model38', 'Type38', 'Yellow', 'HIJ234', 'avatar38.png', 'license38.png', 'vehicle38.png', '2023-01-07 00:00:00', '2023-07-07', 'PENDING'),
(65, 'V0039', 'VISITOR', 'Sponsor39', 'Reason39', 'Larry Red', 'bagarrap@gmail.com', 'Male', '1987-03-08', '5761928340', '987 Pine Lane', 'Model39', 'Type39', 'Black', 'KLM567', 'avatar39.png', 'license39.png', 'vehicle39.png', '2023-01-08 00:00:00', '2023-07-08', 'PENDING'),
(66, 'V0040', 'VISITOR', 'Sponsor40', 'Reason40', 'Mia Yellow', 'bagarrap@gmail.com', 'Female', '1978-04-09', '6574839201', '654 Spruce Boulevard', 'Model40', 'Type40', 'Red', 'NOP890', 'avatar40.png', 'license40.png', 'vehicle40.png', '2023-01-09 00:00:00', '2023-07-09', 'PENDING'),
(67, 'V0041', 'VISITOR', 'Sponsor41', 'Reason41', 'Nina Purple', 'bagarrap@gmail.com', 'Female', '1986-05-10', '7482916350', '321 Pine Drive', 'Model41', 'Type41', 'Blue', 'QRS123', 'avatar41.png', 'license41.png', 'vehicle41.png', '2023-01-10 00:00:00', '2023-07-10', 'PENDING'),
(68, 'V0042', 'VISITOR', 'Sponsor42', 'Reason42', 'Oscar Brown', 'bagarrap@gmail.com', 'Male', '1975-06-11', '8391027465', '987 Maple Lane', 'Model42', 'Type42', 'Yellow', 'TUV456', 'avatar42.png', 'license42.png', 'vehicle42.png', '2023-01-11 00:00:00', '2023-07-11', 'PENDING'),
(69, 'V0043', 'VISITOR', 'Sponsor43', 'Reason43', 'Paula Orange', 'bagarrap@gmail.com', 'Female', '1990-07-12', '9203746581', '654 Palm Street', 'Model43', 'Type43', 'Black', 'WXY789', 'avatar43.png', 'license43.png', 'vehicle43.png', '2023-01-12 00:00:00', '2023-07-12', 'PENDING'),
(70, 'V0044', 'VISITOR', 'Sponsor44', 'Reason44', 'Quincy Gold', 'bagarrap@gmail.com', 'Male', '1981-08-13', '2938475610', '321 Oak Drive', 'Model44', 'Type44', 'Red', 'ZAB012', 'avatar44.png', 'license44.png', 'vehicle44.png', '2023-01-13 00:00:00', '2023-07-13', 'PENDING'),
(71, 'V0045', 'VISITOR', 'Sponsor45', 'Reason45', 'Rachel Silver', 'bagarrap@gmail.com', 'Female', '1985-09-14', '3948571620', '987 Maple Lane', 'Model45', 'Type45', 'Blue', 'CDE345', 'avatar45.png', 'license45.png', 'vehicle45.png', '2023-01-14 00:00:00', '2023-07-14', 'PENDING'),
(72, 'V0046', 'VISITOR', 'Sponsor46', 'Reason46', 'Steve Green', 'bagarrap@gmail.com', 'Male', '1979-10-15', '4859612730', '654 Pine Drive', 'Model46', 'Type46', 'Yellow', 'FGH678', 'avatar46.png', 'license46.png', 'vehicle46.png', '2023-01-15 00:00:00', '2023-07-15', 'PENDING'),
(73, 'V0047', 'VISITOR', 'Sponsor47', 'Reason47', 'Tina Black', 'bagarrap@gmail.com', 'Female', '1984-11-16', '5761928340', '321 Oak Boulevard', 'Model47', 'Type47', 'Black', 'IJK901', 'avatar47.png', 'license47.png', 'vehicle47.png', '2023-01-16 00:00:00', '2023-07-16', 'PENDING'),
(74, 'V0048', 'VISITOR', 'Sponsor48', 'Reason48', 'Uma Blue', 'bagarrap@gmail.com', 'Female', '1993-12-17', '6574839201', '987 Pine Street', 'Model48', 'Type48', 'Red', 'LMN234', 'avatar48.png', 'license48.png', 'vehicle48.png', '2023-01-17 00:00:00', '2023-07-17', 'PENDING'),
(75, 'V0049', 'VISITOR', 'Sponsor49', 'Reason49', 'Vince White', 'bagarrap@gmail.com', 'Male', '1988-01-18', '7482916350', '654 Maple Avenue', 'Model49', 'Type49', 'Blue', 'OPQ567', 'avatar49.png', 'license49.png', 'vehicle49.png', '2023-01-18 00:00:00', '2023-07-18', 'PENDING'),
(76, 'V0050', 'VISITOR', 'Sponsor50', 'Reason50', 'Wendy Green', 'bagarrap@gmail.com', 'Female', '1974-02-19', '8391027465', '321 Oak Boulevard', 'Model50', 'Type50', 'Yellow', 'RST890', 'avatar50.png', 'license50.png', 'vehicle50.png', '2023-01-19 00:00:00', '2023-07-19', 'PENDING'),
(83, 'V0083', 'VISITOR', '1LT JUAN A. DELACRUZ PAF', 'fdgfdg', 'PATRICIA BAGARRA', 'bagarrap@gmail.com', 'FEMALE', '2024-06-05', '+639999999999', 'ADDRESS', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VPATRICIA_BAGARRA.png', 'VPATRICIA_BAGARRA.jpg', 'VPATRICIA_BAGARRA.jpg', '2024-06-10 14:15:03', '2024-05-17', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` varchar(13) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Date_Registered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `RollNo`, `Name`, `Type`, `title`, `EmailId`, `MobNo`, `Password`, `image`, `Date_Registered`) VALUES
(38, 'admin', 'admin', 'admin', '', 'admin', '+639760120148', '$2y$10$9aJkTso//OFS7Sj4PUlDT.PZiBs2qkeQ4cTwgYl1TVHk5nf.TXhsO', '6.jpg', '2024-04-01 22:51:05'),
(39, 'emptest', 'emptest', 'emp', '', 'emptest', '+639760120120', '$2y$10$AITYPuganDc9K1DCKX.jqOmEqu8r2VMXdkPUSqd2U9hs14Nx.ehaq', 'IMG-660aca2a943e24.62254703.png', '2024-04-01 22:52:26'),
(40, 'AAAAA', 'AAAAA', 'sadmin', '', 'AAAAA', '+639760120148', '$2y$10$uGbw6qc9jpF.dhXO6TZgg.8ytuS5xm8SREA3xvnBqkxKfHIoGb16y', 'watch.png', '2024-05-10 20:44:43'),
(41, 'admintest', 'admintest', 'sadmin', '', 'admintest', '+639760120120', '$2y$10$R95B8m06l0JFd12rqA7PT.QcNt/iV2046T9Du63BMs.BRotwqxfwa', 'images_CGj9QQthTEGYiePKsHLw.png', '2024-05-10 21:51:23'),
(42, 'emptestt', 'emptestt', 'emp', '', 'emptestt', '+639760120120', '$2y$10$uIsjTv0s3HNZpzD4kKnyi.joBOenSKwlucPxOyi4Z5LyuH0R/3HlK', '9.png', '2024-05-10 21:52:14');

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
(258, '0002', '2024-05-12 20:05:26', '2024-05-24 00:17:05', '', '1'),
(259, '0006', '2024-05-12 20:05:31', '2024-05-24 01:11:41', '', '1'),
(260, '0009', '2024-05-12 20:05:56', '2024-05-24 01:14:52', '', '1'),
(261, '0012', '2024-05-12 20:06:33', '', '', '0'),
(262, '0011', '2024-05-12 20:07:49', '2024-05-24 01:29:51', '', '1'),
(263, '0001', '2024-05-23 23:28:07', '2024-05-24 00:14:38', '', '1'),
(264, '0005', '2024-05-24 00:34:28', '2024-05-24 01:10:36', '', '1'),
(265, '0005', '2024-05-24 01:28:40', '2024-05-24 01:51:05', '', '1'),
(266, '0010', '2024-05-24 01:33:02', '2024-05-31 02:47:01', '', '1'),
(267, '0001', '2024-05-24 01:35:18', '2024-05-30 22:52:48', '', '1'),
(268, '0002', '2024-05-24 01:35:28', '2024-05-24 02:11:16', '', '1'),
(269, '0005', '2024-05-24 01:59:50', '2024-05-31 02:55:04', '', '1'),
(270, '0011', '2024-05-24 02:10:52', '2024-05-31 03:25:23', '', '1'),
(271, '0007', '2024-05-30 19:08:31', '2024-05-31 02:46:42', '', '1'),
(272, '0002', '2024-05-30 22:58:21', '2024-05-31 02:47:37', '', '1'),
(273, '0014', '2024-05-30 23:06:18', '2024-05-31 04:01:11', '', '1'),
(274, '0001', '2024-01-12 20:03:45', '2024-01-12 20:10:43', '', '1'),
(275, '0002', '2024-02-12 20:04:03', '2024-02-12 20:10:55', '', '1'),
(276, '0005', '2024-03-12 20:05:21', '2024-03-12 20:11:04', '', '1'),
(277, '0007', '2024-04-12 20:05:26', '2024-04-12 20:17:05', '', '1'),
(278, '0006', '2024-05-31 02:49:06', '2024-05-31 03:15:08', '', '1'),
(279, '0002', '2024-05-31 02:58:00', '2024-05-31 03:36:08', '', '1'),
(280, '0005', '2024-05-31 03:20:01', '2024-05-31 03:44:44', '', '1'),
(281, '0001', '2024-05-31 03:22:42', '2024-05-31 03:35:03', '', '1'),
(282, '0007', '2024-05-31 03:29:28', '2024-05-31 04:08:19', '', '1'),
(283, '0001', '2024-05-31 03:47:43', '2024-05-31 04:28:08', '', '1'),
(284, '0006', '2024-05-31 03:48:03', '2024-06-11 23:26:48', '', '1'),
(285, '0015', '2024-05-31 04:07:10', '', '', '0'),
(286, '0014', '2024-05-31 04:08:10', '', '', '0'),
(287, '0005', '2024-05-31 04:24:57', '2024-06-11 23:03:48', '', '1'),
(288, '0011', '2024-05-31 04:27:53', '2024-05-31 04:36:24', '', '1'),
(289, '0002', '2024-05-31 04:36:19', '2024-05-31 11:47:08', '', '1'),
(290, '0001', '2024-05-31 11:47:14', '2024-06-03 17:00:02', '', '1'),
(291, '0002', '2024-06-03 17:00:08', '2024-06-03 18:22:43', '', '1'),
(292, '0003', '2024-06-03 17:00:28', '2024-06-10 10:55:55', '', '1'),
(293, '0001', '2024-06-03 18:21:12', '2024-06-10 09:54:35', '', '1'),
(294, '0002', '2024-06-03 19:27:19', '2024-06-10 10:00:25', '', '1'),
(295, '0001', '2024-06-10 10:14:23', '2024-06-10 10:56:09', '', '1'),
(296, '0002', '2024-06-10 10:15:08', '2024-06-10 10:38:32', '', '1'),
(297, '0002', '2024-06-10 10:49:41', '2024-06-10 10:55:21', '', '1'),
(298, '0004', '2024-06-10 10:57:00', '2024-06-11 22:22:34', '', '1'),
(299, '0003', '2024-06-10 11:06:54', '2024-06-10 11:16:48', '', '1'),
(300, 'V0001', '2024-06-10 11:08:13', '2024-06-10 11:25:45', '', '1'),
(301, 'V0002', '2024-06-10 11:16:10', '2024-06-10 11:25:24', '', '1'),
(302, 'V0003', '2024-06-10 11:18:18', '', '', '0'),
(303, 'V0001', '2024-06-10 11:20:51', '2024-06-10 11:25:45', '', '1'),
(304, '0002', '2024-06-10 11:21:14', '2024-06-10 12:00:58', '', '1'),
(305, 'V0001', '2024-06-10 11:21:31', '2024-06-10 11:25:45', '', '1'),
(306, 'V0007', '2024-06-10 11:25:33', '2024-06-10 15:00:56', '', '1'),
(307, 'V0008', '2024-06-10 11:27:40', '', '', '0'),
(308, 'V0023', '2024-06-10 11:33:00', '2024-06-12 16:40:50', '', '1'),
(309, 'V0077', '2024-06-10 11:53:05', '2024-06-10 12:00:03', '', '1'),
(310, '0001', '2024-06-10 12:01:02', '2024-06-10 12:37:01', '', '1'),
(311, 'V0078', '2024-06-10 12:04:47', '2024-06-10 12:30:54', '', '1'),
(312, 'V0077', '2024-06-10 12:19:29', '2024-06-10 12:34:40', '', '1'),
(313, 'V0078', '2024-06-10 12:36:10', '2024-06-10 13:19:26', '', '1'),
(314, 'V0077', '2024-06-10 12:39:43', '2024-06-10 13:17:44', '', '1'),
(315, 'V0079', '2024-06-10 12:48:42', '2024-06-10 13:23:46', '', '1'),
(316, '0001', '2024-06-10 13:17:50', '2024-06-10 13:35:28', '', '1'),
(317, 'V0012', '2024-06-10 13:24:05', '2024-06-10 13:32:38', '', '1'),
(318, 'V0080', '2024-06-10 13:27:07', '2024-06-10 13:32:48', '', '1'),
(319, '0003', '2024-06-10 13:32:55', '2024-06-11 16:37:05', '', '1'),
(320, 'V0079', '2024-06-10 13:34:29', '', '', '0'),
(321, 'V0001', '2024-06-10 13:35:22', '', '', '0'),
(322, 'V0079', '2024-06-10 13:35:46', '', '', '0'),
(323, 'V0077', '2024-06-10 13:36:49', '2024-06-10 13:50:49', '', '1'),
(324, 'V0078', '2024-06-10 13:46:45', '2024-06-10 14:01:15', '', '1'),
(325, '0002', '2024-06-10 13:49:38', '2024-06-11 16:17:50', '', '1'),
(326, 'V0077', '2024-06-10 13:58:59', '2024-06-11 21:10:17', '', '1'),
(327, 'V0080', '2024-06-10 14:02:39', '2024-06-10 15:00:26', '', '1'),
(328, 'V0082', '2024-06-10 14:16:09', '2024-06-11 21:20:27', '', '1'),
(329, 'V0078', '2024-06-10 15:01:14', '2024-06-12 13:00:39', '', '1'),
(330, '0002', '2024-06-11 16:29:50', '2024-06-11 16:38:10', '', '1'),
(331, '0003', '2024-06-11 21:12:30', '2024-06-11 21:18:04', '', '1'),
(332, '0002', '2024-06-11 21:17:11', '2024-06-11 22:18:18', '', '1'),
(333, 'V0077', '2024-06-11 21:20:03', '2024-06-11 22:19:16', '', '1'),
(334, '0003', '2024-06-11 22:18:30', '2024-06-11 22:33:25', '', '1'),
(335, 'V0082', '2024-06-11 22:19:28', '2024-06-11 22:57:40', '', '1'),
(336, '0001', '2024-06-11 22:21:48', '2024-06-11 23:02:42', '', '1'),
(337, 'V0080', '2024-06-11 22:32:51', '2024-06-11 22:57:10', '', '1'),
(338, '0002', '2024-06-11 22:33:16', '2024-06-11 22:55:28', '', '1'),
(339, 'V0077', '2024-06-11 22:34:16', '2024-06-11 22:55:54', '', '1'),
(340, '0003', '2024-06-11 22:56:11', '2024-06-11 23:26:06', '', '1'),
(341, 'V0081', '2024-06-11 22:58:36', '2024-06-11 23:27:10', '', '1'),
(342, '0004', '2024-06-11 23:02:22', '2024-06-11 23:25:38', '', '1'),
(343, 'V0077', '2024-06-11 23:02:59', '2024-06-11 23:24:37', '', '1'),
(344, 'V0007', '2024-06-11 23:03:28', '2024-06-12 00:17:38', '', '1'),
(345, '0002', '2024-06-11 23:25:49', '2024-06-12 00:11:39', '', '1'),
(346, '0001', '2024-06-11 23:28:52', '2024-06-12 00:17:11', '', '1'),
(347, 'V0081', '2024-06-12 00:10:11', '2024-06-12 00:39:23', '', '1'),
(348, 'V0077', '2024-06-12 00:16:23', '2024-06-12 00:40:43', '', '1'),
(349, '0003', '2024-06-12 00:17:03', '2024-06-12 00:31:26', '', '1'),
(350, '0005', '2024-06-12 00:33:37', '2024-06-12 10:37:45', '', '1'),
(351, 'V0007', '2024-06-12 00:34:28', '2024-06-12 10:38:04', '', '1'),
(352, '0001', '2024-06-12 00:38:06', '2024-06-12 10:38:20', '', '1'),
(353, 'V0077', '2024-06-12 10:36:27', '2024-06-12 12:33:37', '', '1'),
(354, '0002', '2024-06-12 10:37:29', '2024-06-12 12:33:25', '', '1'),
(355, '0003', '2024-06-12 10:37:36', '2024-06-12 12:18:53', '', '1'),
(356, '0003', '2024-06-12 12:35:01', '2024-06-12 12:45:57', '', '1'),
(357, '0001', '2024-06-12 12:35:09', '2024-06-12 12:46:18', '', '1'),
(358, '0006', '2024-06-12 12:38:12', '2024-06-12 12:56:02', '', '1'),
(359, '0002', '2024-06-12 12:41:27', '2024-06-12 13:11:02', '', '1'),
(360, '0001', '2024-06-12 12:55:47', '2024-06-12 16:17:04', '', '1'),
(361, 'V0077', '2024-06-12 13:00:13', '2024-06-12 13:10:30', '', '1'),
(362, '0003', '2024-06-12 13:01:05', '2024-06-12 16:18:21', '', '1'),
(363, '0004', '2024-06-12 13:01:19', '', '', '0'),
(364, 'V0080', '2024-06-12 13:10:52', '2024-06-12 16:16:06', '', '1'),
(365, '0002', '2024-06-12 16:15:57', '2024-06-12 16:29:55', '', '1'),
(366, '0006', '2024-06-12 16:18:55', '2024-06-12 16:50:09', '', '1'),
(367, '0001', '2024-06-12 16:28:52', '2024-06-12 16:39:15', '', '1'),
(368, 'V0077', '2024-06-12 16:38:29', '', '', '0'),
(369, 'V0080', '2024-06-12 16:38:55', '2024-06-12 16:49:36', '', '1'),
(370, '0002', '2024-06-12 16:39:06', '2024-06-12 16:50:00', '', '1'),
(371, 'V0082', '2024-06-12 16:40:00', '2024-06-12 17:47:11', '', '1'),
(372, '0003', '2024-06-12 16:49:26', '2024-06-12 17:47:01', '', '1'),
(373, 'V0080', '2024-06-12 17:47:22', '', '', '0'),
(374, '0001', '2024-06-12 17:55:07', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `V_USERID` varchar(20) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `visitReason` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `cellphoneNumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `vModel` varchar(50) NOT NULL,
  `vType` varchar(50) NOT NULL,
  `vColor` varchar(50) NOT NULL,
  `vPlateNumber` varchar(20) NOT NULL,
  `avatarImage` varchar(255) NOT NULL,
  `driversLicenseImage` varchar(255) NOT NULL,
  `vehicleImage` varchar(255) NOT NULL,
  `dateRegistered` datetime DEFAULT NULL,
  `visitDate` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `V_USERID`, `userType`, `sponsor`, `visitReason`, `name`, `email`, `gender`, `birthdate`, `cellphoneNumber`, `address`, `vModel`, `vType`, `vColor`, `vPlateNumber`, `avatarImage`, `driversLicenseImage`, `vehicleImage`, `dateRegistered`, `visitDate`, `status`) VALUES
(14, 'V0001', 'VISITOR', 'Sponsor1', 'Reason1', 'John Doe', 'bagarrap@gmail.com', 'Male', '1990-01-01', '1234567890', '123 Elm Street', 'Model1', 'Type1', 'Red', 'ABC123', 'avatar1.png', 'license1.png', 'vehicle1.png', '2023-01-01 00:00:00', '2023-06-01', 'APPROVED'),
(15, 'V0002', 'VISITOR', 'Sponsor2', 'Reason2', 'Jane Smith', 'bagarrap@gmail.com', 'Female', '1985-02-02', '0987654321', '456 Oak Avenue', 'Model2', 'Type2', 'Blue', 'DEF456', 'avatar2.png', 'license2.png', 'vehicle2.png', '2023-01-02 00:00:00', '2023-06-02', 'APPROVED'),
(16, 'V0003', 'VISITOR', 'Sponsor3', 'Reason3', 'Alice Johnson', 'bagarrap@gmail.com', 'Female', '1975-03-03', '1122334455', '789 Pine Road', 'Model3', 'Type3', 'Green', 'GHI789', 'avatar3.png', 'license3.png', 'vehicle3.png', '2023-01-03 00:00:00', '2023-06-03', 'APPROVED'),
(17, 'V0004', 'VISITOR', 'Sponsor4', 'Reason4', 'Bob Brown', 'bagarrap@gmail.com', 'Male', '1980-04-04', '6677889900', '321 Maple Lane', 'Model4', 'Type4', 'Yellow', 'JKL012', 'avatar4.png', 'license4.png', 'vehicle4.png', '2023-01-04 00:00:00', '2023-06-04', 'APPROVED'),
(18, 'V0005', 'VISITOR', 'Sponsor5', 'Reason5', 'Charlie Davis', 'bagarrap@gmail.com', 'Male', '1995-05-05', '4455667788', '654 Birch Boulevard', 'Model5', 'Type5', 'Black', 'MNO345', 'avatar5.png', 'license5.png', 'vehicle5.png', '2023-01-05 00:00:00', '2023-06-05', 'APPROVED'),
(19, 'V0006', 'VISITOR', 'Sponsor6', 'Reason6', 'Emily Clark', 'bagarrap@gmail.com', 'Female', '1988-06-06', '9876543210', '987 Cedar Drive', 'Model6', 'Type6', 'White', 'PQR678', 'avatar6.png', 'license6.png', 'vehicle6.png', '2023-01-06 00:00:00', '2023-06-06', 'APPROVED'),
(20, 'V0007', 'VISITOR', 'Sponsor7', 'Reason7', 'Frank Harris', 'bagarrap@gmail.com', 'Male', '1972-07-07', '1928374650', '654 Spruce Lane', 'Model7', 'Type7', 'Silver', 'STU901', 'avatar7.png', 'license7.png', 'vehicle7.png', '2023-01-07 00:00:00', '2023-06-07', 'APPROVED'),
(21, 'V0008', 'VISITOR', 'Sponsor8', 'Reason8', 'Grace Lewis', 'bagarrap@gmail.com', 'Female', '1991-08-08', '0987612345', '321 Palm Street', 'Model8', 'Type8', 'Gold', 'VWX234', 'avatar8.png', 'license8.png', 'vehicle8.png', '2023-01-08 00:00:00', '2023-06-08', 'APPROVED'),
(22, 'V0023', 'VISITOR', 'Sponsor23', 'Reason23', 'Vince White', 'bagarrap@gmail.com', 'Male', '1989-11-23', '5761928340', '321 Maple Street', 'Model23', 'Type23', 'Red', 'OPQ789', 'avatar23.png', 'license23.png', 'vehicle23.png', '2023-01-23 00:00:00', '2023-06-23', 'APPROVED'),
(23, 'V0077', 'VISITOR', '1LT JUAN A. DELACRUZ PAF', 'Visit my Brother', 'JAMES DELA CRUZ', 'bagarrap@gmail.com', 'MALE', '2024-05-29', '+639999999999', 'SAN JUAN, METRO MANILA', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VJAMES_DELA_CRUZ.png', 'VJAMES_DELA_CRUZ.jpg', 'VJAMES_DELA_CRUZ.jpg', '2024-06-10 11:40:07', '2024-06-20', 'APPROVED'),
(24, 'V0009', 'VISITOR', 'Sponsor9', 'Reason9', 'Hank Green', 'bagarrap@gmail.com', 'Male', '1978-09-09', '6574839201', '987 Fir Avenue', 'Model9', 'Type9', 'Blue', 'YZA567', 'avatar9.png', 'license9.png', 'vehicle9.png', '2023-01-09 00:00:00', '2023-06-09', 'APPROVED'),
(25, 'V0078', 'VISITOR', 'SPONSOR', 'Visit my uncle', 'FULLNAME', 'bagarrap@gmail.com', 'FEMALE', '2024-05-28', '+639999999999', 'TEST', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VFULLNAME.png', 'VFULLNAME.jpg', 'VFULLNAME.jpg', '2024-06-10 12:04:04', '2024-06-13', 'APPROVED'),
(26, 'V0079', 'VISITOR', '1LT JUAN A. DELACRUZ PAF', 'Visit my brother', 'JAMES DELA CRUZ', 'bagarrap@gmail.com', 'MALE', '2024-05-29', '+639999999999', 'SAN JUAN, METRO MANILA', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VJAMES_DELA_CRUZ.png', 'VJAMES_DELA_CRUZ.jpg', 'VJAMES_DELA_CRUZ.jpg', '2024-06-10 12:45:23', '2024-05-31', 'APPROVED'),
(27, 'V0012', 'VISITOR', 'Sponsor12', 'Reason12', 'Karen Blue', 'bagarrap@gmail.com', 'Female', '1987-12-12', '2938475610', '987 Chestnut Lane', 'Model12', 'Type12', 'White', 'HIJ456', 'avatar12.png', 'license12.png', 'vehicle12.png', '2023-01-12 00:00:00', '2023-06-12', 'APPROVED'),
(28, 'V0080', 'VISITOR', '1LT JUAN A. DELACRUZ PAF', 'Visit my brother', 'JAMES DELA CRUZ', 'bagarrap@gmail.com', 'MALE', '2024-05-29', '+639999999999', 'ADDRESS', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VJAMES_DELA_CRUZ.png', 'VJAMES_DELA_CRUZ.jpg', 'VJAMES_DELA_CRUZ.jpg', '2024-06-10 13:26:01', '2024-06-20', 'APPROVED'),
(29, 'V0081', 'VISITOR', '1LT JUAN A. DELACRUZ PAF', 'Visit my brother', 'JAMES CRUZ', 'og6@psg.mil.ph', 'MALE', '2024-06-05', '+639999999999', 'ADDRESS', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VJAMES_CRUZ.png', 'VJAMES_CRUZ.jpg', 'VJAMES_CRUZ.jpg', '2024-06-10 14:10:09', '2024-06-20', 'APPROVED'),
(30, 'V0082', 'VISITOR', '1LT JUAN A. DELACRUZ PAF', 'Visit my brother', 'JOMAR HITITUA', 'enriqueguimba@gmail.com', 'MALE', '2024-05-29', '+639999999999', 'ADDRESS', 'TOYOTA', 'VIOS', 'RED', 'XYZ 1234', 'VJOMAR_HITITUA.png', 'VJOMAR_HITITUA.jpg', 'VJOMAR_HITITUA.jpg', '2024-06-10 14:13:28', '2024-06-20', 'APPROVED');

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
(82, '0002', 'OP', '2LT', 'PAF', 'JOHN A. DOEertrt', '+639123456789', '1980-01-01', 'ADDRESSdfdsf', 'OFFICE', 'Male', 'Toyota Vios', 'Sedan', 'Black', 'XYZ 123', '2024-04-01 22:03:38', 'DOE_JOHN.jpg', ''),
(121, '0003', '', '', '', 'test', '+639999999997', '2024-05-02', 'test', '', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 09:15:54', '0003 - test.png', '0003 - test.jpg'),
(122, '0004', '', '', '', 'test', '+639999999997', '2024-05-09', 'test', '', 'Female', 'test', 'test', 'test', 'test', '2024-05-31 09:26:41', '0004 - test.png', '0004 - test.jpg'),
(123, '0005', '', '', '', '', '', '0000-00-00', 'dfg', '', 'Male', '', '', '', '', '2024-06-03 16:22:08', '', ''),
(124, '0006', 'RESIDENT', 'werwe', 'werwe', 'werwer', '+639999999997', '2024-06-11', 'werwer', 'ewrwer', 'Female', 'werew', 'rwerwer', 'werwer', 'rwer', '2024-06-03 19:28:12', '0006 - werwer.png', '0006 - werwer.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archived_user`
--
ALTER TABLE `archived_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RollNo` (`RollNo`) USING BTREE;

--
-- Indexes for table `archived_visitor`
--
ALTER TABLE `archived_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archived_v_user`
--
ALTER TABLE `archived_v_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `V_USERID` (`V_USERID`);

--
-- Indexes for table `temp_visitor`
--
ALTER TABLE `temp_visitor`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `archived_visitor`
--
ALTER TABLE `archived_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `archived_v_user`
--
ALTER TABLE `archived_v_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `temp_visitor`
--
ALTER TABLE `temp_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `vehicle_log`
--
ALTER TABLE `vehicle_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `v_user`
--
ALTER TABLE `v_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
