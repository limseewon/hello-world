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
    $name = $_SESSION['UID']; // 로그인한 사용자의 ID

    // 리뷰 데이터 저장
    $sql = "INSERT INTO review (cid, name, content, rating, date, hit, view) VALUES (?, ?, ?, ?, NOW(), 0, 0)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("issi", $cid, $name, $content, $rating);
    
    if ($stmt->execute()) {
        echo "<script>alert('리뷰가 등록되었습니다.');</script>";
        $stmt->close();
        $mysqli->close();
        header("Location: course_list.php?cid=$cid"); // 강의 상세 페이지로 리디렉션
        exit;
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $mysqli->close();
    }
}
?>