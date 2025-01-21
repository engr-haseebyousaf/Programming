-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 07:21 AM
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
-- Database: `wapex`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_time`
--

CREATE TABLE `class_time` (
  `classTimeId` bigint(255) NOT NULL,
  `classTime` time NOT NULL,
  `classTimeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_time`
--

INSERT INTO `class_time` (`classTimeId`, `classTime`, `classTimeDescription`) VALUES
(2, '11:20:00', 'this is the first Class'),
(3, '23:53:00', 'Ducimus dolore ut a'),
(4, '14:56:00', 'Animi omnis possimu'),
(5, '14:56:00', 'this is the duplicated value');

-- --------------------------------------------------------

--
-- Table structure for table `multi_staff`
--

CREATE TABLE `multi_staff` (
  `staffId` bigint(255) NOT NULL,
  `staffFirstName` varchar(255) NOT NULL,
  `staffLastName` varchar(255) NOT NULL,
  `staffPhone` varchar(255) NOT NULL,
  `staffEmail` varchar(255) NOT NULL,
  `staffCNIC` varchar(255) NOT NULL,
  `staffPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multi_staff`
--

INSERT INTO `multi_staff` (`staffId`, `staffFirstName`, `staffLastName`, `staffPhone`, `staffEmail`, `staffCNIC`, `staffPic`) VALUES
(5, 'Judah', 'Castaneda', '+1 (686) 911-1694', 'mohyzoj@mailinator.com', 'Nisi libero alias di', 'a:4:{i:0;s:20:\"17-30-33-598889.jpeg\";i:1;s:20:\"17-30-33-792934.jpeg\";i:2;s:20:\"17-30-33-651988.jpeg\";i:3;s:20:\"17-30-33-411564.jpeg\";}'),
(6, 'Kaitlin', 'Wood', '+1 (891) 534-7962', 'pazuracuf@mailinator.com', 'Veritatis perspiciat', 'a:4:{i:0;s:20:\"17-30-53-220515.jpeg\";i:1;s:20:\"17-30-53-678311.jpeg\";i:2;s:20:\"17-30-53-709352.jpeg\";i:3;s:20:\"17-30-53-785136.jpeg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `multi_student`
--

CREATE TABLE `multi_student` (
  `studentId` bigint(255) NOT NULL,
  `studentFirstName` varchar(255) NOT NULL,
  `studentLastName` varchar(255) NOT NULL,
  `studentPhone` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `studentCNIC` varchar(255) NOT NULL,
  `studentPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multi_student`
--

INSERT INTO `multi_student` (`studentId`, `studentFirstName`, `studentLastName`, `studentPhone`, `studentEmail`, `studentCNIC`, `studentPic`) VALUES
(2, 'Nerea', 'Cooke', '+1 (616) 686-4267', 'zaqijuboky@mailinator.com', 'Est ex id necessita', 'a:4:{i:0;s:20:\"22-21-16-659125.jpeg\";i:1;s:20:\"22-21-16-849286.jpeg\";i:2;s:20:\"22-21-16-104516.jpeg\";i:3;s:20:\"22-21-16-625178.jpeg\";}'),
(3, 'Michael', 'Chaney', '+1 (529) 339-7054', 'tofydak@mailinator.com', 'Ab odit Nam ut offic', 'a:4:{i:0;s:20:\"22-21-32-467661.jpeg\";i:1;s:20:\"22-21-32-591135.jpeg\";i:2;s:20:\"22-21-32-395860.jpeg\";i:3;s:20:\"22-21-32-358832.jpeg\";}'),
(4, 'Portia', 'Barber', '+1 (298) 106-3113', 'kupehuqi@mailinator.com', 'Voluptatem Nulla co', 'a:4:{i:0;s:20:\"22-21-51-908347.jpeg\";i:1;s:20:\"22-21-51-868300.jpeg\";i:2;s:20:\"22-21-51-962219.jpeg\";i:3;s:20:\"22-21-51-387391.jpeg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `multi_teacher`
--

CREATE TABLE `multi_teacher` (
  `teacherId` bigint(255) NOT NULL,
  `teacherFirstName` varchar(255) NOT NULL,
  `teacherLastName` varchar(255) NOT NULL,
  `teacherPhone` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `teacherPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multi_teacher`
--

INSERT INTO `multi_teacher` (`teacherId`, `teacherFirstName`, `teacherLastName`, `teacherPhone`, `teacherEmail`, `teacherPic`) VALUES
(5, 'John', 'Mclaughlin', '+1 (717) 129-1054', 'sybyre@mailinator.c0', 'a:4:{i:0;s:20:\"16-16-59-534343.jpeg\";i:1;s:20:\"16-16-59-636854.jpeg\";i:2;s:20:\"16-16-59-587740.jpeg\";i:3;s:20:\"16-16-59-844213.jpeg\";}'),
(7, 'Rajah', 'Leach', '+1 (822) 336-6355', 'jecawomyp@mailinator.com', 'a:4:{i:0;s:20:\"17-18-41-269005.jpeg\";i:1;s:20:\"17-18-41-522805.jpeg\";i:2;s:20:\"17-18-41-293006.jpeg\";i:3;s:20:\"17-18-41-562445.jpeg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `primary_key_student`
--

CREATE TABLE `primary_key_student` (
  `student_id` bigint(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_teacher` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `primary_key_student`
