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
<!--        <div>
            <span class="float_left gray_col">Academic years</span>    
            <div class="nav_year">
                <a href="#" class="yrdes"> 2017-18 </a>
                <a href="#" class="yrdes"> 2016-17 </a>
                <a href="#" class="yrdes"> 2015-16 </a>
                <a href="#" class="yrdes"> 2014-15 </a>
            </div>    
        </div>
        <br>--><br>
        <hr class="hrsiz">
        <div>
            <div class="side_nav ">
<!--                <a href="#" ><i class="fa fa-file-text-o"></i> Yearly Report</a>-->
                <a href="reports_company.php" ><i class="fa fa-file-text-o"></i> Company Report</a>
<!--                <a href="#" ><i class="fa fa-file-text-o"></i> Technology Report</a>
                <a href="#" ><i class="fa fa-file-text-o"></i> </a>-->

                <button name="print" class="prnt_btn" id="print" onclick="printDiv();"> Print &nbsp;<i class="fa fa-print"></i></button>
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

                        newWin.document.write('<html><head><style>@page { size: landscape; }table, tr, th, td{border: solid 0.2px gray;padding: 5px;}</style></head><body onload="window.print()">' + $clonedtable.html() + '</body></html>');

                        newWin.document.close();

                        setTimeout(function () {
                            newWin.close();
                        }, 10);

                    }
                </script>
            </div>
            <br>
        </div>
        <div class="" style="height: 450px;overflow:scroll;">
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
                                                    <th colspan="14">
                                            <center><b>Babu Madhav Institute of Information technology</b></center>
                                            </th>
                                            </tr>
                                            <tr>
                                                <th colspan="14"><center><b>Course Name : Integrated MSc.(IT)</b></center></th>
                                            </tr>
                                            <tr>
                                                <th colspan="14"><center><b>Student's Report &nbsp; Batch : 2017-18</b></center></th>
                                            </tr>
                                            <tr>
                                                <th>Enrollment No</th>
                                                <th>Student Name</th>
                                                <th>Birth date</th>
                                                <th>Mobile No</th>
                                                <th>Email Id</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>10<sup>th</sup>(%)</th>
                                                <th>12<sup>th</sup>(%)</th>
                                                <th>B.Sc.(IT) CGPA</th>
                                                <th>Last Semester SGPA</th>
                                                <th>Backlogs</th>
                                                <th>Want placement ?</th>
                                                <th>Technology / Reason</th>                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "select * from tbl_studentdata"
                                                        . " JOIN tbl_citylist on tbl_studentdata.city=tbl_citylist.city_id"
                                                        . " JOIN tbl_state on tbl_citylist.state_id=tbl_state.state_id"
                                                        . " order by enroll_num";
                                                $q = $con->prepare($query);
                                                //$q->bind_param("s", $_POST["student_id"]);
                                                $q->execute();
                                                $r = $q->get_result();
                                                while ($k = $r->fetch_assoc()) {
                                                    echo '<tr>'
                                                    . '<td>' . $k['enroll_num'] . '</td>'
                                                    . '<td>' . ucwords(strtolower($k['stud_name'])) . '</td>'
                                                    . '<td>' . $k['birth_date'] . '</td>'
                                                    . '<td>' . $k['mobile'] . '</td>'
                                                    . '<td>' . $k['email_id'] . '</td>'
                                                    . '<td>' . ucwords(strtolower($k['city_name'])) . '</td>'
                                                    . '<td>' . ucwords(strtolower($k['state_name'])) . '</td>'
                                                    . '<td>' . $k['ssc_per'] . '</td>'
                                                    . '<td>' . $k['hsc_per'] . '</td>'
                                                    . '<td>' . $k['cgpa_bachelor'] . '</td>'
                                                    . '<td>' . $k['sgpa_last_sem'] . '</td>'
                                                    . '<td>' . $k['kts_till_now'] . '</td>'
                                                    . '<td>' . ucwords(strtolower($k['want_placement'])) . '</td>'
                                                    . '<td>' . rtrim(str_replace(":", ", ", $k['technology_or_reason']),", ") . '</td>'
                                                    . '</tr>';
                                                }
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
            });
        </script>
        <?php
// put your code here
        ?>
        <?php include './footer.php'; ?>
    </body>
</html>
