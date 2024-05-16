<?php
$title = 'Home';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/class/class_common.css"/>';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/index.css"/>';
$script1 = '<script defer src="/helloworld/user/js/index.js"></script>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

// 최신 강의
// $sql = "SELECT * FROM `courses` WHERE YEAR(regdate) = YEAR(current_year) AND MONTH(regdate) = MONTH(current_month) ORDERBY cid DESC limit 8 ";
$sql = "SELECT * FROM `courses` WHERE YEAR(regdate) = YEAR(CURRENT_DATE()) AND MONTH(regdate) = MONTH(CURRENT_DATE()) ORDER BY cid DESC LIMIT 8";
// echo $sql;
$rc_result = $mysqli->query($sql);   // 데이터베이스에서 쿼리를 실행하고, 그 결과를 $rc_result 변수에 저장
while ($rc_rs = $rc_result->fetch_object()) {
  $rc_rsc[] = $rc_rs;
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
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next se1_next"></div>
        <div class="swiper-button-prev se1_prev"></div>  
      </div>
      
      
    </section>
    <section class="sec2">
      <h2 class="jua dark sec_tt"></h2>
      <form action="" class="search">
        <label for="course_search" type="hidden"></label>
        <input type="text" id="course_search" placeholder="배우고 싶은 강의를 입력하세요.">
        <button><i class="ti ti-search"></i></button>
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
        <a href=""><div class="moreplus d-flex">
          
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
                    <a href="/helloworld/user/cart/add_cart.php?cid=<?= $rs->cid ?>" class="card_cart">
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
        <a href=""><div class="moreplus d-flex">
          <h3 class="moreview">더보기</h3>
          <span class="material-symbols-outlined">add</span>
        </div>
        </a>  
      </div>
    <!-- Swiper -->
    <div class="page_wrap">
        <div class="swiper recom_slide">
          <div class="swiper-wrapper">
         
                <div class="swiper-slide">
                  <div class="card">
                    <div class="cardimg">
                    <img src="img/" class="card-img-top" alt="강의 썸네일">
                    </div>
                    
                    <div class="card-body">
                      <div class="badge_wrap">
                        <span class="badge rounded-pill b-pd
                        ">
                        
                          
                        </span>
                        <span class="badge rounded-pill green_bg b-pd">
                        
                        </span>
                      </div>
                      <h5 class="card-title">
                      
                      </h5>
                      <div class="card-text">
                        <p class=""><i class="ti ti-calendar-event"></i>수강기간
                          <span class="duration">
                          
                          </span>
                        </p>
                        
                          <div>
                          <span class="content_tt number red">
                           
                          </span><span>원</span>
                        </div>
                     
                      </div>
                    </div>
                  </div>
                  <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                    <a href="/helloworld/user/class/course_view.php?cid=" class="view_btn"></a>
                    <span>
                      <a href="" class="card_like">
                        
                      </a>
                      <a href="" class="card_cart">
                        
                      </a>
                    </span>
                  </div>
                </div>
            
          </div>
        </div>
        <div class="swiper-button-next suggestio_next"></div>
        <div class="swiper-button-prev suggestio_prev"></div>
        
      </div>
  </section>
  <section class="sec5 container">
    <div class="plusbox d-flex secc5">
      <h2 class="jua dark sec_tt courset">입문자를 위한 초급강의</h2>
      <a href=""><div class="moreplus d-flex">
        <h3 class="moreview">더보기</h3>
        <span class="material-symbols-outlined">add</span>
      </div>
      </a>  
    </div>
    <!-- Swiper -->
    <div class="page_wrap">
      <div class="swiper beginner_slide">
        <div class="swiper-wrapper">
         
              <div class="swiper-slide">
                <div class="card">
                  <img src="" class="card-img-top" alt="강의 썸네일">
                  <div class="card-body">
                    <div class="badge_wrap">
                      <span class="badge rounded-pill b-pd">
                        
                      </span>
                      <span class="badge rounded-pill green_bg b-pd">
                        
                      </span>
                    </div>
                    <h5 class="card-title">
                      
                    </h5>
                    <div class="card-text">
                      <p class=""><i class="ti ti-calendar-event"></i>수강기간
                        <span class="duration">
                          
                        </span>
                      </p>
                      
                      
                        <div>
                          <span class="content_tt red">무료</span>
                        </div>
                      
                    </div>
                  </div>
                </div>
                <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                  <a href="" class="view_btn">상세보기</a>
                  <span>
                    <a href="" class="card_like">
                      
                    </a>
                    <a href="" class="card_cart">
                      
                    </a>
                  </span>
                </div>
              </div>
          
        </div>
      </div>
      <div class="swiper-button-next beginner_next"></div>
      <div class="swiper-button-prev beginner_prev"></div>
    </div>
  </section>
  </form>
</main>
  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>