<?php
  $title = 'Dashboard';
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_dash.css"/>';
  $cssRoute3 = '';
  $cssRoute4 = '';
  $script2 = '<script defer src="/helloworld/user/js/mypage_index.js"></script>';
  $script3 ='';
  $script4 ='';
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

$qnaSql = "SELECT title from qna ORDER BY idx DESC LIMIT 4";
$qnaResult = $mysqli->query($qnaSql);
while( $qnaRs = $qnaResult->fetch_object()){
  $qnaArr [] = $qnaRs;
};
// $msgSql = "SELECT * from msg WHERE mid='{$member->mid}' ORDER BY msgidx DESC LIMIT 4";
// $msgResult = $mysqli->query($msgSql);
// while( $msgRs = $msgResult->fetch_object()){
//   $msgArr [] = $msgRs;
// };

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
              <?php
                if(isset($msgArr)) {
                  foreach($msgArr as $ma) {
                ?>
                <li><a href="#"><?=$ma->content?></a></li>
                <?php
                  }} else {
                ?>
                <li><a href="#">없음</a></li>
                <?php
                }?>
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
                }else {
                ?>
                <li><a href="#">없음</a></li>
                <?php
                }?>
              </ul>
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