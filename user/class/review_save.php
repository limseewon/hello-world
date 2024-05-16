<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (!isset($_SESSION['UID'])) {
    echo '<script>alert("로그인 후 이용 가능합니다."); location.href = "/helloworld/user/login.php";</script>';
    exit;
}

// 폼 데이터 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['cid'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];
    $name = $_SESSION['UID']; // 로그인한 사용자 이름

    // 리뷰 데이터 저장
    $sql = "INSERT INTO review (cid, name, title, content, rating, date, hit, view) VALUES (?, ?, '', ?, ?, NOW(), 0, 0)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("issi", $cid, $name, $content, $rating);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('리뷰가 등록되었습니다.'); location.href='course_list.php'</script>";
    exit;
}
?>