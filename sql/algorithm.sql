-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-11-13 02:42:22
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
-- 資料表結構 `algorithm`
--

CREATE TABLE `algorithm` (
  `AID` varchar(20) NOT NULL,
  `OwnerPID` int(20) NOT NULL,
  `AlgorithmTitle` varchar(100) NOT NULL,
  `GitHub` varchar(100) NOT NULL,
  `PdfFileName` varchar(100) DEFAULT NULL,
  `Logo` varchar(100) DEFAULT NULL,
  `StimulusType` varchar(20) DEFAULT NULL,
  `Portnumber` int(20) NOT NULL,
  `ServerIP` varchar(100) DEFAULT NULL,
  `Abbreviation` varchar(50) NOT NULL,
  `LicenseKey` varchar(50) NOT NULL,
  `Input` varchar(20) DEFAULT NULL,
  `Output` varchar(20) DEFAULT NULL,
  `authorName` varchar(50) NOT NULL,
  `authorUnit` varchar(50) NOT NULL,
  `functionEnglish` varchar(50) NOT NULL,
  `functionChinese` varchar(50) NOT NULL,
  `functionDescription` text NOT NULL,
  `classification` varchar(50) NOT NULL,
  `systemEnvironment` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `allowParemeter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `algorithm`
--

INSERT INTO `algorithm` (`AID`, `OwnerPID`, `AlgorithmTitle`, `GitHub`, `PdfFileName`, `Logo`, `StimulusType`, `Portnumber`, `ServerIP`, `Abbreviation`, `LicenseKey`, `Input`, `Output`, `authorName`, `authorUnit`, `functionEnglish`, `functionChinese`, `functionDescription`, `classification`, `systemEnvironment`, `package`, `allowParemeter`) VALUES
('8717', 2, 'Development of Computation Models for Chinese Discourse Analysis', 'https://github.com/TAITKit/Discourse', '----', 'logo.png', 'int', 9001, '1.1.1.1', 'Discourse', 'HHCHEN_DISCOURSE@9001', 'text', 'html', '', '', '', '', '', '', '', '', 0),
('3077', 2, 'Analysis of Image Recall on Image-Text Intertwined Lifelog', 'a', '', 'logo.png', 'int', 9015, '1.1.1.1', 'Image-Recall', 'HHCHEN_IMAGE-RECALL@9015', 'text', 'image', '', '', '', '', '', '', '', '', 0),
('6058', 2, 'Coreference Resolution Using Recurrent Neural Networks', 'b', '', 'logo.png', 'int', 9016, '1.1.1.1', 'CoreferenceResolution', 'HHCHEN_COREFERENCERESOLUTION@9016', 'text', 'html', '', '', '', '', '', '', '', '', 0),
('6015', 2, 'CWSandNEE', 'c', '', 'logo.png', 'int', 9017, '1.1.1.1', 'Chinese Word Segmentation and Named Entity Extract', 'HHCHEN_CHINESE@9017', 'text', 'text', '', '', '', '', '', '', '', '', 0),
('9018', 1, '3', '3', NULL, NULL, NULL, 9018, NULL, '3', 'HHCHEN_3@9018', '文件-純文字格式', '樹狀結構-HTML格式', '3', '3', '3', '3', '3', '3', '3', '3', 1),
('9019', 1, '4', '4', NULL, NULL, NULL, 9019, NULL, '4', 'HHCHEN_4@9019', '', '', '4', '44', '4', '4', '4', '4', '4', '4', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `algorithm`
--
ALTER TABLE `algorithm`
  ADD PRIMARY KEY (`Portnumber`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `algorithm`
--
ALTER TABLE `algorithm`
  MODIFY `Portnumber` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9020;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
