<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';
              // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
              $sql = "SELECT * from review order by idx desc limit 0,10";
              $result = $mysqli->query($sql);
            
              // output data of each row
             
$paginationTarget = 'review';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';
// $keyword = $_GET['keyword'] ??'';
// $search_where = '';
// $status = $status ?? '';

// if($keyword){
//   $search_where = " and status = $status";
// }

// if($search_where){
//   $search_where = "'and (name LIKE '%$keyword%' or message LIKE '%$keyword%')"
// }

$sql = "SELECT * FROM review where 1=1"; //모든 상품 조회 쿼리


// $sql .= $search_where;
$sql .= '';
$order = " order by idx desc";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;
// echo $sql;
$result = $mysqli->query($sql);

// 검색어 가져오기
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 검색 조건 설정
$search_where = '';
if ($keyword) {
    $search_where = "WHERE title LIKE '%$keyword%'";
}

// 검색 조건을 포함한 쿼리 작성
$sql = "SELECT * FROM review $search_where ORDER BY idx DESC LIMIT 0, 10";
$result = $mysqli->query($sql);

// 조회수 옵션 가져오기
$view_option = isset($_GET['view_option']) ? $_GET['view_option'] : '';

// 조회수에 따른 정렬 쿼리
$order_by = '';
if ($view_option == '1') {
    $order_by = 'ORDER BY view DESC'; // 조회수 많은 순
} elseif ($view_option == '2') {
    $order_by = 'ORDER BY view ASC'; // 조회수 적은 순
} else {
    $order_by = 'ORDER BY idx DESC'; // 기본 정렬
}

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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"
    />

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
      
      tr{
        line-height: 34px;
      }
      .edit{
        gap: 30px;
        align-items: center;
      }
      .block-top{
        gap: 20px;
      }
      .form-control{
        width: 750px;
        height: 50px;
      }
      .form-select{
        width: 250px;
        height: 50px;
        margin-top: 7px;
      }
      .bar-top{
        justify-content: space-between;
      }
      .pagination{
        margin-top: 20px;
        justify-content: center;
      }
      .container-fluid{
        padding: 0;
      }
      .c_button {
        position: absolute;
        right: 150px;
        bottom: 55px;
      }
      .lock{
        align-items: center;
        gap: 10px;
      }
      .title_td{
        width: 800px;
      }
      .no_th{
        width: 120px;
      }
      .delete_td{
        width: 100px;
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
                  <input class="form-control me-2" type="text" name="keyword" placeholder="제목을 입력하시오." aria-label="Search" value="<?= $keyword ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>
              <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                <option selected>답변</option>
                <option value="1">완료</option>
                <option value="2">미완료</option>
              </select>
              <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                <option selected>작성일</option>
                <option value="1">최신순</option>
                <option value="2">한달 이내</option>
                <option value="3">일년 이내</option>
              </select>
            </div>
            <table class="table table-hover table-striped">
              <thead class="table-dark">
                <tr>
                  <th scope="col">No&#46;</th>
                  <th scope="col">제목</th>
                  <th scope="col">작성자</th>
                  <th scope="col">조회수</th>
                  <th scope="col">별점</th>
                  <th scope="col">작성일</th>
                  <th scope="col">삭제</th>
                </tr>
              </thead>
              <tbody>
              <?php
              while($row = $result->fetch_assoc()) {
              
                //title변수에 DB에서 가져온 title을 선택
                $title=$row["title"];
                if(iconv_strlen($title)>30)
                {
                  //title이 30을 넘어서면 ...표시
                  $title=str_replace($row["title"],iconv_substr($row["title"],0,30,"utf-8")."...",$row["title"]);
                }
                ?>
                <tr>
                  <th scope="row" class="no_th"><?= $row['idx'];?></th>
                  <td class="title_td"><a href="review_detail.php?id=<?= $row['idx']; ?>"><?= $title; ?></a></td>
                  <td class="lock d-flex"><?= $row['name'];?></td>
                  <!-- <span class="material-symbols-outlined">
                    lock
                </span> -->
                  <td><?= $row['view'];?></td>
                  <td><?= $row['hit'];?></td>
                  <td><?= $row['date'];?></td>
                  <td class="delete_td">
                    <a href="review_delete.php?id=<?= $row['idx']; ?>" onclick="return confirm('정말 삭제하시겠습니까?');">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </a>
                </td>
                </tr>
                <?php
                  } 
                ?>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center">
              <ul class="pagination">
                <?php
                if($pageNumber > 1){
                  echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
                  //이전
                  if($block_num > 1){
                    $prev = 1 + ($block_num - 2) * $block_ct;
                    echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
                  }
                }
              
                  for($i=$block_start;$i<=$block_end;$i++){
                    if($i == $pageNumber){
                      echo "<li class=\"page-item active\"><a href=\"review.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
                    }else{
                      echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
                    }            
                  }  

                  if($pageNumber < $total_page){
                    if($total_block > $block_num){
                      $next = $block_num * $block_ct + 1;
                      echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$next\" class=\"page-link\">다음</a></li>";
                    }
                    echo "<li class=\"page-item\"><a href=\"review.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
                  }        
                ?>
              </ul>
            </div>    
          <!-- <div class="c_button">
            <button class="btn_complete btn btn-success"><a href="/helloworld/qna/qna_write.php"></a></button>
          </div> -->
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
    document.querySelector("header").style.height = documentHeight + "px";
  </script>
</html>