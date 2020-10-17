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
    `idx` INT NOT NULL ,
    `id` VARCHAR(100) NOT NULL ,
    `pw` VARCHAR(100) NOT NULL ,
    `firstname` VARCHAR(100) NOT NULL ,
    `lastname` VARCHAR(100) NOT NULL ,
    `email` VARCHAR(100) NOT NULL ,
    `avatar` VARCHAR(2000) NOT NULL DEFAULT '<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\" fill-rule=\"evenodd\" clip-rule=\"evenodd\"><path d=\"M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm8.127 19.41c-.282-.401-.772-.654-1.624-.85-3.848-.906-4.097-1.501-4.352-2.059-.259-.565-.19-1.23.205-1.977 1.726-3.257 2.09-6.024 1.027-7.79-.674-1.119-1.875-1.734-3.383-1.734-1.521 0-2.732.626-3.409 1.763-1.066 1.789-.693 4.544 1.049 7.757.402.742.476 1.406.22 1.974-.265.586-.611 1.19-4.365 2.066-.852.196-1.342.449-1.623.848 2.012 2.207 4.91 3.592 8.128 3.592s6.115-1.385 8.127-3.59zm.65-.782c1.395-1.844 2.223-4.14 2.223-6.628 0-6.071-4.929-11-11-11s-11 4.929-11 11c0 2.487.827 4.783 2.222 6.626.409-.452 1.049-.81 2.049-1.041 2.025-.462 3.376-.836 3.678-1.502.122-.272.061-.628-.188-1.087-1.917-3.535-2.282-6.641-1.03-8.745.853-1.431 2.408-2.251 4.269-2.251 1.845 0 3.391.808 4.24 2.218 1.251 2.079.896 5.195-1 8.774-.245.463-.304.821-.179 1.094.305.668 1.644 1.038 3.667 1.499 1 .23 1.64.59 2.049 1.043z\"/></svg>' ,
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

ALTER TABLE `member`
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
