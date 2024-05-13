<?php
$title = '강의리스트';
$cssRoute1 ='';
$cssRoute2 ='';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

?>
    <link rel="stylesheet" href="/helloworld/user/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/user/css/class_list.css"/>


<main>
      <div class="container">
        <div class="section1 d-flex justify-content-between pd_2 pd_5">
          <div class="courseBigTitle jua">
            <h1>강의리스트</h1>
          </div>
        </div>
        <form action="#" class="d-flex gap-3">
            <div class="input-group courseform">
              <input
                type="text"
                class="form-control"
                placeholder="강의명으로 검색"
                name="search"
              >
            </div>
            <div class="searchBtn">
              <button class="btn btn-primary dark secrbp">검색</button>
            </div>
          </form>
        <div class="mainSection d-flex gap-5">
          <form action="#" id="filter-form" class="" method="GET">
            <!-- <input type="hidden" name="cate-array" id="cate-array" value=""> -->
            <div class="categorybox">
            <div class="checkBox_1 mb-3">
              <div class="filterbox d-flex chcekbox_h6">
                <h6 class="chekbox">카테고리</h6>
                <button id="filter-submit-btn" class="btn btn-primary dark category_su">필터</button>
              </div>
              <div class="form-check mt-5">
                <label class="form-check-label" for="total"> 전체선택 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="전체선택"
                  name="cate"
                  id="total"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="frontend">
                  프론트엔드
                </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="프론트엔드"
                  name="cate"
                  id="frontend"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="backend"> 백엔드 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="백엔드"
                  name="cate"
                  id="backend"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="design"> 디자인 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="디자인"
                  name="cate"
                  id="design"
                >
              </div>
            </div>
            <div class="checkBox_2 mb-3 chcekbox_h6">
              <h6>난이도</h6>
              <div class="form-check mt-5">
                <label class="form-check-label" for="level1"> 초급 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="초급"
                  name="level"
                  id="level1"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level2"> 중급 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="중급"
                  name="level"
                  id="level2"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="level3"> 고급 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="고급"
                  name="level"
                  id="level3"
                >
              </div>
            </div>
            <div class="checkBox_3 chcekbox_h6">
              <h6>가격</h6>
              
              <div class="form-check mt-5">
                <label class="form-check-label" for="free"> 무료 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="무료"
                  name="pay"
                  id="free"
                >
              </div>
              <div class="form-check">
                <label class="form-check-label" for="pay"> 유료 </label>
                <input
                  class="form-check-input"
                  type="radio"
                  value="유료"
                  name="pay"
                  id="pay"
                >
              </div>
            </div>
            </div>
           
            
          </form>
          <div class="courseList">
            <div class="row mb-5">
              
              <div class="col-12 col-sm-6 col-md-4 courseBox shadow_box">
                <div class="imgBox">
                  <img
                    src=""
                    class="object-fit-cover"
                    alt=""
                  >
                </div>
                <div class="contentBox d-flex flex-column justify-content-between">
                  <div>
                    <div class="d-flex gap-1">
                      <span class="badge rounded-pill blue_bg b-pd">
                        
                      </span>
                      <span class="badge rounded-pill b-pd
                        
                        ">
                        
                      </span>
                    </div>
                    <div class="courseName fw-bold">
                      
                    </div>
                  </div>
                  <div class="contentTM d-flex flex-column align-items-end">
                    <div>
                      <i class="ti ti-calendar-event"></i>
                      <span>수강기간 </span>
                    </div>

                    <!-- 무료표시하기 -->
                    
                      <div>
                        <span class="content_tt">무료</span>
                      </div>
                    
                    <!-- 무료표시 끝 -->
                  </div>
                </div>
              </div>
              
            </div>
         
            

            <nav aria-label="Page navigation example" class="d-flex justify-content-center pager">
              <ul class="pagination coupon_pager">
                <?php
                  // if($pageNumber>1 && $block_num > 1 ){
                  //   $prev = ($block_num - 2) * $block_ct + 1;
                  //   echo "<li class=\"page-item\"><a href=\"?pageNumber=$prev\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
                  // } else{
                  //   echo "<li class=\"page-item disabled\"><a href=\"\" class=\"page-link\" aria-label=\"Previous\"><span aria-hidden=\"true\">&lsaquo;</span></a></li>";
                  // }
    
    
                  // for($i=$block_start;$i<=$block_end;$i++){
                  //   if($pageNumber == $i){
                  //       echo "<li class=\"page-item active\"><a href=\"?cate=$cate&level=$level&pay=$pay&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
                  //   }else{
                  //       echo "<li class=\"page-item\"><a href=\"?cate=$cate&level=$level&pay=$pay&pageNumber=$i\" class=\"page-link\" data-page=\"$i\">$i</a></li>";
    
                  //   }
                  // }
    
                  // if($pageNumber<$total_page && $block_num < $total_block){
                  //   $next = $block_num * $block_ct + 1;
                  //   echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
                  // } else{
                  //   echo "<li class=\"page-item disabled\"><a href=\"?pageNumber=$total_page\" class=\"page-link\" aria-label=\"Next\"><span aria-hidden=\"true\">&rsaquo;</span></a></li>";
                  // }
                ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </main>