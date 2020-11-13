<?php
session_start();
include_once "api_access.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <title>.::OIA::.</title>
  <link rel="shortcut  icon" href="images/icon.jpg">
  <!-- Bootstrap core CSS -->
  <link href="Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fontawesome CSS -->
  <link href="css/all.css" rel="stylesheet">
  <!-- Owl Carousel CSS -->
  <link href="css/owl.carousel.min.css" rel="stylesheet">
  <!-- Owl Carousel CSS -->
  <!<link href="css/jquery.fancybox.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper-main">
    <!-- Navigation -->
    <?php include_once "includes/company_headers.php"; ?>
  
     <!-- Page Content -->
    <div class="container">
      <br><br>
    <center><h3>Add new Intership</h3>
      <br></center>    
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="contactForm" style="width: 900px;margin: auto;">
        <?php
        if(isset($_POST['btnRegInternship'])){
          $_POST['companyid'] = $_SESSION['sessid'];
          $_POST['cate'] = 'register';
          $resp = curlPostRequest('companyInternship.php',$_POST);
            $respArr = json_decode($resp,TRUE);
            echo $respArr['message'];
        }
        ?>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Department name</label>
                <input type="text" name="department" class="form-control" id="department""/>
              </div>
              <div class="form-group col-md-6">
                <label for="lname">Description</label>
                <textarea class="form-control" name="description" rows="3" data-rule="required"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="start">Internship Start</label>
                <input type="date" name="start" class="form-control" id="start"/>
              </div>
              <div class="form-group col-md-6">
                <label for="end">Internship End</label>
                <input type="date" class="form-control" name="end" id="end" />
              </div>
            </div>
              <div class="form-row">
              <div class="form-group col-md-6">
                <label for="needed_number">Needed Number</label>
                <input type="number" name="position" class="form-control" id="position" placeholder="Enter number of needed"/>
              </div>
              <div class="form-group col-md-6">
                <label for="application_limit">Applicant Limit</label>
                <input type="number" name="application_limit" class="form-control" id="application_limit" placeholder="Enter total application needed"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="application_start">Application Start</label>
                <input type="date" name="application_start" class="form-control" id="application_start">
              </div>
              <div class="form-group col-md-6">
                <label for="application_end">Application End</label>
                <input type="date" name="application_end" class="form-control" id="application_end">
              </div>
            </div>
            <div class="form-group">
                <label for="eligibility">Eligibility</label>
                <textarea class="form-control" name="eligibility" rows="7"></textarea>
            </div>
            <div class="form-group"><center>
              <input type="submit" class="btn btn-primary" name="btnRegInternship" value="Register">
          <button type="reset" class="btn btn-warning">Reset</button>
        </center>
      </div>
          </form>
  </div>
    <!-- /.container -->
    <!--footer starts from here-->
    <footer class="container-fluid text-center">
      <div class="container bottom_border">
        <div class="container">
          <p class="copyright text-center" style="color: black;"><b>All Rights Reserved. &copy; 2020 Design By :<font color="blue" size="5"> Isaac and Didier</font></b></p>
        </div>
      </div>
  </footer>

</div>
    
<!-- Bootstrap core JavaScript -->
<script src="Bootstrap/jquery/jquery.min.js"></script>
<script src="Bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/filter.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>