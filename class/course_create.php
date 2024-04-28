<?php
 $title="강의 등록";
 
 $js_route = "course/js/course.js";
include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/class/category_func.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강의 등록</title>
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
    

    <style>
      
      /* 강의관리-최원석 */
      
      p {
        margin-bottom: 0;
      }
      .btn {
        height: 45px;
        white-space: nowrap;
        box-sizing: border-box;
      }
      .btn_g {
        margin-right: 15px;
      }
      .content_wrap {
        background-color: #f8f8f8;
      }
      .course_sort {
        margin-bottom: calc(var(--c-space_updown) * 2);
      }
      .link_btn {
        display: flex;
        justify-content: flex-end;
        gap: calc(var(--c-space_updown) * 0.5);
        margin-bottom: 25px;
      }
      .course_sort .row,
      .course_list .row,
      .category_add .row {
        margin-bottom: var(--c-space_updown);
      }
      input[type="text"],
      select,
      .btn {
        height: 45px;
        font-size: 16px;
      }
      .level_price {
        height: 45px;
        display: flex;
        align-items: center;
      }
      .level_price div {
        align-items: center;
      }
      .level_price label {
        font-size: 16px;
        margin: 0 12px 0 3px;
        line-height: 45px;
        display: inline-block;
        vertical-align: text-bottom;
        margin-left: 8px;
      }
      .level_price h3 {
        margin-right: calc(var(--c-space_updown) * 0.5);
      }
      .level_price h3.b_text01 {
        margin-right: calc(var(--c-space_updown) * 0.5);
        margin-block-start: 0;
        margin-block-end: 0;
        font-weight: bold;
        vertical-align: bottom;
        display: inline-block;
      }
      .price_check {
        margin-left: 10px;
      }
      .course_list img {
        width: 226px;
        height: 162px;
        margin-right: 20px;
      }

      .course_list {
        width: 100%;
        background: #fff;
        border-radius: 12px;
        padding: 27px;
        margin-bottom: 27px;
      }

      .course_list_title {
        margin-bottom: calc(var(--c-space_updown) * 0.5);
      }
      .duration {
        color: #505050;
        font-style: 13px;
      }
      .course_list .ui-selectmenu-button.ui-button {
        width: 134px;
        margin-bottom: 10px;
      }
      .course_list .primary_bg {
        margin-right: 6px;
      }

      .course_list .col-md-4 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: end;
      }
      .breadcrumb-item {
        font-size: 14px;
      }
      .course_info {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      .course_list select {
        margin-bottom: 5px;
      }
      .level_price span {
        display: flex;
        align-items: center;
      }
      .status_box {
        position: relative;
        width: 100%;
      }
      .status_box .price {
        position: absolute;
        right: 220px;
        width: 200px;
        text-align: right;
      }
      .course_list .price {
        font-weight: bold;
      }
      .price_btn_wrap {
        flex-wrap: wrap;
      }
      .search_bar {
        flex: 1;
      }
      .search_bar input {
        margin-right: 15px;
      }
      .duration * {
        margin-right: calc(var(--c-space_updown) * 0.5);
      }
      .duration i {
        margin-right: calc(var(--c-space_updown) * 0.2);
      }

      .status_wrap {
        display: flex;
        flex-direction: column;
        gap: calc(var(--c-space_updown) * 0.3);
      }

      .status_wrap select {
        width: 100%;
      }

      a.btn {
        line-height: 32px;
      }
      /*카테고리*/

      .btn-check:checked + .btn,
      .btn.active,
      .btn.show,
      .btn:first-child:active,
      :not(.btn-check) + .btn:active {
        border-color: #cdcdcd;
      }
      .tt_mb {
        margin-bottom: calc(var(--c-space_updown) * 2);
      }
      .base_mt {
        margin-top: var(--c-space_updown);
      }
      .category_add_btns {
        display: flex;
        gap: calc(var(--c-space_updown) * 0.5);
      }
      .category_add h3.content_tt {
        margin-bottom: var(--c-space_updown);
      }
      .category_list {
        margin-top: calc(var(--c-space_updown) * 1.5);
      }
      .category_list form {
        margin-bottom: calc(var(--c-space_updown) * 1);
      }
      .table_wrap {
        width: 100%;
      }
      .category_list table {
        margin-bottom: calc(var(--c-space_updown) * 3);
        text-align: center;
        border-radius: 10px;
        width: 45%;
      }
      .category_list table tr * {
        padding: 5px;
      }
      .category_list table thead * {
        margin-top: 30px;
        padding: 10px;
        font-size: 20px;
        font-weight: bold;
      }
      .category_list table tbody * {
        padding: 5px;
        font-size: 16px;
      }
      .category_list table td {
        width: 25%;
      }
      .category_list table i {
        font-size: 22px;
      }
      .modal-body label {
        margin-bottom: 10px;
      }
      .category_list .dropdown {
        width: 100%;
      }
      .dropdown ul {
        width: 100%;
        padding-top: 0;
        padding-bottom: 0;
      }
      .dropdown ul li {
        width: 100%;
        height: 45px;
        padding: 0 15px;
        /* border-bottom: 1px solid #c9e5f7; */
      }
      .list-group-item + .list-group-item {
        border-top-width: 0;
        height: 45px;
        box-sizing: border-box;
        padding: 0 15px;
      }
      .dropdown ul li:last-child {
        border-bottom: none;
      }
      .dropdown ul li:hover {
        background-color: #ecf2ff;
      }
      .dropdown i {
        font-size: 20px;
      }
      .dropdown-toggle::after {
        display: inline-block;
        margin-left: 0;
        vertical-align: 0;
        content: "";
        border-top: none;
        border-right: none;
        border-bottom: 0;
        border-left: none;
      }

      /*강의보기*/

      ol,
      ul {
        padding-left: 0;
      }
      .course_view .course_list {
        padding: 120px 100px;
        position: relative;
      }
      .course_list > div {
        position: relative;
      }
      .course_view img {
        width: 390px;
        height: 274px;
        margin-right: var(--c-space_updown);
      }
      .course_view .view_category {
        position: absolute;
        bottom: 100%;
        right: 0;
      }
      .course_status {
        position: relative;
        margin-top: var(--c-space_updown);
      }
      .status_wrap {
        position: absolute;
        bottom: 0;
        right: 10px;
      }
      .course_view .badge {
        font-size: 20px;
        margin-left: 10px;
      }
      .course_view,
      .course_list_wrap,
      .category_add {
        position: relative;
        margin-bottom: 60px;
      }
      .course_view .back_btn,
      .course_list_wrap .all_modify_btn,
      .category_add .back_btn {
        position: absolute;
        right: 0;
      }

      .course_view .course_list_title {
        display: flex;
        align-items: center;
      }

      /* 강의등록/강의수정 */

      h1 {
        font-family: "jua";
      }

      .c_mt {
        margin-top: calc(var(--c-space_updown) * 1.5);
      }
      .c_mb {
        margin-bottom: calc(var(--c-space_updown));
      }

      select,
      input[type="file"]::file-selector-button,
      input {
        height: 45px;
      }

      .price_select,
      .level_select,
      .period,
      .act {
        width: 50%;
      }

      .trash i,
      .trash_icon i {
        font-size: 35px;
        align-items: center;
      }

    

      .add_listBtn {
        text-align: center;
        margin: calc(var(--c-space_updown) * 2) 0 calc(var(--c-space_updown) * 2.5);
      }
      .add_list a {
        color: #6f6f6f;
        padding-top: 2px;
      }

      .btn_complete {
        margin-right: 15px;
      }

      .level_status {
        height: 45px;
        gap: 10px;
      }

      .c_button {
        padding-bottom: calc(var(--c-space_updown) * 2.5);
      }

      .file_input > img {
        width: 150px;
        margin-top: 10px;
        border-radius: 5px;
      }

      .product_options > img {
        width: 150px;
      }

      .you_upload_content p,
      .youtube p,
      .youtube_v p {
        text-align: center;
        margin-top: 13px;
        font-weight: 600;
      }

      .course_info > h3 {
        width: 100%;
      }

      .youtube_thumb {
        position: relative;
      }

      .youtube_link > div {
        text-align: center;
        align-items: center;
      }

      /* 강의수정 */

      .youtubeThumbBox {
        margin: 10px auto;
        width: 100%;
      }

      .youtubeThumbBox img {
        width: 150px;
        border-radius: 5px;
      }

      /* 강의보기 */

      .youtubeNameBox,
      .youtubeUrlBox {
        height: 50px;
        background-color: #f8f8f8;
        border-radius: 6px;
      }

      .youtubeNameBox,
      .youtubeViewcon,
      .youtubeViewname {
        width: 70%;
      }

      .youtubeUrlBox,
      .youtubeViewurl,
      .youtubeViewthumb {
        width: 30%;
      }

      .youtubeNameBox p,
      .youtubeUrlBox p {
        text-align: center;
        margin-top: 12px;
        font-weight: 600;
      }

      .youtube_con {
        width: 100%;
        height: 150px;
        border-bottom: 1px solid #c2c4c7;
      }

      .youtube_con img {
        width: 150px;
        height: 90px;
        object-fit: contain;
        margin-right: 0;
        border: 1px solid var(--c-lightgray);
        border-radius: 6px;
      }

      .youtubeViewcon,
      .youtubeViewcon img {
        align-items: center;
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
    .thumbnail_box{
      width: 200px;
      height: 140px;
      background-color: #6f6f6f;
    }
    .course_width { 
      width: 48.5%;
    }
    .category_margin {
      margin-top: calc(var(--c-space_updown) * 3); 
    }
    .b_danger_a {
      display: flex; align-items: center; 
    }
    .check_width_box { 
      position: relative;
    }
    .check_width { 
      position: absolute;
      top:65px; left:calc(-1% + 20px); 
    }
    .check_width2 {  
      left:calc(8% + 20px);
    }
    .check_width3 {  
      left:calc(17% + 20px);
    }
    
    .form_width { width: 488px; height: 45px;}
    .form_width2 { width: 200px; height: 45px; }
    
    </style>
</head>
<body>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
  ?>
  
          <h2>강의 등록</h2>
        </div>
        <section class="category_mb category_margin">   
          <form action="course_ok.php" method="POST" id="course_form" enctype="multipart/form-data">
            <input type="hidden" name="progress[]" id="progress" value="1">
            <input type="hidden" name="content" id="content" value="">
            <div class="categorywrap">
              <label for="cate1" class="form-label content_tt c_mb c_cb">카테고리</label>
              <div class="categorys row">
                <div class="category col">
                  <select class="form-select form_width" aria-label="Default select example" id="cate1" name="cate1" required>
                    <option value="" disabled selected>대분류 선택</option>
                      <?php
                        foreach($cate1 as $c){            
                      ?>
                    <option value="<?php echo $c->cateid ?>" data-name="<?php echo $c->name ?>"><?php echo $c->name ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="category col">
                  <select class="form-select form_width" aria-label="Default select example" id="cate2" name="cate2">
                    <option value="" disabled selected>중분류 선택</option>
                  </select>
                </div>
                <div class="category col">
                  <select class="form-select form_width" aria-label="Default select example" id="cate3" name="cate3">
                    <option value="" disabled selected>소분류 선택</option>
                  </select>
                </div>
              </div>
            </div>        
            <div class="course_name c_mt">
              <label for="name" class="form-label content_tt c_mb c_cb course_width">강의명</label>
              <input type="text" class="form-control course_width" name="name" id="name" placeholder="강의명을 입력하세요." required>
            </div>       
            <div class="section3 d-flex gap-5 c_mt">
                <div class="row price_select">
                  <label for="price_menu" class="form-label content_tt c_mb c_cb">강의가격</label>
                  <div class="col">
                    <select class="form-select form_width" name="price_status" id="price_menu" aria-label="Default select example">
                      <option value="유료" selected>유료</option>
                      <option value="무료">무료</option>
                    </select>
                  </div>
                  <div class="col price">
                    <input type="number" class="form-control" name="price" id="price" min="0" max="1000000" step="10000" placeholder="금액">
                  </div>
                </div>
                
            </div>
            <div class="row level level_status c_mt d-flex check_width_box">
              <label class="form-label content_tt c_mb c_cb ">난이도</label>
              <div class="col check_width ">
                <input class="form-check-input " type="radio" name="level" id="low" value="초급">
                <label class="form-check-label" for="low">초급</label>
              </div>
              <div class="col check_width check_width2">
                <input class="form-check-input " type="radio" name="level" id="middle" value="중급">
                <label class="form-check-label" for="middle">중급</label>
              </div>
              <div class="col check_width check_width3">
                <input class="form-check-input " type="radio" name="level" id="high" value="고급">
                <label class="form-check-label" for="high">고급</label>
              </div>
            </div>        
            <div class="periodwrap d-flex gap-5 c_mt">
              <div class="row period mb-6 c_mt">
                <label for="due_status" class="form-label content_tt c_mb c_cb">수강기간</label>
                <div class="col period_select1">
                  <select class="form-select form_width2" name="due_status" id="due_status" aria-label="Default select example">
                    <option value="제한" selected>제한</option>
                    <option value="무제한">무제한</option>
                  </select>
                </div>
                <div class="col period_select2">
                  <select class="form-select form_width" name="due" id="due" aria-label="Default select examh5le">
                    <option value="" selected disabled>기간선택</option>
                    <option value="무제한">무제한</option>
                    <option value="3개월">3개월</option>
                    <option value="6개월">6개월</option>
                    <option value="9개월">9개월</option>
                    <option value="12개월">12개월</option>
                  </select>
                </div>
              </div>
              
            </div>
            <div class="row act c_mt">
              <label class="form-check-label content_tt c_mb c_cb">상태</label>
              <div class="col-2 d-flex align-items-center level_status">
                <input class="form-check-input" type="radio" name="act" id="active" value="활성">
                <label class="form-check-label" for="active">활성</label>
              </div>
              <div class="col-2 d-flex align-items-center level_status">
                <input class="form-check-input" type="radio" name="act" id="inactive" value="비활성">
                <label class="form-check-label" for="inactive">비활성</label>
              </div>
            </div>        
            <div class="content_detail c_mt">
              <h3 class="content_tt c_mb c_cb">상세내용</h3>
              <div id="product_detail"></div>
            </div>        
            <div class="file_input c_mt">
              
              <label for="thumbnail" class="form-label content_tt c_mb c_cb">썸네일</label>
              <div class="thumbnail_box"></div>
              <input type="file" class="form-control c_mt" name="thumbnail" id="thumbnail">
            </div>        
            <div class="upload c_mt">
              <label class="form-label content_tt c_mb c_cb">강의영상 업로드</label>
              <div class="you_upload">
                <div class="you_upload_content">
                  <div class="thumbnail_box "></div>
                  <div class="row c_mb">     
                    <div class="col-2 youtube_thumb">
                      <P>썸네일 강의명</P>
                    </div>
                    <div class="col-3 youtube_name">
                      <P>차시명</P>
                    </div>
                    <div class="col-6 youtube_url">
                      <P>강의url</P>
                    </div>
                  </div>
                </div>
                <div class="youtube c_mb">
                  <div class="row justify-content-between">
                    <div class="col-2 youtube_thumb">
                      <input type="file" class="form-control" name="youtube_thumb[]" id="youtube_thumb">
                    </div>
                    <div class="col-3 youtube_name">
                      <input type="text" class="form-control" name="youtube_name[]" id="youtube_name" placeholder="강의명을 입력하세요">
                    </div>
                    <div class="col-6 youtube_url">
                      <input type="url" class="form-control" name="youtube_url[]" id="youtube_url" placeholder="강의URL을 넣어주세요">
                    </div>
                    <div class="col-1 trash">
                      <i class="ti ti-trash bin_icon"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="add_listBtn">
                <a href="">
                  
                </a>
              </div>
            </div>
            <div class="upload c_mt">
              <label class="form-label content_tt c_mb c_cb">강의 추천 파일</label>
              <div class="you_upload">
                <div class="you_upload_content">
                  <div class="thumbnail_box"></div>
                  <div class="row c_mb">              
                    <div class="col-2 youtube_thumb">
                      <P>썸네일 강의명</P>
                    </div>
                    <div class="col-3 youtube_name">
                      <P>차시명</P>
                    </div>
                    <div class="col-6 youtube_url">
                      <P>강의url</P>
                    </div>
                  </div>
                </div>
                <div class="youtube c_mb">
                  <div class="row justify-content-between">
                    <div class="col-2 youtube_thumb">
                      <input type="file" class="form-control" name="youtube_thumb[]" id="youtube_thumb">
                    </div>
                    <div class="col-3 youtube_name">
                      <input type="text" class="form-control" name="youtube_name[]" id="youtube_name" placeholder="강의명을 입력하세요">
                    </div>
                    <div class="col-6 youtube_url">
                      <input type="url" class="form-control" name="youtube_url[]" id="youtube_url" placeholder="강의URL을 넣어주세요">
                    </div>
                    <div class="col-1 trash">
                      <i class="ti ti-trash bin_icon"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="add_listBtn">
                <a href="">
                  
                </a>
              </div>
            </div>
            <div class="c_button d-flex justify-content-center align-items-center">
              <button class="btn_complete btn btn-success">등록완료</button>
              <button class="btn btn-danger b_danger_a">등록취소</button>
            </div>
          </form>
        </section>
      </div>
    </section>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
    ?>

  <script>
    $(".you_upload").on("click", "#trash", function () {
      $(this).closest(".youtube").remove();
    });
  </script>
  <script src="/helloworld/course/js/makeoption.js"></script>
    
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

  <!-- <script src="js/common.js"></script> -->
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


