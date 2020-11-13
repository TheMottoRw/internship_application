<?php
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
    <?php include_once "includes/landing_headers.php";?>
	
     <!-- Page Content -->
    <div class="container"><br><br>
    <center><h3>Welcome Applicant ! <h3>
      <h5>Register now and get chance to Apply intership for any registed Company</h5><br></center>    
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="contactForm" style="width: 900px;margin: auto;">

              <?php //signup for applicant
               if(isset($_POST['btnRegApplicant'])){
                 $_POST['cate'] = 'register';
                $res = curlPostRequest('applicants.php',$_POST);
                if(is_numeric($res)) echo "<div class='alert alert-success'>Applicant registered success</div>";
                elseif(is_object($res)){
                    $respArr = json_decode($res,TRUE);
                    echo $respArr['message'];
                }
              }?>
            <div class="form-row">
                <div class="form-group col-md-6">
              	<label for="lname">First name</label>
                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Your first name" required='required'/>
              </div>
              <div class="form-group col-md-6">
              	<label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Your last name" required='required'/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required='required'/>
              </div>
              <div class="form-group col-md-6">
              	<label for="phone">Phone number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your phone Number" required='required'/>
              </div>
            </div>
              <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="gender">Gender</label>
                  <div class="radio">
                    <label><input type="radio" name="gender" value="Male" checked="checked">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="gender" value="Female">Female</label>
                  </div>
              </div>
              <div class="form-group col-md-6">
              	<label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required='required'/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="institution">Institution</label>
                <input type="text" name="institution" class="form-control" id="institution" placeholder="Enter your Institution/College" required='required'/>
              </div>
              <div class="form-group col-md-6">
              	<label for="level">Level</label>
                <input type="text" name="level" class="form-control" id="level" placeholder="Enter level" required='required'/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="faculty_department">Department</label>
                <input type="text" name="department" class="form-control" id="department" placeholder="Enter your Department" required='required'/>
              </div>
              <div class="form-group col-md-6">
                <label for="academic_year">Academic Year</label>
                <input type="text" name="academic_year" class="form-control" id="academic_year" placeholder="Enter Academic Year" required='required'/>
              </div>
            </div>
            <div class="form-group"><center>
            	<input type="submit" class="btn btn-primary" name="btnRegApplicant" value="Register">
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