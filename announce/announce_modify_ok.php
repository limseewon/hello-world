<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 수정할 공지사항의 ID 받아오기
$notice_id = $_POST['notice_id'];

// 제목과 본문 내용, 파일 데이터를 받아옴
$title = $_POST['title'];
$content = rawurldecode($_POST['contents']);
$name = $_POST['name']; // 이름 데이터 받아오기

// 현재 날짜 및 시간 가져오기
$regdate = date("Y-m-d H:i:s");

// 공지사항 데이터 수정
$sql = "UPDATE notice SET title='$title', name='$name', content='$content', regdate='$regdate' WHERE idx=$notice_id";

if ($mysqli->query($sql) === true) {
    echo "<script>alert('공지사항이 수정되었습니다.'); location.href='announce.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    echo "<script>alert('공지사항 수정에 실패했습니다.'); history.back();</script>";
}

$mysqli->close();
?>