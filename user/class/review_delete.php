<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (isset($_GET['cid']) && isset($_GET['idx'])) {
    $cid = $mysqli->real_escape_string($_GET['cid']);
    $idx = $mysqli->real_escape_string($_GET['idx']);

    $sql = "DELETE FROM review WHERE idx = ? AND cid = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", $idx, $cid);

    if ($stmt->execute()) {
        echo "리뷰가 삭제되었습니다.";
        header("Location: course_view.php?cid=$cid");
        exit;
    } else {
        echo "리뷰 삭제에 실패했습니다.";
    }

    $stmt->close();
}
?>