<?php
  $title = 'mycoupons';
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_coupons.css"/>';
  $cssRoute3 ='';
  $cssRoute4 ='';
  $script2 = '';
  $script3 = '';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/leftSide.php';     

  $allsql = "SELECT * from coupons where 1=1";
  $allrc = $mysqli -> query($allsql);
  while($rs = $allrc -> fetch_object()){
    $allrsc[] = $rs;
  }
  
  
  // //필터되어 나타날 쿠폰
  // //기본은 모두 나타나도록!
  // $sql = "SELECT * from coupons where 1=1";
  // $order = ' order by cpid desc';
  // $sc_where = '';//필터, 검색 조건담을 변수
  
  
  // //1. 쿠폰 활성/비활성 filter 조건
  // $cp_filter = $_GET['coupon_filter']??'';
  // $filter_where = '';
  
  // //필터가 빈값이거나 모든쿠폰을 선택하면
  // if($cp_filter == '-1' || $cp_filter == ''){
  //   //모든 쿠폰 보여주도록
  //   $filter_where .= " 1=1";
  //   $sc_where .= '';
  
  // //$cp_filter == 0 || $cp_filter == 1 (활성,비활성쿠폰)
  // } else{
  //   //해당하는 타입의 쿠폰 보여주도록
  //   $filter_where .= " cp_status='{$cp_filter}'";
  //   $sc_where .= ' and'.$filter_where;
  // }
  
  
  // //2. 검색어(전체쿠폰에서 검색)필터 조건
  // $search_where = '';
  // $cp_search = $_GET['search']??'';
  
  // //검색어가 있으면 쿠폰 이름에서 찾아서 적용
  // if($cp_search){
  //   $search_where .= " cp_name like '%{$cp_search}%'";
  //   $sc_where = ' and'.$search_where;
  // } else{
  //   $search_where = '';
  // }
  
  
  
  
  // //----------------------------------------------pagenation 시작
  // //pagenation 필터 조건문 (필터 없으면 필요없음)
  // if($cp_filter !== '' && $search_where === ''){
  //   $pagerwhere = $filter_where;
  // } else if($cp_search !== '' && $cp_filter === ''){
  //   $pagerwhere = $search_where;
  // } else{
  //   $pagerwhere = ' 1=1';
  // }
  
  
  // //필터 없으면 여기서부터 복사! *******
  // $pagenationTarget = 'coupons'; //pagenation 테이블 명
  // $pageContentcount = 6; //페이지 당 보여줄 list 개수
  // include_once $_SERVER['DOCUMENT_ROOT'].'/helloworld/class/pager.php';
  // $limit = " limit $startLimit, $pageCount"; //select sql문에 .limit 해서 이어 붙이고 결과값 도출하기!
  
  
  // //최종 query문, 실행
  // $sqlrc = $sql.$sc_where.$order.$limit; //필터 있
  // //$sqlrc = $sql.$limit; //필터 없
  // //----------------------------------------------pagenation 끝
  
  // $result = $mysqli -> query($sqlrc);
  // while($rs = $result -> fetch_object()){
  //   $rsc[] = $rs;
  // }
  
  $user_id = $_SESSION['UID'];
  $couponsSql = "SELECT * FROM user_coupons uc JOIN coupons c ON uc.couponid = c.cpid WHERE uc.userid = '{$user_id}' AND uc.status=1";
  
  $expireSql = $couponsSql." AND uc.use_max_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH)";
  $mycouponSql = $couponsSql." AND uc.use_max_date > DATE_ADD(CURDATE(), INTERVAL 1 MONTH)";
  // $my_couponsSql = "SELECT uc.* FROM user_coupons uc JOIN coupons c ON uc.couponid = c.cpid  WHERE uc.userid = '{$user_id}' AND uc.status=1";
  // $my_couponsSql = "SELECT uc.* FROM user_coupons uc WHERE uc.userid = '{$user_id}' AND uc.status=1";
  // echo $my_couponsSql;
  
  $expireResult = $mysqli -> query($expireSql);
  while($expireRs = $expireResult -> fetch_object()){
    $expireArr[] = $expireRs;
  }
  $myResult = $mysqli -> query($mycouponSql);
  while($myRs = $myResult -> fetch_object()){
    $myArr[] = $myRs;
  }

