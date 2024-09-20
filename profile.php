<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Redirect to login page if not logged in
if(empty($_SESSION['login'])) {
    header('location:index.php');
    exit();
}

$msg = ''; // Initialize message variable

if(isset($_POST['updateprofile'])) {
    try {
        // Retrieve form data
        $name = $_POST['fullname'];
        $mobileno = $_POST['mobilenumber'];
        $address = $_POST['address'];
        $email = $_SESSION['login'];
        $account_no = $_POST['account_no'];
        $branch_name = $_POST['branch_name'];
        $bank_name = $_POST['bank_name'];
        $ifsc_code = $_POST['ifsc_code'];
        $aadhar_number = $_POST['aadhar_number'];

        // Prepare SQL update query
        $sql = "UPDATE tblusers 
                SET FullName = :name, 
                    ContactNo = :mobileno,
                    Address = :address, 
                    account_no = :account_no, 
                    branch_name = :branch_name, 
                    bank_name = :bank_name, 
                    ifsc_code = :ifsc_code, 
                    aadhar_number = :aadhar_number 
                WHERE EmailId = :email";
        
        // Prepare PDO statement
        $query = $dbh->prepare($sql);

        // Bind parameters
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':account_no', $account_no, PDO::PARAM_STR);
        $query->bindParam(':branch_name', $branch_name, PDO::PARAM_STR);
        $query->bindParam(':bank_name', $bank_name, PDO::PARAM_STR);
        $query->bindParam(':ifsc_code', $ifsc_code, PDO::PARAM_STR);
        $query->bindParam(':aadhar_number', $aadhar_number, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);

        // Execute query
        $query->execute();

        // Check if update was successful
        if($query->rowCount() > 0) {
            $msg = "Profile Updated Successfully";
        } else {
            $msg = "No changes made to the profile";
        }
    } catch(PDOException $e) {
        // Handle database errors
        $msg = "Error: " . $e->getMessage();
    }
}

// Fetch user data for displaying in the form
$useremail = $_SESSION['login'];
$sql_select = "SELECT * FROM tblusers WHERE EmailId = :useremail";
$query_select = $dbh->prepare($sql_select);
$query_select->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query_select->execute();
$results = $query_select->fetchAll(PDO::FETCH_OBJ);


?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Bike Rental Portal | My Profile</title>
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
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header -->
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->


<?php
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/profile.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Address);?><br>
          <?php echo htmlentities($result->EmailId);?>&nbsp;<?php echo htmlentities($result->ContactNo);?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Genral Settings</h5>
          <?php
         if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post">
           <div class="form-group">
              <label class="control-label">Reg Date -</label>
             <?php echo htmlentities($result->RegDate);?>
            </div>
             <?php if($result->UpdationDate!=""){?>
            <div class="form-group">
              <label class="control-label">Last Update at  -</label>
             <?php echo htmlentities($result->UpdationDate);?>
            </div>
            <?php } ?>
           

            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result->FullName); ?>" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId); ?>" name="emailid" type="email" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo); ?>" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Your Address</label>
                                <textarea class="form-control white_bg" name="address" rows="4"><?php echo htmlentities($result->Address); ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Account Number</label>
                                <input class="form-control white_bg" name="account_no" value="<?php echo htmlentities($result->account_no); ?>" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Branch Name</label>
                                <input class="form-control white_bg" name="branch_name" value="<?php echo htmlentities($result->branch_name); ?>" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bank Name</label>
                                <input class="form-control white_bg" name="bank_name" value="<?php echo htmlentities($result->bank_name); ?>" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">IFSC Code</label>
                                <input class="form-control white_bg" name="ifsc_code" value="<?php echo htmlentities($result->ifsc_code); ?>" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Aadhar Number</label>
                                <input class="form-control white_bg" name="aadhar_number" value="<?php echo htmlentities($result->aadhar_number); ?>" type="text">
                            </div>
            
            <?php } ?>

            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting-->

<<!--Footer -->
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
<?php } ?>
