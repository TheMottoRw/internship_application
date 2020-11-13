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
                    <a class="nav-link" href="index_applicant.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="application_applicant.php">Application</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="company_applicant.php">Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feed back</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signout.php">Sign Out (<?= $_SESSION['name'];?>)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
validateSession("applicant");

?>