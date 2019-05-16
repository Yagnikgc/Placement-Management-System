<?php
session_start();
ob_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       	<title>Admin | Selection</title>
        <link rel="shortcut icon" href="../images/bmiitlogo.png" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="assets/css/demo.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="mainhome_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="mainhome_assets/css/sight.css">
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.1" rel="stylesheet"/>
    </head>
    <body>
        <section >
            <div class="sight">
                <center>
                    <img src="mainhome_assets/images/BMIIT LOGO.png" alt="BMIIT LOGO" width="100">
                </center>
                <h1 class="title black_col">
                    BABU MADHAV INSTITUTE OF INFORMATION TECHNOLOGY
                </h1>
                <p class="subtitle black_col">
                    MAKE IT HAPPEN THROUGH INOVATION AND VALUES
                </p>
            </div>
        </section> <!-- /.section-background -->
        <section class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pages">
                                    <h2 class="page-title">
                                        Project <i class="fa fa-laptop dpink_col"></i>
                                    </h2>
                                    <a href="../UnderDevelopment.php">
                                        <img src="mainhome_assets/images/project.png" alt="page" class="page-img img-responsive">	
                                    </a>
                                </div>
                            </div> <!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="pages">
                                    <h2 class="page-title">
                                        Placements <i class="fa fa-graduation-cap dpink_col"></i>
                                    </h2>
                                    <a href="mainhome.php">
                                        <img src="mainhome_assets/images/Placement.png" alt="page" class="page-img img-responsive">
                                    </a>
                                </div>
                            </div> <!-- /.col-md-6 -->
                        </div> <!-- .row -->
                    </div> <!-- /.col-md-10 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section> <!-- /.main -->

        <footer>
            <p class="copy">
                Developed and Managed with <i class="fa fa-heart red_col"></i> by <a href="#"><b>MY Solutions</b></a>
            </p>
        </footer>
        <div class="fixed-plugin" title="Log out">
            <div class="dropdown">
                <a href="../index.php" >
                    <i class="fa fa-power-off blue_col fa-3x logout_button" ></i>
                </a>
            </div>
        </div>

        <script src="mainhome_assets/js/jquery-1.11.2.min.js"></script>
        <script src="mainhome_assets/js/bootstrap.min.js"></script>
        <?php
// put your code here
        ?>
    </body>
</html>
