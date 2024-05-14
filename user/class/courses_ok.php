<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

/*
userid로 member_id 확인
SELECT mid FROM members WHERE userid = $user_id
쿼리실행, object
$member_id 
cid = cid
*/
$user_id = $_SESSION['UID'];

// SQL 쿼리를 변수에 할당
$sql = "SELECT mid FROM members WHERE userid = $user_id";

// 쿼리 실행
$result = $mysqli->query($sql);

// 결과를 객체로 가져오기
$row = $result->fetch_object();

// 객체에서 'mid' 값을 가져와 변수에 할당
$member_id = $row->mid;
$cid = cid
//세션에 UID가 있어야 오더코스에 담기 가능
if (isset($_SESSION['UID'])) {
  $uid = $_SESSION['UID'];
  $cid = $_GET['cid'];

  $sqluc = "SELECT * FROM ordered_courses where courser_id=$cid and memeber_id='$member_id '";
  $result3 = $mysqli -> query($sqluc);
  while($rs = $result3->fetch_object()){
    $rscuc[]=$rs;
  }

  if(!isset($rscuc)){

    $sql = "INSERT INTO ordered_courses (courser_id, memeber_id) VALUES ('{$cid}', '{$member_id }')";
    $result = $mysqli->query($sql);
  
    if (isset($result)) {
      echo '<script>alert("강의가 구매 되었습니다.");
            history.back();
            </script>';
    } else {
      echo "<script>history.back();</script>";
    }
  } else{
    echo "<script>alert('이미 구매한 강좌입니다.');history.back();</script>";
  }
} else {
  //UID 없다면, 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.');
       // location.href = 'helloworld/user/index.php';
        </script>";
}

?>
 