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
$image = null;

// 이미지 파일 처리
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image']['name'];
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/announce/uploads/'; // 이미지 저장 경로
    $targetFile = $targetDir . basename($image);
    
    // 파일 크기 검사
    if ($_FILES['image']['size'] > 102400000) {
        echo "<script> alert('100MB 이하만 업로드해주세요'); history.back(); </script>";
        exit;
    }
    
    // 파일 확장자 검사
    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<script> alert('이미지 파일(jpg, jpeg, png, gif)만 업로드 가능합니다.'); history.back(); </script>";
        exit;
    }
    
    // 파일명 변경
    $newfilename = date("YmdHis") . substr(rand(), 0, 6) . '.' . $ext;
    $image = $newfilename;
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $image)) {
        // 이미지 업로드 성공
    } else {
        echo "<script> alert('이미지 파일 업로드에 실패했습니다. 관리자에게 문의해주세요'); history.back(); </script>";
        exit;
    }
}

// 첨부 파일 처리
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['file']['name'];
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/helloworld/announce/uploads/'; // 파일 저장 경로
    $targetFile = $targetDir . basename($file);
    
    // 파일 크기 검사
    if ($_FILES['file']['size'] > 102400000) {
        echo "<script> alert('100MB 이하만 업로드해주세요'); history.back(); </script>";
        exit;
    }
    
    // 파일명 변경
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $newfilename = date("YmdHis") . substr(rand(), 0, 6) . '.' . $ext;
    $file = $newfilename;
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetDir . $file)) {
        // 파일 업로드 성공
    } else {
        echo "<script> alert('파일 업로드에 실패했습니다. 관리자에게 문의해주세요'); history.back(); </script>";
        exit;
    }
}

// 공지사항 데이터 삽입
$sql = "INSERT INTO notice (title, name, content, regdate, file, image) VALUES ('$title', '$name', '$content', '$regdate', '$file', '$image')";
$result = $mysqli->query($sql);

if ($result) {
    echo "<script>alert('공지사항이 등록되었습니다.'); location.href='announce.php'; </script>";
} else {
    echo "<script>alert('공지사항 등록에 실패했습니다.'); history.back();</script>";
}
?>