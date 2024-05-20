<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

if (!isset($_SESSION['UID'])) {
    echo '<script>alert("로그인 후 이용 가능합니다."); location.href = "/helloworld/user/login.php";</script>';
    exit;
}

// 폼 데이터 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['cid'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];
    $user_id = $_SESSION['UID']; // 로그인한 사용자의 ID
echo $user_id;

    // 사용자가 해당 강의를 구매했는지 확인
    $mid_sql = "SELECT mid FROM members WHERE userid = '{$user_id}'";
    $mid_result = $mysqli->query($mid_sql);
    $mid_row = $mid_result-> fetch_object();
    $mid = $mid_row-> mid;

    $purchaseSql = "SELECT COUNT(*) AS cnt FROM ordered_courses WHERE member_id = '{$mid}' AND course_id = '{$cid}'";
    echo $purchaseSql;
    $stmt = $mysqli->query($purchaseSql);
    // $stmt->bind_param("si", $user_id, $cid);
    // $stmt->execute();
    $purchaseResult = $stmt->fetch_object();

    if ($purchaseResult->cnt > 0) {
        // 사용자의 이름 가져오기
        $sql = "SELECT username FROM members WHERE userid = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $name = $row['username'];

        // 리뷰 데이터 저장
        $sql = "INSERT INTO review (cid, name, content, rating, date, hit, view, user_id) VALUES ({$cid}, '{$name}', '{$content}', {$rating}, NOW(), 0, 0, '{$user_id}')";
        $sql_result = $mysqli->query($sql);
        
        // $stmt = $mysqli->prepare($sql);
        // $stmt->bind_param("issii", $cid, $name, $content, $rating, $user_id);
        echo $sql;
        if ($sql_result) {
            echo "<script>alert('리뷰가 등록되었습니다.');</script>";
            $mysqli->close();
            header("Location: course_view.php?cid=$cid"); // 강의 상세 페이지로 리디렉션
            exit;
        } else {
            echo "Error: " . $stmt->error;
            $mysqli->close();
        }
    } else {
        echo "<script>alert('강의를 구매한 회원만 리뷰를 작성할 수 있습니다.');</script>";
        $mysqli->close();
        header("Location: course_view.php?cid=$cid"); // 강의 상세 페이지로 리디렉션
        exit;
    }
}
?>