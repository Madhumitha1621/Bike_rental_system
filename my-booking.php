<?php
session_start();
error_reporting(0);
include('includes/config.php');


if(strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $useremail = $_SESSION['login'];
    $sql = "SELECT * FROM tblusers WHERE EmailId=:useremail";
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
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Bike Rental Portal | My Booking</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
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
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">


<!-- Meta tags and other head content -->

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
<style>.btn-primary.same-btn {
    background-color: #ff6600; /* Match the color of the "Proceed to Payment" button */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
}

.btn-primary.same-btn:hover {
    background-color: #e65c00; /* Slightly darker shade for hover effect */
}
</style>
</head>
<body>
<?php include('includes/colorswitcher.php');?>
<?php include('includes/header.php');?>
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<?php
$useremail = $_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0) {
    foreach($results as $result) {
?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image"> </div>
      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Address);?><br>
           <?php echo htmlentities($result->EmailId);?>&nbsp;<?php echo htmlentities($result->mobile); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings</h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
            <?php
$sql = "SELECT tblvehicles.Vimage1 as Vimage1, tblvehicles.VehiclesTitle, tblvehicles.id as vid, tblbrands.BrandName, tblbooking.FromDate, tblbooking.ToDate, tblbooking.message, tblbooking.Status, tblbooking.id as bookingId FROM tblbooking JOIN tblvehicles ON tblbooking.VehicleId=tblvehicles.id JOIN tblbrands ON tblbrands.id=tblvehicles.VehiclesBrand WHERE tblbooking.userEmail=:useremail";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0) {
    foreach($results as $result) {
?>
<li>
    <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
    <div class="vehicle_title">
        <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
        <p><b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($result->ToDate);?></p>
    </div>
    <?php if($result->Status == 1) { ?>
    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a> <div class="clearfix"></div> </div>
    <?php } else if($result->Status == 2) { ?>
    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs" >Cancelled</a> <div class="clearfix"></div> </div>
    <?php } else { ?>
    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirmed Yet</a> <div class="clearfix"></div> </div>
    <div style="float: left margin-right: 22px; width: 22%; "><a href="cancel-booking.php?bookingId=<?php echo htmlentities($result->bookingId);?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?');">Cancel Booking</a></div>
    <?php } ?>
    <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
    <?php if($result->Status == 1) { ?>
    <div style="float: right"><a href="payment.php?vhid=<?php echo htmlentities($result->vid);?>&amount=<?php echo htmlentities($amount);?>" class="btn btn-primary">Proceed to Payment</a></div>
    <?php } ?>
</li>
<?php } } ?>

            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php');?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
</body>
</html>
<?php } } } }}?>