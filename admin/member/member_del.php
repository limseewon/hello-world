<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$mid = $_POST['mid'];

if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}

$sql = "DELETE FROM members WHERE mid='{$mid}';";
$result = $mysqli -> query($sql);

if($result){      
  $data = array('result' => 'ok');
        
} else {
  $data = array('result' => 'fail');
}     

echo json_encode($data);



?>