<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/admin_check.php';
$coursesSql = "SELECT * FROM courses";
$coursesResult = $mysqli->query($coursesSql);
while ($coursesRs = $coursesResult->fetch_object()){
  $coursesArr[] = $coursesRs;
}

$paginationTarget = 'members';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';

$sql = "SELECT * FROM members where 1=1"; //모든 상품 조회 쿼리
$sql .= '';
$order = " order by mid";
$sql .= $order;
$limit = " LIMIT $startLimit, $endLimit";
$sql .= $limit;
// echo $sql;
$result = $mysqli->query($sql);

while ($rs = $result->fetch_object()) {
  $memberArr[] = $rs;
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HelloWorld</title>
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
    <link rel="stylesheet" href="/helloworld/css/common.css" />
    <link rel="stylesheet" href="/helloworld/css/member_mg.css" />
  </head>
  <body>
    <div class="member_modal modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">회원 정보</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="profile d-flex align-items-center">
              <span class="material-symbols-outlined">account_circle</span>
              <div class="d-flex flex-column">
                <span class="class">수강생</span>
                <span id="modal_username"></span>
              </div>
              <div id="modal_email"></div>
              <button type="button" class="msg_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">                  <span class="material-symbols-outlined"> mail </span>
              </button>
            </div>
            <hr>
            <div class="information">
              <ul class="d-grid">
                <li><span class="m_title">아이디</span><span id="modal_id"></span></li>
                <li><span class="m_title">최근 접속일</span><span id="modal_recent"></span></li>
                <li><span class="m_title">가입일</span><span id="modal_regdate"></span></li>
                <li><span class="m_title">연락처</span><span id="modal_tel"></span></li>
              </ul>
            </div>
            <div>
              <span class="m_title">수강 강의</span>
              <ul class="list-group" id="course_list">
                
              </ul>
            </div>
            <div class="coupon">
              <span class="m_title ">보유 쿠폰</span>
              <div class="coupon_list">
                
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-danger member_del" data-bs-dismiss="modal">회원 삭제</button>
            <button type="button" class="btn btn-success modeal_sleep"></button>
          </div>
        </div>
      </div>
    </div> 
    <div class="message_modal modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">메시지 전송</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">받는 사람:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
            <button type="button" class="btn btn-primary">메시지 전송</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal member_del_confirm" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">정말 삭제하시겠습니까?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary member_del_ok" data-bs-dismiss="modal">삭제</button>
            <button type="button" class="btn btn-danger">취소</button>
          </div>
        </div>
      </div>
    </div>
    
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
?>
            <h2>회원 관리</h2>
            <form action="" class="d-flex justify-content-between">
              <div class="filter d-flex">
                <select class="form-select lecture" aria-label="Default select example">
                  <option selected disabled>강좌명</option>
                  <?php
                  if(isset($coursesArr)){
                    foreach($coursesArr as $ca) {
                  ?>
                  <option value="<?=$ca->cid?>"><?=$ca->name?></option>
                  <?php
                  }}
                  ?>
                </select>
              </div>
              <div class="search d-flex">
                <select class="form-select search_filter" aria-label="Default select example">
                  <option selected>닉네임</option>
                  <option value="1">아이디</option>
                  
                </select>
                <div class="form-floating">
                  <input type="search" class="form-control" id="search_member" placeholder="" />
                  <label for="search">검색어를 입력하세요</label>
                </div>
                <button type="submit" class="btn btn-primary search_btn">검색</button>
              </div>
            </form>
            <table class="table table-hover table-striped">
              <thead class="table-dark">
                <tr>
                  <th scope="col">
                    <div>
                      <input type="checkbox" value="" id="member_cb" />
                      <label for="member_cb"> 전체선택 </label>
                    </div>
                  </th>
                  <th scope="col">아이디</th>
                  <th scope="col">닉네임</th>
                  <th scope="col">이메일</th>
                  <th scope="col">상태</th>
                  <th scope="col">가입일</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($memberArr)) {
                  foreach($memberArr as $ma){                
                ?>
                <tr data-ui="<?=$ma->mid?>" data-user="<?=$ma->userid?>" >
                  <th scope="row">
                    <input class="form-check-input" type="checkbox" />
                  </th>
                  <td><?=$ma->userid?></td>
                  <td><?=$ma->username?></td>
                  <td><?=$ma->email?></td>
                  <td><?php
                    if($ma->status) {
                      echo '활성';
                    } else {
                      echo '휴면';
                    }
                  
                  ?></td>
                  <td><?=$ma->regdate?></td>
                </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
            <button class="btn btn-success all_message">선택회원 메시지 전송</button>
            <button class="btn btn-danger all_del">선택회원 삭제</button>
            
            <div class="d-flex justify-content-center">
              <ul class="pagination">
                <?php
                if($pageNumber > 1){
                  echo "<li class=\"page-item\"><a href=\"member_mg.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
                  //이전
                  if($block_num > 1){
                    $prev = 1 + ($block_num - 2) * $block_ct;
                    echo "<li class=\"page-item\"><a href=\"member_mg.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
                  }
                }
              
                  for($i=$block_start;$i<=$block_end;$i++){
                    if($i == $pageNumber){
                      echo "<li class=\"page-item active\"><a href=\"member_mg.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
                    }else{
                      echo "<li class=\"page-item\"><a href=\"member_mg.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
                    }            
                  }  

                  if($pageNumber < $total_page){
                    if($total_block > $block_num){
                      $next = $block_num * $block_ct + 1;
                      echo "<li class=\"page-item\"><a href=\"member_mg.php?pageNumber=$next\" class=\"page-link\">다음</a></li>";
                    }
                    echo "<li class=\"page-item\"><a href=\"member_mg.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
                  }        
                ?>
              </ul>
            </div>    
            
            
            
            <!-- <nav aria-label="..." class="d-flex justify-content-center">
              <ul class="pagination">
                <li class="page-item disabled">
                  <span class="page-link">이전</span>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">다음</a>
                </li>
              </ul>
            </nav> -->
          </div>
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
      const memberModal = new bootstrap.Modal('.member_modal')
      const messageModal = new bootstrap.Modal('.message_modal')
      const memberDelModal = new bootstrap.Modal('.member_del_confirm')
      $('tbody tr').click(function(e) {
        if (!$(e.target).is('input[type="checkbox"]')) {
          // 체크박스가 아닌 경우에만 원하는 이벤트 작성
          // 여기에 원하는 동작을 추가하세요.
          let mid =$(this).attr('data-ui')
          let data = {
            mid : mid
          }
          // console.log(data)
          $('.member_del').click(function() {
            memberDelModal.show()
          })
          $('.member_del_ok').click(function() {
            $.ajax({
                  url:'member_del.php',
                  async:false,
                  type: 'POST',
                  data:data,
                  dataType:'json',
                  error:function(){},
                  success:function(data){
                      console.log(data.result);
                      if(data.result=='ok'){
                          alert('해당 회원 정보를 삭제했습니다.'); 
                          
                      } else {
                          alert('회원 정보를 삭제하지 못했습니다. 다시 시도해주세요.'); 
                      }
                      location.reload();
                  }
            });
            
          })
          $('.modeal_sleep').click(function() {
            let statusText = $(this).text()
            let data = {
              mid : mid,
              statusText : statusText
            }
            $.ajax({
                  url:'member_sleep.php',
                  async:false,
                  type: 'POST',
                  data:data,
                  dataType:'json',
                  error:function(){},
                  success:function(data){
                      console.log(data.result);     
                      if(data.result=='ok'){
                          alert('회원 상태를 업데이트했습니다.'); 
                          location.reload();   
                      } else {
                          alert('회원 정보를 업데이트하지 못했습니다. 다시 시도해주세요.'); 
                      }
                      
                  }
            });
          })
          $.ajax({
                 url:'member_modal.php',
                 async:false,
                 type: 'POST',
                 data:data,
                 dataType:'json',
                 error:function(){},
                 success:function(data){
                    console.log(data.result[1]);
                    $('#modal_username').text(data.result[0][0].username)
                    $('#modal_id').text(data.result[0][0].userid)
                    $('#modal_recent').text($.datepicker.formatDate('yy-mm-dd', new Date(data.result[0][0].recent_in)))
                    
                    $('#modal_regdate').text($.datepicker.formatDate('yy-mm-dd', new Date(data.result[0][0].regdate)))
                    $('#modal_tel').text(data.result[0][0].tel)
                    
                    $('#modal_email').html(`<a href="mailto:${data.result[0][0].email}">${data.result[0][0].email}</a>`)
                    $('#recipient-name').val(data.result[0][0].userid)
                    // console.log('휴면',data.result[0])
                    if (data.result[0][0].status == 1) {
                      $('.modeal_sleep').text('휴면 전환')
                    } else {
                      $('.modeal_sleep').text('휴면 해제')
                    }
                    // if(data.result == '중복'){
                    //     alert('이미 장바구니에 담았습니다.');                        
                    // } else if(data.result=='ok'){
                      
                    // } else {
                    //     alert('담기 실패!'); 
                    // }
                    let coupon =''
                    for (let rs of data.result[0]) {
                      // console.log(rs)
                      if (rs.cp_status == 1) {
                        coupon += `
                      <a href="#" class="coupon_item d-flex flex-column align-items-end">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1 bold">${rs.cp_name}</h5>
                          <small>사용기한 : ${$.datepicker.formatDate('yy-mm-dd', new Date(rs.use_max_date))}</small>
                        </div>
                        <p class="mb-1">${rs.cp_price}원</p>
                      </a>
                      `  
                      }
                      
                    }
                    coupon == '' ? $('.coupon_list').html('없음') : $('.coupon_list').html(coupon)
                    
                    let arr = [...data.result[1]]
                    let uniqueObj = {};
                    // 중복되지 않은 객체들을 담을 배열
                    uniqueArr = arr.filter((item) => {
                        // 객체의 name 속성 값을 키로 사용하여 중복 여부 확인
                        if (!uniqueObj[item.name]) {
                            // 중복되지 않은 경우에만 true를 반환하고 중복된 경우에는 false를 반환
                            uniqueObj[item.name] = true;
                            return true;
                        }
                        return false;
                    });

                    // let courseList = [...new Set()];
                    let course = ''
                    for (let cl of uniqueArr) {
                      course +=`
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        ${cl.name}
                        <!-- <span class="badge text-bg-primary rounded-pill">14</span> -->
                        </li>`

                      // console.log(course)
                      console.log(cl.name)
                    }
                    course === '' ? $('.course_list').html('<li>없음</li>') : $('.course_list').html(course)
                    memberModal.show()
                 }
          });
        }
      })


      $('#member_cb').change(function() {
      if ($(this).is(':checked')) {
          // 할 일을 여기에 작성하세요.
          $('tbody input[type="checkbox"]').prop('checked', true);
      } else {
          // 체크 해제 시에 할 일을 여기에 작성하세요.
          $('tbody input[type="checkbox"]').prop('checked', false);
      }
      });

      $('.all_message').click(function () {
        let recipient= []
        $('tbody input:checked').each(function() {      
          recipient.push($(this).closest('tr').attr('data-user'));


        })
        console.log('recipient', recipient)
        $('#recipient-name').val(recipient.join(' , '))
        
        messageModal.show()
      })

      // $('tbody tr').on('click', function(e){
            // e.preventDefault();
            // //상품코드, 옵션명, 수량
            // let target = $('.widget-desc input[type="radio"]:checked');
            // let pid = ;            
            // let optname = target.attr('data-name');
            // let qty = Number($('#qty').val());
            // let total = Number($('#subtotal span').text());

            // let data = {
            //     pid : pid,
            //     optname: optname,
            //     qty :qty,
            //     total:total
            // }
            // console.log(data);
        // });
      

    </script>
  </body>
</html>

