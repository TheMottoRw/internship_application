<?php
session_start();
include_once "api_access.php";
$res = curlGetRequest('applications.php?cate=load&companyid=' . $_SESSION['sessid'] . "&internshipid=" . $_GET['internship']);
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
        <!
        <link href="css/jquery.fancybox.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
    </head>
<body>
<div class="wrapper-main">
    <!-- Navigation -->
    <?php include_once "includes/company_headers.php"; ?>

    <!-- Page Content -->
    <div class="container">
        <br>
        <center><h5>Applicant for Internship  <?php echo count($resArr)>0?'of <b>'.$resArr[0]['description']." in department of ".$resArr[0]['department_name'].'</b>':''; ?></h5></center>
        <br>
        <div class="table-responsive">
            <table class='table table-bordered' style='width:auto;'>
                <tr>
                    <th>Names</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Institution</th>
                    <th>Level</th>
                    <th>Department</th>
                    <th>Ac. year</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th colspan='3'>Action</th>
                </tr>
                <?php
                $rows = '';
                foreach ($resArr as $row) {

                    $rows.="<tr>"
                                ."<td>" . $row['fname'] . " " . $row['lname'] . "</td>"
                                ."<td>" . $row['phone'] . "</td><td>" . $row['email'] . "</td>"
                                ."<td>" . $row['gender'] . "</td><td>" . $row['institution'] . "</td>"
                                ."<td>" . $row['level'] . "</td><td>" . $row['faculty_dept'] . "</td>"
                                ."<td>" . $row['academic_year'] . "</td><td>" . $row['regdate'] . "</td>"
                                ."<td><span class='btn btn-".($row['status']!='pending'?($row['status']=='approved'?'success':'danger'):'')."'>" . $row['status'] . "</span></td>"
                                ."<td>
                                        <a href='api/uploaded/profiles/" . $row['photo'] . "' target='_blank' role='button'>Profile</a>
                                        <a href='api/uploaded/applications/" . $row['application_letter'] . "' target='_blank' role='button'>Letter</a>
                                        <a href='api/uploaded/applications/" . $row['recommendation'] . "' target='_blank'  role='button'>Recommendation</a>
                                        <a href='api/uploaded/applications/" . $row['transcript'] . "' target='_blank'  role='button'>Transcript</a>
                                        
                                        </td>"
                                ."<td><a href='api/requests/applications.php?cate=status&id=" . $row['application_id'] . "&status=approved&response=approved' class='btn btn-success' role='button'>Approve</a></td>"
                                ."<td><a href='api/requests/applications.php?cate=status&id=" . $row['application_id'] . "&status=rejected&response=rejected' class='btn btn-warning' role='button'>Reject</a></td></tr>";
                }
                echo $rows;
                ?>
            </table>
        </div>
    </div>

</div>
<!-- /.container -->
<!--footer starts from here-->
<footer class="container-fluid text-center">
    <div class="container bottom_border">
        <div class="container">
            <p class="copyright text-center" style="color: black;"><b>All Rights Reserved. &copy; 2020 Design By :<font
                            color="blue" size="5"> Isaac and Didier</font></b></p>
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