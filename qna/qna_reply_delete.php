<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];

    // 댓글이 속한 질문의 ID 가져오기
    $sql = "SELECT idx FROM qna_comment WHERE id = '$comment_id'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $qna_id = $row['idx'];

    // 댓글 삭제 쿼리 실행
    $sql = "DELETE FROM qna_comment WHERE id = '$comment_id'";
    $result = $mysqli->query($sql);

    if ($result) {
        // 댓글 개수 확인
        $sql = "SELECT COUNT(*) AS count FROM qna_comment WHERE idx = '$qna_id'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        $commentCount = $row['count'];

        // 댓글 개수에 따라 reply 값 업데이트
        if ($commentCount > 0) {
            $updateSql = "UPDATE qna SET reply = '답변' WHERE idx = '$qna_id'";
        } else {
            $updateSql = "UPDATE qna SET reply = '미답변' WHERE idx = '$qna_id'";
        }
        $mysqli->query($updateSql);

        echo "<script>alert('댓글이 삭제되었습니다.'); location.href='qna_detail.php?id=$qna_id';</script>";
    } else {
        echo "<script>alert('댓글 삭제에 실패했습니다.'); history.back();</script>";
    }
}


// session_start();
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// if (isset($_GET['id'])) {
//   $comment_id = $_GET['id'];

//   // 댓글 삭제 쿼리 실행
//   $sql = "DELETE FROM qna_comment WHERE id = '$comment_id'";
//   $result = $mysqli->query($sql);

//   if ($result) {
//     echo "<script>alert('댓글이 삭제되었습니다.'); window.location.href = document.referrer;</script>";
//     exit;
//   } else {
//     echo "<script>alert('댓글 삭제에 실패했습니다.'); window.location.href = document.referrer;</script>";
//     exit;
//   }
// }


?>