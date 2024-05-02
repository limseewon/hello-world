<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qna_id = $_POST['id'];
    $comment = $_POST['comment'];
    
    // 댓글 저장 쿼리 실행
    $sql = "INSERT INTO qna_comment (qna_id, comment) VALUES ('$qna_id', '$comment')";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
?>