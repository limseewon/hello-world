<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$passwd = $_POST['input_pw_modify'];
$passwd = hash('sha512', $passwd);

$userid = $_SESSION['UID'];

$sql = "UPDATE members SET passwd = '{$passwd}' WHERE userid = '{$userid}'";
$result = $mysqli->query($sql);

if ($result) {
  echo "<script> alert('비밀번호가 변경되었습니다.');history.back()</script>";
  
} else {
  echo "<script> alert('비밀번호가 변경에 실패했습니다.');history.back()</script>";
}

?>