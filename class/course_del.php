<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';

$cid = $_POST['cid'];
$sql = "DELETE FROM course WHERE cid = {$cid}"; // 19312024.jpg
$result = $mysqli -> query($sql);
$row = $result->filename;

unlink('/helloworld/img/classfile/'.$row);

if($result){
    $data = array('result'=>'ok');
}else{
    $data = array('result'=>'no');
}
echo json_encode($data);