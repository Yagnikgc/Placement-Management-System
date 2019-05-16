<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Company | Edit Profile</title>
        <link href="color.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link href="companyeditprofile_assets/change_image_avatar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include './header.php'; ?>
       	<div class="">
            <div class="">
                <!-- left column -->


                <!-- edit form column -->
                <div class="">


                    <div class="">
                        <div class="col-sm-12">
                            <div class="col-sm-5" >
                                <h2 style="padding-left: 2%" class="gray_col">Edit Profile</h2>
                                <div class="form-horizontal form-group">
                                    <label class="col-lg-4 control-label">Company name :</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="RU Infotech">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="pull-right" style="vertical-align: central">
                                    <p><h3 class="gray_col" ><b>RU Infotech pvt.ltd</b></h3></p>
                                </div>
                            </div>

                            <div class="col-md-3" >
                                <center>
                                    <center>
                                        <div id="profile-container" style="vertical-align:middle">
                                            <image id="profileImage" src="companyeditprofile_assets/240_F_122166154_muXwOgXxi0A6p5dQaxPiBK2HeWTwJpGv.jpg" />
                                        </div>
                                        <input id="imageUpload" type="file" 
                                               name="profile_photo" placeholder="Photo" required="" capture>
                                        <script src="companyeditprofile_assets/imgupload.js" type="text/javascript"></script>
                                    </center>
                                </center>
                                <br>
                                <center><h5 class="dpink_col">Upload a different photo...</h5></center>
                            </div>
                        </div>

                    </div>
                    <!-- left column -->
                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <hr style=" display: block;
                            margin-top: 0em;
                            margin-bottom: 0.5em;
                            margin-left: auto;
                            margin-right: auto;
                            border-style: inset;
                            border-width: 2px;">
                    </div>
                    <form class="form-horizontal" role="form">
                        <div class="col-sm-6">
                            <h3 class="dpink_col">company info</h3>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Registration No :</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" disabled="" value="0300040">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Ceo Name :</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" value="XYZ PQR">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">HR Name :</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text"  value="gyyfyjjf">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Technology :</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" value="Please add group check box">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="dpink_col">Contact info</h3>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Web Address :</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="url" value="https://www.google.com">
                                </div>
                            </div> <div class="form-group">
                                <label class="col-md-3 control-label">company Email :</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" value="xyz@pqr.com">
                                </div>
                            </div> <div class="form-group">
                                <label class="col-md-3 control-label">HR Email :</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" value="abc@mno.com">
                                </div>
                            </div> <div class="form-group">
                                <label class="col-md-3 control-label">HR contact no:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="number" value="0000000000">
                                </div>
                            </div> <div class="form-group">
                                <label class="col-md-3 control-label">Company Contact :</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="number" value="0000000000">
                                </div>
                            </div> 

                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <span class="text-center dpink_col"><h3>Company Address</h3></span>
                            </div>
                            <div class="col-sm-8">
                                <hr style=" display: block;
                                    margin-top: 2.5em;
                                    margin-bottom: 1.5em;
                                    margin-left: auto;
                                    margin-right: auto;
                                    border-style: inset;
                                    border-width: 1px;" >
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Address :</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pincode :</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" placeholder="please add drop down here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">State :</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" value="" placeholder="add dropdown here">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">City :</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" value="" placeholder="add dropdown here">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <br><br>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4" >
                                <div class="form-group">
                                    <div class="pull-center">
                                        <input type="button" class="btn btn-primary " value="Save Changes">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-4"></div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>

        <?php
        ?>
        <?php include './footer.php'; ?>
    </body>
</html>
