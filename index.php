<?php
$con = new mysqli("localhost", "root", "", "db_pms");
if ($con) {
    $q = $con->prepare("select count(*) as num_data from tbl_company_data");
    $q->execute();
    $r = $q->get_result();
    $num_of_comp = $r->fetch_array();

    $q = $con->prepare("select count(*) as num_data from tbl_technology");
    $q->execute();
    $r = $q->get_result();
    $num_of_tech = $r->fetch_array();
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Home | Placement Management system</title>
        <link rel="shortcut icon" href="bmiitlogo.png" type="image/x-icon" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style3.css" />
        <script type="text/javascript" src="assets/js/modernizr.custom.86080.js"></script>
    </head>
    <body id="page">
        <img src="images/infinity_loop_-_logo.gif" style="position: absolute;width: 100%;height: 100%" id="loader">
        <script>
            $(document).ready(function () {
                $("#loader").hide();
                $("#main").show();
            });
        </script>    
        <div id="main" style="display: none;">
            <ul class="cb-slideshow">
                <li><span></span><div><h3><?php echo $num_of_comp[0]; ?><sup>+</sup>·Com·panies</h3></div></li>
                <li><span></span><div><h3><?php echo $num_of_tech[0]; ?><sup>+</sup>·Tech·no·logies</h3></div></li>
                <li><span></span><div><h3>eti·qui·ttes</h3></div></li>
                <li><span></span><div><h3>dev·e·lop·ment</h3></div></li>
                <li><span></span><div><h3>team·work</h3></div></li>
                <li><span></span><div><h3>e·t·h·i·c·s</h3></div></li>
            </ul>
            <div class="container">
                <!-- Codrops top bar -->
                <p class="codrops-demos row" style="padding-top: 2%;background-color: ">
                <div class="col-sm-12" style="background-color: ">
                    <a href="login.php"><span class="btn_desig col-sm-6" >Login</span></a>&nbsp;&nbsp;
                    <a data-toggle="modal" style="cursor: pointer" data-target="#reg_opt_modal"><span class="btn_desig col-sm-6">Register</span></a>
                </div>
                </p>
                <header>
                    <center> <div style="padding-top: 0%;"><img src="images/bmiitlogo.png" alt="BMIIT PLACEMENT MANAGEMENT logo" width="190" /><h1><span style="letter-spacing: 2px;font-size: 2em;text-shadow: 4px 4px 4px black;color: #d83289">BMIIT</span></h1>
                            <h2 style="font-style: normal;font-size: 25px;letter-spacing: 2px;text-shadow: 2px 2px 2px black">PLACEMENT MANAGEMENT SYSTEM</h2></div>
                    </center>
                </header>
            </div>
            <div id="reg_opt_modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="">Register as : </h2>
                            <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <h3><a href="studRegistration.php" class="btn dpink_col"><i class="fa fa-user gray_col"></i> Student</a>&nbsp;|&nbsp;
                                    <a class="btn btn-default dpink_col" href="CompanyRegistration.php"><i class="fa fa-building gray_col"></i> Company</a></h3>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>