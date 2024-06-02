var r = new XMLHttpRequest();
r.onreadystatechange = function () {
  if (r.readyState == 4) {
    var t = r.responseText;

   

    var object = JSON.parse(t);

     var n1 = object["0"];
     var n2 = object["1"];
     var n3 = object["2"];
     var n4 = object["3"];
     var n5 = object["4"];
     var n6 = object["5"];
     var n7 = object["6"];
     var d1 = object["d0"];
     var d2 = object["d1"];
     var d3 = object["d2"];
     var d4 = object["d3"];
     var d5 = object["d4"];
     var d6 = object["d5"];
     var d7 = object["d6"];

     
     

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Dec 13", "Dec 14", "Dec 15", "Dec 16"],
    datasets: [{
      label: "Rs ",
      lineTension: 0.3,
      backgroundColor: "rgba(137, 196, 244,0.2)", 
      borderColor: "rgba(137, 196, 244,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(137, 196, 244,1)",
      pointBorderColor: "rgba(137, 196, 244,0.8)", 
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(137, 196, 244,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: ["9000", "12000", "18000", "15000"],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 20000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

}
}
r.open("GET", "calculateEarning.php", true);
r.send();
