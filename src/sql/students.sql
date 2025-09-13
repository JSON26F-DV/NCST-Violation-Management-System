-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 13, 2025 at 11:04 AM
-- Server version: 8.4.6
-- PHP Version: 8.2.27

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int NOT NULL,
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
  `address` varchar(200) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `student_credits` int DEFAULT NULL,
  `course` enum('Bachelor of Science in Information Technology','Bachelor of Science in Computer Science','Bachelor of Science in Hospitality Management','Bachelor of Science in Criminology','Bachelor of Science in Nursing','Bachelor of Arts in Communication','Bachelor of Science in Industrial Technology') DEFAULT NULL,
  `year_level` enum('1st','2nd','3rd','4th') DEFAULT NULL,
  `status` enum('Active','Inactive','Graduated','Dropped','Banned') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `academic_standing` enum('Regular','Irregular','Probation','Dismissed') NOT NULL DEFAULT 'Regular',
  `current_gpa` decimal(3,2) DEFAULT NULL,
  `tuition_balance` decimal(10,2) DEFAULT NULL,
  `next_payment_due` date DEFAULT ((curdate() + interval 1 month)),
  `last_payment` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `scholarship` enum('Full','Partial','Athletic','Academic','None') NOT NULL DEFAULT 'None',
  `hasBirthCertificate` tinyint(1) DEFAULT NULL,
  `hasGoodMoral` tinyint(1) DEFAULT NULL,
  `hasReportCard` tinyint(1) DEFAULT NULL,
  `hasIDPicture` tinyint(1) DEFAULT NULL,
  `hasMedical_record` tinyint(1) DEFAULT NULL,
  `hasForm137` tinyint(1) DEFAULT NULL
) ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `sex`, `religion`, `nationality`, `guardian`, `email`, `password`, `social_media`, `address`, `contact_number`, `student_credits`, `course`, `year_level`, `status`, `academic_standing`, `current_gpa`, `tuition_balance`, `next_payment_due`, `last_payment`, `scholarship`, `hasBirthCertificate`, `hasGoodMoral`, `hasReportCard`, `hasIDPicture`, `hasMedical_record`, `hasForm137`) VALUES
(202355851, 'Jason', 'Verzosa', 'Begornia', '2005-03-15', 'male', 'Christianity', 'Filipino', 'Jane Doe', 'jasonbegornia@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'jason26f', 'San Francisco', '09945645678', 75, 'Bachelor of Science in Industrial Technology', '2nd', 'Active', 'Regular', 3.50, 5000.00, '2025-10-01', '2025-06-01 00:00:00', 'None', 1, 0, 1, 0, 1, 1),
(202355877, 'Dakota', 'Courtney Alston', 'Dunn', '1981-08-04', 'other', 'Molestias dolorem vo', 'Aut exercitation ali', 'Natus cum ut quia ip', 'jason26f@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://www.cac.ca', 'Pariatur Doloribus ', '+1 (622) 659-9031', 100, 'Bachelor of Science in Hospitality Management', '1st', 'Active', 'Regular', 3.00, 5000.00, '2025-10-13', '2025-09-13 10:50:08', 'None', 1, 1, 0, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
