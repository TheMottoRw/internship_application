<?php
session_start();
include_once "api_access.php";
$res = curlGetRequest('applications.php?cate=loadbyapplicant&applicantid=' . $_SESSION['sessid']);
$resArr = json_decode($res, TRUE);
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
<?php include_once "includes/applicant_headers.php"?>
	
     <!-- Page Content -->
    <div class="container">
    	<br>
      <center><h1>Feedback</h1></center>
			<br>
        <div class="table-responsive">
            <table class='table table-bordered' style='width:auto;'>
                <tr>
                    <th>Company Names</th>
                    <th>Company Phone</th>
                    <th>Company Email</th>
                    <th>Internship</th>
                    <th>Department</th>
                    <th>To be done</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Reg. date</th>
                </tr>
                <?php
                $rows = '';
                foreach ($resArr as $row) {

                    $rows.="<tr>"
                        ."<td>" . $row['cmp_name'] . "</td>"
                        ."<td>" . $row['phone'] . "</td><td>" . $row['email'] . "</td>"
                        ."<td>" . $row['description'] . "</td><td>" . $row['department_name'] . "</td>"
                        ."<td>" . $row['done_on'] . "</td><td>" . $row['application_date'] . "</td>"
                        ."<td><span class='btn btn-".($row['status']!='pending'?($row['status']=='approved'?'success':'danger'):'')."'>" . $row['status'] . "</span></td>"
                        ."<td>" . $row['regdate'] . "</td>"
                        ."</tr>";
                }
                echo $rows;
                ?>
            </table>
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