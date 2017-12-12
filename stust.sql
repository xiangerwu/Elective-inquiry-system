-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-11-22 16:18:43
-- 伺服器版本: 10.1.28-MariaDB
-- PHP 版本： 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `stust`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `Course_name` char(50) NOT NULL,
  `Course_number` char(10) NOT NULL,
  `Credit_hours` int(2) NOT NULL,
  `Department` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `course`
--

INSERT INTO `course` (`Course_name`, `Course_number`, `Credit_hours`, `Department`) VALUES
('Intro to Computer Science', 'CS1310', 4, 'CS'),
('Data Structures', 'CS3320', 4, 'CS'),
('Discrete Mathematics', 'MATH2410', 3, 'MATH'),
('Database', 'CS3380', 3, 'CS');

-- --------------------------------------------------------

--
-- 資料表結構 `grade_report`
--

CREATE TABLE `grade_report` (
  `Student_number` int(3) NOT NULL,
  `Section_identifider` int(4) NOT NULL,
  `Grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `grade_report`
--

INSERT INTO `grade_report` (`Student_number`, `Section_identifider`, `Grade`) VALUES
(8, 85, 'A'),
(8, 92, 'A'),
(8, 102, 'B'),
(17, 112, 'B'),
(17, 119, 'C'),
(8, 135, 'A');

-- --------------------------------------------------------

--
-- 資料表結構 `prerequisite`
--

CREATE TABLE `prerequisite` (
  `Course_number` char(15) NOT NULL,
  `Prerequisite_number` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `prerequisite`
--

INSERT INTO `prerequisite` (`Course_number`, `Prerequisite_number`) VALUES
('CS3380', 'CS3320'),
('CS3380', 'MATH2410'),
('CS3320', 'CS1310');

-- --------------------------------------------------------

--
-- 資料表結構 `section`
--

CREATE TABLE `section` (
  `Section_identifier` int(4) NOT NULL,
  `Course_number` char(10) NOT NULL,
  `Semester` char(10) NOT NULL,
  `Year` char(2) NOT NULL,
  `Instructor` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `section`
--

INSERT INTO `section` (`Section_identifier`, `Course_number`, `Semester`, `Year`, `Instructor`) VALUES
(85, 'MATH2410', 'Fall', '07', 'King'),
(92, 'CS1310', 'Fall', '07', 'Anderson'),
(102, 'CS3320', 'Spring', '08', 'Knuth'),
(112, 'MATH2410', 'Fall', '08', 'Chang'),
(119, 'CS1310', 'Fall', '08', 'Anderson'),
(135, 'CS3380', 'Fall', '08', 'Stone');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `Name` char(20) NOT NULL,
  `Student_number` int(3) NOT NULL,
  `Class` int(2) NOT NULL,
  `Major` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `student`
--

INSERT INTO `student` (`Name`, `Student_number`, `Class`, `Major`) VALUES
('Smith', 17, 1, 'CS'),
('Brown', 8, 1, 'CS');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `grade_report`
--
ALTER TABLE `grade_report`
  ADD UNIQUE KEY `Section_identifider` (`Section_identifider`);

--
-- 資料表索引 `section`
--
ALTER TABLE `section`
  ADD UNIQUE KEY `Section_identifier` (`Section_identifier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
