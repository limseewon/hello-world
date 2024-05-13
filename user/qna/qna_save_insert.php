<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 댓글 저장
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idx = $_POST['idx'];
    $comment = $_POST['comment'];
    $name = '관리자'; // 임시로 관리자 이름 사용

    $sql = "INSERT INTO qna_comment (idx, name, comment, regdate) VALUES ('$idx', '$name', '$comment', NOW())";
    $result = $mysqli->query($sql);

    // 답변 상태 업데이트
    $sql = "UPDATE qna SET reply = '답변' WHERE idx = '$idx'";
    $result = $mysqli->query($sql);

    header("Location: qna_detail.php?id=$idx");
    exit;
}
?>