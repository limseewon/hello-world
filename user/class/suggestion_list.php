<?php
$title = '입문자를 위한 초급강의';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/class/class_common.css"/>';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/class/class_list.css"/>';
$cssRoute3 ='';
$cssRoute4 ='';

$script1='';
$script2 = '';
$script3 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

/// 대분류명 조회

$step1Sql = "SELECT * from category where step =1";
$stepresult =  $mysqli->query($step1Sql);
while($step1rs = $stepresult-> fetch_object()){
  $step1arr[]=$step1rs;
}

$basicSql = "SELECT * FROM courses WHERE level='초급' LIMIT 8";
$basicResult = $mysqli->query($basicSql);   
while ($basicRs = $basicResult->fetch_object()) {
  $basicArr[] = $basicRs;
}
// print_r($basicArr);

//main페이지 검색 
$c_where = '';   // 검색 조건을 나타내는 변수인 $c_where를 초기화

$cate = $_GET['cate']??''; // PHP에서 $_GET은 HTTP GET 요청을 통해 전달된 매개변수를 가져옴 'cate'라는 이름의 매개변수가 존재하면 해당 값을 가져오고, 그렇지 않으면 빈 문자열('')을 반환
if (isset($cate)) {  // 만약 HTTP GET 요청으로 'catename' 매개변수가 전달되었다면, 다음을 실행

  $modifiedString = str_replace('#', '', $cate);
  $c_where .= " and cate LIKE '%$modifiedString%'"; // $keycate 값을 포함하는 "cate" 열과 일치하는 레코드를 선택하기 위한 조건을 $c_where에 할당
};


$sql = "SELECT * from courses where 1=1 " ;  //"courses" 테이블에서 모든 열을 선택하는 쿼리를 생성. 이 쿼리는 WHERE 절에 항상 참인 조건을 포함하고 있음. 이렇게 하는 이유는 후속적으로 추가되는 조건들을 쉽게 추가.
$order = ' order by cid desc';   //결과를 "cid" 열을 기준으로 내림차순으로 정렬


$level = $_GET['level']??'';
if (isset($level)) {  // 만약 HTTP GET 요청으로 'catename' 매개변수가 전달되었다면, 다음을 실행

  $modifiedString2 = str_replace('#', '', $level);
  $c_where .= " and level LIKE '%$modifiedString2%'"; // $keycate 값을 포함하는 "cate" 열과 일치하는 레코드를 선택하기 위한 조건을 $c_where에 할당
};
$pay = $_GET['pay']??'';   //HTTP GET 요청에서 "cate", "level", "pay" 매개변수를 가져옴. 만약 해당 매개변수가 없다면 빈 문자열을 할당
if (isset($pay)) {  // 만약 HTTP GET 요청으로 'catename' 매개변수가 전달되었다면, 다음을 실행

  $modifiedString3 = str_replace('#', '', $pay);
  $c_where .= " and price_status LIKE '%$modifiedString3%'"; // $keycate 값을 포함하는 "cate" 열과 일치하는 레코드를 선택하기 위한 조건을 $c_where에 할당
};
$param = '';  //매개변수를 조합하여 WHERE 절에 추가할 조건을 담을 변수를 초기화


$filter_where = '';
$fil_where = '';    //$filter_where = '';, $fil_where = '';: WHERE 절에 추가할 각각의 카테고리, 필터, 필 변수를 초기화

 //가격 조회
if($pay != ''){  // 'pay' 변수가 비어 있지 않은 경우에만 다음을 실행
  $c_where .= " and price_status='{$pay}'";  // pay' 변수 값을 사용하여 "price_status" 열과 일치하는 레코드를 선택하기 위한 추가 조건을 $c_where 변수에 추가
  // $param .="&price_status='{$pay}'";      //  선택된 레코드는 결제 상태가 'pay' 변수 값과 동일한 것만 포함
}else{  // pay' 변수가 비어 있는 경우, 즉 값이 설정되어 있지 않은 경우, 아무 동작도 수행하지 않음
  $c_where .= "";
}


//검색
$search_where = '';  // 검색 조건을 나타내는 변수인 $search_where를 초기화
$search = $_GET['search']??'';  // search' 매개변수를 가져옴. 이 변수에는 사용자가 검색한 내용이 포함. 만약 'search' 매개변수가 존재하지 않으면, 빈 문자열('')을 사용

if($search){  // search' 변수가 비어 있지 않은 경우와 비어 있는 경우를 구분하여 다음을 실행
  $search_where .= "and name like '%{$search}%'";
} else{
  $search_where = '';  // and name like '%{$search}%'";: 'name' 열에서 검색어를 포함하는 레코드를 선택하기 위한 추가 조건을 $search_where 변수에 추가 택된 레코드는 사용자가 입력한 검색어를 이름에 포함하는 것만 포함
}
$c_where .= $search_where;  // 생성된 검색 조건을 $c_where 변수에 추가


