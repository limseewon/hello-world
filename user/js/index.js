$(function(){ 
  var swiper = new Swiper(".sec1_slide", {
    slidesPerView: 1,
    speed: 2000,
    centeredSlides: true,
    loop:true,
		
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay : {  
      delay : 2500,  
      disableOnInteraction : false, 
      pauseOnMouseEnter:true
    },
    navigation: {
      prevEl: ".se1_prev",
      nextEl: ".se1_next",
    },
    // loopAdditionalSlides: 1
  });

  // autoplayStart autoplayStop
  let slide = $(".swiper-slide");

  slide.on("mouseenter", function (e) {
    swiper.autoplay.stop();
  });
  slide.on("mouseleave", function (e) {
    swiper.autoplay.start();
  });

  var swiper = new Swiper(".recom_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 2000,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction : false, 
      pauseOnMouseEnter:true
    },
    navigation: {
      prevEl: ".recom_prev",
      nextEl: ".recom_next",
    },
  });

  var swiper = new Swiper(".new_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 2000,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction : false, 
      pauseOnMouseEnter:true
    },
    navigation: {
      prevEl: ".new_prev",
      nextEl: ".new_next",
    },
  });

  var swiper = new Swiper(".beginner_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 2000,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction : false, 
      pauseOnMouseEnter:true
    },
    navigation: {
      prevEl: ".beg_prev",
      nextEl: ".beg_next",
    },
  });


// 강의리스트 필터
  $(".viewWrap_2").hide();
  $(".viewB_1").click(function () {
    $(".viewWrap_2").hide();
    $(".viewWrap_1").show();
    $(".viewB_1").addClass("active");
    $(".viewB_2").removeClass("active");
  });
  $(".viewB_2").click(function () {
    $(".viewWrap_1").hide();
    $(".viewWrap_2").show();
    $(".viewB_2").addClass("active");
    $(".viewB_1").removeClass("active");
  });
  
  function setRatingStar() {
    let rating = $(".rating");
  
    rating.each(function () {
      let score = $(this).attr("data-rate");
      $(this).find(`.fa-star:lt(${score})`).css({ color: "#ffca2c" });
    });
  }
  setRatingStar();
  
  $(".preview").click(function (e) {
    e.preventDefault();
    $(".modalBackground").addClass("active");
  });
  $(".modalBox i").click(function (e) {
    e.preventDefault();
    $(".modalBackground").removeClass("active");
  });
  
  //장바구니
  $(".viewCart").on("click", function () {
    let data = {
      cid: cid,
    };
    $.ajax({
      type: "GET",
      data: data,
      url: "add_cart.php",
      dataType: "json",
      success: function (return_data) {
        if (return_data.result === "success") {
          console.log("retun_data", return_data);
          trElement.remove();
          alert("장바구니 담기 성공");
          location.reload();
        } else {
          alert("장바구니 담기 실패");
        }
      },
      error: function (error) {
        console.log("Error:", error);
        alert("장바구니 담기 중에 오류가 발생했습니다.");
      },
    });
  }); 
});