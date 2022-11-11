-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 08:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
  `Department` text NOT NULL,
  `Credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_ID`, `Course_Name`, `Course_Num`, `Department`, `Credits`) VALUES
(1, 'Software Engineering', 383, 'CS', 4),
(2, 'Computer Science I', 120, 'CS', 4),
(3, 'Computer Science II', 121, 'CS', 3),
(4, 'Computer Organization and Architecture', 150, 'CS', 3),
(5, 'Programming Languages', 210, 'CS', 3),
(6, 'Computer Operating Systems', 240, 'CS', 3),
(7, 'System Software', 270, 'CS', 3),
(8, 'Database Systems', 360, 'CS', 4),
(9, 'Theory of Computation', 385, 'CS', 3),
(10, 'Compiler Design', 445, 'CS', 4);

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
-- Table structure for table `prereq`
--

CREATE TABLE `prereq` (
  `PreID` int(11) NOT NULL,
  `Prereq_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prereq`
--

INSERT INTO `prereq` (`PreID`, `Prereq_ID`, `Course_ID`) VALUES
(1, 3, 8),
(2, 4, 8),
(3, 3, 7),
(4, 5, 1),
(5, 6, 1),
(6, 7, 1),
(7, 2, 3),
(8, 2, 4),
(9, 3, 5),
(10, 3, 6),
(11, 4, 6),
(12, 5, 10),
(13, 9, 10);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`userID`, `userName`, `password`, `email`, `firstName`, `lastName`, `gender`) VALUES
(1, 'reed5204', 'hellothere', 'reed5204@vandals.uidaho.edu', 'Jordan', 'Reed', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `student_take`
--

CREATE TABLE `student_take` (
  `Course_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `Career_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `prereq`
--
ALTER TABLE `prereq`
  ADD PRIMARY KEY (`PreID`),
  ADD KEY `PrereqID` (`Prereq_ID`),
  ADD KEY `CourseID` (`Course_ID`),
  ADD KEY `PrereqID_2` (`Prereq_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`userID`,`userName`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prereq`
--
ALTER TABLE `prereq`
  MODIFY `PreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prereq`
--
ALTER TABLE `prereq`
  ADD CONSTRAINT `foreign_key_course` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `foreign_key_prereq` FOREIGN KEY (`Prereq_ID`) REFERENCES `courses` (`Course_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
