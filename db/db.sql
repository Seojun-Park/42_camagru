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
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `file` VARCHAR(1000)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for tabl `reply`
--

CREATE TABLE `reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `member` (
    `idx` INT NOT NULL AUTO_INCREMENT,
    `id` VARCHAR(100) NOT NULL ,
    `pw` VARCHAR(1000) NOT NULL ,
    `firstname` VARCHAR(100) NOT NULL ,
    `lastname` VARCHAR(100) NOT NULL ,
    `email` VARCHAR(100) NOT NULL ,
    `avatar` VARCHAR(2000) NOT NULL ,
    `username` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`idx`)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;



--
-- Dumping data for table `board`
--

INSERT INTO `board` (`idx`, `name`, `title`, `content`, `date`) VALUES
(1, 'S Writer', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(2, 'S Writer', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(3, 'S Writer', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(4, 'S Writer', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02'),
(5, 'S Writer', '자유게시판입니다.', '자유게시판입니다.', '2016-07-02');


--
-- reply's dummy data
--

INSERT INTO `reply` (`idx`, `con_num`, `name`, `content`, `date`) VALUES
(1, 7, 'admin', '1234', '2018-04-02 19:47:19'),
(2, 7, 'admin', '댓글 테스트', '2018-04-02 19:47:26');

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `board`
--

  ALTER TABLE `reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
