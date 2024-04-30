-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-04-30 11:22
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `worldhello`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admins`
--

CREATE TABLE `admins` (
  `idx` int(11) NOT NULL,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `level` tinyint(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `end_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admins`
--

INSERT INTO `admins` (`idx`, `userid`, `email`, `username`, `passwd`, `regdate`, `level`, `last_login`, `end_login_date`) VALUES
(4, 'admin', 'admin@helloworld.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:11', 100, '2024-04-30 12:45:01', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `step` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cateid`, `code`, `pcode`, `name`, `step`) VALUES
(2, '', '', '웹', 1),
(3, '', '2', 'html', 2),
(4, '', '3', 'css', 3),
(5, '', '', '인공지능', 1),
(6, '', '5', 'react', 2),
(7, '', '6', 'vue', 3),
(8, '', '', '기초강의', 1),
(9, '', '8', 'java', 2),
(10, '', '9', 'javascript', 3),
(11, '', '2', 'css', 2),
(12, '', '2', 'php', 2),
(13, '', '3', 'style', 3),
(14, '', '3', 'aws', 3),
(15, '', '', 'sdfsdf', 1),
(16, '', '15', 'asdxczvweew', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cpid` int(11) NOT NULL,
  `cp_name` varchar(100) NOT NULL,
  `cp_image` varchar(100) NOT NULL,
  `cp_type` int(4) NOT NULL,
  `cp_price` int(11) NOT NULL,
  `cp_limit` varchar(11) NOT NULL,
  `cp_ratio` int(11) NOT NULL,
  `cp_status` varchar(4) NOT NULL,
  `cp_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cpid`, `cp_name`, `cp_image`, `cp_type`, `cp_price`, `cp_limit`, `cp_ratio`, `cp_status`, `cp_date`) VALUES
(1, 'sfsdfsf', '', 0, 2000, '11000', 0, '1', 0),
(2, 'ㄶㅎㅇㅎㅎㄴㅇㅎ', '/helloworld/img/coupon/20240430054707165345.jpg', 0, 6000, '16000', 0, '1', 0),
(3, 'ㄹㄶㅎ', '/helloworld/img/coupon/20240430054821197245.jpg', 0, 0, '12000', 20, '0', 0),
(4, 'sdfsdf', '/helloworld/img/coupon/20240430060342117202.jpg', 0, 0, '13000', 0, '0', 0),
(5, 'sdfsfsfdsfds', '/helloworld/img/coupon/20240430061733172659.jpg', 0, 2000, '14000', 0, '1', 0),
(6, 'ㅇㄴㄹㅇㄴㄹㄴㄹ', '/helloworld/img/coupon/20240430073034865051.jpg', 0, 0, '13000', 10, '1', 0),
(7, 'ㅇㄴㄹㄴㄹ', '/helloworld/img/coupon/20240430074923329189.jpg', 0, 0, '11000', 0, '1', 3);

-- --------------------------------------------------------

--
-- 테이블 구조 `coursefile`
--

CREATE TABLE `coursefile` (
  `cid` int(11) NOT NULL,
  `l_idx2` int(11) NOT NULL,
  `course_file` varchar(100) NOT NULL,
  `course_file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `cate` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price_status` varchar(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `level` varchar(11) NOT NULL,
  `due_status` varchar(4) NOT NULL,
  `due` varchar(11) NOT NULL,
  `act` varchar(11) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `course_file` varchar(100) NOT NULL,
  `course_file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `courses`
--

INSERT INTO `courses` (`cid`, `cate`, `name`, `price_status`, `price`, `level`, `due_status`, `due`, `act`, `content`, `thumbnail`, `course_file`, `course_file_name`) VALUES
(9, '웹/html/css', '아무개', '0', 0, '중급', '0', '0', '0', '', '/helloworld/img/class/20240429101058660773.png', '', ''),
(10, '웹/html/css', '아무개', '0', 0, '중급', '0', '0', '활성', '', '/helloworld/img/class/20240429101058660773.png', '', ''),
(11, '웹/html/css', '아무개', '무료', 0, '중급', '무제한', '무제한', '비활성', '', '/helloworld/img/class/20240429101058660773.png', '', ''),
(21, '웹/html/css', '아무개', '유료', 0, '중급', '무제한', '무제한', '비활성', '', '/helloworld/img/class/20240429103806137610.png', '', ''),
(22, '웹/html/css', 'ㄴㅁㅇㄹㄴㅇㅁㄹ', '유료', 100000, '중급', '제한', '9개월', '활성', '', '/helloworld/img/class/20240429104229164908.png', '', ''),
(25, '웹/html/css', '테스트12', '유료', 100000, '중급', '제한', '9개월', '활성', '', '/helloworld/img/class/20240429104734675785.png', '', ''),
(26, '웹/html/css', 'ㅇㄴㅁㄻㄴㅇ', '유료', 0, '중급', '제한', '6개월', '활성', '', '/helloworld/img/class/20240429104759979077.png', '', ''),
(37, '웹/html/css', 'sdff', '무료', 100000, '중급', '무제한', '6개월', '활성', '', '/helloworld/img/class/20240430042751442016.jpg', '', ''),
(38, '웹/html/css', 'sdggds', '무료', 0, '초급', '무제한', '무제한', '활성', '', '/helloworld/img/class/20240430043206434713.png', '', ''),
(42, '웹/html/css', 'ㅇㄹㄴㄹ', '무료', 0, '초급', '무제한', '무제한', '활성', '<p>sdfdsf</p>', '/helloworld/img/class/20240430051549177518.JPG', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `lecture`
--

CREATE TABLE `lecture` (
  `cid` int(11) NOT NULL,
  `l_idx` int(11) NOT NULL,
  `youtube_thumb` varchar(100) NOT NULL,
  `youtube_name` varchar(100) NOT NULL,
  `youtube_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`);

--
-- 테이블의 인덱스 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`cpid`);

--
-- 테이블의 인덱스 `coursefile`
--
ALTER TABLE `coursefile`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`l_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 테이블의 AUTO_INCREMENT `coursefile`
--
ALTER TABLE `coursefile`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 테이블의 AUTO_INCREMENT `lecture`
--
ALTER TABLE `lecture`
  MODIFY `l_idx` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
