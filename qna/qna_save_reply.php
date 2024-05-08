<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $qna_id = $_POST['id'];
  $comment = $_POST['comment'];
  $name = $_POST['name'];
  $regdate = date('Y-m-d H:i:s');
  
  if (isset($_POST['comment_id']) && !empty($_POST['comment_id'])) {
    // 댓글 수정
    $comment_id = $_POST['comment_id'];
    
    $sql = "UPDATE qna_comment SET comment = ?, name = ?, regdate = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssi", $comment, $name, $regdate, $comment_id);
    
    if ($stmt->execute()) {
      echo "<script>alert('댓글이 수정되었습니다.'); location.href='qna_detail.php?id=$qna_id';</script>";
      exit;
    } else {
      echo "<script>alert('댓글 수정에 실패하였습니다.'); history.back();</script>";
      exit;
    }
  } else {
    // 댓글 등록
    $sql = "INSERT INTO qna_comment (idx, comment, name, regdate) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isss", $qna_id, $comment, $name, $regdate);
    
    if ($stmt->execute()) {
      $updateSql = "UPDATE qna SET reply = '답변' WHERE idx = ?";
      $updateStmt = $mysqli->prepare($updateSql);
      $updateStmt->bind_param("i", $qna_id);
      $updateStmt->execute();
      
      echo "<script>alert('댓글이 등록되었습니다.'); location.href='qna_detail.php?id=$qna_id';</script>";
      exit;
    } else {
      echo "<script>alert('댓글 등록에 실패하였습니다.'); history.back();</script>";
      exit;
    }
  }
}
?>