-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-11-13 02:42:49
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
-- 資料表結構 `tag`
--

CREATE TABLE `tag` (
  `tagID` int(11) NOT NULL,
  `tagName` varchar(50) NOT NULL,
  `algorithmID` int(11) NOT NULL,
  `abbreviation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tag`
--

INSERT INTO `tag` (`tagID`, `tagName`, `algorithmID`, `abbreviation`) VALUES
(3, 'NLP', 9027, 'x'),
(4, 'CNN', 9027, 'x'),
(5, 'RNN', 9027, 'x'),
(6, 'NLP', 9028, 'q'),
(7, 'CNN', 9028, 'q'),
(8, 'RNN', 9028, 'q'),
(9, 'XNN', 9028, 'q'),
(10, 'NLP', 6058, 'CoreferenceResolution'),
(11, 'NLP', -1, 'qqq'),
(12, 'NLP', -1, 'qqqqqqqqqqqqqqqqqq'),
(13, 'NLP', -1, 'oooo'),
(14, 'NLP', -1, '8888888888888888'),
(15, 'NLP', -1, 'iii'),
(16, 'NLP', -1, 'xxx'),
(17, 'NLP', -1, 'qqa'),
(18, 'NLP', 0, 'z'),
(19, 'NLP', 0, 'aa'),
(20, 'NLP', 0, 'aaz'),
(21, 'NLP', 0, 'q'),
(22, 'NLP', 0, 'ss'),
(23, 'NLP', 0, 'sssa'),
(24, 'NLP', 0, 'swq'),
(25, 'NLP', 0, 'afg'),
(26, 'NLP', 0, 'lllf'),
(27, 'NLP', 9, 'sss'),
(28, 'NLP', 0, 'fkjs'),
(29, 'NLP', 0, 'lll'),
(30, 'NLP', 0, 'MFKS'),
(31, 'NLP', 0, 'lklkf'),
(32, 'NLP', 0, 'GERE'),
(33, 'NLP', 0, 'bbbbbbbbbbbbmm'),
(37, '4', 9019, '4');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `tag`
--
ALTER TABLE `tag`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
