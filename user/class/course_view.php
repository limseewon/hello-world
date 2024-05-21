<?php

ob_start(); // 최근 본 강의
$title = '강의상세페이지';
$cssRoute1 = '<link rel="stylesheet" href="/helloworld/user/css/common.css"/>';
$cssRoute2 = '<link rel="stylesheet" href="/helloworld/user/css/class/class_common.css"/>';
$cssRoute3 = '';
$cssRoute4 = '';

$script1 = '';
$script2 = '';
$script3 = '';
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

$orederedUser = false;
 
if (isset($_SESSION['UIDX'])){
    $mid =$_SESSION['UIDX'];

    $orderedSql = "SELECT * FROM ordered_courses WHERE course_id = '{$cid}' AND member_id='{$mid}'";
    $orderedResult = $mysqli->query($orderedSql);
    
    if ($orderedResult && $orderedResult->num_rows > 0) {
        $orederedUser = true;
    } 
}


?>

<link rel="stylesheet" href="/helloworld/user/css/class/class_view.css"/>

<main class="heigs">
            <?php
            if (!$orederedUser){
            ?>
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
                    <a href="/helloworld/user/cart/add_cart2.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary cartboxbb">
                        구매
                    </a>
                </div>
            </div>
            
            
            <p class="content_tt"></p>
            <div class="viewPriceWrap">
                <div class="mt-2">
                    <i class="ti ti-calendar-event"></i>
                    <span>수강기간 <?php if ($rs->due == '') {
                            echo '무제한';
                        } else {
                            echo $rs->due;
                        }; ?></span>
                </div>
                <?php if ($rs->price != 0) { ?>
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
    </div><?php
            } 
            ?>
    <input type="hidden" id="cid" value="<?= $cid; ?>">
    <input type="hidden" id="cnt" value="<?= $cnt->cnt ?? 0 ?>">
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
                                <span class="badge rounded-pill pulele_bg b-pd">
                                    <?php
                                    // 뱃지 키워드
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
                                        echo 'green_bg';
                                    } else if ($levelBadge === '중급') {
                                        echo 'orange_bg';
                                    } else {
                                        echo 'blue_bg';
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
                        <p class="content_tt mt-4"><?= $rs->name ?></p>
                        <?php
                        if (!$orederedUser){
                        ?>
                        <div class="cartboxtwo d-flex">
                            <div class="viewBtn mt-5">
                                <a href="/helloworld/user/cart/add_cart.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary dark cartboxb">
                                    장바구니 담기
                                </a>
                            </div>
                            <div class="viewBtn mt-5">
                                <a href="/helloworld/user/cart/add_cart2.php?cid=<?= $rs->cid ?>" class="viewCart btn btn-primary cartboxbb">
                                    구매
                                </a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <p class="content_tt"></p>
                    </div>
                    <div class="viewPriceWrap">
                        <div>
                            <div class="mt-4">
                                <i class="ti ti-calendar-event"></i>
                                <span>수강기간<?php if ($rs->due == '') {
                                        echo '무제한';
                                    } else {
                                        echo $rs->due;
                                    }; ?></span>
                            </div>
                            <?php
                            if (!$orederedUser){
                            if ($rs->price != 0) {
                                ?>
                                <div class="mt-4">
                                    <span class="main_stt number"><?= $rs->price ?></span><span>원</span>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="mt-4">
                                    <span class="main_stt">무료</span>
                                </div>
                                <?php
                            }}
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
                    <?= $rs->content ?>
                </p>
            </div>
        </div>
        <div class="viewWrap_1 pd_6 content-box view2box">
            <div class="pd_2 d-flex justify-content-start">
                <h2 class="jua">강의목록</h2>
            </div>
            <ul class="viewSection2 shadow_box">
                <?php
                foreach ($addImgs as $ai) {
                    ?>
                    <li class="viewList d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="viewImg">
                                <img src="<?= $ai->youtube_thumb ?>" alt=""/>
                            </div>
                            <div>
                                <span><?= $ai->youtube_name ?></span>
                            </div>
                        </div>
                        <?php
                        if ($orederedUser){
                        ?>
                        <div>
                            <a href="<?= $ai->youtube_url ?>"class="youtube-link" target="_blank"><i
                                        class="fa-regular fa-circle-play"></i></a>
                        </div>
                        <?php
                        }
                        ?>
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
                <?php
                // 리뷰 개수 가져오기
                $reviewCountSql = "SELECT COUNT(*) AS review_count FROM review WHERE cid = ?";
                $stmt = $mysqli->prepare($reviewCountSql);
                $stmt->bind_param("i", $cid);
                $stmt->execute();
                $countResult = $stmt->get_result();
                $reviewCount = $countResult->fetch_assoc()['review_count'];
                $stmt->close();
                ?>
                <p>전체 리뷰 [<?= $reviewCount; ?>]건</p>
            </div>
            <div class="content-box content_review">
                        <?php
                        // 로그인한 사용자의 ID
                        $user_id = isset($_SESSION['UID']) ? $_SESSION['UID'] : null;

                        // 사용자가 해당 강의를 구매했는지 확인
                        $purchaseSql = "SELECT * FROM ordered_courses WHERE member_id = (SELECT mid FROM members WHERE userid = ?) AND course_id = ?";
                        $stmt = $mysqli->prepare($purchaseSql);
                        $stmt->bind_param("si", $user_id, $cid);
                        $stmt->execute();
                        $purchaseResult = $stmt->get_result();
                        $isPurchased = $purchaseResult->num_rows > 0;
                        $stmt->close();

                        if ($isPurchased) :
                        ?>
                    <div class="comment-form">
                        <form action="review_save.php" method="POST">
                            <input type="hidden" name="cid" value="<?= $cid; ?>">
                            <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 h4"></i>
                                    <h5 class="mb-0">작성자</h5>
                                    <span class="comment-date text-muted ms-2"><?= date('Y-m-d'); ?></span>
                                    <div class="star-rating ms-2">
                                        <select name="rating" id="rating" class="form-select"
                                                aria-label="Default select example">
                                            <option selected>별점 선택</option>
                                            <option value="5">⭐⭐⭐⭐⭐</option>
                                            <option value="4">⭐⭐⭐⭐</option>
                                            <option value="3">⭐⭐⭐</option>
                                            <option value="2">⭐⭐</option>
                                            <option value="1">⭐</option>
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
                                <textarea class="form-control mt-2" name="content" rows="3"
                                          placeholder="강사와 수강생 모두에게 도움이 되는 좋은 리뷰를 남겨주세요 :)" required></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">등록</button>
                            </div>
                        </form>
                    </div>
                    <?php else : ?>
                        <?php if (!isset($_SESSION['UID'])) : ?>
                            <div class="comment-form text-center">
                                <p>리뷰는 구매한 회원만 작성할 수 있습니다.</p>
                                <button type="button" class="btn btn-primary btn-sm login-btn" href="#" role="button" data-bs-toggle="modal" data-bs-target="#login_modal">로그인</button>
                            </div>
                        <?php else : ?>
                            <div class="comment-form text-center">
                                <p>리뷰는 구매한 회원만 작성할 수 있습니다.</p>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <hr>
                <div class="comment-list">
                    <?php
                    $reviewSql = "SELECT * FROM review WHERE cid = ? ORDER BY date DESC";
                    $stmt = $mysqli->prepare($reviewSql);
                    $stmt->bind_param("i", $cid);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($review = $result->fetch_assoc()) {
                            ?>
                            <div class="comment-item mb-4">
                                <div class="comment-header d-flex align-items-center justify-content-between">
                                    <div class="comment-meta d-flex align-items-center">
                                        <div class="comment-avatar me-2">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                        <span class="comment-author fw-bold me-2"><?= htmlspecialchars($review['name']); ?></span>
                                        <span class="comment-date text-muted ms-2"><?= date('Y-m-d', strtotime($review['date'])); ?></span>
                                        <div class="star-rating">
                                            <?php
                                            $rating = $review['rating'];
                                            for ($i = 1; $i <= 5; $i++) {
                                                $starClass = ($i <= $rating) ? 'fas fa-star text-warning' : 'far fa-star';
                                                echo "<i class='$starClass'></i>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['UID']) && $_SESSION['UID'] == $review['user_id']) : ?>
                                        <div class="comment-actions">
                                            <a href="review_delete.php?cid=<?= $cid; ?>&idx=<?= $review['idx']; ?>" class="delete-link ms-3" onclick="return confirm('정말 삭제하시겠습니까?');">
                                                <span class="material-symbols-outlined">delete</span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="comment-content mt-2">
                                    <p><?= htmlspecialchars($review['content']); ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p class='text-center'>등록된 수강평이 없습니다.</p>";
                    }

                    $stmt->close();
                    ?>
                    </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ratingSelect = document.getElementById('rating');
        const starIcons = document.querySelectorAll('.star-icons i');

        ratingSelect.addEventListener('change', function () {
            const selectedRating = parseInt(this.value);

            starIcons.forEach(function (icon, index) {
                if (index < selectedRating) {
                    icon.classList.remove('far');
                    icon.classList.add('fas', 'text-warning');
                } else {
                    icon.classList.remove('fas', 'text-warning');
                    icon.classList.add('far');
                }
            });
        });
    });
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>