// $sqlrc = $sql.$c_where.$order; 
if(!isset($pagerwhere)){   // 변수가 설정되지 않았으면, 기본적으로 "1=1" 조건을 가진 $pagerwhere 변수를 설정
  $pagerwhere = " 1=1";
}

$sql2 = "SELECT COUNT(*) as count from courses where 1=1 ".$c_where;  // "courses" 테이블에서 조건을 충족하는 레코드의 수를 세는 쿼리를 생성

$result4 = $mysqli->query($sql2);  // 데이터베이스에 쿼리를 실행하고 결과를 반환

$rs = $result4->fetch_object(); // 쿼리 결과에서 첫 번째 레코드를 객체 형태로 가져옴
$sales_page = $rs->count; // count" 별칭으로 반환된 레코드 수를 $sales_page 변수에 할당

//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'courses'; //pagenation 테이블 명
$pageContentcount = 9; //페이지 당 보여줄 list 개수


include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/class/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행
$sqlrc = $sql.$c_where.$order.$limit; 



// var_dump($sqlrc);
// $result = $mysqli -> query($sqlrc);  // 데이터베이스에서 쿼리 $sqlrc를 실행하고, 그 결과를 변수 $result에 저장
// while($rs = $result -> fetch_object()){
//   $rsc[] = $rs;     //
// }
 
//$result에서 각 레코드를 반복적으로 가져와서 객체로 변환. fetch_object() 메서드는 쿼리 결과의 다음 레코드를 객체로 반환. while 루프는 레코드를 하나씩 처리할 때까지 계속 실행
// 각 레코드 객체 $rs를 배열 $rsc에 추가합니다. 이렇게 하면 $rsc 배열에는 쿼리 결과의 모든 레코드가 객체 형태로 저장


?>
  
    
    

