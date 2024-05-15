<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$recipientName = $_POST['recipient-name'];
$msgText= $_POST['message-text'];
$aName = $_SESSION['AUNAME'];
$userid= $_POST['recipient-id'];


$sql = "INSERT INTO msg (sendername, content, mid, regdate) VALUES ('{$aName}', '{$msgText}', '{$userid}', CURDATE());";
echo $sql;
$result = $mysqli->query($sql);

if ($result) {  
  echo "<script>alert('{$recipientName}님에게 메시지를 전송했습니다.'); history.back(); </script>";
} else {
  echo "<script>alert('메시지를 전송에 실패했습니다.'); history.back(); </script>";
}

?>