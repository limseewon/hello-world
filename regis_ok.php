<?php
session_start();
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';
$title = $_POST['title'];
  $content = $_POST['content'];
  $regdate = date('Y-m-d');
  $notice_file = '';

  if($_FILES['file']['name']){
    //파일 사이즈 검사
    if($_FILES['file']['size']> 10240000){
      echo "<script>
        alert('10MB 이하만 첨부할 수 있습니다.');
        history.back();
      </script>";
      exit;
    }
    if(isset($_FILES['file'])){
      //파일 업로드
      $save_dir = $_SERVER['DOCUMENT_ROOT']."/helloworld/img/class/"; //파일 저장 경로
      $filename = $_FILES['file']['name']; //파일명
      $ext = pathinfo($filename, PATHINFO_EXTENSION); //확장자
      $newfilename = date("YmdHis").substr(rand(), 0,6); //파일명 datetime명으로 변경
      $notice_file = $newfilename.".".$ext; //변경된 파일명 + 확장자
      
      if(move_uploaded_file($_FILES['file']['tmp_name'], $save_dir.$notice_file)){  
        $notice_file = "/helloworld/img/class/".$notice_file;
        // $notice_file;
      } else{
        echo "<script>
          alert('파일 첨부 실패.. :(');    
          history.back();            
        </script>";
      }
    }
  }

  $sql = "INSERT INTO notice (title, content, regdate, file) 
  VALUES ('{$title}','{$content}', now(),'{$notice_file}')";

  if($mysqli->query($sql) === true){
    echo "<script>
      alert('등록 완료되었습니다 :)');
      location.href='/attention/admin/notice/notice.php';
      </script>";
  } else{
    echo "<script>
      alert('등록 실패.. :(');
      history.back();
      </script>";
  }
?>