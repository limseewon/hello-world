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

  // 세션에서 UID를 가져옴
  $userid = $_SESSION['UID'];

  // Post방식으로 넘어온 값들 변수에 할당
  $pid = $_REQUEST['pid'];
  // if (is_array($pid)) {
  $pidstr = implode(',', $pid);
  $pidArr = explode(',',$pidstr);

// } else {
  // $pidstr =  $pid;
// }
  $cartid = $_POST['cartid']??'';  
  $cartidstr = implode(',', $cartid);
  
  // 상품가격 조회
  $productSql = "SELECT due FROM courses WHERE cid in ({$pidstr})";
  // echo $productSql;
  $productResult = $mysqli->query($productSql);
  
  while ($productRS= $productResult->fetch_object()) {
    $due = $productRS->due;
    // echo 'due : '.$due;
    if ($due =='무제한') {
      $due = 9999;
    } else {
      $due = preg_replace('/[^0-9]/', '', $due);
    }
    $date = new DateTime();
    $date->modify('+'.$due.' month'); //현재 날짜의 n달 후 기한 구하기
    $limit[] = $date->format('Y-m-d');
  }
  
  // $price =$pricerow->price;
  
  
  $userid = $_POST['userid'] ?? $_SESSION['UID'];

  

  // $total = $_POST['totalprice']?? $price; 
  
  //ordered_coused에는 userid가 아니라 member_id가 들어가게 설계되어 있네 왜!흠. 일단 members테이블에서 userid로 memberid 조회
  $mid = $_SESSION['UIDX'];

  $successINfo = false;
  for ($i=0; $i < count($pidArr); $i++) {
    // echo 'pidArr : '.$pidArr[$i];
    // echo 'limitArr : '.$limit[$i];
    $checkSql = "SELECT oc.* , c.name FROM ordered_courses oc JOIN courses c ON oc.course_id=c.cid WHERE oc.course_id='{$pidArr[$i]}' AND oc.member_id = '{$mid}'";
    $checkResult = $mysqli->query($checkSql);
    $checkRs = $checkResult->fetch_object();
    
    if ($checkResult && $checkResult->num_rows > 0) {
      echo "<script>alert('{$checkRs->name}는 이미 구매한 강의입니다.');history.back()</script>";
      exit;
    } 
    // else {

    // }

    // $insertSql = "INSERT INTO ordered_courses (course_id, member_id ,progress, satisfaction,  regdate, use_max_date ) VALUES ('{$pidArr[$i]}', '{$mid}', 0, 0,CURDATE() ,'{$limit[$i]}')";
    // $result = $mysqli->query($insertSql);

    // if ($result) {
    //   $successINfo = true;
    // } else {
    //   $successINfo = false;
    //   break;
    // }
  }
  $values = array();
  $count = count($pidArr); 
  for ($i = 0; $i < $count; $i++) {
      $values[] = "('{$pidArr[$i]}', '{$mid}', 0, 0, CURDATE(), '{$limit[$i]}')";
  }

  $valuesList = implode(', ', $values);

  $sql = "INSERT INTO ordered_courses (course_id, member_id, progress, satisfaction, regdate, use_max_date)
          VALUES $valuesList";

  $result = $mysqli->query($sql);


  // $sql = "INSERT INTO ordered_courses (course_id, member_id ,progress,  regdate, use_max_date ) VALUES ('{$pidstr}', '{$mid}', 0, CURDATE() ,{$total})";
  // $result = $mysqli->query($sql);


//   $sql = "INSERT into ordered_courses
//   (course_id,member_id,total_price,regdate) values
//   ('{$pidstr}','{$mid}',{$total}, now())
//     ";
// $result = $mysqli -> query($sql);

if($result === true){ // INSERT가 성공한 경우

//구매한 상품 삭제
if(isset($cartid) && $cartid !=''){
  $sql2 = "DELETE from cart where cartid IN({$cartidstr})";
  $result2 = $mysqli->query($sql2);

  $sql3 = "DELETE from user_coupons where userid='{$userid}'";
  $result3 = $mysqli->query($sql3);
}

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