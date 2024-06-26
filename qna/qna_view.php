<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';
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

   <!-- include summernote css/js -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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
           gap: 100px;
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
   </style>
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
?>
<h2>질의 응답</h2>
<div class="regist">
   <div class="mb-3 d-flex title">
       <p>제목</p>
       <p class="question"><?= $row['title']; ?></p>
       <p class="lock d-flex"><?= $row['name']; ?></p>
       <p><?= $row['date']; ?></p>
       <p class="edit">
           <a href="#">
               <span class="material-symbols-outlined">border_color</span>
           </a>
           <a href="qna_delete.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
               <span class="material-symbols-outlined">delete</span>
           </a>
       </p>
   </div>
   <div class="mb-3 d-flex con">
       <p>내용</p>
       <p>운영자님! Q&A 게시글 등록하고 싶은데 등록하기 전에 알아야 할 사항이 있을까요? 항상 화이팅입니다!</p>
   </div>
   <div class="d-flex file">
       <p>첨부 파일</p>
       <p>logo.png</p>
       <img src="/img/logo.png" alt="" class="img">
   </div>
   <hr>
   <div>
       <form method="post" class="wrap justify-content-start align-item-center review">
           <input type="hidden" name="post_id" value="168">
           <input type="hidden" name="parent_comment_id" value="0">
           <input type="hidden" name="depth" value="0">
           <!-- <img src="" alt=""> -->
           <textarea name="comment" class="form-control" placeholder="내용을 추가하시오."></textarea>
           <button type="submit" class="btn b_text01">댓글 쓰기</button>
       </form>
   </div>
   <hr>
</div>
<button type="button" class="btn btn-danger cancle-btn">닫기</button>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
?>
<!-- jquery -->
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

<script>
   $(document).ready(function () {
       $('#summernote').summernote();
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