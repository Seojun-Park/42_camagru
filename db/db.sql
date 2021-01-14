SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `db_cama`
--
CREATE DATABASE IF NOT EXISTS `db_cama` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_cama`;


CREATE TABLE `feed` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idx`)
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
    `verified` BOOLEAN DEFAULT false,
    PRIMARY KEY (`idx`)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comment` (
  `idx` INT NOT NULL AUTO_INCREMENT,
  `userId` VARCHAR(100) NOT NULL,
  `text` VARCHAR(1000) NOT NULL,
  `feedId` INT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`idx`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `likefeed` (
  `idx` INT NOT NULL AUTO_INCREMENT,
  `feedId` INT NOT NULL,
  `memberId` INT NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

COMMIT;
