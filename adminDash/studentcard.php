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
        <link rel="shortcut icon" href="bmiitlogo.png" type="image/x-icon" />
        <link href="studentcard_assets/css/student_modal.css" rel="stylesheet" type="text/css"/>
        <link href="studentcard_assets/css/style.css" rel="stylesheet" type="text/css"/>        
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
                        $q = $con->prepare("select stud_id,enroll_num,stud_name,mobile,email_id,stud_image from tbl_studentdata order by enroll_num");
                        $q->execute();
                        $r = $q->get_result();
                        while ($k = $r->fetch_array()) {
                            echo '<center><div class="col-sm-4">
                        <div class="block fadeInLeft" data-wow-delay=".3s">
                            <img src="../images/Student_Images/' . $k[5] . '" alt="Student Image">
                            <div class="team-overlay"  id="' . $k[0] . '">
                                <p class="headTitle col_blue">' . $k[2] . '</p>
                                <span class="icon"><i class="fa fa-user-circle"></i></span>
                                <br>
                                <div class="normaltext col_blue">
                                    <span class="bigtext"><i class="fa fa-vcard"></i> &nbsp;&nbsp;' . $k[1] . '</span>
                                    <br><br>
                                    <span><i class="fa fa-phone"></i> &nbsp;&nbsp;' . $k[3] . '</span>
                                    <br><br>
                                    <span><i class="fa fa-envelope"></i>&nbsp;&nbsp;' . $k[4] . '</span>
                                </div>
                            </div>
                        </div>
                        <div class="bigtext">' . $k[2] . '<p> ' . $k[1] . '</p></div>
                    </div></center>';
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
        <script type="text/javascript">
            $(document).ready(function () {
                $('.team-overlay').on('click', function () {
                    var div_id = $(this).attr("id");
                    $('.modal-header').load('../CityFetch.php?student_id=' + div_id + '&class=header');
                    $('.modal_body').load('../CityFetch.php?student_id=' + div_id + '&class=body', function () {
                        $('#myModal').modal({show: true});
                    });
                });
            });
        </script>
    </body>
</html>