<main>
  <div class="container containermab">
    <div class="section1 d-flex justify-content-between pd_2">
      <div class="courseBigTitle jua coursetitle">
        <h2 class="court h2_t">입문자를 위한 초급강의</h2>
      </div>
    </div>
    <form action="#" class="d-flex gap-3">
      <div class="input-group courseform">
        <input
          type="text"
          class="form-control"
          placeholder="강의명으로 검색"
          name="search"
        >
      </div>
      <div class="searchBtn searchtop">
        <button class="btn btn-primary dark secrbp">검색</button>
      </div>
    </form>
    <div class="mainSection d-flex gap-5">
    <form action="/helloworld/user/class/course_list.php" id="filter-form" class="" method="GET">
        <!-- <input type="hidden" name="cate-array" id="cate-array" value=""> -->
        <div class="content-box categorybox">
        <div class="checkBox_1 mb-3">
          <div class="filterbox d-flex chcekbox_h6">
            <h3 class="chekbox">카테고리</h3>
            
          </div>
          <!-- <div class="form-check mt-5">
            <label class="form-check-label" for="total"> 전체선택 </label>
            <input
              class="form-check-input"
              type="radio"
              value="전체선택"
              name="cate"
              id="total"
            >
          </div> -->
          <?php
            if(isset($step1arr)){
              foreach($step1arr as $item){
          ?>  
          <div class="form-check ">
            <label class="form-check-label" for="<?= $item->code; ?>">
            <?= $item->name; ?>
            </label>
            <input
              class="form-check-input"
              type="radio"
              value="<?= $item->name;?>"
              name="cate"
              id="<?= $item->code; ?>"
            >
          </div>
          
          <?php
              }
            }
            ?> 
        </div>
        
        <div class="checkBox_2 mb-3 chcekbox_h6">
          <h3 class="chekbox2">난이도</h3>
          <div class="form-check mt-5 magin-fo">
            <label class="form-check-label" for="level1"> 초급 </label>
            <input
              class="form-check-input"
              type="radio"
              value="초급"
              name="level"
              id="level1"
            >
          </div>
          <div class="form-check magin-fo">
            <label class="form-check-label" for="level2"> 중급 </label>
            <input
              class="form-check-input"
              type="radio"
              value="중급"
              name="level"
              id="level2"
            >
          </div>
          <div class="form-check magin-fo">
            <label class="form-check-label" for="level3"> 고급 </label>
            <input
              class="form-check-input"
              type="radio"
              value="고급"
              name="level"
              id="level3"
            >
          </div>
        </div>
        <div class="checkBox_3 chcekbox_h6">
          <h3 class="chekbox3">가격</h3>
          
          <div class="form-check mt-5">
            <label class="form-check-label" for="free"> 무료 </label>
            <input
              class="form-check-input"
              type="radio"
              value="무료"
              name="pay"
              id="free"
            >
          </div>
          <div class="form-check">
            <label class="form-check-label" for="pay"> 유료 </label>
            <input
              class="form-check-input"
              type="radio"
              value="유료"
              name="pay"
              id="pay"
            >
          </div>
        </div>
        <button id="filter-submit-btn" class="btn btn-primary dark category_su">필터</button>
        </div>
        
        
      </form>
      <div class="courseList">
        <ul class="row mb-5">
        <?php
            if(isset($basicArr)){
              foreach($basicArr as $item){
          ?>  
          <li class="col-12 col-sm-6 col-md-4 content-box courseBox positionb" onclick="location.href='course_view.php?cid=<?= $item->cid ?>'">
            <div class="imgBox">
              <img
                src="<?= $item -> thumbnail?>"
                class="object-fit-cover"
                alt=""
              >
            </div>
            <div class="contentBox d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex gap-1">
                  <span class="badge rounded-pill pulele_bg b-pd">
                  <?php
                    if (isset($item->cate)) {
                      $categoryText = $item->cate;
                      
                      $parts = explode('/', $categoryText);
                      $lastPart = $parts[1];

                      echo $lastPart;
                    }
                    // var_dump($parts);
                  ?>
                  </span>
                  <span class="badge rounded-pill b-pd
                  <?php
                    $levelBadge = $item->level;
                    if ($levelBadge === '초급') {
                      echo 'green_bg';
                    } else if ($levelBadge === '중급') {
                      echo 'orange_bg';
                    } else {
                      echo 'blue_bg';
                    }
                  ?>
                    ">
                    <?= $item->level; ?>
                  </span>
                </div>
                <div class="courseName fw-bold">
                <?= $item->name?>
                </div>
                <hr>
              </div>
              <div class="contentTM d-flex flex-column align-items-start">
                <div class="eventbox">
                  <i class="ti ti-calendar-event"></i>
                  <span>수강기간 <?= $item->due?></span>
                </div>
                  
                <!-- 무료표시하기 -->
                  <?php
                    if($item->price_status != "무료"){
                    ?>
                      <div>
                        <span class="content_tt number"><?= $item->price?></span><span>원</span>
                      </div>
                    <?php
                    }else{
                    ?>
                  <div>
                    <span class="content_tt">무료</span>
                  </div>
                  <?php 
                  } 
                  ?>
                <!-- 무료표시 끝 -->
              </div>
            </div>
            <div class="view_wrap">
              <a href="/helloworld/user/class/course_view.php?cid=<?= $item->cid ?>" class="view_btn">
                <h5 class="card-title badeg_bt">
                  <?php
                  $strTitle = $item->name;
                  $strTitle = mb_strimwidth($strTitle, 0, 32, "...", "utf-8");
                  echo $strTitle;
                  ?>
                </h5>
                <div class="badegtwo d-flex">
                  
                  <span class="badge rounded-pill b-pd badgeblack slide_hover 
                      <?php
                    // 뱃지컬러
                    $levelBadge = $item->level;
                    if ($levelBadge === '초급') {
                      echo 'green_bg';
                    } else if ($levelBadge === '중급') {
                      echo 'orange_bg';
                    } else {
                      echo 'blue_bg';
                    }
                    ?>">
                      <?= $item->level ?>
                        
                  </span>
                  <span class="badge rounded-pill pulele_bg b-pd badgeblack2">
                    <?php
                    //뱃지 키워드 
                    if (isset($item->cate)) {
                      $categoryText = $item->cate;
                      $parts = explode('/', $categoryText);
                      $lastPart = end($parts);
                      echo $lastPart;
                    }
                    ?>
                  </span>
                </div>
                <div class="cartshopp">
                  <a href="/helloworld/user/cart/add_cart.php?cid=<?= $item->cid; ?>" class="card_cart">
                    <span class="material-symbols-outlined shoppingcart">add_shopping_cart</span>    
                  </a>
                </div> 
              </a>
            </div>
          </li>
          <?php
            }
          }else{
          ?> 
            <p>검색결과가 없습니다.</p>
          <?php
          }
          ?>
        </ul>
        <script>
          let currentUrl = window.location.href;
          let url = currentUrl.replace('#', '');
        </script>
          <?php
            $url = "<script>document.write(currentUrl);</script>" ;
          ?>

        <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
          <ul class="pagination coupon_pager">
            <?php
              if($pageNumber>1 && $block_num > 1 ){
                $prev = ($block_num - 2) * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
              } else{
                echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
              }


              for($i=$block_start;$i<=$block_end;$i++){
                if($pageNumber == $i){
                    echo "<li class=\"page-item active activegreen\"><a href=\"?cate=$cate&level=$level&pay=$pay&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                }else{
                    echo "<li class=\"page-item\"><a href=\"?cate=$cate&level=$level&pay=$pay&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";

                }
              }

              if($pageNumber<$total_page && $block_num < $total_block){
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
              } else{
                echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
              }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</main>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>
<script src="js/index.js"></script>