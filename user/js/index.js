$(function () {
  console.log("testst");
  var swiper = new Swiper(".sec1_slide", {
    slidesPerView: 1,
    speed: 1000,
    centeredSlides: true,
    loop: true,

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      prevEl: ".se1_prev",
      nextEl: ".se1_next",
    },
    // loopAdditionalSlides: 1
  });

  // autoplayStart autoplayStop
  let slide = $(".swiper-slide");

  // slide.on("mouseenter", function (e) {
  //   swiper.autoplay.stop();
  // });
  // slide.on("mouseleave", function (e) {
  //   swiper.autoplay.start();
  // });

  var swiper = new Swiper(".recom_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 900,
    loop: true,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      prevEl: ".new_prev",
      nextEl: ".new_next",
    },
  });

  var swiper = new Swiper(".new_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 1100,
    loop: true,
    autoplay: {
      delay: 1200,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      prevEl: ".suggestio_prev",
      nextEl: ".suggestio_next",
    },
  });

  var swiper = new Swiper(".beginner_slide", {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 1000,
    loop: true,
    autoplay: {
      delay: 1300,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    navigation: {
      prevEl: ".beginner_prev",
      nextEl: ".beginner_next",
    },
  });

  //장바구니
  $(".viewCart").on("click", function () {
    // 클래스가 "viewCart"인 HTML 요소가 클릭되었을 때 실행할 함수를 정의
    let data = {
      //  AJAX 요청으로 전송할 데이터를 객체 형태로 정의
      cid: cid, // cid'는 어떤 상품인지를 식별하는 값
    };
    $.ajax({
      // jQuery의 AJAX 함수를 사용하여 서버로 요청 함수는 AJAX 요청을 생성하고 전송하는 데 사용
      type: "GET", // HTTP 요청 방식을 지정합니다. 여기서는 GET 방식을 사용
      data: data, // 서버로 전송할 데이터를 설정. 위에서 정의한 data 객체를 전달
      url: "add_cart.php", // 요청을 보낼 URL을 지정 여기서는 "add_cart.php"라는 파일에 요청을 보낼 것으로 예상
      dataType: "json", // 서버로부터 받은 데이터의 형식을 지정 . 여기서는 JSON 형식으로 응답을 받을 것으로 설정
      success: function (return_data) {
        // 요청이 성공했을 때 실행할 함수를 정의
        if (return_data.result === "success") {
          //  "success"일 경우, 성공적으로 장바구니에 상품이 추가되었음을 알리고 페이지를 새로고침합니다. 그렇지 않은 경우, 장바구니에 상품을 추가하는 데 실패했음을 알림
          console.log("retun_data", return_data); // 서버로부터 받은 데이터가 return_data 매개변수로 전달
          trElement.remove();
          alert("장바구니 담기 성공");
          location.reload();
        } else {
          alert("장바구니 담기 실패");
        }
      },
      error: function (error) {
        // 요청이 실패했을 때 실행할 함수를 정의
        console.log("Error:", error);
        alert("장바구니 담기 중에 오류가 발생했습니다.");
      },
    });
  });

  // 쿠폰 발급
  $(".couponBtn").click(function () {
    let couponid = $(this).attr("data-couponId");
    let data = {
      couponid: couponid,
    };
    // console.log(couponid);
    $.ajax({
      url: "index_coupon.php",
      async: false,
      type: "POST",
      data: data,
      dataType: "json",
      error: function (e) {
        console.log("쿠폰발급에러", e);
      },
      success: function (data) {
        console.log(data.result);
        if (data.result == "ok") {
          alert("쿠폰이 발급되었습니다.");
          location.reload();
        } else if ((data.result = "duplicate")) {
          alert("이미 발급된 쿠폰입니다.");
        } else if ((data.result = "pleaseLogin")) {
          alert("로그인 후 다시 시도해주세요.");
        } else {
          alert("쿠폰 발급에 실패했습니다. 다시 시도해주세요.");
        }
      },
    });
  });
});

/* DIALOG POPUP */
var popup = $(".popup");
var popup_closeBtn = popup.find("#close");
var popup_input = popup.find("#daycheck");

popup.find(".figma").click(function () {
  window.open("#", "_blank");
});

popup.find(".git").click(function () {
  window.open("https://github.com", "_blank");
});

// 쿠키 있는지 확인해서 popup 보일지 결정
function cookieCheck(name) {
  var cookieArr = document.cookie.split(";");
  var visited = false;

  for (var i = 0; i < cookieArr.length; i++) {
    if (cookieArr[i].trim().indexOf(name) === 0) {
      visited = true;
      break;
    }
  }

  if (!visited) {
    popup.attr("open", "");
  } else {
  }
}

// 쿠키 생성 함수
// function setCookie(name, cookieName, value, days) {
//   var date = new Date();
//   date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // 현재 날짜에 일 수를 더해 만료일 설정
//   var expires = "expires=" + date.toUTCString();
//   document.cookie = name + "=" + value + ";" + expires + ";path=/";
// }

// cookieCheck('Helloworld');

// popup_closeBtn.click(function() {
//   popup.removeAttr('open');

//   if (popup_input.prop('checked')) {
//     setCookie('Helloworld', 'visited', 1); // 1일 동안 쿠키 설정
//   }
// });

/*  ID저장 &  DIALOG POPUP 쿠키 생성 */
function setCookie(cookieName, value, exdays) {
  let exdate = new Date();
  exdate.setDate(exdate.getDate() + exdays);
  let cookieValue =
    escape(value) + (exdays == null ? "" : "; expires=" + exdate.toGMTString());
  document.cookie = cookieName + "=" + cookieValue;
}

// 쿠키체크
cookieCheck("Helloworld");
popup_closeBtn.click(function () {
  popup.removeAttr("open");
  if (popup_input.prop("checked")) {
    setCookie("Helloworld", "visited", 1); // 1일 동안 쿠키 설정
  }
});

// 쿠키삭제
function deleteCookie(cookieName) {
  let expireDate = new Date();
  expireDate.setDate(expireDate.getDate() - 1);
  document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

// 쿠키 가져오기
function getCookie(cookieName) {
  cookieName = cookieName + "=";
  let cookieData = document.cookie;
  let start = cookieData.indexOf(cookieName);
  let cookieValue = "";
  if (start != -1) {
    start += cookieName.length;
    let end = cookieData.indexOf(";", start);
    if (end == -1) end = cookieData.length;
    cookieValue = cookieData.substring(start, end);
  }
  return unescape(cookieValue);
}

/* DIALOG POPUP */
