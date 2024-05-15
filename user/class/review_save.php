<?php
// 데이터베이스 연결 정보
$servername = "localhost";
$username = "사용자명";
$password = "비밀번호";
$dbname = "데이터베이스명";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 폼 데이터 수신
$cid = $_POST['cid'];
$name = "작성자"; 
$title = ""; 
$content = $_POST['content'];

// 수강평 데이터 삽입 쿼리
$sql = "INSERT INTO review (cid, name, title, content, hit, view, date) VALUES ('$cid', '$name', '$title', '$content', '$hit', '$view', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "수강평이 성공적으로 등록되었습니다.";
} else {
    echo "수강평 등록 실패: " . $conn->error;
}

$conn->close();
?>