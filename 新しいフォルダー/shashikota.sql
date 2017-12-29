-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 12 朁E01 日 05:45
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shashikota`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kotae`
--

CREATE TABLE `kotae` (
  `id` int(11) NOT NULL,
  `odai` text NOT NULL,
  `gazou` text NOT NULL,
  `hizuke` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `kotae`
--

INSERT INTO `kotae` (`id`, `odai`, `gazou`, `hizuke`) VALUES
(1, '悲劇', 'IMG_0472.JPG', '2017-11-20 11:38:48'),
(2, '悲劇', 'IMG_0472.JPG', '2017-11-20 11:38:54'),
(3, '悲劇', 'IMG_0472.JPG', '2017-11-20 11:40:57'),
(4, '悲劇', 'IMG_0472.JPG', '2017-11-24 05:34:22'),
(5, '月光', 'IMG_1976.JPG', '2017-11-24 05:35:03'),
(6, '史上最強の男', 'IMG_3932.JPG', '2017-11-26 01:32:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `kotaeshuu`
--

CREATE TABLE `kotaeshuu` (
  `id` int(11) NOT NULL,
  `odai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `kotaeshuu`
--

INSERT INTO `kotaeshuu` (`id`, `odai`) VALUES
(1, '悲劇'),
(2, '月光'),
(3, '史上最強の男');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `namae` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `namae`, `mail`, `password`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, 'たうお', 'ex@yahoo', 'himitsu'),
(66, 'たお', 'ex2@yahoo.co.jp', 'himitsu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kotae`
--
ALTER TABLE `kotae`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kotaeshuu`
--
ALTER TABLE `kotaeshuu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kotae`
--
ALTER TABLE `kotae`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kotaeshuu`
--
ALTER TABLE `kotaeshuu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
