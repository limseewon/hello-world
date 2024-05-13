<?php
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_courses.css"/>';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/mypage_left.php';    
?>
        <section class="mainContainer">
          <h2 class="title">수강 강의</h2>
          <div class="mainContents">
            <div class="Expired"><h3>만료 예정 강의</h3></div>
            <div class="courses"><h3>내 강의</h3></div>
          </div>
        </section>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/mypage_right.php';    
  ?>