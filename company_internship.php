<?php
session_start();
include_once "api_access.php";

$res = curlGetRequest('companyInternship.php?cate=load&companyid='.$_SESSION['sessid']);
$resArr = json_decode($res,TRUE);
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
      <center><br><a href="companyRegister_internship.php" class="btn btn-primary" role="button">Add new Internship</a><br><br><br>
        <div class="table" style='margin-left:-40%'> 
        <table  class='table table-bordered'><tr class='danger'><td><b>Department Name</b></td><td><b>Description</b></td><td><b>Eligiblity</b></td><td><b>Needed Number</b></td><td><b>Applicant limit</b></td><td><b>Intership Start</b></td><td><b>Intership End</b></td><td><b>Application Start</b></td><td><b>Application End</b></td><td><b>Status</b></td><td><b>Registration Date</b></td><td colspan='3'><b>Action</td></tr>
<?php

foreach($resArr as $row)
{

echo "<tr><td>".$row['department_name']."</td><td>".$row['description']."</td><td>".$row['eligibility']."</td><td>".$row['needed_number']."</td><td>".$row['application_limit']."</td><td>".$row['start']."</td><td>".$row['end']."</td><td>".$row['application_start']."</td><td>".$row['application_end']."</td><td>".$row['status']."</td><td>".$row['regdate']."</td><td><a href='applicantView.php?internship=".$row['internship_id']."' class='btn btn-info' role='button'>Applicants</a></td><td><a href='companyUpdate_internship.php?id=".$row['internship_id']."' class='btn btn-warning' role='button'>Edit</a></td><td><a href='api/requests/companyInternship.php?cate=status&id=" . $row['internship_id'] . "&status=deleted' class='btn btn-primary' role='button'>Delete</a></td></tr>";
}
?>
</table></center>
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