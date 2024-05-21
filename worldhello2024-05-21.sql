-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-05-21 05:15
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
(4, 'admin', 'admin@helloworld.com', 'HelloWorld', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:11', 100, '2024-05-21 03:46:00', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `attendance`
--

INSERT INTO `attendance` (`aid`, `userid`, `login_date`) VALUES
(1, 'green', '2024-01-05'),
(2, 'green', '2024-01-05'),
(3, 'green', '2024-01-10'),
(4, 'green', '2024-01-10'),
(5, 'green', '2024-01-15'),
(6, 'green', '2024-01-15'),
(7, 'green', '2024-01-20'),
(8, 'green', '2024-01-20'),
(9, 'green', '2024-01-25'),
(10, 'green', '2024-01-25'),
(11, 'green', '2024-02-01'),
(12, 'green', '2024-02-01'),
(13, 'green', '2024-02-05'),
(14, 'green', '2024-02-05'),
(15, 'green', '2024-02-10'),
(16, 'green', '2024-02-10'),
(17, 'green', '2024-02-15'),
(18, 'green', '2024-02-15'),
(19, 'green', '2024-02-20'),
(20, 'green', '2024-02-20'),
(21, 'green', '2024-03-01'),
(22, 'green', '2024-03-01'),
(23, 'green', '2024-03-05'),
(24, 'green', '2024-03-05'),
(25, 'green', '2024-03-10'),
(26, 'green', '2024-03-10'),
(27, 'green', '2024-03-15'),
(28, 'green', '2024-03-15'),
(29, 'green', '2024-03-20'),
(30, 'green', '2024-03-20'),
(31, 'green', '2024-04-01'),
(32, 'green', '2024-04-01'),
(33, 'green', '2024-04-05'),
(34, 'green', '2024-04-05'),
(35, 'green', '2024-04-10'),
(36, 'green', '2024-04-10'),
(37, 'green', '2024-04-15'),
(38, 'green', '2024-04-15'),
(39, 'green', '2024-04-20'),
(40, 'green', '2024-04-20'),
(41, 'green', '2024-05-01'),
(44, 'green', '2024-05-05'),
(46, 'green', '2024-05-10'),
(48, 'green', '2024-05-15'),
(49, 'green', '2024-01-02'),
(50, 'green', '2024-01-02'),
(51, 'green', '2024-01-12'),
(52, 'green', '2024-01-12'),
(53, 'green', '2024-01-22'),
(54, 'green', '2024-01-22'),
(55, 'green', '2024-01-28'),
(56, 'green', '2024-01-28'),
(57, 'green', '2024-02-03'),
(58, 'green', '2024-02-03'),
(59, 'green', '2024-02-13'),
(60, 'green', '2024-02-13'),
(61, 'green', '2024-02-23'),
(62, 'green', '2024-02-23'),
(63, 'green', '2024-02-28'),
(64, 'green', '2024-02-28'),
(65, 'green', '2024-03-03'),
(66, 'green', '2024-03-03'),
(67, 'green', '2024-03-13'),
(68, 'green', '2024-03-13'),
(69, 'green', '2024-03-23'),
(70, 'green', '2024-03-23'),
(71, 'green', '2024-03-28'),
(72, 'green', '2024-03-28'),
(73, 'green', '2024-04-03'),
(74, 'green', '2024-04-03'),
(75, 'green', '2024-04-13'),
(76, 'green', '2024-04-13'),
(77, 'green', '2024-04-23'),
(78, 'green', '2024-04-23'),
(79, 'green', '2024-04-28'),
(80, 'green', '2024-04-28'),
(82, 'green', '2024-05-03'),
(84, 'green', '2024-05-13'),
(85, 'green', '2024-01-08'),
(86, 'green', '2024-01-08'),
(87, 'green', '2024-01-18'),
(88, 'green', '2024-01-18'),
(89, 'green', '2024-01-27'),
(90, 'green', '2024-01-27'),
(91, 'green', '2024-02-07'),
(92, 'green', '2024-02-07'),
(93, 'green', '2024-02-17'),
(94, 'green', '2024-02-17'),
(96, 'green', '2024-05-20'),
(100, 'hong', '2024-05-20'),
(101, 'green', '2024-05-21'),
(102, 'seewon123', '2024-05-21');

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `cart`
--

INSERT INTO `cart` (`cartid`, `cid`, `userid`, `regdate`) VALUES
(1, 1, 'asdf', '2024-05-14 15:14:49');

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pcode` varchar(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `step` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cateid`, `code`, `pcode`, `name`, `step`) VALUES
(128, 'A001', '', '개발  · 프로그래밍', 1),
(129, 'A002', '', '데이터 사이언스', 1),
(130, 'A003', '', '인공지능', 1),
(131, 'A004', '', '디자인', 1),
(132, 'B001', '128', '웹 개발', 2),
(133, 'B002', '128', '프론트엔드', 2),
(134, 'B003', '128', '백엔드', 2),
(135, 'B004', '128', '풀스택', 2),
(136, 'B005', '128', '모바일 앱 개발', 2),
(137, 'B006', '128', '프로그래밍 언어', 2),
(138, 'B007', '128', '데이터베이스', 2),
(141, 'B0010', '128', '개발도구', 2),
(142, 'B0011', '128', '웹 퍼블리싱', 2),
(143, 'C1-01', '132', 'JavaScript', 3),
(144, 'C1-02', '132', 'HTML / CSS', 3),
(145, 'C1-03', '132', 'React', 3),
(146, 'C1-04', '132', 'Java', 3),
(147, 'C1-05', '132', 'Spring', 3),
(148, 'C1-06', '132', 'Spring Boot', 3),
(149, 'C1-07', '132', 'Python', 3),
(150, 'C1-08', '132', 'Node.js', 3),
(151, 'C1-09', '132', 'TypeScript', 3),
(152, 'C1-10', '132', 'Vue.js', 3),
(153, 'C1-11', '132', 'jQuery', 3),
(154, 'C1-12', '132', 'Django', 3),
(155, 'C2-01', '133', 'JavaScript', 3),
(156, 'C2-02', '133', 'React', 3),
(157, 'C2-03', '133', 'HTML / CSS', 3),
(158, 'C2-04', '133', 'TypeScript', 3),
(159, 'C2-05', '133', 'Vue.js', 3),
(160, 'C2-06', '133', 'NEXT.JS', 3),
(161, 'C2-07', '133', 'Node.js', 3),
(162, 'C2-08', '133', 'Java', 3),
(163, 'C2-09', '133', 'jQuery', 3),
(164, 'C2-10', '133', 'Spring', 3),
(165, 'C2-11', '133', 'ES6', 3),
(166, 'C3-01', '134', 'Java', 3),
(167, 'C3-02', '134', 'Spring', 3),
(168, 'C3-03', '134', 'Spring Boot', 3),
(169, 'C3-04', '134', 'Node.js', 3),
(170, 'C3-05', '134', 'JavaScript', 3),
(171, 'C3-06', '134', 'AWS', 3),
(172, 'C3-07', '134', 'Python', 3),
(173, 'C3-08', '134', 'React', 3),
(174, 'C3-09', '134', 'Docker', 3),
(175, 'C3-10', '134', 'MongoDB', 3),
(176, 'C3-11', '134', 'Backend', 3),
(177, 'C4-01', '135', 'JavaScript', 3),
(178, 'C4-02', '135', 'React', 3),
(179, 'C4-03', '135', 'Java', 3),
(180, 'C4-05', '135', 'Node.js', 3),
(181, 'C4-06', '135', 'Spring', 3),
(182, 'C4-07', '135', 'HTML / CSS', 3),
(183, 'C4-08', '135', 'Django', 3),
(184, 'C4-09', '135', 'Spring Boot', 3),
(185, 'C4-10', '135', 'Firebase', 3),
(186, 'C4-11', '135', 'MongoDB', 3),
(187, 'C4-12', '135', 'TypeScript', 3),
(188, 'C5-01', '136', 'iOS', 3),
(189, 'C5-02', '136', 'Android', 3),
(190, 'C5-03', '136', 'Swift', 3),
(191, 'C5-04', '136', 'Flutter', 3),
(192, 'C5-05', '136', 'Kotlin', 3),
(193, 'C5-06', '136', 'SwiftUI', 3),
(194, 'C5-07', '136', 'React Native', 3),
(195, 'C5-09', '136', 'Java', 3),
(196, 'C5-10', '136', 'JavaScript', 3),
(197, 'C6-01', '137', 'Python', 3),
(198, 'C6-02', '137', 'Java', 3),
(199, 'C6-03', '137', 'JavaScript', 3),
(200, 'C6-04', '137', '객체지향', 3),
(201, 'C6-05', '137', 'C', 3),
(202, 'C6-06', '137', 'C++', 3),
(206, 'C6-07', '137', 'Swift', 3),
(207, 'C6-07', '137', 'TypeScript', 3),
(208, 'C6-08', '137', 'Kotlin', 3),
(209, 'C7-01', '138', '알고리즘', 3),
(210, 'C7-02', '138', '코딩테스트', 3),
(211, 'C7-03', '138', 'Python', 3),
(212, 'C7-04', '138', 'Java', 3),
(213, 'C7-05', '138', 'C++', 3),
(214, 'C7-06', '138', 'JavaScript', 3),
(215, 'C7-07', '138', 'C', 3),
(216, 'C7-08', '138', '운영체제', 3),
(217, 'C7-09', '138', 'Swift', 3),
(218, 'C7-10', '138', '기술면접', 3),
(219, 'C7-11', '138', 'IOS', 3),
(220, 'C7-12', '138', '객체지향', 3),
(221, 'C8-01', '141', 'Git', 3),
(222, 'C8-02', '141', 'Python', 3),
(223, 'C8-03', '141', 'GitHub', 3),
(224, 'C8-04', '141', 'Java', 3),
(225, 'C8-05', '141', '버젼관리시스템', 3),
(226, 'C8-06', '141', '업무생산성', 3),
(227, 'C8-07', '141', 'JavaScript', 3),
(228, 'C8-08', '141', 'JIRA', 3),
(229, 'C8-09', '141', '협업 툴', 3),
(230, 'C8-10', '141', '프로젝트 관리', 3),
(231, 'C8-11', '141', 'ChatGPT', 3),
(232, 'C8-12', '141', 'IntelliJ IDEA', 3),
(235, 'C9-01', '142', 'HTML / CSS', 3),
(236, 'C9-02', '142', 'JavaScript', 3),
(237, 'C9-03', '142', 'jQuery', 3),
(238, 'C9-04', '142', '인터랩티브 웹', 3),
(239, 'C9-05', '142', '반응형 웹', 3),
(240, 'C9-06', '142', '웹 디자인', 3),
(241, 'C9-07', '142', '클론코딩', 3),
(242, 'C9-08', '142', '포트폴리오', 3),
(243, 'C9-09', '142', 'FLEX', 3),
(244, 'C9-10', '142', 'SASS', 3),
(245, 'B2', '129', '데이터분석', 2),
(246, 'B3', '129', '데이터 엔지니어링', 2),
(248, 'D1-01', '245', 'Python', 3),
(249, 'D1-02', '245', 'SQL', 3),
(250, 'D1-03', '245', '빅데이터', 3),
(251, 'D1-04', '245', 'Pandas', 3),
(252, 'D1-05', '245', '머신러닝', 3),
(253, 'D1-06', '245', 'Excel', 3),
(254, 'D1-07', '245', '웹 크롤링', 3),
(255, 'D1-08', '245', '포트폴리오', 3),
(256, 'D1-09', '245', 'MS-Office', 3),
(258, 'D2-01', '246', '빅데이터', 3),
(259, 'D2-02', '246', '데이터 엔지니어링', 3),
(260, 'D2-03', '246', 'Python', 3),
(261, 'D2-04', '246', 'SQL', 3),
(262, 'D2-05', '246', '머신러닝', 3),
(263, 'D2-06', '246', 'Kafka', 3),
(264, 'D2-07', '246', 'DBMS/RDBMS', 3),
(265, 'D2-08', '246', '데이터 리터리시', 3),
(266, 'D2-09', '246', '웹 크롤링', 3),
(267, 'B4', '130', '딥러닝 · 머신러닝', 2),
(268, 'B5', '130', 'AI  · ChatGPT 활용', 2),
(270, 'E1-01', '267', '머신러닝', 3),
(271, 'E1-02', '267', '딥러닝', 3),
(272, 'E1-03', '267', 'Python', 3),
(273, 'E1-04', '267', '인공지능(AI)', 3),
(274, 'E1-05', '267', 'Tensorflow', 3),
(275, 'E1-06', '267', '강화학습', 3),
(276, 'E1-07', '267', 'Keras', 3),
(277, 'E1-08', '267', 'Cuda', 3),
(278, 'E1-09', '267', 'CNN', 3),
(280, 'E2-01', '268', 'ChatGPT', 3),
(281, 'E2-02', '268', 'Python', 3),
(282, 'E2-03', '268', 'LLM', 3),
(283, 'E2-04', '268', '인공지능(AI)', 3),
(284, 'E2-05', '268', '딥러닝', 3),
(285, 'E2-06', '268', '머신러닝', 3),
(286, 'E2-07', '268', 'openAI API', 3),
(287, 'E2-08', '268', 'GPT', 3),
(288, 'E2-09', '268', 'LangChain', 3),
(289, 'B6', '131', 'UX/UI', 2),
(290, 'B7', '131', '그래픽 디자인', 2),
(292, 'F1-12', '289', 'Figma', 3),
(293, 'F1-11', '289', 'XD', 3),
(294, 'F1-10', '289', '사용자 인터뷰', 3),
(295, 'F1-01', '289', 'UX기획', 3),
(296, 'F1-02', '289', '서비스 기획', 3),
(297, 'F1-03', '289', '모바일 디자인', 3),
(298, 'F1-04', '289', 'UX', 3),
(299, 'F1-05', '289', 'UX 리서치', 3),
(300, 'F1-06', '289', '웹 디자인', 3),
(301, 'F1-07', '289', '프로토타이핑', 3),
(302, 'F1-08', '289', '포트폴리오', 3),
(303, 'F1-09', '289', '프로덕트디자인', 3),
(305, 'F2-12', '290', '프로토타이핑', 3),
(306, 'F2-11', '290', '캐릭터 디자인', 3),
(307, 'F2-10', '290', 'MAYA', 3),
(308, 'F2-01', '290', 'Photpshop', 3),
(309, 'F2-02', '290', 'Figma', 3),
(310, 'F2-03', '290', 'Blender', 3),
(311, 'F2-04', '290', '모바일 디자인', 3),
(312, 'F2-05', '290', 'illustrator', 3),
(313, 'F2-06', '290', '3d-modelling', 3),
(314, 'F2-07', '290', '3d-rendering', 3),
(315, 'F2-08', '290', '웹 디자인', 3),
(316, 'F2-09', '290', '드로잉', 3),
(323, 'qa-12', '245', 'PHP', 3),
(324, 'qw12', '142', 'HTML', 3);

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cpid` int(11) NOT NULL,
  `cp_name` varchar(100) NOT NULL COMMENT '쿠폰명',
  `cp_image` varchar(100) NOT NULL COMMENT '쿠폰이미지',
  `cp_type` varchar(11) NOT NULL COMMENT '쿠폰타입',
  `cp_price` int(11) NOT NULL COMMENT '할인금액',
  `cp_ratio` int(11) NOT NULL COMMENT '할인비율',
  `cp_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '상태',
  `cp_date` int(11) NOT NULL COMMENT '등록일',
  `cp_limit` varchar(11) NOT NULL COMMENT '최소사용금액'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cpid`, `cp_name`, `cp_image`, `cp_type`, `cp_price`, `cp_ratio`, `cp_status`, `cp_date`, `cp_limit`) VALUES
(3, '10000원 할인쿠폰(무제한)', '/helloworld/img/coupon/20240502194003129547.jpg', '0', 10000, 0, 1, 0, '6000'),
(4, '10000원 할인쿠폰(6개월)', '/helloworld/img/coupon/20240502194108376143.jpg', '정액', 10000, 0, 1, 6, '5000'),
(5, '3000원할인쿠폰(무제한)', '/helloworld/img/coupon/20240502193648161485.jpg', '0', 3000, 0, 1, 0, '6000'),
(6, '5000원 할인쿠폰(무제한)', '/helloworld/img/coupon/20240502193732197579.jpg', '0', 5000, 0, 1, 0, '5000'),
(7, '1000원 할인쿠폰(무제한)', '/helloworld/img/coupon/20240502193847116442.jpg', '0', 1000, 0, 1, 0, '3000'),
(8, '2000원 할인쿠폰(무제한)', '/helloworld/img/coupon/20240502193930149306.jpg', '0', 2000, 0, 1, 0, '4000'),
(27, '2개월 5000원 쿠폰', '/helloworld/img/coupon/20240513040302641687.jpg', '정액', 5000, 0, 1, 2, '5000'),
(28, '3개월 3000원 쿠폰', '/helloworld/img/coupon/20240513040342174469.jpg', '정액', 3000, 0, 1, 3, '4000'),
(29, '6개월 10000원 쿠폰', '/helloworld/img/coupon/20240513040522657116.jpg', '정액', 10000, 0, 1, 6, '5000'),
(30, '12개월 2000원 쿠폰', '/helloworld/img/coupon/20240513040551527925.jpg', '정액', 2000, 0, 1, 12, '5000'),
(31, '무제한 3000원 쿠폰', '/helloworld/img/coupon/20240513040627150547.png', '정액', 3000, 0, 1, 0, '5000'),
(32, '무제한 5000원 쿠폰', '/helloworld/img/coupon/20240513040700887254.png', '정액', 5000, 0, 1, 0, '5000'),
(33, '무제한 1000원 쿠폰', '/helloworld/img/coupon/20240513040719121579.png', '정액', 1000, 0, 1, 0, '5000'),
(34, '무제한 2000원 쿠폰', '/helloworld/img/coupon/20240513040747591567.png', '정액', 2000, 0, 1, 0, '4000');

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
  `course_file` text DEFAULT NULL,
  `course_file_name` varchar(100) DEFAULT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `courses`
--

INSERT INTO `courses` (`cid`, `cate`, `name`, `price_status`, `price`, `level`, `due_status`, `due`, `act`, `content`, `thumbnail`, `course_file`, `course_file_name`, `regdate`) VALUES
(22, '개발  · 프로그래밍/웹 개발/React', '만들고 비교하며 학습하는 리액트 (React)', '무료', 0, '초급', '무제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">리액트는 실무에서 가장 많이 찾는 인기있는 프론트엔드 기술입니다.</span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"> </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">리액트 기술을 이용해 어플리케이션을 빠르게 개발하고 유지 보수 가능한 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">코드를 만들어 보세요.</span><br></p>', '/helloworld/img/class/20240512064245109160.png', '/helloworld/img/classfile/20240512064245102761.png', '실습파일', '2024-05-13 12:34:42'),
(25, '개발  · 프로그래밍/웹 개발/HTML / CSS', 'HTML/CSS 베이스캠프', '무료', 20000, '중급', '제한', '9개월', '활성', '<h2 class=\"cd-body__title cd-body__intro-title\" style=\"margin-bottom: 16px; line-height: 1.45; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(52, 58, 64); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 22px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px; font-weight: normal;\">입문자</span><font color=\"#343a40\" face=\"Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, Helvetica Neue, Segoe UI, Apple SD Gothic Neo, Noto Sans KR, Malgun Gothic, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, sans-serif\"><span style=\"font-size: 22px; font-weight: 400; letter-spacing: -0.3px;\">를 위해 준비한</span></font><br><font color=\"#343a40\" face=\"Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, Helvetica Neue, Segoe UI, Apple SD Gothic Neo, Noto Sans KR, Malgun Gothic, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, sans-serif\"><span style=\"font-size: 22px; letter-spacing: -0.3px; font-weight: normal;\">[웹 개발, HTML/CSS] 강의입니다.</span></font><br></h2><p class=\"cd-body__description\" style=\"margin-bottom: 8px; line-height: 1.69; font-size: 16px; letter-spacing: -0.5px; color: rgb(73, 80, 87); font-weight: 500; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; background-color: rgb(255, 255, 255);\"><br></p>', '/helloworld/img/class/20240512061244502598.png', '/helloworld/img/classfile/20240512061244962049.png', '강의 실습파일', '2024-05-13 12:34:42'),
(37, '개발  · 프로그래밍/웹 개발/JavaScript', '자바스크립트(Javascript) - 기초부터 고급까지', '무료', 30000, '중급', '제한', '9개월', '활성', '<p style=\"margin-top: 8px; margin-bottom: 8px; font-size: 16px; line-height: 1.7; color: rgb(36, 41, 47); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px; background-color: rgb(255, 255, 255);\">모든 곳에서 자바스크립트(JS)를 사용하고 있습니다. 자바스크립트는 웹, 서버, 모바일 앱, 데스크탑 앱 등 다양한 영역에서 핵심 프로그래밍 언어로 사용되고 있습니다.</p><p style=\"margin-top: 8px; margin-bottom: 8px; font-size: 16px; line-height: 1.7; color: rgb(36, 41, 47); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: -0.3px; background-color: rgb(255, 255, 255);\"><br></p>', '/helloworld/img/class/20240512054413109923.png', '/helloworld/img/file/20240512055546537171.png', '강의파일', '2024-05-13 12:34:42'),
(39, '개발  · 프로그래밍/웹 개발/Spring Boot', '스프링 부트 - 핵심 원리와 활용', '무료', 0, '초급', '제한', '무제한', '활성', '<h2 class=\"cd-body__title cd-body__intro-title\" style=\"margin-bottom: 16px; font-size: 22px; letter-spacing: -0.3px; color: rgb(52, 58, 64); line-height: 1.45; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: inherit; font-weight: normal;\">초급자</span><span style=\"font-weight: 400;\">를 위해 준비한</span><br><span style=\"color: inherit; font-weight: normal;\">[백엔드, 웹 개발] 강의입니다.</span></h2><p class=\"cd-body__description\" style=\"margin-bottom: 8px; line-height: 1.69; font-size: 16px; letter-spacing: -0.5px; color: rgb(73, 80, 87); font-weight: 500; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; background-color: rgb(255, 255, 255);\">실무에 필요한 스프링 부트는 이 강의 하나로 모두 정리해드립니다.</p>', '/helloworld/img/class/20240512213457717977.png', '/helloworld/img/classfile/20240512213457112024.png', 'spring boot실습파일', '2024-05-13 12:34:42'),
(40, '개발  · 프로그래밍/웹 개발/Python', '프로그래밍 시작하기 : 파이썬 입문 ', '유료', 25000, '고급', '제한', '12개월', '비활성', '<h3 style=\"margin-top: 40px; margin-bottom: 10px; font-size: 22px; letter-spacing: -0.3px; line-height: 1.45; color: rgb(52, 58, 64); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: inherit;\">파이썬(Python)이란?</span></h3><p style=\"margin-bottom: 8px; line-height: 1.69; font-size: 16px; letter-spacing: -0.3px; color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; background-color: rgb(255, 255, 255);\">우리가 매일 만나는 웹 사이트, 앱을 만들 수 있는 프로그래밍 언어예요. 웹, 앱 말고도 게임, 인공지능 등 파이썬으로 할 수 있는 것들이 정말 많아요.</p>', '/helloworld/img/class/20240512233846652755.png', '/helloworld/img/classfile/20240512233846108510.png', '파이썬 실습파일', '2024-05-13 12:34:42'),
(41, '개발  · 프로그래밍/웹 개발/Node.js', 'Node.js 노드 빠르게 훑어보기', '무료', 0, '초급', '무제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px; background-color: rgb(255, 255, 255);\">Node.js는&nbsp;</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px; text-align: var(--bs-body-text-align);\">가볍고 빠르고 효율적입니다</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px; text-align: var(--bs-body-text-align);\">. 또한 JavaScript(자바스크립트) 문법을 </span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px; text-align: var(--bs-body-text-align);\"><br></span></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: -0.3px; text-align: var(--bs-body-text-align);\">동일하게 사용 가능하다는 점에서 더 큰 이점을 가지고 있습니다</span></p>', '/helloworld/img/class/20240512234551618704.png', '/helloworld/img/classfile/20240512234551175101.png', ' Node.js 실습파일', '2024-05-13 12:34:42'),
(50, '개발  · 프로그래밍/웹 개발/Java', '실전 자바 - 기본편', '무료', 0, '초급', '무제한', '무제한', '활성', '<h2 class=\"cd-body__title cd-body__intro-title\" style=\"margin-bottom: 16px; font-size: 22px; letter-spacing: -0.3px; color: rgb(52, 58, 64); line-height: 1.45; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: inherit; font-weight: normal;\">초급자</span><span style=\"font-weight: 400;\">를 위해 준비한</span><br><span style=\"color: inherit; font-weight: normal;\">[프로그래밍 언어, 웹 개발] 강의입니다.</span></h2>', '/helloworld/img/class/20240512210930481341.png', '/helloworld/img/classfile/20240512210930110323.png', 'java실습파일', '2024-05-13 12:34:42'),
(52, '개발  · 프로그래밍/웹 개발/Spring', '스프링 MVC', '유료', 30000, '고급', '제한', '9개월', '활성', '<h2 class=\"cd-body__title cd-body__intro-title\" style=\"margin-bottom: 16px; font-size: 22px; letter-spacing: -0.3px; color: rgb(52, 58, 64); line-height: 1.45; font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: inherit; font-weight: normal;\">초급자</span><span style=\"font-weight: 400;\">를 위해 준비한</span><br><span style=\"color: inherit; font-weight: normal;\">[백엔드, 웹 개발] 강의입니다.</span></h2>', '/helloworld/img/class/20240512211729491525.png', '/helloworld/img/classfile/20240512211729173249.png', ' spring  실습파일', '2024-05-13 12:34:42'),
(151, '개발  · 프로그래밍/프로그래밍 언어/TypeScript', '타입스크립트 입문 - 기초부터 실전까지', '무료', 0, '초급', '제한', '12개월', '비활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">타입스크립트를 시작하는 분들을 위한 강의입니다.</span></p><p><br></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">최신 자바스크립트 문법을 모르는 분들도 쉽게 배울 수 있도록 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">교과 과정을 구성하였습니다.&nbsp;</span><br></p>', '/helloworld/img/class/20240513001020826577.png', '/helloworld/img/classfile/20240513001020555242.png', 'Typescript  실습파일', '2024-05-13 12:34:42'),
(152, '개발  · 프로그래밍/웹 개발/Vue.js', 'Vue 3 시작하기', '유료', 30000, '고급', '무제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Vue.js 최신 버전 Vue 3를 시작하는 분들을 위한 강좌입니다. </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Vue.js의 동작원리부터 실무 개발을 할 때 알아둬야 하는 기본 개념들을 배워보세요.</span><br></p>', '/helloworld/img/class/20240513032916132551.png', '/helloworld/img/classfile/20240513032916148286.png', 'vue 실습파일', '2024-05-13 12:34:42'),
(153, '개발  · 프로그래밍/웹 개발/jQuery', 'jQuery 입문자를 위한 강의', '무료', 0, '중급', '제한', '9개월', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Javascript를 편리하게 사용할 수 있는 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">library인 jQuery에 대해 학습합니다.</span><br></p>', '/helloworld/img/class/20240513033354197827.png', '/helloworld/img/classfile/20240513033354160189.png', 'jquery실습파일', '2024-05-13 12:34:42'),
(154, '개발  · 프로그래밍/웹 개발/Django', 'Django 베이스캠프', '무료', 0, '고급', '제한', '12개월', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Django 베이스 캠프는 초보자부터 중급자까지 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Django 웹 프레임워크의 핵심을 체계적으로 학습할 수 있는 강의입니다.&nbsp;</span><br></p>', '/helloworld/img/class/20240513034052107984.png', '/helloworld/img/classfile/20240513034052525873.png', '', '2024-05-13 12:34:42'),
(155, '데이터 사이언스/데이터분석/Python', '파이썬 중급', '유료', 40000, '중급', '제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">중급 Python 과정은 함수형 프로그래밍, 메타 프로그래밍, </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">예외 처리 및 객체 지향 프로그래밍과 같은 고급 주제를 다루면서 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Python에 대한 이해를 심화하도록 설계되었습니다.</span><br></p>', '/helloworld/img/class/20240513034642749101.png', '/helloworld/img/classfile/20240513034642725107.png', ' 파이썬 중급', '2024-05-13 12:34:42'),
(157, '데이터 사이언스/데이터분석/SQL', '데이터 분석을 위한 고급 SQL 문제풀이', '무료', 50000, '고급', '무제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">누적 수강생 10,000명 이상, 풍부한 온/오프라인 강의 경험을 가진 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">데이터리안의&nbsp;</span><span style=\"background-color: rgb(255, 255, 255); color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; text-align: var(--bs-body-text-align);\">SQL 고급 문제풀이 강의. SQL 고급 내용을</span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">연습해 볼 수 있는 여러 문제를 함께 풀어봅니다.</span><br></p>', '/helloworld/img/class/20240513041355128221.png', '/helloworld/img/classfile/20240513041355208542.png', 'sql 문제파일', '2024-05-13 12:34:42'),
(158, '디자인/UX/UI/Figma', 'Figma 입문 (Inflearn Original)', '유료', 46000, '초급', '제한', '3개월', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">전세계 가장 많은 사람들이 사용하는 협업 툴 피그마를 배워보세요! </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">UI 디자인 스케치, 프로토타이핑 및 협업을 위한 디자인 도구 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">Figma(피그마)의 기본적인 사용법과 실무 활용법에 대해 학습해 봅니다.</span><br></p>', '/helloworld/img/class/20240513050650178904.jpg', '/helloworld/img/classfile/20240513050650164419.jpg', '피그마 실습파일', '2024-05-13 12:34:42'),
(159, '디자인/UX/UI/UX', 'UX/UI 시작하기 : UI 디자인 (Inflearn Original)', '무료', 0, '초급', '무제한', '무제한', '비활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">신입 UI/UX 디자이너가 되고자 하거나, UI 디자인에 대해 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">알아보고 싶은 분들을 대상으로 한 UI 디자인 기초 강의입니다. </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">UI 디자인에 대한 기본적인 지식 및 실무에서 꼭 알아야 할 디자인 팁 등을 배울 수 있습니다.</span><br></p>', '/helloworld/img/class/20240513052118170370.png', '/helloworld/img/classfile/20240513052118239459.png', 'ux 실습파일', '2024-05-13 12:34:42'),
(160, '디자인/그래픽 디자인/Photpshop', 'Adobe Photoshop CC 2019 입문자 가이드', '유료', 50000, '초급', '무제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">그래픽 편집 툴 포토샵의 제일 기본이 되는 중요한 기능을 </span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">차근차근 익히는 입문자용 포토샵 강의입니다.</span><br></p>', '/helloworld/img/class/20240513102423408373.png', '/helloworld/img/classfile/20240513102423121079.png', '포토샵 실습파일', '2024-05-13 12:34:42'),
(161, '데이터 사이언스/데이터분석/SQL', 'PHP 프로그래밍 실무 완전 정복! with MySQL', '무료', 50000, '중급', '무제한', '무제한', '활성', '<p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">본 강의는 PHP 프로그래밍 활용 개념 습득 </span></p><p><br></p><p><br></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">및 실습을 위한 강좌로 기획되었으며, </span></p><p><br></p><p><span style=\"color: rgb(73, 80, 87); font-family: Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, &quot;Apple SD Gothic Neo&quot;, &quot;Noto Sans KR&quot;, &quot;Malgun Gothic&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 500; letter-spacing: -0.5px; background-color: rgb(255, 255, 255);\">PHP 프로그래밍 활용개념을 습득하고자하는 수강생들을 위한 강좌입니다.</span><br></p>', '/helloworld/img/class/20240513103418622868.png', '/helloworld/img/classfile/20240513103418105726.png', 'php실습파일', '2024-05-13 12:34:42');

-- --------------------------------------------------------

--
-- 테이블 구조 `lecture`
--

CREATE TABLE `lecture` (
  `cid` int(11) NOT NULL,
  `l_idx` int(11) NOT NULL,
  `youtube_thumb` varchar(100) NOT NULL,
  `youtube_name` varchar(100) NOT NULL,
  `youtube_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `lecture`
