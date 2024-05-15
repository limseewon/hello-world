<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 댓글 저장
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['UID'])) {
        // 로그인 여부 체크
        $idx = $_POST['idx'];
        $comment = $_POST['comment'];
        $userid = $_SESSION['UID'];

        // 현재 로그인한 회원의 이름 가져오기
        $sql = "SELECT username FROM members WHERE userid = '$userid'";
        $result = $mysqli->query($sql);
        $member = $result->fetch_assoc();
        $name = $member['username'];

        // 댓글 저장
        $sql = "INSERT INTO qna_comment (idx, name, comment) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iss", $idx, $name, $comment);
        $comment_result = $stmt->execute();

        // 댓글 등록 성공 시 qna 테이블의 reply 컬럼 업데이트
        if ($comment_result) {
            $sql = "UPDATE qna SET reply = '답변' WHERE idx = '$idx'";
            $update_result = $mysqli->query($sql);

            echo "<script> alert('댓글이 등록되었습니다.'); location.href = 'qna_detail.php?id=$idx'; </script>";
        } else {
            echo "<script> alert('댓글 등록에 실패했습니다.'); history.back(); </script>";
        }
    } else {
        echo "<script> alert('로그인 후 이용 가능합니다.'); history.back(); </script>";
    }
}
?>