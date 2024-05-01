<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 제목과 본문 내용, 파일 데이터를 받아옴
$title = $_POST['title'];
$content  = rawurldecode($_POST['contents']);
$name = $_POST['name']; // 이름 데이터 받아오기
$files = $_FILES['optionImage1'];

// 작성자 정보 가져오기 (로그인한 사용자 정보 또는 기본값 설정)
// $name = isset($_SESSION['username']) ? $_SESSION['username'] : '익명';

// 현재 날짜 및 시간 가져오기
$regdate = date("Y-m-d H:i:s");

// 공지사항 데이터 삽입
$sql = "INSERT INTO notice (title, name, content, regdate) VALUES ('$title', '$name', '$content', '$regdate')";
$result = $mysqli->query($sql);

if ($result === true) {
    echo "데이터가 성공적으로 저장되었습니다.";
    // 등록 후 리다이렉트 또는 다른 작업 수행
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

if ($result) {
    // 질문 삽입 성공 시, 파일 업로드 처리
    $qna_id = $mysqli->insert_id; // 생성된 질문 ID 가져오기

    // 파일 업로드 디렉토리 설정
    $upload_dir = './uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // 파일 업로드 처리
    foreach ($files['name'] as $key => $value) {
        $file_name = $files['name'][$key];
        $file_tmp = $files['tmp_name'][$key];
        $file_error = $files['error'][$key];

        if ($file_error == 0) {
            $file_destination = $upload_dir . $notice_id . '_' . $file_name;
            if (move_uploaded_file($file_tmp, $file_destination)) {
                // 파일 정보 데이터베이스에 저장
                $sql_file = "INSERT INTO notice_files (qna_id, file_name, file_path) VALUES ('$notice_id', '$file_name', '$file_destination')";
                $mysqli->query($sql_file);
            }
        }
    }

    echo "<script>alert('질문이 등록되었습니다.'); 
    // location.href='announce.php';
    </script>";
} else {
    echo "<script>alert('질문 등록에 실패했습니다.'); history.back();</script>";
}

$mysqli->close();
?>