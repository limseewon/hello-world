<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$userid = trim($_POST['login_id']);
$passwd = trim($_POST['login_pw']);
$passwd = hash('sha512', $passwd);

$sql = "SELECT * FROM members where userid='{$userid}' and passwd = '{$passwd}'";

$result = $mysqli->query($sql);
$rs = $result->fetch_object();

// $rs -> idx

if ($rs) {
  $recentSql = "UPDATE members SET recent_in=CURDATE() where userid='{$userid}'";
  $recentResult = $mysqli->query($recentSql);
  if (isset($recentResult)) {
    $_SESSION['UID'] = $rs->userid;
    $_SESSION['UNAME'] = $rs->username;
    $ssid= session_id();
  
    // $cartSql = "UPDATE cart SET userid='{$_SESSION['UID']}', ssid=null WHERE ssid='{$ssid}'";
    // $result = $mysqli->query($cartSql);
  
    echo "<script>
      alert('".$_SESSION['UID']."님 반갑습니다');
      location.href = '/helloworld/index.php';
    </script>";
    exit();
  }

} else {
  echo "<script>
    alert('아이디 또는 비번을 다시 확인해주세요');
    history.back();    
  </script>";
  exit();
}
