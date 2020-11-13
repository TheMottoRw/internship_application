<?php
session_start();
include_once "api_access.php";

$data = curlGetRequest('companyInternship.php?cate=active');
$apiInternship = json_decode($data,TRUE);
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
    <?php include_once "includes/applicant_headers.php";?>
     <!-- Page Content -->
    <div class="container"><center><br>
      <br><h3>Available Intership</h3><br>
	  <?php
	  		if(count($apiInternship) == 0){
				  ?>
				  <div class='jumbotron'>
					<h4>No internship application available,please try again after sometime</h4>
				  </div>
				  <?php
			  }
				foreach($apiInternship as $index=>$obj){
			?>
			<div id='view_application' class='jumbotron' style='padding:2%;width:80%'>
					<h4><?= $obj['needed_number'];?> Internship offer at <?= $obj['company_name'];?></h4>
<!--					<table class=''>-->
<!--						<tr>-->
<!--							<td><b>Department</b></td>-->
<!--							<td>--><?//= $obj['department_name'];?><!--</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td><b>Description</b></td>-->
<!--							<td>--><?//= $obj['description'];?><!--</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td><b>Available</b></td>-->
<!--							<td>--><?//= $obj['needed_number'];?><!-- Internship</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td><b>Internship</b></td>-->
<!--							<td>Start on --><?//= $obj['start'];?><!-- end on --><?//= $obj['end'];?><!--</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td><b>Application</b></td>-->
<!--							<td>Start on --><?//= $obj['application_start'];?><!-- end on --><?//= $obj['application_end'];?><!--</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--						<tr style='cell-spacing:10px;'>-->
<!--							<td><b>Eligibility</b></td>-->
<!--							<td>--><?//= $obj['eligibility'];?><!--</td>-->
<!--						</tr>-->
<!--						<tr>-->
<!--							<td colspan=2 style='text-align:right'> <a href='applicationForm.php?cate=apply&internship=--><?//= $obj["internship_id"];?><!--&company=--><?//= $obj["company_id"];?><!--' target="_blank" class='btn btn-success pull-right'>Apply</a></td>-->
<!--						</tr>-->
<!--						<tr style='cell-spacing:10px;'>-->
<!--							<td><i>For more contact <b> --><?//= $obj['company_email'];?><!--</b></td>-->
<!--							<td>Or visit <a href='http://--><?//= $obj['website'];?><!--' target='_blank' class='btn btn-default'>website</a></td>-->
<!--						</tr>-->
<!--					</table>-->
                <table class=''>
                    <tr>
                        <td><b>Department</b></td>
                        <td><?= $obj['department_name'];?></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td><?= $obj['description'];?></td>
                    </tr>
                    <tr>
                        <td><b>Available</b></td>
                        <td><?= $obj['needed_number'];?> Internship</td>
                    </tr>
                    <tr>
                        <td><b>Applicant Limit</b></td>
                        <td>Limit <?= $obj['application_limit'];?> <font color="#cd5c5c"> Remain <?= $obj['remain']==null?$obj['application_limit']:$obj['remain']; ?></font></td>
                    </tr>
                    <tr>
                        <td><b>Internship</b></td>
                        <td>Start on <?= $obj['start'];?> end on <?= $obj['end'];?></td>
                    </tr>
                    <tr>
                        <td><b>Application</b></td>
                        <td>Start on <?= $obj['application_start'];?> end on <?= $obj['application_end'];?></td>
                    </tr>
                    <tr>
                    <tr style='cell-spacing:10px;'>
                        <td><b>Eligibility</b></td>
                        <td><?= $obj['eligibility'];?></td>
                    </tr>
                    <tr>
                        <td colspan=2 style='text-align:right'> <?php if($obj['remain']==null || $obj['remain']>0){?><a href='applicationForm.php?cate=apply&internship=<?= $obj["internship_id"];?>&company=<?= $obj['company_id']; ?>' target="_blank" class='btn btn-success pull-right'>Apply</a><?php } ?></td>
                    </tr>
                    <tr style='cell-spacing:10px;'>
                        <td><i>For more contact <b> <?= $obj['company_email'];?></b></td>
                        <td>Or visit <a href='http://<?= $obj['website'];?>' target='_blank' class='btn btn-default'>website</a></td>
                    </tr>
                </table>

            </div>
	  <?php } ?>

	  <div class='table-responsive'>
	  <table class='table table-bordered' style='display:none'><!-- tabural view when needed -->
			<thead>
				<tr>
					<th>No</th>
					<th>Company</th>
					<th>Email</th>
					<th>Department</th>
					<th>Internee number</th>
					<th>Description</th>
					<th>Application start</th>
					<th>Application deadline</th>
					<th>Eligibility</th>
					<th>Applicant limit</th>
					<th>Internship start</th>
					<th>Internship end</th>
					<th>Website</th>
					<th>Apply</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($apiInternship as $index=>$obj){
			?>
				<tr>
					<th><?= $index+1;?></th>
					<th><?= $obj['company_name'];?></th>
					<th><?= $obj['company_email'];?></th>
					<th><?= $obj['department_name'];?></th>
					<th><?= $obj['needed_number'];?></th>
					<th><?= $obj['description'];?></th>
					<th><?= $obj['application_start'];?></th>
					<th><?= $obj['application_end'];?></th>
					<th><?= $obj['eligibility'];?></th>
					<th><?= $obj['application_limit'];?></th>
					<th><?= $obj['start'];?></th>
					<th><?= $obj['end'];?></th>
					<th><a href='http://<?= $obj['website'];?>' class='btn btn-primary'>Visit web</a></th>
					<th><a href='#<?= $obj['internship_id'];?>' class='btn btn-success'>Apply</a></th>
				</tr>
			<?php } ?>
			
			</tbody>
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