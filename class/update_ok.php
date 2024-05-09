<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';



  $mysqli->autocommit(FALSE);
  try{
    
    $cate1 =  $_POST['cate1']??'' ;
    $cate2 =  $_POST['cate2']??'' ;
    $cate3 =  $_POST['cate3']??'' ;


  

    $query11 = "SELECT name FROM category WHERE cateid='".$cate1." '";
    $result11 = $mysqli->query($query11);
    $rs11 = $result11->fetch_object();
    $cate1 =  $rs11-> name;

    if(isset($cate2) &&  $cate2 !== ''){

      $query22 = "SELECT name FROM category WHERE cateid='".$cate2." '";
      $result22 = $mysqli->query($query22); //쿼리실행결과를 $result 할당
      $rs22 = $result22->fetch_object();
      $cate2 =  $rs22->name;
    }

    if(isset($cate3) &&  $cate3 !== ''){

      $query33 = "SELECT name FROM category WHERE cateid='".$cate3." '";
      $result33 = $mysqli->query($query33); //쿼리실행결과를 $result 할당
      $rs33 = $result33->fetch_object();
      $cate3 =  $rs33->name;
    }

    

    $cid=$_POST['cid'];
    $cate = $cate1.'/'.$cate2.'/'.$cate3;
 

    $name = $_POST['name'];
    $price_status = $_POST['price_status'];
    $price = $_POST['price']??0;
    $level = $_POST['level']??0;
    $due_status = $_POST['due_status'];
    $due = $_POST['due']??'무제한';
    $act = $_POST['act'];
    $content = rawurldecode($_POST['content']);

    $youtube_thumb = $_FILES['youtube_thumb'] ?? [];   //lecture 테이블에 업데이트 
    $youtube_name = $_POST['youtube_name']?? [];   //lecture 테이블에 업데이트 
    $youtube_url = $_POST['youtube_url']?? [];   //lecture 테이블에 업데이트 

    $thumbnail = $_FILES['thumbnail'] ?? null;
    $course_file = $_FILES['course_file']?? null;
    $course_file_names = $_POST['course_file_name']?? null;


    $question = $_POST['question']?? [];   //question 테이블에 업데이트 
    $answer = $_POST['answer']?? [];   //question 테이블에 업데이트 


    //echo count($youtube_thumb['name']);
    //lecture 테이블에서 cid가 일치하는 데이터의 l_idx 출력 - 업데이트시 사용
    $lecSql = "SELECT l_idx FROM lecture WHERE cid = {$cid}";
    $lecResult = $mysqli -> query($lecSql);
    
    while ($row = $lecResult->fetch_assoc()) {
        $lectures[] = $row['l_idx']; // l_idx의 값이 숫자, 배열로 출력
    }
  
    //thumbnail은 thumbnail 필드에 파일주소 입력
    if(strlen($_FILES['thumbnail']['name']) > 0){

      if($_FILES['thumbnail']['size']> 10240000){
        echo "<script>
          alert('10MB 이하만 첨부할 수 있습니다.');    
          history.back();      
        </script>";
        exit;
      }

      if(strpos($_FILES['thumbnail']['type'], 'image') === false){
        echo "<script>
          alert('이미지만 첨부할 수 있습니다. 1');    
          history.back();            
        </script>";
        exit;
      }

      $save_dir = $_SERVER['DOCUMENT_ROOT']."/helloworld/img/class/";
      $filename = $_FILES['thumbnail']['name']; 
      $ext = pathinfo($filename, PATHINFO_EXTENSION); 
      $newfilename = date("YmdHis").substr(rand(), 0,6);
      $thumbnail = $newfilename.".".$ext;

      if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)){  
        $thumbnail = "/helloworld/img/class/".$thumbnail;
      } else{
        echo "<script>
          alert('이미지등록 실패!');    
          history.back();            
        </script>";
      }
    }
    //강의영상 썸네일 
    if(isset($youtube_thumb) && strlen($_FILES['youtube_thumb']['name'][0])>0){
      for($i = 0;$i<count($_FILES['youtube_thumb']['name']) ; $i++){

        if($_FILES['youtube_thumb']['size'][$i]> 10240000){
          echo "<script>
            alert('10MB 이하만 첨부할 수 있습니다. ');    
            history.back();      
          </script>";
          exit;
        }
    
        if(strpos($_FILES['youtube_thumb']['type'][$i], 'image') === false){
          echo "<script>
            alert('이미지만 첨부할 수 있습니다.3 ');
            history.back();            
          </script>";
          exit;
        }
    
        $save_dir = $_SERVER['DOCUMENT_ROOT']."/helloworld/img/class/";


          $filename = $_FILES['youtube_thumb']['name'][$i]; 
          $ext = pathinfo($filename, PATHINFO_EXTENSION); 
          $newfilename = date("YmdHis").substr(rand(), 0,6); 
          $youtube_thumb = $newfilename.".".$ext; 

          if(move_uploaded_file($_FILES['youtube_thumb']['tmp_name'][$i], $save_dir.$youtube_thumb)){  
            $upload_youtube_thumb[] = "/helloworld/img/class/".$youtube_thumb;
          } else{
            echo "<script>
              alert('이미지등록 실패!');    
              history.back();            
            </script>";
          }
          //강의영상 썸네일- lecture 테이블 업데이트 cid의 값이 course 번호와 같은 데이터 수정
          $lectureUpdateSql = "UPDATE lecture
                      SET youtube_thumb = '{$upload_youtube_thumb[$i]}',
                          youtube_name = '{$youtube_name[$i]}',
                          youtube_url = '{$youtube_url[$i]}'
                      WHERE cid ={$cid}
                      AND l_idx = {$lectures[$i]}";       
        
           $lectureUpdateResult = $mysqli-> query($lectureUpdateSql);           

    
      }
      // for($i = 0;$i<count($youtube_url) ; $i++){


      //   $sql1 = "UPDATE lecture
      //           SET youtube_name = '{$youtube_name[$i]}',
      //               youtube_url = '{$youtube_url[$i]}'  
      //           WHERE cid ={$cid}
      //           AND l_idx = {$i}";
      
      //   $result2 = $mysqli-> query($sql1);
      // }
    }
    // if (isset($_POST['delete_youtube'])) {
    //   $deleteYouTubeIndexes = $_POST['delete_youtube'];
    //   foreach ($deleteYouTubeIndexes as $deleteIdx) {
    //   $deleteSql = "DELETE FROM lecture WHERE cid = {$cid} AND l_idx = {$deleteIdx}";
    //   $deleteResult = $mysqli->query($deleteSql);
    //   }
    // }

    //course_file은 course_file 컬럼에 문자열로 주소를 콤마로 구분하여 입력
    
    if(strlen($_FILES['course_file']['name'][0])>0){
      for($i = 0;$i<count($_FILES['course_file']['name']) ; $i++){

        if($_FILES['course_file']['size'][$i]> 10240000){
          echo "<script>
            alert('10MB 이하만 첨부할 수 있습니다.');    
            history.back();      
          </script>";
          exit;
        }
    
        if(strpos($_FILES['course_file']['type'][$i], 'image') === false){
          echo "<script>
            alert('이미지만 첨부할 수 있습니다.');
            history.back();            
          </script>";
          exit;
        }
    
        $save_dir = $_SERVER['DOCUMENT_ROOT']."/helloworld/img/file/";
        if(strlen($_FILES['course_file']['name'][$i])>0){
          $filename = $_FILES['course_file']['name'][$i]; 
          $ext = pathinfo($filename, PATHINFO_EXTENSION); 
          $newfilename = date("YmdHis").substr(rand(), 0,6); 
          $course_file = $newfilename.".".$ext; 

          if(move_uploaded_file($_FILES['course_file']['tmp_name'][$i], $save_dir.$course_file)){  
            $upload_course_file[] = "/helloworld/img/file/".$course_file;
            $upload_course_files = implode(",",$upload_course_file);
          } else{
            echo "<script>
              alert('이미지등록 실패!');    
              history.back();            
            </script>";
          }    
        }
      }
    } 
    // //course_file_name은 course_file_name은 컬럼에 문자열로 주소를 콤마로 구분하여 입력
    // if(isset($_POST['course_file_name'])){
    //   $course_file_names = implode(",",$course_file_name);
    // }


    $sql = "UPDATE courses
    SET cate='{$cate}',
        name='{$name}', 
        price='{$price}', 
        price_status='{$price_status}', 
        level='{$level}',
        due='{$due}',
        due_status='{$due_status}', 
        act='{$act}', 
        content='{$content}'";

if (!empty($thumbnail) &&  strlen($_FILES['thumbnail']['name']) > 0) {
$sql .= ", thumbnail='{$thumbnail}'";
}

if (!empty($upload_course_files) && $upload_course_files !== null) {
$sql .= ", course_file='{$upload_course_files}'";
}

if (!empty($course_file_name) && $course_file_name !== null) {
$sql .= ", course_file_name='{$course_file_names}'";
}

$sql .= " WHERE cid = {$cid}";

// echo $sql;

   $finalResult = $mysqli-> query($sql);

   $mysqli->commit();
    echo "<script>
    alert('강의 수정 완료!');
    location.href='course_list.php';</script>";
  }

    catch(Exception $e){
      $mysqli->rollback();
      echo "<script>
      alert('강의 수정 실패');
      history.back();
      </script>";
      exit;
    }
?>
