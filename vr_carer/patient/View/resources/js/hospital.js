$("#search").click(function () {
  if ($("#searchHospital").val() == "") {
    alert("search something");
  } else {
    let sendData = {
      searchText: $("#searchHospital").val(),
    };

    $.ajax({
      url: "../Controller/hospitalLocations/searchHospitalController.php",
      type: "POST",
      data: sendData,

      success: function (res) {
        let hospitalSearch = JSON.parse(res);
        $("#hospitalCard").empty();

        for (const hospital of hospitalSearch) {
          $("#hospitalCard").append(
            `
          <div class="card_wrapper mb-5">
          <h2 class="text-center text-white my-4 fw-bold" id="hosname">${hospital.hospital_name}</h2>
          <div class="location_box">
            <div class="map_image ">
              <div class="map">
              <iframe src="${hospital.google_map_image}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
              </div>
            </div>
            <div class="hospitalInfo mt-3">
              <p class="yellow_color  location_data"> Hospital Name : <span class="white_color">
              ${hospital.hospital_name}
                </span>
              </p>
              <p class="yellow_color  location_data">Address :
                <span class="white_color">
                ${hospital.address}
                </span>
              </p>
              <p class="yellow_color  location_data ">Phone Number :
                <span class="white_color">${hospital.contact}</span>
              </p>
              <p class="yellow_color  location_data">Email :
                <span class="white_color">${hospital.email}</span>
              </p>
            </div>

          </div>
          <hr class="line ">
        </div>
        <br>
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

$("#allHospital").click(function () {
  location.reload();
});
