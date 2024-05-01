<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
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
    
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
    integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- 스포카 -->
    <!-- <link
      href="//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSansNeo.css"
      rel="stylesheet"
      type="text/css"
    /> -->

    <link rel="stylesheet" href="/css/jqueryui/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="/helloworld/css/common.css" />
    <link rel="stylesheet" href="/helloworld/css/index.css" />
    <style>

        .regist-btn,
         .cancle-btn{
            width: 105px;
            height: 48px;
        }
        .note-btn{
          width: 69px;
          height: 35px;
        }
        .notice-btn{
            padding-top: 65px;
            justify-content: space-between;
        }
        .note-editing-area{
          height: 300px;
        }
        .title-box{
          width: 1160px;
          height: 40px;
        }
        .con-box{
          width: 1170px; 
          height: 505px;
        }
        .input-group > .form-control{
          position: none;
          flex: none;
          width: 560px;
          height: 40px;
        }
        .title{
          gap: 50px;
          align-items: center;
          padding-left: 60px;
          padding-top: 26px;
        }
        .con{
          gap: 50px;
          padding-left: 60px;
          padding-top: 35px;
        }
        .file{ 
          gap: 20px ;
          align-items: center;
          padding-left: 60px;
          padding-top: 35px;
        }
        .regist{
          /* width: 100%; */
          height: auto;
          background: #fff;
          padding: 20px;
          border: 1px solid #ced4da;
        }
        .btn-primary{
          width: 106px;
          height: 40px;
          border-radius: 0%;
        }
        .right-button{
          position: absolute;
          right: 230px;
          /* padding-left: 245px; */
        }
        .form-control{
          width: 500px;
        }
        .add{
          gap: 20px;
        }
        #option1{
          display: flex;
          flex-direction: column;
          gap: 16px;
        }
        .form-label{
          margin-top: 11px;
        }
        .name-box {
          width: 200px;
          height: 40px;
          margin-left: 20px;
        }
    </style>
  </head>
  <body>
  <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/header.php';
    ?>
            <h2>질문 등록</h2>
            <form action="announce_write_ok.php" method="POST">
              <div class="regist">
              <div class="mb-3 d-flex title">
                <label for="formGroupExampleInput" class="form-label">제목</label>
                <input type="text" class="form-control title-box" name="title" id="title" placeholder="제목을 입력하시오." required>
                <label for="formGroupExampleInput">이름</label>
                <input type="text" class="form-control name-box" name="name" id="name" value="운영자" readonly>
              </div>
                <div class="notice_create_form_div d-flex con">
                  <label for="summernote" class="form-label">내용</label>
                  <div id="summernote"></div>
                </div>
                <div>
                  <div class="input-group d-flex file">
                    <div class="add d-flex">
                      <label for="formGroupExampleInput" class="form-label">첨부파일</label>
                      <table class="table_1">
                        <tbody id="option1">
                          <tr id="optionTr1">
                            <td>
                              <input type="file" class="form-control file-box" id="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="optionImage1[]">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <button type="button" class="btn btn-primary optAddBtn">파일 추가</button>
                    <div class="right-button">
                      <button type="submit" class="btn btn-success regist-btn">등록</button>
                      <button type="button" class="btn btn-danger cancle-btn">취소</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
 
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

    <!-- summernote modernizr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
    integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        $('#summernote').summernote();
      });
      </script>

    <script src="js/common.js"></script>
  </body>
  <script>
    let documentHeight = Math.max(
      document.body.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.clientHeight,
      document.documentElement.scrollHeight,
      document.documentElement.offsetHeight
    );
    document.querySelector('header').style.height = documentHeight + 'px';
    $("#summernote").summernote({
      height: 150,
      placeholder: '공지사항 내용을 입력해 주세요',
      resize: false,
      lang: "ko-KR",
      disableResizeEditor: true,
    });
    // $(".notice_create_form").submit(function () {
    //   let markupStr = $("#summernote").summernote("code");
    //   // let content1 = stripHtml(markupStr);
    //   let content1 = markupStr.replace('<p>','').replace('</p>','');
    //   let content = encodeURIComponent(content1);
    //   $(".content").val(content);
    //   console.log(content);

    //   if ($("#summernote").summernote("isEmpty")) {
    //     alert("상세설명을 입력하세요");
    //     return false;
    //   }
    // });
    $('.cancle-btn').click(function(e){
      e.preventDefault();
      if (confirm('등록 취소하시겠습니까? :0')){
        history.back();
      }
    });
    $('.optAddBtn').click(function(){
      let addHtml = $('#optionTr1').html();
          addHtml =  `<tr>${addHtml}</tr>`;
      $('#option1').append(addHtml);
    });
  </script>
</html>
