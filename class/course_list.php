<?php
$title = "강의 관리";
$css_route = "css/choi.css";
$js_route = "class/js/course.js";

session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/class/category_func.php';




$name = $_GET['name'] ?? '';
$level1 = $_GET['level1'] ?? '';
$level2 = $_GET['level2'] ?? '';
$level3 = $_GET['level3'] ?? '';
$act = $_GET['act'] ?? '';
$price_status = $_GET['price_status']??'';
$cates11 = $_GET['cate1']??'';
$cate21 = $_GET['cate2']??'';
$cate31 = $_GET['cate3']??'';
$cates1 = $_GET['cate1']??'';
$cate2 = $_GET['cate2']??'';
$cate3 = $_GET['cate3']??'';

// $ismain = $_GET['ismain'] ?? '';
// $isnew = $_GET['isnew'] ?? '';
// $isbest = $_GET['isbest'] ?? '';
// $isrecom = $_GET['isrecom'] ?? '';


$search_where = '';

//카테고리 조회
if (isset($_GET['cate1'])) {
  if($_GET['cate1'] !== ''){
    // $cates1 = $_GET['cate1']??'';
    $query11 = "SELECT name FROM category WHERE cateid='" . $cates1 . " '";
    $result11 = $mysqli->query($query11);
    $rs11 = $result11->fetch_object();
    $cates1 = $rs11->name;
  }
  
} else {
  $cates1 = '';
}
if (isset($_GET['cate2'])) {
  if($_GET['cate2'] !== ''){
  // $cate2 = $_GET['cate2']??'';
  $query22 = "SELECT name FROM category WHERE cateid='" . $cate2 . " '";
  $result22 = $mysqli->query($query22);
  $rs22 = $result22->fetch_object();
  $cate2 = $rs22->name;
  $cate2 = "/" . $cate2;
  }
} else {
  $cate2 = '';
}
if (isset($_GET['cate3'])) {
  if($_GET['cate3'] !== ''){
  // $cate3 = $_GET['cate3']??'';
  $query33 = "SELECT name FROM category WHERE cateid='" . $cate3 . " '";
  $result33 = $mysqli->query($query33);
  $rs33 = $result33->fetch_object();
  $cate3 = $rs33->name;
  $cate3 = "/" . $cate3;
  }
} else {
  $cate3 = '';
}



//난이도 조회
if (isset($_GET['level1'])) {
  $level1 = $_GET['level1']??'';
  $search_where .= " and level LIKE '%{$level1}%'";
  if (isset($_GET['level2'])) {
    $level2 = $_GET['level2']??'';
    $search_where .= " or level LIKE '%{$level2}%'";
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3']??'';
      $search_where .= " or level LIKE '%{$level3}%'";
    } else {
      $search_where;
    }
  } else {
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3']??'';
      $search_where .= " or level LIKE '%{$level3}%'";
    } else {
      $search_where;
    }
  }
} else {
  $level1 = '';
  if (isset($_GET['level2'])) {
    $level2 = $_GET['level2'];
    $search_where .= " and level LIKE '%{$level2}%'";
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3'];
      $search_where .= " or level LIKE '%{$level3}%'";
    } else {
      $search_where .= " and level LIKE '%{$level2}%'";
    }
  } else {
    if (isset($_GET['level3'])) {
      $level3 = $_GET['level3'];
      $search_where .= " and level LIKE '%{$level3}%'";
    }
  }
}


//가격 조회
if (isset($_GET['price_status'])) {
  $price_status = $_GET['price_status']??'';
  $search_where .= " and price_status like '%{$price_status}%'";
}


$cates = $cates1 . $cate2 . $cate3;
if ($cates) {
  $search_where .= " and cate like '%{$cates}%'";
}

//강의명검색
if ($name) {
  $search_where .= " and name like '%{$name}%'";
}

if(!isset($pagerwhere)){
  $pagerwhere = " 1=1";
}

$sqlct = "SELECT COUNT(*) as count FROM courses where 1=1" . $search_where;
$sqlctrc = $mysqli->query($sqlct);
while ($rs = $sqlctrc->fetch_object()) {
  $sqlctArr[] = $rs;
}
$sales_page = $sqlctArr[0]->count;

