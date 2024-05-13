<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idx = $_POST['idx'];
    $comment = $_POST['comment'];
    $name = '작성자'; // 작성자 이름을 적절히 설정해주세요.

    $sql = "INSERT INTO qna_comment (comment, name, idx) VALUES ('$comment', '$name', '$idx')";
    $result = $mysqli->query($sql);

    if ($result) {
        header("Location: qna_detail.php?id=$idx");
        exit;
    } else {
        echo "댓글 등록에 실패했습니다.";
    }
}
?>