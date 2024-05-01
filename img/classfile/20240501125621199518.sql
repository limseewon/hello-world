-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-05-01 12:06
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
-- 데이터베이스: `easy_bbs`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `regdate` datetime NOT NULL,
  `hit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`pid`, `name`, `message`, `regdate`, `hit`) VALUES
(1, '홍길동', '홍길동 내용', '2024-04-29 20:29:24', NULL),
(2, '이도령', '이도령 내용', '2024-04-29 20:29:58', NULL),
(3, '박정웅', 'useState 사용법이 궁금해요', '2023-09-16 07:04:33', NULL),
(4, '민정숙', 'Context API 사용법이 궁금합니다', '2024-02-25 07:04:33', NULL),
(5, '홍예은', 'useEffect는 언제 쓰나요?', '2023-12-09 07:04:33', NULL),
(6, '김민재', 'React에서 key는 뭐죠?', '2023-12-12 07:04:33', NULL),
(7, '엄성호', 'React에서 훅 사용법은?', '2023-12-17 07:04:33', NULL),
(8, '주경희', 'useState 사용법이 궁금해요', '2024-02-09 07:04:33', NULL),
(9, '강현우', 'React 테스트 방법은?', '2023-08-22 07:04:33', NULL),
(10, '김상철', 'useState 사용법이 궁금해요', '2024-01-13 07:04:33', NULL),
(11, '김지은', 'Context API 사용법이 궁금합니다', '2023-06-26 07:04:33', NULL),
(12, '최성현', '클래스 vs 함수 컴포넌트?', '2023-07-14 07:04:33', NULL),
(13, '이명자', 'Custom Hook 만드는 법?', '2023-11-29 07:04:33', NULL),
(14, '최진우', 'Custom Hook 만드는 법?', '2023-07-31 07:04:33', NULL),
(15, '나시우', 'React 최적화 방법은?', '2023-12-10 07:04:33', NULL),
(16, '양우진', 'React에서 API 호출은?', '2024-03-01 07:04:33', NULL),
(17, '권옥자', 'Redux란 무엇인가요?', '2023-12-09 07:04:33', NULL),
(18, '손정식', 'useState 사용법이 궁금해요', '2023-12-01 07:04:33', NULL);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`pid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
