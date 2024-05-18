
<?php

$title = 'CART';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/common.css"/>';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/class/cart.css"/>';
$cssRoute3 ='';
$cssRoute4 ='';

$script1='';
$script2 = '';
$script3 = '';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';





if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];
  $ssid = '';
} else {
  $ssid = session_id();
  $userid = '';
}

// $cartSql = "SELECT * FROM cart WHERE ssid = '{$ssid}'";

// $cartSql = "SELECT p.thumbnail,p.name,p.price,p.pid,c.cartid,c.cnt,c.options,c.total
//           FROM products p
//               INNER JOIN cart c
//               ON c.pid = p.pid
//               WHERE c.ssid = '{$ssid}' or c.userid = '{$userid}'
// ";

// $cartResult = $mysqli -> query($cartSql);
// while($row = $cartResult->fetch_object()){
//   $cartArr[] = $row;
// }
//print_r($cartArr);
// $sql = "INSERT INTO cart (cid, userid) VALUES ('{$cid}', '{$uid}')"; // 변수에는 장바구니 테이블에 사용자가 선택한 강의(ID: $cid)와 사용자의 ID(ID: $uid)를 삽입하는 SQL 쿼리가 저장
// $insertResult = $mysqli->query($sql); // 데이터베이스에 새로운 장바구니 항목을 추가

if(isset($_SESSION['UID'])){ // 사용자가 로그인한 경우를 확인  만약 세션 변수 UID가 설정되어 있다면(즉, 사용자가 로그인한 경우), 아래의 코드 블록을 실행
  $userid = $_SESSION['UID'];//유저아이디 저장

  //cart item 조회 사용자의 장바구니에 담긴 강의 정보를 조회
  $sqlct = "SELECT c.*,ct.cartid,ct.cid FROM cart ct    

            JOIN courses c ON c.cid = ct.cid
            WHERE ct.userid = '{$userid}'
            ORDER BY ct.cartid DESC";
            // echo $sqlct;
  // courses 테이블의 모든 열과 cart 테이블의 cartid 열을 선택
  // c.*는 courses 테이블의 모든 열을 선택 ct.cartid는 cart 테이블의 cartid 열을 선택
  // cart 테이블과 courses 테이블을 조인하여 해당 사용자의 장바구니에 담긴 강의들의 정보를 가져옴
  // cart 테이블(ct 별칭), merners 테이블(u 별칭) courses 테이블(c 별칭)을 조인 테이블은 각각 ct, u, c로 별칭이 지정
  // cart 테이블의 userid 열과 members 테이블의 userid 열, 그리고 courses 테이블의 cid 열과 cart 테이블의 cid 열을 기준으로 조인
  //merbers 테이블에서 userid 값이 $userid와 일치하는 행만 선택 현재 로그인한 사용자의 장바구니에 담긴 강의 정보만 가져옴
  // cart 테이블의 cartid 열을 기준으로 내림차순으로 정렬
  $result = $mysqli-> query($sqlct);
  
  while($rs = $result->fetch_object()){
    $rscct[]=$rs;
  }



  $cSql = "SELECT uc.ucid, c.cp_name, c.cp_price FROM user_coupons uc JOIN coupons c  ON c.cpid = uc.couponid WHERE uc.status = 1 AND uc.userid = '{$userid}' AND uc.use_max_date >= now()";
                        
  $cResult = $mysqli -> query($cSql);
  while($cRow = $cResult->fetch_object()){
      $cpArr[] = $cRow;
  }
  print_r($cpArr);
  
 
}
else{ // 사용자가 로그인한 상태가 아니라면(else 블록), JavaScript 경고창을 띄워 로그인이 필요하다는 메시지를 출력
  echo "<script>
    alert('로그인이 필요합니다.');
    //location.href = '/helloworld/user/index.php';
  </script>";
}
?>


    
    

