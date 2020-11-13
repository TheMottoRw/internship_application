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
						<a class="nav-link active" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="application.php">Application</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="company.php">Company</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign up <i class="fas fa-sort-down"></i></a>
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
	
    <header class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <!-- Slide One - Set the background image for this slide in the line below -->
               <div class="carousel-item active" style="background-image: url('images/Slide1.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>Welcome to Online Internship Application</h3>
                     <p>Get Interneship for Registed company located averywhere </p>
                  </div>
               </div>
               <!-- Slide Two - Set the background image for this slide in the line below -->
               <div class="carousel-item" style="background-image: url('images/Slide2.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>OIA</h3>
                     <p>Online internship Application</p>
                  </div>
               </div>
               <!-- Slide Three - Set the background image for this slide in the line below -->
               <div class="carousel-item" style="background-image: url('images/Slide3.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>OIA</h3>
                     <p>Save money for Transport and no geographical limitation for internship apply</p>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a>
        </div>
    </header>
	
    <!-- Page Content -->
    <div class="container">        
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
               <div class="col-lg-6">
                  <h2>Welcome to Online Internship Application</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
				  <h5>Our smart approach</h5>
                  <ul>
                     <li>Sed at tellus eu quam posuere mattis.</li>
                     <li>Phasellus quis erat et enim laoreet posuere ac porttitor ipsum.</li>
                     <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>                     
                  </ul>
               </div>
               <div class="col-lg-6">
                  <img class="img-fluid rounded" src="images/about-img.jpg" alt="" />
               </div>
            </div>
            <!-- /.row -->
        </div>
	</div>	
	
	<div class="services-bar">
		<div class="container">
			<h1 class="py-4">Our Company to Appy </h1>
			<!-- Company Section -->
<?php
$con=mysqli_connect("localhost","root","","internship");
$aa="select count(name) from company";
$bb=mysqli_query($con,$aa);
while($rows=mysqli_fetch_array($bb))
{
echo "<center><h3 style='color:blue;'>".$rows['count(name)']."  Company Available</h3><center>";
}
$a="select * from company order by company_id desc";
$b=mysqli_query($con,$a);
while($row=mysqli_fetch_array($b))
{
?>
			<div class="row">
			   	<table class="table">
			   		<tr><td>
					<div class="card h-100">
						<div class="card-img">
							<h5>load company images from db</h5>
							<img class="img-fluid" src="images/services-img-01.jpg" alt="" />
						</div>
						</td><td>	
						<div class="card-body">
							<h2 class="card-header"> 
								<?php
								 echo "".$row['name'].""; 
								 $name=$row['name'];
								?> 
							</h2>
							<p class="card-text">
								<?php
								 $z="select company.name,company.company_id,company_internship.Company_id,company_internship.internship_id,count(internship_id) from company,company_internship where company.Company_id=company_internship.Company_id and name='$name'";
								 $x=mysqli_query($con,$z);
								 while($rowss=mysqli_fetch_array($x))
								 {
									echo "<center><h3 style='color:blue;'>With ".$rowss['count(internship_id)']."  Department </h3><center>";
								 }
								?>
								<h4><u>Contact us</u></h4>
								<?php echo "<br><b>Phone Number:</b> ".$row['phone']."<br>"; ?>
								<?php echo "<br><b>Email:</b> ".$row['email']."<br>"; ?>
								<?php echo "<br><b>Web site:</b> ".$row['website']."<br>"; ?> 
							</p>
						</div>
						</td>
					</div>
					</tr>
			   </table>
			</div>
<?php
}
?>
			<!-- /.row -->
		</div>
	</div>
	<div class="blog-slide">
		<div class="container">
			<h2>Our Blog</h2>
			<div class="row">
				<div class="col-lg-12">
					<div id="blog-slider" class="owl-carousel">
						<div class="post-slide">
							<div class="post-header">
								<h4 class="title">
									<a href="#">Latest blog Post</a>
								</h4>
								<ul class="post-bar">
									<li><img src="images/testi_01.png" alt=""><a href="#">Williamson</a></li>
									<li><i class="fa fa-calendar"></i>02 June 2018</li>
								</ul>
							</div>
							<div class="pic">
								<img src="images/img-1.jpg" alt="">
								<ul class="post-category">
									<li><a href="#">Business</a></li>
									<li><a href="#">Financ</a></li>
								</ul>
							</div>
							<p class="post-description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida nulla eu massa efficitur, eu hendrerit ipsum efficitur. Morbi vitae velit ac.
							</p>
						</div>
		 
						<div class="post-slide">
							<div class="post-header">
								<h4 class="title">
									<a href="#">Latest blog Post</a>
								</h4>
								<ul class="post-bar">
									<li><img src="images/testi_02.png" alt=""><a href="#">Kristiana</a></li>
									<li><i class="fa fa-calendar"></i>05 June 2018</li>
								</ul>
							</div>
							<div class="pic">
								<img src="images/img-2.jpg" alt="">
								<ul class="post-category">
									<li><a href="#">Business</a></li>
									<li><a href="#">Financ</a></li>
								</ul>
							</div>
							<p class="post-description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida nulla eu massa efficitur, eu hendrerit ipsum efficitur. Morbi vitae velit ac.
							</p>
						</div>
						
						<div class="post-slide">
							<div class="post-header">
								<h4 class="title">
									<a href="#">Latest blog Post</a>
								</h4>
								<ul class="post-bar">
									<li><img src="images/testi_01.png" alt=""><a href="#">Kristiana</a></li>
									<li><i class="fa fa-calendar"></i>05 June 2018</li>
								</ul>
							</div>
							<div class="pic">
								<img src="images/img-3.jpg" alt="">
								<ul class="post-category">
									<li><a href="#">Business</a></li>
									<li><a href="#">Financ</a></li>
								</ul>
							</div>
							<p class="post-description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida nulla eu massa efficitur, eu hendrerit ipsum efficitur. Morbi vitae velit ac.
							</p>
						</div>
						
						<div class="post-slide">
							<div class="post-header">
								<h4 class="title">
									<a href="#">Latest blog Post</a>
								</h4>
								<ul class="post-bar">
									<li><img src="images/testi_02.png" alt=""><a href="#">Kristiana</a></li>
									<li><i class="fa fa-calendar"></i>05 June 2018</li>
								</ul>
							</div>
							<div class="pic">
								<img src="images/img-4.jpg" alt="">
								<ul class="post-category">
									<li><a href="#">Business</a></li>
									<li><a href="#">Financ</a></li>
								</ul>
							</div>
							<p class="post-description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida nulla eu massa efficitur, eu hendrerit ipsum efficitur. Morbi vitae velit ac.
							</p>
						</div>
					</div>
				</div>
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