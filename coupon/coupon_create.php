<?php
$title="쿠폰등록";
$js_route = "js/coupon.js";
$js_route = "coupon/js/coupon.js";  


session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>쿠폰 등록</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
    <link rel="stylesheet" href="/helloworld/css/choi.css"/>
    
    
</head>
<body>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
    
          <h2>쿠폰등록</h2>
        </div>
        <form action="coupon_create_ok.php" class="coupon_create_form" method="POST" enctype="multipart/form-data">
          <fieldset class="coupon_info d-flex just-s-b">
            <legend class="hidden">쿠폰정보</legend>
            <div class="thumbnail coupon_box2">
              <input type="hidden" id="imgSRC" name="imgSRC" value="">
              <input type="file" class="hidden" name="cp_image" id="thumbnail" required>
              <div class="show_thumb border show_picture"></div>
              <button type="button" class="thumb_btn btn btn-success ">사진등록</button>
            </div>
            <div class="coupon_info_box d-flex flex-column coupon_box2">
              <div class="info_top">
                <div class="field coupon_name input-group">
                  <label for="coupon_name" class="content_tt">쿠폰명</label>
                  <input type="text" name="cp_name" id="coupon_name" class="form-control coupon_width"
                    placeholder="쿠폰명을 입력하세요." required>
                </div>
              </div>
      
              <div class="info_bottom d-flex">
                <div class="field coupon_min_price input-group d-flex align-items-center">
                  <label for="coupon_limit" class="content_tt">최소사용금액</label>
                  <input type="number" name="cp_limit" id="coupon_limit" class="form-control number"
                    placeholder="1,000" min="1000" max="1000000" step="1000" required>원
                </div>
                
              </div>
              <div class="field coupon_status">
                <h3 class="content_tt">상태</h3>
                <div class="coupon_status_check d-flex">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="cp_status" id="coupon_status_1" checked value="1">
                    <label class="form-check-label b_text01" for="coupon_status_1">활성화</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="cp_status" id="coupon_status_0" value="0">
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
                  <input class="form-check-input number" type="radio" name="cp_type" id="coupon_sale_1" checked value="정액">
                  <label class="form-check-label b_text01" for="coupon_sale_1">할인가</label>
                  <input type="number" name="cp_price" id="cp_price" class="form-control input number"
                  placeholder="1,000" min="1000" max="1000000" step="1000">원
                </div>
                <div class="form-check d-flex align-items-center coupon_opc">
                  <input class="form-check-input" type="radio" name="cp_type" id="coupon_sale_0" value="정률">
                  <label class="form-check-label b_text01" for="coupon_sale_0">할인율</label>
                  <input type="number" name="cp_ratio" id="cp_ratio" class="form-control input"
                  placeholder="10" min="5" max="100" step="5">%
                </div>
              </div>
            </div>
            <div class="coupon_limit_date">
              <h3 class="content_tt">사용기한</h3>
              <div class="coupon_limit_date_check">
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input" type="radio" name="cp_date_type" id="coupon_limit_date_1" value="0" checked>
                  <label class="form-check-label b_text01" for="coupon_limit_date_1">무제한</label>
                </div>
                <div class="form-check d-flex align-items-center">
                  <input class="form-check-input" type="radio" name="cp_date_type" id="coupon_limit_date_0">
                  <label class="form-check-label b_text01" for="coupon_limit_date_0">제한</label>
                  <div class="col period_select2">
                    <select class="form-select form_heid forwidt" name="cp_date" aria-label="Default select example" disabled>
                    <option value="" selected>선택하세요</option>
                      <option value="1" >1개월</option>
                      <option value="2">2개월</option>
                      <option value="3">3개월</option>
                      <option value="6">6개월</option>
                      <option value="12">12개월</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
    
          </fieldset>
          
      
          <div class="submit_btns d-flex justify-content-end">
            <button class=" coupon_submit_btn btn btn-success">등록 완료</button>
            <button class=" coupon_cancel btn btn-danger" type="button">등록 취소</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- modernizr js -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
  referrerpolicy="no-referrer"
></script>

<script src="/helloworld/js/common.js"></script>
<script src="/helloworld/js/coupon.js"></script>
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

   