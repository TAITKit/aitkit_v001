-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-11-13 02:42:30
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
-- 資料表結構 `dataset`
--

CREATE TABLE `dataset` (
  `dataSetID` int(50) NOT NULL,
  `algorithmID` varchar(20) NOT NULL,
  `dataSetName` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `fee` varchar(10) DEFAULT NULL,
  `no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `dataset`
--

INSERT INTO `dataset` (`dataSetID`, `algorithmID`, `dataSetName`, `url`, `fee`, `no`) VALUES
(33, '', NULL, NULL, NULL, 0),
(34, '', NULL, NULL, NULL, 1),
(35, '', 'a', 'a', 'a', 0),
(36, '', 'b', 'b', 'b', 1),
(38, '9025', 'q', 'q', 'q', 0),
(39, '9018', NULL, NULL, NULL, 0),
(51, '-1', NULL, NULL, NULL, 0),
(52, '-1', NULL, NULL, NULL, 1),
(56, '9018', NULL, NULL, NULL, 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`dataSetID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `dataset`
--
ALTER TABLE `dataset`
  MODIFY `dataSetID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
