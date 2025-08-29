-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:3306
-- Generation Time: Feb 24, 2025 at 01:44 PM
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
-- Database: `4th_sem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `passcode` varchar(10) NOT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `status`, `passcode`, `campus_id`, `faculty_id`, `course_id`, `level_id`, `user_id`) VALUES
(62, 'pending', '', 2, NULL, NULL, NULL, 48),
(64, 'pending', '', 2, NULL, NULL, NULL, 49),
(65, 'pending', '', 5, 3, 25, 19, 50),
(66, 'Pending', '', NULL, NULL, NULL, 14, 49),
(67, 'pending', '', 8, NULL, NULL, NULL, 51),
(70, 'pending', '', 15, 4, 20, 20, 53),
(71, 'Pending', '', NULL, NULL, NULL, 20, 53),
(72, 'pending', '', 2, 1, 2, 2, 54),
(73, 'Pending', '', NULL, NULL, NULL, 7, 54),
(74, 'pending', '', 10, 1, 2, 1, 55),
(76, 'Pending', '', 10, 1, 2, 14, 55),
(77, 'pending', '', 12, NULL, NULL, NULL, 56),
(78, 'Pending', '', 12, 1, 2, 6, 56),
(79, 'Pending', '', 12, 1, 2, 6, 56),
(85, 'pending', '', 4, 2, 5, 19, 58),
(87, 'pending', '', 3, 3, 25, 19, 62),
(88, 'pending', '', 2, 2, 3, 1, 64),
(89, 'pending', '', 2, 1, 8, 2, 65),
(90, 'pending', '', 2, NULL, NULL, NULL, 66),
(94, 'pending', '12345678', 2, 1, 2, 4, 68),
(95, 'pending', '12345678', 4, 2, 5, 20, 69),
(96, 'Pending', '', 2, 1, 2, 18, 68),
(99, 'pending', '67891234', 2, 7, NULL, 1, 70),
(100, 'Pending', '', 16, 2, 5, 20, 70),
(101, 'Pending', '', 16, 2, 5, 14, 70),
(102, 'Pending', '', 16, 2, 5, 19, 70),
(103, 'Pending', '', 16, NULL, NULL, NULL, 70),
(104, 'Pending', '', 16, 2, 5, 19, 70),
(105, 'Pending', '', 16, 2, 5, 14, 70),
(106, 'Pending', '', 16, 2, 5, 7, 70),
(107, 'Pending', '', 16, 2, 5, 7, 70),
(108, 'Pending', '', 16, 2, 5, 7, 70),
(109, 'Pending', '', 16, 2, 5, 7, 70),
(110, 'Pending', '', 16, 2, 5, 7, 70),
(111, 'approved', '98765432', 2, 2, 3, 17, 71),
(112, 'approved', '', 12, 2, 3, 18, 71),
(113, 'approved', '', 12, 2, 3, 17, 71),
(114, 'approved', '', 12, 2, 3, 15, 71),
(115, 'approved', '', 12, 2, 3, 17, 71),
(116, 'Pending', '', 16, 2, 5, 4, 70),
(117, 'approved', '', 12, 2, 3, 17, 71),
(118, 'approved', '', 12, 2, 3, 17, 71),
(119, 'approved', '', 12, 2, 3, 15, 71),
(120, 'pending', '12345123', 11, 4, 20, 16, 72),
(124, 'pending', '', 17, 2, 4, 19, 73),
(125, 'pending', '12345678', 12, 2, 3, 17, 74),
(126, 'Pending', '', 12, 2, 3, 16, 74),
(127, 'approved', '12345678', 4, 1, 6, 19, 75),
(128, 'approved', '', 4, 1, 6, 17, 75),
(129, 'approved', '', 4, 1, 6, 17, 75),
(130, 'approved', '', 4, 1, 6, 17, 75),
(131, 'approved', '', 4, 1, 6, 13, 75),
(132, 'pending', '123456712', 12, 7, 16, 2, 76),
(133, 'approved', '', 4, 1, 6, 22, 75),
(134, 'approved', '', 4, 1, 6, 22, 75),
(135, 'approved', '', 4, 1, 6, 19, 75),
(136, 'approved', '', 4, 1, 6, 21, 75),
(137, 'approved', '', 4, 1, 6, 19, 75),
(138, 'approved', '', 4, 1, 6, 17, 75),
(139, 'approved', '', 4, 1, 6, 14, 75),
(140, 'approved', '', 4, 1, 6, 19, 75),
(141, 'approved', '', 4, 1, 6, 19, 75),
(142, 'approved', '', 4, 1, 6, 19, 75),
(143, 'approved', '', 4, 1, 6, 16, 75),
(144, 'approved', '', 4, 1, 6, 19, 75),
(145, 'approved', '', 4, 1, 6, 19, 75),
(146, 'approved', '', 4, 1, 6, 19, 75),
(147, 'approved', '', 4, 1, 6, 13, 75),
(148, 'approved', '', 4, 1, 6, 18, 75),
(150, 'approved', '12345678', 7, 1, 2, 2, 77),
(151, 'approved', '', 7, 1, 2, 7, 77),
(152, 'approved', '', 7, 1, 2, 22, 77),
(153, 'approved', '', 7, 1, 2, 21, 77),
(154, 'pending', '23456891', 6, 1, 2, 1, 78),
(155, 'Pending', '', 6, 1, 2, 14, 78),
(156, 'Pending', '', 6, 1, 2, 18, 78),
(157, 'Pending', '', 6, 1, 2, 22, 78),
(158, 'approved', '12345678', 3, 3, 25, 20, 79),
(159, 'approved', '', 3, 3, 25, 21, 79),
(160, 'pending', '12345678', 10, 2, 4, 21, 80),
(161, 'Pending', '', 10, 2, 4, 19, 80),
(162, 'pending', '12345678', 12, 2, 3, 14, 81),
(163, 'pending', '12345678', 14, 2, 5, 21, 82),
(164, 'Pending', '', 10, 2, 4, 14, 80),
(173, 'approved', '', 2, 2, 3, 15, 66),
(174, 'approved', '56782345', 2, 2, 3, 1, 86),
(176, 'Pending', '', 3, 1, 6, 20, 66),
(177, 'pending', '56783456', 4, 2, 5, 19, 88);

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int(11) NOT NULL,
  `campus_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`) VALUES
(11, 'Amrit Science Campus'),
(14, 'Baneshwor Multiple Campus'),
(16, 'Bhaktapur Campus'),
(26, 'Butwal Multiple Campus'),
(6, 'Dharan Campus'),
(20, 'Janamaitri Multiple Campus'),
(4, 'Kanakai Multiple Campus'),
(5, 'Mahendra Bindeshwari Campus'),
(22, 'Mahendra Buddhikharma Campus'),
(7, 'Mahendra Morang Adarsha Campus'),
(27, 'Mahendra Multiple Campus'),
(3, 'Mahendra Ratna Campus'),
(21, 'Makwanpur Multiple Campus'),
(2, 'Mechi Multiple Campus'),
(15, 'Nepal Law Campus'),
(9, 'Padma Kanya Multiple Campus'),
(25, 'Padmodaya Campus'),
(17, 'Patan Multiple Campus'),
(23, 'Prithivi Narayan Campus'),
(12, 'Public Youth Campus'),
(18, 'Pulchowk Campus'),
(10, 'Ratna Rajya Campus'),
(13, 'Saraswati Multiple Campus'),
(8, 'Shankhar Dev Campus'),
(24, 'Tansen Multiple Campus'),
(19, 'thapathali');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `certificate_name` varchar(100) DEFAULT NULL,
  `certificate_type` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `certificate_name`, `certificate_type`, `user_id`) VALUES
(161, 'DFD2.drawio (2).png', 'resultCertificate', 48),
(162, 'methodology.drawio.png', 'provisionalCertificate', 48),
(163, 'dfd2.jpg', 'migrationCertificate', 48),
(164, 'dfd2.drawio.png', 'characterCertificate', 48),
(165, 'DFD2.drawio (2).png', 'resultCertificate', 49),
(166, 'DFD2.drawio (2).png', 'provisionalCertificate', 49),
(167, 'DB design.drawio.png', 'migrationCertificate', 49),
(168, 'Blue and Yellow Modern Monthly Task Gantt Graph.png', 'characterCertificate', 49),
(169, 'DFD2.drawio (2).png', 'resultCertificate', 50),
(170, 'DFD2.drawio (2).png', 'provisionalCertificate', 50),
(171, 'DB design.drawio.png', 'migrationCertificate', 50),
(172, 'Blue and Yellow Modern Monthly Task Gantt Graph.png', 'characterCertificate', 50),
(173, 'EntityR.drawio.png', 'resultCertificate', 51),
(174, 'DFD2.drawio (2).png', 'provisionalCertificate', 51),
(175, 'interface.drawio[1].png', 'migrationCertificate', 51),
(176, 'interface.drawio[1].png', 'characterCertificate', 51),
(181, 'EntityR.drawio.png', 'resultCertificate', 53),
(182, 'interface.drawio[1].png', 'provisionalCertificate', 53),
(183, 'EntityR.drawio.png', 'migrationCertificate', 53),
(184, 'DFD2.drawio (2).png', 'characterCertificate', 53),
(185, 'EntityR.drawio.png', 'resultCertificate', 54),
(186, 'EntityR.drawio.png', 'provisionalCertificate', 54),
(187, 'Untitled Diagram.drawio (1).png', 'migrationCertificate', 54),
(188, 'DB design.drawio.png', 'characterCertificate', 54),
(189, 'interface.drawio[1].png', 'resultCertificate', 55),
(190, 'interface.drawio[1].png', 'provisionalCertificate', 55),
(191, 'interface.drawio[1].png', 'migrationCertificate', 55),
(192, 'finaler.drawio.png', 'characterCertificate', 55),
(193, 'interface.drawio[1].png', 'resultCertificate', 56),
(194, 'interface.drawio[1].png', 'provisionalCertificate', 56),
(195, 'DFD2.drawio (2).png', 'migrationCertificate', 56),
(196, 'methodology.drawio.png', 'characterCertificate', 56),
(201, 'methodology.drawio.png', 'resultCertificate', 58),
(202, 'EntityR.drawio.png', 'provisionalCertificate', 58),
(203, 'interface.drawio[1].png', 'migrationCertificate', 58),
(204, 'interface.drawio[1].png', 'characterCertificate', 58),
(205, 'finaler.drawio.png', 'resultCertificate', 62),
(206, 'interface.drawio[1].png', 'provisionalCertificate', 62),
(207, 'err.jpg', 'migrationCertificate', 62),
(208, 'Student Registration System Data Flow (1).png', 'characterCertificate', 62),
(209, 'finaler.drawio.png', 'resultCertificate', 64),
(210, 'interface.drawio[1].png', 'provisionalCertificate', 64),
(211, 'err.jpg', 'migrationCertificate', 64),
(212, 'Student Registration System Data Flow (1).png', 'characterCertificate', 64),
(213, 'EntityR.drawio.png', 'resultCertificate', 65),
(214, 'dfd2.jpg', 'provisionalCertificate', 65),
(215, 'dfd2.drawio.png', 'migrationCertificate', 65),
(216, 'Blue and Yellow Modern Monthly Task Gantt Graph.png', 'characterCertificate', 65),
(217, 'interface.drawio[1].png', 'resultCertificate', 66),
(218, 'err.jpg', 'provisionalCertificate', 66),
(219, 'Blue and Yellow Modern Monthly Task Gantt Graph.png', 'migrationCertificate', 66),
(220, 'dfd2.drawio.png', 'characterCertificate', 66),
(221, '1st term 3.png', 'resultCertificate', 68),
(222, '1st term 3.png', 'provisionalCertificate', 68),
(223, '1st term database.png', 'migrationCertificate', 68),
(224, '1st term2.png', 'characterCertificate', 68),
(225, '1st term 3.png', 'resultCertificate', 69),
(226, '1st term 3.png', 'provisionalCertificate', 69),
(227, '1st term database.png', 'migrationCertificate', 69),
(228, '1st term2.png', 'characterCertificate', 69),
(229, '1st term 3.png', 'resultCertificate', 70),
(230, '1st term1.png', 'provisionalCertificate', 70),
(231, '1st term 3.png', 'migrationCertificate', 70),
(232, '1st term2.png', 'characterCertificate', 70),
(233, '1st term database.png', 'resultCertificate', 71),
(234, '1st term 3.png', 'provisionalCertificate', 71),
(235, '1st term database.png', 'migrationCertificate', 71),
(236, '1st term1.png', 'characterCertificate', 71),
(237, '1st term 3.png', 'resultCertificate', 72),
(238, '1st term database.png', 'provisionalCertificate', 72),
(239, '1st term2.png', 'migrationCertificate', 72),
(240, '3.png', 'characterCertificate', 72),
(241, '1st term 3.png', 'resultCertificate', 73),
(242, '1st term database.png', 'provisionalCertificate', 73),
(243, '1st term2.png', 'migrationCertificate', 73),
(244, '1st term database.png', 'characterCertificate', 73),
(245, '1st term 3.png', 'resultCertificate', 74),
(246, '1st term1.png', 'provisionalCertificate', 74),
(247, '4.png', 'migrationCertificate', 74),
(248, 'ass.png', 'characterCertificate', 74),
(249, 'WhatsApp Image 2025-02-08 at 15.27.51.jpeg', 'resultCertificate', 75),
(250, 'WhatsApp Image 2025-02-08 at 15.27.51.jpeg', 'provisionalCertificate', 75),
(251, 'WhatsApp Image 2025-02-08 at 15.27.50 (1).jpeg', 'migrationCertificate', 75),
(252, 'WhatsApp Image 2025-02-08 at 15.27.50.jpeg', 'characterCertificate', 75),
(253, '1st term 3.png', 'resultCertificate', 76),
(254, '1st term database.png', 'provisionalCertificate', 76),
(255, '1st term1.png', 'migrationCertificate', 76),
(256, '7 .png', 'characterCertificate', 76),
(257, '1st term1.png', 'resultCertificate', 77),
(258, '1st term 3.png', 'provisionalCertificate', 77),
(259, '1st term1.png', 'migrationCertificate', 77),
(260, '6794acf843db20.35575914.png', 'characterCertificate', 77),
(261, '1st term1.png', 'resultCertificate', 78),
(262, '6794acf843a627.24005114.png', 'provisionalCertificate', 78),
(263, '6794acf843db20.35575914.png', 'migrationCertificate', 78),
(264, '1st term1.png', 'characterCertificate', 78),
(265, '1st term1.png', 'resultCertificate', 79),
(266, '1st term 3.png', 'provisionalCertificate', 79),
(267, '1st term1.png', 'migrationCertificate', 79),
(268, '6794acf843db20.35575914.png', 'characterCertificate', 79),
(269, '1st term1.png', 'resultCertificate', 80),
(270, '6794acf843a627.24005114.png', 'provisionalCertificate', 80),
(271, '6794acf843db20.35575914.png', 'migrationCertificate', 80),
(272, '7 .png', 'characterCertificate', 80),
(273, '6794acf843a627.24005114.png', 'resultCertificate', 81),
(274, '6794acf843db20.35575914.png', 'provisionalCertificate', 81),
(275, '1st term1.png', 'migrationCertificate', 81),
(276, '1st term 3.png', 'characterCertificate', 81),
(277, '6794acf843a627.24005114.png', 'resultCertificate', 82),
(278, '6794acf843db20.35575914.png', 'provisionalCertificate', 82),
(279, '1st term1.png', 'migrationCertificate', 82),
(280, '1st term 3.png', 'characterCertificate', 82),
(293, 'IMG_20250115_151128_205.jpg', 'resultCertificate', 86),
(294, 'CamScanner 05-10-2023 15.15.jpg', 'provisionalCertificate', 86),
(295, 'CamScanner 05-10-2023 15.17.jpg', 'migrationCertificate', 86),
(296, 'Gemini_Generated_Image_d2ruthd2ruthd2ru.jpeg', 'characterCertificate', 86),
(301, 'CamScanner 05-10-2023 15.14.jpg', 'resultCertificate', 88),
(302, 'CamScanner 05-10-2023 15.15.jpg', 'provisionalCertificate', 88),
(303, 'CamScanner 05-10-2023 15.17.jpg', 'migrationCertificate', 88),
(304, 'CamScanner 05-10-2023 15.18.jpg', 'characterCertificate', 88);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(13, 'B.Sc. in Computer Science and IT(B.Sc. CSIT)'),
(20, 'Bachelor of Arts in Laws(BALLB)'),
(4, 'Bachelor of Arts in Social Work(BASW)'),
(5, 'Bachelor of Arts(BA)'),
(2, 'Bachelor of Business Administration(BBA)'),
(9, 'Bachelor of Business Management(BBM)'),
(6, 'Bachelor of Business Studies(BBS)'),
(16, 'Bachelor of Civil Engineering(CE)'),
(3, 'Bachelor of Computer Applications(BCA)'),
(18, 'Bachelor of Computer Engineering(Co.E)'),
(25, 'Bachelor of Education(BEd)'),
(10, 'Bachelor of Hotel Management(BHM)'),
(14, 'Bachelor of Information and Technology(BIT)'),
(8, 'Bachelor of Information Management(BIM)'),
(19, 'Bachelor of Laws(LLB)'),
(17, 'Bachelor of Mechanical Engineering(ME)'),
(22, 'Bachelor of Medical Laboratory Technology(BMLT)'),
(24, 'Bachelor of Medicine Bachelor of Surgery(MBBS)'),
(23, 'Bachelor of Pharmacy(B.Pharm)'),
(21, 'Bachelor of Public Health(BPH)'),
(12, 'Bachelor of Science(B.Sc)'),
(11, 'Bachelor of Travel and Tourism(BT)');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
(1, 'Faculty of Management'),
(2, 'Faculty of Humanities and Social Sciences'),
(3, 'Faculty of Education'),
(4, 'Faculty of Law'),
(5, 'Faculty of Engineering'),
(6, 'Faculty of Medicine'),
(7, 'Faculty of Science and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardian_id` int(11) NOT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_phone` varchar(15) DEFAULT NULL,
  `guardian_occupation` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardian_id`, `guardian_name`, `guardian_phone`, `guardian_occupation`, `user_id`) VALUES
