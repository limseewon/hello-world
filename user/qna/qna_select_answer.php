<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qna_id = $_POST['qna_id'];
    $comment_id = $_POST['comment_id'];

    // 답변 상태 업데이트 쿼리 실행
    $sql = "UPDATE qna SET reply = '답변' WHERE idx = '$qna_id'";
    $result = $mysqli->query($sql);

    if ($result) {
        // 채택된 답변 표시 쿼리 실행
        $sql = "UPDATE qna_comment SET selected = 1 WHERE id = '$comment_id'";
        $mysqli->query($sql);

        echo "success";
    } else {
        echo "error";
    }
}
?>