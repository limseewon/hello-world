<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $commentId = $_POST['comment'];

  // 댓글 삭제 쿼리 실행
  $sql = "DELETE FROM qna_comment WHERE id = $commentId";
  $result = $mysqli->query($sql);

  if ($result) {
    echo 'success';
  } else {
    echo 'error';
  }

  if ($mysqli->query($sql) === TRUE) {
    echo "<script> alert('댓글이 등록되었습니다.'); 
        location.href = '/helloworld/qna/qna_detail.php'; 
    </script>";
} else {
    echo "<script> alert('댓글 등록에 실패하였습니다.'); 
    history.back(); </script>";
}

}
?>