-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2017 at 05:25 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(10) NOT NULL,
  `part_id` int(10) NOT NULL,
  `course` varchar(255) NOT NULL,
  `maths_score` int(3) NOT NULL,
  `year` date NOT NULL,
  `school` varchar(255) NOT NULL,
  `cgpa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `part_id`, `course`, `maths_score`, `year`, `school`, `cgpa`) VALUES
(1, 3, 'Btech', 34, '2017-10-11', 'sewre', 8),
(2, 4, 'Btech', 34, '2017-10-11', 'sewre', 8);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(10) NOT NULL,
  `part_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `part_id`, `company`, `startdate`, `enddate`, `reason`) VALUES
(1, 3, 'fgee', '2017-10-18', '2017-10-26', 'ergegeg'),
(2, 4, 'fgee', '2017-10-18', '2017-10-26', 'ergegeg');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `title`, `location`, `startdate`, `enddate`) VALUES
(1, 'software tester', 'kochi', '2017-10-25', '2017-10-26'),
(2, 'software tester', 'kochi', '2017-10-25', '2017-10-26'),
(3, 'Trainee', 'tvm', '2017-10-04', '2017-10-05'),
(4, 'analyst', 'Banglore', '2017-10-04', '2017-10-12'),
(5, 'ERP Developer', 'TVM', '2017-10-04', '2017-10-05'),
(6, 'ERP Developer', 'TVM', '2017-10-04', '2017-10-05'),
(7, 'Web Designer', 'kochi', '2017-10-11', '2017-10-11'),
(8, 'erte', 'kochi', '2017-10-04', '2017-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `int_score`
--

CREATE TABLE `int_score` (
  `id` int(10) NOT NULL,
  `round_id` int(10) NOT NULL,
  `part_id` int(11) NOT NULL,
  `score` int(3) NOT NULL,
  `comment` text NOT NULL,
  `int_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `int_score`
--

INSERT INTO `int_score` (`id`, `round_id`, `part_id`, `score`, `comment`, `int_id`) VALUES
(1, 1, 2, 34, 'yry', 1),
(2, 3, 2, 56, 'dfgdg', 1),
(3, 1, 3, 950, 'ghfh', 1),
(4, 2, 3, 500, 'ghfh', 1),
(6, 1, 4, 34, 'fyhty', 1),
(8, 3, 1, 68, 'tyry', 1),
(9, 4, 3, 34, 'dfdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `reg_id`, `name`) VALUES
(1, 1234, 'ben'),
(2, 1000, 'glen'),
(3, 1001, 'anu'),
(4, 1001, 'hari');

-- --------------------------------------------------------

--
-- Table structure for table `part_details`
--

CREATE TABLE `part_details` (
  `id` int(10) NOT NULL,
  `part_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `part_details`
--

INSERT INTO `part_details` (`id`, `part_id`, `email`, `phone`, `qualification`, `dob`, `address`) VALUES
(1, 2, 'sdasd@se', '5463545', 'Btech', '2017-10-12', 'ewrwrferetr'),
(2, 3, 'asasd@fhghfh', '123434534', 'Btech', '2017-10-02', 'sfsdff'),
(3, 4, 'asasd@fhghfh', '123434534', 'Btech', '2017-10-02', 'sfsdff');

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` int(11) NOT NULL,
  `round` varchar(255) NOT NULL,
  `maxscore` int(3) NOT NULL,
  `acitve` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `round`, `maxscore`, `acitve`) VALUES
(1, 'HR', 100, 1),
(2, 'Technical Interview', 100, 1),
(3, 'Aptitude', 100, 1),
(4, 'Englisht Test', 100, 1),
(5, 'Machine Test', 10, 0),
(6, 'Soft Skills', 50, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int_score`
--
ALTER TABLE `int_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_details`
--
ALTER TABLE `part_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `int_score`
--
ALTER TABLE `int_score`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `part_details`
--
ALTER TABLE `part_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
