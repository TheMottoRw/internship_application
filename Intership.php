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
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="application.php">Application</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="company.php">Company</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign up <i class="fas fa-sort-down"   active></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
							<a class="dropdown-item" href="signup_company.php">Company</a>
							<a class="dropdown-item" href="signup_applicant.php">Applicant</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="signin.php">Sign in</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>
	
     <!-- Page Content -->
    <div class="container"><br><br>
    <center><h3>Application ! <h3><br></center>    
        <form action="intershipaction.php" method="post" class="contactForm" style="width: 900px;margin: auto;">
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="name">Department name</label>
                <input type="text" name="name" class="form-control" id="name""/>
              </div>
              <div class="form-group col-md-6">
              	<label for="lname">Description</label>
                <textarea class="form-control" name="description" rows="3" data-rule="required"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="start">Internship Start</label>
                <input type="date" name="email" class="form-control" id="email"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="end">Internship End</label>
                <input type="date" class="form-control" name="end" id="end" />
              </div>
            </div>
              <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="needed_number">Needed Number</label>
                <input type="number" name="needed_number" class="form-control" id="needed_number" placeholder="Enter number of needed"/>
              </div>
              <div class="form-group col-md-6">
              	<label for="application_limit">Applicant Limit</label>
                <input type="number" name="application_limit" class="form-control" id="application_limit" placeholder="Enter total application needed"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              	<label for="application_start">Applocation Start</label>
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
            	<input type="submit" class="btn btn-primary" name="Register" value="Register">
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