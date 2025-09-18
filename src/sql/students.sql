-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2025 at 09:23 AM
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
(202355851, 'Jason', 'Verzosa', 'Begornia', '2005-03-15', 'male', 'Christianity', 'Filipino', 'David Tan Begornia', 'jason26f@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'jassson26f-dv', 0x363863626162393834313339642e6a7067, 'General Trias Cavite', '9945646355', 75, 'Bachelor of Science in Industrial Technology', '2nd', 'Active', 'Regular', 1.00, 5000.00, '2025-10-01', '2025-05-31 16:00:00', 'Academic', 1, 0, 1, 0, 1, 1),
(202355852, 'dondon', 'Julie', 'Patidongan', '1998-11-28', 'male', 'Christianity', 'Filipino', 'atong ang', 'dondon@gmail.com', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'Mr.Julie Aguilar', 0x363863626137323235393537372e6a706567, 'San Nicolas, Batangas', '9945321789', 80, 'Bachelor of Science in Hospitality Management', '4th', 'Active', 'Probation', 3.00, 5000.00, '2025-10-01', '2025-05-31 16:00:00', 'Full', 1, 1, 1, 1, 1, 1),
(202355853, 'Staring', 'Into', 'Soul', '2019-04-01', 'other', 'Ceiling Worshipper', 'Meownese', 'Mr. Whiskerson', 'staring.cat@meme.edu', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://facebook.com/staringcat', 0x363863626137383537633265342e706e67, 'Box No. 4, Living Room, Couch City', '09123456789', 69, 'Bachelor of Arts in Communication', '2nd', 'Active', 'Probation', 1.23, 99999.99, '2025-10-18', '2025-09-18 06:11:41', 'None', 0, 1, 0, 1, 0, 0),
(202355854, 'Princess', '', 'Azula', '2000-05-14', 'female', 'Agni Worship', 'Fire Nation', 'Fire Lord Ozai', 'azula@royal.edu', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://instagram.com/lightning_queen', 0x363863626137623535376430332e6a7067, 'Royal Palace, Caldera City', '09001112222', 666, 'Bachelor of Arts in Communication', '3rd', 'Active', 'Irregular', 3.95, 9999.99, '2025-10-18', '2025-09-18 06:14:37', 'Athletic', 1, 0, 1, 1, 0, 1),
(202355855, '9L36KDys', 'Clara', 'oq8vRll', '2003-02-14', 'female', 'Catholic', 'Filipino', 'Ana Santos', 'maria.santos@student.edu', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://facebook.com/mariaclara', 0x363863626232396462363961362e706e67, '123 Mabini St., Manila, Philippines', '09171234567', 24, 'Bachelor of Science in Nursing', '1st', 'Active', 'Regular', 2.85, 15000.00, '2025-10-18', '2025-09-18 06:21:12', 'Partial', 1, 1, 1, 1, 1, 1),
(202355856, 'Thanos', 'The Great', 'Tyrant', '1900-06-23', 'male', 'Balanceism', 'Titanian', 'Lady Death', 'thanos@infinity.edu', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://twitter.com/inevitable', 0x363863626138616330316236622e6a7067, 'Sanctuary II, Outer Space', '+9999999999', 3000, 'Bachelor of Science in Criminology', '4th', 'Active', 'Regular', 4.00, 0.00, '2025-10-18', '2025-09-18 06:13:15', 'Full', 0, 0, 0, 1, 0, 0),
(202355880, 'Xiao', 'KungFu', 'Xiao', '2001-09-09', 'male', 'Stick-Fu', 'Flashlandian', 'Master Stick', 'xiaoxiao@flashdojo.edu', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://newgrounds.com/sticklegend', 0x363863626138663462653335322e706e67, 'Hidden Dojo, Pixel Valley', '09998887777', 888, 'Bachelor of Science in Industrial Technology', '3rd', 'Active', 'Regular', 3.50, 1234.56, '2025-10-18', '2025-09-18 06:19:41', 'Athletic', 0, 1, 0, 1, 0, 0),
(202355881, 'Freak', 'Square', 'Bob', '1986-07-14', 'male', 'Jellyfish Worship', 'Bikini Bottomian', 'Grandma SquarePants', 'spongebob@pineapple.edu', '$2y$10$yLJP7MET115Ohq6XWkeJ.eMix5PwjwBRxgeOpXijIWA51jsdwn9Wq', 'https://instagram.com/imready', 0x363863626139656330383263362e6a7067, 'Pineapple House, 124 Conch St., Bikini Bottom', '09180000000', 99, 'Bachelor of Science in Hospitality Management', '2nd', 'Active', 'Regular', 3.25, 500.00, '2025-10-18', '2025-09-18 06:23:00', 'Full', 0, 0, 0, 1, 0, 1);

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202355882;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
