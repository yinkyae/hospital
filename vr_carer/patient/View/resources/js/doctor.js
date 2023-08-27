// $("#generalHealth").click(function () {
//   getData($("#generalHealth").text());
// });

// $("#pulmonology").click(function () {
//   getData($("#pulmonology").text());
// });

// $("#ophthalmology").click(function () {
//   getData($("#ophthalmology").text());
// });
// $("#neurology").click(function () {
//   getData($("#neurology").text());
// });
// $("#og").click(function () {
//   getData($("#og").text());
// });
// $("#dentist").click(function () {
//   getData($("#dentist").text());
// });

// $("#paediatric").click(function () {
//   getData($("#paediatric").text());
// });

// function getData(text) {
//   let sendData = {
//     searchText: text,
//   };
//   let doctorSpeciality;
//   $.ajax({
//     url: "../Controller/doctor/searchDoctorController.php",
//     type: "POST",
//     data: sendData,

//     success: function (res) {
//       doctorSpeciality = JSON.parse(res);
//       console.log(doctorSpeciality);
      
//       $("#doctorSearch").empty();

//       for (const doctor of doctorSpeciality) {
//         $("#doctorSearch").append(
//           `
//             <div class="col-sm-12 col-md-6 col-lg-4 text-center">
//             <div class="card cart" style="width: 23rem;">
//                 <dvi class="image">
//                     <img src="./storages/image/${doctor.profile_photo}" class="card-img-top" alt="...">
//                     <h5 class="mt-2">${doctor.doctor_name}</h5>
//                     <p>${doctor.speciality}</p>
//                 </dvi>
//                 <div class="card-body">
//                     <div class="contact">
//                         <div class="btk mb-3">
//                             <span class="title">Day</span>
//                             <span>Time</span>
//                         </div>
//                         <div class="form-check">
//                             <label class="form-check-label" for="flexRadioDefault1">
//                                 ${doctor.date} &nbsp; &nbsp; ${doctor.startTime}  ~ ${doctor.endTime} 
//                             </label>
//                         </div>
//                         <hr>
//                         <button class=" btn btn-outline-primary submit"><a href="../Controller/booking/bookingFormInfoController.php?doctorId=${doctor.id}" id="submit_atag">Continued</a></button>
//                     </div>
//                 </div>
//             </div>
//         </div>
//             `
//         );
//       }
//     },
//     error: function (err) {
//       alert(err);
//     }
//   });


// }

let cards = document.querySelectorAll(".searchSpeciality");
function speciality(btnId){
  cards.forEach(card => {
    card.classList.remove("hidden");
    if(btnId!=card.id){
      card.classList.add("hidden");
    }
  });
}

$("#allDoctor").click(function () {
  location.reload();
});