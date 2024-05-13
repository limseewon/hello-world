<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 제목, 내용, 이름 데이터 받아오기
$title = $_POST['title'];
$content = rawurldecode($_POST['contents']);
$name = $_POST['name'];
$regdate = date("Y-m-d H:i:s");

// 파일 업로드 처리
$file = null;
$is_img = 0;

// 이미지 파일 처리
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image']['name'];
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/upload/'; // 이미지 저장 경로
    $targetFile = $targetDir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $is_img = 1; // 이미지가 성공적으로 업로드되면 is_img 값을 1로 설정
    }
}


if ($_FILES['file']['size'] > 0) {
    if ($_FILES['file']['size'] > 102400000) {
        echo "<script> alert('100MB 이하만 업로드해주세요'); history.back(); </script>";
        exit;
    }

    if (strpos($_FILES['file']['type'], 'image') === true) {
        $is_img = 1;
    }

    $save_dir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/announce/uploads/';
    $filename = $_FILES["file"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = date("YmdHis") . substr(rand(), 0, 6);
    $savefile = $newfilename . '.' . $ext;
    $file = $save_dir . $savefile;

    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
        echo "<script> alert('파일 등록에 실패했습니다. 관리자에게 문의해주세요'); history.back(); </script>";
        exit;
    }
}

// 공지사항 데이터 삽입
$sql = "INSERT INTO notice (title, name, content, regdate, file, is_img) VALUES ('$title', '$name', '$content', '$regdate', '$file', '$is_img')";
$result = $mysqli->query($sql);

if ($result) {
    echo "<script>alert('공지사항이 등록되었습니다.'); location.href='announce.php'; </script>";
} else {
    echo "<script>alert('공지사항 등록에 실패했습니다.'); history.back();</script>";
}
?>