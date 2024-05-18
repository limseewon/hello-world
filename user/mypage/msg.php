<?php
  $title = 'mymsg';
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_msg.css"/>';
  $cssRoute3 ='';
  $cssRoute4 ='';
  $script2 = '';
  $script3 = '';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/leftSide.php';     
  $paginationTarget = 'msg';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/admin/inc/pagination.php';

  // $memberSql = "SELECT mid FROM members WHERE userid='{$_SESSION['UID']}'";
  // $memberResult = $mysqli->query($memberSql);
  // $memberRs = $memberResult->fetch_row();
  $useridx = $_SESSION['UIDX'];
  
  $msgSql = "SELECT * FROM msg WHERE mid='{$useridx}' ORDER BY regdate DESC";
  
  // $msgResult = $mysqli->query($msgSql);
  // while($msgRs= $msgResult->fetch_object()) {
  //   $msgArr []= $msgRs;
  // }
  

  $result_count = $mysqli->query($msgSql);
  $totalcount = $result_count->num_rows;

$msgSql .= " LIMIT $startLimit, $pageCount";
// $result = $mysqli->query($msgSql);
$msgResult = $mysqli->query($msgSql);
  while($msgRs= $msgResult->fetch_object()) {
    $msgArr []= $msgRs;
  }
?>
        <div class="d-flex flex-column">
          <!-- <section class="mainContainer">
            <h2 class="title">메시지</h2>
            <div class="mainContents">
              <table class="table table-hover table-striped">
                <thead class="table-light">
                  <tr>
                    <th scope="col">발신자</th>
                    <th scope="col">내용</th>
                    <th scope="col">수신일</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($msgArr) && count($msgArr) > 0 ){
                    foreach($msgArr as $ma) {                  
                  ?>
                  <tr>
                    <td><?=$ma ->sendername?></td>
                    <td><?=$ma ->content?></td>
                    <td><?=$ma ->regdate?></td>
                  </tr>
                  <?php
                    }
                  } else {
                  ?>
                    <tr>
                      메시지함이 비어있습니다.
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <nav aria-label="..." class="d-flex justify-content-center">
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
              </nav>
            </div>
          </section> -->
          <section class="mainContainer">
                <h2 class="title">메시지</h2>
                <div class="mainContents">
                  <div class="d-flex jcsb tb">
                      <!-- <select class="form-select form-select-lg mb-3 sb p" aria-label="Large select example" id="answerFilter" onchange="location.href='qna.php?answer='+this.value+'&keyword=<?= $keyword ?>&pageNumber=<?= $pageNumber ?>'">
                          <option value="all" <?= $answer_option === '' ? 'selected' : '' ?>>전체</option>
                          <option value="answered" <?= $answer_option === 'answered' ? 'selected' : '' ?>>답변</option>
                          <option value="unanswered" <?= $answer_option === 'unanswered' ? 'selected' : '' ?>>미답변</option>
                      </select>
                      <form class="block-top d-flex search_bar" id="searchForm" action="qna.php" method="GET">
                          <input type="hidden" name="answer" value="<?= $answer_option ?>">
                          <input type="hidden" name="pageNumber" value="1">
                          <input class="form-control me-2 search" type="search" placeholder="제목을 입력하시오." aria-label="Search" id="searchInput" name="keyword" value="<?= $keyword ?>">
                          <button class="btn btn-outline-success btn_search" type="submit" id="searchButton">검색</button>
                      </form> -->
                  </div>
                  <div class="table-container">
                      <table class="table table-striped table-hover Q&A_tb p jcsb">
                          <thead>
                              <tr>
                                  <th scope="col">발신자</th>
                                  <th scope="col">내용</th>
                                  <th scope="col">수신일</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          if (isset($msgArr) && count($msgArr) > 0 ){
                            foreach($msgArr as $ma) {         
                              //sendername 변수에 DB에서 가져온 $ma->sendername; 선택
                              $sendername = $ma->sendername;
                              if (iconv_strlen($sendername) > 25) {
                                  //sendername이 35를 넘어서면 ...표시
                                  $sendername = str_replace($ma->sendername, iconv_substr($ma->sendername, 0, 25, "utf-8") . "...", $ma->sendername);
                              }
      
                              //content 변수에 DB에서 가져온 $ma->content 선택
                              $content =  $ma->content;
                              if (iconv_strlen($content) > 35) {
                                  //content 20을 넘어서면 ...표시
                                  $content = str_replace($ma->content, iconv_substr($ma->content, 0, 35, "utf-8") . "...", $ma->content);
                              }
      
                          ?>
                              <tr>
                                  <th scope="row"><?= $sendername; ?></th>
                                  <th scope="row"><?= $content; ?></th>
                                  <td class="text_center"><?=  $ma->regdate; ?></td>
                              </tr>
                              <?php
                              }}
                              ?>
                          </tbody>
                      </table>
                  </div>
                  <div class="d-flex justify-content-center">
                      <ul class="pagination">
                          <?php
                          $block_ct = 5; // 페이지네이션에 표시할 페이지 번호의 개수를 5로 설정
                          $total_page = ceil($totalcount / $pageCount);
                          $total_block = ceil($total_page / $block_ct);
      
                          $block_num = ceil($pageNumber / $block_ct);
                          $block_start = (($block_num - 1) * $block_ct) + 1;
                          $block_end = $block_start + $block_ct - 1;
      
                          if ($block_end > $total_page) {
                              $block_end = $total_page;
                          }
      
                          if ($pageNumber > 1) {
                              echo "<li class=\"page-item\"><a href=\"\" class=\"page-link\" >처음</a></li>";
                              //이전
                              if ($block_num > 1) {
                                  $prev = ($block_num - 2) * $block_ct + 1;
                                  echo "<li class=\"page-item\"><a href=\"\" class=\"page-link\">이전</a></li>";
                              }
                          }
      
                          for ($i = $block_start; $i <= $block_end; $i++) {
                              if ($i == $pageNumber) {
                                  echo "<li class=\"page-item active\"><a href=\"\">$i</a></li>";
                              } else {
                                  echo "<li class=\"page-item\"><a href=\"\" class=\"page-link\">$i</a></li>";
                              }
                          }
      
                          if ($pageNumber < $total_page) {
                              if ($block_end < $total_page) {
                                  $next = $block_num * $block_ct + 1;
                                  echo "<li class=\"page-item\"><a href=\"\" class=\"page-link\">다음</a></li>";
                              }
                              echo "<li class=\"page-item\"><a href=\"\" class=\"page-link\">마지막</a></li>";
                          }
                          ?>
                      </ul>
                  </div>
                </div>
          </section>
        </div>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/rightSide.php';    
    ?>