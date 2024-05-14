<?php
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_coupons.css"/>';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/leftSide.php';     
?>
        <section class="mainContainer">
          <h2 class="title">쿠폰함</h2>
          <div class="mainContents">
            <div class="Expired"><h3>만료 예정 쿠폰</h3></div>
            <div class="courses"><h3>내 쿠폰</h3></div>
          </div>
        </section>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/rightSide.php';    
    ?>