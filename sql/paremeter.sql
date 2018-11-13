-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-11-13 02:42:41
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
-- 資料表結構 `paremeter`
--

CREATE TABLE `paremeter` (
  `paremeterID` int(50) NOT NULL,
  `algorithmID` varchar(20) NOT NULL,
  `paremeter` varchar(50) NOT NULL,
  `paremeterRange` varchar(50) NOT NULL,
  `function` varchar(50) NOT NULL,
  `format` varchar(50) NOT NULL,
  `no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `paremeter`
--

INSERT INTO `paremeter` (`paremeterID`, `algorithmID`, `paremeter`, `paremeterRange`, `function`, `format`, `no`) VALUES
(11, '9018', 'qq', 'qq', 'qq', 'qq', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `paremeter`
--
ALTER TABLE `paremeter`
  ADD PRIMARY KEY (`paremeterID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `paremeter`
--
ALTER TABLE `paremeter`
  MODIFY `paremeterID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
