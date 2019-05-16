<?php
$con = new mysqli("localhost", "root", "", "db_pms");
require 'sendmail.php';
$otp = Email::generate_rand_passwd(6);
$mail_id = $_POST["mail_id"];
$uName = $_POST["uName"];
$uType = $_POST["uType"];
if (filter_var($mail_id, FILTER_VALIDATE_EMAIL)) {
    if ($con) {
        $q = "";
        if ($uType == "Student") {
            $q = $con->prepare("select * from tbl_studentdata where email_id=?");
        } elseif ($uType == "Company") {
            $q = $con->prepare("select * from tbl_company_data where comp_mail_id=?");
        }
        $q->bind_param("s", $mail_id);
        $q->execute();
        $r = $q->get_result();
        if ($r->num_rows > 0) {
            echo "<span class='fa fa-exclamation text-danger'> E-mail already registered.</span>";
        } else {
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
                            <p>Your OTP for registration is :<b style="color: #007bff"> <s>' . $otp . '</s></b></p>
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
</body>';
            $num = $_REQUEST['Mobile'];
            $msgBody="OTP to verify your account is : ".$otp;
            Email::sendSms($num,$msgBody);
            if (Email::send("bmiitpms@gmail.com", "Verify E-mail through OTP", $message, $mail_id)) {
                echo "<span class='fa fa-check-circle text-success'> Mail sent. Check your mail to verify your account.</span><input type='hidden' id='hidden_otp' name='hidden_otp' value=$otp>"
                    . '<script>document.getElementById("btn_verify_otp").disabled = false;$("#btn_verify_otp").removeClass("disabledAnchor");</script>';
            } else {
                echo "<span class='fa fa-exclamation text-danger'> Failed to send OTP. Please check your Network.</span>";
            }
        }
    }
} else {
    echo "<span class='fa fa-exclamation text-danger'> Please Enter valid E-Mail address</span>";
}