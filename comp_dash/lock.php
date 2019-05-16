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
    <center><img src="companyeditprofile_assets/bmiitlogo.png" alt="" style="width: 80px"/></center>
        <div class="card animated fadeIn">
            <center><img class="animated rollIn" src="lockscreen_assets/img/04.jpg" alt="avatar"></center>
            <hr>
            <div class="name">
                <input type="password" placeholder="Password" name="txt_pass">
            </div>
            <p class="subtitle">Madhav Mansuriya</p>
            <a href="companycard.php" style="text-decoration: none"><p class="location">Login</p></a>
            <center><p><i class="fa fa-coffee gray_col"></i> Beliving in creating a creator</p></center><br>

        </div>
        
<!--         <div class="fixed-plugin" title="Log out">
            <div class="dropdown">
                <a href="logout.html" >
                    <i class="fa fa-power-off blue_col fa-3x logout_button" ></i>
                </a>
            </div>
           
        </div>-->
        <?php
            include './footer.php';
        ?>
    </body>
</html>
