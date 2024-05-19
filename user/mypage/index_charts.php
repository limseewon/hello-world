<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

// $courseId = 39;
// $_SESSION['UID'];
if(isset($_SESSION['UIDX'])){
    $userid = $_SESSION['UIDX'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}
// $userid= '5';
$sql = "SELECT c.name, oc.progress FROM ordered_courses oc JOIN courses c ON oc.course_id = c.cid WHERE oc.member_id='{$userid}';
";
$result = $mysqli -> query($sql);
while ($rs = $result->fetch_object()) {
  $rsArr [] = $rs;
}

if($result){      
  $data = array('result' => $rsArr);
        
} else {
  $data = array('result' => 'fail');
}     
echo json_encode($data);

?>
