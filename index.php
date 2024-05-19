<?php
// session_start();
$title = 'Home';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/class/class_common.css"/>';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/index.css"/>';
$cssRoute3 ='';
$cssRoute4 ='';

$script1 = '<script defer src="/helloworld/user/js/index.js"></script>';
$script2 = '';
$script3 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';


// 최신 강의
// $sql = "SELECT * FROM `courses` WHERE YEAR(regdate) = YEAR(current_year) AND MONTH(regdate) = MONTH(current_month) ORDERBY cid DESC limit 8 ";
$sql = "SELECT * FROM `courses` WHERE YEAR(regdate) = YEAR(CURRENT_DATE()) AND MONTH(regdate) = MONTH(CURRENT_DATE()) ORDER BY cid DESC LIMIT 8";
// echo $sql;
$rc_result = $mysqli->query($sql);   // 데이터베이스에서 쿼리를 실행하고, 그 결과를 $rc_result 변수에 저장
while ($rc_rs = $rc_result->fetch_object()) {
  $rc_rsc[] = $rc_rs;
}

$orderSql = "SELECT course_id, COUNT(*) AS course_count FROM ordered_courses GROUP BY course_id ORDER BY course_count DESC LIMIT 8";
$orderResult = $mysqli->query($orderSql);   
while ($orderRs = $orderResult->fetch_row()) {
  $orderArr[] = $orderRs[0];
}
// print_r($orderArr);
$orderArr = implode(",", $orderArr);
$recomSql = "SELECT * FROM courses WHERE cid IN ($orderArr)";
$recomResult = $mysqli->query($recomSql);   
while ($recomRs = $recomResult->fetch_object()) {
  $recomArr[] = $recomRs;
}

$basicSql = "SELECT * FROM courses WHERE level='초급' LIMIT 8";
$basicResult = $mysqli->query($basicSql);   
while ($basicRs = $basicResult->fetch_object()) {
  $basicArr[] = $basicRs;
}
$sign_couponSql = "SELECT * FROM coupons WHERE cp_status=1 AND cp_date='0' AND cp_price='1000'";
$sign_couponResult = $mysqli->query($sign_couponSql);   
$signRs= $sign_couponResult->fetch_object();

$couponsSql = "SELECT * FROM coupons
WHERE cp_status = 1
  AND (
        (cp_date = '0' AND cp_price = '2000')
     OR (cp_date = '3' AND cp_price = '3000')
     OR (cp_date = '1' AND cp_price = '1000')
  );";
$couponlistResult = $mysqli->query($couponsSql);   
while ($couponlistRs = $couponlistResult->fetch_object()){
  $couponArr [] = $couponlistRs;
}

// print_r($rsc);
//$rc_result에서 각 레코드를 반복적으로 가져와서 객체로 변환하고, 이를 $rc_rsc 배열에 추가. 
// fetch_object() 메서드는 쿼리 결과의 다음 레코드를 객체로 반환. while 루프는 레코드를 하나씩 처리할 때까지 계속 실행

// courses" 테이블에서 현재 연도와 현재 월에 등록된 레코드를 선택하는 쿼리를 생성
// 쿼리는 "regdate" 열의 연도와 월을 현재 연도와 현재 월과 비교하여 선택
// "cid" 열을 기준으로 내림차순으로 정렬하고, 결과를 최대 8개까지로 제한


// 추천강의


// $new_sql = "SELECT c.course_id, COUNT(oc.course_id) AS `count`, c.cate, c.name, c.price_status, c.price, c.level, c.due_status, c.due, c.act, c.content, c.thumbnail
// FROM `course` c
// LEFT JOIN `ordered_courses` oc ON c.course_id = oc.course_id
// GROUP BY c.course_id, c.cate, c.name, c.price_status, c.price, c.level, c.due_status, c.due, c.act, c.content, c.thumbnail
// ORDER BY `count` DESC
// LIMIT 8;";
// echo $new_sql;
// $new_result = $mysqli->query($new_sql);
// while ($new_rs = $new_result->fetch_object()) {
//   $new_rsc[] = $new_rs;
// }
// print_r($new_rsc);

?>
    
