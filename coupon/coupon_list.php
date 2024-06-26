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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      
            <h2>쿠폰관리</h2>
          </div>
          <div class="coupon_right">
            <a href="coupon_create.php" class="btn btn-primary ">쿠폰등록</a>
          </div>  
          <form action="#" class="coupon_filter">
            <h2 class="hidden">클릭하여 진행중 또는 종료된 쿠폰을 확인하세요.</h2>
            <div class="coupon_status_search d-flex justify-content-betweenn white_bg align-items-center">
              <div class="filter_1">
                <h3 class="b_text01">총 쿠폰 개수</h3>
                <label for="all" class="b_text02"><em class="main_tt"><?php if(isset($allrsc)){echo count($allrsc);} else{echo '0';} ?></em>개</label>
                <input type="radio" value="-1" class="  hidden" id="all" name="coupon_filter" />
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
                  <p>사용기한 : <?php if($coupon->cp_date == '0'){echo '무제한';}else{echo $coupon->cp_date.'개월';} ?></p>
                  <p class="updownw">최소사용금액 : <span class="number"><?= $coupon->cp_limit ?></span>원</p>
                  <p class="updownw">
                  할인액 : 
              <span class="number"><?=$coupon->cp_price;?></span><span>원</span>
                  </p>
                </div>

                <div class="icons">
                  <a href="/helloworld/coupon/coupon_update.php?cpid=<?= $coupon->cpid ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="/helloworld/coupon/coupon_delete_ok.php?cpid=<?= $coupon->cpid ?>" class="del_btn"><i class="fa-solid fa-trash-can"></i></a>
                </div>

                <div class="form-check form-switch cp_status_toggle ">
                  <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckDefault<?= $coupon->cpid ?>"<?php if($coupon->cp_status == 1){echo 'checked';} else{echo '';}?>>
                  <label class="form-check-label input_colopr" for="flexSwitchCheckDefault<?= $coupon->cpid ?>"></label>
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

          <nav aria-label="Page navigation example" class="d-flex justify-content-center pager tt">
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- modernizr js -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
      referrerpolicy="no-referrer"
    ></script>

    <script src="/helloworld/js/common.js"></script>
    <script src="/helloworld/js/coupon.js"></script>
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
