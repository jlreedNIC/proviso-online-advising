-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 01:12 AM
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
(1, 'Micron', 59000, 'Software Developer', 'Software developers conceive of, design, and build computer programs. Some develop new applications for mobile or desktop use, while others build underlying operating systems. Either way, software developers identify user needs, build programs, test out new software, and make improvements.'),
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
(1, 'Bachelors of Computer Science', 'This program prepares you to design, develop and test computing systems for a variety of purposes. Become proficient in various operating systems, programming languages and techniques and computer architecture with many opportunities to practice your skills on real-world projects. Students may specialize in the area that best supports their interests and goals.'),
(1, 'Bachelors of Computer Science', 'This program prepares you to design, develop and test computing systems for a variety of purposes. Become proficient in various operating systems, programming languages and techniques and computer architecture with many opportunities to practice your skills on real-world projects. Students may specialize in the area that best supports their interests and goals.');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `DegreeID` int(11) NOT NULL,
  `Degree_Name` varchar(100) NOT NULL,
  `Degree_Level` varchar(100) NOT NULL,
  `Degree_Type` varchar(100) NOT NULL,
  `Description` varchar(383) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`DegreeID`, `Degree_Name`, `Degree_Level`, `Degree_Type`, `Description`) VALUES
(1, 'Computer Science', 'bachelor', 'B.S.', 'This program prepares you to design, develop and test computing systems for a variety of purposes. Become proficient in various operating systems, programming languages and techniques and computer architecture with many opportunities to practice your skills on real-world projects. Students may specialize in the area that best supports their interests and goals.');

-- --------------------------------------------------------

--
-- Table structure for table `degree_categories`
--

CREATE TABLE `degree_categories` (
  `CategoryID` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `degree_category_accepted_courses`
--

CREATE TABLE `degree_category_accepted_courses` (
  `_ID` int(11) NOT NULL,
  `DegreeID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Accepted_Courses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `degree_category_req`
--

CREATE TABLE `degree_category_req` (
  `Deg_Cat_ReqID` int(11) NOT NULL,
  `DegreeID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `CreditsReq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `degree_classes_req`
--

CREATE TABLE `degree_classes_req` (
  `Degree_CourseID` int(11) NOT NULL,
  `DegreeID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `degree_min_grade_req`
--

CREATE TABLE `degree_min_grade_req` (
  `Min_GradeID` int(11) NOT NULL,
  `DegreeID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `MinGrade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'PHP'),
(8, 'MLA'),
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
  `Career_ID` int(11) NOT NULL,
  `Course_Name` text NOT NULL,
  `Course_Num` int(11) NOT NULL,
  `Department` text NOT NULL,
  `Credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_take`
--

INSERT INTO `student_take` (`Course_ID`, `Skill_ID`, `Career_ID`, `Course_Name`, `Course_Num`, `Department`, `Credits`) VALUES
(0, 0, 1, 'Oral Communication', 101, 'General Education', 3),
(0, 2, 1, 'Computer Science', 120, 'CS', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`DegreeID`),
  ADD UNIQUE KEY `degree_name` (`Degree_Name`);

--
-- Indexes for table `degree_categories`
--
ALTER TABLE `degree_categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Category` (`Category`);

--
-- Indexes for table `degree_category_accepted_courses`
--
ALTER TABLE `degree_category_accepted_courses`
  ADD PRIMARY KEY (`_ID`),
  ADD KEY `DegreeID` (`DegreeID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `Accepted_Courses` (`Accepted_Courses`);

--
-- Indexes for table `degree_category_req`
--
ALTER TABLE `degree_category_req`
  ADD PRIMARY KEY (`Deg_Cat_ReqID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `DegreeID` (`DegreeID`);

--
-- Indexes for table `degree_classes_req`
--
ALTER TABLE `degree_classes_req`
  ADD PRIMARY KEY (`Degree_CourseID`),
  ADD KEY `degree foreign key` (`DegreeID`),
  ADD KEY `course foreign key` (`Course_ID`);

--
-- Indexes for table `degree_min_grade_req`
--
ALTER TABLE `degree_min_grade_req`
  ADD PRIMARY KEY (`Min_GradeID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `DegreeID` (`DegreeID`);

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
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `DegreeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `degree_categories`
--
ALTER TABLE `degree_categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree_category_accepted_courses`
--
ALTER TABLE `degree_category_accepted_courses`
  MODIFY `_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree_category_req`
--
ALTER TABLE `degree_category_req`
  MODIFY `Deg_Cat_ReqID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree_classes_req`
--
ALTER TABLE `degree_classes_req`
  MODIFY `Degree_CourseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree_min_grade_req`
--
ALTER TABLE `degree_min_grade_req`
  MODIFY `Min_GradeID` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `degree_category_accepted_courses`
--
ALTER TABLE `degree_category_accepted_courses`
  ADD CONSTRAINT `degree_category_accepted_courses_ibfk_1` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`DegreeID`),
  ADD CONSTRAINT `degree_category_accepted_courses_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `degree_categories` (`CategoryID`),
  ADD CONSTRAINT `degree_category_accepted_courses_ibfk_3` FOREIGN KEY (`Accepted_Courses`) REFERENCES `courses` (`Course_ID`);

--
-- Constraints for table `degree_category_req`
--
ALTER TABLE `degree_category_req`
  ADD CONSTRAINT `degree_category_req_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `degree_categories` (`CategoryID`),
  ADD CONSTRAINT `degree_category_req_ibfk_2` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`DegreeID`);

--
-- Constraints for table `degree_classes_req`
--
ALTER TABLE `degree_classes_req`
  ADD CONSTRAINT `course foreign key` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `degree foreign key` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`DegreeID`);

--
-- Constraints for table `degree_min_grade_req`
--
ALTER TABLE `degree_min_grade_req`
  ADD CONSTRAINT `degree_min_grade_req_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `degree_min_grade_req_ibfk_2` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`DegreeID`);

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
