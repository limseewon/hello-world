<?php
$title = $title . ' | mypage';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_left.css"/>';
$script1= '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/login/login_check.php';

?>
    <section class="main">
      <section class="mainWrapper d-flex justify-content-center">
        <section class="leftside content-box d-flex flex-column align-items-center">
          <h2>마이 페이지</h2>
          <ul class="d-flex flex-column align-items-start">
            <li class="h4 my_dash"><a href="/helloworld/user/mypage/index.php">대시 보드</a></li>
            <li class="h4 my_course"><a href="/helloworld/user/mypage/courses.php">내 강의</a></li>
            <li class="h4 my_coupon"><a href="/helloworld/user/mypage/coupons.php">쿠폰함</a></li>
            <li class="h4 my_qna"><a href="/helloworld/user/mypage/qna.php">Q&A</a></li>
            <li class="h4 my_msg"><a href="/helloworld/user/mypage/msg.php">메시지</a></li>
          </ul>
        </section>
          