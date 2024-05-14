<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  jquery-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer"> <!--jquery ui-->

    <!-- font google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- swiper -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="/helloworld/user/css/common.css">
    <link rel="stylesheet" href="/helloworld/user/css/login.css">

    <?=$cssRoute1?>
    <?=$cssRoute2?>
    <?=$script1?>
    <title><?=$title?> | Hello World</title>
    
</head>
<body>

    <!-- Modal -->
    <div
      class="modal fade"
      id="login_modal"
      tabindex="-1"
      aria-labelledby="login_modal_label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="login_modal_label">modal title</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <main class="d-flex flex-column align-items-center">
              <div id="login_logo">
                <a href="#"
                  ><img
                    src="/helloworld/user/img/logo_text_X2.jpg"
                    alt="logo.jpg"
                /></a>
              </div>
              <form
                action="/helloworld/user/login/login_ok.php"
                method="POST"
                class="d-flex flex-column align-items-start"
                novalidate
              >
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="login_id"
                    name="login_id"
                    placeholder="Id"
                  />
                  <label for="login_id">ID</label>
                </div>
                <div class="form-floating">
                  <input
                    type="password"
                    class="form-control"
                    id="login_pw"
                    name="login_pw"
                    placeholder="Password"
                  />
                  <label for="login_pw">Password</label>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                  </div>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label
                    class="form-check-label lightgray"
                    for="flexCheckDefault"
                  >
                    아이디 기억하기
                  </label>
                </div>
                <div class="position-relative kakao">
                  <button type="submit" class="btn btn-warning kakao bold">
                    <img src="/helloworld/user/img/kakao.svg" alt="" />
                    카카오로 시작하기
                  </button>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                  </div>
                </div>
                <div class="position-relative">
                  <button type="submit" class="btn btn-primary login">
                    로그인
                  </button>
                  <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                  </div>
                </div>
              </form>
              <div class="find lightgray h6">
                <span><a href="">아이디 찾기</a></span
                ><span><a href="">비밀번호 찾기</a></span>
              </div>
              <span class="lightgray h6"><a href="/helloworld/user/signup/signup.php">회원 가입</a></span>
            </main>
          </div>
          <!-- <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->
        </div>
      </div>
    </div>
<header>
  <div class="header_con d-flex container jcsb aic">
      <a href="/helloworld/user/index.php" class="left_menu">
          <h1 id=header_logo>logo</h1>
          <img src="/helloworld/user/img/logo_text.jpg" alt="Hello World 로고">
      </a>
        <div class="center_menu d-flex aic bold h4 mb-0">
          <a href="/helloworld/user/class/course_list.php">강의</a>
          <a href="/helloworld/user/notice/notice.php">공지사항</a>
          <a href="/helloworld/user/qna/qna.php">Q&amp;A</a>
        </div>
        <div class="right_menu d-flex aic h4 mb-0">
          <?php
            if (isset($_SESSION['UID'])) {
          ?>
          <div class="icons d-flex align-items-center">
              <a href="#" class="bi bi-cart"><span>장바구니</span></a>
              <div class="profile_hoverBox">
                <a href="/helloworld/user/mypage/index.php" class="bi bi-person-circle">
                  <span>프로필</span>
                </a>
                <ul class="profile_hoverList content-box">
                  <li><a href="/helloworld/user/mypage/index.php">대시 보드</a></li>
                  <li><a href="/helloworld/user/mypage/courses.php">수강 강의</a></li>
                  <li><a href="/helloworld/user/mypage/coupons.php">쿠폰함</a></li>
                  <li><a href="/helloworld/user/mypage/qna.php">Q&A</a></li>
                  <li><a href="/helloworld/user/mypage/msg.php">메시지</a></li>
                </ul>
              </div>
          </div>
          <div class="d-flex bt">
                    <!-- <button
              type="button"
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#login_modal"
            >
              Launch demo modal3
            </button> -->
            <a href="/helloworld/user/login/logout.php" class="btn btn-primary btn-sm logout">로그아웃</a>              
              
            <?php
              } else {  
            ?>
              <button type="button" class="btn btn-primary btn-sm login-btn" href="#" role="button" data-bs-toggle="modal" data-bs-target="#login_modal">로그인</button>
              <a type="button" class="btn btn-primary btn-sm member" href="/helloworld/user/signup/signup.php" role="button">회원가입</a>
            <?php
            }?>

          </div>
        </div>
      
  </div>
</header>