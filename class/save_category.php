<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';
$code = $_POST['code'];
$name = $_POST['name'];
$search_where = '';

if (isset($_POST['pcode'])) {
  $pcode = $_POST['pcode'];
  $search_where .= " and pcode='".$pcode."'";
} else {
  $pcode = '';
}
$step = $_POST['step'];




$query = "SELECT cateid FROM category WHERE (step={$step} and name='{$name}' or code = '{$code}' )";
$query .= $search_where;
$result = $mysqli->query($query);
$rs = $result->fetch_object();

if (isset($rs->cateid)) {
  $return_data = array("result" => "-1"); 
  echo json_encode($return_data);
  exit;
}

$sql = "INSERT INTO category 
  (code, pcode, name, step) VALUES('".$code."','".$pcode."', '".$name."', ".$step.")";
$result = $mysqli->query($sql);
// echo $sql;
if ($result) {
  $retun_data = array("result" => 1);
  echo json_encode($retun_data);
} else {
  $retun_data = array("result" => 0);
  echo json_encode($retun_data);
}


?>