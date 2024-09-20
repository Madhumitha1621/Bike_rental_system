<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
} else {
    $useremail = $_SESSION['login'];
    $sql = "SELECT * FROM tblusers WHERE EmailId = :useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach($results as $result) {
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Bike Rental Portal | My Feedback</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <!-- OWL Carousel slider -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!-- Slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <style>
        .star-rating {
            font-size: 20px;
            color: #f5b301;
        }
    </style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php'); ?>
<!-- /Switcher -->

<!-- Header -->
<?php include('includes/header.php'); ?>
<!-- /Header -->

<!-- Page Header -->
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>My Feedback</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li>My Feedback</li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay -->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header -->

<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info gray-bg padding_4x4_40">
            <div class="upload_user_logo"> <img src="assets/images/imagess.jpeg" alt="image"> </div>
            <div class="dealer_info">
                <h5><?php echo htmlentities($result->FullName); ?></h5>
                <p><?php echo htmlentities($result->Address); ?><br>
                    <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php include('includes/sidebar.php'); ?>
            

            <div class="col-md-9 col-sm-9">
                <div class="profile_wrap">
                    <h5 class="uppercase underline">My Feedback</h5>
                    <div class="my_vehicles_list">
                        <ul class="vehicle_listing">

                            <?php
                            $sql_feedback = "SELECT * FROM tbltestimonial WHERE UserEmail = :useremail ORDER BY PostingDate DESC";
                            $query_feedback = $dbh->prepare($sql_feedback);
                            $query_feedback->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                            $query_feedback->execute();
                            $results_feedback = $query_feedback->fetchAll(PDO::FETCH_OBJ);

                            if($query_feedback->rowCount() > 0) {
                                foreach($results_feedback as $feedback) {
                            ?>

                                <li>
                                    <div>
                                        <p><?php echo htmlentities($feedback->Testimonial); ?></p>
                                        <p><b>Posting Date:</b> <?php echo htmlentities($feedback->PostingDate); ?></p>
                                        <div class="star-rating">
                                            <?php
                                            for($i = 1; $i <= 5; $i++) {
                                                if($i <= $feedback->Rating) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php if($feedback->status == 1) { ?>
                                        <div class="vehicle_status">
                                            <a class="btn outline btn-xs active-btn">Active</a>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="vehicle_status">
                                            <a class="btn outline btn-xs">Pending</a>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php } ?>
                                </li>

                            <?php
                                } // End foreach
                            } else {
                                echo '<li>No feedback found.</li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- /Profile-setting -->

<!-- Footer -->
<?php include('includes/footer.php'); ?>
<!-- /Footer -->

<!-- Back to top -->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!-- /Back to top -->

<!-- Login-Form -->
<?php include('includes/login.php'); ?>
<!-- /Login-Form -->

<!-- Register-Form -->
<?php include('includes/registration.php'); ?>
<!-- /Register-Form -->

<!-- Forgot-password-Form -->
<?php include('includes/forgotpassword.php'); ?>
<!-- /Forgot-password-Form -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!-- Switcher -->
<script src="assets/switcher/js/switcher.js"></script>
<!-- bootstrap-slider-JS -->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!-- Slider-JS -->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>

<?php
        } // End foreach
    } // End if
} // End else
?>
