$("#search").click(function () {
  console.log($("#first_aid_select option:selected").text());
  let sendData = {
        searchText:$("#first_aid_select option:selected").text()
    };
    console.log(sendData);
    $.ajax({
      url: "../Controller/emergencyPage/searchFirstaidController.php",
      type: "POST",
      data: sendData,

      success: function (res) {
       let articles = JSON.parse(res);
       console.log(articles);
       $("#articleSearch").empty();

       for (const article of articles) {
        $("#articleSearch").append(
            `
            <div class="first_aid_card">
            <h1 class="first_aid_card_header mb-3">First Aid For <span>
                    ${article.article_header}
                </span>
            </h1>
            <div class="wrapper">
            <div>
                <img src="./storages~HEAD/emergency/${article.article_image}" alt="" class="card_img" />
                </div>
                <div class="info">
                    <h2 class="first_aid_para_header">What to Do?</h2>
                    ${article.article_text}
                </div>
            </div>
            <hr class="line" />
            </div>
            `
        )
       }
      },
      error: function(err){
        alert(err);
      }
    });
 
});

$("#allFirstAid").click(function () {
  location.reload();
});