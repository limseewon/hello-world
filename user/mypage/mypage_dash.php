<?php
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_dash.css"/>';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/mypage_left.php';     
    
$userid = $_SESSION['UID'];
$midSql = "SELECT * FROM members WHERE userid = '{$userid}'";
$mid_result = $mysqli->query($midSql);
$member = $mid_result->fetch_object();


$notice_sql = "SELECT title from notice ORDER BY idx DESC LIMIT 4";
$notice_result = $mysqli->query($notice_sql);
while( $notice_rs = $notice_result->fetch_object()){
  $noticeArr [] = $notice_rs;
};

$qnaSql = "SELECT title from qna ORDER BY idx DESC LIMIT 4";
$qnaResult = $mysqli->query($qnaSql);
while( $qnaRs = $qnaResult->fetch_object()){
  $qnaArr [] = $qnaRs;
};
$msgSql = "SELECT * from msg WHERE mid='{$member->mid}' ORDER BY idx DESC LIMIT 4";
$msgResult = $mysqli->query($msgSql);
while( $msgRs = $msgResult->fetch_object()){
  $msgArr [] = $msgRs;
};

$courseSql = "SELECT c.name from courses c JOIN ordered_courses oc ON c.cid = oc.course_id WHERE oc.member_id = '{$member->mid}' LIMIT 4";
$courseResult = $mysqli->query($courseSql);
while( $courseRs = $courseResult->fetch_object()){
  $courseArr [] = $courseRs;
};

?>
        <section class="mainContainer">
          <h2 class="title">대시 보드</h2>
          <div class="mainContents">
            <div class="d-flex flex-column justify-content-center align-items-center content-box profile_box">
              <div class="d-flex justify-content-start align-items-center profile_info">
                <div class="d-flex flex-column align-items-center profile_img_con">
                  <img src="/user/img/person-square.svg" alt="profile_image" />
                  <button class="btn btn-secondary">프로필 변경</button>
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
                <button class="btn btn-secondary">닉네임 변경</button>
                <button class="btn btn-secondary">비밀번호 변경</button>
              </div>
            </div>
            <div class="content-box attendance_box">
              <h3 class="p bold">5월 출석 현황</h3>
              <div class="calandar">달력</div>
            </div>
            <div class="content-box recent_qna board">
              <h3 class="p bold">최근 질문</h3>
              <ul>
                <?php
                if(count($qnaArr) > 0) {
                  foreach($qnaArr as $ar) {
                ?>
                <li><a href="#"><?= $ar->title?></a></li>
                
                <?php
                  }} else {
                    ?>
                    <li><a href="#">없음</a></li>
                    <?php
                  }
                ?>
              </ul>
            </div>
            <div class="content-box mycourses board">
              <h3 class="p bold">수강 강의</h3>
              <ul>
                <?php
                if(isset($courseArr)) {
                  foreach($courseArr as $ca) {
                ?>
                <li><a href="#"><?=$ca->name;?></a></li>
                <?php
                  }} else {
                ?>
                <li><a href="#">없음</a></li>
                <?php
                }?>
              </ul>
            </div>
            <div class="content-box recent_msg board">
              <h3 class="p bold">최근 메시지</h3>
              <ul>
                <li><a href="#">질문입니다.</a></li>
                <li><a href="#">질문입니다.</a></li>
                <li><a href="#">질문입니다.</a></li>
                <li><a href="#">질문입니다.</a></li>
              </ul>
            </div>
            <div class="content-box course_progress board">
              <h3 class="p bold">강의별 진도율</h3>
              <div class="chart">차트</div>
            </div>
            <div class="content-box recent_notice board">
              <h3 class="p bold">최근 공지사항</h3>
              <ul>
                <?php
                if (isset($noticeArr)) {
                  foreach($noticeArr as $na) {

                  
                ?>
                <li><a href="#"><?= $na->title;?></a></li>
                <?php
                }
              }
                ?>
              </ul>
            </div>
          </div>
        </section>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/mypage_right.php';    
  ?>