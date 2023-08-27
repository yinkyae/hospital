$("#boom").click(function () {
  if ($("#todayList").val() == "") {
    alert("search something");
  } else {
    let sendData = {
      searchText: $("#todayList").val(),
    };
    $.ajax({
      url: "../Controller/dashboard/searchController.php",
      type: "POST",
      data: sendData,
      success: function (res) {
        //console.log(res);
        let date = JSON.parse(res);
        //console.log(date);
        $("#resultData").empty();
        for (const list of date) {
          let number = 1;
          let renew;
          if (list.next_appointment_date == "") {
            renew = "No Date For Next";
          } else {
            renew = list.next_appointment_date;
          }
          $("#resultData").append(`
                    <tr class="row_bdr">
                    <td>${++number}</td>
                    <td>${list.patient_name}</td>
                    <td>${list.email}</td>
                    <td>${list.doctor_name}</td>
                    <td>${list.disease}</td>
                    <td>${list.booking_date}</td>
                    <td class="pending_color">${renew}</td>
                </tr>
                    `);
        }
      },
      error: function (err) {
        alert(err);
      },
    });
  }
});


