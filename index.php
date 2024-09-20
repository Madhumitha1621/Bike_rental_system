<?php
session_start();
include('includes/config.php');
error_reporting(0);

// Check if user is logged in
$isLoggedIn = isset($_SESSION['login']);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Bike Rental Portal</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Include jQuery and jQuery UI for the date and time picker -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" />

<link rel="stylesheet" href="path/to/your/css/xdsoft_datetimepicker.css">
    <script src="path/to/your/js/jquery.min.js"></script>
    <script src="path/to/your/js/xdsoft_datetimepicker.js"></script>

<style>
.bannerr-section {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 160px 0;
  position: relative;
  text-align: center;
  background-image: url(assets/images/first.png);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.banner-section .banner-content {
  position: center;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}
.car-finder-box {
  background: rgba(255, 255, 255, 0.8);
  padding: 26px;
  margin-top: 20px;
  border-radius: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateY(-50%);
  
}
.car-finder-box select, .car-finder-box input {
  width: 100%;
  margin-bottom: 15px;
  padding: 10px;
}
.car-finder-box .btn {
  width: 100%;
  background-color: #007bff;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
}
.banner_content {
  padding-left: 320px;
}
.banner_content h1 {
  color: whitesmoke;
  font-size: 40px;
  line-height: 50px;
  text-transform: uppercase;
}
.banner_content p {
  color: whitesmoke;
  font-size: 20px;
  font-weight: 400;
  line-height: 29px;
}
.car-finder-box {
  background: rgba(255, 255, 255, 0.8) none repeat scroll 0 0;
  padding: 26px;
}
.find-car-form {
  overflow: hidden;
}
.find-car-form .form-control{ border:none;}
.find-car-form .col-form-6 {
  float: left;
  width: 49%;
}
.find-car-form .col-form-6:nth-child(2n+1) {
  margin-right: 10px;
}
</style>
<script>
function handleSearchNow(event) {
    event.preventDefault();
    var isLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
    if (isLoggedIn) {
        window.location.href = 'Search-carresult.php';
    } else {
        window.location.href = 'includes/login.php';
    }
}
</script>


</head>

<body>
   

<!-- Start Switcher -->

<!-- /Switcher -->

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header -->

<!-- Banners -->
<section id="banner" class="bannerr-section" style="background-image: url('assets/images/first.png');">

  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class=" car-finder-box">
        <form onsubmit="handleSearchNow(event);">
            <label for="city">Select City</label>
            <select name="city" id="city" required>
              <option value="">Select City</option>
              <option value="Chennai">Chennai</option>
              <option value="Coimbatore">Coimbatore</option>
              <option value="Trichy">Trichy</option>
              <!-- Add more options as needed -->
            </select>
            <label for="category">All Category</label>
            <select name="category" id="category" required>
              <option value="">All Category</option>
              <option value="Road Bike">Road Bike</option>
              <option value="Mountain Bike">Mountain Bike</option>
              <option value="Electric Bike">Electric Bike</option>
              <!-- Add more options as needed -->
            </select>
            <label for="pickup">Pick up date & time</label>
            <input type="text" name="pickup" id="pickup" required>
            <label for="return">Return date & time</label>
            <input type="text" name="return" id="return" required>
            <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" value="Search Now">
              </div>
              <?php } else { ?>
<a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Search For Book</a>

<?php } ?>
           
          </form>
         
        </div>
        <div class="col-md-7 col-md-pull-5">
        <div class="banner_content">
            <h1>Find Your Perfect Bike</h1>
            <p>We have more than a thousand bikes for you to choose.</p>
            <a href="page.php?type=aboutus" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize flatpickr on the input fields
    flatpickr("#pickup", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    flatpickr("#return", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const images = [
        'assets/images/first.png',
        'assets/images/second.jpg',
        'assets/images/third.jpg' // Add as many images as you like
    ];

    let currentIndex = 0;
    const bannerSection = document.getElementById('banner');

    function changeBackgroundImage() {
        bannerSection.style.backgroundImage = `url(${images[currentIndex]})`;
        currentIndex = (currentIndex + 1) % images.length;
    }

    // Initial background image
    changeBackgroundImage();

    // Change background image every 5 seconds
    setInterval(changeBackgroundImage, 5000);
});


</script>
  
<!-- /Banners -->


<!-- /Resent Cat -->

<!-- Fun Facts-->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-motorcycle " aria-hidden="true"></i>1000+</h2>
            <p>New Bikes For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-motorcycle " aria-hidden="true"></i>999+</h2>
            <p>Used Bikes For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>850+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts-->


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customer's Review</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        <div class="testimonial-m">
          <div class="testimonial-img"> <img src="assets/images/cat-profile.png" alt="" /> </div>
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>



      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial-->


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form -->

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form -->

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
