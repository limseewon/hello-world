<?php
$title = 'mypage';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_left.css"/>';

include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';
?>
    <section class="main">
      <section class="mainWrapper d-flex justify-content-center">
        <section class="leftside content-box d-flex flex-column align-items-center">
          <h2>마이 페이지</h2>
          <ul class="d-flex flex-column align-items-center">
            <li class="h4"><a href="/helloworld/user/mypage/mypage_dash.php">대시 보드</a></li>
            <li class="h4"><a href="/helloworld/user/mypage/mypage_courses.php">수강 강의</a></li>
            <li class="h4"><a href="/helloworld/user/mypage/mypage_coupons.php">쿠폰함</a></li>
            <li class="h4"><a href="/helloworld/user/mypage/mypage_qna.php">Q&A</a></li>
            <li class="h4"><a href="/helloworld/user/mypage/mypage_msg.php">메시지</a></li>
          </ul>
        </section>
        