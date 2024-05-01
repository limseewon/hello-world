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
(4, 'admin', 'admin@helloworld.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:11', 100, '2024-04-30 16:34:56', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--
-- worldhello.cart 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.cart&#039; doesn&#039;t exist in engine
-- worldhello.cart테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`cart`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--
-- worldhello.category 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.category&#039; doesn&#039;t exist in engine
-- worldhello.category테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`category`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--
-- worldhello.coupons 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.coupons&#039; doesn&#039;t exist in engine
-- worldhello.coupons테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`coupons`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--
-- worldhello.members 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.members&#039; doesn&#039;t exist in engine
-- worldhello.members테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`members`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `nid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `contents` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `orders`
--
-- worldhello.orders 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.orders&#039; doesn&#039;t exist in engine
-- worldhello.orders테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`orders`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `products`
--
-- worldhello.products 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.products&#039; doesn&#039;t exist in engine
-- worldhello.products테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`products`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `product_image_table`
--
-- worldhello.product_image_table 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.product_image_table&#039; doesn&#039;t exist in engine
-- worldhello.product_image_table테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`product_image_table`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `product_options`
--
-- worldhello.product_options 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.product_options&#039; doesn&#039;t exist in engine
-- worldhello.product_options테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`product_options`&#039; 명령어 라인 1)

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `idx` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `view` int(11) NOT NULL,
  `reply` varchar(10) NOT NULL,
  `date` datetime(6) NOT NULL,
  `pw` varchar(12) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `qna`
--

INSERT INTO `qna` (`idx`, `name`, `title`, `view`, `reply`, `date`, `pw`, `content`) VALUES
(1, '홍길동', '안녕하세요! 반갑습니다! 첫 게시물입니다!', 0, '완료', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(4, '김지현', '안녕하세요! 반갑습니다! 저는 새로운 멤버입니다.', 0, '미답변', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(5, '이민지', '안녕하세요! 반갑습니다! 저는 개발자입니다.', 0, '완료', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(6, '박지성', '안녕하세요! 반갑습니다! 저는 프로그래머입니다.', 0, '미답변', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(7, '김현수', '안녕하세요! 반갑습니다! 저는 디자이너입니다.', 0, '완료', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(8, '이현우', '안녕하세요! 반갑습니다! 저는 개발자입니다.', 0, '미답변', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(9, '박수진', '안녕하세요! 반갑습니다! 저는 새로운 사원입니다.', 0, '미답변', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(10, '김동현', '안녕하세요! 반갑습니다! 저는 신입 개발자입니다.', 0, '완료', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(11, '이지훈', '안녕하세요! 반갑습니다! 저는 새로운 멤버입니다.', 0, '미답변', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(12, '박민지', '안녕하세요! 반갑습니다! 저는 디자이너입니다.', 0, '완료', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!'),
(13, '김민수', '안녕하세요! 반갑습니다! 저는 프로그래머입니다.', 0, '미답변', '2024-04-30 15:51:13.000000', '', '안녕하세요! 반갑습니다! 첫 게시물입니다!');

-- --------------------------------------------------------

--
-- 테이블 구조 `user_coupons`
--
-- worldhello.user_coupons 테이블의 테이블 구조를 읽어오지 못함: #1932 - Table &#039;worldhello.user_coupons&#039; doesn&#039;t exist in engine
-- worldhello.user_coupons테이블의 데이터 읽기 오류: #1064 - &#039;SQL 구문에 오류가 있습니다.&#039; 에러 같습니다. (&#039;FROM `worldhello`.`user_coupons`&#039; 명령어 라인 1)

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
