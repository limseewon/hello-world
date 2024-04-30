<?php
$title="쿠폰리스트";


session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';



//전체 / 활성 / 비활성 쿠폰개수(고정)
$allsql = "SELECT * from coupons where 1=1";
$allrc = $mysqli -> query($allsql);
while($rs = $allrc -> fetch_object()){
  $allrsc[] = $rs;
}

//활성, 비활성 쿠폰개수
if(isset($allrsc)){
  $coupon_ing = 0;
  $coupon_end = 0;
  for($i = 0; $i<count($allrsc); $i++){
    if($allrsc[$i]->cp_status == 1) {
      $coupon_ing++;
    }
    if($allrsc[$i]->cp_status == 0) {
      $coupon_end++;
    }
  }
}


//필터되어 나타날 쿠폰
//기본은 모두 나타나도록!
$sql = "SELECT * from coupons where 1=1";
$order = ' order by cpid desc';
$sc_where = '';//필터, 검색 조건담을 변수


//1. 쿠폰 활성/비활성 filter 조건
$cp_filter = $_GET['coupon_filter']??'';
$filter_where = '';

//필터가 빈값이거나 모든쿠폰을 선택하면
if($cp_filter == '-1' || $cp_filter == ''){
  //모든 쿠폰 보여주도록
  $filter_where .= " 1=1";
  $sc_where .= '';

//$cp_filter == 0 || $cp_filter == 1 (활성,비활성쿠폰)
} else{
  //해당하는 타입의 쿠폰 보여주도록
  $filter_where .= " cp_status='{$cp_filter}'";
  $sc_where .= ' and'.$filter_where;
}


//2. 검색어(전체쿠폰에서 검색)필터 조건
$search_where = '';
$cp_search = $_GET['search']??'';

//검색어가 있으면 쿠폰 이름에서 찾아서 적용
if($cp_search){
  $search_where .= " cp_name like '%{$cp_search}%'";
  $sc_where = ' and'.$search_where;
} else{
  $search_where = '';
}




//----------------------------------------------pagenation 시작
//pagenation 필터 조건문 (필터 없으면 필요없음)
if($cp_filter !== '' && $search_where === ''){
  $pagerwhere = $filter_where;
} else if($cp_search !== '' && $cp_filter === ''){
  $pagerwhere = $search_where;
} else{
  $pagerwhere = ' 1=1';
}


//필터 없으면 여기서부터 복사! *******
$pagenationTarget = 'coupons'; //pagenation 테이블 명
$pageContentcount = 6; //페이지 당 보여줄 list 개수
include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/class/pager.php';
$limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!


//최종 query문, 실행
$sqlrc = $sql.$sc_where.$order.$limit; //필터 있
//$sqlrc = $sql.$limit; //필터 없
//----------------------------------------------pagenation 끝






