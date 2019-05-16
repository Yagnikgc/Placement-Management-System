<?php
session_start();
ob_start();
$con = new mysqli("localhost", "root", "", "db_pms");

//-----UPDATE---SET EXPIRED PLACEMENTS
$query_set_placements_expired = $con->prepare("UPDATE tbl_placements_data SET status = ? WHERE placement_reg_close_date<? and status=?");
$plsmnt_old_status = "Announced";
$plsmnt_new_status = "Expired";
date_default_timezone_set('Asia/Kolkata');
$current_date = date("Y-m-d");
$query_set_placements_expired->bind_param("sss", $plsmnt_new_status, $current_date, $plsmnt_old_status);
$query_set_placements_expired->execute();
$error_msg = "";
if (isset($_POST)) {
    if (isset($_POST["Login"])) {
        $uname = $_POST["username"];
        $pwd = $_POST["password"];
        $passwd = MD5($_POST["password"]);
        $_SESSION["userName"] = $uname;
        if ($con) {
            $query = "select count(stud_id),stud_id from tbl_studentdata where (enroll_num=? or email_id=?) and password=?";
            $q = $con->prepare($query);
            $q->bind_param("sss", $uname, $uname, $passwd);
            $q->execute();
            $r = $q->get_result();
            $k = $r->fetch_array();
            if ($k[0] == 1) {
                $_SESSION['stud_id'] = $k[1];
                header('Location:stud_dash/index.php');
            } else {
                $query = "select count(comp_id),comp_id from tbl_company_data where comp_mail_id=? and password=?";
                $q = $con->prepare($query);
                $q->bind_param("ss", $uname, $passwd);
                $q->execute();
                $r = $q->get_result();
                $k = $r->fetch_array();
                if ($k[0] == 1) {
                    $_SESSION['comp_id'] = $k[1];
                    header('Location:comp_dash/index.php');
                } else {
                    $query = "select count(admin_id),admin_id from tbl_admin_data where (username=? or Email=?) and password=? and status=?";
                    $q = $con->prepare($query);
                    $param = "active";
                    $q->bind_param("ssss", $uname, $uname, $passwd, $param);
                    $q->execute();
                    $r = $q->get_result();
                    $k = $r->fetch_array();
                    if ($k[0] == 1) {
                        $_SESSION['admin_id'] = $k[1];
                        header('Location:adminDash/index.php');
                    } else {
                        $error_msg = '<span class="white_col"><i class="fa fa-exclamation-circle text-danger"></i><b><u class="text-danger">Invalid Credentials</u></b></span>';
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="shortcut icon" href="bmiitlogo.png" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shadow Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <!-- Custom Theme files -->
        <link href="css/studLogIn.css" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- //Custom Theme files --> 
        <!-- web font --> 
        <link href="//fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet">
        <!-- //web font -->
        <link href="css/forgot_Password.css" rel="stylesheet" type="text/css"/>
        <script src="js/forgot_Password.js" type="text/javascript"></script>

    </head>
    <body>
        <img src="images/loader_mail.gif" style="position: absolute;width: 100%;height: 100%" id="loader">
        <script>
            $(document).ready(function () {
                $("#loader").hide();
                $("#main").show();
            });
        </script>    
        <div id="main" style="display: none;">
            <!-- main --> 
            <div class="main-agileinfo slider ">
                <div class="items-group">
                    <div class="item agileits-w3layouts">
                        <div class="block text main-agileits">
                            <div class="wthree txt-rt"> 
                                <h6><a data-toggle="modal" style="cursor: pointer" data-target="#reg_opt_modal"><i class="fa fa-user"></i> New User ?</a></h6>
                            </div>
                            <span class="circleLight"></span> 
                            <!-- login form -->
                            <div class="login-form loginw3-agile"> 
                                <div class="agile-row">
                                    <div class="container">                                    
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <center><img src="images/bmiitlogo.png" style="width: 150px;" alt="logo"></center>
                                            </div>
                                            <div class="col-sm-6" >
                                                <h1 class="down">BMIIT</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="login-agileits-top">
                                        <form method="post">
                                            <p>User Name </p>
                                            <input type="text" class="name" name="username" id="username" required/>
                                            <p>Password</p>
                                            <input type="password" class="password" name="password" id="password" required>
                                            <div class="text-right"><?php echo $error_msg; ?></div><br><br>
                                            <input type="submit" name="Login" id="Login" value="Login"> 
                                        </form>

                                    </div> 
                                    <div class="login-agileits-bottom wthree"> 
                                        <h6><a href="#" data-toggle="modal" data-target="#myModal">Forgot password?</a></h6>
                                    </div> 
                                </div>  
                            </div>   
                            <center><i class="fa fa-graduation-cap blue_col icn"></i> &nbsp;Wishing you all the best for your bright future </center>
                        </div>
                    </div>   
                </div>
            </div>
            <!-- //main -->

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog" >
                    <!-- Modal content-->
                    <div class="modal-content modal_back" style="margin-top: 20%">
                        <div class="modal-header white_col">
                            <div class="container">
                                <div class="row">
                                    <center><h3 class="modal-title">Forgot Password</h3></center>
                                    <a style=" color: white" class="close" data-dismiss="modal">&times;</a>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="modal-body" id="divtog0">
                                <div class="row">
                                    <input type="email" style="width: 95%" class="txt_box" id="txt_email" name="txt_email" placeholder="Registered Email ID" >
                                </div>
                                <div id="err_validate_email"></div><br>
                                <div class="row float-rt">
                                    <input type="button" class="btn" id="btn_send" name="btn_send" value="Send New Password"/>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </center>
                        <br><br>
                    </div>
                </div>
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
                                <h3><a href="studRegistration.php" class="btn btn-default"><i class="fa fa-user gray_col"></i> Student</a>&nbsp;&nbsp;
                                    <a class="btn btn-default" href="CompanyRegistration.php"><i class="fa fa-building gray_col"></i> Company</a></h3>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php ob_end_flush(); ?>
        </div>
    </body>
</html>