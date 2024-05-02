<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/helloworld/css/common.css">
    <link rel="stylesheet" href="/helloworld/css/login.css">
    <title>HelloWorld</title>

  </head>
  <body>
  <dialog class="popup">
  <h2>KEEPCODING LMS 학습사이트(포트폴리오)</h2>
  <p>
    <span>본 사이트는 구직용 포트폴리오 사이트입니다.</span>
  </p>

  <hr>

  <div class="info">
    <p><span>제작기간</span> : 2023. 08. 11 - 09. 08</p>
    <p><span>특징</span> : html, css, jQuery (Bootstrap, jQuery Library)</p>
    <p>local: Windows, XAMPP(PHP, APACHE, MYSQL) | remote : PHP, LINUX, MYSQL</p>
    <p><span>기획</span> : <a href="#" target="_blank" class="figma"><span class="font_green">발표 자료</span></a>  |  <span>코드</span> : <a href="https://github.com/rivermountain96/keepcoding/tree/main" target="_blank" class="git"><span>깃허브</span><i class="fa-brands fa-github"></i></a></p>
    <p><span>구현 완료 페이지</span> : <a href="http://keepcoding.dothome.co.kr/keepcoding/admin/login.php" target="_blank" class="dothome"><span>관리자 로그인 페이지</span></a></p>
  </div>

  <hr>

  <div class="admin">
    <p><span>관리자 아이디</span> : admin</p>
    <p><span>관리자 비밀번호</span> : 1111</p>
  </div>

  <hr>

  <div class="work">
    <p><span>팀원</span> : 정*원, 박*용, 이*산, 이*서, 최*희</p>
    <p><span>기획</span> : 전원참가(공동)</p>
    <dl>
      <dt><span>- 퍼블리싱 구현 -</span></dt>
      <dd><span>최*희</span> : 강좌관리/쿠폰등록/공지사항/Q&amp;A게시판/강사&amp;수강생 관리</dd>
      <dt><span>- 백엔드 구현 -</span></dt>
      <dd><span>박*용</span> : 강좌리스트</dd>
      <dd><span>이*산</span> : 강좌관리/강좌등록/Q&amp;A게시판</dd>
      <dt><span>- 퍼블리싱/백엔드 구현 -</span></dt>
      <dd><span>정*원</span> : 로그인/쿠폰등록/공지사항</dd>
      <dd><span>이*서</span> : 헤더/대시보드/카테고리관리/쿠폰관리</dd>
    </dl>
  </div>

  <hr>

  <div class="close_wrap d-flex justify-content-between">
    <div class="checkbox">
      <input type="checkbox" id="daycheck" class="hidden">
      <label for="daycheck">
        <i class="fa-solid fa-check"></i>
        오늘 하루 안보기
      </label>
    </div>
    <button type="button" id="close">닫기</button>
  </div>
</dialog>
    <main class="d-flex flex-column align-items-center">
      <div id="logo">
        <img src="/helloworld/img/logo.png" alt="logo.jpg" />
      </div>
      <form action="login_ok.php" method="POST" class="d-flex flex-column" novalidate>
        <div class="form-floating">
          <input type="text" class="form-control" id="userid" name="userid" placeholder="Id" />
          <label for="userid">Id</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="passwd" name="passwd" placeholder="password" />
          <label for="passwd">Password</label>
          <!-- <div class="invalid-tooltip">Please choose a unique and valid username.</div> -->
        </div>
        <div class="position-relative">
          <button type="submit" class="btn btn-primary">로그인</button>
          <!-- <div class="invalid-tooltip">Please choose a unique and valid username.</div> -->
        </div>
      </form>
      <div class="search_login">
        <span><a href="">아이디 찾기</a></span>
        <span><a href="">비밀번호 찾기</a></span>
      </div>
    </main>

    <!-- jquery -->
    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
    
    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/helloworld/js/login.js"></script>
  </body>
</html>