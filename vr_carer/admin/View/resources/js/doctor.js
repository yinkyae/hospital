$("#search").click(function () {
  if ($("#searchDoctor").val() == "") {
    alert("search something");
  } else {
    let sendData = {
      searchText: $("#searchDoctor").val(),
    };

    $.ajax({
      url: "../Controller/doctor/searchDoctorController.php",
      type: "POST",
      data: sendData,

      success: function (res) {
        let doctorSearch = JSON.parse(res);
        console.log(doctorSearch);
        $("#table_text").empty();
        
        for (const doctor of doctorSearch) {
            let number = 1;
          $("#table_text").append(
            `<tr class="row_bdr">
                <td>${number++}</td>
                <td>${doctor.doctor_name}</td>
                <td>${doctor.age}</td>
                <td>${doctor.speciality}</td>
                <td>${doctor.contact}</td>
                <td id="image">
                    <img src="./storages/doctor/${doctor.profile_photo}" alt="" class="image">
                </td>
                <td> 
                    <a href="../Controller/dateController.php?id=${doctor.id}" class="color_sixth"><button class="edit_btn me-4" value="${doctor.id}">Add</button></a>
                </td>
                <td class="p-3">
                    <a href="../Controller/doctorEditController.php?id=${doctor.id}" class="edit_btn me-4">
                        Edit</a>
                    <a href="../Controller/doctorEditController.php?delId=${doctor.id}" class="trash "><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
              `
          );
        }
      },
      error: function (err) {
        alert(err);
      },
    });
  }
});

$("#allDoctor").click(function(){
  location.reload();
})
