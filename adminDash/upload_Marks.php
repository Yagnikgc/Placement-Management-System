<?php
$con = new mysqli("localhost", "root", "", "db_pms");
if (session_status() == PHP_SESSION_ACTIVE)
    session_start();
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
        <title>Admin | Reports</title>
        <link rel="shortcut icon" href="bmiitlogo.png" type="image/x-icon" />
        <link rel="shortcut icon" href="bmiitlogo.png" type="image/x-icon" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="report_assets/css/report.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div>
            <div class="side_nav ">
                <form method="post">
                    <select id="dd_company_name" name="dd_company_name" required>
                        <option value="" disabled selected>Select Company</option>
                        <?php
                        if ($con) {
                            $q = $con->prepare("select * from tbl_company_data where comp_status='Approved' order by company_name");
                            $q->execute();
                            $r = $q->get_result();
                            while ($k = $r->fetch_array()) {
                                echo "<option value='" . $k[0] . "'>$k[1]</option>";
                            }
                        }
                        ?>
                    </select>
                    <select id="dd_placement" name="dd_placement" required>
                        <option value="" disabled selected>Placement Announce Date</option>
                    </select>
                    <select id="dd_round" name="dd_round" required>
                        <option value="" disabled selected>Round Name</option>
                    </select>
                    <input type="submit" value="Get Student List" name="get_students">
                </form>                
            </div>
            <br>
        </div>
        <?php
        $company_name = '';
        $plsmnt_date = '';
        $round_status = '';
        if (isset($_POST['get_students'])) {

            $q_company = $con->prepare('SELECT company_name FROM tbl_company_data where comp_id=' . $_POST['dd_company_name']);
            $res = $q_company->execute();
            $res = $q_company->get_result();
            $result = $res->fetch_array();
            $company_name = $result[0];

            $q_company = $con->prepare('SELECT placement_announcement_date FROM tbl_placements_data where plsmnt_id="' . $_POST['dd_placement'] . '"');
            $res = $q_company->execute();
            $res = $q_company->get_result();
            $result = $res->fetch_array();
            $plsmnt_date = $result[0];

            $q_company = $con->prepare('SELECT round_id,status,round_weighted FROM tbl_placement_rounds_data where round_id=' . $_POST['dd_round']);
            $res = $q_company->execute();
            $res = $q_company->get_result();
            $result = $res->fetch_array();
            $round_id = $result[0];
            if (!isset($_SESSION['round_id']))
                $_SESSION['round_id'] = $round_id;
            $round_status = $result[1];
            $round_weighted = $result[2];
            $query = '';
            if ($round_status == 'Declared') {
                $query = "SELECT tbl_studentdata.stud_id,tbl_studentdata.enroll_num,tbl_studentdata.stud_name "
                        . "FROM tbl_student_applied_plsmnt JOIN tbl_studentdata "
                        . "on student_id=tbl_studentdata.stud_id "
                        . "WHERE tbl_student_applied_plsmnt.plsment_id=?";
                $q = $con->prepare($query);
                $q->bind_param("s", $_POST["dd_placement"]);
            } elseif ($round_status == 'Completed') {
                echo "<h3>Round Completed</h3>";
                $query = "SELECT * FROM tbl_studentdata"
                        . " JOIN tbl_placement_rounds_summary_data"
                        . " ON tbl_placement_rounds_summary_data.Student_id=tbl_studentdata.stud_id"
                        . " WHERE tbl_placement_rounds_summary_data.Round_id=?";
                $q = $con->prepare($query);
                $q->bind_param("i", $round_id);
            }
            $q->execute();
            $r = $q->get_result();
            $i = 0;
            if ($k = $r->fetch_assoc()) {
                ?>
                <div class="" style="height: 450px;">
                    <div class="">
                        <div class="">
                            <div class="col-md-12" style="width: auto">
                                <div class="card">
                                    <div class="content">
                                        <div class="fresh-datatables">
                                            <div id="printableArea"> 
                                                <form method="post">
                                                    <table id="" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5"><center>
                                                            <b>Babu Madhav Institute of Information technology</b>
                                                        </center></th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="6"><center><b>Course Name : Integrated MSc.(IT)</b></center></th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2"><center><b>Company Name : <span class="gray_col"><?php echo $company_name; ?></span> </b></center></th>
                                                        <th colspan="4"><center><b>Placement Announced On :<span class="gray_col"> <?php echo $plsmnt_date; ?></span></b></center></th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="6"><center><b>Evolution Sheet</b></center></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Sr. No</th>
                                                            <th>Enrollment No</th>
                                                            <th>Student Name</th>
                                                            <th>Marks / <?php echo $round_weighted; ?></th>                                                    
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            do {
                                                                echo '<tr>'
                                                                . '<td>' . ++$i . '</td>'
                                                                . '<td>' . $k['enroll_num'] . '</td>'
                                                                . '<td>' . $k['stud_name'] . '</td>';
                                                                if ($round_status == 'Declared') {
                                                                    echo '<td><input type="hidden" name="stud_id[]" value="' . $k['stud_id'] . '">'
                                                                    . '<input type="number" name="stud_mark[]" min="0" max="' . $round_weighted . '" style="width:60px" required></td>';
                                                                } elseif ($round_status == 'Completed') {
                                                                    echo '<td>'
                                                                    . '<input type="number" style="width:60px" value="'.$k['Marks'].'" readonly></td>';
                                                                }
                                                                echo '</tr>';
                                                            } while ($k = $r->fetch_assoc());
                                                            ?>
                                                            <tr><td colspan="3"></td>
                                                                <td><input type="submit" name="btn_upload_marks" value="Upload Marks"></td></tr>
                                                        </tbody>
                                                    </table>                                        
                                                </form>

                                            </div>
                                        </div>
                                    </div><!-- end content-->
                                </div><!--  end card  -->
                            </div> <!-- end col-md-12 -->
                        </div> <!-- end row -->
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['btn_upload_marks'])) {
            //echo '<script>alert("Marks uploaded Successfully.");</script>';die();
            $stud_id = $_POST['stud_id'];
            $marks = $_POST['stud_mark'];
            if (isset($_SESSION['round_id']))
                $round_id = $_SESSION['round_id'];
            for ($index = 0; $index < count($stud_id); $index++) {
                $q_insert = $con->prepare("INSERT INTO `tbl_placement_rounds_summary_data`"
                        . " (`Round_id`, `Student_id`, `Marks`) "
                        . "VALUES ($round_id, $stud_id[$index], $marks[$index])");
                $q_insert->execute();
            }
            $q_update = $con->prepare("UPDATE tbl_placement_rounds_data"
                    . " SET status = 'Completed'"
                    . " WHERE round_id=" . $round_id);
            $q_update->execute();
            if ($q_update)
                echo '<script>alert("Marks uploaded Successfully.");</script>';
            else
                echo '<script>alert("Marks uploading Failed.");</script>';
        }
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#dd_company_name').change(function () {
                    var val = $(this).val();
                    $.ajax({
                        url: "../CityFetch.php",
                        method: "post",
                        data: {"dd_company_name": val},
                        success: function (data)
                        {
                            $('#dd_placement').html(data);
                        }
                    });
                });
                $('#dd_placement').change(function () {
                    var val = $(this).val();
                    $.ajax({
                        url: "../CityFetch.php",
                        method: "post",
                        data: {"dd_placement_id": val},
                        success: function (data)
                        {
                            $('#dd_round').html(data);
                        }
                    });
                });
            });
        </script>
        <?php include './footer.php'; ?>
    </body>
</html>
