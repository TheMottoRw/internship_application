<?php
session_start();
include_once "api/classes/Applications.php";
if(isset($_SESSION['sessid'])) include_once "api_access.php";
$objApp = new Applications();
//check & validation session
if(!isset($_SESSION['sessid'])) header("location:signin.php?next=applicationForm.php?internship=".$_GET['internship']."*company=".$_GET['company']);
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

    <?php if(isset($_SESSION['sessid'])) include_once "includes/applicant_headers.php";?>
	
     <!-- Page Content -->
    <div class="container"><br><br>
    <center><h3>Apply Now <h3><br></center>    
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" class="contactForm" style="width: 900px;margin: auto;">
        <?php if(isset($_POST['btnApply'])){
                    $_POST['internshipid'] = $_GET['internship'];
                    $_POST['companyid'] = $_GET['company'];
                    $postData = array_merge($_POST,$_FILES,$_SESSION);
                    $resp = $objApp->save($postData);
                    echo "<span class='col-md-6'>".$resp['message']."</span>";
                } ?>
            <div class="form-row">
              
              <div class="form-group col-md-6">
                <!--cooperative id , intership id and applicant id // selected for db-->
                <div class="form-group">
                  <label for="photo">Upload your Photo</label><br>
                    <img id="imgOutput" width="100"/><br>
                  <input type="file" name="photo"  onchange="imageLoaded(event)" id="photo" accept="image/*"/><br><br>
                </div>
                <div class="form-group">
                  <label for="application_letter">Upload Application Letter</label><br>
                  <input type="file" name="letter" id="application_letter" accept="application/pdf"/><br><br>
                </div>

              </div>
              <div class="form-group col-md-6">
              	
                <div class="form-group">
                  <label for="recommendation">Upload Recommendation Letter</label><br>
                  <input type="file" name="recommendation" id="recommendation" accept="application/pdf,.docx,.doc"/><br><br>
                </div>
                <div class="form-group">
                  <label for="transcript">Upload Transcript</label><br>
                  <input type="file" name="transcript" id="transcript" accept="image/*,.pdf"/><br><br>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="btnApply" value="Apply">
                  <button type="reset" class="btn btn-warning">Reset</button>
                  
                </div>
              </div>
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
<script src="api/js/jqdepend.js"></script>

</body>
</html>