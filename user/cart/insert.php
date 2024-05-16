<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';



  $cartid = $_POST['cartid'];
  $userid = $_POST['userid'];
  $cpid = $_POST['cpid']??'';

  // POST 요청으로부터 장바구니 아이디, 사용자 아이디, 쿠폰 아이디를 받아옴

 

  $i=0;
  foreach($cartid as $ctid){ // 장바구니에 담긴 각각의 강의 ID($cartid)에 대해 반복
    $sql = "SELECT c.cid,c.name,c.cate FROM cart ct
            JOIN courses c ON c.cid = ct.cid
            WHERE ct.cartid = $ctid";

            // 해당 장바구니 아이템의 강의 정보를 가져오기 위한 SQL 쿼리
            // 장바구니 테이블(cart)과 강의 테이블(courses)을 조인하고, 해당 강의의 카테고리(cate), 강의 ID(cid), 그리고 강의명(name)을 선택
            // 장바구니 ID(cartid)와 강의 ID(cid)를 조건으로 사용하여 해당 강의를 선택
    $result = $mysqli->query($sql); // 쿼리를 실행하고 결과를 $result 변수에 저장
    $course = $result->fetch_object(); // 결과에서 한 행을 객체로 가져와 $course 변수에 저장합니다. 여기서 한 행은 해당 강의의 정보를 포함

    //소분류 추출
    $categoryText = $course->cate; // 변수에는 강의의 카테고리 텍스트가 저장. 해당 텍스트는 슬래시(/)로 구분된 카테고리 경로 
    $parts = explode('/', $categoryText); // explode() 함수를 사용하여 카테고리 경로를 슬래시(/)로 분할
    $catename = end($parts); //  end() 함수를 사용하여 마지막 요소(소분류)를 추출하여 $catename 변수에 저장
    //코드의 주요 목표는 장바구니에 담긴 각각의 강의에 대해 강의 정보와 소분류를 추출


   

    if($result2 === true){ // INSERT가 성공한 경우
    $return_data = array("result{$i}" => "success");  // 성공할 경우 "success"를, 실패할 경우 "error"와 에러 메시지를 반환
  } else { // INSERT가 실패한 경우
    $return_data = array("result{$i}" => "error", "message" => $mysqli->error);
  }
  $i++;

    //구매한 상품 삭제
    $sql3 = "DELETE from cart where cartid=$ctid";
    $result3 = $mysqli->query($sql3);

    if($cpid !== ''){  // 쿠폰 아이디가 존재하는 경우에는 해당 쿠폰을 사용처리
      //사용 쿠폰 삭제
      $sql4 = "UPDATE user_coupon SET uc_status = 0 where cpid=$cpid and userid='{$userid}'";
      $result4 = $mysqli -> query($sql4);
    }
}     //  쿠폰 테이블에서 사용된 쿠폰의 상태를 변경하는 SQL 쿼리를 실행
  echo json_encode($result);  // 처리 결과를 JSON 형식으로 반환
  exit;
    // 장바구니에서 선택된 강의들을 구매하고, 필요한 경우에는 사용된 쿠폰을 처리하는 기능을 구현
?> 