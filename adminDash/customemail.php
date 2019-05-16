<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Custom Mail</title>
        <link rel="shortcut icon" href="../images/bmiitlogo.png" type="image/x-icon" />
        <link rel="stylesheet" href="team_assets/assets/css/style.css">
        <link rel="stylesheet" href="team_assets/assets/css/animate.min.css">
        <link href="HTML/css/global/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include './header.php'; ?>
        <div class="  animated wow fadeInLeft clearfix" style="background-color: gray">
            <div class=" pull-center">

                <div class="">

                    <div class="" style="color: white">
                        <br><br>
                        <center> <p style='font-size:30px;color: #29166f'>E-Mail &nbsp; <i class="fa fa-envelope-open gray_col"></i></center><br>
                        <form class="center-block " style="width: 70%">
                            <div class="">
                                <p style='font-size: 18px'>From : </p>
                                <input type="email" class="form-control " placeholder="From : " value="bmiitpms@gmail.com" readonly style="width: 100%">
                            </div>
                            <div class="">
                                <p style='font-size: 20px'>To : </p>
                                <input type="email" class="form-control " placeholder="To : " style="width: 100%" required>
                            </div>
                            <div class="">
                                <p style='font-size: 20px'>Subject : </p>
                                <input type="text" class="form-control" placeholder="Subject" style="width: 100%">
                            </div>
                            <div class="">
                                <textarea class="form-control " rows="5" placeholder=" Your message" style="width: 100%"></textarea>
                            </div>
                            <div class="">
                                <p style='color: white;font-size: 20px'>Attachments : </p>
                                <input type="file" class="form-control" multiple="" style="width: 100%">
                            </div>

                            <br><br>
                            <div class="g-text-center--xs" style="margin-left: 20px">
                                <button type="submit" class="" style="background-color: lightgrey;font-size: 20px;border-color: #d25b99;outline: none;height: 15%;width: 50%;"><i class="fa fa-send dpink_col"></i>&nbsp; Send</button>
                            </div>

                        </form>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <?php include './footer.php'; ?>
    <script>
        new WOW().init();
    </script>

</body>
</html>
