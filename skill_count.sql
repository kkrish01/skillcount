-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 11:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill_count`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `userid`, `experience`, `start_date`, `end_date`, `description`) VALUES
(1, 1, 'Full Stack Developer', '2023-05-02', '2023-10-10', 'As a Intern'),
(2, 2, 'Trading 1', '2023-01-01', '2023-02-28', 'testing'),
(3, 2, 'Trading 2', '2023-05-01', '2023-05-31', 'testing'),
(4, 2, 'Trading 3', '2023-12-01', '2023-12-31', 'testing'),
(5, 3, 'Testing 1', '2022-01-01', '2023-04-06', 'Testing'),
(6, 3, 'Testing 2', '2023-08-01', '2024-02-29', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `year` varchar(50) NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `userid`, `qualification`, `board`, `year`, `percent`) VALUES
(1, 1, '10th', 'CGBSE', '2018', 83),
(2, 1, '12th', 'CGBSE', '2023', 76),
(3, 2, '10th', 'CGBSE', '2018', 75),
(4, 2, '12th', 'CGBSE', '2020', 61),
(5, 3, '10th', 'CGBSE', '2020', 88),
(6, 3, '12th', 'CGBSE', '2023', 76),
(7, 4, '10th', 'ICCC', '2018', 89);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `descripton` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `userid`, `skill`, `descripton`) VALUES
(1, 1, 'PHP', 'Demo'),
(2, 1, 'Laravel', 'Testing'),
(3, 2, 'Trading', 'Testing'),
(4, 2, 'Coding', 'Testing'),
(5, 3, 'Testing', 'Testing'),
(6, 3, 'Testing', 'Testing'),
(7, 4, 'Counication Skill', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `declaration` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `contact`, `objective`, `hobbies`, `declaration`, `date`) VALUES
(1, 'Krishna Kumar', 'Uploads/1/49a4b.jpeg', 'krish@gmail.com', 6265331779, 'demo', 'coding, cricket', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '2023-12-06 11:36:58'),
(2, 'Dharmendra', 'Uploads/2/hbk5e.jpeg', 'dharmendra@gmail.com', 7089657980, 'demo', 'trading', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '2023-12-06 11:40:29'),
(3, 'Aarya', 'Uploads/3/i4eff.jpg', 'aarya@gmail.com', 6265788991, 'testing', 'testing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '2023-12-06 12:26:19'),
(4, 'Mr. Fresher', 'Uploads/4/4cddc.jpg', 'abc@gmail.com', 5678908756, 'Testing', 'Testing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', '2023-12-06 13:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
