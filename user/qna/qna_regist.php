<?php 
  $title = 'Q&A'; 
  $cssRoute1 ='<link rel="stylesheet" href="/helloworld/user/css/Q&A_regist.css">'; 
  $cssRoute2 ='<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">'; 
  include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/user_header.php'; 
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
              <label for="formGroupExampleInput" class="form-label ql d-inline-block">강의명</label>
              <input type="text" class="form-control title-box" name="lecture_name" id="lecture_name" placeholder="강의명을 입력하시오." required>
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

<script type="text/javascript"> 
  $(document).ready(function() {
    $('#summernote').summernote({
      width: 883,
      height: 420,
      placeholder: '내용을 작성하시오. (1200자 내로 작성하시오)'
    });
    
    $('#content_save').on('submit', save);
    
    function save() {
      let markupStr = $('#summernote').summernote('code');
      let contents = encodeURIComponent(markupStr);
      $('#contents').val(contents);
    }
  });
</script>