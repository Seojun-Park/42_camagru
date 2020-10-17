-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2018 at 06:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post_board`
--
CREATE DATABASE IF NOT EXISTS `db_cama` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_cama`;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(10000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`idx`, `name`, `pw`, `title`, `content`, `date`) VALUES
(1, 'S Writer', '', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(2, 'S Writer', '', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(3, 'S Writer', '', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(4, 'S Writer', '', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(5, 'S Writer', '', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
