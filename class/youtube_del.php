<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';

$idx = $_POST['idx'];
$sql = "DELETE FROM leture WHERE cid = {$idx}"; // 19312024.jpg
$result = $mysqli -> query($sql);
$row = $result->filename;

unlink('/helloworld/img/youclass/'.$row);

if($result){
    $data = array('result'=>'ok');
}else{
    $data = array('result'=>'no');
}
echo json_encode($data);