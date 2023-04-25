<?php
include './../../Constants/config.php';
$brandName = "";
$outletName = "";
// $sql = "SELECT * FROM `sb_category` C INNER JOIN sb_menu M ON C.category_id = M.category_id  WHERE outlet_id =8";
//     $resultCatMen = $conn->query($sql) or die($conn->error);
//             $resultCheck = mysqli_num_rows($resultCatMen);
//             if ($resultCheck > 0) {
//                 while ($row = mysqli_fetch_assoc($resultCatMen)) {
//                     echo "Data from DB : ".$row['item_name'];
                    
//                 }
//             } else {
//                 echo "No results to display";
//             }

//getting brand and outlet name
$sql = "SELECT * FROM `sb_category` C INNER JOIN sb_outlets O ON C.outlet_id = O.outlet_id  WHERE O.outlet_id =8";
    $result = $conn->query($sql) or die($conn->error);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $outletName = $row['outlet_name'];
                    
                }
            } else {
                echo "No results to display";
            }

            $sql = "SELECT * FROM `sb_outlets` O INNER JOIN sb_brands B ON O.brand_id = B.brand_id  WHERE O.outlet_id =8";
    $result = $conn->query($sql) or die($conn->error);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $brandName = $row['brand_name'];
                    
                }
            } else {
                echo "No results to display";
            }

            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Menu Card - <?php echo $brandName ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./menusampleBootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./menusample.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i> <?php echo $brandName ?> - <?php echo $outletName ?></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="menu.html" class="nav-item nav-link active">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Translate</a>
                            <div class="dropdown-menu m-0">
                                <a href="booking.html" class="dropdown-item">English</a>
                                <a href="team.html" class="dropdown-item">Hindi</a>
                                <a href="testimonial.html" class="dropdown-item">Spanish</a>
                            </div>
                        </div>
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Currency</a>
                    </div>
                    <a href="" class="btn btn-primary py-2 px-4">View Cart</a>
                </div>
            </nav>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <?php
                $categoryName = "";
                $sql = "SELECT * FROM `sb_category` C INNER JOIN sb_menu M ON C.category_id = M.category_id  WHERE outlet_id =8";
                $resultCatMen = $conn->query($sql) or die($conn->error);
                        $resultCheck = mysqli_num_rows($resultCatMen);
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($resultCatMen)) {
                                if($categoryName != $row['category_name']){
            ?>
            <h5 class="section-title ff-secondary text-center text-primary fw-normal"><?php echo $row['category_name'] ?></h5>
            <h1 class="mb-5"> </h1>
            <?php
                $categoryName = $row['category_name'];
                }
            ?>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="img/menu-1.jpg" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span><?php echo $row['item_name']?></span>
                                            <span class="text-primary"><?php echo $row['item_price']?></span>
                                        </h5>
                                        <small class="fst-italic"><?php echo $row['item_description']?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between pb-2">
                                            <span></span>
                                            <span class="text-primary"></span>
                                        </h5>
                                        <small class="fst-italic"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                            }
                        }
            ?>
        </div>
    </div>
            
</div>
        <!-- Menu End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">sqanbee</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="#">SqanBee</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <!-- <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <i class="btn btn-lg btn-primary btn-lg-square back-to-top bi bi-cart"></i>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="./menusample.js"></script>
</body>

</html>