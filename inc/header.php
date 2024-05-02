<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
?>

    <section class="main_wrapper d-flex">
      <header>
        <section class="headerContainer">
          <div class="d-flex justify-content-center" id="logo">
            <h1>logo</h1>
            <img src="/helloworld/img/logo.png" alt="logo.jpg"/>
          </div>
          <div class="gnb">
            <ul class="d-flex flex-column">
              <li>
                <a href="/helloworld/admin/index.php">
                  <span class="material-symbols-outlined"> dashboard </span>
                  <span>대시 보드</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/announce/announce.php">
                  <span class="material-symbols-outlined"> assignment </span>
                  <span>공지 사항</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/class/course_list.php">
                  <span class="material-symbols-outlined"> live_tv </span>
                  <span>강의 관리</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/admin/member/member_mg.php">
                  <span class="material-symbols-outlined"> face </span>
                  <span>회원 관리</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/coupon/coupon_list.php">
                  <span class="material-symbols-outlined"> local_atm </span>
                  <span>쿠폰 관리</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/review/review.php">
                  <span class="material-symbols-outlined"> bar_chart </span>
                  <span>수강평</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/qna/qna.php">
                  <span class="material-symbols-outlined"> help </span>
                  <span>질의 응답</span>
                </a>
              </li>
              <li>
                <a href="/helloworld/admin/login.php">
                  <span class="material-symbols-outlined"> logout </span>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </section>
      </header>
      <section class="content_wrapper">
        <div class="top_section d-flex justify-content-end">
          <div class="profile d-flex align-items-center">
            <span class="material-symbols-outlined">account_circle</span>
            <div class="d-flex flex-column manager">
              <span>관리자</span>
              <span>코딩좋아</span>
            </div>
            <span class="material-symbols-outlined">notifications</span>
            <!-- <span>jsdafjo@naver.com</span> -->
          </div>
        </div>
        <div class="main">
          <div class="main_container">
          