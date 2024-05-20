<?php
include_once '../../inc/db.php';

// 질문 ID 받아오기
$qna_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 질문 데이터 가져오기
if ($qna_id > 0) {
    $sql = "SELECT * FROM qna WHERE idx = $qna_id";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $lecture_name = $_POST['lecture_name'];

     // 파일 업로드 처리
     $uploaded_file = '';
     if (isset($_FILES['files']) && $_FILES['files']['name'] != '') {
         $upload_dir = '../../uploads/';
         $uploaded_file = date('YmdHis') . '_' . $_FILES['files']['name'];
         move_uploaded_file($_FILES['files']['tmp_name'], $upload_dir . $uploaded_file);
     }

    // 업데이트 쿼리 실행
    $sql = "UPDATE qna SET title = '$title', content = '$content', lecture_name = '$lecture_name' WHERE idx = $qna_id";
    $result = $mysqli->query($sql);

    if ($result) {
        echo "<script>alert('게시물이 수정되었습니다.'); location.href='/helloworld/user/qna/qna_detail.php?id=$qna_id';</script>";
        exit;
    } else {
        echo "<script>alert('수정에 실패했습니다. 다시 시도해주세요.'); history.back();</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Q&A 수정</title>
</head>
<body>
    <h2>Q&A 수정</h2>
    <form method="post" action="">
        <label for="lecture_name">강의명:</label>
        <input type="text" name="lecture_name" value="<?= $row['lecture_name'] ?>" required><br>

        <label for="title">제목:</label>
        <input type="text" name="title" value="<?= $row['title'] ?>" required><br>

        <label for="content">내용:</label>
        <textarea name="content" required><?= $row['content'] ?></textarea><br>

        <input type="submit" value="수정">
    </form>
</body>
</html>