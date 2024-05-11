<div class="cart_container container">
      <h2 class="jua main_tt">장바구니</h2>
        <div class="cartOpBtns d-flex justify-content-between col-8">
          <div class="form-check all_check d-flex align-items-center">
            <input class="form-check-input" type="checkbox" value="" id="all_check" checked>
            <label class="form-check-label" for="all_check">전체선택</label>
            <span>|<span class="select_count">0</span>개 (총 <span class="all_count">0</span>개)</span>
          </div>
          <button class="btn btn-primary dark select_del">선택삭제</button>
        </div>

      <div class="d-flex justify-content-between">
        <ul class="cart_item_container col-8 d-flex flex-column">
          
          <li class="cart_item shadow_box">
            <input class="form-check-input" type="checkbox" value="" id="cart_item" checked>
            <label class="form-check-label" for="cart_item</label>
            <img src="" class="radius_5">
            <div class="text_box">
              <div class="title">
                <h3 class="b_text01"></h3>
                <span class="badge rounded-pill blue_bg b-pd">
                  
                </span>
                <span class="badge rounded-pill b-pd
                  
                "></span>
              </div>
              <div class="descript">
                <p></p>
              </div>
              <div class="date">
                <i class="ti ti-calendar-event"></i>
                수강기간 <span></span>
              </div>
            </div>
            <i class="ti ti-x del_btn"></i>
            
          </li>
          
          <li class="no_cart_container">
            <img src="" alt="" class="no_cart_img">
            <p class="content_stt">장바구니에 담긴 강의가 없습니다.</p>
            <a href="" class="btn btn-primary dark">강의목록</a>
          </li>
          
        </ul>

        <div class="form_container col-4">
          <form action="#" method="POST" class="payment_form radius_12 shadow_box">
            <input type="hidden" value="" class="userid">

            <h3 class="content_stt">결제정보</h3>
            <h4 class="demoHeaders style_pd b_text02">쿠폰선택</h4>
            <select class="selectmenu coupon_select">
              <option value="" selected class="default" data-discount="0" data-type="정액" data-limit="-1">보유하고 있는 쿠폰</option>
              
              <option value="" data-discount="" data-limit=""></option>
              
            </select>
            <hr>
            <div class="payment_info d-flex justify-content-between">
              <p>상품 수 :</p><p><span class="cart_count number">0</span>개</p>
            </div>
            <div class="payment_info d-flex justify-content-between">
              <p>상품금액 :</p><p><span class="cart_total_price number">0</span>원</p>
            </div>
            <div class="payment_info d-flex justify-content-between">
              <p>할인가 :</p><p>- <span class="cart_discount number">0</span><span class="discount_unit">원</span></p>
            </div>
            <hr>
            <div class="payment_total d-flex justify-content-between align-items-center">
              <p class="b_text01">총 결제금액</p><p class="content_tt"><span class="cart_pay_price number">0</span>원</p>
            </div>
            <button class="btn btn-primary dark submit_btn">구매하기</button>
          </form>
        </div>
      </div>
    </div>