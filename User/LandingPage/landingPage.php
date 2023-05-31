<?php
include './../../Constants/config.php';
$brandName = "";
$outletName = "";
$paymentLink = "";
$parts = parse_url($_SERVER['REQUEST_URI']);
parse_str($parts['query'], $query);
$outlet_id = $query['outlet_id'];

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM `sb_outlets` O INNER JOIN sb_brands B ON O.brand_id = B.brand_id  WHERE O.outlet_id =" . $outlet_id;

    // use exec() because no results are returned
    $result = $conn->query($sql);
    $resultCheck = $result->rowCount();
    if ($resultCheck > 0) {
        while ($row = $result->fetch()) {
            $brandName = $row['brand_name'];
            $outletName = $row['outlet_name'];
            $paymentLink = $row['payment_link'];
        }
    } else {
        header("Location: ./signinPage.php?error=Invalid username or passwords");
        // exit();
    }

    ;
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./../MenuPage/menusampleBootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- <link href="./landingPage.css" rel="stylesheet"> -->
    <script src="./landingPage.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner End -->
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>
                        <?php echo $brandName ?> -
                        <?php echo $outletName ?>
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Translate</a>
                            <div class="dropdown-menu m-0">
                                <a href="booking.html" class="dropdown-item">English</a>
                                <a href="team.html" class="dropdown-item">Hindi</a>
                                <a href="testimonial.html" class="dropdown-item">Spanish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->
        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div>
                    <?php echo
                '<button type="button" onclick="payNow(\''.$paymentLink.'\')">
                            <span class="fa fa-bars">Pay Now</span>
                        </button>
                        <button type="button" onclick="viewMenu('.$outlet_id.')">
                            <span class="fa fa-bars">View Menu</span>
                        </button>
                        <a href="' . $paymentLink.'">
                            <li class="side-nav__item">
                                <?php echo drawSVG("addBrandIcon"); ?>
                                <span>Pay Now</span>
                            </li>
                        </a>
                        <a href="./../MenuPage/menusample.php?outlet_id=' . $outlet_id.'">
                            <li class="side-nav__item">
                                <?php echo drawSVG("addBrandIcon"); ?>
                                <span>View Menu</span>
                            </li>
                        </a>'
                        ?>
                    </div>
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
</body>

</html>