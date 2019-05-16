<?php
$con = new mysqli("localhost", "root", "", "db_pms");
if ($con) {
    $q = $con->prepare("select count(*) as num_data from tbl_company_data");
    $q->execute();
    $r = $q->get_result();
    $num_of_comp = $r->fetch_assoc();

    $q = $con->prepare("select count(*) as num_data from tbl_technology");
    $q->execute();
    $r = $q->get_result();
    $num_of_tech = $r->fetch_assoc();
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
        <title>Admin | Home</title>
        <link rel="shortcut icon" href="../images/bmiitlogo.png" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="home_assets/css/animate.css">
        <link rel="stylesheet" href="home_assets/css/icomoon.css">
        <link rel="stylesheet" href="home_assets/css/bootstrap.css">
        <link rel="stylesheet" href="home_assets/css/style.css">
        <!-- bootstrap js overe -->
        <link href="verticalslider_assets/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="home_assets/js/modernizr-2.6.2.min.js"></script>
    </head>
    <body >
        <?php include './header.php'; ?>
        <div class="container-fluid">
            <div id="fh5co-timeline">
                <div class="col-md-12 col-md-offset-0" >
                    <ul class="timeline animate-box">
                        <li class="timeline-heading text-center animate-box">
                            <div><h3>Our Progress&nbsp;<i class="gray_col fa fa-bar-chart"></i></h3></div>
                        </li>
                        <li class="animate-box timeline-unverted">
                            <div class="timeline-badge"><i class="dpink_col fa fa-desktop"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title">Getting you out of BOX &nbsp;<i class="dpink_col fa fa-inbox"></i></h3>
                                </div>
                                <div class="timeline-body">
                                    <p>Driving you out of box<br>Un-boxing your skills and knowledge</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted animate-box">
                            <div class="timeline-badge"><i class="dpink_col fa fa-eyedropper"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title">Creating a Creator&nbsp;<i class="dpink_col fa fa-edit"></i></h3>
                                </div>
                                <div class="timeline-body">
                                    <p>We Belive in creating a creator<br>Students working on <b><?php echo $num_of_tech['num_data']; ?>+</b> technologies</p>
                                </div>
                            </div>
                        </li>
                        <li class="animate-box timeline-unverted">
                            <div class="timeline-badge"><i class="dpink_col fa fa-graduation-cap"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title"><b><?php echo $num_of_comp['num_data']; ?>+</b> companies &nbsp;<i class="dpink_col fa fa-briefcase"></i></h3>
                                </div>
                                <div class="timeline-body">
                                    <p>Having trust of more than <b><?php echo $num_of_comp['num_data']; ?></b> companies...<br>Had placements of 200+ students,under Varying Technologies</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <script src="home_assets/js/jquery.waypoints.min.js"></script>
            <!-- Waypoints -->
            <!-- Flexslider -->
            <script src="home_assets/js/jquery.flexslider-min.js"></script>
            <!-- Main -->
            <script src="home_assets/js/main.js"></script>
            <?php // include './stat1.html';  ?>
        </div>
        <?php
        include 'footer.php';
        ?>
        <script src="verticalslider_assets/js/index.js" type="text/javascript"></script>
    </body>
</html>