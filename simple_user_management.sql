-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mar 2015 la 11:10
-- Versiune server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_user_management`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `categorie` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `categorie`
--

INSERT INTO `categorie` (`id`, `user_id`, `categorie`) VALUES
(1, 1, '<18'),
(2, 2, '18-30 '),
(3, 3, '18-30 '),
(9, 0, ''),
(10, 4, '<18'),
(11, 5, '<18'),
(12, 6, '30+'),
(13, 7, '<18'),
(14, 8, '30+'),
(15, 9, '<18'),
(16, 10, '18-30 ');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `rol`
--

INSERT INTO `rol` (`id`, `user_id`, `rol`) VALUES
(1, 1, 'admin'),
(2, 2, 'user'),
(3, 3, 'user'),
(4, 4, 'user'),
(5, 5, 'admin'),
(6, 6, 'user'),
(7, 7, 'user'),
(8, 8, 'user'),
(9, 9, 'user'),
(10, 10, 'user');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `descriere` varchar(100) NOT NULL,
  `nume` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `tel`, `email`, `descriere`, `nume`) VALUES
(1, 'admin', 'b3e69ff22c237d8e784863346105b1d7', '345-222-444', 'adrian.calin991@gmail.com', 'test', 'Adrian'),
(2, 'user_01', '44815fc5cc9a53a4816b2a4c4ff714e3', '856-324-8888', 'user@yahoo.com', ' cd', 'user'),
(3, 'mirela_test', 'f406a181b91a0504f388e2cabbb928f1', '345-333-4449', 'test@hdghd.ccdz', ' jjzz', 'userz'),
(4, 'loverboy_mody', 'ea414e50b6c93469be77a243fa896a12', '987-406-7765', 'lover_boy@mody.com', 'iiiii', 'loverboy99_mody'),
(5, 'testpass007', '86342d4ce66b61de2dd647fa779424c6', '799-445-6669', 'adrian.calin991@gmail.com', ' DOO', 'test'),
(6, 'eded', '946f4a61c10a540a268019a2dd44be4c', '343-445-4444', 'sds@oio.com', ' sdsdsdsdsds', 'test'),
(7, 'frfrfrf', '335b4818da36be857a06816e0edb07e2', '987-834-66543', 'hdhd@yahoo.com', ' sdsd', 'test'),
(8, 'testing', '1a11002d4bab1b4c7036d6c721539c8c', '923-456-7890', 'test@yahoo.com', 'testare', 'testareee'),
(9, 'test', 'a6819c7a5b2ab0823beb10664646b33e', '988-213-4444', 'asd@ttt.com', 'ABCtest10', 'testarea'),
(10, 'horia', 'f371f89fe5d4c278e935471bfe00c563', '432-876-9999', 'test@red.com', 'restest', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
