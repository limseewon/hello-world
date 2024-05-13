<?php
$title = 'Home';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/index.css"/>';
$cssRoute2 ='';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';


// 최신 강의
// $sql = "SELECT * FROM `courses` WHERE YEAR(regdate) = YEAR(current_year) AND MONTH(regdate) = MONTH(current_month) ORDERBY cid DESC limit 8 ";
$sql = "SELECT * FROM `courses` WHERE YEAR(regdate) = YEAR(CURRENT_DATE()) AND MONTH(regdate) = MONTH(CURRENT_DATE()) ORDER BY cid DESC LIMIT 8";
// echo $sql;
$rc_result = $mysqli->query($sql);
while ($rc_rs = $rc_result->fetch_object()) {
  $rc_rsc[] = $rc_rs;
}

// print_r($rsc);

// 추천강의

// echo $sql;
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer"> <!--jquery ui-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/helloworld/user/css/index.css"/>
    <script src="js/index.js"></script>
<main>
    <section class="sec1">
      <!-- Swiper -->
      <div class="swiper sec1_slide">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="imagebox">
              <img src="img/index_section1.webp" alt="슬라이드 이미지_01">
            </div>  
            <div class="slidetext">
              <h2></h2>
            </div>        
          </div>
          <div class="swiper-slide">
            <div class="imagebox">
              <img src="img/index_section2.png" alt="슬라이드 이미지_02"></div>
            </div>
            <div class="slidetext">
              <h2></h2>
            </div>      
          <div class="swiper-slide">
            <div class="imagebox">
              <img src="img/index_section3.png" alt="슬라이드 이미지_03">
            </div>   
            <div class="slidetext">
              <h2></h2>
            </div>   
          </div>
          <div class="swiper-slide">
            <div class="imagebox">
             <img src="img/index_section4.gif" alt="슬라이드 이미지_04">
            </div> 
            <div class="slidetext">
              <h2></h2>
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
            <a href="/hello/class/course_list.php?catename=<?= 'HTML'; ?>">
              <img src="img/index_html.jpg" alt="HTML">
              <p>HTML</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="img/index_css.jpg" alt="CSS">
              <p>CSS</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="img/index_js.jpg" alt="Javascript">
              <p>Javascript</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="img/index_php.jpg" alt="PHP">
              <p>PHP</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="img/index_react.jpg" alt="React">
              <p>React</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="img/index_mysql.jpg" alt="SQL">
              <p>SQL</p>
            </a>
          </li>
          <li>
            <a href="">
              <img src="img/index_figma.jpg" alt="Figma">
              <p>Figma</p>
            </a>
          </li>
        </ul>
      </div>
    </section>
    <section class="sec3 container">
      <div class="plusbox d-flex">
        <h2 class="jua dark sec_tt">최신 강의</h2>
        <div class="moreplus d-flex">
          <h3 class="moreview">더보기</h3>
          <span class="material-symbols-outlined">add</span>
        </div>  
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
                        echo 'yellow_bg';
                      } else if ($levelBadge === '중급') {
                        echo 'green_bg';
                      } else {
                        echo 'red_bg';
                      }
                      ?>">
                        <?= $item->level ?>
                          
                        </span>
                        <span class="badge rounded-pill green_bg b-pd">
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
                        <p class=""><i class="ti ti-calendar-event"></i>수강기간
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
                  <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                    <a href="/helloworld/user/class/course_view.php?cid=<?= $item->cid ?>" class="view_btn"></a>
                    <span>
                      <a href="" class="card_like">
                        
                      </a>
                      <a href="" class="card_cart">
                        
                      </a>
                    </span>
                  </div>
                </div>
            <?php
              }
            }
            ?> 
          </div>
        </div>
        <div class="swiper-button-next recom_next"></div>
        <div class="swiper-button-prev recom_prev"></div>
        
      </div>
    </section>
  <section class="sec4 container">
  <div class="plusbox d-flex">
        <h2 class="jua dark sec_tt">추천강의</h2>
        <div class="moreplus d-flex">
          <h3 class="moreview">더보기</h3>
          <span class="material-symbols-outlined">add</span>
        </div>  
      </div>
    <!-- Swiper -->
    <div class="page_wrap">
        <div class="swiper recom_slide">
          <div class="swiper-wrapper">
          <?php
          if (isset($new_rsc)) {
            foreach ($new_rsc as $item) {
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
                        echo 'yellow_bg';
                      } else if ($levelBadge === '중급') {
                        echo 'green_bg';
                      } else {
                        echo 'red_bg';
                      }
                      ?>">
                        <?= $item->level ?>
                          
                        </span>
                        <span class="badge rounded-pill green_bg b-pd">
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
                        <p class=""><i class="ti ti-calendar-event"></i>수강기간
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
                  <div class="view_wrap d-flex align-items-center justify-content-center flex-column">
                    <a href="/helloworld/user/class/course_view.php?cid=<?= $item->cid ?>" class="view_btn"></a>
                    <span>
                      <a href="" class="card_like">
                        
                      </a>
                      <a href="" class="card_cart">
                        
                      </a>
                    </span>
                  </div>
                </div>
            <?php
              }
            }
            ?> 
          </div>
        </div>
        <div class="swiper-button-next recom_next"></div>
        <div class="swiper-button-prev recom_prev"></div>
        
      </div>
  </section>
  <section class="sec5 container">
  <div class="plusbox d-flex">
        <h2 class="jua dark sec_tt">입문자를 위한 초급강의</h2>
        <div class="moreplus d-flex">
          <h3 class="moreview">더보기</h3>
          <span class="material-symbols-outlined">add</span>
        </div>  
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
      <div class="swiper-button-next new_next"></div>
      <div class="swiper-button-prev new_prev"></div>
    </div>
  </section>
  
</main>
  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>