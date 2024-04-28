<?php
$title = "카테고리";

$js_route = "class/js/course.js";
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php'; 
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/class/category_func.php'; 

$sql = "SELECT * FROM category WHERE step=1";
$result = $mysqli->query($sql);     
while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}
?>
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
    <link rel="stylesheet" href="/helloworld/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/css/index.css"/>
    

    <style>
      
      /*카테고리 최원석*/

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
      .base_mb {
        margin-bottom: var(--c-space_updown);
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
        margin: 10px;
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
        content: '';
        border-top: none;
        border-right: none;
        border-bottom: 0;
        border-left: none;
      }

      /*강의보기*/
      .category_ts {
        margin-bottom: 80px;
      }
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
        font-family: 'jua';
      }

      .c_mt {
        margin-top: calc(var(--c-space_updown) * 1.5);
      }
      .c_mb {
        margin-bottom: calc(var(--c-space_updown));
      }

      select,
      input[type='file']::file-selector-button,
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
        background-color: var(--c-background);
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
        border: 1px solid var(--bs-border-color);
        border-radius: 6px;
      }

      .youtubeViewcon,
      .youtubeViewcon img {
        align-items: center;
      }
      /* 강의 쿠폰 공통 */

      .main_tt {
        font-family: 'Jua', sans-serif;
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
      .category_margin {
        margin-top: calc(var(--c-space_updown) * 3); 
      }
      .base_bttn { 
        display: flex; align-items: center;
      }
      .form_widthd { 
        width: 467px; 
        height: 45px;
      }
      .form_widthd2 { 
        width: 221px; 
        height: 45px;
      }
      /* .form_widthd3 { width: 704px; height: 45px;} */
    </style>
  
        <?php
          include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
        ?>
        <h2>카테고리 관리</h2>
        <section class="category_add category_margin">
          <h3 class="content_tt">카테고리 등록</h3>
          <!-- Button trigger modal -->
          <div class="category_add_btns btnmargin base_mt">
            <button type="button" class="btn btn-primary margin-r" data-bs-toggle="modal" data-bs-target="#cate1Modal">
              대분류 등록
            </button>
            <button type="button" class="btn btn-primary margin-r" data-bs-toggle="modal" data-bs-target="#cate2Modal">
              중분류 등록
            </button>
            <button type="button" class="btn btn-primary margin-r" data-bs-toggle="modal" data-bs-target="#cate3Modal">
              소분류 등록
            </button>
          </div>

          <!-- Modal 1 -->
          <div class="modal cmodal fade" id="cate1Modal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel1">대분류 등록</h2>
                </div>
                <div class="modal-body">
                  <label for="name1" class="category_">카테고리명</label>
                  <input type="text" class="form-control" name="name1" id="name1" placeholder="대분류명을 입력하세요."/>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn_g" data-step="1" data-bs-dismiss="modal">
                    등록
                  </button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    취소
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal 2-->
          <div class="modal cmodal fade" id="cate2Modal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel2">중분류 등록</h2>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <?php
                      $query = "SELECT * FROM category WHERE step=1";
                      $result = $mysqli->query($query);
                      while ($rs = $result->fetch_object()) {
                        $cate2[] = $rs;
                      }
                    ?>
                    <div class="col-md-12">
                      <select class="form-select form_widthd" aria-label="Default select example" id="pcode2">
                        <option selected disabled>대분류를 선택해주세요.</option>
                        <?php
                          foreach ($cate2 as $p) {
                          ?>
                          <option value="<?= $p->cateid ?>"><?= $p->name ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <label for="name2">카테고리명</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name2"
                    id="name2"
                    placeholder="중분류명을 입력하세요."
                  />
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn_g" data-step="2" data-bs-dismiss="modal">
                    등록
                  </button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    취소
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal 3-->
          <div
            class="modal cmodal fade"
            id="cate3Modal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel3"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel3">소분류 등록</h2>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <select class="form-select form_widthd2" aria-label="Default select example" id="pcode2_1">
                        <option selected disabled>대분류</option>
                        <?php
                          foreach ($cate1 as $c) {
                            ?>
                            <option value="<?= $c->cateid ?>"><?= $c->name ?></option>
                          <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select class="form-select form_widthd2" aria-label="Default select example" id="pcode3">
                        <option selected disabled>대분류를 먼저 선택해주세요</option>
                      </select>
                    </div>
                  </div>
                  <label for="name3">카테고리명</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name3"
                    id="name3"
                    placeholder="소분류명을 입력하세요."
                  />
                </div>
                <div class="modal-footer">
                  <button
                    type="submit"
                    class="btn btn-success btn_g btnmargin"
                    data-step="3"
                    data-bs-dismiss="modal"
                  >
                    등록
                  </button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                    취소
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- 카테고리 리스트 -->
          <div class="category_list ">
            <h3 class="content_tt">카테고리 리스트</h3>
            <div class="row">
              <div class="col-md-4">
                <div class="dropdown big_cate">
                  <button
                    class="btn btn-secondary dropdown-toggle col-md-12 form-select form_widthd3"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false" >
                    대분류
                  </button>
                  <ul class="dropdown-menu" id="cate1" style="width: 100%">
                    <?php
                      foreach ($cate1 as $c) {
                    ?>
                    <li class="list-group-item big d-flex justify-content-between align-items-center" data-cate="<?= $c->cateid ?>">
                      <span class="cate_size"><?= $c->name; ?></span>
                      <div class="cate_edit_btns d-flex gap-2">
                        <a href="category_update.php?cateid=<?= $c->cateid ?>" data-bs-toggle="modal" data-bs-target="#cateModifyModal1"
                          ><i class="ti ti-edit pen_icon"></i
                        ></a>
                        <a href="#"><i class="ti ti-trash bin_icon"></i></a>
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dropdown md_cate">
                <button class="btn btn-secondary dropdown-toggle col-md-12 form-select form_widthd3" type="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  중분류
                </button>
                <ul class="dropdown-menu" id="cate2" style="width: 100%">
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dropdown sm_cate">
                <button class="btn btn-secondary dropdown-toggle col-md-12 form-select form_widthd3" type="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  소분류
                </button>
                <ul class="dropdown-menu " id="cate3" style="width: 100%">
                </ul>
              </div>
            </div>
          </div>
        
        
      
          <!-- 대분류수정 Modal -->
          <div class="modal fade" id="cateModifyModal1" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel4">
                    카테고리 수정
                  </h2>
                </div>
                <form class="modal-body" action="category_update.php" method="POST">
                  <input type="hidden" name="cateid" class="catename" value="<?= $c->cateid; ?>">
                  <label for="name4">카테고리명</label>
                  <input type="text" class="form-control modal_cate_name" name="catename" id="name4" value="">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn_g cate_modify" data-step="1"
                      data-cateid="<?= $c->cateid ?>" data-bs-dismiss="modal">
                      수정
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                      취소
                    </button>
                  </div>
        
                </form>
              </div>
            </div>
          </div>
          <!-- 중분류수정 Modal -->
          <div class="modal fade" id="cateModifyModal2" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel5">
                    카테고리 수정
                  </h2>
                </div>
                <form class="modal-body" action="category_update.php?cateid=<?= $c->cateid; ?>" method="POST">
                  <input type="hidden" name="cateid" class="catename" value="<?= $c->cateid; ?>">
                  <label for="name5">카테고리명</label>
                  <input type="text" class="form-control modal_cate_name" name="catename" id="name5" value="">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn_g cate_modify" data-step="2"
                      data-cateid="<?= $c->cateid ?>" data-bs-dismiss="modal">
                      수정
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                      취소
                    </button>
                  </div>
        
                </form>
              </div>
            </div>
          </div>
          <!-- 소분류수정 Modal -->
          <div class="modal fade" id="cateModifyModal3" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title fs-5" id="exampleModalLabel6">
                    카테고리 수정
                  </h2>
                </div>
                <form class="modal-body" action="category_update.php?cateid=<?= $c->cateid ?>" method="POST">
                  <input type="hidden" name="cateid" class="catename" value="<?= $c->cateid; ?>">
                  <label for="name6">카테고리명</label>
                  <input type="text" class="form-control modal_cate_name" name="catename" id="name6" value="">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn_g cate_modify" data-step="3"
                      data-cateid="<?= $c->cateid ?>" data-bs-dismiss="modal">
                      수정
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                      취소
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <a href="../class/course_list.php" class="btn btn-dark base_mt back_btn base_bttn">돌아가기</a>
        </section>
        </div>
      </div>
      
      <?php
      include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
      ?>
    

  <script src="/helloworld/class/js/makeoption.js"></script>
  <script src="/helloworld/class/js/makeoption2.js"></script>
  
  <script>

    // 카테고리 등록
    let catename1 = '';
    let cateid = '';

    let categorySubmitBtn = $('.cmodal button[type="submit"]');

    $('#pcode2').change(function () {
      $('#code2').val($(this).val());
    });

    $('#pcode3').change(function () {
      $('#code3').val($(this).val());
    });

    categorySubmitBtn.click(function () {
      let step = $(this).attr('data-step');
      save_category(step);
    });

    function save_category(step) {

      let name = $(`#name${step}`).val();
      let pcode = $(`#pcode${step}`).val();

      if (step > 1 && !pcode) {
        alert('대분류를 먼저 선택하세요');
        return; 
      }
      if (!name) {
        alert('카테고리명을 입력하세요');
        return;
      }
      let data = {
        name: name,
        pcode: pcode,
        step: step
      }
      console.log(data);

      $.ajax({
        async: false,
        type: 'post',
        data: data,
        url: "save_category.php",
        dataType: 'json', 
        error: function (error) {
          console.log('Error:', error);
        },
        success: function (return_data) {
          console.log(return_data.result);

          if (return_data.result == 1) {
            alert('카테고리가 등록되었습니다');
            location.reload();
          } else if (return_data.result == -1) {
            alert('코드나 분류명이 이미 사용중입니다.');
            location.reload();
          } else {
            alert('등록실패');
          }
        }
      });//ajax
    }

    // 카테고리 삭제
    $('.dropdown-menu').on('click', '.bin_icon', function () {
      let trElement = $(this).closest('li');
      let cateid = trElement.attr('data-cate');
      let cateName = trElement.find('span').text();

      let data = {
        cateid: cateid
      }

      if (confirm(`해당 카테고리를 삭제할까요?:\n카테고리명: ${cateName}`)) {
        $.ajax({
          type: 'post',
          data: data,
          url: "category_delete.php",
          dataType: 'json',
          success: function (return_data) {
            if (return_data.result === 'success') {
              console.log('retun_data', return_data)
              trElement.remove();
              alert('카테고리가 삭제되었습니다.');
              location.reload();
            } else {
              alert('카테고리 삭제에 실패하였습니다.');
            }
          },
          error: function (error) {
            console.log('Error:', error);
            alert('카테고리 삭제중에 오류가 발생했습니다.');
          }
        });
      }
    });


    // 카테고리 수정
    //리스트 내 수정버튼 클릭 시 할일
    $('.dropdown-menu').on('click', '.pen_icon', function () {
      let trElement = $(this).closest('li');
      let cateid = trElement.attr('data-cate');
      let cateName = trElement.find('.cate_size').text();
      $('.modal').find('.modal_cate_name').val(cateName);
      $('.catename').val(cateid);
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
    <script>
      let documentHeight = Math.max(
        document.body.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.clientHeight,
        document.documentElement.scrollHeight,
        document.documentElement.offsetHeight
      );
      document.querySelector('header').style.height = documentHeight + 'px';
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
  </html>
