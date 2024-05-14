<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $cid = $_POST['cid'];
    $lecture_name = $_POST['lecture_name'];
    $content = urldecode($_POST['content']);
    $name = $_POST['name']; // 임시로 관리자 이름 사용
    $reply = '미답변';
    $file = $_FILES['files']['name'];

    // 파일 업로드 처리
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/uploads/';
    $upload_file = $upload_dir . basename($file);
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);

    $sql = "INSERT INTO qna (name, title, cid ,lecture_name, content, reply, files, regdate) VALUES ('$name', '$title', '$cid','$lecture_name', '$content', '$reply', '$file', NOW())";
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