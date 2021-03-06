<?php
if (!isset($_SESSION)) {
    session_start();
}
ob_start();
if (isset($_SESSION['comp_id'])) {
    $con = new mysqli("localhost", "root", "", "db_pms");
    $q = $con->prepare("select * from tbl_company_data where comp_id=?");
    $param = "active";
    $q->bind_param("s", $_SESSION['comp_id']);
    $q->execute();
    $k = $q->get_result();
    $data = $k->fetch_assoc();
} else {
    header("Location:../index.php");
}
if ($data['comp_status'] != "Approved") {
    include './verifying.html';
    die();
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
       	<meta charset="utf-8" />
        <link rel="icon" type="" href="admincontactassets/images/bmiitlogo.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Company | Edit Profile</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Canonical SEO -->


        <link rel="canonical" href="/product/light-bootstrap-dashboard-pro"/>

        <!--  Social tags      -->
        <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap dashboard, bootstrap, css3 dashboard, bootstrap admin, light bootstrap dashboard, frontend, responsive bootstrap dashboard">

        <meta name="description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Light Bootstrap Dashboard PRO by Creative Tim">
        <meta itemprop="description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">

        <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
        <!-- Twitter Card data -->

        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@creativetim">


        <meta name="twitter:description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">

        <meta name="twitter:label1" content="Product Type">
        <meta name="twitter:data2" content="$29">
        <meta name="twitter:label2" content="Price">

        <!-- Open Graph data -->

        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html" />
        <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg"/>
        <meta property="og:description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful." />
        <meta property="og:site_name" content="Creative Tim" />

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Dashboard core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.1" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--modal links-->
        <link href="modalassets/index.css" rel="stylesheet" type="text/css"/>
        <!--modal link over-->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    </head>
    <body class="">
        <img src="../images/infinity_loop_-_logo.gif" style="position: absolute;width: 100%;height: 100%" id="loader">
        <script>
            $(document).ready(function () {
                $("#loader").hide();
                $("#main").show();
            });
        </script>    
        <div id="main" style="display: none;">

            <!--MODEL OVER-->
            <div class="wrapper">
                <div class="sidebar" data-image="assets/img/full-screen-image-3.jpg">
                    <!--
            
                        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                        Tip 2: you can also add an image using data-image tag
            
                    -->

                    <div class="logo">                    
                        <a  class="simple-text logo-mini" href="index.php">
                            <i class="fa fa-home dpink_col" style="font-size: 25px" ></i>
                        </a>

                        <a class="simple-text logo-normal " href="index.php">
                            Home
                        </a>
                    </div>

                    <div class="sidebar-wrapper">
                        <div class="user">
                            <div class="info">
                                <div class="photo">
                                    <img src="../images/Company_Images/<?php echo $data['comp_logo']; ?>" />
                                </div>

                                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                                    <span class="white_col">
                                        <?php echo $data['company_name']; ?>
                                        <b class="caret"></b>
                                    </span>
                                </a>

                                <div class="collapse" id="collapseExample">
                                    <ul class="nav">


                                        <li>
                                            <a href="index_1.php " id="editprofile">
                                                <span class="sidebar-mini pink_col bld">EP</span>
                                                <span class="sidebar-normal white_col">Edit Profile</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <ul class="nav">
                            <li>
                                <a href="announceplacement.php">
                                    <i class="fa fa-briefcase dpink_col"></i>
                                    <p class="pink_col">Announce Placement</p>
                                </a>

                            </li>
                            <li>
                                <a href="reports.php">
                                    <i class="fa fa-graduation-cap dpink_col"></i>
                                    <p class="pink_col">applied Student list</p>
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-graduation-cap dpink_col"></i>
                                    <p class="pink_col">Placements & Rounds</p>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="main-panel">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-minimize">
                                <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon ">
                                    <i class="fa fa-ellipsis-v visible-on-sidebar-regular gray_col"></i>
                                    <i class="fa fa-navicon visible-on-sidebar-mini gray_col"></i>
                                </button>
                            </div>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle blue_col" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>
                            <div class="collapse navbar-collapse">

                                <form class="navbar-form navbar-left navbar-search-form" role="search">
                                    <div class="input-group">
                                          <!--<span class="input-group-addon "><i class="fa fa-search blue_col"></i></span>
                                      <input type="text" id="searchBar" name="searchBar" value="" class="form-control" placeholder="Search...">-->
                                    </div>
                                </form>

                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bell-o"></i>
                                            <span class="notification">5</span>
                                            <p class="hidden-md hidden-lg">
                                                Notifications
                                                <b class="caret"></b>
                                            </p>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Notification 1</a></li>
                                            <li><a href="#">Notification 2</a></li>
                                            <li><a href="#">Notification 3</a></li>
                                            <li><a href="#">Notification 4</a></li>
                                            <li><a href="#">Another notification</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    </body>

                    <!--   Core JS Files  -->
                    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
                    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
                    <script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>



                    <!--  Forms Validations Plugin -->
                    <script src="assets/js/jquery.validate.min.js"></script>

                    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
                    <script src="assets/js/moment.min.js"></script>

                    <!--  Date Time Picker Plugin is included in this js file -->
                    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

                    <!--  Select Picker Plugin -->
                    <script src="assets/js/bootstrap-selectpicker.js"></script>

                    <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
                    <script src="assets/js/bootstrap-switch-tags.min.js"></script>

                    <!--  Charts Plugin -->
                    <script src="assets/js/chartist.min.js"></script>

                    <!--  Notifications Plugin    -->
                    <script src="assets/js/bootstrap-notify.js"></script>

                    <!-- Sweet Alert 2 plugin -->
                    <script src="assets/js/sweetalert2.js"></script>

                    <!-- Vector Map plugin -->
                    <script src="assets/js/jquery-jvectormap.js"></script>

                    <!--  Google Maps Plugin    -->
                    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAs7jfgdjycxSiEuTEFihYlhC5dkAQZuFE"></script>

                    <!-- Wizard Plugin    -->
                    <script src="assets/js/jquery.bootstrap.wizard.min.js"></script>

                    <!--  Bootstrap Table Plugin    -->
                    <script src="assets/js/bootstrap-table.js"></script>

                    <!--  Plugin for DataTables.net  -->
                    <script src="assets/js/jquery.datatables.js"></script>


                    <!--  Full Calendar Plugin    -->
                    <script src="assets/js/fullcalendar.min.js"></script>

                    <!-- Light Bootstrap Dashboard Core javascript and methods -->
                    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.1"></script>

                    <!--   Sharrre Library    -->
                    <script src="assets/js/jquery.sharrre.js"></script>

                    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
                    <script src="assets/js/demo.js"></script>

                    </html>