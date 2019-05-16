<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student | Company</title>
        <link rel="shortcut icon" href="../images/bmiitlogo.png" type="image/x-icon" />
        <!-- company company_assets css links -->
        <link rel="stylesheet" href="company_assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="company_assets/css/style.css">
        <link rel="stylesheet" href="company_assets/css/animate.min.css">
        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <!-- company company_assets css links over -->
    </head>
    <body>
        <?php include './header.php'; ?>
        <div id="banners"></div>
        <div class="container-fluid">
            <div class="text-center">
                <h3 class="dpink_col"><i class="fa fa-check gray_col"></i>&nbsp; Approved Companies</h3>
            </div>
            <div class="col-sm-12">
                <?php
                if ($con) {
                    $q = $con->prepare("select comp_id,company_name,comp_website,comp_logo from tbl_company_data where comp_status='Approved' order by comp_reg_date");
                    $q->execute();
                    $r = $q->get_result();
                    $i = 0;
                    $fade_class = "";
                    if ($k = $r->fetch_array()) {
                        do {
                            if ($i % 2 == 0) {
                                $fade_class = "fadeInLeft";
                            } else {
                                $fade_class = "fadeInRight";
                            }
                            echo '<div class="col-md-6"><div id="' . $k[0] . '" class="blockquote-box animated wow ' . $fade_class . ' clearfix">
                        <div class="square block  pull-left">
                            <img src="../images/Company_Images/' . $k[3] . '" alt="Company Logo" class="image" >
                        </div>
                        <h4>
                            ' . $k[1] . '
                        </h4>
                        <div id="' . $k[0] . '" class="text-danger pull-right hover_pointer"><i class="fa fa-close"></i>&nbsp; Reject&nbsp;&nbsp;&nbsp;</div>
                        <p>
                            <a href="' . $k[2] . '" target="blank"> ' . $k[2] . '</a>
                        </p>
                    </div></div>';
                            $i++;
                        } while ($k = $r->fetch_array());
                    } else {
                        echo '<center><h5 class="text-danger"><i class="fa fa-dropbox gray_col" style="font-size:30px"></i><br><br> NO COMPANIES APPROVED.</h5></center>';
                    }
                }
                ?>
            </div>
            <hr style=" display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 2px;">
            <div class="text-center">
                <h3 class="dpink_col"><i class="fa fa-close gray_col"></i>&nbsp; Rejected Companies</h3>
            </div>
            <div class="col-sm-12">
                <?php
                if ($con) {
                    $q = $con->prepare("select comp_id,company_name,comp_website,comp_logo from tbl_company_data where comp_status='Rejected' order by comp_reg_date");
                    $q->execute();
                    $r = $q->get_result();
                    $i = 0;
                    $fade_class = "";
                    if ($k = $r->fetch_array()) {
                        do {
                            if ($i % 2 == 0) {
                                $fade_class = "fadeInLeft";
                            } else {
                                $fade_class = "fadeInRight";
                            }
                            echo '<div class="col-md-6"><div id="' . $k[0] . '" class="blockquote-box animated wow ' . $fade_class . ' clearfix">
                        <div class="square block pull-left">
                            <img src="../images/Company_Images/' . $k[3] . '" alt="Company Logo" class="image" >
                        </div>
                        <h4>
                            ' . $k[1] . '
                        </h4>
                        <div id="' . $k[0] . '" class="text-success pull-right hover_pointer"><i class="fa fa-check"></i>&nbsp; Approve&nbsp;&nbsp;&nbsp;</div>
                        <p>
                            <a href="' . $k[2] . '" target="blank"> ' . $k[2] . '</a>
                        </p>
                    </div></div>';
                            $i++;
                        } while ($k = $r->fetch_array());
                    } else {
                        echo '<center><h5 class="text-danger"><i class="fa fa-dropbox gray_col" style="font-size:30px"></i><br><br> NO COMPANIES APPROVED.</h5></center>';
                    }
                }
                ?>
            </div>
        </div>
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
        <?php include './footer.php'; ?>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.blockquote-box').on('click', function () {
                    var div_id = $(this).attr("id");
                    $('.modal-header').load('../CityFetch.php?company_id=' + div_id + '&class=header');
                    $('.modal_body').load('../CityFetch.php?company_id=' + div_id + '&class=body', function () {
                        $('#myModal').modal({show: true});
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
                                    window.location.assign("Company.php");
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
                                    window.location.reload();
                                    window.location.assign("Company.php");
                                });
                            }
                        });
                    });
                });
            });
        </script>
        <?php include './footer.php'; ?>
    </body>
</html>
