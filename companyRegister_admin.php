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
    <nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
        <div class="container">
            <a class="navbar-brand" href="index.php">
				<img src="images/logo1.png" alt="logo" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index_admin.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link   active" href="companyRegister_admin.php">Register Company</a>
					</li>
					<li class="nav-item">
            <a class="nav-link" href="companyView_admin.php">View Company</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="signout.php">Sign Out</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>
	
     <!-- Page Content -->
 <div class="container"><br>
 	<center><br>
    <h3>Fill form below to Register new company</h3><br>
    </center>    
        <form action="signupcompany.php" method="post" class="contactForm" style="width: 900px;margin: auto;">
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Company Name"/>
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
                <input type="text" name="tin_number" class="form-control" id="tin_number" placeholder="Enter Company Tin Number"/>
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
              	<label for="gps_location">GPS Location</label>
                <input type="text" name="gps_location" class="form-control" id="gps_location" placeholder="Enter Company Web site"/>
              </div>
            </div>
            <div class="form-group">
              	<label for="logo">Uplad your Logo</label><br>
                <input type="File" name="logo" id="logo"/>
            </div>
            <div class="form-group"><center>
            	<input type="submit" class="btn btn-primary" name="Register" value="Register">
			  	<button type="reset" class="btn btn-warning">Reset</button>
          <a href="internship_admin.php" class="btn btn-primary" role="button">Add Department to exiting Company</a>
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