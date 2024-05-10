<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';

$idx = $_POST['youtubeid'];
$sql = "DELETE FROM lecture WHERE l_idx = {$idx}"; // 19312024.jpg
$result = $mysqli -> query($sql);
$row = $result->fetch_object();
$file = $row->filename;

unlink('/helloworld/img/youclass/'.$file);

if($result){
    $data = array('result'=>'ok');
}else{
    $data = array('result'=>'no');
}
echo json_encode($data);