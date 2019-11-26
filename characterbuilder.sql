-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 09:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `characterbuilder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `armour`
--

CREATE TABLE `armour` (
  `armour_name` varchar(255) NOT NULL,
  `intel_effect` int(11) DEFAULT NULL,
  `strength_effect` int(11) DEFAULT NULL,
  `toughness_effect` int(11) DEFAULT NULL,
  `dext_effect` int(11) DEFAULT NULL,
  `endur_effect` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armour`
--

INSERT INTO `armour` (`armour_name`, `intel_effect`, `strength_effect`, `toughness_effect`, `dext_effect`, `endur_effect`) VALUES
('None', 0, 0, 0, 0, 0),
('Shadow Vest', 3, 2, 1, 9, 5),
('Steel of Hatred', -2, 8, 10, -3, -3);

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `Name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Race` varchar(255) DEFAULT NULL,
  `Hairstyle` varchar(255) DEFAULT NULL,
  `Eye_color` varchar(255) DEFAULT NULL,
  `Weight` varchar(255) DEFAULT NULL,
  `Height` varchar(255) DEFAULT NULL,
  `intelligence` int(3) DEFAULT '0',
  `endurance` int(3) DEFAULT '0',
  `dexterity` int(3) DEFAULT '0',
  `strength` int(3) DEFAULT '0',
  `toughness` int(3) DEFAULT '0',
  `armour` varchar(255) DEFAULT 'None',
  `weapon` varchar(255) DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`Name`, `user_id`, `Race`, `Hairstyle`, `Eye_color`, `Weight`, `Height`, `intelligence`, `endurance`, `dexterity`, `strength`, `toughness`, `armour`, `weapon`) VALUES
('Jalal', 1, 'South Asian', 'Straight', 'Black', '130lbs', '5\'8', 11, 19, 33, 24, 23, 'Shadow Vest', 'Sorrowful Spike'),
('Leo', 1, 'Lion', 'Classic', 'Black', '145 lbs', '6\'1', 14, 21, 35, 20, 14, 'Steel of Hatred', 'Bronze sword'),
('Thad', 2, 'Otaku', 'Straight', 'Black', '130lbs', '5\'8', 0, 0, 0, 0, 0, 'None', 'None'),
('Thaddeus', 1, 'Chinese', 'Anime', 'Brown', 'Thicc', 'Not tall enuf', 0, -1, 1, 11, 11, 'Steel of Hatred', 'Bronze sword');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `credits`) VALUES
(1, 'Adeel', 'abhaloo@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(2, 'thad', 'tha@LOL.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(3, 'yuitanagi', 'yui@snake.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(4, 'yash', 'yash@snake.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(5, 'assad', 'assad@hotness.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(6, 'john doe', 'john@doe.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(7, 'jesus', 'jesus@holy.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(8, 'kakashi', 'kakashi@konoha.com', '81dc9bdb52d04dc20036dbd8313ed055', 500),
(9, 'teddy', 'teddy@cpsc.com', '81dc9bdb52d04dc20036dbd8313ed055', 500);

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE `weapons` (
  `weapon_name` varchar(255) NOT NULL,
  `intel_effect` int(11) DEFAULT NULL,
  `strength_effect` int(11) DEFAULT NULL,
  `toughness_effect` int(11) DEFAULT NULL,
  `dext_effect` int(11) DEFAULT NULL,
  `endur_effect` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weapons`
--

INSERT INTO `weapons` (`weapon_name`, `intel_effect`, `strength_effect`, `toughness_effect`, `dext_effect`, `endur_effect`) VALUES
('Bronze sword', 2, 3, 1, 4, 2),
('None', 0, 0, 0, 0, 0),
('Sorrowful Spike', 4, -1, -1, 8, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `armour`
--
ALTER TABLE `armour`
  ADD PRIMARY KEY (`armour_name`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`weapon_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `characters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
