-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-11-13 02:42:05
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `praetor`
--

-- --------------------------------------------------------

--
-- 資料表結構 `pmanager`
--

CREATE TABLE `pmanager` (
  `PID` int(20) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Institute` varchar(50) NOT NULL,
  `PMName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Conformed` tinyint(1) NOT NULL,
  `Logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `pmanager`
--

INSERT INTO `pmanager` (`PID`, `PhoneNumber`, `Institute`, `PMName`, `Email`, `Password`, `Conformed`, `Logo`) VALUES
(1, '9', '9', '9', 'q', '9', 0, NULL),
(2, '1', 'NTUST', 'Hung-hsiang Chen', 'wellmagg@gmail.com', '1', 0, NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `pmanager`
--
ALTER TABLE `pmanager`
  ADD PRIMARY KEY (`PID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `pmanager`
--
ALTER TABLE `pmanager`
  MODIFY `PID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
