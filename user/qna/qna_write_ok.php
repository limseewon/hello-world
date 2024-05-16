<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $mysqli->real_escape_string($_POST['title']);
    $cid = $mysqli->real_escape_string($_POST['lecture_name']);
    $content = $mysqli->real_escape_string(urldecode($_POST['contents']));
    $name = $mysqli->real_escape_string($_POST['name']);
    $reply = '미답변';
    $file = '';

    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $file = $mysqli->real_escape_string($_FILES['file']['name']);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/uploads/';
        $upload_file = $upload_dir . basename($file);
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
    }

    // 선택한 강의 이름 가져오기
    $courseSql = "SELECT name FROM courses WHERE cid = ?";
    $stmt = $mysqli->prepare($courseSql);
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $lecture_name = $row['name'];
    $stmt->close();

    $sql = "INSERT INTO qna (name, title, cid, lecture_name, content, reply, files, date, view) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), 0)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssissss", $name, $title, $cid, $lecture_name, $content, $reply, $file);
    $result = $stmt->execute();
    $stmt->close();

    if ($result) {
        echo "질문이 등록되었습니다.";
        header("Location: qna.php");
        exit;
    } else {
        echo "질문 등록에 실패했습니다.";
    }
}
?>