let courseSelect = $(".course_select");
let courseOption = courseSelect.find("option");

courseSelect.change(function () {
  let courseId = $(this).val();
  console.log("courseId", courseId);
  let data = {
    courseId: courseId,
  };
  courseChart(data);
});

function courseChart(data) {
  $.ajax({
    url: "index_course.php",
    type: "POST",
    data: data,
    dataType: "json",
    error: function () {
      console.log("실패");
    },
    success: function (data) {
      console.log("결과", data.result[0]);
      months = [];
      ordered = [];
      $.each(data.result[0], function (key, value) {
        months.push(key);
        ordered.push(value);
      });
      const barLabels = months.reverse();
      const barData = {
        labels: barLabels,
        datasets: [
          {
            label: "최근 6개월 간 수강신청수",
            data: ordered.reverse(),
            backgroundColor: [
              "rgba(255, 99, 132, 0.2)",
              "rgba(255, 159, 64, 0.2)",
              "rgba(255, 205, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(153, 102, 255, 0.2)",
              "rgba(201, 203, 207, 0.2)",
            ],
            borderColor: [
              "rgb(255, 99, 132)",
              "rgb(255, 159, 64)",
              "rgb(255, 205, 86)",
              "rgb(75, 192, 192)",
              "rgb(54, 162, 235)",
              "rgb(153, 102, 255)",
              "rgb(201, 203, 207)",
            ],
            borderWidth: 1,
          },
        ],
      };
      const barConfig = {
        type: "bar",
        data: barData,
        options: {
          maintainAspectRatio: false,
          indexAxis: "x",
          scales: {
            y: {
              // beginAtZero: true,
            },
          },
        },
      };
      let ctx = document.getElementById("bar-chart");
      if (window.stackedBar !== undefined) {
        window.stackedBar.destroy();
      }
      window.stackedBar = new Chart(ctx, barConfig);

      // const pidData = {
      //   labels: ["Red", "Blue", "Yellow"],
      //   datasets: [
      //     {
      //       label: "My First Dataset",
      //       data: [300, 50, 100],
      //       backgroundColor: [
      //         "rgb(255, 99, 132)",
      //         "rgb(54, 162, 235)",
      //         "rgb(255, 205, 86)",
      //       ],
      //       hoverOffset: 4,
      //     },
      //   ],
      // };
      // const pidConfig = {
      //   type: "doughnut",
      //   data: pidData,
      //   options: {
      //     maintainAspectRatio: false,
      //     cutout: "0%",
      //   },
      // };
      // const myPieChart = new Chart(
      //   document.getElementById("pie-chart"),
      //   pidConfig
      // );
      $(".course_profit").text(
        data.result[1].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "원"
      );
    },
  });
}
courseChart({ courseId: 39 });

$.ajax({
  url: "index_profit.php",
  type: "POST",
  data: [],
  dataType: "json",
  error: function () {
    console.log("실패");
  },
  success: function (data) {
    console.log("테스트", data.result);
    let months = [];
    let profit = [];
    $.each(data.result, function (key, value) {
      months.push(key);
      profit.push(value);
    });
    const lineLabels = months.reverse();
    const lineData = {
      labels: lineLabels,
      datasets: [
        {
          label: "최근 6개월 간 수익",
          data: profit.reverse(),
          // backgroundColor: [],
          borderColor: ["rgb(255, 100, 100)"],
          borderWidth: 5,
        },
      ],
    };
    const lineConfig = {
      type: "line",
      data: lineData,
      options: {
        maintainAspectRatio: false,
        indexAxis: "x",
        scales: {
          y: {
            // beginAtZero: true,
          },
        },
        tooltips: {
          enabled: true, // 툴팁 활성화
          mode: "nearest", // 가장 가까운 데이터 포인트에 대한 툴팁 표시
          intersect: true, // 두 데이터 포인트가 교차하는 경우 툴팁 표시
          callbacks: {
            label: function (tooltipItem, data) {
              // 툴팁에 표시될 텍스트 포맷 지정
              return (
                data.datasets[tooltipItem.datasetIndex].label +
                ": " +
                tooltipItem.yLabel
              );
            },
          },
        },
      },
    };
    let profitChart = document.getElementById("line-chart");
    if (window.profitLine !== undefined) {
      window.profitLine.destroy();
    }
    window.profitLine = new Chart(profitChart, lineConfig);
  },
});

// star
let rating = $(".rating");

rating.each(function () {
  let $this = $(this);
  let num = $(".evaluation").text();
  let numArr = num.split(".");

  if (numArr.length > 1) {
    $this
      .find(".star")
      .eq(numArr[0])
      .css({ width: `${numArr[1]}0%` });
  }
  $this.find(".star").slice(0, numArr[0]).css({ width: "100%" });
});

// let rating1 = $('.rating1');
// let num1 = rating1.attr('data-rate'); //3
// //rating1.find(`.star-wrap:nth-child(-n+${num})`).css({width:'18px'});
// rating1.find('.star-wrap').slice(0,num1).css({width:'18px'});

// let rating2 = $('.rating2');
// let num2 = rating2.attr('data-rate');
// let numArr = num2.split('.'); //['3','5']
// //numArr배열의 첫번째 숫자(3)를 활용, 그 숫자까지 너비 '18px'
// rating2.find('.star-wrap').slice(0,numArr[0]).css({width:'18px'});

// //numArr배열의 두번째 숫자(5)를 활용, 3번째를 선택해서 그 너비 '9px'
// rating2.find('.star-wrap').eq(numArr[0]).css({width:'9px'});
// star
