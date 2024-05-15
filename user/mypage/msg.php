<?php
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_msg.css"/>';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/leftSide.php';     

  $memberSql = "SELECT mid FROM members WHERE userid='{$_SESSION['UID']}'";
  $memberResult = $mysqli->query($memberSql);
  $memberRs = $memberResult->fetch_row();
  echo $memberRs[0] ;

  $msgSql = "SELECT * FROM msg WHERE mid='{$memberRs[0]}'";
  $msgResult = $mysqli->query($msgSql);
  while($msgRs= $msgResult->fetch_object()) {
    $msgArr []= $msgRs;
  }
  
?>
        <section class="mainContainer">
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
                if (count($msgArr) > 0 ){
                  foreach($msgArr as $ma) {                  
                ?>
                <tr>
                  <td><?=$ma ->sendername?></td>
                  <td><?=$ma ->content?></td>
                  <td><?=$ma ->regdate?></td>
                </tr>
                <?php
                  }
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
        </section>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/rightSide.php';    
    ?>