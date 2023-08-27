<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav bar</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <!-- Root Css -->
    <link rel="stylesheet" href="../resources/css/root.css">
    <link rel="stylesheet" href="../resources/css/icon.css">
</head>

<body>
    <div class="col-sm-3 col-md-4 col-xl-2 navbar_wrapper ">
        <div class="d-flex flex-column align-items-center align-items-sm-start min-vh-100 mt-2 navbar ">
            <div class="logo_btn ">

                <img src="./storages/logo/VR2.png" alt="" id="logo">

            </div>
            <div class="navbar_btn">
                <a href="./adminDashboard.php" class="nav-link ">
                    <i class="fa-solid fa-house-user navbar_btn_icon color_black "></i>
                    <span class="navbar_btn_name">
                        Dashboard
                    </span>
                </a>
            </div>
            <!-- Dropdown button -->
            <button class="dropdown-btn navbar_btn">
                <a href="#daily" class="nav-link" id="daily">
                    <i class="fa-solid fa-calendar-days color_black"></i>
                    <span class="navbar_btn_name">
                        Daily
                    </span>
                    <i class="fa-solid fa-caret-down color_black mt-1"></i>
                </a>

            </button>
            <div class="dropdown-container">
                <a href="./date.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-calendar color_green px-1"></i>
                    <span class="navbar_btn_name_o px-1">
                        Date
                    </span>
                </a>
                <a href="./booking.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-file-pen color_green"></i>
                    <span class="navbar_btn_name_o">
                        Booking
                    </span>
                </a>
                <a href="./doctor.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-user-doctor color_green"></i>
                    <span class="navbar_btn_name_o">
                        Doctor
                    </span>
                </a>
            </div>

            <div class="navbar_btn">
                <a href="./patientHistory.php" class="nav-link align-middle py-2 ">
                    <i class="fa-solid fa-folder color_black"></i>
                    <span class="navbar_btn_name">Patient History</span>
                </a>
            </div>
            <!-- Dropdown button -->
            <button class="dropdown-btn navbar_btn">
                <a href="#userHome" class="nav-link" id="userHome">
                    <i class="fa-solid fa-user color_black"></i>
                    <span class="navbar_btn_name">
                        User Home
                    </span>
                    <i class="fa-solid fa-caret-down color_black mt-1"></i>
                </a>

            </button>
            <div class="dropdown-container">
                <a href="./carousel.php" class="nav-link dropdown_list">
                    <i class="fa-brands fa-adversal
                        color_green"></i>
                    <span class="navbar_btn_name_o px-1">
                        Carousel
                    </span>
                </a>
                <a href="./article.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-newspaper color_green"></i>
                    <span class="navbar_btn_name_o px-1">
                        Articles
                    </span>
                </a>
                <a href="./medicineAdd.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-tablets
                        color_green"></i>
                    <span class="navbar_btn_name_o">
                        Medicine
                    </span>
                </a>

            </div>
            <div class="navbar_btn">
                <a href="./inpatientList.php" class="nav-link align-middle py-2 ">
                    <i class="fa-solid fa-bed color_black"></i>
                    <span class="navbar_btn_name">Inpatient</span>
                </a>
            </div>
            <!-- Dropdown button -->
            <button class="dropdown-btn navbar_btn">
                <a href="#information" class="nav-link" id="information">
                    <i class="fa-solid fa-user color_black "></i>
                    <span class="navbar_btn_name">
                        Information
                    </span>
                    <i class="fa-solid fa-caret-down color_black mt-1"></i>
                </a>
            </button>
            <div class="dropdown-container">
                <div>
                    <a href="./about.php" class="nav-link dropdown_list">
                        <i class="fa-solid fa-users color_green"></i>
                        <span class="navbar_btn_name_o px-1 ">
                            About Us
                        </span>
                    </a>
                </div>

                <a href="./hospitalLocation.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-location-pin color_green"></i>
                    <span class="navbar_btn_name_o">
                        Hospital Location
                    </span>
                </a>
            </div>
            <!-- Dropdown button -->
            <button class="dropdown-btn navbar_btn">
                <a href="#blog" class="nav-link" id="blog">
                    <i class="fa-solid fa-blog color_black"></i>
                    <span class="navbar_btn_name">
                        Blogs
                    </span>
                    <i class="fa-solid fa-caret-down color_black mt-1"></i>
                </a>
            </button>
            <div class="dropdown-container">
                <a href="./blog.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-blog color_green"></i>
                    <span class="navbar_btn_name_o px-1">
                        Blog
                    </span>
                </a>
                <a href="./emergency.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-suitcase-medical color_green"></i>
                    <span class="navbar_btn_name_o text-white dropdown_btn_name">
                        First Aid
                    </span>
                </a>
                <a href="./donation.php" class="nav-link dropdown_list">
                    <i class="fa-solid fa-heart color_green"></i>
                    <span class="navbar_btn_name_o">
                        Blood Donation
                    </span>
                </a>


            </div>
            <div class="navbar_btn log_out_btn  pt-1 px-2">
                <a href="./login.php"  >
                    <i class="fa-solid fa-arrow-left color_black fs-6 me-2" ></i>
                    <span class="navbar_btn_name log_out fw-bold fs-6 ">Log Out</span>
                </a>
            </div>
        </div>
    </div>
    <script src="./resources/js/dropdown_menu.js"></script>
</body>

</html>