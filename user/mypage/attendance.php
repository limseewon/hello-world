<?php
header('Content-Type: application/json');
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 이벤트 데이터를 저장할 배열
$events = array();
$userid = $_SESSION['UID'];

// 데이터베이스에서 이벤트 데이터를 가져오는 쿼리
$sql = "SELECT * FROM attendance WHERE userid = '{$userid}'";
$result = $mysqli->query($sql);

// 결과 처리
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $events[] = array(
      'start' => $row['login_date'],
      'end' => $row['login_date'],
      'display' => 'background',
      'backgroundColor' => 'green'
    );
  }
}

// JSON 형식으로 반환
echo json_encode($events);

// 연결 종료
$mysqli->close();
?>
