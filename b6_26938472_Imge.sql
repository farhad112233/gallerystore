-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.byethost6.com
-- Generation Time: Feb 01, 2021 at 12:34 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b6_26938472_Imge`
--

-- --------------------------------------------------------

--
-- Table structure for table `im_cat`
--

CREATE TABLE `im_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(512) CHARACTER SET utf8 NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `im_cat`
--

INSERT INTO `im_cat` (`id`, `name`, `no`) VALUES
(1, 'Animal', 5),
(2, 'Nature', 1),
(3, 'Sport', 4);

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `im_image`
--

INSERT INTO `im_image` (`id`, `cat_id`, `path`, `url`, `title`, `price`, `date`) VALUES
(3, 1, '/home/vol5_7/byethost6.com/b6_26938472/gallerystore.10001mb.com/htdocs/ori-image/2823-IMG_20201108_175045_809.jpg', 'http://gallerystore.10001mb.com/image/th=70204IMG_20201108_175045_809.jpg', 'Fox', 5, '2020-11-23 18:07:14'),
(4, 2, '/home/vol5_7/byethost6.com/b6_26938472/gallerystore.10001mb.com/htdocs/ori-image/1495-IMG_20201108_173530_499.jpg', 'http://gallerystore.10001mb.com/image/th=38405IMG_20201108_173530_499.jpg', 'Reason', 5, '2020-11-23 18:08:06'),
(5, 3, '/home/vol5_7/byethost6.com/b6_26938472/gallerystore.10001mb.com/htdocs/ori-image/3656-11.jpg', 'http://gallerystore.10001mb.com/image/th=3453011.jpg', 'Wow', 5, '2020-11-23 18:09:56'),
(6, 2, '/home/vol5_7/byethost6.com/b6_26938472/gallerystore.10001mb.com/htdocs/ori-image/8245-2021-01-05 15.45.38.jpg', 'http://gallerystore.10001mb.com/image/th=919452021-01-05 15.45.38.jpg', 'Yardim', 0, '2021-01-05 12:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `im_order`
--

CREATE TABLE `im_order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `im_order`
--

INSERT INTO `im_order` (`id`, `user`, `image`, `price`, `date`) VALUES
(1, 1, 3, 5, '2020-11-23 18:16:42'),
(2, 1, 3, 5, '2020-12-23 10:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `im_recovery`
--

CREATE TABLE `im_recovery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(512) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `im_recovery`
--

INSERT INTO `im_recovery` (`id`, `user_id`, `code`, `date`) VALUES
(1, 3, '9dde315be0bced428d59efc8c85b3a56', '2020-11-24 08:27:44');

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
  `phone` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `im_user`
--

INSERT INTO `im_user` (`id`, `note`, `name`, `pas`, `email`, `phone`, `date`) VALUES
(1, 'admin', 'Farhad', '111213', 'Farhad.64.lo@gmail.com', NULL, '2020-11-23 15:52:23'),
(2, 'user', 'Reza', '777777', 'Reza@gmail.com', 0, '2020-11-23 18:15:28'),
(3, 'user', 'Ferhat', '565656', 'ferhat7457475@gmail.com', 0, '2020-11-24 08:27:08'),
(4, 'admin', 'admin', 'admin', 'admin@yahoo.com', 0, '2020-12-29 19:34:44');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `im_order`
--
ALTER TABLE `im_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_recovery`
--
ALTER TABLE `im_recovery`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `im_image`
--
ALTER TABLE `im_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `im_order`
--
ALTER TABLE `im_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `im_recovery`
--
ALTER TABLE `im_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `im_user`
--
ALTER TABLE `im_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
