<?php
$con = new mysqli("localhost", "root", "", "db_pms");
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="report_assets/css/report.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div>
            <div class="side_nav ">
                <form method="post">
                    <select id="dd_company_name" name="dd_company_name">
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
                    <select id="dd_placement" name="dd_placement">
                        <option value="" disabled selected>Placement Announce Date</option>
                    </select>
                    <input type="submit" value="Generate Attendence Sheet" name="generate_sheet">
                    <button name="print" class="prnt_btn" id="print" onclick="printDiv();"> Print &nbsp;<i class="fa fa-print"></i></button>
                </form>
                <script>
                    function printDiv()
                    {
                        var newWin = window.open('', 'Print-Window');
                        $().remove('');
                        newWin.document.open();

                        var $clonedtable = $('#printableArea').clone();

                        $clonedtable.children().eq(0).children().eq(0).remove();
                        $clonedtable.children().eq(0).children().eq(1).remove();

                        //alert($clonedtable.children().eq(1).children().html());

                        newWin.document.write('<html><head><style>table, tr, th, td{border: solid 0.2px gray;padding: 5px;}</style></head><body onload="window.print()">' + $clonedtable.html() + '</body></html>');

                        newWin.document.close();

                        setTimeout(function () {
                            newWin.close();
                        }, 10);

                    }
                </script>
            </div>
            <br>
        </div>
        <?php
        if (isset($_POST['generate_sheet'])) {
            $query = "SELECT tbl_company_data.company_name,tbl_placements_data.placement_announcement_date,tbl_studentdata.stud_name,tbl_studentdata.enroll_num"
                    . " FROM tbl_student_applied_plsmnt"
                    . " JOIN tbl_studentdata on tbl_student_applied_plsmnt.student_id=tbl_studentdata.stud_id"
                    . " JOIN tbl_placements_data ON tbl_placements_data.plsmnt_id=tbl_student_applied_plsmnt.plsment_id"
                    . " JOIN tbl_company_data ON tbl_placements_data.comp_id=tbl_company_data.comp_id"
                    . " WHERE tbl_company_data.comp_id=? AND tbl_placements_data.plsmnt_id=?";
            $q = $con->prepare($query);
            $q->bind_param("is", $_POST["dd_company_name"], $_POST["dd_placement"]);
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
                                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0">

                                                    <thead>
                                                        <tr>
                                                            <th colspan="5"><center>
                                                        <b>Babu Madhav Institute of Information technology</b>
                                                    </center></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5"><center><b>Course Name : Integrated MSc.(IT)</b></center></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"><center><b>Company Name : <?php echo $k['company_name']; ?> </b></center></th><th colspan="3"><center><b>Placement Announced On : <?php echo $k['placement_announcement_date']; ?></b></center></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5"><center><b>Attendance Sheet</b></center></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Sr. No</th>
                                                        <th>Enrollment No</th>
                                                        <th>Student Name</th>
                                                        <th style="width: 120px"></th>
                                                        <th style="width: 120px"></th> 
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        do {
                                                            echo '<tr>'
                                                            . '<td>' . ++$i . '</td>'
                                                            . '<td>' . $k['enroll_num'] . '</td>'
                                                            . '<td>' . $k['stud_name'] . '</td>'
                                                            . '<td></td><td></td>'
                                                            . '</tr>';
                                                        } while ($k = $r->fetch_assoc());
                                                        ?>
                                                    </tbody>
                                                </table>                                        
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
        } else {
            echo "NO DATA FOUND";
        }
        ?>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatables').DataTable({
                    "pagingType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                    }
                });
                var table = $('#datatables').DataTable();
                // Edit record
                table.on('click', '.edit', function () {
                    $tr = $(this).closest('tr');
                    if ($tr.hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }

                });
                // Delete a record
                table.on('click', '.remove', function (e) {
                    $tr = $(this).closest('tr');
                    table.row($tr).remove().draw();
                    e.preventDefault();
                });
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
            });
        </script>
        <?php
// put your code here
        ?>
        <?php include './footer.php'; ?>
    </body>
</html>
