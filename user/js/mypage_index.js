// $(".modify_name").click(function () {});
// document.addEventListener("DOMContentLoaded", function () {
console.log("cal");
document.addEventListener("DOMContentLoaded", function () {
  console.log("cal");
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "ko",
    events: "/helloworld/user/mypage/attendance.php",
    eventDidMount: function (info) {
      if (info.event.display === "background") {
        info.el.style.backgroundColor = info.event.backgroundColor;
      }
    },
  });

  calendar.render();
});

// var calendar = new FullCalendar.Calendar(calendarEl, {
//   // initialDate: "2014-11-10",
//   initialView: "dayGridMonth",
//   locale: "ko",
//   events: [
//     {
//       start: "2024-05-09",
//       end: "2024-05-09",
//       display: "background",
//     },
//   ],
// });
// calendar.render();
// });
