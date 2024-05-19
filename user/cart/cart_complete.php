<?php
$title = '결제완료';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/common.css"/>';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/class/cart.css"/>';
$cssRoute3 ='';
$cssRoute4 ='';

$script1='';
$script2 = '';
$script3 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';



  // Post방식으로 넘어온 값들 변수에 할당
  $pid = $_POST['pid'];
  $pidstr = implode(',', $pid);

  $cartid = $_POST['cartid'];
  $cartidstr = implode(',', $cartid);

  $userid = $_POST['userid'];
  $total = $_POST['totalprice'];  

  //ordered_coused에는 userid가 아니라 member_id가 들어가게 설계되어 있네 왜!흠. 일단 members테이블에서 userid로 memberid 조회
  $msql =  "SELECT mid FROM members WHERE userid='{$userid}'";
  $mresult = $mysqli->query($msql);
  $mresultRow = $mresult->fetch_object();
  $mid = $mresultRow ->mid;


  $sql = "INSERT into ordered_courses
  (course_id,member_id,total_price,regdate) values
  ('{$pidstr}','{$mid}',{$total}, now())
    ";
$result = $mysqli -> query($sql);

if($result === true){ // INSERT가 성공한 경우

//구매한 상품 삭제
$sql2 = "DELETE from cart where cartid IN({$cartidstr})";
$result2 = $mysqli->query($sql2);
?>

<div class="cart_completef">
  <h2 class="main_tt">결제가 완료되었습니다.</h2>
  
  <img src="../img/logo_icon.png" alt="로고">
   <div class="home2_box d-flex home2bottom">
    <a href="/helloworld/index.php" class="btn btn-primary dark mt-3 home2_a">홈으로</a>
    <a href="/helloworld/user/mypage/courses.php" class="btn btn-primary dark mt-3 home2_b">수강목록</a>
   </div>
</div>

<?php
} else { // INSERT가 실패한 경우
?>
<div class="cart_completef">
  <h2 class="main_tt">결제가 실패했습니다.</h2>
  
  <img src="../img/logo_icon.png" alt="로고">
   <div class="home2_box d-flex home2bottom">
    <a href="" class="btn btn-primary dark mt-3 home2_a">홈으로</a>
   </div>
</div>
<?php
}
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>