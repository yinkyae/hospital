$("#search").click(function (){

    if ($("#searchText").val() == "") {
        window.alert("Please Type Something");
    }else{
        let sendData = {
            searchText: $("#searchText").val(),   
        };
         $.ajax({
            url: "../Controller/inpatientSearchcontroller.php",
            type: "POST",
            data: sendData,

            success: function(res){
                
                let inpatientList = JSON.parse(res);

                $("#table_text").empty();
                for (const inpatient of inpatientList) {
                    let number = 1;
                    $("#table_text").append(
                        `<tr class="row_bdr">
                        <td>${number++}</td>
                        <td>${inpatient.hospitalized_date} </td>
                        <td>${inpatient.name}</td>
                        <td>${inpatient.age}</td>
                        <td>${inpatient.disease}</td>
                        <td>${inpatient.status}</td>
                        <td>${inpatient.room}</td>
                        <td>${inpatient.address}</td>    
                         <td class="p-3">
                                       <a href="../Controller/inpatientEditController.php?id=${inpatient.id}" class="edit_btn me-4">
                                            Edit</a>
                                        <a href="../Controller/inpatientEditController.php?delId=${inpatient.id}" class="trash "><i class="fa-solid fa-trash"></i></a>
                        </td>               
                    </tr>`
                    );
               
                }
                
            },
            error: function(err){
                alert(err);
            }
        });
    }
  });
    $("#allInpatient").click(function(){
        location.reload();
})