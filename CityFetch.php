<?php

$con = new mysqli("localhost", "root", "", "db_pms");

if ($con) {
    //-----SHOW PLACEMENTS BASED ON COMPANY-----
    if (isset($_POST["dd_company_name"])) {
        $a = $_POST["dd_company_name"];
        echo '<option value="" disabled selected>Placement Announce Date</option>';
        $q = $con->prepare("SELECT plsmnt_id,placement_announcement_date FROM tbl_placements_data where comp_id=? and status='Approved' ORDER BY placement_announcement_date");
        $q->bind_param("i", $a);
        $q->execute();
        $r = $q->get_result();
        while ($k = $r->fetch_array()) {
            echo '<option value=' . "$k[0]" . '>' . $k[1] . '</option>';
        }
    }

    //-----SHOW ROUNDS BASED ON PLACEMENTS-----
    if (isset($_POST["dd_placement_id"])) {
        $a = $_POST["dd_placement_id"];
        $query_round = "SELECT * FROM tbl_placement_rounds_data"
                . " WHERE placement_id='" . $a . "' ORDER BY round_number";
        $q_round = $con->prepare($query_round);
        $q_round->execute();
        $round_data = $q_round->get_result();
        $txt_round = '<option value="" disabled selected>Select Round</option>';
        while ($row_round = mysqli_fetch_array($round_data)) {
            $txt_round .= '<option value="' . $row_round['round_id'] . '">' . $row_round['round_number'] . ' : ' . $row_round['round_name'] . '</option>';
        }
        echo $txt_round;
    }

    //-----SHOW CITIES BASED ON STATE-----
    if (isset($_POST["dd_state"])) {
        $a = $_POST["dd_state"];
        echo '<option value="" disabled selected>Select City</option>';
        $q = $con->prepare("SELECT * FROM tbl_citylist where state_id=? ORDER BY city_name");
        $q->bind_param("i", $a);
        $q->execute();
        $r = $q->get_result();
        while ($k = $r->fetch_array()) {
            echo '<option value=' . "$k[0]" . '>' . $k[1] . '</option>';
        }
    }

    //-----CHECK WETHER ENROLLMENT ID REGISTERED OR NOT-----
    if (isset($_POST["enroll_num"])) {
        $query = "select count(stud_id) from tbl_studentdata where enroll_num=?";
        $q = $con->prepare($query);
        $q->bind_param("s", $_POST["enroll_num"]);
        $q->execute();
        $r = $q->get_result();
        $k = $r->fetch_array();
        if ($k[0] == 1) {
            echo '<span id="mySPAN" class="fa fa-exclamation text-danger"> Enrollment Number already registered.</span>';
        } else {
            echo '';
        }
    }

    //-----DISPLAY STUDENT'S DATA IN MODEL-----ADMIN SIDE-----
    if (isset($_GET["student_id"])) {
        $query = "select * from tbl_studentdata"
                . " JOIN tbl_citylist on tbl_studentdata.city=tbl_citylist.city_id"
                . " JOIN tbl_state on tbl_citylist.state_id=tbl_state.state_id"
                . " where stud_id=?"
                . " order by enroll_num";
        $q = $con->prepare($query);
        $q->bind_param("s", $_GET["student_id"]);
        $q->execute();
        $r = $q->get_result();
        $k = $r->fetch_assoc();
        if ($_GET["class"] == "header") {
            echo '<button type="button" class="close" data-dismiss="modal" style="padding-right: 15px;padding-top: 5px;">&times;</button>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <h3 class="modal-title dpink_col"><b>' . $k['enroll_num'] . '</b></h3><h4 class="modal-title gray_col">' . $k['stud_name'] . '</h4>
                            </div>
                            <div class="col-sm-3">  
                                <div id="profile-container" >
                                    <img id="profileImage" style="height:100px;width:100px" src="../images/Student_Images/' . $k['stud_image'] . '" />
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-9 personal-info">
                            <hr style=" display: block;
                                margin-top: 0.5em;
                                margin-bottom: 0.5em;
                                margin-left: auto;
                                margin-right: auto;
                                border-style: inset;
                                border-width: 2px;">
                        </div>';
        } elseif ($_GET["class"] == "body") {
            echo '<form class="form-horizontal" role="form">
                            <div class="col-sm-7">
                                <h3 class="dpink_col text-left">Personal info</h3>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['email_id'] . '>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Contact</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" style="cursor: default" readonly  value=' . $k['mobile'] . '>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">City</label>
                                    <div class="col-md-8">
                                        <input class="form-control" style="cursor: default" style="cursor: default" readonly value=' . $k['city_name'] . '>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">State </label>
                                    <div class="col-md-8">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['state_name'] . '>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pincode </label>
                                    <div class="col-md-8">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['pincode'] . '>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <h3 class="dpink_col text-left">Professional info</h3>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">SSC (%) </label>
                                    <div class="col-md-7">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['ssc_per'] . '>
                                    </div>
                                </div> <div class="form-group">
                                    <label class="col-md-4 control-label">HSC (%) </label>
                                    <div class="col-md-7">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['hsc_per'] . '>
                                    </div>
                                </div> <div class="form-group">
                                    <label class="col-md-4 control-label">CGPA (BSc.IT)</label>
                                    <div class="col-md-7">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['cgpa_bachelor'] . '>
                                    </div>
                                </div> <div class="form-group">
                                    <label class="col-md-4 control-label">SGPA (9<sup>th</sup>sem)</label>
                                    <div class="col-md-7">
                                        <input class="form-control" style="cursor: default" readonly value=' . $k['sgpa_last_sem'] . '>
                                    </div>
                                </div> 
                            </div>
                        </form>';
        }
    }

    //-----DISPLAY COMPANY'S DATA IN MODEL-----ADMIN SIDE-----
    if (isset($_GET["company_id"])) {
        $query = "select * from tbl_company_data"
                . " JOIN tbl_citylist on tbl_company_data.city=tbl_citylist.city_id"
                . " JOIN tbl_state on tbl_citylist.state_id=tbl_state.state_id"
                . " where comp_id=?";
        $q = $con->prepare($query);
        $q->bind_param("s", $_GET["company_id"]);
        $q->execute();
        $r = $q->get_result();
        $k = $r->fetch_assoc();
        if ($_GET["class"] == "header") {
            echo '<button type="button" class="close" data-dismiss="modal" style="padding-right: 15px;padding-top: 5px;">&times;</button>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <h3 class="modal-title dpink_col"><b>' . $k['company_name'] . '</b></h3><h4 class="modal-title gray_col"><a href="' . $k['comp_website'] . '" target="blank">' . $k['comp_website'] . '</h4>
                            </div>
                            <div class="col-sm-3">  
                                <div id="profile-container" >
                                    <img id="profileImage" style="height:100px;width:100px" src="../images/Company_Images/' . $k['comp_logo'] . '" />
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-9 personal-info">
                            <hr style=" display: block;
                                margin-top: 0.5em;
                                margin-bottom: 0.5em;
                                margin-left: auto;
                                margin-right: auto;
                                border-style: inset;
                                border-width: 2px;">
                        </div>';
        } elseif ($_GET["class"] == "body") {
            echo '<style>
            td,th{
                padding: 5px;
            }
        </style>
        <center><table>
            <tr><th colspan="2">Company Info.</th><th colspan="2">Contact Info.</th></tr>
            <tr><td class="gray_col">Registration No : </td><td>' . $k['comp_reg_no'] . '</td><td class="gray_col">Company E-mail : </td><td>' . $k['comp_mail_id'] . '</td></tr>
            <tr><td class="gray_col">CEO Name : </td><td>' . $k['ceo_name'] . '</td><td class="gray_col">Company Contact No : </td><td>' . $k['comp_mob_no'] . '</td></tr>
            <tr><td class="gray_col">HR Name : </td><td>' . $k['hr_name'] . '</td><td class="gray_col">HR E-mail : </td><td>' . $k['hr_mail_id'] . '</td></tr>
            <tr><td class="gray_col">Technology : </td><td>' . rtrim(str_replace(":", ", ", $k['technology']), ", ") . '</td><td class="gray_col">HR Contact No: </td><td>' . $k['hr_mob_no'] . '</td></tr>
            <tr><td class="gray_col">Address : </td><td colspan="3">' . $k['comp_address'] . " - " . $k['pincode'] . ", " . $k['city_name'] . ", " . $k['state_name'] . '</td></tr>            
        </table></center>';
        }
    }

    //-----VERIFY COMPANY-----ADMIN SIDE-----
    if (isset($_POST['comp_id_to_verify'])) {
        $q = $con->prepare("UPDATE tbl_company_data SET comp_status = ? WHERE comp_id = ?");
        $q->bind_param("si", $_POST['comp_status'], $_POST['comp_id_to_verify']);
        if ($q->execute()) {
            if ($_POST['comp_status'] == 'Approved') {
                $q = $con->prepare("select * from tbl_company_data where comp_id=?");
                $q->bind_param("s", $_POST['comp_id_to_verify']);
                $q->execute();
                $k = $q->get_result();
                $data = $k->fetch_assoc();
                require 'sendmail.php';
                $mail_id = $data['comp_mail_id'];
                $message = "<html><body>" . $data['company_name'] . "<br> has been verified successfully."
                        . "We hope you will enjoy working with us.</body></html>";
                Email::send("bmiitpms@gmail.com", "Company Approval", $message, $mail_id);
            }
        }
    }

    if (isset($_POST['num_of_rounds'])) {
        $rounds = "";
        $curDate = date('Y-m-d');
        for ($index = 0; $index < $_POST['num_of_rounds']; $index++) {
            $rounds .= '<span class="col-sm-12">
                            <input type="text" id="txt_round_sr_no[]" name="txt_round_sr_no[]" style="background-color: transparent;border: none;font-size: 25px;" class="col-sm-3 white_col" readonly value="Round ' . ($index + 1) . '"/>
                            <input type="text" id="txt_round_name[]" name="txt_round_name[]" required class="col-sm-5 inp_pad" placeholder="Enter Round Name"/> 
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <input type="text" id="txt_round_date[]" name="txt_round_date[]" class="inp_pad" placeholder="Enter Round Date" onfocus="(this.type = ' . "'date'" . ')" onblur="if (!this.value)
                                    this.type = ' . "'text'" . '" min="' . $curDate . '" required/>
                                    <input type="number" id="txt_round_weighted[]" name="txt_round_weighted[]" class="inp_pad" min="0" placeholder="Round Weighted" required/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="4" id="txt_round_desc[]" name="txt_round_desc[]" placeholder="Round Description" required></textarea>
                                </div>      
                            </div>
                        </span>';
        }
        echo $rounds;
    }

    //-----DISPLAY PLACEMENT'S DATA IN MODEL-----ADMIN SIDE-----
    if (isset($_GET["placement_id"])) {
        $query = "SELECT * FROM tbl_placements_data
            JOIN tbl_company_data ON tbl_placements_data.comp_id=tbl_company_data.comp_id
            JOIN tbl_citylist on tbl_company_data.city=tbl_citylist.city_id 
            JOIN tbl_state on tbl_citylist.state_id=tbl_state.state_id
                 where plsmnt_id=?";
        $q = $con->prepare($query);
        $q->bind_param("s", $_GET["placement_id"]);
        $q->execute();
        $r = $q->get_result();
        $k = $r->fetch_assoc();
        $query_rounds = $con->prepare("SELECT * FROM tbl_placement_rounds_data WHERE placement_id=? ORDER BY round_number");
        $query_rounds->bind_param("s", $_GET["placement_id"]);
        $query_rounds->execute();
        $r = $query_rounds->get_result();
        $round_row = "";
        while ($data_rounds = $r->fetch_array()) {
            $round_row .= "<tr class='gray_col'><td>$data_rounds[3]</td><td>$data_rounds[4]</td><td>$data_rounds[5]</td><td>$data_rounds[6]</td><td>$data_rounds[7]</td></tr>";
        }
        if ($_GET["class"] == "header") {
            echo '<button type="button" class="close" data-dismiss="modal" style="padding-right: 15px;padding-top: 5px;">&times;</button>
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <h3 class="modal-title dpink_col"><b>' . $k['company_name'] . '</b></h3><h4 class="modal-title gray_col"><a href="' . $k['comp_website'] . '" target="blank">' . $k['comp_website'] . '</h4>
                            </div>
                            <div class="col-sm-3">  
                                <div id="profile-container" >
                                    <img id="profileImage" style="height:100px;width:100px" src="../images/Company_Images/' . $k['comp_logo'] . '" />
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-9 personal-info">
                            <hr style=" display: block;
                                margin-top: 0.5em;
                                margin-bottom: 0.5em;
                                margin-left: auto;
                                margin-right: auto;
                                border-style: inset;
                                border-width: 2px;">
                        </div>';
        } elseif ($_GET["class"] == "body") {
            echo '<style>
            td,th{
                padding: 5px;
            }
        </style>
        <center><br>
        <table class="table-bordered">
            <tr><th colspan="2">Company Info.</th><th colspan="2">Contact Info.</th></tr>
            <tr><td class="gray_col">Registration No  </td><td>' . $k['comp_reg_no'] . '</td><td class="gray_col">Company E-mail  </td><td>' . $k['comp_mail_id'] . '</td></tr>
            <tr><td class="gray_col">CEO Name  </td><td>' . $k['ceo_name'] . '</td><td class="gray_col">Company Contact No  </td><td>' . $k['comp_mob_no'] . '</td></tr>
            <tr><td class="gray_col">HR Name  </td><td>' . $k['hr_name'] . '</td><td class="gray_col">HR E-mail  </td><td>' . $k['hr_mail_id'] . '</td></tr>
            <tr><td class="gray_col">Technology  </td><td>' . rtrim(str_replace(":", ", ", $k['technology']), ", ") . '</td><td class="gray_col">HR Contact No </td><td>' . $k['hr_mob_no'] . '</td></tr>
            <tr><td class="gray_col">Address  </td><td colspan="3">' . $k['comp_address'] . " - " . $k['pincode'] . ", " . $k['city_name'] . ", " . $k['state_name'] . '</td></tr>
            <tr><td colspan="4"></td></tr>
            <tr><th colspan="4">Placement Info.</th></tr>
            <tr><td class="gray_col">Announce Date  </td><td>' . $k['placement_announcement_date'] . '</td><td class="gray_col">Reg. close Date  </td><td>' . $k['placement_reg_close_date'] . '</td></tr>
            <tr><td class="gray_col">Stipend Amount  </td><td>' . $k['min_stipent_amount'] . '<i class="fa fa-inr"></i></td><td class="gray_col">Min CGPA<sub>(Bechlors)</sub>  </td><td>' . $k['min_cgpa'] . '</td></tr>
            <tr><td class="gray_col">Bond Period  </td><td>' . $k['bond_period'] . ' months</td><td class="gray_col">Min SGPA  </td><td>' . $k['min_sgpa'] . '</td></tr>
            <tr><td class="gray_col">Required Students  </td><td>' . $k['num_required_students'] . '</td><td class="gray_col">Backlogs allowed  </td><td>' . $k['backlogs_allowed'] . '</td></tr>
            <tr><td class="gray_col">Technology  </td><td colspan="3">' . $k['technology_plsmnt'] . '</td></tr>
            <tr><td colspan="4"></td></tr>
            <tr><th colspan="4">Round Info.</th></tr>
        </table><table class="table-bordered">
            <tr class="gray_col"><th>Sr. No.</th><th>Round Name</th><th>Round Description</th><th>Round Date</th><th>Round Weighted</th></tr>
            ' . $round_row . '
        </table><br>
        </center>';
        }
    }

    //-----VERIFY PLACEMENT-----ADMIN SIDE-----
    if (isset($_POST['placement_id_to_verify'])) {
        $q = $con->prepare("UPDATE tbl_placements_data SET status = ? WHERE plsmnt_id = ?");
        $q->bind_param("ss", $_POST['plsmnt_status'], $_POST['placement_id_to_verify']);
        if ($q->execute()) {
            if ($_POST['plsmnt_status'] == 'Approved') {
                $q_pms = $con->prepare("SELECT technology_plsmnt,company_name FROM `tbl_placements_data`"
                        . " JOIN tbl_company_data on tbl_placements_data.comp_id=tbl_company_data.comp_id"
                        . " WHERE plsmnt_id='" . $_POST['placement_id_to_verify'] . "'");
                $q_pms->execute();
                $res_pms = $q_pms->get_result();
                $data_pms = $res_pms->fetch_array();
                $q_stud = $con->prepare("SELECT * FROM `tbl_studentdata`"
                        . " where technology_or_reason LIKE '%" . $data_pms[0] . "%");
                $q_stud->execute();
                $res_stud = $q_stud->get_result();
                require 'sendmail.php';
                while ($data_stud = $res_stud->fetch_assoc()) {
                    $mail_id = $data_stud['email_id'];
                    $message = "<html><body>Dear " . $data_stud['stud_name'] . ",<br> $data_pms[1] has announced the placement recently."
                            . "</body></html>";
                    Email::send("bmiitpms@gmail.com", "Placement Announced", $message, $mail_id);
                }
            }
        }
    }

    //-----APPLY FOR PLACEMENT-----STUDENT SIDE-----
    if (isset($_POST['placement_id_to_apply'])) {
        $q = $con->prepare("INSERT INTO tbl_student_applied_plsmnt (plsment_id,student_id,status) VALUES (?,?,?)");
        $q->bind_param("sis", $_POST['placement_id_to_apply'], $_POST['student_id'], $_POST['plsmnt_status']);
        $q->execute();
    }

    if (isset($_POST['round_id_for_marks'])) {
        $query = "SELECT plsmnt_id,tbl_company_data.company_name,tbl_placements_data.placement_announcement_date,"
                . " tbl_studentdata.stud_id,tbl_studentdata.stud_name,tbl_studentdata.enroll_num"
                . " FROM tbl_student_applied_plsmnt"
                . " JOIN tbl_studentdata on tbl_student_applied_plsmnt.student_id=tbl_studentdata.stud_id"
                . " JOIN tbl_placements_data ON tbl_placements_data.plsmnt_id=tbl_student_applied_plsmnt.plsment_id"
                . " JOIN tbl_company_data ON tbl_placements_data.comp_id=tbl_company_data.comp_id"
                . " WHERE tbl_company_data.comp_id=? AND tbl_placements_data.plsmnt_id=?";
        $q = $con->prepare($query);
        $q->bind_param("is", $_SESSION["Company_ID"], $_SESSION["Placement_ID"]);
        $q->execute();
        $r = $q->get_result();
        $i = 0;
        if ($k = $r->fetch_assoc()) {
            do {
                $q = $con->prepare("select * from tbl_placement_rounds_summary_data "
                        . "where Round_id='" . $_POST['placement_id_to_apply'] . "' and Student_id='" . $_POST['student_id'] . "'");
                $q->execute();
                $result = $q->get_result();
                //$count= mysqli_num_rows($result);
                if ($row = mysqli_fetch_array($result)) {
                    echo '<tr>'
                    . '<td>' . ++$i . '</td>'
                    . '<td>' . $k['enroll_num'] . '</td>'
                    . '<td>' . $k['stud_name'] . '</td>'
                    . '<td id="data_td_input"><input type="number" min="0" style="width:50px" value="' . $row[3] . '"></td>'
                    . '<td><a class = "btn btn-info addMarks" id = "' . $k['stud_id'] . '">Add</a></td>'
                    . '</tr>';
                } else {
                    echo '<tr>'
                    . '<td>' . ++$i . '</td>'
                    . '<td>' . $k['enroll_num'] . '</td>'
                    . '<td>' . $k['stud_name'] . '</td>'
                    . '<td id="data_td_input"><input type="number" min="0" style="width:50px" ></td>'
                    . '<td><a class = "btn btn-info addMarks" id = "' . $k['stud_id'] . '">Add</a></td>'
                    . '</tr>';
                }
            } while ($k = $r->fetch_assoc());
        } else {
            echo "NO DATA FOUND";
        }
    }

    //-----LOG OUT-----
    if (isset($_POST['logout'])) {
        session_start();
        session_destroy();
        session_abort();
    }

    //-----FORGOT PASSWORD-----
}