//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'coupons'; //pagenation 테이블 명
$pageContentcount = 6; //페이지 당 보여줄 list 개수
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/class/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행

//$sqlrc = $sql.$limit; //필터 없
//----------------------------------------------pagenation 끝


$sql2 = "SELECT * FROM courses where 1=1"; // and 컬러명=값 and 컬러명=값 and 컬러명=값 
$sql2 .= $search_where;
$order = " ORDER BY cid desc"; //최근순 정렬
$query2 = $sql2 . $order . $limit; //필터 있
//$limit = " limit $statLimit, $endLimit";

// $query = $sql.$order.$limit; //쿼리 문장 조합
// $query2 = $sql2 . $order;

$result2 = $mysqli->query($query2);

while ($rs2 = $result2->fetch_object()) {
  $rsc2[] = $rs2;
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강의 관리</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
 

    
    <link rel="stylesheet" href="/helloworld/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/css/index.css"/>
    <link rel="stylesheet" href="/helloworld/css/course_coupon.css"/>
    

    
  </head>
  <body>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
    
            <h2>강의 관리</h2>
          </div>
          <section>
            <div class="link_btn">
              <a href="course_create.php" class="btn btn-dark">신규 강의 등록</a>
              <a href="/helloworld/class/category.php" class="btn btn-dark">카테고리 관리</a>
            </div>
            <form action="#" class="course_sort">
              <div class="row">
                <div class="col-md-4">
                  <select class="form-select form_widi" aria-label="Default select example" id="cate1" name="cate1">
                    <option selected disabled>대분류</option>
                    <?php
                     foreach ($cate1 as $c) {
                    ?>
                      <option value="<?php echo $c->cateid ?>" data-cate="<?= $c->name; ?>"><?php echo $c->name ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <select class="form-select form_widi" aria-label="Default select example" id="cate2" name="cate2">
                    <option selected disabled>중분류</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <select class="form-select form_widi" aria-label="Default select example" id="cate3" name="cate3">
                    <option selected disabled>소분류</option>
                  </select>
                </div>
              </div>
              
              <div class="d-flex align-items-center level_price">
                <div class="d-flex flex-row">
                  <h3 class="b_text01 ">난이도</h3>
                  <span>
                    <input type="checkbox" name="level1" id="basic" value="초급" class="form-check-input"/>
                    <label for="basic">초급</label>
                  </span>
                  <span>
                    <input type="checkbox" name="level2" id="Intermediate" value="중급" class="form-check-input"/>
                    <label for="Intermediate">중급</label>
                  </span>
                  <span>
                    <input type="checkbox" name="level3" id="Advanced" value="고급" class="form-check-input"/>
                    <label for="Advanced">고급</label>
                  </span>
                </div>
              </div>
              <div class="d-flex flex-row  mairgin_t">
                <h3 class="b_text01 b-text_b">가격</h3>
                <span class="price_m">
                  <input type="radio" name="price_status" id="pay" value="유료" class="form-check-input"/>
                  <label class="form_check-b" for="pay">유료</label>
                </span>
                <span>
                  <input type="radio" name="price_status" id="free" value="무료" class="form-check-input"/>
                  <label class="form_check-b" for="free">무료</label>
                </span>
              </div>
              <div class="d-flex search_bar mairgin_t">
                <label for="search" class="hidden"></label>
                <input
                  type="text"
                  name="name"
                  id="search"
                  class="form-control"
                  placeholder="강의명으로 검색하세요"
                  aria-label="Username"/>
                <button class="btn btn-primary btn_pr">검색</button>
              </div>
            </form>

            <!-- 리스트 -->
            <form action="clist_save.php" method="POST" class="course_list_wrap">
              <ul>
                <?php
                  if (isset($rsc2)) {
                    foreach ($rsc2 as $item) {
                    $cateString = $item->cate;
                    $parts = explode('/', $cateString);
                  ?>
                <li class="course_list row shadow_box">
                  <input type="hidden" name="cid[]" value="<?php echo $item->cid ?>">
                  <div class="col-md-8 d-flex">
                    <div class="courseimg">
                    <img src="<?= $item->thumbnail ?>" alt="강의 썸네일 이미지" class="border">
                    </div>
                    
                    <div class="course_info">
                      <div>
                        <h3 class="course_list_title b_text01"><a href="course_view.php?cid=<?= $item->cid ?>"><?= $item->name ?></a>
                          <span class="badge rounded-pill blue_bg b-pd partdaa">
                            <?php
                            echo end($parts);
                            ?>
                          </span>
                          <span class="badge level_badge rounded-pill b-pd
                          <?php
                          // 뱃지컬러
                          $levelBadge = $item->level;
                          if ($levelBadge === '초급') {
                            echo 'yellow_bg';
                          } else if ($levelBadge === '중급') {
                            echo 'green_bg';
                          } else {
                            echo 'red_bg';
                          }
                          ?>
                           ">
                            <?= $item->level ?>
                          </span>
                        </h3>
                        <p>
                          <?= $item->content ?>
                        </p>
                      </div>
                      <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>
                          <?php if ($item->due == '') {
                            echo '무제한';
                          } else {
                            echo $item->due;
                          }
                          ; ?>
                        </span>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <nav
                      style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                      aria-label="breadcrumb">
                      <ol class="breadcrumb">

                        <?php 
                         foreach($parts as $p){
                          ?>
                          <li class="breadcrumb-item"><a href="#">
                            <?= $p ?>
                          </a>
                        </li>
                          <?php
                         }
                        ?>
                      </ol>
                    </nav>

                    <div class="d-flex align-items-end status_box contpo">
                      <span class="price content_stt contpo2">
                        <span class="number"><?=$item->price; ?></span><span> 원</span>
                      </span>
                      <span class="d-flex flex-column align-items-end status_wrap">
                        <select name="act[<?= $item->cid ?>]" id="act[<?= $item->cid ?>]" class="form-select"
                          aria-label="Default select example">
                          <option disabled>상태</option>
                          <option value="활성" <?php if ($item->act == "활성") {
                            echo "selected";
                          } ?>>활성</option>
                          <option value="비활성" <?php if ($item->act == "비활성") {
                            echo "selected";
                          } ?>>비활성</option>
                        </select>
                        <span class="price_btn_wrap">
                          <a href="course_update.php?cid=<?= $item->cid ?>" class="btn btn_g btn-success">수정</a>
                          <a href="course_delete.php?cid=<?= $item->cid ?>" class="btn btn-danger">삭제</a>
                        </span>
                      </span>
                    </div>
                  </div>
                </li>
                  <?php
                    }
                  } else {
                    ?>
                    <li> 검색 결과가 없습니다. </li>
                    <?php
                  }
                  ?>
              </ul>
              <button class="btn btn-primary btn_g all_modify_btn">변경 일괄 수정</button>
            </form>

            <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
              <ul class="pagination coupon_pager">
                <?php
                  if($pageNumber>1 && $block_num > 1 ){
                    //이전버튼 활성화
                    $prev = ($block_num - 2) * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
                  } else{
                    //이전버튼 비활성화
                    echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
                  }


                  for($i=$block_start;$i<=$block_end;$i++){
                    if($pageNumber == $i){
                        //필터 있
                        echo "<li class=\"page-item active\"><a href=\"?cate1=$cates11&cate2=$cate21&cate3=$cate31&level1=$level1&price_status=$price_status&name=$name&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                    }else{
                        //필터 있
                        echo "<li class=\"page-item\"><a href=\"?cate1=$cates11&cate2=$cate21&cate3=$cate31&level1=$level1&price_status=$price_status&name=$name&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                    }
                  }

                  if($pageNumber<$total_page && $block_num < $total_block){
                    //다음버튼 활성화
                    $next = $block_num * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
                  } else{
                    //다음버튼 비활성화
                    echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";

                  }
                ?>
              </ul>
            </nav>
          </section>
        </div>
      </section>
      <?php
      include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
      ?>


      <script src="/helloworld/js/makeoption.js"></script>
      
      <script>
        //강의 가격 천단위, 변환
        let priceList = $('.price');

        priceList.each(function () {
          let str_price = $(this).text();
          let course_price = ($.number(str_price));
          $(this).text(course_price + ' 원');
        });

      </script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- modernizr js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
      referrerpolicy="no-referrer"
    ></script>

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
    document.querySelector('header').style.height = documentHeight + 'px';
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
