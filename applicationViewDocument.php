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
						<a class="nav-link" href="index_company.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="company_internship.php">Company Internship</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="applicantView.php">View Applicant</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="signout.php">Sign Out</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>
	
     <!-- Page Content -->
    <div class="container">
    	<br><center><h3>Applicant's Documents</h3></center><br>
    	<div class="table-responsive"> 
<?php
$con=mysqli_connect("localhost","root","","internship");
$application_id=$_GET['application_id'];
$a="select application.application_id,application.application_letter,application.recomendation,application.transcript,application.photo,application.response,application.status,application.regdate from application where application.application_id='$application_id'";
$b=mysqli_query($con,$a);
echo "<center><table  class='table table-bordered' style='width:auto;'><tr><td><b>Documents Type</b></td><td><b>Documents</b></td><td><b>Action</b></td></tr>";
while($row=mysqli_fetch_array($b))
{
echo "<tr><td>Photo</td><td>".$row['photo']."(upload from db)</td>
<td><a href='#' class='btn btn-success' role='button'>Open</a></td><td><a href='#' class='btn btn-primary' role='button'>Download</a></td>
<tr><td>Recomendation Letter</td><td>".$row['recomendation']."(upload from db)</td>
<td><a href='#' class='btn btn-success' role='button'>Open</a></td><td><a href='#' class='btn btn-primary' role='button'>Download</a></td></tr>
<tr><td>Application Letter</td><td>".$row['application_letter']."(upload from db)</td>
<td><a href='#' class='btn btn-success' role='button'>Open</a></td><td><a href='#' class='btn btn-primary' role='button'>Download</a></td></tr>
<tr><td>Transcript</td><td>".$row['transcript']."(upload from db)</td>
<td><a href='#' class='btn btn-success' role='button'>Open</a></td><td><a href='#' class='btn btn-primary' role='button'>Download</a></td></tr>";
}
echo "</table>";
echo "<a href='applicantView.php' class='btn btn-warning' role='button'>Back</a></center>";
?>
    </div>
			</div>
          
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