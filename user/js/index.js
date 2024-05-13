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
});