<?php

 $title="강의 수정";
 $css_route = "css/choi.css";
 $js_route = "class/js/course.js";

 session_start();
 include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php'; 
 include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/class/category_func.php';

 $cid = $_GET['cid'];
 $sql = "SELECT * FROM courses WHERE cid={$cid}";
 $result = $mysqli -> query($sql);
 $rs = $result -> fetch_object();

 $course_file = explode(",", $rs->course_file);
 $course_file_name = explode(",", $rs->course_file_name);

 
 $imgsql = "SELECT * FROM lecture WHERE cid={$cid}";
 $result = $mysqli -> query($imgsql);
 
 while($is = $result -> fetch_object()){
   $addImgs[]=$is;
 }

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>강의수정</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <!-- <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css"/> -->
    <link rel="stylesheet" href="/helloworld/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/css/index.css"/>
    <link rel="stylesheet" href="/helloworld/css/course_coupon.css"/>
    

   
    
  </head>
  
  <body>
    
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
        ?>
      
            <h2>강의 수정</h2>
          </div>
          <section>
            <form action="update_ok.php" method="POST" id="course_form" enctype="multipart/form-data">
              <input type="hidden" name="image_table_id" id="image_table_id" value=""/>
              <input type="hidden" name="content" id="content" value=""/>
              <input type="hidden" name="cid" id="cid" value="<?= $rs->cid;?>"/>
              <div class="categorywrap category_margin">
                <label class="form-label content_tt c_mb">카테고리</label>
                <div class="categorys row">
                  <div class="category col">
                  <select class="form-select for_widths" aria-label="Default select example" id="cate1" name="cate1" required>
                    <option value="" hidden>선택하세요</option>
                    <?php
                        $cateString = $rs->cate;
                        $parts = explode('/', $cateString);
                
                        $big_cate = $parts[0];
                        $md_cate = $parts[1];
                        $sm_cate = $parts[2];
                    ?>  
                    <?php
                      foreach($cate1 as $c){      
                        if($big_cate == $c->name) {$selected='selected';}else{$selected='';};     
                    ?>
                    <option value="<?php echo $c->cateid ?>" <?= $selected; ?> data-name="<?php echo $c->name ?>"><?php echo $c->name ?></option>
                    <?php } ?>
                  </select>
                  </div>
                  <div class="category col">
                    <select class="form-select form_width" aria-label="Default select example" id="cate2" name="cate2">
                      <option disabled selected></option>
                    </select>
                  </div>
                  <div class="category col">
                    <select class="form-select form_width" aria-label="Default select example" id="cate3" name="cate3">
                      <option disabled selected></option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="course_name c_mt">
                <label for="name" class="form-label content_tt c_mb">강의명</label>
                <input
                  type="text"
                  class="form-control course_width"
                  name="name"
                  id="name"
                  placeholder="강의명을 입력하세요."
                  required
                  value="<?= $rs->name; ?>">
              </div>

              <div class="section3 d-flex gap-5 c_mt">
                <div class="row price_select">
                  <label for="price_status" class="form-label content_tt c_mb">강의가격</label>
                  <div class="col">
                    <select
                      class="form-select form_width"
                      name="price_status"
                      id="price_status"
                      aria-label="Default select example">
                      <option value="유료" selected>유료 <?php if($rs->price_status == "유료")?></option>
                      <option value="무료" selected>무료 <?php if($rs->price_status == "무료")?></option>
                    </select>
                  </div>
                  <div class="col price">
                    <input
                      type="number"
                      class="form-control"
                      name="price"
                      id="price"
                      min="0"
                      max="1000000"
                      step="10000"
                      value="<?= $rs->price; ?>"
                      placeholder="금액"
                    />
                  </div>
                </div>
              </div>
              <div class="row level level_status c_mt check_width_box">
                <label class="form-label content_tt c_mb ">난이도</label>
                <div class="col check_width">
                  <input class="form-check-input " type="radio" name="level" id="low" value="초급" <?php if($rs->level == "초급") echo 'checked' ?>>
                  <label class="form-check-label" for="low">초급</label>
                </div>
                <div class="col check_width check_width2">
                  <input class="form-check-input " type="radio" name="level" id="middle" value="중급" <?php if($rs->level == "중급") echo 'checked' ?>>
                  <label class="form-check-label" for="middle">중급</label>
                </div>
                <div class="col check_width check_width3">
                  <input class="form-check-input " type="radio" name="level" id="high" value="고급" <?php if($rs->level == "고급") echo 'checked' ?>>
                  <label class="form-check-label" for="high">고급</label>
                </div>
              </div>

              <div class="periodwrap d-flex gap-5 c_mt">
                <div class="row period mb-6 c_mt ">
                  <label class="form-label content_tt c_mb">수강기간</label>
                  <div class="col period_select1 margin-rightf ">
                    <select class="form-select form_width2 " name="due_status" id="due_status" aria-label="Default select example">
                      <option value="제한" <?php if($rs->due_status == "제한") echo 'selected' ?>>제한</option>
                      <option value="무제한" <?php if($rs->due_status == "무제한") echo 'selected' ?>>무제한</option>
                    </select>
                  </div>
                  <div class="col period_select2">
                    <select class="form-select form_width" name="due" id="due" aria-label="Default select examh5le">
                    <option value="" disabled>기간선택</option>
                    <option value="무제한" <?php if($rs->due == "무제한") echo 'selected' ?>>무제한</option>
                    <option value="3개월" <?php if($rs->due == "3개월") echo 'selected' ?>>3개월</option>
                    <option value="6개월" <?php if($rs->due == "6개월") echo 'selected' ?>>6개월</option>
                    <option value="9개월" <?php if($rs->due == "9개월") echo 'selected' ?>>9개월</option>
                    <option value="12개월" <?php if($rs->due == "12개월") echo 'selected' ?>>12개월</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row act c_mt">
                <label class="form-check-label content_tt c_mb">상태</label>
                <div class="col-2 d-flex align-items-center level_status">
                  <input class="form-check-input" type="radio" name="act" id="active" value="활성" <?php if($rs->act == "활성") echo 'checked' ?>>
                  <label class="form-check-label" for="active">활성</label>
                </div>
                <div class="col-2 d-flex align-items-center level_status">
                  <input class="form-check-input" type="radio" name="act" id="inactive" value="비활성" <?php if($rs->act == "비활성") echo 'checked' ?>>
                  <label class="form-check-label" for="inactive">비활성</label>
                </div>
              </div>

              <div class="content_detail c_mt">
                <h3 class="content_tt c_mb">상세내용</h3>
                <div id="product_detail"><?= $rs->content; ?></div>
              </div>

              <div class="file_input c_mt">
                <label for="thumbnail" class="form-label content_tt c_mb">썸네일</label>
                <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                <img src="<?= $rs->thumbnail; ?>" alt="" />
              </div>

              <div class="upload c_mt">
                <label class="form-label content_tt c_mb">강의영상 업로드</label>

                <div class="you_upload">
                  <div class="you_upload_content">
                    <!-- <div class="thumbnail_box"></div> -->
                    <div class="row">
                      <div class="col-2">
                        <p>썸네일 강의명</p>
                      </div>
                      <div class="col-3">
                        <p>차시명</p>
                      </div>
                      <div class="col-6">
                        <p>강의url</p>
                      </div>
                    </div>
                  </div>
                  <?php
                    $i = 0;
                    if(isset($addImgs)){
                    foreach($addImgs as $ai){
                  ?>  
                  <div class="youtube c_mb mt-3">
                    <div class="row justify-content-between">
                      <div class="col-2 youtube_thumb">
                        <input type="file" class="form-control" name="youtube_thumb[]" />
                      </div>
                      <div class="col-3 youtube_name ">
                        <input type="text" class="form-control" name="youtube_name[]" value="<?= $ai -> youtube_name?>"/>
                      </div>
                      <div class="col-6 youtube_url">
                        <input type="url" class="form-control" name="youtube_url[]" value="<?= $ai -> youtube_url?>"/>
                      </div>
                      <div class="col-1 trash_icon">
                        <label for="delete-youtube<?= $i; ?>"><i class="ti ti-trash bin_icon"></i></label>
                        <input
                          type="checkbox"
                          class="delete-youtube hidden"
                          id="delete-youtube<?= $i; ?>"
                          name="delete_youtube[]"
                          value="<?= $ai->l_idx ?>"
                        />
                      </div>
                      <div class="youtubeThumbBox">
                        <span class="hidden">기존파일</span>
                        <img src="<?= $ai -> youtube_thumb?>" alt="" />
                      </div>
                    </div>
                    <div>
                      <span>문제</span>
                      <input type="text" name="question[]" value="<?= $ai -> youtube_name?>"placeholder="문제를 입력하세요">
                      <span>정답</span>
                      <input type="text" name="answer[]" value="<?= $ai -> youtube_name?>"placeholder="문제의 답을 입력하세요.">
                    </div>
                  </div>
                  <?php
                  $i++;
                      }
                    }
                    ?>
                </div>
                <div class="add_listBtn">
                  <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                      <path d="M3.99951 15.9977C3.99951 17.5736 4.3099 19.134 4.91296 20.5899C5.51601 22.0458 6.39993 23.3687 7.51423 24.483C8.62853 25.5973 9.9514 26.4812 11.4073 27.0843C12.8632 27.6873 14.4236 27.9977 15.9995 27.9977C17.5754 27.9977 19.1358 27.6873 20.5917 27.0843C22.0476 26.4812 23.3705 25.5973 24.4848 24.483C25.5991 23.3687 26.483 22.0458 27.0861 20.5899C27.6891 19.134 27.9995 17.5736 27.9995 15.9977C27.9995 14.4218 27.6891 12.8614 27.0861 11.4055C26.483 9.9496 25.5991 8.62673 24.4848 7.51243C23.3705 6.39813 22.0476 5.51421 20.5917 4.91116C19.1358 4.3081 17.5754 3.99771 15.9995 3.99771C14.4236 3.99771 12.8632 4.3081 11.4073 4.91116C9.9514 5.51421 8.62853 6.39813 7.51423 7.51243C6.39993 8.62673 5.51601 9.9496 4.91296 11.4055C4.3099 12.8614 3.99951 14.4218 3.99951 15.9977Z" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M11.9995 15.9998H19.9995" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M15.9995 12.0002V20.0002" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    리스트 추가
                  </a>
                </div>
              </div>
              <div class="upload c_mt">
                <label class="form-label content_tt c_mb">강의파일 업로드</label>

                <div class="you_upload2">
                  <div class="you_upload_content">
                    <!-- <div class="thumbnail_box"></div> -->
                    <div class="row">
                      <div class="col-2">
                        <p>썸네일 강의파일</p>
                      </div>
                      <div class="col-3">
                        <p>강의 파일명</p>
                      </div>
                      
                    </div>
                  </div>
                  <?php
                    $i = 0;
                    if(isset($course_file_name)){
                    foreach($course_file_name as $cf){
                  ?>  
                  <div class="youtube2 c_mb mt-3">
                    <div class="row justify-content-between">
                      <div class="col-2 youtube_thumb">
                        <input type="file" class="form-control" name="course_file[]"  />
                      </div>
                      <div class="col-3 youtube_name colew">
                        <input type="text" class="form-control" name="course_file_name" value="<?= $cf; ?>" />
                      </div>
                      
                      <div class="col-1 trash_icon2">
                        <label for="delete-file<?= $i; ?>"></i></label>
                        <input
                          type="checkbox"
                          class="delete-file hidden"
                          id="delete-file<?= $i; ?>"
                          name="delete_file[]"
                          value="<?= $cf ?>"
                        />
                      </div>
                      <div class="youtubeThumbBox">
                        <span class="hidden">기존파일</span>
                        <img src="<?= $course_file[$i]; ?>" alt="" />
                      </div>
                    </div>
                  </div>
                  <?php
                  $i++;
                      }
                    }
                    ?>
                </div>
                <!-- <div class="add_listBtn2">
                  <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                      <path d="M3.99951 15.9977C3.99951 17.5736 4.3099 19.134 4.91296 20.5899C5.51601 22.0458 6.39993 23.3687 7.51423 24.483C8.62853 25.5973 9.9514 26.4812 11.4073 27.0843C12.8632 27.6873 14.4236 27.9977 15.9995 27.9977C17.5754 27.9977 19.1358 27.6873 20.5917 27.0843C22.0476 26.4812 23.3705 25.5973 24.4848 24.483C25.5991 23.3687 26.483 22.0458 27.0861 20.5899C27.6891 19.134 27.9995 17.5736 27.9995 15.9977C27.9995 14.4218 27.6891 12.8614 27.0861 11.4055C26.483 9.9496 25.5991 8.62673 24.4848 7.51243C23.3705 6.39813 22.0476 5.51421 20.5917 4.91116C19.1358 4.3081 17.5754 3.99771 15.9995 3.99771C14.4236 3.99771 12.8632 4.3081 11.4073 4.91116C9.9514 5.51421 8.62853 6.39813 7.51423 7.51243C6.39993 8.62673 5.51601 9.9496 4.91296 11.4055C4.3099 12.8614 3.99951 14.4218 3.99951 15.9977Z" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M11.9995 15.9998H19.9995" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M15.9995 12.0002V20.0002" stroke="#6F6F6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    리스트 추가
                  </a>
                </div> -->
              </div>
              <div class="c_button d-flex justify-content-center align-items-center">
                <button class="btn_complete btn btn-success">수정완료</button>
                <a href="course_list.php" class="btn btn-danger b_danger_a">수정취소</a>
              </div>   
            </div>
           
          </form>
        </section>
      </div>
      <?php
      include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/footer.php';
      ?>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
      integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
      ></script>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery -->
  
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
    <script src="/helloworld/js/makeoption.js"></script>
    <script src="/helloworld/js/course.js"></script>
  </body>
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

  </body>
</html>