--

INSERT INTO `lecture` (`cid`, `l_idx`, `youtube_thumb`, `youtube_name`, `youtube_url`) VALUES
(143, 218, '/helloworld/img/youclass/20240512054413210031.webp', '코딩은 처음이라 with 웹퍼플리싱 1강 - 자바스크립트 실행 방법', 'https://www.youtube.com/watch?v=UALtgO5aI8Y&list=PL-qMANrofLytcAyK7tPt9iCHrRxE9eb9z'),
(143, 219, '/helloworld/img/youclass/20240512054413100842.webp', '코딩은 처음이라 with 웹퍼플리싱 2강 - javascript 변수생성방법', 'https://www.youtube.com/watch?v=zxhA_272NxE&list=PL-qMANrofLytcAyK7tPt9iCHrRxE9eb9z&index=2'),
(143, 220, '/helloworld/img/youclass/20240512054413134553.webp', '코딩은 처음이라 with 웹퍼플리싱 3강 - javascript 변수타입, 산술 연산자', 'https://www.youtube.com/watch?v=QKoqf0VnAYg&list=PL-qMANrofLytcAyK7tPt9iCHrRxE9eb9z&index=3'),
(143, 221, '/helloworld/img/youclass/20240512054413200235.webp', '코딩은 처음이라 with 웹퍼플리싱 4강 - javascript 함수 생성, 함수 구조, 지역변수, 전역변수', 'https://www.youtube.com/watch?v=fSHYn5OBems&list=PL-qMANrofLytcAyK7tPt9iCHrRxE9eb9z&index=4'),
(143, 222, '/helloworld/img/youclass/20240512054413999485.webp', '코딩은 처음이라 with 웹퍼플리싱 5강 - javascript 함수 종류, 일반, 임의 즉시실행함수', 'https://www.youtube.com/watch?v=dAnT4TOPIJs&list=PL-qMANrofLytcAyK7tPt9iCHrRxE9eb9z&index=5'),
(144, 223, '/helloworld/img/youclass/20240512061244207932.webp', 'HTML 문서 기초 1', 'https://www.youtube.com/watch?v=bMexNKeBAZo&list=PL-qMANrofLyu-DwIipvbjXKJlbn4erp7X&index=16'),
(144, 224, '/helloworld/img/youclass/20240512061244729746.webp', 'HTML 문서 기초 2', 'https://www.youtube.com/watch?v=1a7_syGPYcQ&list=PL-qMANrofLyu-DwIipvbjXKJlbn4erp7X&index=15'),
(144, 225, '/helloworld/img/youclass/20240512061244714520.webp', 'HTML 문서 기초 3', 'https://www.youtube.com/watch?v=7ebLVTr2jU4&list=PL-qMANrofLyu-DwIipvbjXKJlbn4erp7X&index=14'),
(144, 226, '/helloworld/img/youclass/20240512061244104761.webp', 'HTML 문서 기초 4', 'https://www.youtube.com/watch?v=fKrNnV6wFYU&list=PL-qMANrofLyu-DwIipvbjXKJlbn4erp7X&index=13'),
(144, 227, '/helloworld/img/youclass/20240512061244119027.webp', 'HTML5 - 05', 'https://www.youtube.com/watch?v=XK37q1IsFT0&list=PL-qMANrofLyu-DwIipvbjXKJlbn4erp7X&index=12'),
(145, 228, '/helloworld/img/youclass/20240512064245922001.webp', 'react #1 리액트 라이브러리', 'https://www.youtube.com/watch?v=FcY35AfGbi4&list=PL-qMANrofLyuMzgr4sNJdqWfabJP5vvrw'),
(145, 229, '/helloworld/img/youclass/20240512064245136197.webp', 'react #2 리액트 프로젝트 ', 'https://www.youtube.com/watch?v=4a5BTKx8Pig&list=PL-qMANrofLyuMzgr4sNJdqWfabJP5vvrw&index=2'),
(145, 230, '/helloworld/img/youclass/20240512064245290787.webp', 'react #3 리액트 기초', 'https://www.youtube.com/watch?v=M3ExDBsUDio&list=PL-qMANrofLyuMzgr4sNJdqWfabJP5vvrw&index=3'),
(145, 231, '/helloworld/img/youclass/20240512064245210213.webp', 'react #4 리액트 컴포넌트', 'https://www.youtube.com/watch?v=oBdtvcwYQVE&list=PL-qMANrofLyuMzgr4sNJdqWfabJP5vvrw&index=4'),
(145, 232, '/helloworld/img/youclass/20240512064245211464.webp', 'react #5 리액트 게임', 'https://www.youtube.com/watch?v=7E7aIDGL5Kc&list=PL-qMANrofLyuMzgr4sNJdqWfabJP5vvrw&index=5'),
(146, 233, '/helloworld/img/youclass/20240512210930210229.webp', 'Java Interface - 1. 수업소개', 'https://www.youtube.com/watch?v=d_9tbUQ5G7E&list=PLuHgQVnccGMDiv-rCwlN-YjLKWR6-SBbM'),
(146, 234, '/helloworld/img/youclass/20240512210930544282.webp', 'Java Interface - 2. 인터페이스의 형식', 'https://www.youtube.com/watch?v=tVRKuSkgGko&list=PLuHgQVnccGMDiv-rCwlN-YjLKWR6-SBbM&index=2'),
(146, 235, '/helloworld/img/youclass/20240512210930117172.webp', 'Java Interface - 3. 다형성', 'https://www.youtube.com/watch?v=X98Tl5ANQs0&list=PLuHgQVnccGMDiv-rCwlN-YjLKWR6-SBbM&index=3'),
(146, 236, '/helloworld/img/youclass/20240512210930181605.webp', 'Java Interface - 4. 사용설명서', 'https://www.youtube.com/watch?v=DfurQh_GXSE&list=PLuHgQVnccGMDiv-rCwlN-YjLKWR6-SBbM&index=4'),
(146, 237, '/helloworld/img/youclass/20240512210930684718.webp', 'Java Interface - 5. 수업을 마치며', 'https://www.youtube.com/watch?v=kpPupb3Z_0c&list=PLuHgQVnccGMDiv-rCwlN-YjLKWR6-SBbM&index=5'),
(147, 238, '/helloworld/img/youclass/20240512211729169499.webp', '스프링 프레임워크 강의 1강', 'https://www.youtube.com/watch?v=XtXHIDnzS9c&list=PLq8wAnVUcTFUHYMzoV2RoFoY2HDTKru3T'),
(147, 239, '/helloworld/img/youclass/20240512211729164645.webp', '스프링 프레임워크 강의 2강 ', 'https://www.youtube.com/watch?v=KJ9Rus3QfUc&list=PLq8wAnVUcTFUHYMzoV2RoFoY2HDTKru3T&index=2'),
(147, 240, '/helloworld/img/youclass/20240512211729182005.webp', '스프링 프레임워크 강의 3강', 'https://www.youtube.com/watch?v=WjsDN_aFfyw&list=PLq8wAnVUcTFUHYMzoV2RoFoY2HDTKru3T&index=3'),
(147, 241, '/helloworld/img/youclass/20240512211729163860.webp', '스프링 프레임워크 강의 4강', 'https://www.youtube.com/watch?v=QrIp5zc6Bo4&list=PLq8wAnVUcTFUHYMzoV2RoFoY2HDTKru3T&index=4'),
(147, 242, '/helloworld/img/youclass/20240512211729474528.webp', '스프링 프레임워크 강의 5강', 'https://www.youtube.com/watch?v=gtqctgfywn4&list=PLq8wAnVUcTFUHYMzoV2RoFoY2HDTKru3T&index=5'),
(148, 243, '/helloworld/img/youclass/20240512213457202602.webp', '스프링부트 개념정리 with JPA 1강', 'https://www.youtube.com/watch?v=XBG6CUtVCIg&list=PL93mKxaRDidG_OIfRQ4nztPQ13y74lCYg&index=1'),
(148, 244, '/helloworld/img/youclass/20240512213457463269.webp', '스프링부트 개념정리 with JPA 2강', 'https://www.youtube.com/watch?v=mAFLNA9MYg8&list=PL93mKxaRDidG_OIfRQ4nztPQ13y74lCYg&index=2'),
(148, 245, '/helloworld/img/youclass/20240512213457158706.webp', '스프링부트 개념정리 with JPA 3강', 'https://www.youtube.com/watch?v=-5r52dt2HcU&list=PL93mKxaRDidG_OIfRQ4nztPQ13y74lCYg&index=3'),
(148, 246, '/helloworld/img/youclass/20240512213457393010.webp', '스프링부트 개념정리 with JPA 4강', 'https://www.youtube.com/watch?v=ajZIPOv31yE&list=PL93mKxaRDidG_OIfRQ4nztPQ13y74lCYg&index=4'),
(148, 247, '/helloworld/img/youclass/20240512213457599919.webp', '스프링부트 개념정리 with JPA 5강', 'https://www.youtube.com/watch?v=4CRpndN3tP0&list=PL93mKxaRDidG_OIfRQ4nztPQ13y74lCYg&index=5'),
(149, 248, '/helloworld/img/youclass/20240512233846774181.webp', '파이썬 기초 강의 [1강.파이썬 시작하기] ', 'https://www.youtube.com/watch?v=UMfCZMuZoRk&list=PLz2iXe7EqJOOTNTK27a4-WsgZU5NVfguh'),
(149, 249, '/helloworld/img/youclass/20240512233846198803.webp', '파이썬 기초 강의 [2강.파이썬 기초 문법]', 'https://www.youtube.com/watch?v=sS3NQrnfGzQ&list=PLz2iXe7EqJOOTNTK27a4-WsgZU5NVfguh&index=2'),
(149, 250, '/helloworld/img/youclass/20240512233846129450.webp', '파이썬 기초 강의 [3강. 자료형]', 'https://www.youtube.com/watch?v=WRhCvVooCUo&list=PLz2iXe7EqJOOTNTK27a4-WsgZU5NVfguh&index=3'),
(149, 251, '/helloworld/img/youclass/20240512233846174378.webp', '파이썬 기초 강의 [4강. 숫자 다루기]', 'https://www.youtube.com/watch?v=6XInJD_ZBc0&list=PLz2iXe7EqJOOTNTK27a4-WsgZU5NVfguh&index=4'),
(149, 252, '/helloworld/img/youclass/20240512233846819949.webp', '파이썬 기초 강의 [5강. 문자열 다루기]', 'https://www.youtube.com/watch?v=2oxlrjGw5vE&list=PLz2iXe7EqJOOTNTK27a4-WsgZU5NVfguh&index=5'),
(150, 253, '/helloworld/img/youclass/20240512234551129378.webp', '(Ep. 0) 시작하기 전 사전지식', 'https://www.youtube.com/watch?v=-zOfTS1HQTc&list=PLfLgtT94nNq1qmsvIii_CAxFlD7tvB5NE'),
(150, 254, '/helloworld/img/youclass/20240512234551173520.webp', '(Ep. 1) 서버에 대해 쉽게 설명', 'https://www.youtube.com/watch?v=NoLV5iP5FNY&list=PLfLgtT94nNq1qmsvIii_CAxFlD7tvB5NE&index=2'),
(150, 255, '/helloworld/img/youclass/20240512234551138960.webp', '(Ep.2-1) Node.js가 뭔지 알아보자', 'https://www.youtube.com/watch?v=pTm5E3jcOeY&list=PLfLgtT94nNq1qmsvIii_CAxFlD7tvB5NE&index=3'),
(150, 256, '/helloworld/img/youclass/20240512234551394550.webp', '(Ep.2-2) Node.js를 쓰는 이유', 'https://www.youtube.com/watch?v=k2GWnDb5zoQ&list=PLfLgtT94nNq1qmsvIii_CAxFlD7tvB5NE&index=4'),
(150, 257, '/helloworld/img/youclass/20240512234551305644.webp', 'Ep.3) 요즘 Express와 Node.js 설치법', 'https://www.youtube.com/watch?v=n-Ae22bpNWU&list=PLfLgtT94nNq1qmsvIii_CAxFlD7tvB5NE&index=5'),
(151, 258, '/helloworld/img/youclass/20240513001020419885.webp', 'TypeScript #1 타입스크립트를 쓰는 이유', 'https://www.youtube.com/watch?v=5oGAkQsGWkc&list=PLZKTXPmaJk8KhKQ_BILr1JKCJbR0EGlx0'),
(151, 259, '/helloworld/img/youclass/20240513001020779500.webp', 'TypeScript #2 기본 타입 - 타입스크립트 강좌', 'https://www.youtube.com/watch?v=70w82P-KiVM&list=PLZKTXPmaJk8KhKQ_BILr1JKCJbR0EGlx0&index=2'),
(151, 260, '/helloworld/img/youclass/20240513001020153941.webp', 'TypeScript #3 인터페이스(interface) ', 'https://www.youtube.com/watch?v=OIMPLNICzoc&list=PLZKTXPmaJk8KhKQ_BILr1JKCJbR0EGlx0&index=3'),
(151, 261, '/helloworld/img/youclass/20240513001020204700.webp', 'TypeScript #4 함수', 'https://www.youtube.com/watch?v=prfgfj03_VA&list=PLZKTXPmaJk8KhKQ_BILr1JKCJbR0EGlx0&index=4'),
(151, 262, '/helloworld/img/youclass/20240513001020123234.webp', 'TypeScript #5 리터럴, 유니온/교차 타입', 'https://www.youtube.com/watch?v=QZ8TRIJWCGQ&list=PLZKTXPmaJk8KhKQ_BILr1JKCJbR0EGlx0&index=5'),
(152, 263, '/helloworld/img/youclass/20240513032916146718.webp', 'Vue3 완벽 마스터 기본편 EP_01', 'https://www.youtube.com/watch?v=CV40gCH8xP0&list=PLlaP-jSd-nK_foOwYtxED1nCDKvI1W0P2&index=2'),
(152, 264, '/helloworld/img/youclass/20240513032916954350.webp', 'Vue3 완벽 마스터 기본편 EP_02', 'https://www.youtube.com/watch?v=xkixxgabC5M&list=PLlaP-jSd-nK_foOwYtxED1nCDKvI1W0P2&index=3'),
(152, 265, '/helloworld/img/youclass/20240513032916163267.webp', 'Vue3 완벽 마스터 기본편 EP_03 ', 'https://www.youtube.com/watch?v=z0h-eN6Xb4o&list=PLlaP-jSd-nK_foOwYtxED1nCDKvI1W0P2&index=4'),
(152, 266, '/helloworld/img/youclass/20240513032916515712.webp', 'Vue3 완벽 마스터 기본편 EP_04 ', 'https://www.youtube.com/watch?v=nBQ3wUolGj8&list=PLlaP-jSd-nK_foOwYtxED1nCDKvI1W0P2&index=5'),
(152, 267, '/helloworld/img/youclass/20240513032916403359.webp', 'Vue3 완벽 마스터 기본편 EP_05', 'https://www.youtube.com/watch?v=0ULrcsCjHU0&list=PLlaP-jSd-nK_foOwYtxED1nCDKvI1W0P2&index=6'),
(153, 268, '/helloworld/img/youclass/20240513033354350182.webp', 'jQuery 01 [ css 메서드 ] ', 'https://www.youtube.com/watch?v=uwn3Y4xzOcw&list=PL-qMANrofLyu4HcK14ntl-o7d-eHxo7-U'),
(153, 269, '/helloworld/img/youclass/20240513033354194414.webp', 'jQuery 02 [ 이벤트 ]', 'https://www.youtube.com/watch?v=vJxHImVT810&list=PL-qMANrofLyu4HcK14ntl-o7d-eHxo7-U&index=2'),
(153, 270, '/helloworld/img/youclass/20240513033354152440.webp', 'jQuery 03 [ 이벤트]', 'https://www.youtube.com/watch?v=ILyEEkNluKk&list=PL-qMANrofLyu4HcK14ntl-o7d-eHxo7-U&index=3'),
(153, 271, '/helloworld/img/youclass/20240513033354813920.webp', 'jQuery 04 [ animate 메서드 ]', 'https://www.youtube.com/watch?v=CgagsNcCYY4&list=PL-qMANrofLyu4HcK14ntl-o7d-eHxo7-U&index=4'),
(153, 272, '/helloworld/img/youclass/20240513033354161365.webp', 'jQuery 05 [ image caption animation ] ', 'https://www.youtube.com/watch?v=E4Vih_rpwaM&list=PL-qMANrofLyu4HcK14ntl-o7d-eHxo7-U&index=5'),
(154, 273, '/helloworld/img/youclass/20240513034052151011.webp', 'django 웹 프로그래밍 강좌 (#0 quick-install)', 'https://www.youtube.com/watch?v=alrLd9T96aA&list=PLi4xPOplIq7d1vDdLBAvS5PmQR-p6KwUz'),
(154, 274, '/helloworld/img/youclass/20240513034052193331.webp', 'django 웹 프로그래밍 강좌 (#1 Django app)', 'https://www.youtube.com/watch?v=9WctwW_Pe1o&list=PLi4xPOplIq7d1vDdLBAvS5PmQR-p6KwUz&index=2'),
(154, 275, '/helloworld/img/youclass/20240513034052140633.webp', 'django 웹 프로그래밍 강좌 (#2-0 git)', 'https://www.youtube.com/watch?v=u7CyyHK2P_Q&list=PLi4xPOplIq7d1vDdLBAvS5PmQR-p6KwUz&index=3'),
(154, 276, '/helloworld/img/youclass/20240513034052716939.webp', 'django 웹 프로그래밍 강좌 (#2-1 database)', 'https://www.youtube.com/watch?v=-Nmtakm70Ro&list=PLi4xPOplIq7d1vDdLBAvS5PmQR-p6KwUz&index=4'),
(154, 277, '/helloworld/img/youclass/20240513034052319075.webp', 'django 웹 프로그래밍 강좌 (#2-2 admin)', 'https://www.youtube.com/watch?v=DRDuwNYT_Zk&list=PLi4xPOplIq7d1vDdLBAvS5PmQR-p6KwUz&index=5'),
(155, 278, '/helloworld/img/youclass/20240513034642109620.webp', '[파이썬 중급] NO.1 ', 'https://www.youtube.com/watch?v=7JHhsU6woaM&list=PLRYL8FHwJMhASFeH3Q8rTe8Dc24fyVi-7&index=17'),
(155, 279, '/helloworld/img/youclass/20240513034642139190.webp', '[파이썬 중급] NO.2', 'https://www.youtube.com/watch?v=glys3KD1LCc&list=PLRYL8FHwJMhASFeH3Q8rTe8Dc24fyVi-7&index=16'),
(155, 280, '/helloworld/img/youclass/20240513034642136716.webp', '[파이썬 중급] NO.3', 'https://www.youtube.com/watch?v=5rvJ1dRvPyQ&list=PLRYL8FHwJMhASFeH3Q8rTe8Dc24fyVi-7&index=15'),
(155, 281, '/helloworld/img/youclass/20240513034642112658.webp', '[파이썬 중급] NO.4', 'https://www.youtube.com/watch?v=tNncm6AxBvE&list=PLRYL8FHwJMhASFeH3Q8rTe8Dc24fyVi-7&index=14'),
(155, 282, '/helloworld/img/youclass/20240513034642710779.webp', '[파이썬 중급] NO.5 ', 'https://www.youtube.com/watch?v=D2RnLLHZFG0&list=PLRYL8FHwJMhASFeH3Q8rTe8Dc24fyVi-7&index=13'),
(156, 283, '/helloworld/img/youclass/20240513035429840311.webp', 'SQL 기초 Ⅰ. 오리엔테이션 ', 'https://www.youtube.com/watch?v=27IOUaUTN04&list=PLnQ774XwcktxUSAi-uJYLNfFsPq-MwM88'),
(157, 284, '/helloworld/img/youclass/20240513041355830983.webp', 'SQL 기초 Ⅰ. 오리엔테이션', 'https://www.youtube.com/watch?v=27IOUaUTN04&list=PLnQ774XwcktxUSAi-uJYLNfFsPq-MwM88&index=1'),
(157, 285, '/helloworld/img/youclass/20240513041355106512.webp', 'SQL 고급 Ⅰ. 오리엔테이션', 'https://www.youtube.com/watch?v=DPVvspAaoIg&list=PLnQ774XwcktxUSAi-uJYLNfFsPq-MwM88&index=10'),
(157, 286, '/helloworld/img/youclass/20240513041355183980.webp', 'SQL 고급 Ⅱ. 서브쿼리(Subquery)', 'https://www.youtube.com/watch?v=Hj5edTNJe_Y&list=PLnQ774XwcktxUSAi-uJYLNfFsPq-MwM88&index=11'),
(157, 287, '/helloworld/img/youclass/20240513041355178615.webp', 'SQL 고급 Ⅲ. 서브쿼리 문제풀이', 'https://www.youtube.com/watch?v=r2xJ7A6e6o0&list=PLnQ774XwcktxUSAi-uJYLNfFsPq-MwM88&index=12'),
(157, 288, '/helloworld/img/youclass/20240513041355151644.webp', 'SQL 고급 Ⅳ. 정규표현식', 'https://www.youtube.com/watch?v=Q9bYNajIqtw&list=PLnQ774XwcktxUSAi-uJYLNfFsPq-MwM88&index=13'),
(158, 289, '/helloworld/img/youclass/20240513050650207810.webp', 'DESIGN 01 [Figma 1/4 ] ', 'https://www.youtube.com/watch?v=_myVwi0vq5s&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59'),
(158, 290, '/helloworld/img/youclass/20240513050650172925.webp', 'DESIGN 02 [Figma 2/4 ]', 'https://www.youtube.com/watch?v=e9YZPOUnv14&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=2'),
(158, 291, '/helloworld/img/youclass/20240513050650605417.webp', 'DESIGN 03 [Figma 3/4 ] ', 'https://www.youtube.com/watch?v=63OpBisj6DY&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=3'),
(158, 292, '/helloworld/img/youclass/20240513050650253514.webp', 'DESIGN 04 [Figma 4/4 ] ', 'https://www.youtube.com/watch?v=eGkJAxKmEDE&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=4'),
(158, 293, '/helloworld/img/youclass/20240513050650151541.webp', 'DESIGN 05 [ Blog site design part 1 ]', 'https://www.youtube.com/watch?v=RJLBF_7JqZY&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=5'),
(159, 294, '/helloworld/img/youclass/20240513052118115126.webp', 'DESIGN 06 [ Blog site design part 2 ]', 'https://www.youtube.com/watch?v=WN2hFr-C-fI&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=6'),
(159, 295, '/helloworld/img/youclass/20240513052118403494.webp', 'DESIGN 07 [ Blog site design part 3 ]', 'https://www.youtube.com/watch?v=mY7TfTS9spQ&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=7'),
(159, 296, '/helloworld/img/youclass/20240513052118169940.webp', 'DESIGN 08 [ Blog site design part 4 ] ', 'https://www.youtube.com/watch?v=n6_bI-KnjQA&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=8'),
(159, 297, '/helloworld/img/youclass/20240513052118919517.webp', 'DESIGN 09 [ Blog site design part 5 ] ', 'https://www.youtube.com/watch?v=11tOgw5vnrQ&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=9'),
(159, 298, '/helloworld/img/youclass/20240513052118148513.webp', 'DESIGN 10 [ Look Book Mobile #1 ]', 'https://www.youtube.com/watch?v=4gP2MhnW_YE&list=PL-qMANrofLyu2NMeIYkY5b650cKBVyR59&index=10'),
(160, 299, '/helloworld/img/youclass/20240513102423851074.webp', '[포토샵 강의] 레이어 마스크 기능', 'https://www.youtube.com/watch?v=r5FwKGe3_9E&list=PLcAqoF-WAlNaSw1Y4vVfgHDeYVdWpX6FT'),
(160, 300, '/helloworld/img/youclass/20240513102423112906.webp', '[포토샵 강의] 레이어 마스크 기능 활용', 'https://www.youtube.com/watch?v=r5FwKGe3_9E&list=PLcAqoF-WAlNaSw1Y4vVfgHDeYVdWpX6FT&index=1'),
(160, 301, '/helloworld/img/youclass/20240513102423677676.webp', '[포토샵 강의] 그림자효과 롱쉐도우', 'https://www.youtube.com/watch?v=nS3-dtQOHVk&list=PLcAqoF-WAlNaSw1Y4vVfgHDeYVdWpX6FT&index=3'),
(160, 302, '/helloworld/img/youclass/20240513102423180889.webp', '[포토샵 강의] 흑백이미지 칼라표현', 'https://www.youtube.com/watch?v=mY-kArdhAUw&list=PLcAqoF-WAlNaSw1Y4vVfgHDeYVdWpX6FT&index=4'),
(160, 303, '/helloworld/img/youclass/20240513102423742716.webp', '[타블렛 강좌] 와콤타블렛 포토샵', 'https://www.youtube.com/watch?v=xx9MztZsa6g&list=PLcAqoF-WAlNaSw1Y4vVfgHDeYVdWpX6FT&index=5'),
(161, 304, '/helloworld/img/youclass/20240513103418148347.webp', 'PHP 001 [ 환경설정 ]', 'https://www.youtube.com/watch?v=GpBVlFL6ZVA&list=PL-qMANrofLytZY15Agdi7wFc1seGO7Onb'),
(161, 305, '/helloworld/img/youclass/20240513103418906729.webp', 'PHP 002 [ 변수, 애러 ] ', 'https://www.youtube.com/watch?v=Wv6haVSf6vw&list=PL-qMANrofLytZY15Agdi7wFc1seGO7Onb&index=2'),
(161, 306, '/helloworld/img/youclass/20240513103418106006.webp', 'PHP 003 [ 조건문, 배열, 반복문 ]', 'https://www.youtube.com/watch?v=_oDE8lJGr7M&list=PL-qMANrofLytZY15Agdi7wFc1seGO7Onb&index=3'),
(161, 307, '/helloworld/img/youclass/20240513103418164059.webp', 'PHP 004 [ 반복문 ] PHP 기본문법', 'https://www.youtube.com/watch?v=QMeAd3Yx8M8&list=PL-qMANrofLytZY15Agdi7wFc1seGO7Onb&index=6'),
(161, 308, '/helloworld/img/youclass/20240513103418180879.webp', 'PHP 005 [ 함수, 변수 ]', 'https://www.youtube.com/watch?v=qvainHwkc38&list=PL-qMANrofLytZY15Agdi7wFc1seGO7Onb&index=4'),
(162, 309, '/helloworld/img/youclass/20240514180805147523.png', '테스트', 'https://www.youtube.com/watch?v=FOgSBMMg8gM'),
(163, 310, '/helloworld/img/youclass/20240516143743203734.JPG', '테스트', 'https://youtube.com/dfadf'),
(164, 311, '/helloworld/img/youclass/20240516143827661052.png', '테스트', 'https://youtube.com/dfadf'),
(165, 312, '/helloworld/img/youclass/20240516163138664019.png', '테스트12', 'https://www.youtube.com/embed/z9chRlD1tec?si=lqBJvSDQ8PGB3NBq'),
(166, 313, '/helloworld/img/youclass/20240516170330214328.JPG', '테스트', 'https://youtube.com/dfadf'),
(167, 314, '/helloworld/img/youclass/20240517111251847259.png', '테스트', 'https://youtube.com/dfadf'),
(168, 315, '/helloworld/img/youclass/20240520195944317662.JPG', '테스트121212', 'https://www.youtube.com/embed/z9chRlD1tec?si=lqBJvSDQ8PGB3NBq');

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `userid` varchar(145) NOT NULL,
  `email` varchar(245) NOT NULL,
  `username` varchar(145) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `recent_in` date DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `userimg` varchar(255) DEFAULT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`mid`, `userid`, `email`, `username`, `passwd`, `recent_in`, `tel`, `status`, `userimg`, `regdate`) VALUES
