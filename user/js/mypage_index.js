// $(".modify_name").click(function () {});
// document.addEventListener("DOMContentLoaded", function () {

// fullcalandar
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
  initialView: 'dayGridMonth',
  locale: 'ko',
  events: '/helloworld/user/mypage/attendance.php',
  eventDidMount: function (info) {
    if (info.event.display === 'background') {
      info.el.style.backgroundColor = info.event.backgroundColor;
    }
  },
});
calendar.render();
// -- fullcalandar

let data = {
  // courseId: courseId,
};

$.ajax({
  url: 'index_charts.php',
  type: 'POST',
  data: data,
  dataType: 'json',
  error: function () {
    console.log('실패');
  },
  success: function (data) {
    console.log('결과', data.result[0]);
    courses = [];
    progress = [];
    $.each(data.result, function (key, value) {
      // courses.push(value.name);
      courses.push('');
      progress.push(value.progress);
    });

    const barLabels = courses;
    const barData = {
      labels: barLabels,
      datasets: [
        {
          label: '진도율',
          data: progress,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)',
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)',
          ],
          borderWidth: 1,
        },
      ],
    };
    const barConfig = {
      type: 'bar',
      data: barData,
      options: {
        maintainAspectRatio: false,
        indexAxis: 'x',
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        plugins: {
          legend: {
            position: 'right', // 범례를 오른쪽에 표시
            align: 'start', // 범례 텍스트를 왼쪽 정렬
          },
        },
      },
    };
    let ctx = document.getElementById('bar-chart');

    stackedBar = new Chart(ctx, barConfig);
  },
});
