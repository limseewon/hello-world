<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';

// 질문 ID 받아오기
$qna_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 조회수 증가
if ($qna_id > 0) {
  $sql = "UPDATE qna SET view = view + 1 WHERE idx = $qna_id";
  $result = $mysqli->query($sql);
}

// 질문 데이터 가져오기
if ($qna_id > 0) {
  $sql = "SELECT * FROM qna WHERE idx = '$qna_id'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
}

// 이전 공지사항 ID 가져오기
if ($qna_id > 0) {
  $sql_prev = "SELECT MAX(idx) AS prev_id FROM qna WHERE idx < $qna_id";
  $result_prev = $mysqli->query($sql_prev);
  $row_prev = $result_prev->fetch_assoc();
  $prev_id = $row_prev['prev_id'];
}

// 다음 공지사항 ID 가져오기
if ($qna_id > 0) {
  $sql_next = "SELECT MIN(idx) AS next_id FROM qna WHERE idx > $qna_id";
  $result_next = $mysqli->query($sql_next);
  $row_next = $result_next->fetch_assoc();
  $next_id = $row_next['next_id'];
}

// 댓글 목록 가져오기
if ($qna_id > 0) {
  $sql = "SELECT * FROM qna_comment WHERE idx = '$qna_id' ORDER BY idx DESC";
  $result = $mysqli->query($sql);
}
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
      header {
        height: 100vh;
      }

      .notice-btn {
        padding-top: 20px;
        justify-content: space-between;
      }

      .title-box {
        width: 883px;
        height: 40px;
      }

      .con-box {
        width: 1170px;
        height: 505px;
      }

      .input-group > .form-control {
        position: none;
        flex: none;
        width: 560px;
        height: 40px;
      }

      .title {
        gap: 70px;
        align-items: center;
        padding-left: 60px;
        padding-top: 26px;
      }

      .con {
        gap: 70px;
        align-items: flex-start;
        padding-left: 60px;
        padding-top: 35px;
      }
      .con p {
        display: flex;
        color: #333;
        margin-right: 30px;
      }
      .content-wrapper{
        width: 1275px;
      }
      .file {
        gap: 65px;
        padding-left: 60px;
        padding-top: 35px;
        padding-bottom: 35px;
      }


      .regist {
        /* width: 100%; */
        height: auto;
        background: #fff;
        padding: 20px;
        border: 1px solid #ced4da;
      }

      .btn {
        width: 100px;
        height: 35px;
      }

      .right-button {
        padding-left: 250px;
      }

      .comments {
        padding-left: 60px;
        align-items: center;
      }

      .lock {
        align-items: center;
        /* gap: 10px; */
      }

      .question {
        padding-right: 550px;
      }

      .img {
        padding-left: 200px;
      }

      .cancle-btn {
        width: 105px;
        height: 35px;
      }

      .review .btn {
        white-space: nowrap;
      }

      .review {
        gap: 20px;
        padding-top: 20px;
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
        transition: 0.15s ease-in-out 0.15s ease-in-out;
      }

      .tt {
        padding-right: 30px;
      }

      .pos {
        right: 100px;
        position: absolute;
        align-items: center;
        gap: 45px;
      }

      .edit {
        padding-right: 10px;
      }

      .btn-success {
        width: 100px;
      }

      .reply {
        gap: 27px;
        align-items: center;
      }

      .reply_control {
        width: 800px;
      }

      .comment-list {
        margin-top: 30px;
      }

      .comment-item {
        background-color: #f8f9fa;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        width: 800px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
      }

      .comment-author {
        font-weight: bold;
        color: #333;
      }

      .comment-date {
        color: #888;
        font-size: 14px;
      }

      .comment-content {
        margin-bottom: 10px;
        color: #555;
      }

      .comment-actions {
        display: flex;
        justify-content: flex-end;
      }

      .comment-actions a {
        margin-left: 10px;
        color: #007bff;
        text-decoration: none;
      }

      .comment-actions a:hover {
        text-decoration: underline;
      }

      .material-symbols-outlined {
        vertical-align: middle;
        margin-right: 5px;
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
                  <p>조회수: <?= $row['view']; ?></p>
                  <p>답변: <?= $row['reply']; ?></p>
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
              <div class="content-wrapper">
                <?= $row['content']; ?>
              </div>
          </div>
          <!-- 첨부 파일 출력 부분 -->
          <div class="d-flex file">
              <p>첨부 파일</p>
              <?= $row['files']; ?>
              <img src="" alt="" class="img">
          </div>
      </div>
      <hr>
      <div class="notice-btn d-flex ">
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
            <button type="submit" class="btn btn-danger cancle-btn">닫기</button>
          </div>
        </div>
        <hr>
        <div class="comment-list">
          <?php if ($result && $result->num_rows > 0) : ?>
            <?php while ($comment = $result->fetch_assoc()) : ?>
              <div class="comment-item">
                <div class="comment-header">
                  <span class="comment-author"><?= $comment['name'] ?></span>
                  <span class="comment-date"><?= $comment['regdate'] ?></span>
                </div>
                <div class="comment-content"><?= $comment['comment'] ?></div>
                <div class="comment-actions">
                  <!-- <a href="#" class="edit-comment" data-comment-id="<?= $comment['id'] ?>" data-comment-content="<?= $comment['comment'] ?>">
                    <span class="material-symbols-outlined">border_color</span>
                  </a> -->
                  <a href="qna_reply_delete.php?id=<?= $comment['id'] ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                    <span class="material-symbols-outlined">delete</span>
                  </a>
                </div>      
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <p>질문에 대답하십시오.</p>
          <?php endif; ?>
        </div>
        </div>
        <!-- 댓글 작성 폼 -->
        <div class="comment-form">
          <form action="qna_save_reply.php" id="commentForm" method="post" class="wrap d-flex justify-content-start align-item-center review">
            <input type="hidden" name="name" value="<?= $_SESSION['AUNAME'] ?>">
            <input type="hidden" name="id" value="<?= $qna_id ?>">
            <div class="mb-3">
              <textarea name="comment" class="form-control reply_control" placeholder="댓글을 입력하세요."></textarea>
            </div>
            <button type="submit" class="regis_btn btn btn-primary">댓글 쓰기</button>
          </form>
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
$(document).ready(function() {
  // 댓글 삭제 버튼 클릭 이벤트 처리
  $('.comment-actions a[href^="qna_reply_delete.php"]').click(function(e) {
    e.preventDefault();
    var deleteUrl = $(this).attr('href');

    if (confirm('정말 삭제하시겠습니까?')) {
      $.get(deleteUrl, function(response) {
        // 댓글 삭제 성공 시 해당 댓글 폼 제거
        $(e.target).closest('.comment-item').remove();
        alert('댓글이 삭제되었습니다.');

        // 댓글 개수 확인 및 reply 값 업데이트
        var commentCount = $('.comment-item').length;
        var qnaId = <?= $qna_id ?>;
        var replyStatus = commentCount > 0 ? '답변' : '미답변';
        $.get('update_reply.php?qna_id=' + qnaId + '&reply=' + replyStatus);
      }).fail(function() {
        alert('댓글 삭제에 실패했습니다.');
      });
    }
  });

  // 댓글 수정 버튼 클릭 이벤트 처리
  $('.edit-comment').click(function(e) {
    e.preventDefault();
    var commentId = $(this).data('comment-id');
    var commentContent = $(this).data('comment-content');

    $('#commentForm input[name="comment_id"]').val(commentId);
    $('#commentForm textarea[name="comment"]').val(commentContent);
    $('#commentForm button[type="submit"]').text('댓글 수정');

    $('html, body').animate({
      scrollTop: $('#commentForm').offset().top
    }, 500);
  });

  // 닫기 버튼 클릭 이벤트 처리
  $('.btn-danger.cancle-btn').click(function(e) {
  e.preventDefault();
  location.href = 'qna.php';
});

  // 페이지 로드 시 댓글 개수에 따라 reply 값 업데이트
  var qnaId = <?= $qna_id ?>;
  if (qnaId > 0) {
    var commentCount = $('.comment-item').length;
    var replyStatus = commentCount > 0 ? '답변' : '미답변';
    $.get('update_reply.php?qna_id=' + qnaId + '&reply=' + replyStatus);
  }
});
</script>
</body>
</html>