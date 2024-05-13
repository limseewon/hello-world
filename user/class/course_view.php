<?php

ob_start(); //최근 본 강의
$title = '강의상세페이지';
$cssRoute1 ='';
$cssRoute2 ='';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';





$cid = $_GET['cid'];
echo $cid;

$sql = "SELECT * FROM courses where cid={$cid}";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();
echo $rs;

$paysql = "SELECT * FROM payments where cid={$cid}";
$presult = $mysqli->query($paysql);
$payrs = $presult->fetch_object();

$imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
$result = $mysqli->query($imgsql);

while ($is = $result->fetch_object()) {
  $addImgs[] = $is;
}



$re_cnt = $mysqli->query($c_sql);
$cnt = $re_cnt->fetch_object();

$sql1 = "SELECT r.*, u.username, u.userimg, c.name, w.* FROM review r
        JOIN users u ON r.userid = u.userid
        JOIN courses c ON c.cid = r.cid
        LEFT JOIN review_reply w ON r.rid = w.rid
        WHERE r.cid = '{$cid}' limit 0,2";

$result1 = $mysqli->query($sql1);

while ($card = $result1->fetch_object()) {
  $re[] = $card;
}

$cateString = $rs->cate;
$parts = explode('/', $cateString);


 // 최근 본 강의를 저장할 배열 초기화
 $rvarr = [];
 
 if (isset($_COOKIE['recent_view_course'])) {
     $rvc = json_decode($_COOKIE['recent_view_course'], true);

     // 현재 강의가 이미 배열에 있는지 확인
     $found = false;
     foreach ($rvc as $course) {
         if ($course['cid'] == $rs->cid) {
             $found = true;
             break;
         }
     }
     if (!$found) {
         // 이미 3개의 강의가 있는 경우, 가장 오래된 것을 제거
         if (count($rvc) >= 3) {
             array_shift($rvc);
         }
         // 현재 강의를 배열에 추가
         $rvc[] = ['cid' => $rs->cid, 'name' => $rs->name, 'thumbnail' => $rs->thumbnail]; // 강의 데이터에 맞게 수정하세요.
         setcookie('recent_view_course', json_encode($rvc), time() + 86400, '/'); // 24시간 유지되는 쿠키
     }
 } else {
     // 쿠키가 없는 경우, 현재 강의를 포함한 새로운 쿠키 생성
     $rvarr[] = ['cid' => $rs->cid, 'name' => $rs->name, 'thumbnail' => $rs->thumbnail]; // 강의 데이터에 맞게 수정하세요.
     setcookie('recent_view_course', json_encode($rvarr), time() + 86400, '/');
 }

?>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer"> <!--jquery ui-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="/helloworld/user/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/user/css/class.css"/> 
    


