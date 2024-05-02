<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';

// 질문 ID 받아오기
$qna_id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE qna SET view = view + 1 WHERE idx = $qna_id";
$result = $mysqli->query($sql);

// 질문 데이터 가져오기
$sql = "SELECT * FROM qna WHERE idx = '$qna_id'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

// 이전 공지사항 ID 가져오기
$sql_prev = "SELECT MAX(idx) AS prev_id FROM qna WHERE idx < $qna_id";
$result_prev = $mysqli->query($sql_prev);
$row_prev = $result_prev->fetch_assoc();
$prev_id = $row_prev['prev_id'];

// 다음 공지사항 ID 가져오기
$sql_next = "SELECT MIN(idx) AS next_id FROM qna WHERE idx > $qna_id";
$result_next = $mysqli->query($sql_next);
$row_next = $result_next->fetch_assoc();
$next_id = $row_next['next_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
    integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
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
      .cancle-btn{
            width: 105px;
            height: 48px;
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
        .btn-success{
          width: 100px;
        }
        .reply{
          gap: 27px;
          align-items: center;
        }
        .reply_control{
          width: 800px;
        }
    </style>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php'; ?>
    <h2>질의 응답</h2>
    <div class="regist">
        <div class="mb-3 d-flex title">
            <p class="tt">제목</p>
            <p class="question"><?= $row['title']; ?></p>
            <div class="pos d-flex">
                <p class="lock d-flex">작성자: <?= $row['name']; ?></p>
                <p>조회수: <?= $row['view'];?></p>
                <p>답변: <?= $row['reply'];?></p>
                <!-- <span class="material-symbols-outlined">lock</span> -->
                <p><?= $row['date']; ?></p>
                <p>
                    <a href="qna_delete.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </p>
            </div>
        </div>
        <div class="mb-3 d-flex con">
            <p>내용</p>
            <p><?= $row['content']; ?></p>
        </div>
        <!-- 첨부 파일 출력 부분 -->
        <div class="d-flex file">
            <p>첨부 파일</p>
            <?= $row['files']; ?>
            <img src="" alt="" class="img"> 
        </div>
        <hr>
        <!-- 댓글 작성 폼 -->
        <div class="d-flex reply">
          <form id="commentForm" method="post" class="wrap justify-content-start align-item-center review">
              <input type="hidden" name="id" value="<?= $qna_id ?>">
              <textarea name="comment" class="form-control reply_control" placeholder="내용을 추가하시오."></textarea>
              <button type="submit" class="btn btn-success">댓글 쓰기</button>
          </form>
        </div>
        <!-- <div class="d-flex reply">
            <form method="post" class="wrap justify-content-start align-item-center review"></form>
            <input type="hidden" name="post_id" value="168">
            <input type="hidden" name="parent_comment_id" value="0">
            <input type="hidden" name="depth" value="0">
            <img src="" alt="">
            <textarea name="comment" class="form-control reply_control" placeholder="내용을 추가하시오."></textarea>
            <button type="button" class="btn btn-success">댓글 쓰기</button>
        </div> -->
        <hr>
    </div>
    <div class="notice-btn d-flex">
          <div class="left-button">
            <?php if ($prev_id !== null) : ?>
              <a href="qna_detail.php?id=<?= $prev_id; ?>" class="btn btn-primary">이전</a>
            <?php else : ?>
              <a href="#" class="btn btn-primary disabled">이전</a>
            <?php endif; ?>

            <?php if ($next_id !== null) : ?>
              <a href="qna_detail.php?id=<?= $next_id; ?>" class="btn btn-primary">다음</a>
            <?php else : ?>
              <a href="#" class="btn btn-primary disabled">다음</a>
            <?php endif; ?>
          </div>
          <div class="right-button">
            <button type="button" class="btn btn-danger cancle-btn">닫기</button>
          </div>
        </div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php'; ?>
    <!-- 기존 script 태그 내용 -->
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

    
  </body>
  <script>
    $(document).ready(function(){
      $('#summernote').summernote();

      $('#commentForm').submit(function(e) {
        e.preventDefault(); // 폼의 기본 제출 동작을 막습니다.
        
        var formData = $(this).serialize(); // 폼 데이터를 시리얼라이즈합니다.
        
        $.ajax({
            type: 'POST',
            url: 'qna_save_reply.php', // 댓글 저장을 처리할 PHP 파일 경로
            data: formData,
            success: function(response) {
                // 댓글 저장 성공 시 처리할 코드 작성
                alert('댓글이 성공적으로 저장되었습니다.');
                $('#commentForm textarea').val(''); // 댓글 입력 필드 초기화
                // 댓글 목록을 업데이트하는 코드 작성
            },
            error: function(xhr, status, error) {
                // 댓글 저장 실패 시 처리할 코드 작성
                alert('댓글 저장에 실패했습니다. 다시 시도해주세요.');
            }
        });
    });
    });
    $('.cancle-btn').click(function(e){
      e.preventDefault();
      location.href = 'qna.php';
    });
    let documentHeight = Math.max(
      document.body.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.clientHeight,
      document.documentElement.scrollHeight,
      document.documentElement.offsetHeight
    );
    document.querySelector('header').style.height = documentHeight + 'px';
  </script>
</body>
</html>