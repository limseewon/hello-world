<?php
$title="쿠폰수정";
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
$cpid = $_GET['cpid'];
$sql = "SELECT * from coupons where cpid = {$cpid}";
$result = $mysqli -> query($sql);
$coupon = $result -> fetch_object();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>쿠폰수정</title>
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
  

    
    <link rel="stylesheet" href="/helloworld/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/css/index.css"/>
    
      
    <style>
     
     /* 쿠폰 최원석 */
  
     .sub_header h2 {
        margin-bottom: calc(var(--c-space_updown)*2);
      }

      .coupon_info {
        gap: 3%;
      }
      .coupon_info .thumbnail {
        width: 50%;
        min-width: 300px;
        
      }

      .coupon_info .thumbnail .show_thumb {
        padding-top: 70%;
        position: relative;
        overflow: hidden;
       
      }

      .coupon_info .thumbnail .show_thumb img {
        position: absolute;
        right: 0; bottom: 0; top: 0; left: 0;
        width: 100%; height: 100%;
        object-fit: cover;
      }

      .coupon_info .thumbnail .show_thumb:before {
        content: '이미지 등록';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      }

      .coupon_info .thumbnail .thumb_btn {
        margin-top: var(--c-space_updown);
        width: 92%;
        font-size: 16px;
        font-weight: bold;
      }

      .coupon_info .coupon_info_box {
        flex: 1;
        gap: var(--c-space_updown);
      }

      .coupon_info .coupon_info_box .input-group {
        height: auto;
      }

      .coupon_info .coupon_info_box label {
        margin-bottom: var(--c-space_updown);
        line-height: 1;
        width: 100%;
      }

      .coupon_info .coupon_info_box h3 {
        width: 100%;
      }

      .coupon_info .coupon_info_box .info_bottom {
        gap: 4%;
      }

      .coupon_info .coupon_info_box .coupon_name {
        width: 95.5%;
      }
      .coupon_info .coupon_info_box .coupon_min_price {
        width: 99%;
        gap: 0 10px;
      }

      .coupon_info .coupon_info_box .coupon_status_check {
        gap: var(--c-space_updown);
        margin-top: var(--c-space_updown);
      }

      .coupon_info .coupon_info_box .coupon_status label {
        margin-bottom: 0;
        padding-left: 5px;
      }


      .coupon_option {
        margin-top: calc(var(--c-space_updown)*1.5);
        gap: 4%;
      }

      .coupon_option > div {
        width: 48%;
      }

      .coupon_option .form-check {
        gap: 15px;
        margin-top: var(--c-space_updown);
      }

      .coupon_option label {
        white-space: nowrap;
      }

      .coupon_option .form-control {
        width: auto;
        flex: 1;
      }

      .coupon_limit_date_check div:first-child {
        height: 38px;
      }

      .submit_btns {
        margin: calc(var(--c-space_updown)*2) 0;
        gap: calc(var(--c-space_updown)/2);
      }
       /* 강의 쿠폰 공통 */

       .main_tt {
        font-family: "Jua", sans-serif;
        font-size: 32px;
        font-weight: 500;
      }

      .main_stt {
        font-size: 28px;
        font-weight: bold;
      }

      .content_tt {
        font-size: 24px;
        font-weight: bold;
      }

      .content_stt {
        font-size: 20px;
        font-weight: 400;
      }

      .b_text01 {
        font-size: 18px;
        font-weight: 400;
        line-height: 1.4;
      }

      .b_text02 {
        font-size: 16px;
        font-weight: 400;
        line-height: 1.4;
      }
     
      .tt {
        margin: 50px;
      }
      .btn {
        font-size: 16px;
        height: 45px;
        padding-left: 30px;
        padding-right: 30px;
      }
      .coupon_bottom { 
        margin-bottom: 146px;
      }
      .show_picture { 
        width: 715px; 
        height: 245px;     
      }
     .coupon_ju { 
      display: flex; 
      justify-content: center; 
      width: 100%;
    }
     .coupon_box2 { 
      width: 50%;
    }
     .just-s-b { 
      justify-content: space-between;
    }
    .form_hei { height: 45px;}

    </style>
