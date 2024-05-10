<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';

$idx = $_POST['youtubeid'];

// 파일명을 먼저 가져오기
$sqlFile = "SELECT youtube_thumb FROM lecture WHERE l_idx = {$idx}";
$fileResult = $mysqli->query($sqlFile);
$fileRow = $fileResult->fetch_object();

// $data = array('result' => 'test');

if($fileRow) {
  $file = $fileRow->youtube_thumb;
    // 파일명이 확인된 후에 삭제 진행
    $sqlDelete = "DELETE FROM lecture WHERE l_idx = {$idx}";
    $result = $mysqli->query($sqlDelete);
    if($result){
        $data = array('result' => 'ok');
        // 파일 삭제
        unlink($_SERVER['DOCUMENT_ROOT'].$file);
    } else {
        $data = array('result' => 'no');
    }
} else {
    $data = array('result' => 'no');
}

echo json_encode($data);
?>