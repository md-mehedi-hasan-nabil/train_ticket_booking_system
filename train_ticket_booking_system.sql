-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 06:22 PM
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
-- Database: `train_ticket_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `date`, `email`, `class_name`) VALUES
(2, '2022-06-30', 'mehedihasannabil49@gmail.com', 'F_BERTH'),
(3, '2022-06-26', 'mehedihasannabil49@gmail.com', 'SNIGDHA'),
(4, '2022-06-26', 'mehedihasannabil49@gmail.com', 'SNIGDHA');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `phone`, `password`) VALUES
(2, 'mehedi hasan', 'mehedihasannabil49@gmail.com', '01732490071', '$2y$10$JwcB4AMKw2PS/kMbyjHNPO2AC5HjRIIm7pvx5nWGFPZkNVzPbBBGq'),
(3, 'Mehedi', '2019000000072@seu.edu.bd', '01732490071', '$2y$10$hLQPyyRIYwNFlQBXygbjO.D2qArhZU56Ps0D/alUTlZytKdphJU8y'),
(4, 'mehedi hasan', 'sa3349917@gmail.com', '01732490071', '$2y$10$nh6Thu.6X2FkVm2pMuZZne9y3ForxjKSVtco5aXtPYjFkAiCV8sjK'),
(5, 'sumon', 'sumon@gmail.com', '01720426168', '$2y$10$5zhZX.RITs32BQHfSnW5kesPaNLOWGrpG8zZMQMgHpl6Hff4xJiH.'),
(6, 'mehedi hasan', 'mehedihasannabil20@gmail.com', '01996405290', '$2y$10$1C/1VwQdIcdWIW/9AuBEKu.3Y.8A4qEIvDqb6hz39xI8wbVOPkUKm'),
(7, 'saim', 'saim@gmail.com', '01732498872', '$2y$10$zUg4TNddEJSlyLK.KqAZ9uOEPvFG5KifxD9J1hPT7N2EhJ.E1K2c6');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_name` varchar(255) NOT NULL,
  `from_station` varchar(255) NOT NULL,
  `to_station` varchar(255) NOT NULL,
  `train_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_name`, `from_station`, `to_station`, `train_id`) VALUES
('Dhaka Express', 'Dhaka', 'Barisal', 1),
('Dhaka Express', 'Dhaka', 'Chittagong', 2),
('Dhaka Express', 'Dhaka', 'Khulna', 3),
('Dhaka Express', 'Dhaka', 'Mymensingh', 4),
('Dhaka Express', 'Dhaka', 'Rajshahi', 5),
('Dhaka Express', 'Dhaka', 'Rangpur', 6),
('Dhaka Express', 'Dhaka', 'Barisal', 7),
('Barisal Express', 'Barisal', 'Chittagong', 8),
('Barisal Express', 'Barisal', 'Dhaka', 9),
('Barisal Express', 'Barisal', 'Khulna', 10),
('Barisal Express', 'Barisal', 'Mymensingh', 11),
('Barisal Express', 'Barisal', 'Rajshahi', 12),
('Barisal Express', 'Barisal', 'Rangpur', 13),
('Barisal Express', 'Barisal', 'Sylhet', 14),
('Chittagong Express', 'Chittagong', 'Dhaka', 15),
('Chittagong Express', 'Chittagong', 'Barisal', 16),
('Chittagong Express', 'Chittagong', 'Khulna', 17),
('Chittagong Express', 'Chittagong', 'Mymensingh', 18),
('Chittagong Express', 'Chittagong', 'Rajshahi', 19),
('Chittagong Express', 'Chittagong', 'Rangpur', 20),
('Chittagong Express', 'Chittagong', 'Sylhet', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
