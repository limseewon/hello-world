<?php
  $title = 'mycourses';
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_courses.css"/>';
  $cssRoute3 ='';
  $cssRoute4 ='';
  $script2 = '';
  $script3 = '';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/leftSide.php';
  
  $user_idx = $_SESSION['UIDX'];
  $courseSql = "SELECT * FROM ordered_courses oc JOIN courses c ON oc.course_id = c.cid WHERE oc.member_id = '{$user_idx}' AND c.act='활성'";
  
  $expireSql = $courseSql." AND oc.use_max_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH) AND YEAR(oc.use_max_date)=YEAR(CURDATE())";
  $mycourseSql = $courseSql." AND oc.use_max_date >= DATE_ADD(CURDATE(), INTERVAL 1 MONTH)"; // 년도 뒤지만 달이 앞서면 출력이 안됨;
  
  $expireResult = $mysqli -> query($expireSql);
  while($expireRs = $expireResult -> fetch_object()){
    $expireArr[] = $expireRs;
  }
  $myResult = $mysqli -> query($mycourseSql);
  while($myRs = $myResult -> fetch_object()){
    $rsc2[] = $myRs;
  }
?>
        <section class="mainContainer">
          <h2 class="title">수강 강의</h2>
          <div class="mainContents">
            <div class="Expired">
              <h3>만료 예정 강의</h3>
              <ul class="d-flex flex-column">
                <?php
                  if (isset($expireArr)) {
                    foreach ($expireArr as $item) {
                    $cateString = $item->cate;
                    $parts = explode('/', $cateString);
                  ?>
                <li class="course_list content-box d-flex ">
                  <input type="hidden" name="cid[]" value="<?php echo $item->cid ?>">
                  <!-- <div class="course_li_container d-flex"> -->
                    <!-- <div class="courseimg"> -->
                  <img src="<?= $item->thumbnail ?>" alt="강의 썸네일 이미지" class="border">
                    <!-- </div> -->
                    
                  <div class="course_info">
                    <div>
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
                      
                    </div>
                    <p>
                        <?= $item->content ?>
                      </p>  
                  </div>
                  <!-- </div> -->
                  <div class="last d-flex flex-column justify-content-between align-items-end">
                    <p class="duration nowrap"><i class="ti ti-calendar-event"></i><span>수강기간</span><span class="bold strong">
                        <?php 
                          echo $item->use_max_date;
                         ?>
                      </span>
                      <span>까지</span>
                    </p>
                  

                    <div class="d-flex align-items-end status_box contpo">
                      <!-- <span class="price content_stt contpo2">
                        <span class="number"><?=$item->price; ?></span><span> 원</span>
                      </span> -->
                      <a href="/helloworld/user/class/course_view2.php" class="nowrap btn btn-primary">학습 하기</a>
                      
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
            </div>
            <div class="courses">
              <h3>내 강의</h3>
              <ul class="d-flex flex-column">
                <?php
                  if (isset($rsc2)) {
                    foreach ($rsc2 as $item) {
                    $cateString = $item->cate;
                    $parts = explode('/', $cateString);
                  ?>
                <li class="course_list content-box d-flex ">
                  <input type="hidden" name="cid[]" value="<?php echo $item->cid ?>">
                  <!-- <div class="course_li_container d-flex"> -->
                    <!-- <div class="courseimg"> -->
                  <img src="<?= $item->thumbnail ?>" alt="강의 썸네일 이미지" class="border">
                    <!-- </div> -->
                    
                  <div class="course_info">
                    <div>
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
                      
                    </div>
                    <p>
                        <?= $item->content ?>
                      </p>  
                  </div>
                  <!-- </div> -->
                  <div class="last d-flex flex-column justify-content-between align-items-end">
                    <p class="duration nowrap"><i class="ti ti-calendar-event"></i><span>수강기간</span><span>
                        <?php if ($item->due == '무제한') {
                          echo '무제한';
                        } else {
                          echo $item->use_max_date.' 까지';
                        }
                        ; ?>
                        
                      </span>
                    </p>
                  

                    <div class="d-flex align-items-end status_box contpo">
                      <!-- <span class="price content_stt contpo2">
                        <span class="number"><?=$item->price; ?></span><span> 원</span>
                      </span> -->
                      <a href="" class="nowrap btn btn-primary">학습 하기</a>
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
          </div>
          </div>
        </section>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/rightSide.php';    
    ?>