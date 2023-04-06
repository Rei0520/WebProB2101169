-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2023 at 11:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BIT210_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `DailySchedule`
--

CREATE TABLE `DailySchedule` (
  `userID` char(5) NOT NULL,
  `workDate` date NOT NULL,
  `workLocation` varchar(50) NOT NULL,
  `workHours` varchar(20) NOT NULL,
  `workReport` varchar(500) NOT NULL,
  `supervisorComments` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DailySchedule`
--

INSERT INTO `DailySchedule` (`userID`, `workDate`, `workLocation`, `workHours`, `workReport`, `supervisorComments`) VALUES
('EMP01', '2023-03-22', 'Flexi-Hours', '9am-5pm', 'I have done Task 1', 'Good job'),
('EMP01', '2023-03-28', 'Hybrid', '10am-6pm', 'I have complete task 2', 'efer'),
('EMP02', '2023-04-01', 'Work-From-Home', '9am-5pm', 'I had a meeting with my client ', 'well done '),
('EMP02', '2023-03-30', 'Hybrid', '9am-5pm', 'I have created documents', 'well done '),
('EMP04', '2023-03-28', 'Hybrid', '9am-5pm', 'I have done task 5', 'NULL'),
('EMP04', '2023-03-26', 'Hybrid', '8am-4pm', 'I have created ppt', 'NULL'),
('EMP06', '2023-03-26', 'Hybrid', '8am-4pm', 'I have worked on task6 but I have not done yet', 'NULL'),
('EMP07', '2023-03-17', 'Work-From-Home', '9am-5pm', 'I have done take 10', 'NULL'),
('EMP07', '2023-03-20', 'Hybrid', '8am-4pm', 'I have done task 11', 'NULL'),
('EMP08', '2023-04-01', 'Flexi-Hours', '8am-4pm', 'I met my client at our office ', 'NULL'),
('EMP02', '2023-03-22', 'Hybrid', '9am-5pm', 'I have done task 2', 'Please contact with me as soon as possible  '),
('EMP10', '2023-03-30', 'Hybrid', '8am-4pm', 'I have done task 11', 'Good job');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE `DEPARTMENT` (
  `dptID` char(5) NOT NULL,
  `dptName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DEPARTMENT`
--

INSERT INTO `DEPARTMENT` (`dptID`, `dptName`) VALUES
('DPT01', 'IT Department'),
('DPT02', 'Finance Department'),
('DPT03', 'Marketing Department'),
('DPT04', 'HR Department');

-- --------------------------------------------------------

--
-- Table structure for table `FWARequest`
--

CREATE TABLE `FWARequest` (
  `requestID` varchar(20) NOT NULL,
  `userID` char(5) NOT NULL,
  `supervisorID` char(5) NOT NULL,
  `requestDate` date NOT NULL,
  `workType` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `reason` varchar(60) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `FWARequest`
--

INSERT INTO `FWARequest` (`requestID`, `userID`, `supervisorID`, `requestDate`, `workType`, `description`, `reason`, `status`, `comment`) VALUES
('REQ642953f4847a0', 'EMP01', 'SUP01', '2023-04-02', 'Flexi-Hours', 'Flexible working hour', 'I have an appointment ', 'accepted', 'Greate'),
('REQ6429547fca096', 'EMP02', 'SUP01', '2023-04-02', 'Work-From-Home', 'I will work from home ', 'I flee sick', 'accepted', 'It is acceptable '),
('REQ642956a186caa', 'EMP03', 'SUP01', '2023-04-02', 'Hybrid', 'I work from home and office ', 'I have a meeting and desk work', 'pending', 'NULL'),
('REQ64295744a061f', 'EMP04', 'SUP02', '2023-04-02', 'Flexi-Hours', 'I work from office ', 'I need to bring my son to hospital ', 'pending', 'NULL'),
('REQ642957834611f', 'EMP05', 'SUP02', '2023-04-02', 'Work-From-Home', 'I work from home', 'I can be done the task on my laptop', 'pending', 'NULL'),
('REQ6429582657245', 'EMP07', 'SUP03', '2023-04-02', 'Hybrid', 'I work from home and office ', 'I find it efficient ', 'accepted', 'I get it '),
('REQ64295937aa6f1', 'EMP08', 'SUP03', '2023-04-02', 'Flexi-Hours', 'I work from office ', 'I prefer the environment ', 'accepted', 'I understand'),
('REQ642e38138d4b7', 'EMP10', 'SUP01', '2023-04-06', 'Work-From-Home', 'I work from home', 'It is more effective', 'accepted', 'It is acceptable reason ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` char(5) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `utype` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `FWAStatus` varchar(30) DEFAULT NULL,
  `supervisorID` char(5) DEFAULT NULL,
  `dptID` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `fname`, `utype`, `email`, `FWAStatus`, `supervisorID`, `dptID`) VALUES
('EMP01', '642950adbc08b', 'Haruka Imakuraya', 1, 'haruka@gmail.com', 'Flexi-Hours', 'SUP01', 'DPT01'),
('EMP02', '642950f242c21', 'Rei Koyanagi', 1, 'rei@gmail.com', 'Work-From-Home', 'SUP01', 'DPT01'),
('EMP03', '642951158171d', 'Yuto Yamauchi', 1, 'yuto@gmail.com', 'NEW', 'SUP01', 'DPT01'),
('EMP04', '6429517ef1c0c', 'Margaret Smith', 1, 'margaret@gmail.com', 'NEW', 'SUP02', 'DPT02'),
('EMP05', '642951aec7831', 'Samantha Jones', 1, 'smantha@gmail.com', 'NEW', 'SUP02', 'DPT02'),
('EMP06', '642951e61cf85', 'Elizabeth Williams', 1, 'elizabeth@gmail.com', 'NEW', 'SUP02', 'DPT02'),
('EMP07', '64295250943fa', 'Oliver Brown', 1, 'oliver@gmail.com', 'Hybrid', 'SUP03', 'DPT03'),
('EMP08', '64295288510df', 'Jack Thomas', 1, 'Jack@gmail.com', 'Flexi-Hours', 'SUP03', 'DPT03'),
('EMP09', '642952bab1f88', 'Harry Davies', 1, 'harry@gmail.com', 'NEW', 'SUP03', 'DPT03'),
('EMP10', '64298523f13ee', 'Jacob Martin', 1, 'jacob@gmail.com', 'Work-From-Home', 'SUP01', 'DPT01'),
('HRA01', '64294e8684108', 'James Smith', 3, 'James@gmail.com', 'NEW', '', 'DPT04'),
('HRA02', '64294f262ad4e', 'Emma Williams', 3, 'emma@gmail.com', 'NEW', '', 'DPT04'),
('HRA03', '642e937cd4507', 'Sarah Garcia', 3, 'sarah@gmail.com', 'NEW', '', 'DPT04'),
('SUP01', '64294fcf919d3', 'John Brown', 2, 'Johe@gmail.com', 'NEW', '', 'DPT01'),
('SUP02', '6429503081659', 'Mary Miller', 2, 'mary@gmail.com', 'NEW', '', 'DPT02'),
('SUP03', '642950795007e', 'David Taylor', 2, 'david@gmail.com', 'NEW', '', 'DPT03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DailySchedule`
--
ALTER TABLE `DailySchedule`
  ADD KEY `employeeID_FK` (`userID`);

--
-- Indexes for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  ADD PRIMARY KEY (`dptID`);

--
-- Indexes for table `FWARequest`
--
ALTER TABLE `FWARequest`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `Supervisor_FK` (`supervisorID`),
  ADD KEY `department_FK` (`dptID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
