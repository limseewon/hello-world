<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$courseId = $_POST['courseId'];
// $courseId = 39;

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
    SUM(CASE WHEN MONTH(regdate) = MONTH(CURDATE()) THEN 1 ELSE 0 END) AS '{$cMon}월',
    SUM(CASE WHEN MONTH(regdate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) THEN 1 ELSE 0 END) AS '{$pMon1}월',
    SUM(CASE WHEN MONTH(regdate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 2 MONTH)) THEN 1 ELSE 0 END) AS '{$pMon2}월',
    SUM(CASE WHEN MONTH(regdate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 3 MONTH)) THEN 1 ELSE 0 END) AS `{$pMon3}월`,
    SUM(CASE WHEN MONTH(regdate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 4 MONTH)) THEN 1 ELSE 0 END) AS `{$pMon4}월`,
    SUM(CASE WHEN MONTH(regdate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 5 MONTH)) THEN 1 ELSE 0 END) AS `{$pMon5}월`
FROM
    ordered_courses
WHERE
    regdate >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)
    AND regdate <= LAST_DAY(CURDATE()) AND course_id='{$courseId}';";

$result = $mysqli -> query($sql);
$rs = $result->fetch_object();




$profitCourseSql = "SELECT count(*) as ct_price
FROM ordered_courses
WHERE MONTH(regdate) = MONTH(CURRENT_DATE())
AND YEAR(regdate) = YEAR(CURRENT_DATE())
AND course_id = '{$courseId}';
";
$profitCourseResult = $mysqli -> query($profitCourseSql);
$profitRs = $profitCourseResult->fetch_row();

$priceCourseSql = "SELECT price FROM courses WHERE cid='{$courseId}'";
$priceResult = $mysqli -> query($priceCourseSql);
$priceRs = $priceResult->fetch_row();

$priceResult = [$rs, $profitRs[0] * $priceRs[0]];
if($result){      
  $data = array('result' => $priceResult);
        
} else {
  $data = array('result' => 'fail');
}     
echo json_encode($data);

?>
