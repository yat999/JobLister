-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2020 at 05:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JobLister`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`a_id`, `u_id`, `j_id`, `date`, `status`) VALUES
(1, 98497646, 1, '2020-07-26', ''),
(2, 30716143, 3, '2020-07-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`) VALUES
(1, 'Software Developer'),
(2, 'Accountant'),
(3, 'Content Writer');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `u_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`u_id`, `job_id`, `category`, `company`, `job_title`, `description`, `salary`, `location`, `user_contact`, `user_email`) VALUES
(30716143, 1, 'Software Developer', 'ABC Tech', 'Junior System Engineer', 'Responsible for design, installation, testing and maintenance of\r\nsoftware systems. Document and demonstrate solutions by\r\ndeveloping layouts, codes etc ', 'Rs. 1,000,000', 'Mumbai, Maharashtra', '1111155555', 'abc@mail.com'),
(30716143, 2, 'Accountant', 'XYZ Trading Company', 'Senior Accountant', 'Candidate should have thorough knowledge & experience of Accounting (upto Finalisation) and Taxation (TDS, GST. IT etc).', 'Rs. 20,000 a month', 'Bengaluru, Karnataka', '1234512345', 'xyz@mail.com'),
(98497646, 3, 'Content Writer', 'The Free Journal', 'Content Writer', 'Key responsibilities:\r\n\r\n1. Write detailed articles on home appliances, kitchen appliances, electronics like laptops, smartphones, etc\r\n2. Write original articles all the time with correct grammar and no mistakes in the facts & review articles from others and make it error-free', 'Rs. 5,00,000 PA', 'Hyderabad, Telangana', '11111111', 'hr@free.in');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `first_name`, `last_name`, `user_contact`, `user_email`, `password`, `qualification`, `grad`, `resume`) VALUES
(30716143, 'Yatin', 'Korgaonkar', '7045821778', 'korgaonkaryatin09@gmail.com', '$2y$10$c8A3t8.4TmqdwN2c9jf2Wu4Z4H4FWCZwkdBA.NPkAo/2r9.LkOl5S', 'BSc. Computer Science', '2020', 'uploads/30716143.pdf'),
(98497646, 'ABC', 'XYZ', '12121212', 'abc@xyz.com', '$2y$10$AKvnvsypcvgOV5yzh7gjyOJ51ZK2qiRkSwVRGpM2gznpdOE8.BQ5W', 'BSc. Computer Science', '2020', 'uploads/98497646.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