?>
        <section class="mainContainer">
          <h2 class="title">쿠폰함</h2>
          <div class="mainContents">
            <div class="Expired">
              <h3>만료 예정 쿠폰</h3>
              <ul class="d-flex flex-wrap">
                <?php
                if(isset($expireArr)){
                  foreach($expireArr as $coupon){
                ?>
                <li class="coupon_container content-box d-flex align-items-center" data-cpid="<?= $coupon->cpid ?>">
                  <img src="<?= $coupon->cp_image ?>" alt="<?= $coupon->cp_name ?>" class="border" />
                  <div class="text_box">
                    <h4 class="b_text01 bold" title="<?= $coupon->cp_name ?>"><?= $coupon->cp_name ?></h4>
                    <p>사용기한 : <span class="bold strong"><?php if($coupon->cp_date == '0'){echo '무제한';}else{echo $coupon->use_max_date;} ?></span></p>
                    <p class="updownw">최소사용금액 : <span class="number"><?= $coupon->cp_limit ?></span>원</p>
                    <p class="updownw">
                    할인액 : 
                      <span class="number"><?=$coupon->cp_price;?></span>
                      <span>원</span>
                    </p>
                  </div>
                  <!-- <div class="icons">
                    <a href="/helloworld/coupon/coupon_update.php?cpid=<?= $coupon->cpid ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/helloworld/coupon/coupon_delete_ok.php?cpid=<?= $coupon->cpid ?>" class="del_btn"><i class="fa-solid fa-trash-can"></i></a>
                  </div> -->
                  <!-- <div class="form-check form-switch cp_status_toggle ">
                    <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckDefault<?= $coupon->cpid ?>"<?php if($coupon->cp_status == 1){echo 'checked';} else{echo '';}?>>
                    <label class="form-check-label input_colopr" for="flexSwitchCheckDefault<?= $coupon->cpid ?>"></label>
                  </div> -->
                </li>
                <?php
                  }
                  // $i++;
                }else {
                ?>

                <p>등록된 쿠폰이 없습니다.</p>
                <?php
                }
                ?>
              </ul>
            </div>
            <div class="coupons">
              <h3>내 쿠폰</h3>
              <ul class="d-flex flex-wrap">
                <?php
                if(isset($myArr)){
                  foreach($myArr as $coupon){
                ?>
                <li class="coupon_container content-box d-flex align-items-center" data-cpid="<?= $coupon->cpid ?>">
                  <img src="<?= $coupon->cp_image ?>" alt="<?= $coupon->cp_name ?>" class="border" />
                  <div class="text_box">
                    <h4 class="b_text01 bold" title="<?= $coupon->cp_name ?>"><?= $coupon->cp_name ?></h4>
                    <p>사용기한 : <?php if($coupon->cp_date == '0'){echo '무제한';}else{echo $coupon->cp_date.'개월';} ?></p>
                    <p class="updownw">최소사용금액 : <span class="number"><?= $coupon->cp_limit ?></span>원</p>
                    <p class="updownw">
                    할인액 : 
                      <span class="number"><?=$coupon->cp_price;?></span>
                      <span>원</span>
                    </p>
                  </div>
                  <!-- <div class="icons">
                    <a href="/helloworld/coupon/coupon_update.php?cpid=<?= $coupon->cpid ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/helloworld/coupon/coupon_delete_ok.php?cpid=<?= $coupon->cpid ?>" class="del_btn"><i class="fa-solid fa-trash-can"></i></a>
                  </div> -->
                  <!-- <div class="form-check form-switch cp_status_toggle ">
                    <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckDefault<?= $coupon->cpid ?>"<?php if($coupon->cp_status == 1){echo 'checked';} else{echo '';}?>>
                    <label class="form-check-label input_colopr" for="flexSwitchCheckDefault<?= $coupon->cpid ?>"></label>
                  </div> -->
                </li>
                <?php
                  }
                  // $i++;
                }else {
                ?>

                <p>등록된 쿠폰이 없습니다.</p>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
        </section>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/rightSide.php';    
    ?>