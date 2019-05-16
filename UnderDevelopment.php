<!DOCTYPE html>
<html>
    <head>
        <title>Under Development</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="adminDash/color.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: black">
        <a class="btn-info" href="adminDash/index.php" style="text-decoration: none;font-size: 25px;color: whitesmoke;padding-left: 5px;padding-right: 5px;border-radius: 5px ">Back</a>
        <div class="pull-right" style="background-color: grey;border-radius: 10px 10px 10px;cursor: pointer" title="Log out">
            <div class="dropdown" style="padding: 7px;">
                <a id="btn_logout" title="Log Out" >
                    <i class="fa fa-power-off fa-3x blue_col logout_button"></i>
                </a>
            </div>
        </div>
        <div>
            <center>
                <img src="images/underconstruction.gif" alt="Waiting GIF" style="padding-top: 5%" width="50%" height="50%">                
            </center>
        </div>
        
        <script>
            $(document).ready(function () {
                $("#btn_logout").click(function () {
                    $.ajax({
                        url: "  CityFetch.php",
                        method: "post",
                        data: {'logout': 'logout'},
                        success: function ()
                        {
                            swal({
                                title: "logged out",
                                type: "success",
                                confirmButtonColor: '#e2a4c4',
                            }, function () {
                                window.location.reload();
                                window.location.assign("index.php");
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>