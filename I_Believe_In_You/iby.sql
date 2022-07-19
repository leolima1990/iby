-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2022 at 04:00 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iby`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `password`, `name`, `email`, `phone`, `address`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@email.com', '12345678', '45, Roma Street'),
(2, 'client', 'client', 'client', 'clident', 'client@email.com', '12345678', '24, Thomas Street'),
(5, 'teom', 'staff', 'teom', 'Teo Mosk', 'teom@asdf.com', '12345678', '20, Roma Street'),
(6, 'charlesx', 'staff', '12345678', 'Charles Xavier', 'charles@gmail.com', '12345678', '24, Thomas Street'),
(7, 'cloek', 'client', '12345678', 'Cloe Kayh', 'cloe@gmail.com', '12345678', '24, Thomas Street'),
(9, 'johnl', 'admin', '12345678', 'John Luck', 'john@gmail.com', '123456767', '24, Thomas Street'),
(10, 'clockt', 'admin', '12345678', 'Clock Terry', 'clock@gmail.com', '12345678', '24, Thomas Street'),
(11, 'clockt', 'admin', '12345678', 'Clock Terry', 'clock@gmail.com', '12345678', '24, Thomas Street');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `workout_details_id` int(11) NOT NULL,
  `week_day` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`id`, `staff_id`, `client_id`, `workout_details_id`, `week_day`) VALUES
(1, 5, 2, 1, 1),
(2, 6, 7, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workout_details`
--

CREATE TABLE `workout_details` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workout_details`
--

INSERT INTO `workout_details` (`id`, `title`, `description`) VALUES
(1, 'leg day', '4 repetitions'),
(2, 'leg day', '4 repetitions'),
(3, 'Biceps day', '10 repetitions'),
(4, 'Triceps day', '35 push up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `workout_id` (`workout_details_id`);

--
-- Indexes for table `workout_details`
--
ALTER TABLE `workout_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workout_details`
--
ALTER TABLE `workout_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `staff_id` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `workout_id` FOREIGN KEY (`workout_details_id`) REFERENCES `workout_details` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
