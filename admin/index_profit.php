<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';


if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
    $ssid = '';
} else {
    $ssid = session_id();
    $userid = '';
}
$cMon = idate('m');
$pMon1 = idate('m', strtotime('-1 month')); // 숫자 형식 (01-12)
$pMon2 = idate('m', strtotime('-2 month')); // 숫자 형식 (01-12)
$pMon3 = idate('m', strtotime('-3 month')); // 숫자 형식 (01-12)
$pMon4 = idate('m', strtotime('-4 month')); // 숫자 형식 (01-12)
$pMon5 = idate('m', strtotime('-5 month')); // 숫자 형식 (01-12)

$sql = "SELECT 
COALESCE(SUM(CASE WHEN MONTH(oc.regdate) = MONTH(CURRENT_DATE()) THEN c.price END), 0) AS '{$cMon}월',
COALESCE(SUM(CASE WHEN MONTH(oc.regdate) = MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)) THEN c.price END), 0) AS '{$pMon1}월',
COALESCE(SUM(CASE WHEN MONTH(oc.regdate) BETWEEN MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 2 MONTH)) AND MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))-1 THEN c.price END), 0) AS '{$pMon2}월',
COALESCE(SUM(CASE WHEN MONTH(oc.regdate) BETWEEN MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH)) AND MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 2 MONTH))-1 THEN c.price END), 0) AS '{$pMon3}월',
COALESCE(SUM(CASE WHEN MONTH(oc.regdate) BETWEEN MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 4 MONTH)) AND MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH))-1 THEN c.price END), 0) AS '{$pMon4}월',
COALESCE(SUM(CASE WHEN MONTH(oc.regdate) BETWEEN MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 5 MONTH)) AND MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 4 MONTH))-1 THEN c.price END), 0) AS '{$pMon5}월'
FROM ordered_courses oc
JOIN courses c ON oc.course_id = c.cid;";

$result = $mysqli -> query($sql);
$rs = $result->fetch_object();
if($result){      
  $data = array('result' => $rs);
        
} else {
  $data = array('result' => 'fail');
}     
echo json_encode($data);
?>