<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$mid = $_POST['mid'];
// $mid = 6;


if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}

// $sql = "SELECT * FROM members where mid='{$mid}'";
// $sql = "SELECT mb.*, c.coupon_name, c.coupon_price,c.coupon_ratio,uc.use_max_date, uc.status as coupon_status FROM members mb JOIN user_coupons uc ON mb.userid = uc.userid JOIN coupons c ON uc.couponid = c.cid WHERE mb.mid = '{$mid}'";
$sql = "SELECT mb.*, c.cp_name, c.cp_price, c.cp_ratio, uc.use_max_date, uc.status as cp_status 
        FROM members mb 
        LEFT JOIN user_coupons uc ON mb.userid = uc.userid 
        LEFT JOIN coupons c ON uc.couponid = c.cpid 
        WHERE mb.mid = '{$mid}'";

$result = $mysqli -> query($sql);
while($row = $result -> fetch_object() ){
  $modalArr[] = $row;
}
$courseSql = "SELECT c.name FROM ordered_courses oc JOIN courses c ON oc.course_id=c.cid WHERE member_id='{$mid}';";

$courseResult = $mysqli -> query($courseSql);
while($courseRow = $courseResult -> fetch_object() ){
  $courseArr[] = $courseRow;
}

$modalData = [$modalArr ,$courseArr];

if($result){      
  $data = array('result' => $modalData);
        
} else {
  $data = array('result' => 'fail');
}     
echo json_encode($data);
?>