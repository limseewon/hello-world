<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (isset($_GET['id'])) {
  $comment_id = $_GET['id'];

  // 댓글 삭제 쿼리 실행
  $sql = "DELETE FROM qna_comment WHERE idx = '$comment_id'";
  $result = $mysqli->query($sql);

  if ($result) {
    echo "<script>alert('댓글이 삭제되었습니다.'); window.location.href = document.referrer;</script>";
    exit;
  } else {
    echo "<script>alert('댓글 삭제에 실패했습니다.'); window.location.href = document.referrer;</script>";
    exit;
  }
}



// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   $commentId = $_POST['comment_id'];

//   // 댓글 삭제 쿼리 실행
//   $sql = "DELETE FROM qna_comment WHERE id = $commentId";
//   $result = $mysqli->query($sql);

//   if ($result) {
//     echo 'success';
//   } else {
//     echo 'error';
//   }
// }

//   if ($mysqli->query($sql) === TRUE) {
//     echo "<script> alert('댓글이 삭제되었습니다.'); 
//         // location.href = '/helloworld/qna/qna.php'; 
//     </script>";
// } else {
//     echo "<script> alert('댓글 등록에 실패하였습니다.'); 
//     history.back(); </script>";
// }


?>