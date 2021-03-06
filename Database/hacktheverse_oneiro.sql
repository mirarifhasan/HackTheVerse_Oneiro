-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 08:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hacktheverse_oneiro`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `audio_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `iscovid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`audio_id`, `patient_id`, `path`, `iscovid`) VALUES
(1, 1, 'uploads/5fafad2e0ad801.92064750.mp3', 0),
(2, 1, 'uploads/5fafad36a92139.62642733.mp3', 0),
(3, 1, 'uploads/5fafb112921585.13095864.mp3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bp`
--

CREATE TABLE `bp` (
  `bp_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `datetime` varchar(24) NOT NULL,
  `high` int(11) NOT NULL,
  `low` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bp`
--

INSERT INTO `bp` (`bp_id`, `patient_id`, `datetime`, `high`, `low`) VALUES
(1, 1, '2020-11-12 12:58:41pm', 120, 80),
(2, 1, '2020-11-13 12:58:41pm', 140, 100),
(3, 1, '2020-11-14 12:58:41pm', 160, 120);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sender`, `receiver`, `text`) VALUES
(1, 1, 0, 'Hello Doctor. I am filling unwell.'),
(2, 0, 1, 'Can you explain a bit more, please.'),
(3, 0, 1, 'I am sending a nurse right now'),
(6, 1, 0, 'Thanks'),
(7, 0, 1, 'welcome');

-- --------------------------------------------------------

--
-- Table structure for table `heartrate`
--

CREATE TABLE `heartrate` (
  `heartrate_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `datetime` varchar(20) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicineprescription`
--

CREATE TABLE `medicineprescription` (
  `mp_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dose` varchar(8) NOT NULL,
  `power` varchar(8) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lng` decimal(9,6) NOT NULL,
  `lat` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `gender`, `age`, `phone`, `address`, `city`, `password`, `lng`, `lat`) VALUES
(1, 'Ishan', 'Male', 22, '1', '56, Bashabo', 'Dhaka', '1', '90.426679', '23.736994'),
(2, 'Shihab', 'Male', 21, '01534312345', '101, Mugdapara', 'Dhaka', '123456', '90.430292', '23.741549'),
(3, 'Tanbir', 'Male', 23, '01564978654', '88, Khilgaon', 'Dhaka', '123456', '90.440000', '23.750000');

-- --------------------------------------------------------

--
-- Table structure for table `sos`
--

CREATE TABLE `sos` (
  `sos_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `task` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sos`
--

INSERT INTO `sos` (`sos_id`, `patient_id`, `task`) VALUES
(1, 1, 'Emergency SOS Call'),
(2, 1, 'Emergency SOS Call'),
(3, 1, 'Emergency SOS Call'),
(4, 1, 'Emergency SOS Call'),
(5, 1, 'Emergency SOS Call');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`audio_id`);

--
-- Indexes for table `bp`
--
ALTER TABLE `bp`
  ADD PRIMARY KEY (`bp_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `heartrate`
--
ALTER TABLE `heartrate`
  ADD PRIMARY KEY (`heartrate_id`);

--
-- Indexes for table `medicineprescription`
--
ALTER TABLE `medicineprescription`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `sos`
--
ALTER TABLE `sos`
  ADD PRIMARY KEY (`sos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `audio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bp`
--
ALTER TABLE `bp`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `heartrate`
--
ALTER TABLE `heartrate`
  MODIFY `heartrate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicineprescription`
--
ALTER TABLE `medicineprescription`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sos`
--
ALTER TABLE `sos`
  MODIFY `sos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
