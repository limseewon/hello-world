<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 세션에서 UID를 가져옴
$uid = $_SESSION['UID'];

// SQL 쿼리를 변수에 할당하여 회원의 member_id를 가져옴
$sql = "SELECT mid FROM members WHERE userid = '$uid'";
echo $sql;
$result = $mysqli->query($sql);
$row = $result->fetch_object();
$member_id = $row->mid;

// URL에서 강의 ID를 가져옴
$cid = $_GET['cid'];

// 세션에 UID가 있는지 확인
if(isset($_SESSION['UID'])) {
  // 이미 주문된 강의를 확인하는 쿼리 실행
  $sqluc2 = "SELECT * FROM ordered_courses WHERE course_id = $cid AND member_id = '$member_id'";
  $result3 = $mysqli->query($sqluc2);
  $rscuc2 = $result3->fetch_object();

  // 이미 주문된 강의가 없으면, 새로운 주문을 추가
  if(!$rscuc2) {
    $sql = "INSERT INTO ordered_courses (course_id, member_id) VALUES ('{$cid}', '{$member_id}')";
    $result = $mysqli->query($sql);
  
    // 주문이 성공적으로 추가되면 알림을 띄우고 이전 페이지로 이동
    if ($result) {
      echo '<script>alert("강의가 구매되었습니다."); //history.back();</script>';
    } else {
      // 주문이 실패하면 이전 페이지로 이동
      echo "<script>//history.back();</script>";
    }
  } else {
    // 이미 주문된 강의가 있으면 알림을 띄우고 이전 페이지로 이동
    echo "<script>alert('이미 구매한 강좌입니다.'); //history.back();</script>";
  }
} else {
  // 세션에 UID가 없으면 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.'); //location.href = '/helloworld/index.php';</script>";
}
?>