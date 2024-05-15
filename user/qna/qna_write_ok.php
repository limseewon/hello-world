<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $title = $_POST['title'];
//     $cid = isset($_POST['cid']) ? $_POST['cid'] : '';
//     $lecture_name = isset($_POST['lecture_name']) ? $_POST['lecture_name'] : '';
//     $content = isset($_POST['content']) ? urldecode($_POST['content']) : '';
//     $name = isset($_POST['name']) ? $_POST['name'] : '';
//     $reply = '미답변';
//     $file = $_FILES['files']['name'];
//     $date = date("Y-m-d H:i:s");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $mysqli->real_escape_string($_POST['title']);
    $cid = $mysqli->real_escape_string($_POST['cid']);
    $lecture_name = $mysqli->real_escape_string($_POST['lecture_name']); // 이 부분 추가
    $content = $mysqli->real_escape_string(urldecode($_POST['contents']));
    $name = '사용자 이름'; // 실제 사용자 이름으로 변경해야 합니다.
    $reply = '미답변';
    $file = $mysqli->real_escape_string($_FILES['file']['name']);

    // 파일 업로드 처리
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/uploads/';
    $upload_file = $upload_dir . basename($file);
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);

    $sql = "INSERT INTO qna (name, title, cid ,lecture_name, content, reply, files, date) VALUES ('$name', '$title', '$cid','$lecture_name', '$content', '$reply', '$file', NOW())";
    $result = $mysqli->query($sql);

    if ($result) {
        echo "질문이 등록되었습니다.";
        header("Location: qna.php");
        exit;
    } else {
        echo "질문 등록에 실패했습니다.";
    }
}
?>