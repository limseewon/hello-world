<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qna_id = $_POST['id'];
    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $regdate = date('Y-m-d H:i:s'); // 현재 시간을 regdate로 설정

    // 댓글 저장 쿼리 실행
    $sql = "INSERT INTO qna_comment (qna_id, comment, name, regdate) VALUES ('$qna_id', '$comment', '$name', '$regdate')";
    if ($mysqli->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error: " . $mysqli->error;
    }
}
?>