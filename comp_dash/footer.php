<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    </div>
</div>

<div class="fixed-plugin" title="Log out" style="cursor: pointer" title="LOG OUT">
    <div class="dropdown">
        <a id="btn_logout" title="Log Out" >
            <i class="fa fa-power-off fa-3x blue_col logout_button" ></i>
        </a>
    </div>
</div>

<?php
// put your code here
?>
<script>
    $(document).ready(function () {
        $("#btn_logout").click(function () {
            $.ajax({
                url: "../CityFetch.php",
                method: "post",
                data: {'logout': 'logout'},
                success: function ()
                {
                    swal({
                        title: "Good job!",
                        text: "User successfully logged out.",
                        type: "success",
                        confirmButtonColor: '#e2a4c4',
                    }, function () {
                        window.location.reload();
                        window.location.assign("../login.php");
                    });
                }
            });
        });
    });
</script>
</div>
</body>
</html>