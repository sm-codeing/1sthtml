-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 08:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_dtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `bdo`
--

CREATE TABLE `bdo` (
  `id` int(11) NOT NULL,
  `bdo_name` varchar(255) NOT NULL,
  `dst_id` varchar(255) DEFAULT NULL,
  `district_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bdo`
--

INSERT INTO `bdo` (`id`, `bdo_name`, `dst_id`, `district_name`) VALUES
(3, 'bdo3333a kkkkk  ttt  1111', 'kkk hhhh  kkkkk ttt  2222', 'gggg tttt  kkkkk  ttt 333333333'),
(4, 'gggg hhhh_hhhhhh', 'mmmm----k-666     0000', '24pgs'),
(5, 'dammai bdo office - 4444', 'dst_code_14 A - jjj', '24pgs'),
(12, 'bdo6', 'hoogli', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(255) DEFAULT NULL,
  `dst_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `dst_id`) VALUES
(1, '24pgs', 'dst_1'),
(2, 'kolkata', 'dst_2'),
(3, 'howrah', 'dst_3'),
(4, 'howrah', 'dst_code_4'),
(5, 'hoogli', 'dst_code_5'),
(6, 'hoogli2', 'dst_code_6'),
(7, 'Barwan', 'dst_code_7'),
(8, 'hoogli2', 'dst_code_8'),
(9, 'hoogli2', 'dst_code_9'),
(10, 'howrah2', 'dst_code_10'),
(11, 'howrah3', 'dst_code_11'),
(12, 'kolkata', 'dst_code_12'),
(13, 'kolkata', 'dst_code_13'),
(14, 'dammaigura', 'dst_code_14'),
(15, 'dammaigura 2', 'dst_code_15'),
(16, 'ranga readdy', 'dst_code_16');

--
-- Triggers `district`
--
DELIMITER $$
CREATE TRIGGER `trg_before_insert_district` BEFORE INSERT ON `district` FOR EACH ROW BEGIN
    DECLARE next_id INT;

    -- Get the next auto-increment value for the table
    SET next_id = (SELECT AUTO_INCREMENT 
                   FROM INFORMATION_SCHEMA.TABLES 
                   WHERE TABLE_SCHEMA = 'school_dtl' 
                   AND TABLE_NAME = 'district');

    -- Concatenate 'dst_' with the next id value
    SET NEW.dst_id = CONCAT('dst_code_', next_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `dst_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `dst_id`) VALUES
(1, 'fsi', 1),
(2, 'kkk', 1),
(3, 'sai', 14),
(4, 'fsi', 3),
(5, 'dammai', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bdo`
--
ALTER TABLE `bdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dst_id` (`dst_id`),
  ADD KEY `bdo_name` (`bdo_name`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dst_id` (`dst_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dst_id` (`dst_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bdo`
--
ALTER TABLE `bdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`dst_id`) REFERENCES `district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
