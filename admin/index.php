<?php
session_start();
// include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HelloWorld</title>
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

    <!-- <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css" /> -->
    <link rel="stylesheet" href="/helloworld/css/common.css" />
    <link rel="stylesheet" href="/helloworld/css/index.css" />
    
  </head>
  <body>

<!-- <section class="main_wrapper d-flex"> 태그를 삭제하고 그 자리에 아래와 같이 header.php를 넣어주세요.-->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';


$memberCountSql = "SELECT count(*) as ct FROM MEMBERS";
$memberResult = $mysqli->query($memberCountSql);
$memberRs = $memberResult->fetch_object();

$noticeSql = "SELECT * FROM notice ORDER BY idx limit 5";
$noticeResult = $mysqli->query($noticeSql);
while ($noticeRs = $noticeResult->fetch_object()) {
  $noticeArr[] = $noticeRs;
}
$qnaSql = "SELECT * FROM qna ORDER BY idx limit 5";
$qnaResult = $mysqli->query($qnaSql);
while ($qnaRs = $qnaResult->fetch_object()) {
  $qnaArr[] = $qnaRs;
}

$coursesSql = "SELECT * FROM courses";
$coursesResult = $mysqli->query($coursesSql);
while ($coursesRs = $coursesResult->fetch_object()) {
  $coursesArr[] = $coursesRs;
}

$sfSql= "SELECT AVG(satisfaction) as avg FROM ordered_courses;";
$sfResult = $mysqli->query($sfSql);
$sfRs = $sfResult->fetch_object();


$profitSql= "SELECT SUM(c.price) as sum FROM courses c JOIN ordered_courses oc ON oc.course_id = c.cid WHERE YEAR(regdate) = YEAR(CURRENT_DATE()) AND MONTH(regdate) = MONTH(CURRENT_DATE());";
$profitResult = $mysqli->query($profitSql);
$profitRs = $profitResult->fetch_object();


?>
<!-- 작성한 html코드를 아래와 같이 넣어주세요. -->
            <h2>대시 보드</h2>
            <div class="main_top d-flex">
              <div class="left_top">
                <div class="profit contents-box d-flex align-items-center justify-content-between">
                  <span class="bold"><?=date('m');?>월달 수익</span>
                  <span><?=number_format($profitRs->sum);?>원</span>
                  <span class="material-symbols-outlined"> keyboard_double_arrow_down </span>
                </div>
                <div class="student contents-box d-flex align-items-center justify-content-between">
                  <span class="bold">총 수강생 수</span>
                  <span><?=$memberRs->ct;?>명</span>
                  <span class="material-symbols-outlined"> keyboard_double_arrow_up </span>
                </div>
                <div class="evaluation contents-box d-flex align-items-center justify-content-between">
                  <span class="bold">평균 수강만족도</span>
                  <span>★★★★★</span>
                  <span><?=round($sfRs->avg, 2);?></span>
                </div>
              </div>
              <div class="lecture_chart contents-box">
                <select class="form-select course_select" aria-label="Default select example">
                  <option selected disabled>강의 선택</option>
                  <?php
                  if(isset($coursesArr)){
                    foreach($coursesArr as $ca){
                  ?>  
                    <option value="<?=$ca->cid?>"><?=$ca->name?></option>
                  <?php
                  }}
                  ?>
                </select>
                <div class="chart-wrapper d-flex">
                  <p class="bold">수강신청수</p>                    
                  <div class="chart-container">
                    <canvas id="bar-chart"></canvas>
                  </div>
                  <p class="bold">수강진도율</p>
                  <div class="chart-container">
                    <canvas id="pie-chart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="main_bottom d-flex">
              <div class="board">
                <div class="announce contents-box d-flex">
                  <p class="bold">공지사항</p>
                  <ul>
                    <?php
                    if (isset($noticeArr)){
                      foreach($noticeArr as $na) {
                        $str = $na->title;
                        $returnStr = '';
                        $maxLength = 25;
                        if (mb_strlen($str) >= $maxLength) {
                          $returnStr = mb_substr($str, 0, $maxLength - 3) . '...';
                        } else {
                          $returnStr = $str;
                        }
                    ?>
                    <li class="board_list"><a href="<?=$na->idx?>"><?=$na->title?></a></li>
                    <?php
                    }}
                    ?>
                  </ul>
                </div>

                <div class="qna contents-box d-flex">
                  <p class="bold">질의응답</p>
                  <ul>
                    <?php
                    if (isset($qnaArr)){
                      foreach($qnaArr as $qa) {
                        $str = $qa->title;
                        $returnStr = '';
                        $maxLength = 25;
                        if (mb_strlen($str) >= $maxLength) {
                          $returnStr = mb_substr($str, 0, $maxLength - 3) . '...';
                        } else {
                          $returnStr = $str;
                        }
                    ?>
                    <li class="board_list"><a href="<?=$qa->idx?>"><?=$returnStr?></a></li>
                    <?php
                    }}
                    ?>
                  </ul>
                </div>
              </div>
              <div class="sale contents-box d-flex">
                <div class="category">
                  <p class="bold">분야별 판매량</p>
                  <div class="chart"></div>
                </div>
                <div class="language">
                  <p class="bold">언어별 판매량</p>
                  <div class="chart"></div>
                </div>
              </div>
            </div>
          </div>
<!-- 코드 작성 후아래 footer.php를 로드해서 <section class="main_wrapper d-flex">태그를 닫아주세요 -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
?>

<!-- 여기서부터 본인이 필요한 js를 로드해주세요 -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/helloworld/js/common.js"></script>
    <script src="/helloworld/js/index.js"></script>
  </body>
</html>
<!-- 마지막에 body태그와 html태그를 닫아주세요. -->
