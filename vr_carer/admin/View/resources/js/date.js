$("#search").click(function () {
  if ($("#searchDay").val() == "") {
    alert("search something");
  } else {
    console.log($("#searchDay").val());
    let sendData = {
      searchText: $("#searchDay").val(),
    };

    $.ajax({
      url: "../Controller/searchDayController.php",
      type: "POST",
      data: sendData,

      success: function (res) {
        let daySearch = JSON.parse(res);
        console.log(daySearch);
        $("#dayTable").empty();

        for (const day of daySearch) {
          let number = 1;
          $("#dayTable").append(
            ` <tr class="row_bdr">
            <td>${number++}</td>
            <td>${day.doctor_name}</td>
            <td>${day.age}</td>
            <td>${day.speciality}</td>
            <td>${day.date}</td>
            <td>${day.startTime}</td>
            <td>${day.endTime}</td>
            <td>
            <a href="../Controller/dateController.php?del_id=${day.id}" class="trash "><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>`
          );
        }
      },
      error: function (err) {
        alert(err);
      },
    });
  }
});

$("#allDate").click(function () {
  location.reload();
});
