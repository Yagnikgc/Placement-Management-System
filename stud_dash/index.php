<?php

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
        <title>Student | Placement Details</title>
        <link rel="icon" type="" href="../images/bmiitlogo.png">
        <link href="studentcard_assets/css/student_modal.css" rel="stylesheet" type="text/css"/>
        <link href="studentcard_assets/css/style.css" rel="stylesheet" type="text/css"/>   
        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
    <center>
        <h2 class="gray_col">Placement Anounced  by :</h2>
    </center>
    <section id="team">
        <div class="">
            <div class="">
                <?php
                if ($con) {
                    $q = $con->prepare("SELECT plsmnt_id,technology_plsmnt,comp_website,num_required_students,company_name,comp_logo,placement_announcement_date"
                            . " FROM tbl_placements_data JOIN tbl_company_data on tbl_placements_data.comp_id=tbl_company_data.comp_id"
                            . " where status='Approved' order by placement_announcement_date");
                    $q->execute();
                    $r = $q->get_result();
                    if ($k = $r->fetch_assoc()) {
                        do {
                            $query_check = $con->prepare("select count(plsment_id) from tbl_student_applied_plsmnt where plsment_id=? and student_id=?");
                            $query_check->bind_param("si", $k['plsmnt_id'],$_SESSION['stud_id']);
                            $query_check->execute();
                            $result_check = $query_check->get_result();
                            $get_counter = $result_check->fetch_array();
                            if ($get_counter[0] == 0) {
                                echo '<center><div class="col-sm-4">
                        <div class="block fadeInLeft" data-wow-delay=".3s">
                            <img src="../images/Company_Images/' . $k['comp_logo'] . '" alt="Company Image">
                            <div class="team-overlay" id="' . $k['plsmnt_id'] . '">
                                <p class="headTitle col_blue">' . $k['company_name'] . '</p>
                                <span class="icon">&nbsp;&nbsp;<i class="fa fa-black-tie"></i></span>
                                <br>
                                <div class="normaltext col_blue">
                                    <p><span class="normaltext"><i class="fa fa-calendar"></i> Announce Date : ' . $k['placement_announcement_date'] . '</span></p>                                                                        
                                    <p><span class="normaltext"><i class="fa fa-laptop"></i> Technology : ' . $k['technology_plsmnt'] . '</span></p>
                                    <p><span class="normaltext"><i class="fa fa-user"></i> Required Students : ' . $k['num_required_students'] . '</span></p>
                                </div>
                            </div>
                        </div>
                        <p><div class="col-sm-4"></div><div id="' . $k['plsmnt_id'] . '" itemid="' . $_SESSION['stud_id'] . '" class="col-sm-4 text-success"><b class="hover_pointer"><i class="fa fa-check"></i> Apply</b></div></p><br>
                        <div class="bigtext">' . $k['company_name'] . '<br><a href="' . $k['comp_website'] . '" target="blank"> ' . $k['comp_website'] . '</a></div>
                    </div></center>';
                            }
                        } while ($k = $r->fetch_array());
                    } else {
                        echo '<center><h2 class="dpink_col"><i class="fa fa-dropbox gray_col" style="font-size:45px"></i><br><br> PLACEMENT NOT ANNOUNCED YET.</h2></center>';
                    }
                }
                ?>                    
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-backdrop="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal_body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
    <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.team-overlay').on('click', function () {
                var div_id = $(this).attr("id");
                $('.modal-header').load('../CityFetch.php?placement_id=' + div_id + '&class=header');
                $('.modal_body').load('../CityFetch.php?placement_id=' + div_id + '&class=body', function () {
                    $('#myModal').modal({show: true});
                });
            });
            $('.text-success').on('click', function () {
                var plsmnt_id = $(this).attr("id");
                var stud_id = $(this).attr("itemid");
                $.ajax({
                    url: "../CityFetch.php",
                    method: "post",
                    data: {'placement_id_to_apply': plsmnt_id, 'student_id':stud_id, 'plsmnt_status': "Applied"},
                    success: function (data)
                    {
                        swal({
                            title: "Good job !",
                            text: "Placement Applied",
                            type: "success",
                            confirmButtonColor: '#e2a4c4',
                        }, function () {
                            window.location.reload();
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
