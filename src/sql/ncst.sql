-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2025 at 03:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncst`
--

-- --------------------------------------------------------

--
-- Table structure for table `Mail_log`
--

CREATE TABLE `Mail_log` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `attachment` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_read` tinyint(1) DEFAULT 0,
  `admin_read` tinyint(1) DEFAULT 0,
  `officer_sent` tinyint(1) DEFAULT 0,
  `status` enum('pending','accepted','declined') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Mail_log`
--

INSERT INTO `Mail_log` (`id`, `from_id`, `to_id`, `email`, `subject`, `body`, `attachment`, `created_at`, `student_read`, `admin_read`, `officer_sent`, `status`) VALUES
(11112007, 202355852, 202355851, 'jason26f@gmail.com', 'hello po', 'TRALALA', 0x363863616434636630633566342e706e67, '2025-09-17 15:33:35', 1, 0, 0, 'pending'),
(11112008, 202355852, 202355851, 'jason26f@gmail.com', 'Crocodilo', 'LALAMIGA', 0x363863616434646564663562352e706e67, '2025-09-17 15:33:50', 0, 0, 0, 'pending'),
(11112009, 202355852, 202355851, 'jason26f@gmail.com', '123312', 'awdawd', NULL, '2025-09-18 01:31:45', 0, 0, 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `OSA_staff`
--

CREATE TABLE `OSA_staff` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `staff_role` enum('admin','officer') DEFAULT 'officer',
  `profile_pic` varchar(255) NOT NULL DEFAULT 'officer.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `OSA_staff`
--

INSERT INTO `OSA_staff` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `contact_number`, `address`, `staff_role`, `profile_pic`) VALUES
(202355851, 'jason', 'verzosa', 'begornia', 'JSON26F-DV@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', '09171234567', 'San tiago General Trias Cavite', 'admin', 'officer.png'),
(202355852, 'nenel', 'tralala', 'Crocodilo', 'nenel146@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', '09171234567', 'General Trias Cavite', 'officer', 'officer.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` enum('male','female','other') DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `guardian` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `social_media` varchar(100) DEFAULT NULL,
  `profile_pic` blob DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `student_credits` int(11) DEFAULT NULL,
  `course` enum('Bachelor of Science in Information Technology','Bachelor of Science in Computer Science','Bachelor of Science in Hospitality Management','Bachelor of Science in Criminology','Bachelor of Science in Nursing','Bachelor of Arts in Communication','Bachelor of Science in Industrial Technology') DEFAULT NULL,
  `year_level` enum('1st','2nd','3rd','4th') DEFAULT NULL,
  `student_status` enum('Active','Inactive','Graduated','Dropped','Banned') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `academic_standing` enum('Regular','Irregular','Probation','Dismissed') NOT NULL DEFAULT 'Regular',
  `current_gpa` decimal(3,2) DEFAULT NULL,
  `tuition_balance` decimal(10,2) DEFAULT NULL,
  `next_payment_due` date DEFAULT (curdate() + interval 1 month),
  `last_payment` timestamp NULL DEFAULT current_timestamp(),
  `scholarship` enum('Full','Partial','Athletic','Academic','None') NOT NULL DEFAULT 'None',
  `hasBirthCertificate` tinyint(1) DEFAULT NULL,
  `hasGoodMoral` tinyint(1) DEFAULT NULL,
  `hasReportCard` tinyint(1) DEFAULT NULL,
  `hasIDPicture` tinyint(1) DEFAULT NULL,
  `hasMedical_record` tinyint(1) DEFAULT NULL,
  `hasForm137` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `sex`, `religion`, `nationality`, `guardian`, `email`, `password`, `social_media`, `profile_pic`, `address`, `contact_number`, `student_credits`, `course`, `year_level`, `student_status`, `academic_standing`, `current_gpa`, `tuition_balance`, `next_payment_due`, `last_payment`, `scholarship`, `hasBirthCertificate`, `hasGoodMoral`, `hasReportCard`, `hasIDPicture`, `hasMedical_record`, `hasForm137`) VALUES
(202355851, 'Jason', 'Verzosa', 'Begornia', '2005-03-15', 'male', 'Christianity', 'Filipino', 'Jane Doe', 'jasonbegornia@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', '', 0x363863393433333665316366382e706e67, 'San Francisco', '9945646355', 75, 'Bachelor of Science in Industrial Technology', '2nd', 'Active', 'Regular', 3.50, 5000.00, '2025-10-01', '2025-05-31 16:00:00', 'None', 1, 0, 1, 0, 1, 1),
(202355852, '1', '1', '1', '2005-01-11', 'male', '1', '1', '1', 'jason26f@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'jason26f', 0x363863613735333833623534322e6a706567, 'San Francisco Cavite etc', '9945646355', 80, 'Bachelor of Science in Information Technology', '1st', 'Graduated', 'Irregular', 1.00, 11111.00, '2025-11-01', '2025-11-20 11:15:00', 'Full', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `violation_id` int(11) NOT NULL,
  `complainant_id` int(11) NOT NULL,
  `student_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`student_ids`)),
  `offense` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment_id` int(50) DEFAULT NULL,
  `status` enum('Pending','For Conference','Upheld','Cleared','Settled') DEFAULT NULL,
  `date_reported` date DEFAULT NULL,
  `decided_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Mail_log`
--
ALTER TABLE `Mail_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OSA_staff`
--
ALTER TABLE `OSA_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`violation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Mail_log`
--
ALTER TABLE `Mail_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112010;

--
-- AUTO_INCREMENT for table `OSA_staff`
--
ALTER TABLE `OSA_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202355853;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202355879;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `violation_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
