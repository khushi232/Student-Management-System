-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 09:05 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `mystudent`
--

CREATE TABLE `mystudent` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `studentid` varchar(12) NOT NULL,
  `course` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mystudent`
--

INSERT INTO `mystudent` (`id`, `name`, `email`, `studentid`, `course`, `phone`, `address`, `created_at`) VALUES
(1, 'Payal', 'payal344@gmail.com', 'Student2333', 'Digital Marketing', '9578964473', 'Orissa', '2023-04-20 12:52:27'),
(2, 'Sonam', 'sonam4003@gmail.com', 'Student2345', 'Web Designing', '9565428814', 'Mumbai', '2023-04-20 12:56:25'),
(3, 'Rajesh', 'rajeshkumar@gmail.com', 'student2344', 'Graphic Designing', '9675438722', 'Delhi', '2023-04-24 09:07:25'),
(4, 'Shadif', 'shadif23045@gmail.com', 'student2323', 'Web designing', '9347628734', 'Faridabad', '2023-06-09 19:46:33'),
(5, 'Himanshi', 'himani2002@gmail.com', 'Student4352', 'After Effect', '7503208973', 'Gurgaon', '2023-06-10 19:47:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mystudent`
--
ALTER TABLE `mystudent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mystudent`
--
ALTER TABLE `mystudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
