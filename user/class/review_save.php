<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

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

    if ($stmt->execute()) {
        echo "리뷰가 등록되었습니다.";
        header("Location: class_view.php?cid=$cid");
        exit;
    } else {
        echo "리뷰 등록에 실패했습니다.";
    }

    $stmt->close();
}
?>