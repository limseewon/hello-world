<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// 세션에서 UID를 가져옴
$uid = $_SESSION['UID'];

// SQL 쿼리를 변수에 할당하여 회원의 member_id를 가져옴
$sql = "SELECT mid FROM members WHERE userid = '$uid'";
// echo $sql;
$result = $mysqli->query($sql);
$row = $result->fetch_object();
$member_id = $row->mid;
$totalprice = $_POST['total']??null; // POST 요청에서 총 가격(totalprice)을 가져옴

// URL에서 강의 ID를 가져옴
$cid = $_REQUEST['cid'];
$sql = "SELECT price,due FROM courses WHERE cid = $cid"; // SQL 쿼리를 사용하여 해당 강의 ID에 해당하는 강의의 가격을 가져옴
// echo $sql;
$result = $mysqli->query($sql);
$row = $result->fetch_object();
$price = $row->price;
$total = isset($totalprice) ? $totalprice : $price; // 총 가격(totalprice)이 설정되어 있는지 확인  설정되어 있으면 해당 값을 사용 그렇지 않으면 강의의 가격을 사용하여 총 가격을 설정

$due = $row->due;
echo 'due : '.$due;
if ($due =='무제한') {
  $due = 9999;
} else {
  $due = preg_replace('/[^0-9]/', '', $due);
}
$date = new DateTime();
$date->modify('+'.$due.' month'); //현재 날짜의 n달 후 기한 구하기
$limit = $date->format('Y-m-d');


// 세션에 UID가 있는지 확인
if(isset($_SESSION['UID'])) {
  // 이미 주문된 강의를 확인하는 쿼리 실행
  $sqluc2 = "SELECT * FROM ordered_courses WHERE course_id = $cid AND member_id = '$member_id'";
  $result3 = $mysqli->query($sqluc2);
  $rscuc2 = $result3->fetch_object();

  // 이미 주문된 강의가 없으면, 새로운 주문을 추가
  if(!$rscuc2) {
    // 구매시 ordered_courses가 업데이트되는 구문을 수정했습니다. cart페이지에서 구매 시에도 동일하게 업데이트되도록 수정해주세요.
    $sql = "INSERT INTO ordered_courses (course_id, member_id ,progress, satisfaction, regdate, total_price ,use_max_date) VALUES ({$cid}, '{$member_id}', 0, '4.3',CURDATE() ,{$total},'{$limit}')";
    echo $sql;
    $result = $mysqli->query($sql);
  
    // 주문이 성공적으로 추가되면 알림을 띄우고 구매 페이지로 이동
    if ($result) {
      echo "<script>alert('강의가 구매되었습니다.'); location.href = '/helloworld/user/cart/cart_complete.php';</script>";
    } else {
      // 주문이 실패하면 이전 페이지로 이동
      echo "<script>history.back();</script>";
    }
  } else {
    // 이미 주문된 강의가 있으면 알림을 띄우고 이전 페이지로 이동
    echo "<script>alert('이미 구매한 강좌입니다.'); history.back();</script>";
  }
} else {
  // 세션에 UID가 없으면 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.'); location.href = '/helloworld/index.php';</script>";
}
?>