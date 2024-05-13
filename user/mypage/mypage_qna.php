<?php
  $cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/mypage/mypage_qna.css"/>';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/mypage_left.php';    
?>
        <section class="mainContainer">
          <h2 class="title">Q&A</h2>
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
                <tr>
                  <td>Hello World</td>
                  <td>메시지 내용입니다.</td>
                  <td>2024-04-07</td>
                </tr>
                <tr>
                  <td>Hello World</td>
                  <td>메시지 내용입니다.</td>
                  <td>2024-04-07</td>
                </tr>
                <tr>
                  <td>Hello World</td>
                  <td>메시지 내용입니다.</td>
                  <td>2024-04-07</td>
                </tr>
                <tr>
                  <td>Hello World</td>
                  <td>메시지 내용입니다.</td>
                  <td>2024-04-07</td>
                </tr>
                
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
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/user/mypage/mypage_right.php';    
  ?>