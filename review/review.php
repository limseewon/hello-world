<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';

$paginationTarget = 'review';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';

$sql = "SELECT c.name as course_name , r.* FROM review r JOIN courses c ON c.cid=r.cid WHERE 1=1";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
if ($keyword) {
   $sql .= " AND content LIKE '%$keyword%'";
}

// 작성일 필터링 옵션 처리
$date_filter = isset($_GET['date_filter']) ? $_GET['date_filter'] : '';

switch ($date_filter) {
   case '1':
       // 최신순
       $sql .= " ORDER BY r.date DESC";
       break;
   case '2':
       // 과거순
       $sql .= " ORDER BY r.date ASC";
       break;
   default:
       // 기본 정렬 (작성일 기준)
       $sql .= " ORDER BY r.date DESC";
}

$result_count = $mysqli->query($sql);
$totalcount = $result_count->num_rows;

$sql .= " LIMIT $startLimit, $endLimit";
$result = $mysqli->query($sql);
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
   <link rel="stylesheet"
         href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>

   <!-- jquery ui css -->
   <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css"
         integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q=="
         crossorigin="anonymous" referrerpolicy="no-referrer"/>

   <link rel="stylesheet" href="/helloworld/css/common.css"/>
   <link rel="stylesheet" href="/helloworld/css/index.css"/>

   <style>
       tr {
           line-height: 34px;
       }

       .edit {
           gap: 30px;
           align-items: center;
       }

       .block-top {
           gap: 20px;
       }

       .form-control {
           width: 750px;
           height: 50px;
       }

       .form-select {
           width: 250px;
           height: 50px;
           margin-top: 7px;
       }

       .bar-top {
           justify-content: space-between;
       }

       .pagination {
           margin-top: 20px;
           justify-content: center;
       }

       .container-fluid {
           padding: 0;
       }

       .c_button {
           position: absolute;
           right: 150px;
           bottom: 55px;
       }

       .lock {
           align-items: center;
           gap: 10px;
       }

       .title_td {
           width: 800px;
       }

       .no_th {
           width: 120px;
       }

       .delete_td {
           width: 100px;
       }

       .pagination {
           position: absolute;
           top: 830px;
           justify-content: center;
       }
       .lecture_name{
            width:250px;
       }
   </style>
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
?>
<h2>수강평</h2>
<div class="bar-top d-flex">
   <nav class="navbar navbar-light bg-light">
       <div class="container-fluid">
           <form action="" class="block-top d-flex">
               <input class="form-control me-2" type="text" name="keyword" placeholder="제목을 입력하시오."
                      aria-label="Search" value="<?= $keyword ?>">
               <button class="btn btn-outline-success" type="submit">Search</button>
           </form>
       </div>
   </nav>
<!-- 필터링 옵션 선택 -->
    <select class="form-select form-select-lg mb-3" name="date_filter" aria-label="Large select example">
    <option value="">작성일</option>
    <option value="1" <?php if (isset($_GET['date_filter']) && $_GET['date_filter'] == '1') echo 'selected'; ?>>최신순</option>
    <option value="2" <?php if (isset($_GET['date_filter']) && $_GET['date_filter'] == '2') echo 'selected'; ?>>과거순</option>
    </select>
</div>
<table class="table table-hover table-striped">
   <thead class="table-dark">
   <tr>
       <!-- <th scope="col">No&#46;</th> -->
       <th scope="col">강의명</th>
       <th scope="col">내용</th>
       <th scope="col">작성자</th>
       <th scope="col">조회수</th>
       <th scope="col">점수</th>
       <th scope="col">작성일</th>
       <th scope="col">삭제</th>
   </tr>
   </thead>
   <tbody>
   <?php
   while ($row = $result->fetch_assoc()) {
    // content 변수에 DB에서 가져온 content을 선택
    $content = $row["content"];
    if (iconv_strlen($content) > 30) {
        // content가 30을 넘어서면 ...표시
        $content = iconv_substr($content, 0, 30, "utf-8") . "...";
    }

    // lecture_name 변수에 DB에서 가져온 course_name을 선택
    $lecture_name = $row["course_name"];
    if (iconv_strlen($lecture_name) > 15) {
        // lecture_name이 15를 넘어서면 ...표시
        $lecture_name = iconv_substr($lecture_name, 0, 15, "utf-8") . "...";
    }
       ?>
       <tr>
            <td class="lecture_name"><?= $lecture_name; ?></td>
            <td class="title_td"><a href="review_detail.php?id=<?= $row['idx']; ?>"><?= $content; ?></a></td>
            <td class="name d-flex"><?= $row['name']; ?></td>
            <td class="view"><?= $row['view']; ?></td>
            <td class="hit"><?= $row['rating']; ?></td>
            <td><?= $row['date']; ?></td>
            <td class="delete_td">
                <a href="review_delete.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                    <span class="material-symbols-outlined">delete</span>
                </a>
            </td>
        </tr>
       <?php
   }
   ?>
   </tbody>
</table>
<div class="d-flex justify-content-center">
   <ul class="pagination">
       <?php
       $block_ct = 5; // 페이지네이션에 표시할 페이지 번호의 개수를 5로 설정
       $total_page = ceil($totalcount / $pageCount);
       $total_block = ceil($total_page / $block_ct);

       $block_num = ceil($pageNumber / $block_ct);
       $block_start = (($block_num - 1) * $block_ct) + 1;
       $block_end = $block_start + $block_ct - 1;

       if ($block_end > $total_page) {
           $block_end = $total_page;
       }

       if ($pageNumber > 1) {
           echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=1&keyword=$keyword\" class=\"page-link\" >처음</a></li>";
           // 이전
           if ($block_num > 1) {
               $prev = ($block_num - 2) * $block_ct + 1;
               echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$prev&keyword=$keyword\" class=\"page-link\">이전</a></li>";
           }
       }

       for ($i = $block_start; $i <= $block_end; $i++) {
           if ($i == $pageNumber) {
               echo "<li class=\"page-item active\"><a href=\"review.php?pageNumber=$i&keyword=$keyword\" class=\"page-link\">$i</a></li>";
           } else {
               echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$i&keyword=$keyword\" class=\"page-link\">$i</a></li>";
           }
       }

       if ($pageNumber < $total_page) {
           if ($block_end < $total_page) {
               $next = $block_num * $block_ct + 1;
               echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$next&keyword=$keyword\" class=\"page-link\">다음</a></li>";
           }
           echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$total_page&keyword=$keyword\" class=\"page-link\">마지막</a></li>";
       }
       ?>
   </ul>
</div>
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

<script src="/helloworld/js/common.js"></script>
</body>
<script>
   let documentHeight = Math.max(
       document.body.scrollHeight,
       document.body.offsetHeight,
       document.documentElement.clientHeight,
       document.documentElement.scrollHeight,
       document.documentElement.offsetHeight
   );
   document.querySelector("header").style.height = documentHeight + "px";
</script>
</html>