// Chart






$(document).ready(function(){
  $.ajax({
    url: "../Controller/chartController.php",
    method: "GET",
    success: function(data) {
      var booking = JSON.parse(data);
      console.log(data);

      var date = [];
      var totalUser = [];

      for(var a in booking) {
        totalUser.push( booking[a].total_user);
      }
      console.log(totalUser);
      for(var i in booking) {
        date.push( booking[i].date);
      }
      var chartData = {
        labels: date,
        datasets: [
          {
            label: "Booking",
            backgroundColor: "rgb(255, 99, 132)",
            borderColor: "white",
            data: totalUser,
          },
        ],
      };

      const config = {
        type: "line",
        data: chartData,
        options: {},
      };
      const myChart = new Chart(document.getElementById("myChart"), config);

    },
    error: function(data) {
      console.log(data);
    }
  });
});