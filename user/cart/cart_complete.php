<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$course_id = $_POST['cid'];
$member_id = $_POST['mid'] ?? '';

$total =  $_POST['total'];

if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}
// 사용자가 로그인되어 있다면 세션에서 사용자 ID (UID)를 가져오고 세션 ID (ssid)를 빈 문자열로 설정
// 로그인되어 있지 않다면 세션 ID를 생성하고 사용자 ID는 빈 문자열로 설정

$sql = "INSERT INTO ordered_courses (course_id,member_id,total_price,regdate) VALUES ('{$course_id}','{$member_id}',{$total_price},now())";

$result = $mysqli -> query($sql);
$qs = $result -> fetch_object();

$total_price = explode(",", $qs->course_file);
echo $total_price;



?>

<div class="cart_completef">
  <h2 class="main_tt">결제가 완료되었습니다.</h2>
  
  <img src="../img/logo_icon.png" alt="로고">
   <div class="home2_box d-flex home2bottom">
    <a href="" class="btn btn-primary dark mt-3 home2_a">홈으로</a>
    <a href="" class="btn btn-primary dark mt-3 home2_b">수강목록</a>
   </div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>