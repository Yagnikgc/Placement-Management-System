<?php

$con = new mysqli("localhost", "root", "", "db_pms");
if (isset($_POST["mail_id_forget_pwd"])) {
    require 'sendmail.php';
    $otp = Email::generate_rand_passwd(8);
    $mail_id = $_POST["mail_id_forget_pwd"];
    $uName = "";
    $flag = 0;
    $userType = '';
    if (filter_var($mail_id, FILTER_VALIDATE_EMAIL)) {
        if ($con) {
            $q = $con->prepare("select * from tbl_studentdata where email_id=?");
            $q->bind_param("s", $mail_id);
            $q->execute();
            $r = $q->get_result();
            if ($r->num_rows > 0) {
                $userType = "Student";
                $data_user = $r->fetch_assoc();
                $name = explode(" ", $data_user['stud_name']);
                $uName = $name[0] . " " . $name[2];
            } else {
                $q = $con->prepare("select * from tbl_company_data where comp_mail_id=?");
                $q->bind_param("s", $mail_id);
                $q->execute();
                $r = $q->get_result();
                if ($r->num_rows > 0) {
                    $userType = "Company";
                    $data_user = $r->fetch_assoc();
                    $uName = $data_user['company_name'];
                } else {
                    $q = $con->prepare("select * from tbl_admin_data where Email=?");
                    $q->bind_param("s", $mail_id);
                    $q->execute();
                    $r = $q->get_result();
                    if ($r->num_rows > 0) {
                        $userType = "Admin";
                        $data_user = $r->fetch_assoc();
                        $uName = $data_user['f_name'] . $data_user['l_name'];
                    } else {
                        $flag++;
                        echo "<span class='fa fa-exclamation text-white bg-danger'> E-mail not registered.</span>";
                    }
                }
            }
            if ($flag == 0) {
                $message = '<body style="min-width: 900px;min-height: 800px;">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<center>
	<div class="container" style="width: 100%">
            <div class="row" style="padding-top: 7%;">
		<div class="col-sm-3"></div>
		<div class="col-sm-6" style="font-size: 20px;color: white;text-align: center;padding-top: 3%;border-style: groove;background-image: url(https://3.bp.blogspot.com/-_RkRTl8lT68/WqOWsTX4ADI/AAAAAAAAUfE/W4Nj616PpIo1_kgDsmzNxHEw4reDAIz7wCLcBGAs/s1600/bg.jpg);background-repeat: none;background-size: cover;box-shadow: black 3px 5px 5px 2px">
                    BMIIT Placements
                    <div class="row">
			<div class="col-sm-12">
                            <br>
                            <p style="color: white;">hey ! <b>' . $uName . '</b></p>
                            <img src="https://4.bp.blogspot.com/-H0O6SxC2NDs/WqOWuRqZU8I/AAAAAAAAUfI/QTtb340gkHo2NAVydkzs734cOU6DJ1kUwCLcBGAs/s320/bmiitlogo.png" height="200px" width="200px" alt="BMIIT Placement logo">
                            <p style="color: white;">Welcome to <a href="utu.ac.in/bmiit"><b>BMIIT</b></a> Placement Management System</p>
                            <!--OTP Sending-->
                            <p>Your OTP for registration is :<b style="color: white"> <s>' . $otp . '</s></b></p>
			</div>
			<div id="footer" class="col-sm-12" style="text-align: center;">
                            <hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;"/>
                            <p style="font-size: 10px;">
                                <a href="utu.ac.in/bmiit">
                                <img src="https://2.bp.blogspot.com/-BAxhYNFMYPk/WqOXLDeznbI/AAAAAAAAUfQ/IC775EyeIr4i7xdD4y3rOU-sUiTOpRikACLcBGAs/s320/BMIIT%2BLOGO.png" height="30" width="30" alt="BMIIT Logo">&nbsp;&nbsp;Babu Madhav Institute of Information Technology</a></p>
				<div style="font-size: 8px;margin-top: -4%;margin-right: -7%; color: white">MAKE IT HAPPEN THROUGH INNOVATION AND VALUES</div> 
			</div>
		</div>
		<div class="col-sm-3"></div>
            </div>
	</div>
	</center>
</body>';                //echo $mail_id;
                $q_up = '';
                if (Email::send("bmiitpms@gmail.com", "Verify E-mail through OTP", $message, $mail_id)) {
                    $pwd = md5($otp);
                    if ($userType == "Student") {
                        $q_up = $con->prepare("update tbl_studentdata set password=? where email_id=?");
                    } elseif ($userType == "Company") {
                        $q_up = $con->prepare("update tbl_company_data set password=? where comp_mail_id=?");
                    } elseif ($userType == "Admin") {
                        $q_up = $con->prepare("update tbl_admin_data set password=? where Email=?");
                    }
                    $q_up->bind_param("ss", $pwd, $mail_id);
                    $q_up->execute();
                    echo "<span id='span_success' class='fa fa-check-circle text-white bg-success'> Mail sent. Check your mail to verify your account.</span>";
                } else {
                    echo "<span class='fa fa-exclamation text-white bg-danger'> Failed to send OTP. Please check your Network.</span>";
                }
            }
        }
    } else {
        echo "<span class='fa fa-exclamation text-white bg-danger'> Please Enter valid E-Mail address</span>";
    }
}