(5, 'green', 'd', '홍길동16수정', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-05-21', '010-2222-2222', 0, NULL, '2024-04-24'),
(6, 'john_doe', 'john@example.com', 'JohnDoe', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-29', '555-1234', 1, NULL, '2024-03-15'),
(7, 'jane_smith', 'janesmith@gmail.com', 'JaneSmith92', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-5678', 0, NULL, '2024-02-03'),
(8, 'alex_wilson', 'alex.wilson@company.com', 'AlexWilson', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-9012', 1, NULL, '2024-01-10'),
(9, 'sarah_lee', 'sarahlee@hotmail.com', 'SarahLee88', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-3456', 0, NULL, '2023-12-22'),
(10, 'michael_brown', 'mbrown@gmail.com', 'MichaelB', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-25', '555-7890', 1, NULL, '2023-11-05'),
(11, 'emily_davis', 'emily.davis@example.net', 'EmilyD', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-2345', 0, NULL, '2023-10-18'),
(12, 'david_miller', 'david@company.com', 'DavidMiller', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-6789', 1, NULL, '2023-09-27'),
(15, 'amanda_taylor', 'amandataylor@example.com', 'AmandaT', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-8901', 0, NULL, '2023-06-05'),
(16, 'kevin_martin', 'kevin@company.net', 'KevinMartin', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-2345', 1, NULL, '2023-05-17'),
(17, 'sophia_chen', 'sophiachen@gmail.com', 'SophiaChen', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-6789', 1, NULL, '2023-04-28'),
(18, 'william_garcia', 'william.garcia@hotmail.com', 'WillGarcia', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-29', '555-0123', 1, NULL, '2023-03-09'),
(19, 'olivia_rodriguez', 'olivia@example.com', 'OliviaRod', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-26', '555-4567', 0, NULL, '2023-02-18'),
(20, 'daniel_martinez', 'daniel.martinez@company.com', 'DanielM', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-8901', 1, NULL, '2023-01-30'),
(21, 'isabella_hernandez', 'isabella@gmail.com', 'IsabellaH', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-2345', 0, NULL, '2022-12-11'),
(22, 'matthew_gonzalez', 'matthewg@hotmail.com', 'MatthewG', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-6789', 1, NULL, '2022-11-22'),
(23, 'ava_perez', 'ava.perez@example.net', 'AvaPez', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-29', '555-0123', 0, NULL, '2022-10-03'),
(24, 'jacob_sanchez', 'jacob@company.com', 'JacobSanchez', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-26', '555-4567', 1, NULL, '2022-09-15'),
(25, 'junb', 'junb@gmail.com', '바오밥', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '010-1234-5678', 1, NULL, '2024-04-02'),
(26, 'sarahj', 'sarah.jones@example.com', 'SarahJones', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-0192', 0, NULL, '2023-11-21'),
(27, 'alexr', 'alex@mycompany.org', 'AlexRyan', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-29', '555-2468', 1, NULL, '2023-08-05'),
(29, 'mariab', 'maria.brown@hotmail.com', 'MariaB', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-26', '555-5512', 1, NULL, '2023-03-27'),
(30, 'tomh', 'tom@example.net', 'TomHanks', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-7824', 0, NULL, '2022-12-08'),
(31, 'kchang', 'kevin.chang@company.com', 'KevinChang', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-25', '555-1936', 1, NULL, '2022-09-19'),
(32, 'lrodriguez', 'laura@gmail.com', 'LauRod', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-4072', 0, NULL, '2022-07-03'),
(33, 'stevew', 'steve.wilson@mycompany.org', 'SteveWilson', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-6184', 1, NULL, '2022-04-16'),
(34, 'agarcia', 'amy.garcia@hotmail.com', 'AmyGarcia', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-29', '555-8296', 0, NULL, '2022-02-25'),
(35, 'bobsmith', 'bob@example.com', 'BobbySmith', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-26', '555-0408', 1, NULL, '2021-12-09'),
(36, 'jlee', 'jessica.lee@company.net', 'JessLee', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-2520', 0, NULL, '2021-09-22'),
(37, 'davidp', 'david@gmail.com', 'DavidPark', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-25', '555-4632', 1, NULL, '2021-07-05'),
(38, 'michelleb', 'michelle.brown@example.org', 'MichelleBrown', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-6744', 0, NULL, '2021-04-17'),
(39, 'markj', 'mark.johnson@hotmail.com', 'MarkJohnson', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-8856', 1, NULL, '2021-02-28'),
(40, 'annak', 'anna@company.com', 'AnnaKim', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-28', '555-0968', 0, NULL, '2020-12-11'),
(41, 'josephp', 'joseph.park@gmail.net', 'JosephPark', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-29', '555-3080', 1, NULL, '2020-10-23'),
(42, 'karenm', 'karen@example.org', 'KarenMiller', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-26', '555-5192', 0, NULL, '2020-09-06'),
(43, 'ryanj', 'ryan.jones@mycompany.com', 'RyanJones', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-30', '555-7304', 1, NULL, '2020-07-18'),
(44, 'amyl', 'amy.lewis@hotmail.com', 'AmyLewis', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-27', '555-9416', 0, NULL, '2020-05-29'),
(45, 'junb', 'junb@gmail.com', '바오밥', '2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-04-28', '010-1234-5678', 1, NULL, '2024-04-02'),
(46, 'sarahj', 'sarah.jones@example.com', 'SarahJones', '$2a$12$WzUFbjmTfqp7W9uEUOHxcuwhp5FNReIrz9eDdsltYhTZgMgTrYfAa', '2024-04-30', '555-0192', 0, NULL, '2023-11-21'),
(47, 'alexr', 'alex@mycompany.org', 'AlexRyan', '$2y$10$EXAMPLEORsVdbmNHtEnSgeYb4B8kTIOzGKpviys.sJDB6Yh56EHQG', '2024-04-29', '555-2468', 1, NULL, '2023-08-05'),
(48, 'jdavis', 'john.davis@gmail.com', 'JohnnyD', '$2a$12$wzEl2xmfcgMsYsVvHxznCu8b7OSm0srhTyLtvklchTDTaV8AHHCXK', '2024-04-27', '555-8024', 0, NULL, '2023-06-14'),
(49, 'mariab', 'maria.brown@hotmail.com', 'MariaB', '$2y$10$EXAMPLEkZcYvZILiMy5ye0LEVhZD5BplnfQR0Rz8e5BHwsnobx7Z6', '2024-04-26', '555-5512', 1, NULL, '2023-03-27'),
(50, 'tomh', 'tom@example.net', 'TomHanks', '$2a$12$EXAMPLEJFlTdp9B/G9a4FOtStGGwuoG4ZXKumcsAVuy0YFEpyMKQe', '2024-04-28', '555-7824', 0, NULL, '2022-12-08'),
(51, 'kchang', 'kevin.chang@company.com', 'KevinChang', '$2y$10$EXAMPLEKvG4X4PH51OdSBOF7FsKckYGOiLsxz.rRbXIKtWlcGzKSe', '2024-04-25', '555-1936', 1, NULL, '2022-09-19'),
(52, 'lrodriguez', 'laura@gmail.com', 'LauRod', '$2a$12$EXAMPLEcxfklsWYUFn/UM.6hk0SkTLnDBXuQHF0bfLOP0HaSBdyHC', '2024-04-30', '555-4072', 0, NULL, '2022-07-03'),
(53, 'stevew', 'steve.wilson@mycompany.org', 'SteveWilson', '$2y$10$EXAMPLEDIEYr7l.V7lIq3.EQqksrJkkhfsG0RnJYxzCdOSd2BKHf2', '2024-04-27', '555-6184', 1, NULL, '2022-04-16'),
(54, 'agarcia', 'amy.garcia@hotmail.com', 'AmyGarcia', '$2a$12$EXAMPLEwDVcFAk9RwW8hV.XTg6EhP8Qmn4vQz2qUtO2D6IqvXzYqu', '2024-04-29', '555-8296', 0, NULL, '2022-02-25'),
(55, 'bobsmith', 'bob@example.com', 'BobbySmith', '$2y$10$EXAMPLEsAOlTdNDvKJqMbusGfLjnxM6q1UwHTDwcAPFMjsJi46GDu', '2024-04-26', '555-0408', 1, NULL, '2021-12-09'),
(56, 'jlee', 'jessica.lee@company.net', 'JessLee', '$2a$12$EXAMPLEtMwxFTybjcKNMxudcudBbOsXsIqzpg/9OgFyLdJuCWwaDO', '2024-04-28', '555-2520', 0, NULL, '2021-09-22'),
(57, 'davidp', 'david@gmail.com', 'DavidPark', '$2y$10$EXAMPLEeLNPjPcf9/R/F1.2Z2E/uDOWzMN6xOlxb4BCjpq8EJWcaG', '2024-04-25', '555-4632', 1, NULL, '2021-07-05'),
(58, 'seewon', 'fasfasf@gmail.com', '임시원', '3736411d6fe920ba24403775d607def2d76448e769523663103d8d7697513c5b161ce6c0d77bd48848c54525321334e2a7d1ec2eec889b6aafa406925780b49e', NULL, '01054846846', 1, '', '2024-05-13'),
(59, 'green161', 'asdf@asdf.com', 'asdf', '6c3b52eb9d7131119181c235b7726654339111ee690cd22e0ec6014cf2c3cb4155040c126a0e8715535b0622c4da0151eb8b05c731a599f8c872b82275eab809', NULL, '01000000000', 1, '', '2024-05-16'),
(60, 'green1231', 'adf@asdf.com', 'asdf', '6c3b52eb9d7131119181c235b7726654339111ee690cd22e0ec6014cf2c3cb4155040c126a0e8715535b0622c4da0151eb8b05c731a599f8c872b82275eab809', NULL, '01000000000', 1, '', '2024-05-16'),
(61, 'seewon123', 'dsdweq@gmail.com', '임시원', '7761a90fca68b3a632ac1b469f28ba34c986d7d4c6f1f1d2081b09381e29687f23bc4d0d4c88fb46b0d1fac85c97af38f6f1ca6773382c96f713a890a415fdaf', '2024-05-21', '01054846846', 1, '', '2024-05-16'),
(62, 'hong', 'dsdweq@gmail.com', 'hong', '956da07347f46dbdb85fb0b4001dde17530858d5959f4c2c93e8beffcb10496fcfea517bc3eb87deb394c87ed644a78eae7021da5d306d2f9e0baeca7ec99ebd', '2024-05-20', '01054846846', 1, '', '2024-05-20');

-- --------------------------------------------------------

--
-- 테이블 구조 `msg`
--

CREATE TABLE `msg` (
  `sendername` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `mid` int(11) NOT NULL,
  `regdate` date NOT NULL,
  `msgidx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `msg`
--

INSERT INTO `msg` (`sendername`, `content`, `mid`, `regdate`, `msgidx`) VALUES
('HelloWorld', '수업 자료가 업데이트되었습니다. 새로운 자료를 확인해 주세요.', 5, '2024-05-01', 4),
('HelloWorld', '이번 주말에 예정된 시험 일정을 다시 한번 확인해 주세요.', 5, '2024-05-02', 5),
('HelloWorld', '과제 제출 기한이 다가오고 있습니다. 제출을 잊지 마세요.', 5, '2024-05-03', 6),
('HelloWorld', '온라인 토론 게시판에 참여해 주세요. 의견을 공유해 주세요.', 5, '2024-05-04', 7),
('HelloWorld', '새로운 퀴즈가 게시되었습니다. 기한 내에 완료해 주세요.', 5, '2024-05-05', 8),
('HelloWorld', '오늘 예정된 실시간 강의에 참석해 주세요. 링크는 이메일로 전송되었습니다.', 5, '2024-05-06', 9),
('HelloWorld', '학습 자료의 최신 업데이트를 확인해 주세요. 중요한 변경 사항이 있습니다.', 5, '2024-05-07', 10),
('HelloWorld', '강의 자료에 오류가 발견되었습니다. 수정된 내용을 확인해 주세요.', 5, '2024-05-08', 11),
('HelloWorld', '다음 주 월요일부터 새로운 수업이 시작됩니다. 준비해 주세요.', 5, '2024-05-09', 12),
('HelloWorld', '수업 평가 설문에 참여해 주세요. 여러분의 의견이 필요합니다.', 5, '2024-05-10', 13),
('HelloWorld', '과제에 대한 피드백이 게시되었습니다. 확인해 주세요.', 5, '2024-05-11', 14),
('HelloWorld', '다음 주 실습 일정이 변경되었습니다. 새 일정을 확인해 주세요.', 5, '2024-05-12', 15),
('HelloWorld', '기말고사 준비를 위한 특별 강의가 있습니다. 참여해 주세요.', 5, '2024-05-13', 16),
('HelloWorld', '이번 주 수업에 대한 질문이 있으시면 언제든지 연락해 주세요.', 5, '2024-05-14', 17),
('HelloWorld', '추가 학습 자료가 게시되었습니다. 복습해 주세요.', 5, '2024-05-15', 18),
('HelloWorld', '과제 제출 시 주의사항을 다시 한번 확인해 주세요.', 5, '2024-05-16', 19),
('HelloWorld', '학습 진도 체크를 위해 개별 미팅을 예약해 주세요.', 5, '2024-05-17', 20),
('HelloWorld', '학습 관리 시스템에 오류가 발생했습니다. 불편을 드려 죄송합니다.', 5, '2024-05-18', 21),
('HelloWorld', '새로운 토론 주제가 게시되었습니다. 적극적으로 참여해 주세요.', 5, '2024-05-01', 22),
('HelloWorld', '다음 주 시험 범위가 공지되었습니다. 확인해 주세요.', 5, '2024-05-02', 23),
('HelloWorld', '과제 채점이 완료되었습니다. 결과를 확인해 주세요.', 5, '2024-05-03', 24),
('HelloWorld', '새로운 과제가 게시되었습니다. 기한 내에 제출해 주세요.', 5, '2024-05-04', 25),
('HelloWorld', '강의 자료에 중요한 업데이트가 있습니다. 꼭 확인해 주세요.', 5, '2024-05-05', 26),
('HelloWorld', '학습 자료를 다운로드할 수 있습니다. 필요한 자료를 확인해 주세요.', 5, '2024-05-06', 27),
('HelloWorld', '학생 포트폴리오 작성에 대한 안내가 게시되었습니다. 참고해 주세요.', 5, '2024-05-07', 28),
('HelloWorld', '수업 평가 설문을 작성해 주세요. 여러분의 의견이 중요합니다.', 5, '2024-05-08', 29),
('HelloWorld', '과제 제출 기한이 연장되었습니다. 새로운 기한을 확인해 주세요.', 5, '2024-05-09', 30),
('HelloWorld', '시험 준비를 위해 복습 자료를 확인해 주세요.', 5, '2024-05-10', 31),
('HelloWorld', '강의에 대한 피드백을 남겨 주세요. 여러분의 의견이 필요합니다.', 5, '2024-05-11', 32),
('HelloWorld', '오늘의 강의 녹화본이 업로드되었습니다. 복습에 활용해 주세요.', 5, '2024-05-12', 33),
('HelloWorld', '기말고사 일정이 변경되었습니다. 새 일정을 확인해 주세요.', 5, '2024-05-13', 34),
('HelloWorld', '과제 제출 상태를 확인해 주세요. 미제출 과제가 있는지 확인하세요.', 5, '2024-05-14', 35),
('HelloWorld', '수업 자료 업데이트를 확인해 주세요. 새로운 자료가 추가되었습니다.', 5, '2024-05-15', 36),
('HelloWorld', '다음 주 강의에 대한 사전 자료가 업로드되었습니다. 확인해 주세요.', 5, '2024-05-16', 37),
('HelloWorld', '과제 피드백이 게시되었습니다. 자세한 내용을 확인해 주세요.', 5, '2024-05-17', 38),
('HelloWorld', '온라인 강의실에 접속 문제가 발생했습니다. 빠른 해결을 위해 노력 중입니다.', 5, '2024-05-18', 39),
('HelloWorld', '학습 자료 다운로드 링크가 수정되었습니다. 다시 시도해 주세요.', 5, '2024-05-01', 40),
('HelloWorld', '과제 제출 시 파일 형식에 유의해 주세요. 규격에 맞추어 제출해 주세요.', 5, '2024-05-02', 41),
('HelloWorld', '학습 진도 점검을 위해 주간 퀴즈를 진행합니다. 참여해 주세요.', 5, '2024-05-03', 42),
('HelloWorld', '학생 간의 협업 프로젝트 안내가 게시되었습니다. 자세한 내용은 확인해 주세요.', 5, '2024-05-04', 43),
('HelloWorld', '다음 주 실습 자료가 업데이트되었습니다. 확인해 주세요.', 5, '2024-05-05', 44),
('HelloWorld', '수업 자료가 업데이트되었습니다. 새로운 자료를 확인하고 복습해 주세요.', 5, '2024-05-01', 45),
('HelloWorld', '이번 주말에 예정된 시험 일정을 다시 한번 확인해 주시고, 준비해 주세요.', 5, '2024-05-02', 46),
('HelloWorld', '과제 제출 기한이 다가오고 있습니다. 제출을 잊지 말고 기한 내에 완료해 주세요.', 5, '2024-05-03', 47),
('HelloWorld', '온라인 토론 게시판에 참여해 주세요. 다양한 의견을 공유하고 논의해 주세요.', 5, '2024-05-04', 48),
('HelloWorld', '새로운 퀴즈가 게시되었습니다. 기한 내에 완료하고 점수를 확인해 주세요.', 5, '2024-05-05', 49),
('HelloWorld', '오늘 예정된 실시간 강의에 참석해 주세요. 링크는 이메일로 전송되었습니다.', 5, '2024-05-06', 50),
('HelloWorld', '학습 자료의 최신 업데이트를 확인해 주세요. 중요한 변경 사항이 있습니다.', 5, '2024-05-07', 51),
('HelloWorld', '강의 자료에 오류가 발견되었습니다. 수정된 내용을 확인해 주시기 바랍니다.', 5, '2024-05-08', 52),
('HelloWorld', '다음 주 월요일부터 새로운 수업이 시작됩니다. 미리 준비해 주세요.', 5, '2024-05-09', 53),
('HelloWorld', '수업 평가 설문에 참여해 주세요. 여러분의 소중한 의견이 필요합니다.', 5, '2024-05-10', 54),
('HelloWorld', '과제에 대한 피드백이 게시되었습니다. 확인하고 필요한 수정사항을 반영해 주세요.', 5, '2024-05-11', 55),
('HelloWorld', '다음 주 실습 일정이 변경되었습니다. 새로운 일정을 확인해 주시기 바랍니다.', 5, '2024-05-12', 56),
('HelloWorld', '기말고사 준비를 위한 특별 강의가 예정되어 있습니다. 꼭 참여해 주세요.', 5, '2024-05-13', 57),
('HelloWorld', '이번 주 수업에 대한 질문이 있으시면 언제든지 연락해 주세요. 감사합니다.', 5, '2024-05-14', 58),
('HelloWorld', '추가 학습 자료가 게시되었습니다. 복습하고 학습 내용을 강화해 주세요.', 5, '2024-05-15', 59),
('HelloWorld', '과제 제출 시 주의사항을 다시 한번 확인해 주세요. 오류 없이 제출해 주세요.', 5, '2024-05-16', 60),
('HelloWorld', '학습 진도 체크를 위해 개별 미팅을 예약해 주세요. 시간을 조율해 주세요.', 5, '2024-05-17', 61),
('HelloWorld', '학습 관리 시스템에 오류가 발생했습니다. 불편을 드려 죄송합니다.', 5, '2024-05-18', 62),
('HelloWorld', '새로운 토론 주제가 게시되었습니다. 적극적으로 참여해 주세요.', 5, '2024-05-01', 63),
('HelloWorld', '다음 주 시험 범위가 공지되었습니다. 확인하고 준비해 주세요.', 5, '2024-05-02', 64),
('HelloWorld', '과제 채점이 완료되었습니다. 결과를 확인하고 피드백을 반영해 주세요.', 5, '2024-05-03', 65),
('HelloWorld', '새로운 과제가 게시되었습니다. 기한 내에 제출해 주시기 바랍니다.', 5, '2024-05-04', 66),
('HelloWorld', '강의 자료에 중요한 업데이트가 있습니다. 꼭 확인해 주세요.', 5, '2024-05-05', 67),
('HelloWorld', '학습 자료를 다운로드할 수 있습니다. 필요한 자료를 확인해 주세요.', 5, '2024-05-06', 68),
('HelloWorld', '학생 포트폴리오 작성에 대한 안내가 게시되었습니다. 참고해 주세요.', 5, '2024-05-07', 69),
('HelloWorld', '수업 평가 설문을 작성해 주세요. 여러분의 의견이 중요합니다.', 5, '2024-05-08', 70),
('HelloWorld', '과제 제출 기한이 연장되었습니다. 새로운 기한을 확인해 주세요.', 5, '2024-05-09', 71),
('HelloWorld', '시험 준비를 위해 복습 자료를 확인해 주세요. 공부에 도움 되시길 바랍니다.', 5, '2024-05-10', 72),
('HelloWorld', '강의에 대한 피드백을 남겨 주세요. 여러분의 의견이 필요합니다.', 5, '2024-05-11', 73),
('HelloWorld', '오늘의 강의 녹화본이 업로드되었습니다. 복습에 활용해 주세요.', 5, '2024-05-12', 74),
('HelloWorld', '기말고사 일정이 변경되었습니다. 새로운 일정을 확인해 주세요.', 5, '2024-05-13', 75),
('HelloWorld', '과제 제출 상태를 확인해 주세요. 미제출 과제가 있는지 확인하세요.', 5, '2024-05-14', 76),
('HelloWorld', '수업 자료 업데이트를 확인해 주세요. 새로운 자료가 추가되었습니다.', 5, '2024-05-15', 77),
('HelloWorld', '다음 주 강의에 대한 사전 자료가 업로드되었습니다. 확인해 주세요.', 5, '2024-05-16', 78),
('HelloWorld', '과제 피드백이 게시되었습니다. 자세한 내용을 확인해 주세요.', 5, '2024-05-17', 79),
('HelloWorld', '온라인 강의실에 접속 문제가 발생했습니다. 빠른 해결을 위해 노력 중입니다.', 5, '2024-05-18', 80),
('HelloWorld', '학습 자료 다운로드 링크가 수정되었습니다. 다시 시도해 주세요.', 5, '2024-05-01', 81),
('HelloWorld', '과제 제출 시 파일 형식에 유의해 주세요. 규격에 맞추어 제출해 주세요.', 5, '2024-05-02', 82),
('HelloWorld', '학습 진도 점검을 위해 주간 퀴즈를 진행합니다. 참여해 주세요.', 5, '2024-05-03', 83),
('HelloWorld', '학생 간의 협업 프로젝트 안내가 게시되었습니다. 자세한 내용은 확인해 주세요.', 5, '2024-05-04', 84);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `idx` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `view` varchar(1000) DEFAULT NULL,
  `content` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `regdate` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`idx`, `title`, `name`, `view`, `content`, `file`, `regdate`, `image`) VALUES
(167, '새로운 강좌 오픈 안내', '운영자', '14', '새로운 프로그래밍 언어 강좌가 오픈되었습니다. 수강 신청 기간을 확인해주세요.', 'new_course.jpg', '2024-05-03 09:30:00', ''),
(168, '이용 약관 변경 공지', '운영자', '11', '이용 약관이 일부 변경되었습니다. 변경 내용을 확인하시고 동의 부탁드립니다.', 'terms_update.pdf', '2024-05-04 14:45:00', ''),
(169, '시스템 점검 안내', '운영자', '7', '시스템 안정화를 위한 점검이 진행될 예정입니다. 점검 시간 동안 서비스 이용이 제한됩니다.', 'maintenance.jpg', '2024-05-05 11:00:00', ''),
(170, '수강생 대상 이벤트 진행', '운영자', '5', '수강생 여러분을 위한 특별 이벤트를 준비했습니다. 자세한 내용은 첨부 이미지를 참고해주세요.', 'event_poster.png', '2024-05-06 16:20:00', ''),
(171, '온라인 강의 플랫폼 업데이트', '운영자', '5', '온라인 강의 플랫폼이 업데이트되었습니다. 새로운 기능과 개선 사항을 확인해보세요.', 'platform_update.pdf', '2024-05-07 13:10:00', ''),
(172, '수강료 할인 이벤트', '운영자', '4', '한정된 기간 동안 수강료 할인 이벤트를 진행합니다. 수강 신청 시 할인 혜택을 받으실 수 있습니다.', 'discount_event.jpg', '2024-05-08 10:00:00', ''),
(173, '교육 과정 설문조사 안내', '운영자', '5', '교육 과정 개선을 위한 설문조사를 진행하고 있습니다. 적극적인 참여 부탁드립니다.', 'survey.pdf', '2024-05-09 15:30:00', ''),
(174, '수료증 발급 안내', '운영자', '4', '과정을 수료하신 분들은 수료증을 발급받으실 수 있습니다. 자세한 내용은 첨부 파일을 참고해주세요.', 'certificate_guide.pdf', '2024-05-10 14:20:00', ''),
(175, '새로운 강사진 소개', '운영자', '3', '새로운 강사진을 소개합니다. 각 분야의 전문가들로 구성된 강사진의 프로필을 확인해보세요.', 'instructors.jpg', '2024-05-11 11:40:00', ''),
(176, '교육 일정 변경 안내', '운영자', '4', '일부 교육 일정이 변경되었습니다. 변경된 일정을 확인하시고 참고해주시기 바랍니다.', 'schedule_change.pdf', '2024-05-12 16:50:00', ''),
(188, '새로운 강좌 오픈: 파이썬 기초 프로그래밍', '관리자', '3', '파이썬 기초 프로그래밍 강좌가 새롭게 오픈되었습니다. 강좌 일정과 수강 신청 방법을 확인해 주세요.', '0', '2024-05-05 09:30:00', ''),
(189, '웹 개발자 취업 특강 안내', '운영진', '3', '웹 개발자로의 취업을 준비하는 분들을 위한 특강이 진행됩니다. 참여 방법과 일정을 확인하세요.', '0', '2024-05-06 13:15:00', ''),
(190, '새로운 강좌 오픈: 파이썬 기초 프로그래밍', '관리자', '3', '파이썬 기초 프로그래밍 강좌가 새롭게 오픈되었습니다. 강좌 일정과 수강 신청 방법을 확인해 주세요.', '0', '2024-05-05 09:30:00', ''),
(191, '웹 개발자 취업 특강 안내', '운영진', '2', '웹 개발자로의 취업을 준비하는 분들을 위한 특강이 진행됩니다. 참여 방법과 일정을 확인하세요.', '0', '2024-05-06 13:15:00', ''),
(192, '수강생 대상 이벤트 안내', '관리자', '1', '수강생 여러분들을 위한 특별 이벤트를 준비했습니다. 자세한 내용은 공지사항을 확인해 주세요.', '0', '2024-05-07 11:00:00', ''),
(193, 'SQL 강좌 커리큘럼 업데이트', '강사', '1', 'SQL 강좌의 커리큘럼이 업데이트되었습니다. 새로운 내용과 실습 예제가 추가되었으니 참고하시기 바랍니다.', '0', '2024-05-08 16:45:00', ''),
(194, '학원 휴무 안내', '운영진', '1', '다음 주 월요일은 학원 휴무일입니다. 온라인 강의는 정상적으로 진행되오니 참고 부탁드립니다.', '0', '2024-05-09 08:00:00', ''),
(195, 'Java 프로그래밍 심화 강좌 오픈 예정', '관리자', '1', 'Java 프로그래밍 심화 강좌가 곧 오픈될 예정입니다. 자세한 일정과 강좌 정보는 추후 공지하겠습니다.', '0', '2024-05-10 14:30:00', ''),
(196, '강사 프로필 업데이트', '운영진', '1', '강사 프로필 페이지가 업데이트되었습니다. 새로운 강사진의 소개와 경력을 확인하실 수 있습니다.', '0', '2024-05-11 10:15:00', ''),
(197, '웹 디자인 포트폴리오 콘테스트 개최', '관리자', '1', '웹 디자인 포트폴리오 콘테스트를 개최합니다. 참가 자격과 제출 방법은 공지사항을 참고하세요.', '0', '2024-05-12 17:00:00', ''),
(198, '학원 시설 업그레이드 안내', '운영진', '1', '학원 시설이 업그레이드되었습니다. 새로운 장비와 쾌적한 학습 환경을 제공해 드리겠습니다.', '0', '2024-05-13 12:30:00', ''),
(199, '자료실 업데이트 안내', '관리자', '1', '자료실에 새로운 학습 자료가 업데이트되었습니다. 강의별로 분류된 자료를 활용해 보세요.', '0', '2024-05-14 15:45:00', ''),
(200, 'C++ 프로그래밍 기초 강좌 오픈', '관리자', '1', 'C++ 프로그래밍 기초 강좌가 오픈되었습니다. 수강 신청 방법과 강의 일정을 확인하세요.', '0', '2024-05-15 09:00:00', ''),
(201, '학원 이벤트 당첨자 발표', '운영진', '1', '지난 이벤트에 참여해 주신 분들께 감사드립니다. 당첨자 명단을 공지사항에서 확인하실 수 있습니다.', '0', '2024-05-16 14:20:00', ''),
(202, 'AI 머신러닝 입문 강좌 커리큘럼 공개', '강사', '1', 'AI 머신러닝 입문 강좌의 커리큘럼을 공개합니다. 강의 내용과 학습 목표를 확인해 보세요.', '0', '2024-05-17 11:30:00', ''),
(203, '학원 휴무일 추가 안내', '관리자', '1', '다음 주 금요일은 추가 휴무일입니다. 온라인 강의는 정상 진행되며, 자세한 사항은 공지사항을 참고하세요.', '0', '2024-05-18 16:10:00', ''),
(204, 'iOS 앱 개발 강좌 오픈 예정', '관리자', '1', 'iOS 앱 개발 강좌가 곧 오픈될 예정입니다. 강좌 일정과 수강 신청 방법은 추후 공지될 예정입니다.', '0', '2024-05-19 10:00:00', ''),
(205, '수강생 대상 설문조사 안내', '운영진', '1', '수강생 여러분들의 의견을 수렴하고자 설문조사를 진행합니다. 적극적인 참여 부탁드립니다.', '0', '2024-05-20 13:45:00', ''),
(206, '데이터베이스 설계 강좌 오픈', '관리자', '1', '데이터베이스 설계 강좌가 오픈되었습니다. 강좌 소개와 수강 신청 방법을 확인해 주세요.', '0', '2024-05-21 09:30:00', ''),
(207, '학원 환경 개선 공사 안내', '운영진', '1', '학원 환경 개선을 위한 공사가 진행될 예정입니다. 공사 기간 동안 학습에 불편함이 없도록 최선을 다하겠습니다.', '0', '2024-05-22 15:20:00', ''),
(208, 'Android 앱 개발 강좌 커리큘럼 업데이트', '강사', '1', 'Android 앱 개발 강좌의 커리큘럼이 업데이트되었습니다. 새로운 내용과 실습 예제를 확인하세요.', '0', '2024-05-23 11:00:00', ''),
(209, '웹 접근성 세미나 개최', '관리자', '1', '웹 접근성에 대한 세미나를 개최합니다. 웹 접근성의 중요성과 구현 방법에 대해 알아보는 시간을 가져보세요.', '0', '2024-05-24 14:00:00', ''),
(210, '학원 휴게실 운영 시간 변경', '운영진', '1', '학원 휴게실의 운영 시간이 변경되었습니다. 자세한 운영 시간은 공지사항을 참고해 주시기 바랍니다.', '0', '2024-05-25 10:30:00', ''),
(211, '프론트엔드 개발 강좌 오픈 예정', '관리자', '1', '프론트엔드 개발 강좌가 곧 오픈될 예정입니다. HTML, CSS, JavaScript를 활용한 웹 개발 기술을 배워보세요.', '0', '2024-05-26 13:15:00', ''),
(212, '수강생 프로젝트 발표회 안내', '운영진', '0', '수강생들의 프로젝트 발표회가 개최됩니다. 참가 신청 방법과 발표회 일정을 확인해 주세요.', '0', '2024-05-27 16:45:00', ''),
(213, 'Git 버전 관리 시스템 강좌 오픈', '관리자', '0', 'Git을 활용한 버전 관리 시스템 강좌가 오픈되었습니다. 효과적인 협업과 버전 관리 방법을 배워보세요.', '0', '2024-05-28 09:00:00', ''),
(214, '학원 연락처 변경 안내', '운영진', '0', '학원 연락처가 변경되었습니다. 새로운 연락처로 문의 사항을 전달해 주시기 바랍니다.', '0', '2024-05-29 11:30:00', ''),
(215, 'Linux 기초 강좌 커리큘럼 공개', '강사', '0', 'Linux 기초 강좌의 커리큘럼을 공개합니다. 리눅스 운영 체제에 대한 기본 개념과 명령어를 학습할 수 있습니다.', '0', '2024-05-30 14:20:00', ''),
(216, '학원 개인정보 처리방침 변경 안내', '관리자', '0', '학원 개인정보 처리방침이 일부 변경되었습니다. 변경 내용을 확인하시고 동의 부탁드립니다.', '0', '2024-05-31 10:00:00', ''),
(217, '네트워크 보안 강좌 오픈 예정', '관리자', '0', '네트워크 보안 강좌가 곧 오픈될 예정입니다. 네트워크 보안의 기본 개념과 실무 적용 방법을 배워보세요.', '0', '2024-06-01 13:45:00', ''),
(218, '수강생 간담회 개최 안내', '운영진', '0', '수강생 간담회를 개최합니다. 학원 운영에 대한 의견을 나누고 소통하는 자리를 마련하였습니다.', '0', '2024-06-02 15:30:00', ''),
(219, '데이터 분석 강좌 오픈', '관리자', '0', '데이터 분석 강좌가 오픈되었습니다. 데이터 분석의 기본 개념부터 실전 프로젝트까지 다룰 예정입니다.', '0', '2024-06-03 09:30:00', ''),
(220, '학원 공휴일 휴무 안내', '운영진', '0', '다음 주 공휴일에는 학원이 휴무입니다. 온라인 강의는 정상 진행되오니 참고 부탁드립니다.', '0', '2024-06-04 12:00:00', ''),
(221, 'React 강좌 커리큘럼 업데이트', '강사', '0', 'React 강좌의 커리큘럼이 업데이트되었습니다. 최신 버전의 React를 활용한 프로젝트 실습이 추가되었습니다.', '0', '2024-06-05 14:45:00', ''),
(222, '학원 환경 개선 공사 완료', '관리자', '0', '학원 환경 개선 공사가 완료되었습니다. 쾌적한 학습 환경에서 강의를 수강하실 수 있습니다.', '0', '2024-06-06 10:30:00', ''),
(223, 'Vue.js 강좌 오픈 예정', '관리자', '0', 'Vue.js 강좌가 곧 오픈될 예정입니다. 프론트엔드 개발에 필요한 Vue.js 프레임워크를 학습해 보세요.', '0', '2024-06-07 13:15:00', ''),
(224, '수강생 대상 이벤트 당첨자 발표', '운영진', '0', '수강생 대상 이벤트에 참여해 주신 분들께 감사드립니다. 당첨자 명단을 공지사항에서 확인하실 수 있습니다.', '0', '2024-06-08 16:00:00', ''),
(225, 'Spring Framework 강좌 오픈', '관리자', '0', 'Spring Framework 강좌가 오픈되었습니다. 자바 기반의 웹 애플리케이션 개발에 필수적인 프레임워크를 배워보세요.', '0', '2024-06-09 09:00:00', ''),
(226, '학원 시설 점검 안내', '운영진', '0', '학원 시설 점검이 예정되어 있습니다. 점검 기간 동안 학원 이용에 불편함이 있을 수 있으니 양해 부탁드립니다.', '0', '2024-06-10 11:30:00', ''),
(227, '알고리즘 문제 해결 강좌 커리큘럼 공개', '강사', '0', '알고리즘 문제 해결 강좌의 커리큘럼을 공개합니다. 다양한 알고리즘 문제를 해결하는 방법을 학습할 수 있습니다.', '0', '2024-06-11 14:20:00', ''),
(228, 'C++ 프로그래밍 기초 강좌 오픈', '관리자', '0', 'C++ 프로그래밍 기초 강좌가 오픈되었습니다. 수강 신청 방법과 강의 일정을 확인하세요.', '0', '2024-05-15 09:00:00', ''),
(229, '학원 이벤트 당첨자 발표', '운영진', '0', '지난 이벤트에 참여해 주신 분들께 감사드립니다. 당첨자 명단을 공지사항에서 확인하실 수 있습니다.', '0', '2024-05-16 14:20:00', ''),
(230, 'AI 머신러닝 입문 강좌 커리큘럼 공개', '강사', '0', 'AI 머신러닝 입문 강좌의 커리큘럼을 공개합니다. 강의 내용과 학습 목표를 확인해 보세요.', '0', '2024-05-17 11:30:00', ''),
(231, '학원 휴무일 추가 안내', '관리자', '0', '다음 주 금요일은 추가 휴무일입니다. 온라인 강의는 정상 진행되며, 자세한 사항은 공지사항을 참고하세요.', '0', '2024-05-18 16:10:00', ''),
(232, 'iOS 앱 개발 강좌 오픈 예정', '관리자', '0', 'iOS 앱 개발 강좌가 곧 오픈될 예정입니다. 강좌 일정과 수강 신청 방법은 추후 공지될 예정입니다.', '0', '2024-05-19 10:00:00', ''),
(233, '수강생 대상 설문조사 안내', '운영진', '0', '수강생 여러분들의 의견을 수렴하고자 설문조사를 진행합니다. 적극적인 참여 부탁드립니다.', '0', '2024-05-20 13:45:00', ''),
(234, '데이터베이스 설계 강좌 오픈', '관리자', '0', '데이터베이스 설계 강좌가 오픈되었습니다. 강좌 소개와 수강 신청 방법을 확인해 주세요.', '0', '2024-05-21 09:30:00', ''),
(235, '학원 환경 개선 공사 안내', '운영진', '0', '학원 환경 개선을 위한 공사가 진행될 예정입니다. 공사 기간 동안 학습에 불편함이 없도록 최선을 다하겠습니다.', '0', '2024-05-22 15:20:00', ''),
(236, 'Android 앱 개발 강좌 커리큘럼 업데이트', '강사', '0', 'Android 앱 개발 강좌의 커리큘럼이 업데이트되었습니다. 새로운 내용과 실습 예제를 확인하세요.', '0', '2024-05-23 11:00:00', ''),
(237, '웹 접근성 세미나 개최', '관리자', '0', '웹 접근성에 대한 세미나를 개최합니다. 웹 접근성의 중요성과 구현 방법에 대해 알아보는 시간을 가져보세요.', '0', '2024-05-24 14:00:00', ''),
(238, '학원 휴게실 운영 시간 변경', '운영진', '0', '학원 휴게실의 운영 시간이 변경되었습니다. 자세한 운영 시간은 공지사항을 참고해 주시기 바랍니다.', '0', '2024-05-25 10:30:00', ''),
(239, '프론트엔드 개발 강좌 오픈 예정', '관리자', '0', '프론트엔드 개발 강좌가 곧 오픈될 예정입니다. HTML, CSS, JavaScript를 활용한 웹 개발 기술을 배워보세요.', '0', '2024-05-26 13:15:00', ''),
(240, '수강생 프로젝트 발표회 안내', '운영진', '0', '수강생들의 프로젝트 발표회가 개최됩니다. 참가 신청 방법과 발표회 일정을 확인해 주세요.', '0', '2024-05-27 16:45:00', ''),
(241, 'Git 버전 관리 시스템 강좌 오픈', '관리자', '0', 'Git을 활용한 버전 관리 시스템 강좌가 오픈되었습니다. 효과적인 협업과 버전 관리 방법을 배워보세요.', '0', '2024-05-28 09:00:00', ''),
(242, '학원 연락처 변경 안내', '운영진', '0', '학원 연락처가 변경되었습니다. 새로운 연락처로 문의 사항을 전달해 주시기 바랍니다.', '0', '2024-05-29 11:30:00', ''),
(243, 'Linux 기초 강좌 커리큘럼 공개', '강사', '0', 'Linux 기초 강좌의 커리큘럼을 공개합니다. 리눅스 운영 체제에 대한 기본 개념과 명령어를 학습할 수 있습니다.', '0', '2024-05-30 14:20:00', ''),
(244, '학원 개인정보 처리방침 변경 안내', '관리자', '0', '학원 개인정보 처리방침이 일부 변경되었습니다. 변경 내용을 확인하시고 동의 부탁드립니다.', '0', '2024-05-31 10:00:00', ''),
(245, '네트워크 보안 강좌 오픈 예정', '관리자', '0', '네트워크 보안 강좌가 곧 오픈될 예정입니다. 네트워크 보안의 기본 개념과 실무 적용 방법을 배워보세요.', '0', '2024-06-01 13:45:00', ''),
(246, '수강생 간담회 개최 안내', '운영진', '0', '수강생 간담회를 개최합니다. 학원 운영에 대한 의견을 나누고 소통하는 자리를 마련하였습니다.', '0', '2024-06-02 15:30:00', ''),
(247, '데이터 분석 강좌 오픈', '관리자', '0', '데이터 분석 강좌가 오픈되었습니다. 데이터 분석의 기본 개념부터 실전 프로젝트까지 다룰 예정입니다.', '0', '2024-06-03 09:30:00', ''),
(248, '학원 공휴일 휴무 안내', '운영진', '0', '다음 주 공휴일에는 학원이 휴무입니다. 온라인 강의는 정상 진행되오니 참고 부탁드립니다.', '0', '2024-06-04 12:00:00', ''),
(249, 'React 강좌 커리큘럼 업데이트', '강사', '0', 'React 강좌의 커리큘럼이 업데이트되었습니다. 최신 버전의 React를 활용한 프로젝트 실습이 추가되었습니다.', '0', '2024-06-05 14:45:00', ''),
(250, '학원 환경 개선 공사 완료', '관리자', '0', '학원 환경 개선 공사가 완료되었습니다. 쾌적한 학습 환경에서 강의를 수강하실 수 있습니다.', '0', '2024-06-06 10:30:00', ''),
(251, 'Vue.js 강좌 오픈 예정', '관리자', '0', 'Vue.js 강좌가 곧 오픈될 예정입니다. 프론트엔드 개발에 필요한 Vue.js 프레임워크를 학습해 보세요.', '0', '2024-06-07 13:15:00', ''),
(252, '수강생 대상 이벤트 당첨자 발표', '운영진', '0', '수강생 대상 이벤트에 참여해 주신 분들께 감사드립니다. 당첨자 명단을 공지사항에서 확인하실 수 있습니다.', '0', '2024-06-08 16:00:00', ''),
(253, 'Spring Framework 강좌 오픈', '관리자', '0', 'Spring Framework 강좌가 오픈되었습니다. 자바 기반의 웹 애플리케이션 개발에 필수적인 프레임워크를 배워보세요.', '0', '2024-06-09 09:00:00', ''),
(254, '학원 시설 점검 안내', '운영진', '1', '학원 시설 점검이 예정되어 있습니다. 점검 기간 동안 학원 이용에 불편함이 있을 수 있으니 양해 부탁드립니다.', '0', '2024-06-10 11:30:00', ''),
(255, '알고리즘 문제 해결 강좌 커리큘럼 공개', '강사', '0', '알고리즘 문제 해결 강좌의 커리큘럼을 공개합니다. 다양한 알고리즘 문제를 해결하는 방법을 학습할 수 있습니다.', '0', '2024-06-11 14:20:00', ''),
(256, 'Node.js 강좌 오픈 예정', '관리자', '0', 'Node.js 강좌가 곧 오픈될 예정입니다. 서버 사이드 JavaScript 개발에 필요한 Node.js를 배워보세요.', '0', '2024-06-12 10:00:00', ''),
(257, '수강생 프로젝트 전시회 안내', '운영진', '0', '수강생들의 프로젝트 전시회가 개최됩니다. 다양한 프로젝트 결과물을 직접 확인하실 수 있습니다.', '0', '2024-06-13 13:45:00', ''),
(258, 'Django 웹 개발 강좌 오픈', '관리자', '0', 'Django를 활용한 웹 개발 강좌가 오픈되었습니다. 파이썬 기반의 웹 프레임워크를 학습할 수 있습니다.', '0', '2024-06-14 15:30:00', ''),
(259, '학원 휴강일 안내', '운영진', '0', '다음 주 월요일은 학원 휴강일입니다. 온라인 강의는 정상 진행되오니 참고 부탁드립니다.', '0', '2024-06-15 09:30:00', ''),
(260, 'iOS 앱 개발 강좌 커리큘럼 업데이트', '강사', '0', 'iOS 앱 개발 강좌의 커리큘럼이 업데이트되었습니다. Swift 언어와 최신 iOS 프레임워크를 활용한 실습이 추가되었습니다.', '0', '2024-06-16 12:00:00', ''),
(261, '학원 이용 수칙 안내', '관리자', '0', '학원 이용 수칙을 안내드립니다. 쾌적한 학습 환경을 위해 수칙을 준수해 주시기 바랍니다.', '0', '2024-06-17 14:45:00', ''),
(262, 'Unity 게임 개발 강좌 오픈 예정', '관리자', '0', 'Unity를 활용한 게임 개발 강좌가 곧 오픈될 예정입니다. 게임 개발의 기초부터 실전 프로젝트까지 다룰 예정입니다.', '0', '2024-06-18 10:30:00', ''),
(263, '수강생 간담회 결과 공유', '운영진', '0', '지난 수강생 간담회에서 나온 의견을 공유드립니다. 학원 운영 개선을 위해 노력하겠습니다.', '0', '2024-06-19 13:15:00', ''),
(264, 'TensorFlow 머신러닝 강좌 오픈', '관리자', '0', 'TensorFlow를 활용한 머신러닝 강좌가 오픈되었습니다. 딥러닝의 기초부터 실전 프로젝트까지 학습할 수 있습니다.', '0', '2024-06-20 16:00:00', ''),
(265, '학원 시설 보수 공사 안내', '운영진', '0', '학원 시설 보수 공사가 진행될 예정입니다. 공사 기간 동안 학습에 불편함이 없도록 최선을 다하겠습니다.', '0', '2024-06-21 09:00:00', ''),
(266, 'Angular 강좌 커리큘럼 공개', '강사', '1', 'Angular 강좌의 커리큘럼을 공개합니다. 타입스크립트를 활용한 웹 애플리케이션 개발을 배워보세요.', '0', '2024-06-22 11:30:00', ''),
(267, '학원 개인정보 처리방침 변경 안내', '관리자', '2', '학원 개인정보 처리방침이 일부 변경되었습니다. 변경 내용을 확인하시고 동의 부탁드립니다.', '0', '2024-06-23 14:20:00', ''),
(268, 'Flask 웹 개발 강좌 오픈 예정', '관리자', '4', 'Flask를 활용한 웹 개발 강좌가 곧 오픈될 예정입니다. 파이썬 기반의 마이크로 웹 프레임워크를 학습해 보세요.', '0', '2024-06-24 10:00:00', ''),
(269, '수강생 대상 설문조사 결과 공유', '운영진', '6', '수강생 대상 설문조사 결과를 공유드립니다. 학원 운영 개선에 반영하도록 하겠습니다.', '0', '2024-06-25 13:45:00', ''),
(270, 'OpenCV 컴퓨터 비전 강좌 오픈', '관리자', '6', 'OpenCV를 활용한 컴퓨터 비전 강좌가 오픈되었습니다. 이미지 처리와 컴퓨터 비전 기술을 배워보세요.', '0', '2024-06-26 15:30:00', ''),
(271, '학원 야간 운영 시간 변경 안내', '운영진', '6', '학원 야간 운영 시간이 변경되었습니다. 자세한 운영 시간은 공지사항을 참고해 주시기 바랍니다.', '0', '2024-06-27 09:30:00', ''),
(272, 'Express.js 웹 개발 강좌 커리큘럼 업데이트', '강사', '7', 'Express.js 웹 개발 강좌의 커리큘럼이 업데이트되었습니다. 최신 버전의 Express.js와 미들웨어 활용법을 학습할 수 있습니다.', '0', '2024-06-28 12:00:00', ''),
(273, '학원 이용 수칙 변경 안내', '관리자', '11', '학원 이용 수칙이 일부 변경되었습니다. 변경된 수칙을 확인하시고 준수 부탁드립니다.', '0', '2024-06-29 14:45:00', ''),
(274, 'Ruby on Rails 웹 개발 강좌 오픈 예정', '관리자', '15', 'Ruby on Rails를 활용한 웹 개발 강좌가 곧 오픈될 예정입니다. 루비 언어와 Rails 프레임워크를 학습해 보세요.', '0', '2024-06-30 10:30:00', ''),
(277, '안녕하세요', '운영자', NULL, '<p>ㄴㅇㄴㅇ</p>', '/hosting/worldhello/html/helloworld/announce/uploads/20240520154159900344.jpg', '2024-05-20 15:41:59', ''),
(278, '안녕하세여 사진 첨부입니다', '운영자', NULL, '<p>반가워요</p>', '', '2024-05-20 16:52:08', '20240520165208958760.jpg'),
(279, 'sdsds', '운영자', NULL, '<p>sdsdsd</p>', '', '2024-05-20 17:52:56', '20240520175256718455.jpg'),
(280, 'dd', '운영자', NULL, '<p>dd</p>', '20240521034817179795.png', '2024-05-21 03:48:17', '20240521034817143487.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `ordered_courses`
--

CREATE TABLE `ordered_courses` (
  `ocid` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `progress` float DEFAULT NULL,
  `satisfaction` int(11) DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `use_max_date` date DEFAULT NULL,
  `total_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `ordered_courses`
--

INSERT INTO `ordered_courses` (`ocid`, `course_id`, `member_id`, `progress`, `satisfaction`, `regdate`, `use_max_date`, `total_price`) VALUES
(1, '9', 4, 0, 5, '2024-04-30', NULL, ''),
(3, '10', 4, 0, 4, '2024-04-10', NULL, ''),
(5, '11', 4, 0, 5, '2024-04-15', NULL, ''),
(12, '22', 42, 0, 4, '2024-03-15', NULL, ''),
(13, '25', 17, 0, 5, '2024-04-02', NULL, ''),
(14, '37', 29, 0, 4, '2024-05-21', NULL, ''),
(15, '39', 8, 0, 5, '2024-03-27', NULL, ''),
(16, '40', 51, 0, 4, '2024-04-11', NULL, ''),
(17, '41', 23, 0, 5, '2024-05-06', NULL, ''),
(18, '42', 36, 0, 4, '2024-03-09', NULL, ''),
(19, '43', 50, 0, 5, '2024-04-19', NULL, ''),
(20, '44', 11, 0, 4, '2024-05-28', NULL, ''),
(21, '45', 49, 0, 5, '2024-03-03', NULL, ''),
(22, '46', 27, 0, 4, '2024-04-26', NULL, ''),
(23, '47', 38, 0, 5, '2024-05-13', NULL, ''),
(24, '48', 55, 0, 4, '2024-03-20', NULL, ''),
(25, '49', 3, 0, 5, '2024-04-07', NULL, ''),
(26, '50', 23, 0, 4, '2024-05-24', NULL, ''),
(27, '51', 21, 0, 5, '2024-03-11', NULL, ''),
(28, '52', 46, 0, 4, '2024-04-30', NULL, ''),
(29, '53', 59, 0, 5, '2024-05-17', NULL, ''),
(30, '54', 33, 0, 4, '2024-03-25', NULL, ''),
(31, '25', 12, 0, 5, '2024-04-15', NULL, ''),
(32, '37', 33, 0, 4, '2024-05-01', NULL, ''),
(33, '22', 29, 0, 5, '2024-03-06', NULL, ''),
(34, '25', 39, 0, 4, '2024-04-23', NULL, ''),
(35, '37', 15, 0, 5, '2024-05-09', NULL, ''),
(36, '22', 47, 0, 4, '2024-03-18', NULL, ''),
(38, '37', 31, 0, 4, '2024-05-20', NULL, ''),
(39, '22', 57, 0, 5, '2024-03-28', NULL, ''),
(40, '25', 20, 0, 4, '2024-04-13', NULL, ''),
(41, '37', 45, 0, 5, '2024-05-29', NULL, ''),
(42, '22', 17, 0, 4, '2024-03-12', NULL, ''),
(43, '25', 31, 0, 5, '2024-04-08', NULL, ''),
(44, '37', 43, 0, 4, '2024-05-19', NULL, ''),
(45, '22', 6, 0, 5, '2024-03-25', NULL, ''),
(46, '25', 20, 0, 4, '2024-04-03', NULL, ''),
(47, '37', 35, 0, 5, '2024-05-14', NULL, ''),
(48, '22', 49, 0, 4, '2024-03-07', NULL, ''),
(49, '25', 12, 0, 5, '2024-04-21', NULL, ''),
(50, '37', 27, 0, 4, '2024-05-02', NULL, ''),
(51, '22', 41, 0, 5, '2024-03-18', NULL, ''),
(52, '25', 54, 0, 4, '2024-04-10', NULL, ''),
(53, '37', 8, 0, 5, '2024-05-27', NULL, ''),
(54, '22', 24, 0, 4, '2024-03-30', NULL, ''),
(55, '25', 39, 0, 5, '2024-04-15', NULL, ''),
(56, '37', 51, 0, 4, '2024-05-06', NULL, ''),
(57, '22', 13, 0, 5, '2024-03-22', NULL, ''),
(58, '25', 28, 0, 4, '2024-04-29', NULL, ''),
(59, '37', 42, 0, 5, '2024-05-11', NULL, ''),
(60, '22', 55, 0, 4, '2024-03-05', NULL, ''),
(61, '25', 7, 0, 5, '2024-04-24', NULL, ''),
(62, '37', 21, 0, 4, '2024-05-16', NULL, ''),
(63, '22', 36, 0, 5, '2024-03-13', NULL, ''),
(64, '25', 50, 0, 4, '2024-04-01', NULL, ''),
(65, '37', 14, 0, 5, '2024-05-22', NULL, ''),
(66, '22', 29, 0, 4, '2024-03-26', NULL, ''),
(67, '25', 44, 0, 5, '2024-04-17', NULL, ''),
(68, '37', 9, 0, 4, '2024-05-07', NULL, ''),
(69, '22', 23, 0, 5, '2024-03-09', NULL, ''),
(70, '25', 38, 0, 4, '2024-04-26', NULL, ''),
(71, '37', 53, 0, 5, '2024-05-20', NULL, ''),
(72, '40', 10, 55, 5, '2023-09-19', NULL, ''),
(73, '48', 6, 25, 4, '2024-02-06', NULL, ''),
(74, '11', 2, 90, 5, '2023-06-27', NULL, ''),
(75, '21', 9, 15, 4, '2023-12-04', NULL, ''),
(77, '41', 1, 50, 4, '2023-10-30', NULL, ''),
(78, '52', 7, 30, 5, '2024-03-18', NULL, ''),
(79, '16', 3, 95, 4, '2023-08-09', NULL, ''),
(80, '27', 8, 10, 5, '2024-01-23', NULL, ''),
(81, '36', 4, 75, 4, '2023-07-14', NULL, ''),
(82, '47', 10, 40, 5, '2023-12-22', NULL, ''),
(83, '54', 6, 20, 4, '2024-05-29', NULL, ''),
(84, '19', 2, 85, 5, '2023-11-05', NULL, ''),
(85, '31', 9, 60, 4, '2024-04-15', NULL, ''),
(87, '50', 1, 55, 4, '2024-02-12', NULL, ''),
(88, '13', 7, 25, 5, '2023-07-03', NULL, ''),
(89, '24', 3, 90, 4, '2023-12-10', NULL, ''),
(90, '34', 8, 15, 5, '2024-05-17', NULL, ''),
(91, '44', 4, 80, 4, '2023-10-24', NULL, ''),
(92, '51', 10, 50, 5, '2024-03-31', NULL, ''),
(93, '17', 6, 30, 4, '2023-08-22', NULL, ''),
(94, '29', 2, 95, 5, '2024-01-30', NULL, ''),
(95, '37', 9, 10, 4, '2023-06-20', NULL, ''),
(97, '53', 1, 40, 4, '2024-05-05', NULL, ''),
(98, '20', 7, 20, 5, '2023-10-12', NULL, ''),
(99, '32', 3, 85, 4, '2024-03-01', NULL, ''),
(100, '22', 8, 60, 4, '2024-01-03', NULL, ''),
(101, '30', 4, 35, 5, '2024-02-14', NULL, ''),
(102, '42', 10, 55, 4, '2024-03-27', NULL, ''),
(103, '50', 6, 25, 5, '2024-05-08', NULL, ''),
(104, '14', 2, 90, 4, '2024-01-20', NULL, ''),
(105, '26', 9, 15, 5, '2024-04-01', NULL, ''),
(107, '48', 1, 50, 5, '2024-05-15', NULL, ''),
(108, '12', 7, 30, 4, '2024-03-06', NULL, ''),
(109, '24', 3, 95, 5, '2024-01-27', NULL, ''),
(110, '35', 8, 10, 4, '2024-04-18', NULL, ''),
(111, '45', 4, 75, 5, '2024-03-11', NULL, ''),
(112, '54', 10, 40, 4, '2024-02-03', NULL, ''),
(113, '18', 6, 20, 5, '2024-01-14', NULL, ''),
(114, '30', 2, 85, 4, '2024-04-25', NULL, ''),
(115, '40', 9, 60, 5, '2024-03-18', NULL, ''),
(117, '15', 1, 55, 5, '2024-05-01', NULL, ''),
(118, '27', 7, 25, 4, '2024-01-31', NULL, ''),
(119, '37', 3, 90, 5, '2024-04-12', NULL, ''),
(120, '49', 8, 15, 4, '2024-02-23', NULL, ''),
(121, '13', 4, 80, 5, '2024-05-04', NULL, ''),
(122, '25', 10, 50, 4, '2024-03-27', NULL, ''),
(123, '36', 6, 30, 5, '2024-01-08', NULL, ''),
(124, '47', 2, 95, 4, '2024-04-19', NULL, ''),
(125, '52', 9, 10, 5, '2024-02-29', NULL, ''),
(127, '31', 1, 40, 5, '2024-03-03', NULL, ''),
(128, '41', 7, 20, 4, '2024-01-24', NULL, ''),
(129, '53', 3, 85, 5, '2024-04-30', NULL, ''),
(130, '20', 8, 60, 4, '2024-02-17', NULL, ''),
(131, '32', 4, 35, 5, '2024-05-28', NULL, ''),
(132, '44', 10, 55, 4, '2024-03-21', NULL, ''),
(133, '52', 6, 25, 5, '2024-01-02', NULL, ''),
(134, '16', 2, 90, 4, '2024-04-13', NULL, ''),
(135, '28', 9, 15, 5, '2024-02-04', NULL, ''),
(137, '50', 1, 50, 5, '2024-03-28', NULL, ''),
(138, '37', 12, 42, 4, '2023-12-15', NULL, ''),
(139, '38', 22, 61, 5, '2024-01-28', NULL, ''),
(140, '39', 8, 17, 4, '2024-02-10', NULL, ''),
(141, '40', 31, 93, 5, '2024-03-24', NULL, ''),
(142, '41', 19, 28, 4, '2024-04-07', NULL, ''),
(144, '43', 26, 9, 4, '2024-01-11', NULL, ''),
(145, '44', 14, 35, 5, '2024-02-23', NULL, ''),
(146, '45', 33, 52, 4, '2024-03-07', NULL, ''),
(147, '46', 2, 88, 5, '2024-04-20', NULL, ''),
(148, '47', 24, 13, 4, '2023-12-03', NULL, ''),
(149, '48', 10, 39, 5, '2024-01-17', NULL, ''),
(150, '49', 29, 65, 4, '2024-02-28', NULL, ''),
(151, '50', 18, 91, 5, '2024-03-13', NULL, ''),
(152, '51', 7, 26, 4, '2024-04-26', NULL, ''),
(153, '52', 30, 47, 5, '2023-12-09', NULL, ''),
(154, '53', 16, 72, 4, '2024-01-22', NULL, ''),
(155, '54', 35, 98, 5, '2024-02-04', NULL, ''),
(156, '55', 4, 23, 4, '2024-03-19', NULL, ''),
(157, '56', 27, 49, 5, '2024-05-02', NULL, ''),
(158, '57', 13, 76, 4, '2023-12-16', NULL, ''),
(159, '58', 36, 1, 5, '2024-01-29', NULL, ''),
(160, '59', 21, 27, 4, '2024-02-11', NULL, ''),
(161, '60', 40, 53, 5, '2024-03-25', NULL, ''),
(162, '61', 9, 79, 4, '2024-04-08', NULL, ''),
(163, '62', 32, 4, 5, '2023-12-22', NULL, ''),
(164, '37', 17, 31, 4, '2024-02-05', NULL, ''),
(165, '38', 38, 57, 5, '2024-02-18', NULL, ''),
(166, '39', 23, 83, 4, '2024-03-02', NULL, ''),
(167, '40', 42, 8, 5, '2024-04-14', NULL, ''),
(168, '41', 11, 34, 4, '2023-12-28', NULL, ''),
(169, '42', 34, 60, 5, '2024-01-10', NULL, ''),
(170, '43', 20, 86, 4, '2024-02-22', NULL, ''),
(171, '44', 39, 11, 5, '2024-03-06', NULL, ''),
(172, '37', 30, 56, 5, '2024-03-31', NULL, ''),
(173, '38', 22, 19, 4, '2023-12-25', NULL, ''),
(174, '39', 40, 4, 5, '2024-04-23', NULL, ''),
(175, '40', 11, 57, 4, '2024-03-03', NULL, ''),
(176, '41', 18, 22, 5, '2024-03-22', NULL, ''),
(177, '42', 38, 60, 4, '2023-12-14', NULL, ''),
(178, '43', 47, 58, 5, '2024-03-21', NULL, ''),
(179, '44', 35, 34, 4, '2024-01-03', NULL, ''),
(180, '45', 52, 49, 5, '2024-02-15', NULL, ''),
(181, '46', 8, 96, 4, '2024-02-19', NULL, ''),
(182, '47', 31, 33, 5, '2023-12-05', NULL, ''),
(183, '48', 51, 78, 4, '2024-04-23', NULL, ''),
(184, '49', 51, 56, 5, '2023-12-12', NULL, ''),
(185, '50', 6, 43, 4, '2023-12-05', NULL, ''),
(186, '51', 36, 30, 5, '2024-02-09', NULL, ''),
(187, '52', 46, 57, 4, '2024-03-13', NULL, ''),
(188, '53', 50, 69, 5, '2024-01-26', NULL, ''),
(224, '54', 35, 4, 4, '2024-03-15', NULL, ''),
(225, '55', 26, 32, 5, '2024-03-25', NULL, ''),
(226, '56', 18, 69, 4, '2024-02-04', NULL, ''),
(227, '57', 46, 49, 5, '2023-12-21', NULL, ''),
(228, '58', 52, 20, 4, '2024-04-19', NULL, ''),
(229, '59', 45, 89, 5, '2023-12-13', NULL, ''),
(230, '60', 6, 40, 4, '2023-12-22', NULL, ''),
(231, '61', 12, 22, 5, '2024-02-02', NULL, ''),
(232, '62', 19, 80, 4, '2024-04-24', NULL, ''),
(233, '37', 46, 8, 5, '2023-12-19', NULL, ''),
(234, '38', 15, 44, 4, '2024-02-13', NULL, ''),
(235, '39', 18, 88, 5, '2024-02-16', NULL, ''),
(236, '40', 49, 99, 4, '2024-03-26', NULL, ''),
(237, '41', 17, 57, 5, '2024-04-24', NULL, ''),
(238, '42', 31, 61, 4, '2024-03-03', NULL, ''),
(239, '43', 12, 61, 5, '2024-02-08', NULL, ''),
(240, '44', 52, 16, 4, '2023-12-15', NULL, ''),
(241, '45', 9, 78, 5, '2024-02-04', NULL, ''),
(242, '46', 32, 7, 4, '2024-01-22', NULL, ''),
(243, '47', 10, 68, 5, '2023-12-05', NULL, ''),
(244, '48', 49, 56, 4, '2024-04-21', NULL, ''),
(245, '49', 37, 12, 5, '2024-01-31', NULL, ''),
(246, '50', 37, 57, 4, '2023-12-30', NULL, ''),
(247, '51', 24, 55, 5, '2024-02-10', NULL, ''),
(248, '52', 7, 70, 4, '2024-03-17', NULL, ''),
(249, '53', 24, 18, 5, '2024-01-26', NULL, ''),
(250, '54', 37, 41, 4, '2024-04-24', NULL, ''),
(251, '55', 4, 89, 5, '2024-02-26', NULL, ''),
(252, '56', 29, 21, 4, '2024-02-08', NULL, ''),
(253, '57', 10, 2, 5, '2024-01-19', NULL, ''),
(254, '58', 23, 90, 4, '2024-03-17', NULL, ''),
(255, '59', 45, 27, 5, '2023-12-28', NULL, ''),
(256, '60', 22, 32, 4, '2024-02-12', NULL, ''),
(257, '61', 37, 77, 5, '2023-12-28', NULL, ''),
(258, '62', 47, 83, 4, '2024-02-12', NULL, ''),
(259, '37', 12, 23, 5, '2024-01-22', NULL, ''),
(260, '38', 37, 29, 4, '2024-02-22', NULL, ''),
(261, '39', 27, 92, 5, '2024-04-02', NULL, ''),
(262, '40', 15, 54, 4, '2024-04-26', NULL, ''),
(263, '41', 31, 69, 5, '2024-01-11', NULL, ''),
(264, '42', 36, 5, 4, '2024-03-19', NULL, ''),
(265, '43', 18, 59, 5, '2024-04-19', NULL, ''),
(266, '44', 35, 91, 4, '2024-01-24', NULL, ''),
(267, '45', 31, 76, 5, '2024-04-08', NULL, ''),
(268, '46', 29, 11, 4, '2024-04-27', NULL, ''),
(269, '47', 43, 86, 5, '2023-12-13', NULL, ''),
(270, '48', 8, 66, 4, '2024-04-29', NULL, ''),
(271, '49', 9, 53, 5, '2024-03-19', NULL, ''),
(272, '50', 47, 46, 4, '2024-01-16', NULL, ''),
(273, '51', 12, 70, 5, '2023-12-04', NULL, ''),
(274, '52', 48, 42, 4, '2024-02-25', NULL, ''),
(275, '53', 51, 46, 5, '2024-02-25', NULL, ''),
(278, '168', 62, 0, NULL, '2024-05-20', NULL, '15000'),
(279, '161', 62, 0, NULL, '2024-05-20', NULL, '0'),
(286, '40', 5, 0, 0, '2024-05-21', '2025-05-21', NULL),
(287, '151', 5, 0, 0, '2024-05-21', '2025-05-21', NULL),
(288, '159', 5, 0, 0, '2024-05-21', '2857-08-21', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `idx` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `lecture_name` varchar(100) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `reply` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(1200) NOT NULL,
  `files` varchar(1200) NOT NULL,
  `user_id` varchar(145) NOT NULL,
  `selected_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `qna`
--

INSERT INTO `qna` (`idx`, `cid`, `name`, `title`, `lecture_name`, `view`, `reply`, `date`, `content`, `files`, `user_id`, `selected_comment_id`) VALUES
(1, 0, '김민수', 'for 문 사용법 질문입니다!', '파이썬 기초', 0, '미답변', '2024-02-12 00:00:00', '파이썬 기초 수업 중 for 문 사용법이 잘 이해가 되지 않습니다. 예시를 통해 설명해 주시면 감사하겠습니다.', '0', '', NULL),
(2, 0, '박지현', 'props와 state 차이가 잘 안 됩니다!', 'React 입문', 0, '미답변', '2024-03-27 00:00:00', 'React 컴포넌트를 만들 때 props와 state의 차이점이 무엇인가요? 각각의 역할에 대해 설명해 주세요.', '0', '', NULL),
(3, 0, '이주환', 'SQL 내부 조인과 외부 조인 질문입니다!', '데이터베이스 기초', 0, '미답변', '2024-04-18 00:00:00', 'SQL에서 내부 조인과 외부 조인의 차이점이 무엇인가요? 각각의 사용 예시도 부탁드립니다.', '0', '', NULL),
(4, 0, '최유리', '화살표 함수와 일반 함수 차이점이 궁금합니다!', '자바스크립트 기초', 0, '미답변', '2024-02-05 00:00:00', '자바스크립트에서 화살표 함수와 일반 함수의 차이점은 무엇인가요? 각각의 장단점도 설명해 주세요.', '0', '', NULL),
(5, 0, '강동현', 'float와 flexbox 사용법 질문있습니다!', '웹 프론트엔드 입문', 0, '미답변', '2024-05-09 00:00:00', 'HTML/CSS를 사용하여 레이아웃을 구성할 때, float와 flexbox의 차이점이 무엇인가요? 각각의 장단점도 설명해 주세요.', '0', '', NULL),
(6, 0, '김혜린', 'Express 라우팅과 미들웨어 개념 질문입니다!', 'Node.js 기초', 0, '미답변', '2024-03-14 00:00:00', 'Node.js에서 Express 프레임워크를 사용하여 서버를 구축할 때, 라우팅과 미들웨어의 개념이 무엇인지 설명해 주세요.', '0', '', NULL),
(7, 0, '박민철', 'Django 모델 관계 질문입니다!', 'Django 웹 프레임워크', 0, '미답변', '2024-04-02 00:00:00', 'Django에서 모델(Model)의 역할과 중요성에 대해 설명해 주세요. 모델 관계(1:1, 1:N, M:N)에 대해서도 설명해 주세요.', '0', '', NULL),
(8, 0, '이수민', 'Git 브랜치 병합 방법이 궁금합니다!', '버전 관리 시스템', 0, '미답변', '2024-02-25 00:00:00', 'Git에서 브랜치(Branch)의 개념과 사용 방법에 대해 설명해 주세요. 브랜치를 병합(Merge)하는 방법도 설명해 주세요.', '0', '', NULL),
(9, 0, '최승철', 'AWS EC2와 S3 차이점이 무엇인가요?', '클라우드 컴퓨팅', 0, '미답변', '2024-03-10 00:00:00', 'AWS(Amazon Web Services)에서 EC2 인스턴스와 S3 버킷의 역할과 차이점에 대해 설명해 주세요.', '0', '', NULL),
(10, 0, '강민지', 'Pandas 데이터프레임과 시리즈 차이점이 궁금합니다!', '데이터 분석 입문', 0, '미답변', '2024-05-01 00:00:00', 'Python에서 Pandas 라이브러리를 사용하여 데이터 분석을 할 때, 데이터프레임과 시리즈의 차이점은 무엇인가요?', '0', '', NULL),
(11, 0, '김지훈', '의존성 주입과 제어의 역전 개념이 어렵습니다!', 'Spring Boot 프레임워크', 0, '미답변', '2024-02-19 00:00:00', 'Spring Boot에서 의존성 주입(Dependency Injection)과 제어의 역전(Inversion of Control)의 개념이 무엇인지 설명해 주세요.', '0', '', NULL),
(12, 0, '박소영', 'React Native 상태 관리 방법이 궁금합니다!', 'React Native 앱 개발', 0, '미답변', '2024-04-11 00:00:00', 'React Native에서 앱 개발 시 상태 관리(State Management)를 위해 어떤 라이브러리나 패턴을 사용하는지 설명해 주세요.', '0', '', NULL),
(13, 0, '이동현', 'Linux 터미널 명령어 질문입니다!', 'Linux 운영체제', 0, '미답변', '2024-03-08 00:00:00', 'Linux 터미널에서 자주 사용되는 명령어들과 그 용도에 대해 설명해 주세요.', '0', '', NULL),
(14, 0, '최은혜', 'Promise와 async/await 차이가 궁금합니다!', '자바스크립트 고급', 0, '미답변', '2024-02-22 00:00:00', '자바스크립트에서 비동기 처리를 위한 Promise와 async/await의 개념과 사용법에 대해 설명해 주세요.', '0', '', NULL),
(15, 0, '강재민', 'Django REST API 직렬화 개념이 어렵습니다!', 'Django REST API', 0, '미답변', '2024-05-05 00:00:00', 'Django REST Framework를 사용하여 API를 개발할 때, 직렬화(Serialization)와 역직렬화(Deserialization)의 개념이 무엇인지 설명해 주세요.', '0', '', NULL),
(16, 0, '김민정', 'Docker 컨테이너 빌드 방법이 궁금합니다!', '컨테이너 가상화', 0, '미답변', '2024-03-28 00:00:00', 'Docker 컨테이너의 개념과 장점에 대해 설명해 주세요. 또한 컨테이너를 빌드하고 실행하는 과정도 설명해 주세요.', '0', '', NULL),
(17, 0, '박성진', 'TypeScript 타입 별칭과 인터페이스 차이가 무엇인가요?', 'TypeScript 프로그래밍', 0, '미답변', '2024-04-15 00:00:00', 'TypeScript에서 타입 별칭(Type Alias)과 인터페이스(Interface)의 차이점에 대해 설명해 주세요.', '0', '', NULL),
(18, 0, '이지영', 'Git rebase 사용법이 궁금합니다!', '버전 관리 시스템', 0, '미답변', '2024-02-10 00:00:00', 'Git에서 rebase 명령어의 용도와 사용법에 대해 설명해 주세요. 또한 merge와의 차이점도 설명해 주세요.', '0', '', NULL),
(19, 0, '최동환', 'Webpack 번들링 과정이 어렵습니다!', '웹 번들링 도구', 0, '미답변', '2024-03-20 00:00:00', 'Webpack을 사용하여 웹 애플리케이션을 번들링할 때, 전체 과정과 주요 개념에 대해 설명해 주세요.', '0', '', NULL),
(20, 0, '강지원', 'Vue.js 컴포넌트 통신 방법이 궁금합니다!', 'Vue.js 프론트엔드 프레임워크', 0, '미답변', '2024-04-28 00:00:00', 'Vue.js에서 부모-자식 컴포넌트 간 데이터 전달 방식과 이벤트 전달 방식에 대해 설명해 주세요.', '0', '', NULL),
(21, 0, '박철수', 'React Hook 사용법이 궁금합니다!', 'React 고급', 0, '미답변', '2024-03-05 00:00:00', 'React Hook의 개념과 사용법에 대해 설명해 주세요. 또한 Class 컴포넌트와의 차이점도 설명해 주세요.', '0', '', NULL),
(22, 0, '김영희', 'MongoDB 쿼리 작성 방법이 어렵습니다!', 'NoSQL 데이터베이스', 0, '미답변', '2024-04-22 00:00:00', 'MongoDB에서 문서를 조회, 삽입, 업데이트, 삭제하는 쿼리 작성 방법에 대해 설명해 주세요.', '0', '', NULL),
(23, 0, '이철민', 'Kubernetes 클러스터 구축 방법이 궁금합니다!', '컨테이너 오케스트레이션', 0, '미답변', '2024-02-03 00:00:00', 'Kubernetes 클러스터를 구축하는 방법과 주요 개념(Pod, Deployment, Service 등)에 대해 설명해 주세요.', '0', '', NULL),
(24, 0, '최지혜', 'Nginx 리버스 프록시 설정 방법이 어렵습니다!', '웹 서버 구축', 0, '미답변', '2024-05-15 00:00:00', 'Nginx를 사용하여 리버스 프록시를 설정하는 방법에 대해 설명해 주세요. 또한 로드 밸런싱과의 차이점도 설명해 주세요.', '0', '', NULL),
(25, 0, '박상현', 'ElasticSearch 검색 엔진 사용법이 궁금합니다!', '검색 엔진', 0, '미답변', '2024-03-12 00:00:00', 'ElasticSearch를 사용하여 효율적인 검색 시스템을 구축하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(26, 0, '김유진', 'GraphQL API 개발 방법이 어렵습니다!', 'API 개발', 0, '미답변', '2024-04-29 00:00:00', 'GraphQL을 사용하여 API를 개발하는 방법과 RESTful API와의 차이점에 대해 설명해 주세요.', '0', '', NULL),
(27, 0, '이재혁', 'Jenkins CI/CD 파이프라인 구축 방법이 궁금합니다!', '지속적 통합/지속적 배포', 0, '미답변', '2024-02-18 00:00:00', 'Jenkins를 사용하여 CI/CD 파이프라인을 구축하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(28, 0, '최서연', 'Kafka 메시징 시스템 사용법이 어렵습니다!', '메시징 시스템', 0, '미답변', '2024-05-27 00:00:00', 'Kafka 메시징 시스템의 개념과 사용법에 대해 설명해 주세요. 또한 다른 메시징 시스템과의 차이점도 설명해 주세요.', '0', '', NULL),
(29, 0, '박지훈', 'RabbitMQ 메시징 큐 시스템 사용법이 궁금합니다!', '메시징 큐', 0, '미답변', '2024-03-31 00:00:00', 'RabbitMQ 메시징 큐 시스템의 개념과 사용법에 대해 설명해 주세요. 또한 다른 메시징 큐 시스템과의 차이점도 설명해 주세요.', '0', '', NULL),
(30, 0, '김소현', 'Redis 인메모리 데이터베이스 사용법이 어렵습니다!', '인메모리 데이터베이스', 0, '미답변', '2024-04-07 00:00:00', 'Redis 인메모리 데이터베이스의 개념과 사용법에 대해 설명해 주세요. 또한 기존 디스크 기반 데이터베이스와의 차이점도 설명해 주세요.', '0', '', NULL),
(31, 0, '이민석', 'Terraform 클라우드 인프라 관리 방법이 궁금합니다!', '인프라 as 코드', 0, '미답변', '2024-02-28 00:00:00', 'Terraform을 사용하여 클라우드 인프라를 코드 형식으로 관리하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(32, 0, '최지원', 'Ansible 구성 관리 도구 사용법이 어렵습니다!', '구성 관리', 0, '미답변', '2024-05-12 00:00:00', 'Ansible을 사용하여 서버 구성을 자동화하고 관리하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(33, 0, '박지수', 'Jest 단위 테스트 작성 방법이 궁금합니다!', '단위 테스트', 0, '미답변', '2024-03-19 00:00:00', 'Jest를 사용하여 JavaScript 코드에 대한 단위 테스트를 작성하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(34, 0, '김태영', 'Cypress 엔드투엔드 테스트 작성 방법이 어렵습니다!', '엔드투엔드 테스트', 0, '미답변', '2024-04-25 00:00:00', 'Cypress를 사용하여 웹 애플리케이션에 대한 엔드투엔드 테스트를 작성하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(35, 0, '이예린', 'Postman API 테스트 작성 방법이 궁금합니다!', 'API 테스트', 0, '미답변', '2024-02-11 00:00:00', 'Postman을 사용하여 API에 대한 테스트를 작성하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(36, 0, '최민수', 'Selenium 웹 자동화 테스트 작성 방법이 어렵습니다!', '웹 자동화 테스트', 0, '미답변', '2024-05-20 00:00:00', 'Selenium을 사용하여 웹 애플리케이션에 대한 자동화 테스트를 작성하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(37, 0, '박소영', 'TensorFlow 딥러닝 모델 구축 방법이 궁금합니다!', '딥러닝', 0, '미답변', '2024-03-25 00:00:00', 'TensorFlow를 사용하여 딥러닝 모델을 구축하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(38, 0, '김재현', 'PyTorch 딥러닝 모델 구축 방법이 어렵습니다!', '딥러닝', 0, '미답변', '2024-04-30 00:00:00', 'PyTorch를 사용하여 딥러닝 모델을 구축하는 방법에 대해 설명해 주세요.', '0', '', NULL),
(39, 0, '이지원', 'Kubernetes Operator 개발 방법이 궁금합니다!', '쿠버네티스 운영', 0, '미답변', '2024-02-06 00:00:00', 'Kubernetes Operator를 개발하는 방법과 주요 개념에 대해 설명해 주세요.', '0', '', NULL),
(40, 0, '최현석', 'Istio 서비스 메시 구축 방법이 어렵습니다!', '서비스 메시', 9, '미답변', '2024-05-18 00:00:00', 'Istio를 사용하여 서비스 메시를 구축하는 방법과 주요 개념에 대해 설명해 주세요.', '0', '', NULL),
(98, 0, '김철수', '리액트 라우터 사용법이 어렵습니다', 'React 고급', 0, '미답변', '2024-04-03 00:00:00', '리액트 라우터를 사용하여 여러 페이지를 만들려고 하는데 어려움을 겪고 있습니다. 라우터 설정 방법과 페이지 간 데이터 전달 방법에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(99, 0, '박영희', 'useEffect 훅 사용법이 어렵습니다', 'React 기초', 0, '미답변', '2024-04-10 00:00:00', 'useEffect 훅을 사용하여 컴포넌트 생명주기 메서드를 대신하려고 하는데 잘 모르겠습니다. useEffect의 사용 방법과 클린업 함수에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(100, 0, '이동혁', 'React Context API 사용법이 어렵습니다', 'React 중급', 0, '미답변', '2024-04-15 00:00:00', 'React에서 전역 상태 관리를 위해 Context API를 사용하려고 하는데 어려움을 겪고 있습니다. Context API의 사용 방법과 실제 예제에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(101, 0, '최지혜', 'Redux 사용법이 어렵습니다', 'React 고급', 0, '미답변', '2024-04-20 00:00:00', 'React 프로젝트에서 Redux를 사용하여 상태 관리를 하려고 하는데 어려움을 겪고 있습니다. Redux의 동작 원리와 실제 사용 예제에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(102, 0, '강동주', 'React Hooks 사용법이 어렵습니다', 'React 기초', 0, '미답변', '2024-04-25 00:00:00', 'React에서 Hooks를 사용하려고 하는데 어려움을 겪고 있습니다. Hooks의 사용 방법과 주의사항, 실제 예제에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(103, 0, '허서현', 'React 성능 최적화가 어렵습니다', 'React 고급', 0, '미답변', '2024-05-02 00:00:00', 'React 애플리케이션의 성능을 개선하기 위해 어떤 기법들이 있는지 설명해 주시기 바랍니다. 코드 스플리팅, 멀모 라이징, 가상화 등의 기법에 대해 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(104, 0, '유재석', 'React Native 시작하기가 어렵습니다', 'React Native 기초', 0, '미답변', '2024-05-07 00:00:00', 'React Native를 사용하여 모바일 앱 개발을 시작하려고 하는데 어려움을 겪고 있습니다. React Native의 설치 방법과 기본 구조, 실행 방법에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(105, 0, '박명수', 'React Native 네비게이션 사용법이 어렵습니다', 'React Native 중급', 0, '미답변', '2024-05-12 00:00:00', 'React Native에서 네비게이션을 구현하려고 하는데 어려움을 겪고 있습니다. 네비게이션 라이브러리 사용법과 실제 예제에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(106, 0, '이광수', 'React Native 애니메이션 구현이 어렵습니다', 'React Native 고급', 0, '미답변', '2024-05-17 00:00:00', 'React Native에서 애니메이션을 구현하려고 하는데 어려움을 겪고 있습니다. 애니메이션 라이브러리 사용법과 실제 예제에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(107, 0, '김태리', 'React Native 성능 최적화가 어렵습니다', 'React Native 고급', 0, '미답변', '2024-05-22 00:00:00', 'React Native 애플리케이션의 성능을 개선하기 위해 어떤 기법들이 있는지 설명해 주시기 바랍니다. 코드 스플리팅, 이미지 최적화, 네이티브 모듈 사용 등의 기법에 대해 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(108, 0, '전지현', 'React Native와 Flutter의 차이점이 무엇인가요?', 'React Native vs Flutter', 0, '미답변', '2024-05-27 00:00:00', 'React Native와 Flutter는 모두 크로스 플랫폼 모바일 앱 개발 프레임워크입니다. 두 프레임워크의 차이점과 장단점에 대해 설명해 주시기 바랍니다.', '0', '', NULL),
(109, 0, '김철수', '자료구조와 알고리즘 개념이 어렵습니다', '자료구조와 알고리즘', 0, '미답변', '2024-03-01 00:00:00', '자료구조와 알고리즘 수업을 듣고 있는데 개념이 어렵게 느껴집니다. LinkedList, 트리, 그래프 등의 자료구조와 정렬, 탐색 알고리즘에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(110, 0, '박영희', '운영체제 스케줄링 방식이 이해가 안됩니다', '운영체제', 0, '미답변', '2024-03-15 00:00:00', '운영체제 수업에서 프로세스 스케줄링 방식에 대해 배웠는데 이해가 잘 안됩니다. 선점 스케줄링, 비선점 스케줄링, 라운드 로빈 등의 방식에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(111, 0, '이동혁', '데이터베이스 정규화가 어렵습니다', '데이터베이스', 0, '미답변', '2024-04-01 00:00:00', '데이터베이스 수업에서 정규화 과정에 대해 배웠는데 이해가 잘 안됩니다. 1차, 2차, 3차 정규화의 개념과 과정에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(112, 0, '최지혜', '네트워크 계층 구조가 어렵습니다', '컴퓨터 네트워크', 0, '미답변', '2024-04-10 00:00:00', '컴퓨터 네트워크 수업에서 OSI 7계층과 TCP/IP 4계층 구조에 대해 배웠는데 이해가 잘 안됩니다. 각 계층의 역할과 프로토콜에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(113, 0, '강동주', '객체지향 프로그래밍 개념이 어렵습니다', '자바 프로그래밍', 0, '미답변', '2024-04-20 00:00:00', '자바 프로그래밍 수업에서 객체지향 개념을 배웠는데 이해가 잘 안됩니다. 클래스, 객체, 상속, 다형성, 캡슐화 등의 개념에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(114, 0, '허서현', '웹 보안 위협이 무엇인지 궁금합니다', '웹 보안', 0, '미답변', '2024-05-01 00:00:00', '웹 보안 수업에서 웹 애플리케이션에 대한 다양한 보안 위협에 대해 배웠는데 궁금한 점이 있습니다. SQL 인젝션, XSS, CSRF 등의 보안 위협에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(115, 0, '유재석', '인공지능 알고리즘이 어렵습니다', '인공지능', 2, '미답변', '2024-05-10 00:00:00', '인공지능 수업에서 다양한 알고리즘에 대해 배웠는데 이해가 잘 안됩니다. 회귀 알고리즘, 의사결정 트리, 신경망 등의 알고리즘에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(116, 0, '박명수', '소프트웨어 공학 프로세스가 어렵습니다', '소프트웨어 공학', 0, '미답변', '2024-05-20 00:00:00', '소프트웨어 공학 수업에서 소프트웨어 개발 프로세스에 대해 배웠는데 이해가 잘 안됩니다. 폭포수 모델, 나선형 모델, 애자일 방법론 등의 프로세스에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(118, 0, '김태리', '파일 시스템 개념이 어렵습니다', '운영체제', 14, '미답변', '2024-06-05 00:00:00', '운영체제 수업에서 파일 시스템 개념에 대해 배웠는데 이해가 잘 안됩니다. 파일 할당 방식, 디렉토리 구조, 파일 시스템 유형 등에 대해 좀 더 자세히 설명해 주시기 바랍니다.', '0', '', NULL),
(119, 50, '임시원', '댓글 등록 성공했다 ㅠㅠㅠㅠㅠㅠㅠㅠㅠㅠㅠ', '자바 입문', 29, '미답변', '2024-05-16 01:05:04', '할 수 있다...', '스크린샷 2024-03-11 172915.png', '', NULL),
(120, 145, '홍길동16', 'ㄴㅇㄴ', '만들고 비교하며 학습하는 리액트 (React)', 10, '미답변', '2024-05-17 10:39:03', '<p>ㅁㄴㅇㅁㄴㅇ</p>', '', 'green', NULL),
(121, 39, '홍길동16', '어렵습니다!!!', '스프링 부트 - 핵심 원리와 활용', 8, '미답변', '2024-05-20 05:35:06', '도와주세여', '', 'green', NULL),
(122, 39, '홍길동16', '너무 어렵습니다.', '스프링 부트 - 핵심 원리와 활용', 15, '미답변', '2024-05-20 10:02:51', '핵심 원리와 활용을 제대로 알려면 부가적으로 어떤걸 알아야 할까요?', '', 'green', NULL),
(123, 41, '임시원', '질문 테스트입니다. 발표', 'Node.js 노드 빠르게 훑어보기', 4, '미답변', '2024-05-21 04:00:21', '<p>ㅇㅇㅇㅇ</p>', 'dsds.png', 'seewon123', NULL),
(124, 37, '홍길동16', '질의사항 발표 수정', '자바스크립트(Javascript) - 기초부터 고급까지', 12, '미답변', '2024-05-21 04:02:14', '발표 수', '스크린샷 2024-03-31 201117.png', 'green', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `qna_comment`
--

CREATE TABLE `qna_comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(1200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `regdate` datetime(6) NOT NULL,
  `idx` int(11) NOT NULL,
  `user_id` varchar(145) NOT NULL,
  `selected` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `qna_comment`
--

INSERT INTO `qna_comment` (`id`, `comment`, `name`, `regdate`, `idx`, `user_id`, `selected`) VALUES
(9, 'dd', '관리자', '2024-05-14 18:08:00.000000', 117, '', ''),
(11, 'ㅇㅇㅇ', '홍길동16', '2024-05-20 15:17:24.000000', 115, 'green', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `idx` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `content` varchar(1200) NOT NULL,
  `hit` varchar(1000) NOT NULL,
  `view` varchar(1000) NOT NULL,
  `date` datetime(6) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `review`
--

INSERT INTO `review` (`idx`, `cid`, `name`, `content`, `hit`, `view`, `date`, `rating`, `user_id`) VALUES
(1, 0, '홍길동', '자바의 기초를 알려줍니다', '0', '2', '0000-00-00 00:00:00.000000', 0, ''),
(2, 0, '홍길동', '자바의 기초를 알려줍니다', '0', '0', '0000-00-00 00:00:00.000000', 0, ''),
(3, 0, '김영희', '데이터베이스 설계에 대한 기초적인 내용을 배웠습니다. ER 다이어그램을 작성하고 정규화하는 과정을 실습하면서 데이터베이스의 기본 원리를 이해할 수 있었습니다.', '4.8', '0', '2024-05-01 20:46:11.000000', 0, ''),
(4, 0, '이철수', '웹 보안에 대한 강의였는데, 실제로 공격해볼 수 있어서 흥미로웠습니다. SQL Injection, XSS 등의 취약점에 대해 배우고 방어하는 방법을 익힐 수 있었습니다.', '4.5', '0', '2024-05-01 20:46:11.000000', 0, ''),
(5, 0, '박영희', '리액트를 사용하여 실제 프로젝트를 개발하는 방법을 배웠습니다. 컴포넌트 기반 개발 방식을 이해하고, 상태 관리와 라우팅을 구현하는 것이 특히 유용했습니다.', '4.7', '0', '2024-05-01 20:46:11.000000', 0, ''),
(6, 0, '이민수', '머신러닝의 기본 개념을 배웠는데, 특히 회귀와 분류 알고리즘에 대한 실습이 인상적이었습니다. 데이터를 시각화하고 모델을 평가하는 과정이 흥미로웠습니다.', '4.3', '0', '2024-05-01 20:46:11.000000', 0, ''),
(7, 0, '김미영', '자바로 웹 애플리케이션을 개발하는 방법을 배웠습니다. Spring 프레임워크를 활용하여 MVC 아키텍처를 구축하는 실습이 유용했습니다.', '4.6', '0', '2024-05-01 20:46:11.000000', 0, ''),
(8, 0, '박민지', '파이썬을 사용하여 데이터를 분석하는 방법을 배웠습니다. Pandas와 Matplotlib을 활용하여 데이터를 정제하고 시각화하는 과정이 유익했습니다.', '4.9', '0', '2024-05-01 20:46:11.000000', 0, ''),
(9, 0, '김현우', 'HTML과 CSS를 활용하여 간단한 웹 페이지를 만드는 방법을 배웠습니다. 웹 디자인의 기본 원리와 레이아웃을 이해하는 데 도움이 되었습니다.', '4.2', '0', '2024-05-01 20:46:11.000000', 0, ''),
(10, 0, '이지훈', '데이터베이스 관리 시스템을 설치하고 운영하는 방법을 배웠습니다. SQL 쿼리를 작성하고 데이터를 관리하는 기술이 유용했습니다.', '4.4', '0', '2024-05-01 20:46:11.000000', 0, ''),
(11, 0, '최성호', '컴퓨터 네트워크의 기본 개념을 배웠습니다. OSI 7계층 모델과 TCP/IP 프로토콜에 대해 이해하는 것이 중요했습니다.', '4.1', '0', '2024-05-01 20:46:11.000000', 0, ''),
(12, 0, '이정민', '자바스크립트로 다양한 프로젝트를 구현해보는 시간이 있었습니다. 이벤트 핸들링과 DOM 조작을 실습하면서 실전 능력을 향상시킬 수 있었습니다.', '4.7', '0', '2024-05-01 20:46:11.000000', 0, ''),
(13, 0, '박지원', '기초적인 알고리즘 문제를 푸는 연습을 많이 했습니다. 정렬, 탐색, 그래프 등 다양한 유형의 문제를 풀면서 문제 해결 능력이 향상되었습니다.', '4.6', '0', '2024-05-01 20:46:11.000000', 0, ''),
(14, 0, '김준호', '웹 보안에 대한 고급 내용을 학습했습니다. 보안 취약점을 발견하고 방어하는 방법을 배우면서 웹 애플리케이션의 보안성을 높일 수 있었습니다.', '4.8', '0', '2024-05-01 20:46:11.000000', 0, ''),
(15, 0, '이지원', '대용량 데이터를 처리하는 방법을 배웠습니다. Hadoop과 Spark를 사용하여 데이터를 분산 처리하는 실습이 유익했습니다.', '4.3', '0', '2024-05-01 20:46:11.000000', 0, ''),
(16, 0, '최민지', '소프트웨어 개발 과정을 이해하는 데 도움이 되었습니다. Agile과 Waterfall 등 다양한 개발 방법론을 학습하면서 프로젝트를 효율적으로 관리하는 방법을 배웠습니다.', '4.5', '0', '2024-05-01 20:46:11.000000', 0, ''),
(17, 0, '김성호', '클라우드 서비스를 활용하는 방법을 배웠습니다. AWS와 Google Cloud를 사용하여 가상 서버를 생성하고 관리하는 실습이 유익했습니다.', '4.7', '0', '2024-05-01 20:46:11.000000', 0, ''),
(18, 0, '이예지', '실제 데이터를 분석하여 인사이트를 도출하는 경험을 했습니다. Python과 R을 사용하여 데이터를 탐색하고 모델을 구축하는 과정이 흥미로웠습니다.', '4.9', '0', '2024-05-01 20:46:11.000000', 0, ''),
(19, 0, '최지우', '컴퓨터 그래픽스의 기본 원리를 배웠습니다. OpenGL을 사용하여 그래픽 애플리케이션을 개발하면서 3D 그래픽의 구조와 렌더링 과정을 이해했습니다.', '4.4', '3', '2024-05-01 20:46:11.000000', 0, ''),
(20, 0, '김민수', '데이터베이스 설계 과정에서 정규화와 ER 다이어그램의 중요성을 배웠습니다. 실제 프로젝트에 적용하여 효율적인 데이터베이스를 구축할 수 있게 되었습니다.', '4.2', '23', '2024-05-02 14:30:45.000000', 0, ''),
(21, 0, '이영희', 'HTML, CSS, JavaScript를 활용하여 웹 페이지를 제작하는 방법을 배웠습니다. 간단한 프로젝트를 통해 실습해보니 웹 개발에 대한 이해도가 높아졌습니다.', '4.5', '35', '2024-05-03 09:15:22.000000', 0, ''),
(22, 0, '박철수', '다양한 알고리즘과 자료구조에 대해 공부했습니다. 문제 해결 능력이 향상되었고, 효율적인 코드를 작성할 수 있게 되었습니다.', '4.7', '28', '2024-05-04 16:40:11.000000', 0, ''),
(23, 0, '한지민', '소프트웨어 개발 생명주기와 다양한 방법론에 대해 배웠습니다. 프로젝트 관리와 팀워크의 중요성을 깨달았습니다.', '4.3', '19', '2024-05-05 11:55:38.000000', 0, ''),
(24, 0, '임성준', '인공지능의 기본 개념과 머신러닝 알고리즘에 대해 공부했습니다. 실제 데이터를 활용하여 모델을 학습시키고 예측해보는 과정이 흥미로웠습니다.', '4.6', '42', '2024-05-06 08:20:07.000000', 0, ''),
(25, 0, '강영식', 'Android Studio를 사용하여 모바일 앱을 개발하는 방법을 배웠습니다. 사용자 인터페이스 디자인과 기능 구현 과정이 재미있었습니다.', '4.1', '14', '2024-05-07 13:05:29.000000', 0, ''),
(26, 0, '최유진', '운영체제의 핵심 개념과 프로세스 관리, 메모리 관리 등에 대해 공부했습니다. 시스템 프로그래밍에 대한 이해도가 높아졌습니다.', '4.4', '31', '2024-05-08 19:50:53.000000', 0, ''),
(27, 0, '서민준', '소켓 프로그래밍을 통해 네트워크 통신 프로그램을 개발해보았습니다. 클라이언트-서버 모델의 동작 원리를 이해하게 되었습니다.', '4.2', '26', '2024-05-09 15:35:16.000000', 0, ''),
(28, 0, '김지우', '컴파일러의 구조와 작동 원리에 대해 배웠습니다. 렉서, 파서, 코드 생성기 등의 구현 과정이 어려웠지만 보람찼습니다.', '4.5', '39', '2024-05-10 10:20:44.000000', 0, ''),
(29, 0, '이상현', '대량의 데이터에서 유용한 패턴과 지식을 추출하는 기술을 배웠습니다. 실제 데이터셋을 활용하여 분석해보니 데이터의 가치를 깨달았습니다.', '4.3', '22', '2024-05-11 17:05:31.000000', 0, ''),
(30, 0, '박민지', 'Spring Framework를 사용하여 웹 서비스를 개발하는 방법을 배웠습니다. MVC 패턴과 의존성 주입 등의 개념을 적용해보았습니다.', '4.6', '47', '2024-05-12 12:50:09.000000', 0, ''),
(31, 0, '정현우', 'OpenCV 라이브러리를 활용하여 이미지 처리와 객체 인식을 구현해보았습니다. 컴퓨터 비전 기술의 다양한 응용 분야를 알게 되었습니다.', '4.4', '36', '2024-05-13 08:35:52.000000', 0, ''),
(32, 0, '임지현', '텍스트 데이터를 전처리하고 언어 모델을 학습시키는 과정을 배웠습니다. 챗봇과 감성 분석 등의 응용 사례를 접해보니 흥미로웠습니다.', '4.1', '19', '2024-05-14 14:20:37.000000', 0, ''),
(33, 0, '김도윤', 'Hadoop과 Spark를 사용하여 대용량 데이터를 처리하고 분석하는 방법을 배웠습니다. 데이터 분석 결과를 시각화하는 과정이 인상적이었습니다.', '4.5', '42', '2024-05-15 10:05:24.000000', 0, ''),
(34, 0, '이예준', '정보보안의 기본 개념과 암호화 알고리즘에 대해 공부했습니다. 안전한 시스템을 설계하는 방법을 배우니 유익했습니다.', '4.3', '28', '2024-05-16 15:50:11.000000', 0, ''),
(35, 0, '박서윤', '라즈베리 파이를 활용하여 임베디드 시스템을 구현해보았습니다. 하드웨어와 소프트웨어의 연동 과정이 흥미로웠습니다.', '4.2', '21', '2024-05-17 11:35:48.000000', 0, ''),
(36, 0, '최하윤', '그래프 이론의 기본 개념과 알고리즘에 대해 배웠습니다. 최단 경로 문제와 네트워크 플로우 문제 등을 해결해보니 알고리즘의 중요성을 깨달았습니다.', '4.6', '39', '2024-05-18 17:20:35.000000', 0, ''),
(37, 0, '김민준', '소프트웨어 테스팅의 기법과 도구에 대해 배웠습니다. 단위 테스트와 통합 테스트를 작성하고 수행해보니 소프트웨어 품질 향상의 중요성을 알게 되었습니다.', '4.4', '30', '2024-05-19 13:05:22.000000', 0, ''),
(38, 0, '이서현', 'AWS를 사용하여 클라우드 인프라를 구축하고 관리하는 방법을 배웠습니다. 가상화 기술과 서비스 모델에 대한 이해도가 높아졌습니다.', '4.1', '17', '2024-05-20 08:50:09.000000', 0, ''),
(39, 0, '박준서', '블록체인의 기본 개념과 작동 원리에 대해 공부했습니다. 스마트 컨트랙트를 구현해보니 블록체인 기술의 응용 가능성을 알게 되었습니다.', '4.5', '37', '2024-05-21 14:35:56.000000', 0, ''),
(40, 0, '최지원', 'Tableau와 D3.js를 사용하여 데이터를 시각화하는 방법을 배웠습니다. 인터랙티브한 시각화 결과물을 만들어보니 데이터 스토리텔링의 힘을 느꼈습니다.', '4.3', '25', '2024-05-22 10:20:43.000000', 0, ''),
(41, 0, '김예은', '네트워크 계층 구조와 프로토콜에 대해 공부했습니다. 패킷 전송 과정과 라우팅 알고리즘을 이해하니 네트워크 통신의 원리를 깨달았습니다.', '4.6', '44', '2024-05-23 16:05:30.000000', 0, ''),
(42, 0, '이지훈', '실제 데이터셋을 사용하여 머신러닝 프로젝트를 진행했습니다. 데이터 전처리부터 모델 학습, 평가까지 전 과정을 경험해보니 많은 것을 배웠습니다.', '4.4', '37', '2024-05-24 11:50:17.000000', 0, ''),
(43, 0, '박민영', '다양한 알고리즘 문제를 해결하는 과정에서 논리적 사고력과 문제 해결 능력이 향상되었습니다. 코딩 테스트 대비에도 도움이 되었습니다.', '4.2', '30', '2024-05-25 17:35:04.000000', 0, ''),
(44, 0, '최승현', 'UI/UX 디자인 원칙과 웹 디자인 트렌드에 대해 배웠습니다. 사용자 중심의 디자인을 고려하여 웹 페이지를 제작해보니 시각적으로 매력적인 결과물을 만들 수 있었습니다.', '4.5', '48', '2024-05-26 13:20:51.000000', 0, ''),
(45, 0, '김다은', '대용량 데이터베이스의 성능을 향상시키기 위한 기법을 배웠습니다. 인덱싱, 쿼리 최적화, 파티셔닝 등의 방법을 적용해보니 시스템 성능이 크게 개선되었습니다.', '4.3', '36', '2024-05-27 09:05:38.000000', 0, ''),
(46, 0, '이현우', '고급 렌더링 기법과 쉐이딩 언어에 대해 공부했습니다. 실시간 그래픽스 엔진을 활용하여 실감 나는 3D 장면을 구현해보니 흥미로웠습니다.', '4.6', '63', '2024-05-28 14:50:25.000000', 0, ''),
(47, 0, '김민수', '웹 개발의 기초부터 시작하여 HTML, CSS, JavaScript를 배웠습니다. 실습을 통해 직접 웹 페이지를 만들어보면서 많은 것을 배울 수 있었습니다. 강사님의 설명도 이해하기 쉬웠습니다.', '4.5', '0', '2024-05-01 20:46:11.000000', 0, ''),
(48, 0, '박지현', '데이터베이스 설계의 기본 개념과 정규화 과정에 대해 배웠습니다. 실제 프로젝트에 적용할 수 있는 실용적인 내용들로 구성되어 있어 큰 도움이 되었습니다. 다만 시간이 좀 더 길었으면 하는 아쉬움이 있었습니다.', '4.2', '0', '2024-05-01 20:46:11.000000', 0, ''),
(49, 0, '이영진', '알고리즘의 기본 개념과 다양한 알고리즘 기법들을 배웠습니다. 문제 풀이를 통해 알고리즘 사고력을 기를 수 있었고, 강사님께서 친절하게 설명해주셔서 어려운 내용도 잘 이해할 수 있었습니다.', '4.8', '0', '2024-05-01 20:46:11.000000', 0, ''),
(50, 0, '김민수', '웹 개발의 기초부터 시작하여 HTML, CSS, JavaScript를 배웠습니다. 실습을 통해 직접 웹 페이지를 만들어보면서 많은 것을 배울 수 있었습니다. 강사님의 설명도 이해하기 쉬웠습니다.', '4.5', '0', '2024-05-01 20:46:11.000000', 0, ''),
(51, 0, '박지현', '데이터베이스 설계의 기본 개념과 정규화 과정에 대해 배웠습니다. 실제 프로젝트에 적용할 수 있는 실용적인 내용들로 구성되어 있어 큰 도움이 되었습니다. 다만 시간이 좀 더 길었으면 하는 아쉬움이 있었습니다.', '4.2', '0', '2024-05-01 20:46:11.000000', 0, ''),
(52, 0, '이영진', '알고리즘의 기본 개념과 다양한 알고리즘 기법들을 배웠습니다. 문제 풀이를 통해 알고리즘 사고력을 기를 수 있었고, 강사님께서 친절하게 설명해주셔서 어려운 내용도 잘 이해할 수 있었습니다.', '4.8', '0', '2024-05-01 20:46:11.000000', 0, ''),
(53, 0, '강민준', 'C언어의 기초 문법부터 포인터, 구조체까지 다양한 내용을 배웠습니다. 강의 자료가 체계적으로 잘 정리되어 있어 이해하기 쉬웠습니다. 강사님의 풍부한 경험과 지식이 돋보이는 강의였습니다.', '4.6', '0', '2024-05-01 20:46:11.000000', 0, ''),
(54, 0, '신서윤', '파이썬 프로그래밍 언어의 기초를 배웠습니다. 강사님의 친절한 설명과 다양한 실습 예제 덕분에 쉽게 따라갈 수 있었습니다. 파이썬에 대한 자신감이 생겼고, 더 깊이 공부해보고 싶어졌습니다.', '4.9', '0', '2024-05-01 20:46:11.000000', 0, ''),
(55, 0, '임진우', '자료구조와 알고리즘에 대한 개념을 배우고, 실제로 구현해보는 시간을 가졌습니다. 어려운 내용이었지만 강사님의 꼼꼼한 설명 덕분에 차근차근 이해할 수 있었습니다. 코딩 실력 향상에 큰 도움이 되었습니다.', '4.7', '0', '2024-05-01 20:46:11.000000', 0, ''),
(56, 0, '한지민', '운영체제의 역할과 프로세스, 스레드, 메모리 관리 등 핵심 개념을 배웠습니다. 복잡한 내용이었지만 강사님의 체계적인 설명으로 이해하는 데 큰 어려움은 없었습니다. 운영체제에 대한 전반적인 지식을 쌓을 수 있었습니다.', '4.4', '0', '2024-05-01 20:46:11.000000', 0, ''),
(57, 0, '오현준', '리눅스 시스템 관리에 필요한 다양한 명령어와 도구들을 배웠습니다. 실습 환경이 잘 구축되어 있어 직접 해보면서 익힐 수 있었습니다. 강사님의 실무 경험을 바탕으로 한 조언들이 특히 유익했습니다.', '4.3', '0', '2024-05-01 20:46:11.000000', 0, ''),
(58, 0, '윤서현', 'Java 언어의 객체지향 개념과 문법을 배웠습니다. 강사님의 예제 코드와 설명이 잘 준비되어 있어 이해하기 쉬웠습니다. 다양한 실습 문제를 통해 배운 내용을 적용해볼 수 있어 좋았습니다.', '4.5', '0', '2024-05-01 20:46:11.000000', 0, ''),
(59, 0, '배수진', '웹 백엔드 개발에 필요한 다양한 기술을 배웠습니다. Spring Framework, JPA, REST API 등 실무에서 많이 사용되는 내용들로 구성되어 있어 유익했습니다. 강사님의 경험과 노하우가 돋보이는 강의였습니다.', '4.6', '0', '2024-05-01 20:46:11.000000', 0, ''),
(60, 0, '곽민태', '머신러닝의 기본 개념과 알고리즘을 배웠습니다. 수학적인 내용이 있어 조금 어려웠지만, 강사님의 친절한 설명 덕분에 점차 이해할 수 있었습니다. 실습을 통해 직접 모델을 만들어보는 경험이 좋았습니다.', '4.2', '0', '2024-05-01 20:46:11.000000', 0, ''),
(61, 0, '류서연', '파이썬을 활용한 데이터 분석 방법을 배웠습니다. Numpy, Pandas, Matplotlib 등 강력한 라이브러리 사용법을 익힐 수 있었습니다. 실제 데이터를 다루는 프로젝트를 진행하면서 많은 것을 배웠습니다.', '4.8', '0', '2024-05-01 20:46:11.000000', 0, ''),
(62, 0, '남현우', 'Swift 언어를 사용한 iOS 앱 개발 과정이었습니다. 강사님의 체계적인 커리큘럼과 세심한 피드백 덕분에 앱 개발 실력이 늘었습니다. 프로젝트 중심의 수업 방식이 특히 만족스러웠습니다.', '4.7', '0', '2024-05-01 20:46:11.000000', 0, ''),
(63, 0, '문지원', '딥러닝의 기본 개념과 신경망 구조에 대해 배웠습니다. 이론적인 내용이 많아 쉽지 않았지만, 강사님의 친절한 설명과 질의응답 덕분에 차근차근 따라갈 수 있었습니다. 딥러닝에 대한 관심이 더 커졌습니다.', '4.4', '0', '2024-05-01 20:46:11.000000', 0, ''),
(64, 0, '송예준', '네트워크 보안의 기본 개념과 다양한 공격 기법, 대응 방안에 대해 배웠습니다. 실제 사례를 통해 보안의 중요성을 깨달을 수 있었습니다. 강사님의 전문적인 지식과 경험이 인상 깊었습니다.', '4.6', '0', '2024-05-01 20:46:11.000000', 0, ''),
(65, 0, '안서진', 'JavaScript의 고급 개념과 ES6+ 문법을 배웠습니다. 실습 예제를 통해 직접 코드를 작성하며 이해할 수 있었습니다. 강사님의 풍부한 경험을 바탕으로 한 조언들이 많은 도움이 되었습니다.', '4.5', '0', '2024-05-01 20:46:11.000000', 0, ''),
(66, 0, '우진우', 'Spring Boot를 사용한 웹 애플리케이션 개발 과정이었습니다. 강사님의 실무 경험을 바탕으로 한 설명과 best practice 공유가 특히 유익했습니다. 프로젝트 구현을 통해 실력을 키울 수 있었습니다.', '4.8', '0', '2024-05-01 20:46:11.000000', 0, ''),
(67, 0, '유민재', '컴퓨터의 하드웨어 구조와 동작 원리에 대해 배웠습니다. 낮선 개념들이 많아 쉽지 않았지만, 강사님의 쉽고 재미있는 설명 덕분에 흥미를 가지고 수업에 참여할 수 있었습니다. 컴퓨터에 대한 이해도가 높아졌습니다.', '4.3', '1', '2024-05-01 20:46:11.000000', 0, ''),
(68, 0, '황서연', 'React 라이브러리를 사용한 프론트엔드 개발 과정이었습니다. 컴포넌트 기반 개발, 상태 관리, 라우팅 등 필수적인 내용을 다뤄주셔서 좋았습니다. 프로젝트 구현 과정에서 많은 것을 배울 수 있었습니다.', '4.7', '0', '2024-05-01 20:46:11.000000', 0, ''),
(69, 0, '홍지후', 'SQL을 사용한 데이터베이스 관리와 쿼리 작성 방법을 배웠습니다. 강사님의 체계적인 설명과 실습 예제 덕분에 SQL 사용법을 익힐 수 있었습니다. 데이터베이스에 대한 자신감이 생겼습니다.', '4.6', '1', '2024-05-01 20:46:11.000000', 0, ''),
(70, 0, '최민준', '버전 관리 도구인 Git과 원격 저장소 GitHub 사용법을 배웠습니다. 강사님의 자세한 설명과 실습 환경 덕분에 쉽게 따라할 수 있었습니다. 협업과 코드 관리의 중요성을 깨달았습니다.', '4.9', '0', '2024-05-01 20:46:11.000000', 0, ''),
(71, 0, '정서윤', 'Unity 엔진을 사용한 게임 개발 과정이었습니다. 게임 개발의 전반적인 프로세스와 Unity의 다양한 기능을 배울 수 있었습니다. 강사님의 실무 경험과 노하우가 돋보이는 강의였습니다.', '4.7', '1', '2024-05-01 20:46:11.000000', 0, ''),
(72, 0, '김하진', '다양한 알고리즘 문제를 해결하는 전략과 기술을 배웠습니다. 문제 해결 과정에서 강사님의 꼼꼼한 코드 리뷰와 피드백이 큰 도움이 되었습니다. 알고리즘 문제 해결 능력이 향상되었습니다.', '4.8', '2', '2024-05-01 20:46:11.000000', 0, ''),
(73, 0, '노민성', 'Java를 사용한 Android 앱 개발 과정이었습니다. 강사님의 체계적인 커리큘럼과 친절한 설명 덕분에 앱 개발의 기초를 쌓을 수 있었습니다. 실제 앱을 만들어보는 프로젝트가 특히 유익했습니다.', '4.5', '4', '2024-05-01 20:46:11.000000', 0, ''),
(75, 168, 'hong', '정말 좋은 강의입니다 추천드려요!!', '0', '0', '2024-05-20 14:08:46.000000', 5, '0'),
(76, 161, 'hong', '정말 좋은 강의입니다!', '0', '0', '2024-05-20 14:09:25.000000', 4, '0'),
(77, 168, 'hong', 'ㄴㅇ', '0', '0', '2024-05-20 15:13:57.000000', 4, '0'),
(78, 161, '홍길동16', 'dsds', '0', '0', '2024-05-20 16:54:12.000000', 5, '0');

-- --------------------------------------------------------

--
-- 테이블 구조 `user_coupons`
--

CREATE TABLE `user_coupons` (
  `ucid` int(11) NOT NULL,
  `couponid` int(11) DEFAULT NULL COMMENT '쿠폰아이디',
  `userid` varchar(100) DEFAULT NULL COMMENT '유저아이디',
  `status` int(11) DEFAULT 1 COMMENT '상태',
  `use_max_date` date DEFAULT NULL COMMENT '사용기한',
  `regdate` date DEFAULT NULL COMMENT '등록일',
  `reason` varchar(100) DEFAULT NULL COMMENT '쿠폰취득사유'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `user_coupons`
--

INSERT INTO `user_coupons` (`ucid`, `couponid`, `userid`, `status`, `use_max_date`, `regdate`, `reason`) VALUES
(1, 1, 'kdj', 1, '2024-05-17', '2024-04-17', '회원가입'),
(2, 1, 'ping', 1, '2024-05-17', '2024-04-17', '회원가입'),
(3, 1, 'green', 1, '2024-05-24', '2024-04-24', '회원가입'),
(4, 2, 'ping', 1, '2024-05-24', '2024-04-08', '보너스'),
(5, 2, 'ping', 1, '2024-05-21', '2024-04-08', '보너스2');

-- --------------------------------------------------------

--
-- 테이블 구조 `user_lecture_progress`
--

CREATE TABLE `user_lecture_progress` (
  `member_id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(100) NOT NULL,
  `completed_lectures` int(11) DEFAULT NULL,
  `total_lectures` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `user_lecture_progress`
--

INSERT INTO `user_lecture_progress` (`member_id`, `username`, `course_id`, `course_name`, `completed_lectures`, `total_lectures`) VALUES
(5, '', 39, '', 28, 54),
(8, '', 39, '', 28, 54),
(18, '', 39, '', 14, 27),
(23, '', 39, '', 14, 27),
(27, '', 39, '', 14, 27),
(40, '', 39, '', 14, 27),
(5, '', 39, '', 28, 54),
(8, '', 39, '', 28, 54),
(18, '', 39, '', 14, 27),
(23, '', 39, '', 14, 27),
(27, '', 39, '', 14, 27),
(40, '', 39, '', 14, 27),
(5, '', 39, '', 28, 54),
(8, '', 39, '', 28, 54),
(18, '', 39, '', 14, 27),
(23, '', 39, '', 14, 27),
(27, '', 39, '', 14, 27),
(40, '', 39, '', 14, 27);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`);

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

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
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- 테이블의 인덱스 `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msgidx`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `ordered_courses`
--
ALTER TABLE `ordered_courses`
  ADD PRIMARY KEY (`ocid`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `qna_comment`
--
ALTER TABLE `qna_comment`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`ucid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 테이블의 AUTO_INCREMENT `coursefile`
--
ALTER TABLE `coursefile`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- 테이블의 AUTO_INCREMENT `lecture`
--
ALTER TABLE `lecture`
  MODIFY `l_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 테이블의 AUTO_INCREMENT `msg`
--
ALTER TABLE `msg`
  MODIFY `msgidx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- 테이블의 AUTO_INCREMENT `ordered_courses`
--
ALTER TABLE `ordered_courses`
  MODIFY `ocid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- 테이블의 AUTO_INCREMENT `qna_comment`
--
ALTER TABLE `qna_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- 테이블의 AUTO_INCREMENT `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
