<?php
  $title = 'Dashboard';
  $cssRoute2 = "<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />";
  $cssRoute3 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_dash.css"/>';
  $cssRoute4 = '';
  
  $script2 ="<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>";
  $script3 ='<script defer src="/helloworld/user/js/mypage_index.js"></script>';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/leftSide.php';     
    


$userid = $_SESSION['UID'];
$midSql = "SELECT * FROM members WHERE userid = '{$userid}'";
$mid_result = $mysqli->query($midSql);
$member = $mid_result->fetch_object();



$notice_sql = "SELECT title from notice ORDER BY idx DESC LIMIT 4";
$notice_result = $mysqli->query($notice_sql);
while( $notice_rs = $notice_result->fetch_object()){
  $noticeArr [] = $notice_rs;
};

$qnaSql = "SELECT title from qna WHERE user_id = '{$userid}' ORDER BY idx DESC LIMIT 4";
$qnaResult = $mysqli->query($qnaSql);
while( $qnaRs = $qnaResult->fetch_object()){
  $qnaArr [] = $qnaRs;
};
$msgSql = "SELECT * from msg WHERE mid='{$member->mid}' ORDER BY regdate DESC LIMIT 4";
$msgResult = $mysqli->query($msgSql);
while( $msgRs = $msgResult->fetch_object()){
  $msgArr [] = $msgRs;
};

$courseSql = "SELECT c.name from courses c JOIN ordered_courses oc ON c.cid = oc.course_id WHERE oc.member_id = '{$member->mid}' LIMIT 4";
$courseResult = $mysqli->query($courseSql);
while( $courseRs = $courseResult->fetch_object()){
  $courseArr [] = $courseRs;
};

$attendSql = "SELECT count(*) cnt FROM attendance WHERE userid = '{$userid}' AND YEAR(login_date) = YEAR(CURDATE()) AND MONTH(login_date) = MONTH(CURDATE())";
$attendResult = $mysqli->query($attendSql);
$attendRs = $attendResult->fetch_object();

