<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$username = $_POST['input_name_modify'];
$userid = $_SESSION['UID'];

$sql = "UPDATE members SET username = '{$username}' WHERE userid = '{$userid}'";
$result = $mysqli->query($sql);

if ($result) {
  echo "<script> alert('닉네임이 변경되었습니다.');history.back()</script>";
  
} else {
  echo "<script> alert('닉네임 변경에 실패했습니다.');history.back()</script>";
}

?>