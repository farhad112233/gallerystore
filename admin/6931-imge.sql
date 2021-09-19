-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 09:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imge`
--

-- --------------------------------------------------------

--
-- Table structure for table `im_cat`
--

CREATE TABLE `im_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(512) CHARACTER SET utf8 NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `im_cat`
--

INSERT INTO `im_cat` (`id`, `name`, `no`) VALUES
(11, 'daste3', 5),
(20, 'daste2', 4),
(22, 'daste4', 18),
(31, 'daste1', 8),
(32, 'daste7', 10),
(33, 'daste8', 4);

-- --------------------------------------------------------

--
-- Table structure for table `im_image`
--

CREATE TABLE `im_image` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `path` varchar(512) NOT NULL,
  `url` varchar(512) NOT NULL,
  `title` varchar(512) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `im_order`
--

CREATE TABLE `im_order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `im_user`
--

CREATE TABLE `im_user` (
  `id` int(11) NOT NULL,
  `note` enum('admin','user') CHARACTER SET utf8 NOT NULL DEFAULT 'user',
  `name` varchar(512) CHARACTER SET utf8 NOT NULL,
  `pas` varchar(512) CHARACTER SET utf8 NOT NULL,
  `email` varchar(512) NOT NULL,
  `phone` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `im_user`
--

INSERT INTO `im_user` (`id`, `note`, `name`, `pas`, `email`, `phone`, `date`) VALUES
(1, 'admin', 'farhad', '7457475', 'farhad.64.lo@gmail.com', 0, '2020-11-01 16:01:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `im_cat`
--
ALTER TABLE `im_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_image`
--
ALTER TABLE `im_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_order`
--
ALTER TABLE `im_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_user`
--
ALTER TABLE `im_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `im_cat`
--
ALTER TABLE `im_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `im_image`
--
ALTER TABLE `im_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `im_order`
--
ALTER TABLE `im_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `im_user`
--
ALTER TABLE `im_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
