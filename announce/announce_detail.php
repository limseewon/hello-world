<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';

// 공지사항 ID 받아오기
$notice_id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE notice SET view = view + 1 WHERE idx = $notice_id";
$result = $mysqli->query($sql);


// 공지사항 데이터 가져오기
$sql = "SELECT * FROM notice WHERE idx = $notice_id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
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
        .contents-box{
            width: 100%;
            height: auto;
        }
        .btn {
            width: 105px;
            height: 48px;
        }
        .notice-btn{
            padding-top: 65px;
            justify-content: space-between;
        }
        .title-box{
          width: 883px;
          height: 40px;
        }
        .con-box{
          width: 1170px; 
          height: 505px;
        }
        .input-group > .form-control{
          position: none;
          flex: none;
          width: 560px;
          height: 40px;
        }
        .title{
          gap: 70px;
          align-items: center;
          padding-left: 60px;
          padding-top: 26px;
        }
        .con{
          gap: 100px;
          align-items: center;
          padding-left: 60px;
          padding-top: 35px;
        }
        .file{ 
          gap: 65px;
          padding-left: 60px;
          padding-top: 35px;
        }

        .regist{
          /* width: 100%; */
          height: auto;
          background: #fff;
          padding: 20px;
          border: 1px solid #ced4da;
        }
        .btn{
          width: 100px;
          height: 35px;
        }
        .right-button{
          padding-left: 250px;
        }
        .comments{
          padding-left: 60px;
          align-items: center;
        }
        .lock{
        align-items: center;
        gap: 10px;
      }
      .question{
        padding-right: 550px;
      }
      .img{
        padding-left: 200px;
      }
      .reply{
        padding-right: 1270px;
      }
        .review .btn{
          white-space: nowrap;
        }  
        .form-control {
            display: block;
            width: 100%;
            height: 45px;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: .15s ease-in-out .15s ease-in-out;
        } 
        .tt{
            padding-right:30px;
        }
        .pos{
            right: 100px;
            position: absolute;
            align-items: center;
            gap:45px;
        }
        .edit{
            padding-right: 10px;
        }

    </style>
  </head>
  <body>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
            <h2>공지 사항</h2>
            <div class="regist">
        <div class="mb-3 d-flex title">
            <p class="tt">제목</p>
            <p class="question"><?= $row['title']; ?></p>
            <div class="pos d-flex">
                <p><?= $row['name']; ?>
                <!-- <span class="material-symbols-outlined">lock</span> -->
                </p>
                <p><?= $row['regdate']; ?></p>
                <p>
                  <a href="qna_modify.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 수정하시겠습니까?');">
                        <span class="material-symbols-outlined">
                            border_color
                        </span>
                    </a>
                    <a href="qna_delete.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </p>
            </div>
        </div>
        <div class="mb-3 d-flex con">
            <p>내용</p>
            <?= $row['content']; ?>
        </div>
        <!-- 첨부 파일 출력 부분 -->
        <div class="d-flex file">
            <p>첨부 파일</p>
            <p>logo.png</p>
            <img src="" alt="" class="img"> 
        </div>
        </div>
        <div class="notice-btn d-flex">
          <div class="left-button">   
            <button type="button" class="btn btn-primary">이전</button>
            <button type="button" class="btn btn-primary">다음</button>
          </div>
          <div class="right-button">
            <button type="submit" class="btn btn-success edit-btn">수정</button>
            <button type="button" class="btn btn-danger cancle-btn">닫기</button>
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

    $('.cancle-btn').click(function(e){
      e.preventDefault();
      history.back();
      // if (confirm('닫으시겠습니까? :0')){
      //   history.back();
      // }
    });
  </script>
</html>