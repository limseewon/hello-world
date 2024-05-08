<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 삭제할 질문 ID 받아오기
$notice_id = $_GET['id'];

// 질문 삭제
$sql = "DELETE FROM notice WHERE idx = $notice_id";
$result = $mysqli->query($sql);

if ($result) {
    echo "<script>alert('질문이 삭제되었습니다.'); location.href='announce.php';</script>";
} else {
    echo "<script>alert('질문 삭제에 실패했습니다.'); history.back();</script>";
}

$mysqli->close();
?>