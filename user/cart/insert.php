<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';



  $cartid = $_POST['cartid'];
  
  $userid = $_POST['userid'];
  $cpid = $_POST['cpid']??'';

 

  $i=0;
  foreach($cartid as $ctid){
    $sql = "SELECT c.cid,c.name,c.cate FROM cart ct
            JOIN courses c ON c.cid = ct.cid
            WHERE ct.cartid = $ctid";
    $result = $mysqli->query($sql);
    $course = $result->fetch_object();

    //소분류 추출
    $categoryText = $course->cate;
    $parts = explode('/', $categoryText);
    $catename = end($parts);


   

    if($result2 === true){ // INSERT가 성공한 경우
    $return_data = array("result{$i}" => "success");
  } else { // INSERT가 실패한 경우
    $return_data = array("result{$i}" => "error", "message" => $mysqli->error);
  }
  $i++;

    //구매한 상품 삭제
    $sql3 = "DELETE from cart where cartid=$ctid";
    $result3 = $mysqli->query($sql3);

    if($cpid !== ''){
      //사용 쿠폰 삭제
      $sql4 = "UPDATE user_coupon SET uc_status = 0 where cpid=$cpid and userid='{$userid}'";
      $result4 = $mysqli -> query($sql4);
    }
}
  echo json_encode($result);
  exit;

?>