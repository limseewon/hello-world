<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $mysqli->real_escape_string($_POST['cid']);
    $name = $mysqli->real_escape_string($_POST['name']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);
    $rating = $mysqli->real_escape_string($_POST['rating']);

    $sql = "INSERT INTO review (cid, name, title, content, rating, date) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isssi", $cid, $name, $title, $content, $rating);

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