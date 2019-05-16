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
        <link rel="icon" type="" href="../images/bmiitlogo.png">
        <!-- company company_assets css links -->
        <link rel="stylesheet" href="company_assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="company_assets/css/style.css">
        <link rel="stylesheet" href="company_assets/css/animate.min.css">
        <!-- company company_assets css links over -->
    </head>
    <body>
        <?php include './header.php'; ?>
        <div id="banners"></div>
        <div class="container-fluid">
            <div class="col-sm-12">
                <h2 class="dpink_col"><i class="fa fa-building"></i>&nbsp;&nbsp;Companies</h2><hr>
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
        <script type="text/javascript">
            $(document).ready(function () {
                $('.blockquote-box').on('click', function () {
                    var div_id = $(this).attr("id");
                    $('.modal-header').load('../CityFetch.php?company_id=' + div_id + '&class=header');
                    $('.modal_body').load('../CityFetch.php?company_id=' + div_id + '&class=body', function () {
                        $('#myModal').modal({show: true});
                    });
                });
            });
        </script>
    </body>
</html>
