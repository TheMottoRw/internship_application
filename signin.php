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
    <?php include_once "includes/landing_headers.php"; ?>
     <!-- Page Content -->
    <div class="container"><br><br>
    <center><h3>Enter credential to login</h3></center>    
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" style="width: 400px;margin: auto;">
		<?php
			if(isset($_POST['btnLogin'])){

				$_POST['cate'] = 'login';
				$res = curlPostRequest('users.php',$_POST);
				$resArr = json_decode($res,TRUE);
				if($resArr['status'] == 'ok'){
					//check category
					$_SESSION['sessid'] = $resArr['sessid'];
					$_SESSION['category'] = $resArr['category'];
					$_SESSION['name'] = $resArr['name'];
                    if ($resArr['category'] == 'company') header('location:company_internship.php');
                    elseif ($resArr['category'] == 'applicant'){
                        if(!isset($_GET['next'])) header("location:application_applicant.php");
                        else header("location:".str_replace('*','&',$_GET['next']));
                    }elseif($resArr['category'] == 'admin') header("location:companyView_admin.php");

				}else echo $resArr['message'];
			}
		?>
        	<div class="form-group">
        		<label for="email">Email/Phone</label>
      			<input type="text" name="email" id="email" class="form-control" placeholder="Enter your email or phone" required>      		
        	</div> 
        	<div class="form-group">
        		<label for="password">Password</label>
      			<input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">         		
        	</div>
        	<div class="form-group"><center>
				<input type="submit" class="btn btn-primary" name="btnLogin" value="Sign in">
				<button type="reset" class="btn btn-warning">Reset</button></center>
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