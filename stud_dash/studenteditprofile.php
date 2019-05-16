<?php
//if (isset($_POST['btn_update'])) {
//    $fname = $_POST['txt_fname'];
//    $lname = $_POST['txt_lname'];
//    $email = $_POST['txt_email'];
//    $uname = $_POST['txt_uname'];
//    date_default_timezone_set('Asia/Kolkata');
//    $change_date = date("Y-m-d");
//    $pwd = MD5($_POST['txt_passwd']);
//    $con_pwd = $_POST['txt_conf_pwd'];
//    $status = "active";
//
//    // Get image name
//    $image = $data['admin_image'];
//
//    if ($con) {
//        $q = $con->prepare("INSERT INTO `tbl_admin_data` "
//                . "(`f_name`, `l_name`, `Email`, `username`, `password`, `admin_image`, `change_date`, `status`) "
//                . "VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
//
//        $q->bind_param("ssssssss", $fname, $lname, $email, $uname, $pwd, $image, $change_date, $status);
//        if ($q->execute()) {
//            $q = $con->prepare("UPDATE `tbl_admin_data` "
//                    . "set status=? "
//                    . "where admin_id=?");
//            $stats = "deactive";
//            $old_id = $data['admin_id'];
//            $q->bind_param("si", $stats, $old_id);
//            $q->execute();
//        }
//    }
//}
$con = new mysqli("localhost", "root", "", "db_pms");
$query_update = $con->prepare("select * from tbl_studentdata"
        . " JOIN tbl_citylist on tbl_citylist.city_id=tbl_studentdata.city"
        . " JOIN tbl_state ON tbl_state.state_id=tbl_studentdata.stud_id"
        . " where stud_id=?");
$query_update->bind_param("i", $_SESSION['stud_id']);
$query_update->execute();
$result_update = $query_update->get_result();
$data = $result_update->fetch_assoc();
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
        <title>Student | Edit Profile</title>
        <link rel="icon" type="" href="../images/bmiitlogo.png">
        <link href="studenteditprofile_assets/change_image_avatar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="overflow-x: hidden" >
        <?php include './header.php'; ?>
       	<div class="">
            <div class="">
                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <h2 style="padding-left: 2%" class="gray_col">Edit Profile</h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">
                            <p><h3 class="gray_col"><b><?php echo $data['enroll_num']; ?></b></h3></p>
                        </div>
                    </div>                     
                    <div class="col-sm-3">
                        <div class="">
                            <br>
                            <div id="profile-container" >
                                <img id="profileImage" src="../images/Student_Images/<?php echo $data['stud_image']; ?>" />
                            </div>
                        </div>
                        <br>
                    </div>
                </div>               
            </div>
            <!-- left column -->
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <hr style=" display: block;
                    margin-top: 0.5em;
                    margin-bottom: 0.5em;
                    margin-left: auto;
                    margin-right: auto;
                    border-style: inset;
                    border-width: 2px;">
            </div>
            <form class="form-horizontal" role="form">
                <div class="col-sm-6">
                    <h3 class="dpink_col">Personal info</h3>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name :</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" readonly value="<?php echo $data['stud_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email :</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $data['email_id']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact :</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  value="<?php echo $data['mobile']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">City :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?php echo 'Surat'; // echo $data['city_name'];          ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">State :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="<?php echo 'Gujarat'; // echo $data['state_name'];          ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Pincode :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value="<?php echo $data['pincode']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3 class="dpink_col">Professional info</h3>
                    <div class="form-group">
                        <label class="col-md-3 control-label">SSC (%) :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value="<?php echo $data['ssc_per']; ?>">
                        </div>
                    </div> <div class="form-group">
                        <label class="col-md-3 control-label">HSC (%) :</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value="<?php echo $data['hsc_per']; ?>">
                        </div>
                    </div> <div class="form-group">
                        <label class="col-md-3 control-label">CGPA (BSc.IT):</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value="<?php echo $data['cgpa_bachelor']; ?>">
                        </div>
                    </div> <div class="form-group">
                        <label class="col-md-3 control-label">SGPA (9<sup>th</sup>sem):</label>
                        <div class="col-md-8">
                            <input class="form-control" type="number" value="<?php echo $data['sgpa_last_sem']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4" >
                        <div class="form-group">
                            <div class="pull-center">
                                <input type="button" class="btn btn-primary " value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Stipend letter :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div> 
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Offer letter :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Confirmation letter :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Joining letter :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Progress Report :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Log-Book :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
            <div class="form-group col-sm-12">
                <form method="post">
                    <div class="col-md-3 text-right"><label class="control-label">Bond / Agreement letter :</label></div>
                    <div class="col-md-6">
                        <input class="form-control" name="fileUpload" type="file" required>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" name="btn_upload" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
        </div>    
        <hr>
        <?php include './footer.php'; ?>
    </body>
</html>