<main>
    <section class="sec1">
      <!-- Swiper -->
      <div class="swiper sec1_slide">
        <div class="swiper-wrapper">
          <div class="swiper-slide image">
            <div class="imagebox">
              <img src="user/img/index_section1.webp" alt="슬라이드 이미지_01">
            </div>  
            <div class="slidetext blacksl_text">
              <h2>누구나 쉬운 입문 강의</h2>
              <h2>여기 다 모였다.!</h2>
               <p>어디서부터 시작해야 할지 모르는</p>
               <p>당신을 위한 입문 강의</p>
            </div>        
          </div>
          <div class="swiper-slide image2">
            <div class="imagebox image2">
              <img src="user/img/index_section2.webp" alt="슬라이드 이미지_02">
            </div>
            <div class="slidetext blacksl_text">
              <h2>무슨 강의를 들을지 고민이라면?</h2>
              <h2>현직자 탑 30 강의보기</h2>
               <p>입문부터 실전까지,</p>
               <p>믿고 보는 실무자 PICK</p>
            </div> 
          </div>     
          <div class="swiper-slide image3">
            <div class="imagebox image3">
              <img src="user/img/index_section3.png" alt="슬라이드 이미지_03">
            </div>   
            <div class="slidetext">
              <h2>문법 이상의 본질을 탐구하다</h2>
              <h2>자바 중급 2편 출시</h2>
               <p>재네릭과 컬렉션 프레임워크를 깊이 있게 배우며</p>
               <p>본질적인 "WHY"에 대한 답을 찾아갑니다.</p>
            </div>   
          </div>
          <div class="swiper-slide image4">
            <div class="imagebox image4">
             <img src="user/img/index_section4.gif" alt="슬라이드 이미지_04">
            </div> 
            <div class="slidetext">
            <h2>지금 할인중인 강의</h2>
              <h2>매일 업데이트</h2>
               <p>신규 강의부터 베스트셀러까지</p>
               <p>지금 바로 부담없이 시작해보세요!</p>
            </div>     
          </div>
        </div>
        <div class="swiper-pagination">
          
        </div>
        <div class="swiper-button-next se1_next"></div>
        <div class="swiper-button-prev se1_prev"></div>  
      </div>
      
      
    </section>
    <section class="sec2">
      <h2 class="jua dark sec_tt"></h2>
      <form action="/helloworld/user/class/course_list.php" method="get" class="search">
        <label for="course_search" class="hidden"></label>
        <input type="text" id="course_search" name="course_search" placeholder="배우고 싶은 강의를 입력하세요.">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="category_box radius_12">
        <ul>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'HTML'; ?>">
              <img src="user/img/index_html.jpg" alt="HTML">
              <p>HTML</p>
            </a>
          </li>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'CSS'; ?>">
              <img src="user/img/index_css.jpg" alt="CSS">
              <p>CSS</p>
            </a>
          </li>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'Javascript'; ?>">
              <img src="user/img/index_js.jpg" alt="Javascript">
              <p>Javascript</p>
            </a>
          </li>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'PHP'; ?>">
              <img src="user/img/index_php.jpg" alt="PHP">
              <p>PHP</p>
            </a>
          </li>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'React'; ?>">
              <img src="user/img/index_react.jpg" alt="React">
              <p>React</p>
            </a>
          </li>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'SQL'; ?>">
              <img src="user/img/index_mysql.jpg" alt="SQL">
              <p>SQL</p>
            </a>
          </li>
          <li>
            <a href="/helloworld/user/class/course_list.php?catename=<?= 'Figma'; ?>">
              <img src="user/img/index_figma.jpg" alt="Figma">
              <p>Figma</p>
            </a>
          </li>
        </ul>
      </div>
    </section>
    <form action="index_ok.php" method="POST" id="course_form" class="product_save">
    <section class="sec3 container">
      <div class="plusbox d-flex secc3">
        <h2 class="jua dark sec_tt courset">최신 강의</h2>
        <a href="/helloworld/user/class/new_list.php"><div class="moreplus d-flex">
          
          <h3 class="moreview">더보기</h3>
          <span class="material-symbols-outlined">add</span>
        </div>
        </a>  
      </div>
      <!-- Swiper -->
      <div class="page_wrap">
        <div class="swiper recom_slide">
          <div class="swiper-wrapper">
          <?php
          if (isset($rc_rsc)) {
            foreach ($rc_rsc as $item) {
          ?>
            <div class="swiper-slide">
              <div class="card">
                <div class="cardimg">
                <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                </div>
                
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill b-pd
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
                    <span class="badge rounded-pill pulele_bg b-pd">
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
                  <h5 class="card-title">
                  <?php
                  $strTitle = $item->name;
                  $strTitle = mb_strimwidth($strTitle, 0, 32, "...", "utf-8");
                  echo $strTitle;
                  ?>
                  </h5>
                  <div class="card-text">
                    <p class="textbootn"><i class="ti ti-calendar-event"></i>수강기간 :
                      <span class="duration">
                      <?php if ($item->due == '') {
                        echo '무제한';
                      } else {
                        echo $item->due;
                      }
                      ?>
                      </span>
                    </p>
                    <?php
                    if ($item->price_status != "무료") {
                    ?>
                      <div>
                      <span class="content_tt number red">
                        <?= $item->price ?>
                      </span><span>원</span>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div>
                        <span class="content_tt red">무료</span>
                        
                      </div>
                      <?php
                  }
                  ?>
                  </div>
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
            </div>
            <?php
              }
            }
            ?> 
          </div>
        </div>
        <div class="swiper-button-next new_next"></div>
        <div class="swiper-button-prev new_prev"></div>
        
      </div>
    </section>
  <section class="sec4 container">
  <div class="plusbox d-flex secc4">
        <h2 class="jua dark sec_tt courset">추천강의</h2>
        <a href="/helloworld/user/class/population_list.php"><div class="moreplus d-flex">
          <h3 class="moreview">더보기</h3>
          <span class="material-symbols-outlined">add</span>
        </div>
        </a>  
      </div>
    <!-- Swiper -->
    <div class="page_wrap">
        <div class="swiper new_slide">
          <div class="swiper-wrapper">
          <?php
          if (isset($recomArr)) {
            foreach ($recomArr as $item) {
          ?>
            <div class="swiper-slide">
              <div class="card">
                <div class="cardimg">
                <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                </div>
                
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill b-pd
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
                    <span class="badge rounded-pill pulele_bg b-pd">
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
                  <h5 class="card-title">
                  <?php
                  $strTitle = $item->name;
                  $strTitle = mb_strimwidth($strTitle, 0, 32, "...", "utf-8");
                  echo $strTitle;
                  ?>
                  </h5>
                  <div class="card-text">
                    <p class="textbootn"><i class="ti ti-calendar-event"></i>수강기간 :
                      <span class="duration">
                      <?php if ($item->due == '') {
                        echo '무제한';
                      } else {
                        echo $item->due;
                      }
                      ?>
                      </span>
                    </p>
                    <?php
                    if ($item->price_status != "무료") {
                    ?>
                      <div>
                      <span class="content_tt number red">
                        <?= $item->price ?>
                      </span><span>원</span>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div>
                        <span class="content_tt red">무료</span>
                        
                      </div>
                      <?php
                  }
                  ?>
                  </div>
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
            </div>
            <?php
              }
            }
            ?> 
          </div>
        </div>
        <div class="swiper-button-next suggestio_next"></div>
        <div class="swiper-button-prev suggestio_prev"></div>
        
      </div>
  </section>
  <section class="sec5 container">
    <div class="plusbox d-flex secc5">
      <h2 class="jua dark sec_tt courset">입문자를 위한 초급강의</h2>
      <a href="/helloworld/user/class/suggestion_list.php"><div class="moreplus d-flex">
        <h3 class="moreview">더보기</h3>
        <span class="material-symbols-outlined">add</span>
      </div>
      </a>  
    </div>
    <!-- Swiper -->
    <div class="page_wrap">
        <div class="swiper beginner_slide">
          <div class="swiper-wrapper">
          <?php
          if (isset($basicArr)) {
            foreach ($basicArr as $item) {
          ?>
            <div class="swiper-slide">
              <div class="card">
                <div class="cardimg">
                <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="강의 썸네일">
                </div>
                
                <div class="card-body">
                  <div class="badge_wrap">
                    <span class="badge rounded-pill b-pd
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
                    <span class="badge rounded-pill pulele_bg b-pd">
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
                  <h5 class="card-title">
                  <?php
                  $strTitle = $item->name;
                  $strTitle = mb_strimwidth($strTitle, 0, 32, "...", "utf-8");
                  echo $strTitle;
                  ?>
                  </h5>
                  <div class="card-text">
                    <p class="textbootn"><i class="ti ti-calendar-event"></i>수강기간 :
                      <span class="duration">
                      <?php if ($item->due == '') {
                        echo '무제한';
                      } else {
                        echo $item->due;
                      }
                      ?>
                      </span>
                    </p>
                    <?php
                    if ($item->price_status != "무료") {
                    ?>
                      <div>
                      <span class="content_tt number red">
                        <?= $item->price ?>
                      </span><span>원</span>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div>
                        <span class="content_tt red">무료</span>
                        
                      </div>
                      <?php
                  }
                  ?>
                  </div>
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
            </div>
            <?php
              }
            }
            ?> 
          </div>
        </div>
        <div class="swiper-button-next beginner_next"></div>
        <div class="swiper-button-prev beginner_prev"></div>
        
      </div>
  </section>
  </form>
  <section class="issue_coupons container d-flex align-items-center">
  <div class="left_coupons">
    <h3>회원가입시 3000원 할인 쿠폰 증정!</h3>
    <p>지금 바로 회원가입하세요!</p>
    <div class="signin_coupon d-flex flex-column align-items-center">
      <img src="<?=$signRs->cp_image?>" alt="회원가입 쿠폰.jpg">
      <a href="/helloworld/user/signup/signup.php"><button class="btn btn-primary">회원 가입</button></a>
    </div>        
  </div>
  <div class="right_coupons">
    <h3>이번 달까지 쿠폰 증정 이벤트</h3>
    <p>회원 가입하고 추가 쿠폰으로 할인 받자!</p>
    <ul>
      <?php
      if (isset($couponArr)) {
        foreach($couponArr as $ca) {
      ?>
      <li class="d-flex flex-column align-items-center">
        <h4><?=$ca->cp_name;?></h4>
        <div class="event_coupon d-flex justify-content-center">
          <img src="<?=$ca->cp_image;?>" alt="<?=$ca->cp_name;?>.jpg">
        </div>
        <button class="couponBtn btn btn-warning" data-couponId ="<?=$ca->cpid;?>">발급 받기</button>
      </li>
      <?php
        }}
        ?>
    </ul>

  </div>
  </section>
