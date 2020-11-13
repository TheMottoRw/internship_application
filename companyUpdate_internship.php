<?php
session_start();
include_once "api_access.php";
//run fetch internship to update
$department = '';
$description = '';
$eligibility = '';
$start = '';
$end = '';
$neededNumber = '';
$applicationStart = '';
$applicationEnd = '';
$applicationLimit = '';
$resp = json_decode(curlGetRequest('companyInternship.php?cate=loadbyid&id='.$_GET['id']),TRUE);
if(count($resp) == 0) echo "<div class='jumbotron'>No internship found with passed id</div>";
else{
    $department = $resp[0]['department_name'];
    $description = $resp[0]['description'];
    $eligibility = $resp[0]['eligibility'];
    $start = $resp[0]['start'];
    $end = $resp[0]['end'];
    $neededNumber = $resp[0]['needed_number'];
    $applicationStart = $resp[0]['application_start'];
    $applicationEnd = $resp[0]['application_end'];
    $applicationLimit = $resp[0]['application_limit'];
}

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
        <br><br>
        <center><h3>Update Intership</h3>
            <br></center>
        <form action="" method="POST" class="contactForm" style="width: 900px;margin: auto;">
            <?php
            if(isset($_POST['btnUpdInternship'])){
                $_POST['companyid'] = $_SESSION['sessid'];
                $_POST['id'] = $_GET['id'];
                $_POST['cate'] = 'update';
                // echo json_encode($_POST);exit;
                $resp = json_decode(curlPostRequest('companyInternship.php',$_POST),TRUE);
                echo $resp['message'];
            }
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department">Department name</label>
                    <input type="text" name="department" class="form-control" id="department" value="<?= $department;?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" data-rule="required"> <?= $description;?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start">Internship Start</label>
                    <input type="date" name="start" class="form-control" id="start"  value="<?= $start;?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="end">Internship End</label>
                    <input type="date" class="form-control" name="end" id="end"  value="<?= $end;?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="needed_number">Needed Number</label>
                    <input type="number" name="position" class="form-control" id="position" placeholder="Enter number of needed"  value="<?= $neededNumber;?>"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="application_limit">Applicant Limit</label>
                    <input type="number" name="application_limit" class="form-control" id="application_limit" placeholder="Enter total application needed"  value="<?= $applicationLimit;?>"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="application_start">Application Start</label>
                    <input type="date" name="application_start" class="form-control" id="application_start"  value="<?= $applicationStart;?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="application_end">Application End</label>
                    <input type="date" name="application_end" class="form-control" id="application_end"  value="<?= $applicationEnd;?>">
                </div>
            </div>
            <div class="form-group">
                <label for="eligibility">Eligibility</label>
                <textarea class="form-control" name="eligibility" rows="7"><?= $eligibility;?></textarea>
            </div>
            <div class="form-group"><center>
                    <input type="submit" class="btn btn-primary" name="btnUpdInternship" value="Update">
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