<div class="cart_container container ">
  <h2 class="jua main_tt">장바구니</h2>
    <div class="cartOpBtns d-flex justify-content-between col-8">
      <div class="form-check all_check d-flex align-items-center">
        <input class="form-check-input" type="checkbox" value="" id="all_check" checked>
        <label class="form-check-label" for="all_check">전체선택</label>
        <span>|<span class="select_count">0</span>개 (총 <span class="all_count">0</span>개)</span>
      </div>  
    </div>
  <div class="cart_boxfull">
    <ul class="cart_item_container d-flex flex-column ">
    <?php
          if(isset($rscct)){
            foreach($rscct as $cart){
          ?>
      <li class="cart_item shadow_box content-box cart_boxfull2" data-cartid="<?= $cart->cartid; ?>" data-pid="<?= $cart->cid; ?>">
        <input class="form-check-input" type="checkbox" value="" id="cart_item" checked>
        <label class="form-check-label" for="cart_item"></label>
        <img src="<?= $cart->thumbnail ?>" alt="<?= $cart->name ?>" class="radius_5">
        <div class="text_box">
          <div class="title">
            <h3 class="b_text01"><?= $cart->name ?></h3>
            <span class="badge rounded-pill blue_bg b-pd">
            <?php
              if (isset($cart->cate)) {
                $categoryText = $cart->cate;
                $parts = explode('/', $categoryText);
                $lastPart = end($parts);
                echo $lastPart;
              }
            ?>
            </span>
            <span class="badge rounded-pill b-pd
            <?php
              $levelBadge = $cart->level;
              if ($levelBadge === '초급') {
                echo 'yellow_bg';
              } else if ($levelBadge === '중급') {
                echo 'green_bg';
              } else {
                echo 'red_bg';
              }
              ?>
            "><?= $cart->level ?></span>
          </div>
          <div class="descript">
            <p><?= $cart->content ?></p>
          </div>
          <div class="date">
            <i class="ti ti-calendar-event"></i>
            수강기간 <span><?= $cart->due ?></span>
          </div>
        </div>
        
        <i class="fa-solid fa-x cart_item_del"></i>
        <?php
          if($cart->price_status != "무료"){
          ?>
            <span class="price content_tt"><span class="number"><?= $cart->price ?></span>원</span>
          <?php
          }else{
          ?>
            <span class="price content_tt">무료</span>
          <?php 
          } 
          ?>
      </li>
      <?php
        }
      }else {
      ?> 
      <li class="no_cart_container">
        <img src="../img/logo_icon.png" alt="" class="no_cart_img">
        <p class="content_stt">장바구니에 담긴 강의가 없습니다.</p>
        <a href="/helloworld/user/class/courer_list.php" class="btn btn-primary dark">강의목록</a>
      </li>
      <?php
      }
      ?>
    </ul>
    <button class="btn btn-primary dark select_del text-bg-danger">선택삭제</button>
    
  </div>
  <div class="form_container ">
    <form action="/helloworld/user/cart/cart_complete.php" method="POST" class="payment_form radius_12 shadow_box">
      <input type="hidden" name="userid" value="<?=$userid;?>">
      <input type="hidden" id="pid" name="pid[]" value="">
      <input type="hidden" id="cartid" name="cartid[]" value="">
      <input type="hidden" id="totalprice" name="totalprice" value="">
      <div class="contpatbpx">
        <div class="contentbox">
          
          <input type="hidden" value="" class="userid">

          <h3 class="content_stt">결제정보</h3>
          <h4 class="demoHeaders style_pd b_text02">쿠폰선택</h4>
          <select class="form-select" aria-label="쿠폰선택" name="coupon" id="coupon">
              <option selected disabled>쿠폰선택</option>
            <?php
              if(isset($cpArr)){
                  foreach($cpArr as $ca){
              ?>
                  <option data-price="<?= $ca -> cp_price ?>" value="<?= $ca -> ucid ?>"><?= $ca -> cp_name ?></option>
              <?php
                  }
              }
              ?>       
          </select>
        </div>
       
                             
          <div class="update-checkout w-50 text-right">
              <a href="cart_clear_ok.php" id="clearCart">clear cart</a>
              <a href="#" id="updateCart">Update cart</a>
          </div>
                         
        <hr>
        <div class="paymentbox">
          <h2>CART TOTAl</h2>

          
          <div class="payment_info d-flex justify-content-between">
            <p>상품 수 :</p><p><span class="cart_count number">0</span>개</p>
          </div>
          <div class="payment_info d-flex justify-content-between">
            <p>소계 :</p><p><span id="coupon-name"></span><span id="subtotal" class=" number">0</span>원</p>
          </div>
          <div class="payment_info d-flex justify-content-between">
            <p>할인가 :</p><p>- <span class="cart_discount number">0</span><span class="discount_unit">원</span></p>
          </div>
          <hr>
          <div class="payment_total d-flex justify-content-between align-items-center">
            <p class="b_text01">총 결제금액</p><p class="content_tt"><span><strong id="grandtotal">$59.90</strong>원</p>
          </div>
          <div class="butb">
            
            <button class="btn btn-primary dark submit_btn greenbtn">구매하기</button>
          </div>  
        </div>
      </div>
    </form>
  </div>
