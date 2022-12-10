-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 06:21 PM
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
-- Table structure for table `adv_students`
--

CREATE TABLE `adv_students` (
  `Adv_Students_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Phone` text NOT NULL,
  `Email` text NOT NULL,
  `Career_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adv_students`
--

INSERT INTO `adv_students` (`Adv_Students_ID`, `Student_ID`, `Name`, `Phone`, `Email`, `Career_ID`) VALUES
(7, 1, 'John Doe Jr', '208-123-1234', 'John@gmail.com', 1),
(8, 2, 'Jane Doe ', '208-123-4321', 'Jane@gmail.com', 2),
(9, 3, 'Bob Joe', '509-222-3333', 'Bob@gmail.com', 3);

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
(2, 'Prosoft', 60000, 'Entry Level Web Developer', 'A Web Developer is a professional who is responsible for the design and construction of websites. They ensure that sites meet user expectations by ensuring they look good, run smoothly and offer easy access points with no loading issues between pages or error messages.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `careers_req_skills`
--

CREATE TABLE `careers_req_skills` (
  `CRS_ID` int(11) NOT NULL,
  `Career_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careers_req_skills`
--

INSERT INTO `careers_req_skills` (`CRS_ID`, `Career_ID`, `Skill_ID`) VALUES
(1, 1, 3),
(2, 1, 8),
(3, 1, 9),
(4, 1, 10),
(5, 1, 11),
(6, 1, 4),
(9, 2, 17),
(10, 2, 6),
(11, 2, 18),
(12, 2, 7),
(13, 2, 9),
(14, 2, 10);

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
(10, 'Compiler Design', 445, 'CS', 4),
(11, 'Calculus I', 170, 'MATH', 4),
(12, 'Calculus II', 175, 'MATH', 4),
(13, 'Discrete Mathematics', 176, 'MATH', 3),
(14, 'Linear Algebra', 330, 'MATH', 3),
(15, 'Probability and Statistics', 301, 'STAT', 3),
(16, 'Organisms and Environments', 114, 'BIOL', 4),
(17, 'General Chemistry I', 111, 'CHEM', 4),
(18, 'Python for Machine Learning', 477, 'CS', 3),
(19, 'Analysis of Algorithms', 395, 'CS', 3),
(20, 'Technical Writing', 317, 'ENGL', 3),
(21, 'CS Senior Capstone Design I', 480, 'CS', 3),
(22, 'Writing and Rhetoric II', 102, 'ENGL', 3),
(23, 'Writing and Rhetoric I', 101, 'ENGL', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_skills`
--

CREATE TABLE `course_skills` (
  `Course_Skill_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_skills`
--

INSERT INTO `course_skills` (`Course_Skill_ID`, `Course_ID`, `Skill_ID`) VALUES
(1, 7, 11),
(2, 1, 3),
(3, 2, 2),
(4, 3, 2),
(5, 1, 10),
(6, 18, 4),
(7, 7, 1),
(8, 6, 1),
(9, 8, 9),
(10, 3, 20),
(11, 3, 13),
(12, 5, 13),
(13, 4, 14),
(14, 8, 6),
(15, 8, 7),
(16, 8, 17),
(17, 3, 10);

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

--
-- Dumping data for table `degree_categories`
--

INSERT INTO `degree_categories` (`CategoryID`, `Category`) VALUES
(4, 'Humanities'),
(1, 'Natural Science with Lab'),
(3, 'Oral Communication'),
(5, 'Social Sciences'),
(2, 'Written Communication');

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

--
-- Dumping data for table `degree_category_accepted_courses`
--

INSERT INTO `degree_category_accepted_courses` (`_ID`, `DegreeID`, `CategoryID`, `Accepted_Courses`) VALUES
(1, 1, 1, 17),
(2, 1, 1, 16);

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

--
-- Dumping data for table `degree_category_req`
--

INSERT INTO `degree_category_req` (`Deg_Cat_ReqID`, `DegreeID`, `CategoryID`, `CreditsReq`) VALUES
(1, 1, 1, 8),
(2, 1, 2, 3),
(3, 1, 3, 2),
(4, 1, 4, 6),
(5, 1, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `degree_classes_req`
--

CREATE TABLE `degree_classes_req` (
  `Degree_CourseID` int(11) NOT NULL,
  `DegreeID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `degree_classes_req`
--

INSERT INTO `degree_classes_req` (`Degree_CourseID`, `DegreeID`, `Course_ID`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 8),
(4, 1, 1),
(6, 1, 4),
(7, 1, 5),
(8, 1, 6),
(9, 1, 7),
(10, 1, 9),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 15),
(15, 1, 14),
(16, 1, 10),
(17, 1, 19),
(18, 1, 21),
(19, 1, 20);

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

--
-- Dumping data for table `degree_min_grade_req`
--

INSERT INTO `degree_min_grade_req` (`Min_GradeID`, `DegreeID`, `Course_ID`, `MinGrade`) VALUES
(1, 1, 2, 'C'),
(2, 1, 3, 'C'),
(3, 1, 4, 'C'),
(4, 1, 5, 'C');

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
-- Table structure for table `job1`
--

CREATE TABLE `job1` (
  `job1_ID` int(11) NOT NULL,
  `CareerID` int(11) NOT NULL,
  `Company` text NOT NULL,
  `Pay` int(11) NOT NULL,
  `Pos1` text NOT NULL,
  `Pos2` text NOT NULL,
  `Pos3` text NOT NULL,
  `Des2` text NOT NULL,
  `Des3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job1`
--

INSERT INTO `job1` (`job1_ID`, `CareerID`, `Company`, `Pay`, `Pos1`, `Pos2`, `Pos3`, `Des2`, `Des3`) VALUES
(1, 1, 'Micron', 59000, 'Software Developer', 'SR. Software Developer\r\n', 'Lead Developer', 'Experience:5+ years as a Software Developer. ', 'Experience: 8+ Years hands on experience.'),
(2, 2, 'Micron', 40000, 'Information Security analyst (IT Engineer) ', 'SR. Security Analyst', 'Lead Security Analyst ', 'M.S.C.S, B.S.C.S, 5+ years experience', '8+ years experience as SR. Security\r\nAnalyst'),
(3, 3, 'Prosoft', 60000, 'Entry Level Web Developer', 'Web/Application Developer', 'Lead Web/Application Developer', '6+ years of web application development skills', '10+ Years experience, and 2+ team management experience ');

-- --------------------------------------------------------

--
-- Table structure for table `job1_skills`
--

CREATE TABLE `job1_skills` (
  `job1_skill_PrimaryKey` int(11) NOT NULL,
  `job1_skill_ID` int(11) NOT NULL,
  `job2_skill_ID` int(11) NOT NULL,
  `job3_skill_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job1_skills`
--

INSERT INTO `job1_skills` (`job1_skill_PrimaryKey`, `job1_skill_ID`, `job2_skill_ID`, `job3_skill_ID`) VALUES
(1, 1, 6, 6),
(2, 2, 7, 7),
(3, 3, 9, 8),
(4, 4, 2, 9),
(5, 5, 10, 10),
(6, 12, 12, 12);

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
(13, 9, 10),
(14, 11, 12),
(15, 11, 14),
(16, 12, 15),
(18, 15, 18),
(19, 3, 18),
(20, 12, 19),
(21, 3, 19),
(22, 20, 21),
(23, 1, 21),
(24, 22, 20),
(25, 23, 22);

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
(8, 'Perl'),
(9, 'SQL'),
(10, 'Git'),
(11, 'Linux'),
(12, 'Bachelor\'s in Computer Science'),
(13, 'Object Oriented Programming'),
(14, 'Assembly'),
(17, 'CSS'),
(18, 'JavaScript'),
(19, 'Bootstrap'),
(20, 'Data Structures');

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
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`userID`, `userName`, `password`, `email`, `firstName`, `lastName`, `gender`, `role`, `grade`) VALUES
(1, 'reed5204', 'hellothere', 'reed5204@vandals.uidaho.edu', 'Jordan', 'Reed', 'Female', 'Student', 'Junior'),
(12, 'treed', 'hellothere', 'jfkdls@fjdksl', 'Travis', 'Reed', 'Male', 'Advisor', NULL),
(15, 'billy2', 'hi', 'billy@bob.com', 'Billy', 'Bob', 'Male', 'Student', 'Freshman');

-- --------------------------------------------------------

--
-- Table structure for table `students_have_taken`
--

CREATE TABLE `students_have_taken` (
  `Have_Taken_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_have_taken`
--

INSERT INTO `students_have_taken` (`Have_Taken_ID`, `User_ID`, `Course_ID`, `Semester`, `Year`) VALUES
(1, 1, 11, 'Spring', 2011),
(2, 1, 12, 'Fall', 2011),
(3, 1, 1, 'Fall', 2022),
(4, 1, 15, 'Spring', 2015),
(5, 1, 2, 'Fall', 2011),
(6, 1, 6, 'Spring', 2022),
(7, 1, 4, 'Fall', 2020),
(8, 1, 3, 'Fall', 2020),
(9, 1, 13, 'Spring', 2015),
(10, 1, 23, 'Summer', 2019),
(11, 1, 17, 'Fall', 2014),
(12, 1, 22, 'Fall', 2013);

-- --------------------------------------------------------

--
-- Table structure for table `students_will_take`
--

CREATE TABLE `students_will_take` (
  `Will_Take_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_will_take`
--

INSERT INTO `students_will_take` (`Will_Take_ID`, `User_ID`, `Course_ID`, `Semester`, `Year`) VALUES
(1, 1, 10, 'Fall', 2023),
(2, 1, 17, 'Fall', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `student_take`
--

CREATE TABLE `student_take` (
  `Course_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `Career_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_career`
--

CREATE TABLE `user_career` (
  `User_Career_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Career_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_career`
--

INSERT INTO `user_career` (`User_Career_ID`, `User_ID`, `Career_ID`) VALUES
(1, 1, 1),
(2, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_degree`
--

CREATE TABLE `user_degree` (
  `User_Degree_ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `DegreeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_degree`
--

INSERT INTO `user_degree` (`User_Degree_ID`, `userID`, `DegreeID`) VALUES
(1, 1, 1),
(2, 15, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adv_students`
--
ALTER TABLE `adv_students`
  ADD PRIMARY KEY (`Adv_Students_ID`),
  ADD KEY `Career_ID` (`Career_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`CareerID`);

--
-- Indexes for table `careers_req_skills`
--
ALTER TABLE `careers_req_skills`
  ADD PRIMARY KEY (`CRS_ID`),
  ADD KEY `Career_ID` (`Career_ID`),
  ADD KEY `Skill_ID` (`Skill_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `course_skills`
--
ALTER TABLE `course_skills`
  ADD PRIMARY KEY (`Course_Skill_ID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `Skill_ID` (`Skill_ID`);

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
  ADD KEY `course foreign key` (`Course_ID`),
  ADD KEY `degree foreign key` (`DegreeID`);

--
-- Indexes for table `degree_min_grade_req`
--
ALTER TABLE `degree_min_grade_req`
  ADD PRIMARY KEY (`Min_GradeID`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `DegreeID` (`DegreeID`);

--
-- Indexes for table `full_degree`
--
ALTER TABLE `full_degree`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `job1`
--
ALTER TABLE `job1`
  ADD PRIMARY KEY (`job1_ID`);

--
-- Indexes for table `job1_skills`
--
ALTER TABLE `job1_skills`
  ADD PRIMARY KEY (`job1_skill_PrimaryKey`);

--
-- Indexes for table `prereq`
--
ALTER TABLE `prereq`
  ADD PRIMARY KEY (`PreID`),
  ADD KEY `PrereqID` (`Prereq_ID`),
  ADD KEY `CourseID` (`Course_ID`),
  ADD KEY `PrereqID_2` (`Prereq_ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`Skill_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`userID`,`userName`,`email`);

--
-- Indexes for table `students_have_taken`
--
ALTER TABLE `students_have_taken`
  ADD PRIMARY KEY (`Have_Taken_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `students_will_take`
--
ALTER TABLE `students_will_take`
  ADD PRIMARY KEY (`Will_Take_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `user_career`
--
ALTER TABLE `user_career`
  ADD PRIMARY KEY (`User_Career_ID`),
  ADD KEY `Career_ID` (`Career_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `user_degree`
--
ALTER TABLE `user_degree`
  ADD PRIMARY KEY (`User_Degree_ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `DegreeID` (`DegreeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adv_students`
--
ALTER TABLE `adv_students`
  MODIFY `Adv_Students_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `CareerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `careers_req_skills`
--
ALTER TABLE `careers_req_skills`
  MODIFY `CRS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `course_skills`
--
ALTER TABLE `course_skills`
  MODIFY `Course_Skill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `DegreeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `degree_categories`
--
ALTER TABLE `degree_categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `degree_category_accepted_courses`
--
ALTER TABLE `degree_category_accepted_courses`
  MODIFY `_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `degree_category_req`
--
ALTER TABLE `degree_category_req`
  MODIFY `Deg_Cat_ReqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `degree_classes_req`
--
ALTER TABLE `degree_classes_req`
  MODIFY `Degree_CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `degree_min_grade_req`
--
ALTER TABLE `degree_min_grade_req`
  MODIFY `Min_GradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `full_degree`
--
ALTER TABLE `full_degree`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `job1`
--
ALTER TABLE `job1`
  MODIFY `job1_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job1_skills`
--
ALTER TABLE `job1_skills`
  MODIFY `job1_skill_PrimaryKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prereq`
--
ALTER TABLE `prereq`
  MODIFY `PreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `Skill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students_have_taken`
--
ALTER TABLE `students_have_taken`
  MODIFY `Have_Taken_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students_will_take`
--
ALTER TABLE `students_will_take`
  MODIFY `Will_Take_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_career`
--
ALTER TABLE `user_career`
  MODIFY `User_Career_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_degree`
--
ALTER TABLE `user_degree`
  MODIFY `User_Degree_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `careers_req_skills`
--
ALTER TABLE `careers_req_skills`
  ADD CONSTRAINT `careers_req_skills_ibfk_1` FOREIGN KEY (`Career_ID`) REFERENCES `careers` (`CareerID`),
  ADD CONSTRAINT `careers_req_skills_ibfk_2` FOREIGN KEY (`Skill_ID`) REFERENCES `skills` (`Skill_ID`);

--
-- Constraints for table `course_skills`
--
ALTER TABLE `course_skills`
  ADD CONSTRAINT `course_skills_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `course_skills_ibfk_2` FOREIGN KEY (`Skill_ID`) REFERENCES `skills` (`Skill_ID`);

--
-- Constraints for table `degree_category_accepted_courses`
--
ALTER TABLE `degree_category_accepted_courses`
  ADD CONSTRAINT `degree_category_accepted_courses_ibfk_1` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`degreeID`),
  ADD CONSTRAINT `degree_category_accepted_courses_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `degree_categories` (`categoryID`),
  ADD CONSTRAINT `degree_category_accepted_courses_ibfk_3` FOREIGN KEY (`Accepted_Courses`) REFERENCES `courses` (`Course_ID`);

--
-- Constraints for table `degree_category_req`
--
ALTER TABLE `degree_category_req`
  ADD CONSTRAINT `degree_category_req_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `degree_categories` (`categoryID`),
  ADD CONSTRAINT `degree_category_req_ibfk_2` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`degreeID`);

--
-- Constraints for table `degree_classes_req`
--
ALTER TABLE `degree_classes_req`
  ADD CONSTRAINT `course foreign key` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `degree foreign key` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`degreeID`);

--
-- Constraints for table `degree_min_grade_req`
--
ALTER TABLE `degree_min_grade_req`
  ADD CONSTRAINT `degree_min_grade_req_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `degree_min_grade_req_ibfk_2` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`degreeID`);

--
-- Constraints for table `prereq`
--
ALTER TABLE `prereq`
  ADD CONSTRAINT `foreign_key_course` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`),
  ADD CONSTRAINT `foreign_key_prereq` FOREIGN KEY (`Prereq_ID`) REFERENCES `courses` (`Course_ID`);

--
-- Constraints for table `students_have_taken`
--
ALTER TABLE `students_have_taken`
  ADD CONSTRAINT `students_have_taken_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `students` (`userID`),
  ADD CONSTRAINT `students_have_taken_ibfk_2` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`);

--
-- Constraints for table `students_will_take`
--
ALTER TABLE `students_will_take`
  ADD CONSTRAINT `students_will_take_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `students` (`userID`),
  ADD CONSTRAINT `students_will_take_ibfk_2` FOREIGN KEY (`Course_ID`) REFERENCES `courses` (`Course_ID`);

--
-- Constraints for table `user_career`
--
ALTER TABLE `user_career`
  ADD CONSTRAINT `user_career_ibfk_1` FOREIGN KEY (`Career_ID`) REFERENCES `careers` (`CareerID`),
  ADD CONSTRAINT `user_career_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `students` (`userID`);

--
-- Constraints for table `user_degree`
--
ALTER TABLE `user_degree`
  ADD CONSTRAINT `user_degree_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `students` (`userID`),
  ADD CONSTRAINT `user_degree_ibfk_2` FOREIGN KEY (`DegreeID`) REFERENCES `degrees` (`degreeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
