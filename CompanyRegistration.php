<?php $con = new mysqli("localhost", "root", "", "db_pms"); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Company Registration</title>
        <link rel="shortcut icon" href="bmiitlogo.png" type="image/x-icon" />
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto'>
        <link href="css/style_Passwd.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/studRegTextbox.css">
        <link href="css/imgupload.css" rel="stylesheet" type="text/css"/>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,700'>
        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <img src="images/infinity_loop_-_logo.gif" style="position: absolute;width: 100%;height: 100%" id="loader">
        <script>
            $(document).ready(function () {
                $("#loader").hide();
                $("#main").show();
            });
        </script>    
        <div id="main" style="display: none;">
            <form id="stud_reg" method="post" enctype="multipart/form-data">
                <div class="container">
                    <center><h1 class="blue_col">Company Registration</h1></center>
                    <div class="text-right"><a href="login.php"><i class="fa fa-id-badge"></i> Already Registered ?</a></div>
                    <section id="fancyTabWidget" class="tabs t-tabs">
                        <ul class="nav nav-tabs fancyTabs" role="tablist">
                            <li class="tab fancyTab active">
                                <a id="tab0" class="tabBody-0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0">
                                    <span class="fa fa-address-card-o"></span>
                                    <span class="hidden-xs">Company Details</span>
                                </a>
                                <div class="whiteBlock"></div>
                                <div class="arrow-down">
                                    <div class="arrow-down-inner"></div>
                                </div>
                            </li>
                            <li class="tab fancyTab">
                                <a id="tab1" class="tabBody-1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0">
                                    <span class="fa fa-handshake-o"></span>
                                    <span class="hidden-xs">Contact Details</span>
                                </a>
                                <div class="whiteBlock"></div> 
                                <div class="arrow-down">
                                    <div class="arrow-down-inner"></div>
                                </div>
                            </li>
                            <li class="tab fancyTab">
                                <a id="tab2" class="tabBody-2" role="tab" aria-controls="tabBody2" aria-selected="true" data-toggle="tab" tabindex="0">
                                    <span class="fa fa-user-circle-o "></span>
                                    <span class="hidden-xs">Account Setup</span>
                                </a>
                                <div class="whiteBlock"></div>
                                <div class="arrow-down">
                                    <div class="arrow-down-inner"></div>
                                </div>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                            <div class="tab-pane  fade active in" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                                <div id="tabBody-0">
                                    <div class="container-fluid row">
                                        <div class="col-md-12">
                                            <h2 class="pink_col">Tell us about yourself.</h2>
                                            <br>
                                            <div class="row">
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_cmp_name" name="txt_cmp_name" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Company Name</label>
                                                    <div id="error_txt_cmp_name"></div>
                                                </div>
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_cmp_reg_num" name="txt_cmp_reg_num" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Company Reg. Number</label>
                                                    <div id="error_txt_cmp_reg_num"></div>
                                                </div>
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_cmp_reg_date" name="txt_cmp_reg_date" onfocus="(this.type = 'date')" onblur="if (!this.value)
                                                                this.type = 'text'" max="<?php echo date('Y-m-d'); ?>" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label><i class="fa fa-calendar"></i>&nbsp;&nbsp;Company's Registration-date</label>
                                                    <div id="error_txt_cmp_reg_date"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="group col-md-4">      
                                                    <input type="" id="txt_add" name="txt_add" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Address</label>
                                                    <div id="error_txt_add"></div>
                                                </div>
                                                <div class="group col-md-4">      
                                                    <select id="dd_state" name="dd_state">
                                                        <option value="" disabled selected>Select State</option>
                                                        <?php
                                                        if ($con) {
                                                            $q = $con->prepare("select * from tbl_state order by state_name");
                                                            $q->execute();
                                                            $r = $q->get_result();
                                                            while ($k = $r->fetch_array()) {
                                                                echo "<option value='" . $k[0] . "'>$k[1]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>State</label>
                                                    <div id="error_dd_state"></div>
                                                </div>
                                                <div class="group col-md-4">      
                                                    <select id="dd_city" name="dd_city">
                                                        <option value="" disabled selected>Select City</option>
                                                    </select>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>City</label>
                                                    <div id="error_dd_city"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_pincode" name="txt_pincode" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Pincode</label>
                                                    <div id="error_txt_pincode"></div>
                                                </div> 
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_url" name="txt_url" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Company`s Web-site</label>
                                                    <div id="error_txt_url"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="pull-right"><a class="btn btn-primary" id='tab1'>Next</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tabBody-1">
                                    <div class="container-fluid row">
                                        <div class="col-md-12">
                                            <h2 class="pink_col">Contact Information.</h2>
                                            <div class="row" style="margin-top: 40px">
                                                <div class="col-md-4">                                                
                                                    <div class="col-md-10 well mx-auto" id="checkboxes">
                                                        <h4><b>Technologies you work on :</b></h4>
                                                        <?php
                                                        if ($con) {
                                                            $q = $con->prepare("SELECT * FROM tbl_technology WHERE STATUS='active' order by name");
                                                            $q->execute();
                                                            $r = $q->get_result();
                                                            while ($k = $r->fetch_array()) {
                                                                echo '<div class="col-md-6">'
                                                                . '<div class="checkbox" style="padding-left: 20px">'
                                                                . '<span><input id=' . $k[0] . ' class="checkbox_group" type="checkbox" name="tech_list[]" value=' . "$k[1]" . ' style="width: auto">' . strtoupper($k[1]) . '</span>'
                                                                . '</div></div>';
                                                            }
                                                        }
                                                        ?>
                                                        <div id="error_tech_list"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="group">      
                                                                <input type="text" id="txt_ceo_name" name="txt_ceo_name" required>
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>CEO Name</label>
                                                                <div id="error_txt_ceo_name"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="group col-md-6">      
                                                                <input type="text" id="txt_comp_mob_num" name="txt_comp_mob_num" required>
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>Company Contact Number</label>
                                                                <div id="error_txt_comp_mob_num"></div>
                                                            </div>
                                                            <div class="group col-md-6">      
                                                                <input type="email" id="txt_comp_email" name="txt_comp_email" required>
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>E-mail Id<sub> (Company's)</sub></label>
                                                                <div id="error_txt_comp_email"></div>
                                                            </div>
                                                        </div>
                                                    </div>                                                
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="group">      
                                                                <input type="text" id="txt_hr_name" name="txt_hr_name" required>
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>HR Manager Name</label>
                                                                <div id="error_txt_hr_name"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="group col-md-6">      
                                                                <input type="text" id="txt_hr_mob_num" name="txt_hr_mob_num" required>
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>HR Contact Number</label>
                                                                <div id="error_txt_hr_mob_num"></div>
                                                            </div>
                                                            <div class="group col-md-6">      
                                                                <input type="email" id="txt_hr_email" name="txt_hr_email" required>
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>E-mail Id<sub> (HR Manager)</sub></label>
                                                                <div id="error_txt_hr_email"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="btn btn-primary pull-left" id='tab0'>Previous</a>
                                                    <a class="btn btn-primary pull-right" id='tab2'>Next</a>
                                                </div>
                                            </div>	          
                                        </div>
                                    </div>
                                </div>
                                <div id="tabBody-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="pink_col">Finialize your Account</h2>
                                            <h4 class="blue_col">with 2 step Verification</h4>
                                            <br/>
                                            <div class="row">
                                                <center>
                                                    <div class="group col-md-4">
                                                        <input type="email" required id="txt_mail" readonly name="txt_mail">
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <div id="error_txt_comp_email"></div>
                                                    </div>
                                                </center>
                                                <div class="col-md-2">
                                                    <a class="btn btn-primary" id="btn_send_otp">Re-send OTP</a>
                                                </div>
                                                <center>
                                                    <div class="group col-md-4">
                                                        <input type="text" required id="txt_otp" name="txt_otp">
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <label>Enter OTP</label>
                                                        <div id="err_validate_otp"></div>
                                                    </div>
                                                </center>
                                                <div class="col-md-2">
                                                    <a class="btn btn-primary disabledAnchor" id="btn_verify_otp">Verify OTP</a>
                                                </div>
                                            </div>
                                            <div class="row hide_div" id="div_registration"> <!-- add hide_div class here -->
                                                <center>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="group">
                                                                <input type="password" required name="txt_passwd" id="txt_passwd">
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>Password</label>
                                                                <div id="err_txt_passwd"></div>
                                                                <div id="pswd_info">
                                                                    <h4>Password must meet the following requirements:</h4>
                                                                    <ul>
                                                                        <li id="letter" class="invalid fa fa-close">&emsp; At least <strong>one small letter</strong></li>
                                                                        <li id="capital" class="invalid fa fa-close">&emsp; At least <strong>one capital letter</strong></li>
                                                                        <li id="number" class="invalid fa fa-close">&emsp; At least <strong>one number</strong></li>
                                                                        <li id="length" class="invalid fa fa-close">&emsp; Be at least <strong>8 characters</strong></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="group">      
                                                                <input type="password" required name="txt_conf_passwd" id="txt_conf_passwd">
                                                                <span class="highlight"></span>
                                                                <span class="bar"></span>
                                                                <label>Confirm Password</label>
                                                                <div id="err_txt_conf_passwd"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div id="profile-container" style="vertical-align:middle">
                                                            <image id="profileImage" src="images/userFace.png" />
                                                            <input id="imageUpload" type="file" name="imageUpload" placeholder="Photo" required capture>
                                                        </div><br>
                                                        <div id="err_img_upload"><span class="gray_col">Click above to upload your Image.</span></div>     
                                                    </div>
                                                    <div class="col-md-4" style="padding-top: 90px;">
                                                        <input type="submit" id="btn_register" name="btn_register" value="Register">
                                                    </div>
                                                </center>
                                            </div>
                                            <div>
                                                <a class="btn btn-primary pull-left" id='tab1'>Previous</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script>
                                                        $(document).ready(function () {
                                                            $("#loader").hide();
                                                            $("#main").show();
                                                        });
        </script>
        <script  src="js/studReg.js"></script>
        <script type="text/javascript" src="js/CompanyRegistration.js"></script>
        <script src="js/imgupload.js"></script>

        <?php
        if (isset($_POST)) {
            if (isset($_POST['btn_register'])) {
                $txt_cmp_name = $_POST['txt_cmp_name'];
                $txt_cmp_reg_num = $_POST["txt_cmp_reg_num"];
                $txt_cmp_reg_date = $_POST["txt_cmp_reg_date"];
                $txt_cmp_reg_date = date("Y-m-d", strtotime($txt_cmp_reg_date));
                $add = $_POST["txt_add"];
                $state = $_POST["dd_state"];
                $city = $_POST["dd_city"];
                $pincode = $_POST["txt_pincode"];
                $txt_url = $_POST["txt_url"];
                $tech_list = "";
                if ($_POST["tech_list"]) {
                    foreach ($_POST["tech_list"] as $value) {
                        $tech_list .= $value . ":";
                    }
                }
                $txt_ceo_name = $_POST["txt_ceo_name"];
                $txt_comp_mob_num = $_POST["txt_comp_mob_num"];
                $txt_comp_email = $_POST["txt_comp_email"];
                $txt_hr_name = $_POST["txt_hr_name"];
                $txt_hr_mob_num = $_POST["txt_hr_mob_num"];
                $txt_hr_email = $_POST["txt_hr_email"];
                $passwd = $_POST["txt_passwd"];
                $encoded_pwd = MD5($passwd);
                date_default_timezone_set('Asia/Kolkata');
                $reg_date = date("Y-m-d");
                $status = "Registered";
                // Get image name
                $image = $_FILES['imageUpload']['name'];

                // image file directory
                $target = "images/Company_Images/" . basename($image);

                if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }

                if ($con) {
                    $q = $con->prepare("INSERT INTO tbl_company_data "
                            . "(company_name, comp_reg_no, ceo_name, hr_name, comp_address, city, state, pincode,"
                            . " comp_mob_no, hr_mob_no, comp_mail_id, comp_website, password, hr_mail_id,"
                            . " comp_logo, comp_status, comp_reg_date, technology) "
                            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $q->bind_param("sssssiisssssssssss", $txt_cmp_name, $txt_cmp_reg_num, $txt_ceo_name, $txt_hr_name, $add, $city, $state, $pincode
                            , $txt_comp_mob_num, $txt_hr_mob_num, $txt_comp_email, $txt_url, $encoded_pwd, $txt_hr_email
                            , $image, $status, $reg_date, $tech_list);
                    if ($q->execute()) {
                        require 'sendmail.php';
                        $mail_id = "bmiitpms@gmail.com";
                        $message = "<html><body>" . $txt_cmp_name . " has recently registered."
                                . "Kindly log in and verify the company details.</body></html>";
                        Email::send("bmiitpms@gmail.com", "Company Arrival", $message, $mail_id);
                    }
                }
            }
        }
        ?>

    </body>
</html>