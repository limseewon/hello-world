<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 삭제할 질문 ID 받아오기
$review_id = $_GET['id'];

// 질문 삭제
$sql = "DELETE FROM review WHERE idx = $review_id";
$result = $mysqli->query($sql);

// 첨부 파일 삭제
// $sql_files = "SELECT file_path FROM qna_files WHERE qna_id = $qna_id";
// $result_files = $mysqli->query($sql_files);

// while ($row = $result_files->fetch_assoc()) {
//     $file_path = $row['file_path'];
//     unlink($file_path);
// }

// $sql_delete_files = "DELETE FROM qna_files WHERE qna_id = $qna_id";
// $mysqli->query($sql_delete_files);

if ($result) {
    echo "<script>alert('질문이 삭제되었습니다.'); location.href='review.php';</script>";
} else {
    echo "<script>alert('질문 삭제에 실패했습니다.'); history.back();</script>";
}

$mysqli->close();
?>