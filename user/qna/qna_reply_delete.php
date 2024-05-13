<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 질문 ID와 댓글 ID 받아오기
$qna_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$comment_id = isset($_GET['comment_id']) ? intval($_GET['comment_id']) : 0;

// 댓글 삭제
if ($qna_id > 0 && $comment_id > 0) {
    $sql = "DELETE FROM qna_comment WHERE id = $comment_id AND idx = $qna_id";
    $result = $mysqli->query($sql);

    // 답변 상태 업데이트
    $sql = "SELECT COUNT(*) AS count FROM qna_comment WHERE idx = $qna_id";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $comment_count = $row['count'];

    $reply_status = $comment_count > 0 ? '답변' : '미답변';
    $sql = "UPDATE qna SET reply = '$reply_status' WHERE idx = $qna_id";
    $result = $mysqli->query($sql);
}

header("Location: qna_detail.php?id=$qna_id");
exit;
?>