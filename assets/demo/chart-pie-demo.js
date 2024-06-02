

var r = new XMLHttpRequest();
r.onreadystatechange = function () {
  if (r.readyState == 4) {
    var t = r.responseText;

    var obj = JSON.parse(t);

     var n1 = obj["0"];
     var n2 = obj["1"];
     var n3 = obj["2"];
     var n4 = obj["3"];
     var n5 = obj["4"];
     var n6 = obj["5"];
     var d1 = obj["s0"];
     var d2 = obj["s1"];
     var d3 = obj["s2"];
     var d4 = obj["s3"];
     var d5 = obj["s4"];
     var d6 = obj["s5"];
     
  


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [d2, d1, d3,d4,d5,d6],
    datasets: [{
      data: [n2, n1, n3,n3,n4,n5],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#ADD8E6', '#A020F0'],
    }],
  },
});


}
}
r.open("GET", "calculateProduct.php", true);
r.send();
