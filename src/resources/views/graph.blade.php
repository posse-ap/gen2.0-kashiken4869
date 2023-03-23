
<script>

// 学習時間棒グラフ
  
const column = document.getElementById('column').getContext('2d');

var gradient = column.createLinearGradient(0, 0, 0, 300);
gradient.addColorStop(0, 'rgba(54, 206, 254, 1)');
gradient.addColorStop(1, 'rgba(17,115,189, 1)');

var language_data = {{ $languages_data }};
console.log(language_data);

const myColumnChart = new Chart(column, {
    // label: 'none',
    
    type: 'bar',
    data: {
        labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
        datasets: [{
            // data: [4, 4, 5, 3, 0, 0, 4, 2, 2, 8, 8, 2, 2, 1, 7, 4, 4, 3, 3, 3, 2, 2, 6, 2, 2, 1, 1, 1, 7, 8],
            data: [
              <?php 
              foreach ($bars as $bar) {
                echo $bar['SUM(study_time)'] . ",";
                // if ( == now()) 
                // { 
                //   echo $element['expiration_date']; 
                // }
              }

              
              ?>
            ],
            backgroundColor: gradient,
            borderRadius: 50,
            borderSkipped: false,
        }],
        // barPercentage: 0.3
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            grid: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              color: '#bdd1e1',
              autoSkip: false,
              min: 1,
              max: 30,
              padding: 0,
              // 一個おきに表示させるための処理
              callback: function(val, index) {
                return index % 2 === 1 ? this.getLabelForValue(val) : '';
              },
              maxRotation: 0,
              minRotation: 0
            },
            // barPercentage: 0.3
          },
          y: {
            grid: {
              display: false,
              drawBorder: false
            },
            max: 8,
            min: 0,
            ticks: {
              stepSize: 2, 
              callback: function(value) {
                return value + 'h';
              },
              color: '#bdd1e1',
            },
          },
        },
        plugins: {
          legend: {
            display: false
          }
        }
    },
    
});

// STUDY LANGUAGE

const donut1 = document.getElementById('donut_lang').getContext('2d');

const myFirstDonutChart = new Chart(donut1, {
    type: 'doughnut',
    data: {
        labels: ['CSS', 'HTML', 'Javascript', 'Laravel', 'PHP', 'SHELL', 'SQL', 'その他'],
        datasets: [{
            // data: [30, 20, 20, 20, 10, 10, 5, 5],
            data: language_data,
            // [
              // <?php 
              // foreach ($languages as $language) {
              //   echo $language['SUM(records.study_time)'] . ",";
              // }
              // ?>
            // ],
            backgroundColor: [
              "#0f70bd",
              "#0445ec",
              "#b29ef3",
              "#3005c0",
              "#4a17ef",
              "#3ccefe",
              "#20bdde",
              "#6c46eb",
            ],
            // backgroundColor: [
            //   <?php 
            //   foreach ($languages as $language) {
            //     echo "\"" . $language['languages.colour)'] . "\",";
            //   }
            //   ?>
            // ],
            borderColor: 'transparent'
        }],
    },
    plugins: [ChartDataLabels],
    options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
          datalabels: {
            color: '#fff',
            // formatter: function(value) {
            //   return value + '%';
            // }
            formatter: (value, ctx) => {
              let sum = 0;
              let dataArr = ctx.chart.data.datasets[0].data;
              dataArr.map(data => {
                  sum += data;
              });
              let percentage = (value*100 / sum).toFixed(0)+"%";
              return percentage;
            },
          }
        },
    },
    
});

const donut2 = document.getElementById('donut_content').getContext('2d');

const mySecondDonutChart = new Chart(donut2, {
    type: 'doughnut',
    data: {
        labels: ['N予備校', '課題', 'ドットインストール'],
        datasets: [{
            // data: [40, 40, 20],
            data: [
              <?php 
              foreach ($contents as $content) {
                echo $content['SUM(records.study_time)'] . ",";
              }
              ?>
            ],
            backgroundColor: [
              '#0445ec',
              '#0f70bd',
              '#20bdde',
            ],
            borderColor: 'transparent'
        }],
    },
    plugins: [ChartDataLabels],
    options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          },
          datalabels: {
            color: '#fff',
            // formatter: function(value) {
            //   return value + '%';
            // }
            formatter: (value, ctx) => {
              let sum = 0;
              let dataArr = ctx.chart.data.datasets[0].data;
              dataArr.map(data => {
                  sum += data;
              });
              let percentage = (value*100 / sum).toFixed(0)+"%";
              return percentage;
            },
          }
        },
    },
    
});

</script>