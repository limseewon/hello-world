<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$couponid = $_POST['couponid'];
$userid = $_SESSION['UID'];

// 중복 발급 여부 확인
$duplicateSql = "SELECT count(*) as cnt FROM user_coupons WHERE couponid='{$couponid}' AND userid='{$userid}'";
$dupliResult = $mysqli->query($duplicateSql);
$dupliRs = $dupliResult->fetch_object();
if ($dupliRs->cnt > 0) {
  $data = array('result' => 'duplicate');

} else {
  // 클릭한 쿠폰 정보 가져오기
  // $data = array('result' => 'test1');
  $getCouponSql = "SELECT * FROM coupons WHERE cpid='{$couponid}'";
  $getCouponResult= $mysqli->query($getCouponSql);
  $getCouponRs = $getCouponResult->fetch_object();


  $date = new DateTime();
  $date->modify('+'.$getCouponRs->cp_date.' month'); //현재 날짜의 n달 후 기한 구하기
  $limit = $date->format('Y-m-d');
  
  // 해당 유저에게 쿠폰 발급하기
  $issueCouponSql = "INSERT INTO user_coupons (couponid, userid, status, use_max_date, regdate, reason) 
  VALUES ('{$couponid}', '{$userid}', 1, '{$limit}', CURDATE(), '{$getCouponRs->cp_name}');";
  // $data = array('result' => $issueCouponSql);
  $issueResult = $mysqli->query($issueCouponSql);
  if ($issueResult) {
    $data = array('result' => 'ok');
  } else {
    $data = array('result' => 'fail');
  }
}

echo json_encode($data);

?>