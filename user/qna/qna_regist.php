<?php 
  $title = 'Q&A'; 
  $cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/Q&A_regist.css">'; 
  $cssRoute2 ='<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">'; 
  $script1 = '';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php'; 

    // 현재 로그인한 회원의 정보 가져오기
  if (isset($_SESSION['UID'])) {
    $userid = $_SESSION['UID'];
    $sql = "SELECT username FROM members WHERE userid = '$userid'";
    $result = $mysqli->query($sql);
    $member = $result->fetch_assoc();
  }

  $coursesSql = "SELECT * FROM courses";
  $coursesResult = $mysqli->query($coursesSql);
  while ($coursesRs = $coursesResult->fetch_object()) {
    $coursesArr[] = $coursesRs;
  }
?> 
<div class="container">
    <h2 class="h2_t">Q&amp;A 등록</h2>
    <section class="regist_content">
      <form action="qna_write_ok.php" method="POST" id="content_save" enctype="multipart/form-data">
        <input type="hidden" name="contents" id="contents">
        <div class="regist">
          <div class="mb-3 d-flex title aic">
              <label for="formGroupExampleInput" class="form-label qt">제목</label>
              <input type="text" class="form-control title-box" name="title" id="title" placeholder="제목을 입력하시오." required>
          </div>
          <div class="mb-3 d-flex title aic">
              <label for="formGroupExampleInput" class="form-label lt">작성자</label>
              <input type="text" class="form-control title-box" name="name" id="name" value="<?= isset($member['username']) ? $member['username'] : ''; ?>" readonly>
          </div>
          <div class="mb-3 d-flex title aic">
            <label for="formGroupExampleInput" class="form-label lt">강의명</label>
            <select class="form-select course_select" aria-label="Default select example" name="lecture_name">
              <option selected disabled>강의 선택</option>
              <?php
              if(isset($coursesArr)){
                  foreach($coursesArr as $ca){
              ?>  
                  <option value="<?=$ca->cid?>"><?=$ca->name?></option>
              <?php
                  }
              }
              ?>
            </select>
          </div>
          <div class="notice_create_form_div d-flex con">
              <label for="summernote" class="form-label d-flex cont">내용</label>
              <div id="summernote"></div>
          </div>
          <div>
              <div class="input-group d-flex file">
                  <div class="add d-flex aic">
                      <label for="formGroupExampleInput" class="form-label ft">첨부파일</label>
                      <table class="table_1">
                          <tbody id="option1">
                              <tr id="optionTr1">
                                  <td>
                                      <input type="file" class="form-control file-box" id="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file">
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="right-button ">
                      <button type="submit" class="btn btn-success regist-btn">등록</button>
                      <button type="button" class="btn btn-danger cancle-btn"><a href="/helloworld/user/qna/qna.php">취소</a></button>
                  </div>
              </div>
          </div>
        </div>
      </form>
    </section>
  </div>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jqueryui js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- bootstrap js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- modernizr js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" referrerpolicy="no-referrer"></script>
  <!-- summernote modernizr js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      width: 883,
      height: 420,
      placeholder: '내용을 작성하시오. (1200자 내로 작성하시오)'
    });

    $('.regist-btn').on('click', function(event) {
      event.preventDefault(); // 폼 제출 방지

      let title = $('#title').val().trim();
      let contents = $('#summernote').summernote('code').trim();

      if (!title) {
        alert('제목을 입력해주세요.');
        return;
      }

      if (!contents) {
        alert('내용을 입력해주세요.');
        return;
      }

      save();
      $('#content_save').submit(); // 검증 통과 시 폼 제출
    });

    function save() {
      let markupStr = $('#summernote').summernote('code');
      let contents = encodeURIComponent(markupStr);
      $('#contents').val(contents);
    }
  });
</script>
