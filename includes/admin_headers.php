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
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link  active" href="index_admin.php">Home</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="companyRegister_admin.php">Register Company</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="companyView_admin.php">View Company</a>-->
<!--                </li>-->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View company<i class="fas fa-sort-down"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="companyView_admin.php?status=approved">Approved</a>
                        <a class="dropdown-item" href="companyView_admin.php?status=pending">Pending</a>
                        <a class="dropdown-item" href="companyView_admin.php?status=rejected">Rejected</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">Sign Out(<?= $_SESSION['name'];?>)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php validateSession('admin'); ?>