</div>
<script src="js/cart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', ()=>{






    $('.quantity span').click(function(){
        calcTotal();
    });
    $('.cart_item_del').click(function(){

        $(this).closest('cart_item').remove();
        calcTotal();
        let cartid =  $(this).closest('cart_item').find('.qty-text').attr('data-id');



        let data = {
            cartid :cartid
        }
        $.ajax({
            url:'cart_del.php',
            async:false,
            type: 'POST',
            data:data,
            dataType:'json',
            error:function(){},
            success:function(data){
            console.log(data);
            if(data.result=='ok'){
                alert('장바구니가 업데이트 되었습니다');  
                location.reload();                      
            }else{
                alert('오류, 다시 시도하세요');                        
                }
            }
        });
    });
    //쿠폰적용 계산
    $('#coupon').change(function(){
        
        let couponprice = $(this).find('option:selected').attr('data-price');
        console.log(couponprice);

        $('.cart_discount').text(couponprice);
        calcTotal();
    });
    function calcTotal(){
        let cartItem = $('.cart_item');
        let cartcount = cartItem.length;
        let subtotal = 0;
        let cartids = [];
        let pids = [];
        cartItem.each(function(){
            let price = Number($(this).find('.price span').text());
            let pid = Number($(this).attr('data-pid'));
            pids.push(pid);
            let cartid = Number($(this).attr('data-cartid'));
            console.log(cartid);
            cartids.push(cartid);
            subtotal += price;
        });   
        console.log(subtotal);
         
        $('#pid').val(pids);  
        $('#cartid').val(cartids);  
        let discount = Number($('.cart_discount').text());
        let grand_total = subtotal-discount;
        $('#totalprice').val(grand_total);  
        
        $('#subtotal').text(subtotal);
        $('.cart_count').text(cartcount);
        $('#grandtotal').text(grand_total);
    }
    calcTotal();

    //카트 일괄 업데이트
    $('#updateCart').click(function(e){
        e.preventDefault();
        let cartItem = $('.cart_item');
        let cartIdArr = [];
        let qtyArr = [];

        cartItem.each(function(){
            let cartid = Number($(this).find('.qty-text').attr('data-id'));
            cartIdArr.push(cartid);

            let qty = Number($(this).find('.qty-text').val());
            qtyArr.push(qty);
        })
        console.log(cartIdArr, qtyArr);
        data = {
            cartid:cartIdArr,
            qty:qtyArr
        }
        $.ajax({
            url:'cart_update.php',
            async:false,
            type: 'POST',
            data:data,
            dataType:'json',
            error:function(){},
            success:function(data){
            console.log(data);
            if(data.result=='ok'){
                alert('장바구니가 업데이트 되었습니다');                        
            }else{
                alert('오류, 다시 시도하세요');                        
                }
            }
        });

    });

    /*
    //카트 삭제 업데이트
    $('#clearCart').click(function(e){
        e.preventDefault();

        $.ajax({
            url:'cart_clear.php',
            async:false,
            dataType:'json',
            error:function(){},
            success:function(data){
            console.log(data);
            if(data.result=='ok'){
                alert('장바구니가 비웠습니다.');     
                location.reload();                   
            }else{
                alert('오류, 다시 시도하세요');                        
                }
            }
        });
    })
    */
});    
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>
