<?php
$title = 'Q&A';
$cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/notice_detail.css">';
$cssRoute2 ='<link rel="stylesheet" href="/helloworld/user/css/notice.css">';
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php';

// 질문 ID 받아오기
$qna_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 조회수 증가
if ($qna_id > 0) {
  $sql = "UPDATE qna SET view = view + 1 WHERE idx = $qna_id";
  $result = $mysqli->query($sql);
}

// 질문 데이터 가져오기
if ($qna_id > 0) {
  $sql = "SELECT * FROM qna WHERE idx = '$qna_id'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
}

// 댓글 목록 가져오기
if ($qna_id > 0) {
    $sql = "SELECT * FROM qna_comment WHERE idx = '$qna_id' ORDER BY idx DESC";
    $result = $mysqli->query($sql);
  }
?>
<div class="container">
    <h2 class="h2_t nt">Q&A</h2>
    <section>
        <div class="content-box nb">
            <table class="table tc"> 
                <thead>
                    <tr>
                        <th scope="col">강의명</th>
                        <th scope="col">작성자</th>
                        <th scope="col">조회수</th>
                        <th scope="col">답변 여부</th>
                        <th scope="col">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?= $row['title']; ?></th>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['view']; ?></td>
                        <td><button type="button" class="btn btn-success"><?= $row['reply']; ?></button></td>
                        <td><?= $row['date']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="notice-detail-box jcsb d-flex">
                <div class="notice-content h5">
                  <p><?= $row['content']; ?></p>
                </div>
            </div>
            <hr>
            <div class="reply_content d-flex aic jcsb">
                <h5>답변</h5>
                <button type="button" class="btn btn-success p" id="commentToggle">댓글쓰기</button>
            </div>
            <hr>
            <div class="reply_comments">
              <div class="comment-form" style="display: none;">
                  <div class="d-flex align-items-center mb-3">
                      <i class="bi bi-person-circle me-2 h5"></i>
                      <div class="flex-grow-1">
                          <textarea class="form-control" id="commentText" rows="3" placeholder="댓글을 입력하세요"></textarea>
                      </div>
                  </div>
                  <div class="text-end">
                      <button type="submit" class="btn btn-primary">등록</button>
                  </div>
              </div>
              <div class="comment-list">
                  <div class="comment">
                      <div class="d-flex align-items-start mb-3">
                          <i class="bi bi-person-circle me-2 h5"></i>
                          <div class="flex-grow-1">
                              <div class="comment-header">
                                  <span class="comment-author">선생님</span>
                                  <span class="comment-date">2024.05.23</span>
                              </div>
                              <div class="comment-body">
                                  <p>안녕하세요 채원님! 강의 커리큘럼대로 천천히 따라오시면 가능하실거에요!</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </section>
    <div>
        <button type="button" class="btn btn-danger bd"><a href="/helloworld/user/Q&A/Q&A.php">닫기</a></button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var commentToggle = document.getElementById('commentToggle');
      var commentForm = document.querySelector('.comment-form');
  
      commentToggle.addEventListener('click', function() {
        if (commentForm.style.display === 'none') {
          commentForm.style.display = 'block';
        } else {
          commentForm.style.display = 'none';
        }
      });
    });
    
  </script>
  <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_footer.php';
?>