(6, 'rammmmmmmmmmmmmmm', '8946485990', 'police', NULL),
(7, 'rammmmmmmmmmmmmmm', '8946485961', 'teacher', NULL),
(8, 'rammmmmmmmmmmmmmm', '8946485924', 'shopkeeper', NULL),
(9, 'rammmmmmmmmmmmmmm', '8946485934', 'shopkeeper', NULL),
(13, 'rammmmmmmmmmmmmmm', '8946485934', 'teacher', NULL),
(14, 'shyam', '8946485934', 'shopkeeper', NULL),
(15, 'shyam', '8946485934', 'shopkeeper', NULL),
(26, 'shyam', '8946485934', 'shopkeeper', NULL),
(35, 'shyam', '8946485934', 'shopkeeper', NULL),
(36, 'shyam', '8946485934', 'shopkeeper', NULL),
(37, 'rammmmmmmmmmmmmmm', '8946485934', 'shopkeeper', NULL),
(65, 'Krishna Bhandari', '9908567856', 'Teacher', 48),
(66, '', '', '', 49),
(67, '', '', '', 50),
(68, 'Krishna Bhandari', '9842663940', 'Teacher', 51),
(70, '', '', '', 53),
(71, '', '', '', 54),
(72, '', '', '', 55),
(980000, 'rammmmmmmmmmmmmmm', '8946485990', 'police', NULL),
(980001, 'Krishna Bhandari', '9908567856', 'Teacher', 56),
(980003, 'Krishna Bhandari', '9908567856', 'Teacher', 58),
(980004, 'Krishna Bhandari', '9842663940', 'Teacher', 62),
(980005, 'Krishna Bhandari', '9842663940', 'Teacher', 64),
(980006, 'Krishna Bhandari', '9908567856', 'Teacher', 65),
(980007, 'Krishna Bhandari', '9842663940', 'Teacher', 66),
(980008, 'hari', '9800000023', 'doctor', 68),
(980009, 'hari', '9800000023', 'doctor', 69),
(980010, 'hari', '9800000023', 'doctor', 70),
(980011, 'hari', '9800000023', 'doctor', 71),
(980012, 'hari', '9800000023', 'doctor', 72),
(980013, 'hari', '9800000023', 'doctor', 73),
(980014, 'shyam', '9806765434', 'teacher', 74),
(980015, 'hari', '9800000023', 'doctor', 75),
(980016, 'hari', '9800000023', 'doctor', 76),
(980017, 'hari', '9800000023', 'doctor', 77),
(980018, 'hari', '9800000023', 'doctor', 78),
(980019, 'hari', '9800000023', 'doctor', 79),
(980020, 'hari', '9800000023', 'doctor', 80),
(980021, 'hari', '9800000023', 'doctor', 81),
(980022, 'hari', '9800000023', 'doctor', 82),
(980026, 'Punya Bhandari', '9842663940', 'Teacher', 86),
(980028, 'Krishna Bhandari', '9842663940', 'Teacher', 88);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, '4th Semester'),
(2, '1st Semester'),
(4, '2nd Semester'),
(6, '4th Semester'),
(7, '2nd Semester'),
(11, '1st Semester'),
(12, '1st Semester'),
(13, '1st Semester'),
(14, '5th Semester'),
(15, '1st Semester'),
(16, '3rd Semester'),
(17, '6th Semester'),
(18, '8th Semester'),
(19, '1st Year'),
(20, '2nd Year'),
(21, '3rd Year'),
(22, '4th Year');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `role`, `username`) VALUES
(1, 'saugatghimire2060@gmail.com', 'saugatA12@', 'user', NULL),
(2, 'jacky@gmail.com', 'Jacky1@', 'user', NULL),
(3, 'saugatghimire2061@gmail.com', 'Saugat123@', 'user', NULL),
(4, 'saugatghimire2062@gmail.com', 'Saugat123@', 'user', NULL),
(5, 'adminsaugat@gmail.com', 'admin1', 'admin', NULL),
(8, 'shyam@gmail.com', 'Shyam123@', 'user', NULL),
(9, 'hari@gmail.com', 'Hari123@', 'user', NULL),
(10, 'saugatghimire206@gmail.com', 'Saugat@!1', 'user', NULL),
(11, 'sita@gmail.com', 'Sita123@', 'user', NULL),
(12, 'saugat@gmail.com', 'Saugat1!', 'user', NULL),
(13, 'kamala@gmail.com', 'Kamala1!', 'user', NULL),
(14, 'ddd@gmail.com', 'Dddd1!', 'user', NULL),
(15, 'krishnaacharya@gmail.com', 'Krishna1!', 'user', 'adminjhapa'),
(16, 'sujata@gmail.com', 'Sujata1!', 'user', 'adminjhapa'),
(17, 'harish@gmail.com', 'Harish123@', 'user', 'laxmi'),
(18, 'harisha@gmail.com', 'Aari123@', 'user', 'laxmi'),
(19, 'itsmesujansapkota@gmail.com', 'sUJANq1!', 'user', 'laxmi'),
(20, 'saugat22@gmail.com', 'Saugat22@', 'user', 'saugat'),
(21, 'laxmi67@gmail.com', 'Laxmi1@', 'user', 'laxmi'),
(25, 'rabin@gmail.com', 'Rabin123@', 'user', 'rabin'),
(26, 'sunita@gmail.com', 'SunitaQ1!', 'user', 'Sunita'),
(27, 'kashinath@gmail.com', 'Kashi1!', 'user', 'Admin'),
(28, 'laxmi456@gmail.com', 'Laxmi1!', 'user', 'laxmi'),
(29, 'mepawanbhandari@gmail.com', 'Pawan1!', 'user', 'pawan'),
(30, 'rishav@gmail.com', 'Rishav1!', 'user', 'Rishav'),
(31, 'hello12367@gmail.com', 'Hello1!', 'user', 'hello'),
(32, 'bhuwan@gmail.com', 'Bhuwan123@', 'user', 'saugat0422'),
(33, 'saugatghimire20@gmail.com', 'Saugat123@', 'user', 'saugat0422'),
(34, 'hari123@gmail.com', 'Hari123@', 'user', 'saugat0422'),
(36, 'ogag@gmail.com', 'Hello123@', 'user', NULL),
(37, 'qwerty@gmail.com', 'Hello123@', 'user', 'qwerty'),
(38, 'hello1234@gmail.com', 'Hello123@', 'user', 'saugat0422'),
(39, 'saugatcode@gmail.com', 'Saugat12@', 'user', 'saugat0422'),
(40, 'saugatcode1@gmail.com', 'Saugat12@', 'user', 'saugat0422'),
(41, 'ram1234@gmail.com', 'Ram123@', 'user', 'ramram1'),
(42, 'pawanvashishtha000@gmail.com', 'Pawan123@', 'user', 'pawan'),
(43, 'keshavkafle@gmail.com', 'Keshav1@', 'user', 'keshav'),
(44, 'suman@gmail.com', 'Suman1!', 'user', 'suman'),
(45, 'shreejan@gmail.com', 'Shrijan1!', 'user', 'shrijan'),
(46, 'jiban@gmail.com', 'Jiban1!', 'user', 'laxmi'),
(47, 'laxmiguragai@gmail.com', 'Laxmi1!', 'user', 'laxmi'),
(48, 'ramchandra@gmail.com', 'Ramram1!', 'user', 'shree'),
(49, 'krishna@gmail.com', 'Krishna1!', 'user', 'adminjhapa'),
(50, 'kamala123@gmail.com', 'Kamala1!', 'user', 'kamala'),
(51, 'pawan123@gmail.com', 'Pawan1!', 'user', 'pawan'),
(52, 'asmita@gmail.com', 'Asmi1!', 'user', 'adminjhapa'),
(53, 'pawanbhandari@gmail.com', 'Pawan1!', 'user', 'pawan'),
(54, 'sujansapkota@gmail.com', 'Sujan1!', 'user', 'sujan'),
(55, 'sudeep@gmail.com', 'Sudeep1!', 'user', 'sudeep'),
(57, 'pawan233@gmail.com', 'Pawan1!', 'user', 'Pawan'),
(58, 'suntali@gmail.com', 'Suntali1!', 'user', 'suntali');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `notice_type` varchar(50) NOT NULL,
  `notice_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice_type`, `notice_content`, `created_at`, `is_active`, `admin_id`) VALUES
