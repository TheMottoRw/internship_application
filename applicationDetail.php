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
						<a class="nav-link active" href="application.php">Application</a>
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
    <div class="container"><center><br>
      <br><h3>Application Detail</h3><br>
<?php
$company_internshipid=$_GET['company_internshipid'];
$con=mysqli_connect("localhost","root","","internship");
$a="select company.company_id,company.name,company.photo,company.phone,company.email,company.address,company.gps_location,company.tin_number,company.password,company.website,company.status,company.regdate,company_internship.internship_id,company_internship.department_name,company_internship.description,company_internship.eligibility,company_internship.start,company_internship.end,company_internship.needed_number,company_internship.application_start,company_internship.application_end,application_limit,company_internship.company_id,company_internship.status,company_internship.regdate from company,company_internship where company.company_id=company_internship.company_id and company_internship.internship_id='$company_internshipid'";
$b=mysqli_query($con,$a);
?>

<?php

echo "<table  class='table' border='1' style='width:1100px;'>";
echo "<tr><td colspan='2'><h4>Company Detail</h4></th></td><td colspan='2'><h4>Intership Detail</h4></td>	</tr>";
while($row=mysqli_fetch_array($b))
{

echo "<tr><td><b>Company Name</b></td><td>".$row['name']."</td><td><b>Internship name</b></td><td>".$row['department_name']."</td></tr>

	<tr><td><b>Phone Number</b></td><td>".$row['phone']."</td><td><b>Internship description</b></td><td>".$row['description']."</td></tr>

	<tr><td><b>Company Email</b></td><td>".$row['email']."</td><td><b>Eligibility</b></td><td width='300px'>".$row['eligibility']."</td></tr>

	<tr><td></td><td></td><td><b>Needed Number</b></td><td>".$row['needed_number']."</td></tr>

	<tr><td><b>Website</b></td><td>".$row['website']."</td><td><b>Internship status</b></td><td width='300px'>".$row['status']."</td></tr>

	<tr><td></td><td></td><td colspan='2'><b>Internship Start</b> ".$row['start']."<b>  up to  </b> ".$row['end']."</td></tr>

	<tr><td></td><td></td><td colspan='2'><b>Application Start </b>".$row['application_start']." <b>  up to  </b> ".$row['application_end']."</td></tr>

	
	";
}
echo "</table></center>";
echo "<center><a href='signin1.php' class='btn btn-primary' role='button'>Apply Now</a></center>";
?>
		
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