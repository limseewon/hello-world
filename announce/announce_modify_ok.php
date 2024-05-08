<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 수정할 공지사항의 ID 받아오기
$notice_id = $_POST['notice_id'];

// 제목과 본문 내용, 파일 데이터를 받아옴
$title = $_POST['title'];
$content = rawurldecode($_POST['contents']);
$name = $_POST['name'];

// 현재 날짜 및 시간 가져오기
$regdate = date("Y-m-d H:i:s");

// 파일 업로드 처리
$file = null;
$is_img = 0;

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

// 공지사항 데이터 수정
if ($file != null) {
    $sql = "UPDATE notice SET title='$title', name='$name', content='$content', regdate='$regdate', file='$file', is_img='$is_img' WHERE idx=$notice_id";
} else {
    $sql = "UPDATE notice SET title='$title', name='$name', content='$content', regdate='$regdate' WHERE idx=$notice_id";
}

if ($mysqli->query($sql) === true) {
    echo "<script>alert('공지사항이 수정되었습니다.'); location.href='announce.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
    echo "<script>alert('공지사항 수정에 실패했습니다.'); history.back();</script>";
}

$mysqli->close();
?>