--

INSERT INTO `primary_key_student` (`student_id`, `student_name`, `student_teacher`) VALUES
(1, 'Susan Weiss', 7),
(2, 'Xerxes Hughes', 4),
(3, 'Paul Chandler', 4),
(4, 'Jillian Mccormick', 2),
(5, 'Phoebe Christensen', 4),
(6, 'without teacher', 0),
(7, 'duplicated student', 7),
(8, 'foreign', 3);

-- --------------------------------------------------------

--
-- Table structure for table `primary_key_teacher`
--

CREATE TABLE `primary_key_teacher` (
  `teacher_id` bigint(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `primary_key_teacher`
--

INSERT INTO `primary_key_teacher` (`teacher_id`, `teacher_name`) VALUES
(1, 'Maile Oneal'),
(2, 'Maile Oneal'),
(3, 'Maile Oneal'),
(4, 'Aiko Saunders'),
(5, 'Larissa Waller'),
(6, 'Amaya Christensen'),
(7, 'Lunea Rutledge');

-- --------------------------------------------------------

--
-- Table structure for table `relationshipmulticlasstime`
--

CREATE TABLE `relationshipmulticlasstime` (
  `classTimeId` bigint(255) NOT NULL,
  `classTime` time NOT NULL,
  `classTimeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationshipmulticlasstime`
--

INSERT INTO `relationshipmulticlasstime` (`classTimeId`, `classTime`, `classTimeDescription`) VALUES
(2, '11:20:00', 'this is the first Class'),
(3, '23:53:00', 'Ducimus dolore ut a'),
(4, '14:56:00', 'Animi omnis possimu'),
(5, '14:56:00', 'this is the duplicated value');

-- --------------------------------------------------------

--
-- Table structure for table `relationshipmultistudent`
--

CREATE TABLE `relationshipmultistudent` (
  `studentId` bigint(255) NOT NULL,
  `studentClass` bigint(255) NOT NULL,
  `studentTeacher` bigint(255) NOT NULL,
  `studentFirstName` varchar(255) NOT NULL,
  `studentLastName` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `studentPhone` varchar(255) NOT NULL,
  `studentCNIC` varchar(255) NOT NULL,
  `studentPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationshipmultistudent`
--

INSERT INTO `relationshipmultistudent` (`studentId`, `studentClass`, `studentTeacher`, `studentFirstName`, `studentLastName`, `studentEmail`, `studentPhone`, `studentCNIC`, `studentPic`) VALUES
(1, 0, 4, 'Naida', 'Osborn', 'ryjoniwuba@mailinator.com', '+1 (862) 145-2624', 'Eos omnis enim nulla', 'a:1:{i:0;s:20:\"08-55-18-787051.jpeg\";}'),
(2, 0, 5, 'Kieran', 'Parker', 'jazucijo@mailinator.com', '+1 (727) 544-6125', '3310315856125', 'a:1:{i:0;s:20:\"08-56-00-820275.jpeg\";}'),
(3, 4, 0, 'Jamal', 'Love', 'qehaqi@mailinator.com', '+1 (525) 549-2025', '33100325467415', 'a:4:{i:0;s:20:\"09-33-57-865473.jpeg\";i:1;s:20:\"09-33-57-958249.jpeg\";i:2;s:20:\"09-33-57-557770.jpeg\";i:3;s:20:\"09-33-57-730548.jpeg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `relationshipmultiteacher`
--

CREATE TABLE `relationshipmultiteacher` (
  `teacherId` bigint(255) NOT NULL,
  `teacherClass` bigint(255) NOT NULL,
  `teacherStudent` bigint(255) NOT NULL,
  `teacherFirstName` varchar(255) NOT NULL,
  `teacherLastName` varchar(255) NOT NULL,
  `teacherPhone` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `teacherPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationshipmultiteacher`
--

INSERT INTO `relationshipmultiteacher` (`teacherId`, `teacherClass`, `teacherStudent`, `teacherFirstName`, `teacherLastName`, `teacherPhone`, `teacherEmail`, `teacherPic`) VALUES
(2, 3, 3, 'Travis', 'Conrad', '+1 (854) 953-7837', 'dobomewa@mailinator.com', 'a:4:{i:0;s:20:\"09-59-21-964369.jpeg\";i:1;s:20:\"09-59-21-900073.jpeg\";i:2;s:20:\"09-59-21-338219.jpeg\";i:3;s:20:\"09-59-21-111838.jpeg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `relationshipstudent`
--

CREATE TABLE `relationshipstudent` (
  `studentId` bigint(255) NOT NULL,
  `studentClass` bigint(255) NOT NULL,
  `studentTeacher` bigint(255) NOT NULL,
  `studentFirstName` varchar(255) NOT NULL,
  `studentLastName` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `studentPhone` varchar(255) NOT NULL,
  `studentCNIC` varchar(255) NOT NULL,
  `studentPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationshipstudent`
--

INSERT INTO `relationshipstudent` (`studentId`, `studentClass`, `studentTeacher`, `studentFirstName`, `studentLastName`, `studentEmail`, `studentPhone`, `studentCNIC`, `studentPic`) VALUES
(1, 0, 0, 'Raja', 'Mclean', 'vyde@mailinator.com', '+1 (813) 385-7144', 'Non repellendus Mod', '20-00-18-310780.png'),
(5, 0, 0, 'Caesar', 'Fernandez', 'setovun@mailinator.com', '+1 (138) 727-3545', 'Consequatur Quae do', '18-09-41-108693.jpeg'),
(6, 0, 0, 'Caesar', 'Fernandez', 'setovun@mailinator.com', '+1 (138) 727-3545', 'Consequatur Quae do', '18-09-46-209369.jpeg'),
(7, 0, 0, 'Audrey', 'Velasquez', 'powucatof@mailinator.com', '+1 (635) 313-8009', 'Dolores odio fugiat ', '18-09-50-179551.jpeg'),
(8, 0, 0, 'Dawn', 'Middleton', 'zyvikejeju@mailinator.com', '+1 (141) 333-7114', 'Laudantium aut est ', '20-09-07-559830.jpeg'),
(9, 3, 0, 'Vincent', 'Higgins', 'fufydi@mailinator.com', '+1 (707) 394-1318', 'In ab dolores et nih', '20-09-09-919788.jpeg'),
(10, 2, 0, 'Mannix', 'Higgins', 'vigoxif@mailinator.com', '+1 (502) 563-4869', 'Quod perferendis rep', '09-09-18-708814.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `relationshipteacher`
--

CREATE TABLE `relationshipteacher` (
  `teacherId` bigint(255) NOT NULL,
  `teacherClass` bigint(255) NOT NULL,
  `teacherStudent` bigint(255) NOT NULL,
  `teacherFirstName` varchar(255) NOT NULL,
  `teacherLastName` varchar(255) NOT NULL,
  `teacherPhone` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `teacherPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relationshipteacher`
--

INSERT INTO `relationshipteacher` (`teacherId`, `teacherClass`, `teacherStudent`, `teacherFirstName`, `teacherLastName`, `teacherPhone`, `teacherEmail`, `teacherPic`) VALUES
(3, 3, 6, 'Ertuğrul', 'Gazi', '+1 (399) 946-8712', 'ertugrul@gmail.com', '06-09-18-204043.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `single_faculty`
--

CREATE TABLE `single_faculty` (
  `facultyId` bigint(255) NOT NULL,
  `facultyFirstName` varchar(255) NOT NULL,
  `facultyLastName` varchar(255) NOT NULL,
  `facultyPhone` varchar(255) NOT NULL,
  `facultyEmail` varchar(255) NOT NULL,
  `facultyCNIC` varchar(255) NOT NULL,
  `facultyPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `single_faculty`
--

INSERT INTO `single_faculty` (`facultyId`, `facultyFirstName`, `facultyLastName`, `facultyPhone`, `facultyEmail`, `facultyCNIC`, `facultyPic`) VALUES
(2, 'Aurelia', 'Simmons', '+1 (135) 467-9922', 'cefowahuf@mailinator.com', 'Omnis facilis ut vit', '07-08-46-121922.png');

-- --------------------------------------------------------

--
-- Table structure for table `single_student`
--

CREATE TABLE `single_student` (
  `studentId` bigint(255) NOT NULL,
  `studentFirstName` varchar(255) NOT NULL,
  `studentLastName` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `studentPhone` varchar(255) NOT NULL,
  `studentCNIC` varchar(255) NOT NULL,
  `studentPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `single_student`
--

INSERT INTO `single_student` (`studentId`, `studentFirstName`, `studentLastName`, `studentEmail`, `studentPhone`, `studentCNIC`, `studentPic`) VALUES
(1, 'Raja', 'Mclean', 'vyde@mailinator.com', '+1 (813) 385-7144', 'Non repellendus Mod', '20-00-18-310780.png'),
(4, 'Lee', 'Castaneda', 'nylulafiz@mailinator.com', '+1 (624) 908-3143', 'In nostrum dolor ut ', '20-08-14-515897.png');

-- --------------------------------------------------------

--
-- Table structure for table `single_teacher`
--

CREATE TABLE `single_teacher` (
  `teacherId` bigint(255) NOT NULL,
  `teacherFirstName` varchar(255) NOT NULL,
  `teacherLastName` varchar(255) NOT NULL,
  `teacherPhone` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `teacherPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `student_table_id` bigint(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_father_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone_number` varchar(255) NOT NULL,
  `student_cnic` varchar(255) NOT NULL,
  `student_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`student_table_id`, `student_name`, `student_father_name`, `student_email`, `student_phone_number`, `student_cnic`, `student_image`) VALUES
(1, 'Haseeb', 'Yousaf', 'haseeb@gmail.com', '0000000000', '331033215685', 'Untitled design (15).png-1724313096.png'),
(2, 'Haseeb', 'Yousaf', 'haseeb@gmail.com', '0000000000', '331033215685', 'Untitled design (15).png-1724313465.png'),
(3, 'Sami', 'Yousaf', 'sami@gmail.com', '000000000000', '216767689765464654', 'Untitled design (14).png-1724313505.png'),
(4, 'Mohsin', 'Yousaf', 'mohsin@gmail.com', '0000000000', '33100322456972', 'BORGES - Extra Light Olive Oil - 4 ltr.jpg-1724330941.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_time`
--
ALTER TABLE `class_time`
  ADD PRIMARY KEY (`classTimeId`);

--
-- Indexes for table `multi_staff`
--
ALTER TABLE `multi_staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `multi_student`
--
ALTER TABLE `multi_student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `multi_teacher`
--
ALTER TABLE `multi_teacher`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indexes for table `primary_key_student`
--
ALTER TABLE `primary_key_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `primary_key_teacher`
--
ALTER TABLE `primary_key_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `relationshipmulticlasstime`
--
ALTER TABLE `relationshipmulticlasstime`
  ADD PRIMARY KEY (`classTimeId`);

--
-- Indexes for table `relationshipmultistudent`
--
ALTER TABLE `relationshipmultistudent`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `relationshipmultiteacher`
--
ALTER TABLE `relationshipmultiteacher`
  ADD PRIMARY KEY (`teacherId`),
  ADD KEY `teacherClass` (`teacherClass`);

--
-- Indexes for table `relationshipstudent`
--
ALTER TABLE `relationshipstudent`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `relationshipteacher`
--
ALTER TABLE `relationshipteacher`
  ADD PRIMARY KEY (`teacherId`),
  ADD KEY `teacherClass` (`teacherClass`);

--
-- Indexes for table `single_faculty`
--
ALTER TABLE `single_faculty`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `single_student`
--
ALTER TABLE `single_student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `single_teacher`
--
ALTER TABLE `single_teacher`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`student_table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_time`
--
ALTER TABLE `class_time`
  MODIFY `classTimeId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `multi_staff`
--
ALTER TABLE `multi_staff`
  MODIFY `staffId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `multi_student`
--
ALTER TABLE `multi_student`
  MODIFY `studentId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `multi_teacher`
--
ALTER TABLE `multi_teacher`
  MODIFY `teacherId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `primary_key_student`
--
ALTER TABLE `primary_key_student`
  MODIFY `student_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `primary_key_teacher`
--
ALTER TABLE `primary_key_teacher`
  MODIFY `teacher_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `relationshipmulticlasstime`
--
ALTER TABLE `relationshipmulticlasstime`
  MODIFY `classTimeId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `relationshipmultistudent`
--
ALTER TABLE `relationshipmultistudent`
  MODIFY `studentId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `relationshipmultiteacher`
--
ALTER TABLE `relationshipmultiteacher`
  MODIFY `teacherId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `relationshipstudent`
--
ALTER TABLE `relationshipstudent`
  MODIFY `studentId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `relationshipteacher`
--
ALTER TABLE `relationshipteacher`
  MODIFY `teacherId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `single_faculty`
--
ALTER TABLE `single_faculty`
  MODIFY `facultyId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `single_student`
--
ALTER TABLE `single_student`
  MODIFY `studentId` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `single_teacher`
--
ALTER TABLE `single_teacher`
  MODIFY `teacherId` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `student_table_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relationshipmultiteacher`
--
ALTER TABLE `relationshipmultiteacher`
  ADD CONSTRAINT `relationshipmultiteacher_ibfk_1` FOREIGN KEY (`teacherClass`) REFERENCES `class_time` (`classTimeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relationshipteacher`
--
ALTER TABLE `relationshipteacher`
  ADD CONSTRAINT `relationshipteacher_ibfk_1` FOREIGN KEY (`teacherClass`) REFERENCES `class_time` (`classTimeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
