<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$userid = $_POST['userid'] ?? null;
$userpw = $_POST['userpasswd'];
$userpw = hash('sha512', $userpw) ?? null;
$username = $_POST['username'] ?? null;
$useremail = $_POST['useremail'] ?? null;
$tel = $_POST['tel'] ?? null;
// $userimg = 

//유저 프로필 이미지 업로드
if ($_FILES['userimg']['name']) {
  if ($_FILES['userimg']['size'] > 10240000) {
    echo "<script>
          alert('10MB 이하만 첨부할 수 있습니다.');    
          history.back();      
        </script>";
    exit;
  }
  if (strpos($_FILES['userimg']['type'], 'image') === false) {
    echo "<script>
          alert('이미지만 첨부할 수 있습니다.');    
          history.back();            
        </script>";
    exit;
  }

  $save_dir = $_SERVER['DOCUMENT_ROOT'] . "/helloworld/user/img/profile/";
  $filename = $_FILES['userimg']['name']; //insta.jpg
  $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis") . substr(rand(), 0, 6); //20238171184015
  $userimg = $newfilename . "." . $ext; //20238171184015.jpg

  if (move_uploaded_file($_FILES['userimg']['tmp_name'], $save_dir . $userimg)) {
    $userimg = "/helloworld/user/img/profile/" . $userimg;
  } else {
    echo "<script>
          alert('이미지등록 실패!');    
          history.back();            
        </script>";
  }
}

$sql = "INSERT INTO members
  (userid,email,username,passwd,tel,userimg)
  VALUES('{$userid}','{$useremail}','{$username}','{$userpw}','{$tel}','{$userimg}')";
$result = $mysqli->query($sql) or die($mysql->error);

//회원가입 성공 시. 쿠폰 발행 
if ($result) {
  echo "<script>
  alert('회원가입이 완료 되었습니다.');
  //location.href='signup_coupon.php?userid=$userid';
  location.href='/helloworld/index.php';
  </script>";
} else {
  echo "<script>
  alert('회원가입에 실패했습니다.');
  history.back();
  </script>";
}

?>