-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 11:30 PM
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
-- Table structure for table `full_degree`
--

CREATE TABLE `full_degree` (
  `Course_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `Career_ID` int(11) NOT NULL,
  `Course_Name` text NOT NULL,
  `Course_Num` int(11) NOT NULL,
  `Department` text NOT NULL,
  `Credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `full_degree`
--

INSERT INTO `full_degree` (`Course_ID`, `Skill_ID`, `Career_ID`, `Course_Name`, `Course_Num`, `Department`, `Credits`) VALUES
(1, 0, 1, 'Oral Communications', 101, 'General Education', 3),
(2, 2, 1, 'Computer Science I', 120, 'CS', 4),
(3, 0, 1, 'English', 102, 'English', 3),
(4, 0, 1, 'Math College Algebra', 143, 'Math', 3),
(5, 0, 1, 'Analytic Trigonometry', 144, 'Math', 1),
(6, 0, 1, 'Humanistic & Arts', 100, 'General Education', 3),
(7, 0, 1, 'Writing and Rhetoric II', 102, 'English', 3),
(8, 2, 1, 'Computer Science II', 121, 'CS', 3),
(9, 8, 1, 'Computer Organization and Architecture', 150, 'CS', 3),
(10, 0, 1, 'Calculus I', 170, 'Math', 4),
(11, 0, 1, 'Discrete Mathematics', 176, 'Math', 3),
(12, 1, 1, 'Programming Languages', 210, 'CS', 3),
(13, 0, 1, 'Calculus II', 175, 'Math', 4),
(14, 0, 1, 'Science with Lab Course ', 100, 'Science', 4),
(15, 0, 1, 'Elective Course', 100, 'General Education', 1),
(16, 2, 1, 'Computer Operating Systems', 240, 'CS', 3),
(17, 2, 1, 'System Software', 270, 'CS', 3),
(18, 2, 1, 'Secure Coding and Analysis', 220, 'CS', 3),
(19, 0, 1, 'Probability and Statistics', 301, 'Statistics', 3),
(20, 0, 1, 'Science with Lab Course', 100, 'Science', 4),
(21, 3, 1, 'Software Engineering', 383, 'CS', 4),
(22, 0, 1, 'Theory of Computation', 385, 'CS', 3),
(23, 0, 1, 'Linear Algebra', 330, 'Math', 3),
(24, 1, 1, 'Major Technical Elective Course ', 400, 'CS', 3),
(25, 0, 1, 'Social and Behavioral Ways of Knowing', 100, 'General Education', 3),
(26, 7, 1, 'Database Systems', 360, 'CS', 4),
(27, 1, 1, 'Analysis of Algorithms', 395, 'CS', 3),
(28, 0, 1, 'Major Technical Elective Course', 400, 'CS', 3),
(29, 0, 1, 'Humanistic & Arts', 100, 'General Education', 3),
(30, 1, 1, 'Contemporary Issues in Computer Science', 401, 'CS', 1),
(31, 1, 1, 'Compiler Design', 445, 'CS', 4),
(32, 0, 1, 'Elective Course', 100, 'General Education', 1),
(33, 0, 1, 'American Diversity Course', 100, 'General Education', 3),
(34, 1, 1, 'CS Senior Capstone Design I', 480, 'CS', 3),
(35, 1, 1, 'CS Senior Capstone Design II', 481, 'CS', 3),
(36, 1, 1, 'Major Technical Elective Course', 400, 'CS', 3),
(37, 1, 1, 'Major Technical Elective Course', 400, 'CS', 3),
(38, 0, 1, 'International Course', 100, 'General Education', 3),
(39, 0, 1, 'Social and Behavioral Ways of Knowing', 100, 'General Education', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
