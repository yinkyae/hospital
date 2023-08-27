$("#download").click(function () {
    html2canvas($("#pdf_download"), {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            var docDefinition = {
                content: [{
                    image: data,
                    width: 500
                }]
            };
            pdfMake.createPdf(docDefinition).download("bookingdata.pdf");
        }
    });
})
