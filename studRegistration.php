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
        <title>Student Registration</title>
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
        <div id="main" style="display: none;">
            <form id="stud_reg" method="post" enctype="multipart/form-data">
                <div class="container">
                    <center><h1 class="blue_col">Student Registration</h1></center>
                    <div class="text-right"><a href="login.php"><i class="fa fa-id-badge"></i> Already Registered ?</a></div>
                    <section id="fancyTabWidget" class="tabs t-tabs">
                        <ul class="nav nav-tabs fancyTabs" role="tablist">
                            <li class="tab fancyTab active">
                                <a id="tab0" class="tabBody-0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0">
                                    <span class="fa fa-address-card-o"></span>
                                    <span class="hidden-xs">Personal Details</span>
                                </a>
                                <div class="whiteBlock"></div>
                                <div class="arrow-down">
                                    <div class="arrow-down-inner"></div>
                                </div>
                            </li>
                            <li class="tab fancyTab">
                                <a id="tab1" class="tabBody-1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0">
                                    <span class="fa fa-graduation-cap "></span>
                                    <span class="hidden-xs">Academic Details</span>
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
                                                    <input type="text" id="txt_enroll_num" name="txt_enroll_num" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Enrollment Number</label>
                                                    <div id="error_txt_enroll_num"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_fname" name="txt_fname" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>First name</label>
                                                    <div id="error_txt_fname"></div>
                                                </div> 
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_mname" name="txt_mname" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Middle name</label>
                                                    <div id="error_txt_mname"></div>
                                                </div>
                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_lname" name="txt_lname" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Family name</label>
                                                    <div id="error_txt_lname"></div>
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
                                                    <input type="text" id="txt_contact" name="txt_contact" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label>Contact No.</label>
                                                    <div id="error_txt_contact"></div>
                                                </div>

                                                <div class="group col-md-4">      
                                                    <input type="text" id="txt_bday" name="txt_bday" onfocus="(this.type = 'date')" onblur="if (!this.value)
                                                                this.type = 'text'" max="<?php echo date('Y-m-d'); ?>" required>
                                                    <span class="highlight"></span>
                                                    <span class="bar"></span>
                                                    <label><i class="fa fa-birthday-cake"></i>&nbsp;&nbsp;Birth-date</label>
                                                    <div id="error_txt_bday"></div>
                                                </div>
                                            </div>
                                            <div class="pull-right"><a class="btn btn-primary" id='tab1'>Next</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabBody-1">
                                    <div class="container-fluid row">
                                        <div class="col-md-12">
                                            <h2 class="pink_col">Details about Academics.</h2>
                                            <div class="row" style="margin-top: 50px">
                                                <div class="group col-md-4">
                                                    Do you want Placement or not ?
                                                    <div class="btn-group btn-toggle"> 
                                                        <input type="button" id="btn_yes" class="btn btn-default active" style="width: auto" data-toggle="collapse" value="Yes">
                                                        <input type="button" id="btn_no" class="btn btn-primary" style="width: auto" data-toggle="collapse" value="No">
                                                        <input type="hidden" id="check_pms" name="check_pms" value="No">
                                                    </div>
                                                    <div class="well mx-auto hide_div" id="div_tech">
                                                        Choose Technologies.
                                                        <div class="row">
                                                            <?php
                                                            if ($con) {
                                                                $q = $con->prepare("SELECT * FROM tbl_technology WHERE STATUS='active' order by name");
                                                                $q->execute();
                                                                $r = $q->get_result();
                                                                while ($k = $r->fetch_array()) {
                                                                    echo '<div class="col-md-6">'
                                                                    . '<div class="checkbox" style="padding-left: 20px">'
                                                                    . '<span><input id=' . $k[0] . ' type="checkbox" name="tech_list[]" value=' . "$k[1]" . ' style="width: auto">' . strtoupper($k[1]) . '</span>'
                                                                    . '</div></div>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="well mx-auto" id="div_reason">
                                                        <textarea rows="5" cols="30" id="txt_reason" name="txt_reason" placeholder="Specify reason..."></textarea>
                                                        <div id="err_txt_reason"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="group col-md-6">      
                                                            <input type="number" step=".01" min="0" max="100" id="txt_ssc" name="txt_ssc" required>
                                                            <span class="highlight"></span>
                                                            <span class="bar"></span>
                                                            <label>S.S.C.<sub>&nbsp;(10<sup>th</sup>)</sub> %</label>
                                                            <div id="error_txt_ssc"></div>
                                                        </div>
                                                        <div class="group col-md-6">      
                                                            <input type="number" step=".01" min="0" max="100" id="txt_hsc" name="txt_hsc" required>
                                                            <span class="highlight"></span>
                                                            <span class="bar"></span>
                                                            <label>H.S.C.<sub>&nbsp;(12<sup>th</sup>)</sub> %</label>
                                                            <div id="error_txt_hsc"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="group col-md-6">      
                                                            <input type="number" step=".01" min="0" max="10" id="txt_cgpa" name="txt_cgpa" required>
                                                            <span class="highlight"></span>
                                                            <span class="bar"></span>
                                                            <label>CGPA<sub>&nbsp;(Bechlors)</sub></label>
                                                            <div id="error_txt_cgpa"></div>
                                                        </div>
                                                        <div class="group col-md-6">      
                                                            <input type="number" step=".01" min="0" max="10" id="txt_sgpa" name="txt_sgpa" required>
                                                            <span class="highlight"></span>
                                                            <span class="bar"></span>
                                                            <label>SGPA<sub>&nbsp;(Last Sem)</sub></label>
                                                            <div id="error_txt_sgpa"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="group col-md-6">      
                                                            <input type="number" min="0" id="txt_kt" name="txt_kt" required>
                                                            <span class="highlight"></span>
                                                            <span class="bar"></span>
                                                            <label>Backlog's till now</label>
                                                            <div id="error_txt_kt"></div>
                                                        </div>
                                                        <div class="group col-md-6">
                                                            <select id="dd_area" name="dd_area">
                                                                <option value="1">Hometown</option>
                                                                <option value="2">Within State</option>
                                                                <option value="3">Any where</option>
                                                            </select>
                                                            <span class="highlight"></span>
                                                            <span class="bar"></span>
                                                            <label>Intrested Area</label>
                                                            <div id="error_dd_area"></div>
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
                                                    <div class=" group col-md-4">
                                                        <input type="email" required id="txt_mail" name="txt_mail">
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <label>Email ID</label>
                                                        <div id="err_validate_email"></div>
                                                    </div>
                                                </center>
                                                <div class="col-md-2">
                                                    <a class="btn btn-primary" id="btn_send_otp">Send OTP</a>
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
                                                        <div id="err_img_upload"><span class="gray_col">Click above to upload your Image.</span><br><span class="text-info">Please select square (1:1) photo to upload</span></div>     
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
        <script type="text/javascript" src="js/studRegValidate.js"></script>
        <script src="js/imgupload.js"></script>
        <?php
        if (isset($_POST)) {
            if (isset($_POST['btn_register'])) {
                $enroll_num = $_POST['txt_enroll_num'];
                $name = $_POST["txt_fname"] . " " . $_POST["txt_mname"] . " " . $_POST["txt_lname"];
                $bday = $_POST["txt_bday"];
                $bday = date("Y-m-d", strtotime($bday));
                $mob_num = $_POST["txt_contact"];
                $add = $_POST["txt_add"];
                $state = $_POST["dd_state"];
                $city = $_POST["dd_city"];
                $pincode = $_POST["txt_pincode"];
                $btn_pms_status = $_POST["check_pms"];
                $tech_list_or_reason = "";
                if ($btn_pms_status == "Yes") {
                    if ($_POST["tech_list"]) {
                        foreach ($_POST["tech_list"] as $value) {
                            $tech_list_or_reason .= $value . ":";
                        }
                    }
                } else {
                    $tech_list_or_reason = $_POST["txt_reason"];
                }
                $ssc = $_POST["txt_ssc"];
                $hsc = $_POST["txt_hsc"];
                $cgpa = $_POST["txt_cgpa"];
                $sgpa = $_POST["txt_sgpa"];
                $no_kt = $_POST["txt_kt"];
                $intrested_area = $_POST["dd_area"];
                $email = $_POST["txt_mail"];
                $passwd = $_POST["txt_passwd"];
                $encoded_pwd = MD5($passwd);
                date_default_timezone_set('Asia/Kolkata');
                $reg_date = date("Y-m-d");
                $status = "Registered";
                // Get image name
                $image = $_FILES['imageUpload']['name'];

                // image file directory
                $target = "images/Student_Images/" . basename($image);

                if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }
                if ($con) {
                    $q = $con->prepare("INSERT INTO tbl_studentdata "
                            . "(enroll_num, password, stud_name, birth_date, mobile, email_id,"
                            . " address, pincode, city, state,"
                            . " want_placement, technology_or_reason, intrested_city,"
                            . " ssc_per,hsc_per,cgpa_bachelor, sgpa_last_sem, kts_till_now,"
                            . " stud_image, status, stud_reg_date)"
                            . " VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    $q->bind_param("ssssssssiissiddddisss", $enroll_num, $encoded_pwd, $name, $bday, $mob_num, $email, $add, $pincode, $city, $state, $btn_pms_status, $tech_list_or_reason, $intrested_area, $ssc, $hsc, $cgpa, $sgpa, $no_kt, $image, $status, $reg_date);
                    $q->execute();                    
                }
            }
        }
        ?>

    </body>
</html>