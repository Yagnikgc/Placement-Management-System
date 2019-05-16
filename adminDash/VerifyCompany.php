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
        <title>Admin | Student Details</title>
        <link rel="shortcut icon" href="../images/bmiitlogo.png" type="image/x-icon" />
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
        <section id="team">
            <div class="">
                <div class="">
                    <?php
                    if ($con) {
                        $q = $con->prepare("select comp_id,company_name,comp_reg_no,ceo_name,hr_name,comp_website,comp_logo from tbl_company_data where comp_status='Registered' order by comp_reg_date");
                        $q->execute();
                        $r = $q->get_result();
                        if ($k = $r->fetch_array()) {
                            do {
                                echo '<center><div class="col-sm-4">
                        <div class="block fadeInLeft" data-wow-delay=".3s">
                            <img src="../images/Company_Images/' . $k[6] . '" alt="Company Image">
                            <div class="team-overlay" id="' . $k[0] . '">
                                <p class="headTitle col_blue">' . $k[1] . '</p>
                                <span class="icon">&nbsp;&nbsp;<i class="fa fa-black-tie"></i></span>
                                <br>
                                <div class="normaltext col_blue">
                                    <p><span class="normaltext"><i class="fa fa-vcard"></i> Reg. No : ' . $k[2] . '</span></p>                                                                        
                                    <p><span class="normaltext"><i class="fa fa-user"></i> CEO : ' . $k[3] . '</span></p>
                                    <p><span class="normaltext"><i class="fa fa-user"></i> HR : ' . $k[4] . '</span></p>
                                </div>
                            </div>
                        </div>
                        <p><div class="col-sm-2"></div><div id="' . $k[0] . '" class="col-sm-4 text-danger"><b class="hover_pointer"><i class="fa fa-close"></i> Reject</b></div><div id="' . $k[0] . '" class="col-sm-4 text-success"><b class="hover_pointer"><i class="fa fa-check"></i> Approve</b></div></p><br>
                        <div class="bigtext">' . $k[1] . '<br><a href="' . $k[5] . '" target="blank"> ' . $k[5] . '</a></div>
                    </div></center>';
                            } while ($k = $r->fetch_array());
                        } else {
                            echo '<center><h2 class="dpink_col"><i class="fa fa-dropbox gray_col" style="font-size:45px"></i><br><br> NO COMPANIES IN QUEUE.</h2></center>';
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
                    $('.modal-header').load('../CityFetch.php?company_id=' + div_id + '&class=header');
                    $('.modal_body').load('../CityFetch.php?company_id=' + div_id + '&class=body', function () {
                        $('#myModal').modal({show: true});
                    });
                });
                $('.text-danger').on('click', function () {
                    var div_id = $(this).attr("id");
                    $.ajax({
                        url: "../CityFetch.php",
                        method: "post",
                        data: {comp_id_to_verify: div_id, comp_status: "Rejected"},
                        success: function (data)
                        {
                            swal({
                                title: "Company Declined !",
                                type: "error",
                                confirmButtonColor: '#e2a4c4',
                            }, function () {
                                window.location.assign("VerifyCompany.php");
                            });
                        }
                    });
                });
                $('.text-success').on('click', function () {
                    var div_id = $(this).attr("id");
                    $.ajax({
                        url: "../CityFetch.php",
                        method: "post",
                        data: {comp_id_to_verify: div_id, comp_status: "Approved"},
                        success: function (data)
                        {
                            swal({
                                title: "Good job !",
                                text: "Company Approved",
                                type: "success",
                                confirmButtonColor: '#e2a4c4',
                            }, function () {
                                window.location.assign("VerifyCompany.php");
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