</head>
<body>
  
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
    
          <h2>쿠폰수정</h2>
        </div>
        <div class="sub_header d-flex justify-content-between align-items-center">
      
        </div><!-- //sub_header -->
        
        <form action="coupon_update_ok.php?cpid=<?= $cpid ?>" class="coupon_create_form" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="cpid" value="<?= $coupon->cpid ?>">
          <fieldset class="coupon_info d-flex coupon_ju">
            <legend class="hidden">쿠폰정보</legend>
            <div class="thumbnail coupon_box2">
              <input type="hidden" id="imgSRC" name="imgSRC" value="">
              <input type="file" class="hidden" name="cp_image" id="thumbnail">
              <div class="show_thumb border">
                <img src="<?= $coupon->cp_image?>" alt="<?= $coupon->cp_name?>" alt="">
              </div>
              <button type="button" class="btn btn-success thumb_btn ">사진등록</button>
            </div>
            <div class="coupon_info_box d-flex flex-column coupon_box2">
              <div class="info_top">
                <div class="field coupon_name input-group">
                  <label for="coupon_name" class="content_tt">쿠폰명</label>
                  <input type="text" name="cp_name" id="coupon_name" class="form-control"
                    value="<?= $coupon->cp_name?>" required>
                </div>
              </div>
        
              <div class="info_bottom d-flex">
                <div class="field coupon_min_price input-group d-flex align-items-center">
                  <label for="coupon_limit" class="content_tt">할인조건</label>
                  <input type="number" name="cp_limit" id="coupon_limit" class="form-control number"
                    placeholder="1,000" min="1000" max="100000" step="1000" value="<?= $coupon->cp_limit?>" required>원이상 구매
                </div>
                
              </div>
              <div class="field coupon_status">
                <h3 class="content_tt">상태</h3>
                <div class="coupon_status_check d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="cp_status" id="coupon_status_1" value="1" <?php if($coupon->cp_status == 1){echo 'checked';}  ?>>
                    <label class="form-check-label b_text01" for="coupon_status_1">활성화</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="cp_status" id="coupon_status_0" value="0" <?php if($coupon->cp_status == 0){echo 'checked';}  ?>>
                    <label class="form-check-label b_text01" for="coupon_status_0">비활성화</label>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        
          <fieldset class="coupon_option d-flex">
            <legend class="hidden">쿠폰옵션</legend>
            <div class="coupon_sale">
              <h3 class="content_tt">할인</h3>
              <div class="coupon_sale_check">
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input number" type="radio" name="cp_type" id="coupon_sale_1" value="정액" <?php if($coupon->cp_type == '정액'){echo 'checked';} ?>>
                  <label class="form-check-label b_text01" for="coupon_sale_1">할인가</label>
                  <input type="number" name="cp_price" id="cp_price" class="form-control input number"
                  placeholder="1,000" min="1000" max="100000" step="1000" value="<?php if($coupon->cp_type == '정액'){echo $coupon->cp_price;}?>">원
                </div>
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input" type="radio" name="cp_type" id="coupon_sale_0" value="정률" <?php if($coupon->cp_type == '정률'){echo 'checked';} ?>>
                  <label class="form-check-label b_text01" for="coupon_sale_0">할인율</label>
                  <input type="number" name="cp_ratio" id="cp_ratio" class="form-control input"
                  placeholder="10" min="5" max="100" step="5" value="<?php if($coupon->cp_type == '정률'){echo $coupon->cp_ratio;}?>">%
                </div>
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input" type="radio" name="cp_type" id="coupon_sale_0" value="비할인" <?php if($coupon->cp_type == '비할인'){echo 'checked';} ?>>
                  <label class="form-check-label b_text01" for="coupon_sale_2">비할인</label>
                  
                </div>
                
              </div>
            </div>
              
            <div class="coupon_limit_date">
              <h3 class="content_tt">사용기한</h3>
              <div class="coupon_limit_date_check">
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input" type="radio" name="cp_date_type" id="coupon_limit_date_1" <?php if($coupon->cp_date == ''){echo 'checked';} ?>>
                  <label class="form-check-label b_text01" for="coupon_limit_date_1">무제한</label>
                </div>
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input" type="radio" name="cp_date_type" id="coupon_limit_date_0" <?php if($coupon->cp_date != ''){echo 'checked';} ?>>
                  <label class="form-check-label b_text01" for="coupon_limit_date_0">제한</label>
                  <div class="col period_select2">
                  <select class="form-select" name="cp_date" aria-label="Default select example">
                    <option value="1" <?php if($coupon->cp_date == 1){echo 'selected';} ?>>1개월</option>
                    <option value="2" <?php if($coupon->cp_date == 2){echo 'selected';} ?>>2개월</option>
                    <option value="3" <?php if($coupon->cp_date == 3){echo 'selected';} ?>>3개월</option>
                    <option value="6" <?php if($coupon->cp_date == 6){echo 'selected';} ?>>6개월</option>
                    <option value="12" <?php if($coupon->cp_date == 12){echo 'selected';} ?>>12개월</option>
                  </select>
                    
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        
          <div class="submit_btns d-flex justify-content-end">
            <button class="btn btn-success">수정 완료</button>
            <button class="btn btn-danger coupon_cancel" type="button">수정 취소</button>
          </div>
        </form>
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
    
    <script>
    $(".you_upload").on("click", "#trash", function () {
      $(this).closest(".youtube").remove();
    });


  </script>
  <script src="/helloworld/js/coupon.js"></script>
  
  

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


    
