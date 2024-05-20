<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 로그인 여부 확인
if (!isset($_SESSION['UID'])) {
    echo '<script>alert("로그인 후 이용 가능합니다."); location.href = "/helloworld/user/login.php";</script>';
    exit;
}

// GET 파라미터 확인
if (isset($_GET['cid']) && isset($_GET['idx'])) {
    $cid = $_GET['cid'];
    $idx = $_GET['idx'];

    // 해당 수강평이 로그인한 사용자의 수강평인지 확인
    $sql = "SELECT user_id FROM review WHERE idx = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $idx);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['user_id'];

        if ($userId == $_SESSION['UID']) {
            // 수강평 삭제
            $deleteSql = "DELETE FROM review WHERE idx = ?";
            $stmt = $mysqli->prepare($deleteSql);
            $stmt->bind_param("i", $idx);
            $stmt->execute();

            echo "<script>alert('수강평이 삭제되었습니다.'); location.href = 'course_view.php?cid=$cid';</script>";
        } else {
            echo "<script>alert('본인의 수강평만 삭제할 수 있습니다.'); history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('잘못된 접근입니다.'); history.go(-1);</script>";
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "<script>alert('잘못된 접근입니다.'); history.go(-1);</script>";
}
?>