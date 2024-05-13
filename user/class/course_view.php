<?php
$title = '강의상세페이지';
$cssRoute1 ='';
$cssRoute2 ='';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

?>
   
    <link rel="stylesheet" href="/helloworld/user/css/common.css"/>
    <link rel="stylesheet" href="/helloworld/user/css/class.view.css"/>


<main>
            <div class="viewTitleWrap d-flex flex-column">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <span class="badge rounded-pill blue_bg b-pd">
                      
                    </span>
                    <span class="badge rounded-pill b-pd
                      
                      ">
                      
                    </span>
                  </div>
                  <div class="viewCate d-flex gap-2">
                    <p></p>
                    <span>></span>
                    <p></p>
                    <span>></span>
                    <p></p>
                  </div>
                  
                </div>
                <div class="cartboxtwo d-flex">
                <div class="viewBtn">
                  <a href="" class="viewCart btn btn-primary dark cartboxb">
                  장바구니 담기
                  </a>
                </div>
                <div class="viewBtn">
                  <a href="" class="viewCart btn btn-primary cartboxbb">
                  구매
                  </a>
                </div>
                </div>
                
                <p class="content_tt"></p>
              </div>
              <div
                class="viewPriceWrap">
                <div>
                  <div>
                    <i class="ti ti-calendar-event"></i>
                    <span>수강기간 </span>
                  </div>
                    <div>
                      <span class="main_stt number"></span><span>원</span>
                    </div>
                  
                    <div>
                      <span class="main_stt">무료</span>
                    </div>
                </div>
                <div>
                </div>
              </div>
            </div>
      <input type="hidden" id="cid" value="">
      <input type="hidden" id="cnt" value="">
      <div class="container">
        <div class="modalBackground">
          <div class="modalBox d-flex flex-column justify-content-between">
            <i class="fa-regular fa-circle-xmark"></i>
            <!-- modalVideo-->
            <div id=player >
              <object type="text/html" data=""></object>
            </div>
            <div class="modalTitle">
              <h4></h4>
              
            </div>
            
          </div>
        </div>
        
        <div class="viewSetion_1 shadow_box">
          <div class="d-flex gap-5">
            <div>
              <img src="" alt="">
            </div>
            <div
              class="viewTitleWrap d-flex flex-column">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <span class="badge rounded-pill blue_bg b-pd">
                      
                    </span>
                    <span class="badge rounded-pill b-pd
                      
                      ">
                      
                    </span>
                  </div>
                  <div class="viewCate d-flex gap-2">
                    <p></p>
                    <span>></span>
                    <p></p>
                    <span>></span>
                    <p></p>
                  </div>
                  
                </div>
                <div class="cartboxtwo d-flex">
                <div class="viewBtn">
                  <a href="" class="viewCart btn btn-primary dark cartboxb">
                  장바구니 담기
                  </a>
                </div>
                <div class="viewBtn">
                  <a href="" class="viewCart btn btn-primary cartboxbb">
                  구매
                  </a>
                </div>
                </div>
                
                <p class="content_tt"></p>
              </div>
              <div
                class="viewPriceWrap">
                <div>
                  <div>
                    <i class="ti ti-calendar-event"></i>
                    <span>수강기간 </span>
                  </div>
                    <div>
                      <span class="main_stt number"></span><span>원</span>
                    </div>
                  
                    <div>
                      <span class="main_stt">무료</span>
                    </div>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
          <div class="pd_3">
            <p class="content_stt fw-bold">강의소개</p>
            <p>
            
            </p>
          </div>
        </div>
        
        <div class="viewWrap_1 pd_6">
          <div class="pd_2 d-flex justify-content-start">
            <h2 class="jua">강의목록</h2>
          </div>
          <div class="viewSection2 shadow_box">
            
            <div class="viewList d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="viewImg">
                  <img src="" alt="" />
                </div>
                <div>
                  <span></span>
                </div>
              </div>
              <div>
                <a href="" onclick="return false" target="_blank"><i class="fa-regular fa-circle-play"></i></a>
              </div>
            </div>
            
          </div>
        </div>

        <div class="viewWrap_2 pd_6">
          <div class="pd_2">
            <h2 class="jua">수강평</h2>
          </div>
          
            <div>
              <p>전체 리뷰 건</p>
            </div>
          
          
              
         
        </div>
      </div>
    </main>