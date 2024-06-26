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

// 이전 공지사항 ID 가져오기
$sql_prev = "SELECT MAX(idx) AS prev_id FROM notice WHERE idx < $notice_id";
$result_prev = $mysqli->query($sql_prev);
$row_prev = $result_prev->fetch_assoc();
$prev_id = $row_prev['prev_id'];

// 다음 공지사항 ID 가져오기
$sql_next = "SELECT MIN(idx) AS next_id FROM notice WHERE idx > $notice_id";
$result_next = $mysqli->query($sql_next);
$row_next = $result_next->fetch_assoc();
$next_id = $row_next['next_id'];
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
.contents-box {
  width: 100%;
  height: auto;
}

.btn {
  width: 105px;
  height: 48px;
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
  gap: 100px;
  padding-left: 60px;
  padding-top: 35px;
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
  gap: 10px;
}

.question {
  padding-right: 550px;
}

.img {
  padding-left: 200px;
}

.reply {
  padding-right: 1270px;
}

.review .btn {
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

.cancle-btn {
  width: 105px;
  height: 35px;
}

.review .btn {
  white-space: nowrap;
}

.review {
  gap: 20px;
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
.announce_img{
  width: 400px;
  padding-left: 50px;
}
.notice-detail-box{
  gap: 150px;
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
                <p>작성자: <?= $row['name']; ?>
                <p>조회수: <?= $row['view'];?></p>
                <!-- <span class="material-symbols-outlined">lock</span> -->
                </p>
                <p><?= $row['regdate']; ?></p>
                <p>
                <a href="announce_modify.php?id=<?= $row['idx']; ?>" class="edit-link">
                    <span class="material-symbols-outlined">border_color</span>
                </a>
                <a href="announce_delete.php?id=<?= $row['idx']; ?>" class="delete-link">
                    <span class="material-symbols-outlined">delete</span>
                </a>
                </p>
            </div>
          </div>
          <div class="mb-3 d-flex con">
              <p>내용</p>
              <div class="notice-detail-box d-flex">
                  <div class="notice-content">
                      <?= $row['content']; ?>
                  </div>
                  <?php if (!empty($row['image'])) : ?>
                      <div class="notice-image">
                          <img src="/helloworld/announce/uploads/<?= $row['image']; ?>" alt="공지사항 이미지" class="announce_img">
                      </div>
                  <?php endif; ?>
              </div>
          </div>
          <!-- 첨부 파일 출력 부분 -->
          <?php if (!empty($row['file'])) : ?>
            <div class="d-flex file">
              <p>첨부 파일</p>
              <p><?= $row['file']; ?></p>
            </div>
          <?php endif; ?>
          <div class="notice-btn d-flex">
            <div class="left-button">
              <?php if ($prev_id !== null) : ?>
                <a href="announce_detail.php?id=<?= $prev_id; ?>" class="btn btn-primary">이전</a>
              <?php else : ?>
                <a href="#" class="btn btn-primary disabled">이전</a>
              <?php endif; ?>

              <?php if ($next_id !== null) : ?>
                <a href="announce_detail.php?id=<?= $next_id; ?>" class="btn btn-primary">다음</a>
              <?php else : ?>
                <a href="#" class="btn btn-primary disabled">다음</a>
              <?php endif; ?>
            </div>
            <div class="right-button">
              <a href="announce_modify.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 수정하시겠습니까?');" class="btn btn-success edit-btn">수정</a>
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

    
    <script src="/helloworld/js/common.js"></script>
    <script>
    $('.edit-link').click(function (e) {
        e.preventDefault();
        if (confirm('정말 수정하시겠습니까?')) {
            location.href = $(this).attr('href');
        }
    });

    $('.delete-link').click(function (e) {
        e.preventDefault();
        if (confirm('정말 삭제하시겠습니까?')) {
            location.href = $(this).attr('href');
        }
    });
    $('.cancle-btn').click(function(e){
      e.preventDefault();
      location.href = 'announce.php';
    });
  </script>
  </body>
</html>
