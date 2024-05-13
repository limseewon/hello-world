<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/helloworld/user/css/common.css">
    <link rel="stylesheet" href="/helloworld/user/css/login.css">
    
    <?=$cssRoute1?>
    <?=$cssRoute2?>
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
            <h1 class="modal-title fs-5" id="login_modal_label">title</h1>
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
              <span class="lightgray h6"><a href="">회원 가입</a></span>
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
            <a href="#">강의</a>
            <a href="#">공지사항</a>
            <a href="#">Q&amp;A</a>
          </div>
          <div class="right_menu d-flex aic h4 mb-0">
            <?php
              if (!isset($_SESSION['UID'])) {
            ?>
            <div class="icons d-flex">
                <a href="#" class="bi bi-cart"></a>
                <a href="#" class="bi bi-person-circle"></a>
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
              
                <button type="button" class="btn btn-primary btn-sm login-btn" href="#" role="button" data-bs-toggle="modal" data-bs-target="#login_modal">로그인</button>
                <a type="button" class="btn btn-primary btn-sm member" href="/helloworld/user/signin.php" role="button">회원가입</a>
              <?php
                } else {  
              ?>
<a href="/helloworld/user/login/logout.php" class="btn btn-primary btn-sm logout">로그아웃</a>
              <?php
              }?>

            </div>
          </div>
        </div>
    </div>
</header>