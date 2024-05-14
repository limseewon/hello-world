<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';


$sql = "INSERT INTO cart (cartid, pid) VALUES ('{$cid}', '{$uid}')";
$result = $mysqli->query($sql);

//세션에 UID가 있어야 오더코스에 담기 가능
if (isset($_SESSION['UID'])) {
  $uid = $_SESSION['UID'];
  $cid = $_GET['cid'];

  $sqluc = "SELECT * FROM ordered_courses where ocid=$ocid and course_id='$uid'";
  $result3 = $mysqli -> query($sqluc);
  while($rs = $result3->fetch_object()){
    $rscuc[]=$rs;
  }

  if(!isset($rscuc)){

    $sql = "INSERT INTO ordered_courses (ocid, course_id, member_id, progress, satisfaction, regdate) 
    VALUES ('{$ocid}', '{$course_id}', '{$member_id}', '{$progress}', '{$satisfaction}', '{$regdate}')";
    $result = $mysqli->query($sql);
  
    if (isset($result)) {
      echo '<script>alert("강의가 구매 되었습니다.");
            history.back();
            </script>';
    } else {
      echo "<script>history.back();</script>";
    }
  } else{
    echo "<script>alert('이미 장바구니에 담겨있습니다.');history.back();</script>";
  }
} else {
  //UID 없다면, 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.');
          function clickLoginButton() {
           
        }
        clickLoginButton();
       // location.href = '';
        </script>";
}

?>
 document.getElementById("login-btn").click();