?>

        <section class="mainContainer">
          <h2 class="title">대시 보드</h2>
          <div class="mainContents">
            
            <div class="d-flex flex-column justify-content-center align-items-center content-box profile_box">
              <div class="d-flex justify-content-start align-items-center profile_info">
                <div class="d-flex flex-column align-items-center profile_img_con">
                  <?php 
                  if ($member->userimg){
                  ?>
                  <img src="<?=$member->userimg?>" alt="profile_image" />
                  <?php
                  } else {
                  ?>
                  <img src="/helloworld/user/img/person-square.svg" alt="profile_image" />
                  <?php
                  }
                  ?>
                  <button class="btn btn-secondary modify_img">프로필 변경</button>
                </div>
                <ul class="profile_list">
                  <li><span class="p bold">아이디 : </span><span><?=$member->userid?></span></li>
                  <li><span class="p bold">최근 접속일 : </span><span><?=$member->recent_in?></span></li>
                  <li><span class="p bold">가입일 : </span><span><?=$member->regdate?></span></li>
                  <li><span class="p bold">이메일 : </span><span><?=$member->email?></span></li>
                  <li><span class="p bold">닉네임 : </span><span><?=$member->username?></span></li>
                </ul>    
              </div>
              <div class="btn_info d-flex justify-content-center">
                <button class="btn btn-secondary modify_name" data-bs-toggle="modal" data-bs-target="#modal_name_modify" data-bs-whatever="@mdo">닉네임 변경</button>
                <button class="btn btn-secondary modify_pw" data-bs-toggle="modal" data-bs-target="#modal_pw_modify" data-bs-whatever="@mdo">비밀번호 변경</button>
              </div>
            </div>
            <div class="content-box attendance_box">
              <h4 class="bold mb-4">출석 현황</h4>
              <p class="p mb-3">이번 달 출석일 : <?=$attendRs->cnt?>일</p>
              <div id="calendar" class="content-box">
              </div>
            </div>
            <div class="content-box recent_notice board">
              <h3 class="p bold">최근 공지사항</h3>
              <ul>
                <?php
                if (isset($noticeArr)) {
                  foreach($noticeArr as $na) {
                ?>
                <li><a href="#"><?php
                
                $str = $na->title;
                  $returnStr = '';
                  $maxLength = 25;
                  if (mb_strlen($str) >= $maxLength) {
                    $returnStr = mb_substr($str, 0, $maxLength - 3) . '...';
                  } else {
                    $returnStr = $str;
                  }
                  echo $returnStr;
                ?></a></li>
                <?php
                }
                }else {
                ?>
                <li><a href="#">없음</a></li>
                <?php
                }?>
              </ul>
            </div>
            
            
            <div class="content-box mycourses board">
              <h3 class="p bold">수강 강의</h3>
              <ul>
                <?php
                if(isset($courseArr)) {
                  foreach($courseArr as $ca) {
                ?>
                <li><a href="#"><?php
                $str = $ca->name; 
                  $returnStr = '';
                  $maxLength = 25;
                  if (mb_strlen($str) >= $maxLength) {
                    $returnStr = mb_substr($str, 0, $maxLength - 3) . '...';
                  } else {
                    $returnStr = $str;
                  }
                  echo $returnStr;
                ?></a></li>
                <?php
                  }} else {
                ?>
                <li><a href="#">없음</a></li>
                <?php
                }?>
              </ul>
            </div>
            <div class="content-box recent_qna board">
              <h3 class="p bold">최근 질문</h3>
              <ul>
                <?php
                if(count($qnaArr) > 0) {
                  foreach($qnaArr as $ar) {
                ?>
                <li><a href="#"><?php
                  
                  $str = $ar->title; 
                  $returnStr = '';
                  $maxLength = 25;
                  if (mb_strlen($str) >= $maxLength) {
                    $returnStr = mb_substr($str, 0, $maxLength - 3) . '...';
                  } else {
                    $returnStr = $str;
                  }
                  echo $returnStr;
                  ?></a></li>
                
                <?php
                  }} else {
                    ?>
                    <li><a href="#">없음</a></li>
                    <?php
                  }
                ?>
              </ul>
            </div>
            <div class="content-box recent_msg board">
              <h3 class="p bold">최근 메시지</h3>
              <ul>
              <?php
                if(isset($msgArr)) {
                  foreach($msgArr as $ma) {
                ?>
                <li><a href="#"><?php
                  $str = $ma->content; 
                  $returnStr = '';
                  $maxLength = 25;
                  if (mb_strlen($str) >= $maxLength) {
                    $returnStr = mb_substr($str, 0, $maxLength - 3) . '...';
                  } else {
                    $returnStr = $str;
                  }
                  echo $returnStr;
                  ?></a></li>
                <?php
                  }} else {
                ?>
                <li><a href="#">없음</a></li>
                <?php
                }?>
              </ul>
            </div>
            
            
            <div class="content-box course_progress board nowrap">
              <h3 class="p bold">강의별 진도율</h3>
              <div div class="chart-container">
                <canvas id="bar-chart"></canvas>
              </div>
            </div>
          </div>
        </section>
        <div class="message_modal modal fade" id="modal_name_modify" tabindex="-1" aria-labelledby="modal_name_modify_Label" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_name_modify_Label">메시지 전송</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="index_modify_name.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                      <label for="input_name_modify" class="col-form-label">현재 닉네임:</label>
                      <input type="text" class="form-control" id="input_name_modify" name="input_name_modify" value="<?=$member->username?>">
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                  <button type="submit" class="btn btn-primary">닉네임 변경</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="message_modal modal fade" id="modal_pw_modify" tabindex="-1" aria-labelledby="modal_pw_modify_Label" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_pw_modify_Label">메시지 전송</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="index_modify_pw.php" method="POST">
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="input_pw_modify" class="col-form-label">변경할 비밀번호 입력:</label>
                    <input type="password" class="form-control" id="input_pw_modify" name="input_pw_modify">
                  </div>
                  <!-- <div class="mb-3">
                    <label for="input_pw_modify_confirm" class="col-form-label">비밀번호 확인</label>
                    <input type="password" class="form-control" id="input_pw_modify_confirm">
                  </div> -->
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                <button type="submit" class="btn btn-primary">비밀번호 변경</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/rightSide.php';    
  ?>