<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qna_id = $_POST['id'];
    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $regdate = date('Y-m-d H:i:s');

    // 댓글 저장 쿼리 실행
    $sql = "INSERT INTO qna_comment (idx, comment, name, regdate) VALUES ('$qna_id', '$comment', '$name', '$regdate')";

    if ($mysqli->query($sql) === TRUE) {
        // 댓글 저장 성공 시 reply 값을 '답변'으로 업데이트
        $updateSql = "UPDATE qna SET reply = '답변' WHERE idx = '$qna_id'";
        $mysqli->query($updateSql);

        echo "<script>alert('댓글이 등록되었습니다.'); location.href='qna_detail.php?id=$qna_id';</script>";
    } else {
        echo "<script>alert('댓글 등록에 실패하였습니다.'); history.back();</script>";
    }
}
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $qna_id = $_POST['id'];
//     $comment = $_POST['comment'];
//     $name = $_POST['name'];
//     $regdate = date('Y-m-d H:i:s'); // 현재 시간을 regdate로 설정

//     // 댓글 저장 쿼리 실행
//     $sql = "INSERT INTO qna_comment (idx, comment, name, regdate) VALUES ('$qna_id', '$comment', '$name', '$regdate')";
//     echo $sql;

//     if ($mysqli->query($sql) === TRUE) {
//         echo "<script> alert('댓글이 등록되었습니다.'); location.href = '/helloworld/qna/qna.php'; </script>";

//         // 댓글 저장 성공 시 reply 값을 '답변'으로 업데이트
//         $updateSql = "UPDATE qna SET reply = '답변' WHERE idx = '$qna_id'";
//         $updateResult = $mysqli->query($updateSql);

//         if ($updateResult) {
//             echo 'success';
//         } else {
//             echo 'error: ' . $mysqli->error;
//         }
//     } else {
//         echo 'error: ' . $mysqli->error;
//     }
// } 
?>