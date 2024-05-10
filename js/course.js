$("#product_detail").summernote({
  height: 400,
});

let price = $("#price");

$("#price_menu").change(function () {
  let option1 = $(this).val();

  if (option1 == "무료") {
    price.prop("disabled", true);
    price.val("0");
  } else {
    price.prop("disabled", false);
  }
});

let month = $("#due");
month.find("option").eq(1).hide();

$("#due_status").change(function () {
  let option2 = $(this).val();
  console.log(option2);

  if (option2 == "무제한") {
    month.prop("disabled", true);
    month.val("무제한");
  } else {
    month.prop("disabled", false);
    month.find("option").eq(1).hide();
  }
});

$(".add_listBtn a").click(function (e) {
  e.preventDefault();

  let youtube =
    `<div class="youtube c_mb mt-3">
      <div class="row justify-content-between">
        <div class="col-2 youtube_thumb">
          <input type="file" class="form-control" name="youtube_thumb[]">
        </div>
        <div class="col-3 youtube_name">
          <input type="text" class="form-control" name="youtube_name[]" placeholder="강의명을 입력하세요.">
        </div>
        <div class="col-6 youtube_url">
          <input type="url" class="form-control" name="youtube_url[]" placeholder="강의URL을 넣어주세요.">
        </div>
        <div class="col-1 trash_icon" id="trash">
          <i class="ti ti-trash bin_icon"></i>
        </div>
      </div>
      <div>
        <span>문제</span>
        <input type="text" name="question[]" placeholder="문제를 입력하세요">
        <span>정답</span>
        <input type="text" name="answer[]" placeholder="문제의 답을 입력하세요.">
      </div>
    </div>`

  $(".you_upload").append(youtube);
});

$(".add_listBtn2 a").click(function (e) {
  e.preventDefault();

  let youtube2 =
    '<div class="youtube c_mb mt-3"><div class="row justify-content-between">' +
    '<div class="col-2 youtube_thumb"><input type="file" class="form-control" name="course_file[]">' +
    "</div>" +
    '<div class="col-3 youtube_name colew">' +
    '<input type="text" class="form-control" name="course_file_name[]" placeholder="강의파일명을 입력하세요.">' +
    "</div>" +
    
    '<div class="col-1 trash_icon" id="trash">' +
    '<i class="ti ti-trash bin_icon">' +
    "</div>" +
    "</div>" +
    '' +
    "</div>";

  $(".you_upload2").append(youtube2);
});

// $(".trash_icon").change(function () {
//   if (confirm("정말로 삭제하시겠습니까?")) {
//     if ($(this).filter(":checked")) {
//       $(this).closest(".youtube").hide();
//     }
//   } else {
//     $(this).find(".trash_icon input").prop("checked", false);
//   }
// });

// $(".trash_icon2").change(function () {
//   if (confirm("정말로 삭제하시겠습니까?")) {
//     if ($(this).filter(":checked")) {
//       $(this).closest(".youtube2").hide();
//     }
//   } else {
//     $(this).find(".trash_icon2 input").prop("checked", false);
//   }
// });


$('.delete-youtube').change(function(){

  let target = $(this).closest('.youtube');

  //$(this).closest('.youtube').remove();

  let youtubeid =  $(this).val();



  let data = {
    youtubeid  :youtubeid 
  }
  console.log(data);

    $.ajax({
      url:'youtube_del.php',
      async:false,
      type: 'POST',
      data:data,
      dataType:'json',
      error:function(){},
      success:function(return_data){
      console.log(return_data);
      if(return_data.result=='ok'){
          alert('업데이트 되었습니다');  
          target.remove();           
      }else{
          alert('오류, 다시 시도하세요');                        
          }
      }
    });  
});




$("#course_form").submit(function () {
  let markupStr = $("#product_detail").summernote("code");
  let content = encodeURIComponent(markupStr);
  $("#content").val(content);

  if ($("#product_detail").summernote("isEmpty")) {
    alert("상세설명을 입력하세요");
    return false;
  }
});



$('.youtube2 div').click(function(){
  calcTotal();
});
$('.trash_icon2').click(function(){

  $(this).closest('.youtube2').remove();
  calcTotal();
  let coursef =  $(this).closest('.youtube2').find('.form-control').attr('data-id');



  let data = {
    coursef : coursef 
  }
  $.ajax({
      url:'cuorse_del.php',
      async:false,
      type: 'POST',
      data:data,
      dataType:'json',
      error:function(){},
      success:function(data){
      console.log(data);
      if(data.result=='ok'){
          alert('강의파일이 업데이트 되었습니다');  
          location.reload();                      
      }else{
          alert('오류, 다시 시도하세요');                        
          }
      }
  });
});




$("#course_form").submit(function () {
  let markupStr = $("#product_detail").summernote("code");
  let content = encodeURIComponent(markupStr);
  $("#content").val(content);

  if ($("#product_detail").summernote("isEmpty")) {
    alert("상세설명을 입력하세요");
    return false;
  }
});
