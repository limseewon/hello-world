<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// $mid = $_POST['mid'];
$msgId= $_POST['msgId'];



$sql = "SELECT * FROM msg WHERE msgidx = '{$msgId}'";

$result = $mysqli -> query($sql);
$row = $result -> fetch_object();

if($result){      
  $data = array('result' => $row);
        
} else {
  $data = array('result' => 'fail');
}     
echo json_encode($data);
?>