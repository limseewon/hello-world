<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

$title = $_POST['title'];
$content = $_POST['summernote'];
$name = $_POST['name']; // 이름 데이터 받아오기
$files = $_FILES['optionImage1'];
 
$sql ="UPDATE notice SET 
  title='{$title}', 
  content='{$content}', 
  name='{$name}', 
  nt_regdate='{$nt_regdate}' 
  WHERE title='{$title}'";

  $result = $mysqli -> query($sql);
  if ($result === TRUE) {    
      echo "<script>
      alert('글수정 완료되었습니다.');

      location.replace('notice_list.php');
      </script>";          
  }  else {
    echo "Error:".$sql . "<br>" . $mysqli -> error;  
  }
$mysqli->close();
?>