<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carousel</title>
    <!-- Root Css -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- css -->
    <link rel="stylesheet" href="../../resources/css/carousel.css">
    <!-- cdn link -->
    <link rel="stylesheet" href="./resources/js/splide-4.1.3/dist/css//splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/themes/splide-skyblue.min.css">

</head>

<body>
    <section class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide"> <div class="slide_img_div">
            <img src="../../storages/image/emergency.jpg" alt="" class="slide_img">
          </div></li>
                <li class="splide__slide"> <div class="slide_img_div">
            <img src="../../storages/image/emergency.jpg" alt="" class="slide_img">
          </div></li>
                <li class="splide__slide"> <div class="slide_img_div">
            <img src="../../storages/image/emergency.jpg" alt="" class="slide_img">
          </div></li>
            </ul>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide');
        splide.mount();
    </script>
</body>

</html>