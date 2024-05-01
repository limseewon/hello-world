<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$mid = $_POST['mid'];
$statusText = $_POST['statusText'];

if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}

if ($statusText == '휴면 전환') {
  $status = 0;
} else {
  $status = 1;
}

$sql = "UPDATE members
SET status = '{$status}'
WHERE mid='{$mid}'";

$result = $mysqli -> query($sql);

if($result){      
  $data = array('result' => 'ok');
        
} else {
  $data = array('result' => 'fail');
}     

echo json_encode($data);



?>