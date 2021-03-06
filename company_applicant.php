<?php
session_start();
include_once "api_access.php";
$data = curlGetRequest('company.php?cate=loadbystatus&status=approved');
$apiCompany = json_decode($data,TRUE);
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
        <!-- About Section -->
        <br><center><h3>Company Detail</h3></center><br>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Tin</th>
                <th>Address</th>
                <th>Website</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($apiCompany as $index=>$obj){
                ?>
                <tr>
                    <th><?= $index+1;?></th>
                    <th><?= $obj['name'];?></th>
                    <th><?php if(file_exists("api/uploaded/profiles/".$obj['photo'])) {?><img src="api/uploaded/profiles/<?= $obj['photo'];?>" height=100 width=100/><?php } ?></th>
                    <th><?= $obj['phone'];?></th>
                    <th><?= $obj['email'];?></th>
                    <th><?= $obj['tin'];?></th>
                    <th><?= $obj['address'];?></th>
                    <th><a href='http://<?= $obj['website'];?>'  target='_blank' class='btn btn-default'>Visit web</a></th>
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