</main>
<dialog class="popup">
    <h2><span class="blue">HelloWorld</span> LMS 학습사이트 HelloWorld (4차 프로젝트 포트폴리오)</h2>
    <p>
      <span>본 사이트는 구직용 포트폴리오 사이트입니다.</span>
    </p>

    <hr>

    <div class="info">
      <p><span>제작기간</span> : 2024. 04. 01 - 05. 22</p>
      <p><span>특징</span> : html, css, jQuery (Bootstrap, jQuery Library)</p>
      <p>local: Windows, XAMPP(PHP, APACHE, MYSQL), vscode | remote : PHP, MYSQL</p>
      <p><span>기획</span> : <a href="#" target="_blank" class="figma"><span class="font_green">발표 자료</span></a>  |  <span>코드</span> : <a href="https://github.com/junb119/Team-sudo" target="_blank" class="git"><span>깃허브</span><i class="fa-brands fa-github"></i></a></p>
      <p><span>구현 완료 페이지</span> : <a href="http://worldhello.dothome.co.kr/helloworld/index.php" target="_blank" class="dothome"><span>HelloWorld 메인페이지</span></a></p>
    </div>

    <hr>

    <div class="admin">
      <p><span>관리자 아이디</span> : admin</p>
      <p><span>관리자 비밀번호</span> : 1111</p>
    </div>

    <hr>

    <div class="work">
      <p><span>팀원</span> : 우*범, 임*원, 최*석</p>
      <p><span>기획</span> : 전원</p>
      <br>
      <dl>
        <dd><span>우*범</span> : 로그인/회원가입/마이페이지/</dd>
        <dd><span>임*원</span> : 공지사항/Q&amp;A게시판/수강평게시판</dd>
        <dd><span>최*석</span> : 강의리스트/강의디테일/장바구니/</dd>
      </dl>
    </div>

    <hr>

    <div class="close_wrap d-flex justify-content-between">
      <div class="checkbox">
        <input type="checkbox" id="daycheck" class="hidden">
        <label for="daycheck">
          <i class="fa-solid fa-check"></i>
          오늘 하루 안보기
        </label>
      </div>
      <button type="button" id="close">닫기</button>
    </div>
  </dialog>
  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>