<main>
  <!-- <div class="viewTitleWrap d-flex flex-column">
    <div>
      <div class="d-flex justify-content-between">
        <div>
          <span class="badge rounded-pill blue_bg b-pd">           
          </span>
          <span class="badge rounded-pill b-pd">     
          </span>
        </div>
        <div class="viewCate d-flex gap-2">
          <p></p>
          <span>></span>
          <p></p>
          <span>></span>
          <p></p>
        </div>      
      </div>
      <div class="cartboxtwo d-flex">
      <div class="viewBtn">
        <a href="" class="viewCart btn btn-primary dark cartboxb">
        장바구니 담기
        </a>
      </div>
      <div class="viewBtn">
        <a href="" class="viewCart btn btn-primary cartboxbb">
        구매
        </a>
      </div>
      </div> 
      <p class="content_tt"></p>
    </div>
    <div
      class="viewPriceWrap">
      <div>
        <div>
          <i class="ti ti-calendar-event"></i>
          <span>수강기간 </span>
        </div>
        <div>
          <span class="main_stt number"></span><span>원</span>
        </div>
        <div>
          <span class="main_stt">무료</span>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div> -->
    <input type="hidden" id="cid" value="<?= $cid; ?>">
    <input type="hidden" id="cnt" value="<?= $cnt->cnt??0 ?>">
    <div class="container">
      <div class="modalBackground">
        <div class="modalBox d-flex flex-column justify-content-between">
          <i class="fa-regular fa-circle-xmark"></i>
          <!-- modalVideo-->
          <div id=player >
            <object type="text/html" data="<?= $addImgs[0]->youtube_url?>"></object>
          </div>
          <div class="modalTitle">
            <h4></h4>  
          </div>
        </div>
      </div>
      <div class="viewSetion_1 shadow_box">
        <div class="d-flex gap-5">
          <div class="section2box">
            <img src="<?= $rs->thumbnail; ?>" alt="">
          </div>
          <div
            class="viewTitleWrap d-flex flex-column">
            <div>
              <div class="d-flex justify-content-between">
                <div>
                  <span class="badge rounded-pill blue_bg b-pd">  
                  <?php
                        //뱃지 키워드 
                        if (isset($rs->cate)) {
                          $categoryText = $rs->cate;
                          $parts = explode('/', $categoryText);
                          $lastPart = $parts[1];

                          echo $lastPart;
                        }
                      ?>
                  </span>
                  <span class="badge rounded-pill b-pd
                  <?php
                        // 뱃지 컬러
                        $levelBadge = $rs->level;
                        if ($levelBadge === '초급') {
                          echo 'yellow_bg';
                        } else if ($levelBadge === '중급') {
                          echo 'green_bg';
                        } else {
                          echo 'red_bg';
                        }
                      ?>
                      ">
                      <?= $rs->level; ?>
                    
                       
                  </span>
                </div>
                <div class="viewCate d-flex gap-2">
                  <p><?= $parts[0] ?></p>
                  <span>></span>
                  <p><?= $parts[1] ?></p>
                  <span>></span>
                  <p><?= $parts[2] ?></p>
                </div>   
              </div>
              <div class="cartboxtwo d-flex">
              <div class="viewBtn">
                <a href="" class="viewCart btn btn-primary dark cartboxb">
                장바구니 담기
                </a>
              </div>
              <div class="viewBtn">
                <a href="" class="viewCart btn btn-primary cartboxbb">
                구매
                </a>
              </div>
              </div>  
              <p class="content_tt"><?= $rs->name?></p>
            </div>
            <div
              class="viewPriceWrap">
              <div>
                <div>
                  <i class="ti ti-calendar-event"></i>
                  <span>수강기간<?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span>
                </div>
                <?php
                    if($rs->price != 0){
                  ?>
                    <div>
                      <span class="main_stt number"><?= $rs->price?></span><span>원</span>
                    </div>
                  <?php
                    }else{
                  ?>
                    <div>
                      <span class="main_stt">무료</span>
                    </div>
                    <?php 
                    } 
                  ?>
                  
              </div>
              <div>
              </div>
            </div>
          </div>
        </div>
        <div class="pd_3">
          <p class="content_stt fw-bold">강의소개</p>
          <p>
          <?= $rs->content?>
          </p>
        </div>
      </div>
      <div class="viewWrap_1 pd_6">
        <div class="pd_2 d-flex justify-content-start">
          <h2 class="jua">강의목록</h2>
        </div>
        <div class="viewSection2 shadow_box">
        <?php
              foreach($addImgs as $ai){
            ?>
          <div class="viewList d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <div class="viewImg">
                <img src="<?= $ai->youtube_thumb?>" alt="" />
              </div>
              <div>
                <span><?= $ai->youtube_name?></span>
              </div>
            </div>
            <div>
              <a href="<?= $ai->youtube_url?>" onclick="return false" target="_blank"><i class="fa-regular fa-circle-play"></i></a>
            </div>
          </div>
          <?php           
              }
            ?> 
        </div>
      </div>
      <div class="viewWrap_2 pd_6">
        <div class="pd_2">
          <h2 class="jua">수강평</h2>
        </div>
          <div>
            <p>전체 리뷰 건</p>
          </div>
      </div>
    </div>
  </main>
  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>