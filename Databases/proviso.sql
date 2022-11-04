-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 02:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proviso`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `CareerID` int(11) NOT NULL,
  `Company` text NOT NULL,
  `Pay` int(11) NOT NULL,
  `Position_Name` text NOT NULL,
  `Des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`CareerID`, `Company`, `Pay`, `Position_Name`, `Des`) VALUES
(1, 'Micron', 59000, 'Software Developer', 'Software developers conceive of, design, and build computer programs. Some develop new applications for mobile or desktop use, while others build underlying operating systems. Either way, software developers identify user needs, build programs, test out new software, and make improvements.');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_ID` int(11) NOT NULL,
  `Course_Name` text NOT NULL,
  `Course_Num` int(11) NOT NULL,
  `Department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `Degree_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`Degree_ID`, `Name`, `Description`) VALUES
(1, 'Bachelors of Computer Science', 'This program prepares you to design, develop and test computing systems for a variety of purposes. Become proficient in various operating systems, programming languages and techniques and computer architecture with many opportunities to practice your skills on real-world projects. Students may specialize in the area that best supports their interests and goals.');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `Skill_ID` int(11) NOT NULL,
  `Skill_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`Skill_ID`, `Skill_Name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'C#'),
(4, 'Python'),
(5, 'Java'),
(6, 'HTML'),
(7, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `student_take`
--

CREATE TABLE `student_take` (
  `Course_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `Career_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
