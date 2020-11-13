-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 09:51 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(20) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `faculty_dept` varchar(50) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `fname`, `lname`, `phone`, `email`, `gender`, `password`, `institution`, `level`, `faculty_dept`, `academic_year`, `status`, `regdate`) VALUES
(1, 'HANYURWIMFURA', 'Dieudonne', '0780078179', 'dieudonne@gmail.com', 'Male', '1234', 'UTB', '2', 'Agriculture', '2019-2020', 'studying', '2020-06-14'),
(2, 'UWERA', 'Epa', '0728832222', 'epa@yahoo.fr', 'Female', 'Epa1234', 'Muhabura', '1', 'Education', '2018-2019', 'studying', '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `internship_id` int(10) NOT NULL,
  `applicant_id` int(10) NOT NULL,
  `application_letter` varchar(500) NOT NULL,
  `recomendation` varchar(500) NOT NULL,
  `transcript` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `response` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `company_id`, `internship_id`, `applicant_id`, `application_letter`, `recomendation`, `transcript`, `photo`, `response`, `status`, `regdate`) VALUES
(1, 10, 100, 1, 'letter', 'recommandation', 'trancsript', 'photo', 'response', 'Approved', '2020-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `gps_location` varchar(500) NOT NULL,
  `tin_number` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `website` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `photo`, `phone`, `email`, `address`, `gps_location`, `tin_number`, `password`, `website`, `status`, `regdate`) VALUES
(10, 'IPRC Tumba', 'photo.jpg', '078660113', 'hanydieudonne@yahoo.com', 'Tumba', 'dhfg location', 4567, 'VITAL 2020', 'www.iprctumba.ac.rw', 'Approved', '2020-03-12'),
(12, 'Padri Vjeko Center', '', '0728863883', 'uzabavital@gmail.com', 'Muhanga', '', 56222, 'Padri1234', 'www.padrivjeko.info', 'Approved', '2020-06-12'),
(13, 'UoK', 'load image', '0728863000', 'uok@yahoo.com', 'Kigali', 'load gps location', 11233, 'AoK123', 'www.kigali.ac.rw', 'waiting', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `company_internship`
--

CREATE TABLE `company_internship` (
  `internship_id` int(10) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `eligibility` varchar(500) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `needed_number` int(2) NOT NULL,
  `application_start` date NOT NULL,
  `application_end` date NOT NULL,
  `application_limit` int(2) NOT NULL,
  `company_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_internship`
--

INSERT INTO `company_internship` (`internship_id`, `department_name`, `description`, `eligibility`, `start`, `end`, `needed_number`, `application_start`, `application_end`, `application_limit`, `company_id`, `status`, `regdate`) VALUES
(100, 'IT', 'Information and Technology', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.', '2020-01-01', '2020-12-30', 5, '2019-10-02', '2019-12-02', 10, 10, 'Draft', '2020-03-16'),
(101, 'ET', 'Electonic and Telecommunication', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.', '2020-01-01', '2020-12-30', 2, '2019-12-01', '2019-12-25', 5, 10, 'Available', '2020-03-16'),
(102, 'RE', 'Reneable Energy', 'XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others. If you want have your XAMPP accessible from the internet, make sure you understand the implications and you checked the FAQs to learn how to protect your site. Alternatively you can use WAMP, MAMP or LAMP which are similar packages which are more suitable for production.\r\n', '2020-12-01', '2020-12-30', 5, '2020-10-10', '2020-10-30', 9, 10, 'Available', '2020-03-16'),
(103, 'Tourism', 'general Tourism', 'all students from tourism department', '2020-01-01', '2020-12-25', 5, '2019-10-10', '2019-12-02', 15, 13, 'Available', '2020-06-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `internship_id` (`internship_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_internship`
--
ALTER TABLE `company_internship`
  ADD PRIMARY KEY (`internship_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_internship`
--
ALTER TABLE `company_internship`
  MODIFY `internship_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`Company_id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`),
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`internship_id`) REFERENCES `company_internship` (`internship_id`);

--
-- Constraints for table `company_internship`
--
ALTER TABLE `company_internship`
  ADD CONSTRAINT `company_internship_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`Company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
