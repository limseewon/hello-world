<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (isset($_GET['cid']) && isset($_GET['idx'])) {
    $cid = $mysqli->real_escape_string($_GET['cid']);
    $idx = $mysqli->real_escape_string($_GET['idx']);
    $user_id = $_SESSION['UID']; // 로그인한 사용자의 ID

    // 리뷰 작성자 확인
    $checkSql = "SELECT * FROM review WHERE idx = ? AND cid = ? AND user_id = ?";
    $checkStmt = $mysqli->prepare($checkSql);
    $checkStmt->bind_param("iis", $idx, $cid, $user_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // 리뷰 삭제
        $sql = "DELETE FROM review WHERE idx = ? AND cid = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $idx, $cid);

        if ($stmt->execute()) {
            echo "<script>alert('리뷰가 삭제되었습니다.'); location.href='course_view.php?cid=$cid';</script>";
            exit;
        } else {
            echo "<script>alert('리뷰 삭제에 실패했습니다.'); history.back();</script>";
            exit;
        }

        $stmt->close();
    } else {
        echo "<script>alert('자신이 작성한 리뷰만 삭제할 수 있습니다.'); history.back();</script>";
        exit;
    }

    $checkStmt->close();
}
?>