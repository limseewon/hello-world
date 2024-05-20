<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$userid = $_POST['userid'];
$pid = $_POST['pid'];
$grand_total = $_POST['grand_total'];
$ucid = $_POST['coupon']??'';

$sql = "INSERT INTO ordered_courses (course_id,member_id,total_price,regdate) VALUES ('{$course_id}','{$member_id}',{$grand_total},now())";
$result = $mysqli -> query($sql);
echo $sql;


if(isset($ucid) && $ucid !==''){
    $sql = "UPDATE user_coupons SET status = -1 WHERE ucid = $ucid";
    $mysqli -> query($sql);
}
//카트비우기
$delsql = "DELETE FROM cart WHERE userid = '{$userid}'";
$delresult = $mysqli -> query($delsql);

if($result){
    echo "<script>
        alert('주문이 완료되었습니다.');
        location.href = '/helloworld/index.php';
    </script>";
}