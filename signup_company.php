<?php
include_once "api_access.php";
include_once "api/classes/Company.php";
$companyObj = new Company;
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
   <?php include_once "includes/landing_headers.php";?>
	
     <!-- Page Content -->
    <div class="container"><br><br>
    <center><h3>Fill form below to Register your company</h3><br></center>    
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" class="contactForm" style="width: 900px;margin: auto;">
        <?php
          if(isset($_POST['btnRegCompany'])){
            $_POST['cate'] = 'register';
            $postData = array_merge($_POST,$_FILES);
            $res = $companyObj->save($postData);
//            echo json_encode($res);
            if($res['status'] == 'ok') echo "<font color='green'>Company account created successful </font>";
            else echo $res['message'];
          }
          ?>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="name">Name</label>
                <input type="text" name="names" class="form-control" id="names" placeholder="Enter Company Name"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="phone">Phone number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter company phone"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Company Email"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="adress">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Company Address"/>
              </div>
            </div>
              <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="tin_number">Tin Number</label>
                <input type="text" name="tin" class="form-control" id="tin" placeholder="Enter Company Tin Number"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="website">Web Site</label>
                <input type="text" name="website" class="form-control" id="website" placeholder="Enter Company Web site"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="location">GPS Location</label>
                <input type="text" name="location" class="form-control" id="location" placeholder="GPS Location"/>
              </div>
            </div>
            <div class="form-group">
              	<label for="logo">Upload your Logo</label><br>
                <img id="imgOutput" width="100"/><br>
                <input type="file" name="photo" id="photo" accept="image/*" onchange="imageLoaded(event)"/>
            </div>
            <div class="form-group"><center>
            	<input type="submit" class="btn btn-primary" name="btnRegCompany" value="Register">
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
<script src="api/js/jqdepend.js"></script>

</body>
</html>