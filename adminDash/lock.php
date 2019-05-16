<?php
session_start();
$con = new mysqli("localhost", "root", "", "db_pms");
if (isset($_SESSION['userName'])) {
    $enroll = $_SESSION['userName'];
    $q = "SELECT stud_name,stud_image,password FROM `tbl_studentdata` where enroll_num=?";
    $q = $con->prepare($q);
    $q->bind_param("s", $enroll);
    $q->execute();
    $r = $q->get_result();
    $k = $r->fetch_array();
    $uName = $k[0];
    $uImg = $k[1];
    $uPwd = $k[2];
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
        <title>Lock</title>
        <link rel="stylesheet" type="text/css" href="lockscreen_assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="lockscreen_assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="lockscreen_assets/css/animate.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body style="align-items: center">
        <div class="card animated fadeIn">
            <center><img class="center animated rollIn" src="../images/Student_Images/<?php echo $uImg; ?>" alt="profile Image"></center>
            <hr>
            <form action="index.php" method="post">
                <div class="name">
                    <input type="password" placeholder="Password" name="txt_pass">
                </div>
                <p class="subtitle">BMIIT</p>
                <center>
                    <input type="submit" id="btn_logIn" class="location" style="text-decoration: none" value="Log In">
                    <p>Beliving in creating a creator</p>
                </center><br>
            </form>
        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
