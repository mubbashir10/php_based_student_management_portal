-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 15, 2015 at 12:25 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `student_management_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `sessionID` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'absent',
  `username` varchar(1000) NOT NULL,
  `usernameTeacher` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `sessionID`, `name`, `date`, `status`, `username`, `usernameTeacher`) VALUES
(1, 1, 'Meeting', '2015-12-08', 'present', 'student1@seecs.edu.pk', 'teacher1@seecs.edu.pk'),
(2, 1, 'Meeting', '2015-12-08', 'present', 'student2@seecs.edu.pk', 'teacher1@seecs.edu.pk'),
(3, 2, 'Lecture', '2015-12-09', 'present', 'student1@seecs.edu.pk', 'teacher1@seecs.edu.pk'),
(4, 2, 'Lecture', '2015-12-09', 'present', 'student2@seecs.edu.pk', 'teacher1@seecs.edu.pk'),
(5, 3, 'Lab', '2015-12-10', 'present', 'student1@seecs.edu.pk', 'teacher2@seecs.edu.pk'),
(6, 3, 'Lab', '2015-12-10', 'present', 'student2@seecs.edu.pk', 'teacher2@seecs.edu.pk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`) VALUES
(1, 'student1@seecs.edu.pk', 'abc', 1, 'Mubbashir'),
(2, 'student2@seecs.edu.pk', 'abc', 1, 'Samra'),
(3, 'teacher1@seecs.edu.pk', 'abc', 2, ''),
(4, 'teacher2@seecs.edu.pk', 'abc', 2, ''),
(5, 'admin1@seecs.edu.pk', 'abc', 3, ''),
(6, 'admin2@seecs.edu.pk', 'abc', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;