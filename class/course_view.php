<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/inc/dbcon.php';
  
$title = "강의 상세";
$css_route = "css/choi.css";
$js_route = "class/js/course.js";

$cid = $_GET['cid'];

$sql = "SELECT * FROM courses where cid={$cid}";
$result = $mysqli->query($sql);
$rs = $result->fetch_object();

$imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
$result = $mysqli->query($imgsql);

while ($is = $result->fetch_object()) {
  $addImgs[] = $is;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강의보기</title>
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

    <!-- <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css"/> -->
    <link rel="stylesheet" href="/helloworld/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/css/index.css"/>
    <link rel="stylesheet" href="/helloworld/css/choi.css"/>
    
    
    
</head>
<body>
<section class="course_view">
  <h2 class="main_tt dark tt_mb">강의 보기</h2>
  <div class="course_list shadow_box">
    <div class="d-flex">
      <div class="view_category">
        <nav
          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
          aria-label="breadcrumb">
          <ol class="breadcrumb">
            <!-- 카테고리 대.중.소 구분 출력 -->
            <?php
            $cateString = $rs->cate;
            $parts = explode('/', $cateString);

            $big_cate = $parts[0];
            $md_cate = $parts[1];
            $sm_cate = $parts[2];
            ?>
            <li class="breadcrumb-item"><a href="#"><?= $big_cate ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $md_cate ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $sm_cate ?></li>
          </ol>
        </nav>
      </div>
      <img src="<?= $rs->thumbnail; ?>" alt="강의 썸네일 이미지" class="border">
      <div class="course_info">
        <div>
          <h3 class="course_list_title main_stt d-flex align-items-center">
            <?= $rs->name; ?>
            <span class="badge rounded-pill blue_bg b-pd javat">
              <?php
              //뱃지 키워드 
              if (isset($rs->cate)) {
                $categoryText = $rs->cate;
                $parts = explode('/', $categoryText);
                $lastPart = end($parts);

                echo $lastPart;
              }
              ?>
            </span>
            <span class="badge rounded-pill b-pd javat_s
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
          </h3>
          <p class="base_mt">
            <?= $rs->content; ?>
          </p>
        </div>
        <div class="d-flex justify-content-between">
          <p class="duration"><i class="ti ti-calendar-event"></i><span>수강기간</span><span><?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span></p>
          <span></span>
          <span class="price main_stt number"><?= $rs->price; ?>원</span>
          
        </div>
      </div>
    </div>
    
    <div class="you_upload mt-3">
      <div class="youtubeTitleBox">
        <div class="d-flex gap-3 justify-content-center">
          <div class=" youtubo">
            <P>썸네일</P>
          </div>
          <div class=" youtubo2">
            <P>차시명</P>
          </div>
          <div class=" youtubo3">
            <P>강의url</P>
          </div>
          <div class="filesBox youtubo4">
            <P>강의문제</P>
          </div>
        </div>
      </div>
      <div class="youtube_link">
        <?php
          if (isset($addImgs)) {
            foreach ($addImgs as $ai) {
              ?>
          <div class="youtube_con d-flex gap-3 justify-content-center poer">
            <div class="d-flex gap-3 youtubeViewcon">
              <div class="youtubeViewthumb yidss2">
                <img src="<?= $ai->youtube_thumb ?>" alt="썸네일">
              </div>
              <div class="youtubeViewname yidss3">
                <span>
                  <?= $ai->youtube_name ?>
                </span>
              </div>
            </div>
            <div class="youtubeViewurl yidss">
              <a href="<?= $ai->youtube_url ?>" target="blank" class="btn btn-outline-secondary">강의영상 바로가기</a>
            </div>
            <div class="file_dsa yidss5">
              <span>
              강의문제
              </span>
            </div>
            <div class="file_dsa yidss4">
              <img src="<?= $rs->course_file; ?>" alt="file">
              
              
            </div>
          </div>
          <?php
            }
          }
          ?>
      </div>
      <div class="filebox_d2">
        <div class="file_dsas">
          <span>
          <?= $rs->course_file_name; ?>
          </span>
        </div>
        <div class="file_dsas5">
          <img src="<?= $rs->course_file; ?>" alt="file">
          
          
        </div>
      </div>
    </div>
  </div>
  <div class="course_status d-flex justify-content-between">
    <div class="d-flex flex-column align-items-end status_wrap">
      <span class="price_btn_wrap mb-3">
        <a href="course_update.php?cid=<?=$rs->cid ?>" class="btn btn-success btn_g">수정</a>
        <a href="course_delete.php?cid=<?=$rs->cid ?>" class="del_btn btn btn-danger btn_g">삭제</a>
      </span>
    </div>
    <div class="c_button ">
    <a href="course_list.php" class="btn btn-dark base_mt back_btn poisont">목록</a>
    </div>
  </div>
  
</section>
<script>


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
  document.querySelector("header").style.height = documentHeight + "px";
  </script>
  </body>
</html>


