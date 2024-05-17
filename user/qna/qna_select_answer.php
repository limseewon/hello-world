<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// GET 파라미터 받기
$comment_id = $_GET['comment_id'];
$qna_id = $_GET['id'];

// qna 테이블의 selected_comment_id 컬럼 업데이트
$sql = "UPDATE qna SET selected_comment_id = '$comment_id' WHERE idx = '$qna_id'";
$result = $mysqli->query($sql);

if ($result) {
    // 업데이트 성공 시 처리할 로직 작성
    // 예: 상세 페이지로 리디렉션
    header("Location: qna_detail.php?id=$qna_id");
    exit;
} else {
    // 업데이트 실패 시 처리할 로직 작성
    echo "답변 선택에 실패했습니다. 다시 시도해주세요.";
}

// 데이터베이스 연결 종료
$mysqli->close();
?>