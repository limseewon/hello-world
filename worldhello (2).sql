-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-05-01 14:51
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
(4, 'admin', 'admin@helloworld.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:11', 100, '2024-05-01 16:11:15', NULL);

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
(3, '', '2', 'html', 2),
(4, '', '3', 'css', 3),
(6, '', '5', 'react', 2),
(7, '', '6', 'vue', 3),
(9, '', '8', 'java', 2),
(10, '', '9', 'javascript', 3),
(11, '', '2', 'css', 2),
(12, '', '2', 'php', 2),
(13, '', '3', 'style', 3),
(14, '', '3', 'aws', 3),
(16, '', '15', 'asdxczvweew', 2),
(20, '', '17', 'HTML', 2),
(21, '', '20', 'css', 3),
(22, '', '', '개발 · 프로그래밍', 1),
(23, '', '', '데이터 사이언스', 1),
(24, '', '', '디자인', 1),
(25, '', '22', '웹개발', 2),
(26, '', '22', '프론트엔드', 2),
(27, '', '22', '백엔드', 2),
(28, '', '22', '풀스택', 2),
(29, '', '22', '웹퍼블리싱', 2),
(30, '', '23', '데이터 분석', 2),
(31, '', '23', '데이터 엔지니어링', 2),
(32, '', '23', '자격증(데이터 사이언스)', 2),
(33, '', '23', '기타(데이터 사이언스)', 2),
(34, '', '24', ' CAD · 3D 모델링', 2),
(35, '', '24', 'UX / UI', 2),
(36, '', '24', '그래픽 디자인', 2),
(37, '', '24', '사진 · 영상', 2),
(38, '', '25', 'JavaScript', 3),
(39, '', '25', 'HTML / CSS', 3),
(40, '', '25', 'React', 3),
(41, '', '25', 'Java', 3),
(42, '', '25', 'Spring', 3),
(43, '', '25', 'Spring Boot', 3),
(44, '', '25', 'Python', 3),
(45, '', '25', 'Node.js', 3),
(46, '', '25', 'TypeScript', 3),
(47, '', '25', 'Vue.js', 3),
(48, '', '25', 'JQuery', 3),
(49, '', '25', 'Django', 3),
(50, '', '26', 'JavaScript', 3),
(51, '', '26', 'React', 3),
(52, '', '26', 'HTML / CSS', 3),
(53, '', '26', 'Vue.js', 3),
(54, '', '26', 'TypeScript', 3),
(55, '', '26', 'Next.js', 3),
(56, '', '26', 'Node.js', 3),
(57, '', '26', 'JQuery', 3),
(58, '', '26', 'Java', 3),
(59, '', '26', '인터랙티브 앱', 3),
(60, '', '26', 'Spring', 3),
(61, '', '26', 'ES6', 3),
(62, '', '27', 'Java', 3),
(63, '', '27', 'Spring', 3),
(64, '', '27', 'Spring Boot', 3),
(65, '', '27', 'Node.js', 3),
(66, '', '27', 'JavaScript', 3);

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
  `cp_ratio` varchar(11) NOT NULL,
  `cp_status` tinyint(4) NOT NULL,
  `cp_date` tinyint(4) NOT NULL
  `cp_limit` varchar(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cpid`, `cp_name`, `cp_image`, `cp_type`, `cp_price`, `cp_limit`, `cp_ratio`, `cp_status`, `cp_date`) VALUES
(16, ' 가입축하 쿠폰', '/helloworld/img/coupon/20240501115103115246.jpg', 0, 5000, '5000', '0', 1, 3);

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
  `name` varchar(100) NOT NULL,
  `price_status` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `level` varchar(11) NOT NULL,
  `due_status` varchar(4) DEFAULT NULL,
  `due` varchar(11) DEFAULT NULL,
  `act` varchar(11) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `course_file` varchar(100) DEFAULT NULL,
  `course_file_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `courses`
--

INSERT INTO `courses` (`cid`, `cate`, `name`, `price_status`, `price`, `level`, `due_status`, `due`, `act`, `content`, `thumbnail`, `course_file`, `course_file_name`) VALUES
(69, '개발 · 프로그래밍//', '따라하며 배우는 자바스크립트 A-Z', '유료', 0, '초급', '무제한', '무제한', '활성', '', '/helloworld/img/class/20240501143637183547.png', '', '');

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
-- 테이블의 덤프 데이터 `lecture`
--

INSERT INTO `lecture` (`cid`, `l_idx`, `youtube_thumb`, `youtube_name`, `youtube_url`) VALUES
(43, 1, '/helloworld/img/class/20240501080003208337.png', 'test1', 'https://youtube.com/dfadf'),
(44, 2, '/helloworld/img/class/20240501080149115327.jpg', '차시명1', 'https://www.youtube.com/embed/z9chRlD1tec?si=lqBJvSDQ8PGB3NBq'),
(45, 3, '/helloworld/img/class/20240501080903776309.jpg', '차시명1', 'https://youtube.com/dfadf'),
(46, 4, '/helloworld/img/class/20240501081019434509.jpg', '차시명1', 'https://youtube.com/dfadf'),
(54, 7, '/helloworld/img/class/20240501085955168435.jpg', '테스트', 'https://youtube.com/dfadf'),
(56, 9, '/helloworld/img/class/20240501091008209755.jpg', '테스트', 'https://youtube.com/dfadf'),
(56, 10, '/helloworld/img/class/20240501091008623653.jpg', '테스트', 'https://youtube.com/dfadf2'),
(57, 11, '/helloworld/img/class/20240501091154124313.ico', '테스트1234', 'https://youtube.com/dfadf'),
(58, 12, '/helloworld/img/class/20240501091306160171.png', '테스트1234', 'https://youtube.com/dfadf'),
(58, 13, '/helloworld/img/class/20240501091306366546.png', '테스트1234', 'https://youtube.com/dfadf'),
(59, 14, '/helloworld/img/class/20240501093038159354.jpg', '테스트5555', 'https://youtube.com/dfadf'),
(59, 15, '/helloworld/img/class/20240501093038103341.jpg', '테스트55544', 'https://youtube.com/dfadf'),
(59, 16, '/helloworld/img/class/20240501093038479362.jpg', '테스트55555', 'https://youtube.com/dfadf'),
(59, 17, '/helloworld/img/class/20240501093038201587.jpg', '테스트55533', 'https://youtube.com/dfadf'),
(59, 18, '/helloworld/img/class/20240501093038877762.jpg', '테스트5512', 'https://youtube.com/dfadf'),
(60, 19, '/helloworld/img/class/20240501094411182803.png', '테스트', 'https://youtube.com/dfadf'),
(62, 21, '/helloworld/img/class/20240501105849673954.png', '테스트12', 'https://youtube.com/dfadf'),
(62, 22, '/helloworld/img/class/20240501105849153630.svg', '파일1', 'https://youtube.com/dfadf'),
(63, 23, '/helloworld/img/class/20240501110136971917.jpg', '테스트', 'https://youtube.com/dfadf'),
(64, 24, '/helloworld/img/class/20240501110254394729.jpg', '테스트', 'https://youtube.com/dfadf'),
(65, 25, '/helloworld/img/class/20240501125621110702.png', '차시테스트1', 'https://youtube.com/dfadf'),
(65, 26, '/helloworld/img/class/20240501125621163432.png', '차시테스트2', 'https://www.youtube.com/embed/z9chRlD1tec?si=lqBJvSDQ8PGB3NBq'),
(69, 27, '/helloworld/img/class/20240501143637609991.png', '테스트', 'https://youtube.com/dfadf');

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
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `coursefile`
--
ALTER TABLE `coursefile`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- 테이블의 AUTO_INCREMENT `lecture`
--
ALTER TABLE `lecture`
  MODIFY `l_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
