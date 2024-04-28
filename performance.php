<?php
session_start();
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HelloWorld</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0"
    />
    <!-- normalize css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!--bootstrap css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
      integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- tabler-icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />

    <!-- jquery ui css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
      integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- 스포카 -->
    <!-- <link
      href="//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSansNeo.css"      
      rel="stylesheet"
      type="text/css"
    /> -->

    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="/helloworld/css/common.css" />
    <link rel="stylesheet" href="/helloworld/css/index.css" />
    <style>

    </style>
  </head>
  <body>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
              <h2 class="result-text h2">성과 분석</h2>
              <div class="result_box_top">
                <div class="">
                  <h2 class="content-title">5월 매출 베스트 강좌</h2>
                  <div class="contents-box d-flex">
                    <div class="box">
                      <img src="/img/front-best-lecture.png" alt="#" title="front-best-recture" id="best-lecture-img" />
                      <h3 id="best-lecture-title"> 프론트엔드</h3>
                      <p id="best-lecture-p">프론트엔드 웹 개발의 모든 것 초격차 패키지 Online.</p>
                      <button type="button" class="btn btn-primary" id="lecture-go">강의 보러 가기</button>
                    </div>
                    <div class="box">
                      <img src="/img/back-best-lecture.png" alt="#" title="back-best-lecture" id="best-lecture-img" />
                      <h3 id="best-lecture-title">백엔드</h3>
                      <p id="best-lecture-p">시그니처 백엔드 Path 초격차 패키지 Online.</p>
                      <button type="button" class="btn btn-primary" id="lecture-go">강의 보러 가기</button>
                    </div>
                    <div class="box">
                      <img src="/img/devops-best-lecture.png" alt="#" title="devops-best-recture" id="best-lecture-img" />
                      <h3 id="best-lecture-title">DevOps/Infra Best</h3>
                      <p id="best-lecture-p">한번에 끝내는 CI/CD의 모든 것 Docker부터 GitOps까지.</p>
                      <button type="button" class="btn btn-primary" id="lecture-go">강의 보러 가기</button>
                    </div>
                  </div>
                  <h2 class="content-title">누적 조회수 베스트 강좌</h2>
                  <div class="contents-box d-flex">
                    <div class="box">
                      <img src="/img/many-view.png" alt="#" title="many-view-recture" id="many-view" />
                      <button type="button" class="btn btn-primary" id="lecture-go">강의 보러 가기</button>
                    </div>
                  </div>   
                </div>
              <div class="result_box_bottom d-flex justify-content-between">
                <div class="">
                  <h2 class="content-title">가입 / 탈퇴 회원</h2>
                  <div class="contents-box d-flex">
                    <div class="box">
                      
                    </div>
                  </div>
                  <h2 class="content-title">누적 조회수 베스트 강좌</h2>
                  <div class="contents-box d-flex">
                    <div class="box">
                      
                    </div>
                  </div>   
                </div>
              </div>
              <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
              ?>
    <!-- jquery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
      integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- jqueryui js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
      integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- bootstrap js -->

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"
      integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- modernizr js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
      referrerpolicy="no-referrer"
    ></script>

    <script src="js/common.js"></script>
  </body>
  <script>
    let documentHeight = Math.max(
      document.body.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.clientHeight,
      document.documentElement.scrollHeight,
      document.documentElement.offsetHeight
    );
    document.querySelector('header').style.height = documentHeight + 'px';
  </script>
</html>
