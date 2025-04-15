-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 يوليو 2024 الساعة 19:25
-- إصدار الخادم: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imperial_college`
--

-- --------------------------------------------------------

--
-- بنية الجدول `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `about`
--

INSERT INTO `about` (`id`, `name`, `description`, `image`) VALUES
(1, 'Best Teching Award 2016', 'Consectetur adipisicing elit, sed do eiusmod tempor incididunt labore dolore msagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullaasmco laboris nisi uiat aliquip ex ea commodo consequ', '2.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `bannercolleg`
--

CREATE TABLE `bannercolleg` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `short` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `bannercolleg`
--

INSERT INTO `bannercolleg` (`id`, `image`, `name`, `description`, `short`) VALUES
(7, 'log.png', 'frvdc', 'frcc', 'cfrcr'),
(8, 'img-10.jpg', 's', 's', 'ss');

-- --------------------------------------------------------

--
-- بنية الجدول `bannerdepart`
--

CREATE TABLE `bannerdepart` (
  `id` int(11) NOT NULL,
  `namedoctor` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `descriptiontitle` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `descimage` varchar(200) NOT NULL,
  `datebanner` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `bannerdepart`
--

INSERT INTO `bannerdepart` (`id`, `namedoctor`, `description`, `descriptiontitle`, `image`, `descimage`, `datebanner`) VALUES
(1, 'علاء فيصل', 'يتم بناء الموقع  لاعداد مشروع التخرج', 'بناء موقع ', 'img-03.jpg', '3.jpg', '2023-12-02'),
(2, 'علاء فيصل', 'ادارة قسم علوم البيانات فقط', 'موقع ادارة القسم', 'contact2.jpg', 'tab3.png', '2024-07-08');

-- --------------------------------------------------------

--
-- بنية الجدول `booklevelfour`
--

CREATE TABLE `booklevelfour` (
  `id` int(11) NOT NULL,
  `namebook` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `booklevelone`
--

CREATE TABLE `booklevelone` (
  `id` int(11) NOT NULL,
  `namebook` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `booklevelthree`
--

CREATE TABLE `booklevelthree` (
  `id` int(11) NOT NULL,
  `namebook` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `bookleveltow`
--

CREATE TABLE `bookleveltow` (
  `id` int(11) NOT NULL,
  `namebook` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `branddepartmint`
--

CREATE TABLE `branddepartmint` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `class_result`
--

CREATE TABLE `class_result` (
  `class_result_id` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `total_marks` varchar(11) NOT NULL,
  `obtain_marks` varchar(11) NOT NULL,
  `result_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `class_result`
--

INSERT INTO `class_result` (`class_result_id`, `roll_no`, `course_code`, `subject_code`, `semester`, `total_marks`, `obtain_marks`, `result_date`) VALUES
(1, 'MCS-S19-1', 'MCS', 'OOP', '2', '100', '98', '10-03-20'),
(2, '25', 'MCS', 'OOP', '2', '100', '93', '10-03-20'),
(3, '27', 'MCS', 'OOP', '2', '100', '92', '10-03-20'),
(4, '29', 'MCS', 'OOP', '2', '100', '98', '10-03-20'),
(5, '31', 'MCS', 'OOP', '2', '100', '96', '10-03-20'),
(6, '33', 'MCS', 'OOP', '2', '100', '97', '10-03-20'),
(7, '34', 'MCS', 'OOP', '2', '100', '94', '10-03-20'),
(8, '35', 'MCS', 'OOP', '2', '100', '91', '10-03-20'),
(9, '36', 'MCS', 'OOP', '2', '100', '90', '10-03-20'),
(10, 'MCS-S19-1', 'MCS', 'DBMS', '2', '100', '98', '10-03-20'),
(11, '25', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(12, '27', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(13, '29', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(14, '31', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(15, '33', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(16, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '64', '10-03-20'),
(17, '35', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(18, '36', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(28, 'MCS-S19-1', 'MCS', 'DLD', '2', '100', '76', '29-03-20'),
(35, '', '', '', '', '', '', '29-03-20'),
(36, '', '', '', '', '', '', '29-03-20'),
(37, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '80', '30-03-20'),
(38, '', '', '', '', '', '', '30-03-20'),
(39, '', '', '', '', '', '', '30-03-20'),
(40, '', '', '', '', '', '', '30-03-20'),
(41, '', '', '', '', '', '', '30-03-20'),
(42, '', '', '', '', '', '', '30-03-20'),
(43, '', '', '', '', '', '', '30-03-20'),
(44, '', '', '', '', '', '', '30-03-20'),
(45, '', '', '', '', '', '', '30-03-20'),
(46, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '80', '30-03-20'),
(47, '', '', '', '', '', '', '30-03-20'),
(48, '', '', '', '', '', '', '30-03-20'),
(49, '', '', '', '', '', '', '30-03-20'),
(50, '', '', '', '', '', '', '30-03-20'),
(51, '', '', '', '', '', '', '30-03-20'),
(52, '', '', '', '', '', '', '30-03-20'),
(53, '', '', '', '', '', '', '30-03-20'),
(54, '', '', '', '', '', '', '30-03-20');

-- --------------------------------------------------------

--
-- بنية الجدول `collegyear`
--

CREATE TABLE `collegyear` (
  `id` int(20) NOT NULL,
  `yearcolleg` year(4) NOT NULL,
  `endyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `collegyear`
--

INSERT INTO `collegyear` (`id`, `yearcolleg`, `endyear`) VALUES
(1, 2026, 2027),
(2, 2022, 2023);

-- --------------------------------------------------------

--
-- بنية الجدول `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `namecourse` varchar(100) NOT NULL,
  `codecours` varchar(20) NOT NULL,
  `doctorcours` varchar(100) NOT NULL,
  `course_credits` int(11) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `course`
--

INSERT INTO `course` (`id`, `namecourse`, `codecours`, `doctorcours`, `course_credits`, `date`) VALUES
(3, 'لغه عربية', 'lun', 'علاء', 7, '2024-06-03'),
(15, 'محاسبة', 'cou', 'alaoi', 88, '2024-06-16'),
(16, 'بايثون', 'W', 'علاءs', 33, '2024-06-16'),
(17, 'لغة انجليزية', 'eng', 'احمد ', 0, '2024-06-16'),
(18, 'مقدمة حاسوب', 'intrco', 'نورالدين', 6, '2024-06-16'),
(19, 'محاسبة ب', 'cou4', 'علاء', 66, '2024-07-07'),
(22, 'تحليل النظم', 'sys', 'ندى ', 4, '2024-07-10');

-- --------------------------------------------------------

--
-- بنية الجدول `course_materials`
--

CREATE TABLE `course_materials` (
  `course_id` int(11) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL,
  `sectid` int(11) NOT NULL,
  `yersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `course_subjects`
--

CREATE TABLE `course_subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `credit_hours` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `course_subjects`
--

INSERT INTO `course_subjects` (`subject_code`, `subject_name`, `course_code`, `semester`, `credit_hours`) VALUES
('CSPD', 'Communication Skills and Personality Development', 'MCS', 1, 3),
('DBMS', 'Database Management System', 'MCS', 2, 4),
('DLD', 'Data Logic and Design', 'MCS', 2, 3),
('Ds', 'Discrete Structure', 'MCS', 1, 3),
('I2C', 'Introduction to Computer Science', 'MCS', 1, 4),
('ITP', 'IT Project Management System', 'MIT', 2, 3),
('MBAD', 'Mobile Application Development', 'MIT', 2, 4),
('OOP', 'Object Oriented Programming', 'MCS', 2, 4),
('PF', 'Programming Fundamental', 'BSAI', 1, 4),
('SE', 'Software Engineering', 'MCS', 2, 3),
('WEB', 'Web Development', 'MCS', 2, 3);

-- --------------------------------------------------------

--
-- بنية الجدول `examschedule`
--

CREATE TABLE `examschedule` (
  `id` int(11) NOT NULL,
  `examdate` date NOT NULL,
  `time` varchar(200) NOT NULL,
  `courseid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `yearid` int(11) NOT NULL,
  `secid` int(11) NOT NULL,
  `dayeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `examschedule`
--

INSERT INTO `examschedule` (`id`, `examdate`, `time`, `courseid`, `levelid`, `yearid`, `secid`, `dayeid`) VALUES
(3, '2024-06-10', '21e', 3, 15, 2, 1, 2),
(4, '2024-06-19', '21e', 3, 15, 1, 1, 3),
(5, '2024-06-11', '21e', 3, 15, 2, 1, 4),
(6, '2024-06-11', '21e', 3, 15, 2, 1, 4),
(7, '2024-06-20', '21e', 3, 15, 1, 1, 6),
(8, '2024-06-20', '21e', 3, 15, 1, 1, 6),
(9, '2024-06-27', '324', 16, 15, 1, 2, 6),
(10, '2024-07-16', '8:00ص', 3, 17, 1, 0, 2),
(11, '2024-07-08', '8:00ص', 3, 18, 1, 0, 3),
(13, '2024-07-07', '8:00ص', 19, 17, 1, 0, 3);

-- --------------------------------------------------------

--
-- بنية الجدول `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `levelid` int(11) DEFAULT NULL,
  `file_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `files`
--

INSERT INTO `files` (`id`, `filename`, `course_id`, `size`, `type`, `levelid`, `file_path`) VALUES
(1, '', 3, '10mg', 'pdf', 15, ''),
(2, '', 15, '78mg', 'exel', 15, ''),
(3, '', 3, '10mg', 'pdf', 16, ''),
(4, '', 18, '100k', 'doc', 21, ''),
(5, 'في المناقشة.pptx', 16, '100k', 'pdf', 19, '');

-- --------------------------------------------------------

--
-- بنية الجدول `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `levelid` int(11) NOT NULL,
  `building` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lecture_date` date NOT NULL,
  `lecture_time` varchar(200) NOT NULL,
  `day_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `lectures`
--

INSERT INTO `lectures` (`id`, `room_number`, `room_name`, `teacher_name`, `levelid`, `building`, `course_id`, `lecture_date`, `lecture_time`, `day_id`) VALUES
(4, 77, 'العلاء', 'علاء الشجاع', 15, 'مبنى الكلية', 3, '2024-07-17', '8:00 ص', 2),
(5, 44, 'ب', 'علي', 15, 'مبنى الكلية', 3, '2024-07-13', '8:00 ص', 4),
(6, 88, 'قاعه 7', 'ندى', 16, 'مبنى الكلية', 17, '2024-07-19', '8:00 ص', 6),
(7, 9, 'الملحق', 'دعاء', 15, 'مبنى الملحق', 18, '2024-07-11', 'من الساعه 10 الى الساعه12', 7),
(8, 77, 'القاعه8', 'علاء الشجاع', 0, 'مبنى الكلية898', 3, '2024-07-05', '8:00 ص', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `lecturesfour`
--

CREATE TABLE `lecturesfour` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `teacher_name` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL,
  `building` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `lecture_date` date NOT NULL,
  `lecture_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `lecturesfour`
--

INSERT INTO `lecturesfour` (`id`, `room_number`, `room_name`, `teacher_name`, `levelid`, `building`, `course_id`, `day_id`, `lecture_date`, `lecture_time`) VALUES
(1, 9, 'المدرج', 'لحمد امين', 21, 'مبنى الكلية', 17, 4, '2024-07-11', '8:00 ص');

-- --------------------------------------------------------

--
-- بنية الجدول `lecturesthree`
--

CREATE TABLE `lecturesthree` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `levelid` int(11) NOT NULL,
  `building` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `lecture_date` date NOT NULL,
  `lecture_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `lecturesthree`
--

INSERT INTO `lecturesthree` (`id`, `room_number`, `room_name`, `teacher_name`, `levelid`, `building`, `course_id`, `day_id`, `lecture_date`, `lecture_time`) VALUES
(1, 9, 'المدرج', 'لحمد امين', 19, 'مبنى الملحق', 18, 6, '2024-07-17', '8:00 ص'),
(2, 45, 'rewf', 'ffdcsx', 19, 'rewfd', 17, 4, '2024-07-15', 'fedkugfr4eidkuj');

-- --------------------------------------------------------

--
-- بنية الجدول `lecturestow`
--

CREATE TABLE `lecturestow` (
  `id` int(11) NOT NULL,
  `room_number` int(12) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `levelid` int(11) NOT NULL,
  `building` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `lecture_date` date NOT NULL,
  `lecture_time` varchar(200) NOT NULL,
  `teacher_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `lecturestow`
--

INSERT INTO `lecturestow` (`id`, `room_number`, `room_name`, `levelid`, `building`, `course_id`, `day_id`, `lecture_date`, `lecture_time`, `teacher_name`) VALUES
(1, 77, 'العلاء', 17, 'مبنى الكلية', 15, 4, '2024-07-10', 'من الساعه 10 -الى الساعه 12', 'علاء الشجاع');

-- --------------------------------------------------------

--
-- بنية الجدول `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `levelname` varchar(100) NOT NULL,
  `section` varchar(20) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `level`
--

INSERT INTO `level` (`id`, `levelname`, `section`, `sectionid`, `level`) VALUES
(15, 'المستوى الاول', 'الترم الاول', 1, 1),
(16, 'المستوى الاول', 'الترم الثاني', 2, 1),
(17, 'المستوى الثاني', 'الترم الاول', 1, 2),
(18, 'المستوى الثاني', 'الترم الثاني', 2, 2),
(19, 'المستوى الثالث', 'الترم الاول', 1, 3),
(20, 'المستوى الثالث', 'الترم الثاني', 2, 3),
(21, 'المستوى  الرابع ', 'الترم الاول', 1, 4),
(24, 'المستوى الرابع', '', 2, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `levelcourse`
--

CREATE TABLE `levelcourse` (
  `id` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `coursid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `levelcourse`
--

INSERT INTO `levelcourse` (`id`, `levelid`, `coursid`) VALUES
(1, 2, 3),
(2, 2, 3),
(3, 2, 2),
(5, 3, 3),
(6, 15, 5),
(7, 15, 2),
(8, 15, 3),
(9, 15, 15),
(10, 15, 16),
(11, 16, 17),
(12, 16, 18),
(13, 17, 3),
(14, 18, 15),
(15, 17, 18),
(16, 17, 19),
(17, 21, 15);

-- --------------------------------------------------------

--
-- بنية الجدول `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `link`
--

INSERT INTO `link` (`id`, `name`, `link`) VALUES
(1, 'admin', 'yfduyfi 9u ighj'),
(2, 'alaoi', 'alaoi alaoi alaoi alaoi');

-- --------------------------------------------------------

--
-- بنية الجدول `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(2, 'admin@gmail.com', 'admin123*', 'Admin', ''),
(5, 'staff1@gmail.com', 'teacher123*', 'Teacher', ''),
(10, 'ala', '3098359', 'Student', ''),
(11, 'hh', '9656899', 'Student', ''),
(15, 'ala@gmail.com', 'ala123', 'Admin', ''),
(16, '????? ', '2428201', 'Student', ''),
(17, 'alaoi!gmail.com', '543070', 'Teacher', ''),
(18, 'alaoi!gmail.com', '1062449', 'Teacher', '');

-- --------------------------------------------------------

--
-- بنية الجدول `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `logo`
--

INSERT INTO `logo` (`id`, `image`) VALUES
(1, 'logo.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `mytable`
--

CREATE TABLE `mytable` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `course_code`) VALUES
('B.Fashion-S19-1', 'husnain', 'B.Fashion'),
('B.Fashion-S19-2', 'razarai663@gmail.com', 'B.Fashion'),
('MCS-S19-1', 'Muhammad Husnain Raza', 'MCS'),
('MCS-S19-2', 'razarai663@gmail.com', 'MCS'),
('MIT-S19-1', 'Muhammad Husnain Raza', 'MIT');

-- --------------------------------------------------------

--
-- بنية الجدول `newcolleg`
--

CREATE TABLE `newcolleg` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `title1` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `newcolleg`
--

INSERT INTO `newcolleg` (`id`, `title`, `title1`, `description`, `image`, `date`) VALUES
(1, 'Consectetur adipisicing elit sed do eiusmod tempor inunt labor', 'od tempor inunt labor', '\r\nTuesday, Apr 21, 2017\r\nConsectetur adipisicing elit sed do eiusmod tempor inunt labore... Read More\r\n\r\n', 'img-22.jpg', '2024-06-02'),
(2, 'al sj  iuuii efbhfbs', 'weibfiu', 'wiebffffffffffff ief wf\r\nebfwq\r\nf', 'img-11.jpg', '2024-06-02');

-- --------------------------------------------------------

--
-- بنية الجدول `newdept`
--

CREATE TABLE `newdept` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `title1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `newdept`
--

INSERT INTO `newdept` (`id`, `image`, `title`, `date`, `description`, `title1`) VALUES
(1, 'img-07.jpg', 'sa hsajbcjh wdsjc ewjd vsj wejv djhe', '2024-06-02', '                                    Consectetur adipisicing elit sed do eiusmod tempor inunt labore... Read Mor\r\n                                    Consectetur adipisicing elit sed do eiusmod tempor ', '                                    Consectetur adipisicing elit sed do eiusmod tempor inunt labore.'),
(2, 'img-17.jpg', 'dscdsfcsda', '2024-06-18', 'sd vwe fwdsv ewrd', 'sd v'),
(3, 'weeeeeee.png', 'as', '2024-07-09', 'efnwqja irev ', 'uiewni');

-- --------------------------------------------------------

--
-- بنية الجدول `newtext`
--

CREATE TABLE `newtext` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `refrenc`
--

CREATE TABLE `refrenc` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `refrence` varchar(200) CHARACTER SET utf8 NOT NULL,
  `levelnamelink` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `refrenc`
--

INSERT INTO `refrenc` (`id`, `name`, `refrence`, `levelnamelink`) VALUES
(1, 'alaoi', 'alayt uyfuy 6 76 ', ''),
(2, 'ala', 'ala book', ''),
(3, 'كتاب محاسبة', 'الكتاب المصري', 'المستوى الثاني الترم الثاني');

-- --------------------------------------------------------

--
-- بنية الجدول `sectionyear`
--

CREATE TABLE `sectionyear` (
  `id` int(11) NOT NULL,
  `sectionname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `sectionyear`
--

INSERT INTO `sectionyear` (`id`, `sectionname`) VALUES
(1, 'الترم الاول'),
(2, 'الترم الثاني');

-- --------------------------------------------------------

--
-- بنية الجدول `serves`
--

CREATE TABLE `serves` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `otherphone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecboock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `serves`
--

INSERT INTO `serves` (`id`, `image`, `title`, `phone`, `otherphone`, `email`, `fecboock`) VALUES
(2, 'img-06.jpg', 'لمعرفة خدمات الجامعة', 9900909, 8828282, 'ala@gmail.com', 'hasdha'),
(3, 'log.png', 'vcrfed', 465, 45654, 'admin@gmail.com', 'rasgraesg');

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`session_id`, `session`, `created_date`) VALUES
(1, 'S19', '2020-03-11 20:20:44');

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `studentName` varchar(200) NOT NULL,
  `email` varchar(111) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `session` varchar(100) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `prospectus_amount` varchar(200) NOT NULL,
  `applicant_status` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `other_phone` int(12) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `parentid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `place_of_birth` text NOT NULL,
  `matric_complition_date` date NOT NULL,
  `matric_certificate` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `total_marks` varchar(100) NOT NULL,
  `obtain_marks` varchar(50) NOT NULL,
  `state` varchar(10) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`id`, `roll_no`, `studentName`, `email`, `mobile_no`, `course_code`, `session`, `profile_image`, `prospectus_amount`, `applicant_status`, `cnic`, `dob`, `other_phone`, `gender`, `parentid`, `levelid`, `sectionid`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_certificate`, `semester`, `total_marks`, `obtain_marks`, `state`, `Username`, `password`, `admission_date`) VALUES
(5, '675785', 'علاء', 'a9la@gmail.com', 9090009, '', 'S19', 'a11.jpg', '', 'Admitted', '2344235', '2024-06-03', 87687687, 'Male', 0, 15, 1, 'taiz', 'لندان', '0000-00-00', '2024-06-11', 'download (2).jpg', '', '', '', '', 'ala', '3098359', '2024-06-13'),
(6, '9999', 'hh', 'amgedali77@gmail.com', 2147483647, '', 'S19', 'banner1.jpg', '', 'Admitted', '8889989', '', 99009009, 'Male', 0, 17, 0, 'taiz', 'taiz', 'باريس', '2024-06-23', 'juicer.jpg', '', '', '', '', 'hh', '9656899', '2024-06-23'),
(7, '989898', 'انهار ', 'anhar@gmail.com', 777333888, '', 'S19', 'img-01.jpg', '', 'Admitted', '90909090', '2024-07-20', 777333777, 'Female', 0, 19, 0, 'تعز', 'تعز', 'تعز', '2024-07-20', 'img-05.jpg', '', '', '', '', 'انهار ', '2428201', '2024-07-20');

-- --------------------------------------------------------

--
-- بنية الجدول `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `course_code`, `subject_code`, `semester`, `student_id`, `attendance`, `attendance_date`) VALUES
(1, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(2, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(3, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(4, 'MCS', 'DBMS', 2, 'MCS-S19-1', 0, '15-03-20'),
(5, 'MCS', 'DLD', 2, 'MCS-S19-1', 1, '15-03-20'),
(6, 'MCS', 'OOP', 2, 'MCS-S19-1', 1, '15-03-20'),
(7, 'MCS', 'SE', 2, 'MCS-S19-1', 0, '15-03-20'),
(8, 'MCS', 'WEB', 2, 'MCS-S19-1', 1, '15-03-20');

-- --------------------------------------------------------

--
-- بنية الجدول `student_courses`
--

CREATE TABLE `student_courses` (
  `student_course_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `student_courses`
--

INSERT INTO `student_courses` (`student_course_id`, `course_code`, `semester`, `roll_no`, `subject_code`, `session`, `assign_date`) VALUES
(1, 'MCS', 2, 'MCS-S19-1', 'OOP', 'S19', '15-03-20'),
(2, 'MCS', 2, 'MCS-S19-1', 'DBMS', 'S19', '15-03-20'),
(3, 'MCS', 2, 'MCS-S19-1', 'DLD', 'S19', '15-03-20'),
(4, 'MCS', 2, 'MCS-S19-1', 'SE', 'S19', '15-03-20'),
(5, 'MCS', 2, 'MCS-S19-1', 'WEB', 'S19', '15-03-20');

-- --------------------------------------------------------

--
-- بنية الجدول `student_fee`
--

CREATE TABLE `student_fee` (
  `fee_voucher` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `student_fee`
--

INSERT INTO `student_fee` (`fee_voucher`, `roll_no`, `amount`, `posting_date`, `status`) VALUES
(3, '121', 1212, '2024-05-22 21:15:08', 'Paid'),
(4, '121', 1212, '2024-05-24 20:59:41', 'Paid'),
(5, '766587', 1212, '2024-06-21 16:37:46', 'Paid'),
(6, '121', 0, '2024-06-21 16:38:47', 'Paid'),
(7, '121', 90, '2024-06-21 16:42:47', 'Paid'),
(8, '989898', 888, '2024-07-20 16:43:00', 'Paid'),
(9, '989898', 888, '2024-07-20 16:43:24', 'Paid'),
(10, '989898', 133, '2024-07-20 16:43:48', 'Paid');

-- --------------------------------------------------------

--
-- بنية الجدول `student_info`
--

CREATE TABLE `student_info` (
  `roll_no` varchar(20) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `session` varchar(10) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `prospectus_amount` varchar(10) NOT NULL,
  `applicant_status` varchar(20) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `other_phone` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `parentid` int(20) NOT NULL,
  `levelid` int(20) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `current_address` varchar(150) NOT NULL,
  `place_of_birth` varchar(150) NOT NULL,
  `matric_complition_date` varchar(10) NOT NULL,
  `matric_certificate` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtain_marks` int(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `student_info`
--

INSERT INTO `student_info` (`roll_no`, `middle_name`, `email`, `mobile_no`, `course_code`, `session`, `profile_image`, `prospectus_amount`, `applicant_status`, `cnic`, `dob`, `other_phone`, `gender`, `parentid`, `levelid`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_certificate`, `semester`, `total_marks`, `obtain_marks`, `state`, `Username`, `password`, `admission_date`) VALUES
('121', 'alaooi', 'ala@gmail.com', '774252137', 'BSAI', '??? ??????', '', 'Yes', 'Admitted', '2344235', '2024-05-19', '', 'Male', 0, 0, 'taiz', 'taiz', 'taiz', '2024-05-20', '', 0, 0, 0, '', '', '', '2024-05-19 12:52:47');

-- --------------------------------------------------------

--
-- بنية الجدول `studresulte`
--

CREATE TABLE `studresulte` (
  `id` int(200) NOT NULL,
  `levelid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `avregtotal` int(11) NOT NULL,
  `yearid` int(11) NOT NULL,
  `secid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `studresulte`
--

INSERT INTO `studresulte` (`id`, `levelid`, `courseid`, `studid`, `avregtotal`, `yearid`, `secid`) VALUES
(1, 15, 3, 5, 43, 1, 1),
(2, 15, 15, 5, 34, 1, 1),
(4, 15, 3, 5, 90, 1, 2),
(5, 15, 15, 5, 90, 1, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `tblcoursadnclass`
--

CREATE TABLE `tblcoursadnclass` (
  `id` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `coursid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `tbldayes`
--

CREATE TABLE `tbldayes` (
  `id` int(11) NOT NULL,
  `namedayes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tbldayes`
--

INSERT INTO `tbldayes` (`id`, `namedayes`) VALUES
(1, 'السبت'),
(2, 'الاحد'),
(3, 'الاثنين'),
(4, 'الثلثا'),
(5, 'الاربعاء'),
(6, 'الخميس'),
(7, 'الجمعة');

-- --------------------------------------------------------

--
-- بنية الجدول `tblresulte`
--

CREATE TABLE `tblresulte` (
  `id` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `avregtotal` int(11) NOT NULL,
  `yearid` int(11) NOT NULL,
  `secid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `tblresulte`
--

INSERT INTO `tblresulte` (`id`, `levelid`, `courseid`, `studid`, `avregtotal`, `yearid`, `secid`) VALUES
(1, 15, 3, 5, 43, 1, 1),
(2, 15, 15, 5, 34, 1, 1),
(3, 15, 16, 5, 34, 1, 1),
(4, 15, 3, 5, 90, 1, 2),
(5, 15, 15, 5, 90, 1, 2),
(6, 15, 16, 5, 90, 1, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `attendance_id` int(11) NOT NULL,
  `teacher_id` varchar(30) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(1, '3', 1, '09-03-20'),
(2, '3', 1, '10-03-20'),
(3, '3', 1, '11-04-20'),
(4, '3', 1, '30-03-20'),
(5, '2', 0, '30-03-20'),
(6, '4', 0, '20-07-24');

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `teacher_courses_id` int(11) NOT NULL,
  `namecourse` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL,
  `total_classes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_courses`
--

INSERT INTO `teacher_courses` (`teacher_courses_id`, `namecourse`, `semester`, `teacher_id`, `subject_code`, `assign_date`, `total_classes`) VALUES
(1, 'MCS', 2, '3', 'OOP', '27-03-20', 30),
(2, 'MCS', 2, '1', 'DBMS', '27-03-20', 30),
(3, 'MCS', 2, '3', 'DLD', '27-03-20', 30),
(4, 'MCS', 2, '1', 'SE', '27-03-20', 30),
(5, 'MCS', 2, '3', 'WEB', '27-03-20', 30),
(6, 'MCS', 2, '2', 'DBMS', '24-05-24', 1),
(7, 'MCS', 2, '2', 'DBMS', '20-06-24', 1),
(8, 'MIT', 44, '2', 'OOP', '20-06-24', 44),
(9, 'MIT', 44, '2', 'OOP', '20-06-24', 44);

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_info`
--

CREATE TABLE `teacher_info` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `profile_image` blob NOT NULL,
  `teacher_status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `application_status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `cnic` varchar(15) CHARACTER SET utf8 NOT NULL,
  `dob` varchar(15) CHARACTER SET utf8 NOT NULL,
  `other_phone` int(11) NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `permanent_address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `current_address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `place_of_birth` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Username` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `matric_complition_date` varchar(10) NOT NULL,
  `matric_awarded_date` varchar(10) NOT NULL,
  `matric_certificate` varchar(100) NOT NULL,
  `fa_complition_date` varchar(10) NOT NULL,
  `fa_awarded_date` varchar(10) NOT NULL,
  `fa_certificate` varchar(100) NOT NULL,
  `ba_complition_date` varchar(10) NOT NULL,
  `ba_awarded_date` varchar(10) NOT NULL,
  `ba_certificate` varchar(100) NOT NULL,
  `ma_complition_date` varchar(10) NOT NULL,
  `ma_awarded_date` varchar(100) NOT NULL,
  `ma_certificate` varchar(101) NOT NULL,
  `last_qualification` varchar(20) NOT NULL,
  `state` varchar(20) CHARACTER SET utf8 NOT NULL,
  `hire_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `phone_no`, `profile_image`, `teacher_status`, `application_status`, `cnic`, `dob`, `other_phone`, `gender`, `permanent_address`, `current_address`, `place_of_birth`, `Username`, `password`, `matric_complition_date`, `matric_awarded_date`, `matric_certificate`, `fa_complition_date`, `fa_awarded_date`, `fa_certificate`, `ba_complition_date`, `ba_awarded_date`, `ba_certificate`, `ma_complition_date`, `ma_awarded_date`, `ma_certificate`, `last_qualification`, `state`, `hire_date`) VALUES
(2, 'Teacher', '1', '1', '', 'staff1@gmail.com', '9807367624', 0x696d616765732e706e67, 'Permanent', 'Yes', '8793', '1987-01-17', 0, 'Male', 'abc', 'def', 'ghij', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18-06-21'),
(4, 'ala', 'fisal', 'alshoga', '', 'alaoi!gmail.com', '774252137', 0x6c6f672e706e67, 'Permanent', 'Yes', '2323e2', '2024-07-20', 774252137, 'Male', 'تعز', 'تعز', 'تعز', '', '1062449', '2024-07-12', '2024-07-20', 'img-14.jpg', '2024-07-03', '2024-07-17', 'img-11.jpg', '2024-07-11', '2024-07-03', 'img-12.jpg', '2024-07-09', '2024-07-16', 'img-10.jpg', '', '', '20-07-24');

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_salary_allowances`
--

CREATE TABLE `teacher_salary_allowances` (
  `teacher_id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `medical_allowance` int(11) NOT NULL,
  `hr_allowance` int(11) NOT NULL,
  `scale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_salary_allowances`
--

INSERT INTO `teacher_salary_allowances` (`teacher_id`, `basic_salary`, `medical_allowance`, `hr_allowance`, `scale`) VALUES
(1, 40000, 5, 10, 15),
(2, 55000, 7, 15, 18),
(3, 43000, 5, 8, 14);

-- --------------------------------------------------------

--
-- بنية الجدول `teacher_salary_report`
--

CREATE TABLE `teacher_salary_report` (
  `salary_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `paid_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(1, 1, 46000, 'Paid', '2020-03-27 11:28:57'),
(35, 2, 67100, 'Paid', '2024-06-21 17:42:26'),
(36, 1, 46000, 'Paid', '2024-06-21 17:42:52'),
(37, 3, 48590, 'Paid', '2024-06-21 17:43:26'),
(38, 3, 48590, 'Paid', '2024-06-21 17:44:16');

-- --------------------------------------------------------

--
-- بنية الجدول `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `timing_from` varchar(10) NOT NULL,
  `timing_to` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(1, 'MCS', 2, '18:00', '21:00', '1', 'OOP', 21),
(2, 'MCS', 2, '18:00', '21:00', '2', 'DBMS', 21),
(3, 'AHL', 1, '13:51', '23:52', '2', 'DLD', 34),
(4, 'MCS', 2, '18:00', '21:00', '4', 'SE', 21),
(5, 'MCS', 2, '18:00', '21:00', '5', 'WEB', 21),
(6, 'MIT', 2, '18:00', '21:00', '4', 'MBAD', 12),
(7, 'AHL', 1, '15:52', '13:51', '7', 'CSPD', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(11) NOT NULL,
  `day_name` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `weekdays`
--

INSERT INTO `weekdays` (`id`, `day_name`) VALUES
(1, 'الاثنين'),
(2, 'الثلثاء'),
(3, 'الاربعاء'),
(4, 'الخميس'),
(5, 'الجمعة'),
(6, 'السبت'),
(7, 'الاحد');

-- --------------------------------------------------------

--
-- بنية الجدول `yearcollegsection`
--

CREATE TABLE `yearcollegsection` (
  `id` int(20) NOT NULL,
  `yearid` int(20) NOT NULL,
  `secid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `yearcollegsection`
--

INSERT INTO `yearcollegsection` (`id`, `yearid`, `secid`) VALUES
(1, 1, 2),
(2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannercolleg`
--
ALTER TABLE `bannercolleg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannerdepart`
--
ALTER TABLE `bannerdepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booklevelfour`
--
ALTER TABLE `booklevelfour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booklevelone`
--
ALTER TABLE `booklevelone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booklevelthree`
--
ALTER TABLE `booklevelthree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookleveltow`
--
ALTER TABLE `bookleveltow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branddepartmint`
--
ALTER TABLE `branddepartmint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_result`
--
ALTER TABLE `class_result`
  ADD PRIMARY KEY (`class_result_id`);

--
-- Indexes for table `collegyear`
--
ALTER TABLE `collegyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `examschedule`
--
ALTER TABLE `examschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `levelid` (`levelid`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturesfour`
--
ALTER TABLE `lecturesfour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturesthree`
--
ALTER TABLE `lecturesthree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturestow`
--
ALTER TABLE `lecturestow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levelcourse`
--
ALTER TABLE `levelcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newcolleg`
--
ALTER TABLE `newcolleg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newdept`
--
ALTER TABLE `newdept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newtext`
--
ALTER TABLE `newtext`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refrenc`
--
ALTER TABLE `refrenc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectionyear`
--
ALTER TABLE `sectionyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serves`
--
ALTER TABLE `serves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`fee_voucher`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `studresulte`
--
ALTER TABLE `studresulte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcoursadnclass`
--
ALTER TABLE `tblcoursadnclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldayes`
--
ALTER TABLE `tbldayes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresulte`
--
ALTER TABLE `tblresulte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`teacher_courses_id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_salary_allowances`
--
ALTER TABLE `teacher_salary_allowances`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearcollegsection`
--
ALTER TABLE `yearcollegsection`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bannercolleg`
--
ALTER TABLE `bannercolleg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bannerdepart`
--
ALTER TABLE `bannerdepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booklevelfour`
--
ALTER TABLE `booklevelfour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booklevelone`
--
ALTER TABLE `booklevelone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booklevelthree`
--
ALTER TABLE `booklevelthree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookleveltow`
--
ALTER TABLE `bookleveltow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branddepartmint`
--
ALTER TABLE `branddepartmint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_result`
--
ALTER TABLE `class_result`
  MODIFY `class_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `collegyear`
--
ALTER TABLE `collegyear`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examschedule`
--
ALTER TABLE `examschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lecturesfour`
--
ALTER TABLE `lecturesfour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturesthree`
--
ALTER TABLE `lecturesthree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lecturestow`
--
ALTER TABLE `lecturestow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `levelcourse`
--
ALTER TABLE `levelcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newcolleg`
--
ALTER TABLE `newcolleg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newdept`
--
ALTER TABLE `newdept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newtext`
--
ALTER TABLE `newtext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refrenc`
--
ALTER TABLE `refrenc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sectionyear`
--
ALTER TABLE `sectionyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serves`
--
ALTER TABLE `serves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `student_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `fee_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studresulte`
--
ALTER TABLE `studresulte`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcoursadnclass`
--
ALTER TABLE `tblcoursadnclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldayes`
--
ALTER TABLE `tbldayes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblresulte`
--
ALTER TABLE `tblresulte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `teacher_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `yearcollegsection`
--
ALTER TABLE `yearcollegsection`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`levelid`) REFERENCES `level` (`id`);

--
-- القيود للجدول `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD CONSTRAINT `teacher_salary_report_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_salary_allowances` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
