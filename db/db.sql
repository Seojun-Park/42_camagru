SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cama`
--
CREATE DATABASE IF NOT EXISTS `db_cama` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_cama`;

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `file` VARCHAR(1000),
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for tabl `reply`
--

CREATE TABLE `reply` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `feed_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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


--
-- Dumping data for table `board`
--


--
-- reply's dummy data
--

--
-- Indexes for table `board`
--
-- ALTER TABLE `board`
--   ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--
-- ALTER TABLE `reply`
--   ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for table `board`
--

--
-- AUTO_INCREMENT for table `board`
--

-- ALTER TABLE `reply`
--   MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
