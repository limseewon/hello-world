<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';

// 질문 ID 받아오기
$review_id = $_GET['id'];

// 조회수 증가
$sql = "UPDATE review SET view = view + 1 WHERE idx = $review_id";
$result = $mysqli->query($sql);

// // 질문 데이터 가져오기
// $sql = "SELECT * FROM review WHERE idx = '$review_id'";
// $result = $mysqli->query($sql);
// $row = $result->fetch_assoc();

// 질문 데이터 가져오기
$sql = "SELECT r.*, c.name AS course_name FROM review r JOIN courses c ON r.cid = c.cid WHERE r.idx = '$review_id'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

// 이전 공지사항 ID 가져오기
$sql_prev = "SELECT MAX(idx) AS prev_id FROM review WHERE idx < $review_id";
$result_prev = $mysqli->query($sql_prev);
$row_prev = $result_prev->fetch_assoc();
$prev_id = $row_prev['prev_id'];

// 다음 공지사항 ID 가져오기
$sql_next = "SELECT MIN(idx) AS next_id FROM review WHERE idx > $review_id";
$result_next = $mysqli->query($sql_next);
$row_next = $result_next->fetch_assoc();
$next_id = $row_next['next_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title>HelloWorld</title>
   <link rel="stylesheet"
         href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0"/>
   <!-- normalize css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
         integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
         crossorigin="anonymous" referrerpolicy="no-referrer"/>

   <!--bootstrap css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
         integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
         crossorigin="anonymous" referrerpolicy="no-referrer"/>
   <!-- tabler-icons  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>

   <!-- jquery ui css -->
   <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
         integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
         crossorigin="anonymous" referrerpolicy="no-referrer"/>

   <!-- summernote -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
         integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
         crossorigin="anonymous" referrerpolicy="no-referrer">

   <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css"/>
   <link rel="stylesheet" href="/helloworld/css/common.css"/>
   <link rel="stylesheet" href="/helloworld/css/index.css"/>
   <style>
       .btn {
           width: 105px;
           height: 48px;
       }

       .notice-btn {
           padding-top: 65px;
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
           align-items: center;
           padding-left: 60px;
           padding-top: 35px;
       }

       .file {
           gap: 65px;
           padding-left: 60px;
           padding-top: 35px;
       }

       .regist {
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

       .cancle-btn {
           width: 105px;
           height: 48px;
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
           transition: .15s ease-in-out .15s ease-in-out;
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
       .content_p{
        padding-left: 17px;
       }
   </style>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php'; ?>
<h2>수강평</h2>
<div class="regist">
   <div class="mb-3 d-flex title">
       <p class="tt">강의명</p>
       <p><?= $row['course_name']; ?></p>
       <div class="pos d-flex">
           <p class="lock d-flex">작성자: <?= $row['name']; ?></p>
           <p>조회수: <?= $row['view']; ?></p>
           <p>점수: <?= $row['rating']; ?>/5</p>
           <p><?= $row['date']; ?></p>
           <p>
               <a href="review_delete.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                   <span class="material-symbols-outlined">delete</span>
               </a>
           </p>
       </div>
   </div>
   <div class="mb-3 d-flex con">
       <p>내용</p>
       <p class="content_p"><?= $row['content']; ?></p>
   </div>
   <div class="notice-btn d-flex">
       <div class="left-button">
           <?php if ($prev_id !== null) : ?>
               <a href="review_detail.php?id=<?= $prev_id; ?>" class="btn btn-primary">이전</a>
           <?php else : ?>
               <a href="#" class="btn btn-primary disabled">이전</a>
           <?php endif; ?>

           <?php if ($next_id !== null) : ?>
               <a href="review_detail.php?id=<?= $next_id; ?>" class="btn btn-primary">다음</a>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
           integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
           crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- jqueryui js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
           integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
           crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- bootstrap js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"
           integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw=="
           crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- modernizr js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
           referrerpolicy="no-referrer"></script>

</body>
<script>
   $(document).ready(function () {
       $('#summernote').summernote();
   });
   $('.cancle-btn').click(function (e) {
       e.preventDefault();
       location.href = 'review.php';
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
</html>