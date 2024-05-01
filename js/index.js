let courseSelect = $('.course_select');
let courseOption = courseSelect.find('option');

courseSelect.change(function () {
  let courseId = $(this).val();
  console.log('courseId', courseId);
  let data = {
    courseId: courseId,
  };
  $.ajax({
    url: 'index_course.php',
    async: false,
    type: 'POST',
    data: data,
    dataType: 'json',
    error: function () {
      console.log('실패');
    },
    success: function (data) {
      console.log(data.result);

      months = [];
      ordered = [];

      // $.each() 함수를 사용하여 객체의 속성을 반복하고 키와 값을 추출합니다.
      $.each(data.result, function (key, value) {
        months.push(key);
        ordered.push(value);
      });
      const barLabels = months.reverse();
      const barData = {
        labels: barLabels,
        datasets: [
          {
            label: '최근 6개월 간 수강신청수',
            data: ordered.reverse(),
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
              // beginAtZero: true,
            },
          },
        },
      };

      let ctx = document.getElementById('bar-chart');
      const stackedBar = new Chart(ctx, barConfig);

      const pidData = {
        labels: ['Red', 'Blue', 'Yellow'],
        datasets: [
          {
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
            hoverOffset: 4,
          },
        ],
      };

      const pidConfig = {
        type: 'doughnut',
        data: pidData,
        options: {
          maintainAspectRatio: false,
          cutout: '0%',
        },
      };

      const myPieChart = new Chart(document.getElementById('pie-chart'), pidConfig);
    },
  });
});