$result = $mysqli -> query($sqlrc);
while($rs = $result -> fetch_object()){
  $rsc[] = $rs;
}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>쿠폰 관리</title>
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

    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css"/>
    <link rel="stylesheet" href="/helloworld/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/css/index.css"/>
    

    <style>
     
      /* 쿠폰 최원석 */
      .sub_header {
        margin-bottom: var(--c-space_updown);
      }

      .sub_header .btn {
        line-height: var(--c-space_updown);
      }

      .coupon_keyword_search {
        gap: calc(var(--c-space_updown) / 2);
        flex: 1;
        justify-content: end;
        margin-right: calc(var(--c-space_updown) / 2);
      }
      .coupon_keyword_search .input-group {
        width: 52%;
      }

      .coupon_filter label {
        cursor: pointer;
      }
      .coupon_status_search {
        text-align: center;
        height: calc(var(--c-space_updown) * 5);
        margin-bottom: calc(var(--c-space_updown) * 2);
      }

      .coupon_status_search > div {
        width: 33.33%;
      }

      .coupon_status_search > div + div {
      }

      .coupon_status_search > div em {
        margin-right: 5px;
      }

      .coupon_status_search label {
        position: relative;
      }

      

      .coupon_status_search label:hover:after {
        content: '';
        position: absolute;
        bottom: 8px;
        height: 1.5px;
        left: 2px;
        right: 2px;
        background-color: var(--point_primary);
      }

      .coupons .coupon {
        width: 49%;
        height: calc(var(--c-space_updown) * 7);
        position: relative;
        padding: 15px;
      }

      .coupons .coupon img {
        width: 45%;
        object-fit: cover;
      }

      .coupons ul {
        margin-bottom: 0;
        padding-left: 0; /* reboot? */
        gap: var(--c-space_updown) 0;
      }

      .coupons .coupon .text_box {
        margin-left: 20px;
        width: calc(55% - 40px);
      }

      .coupons .coupon h3 {
        font-weight: bold;
        margin: 10px 0;

        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .coupons .coupon h3 a:hover {
        color: var(--point_primary);
        border-bottom: 1px solid var(--point_primary);
      }

      .coupons .coupon p {
        margin-bottom: 0;
      }

      .coupons .coupon .icons,
      .coupons .coupon .form-check {
        position: absolute;
        right: 15px;
      }

      .coupons .coupon .icons {
        font-size: 25px;
        top: 10px;
      }

      .coupons .coupon .form-check {
        bottom: 15px;
        transform: scale(1.5);
      }
      /* 쿠폰 */

      .couponbox {
        margin: 0 auto;
        width: 391px;
        height: 391px;
        border-radius: 50%;
        border: 1px solid #000;
      }
      .sub_header h2 {
        margin-bottom: calc(var(--c-space_updown) * 2);
      }

      .coupon_info {
        gap: 3%;
      }
      .coupon_info .thumbnail {
        width: 30%;
        min-width: 300px;
      }

      .coupon_info .thumbnail .show_thumb {
        padding-top: 70%;
        position: relative;
        overflow: hidden;
      }

      .coupon_info .thumbnail .show_thumb img {
        position: absolute;
        right: 0;
        bottom: 0;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .coupon_info .thumbnail .show_thumb:before {
        content: '이미지 등록';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .coupon_info .thumbnail .thumb_btn {
        margin-top: var(--c-space_updown);
        width: 100%;
        font-size: 16px;
        font-weight: bold;
      }

      .coupon_info .coupon_info_box {
        flex: 1;
        gap: var(--c-space_updown);
      }

      .coupon_info .coupon_info_box .input-group {
        height: auto;
      }

      .coupon_info .coupon_info_box label {
        margin-bottom: var(--c-space_updown);
        line-height: 1;
        width: 100%;
      }

      .coupon_info .coupon_info_box h3 {
        width: 100%;
      }

      .coupon_info .coupon_info_box .info_bottom {
        gap: 4%;
      }

      .coupon_info .coupon_info_box .coupon_name {
        width: 100%;
      }
      .coupon_info .coupon_info_box .coupon_min_price {
        width: 63%;
        gap: 0 10px;
      }

      .coupon_info .coupon_info_box .coupon_status_check {
        gap: var(--c-space_updown);
        margin-top: var(--c-space_updown);
      }

      .coupon_info .coupon_info_box .coupon_status label {
        margin-bottom: 0;
        padding-left: 5px;
      }

      .coupon_option {
        margin-top: calc(var(--c-space_updown) * 1.5);
        gap: 4%;
      }

      .coupon_option > div {
        width: 48%;
      }

      .coupon_option .form-check {
        gap: 15px;
        margin-top: var(--c-space_updown);
      }

      .coupon_option label {
        white-space: nowrap;
      }

      .coupon_option .form-control {
        width: auto;
        flex: 1;
      }

      .coupon_limit_date_check div:first-child {
        height: 38px;
      }

      .submit_btns {
        margin: calc(var(--c-space_updown) * 2) 0;
        gap: calc(var(--c-space_updown) / 2);
      }
      /* 강의 쿠폰 공통*/

      .main_tt {
        font-family: 'Jua', sans-serif;
        font-size: 32px;
        font-weight: 500;
      }

      .main_stt {
        font-size: 28px;
        font-weight: bold;
      }

      .content_tt {
        font-size: 24px;
        font-weight: bold;
      }

      .content_stt {
        font-size: 20px;
        font-weight: 400;
      }

      .b_text01 {
        font-size: 18px;
        font-weight: 400;
        line-height: 1.4;
      }

      .b_text02 {
        font-size: 16px;
        font-weight: 400;
        line-height: 1.4;
      }
     
     
      
      .tt {
        margin: 50px;
      }
      .btn {
        font-size: 16px;
        height: 45px;
        padding-left: 30px;
        padding-right: 30px;
      }
      .coupon_right{ 
        display: flex; 
        align-items: center; 
        justify-content: end; 
        width: 100%; 
        text-align: center;
      }
      .coupon_right a { 
        display: flex; 
        align-items: center;
      }
    </style>
  </head>
  <body>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
      
            <h2>쿠폰관리</h2>
          </div>
          <div class="coupon_right">
            <a href="coupon_create.php" class="btn btn-primary ">쿠폰등록</a>
          </div>  
          <form action="#" class="coupon_filter">
            <div class="couponbox"></div>
            <h2 class="hidden">클릭하여 진행중 또는 종료된 쿠폰을 확인하세요.</h2>
            <div class="coupon_status_search d-flex justify-content-betweenn white_bg align-items-center">
              <div class="filter_1">
                <h3 class="b_text01">총 쿠폰 개수</h3>
                <label for="all" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo count($allrsc);} else{echo '0';} ?></em>개</label>
                <input type="radio" value="-1" class="hidden" id="all" name="coupon_filter" />
              </div>
              <div class="filter_2">
                <h3 class="b_text01">활성화 쿠폰 개수</h3>
                <label for="ing" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo $coupon_ing;} else{echo '0';} ?></em>개</label>
                <input type="radio" value="1" class="hidden" id="ing" name="coupon_filter" />
              </div>
              <div class="filter_3">
                <h3 class="b_text01">비활성화 쿠폰 개수</h3>
                <label for="end" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo $coupon_end;} else{echo '0';} ?></em>개</label>
                <input type="radio" value="0" class="hidden" id="end" name="coupon_filter" />
              </div>
            </div>
            <button class="hidden">필터실행</button>
          </form>
          <!-- coupon_filter -->
          <div class="sub_header d-flex justify-content-between align-items-center">
            <form action="#" class="d-flex align-items-center coupon_keyword_search">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="쿠폰명을 입력하세요."
                  aria-label="쿠폰명을 입력하세요."
                  name="search"
                />
              </div>
              <button class="btn btn-dark">검색</button>
            </form>
            
          </div>
          <!-- //sub_header -->

          <div class="coupons">
            <h2 class="hidden">쿠폰리스트</h2>
            <ul class="d-flex flex-wrap justify-content-between g-5">
              <?php
               if(isset($rsc)){
                foreach($rsc as $coupon){
              ?>
              <li class="coupon shadow_box border white_bg d-flex" data-cpid="<?= $coupon->cpid ?>">
                <img src="<?= $coupon->cp_image ?>" alt="<?= $coupon->cp_name ?>" class="border" />
                <div class="text_box">
                  <?php
                    if($coupon->cp_status == 1){
                      echo '<span class="badge rounded-pill badge_blue b-pd">활성화</span>';
                    } else{
                      echo '<span class="badge rounded-pill badge_red b-pd">비활성화</span>';
                    }
                  ?>
                  <h3 class="b_text01" title="<?= $coupon->cp_name ?>"><?= $coupon->cp_name ?></h3>
                  <p>사용기한 : <?php if($coupon->cp_date == ''){echo '무제한';}else{echo $coupon->cp_date.'개월';} ?></p>
                  <p>최소사용금액 : <span class="number"><?= $coupon->cp_limit ?></span>원</p>
                  <p>
                  <?php if($coupon->cp_type == '정액'){echo '할인액';}else{echo '할인율';} ?> :
                    <span class="number"><?php if($coupon->cp_type == '정액'){echo $coupon->cp_price;}else{echo $coupon->cp_ratio;} ?></span><span><?php if($coupon->cp_type == '정액'){echo '원';}else{echo '%';} ?></span>
                  </p>
                </div>

                <div class="icons">
                  <a href="/helloworld/coupon/coupon_update.php?cpid=<?= $coupon->cpid ?>"><i class="ti ti-edit pen_icon"></i></a>
                  <a href="pudding-LMS-website/admin/coupon/coupon_delete_ok.php?cpid=<?= $coupon->cpid ?>" class="del_btn"><i class="ti ti-trash bin_icon"></i></a>
                </div>

                <div class="form-check form-switch cp_status_toggle">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault<?= $coupon->cpid ?>"<?php if($coupon->cp_status == 1){echo 'checked';} else{echo '';}?>>
                  <label class="form-check-label" for="flexSwitchCheckDefault<?= $coupon->cpid ?>"></label>
                </div>
              </li>
              <?php
                }
                $i++;
              }else {
              ?>

              <p>등록된 쿠폰이 없습니다.</p>
              <?php
              }
              ?>
            </ul>
          </div>

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
                  echo "<li class=\"page-item active\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
              }else{
                  echo "<li class=\"page-item\"><a href=\"?coupon_filter=$cp_filter&search=$cp_search&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";

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
      </section>
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
  </script>
  </body>
</html>
