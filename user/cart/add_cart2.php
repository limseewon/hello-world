<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php'; // 데이터베이스 연결 정보와 같은 중요한 설정이 담긴 파일


//세션에 UID가 있어야 장바구니 담기 가능
if (isset($_SESSION['UID'])) { // 코드 블록에서 $_SESSION['UID']가 설정되어 있는지 확인. 만약 세션에 사용자 ID가 설정되어 있다면, 즉 사용자가 로그인한 상태라면 아래의 코드 블록을 실행
  $uid = $_SESSION['UID'];
  $cid = $_GET['cid']; // 세션에 저장된 사용자 ID($uid)와 GET 요청으로 받은 강의 ID($cid)를 사용하여 데이터베이스에서 해당 강의를 장바구니에 담았는지 확인

  $sqluc = "SELECT * FROM cart where cid=$cid and userid='$uid'"; 
  $result3 = $mysqli -> query($sqluc);
  while($rs = $result3->fetch_object()){
    $rscuc[]=$rs;
  }
  // $sqluc 쿼리를 사용하여 해당 사용자가 이미 해당 강의를 장바구니에 담았는지 확인

  if(!isset($rscuc)){ // 결과가 없다면(!isset($rscuc)), 장바구니에 해당 강의를 추가하는 쿼리를 실행
    // 쿼리의 결과에 따라 성공 또는 실패 메시지를 출력
    $sql = "INSERT INTO cart (cid, userid) VALUES ('{$cid}', '{$uid}')";
    $result = $mysqli->query($sql);
  
    if (isset($result)) {
      echo "<script>alert('강의가 장바구니에 담겼습니다. 구매 페이지로 이동합니다.');
      location.href = '/helloworld/user/cart/cart.php';
      </script>";
    } else {
      echo "<script>history.back();</script>";
    }
  } else{
    echo "<script>alert('이미 장바구니에 담겨있는 강의입니다. 구매 페이지로 이동합니다.');location.href = '/helloworld/user/cart/cart.php';</script>";
  }
} else {
  //UID 없다면, 로그인 페이지로 이동
  echo "<script>alert('로그인이 필요합니다.');
        location.href = '/helloworld/index.php';
        </script>";
}

?>