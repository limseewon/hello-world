<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/pinkping/inc/dbcon.php';

if(isset($_SESSION['UID'])){  // 세션 변수 UID가 설정되어 있는지 확인 if 문 안에서는 세션 변수 UID가 존재하면 이를 $userid 변수에 할당
    $userid = $_SESSION['UID'];
} else {  // else 문에서는 세션 변수가 존재하지 않으면 현재 세션의 ID를 $ssid 변수에 할당
    $ssid = session_id();
    $userid = '';  // $userid 변수는 빈 문자열로 설정
}
//pid	userid	ssid	options	cnt	regdate	

$sql = "DELETE FROM cart WHERE (cid = '{$ssid}' or userid = '{$userid}')";
echo $sql;

// SQL 쿼리를 작성하여 세션 ID가 현재 세션 ID와 같거나 사용자 ID가 현재 사용자 ID와 같은 모든 항목을 cart 테이블에서 삭제

$result = $mysqli -> query($sql);
if($result){
    $data = array('result' => 'ok');  // 쿼리가 성공적으로 실행되었으면 $data 배열에 'result' => 'ok'를 추가
} else{ 
    $data = array('result' => 'fail'); // 쿼리가 실패했으면 $data 배열에 'result' => 'fail'을 추가
}
echo json_encode($data);

?>