<?php
ob_start(); //최근 본 강의
$title = '강의상세페이지';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/common.css"/>';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/class/class_common.css"/>';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

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
    
    <link rel="stylesheet" href="/helloworld/user/css/class/class_view.css"/>


<main class="heigs">
  <form action="courses_ok.php" method="POST" id="course_form" class="product_save">
  <div class="viewTitleWrap viebox-t content-box">
    <div class="">
      <p class="content_tt"><?= $rs->name ?></p>
      <div class="cartboxtwo d-flex">
        <div class="viewBtn mt-2">
          <a href="/helloworld/user/cart/add_cart.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary dark cartboxb">
            장바구니 담기
          </a>
        </div>
        <div class="viewBtn mt-2">
          <a href="/helloworld/user/class/courses_ok.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary cartboxbb">
            구매
          </a>
        </div>
      </div> 
      <p class="content_tt"></p>
      <div class="viewPriceWrap">
        <div class="mt-2">
          <i class="ti ti-calendar-event"></i>
          <span>수강기간 <?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span>
        </div>
        <?php if($rs->price != 0){ ?>
        <div class="mt-2"> 
          <span class="main_stt number"><?= $rs->price ?></span><span>원</span>
        </div>
        <?php } else { ?>
        <div class="mt-2">
          <span class="main_stt">무료</span>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
    <input type="hidden" id="cid" value="<?= $cid; ?>">
    <input type="hidden" id="cnt" value="<?= $cnt->cnt??0 ?>">
    <div class="container">
      
      <div class="viewSetion_1 shadow_box content-box view1box">
        <div class="d-flex gap-5">
          <div class="section2box">
            <img src="<?= $rs->thumbnail; ?>" alt="">
          </div>
          <div class="viewTitleWrap d-flex flex-column">
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
              <p class="content_tt mt-4"><?= $rs->name?></p>
              <div class="cartboxtwo d-flex">
              <div class="viewBtn mt-5">
                <a href="/helloworld/user/cart/add_cart.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary dark cartboxb">
                장바구니 담기
                </a>
              </div>
              <div class="viewBtn mt-5">
                <a href="/helloworld/user/class/courses_ok.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary cartboxbb">
                구매
                </a>
              </div>
              </div>  
              <p class="content_tt"></p>
            </div>
            <div class="viewPriceWrap">
              <div>
                <div class="mt-4">
                  <i class="ti ti-calendar-event"></i>
                  <span>수강기간<?php if($rs->due == ''){echo '무제한';} else{echo $rs->due;}; ?></span>
                </div>
                  <?php
                    if($rs->price != 0){
                  ?>
                    <div class="mt-4">
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
          <h3 class="content_stt fw-bold mb-3 content_fonts">강의소개</h3>
          <p>
            <?= $rs->content?>
          </p>
        </div>
      </div>
      <div class="viewWrap_1 pd_6 content-box view2box">
        <div class="pd_2 d-flex justify-content-start">
          <h2 class="jua">강의목록</h2>
        </div>
        <ul class="viewSection2 shadow_box">
          <?php
            foreach($addImgs as $ai){
          ?>
          <li class="viewList d-flex justify-content-between align-items-center">
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
          </li>
          <?php           
            }
          ?>
        </ul>
      </div>
      <div class="viewWrap_2 pd_6">
        <div class="pd_2">
          <h2 class="h2_r">수강평</h2>
        </div>
        <div class="review_num">
          <p>전체 리뷰 []건</p>
        </div>
        <div class="content-box">
          <div class="comment-form">
            <form action="review_save.php" method="POST">
              <input type="hidden" name="cid" value="<?= $cid; ?>">
              <div class="mb-3">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person-circle me-2 h4"></i>
                  <h5 class="mb-0">작성자</h5>
                  <span class="comment-date text-muted ms-2"><?= date('Y-m-d'); ?></span>
                  <div class="star-rating ms-2">
                    <select name="rating" class="form-select">
                      <option value="5">★★★★★</option>
                      <option value="4">★★★★</option>
                      <option value="3">★★★</option>
                      <option value="2">★★</option>
                      <option value="1">★</option>
                      <option value="0">없음</option>
                    </select>
                    <div class="star-icons">
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                  </div>
                </div>
                <textarea class="form-control mt-2" name="content" rows="3" placeholder="리뷰는 로그인한 회원만 작성할 수 있습니다. 강사와 수강생 모두에게 도움이 되는 좋은 리뷰를 남겨주세요 :)" required></textarea>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary">등록</button>
              </div>
            </form>
          </div>
          <hr>
          <div class="comment-list">
            <div class="comment-item">
              <div class="comment-header">
                <div class="comment-avatar">
                  <i class="bi bi-person-circle"></i>
                </div>
                <div class="comment-meta">
                  <span class="comment-author">작성자</span>
                  <div class="star-rating">
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                  </div>
                </div>
                <div class="comment-actions">
                  <a href="review_delete.php?cid=<?= $cid; ?>&review_id=<?= $review['id']; ?>" class="delete-link" onclick="confirmDelete(event)">
                    <span class="material-symbols-outlined">delete</span>
                  </a>
                </div>
              </div>
              <div class="comment-content">
                <p>내용</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>
<script>
 $(document).ready(function() {
    $('.star-rating select').on('change', function() {
      var selectedValue = $(this).val();
      var starIcons = $(this).siblings('.star-icons').find('i');
      
      starIcons.each(function(index) {
        if (index < selectedValue) {
          $(this).removeClass('far').addClass('fas');
        } else {
          $(this).removeClass('fas').addClass('far');
        }
      });
    });
  });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>