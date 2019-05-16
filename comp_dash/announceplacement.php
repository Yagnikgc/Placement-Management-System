<?php
try {
    if (!isset($_SESSION)) {
        session_start();
    }
    ob_start();
} catch (Exception $ex) {
    
}
$con = new mysqli("localhost", "root", "", "db_pms");
if (isset($_POST['btn_announce_plsmnt'])) {
    $rbd_tech = $_POST['rbd_tech'];
    $txt_stipend_amt = $_POST['txt_stipend_amt'];
    $txt_bond_period = $_POST['txt_bond_period'];
    $txt_num_req_stud = $_POST['txt_num_req_stud'];
    $txt_reg_close_date = $_POST['txt_reg_close_date'];
    $txt_min_cgpa = $_POST['txt_min_cgpa'];
    $txt_min_sgpa = $_POST['txt_min_sgpa'];
    $txt_backlog_allowed = $_POST['txt_backlog_allowed'];
    $txt_num_round = $_POST['txt_num_round'];
    $comp_id = $_SESSION['comp_id'];
    date_default_timezone_set('Asia/Kolkata');
    $announce_date = date("Y-m-d");
    $status = "Announced";
    //-----GENERATE PLACEMENT ID
    $q = $con->prepare("select plsmnt_id from tbl_placements_data "
            . "where comp_id=? "
            . " ORDER BY plsmnt_id DESC");
    $q->bind_param("i", $comp_id);
    $q->execute();
    $data_for_pls_id = $q->get_result();
    $plsmnt_id = "";
    if ($plsmnt_data = $data_for_pls_id->fetch_assoc()) {
        $p_id = substr($plsmnt_data['plsmnt_id'], -1);
        $plsmnt_id = "pls_" . $comp_id . "_" . $announce_date . "_" . ( ++$p_id);
    } else {
        $plsmnt_id = "pls_" . $comp_id . "_" . $announce_date . "_0";
    }
    //------
    $query = $con->prepare("INSERT INTO tbl_placements_data "
            . "(plsmnt_id,technology_plsmnt, min_stipent_amount, bond_period, num_required_students, placement_reg_close_date, "
            . "min_cgpa, min_sgpa, backlogs_allowed, num_of_rounds, "
            . "comp_id, placement_announcement_date, status) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssiiisddiiiss", $plsmnt_id, $rbd_tech, $txt_stipend_amt, $txt_bond_period, $txt_num_req_stud, $txt_reg_close_date
            , $txt_min_cgpa, $txt_min_sgpa, $txt_backlog_allowed, $txt_num_round, $comp_id, $announce_date, $status);
    if ($query->execute()) {
        $txt_round_sr_no = $_POST['txt_round_sr_no'];
        $txt_round_name = $_POST['txt_round_name'];
        $txt_round_date = $_POST['txt_round_date'];
        $txt_round_weighted = $_POST['txt_round_weighted'];
        $txt_round_desc = $_POST['txt_round_desc'];
        $round_status = "Declared";
        $query_round = $con->prepare("INSERT INTO tbl_placement_rounds_data "
                . "(placement_id, company_id, round_number, round_name, round_description, round_date, round_weighted, status) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        for ($i = 0; $i < count($txt_round_name); $i++) {
            $query_round->bind_param("sissssis", $plsmnt_id, $comp_id, $txt_round_sr_no[$i], $txt_round_name[$i], $txt_round_desc[$i], $txt_round_date[$i], $txt_round_weighted[$i], $round_status);
            if (!$query_round->execute()) {
            }
        }
        echo '<script>alert("Placement Announced Successfully.");</script>';
        // header("Location:index.php");
    }
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
        <title>Company | Announce Placement</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <!-- announce placement css start -->
        <link href="announceplacement_assests/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- announce placement css over -->
        <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
    </head>
    <body>
        <?php include './header.php'; ?>
        <div class="modal-wrap">
            <div class="modal-header"><span class="is-active" id="o_1"></span><span id="o_2"></span><span id="o_3"></span></div>
            <div class="modal-bodies">
                <form method="post">
                    <div id="step_1" class="modal-body modal-body-step-1 is-showing">
                        <div class="top_title">Follow steps to anounce placements :</div>
                        <div class="title">Step 1</div>
                        <div class="description text-left">Choose technology</div>
                        <hr style=" display: block;
                            margin-top: -1.5em;
                            margin-bottom: 0.5em;
                            margin-left: auto;
                            margin-right: auto;
                            border-style: inset;
                            border-width: 1px;">
                        <div class="white_col">
                            <?php
                            if ($con) {
                                $q = $con->prepare("SELECT * FROM tbl_technology ORDER BY name");
                                $q->execute();
                                $r = $q->get_result();
                                if ($row = $r->fetch_array()) {
                                    echo '<input type="radio" id="rbd_tech" name="rbd_tech" value=' . "$row[1]" . ' checked=""> ' . "$row[1]" . ' &nbsp;';
                                    while ($row = $r->fetch_array()) {
                                        echo '<input type="radio" id="rbd_tech" name="rbd_tech" value=' . "$row[1]" . '> ' . "$row[1]" . ' &nbsp;';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <hr style=" display: block;
                            margin-top: 0.5em;
                            margin-bottom: 1.5em;
                            margin-left: auto;
                            margin-right: auto;
                            border-style: inset;
                            border-width: 1px;">
                        <input type="number" id="txt_stipend_amt" name="txt_stipend_amt" class="txt_box_num" placeholder="Minimum Stippend Amount" min="0"/>
                        <input type="number" id="txt_bond_period" name="txt_bond_period" class="txt_box_num" placeholder="Bond Period (Months)" min="0"/>
                        <input type="number" id="txt_num_req_stud" name="txt_num_req_stud" class="txt_box_num" placeholder="Number of required students" min="1"/>                        
                        <input type="text" placeholder="Registration close date" class="inp_pad" id="txt_reg_close_date" name="txt_reg_close_date" onfocus="(this.type = 'date')" onblur="if (!this.value)
                                    this.type = 'text'" min="<?php echo date('Y-m-d'); ?>" required>
                        <br>
                        <div class="text-center">
                            <div id="next_button_2" class="button">Next</div> &nbsp;                            
                        </div>
                    </div>
                    <div id="step_2" class="modal-body modal-body-step-2">
                        <div class="title">Step 2</div>
                        <div class="description white_col">Academic Criterias</div>
                        <input type="number" class="txt_box_num" id="txt_min_cgpa" name="txt_min_cgpa" min="0" max="10" step=".01" placeholder="Minimum CGPA"/>
                        <input type="number" class="txt_box_num" id="txt_min_sgpa" name="txt_min_sgpa" min="0" max="10" step=".01" placeholder="Minimum SGPA"/>
                        <input type="number" class="txt_box_num" id="txt_backlog_allowed" name="txt_backlog_allowed" min="0" placeholder="Backlogs Allowed"/>
                        <input type="number" class="txt_box_num"  id="txt_num_round" name="txt_num_round" min="1" placeholder="Number of Rounds will be conducted"/>
                        <div class="text-center fade-in">
                            <div id="previous_button_1" class="btn">Previous</div>
                            <div id="next_button_3" class="button">Next</div>                            
                        </div>
                    </div>
                    <div id="step_3" class="modal-body modal-body-step-3 container-fluid">
                        <div class="title">Step 3</div>
                        <div class="description">Round Details</div>
                        <div id="div_rounds"></div>
                        <div class="text-center">
                            <input type="button" value="Previous" id="previous_button_2" class="btn">&nbsp;
                            <input type="submit" id="btn_announce_plsmnt" name="btn_announce_plsmnt" class="button" value="Announce" id="btn_announce">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- announce placement js start -->
        <script src="announceplacement_assests/js/index.js" type="text/javascript"></script>
        <!-- announce placement js over -->
        <?php
        include './footer.php';
        ob_end_flush();
        ?>
    </body>
</html>