(1, 'Notice 1', 'Hello Students', '2025-02-16 06:41:04', 0, 0),
(2, 'Notice 2', 'Hello old students', '2025-02-16 06:56:40', 0, 0),
(3, 'Notice 1', 'Hello Newly Admitted Students !', '2025-02-16 07:29:14', 0, 0),
(4, 'Notice 2', 'ffff', '2025-02-16 07:31:31', 0, 0),
(5, 'Notice 1', 'Hello Students !!', '2025-02-16 14:51:41', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` varchar(50) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `admission_id`, `user_id`, `name`, `phone`, `amount`, `status`, `created_at`) VALUES
('fee_67ae26c2966770.03582289', 150, 77, 'saugat', '9876543678', 800000.00, 'pending', '2025-02-13 17:07:14'),
('fee_67ae2821235d29.64461879', 150, 77, 'saugat', '9876543678', 1500000.00, 'pending', '2025-02-13 17:13:05'),
('fee_67ae2872d7b1b0.89938900', 150, 77, 'saugat', '9876543678', 1500000.00, 'pending', '2025-02-13 17:14:26'),
('fee_67ae2881b9ef83.83984325', 150, 77, 'saugat', '9800000000', 300000.00, 'pending', '2025-02-13 17:14:41'),
('fee_67ae290acc3c57.59748880', 127, 75, 'saugat', '9876543678', 1200000.00, 'pending', '2025-02-13 17:16:58'),
('fee_67ae2ad75f44a8.12479555', 154, 78, 'saugat', '9800000000', 300000.00, 'pending', '2025-02-13 17:24:39'),
('fee_67ae2b1e212b43.60778773', 150, 77, 'saugat', '9800000000', 700000.00, 'pending', '2025-02-13 17:25:50'),
('fee_67ae2dfea417f0.25494969', 154, 78, 'saugat', '9800000000', 1200000.00, 'pending', '2025-02-13 17:38:06'),
('fee_67ae2ea378c666.50476933', 154, 78, 'saugat', '9800000000', 15000000.00, 'pending', '2025-02-13 17:40:51'),
('fee_67aec0a4263025.56572598', 158, 79, 'saugat', '9876543678', 800000.00, 'pending', '2025-02-14 04:03:48'),
('fee_67aec0dd98b0d0.36429946', 159, 79, 'saugat', '9800000000', 1500000.00, 'pending', '2025-02-14 04:04:45'),
('fee_67aec2712eebe8.08523356', 160, 80, 'pawan', '9800000000', 800000.00, 'pending', '2025-02-14 04:11:29'),
('fee_67aec60d553af3.36012768', 161, 80, 'pawan', '9800000000', 800000.00, 'pending', '2025-02-14 04:26:53'),
('fee_67aec955ea95d1.89676461', 164, 80, 'pawan', '9800000000', 800000.00, 'pending', '2025-02-14 04:40:53'),
('fee_67b1f7be0f4f34.10254129', 174, 86, 'Pawan Bhandari', '9840721020', 4538000.00, 'pending', '2025-02-16 14:35:42'),
('fee_67b2eb98822891.88699528', 176, 66, 'Rishav Khadka', '9840721020', 5000.00, 'pending', '2025-02-17 07:56:08'),
('fee_67b2ebc6484fa3.67508457', 176, 66, 'Rishav Khadka', '9840721020', 5000.00, 'pending', '2025-02-17 07:56:54'),
('fee_67b2ec0c509c31.78008382', 176, 66, 'Rishav Khadka', '9840721020', 5000.00, 'pending', '2025-02-17 07:58:04'),
('fee_67b2ec29892ce6.40212514', 176, 66, 'Rishav Khadka', '9840721020', 5000.00, 'pending', '2025-02-17 07:58:33'),
('fee_67b2ec8d2bd4c9.13038701', 176, 66, 'Rishav Khadka', '9840721020', 5000.00, 'pending', '2025-02-17 08:00:13'),
('fee_67b2ed06a6ed76.12963738', 176, 66, 'Rishav Khadka', '9840721020', 5000.00, 'pending', '2025-02-17 08:02:14'),
('fee_67b9a7b109b286.07319397', 177, 88, 'Sudeep Subedi', '9840721020', 45000.00, 'pending', '2025-02-22 10:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `photo_name` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `photo_name`, `user_id`) VALUES
(1, '408b9bd297caa1f0531514e490f9c5a3.jpg', NULL),
(2, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(7, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(8, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(9, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(10, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(14, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(15, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(16, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(17, '462584574_967012955338446_3961536845894783252_n.jpg', NULL),
(18, '4b9c565b-4642-4814-b383-ac139150f311.jpg', NULL),
(44, 'Student Registration System Data Flow (1).png', 48),
(45, 'Untitled Diagram.drawio.png', 49),
(46, 'Untitled Diagram.drawio.png', 50),
(47, 'methodology.drawio.png', 51),
(49, 'methodology.drawio.png', 53),
(50, 'Untitled Diagram.drawio (1).png', 54),
(51, 'EntityR.drawio.png', 55),
(52, 'interface.drawio[1].png', 56),
(54, 'Blue and Yellow Modern Monthly Task Gantt Graph.png', 58),
(58, 'Untitled Diagram.drawio (1).png', 62),
(60, 'Untitled Diagram.drawio (1).png', 64),
(61, 'Blue and Yellow Modern Monthly Task Gantt Graph.png', 65),
(62, 'methodology.drawio.png', 66),
(64, '1st term 3.png', 68),
(65, '1st term 3.png', 69),
(66, '1st term 3.png', 70),
(67, '1st term 3.png', 71),
(68, '4.png', 72),
(69, '7 .png', 73),
(70, '5.png', 74),
(71, 'WhatsApp Image 2025-02-08 at 15.27.50.jpeg', 75),
(72, '6794acf843db20.35575914.png', 76),
(73, '6794acf843db20.35575914.png', 77),
(74, '6794acf843a627.24005114.png', 78),
(75, '6794ad439e1581.36036498.png', 79),
(76, '6794acf843db20.35575914.png', 80),
(77, '6794ad40550af3.20440999.png', 81),
(78, '6794ad40550af3.20440999.png', 82),
(82, 'CamScanner 05-10-2023 15.24.jpg', 86),
(84, 'CamScanner 05-10-2023 15.24.jpg', 88);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `phone_no`, `dob`, `gender`, `address`, `email`) VALUES
(48, 'Samir', 'Prasad', 'Baral', '9766556565', '2008-01-06', 'male', 'Kathmandu', 'ddd@gmail.com'),
(49, 'Saugat', 'Raj', 'Bhandari', '9766556564', '2004-01-13', 'male', 'Sunsari', 'sujata@gmail.com'),
(50, 'Saugat', 'Raj', 'Bhandari', '9766556564', '2004-01-13', 'male', 'Sunsari', 'sujata@gmail.com'),
(51, 'Samir', 'prasad', 'Rasaili', '9804989691', '2025-01-21', 'male', 'Sunsari', 'sujata@gmail.com'),
(53, 'hari', 'prasad', 'Rasaili', '9766556564', '1994-01-13', 'male', 'Birtamode Municipality -5, Jhapa', 'harish@gmail.com'),
(54, 'Saugat', 'Raj', 'Bhandari', '9840721020', '2005-01-02', 'male', 'Kathmandu', 'itsmesujansapkota@gmail.com'),
(55, 'Saugat', 'prasad', 'ghimire', '9766556565', '1999-01-13', 'male', 'Birtamode Municipality -7, Jhapa', 'saugat22@gmail.com'),
(56, 'Rabin', 'bro', 'Bhandari', '9766556564', '2001-01-07', 'male', 'Birtamode Municipality -5, Jhapa', 'rabin@gmail.com'),
(58, 'Saugat', 'Raj', 'Bhandari', '9840721020', '2004-01-11', 'male', 'Sunsari', 'sunita@gmail.com'),
(62, 'Kashinath', '', 'Baral', '9804989691', '2004-08-21', 'male', 'Kathmandu', 'kashinath@gmail.com'),
(64, 'Kashinath', '', 'Baral', '9804989691', '2004-08-21', 'male', 'Kathmandu', 'kashinath@gmail.com'),
(65, 'Pawan', 'Raj', 'Bhandari', '9766556565', '2004-05-25', 'male', 'Jhapa', 'mepawanbhandari@gmail.com'),
(66, 'Rishav', 'Kumar', 'Bhandari', '9840721020', '2004-01-04', 'male', 'Kathmandu', 'rishav@gmail.com'),
(68, 'saugat', 'pd', 'ram', '9833487893', '2005-06-25', 'male', 'Birtamode 7', 'hello12367@gmail.com'),
(69, 'saugat', 'pd', 'ram', '9833487893', '2005-06-25', 'male', 'Birtamode 7', 'hello12367@gmail.com'),
(70, 'bhuwan', 'k', 'sharma', '9834673767', '2002-01-22', 'male', 'Birtamode 7', 'bhuwan@gmail.com'),
(71, 'saugat', 'prasad', 'sharma', '9834673767', '2001-09-16', 'male', 'Birtamode 7', 'saugatghimire20@gmail.com'),
(72, 'ram singh', 'k', 'sharma', '9834673710', '2004-01-14', 'male', 'Birtamode 7', 'hari@gmail.com'),
(73, 'Spandan', 'pd', 'Shram', '9834673710', '2007-01-12', 'male', 'Birtamode 7', 'ogag@gmail.com'),
(74, 'tu', 'huii', 'grer', '9842645678', '2004-01-13', 'male', 'birtamode 2', 'qwerty@gmail.com'),
(75, 'saugat', 'hey', 'sharma', '9834673745', '2006-01-13', 'male', 'Birtamode 7', 'hello1234@gmail.com'),
(76, 'saugat', 'hari', 'haro', '9834673767', '1995-01-28', 'male', 'Birtamode 7', 'shyam@gmail.com'),
(77, 'ram', 'hari', 'sharma', '9833487893', '2000-01-20', 'male', 'Birtamode 7', 'saugatcode@gmail.com'),
(78, 'saugat', 'hari', 'sharma', '9833487894', '2004-01-05', 'male', 'Birtamode 7', 'saugatcode1@gmail.com'),
(79, 'saugat', 'hari', 'sharma', '9834673710', '1992-01-14', 'male', 'Birtamode 7', 'ram1234@gmail.com'),
(80, 'pawan', 'prasad', 'Bhandari', '9834673767', '2005-01-19', 'male', 'Birtamode 7', 'pawanvashishtha000@gmail.com'),
(81, 'ram singh', 'k', 'sharma', '9834673745', '2004-09-14', 'male', 'Birtamode 7', 'saugatghimire2060@gmail.com'),
(82, 'ram singh', 'k', 'sharma', '9834673745', '2004-09-14', 'male', 'Birtamode 7', 'saugatghimire2060@gmail.com'),
(86, 'Pawan', '', 'Bhandari', '9840721020', '2004-01-21', 'male', 'Birtamode Municipality -5, Jhapa', 'pawan123@gmail.com'),
(88, 'Sudeep', '', 'Subedi', '9804989691', '2004-01-11', 'male', 'Kathmandu', 'sudeep@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`),
  ADD KEY `campus_id` (`campus_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`),
  ADD UNIQUE KEY `campus_name` (`campus_name`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `login_id` (`login_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admission_id` (`admission_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=980029;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`campus_id`),
  ADD CONSTRAINT `admission_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `admission_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `admission_ibfk_4` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`),
  ADD CONSTRAINT `admission_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `guardian`
--
ALTER TABLE `guardian`
  ADD CONSTRAINT `guardian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_email` FOREIGN KEY (`email`) REFERENCES `login` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
