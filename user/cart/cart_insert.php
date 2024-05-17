<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$course_id = $_POST['pid'];
$member_id = $_POST['optname'] ?? '';

$total =  $_POST['total'];

if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}

//cid 장바구니 중복체크
$sql = "SELECT COUNT(*) AS cnt FROM cart WHERE cid = '{$cid}' AND (userid = '{$userid}' or ssid='{$ssid}')";
$result = $mysqli -> query($sql);
$row = $result -> fetch_object(); // $row->cnt

if($result){    
    if($row->cnt > 0){
        $data = array('result' => '중복');
        echo json_encode($data);
    }else {
        $cartsql = "INSERT INTO cart (cartid,cid,userid,regdate,) VALUES (
            {$cartid},
            '{$cid}',
            '{$userid}',
            '{$regdate}'
            
           
            now()
        )";
        
        $cartresult = $mysqli -> query($cartsql);
        if($cartresult){
            $data = array('result' => 'ok');
        } else{
            $data = array('result' => 'fail');
        }
        echo json_encode($data);
    }
}       




?>