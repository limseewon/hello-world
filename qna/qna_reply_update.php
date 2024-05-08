<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (isset($_GET['qna_id']) && isset($_GET['reply'])) {
  $qna_id = $_GET['qna_id'];
  $reply = $_GET['reply'];

  $updateSql = "UPDATE qna SET reply = '$reply' WHERE idx = '$qna_id'";
  $updateResult = $mysqli->query($updateSql);
}
?>
