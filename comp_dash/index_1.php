<?php include('header.php'); ?>
<html>
    <head>
        <title>Company | Edit Profile</title>
    </head>
    <body>

        <div class="">
            <div class="">
                <!-- left column -->
                <!-- edit form column -->
                <div class="">
                    <div class="">
                        <div class="">
                            <div class="col-sm-5">
                                <h2 style="padding-left: 2%" class="gray_col"><i class="fa fa-pencil"></i>&nbsp; Edit Profile</h2>
                                <div class="form-horizontal form-group" style="margin-top: 10%">
                                    <label class="col-lg-4 control-label">Company name :</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" value="RU Infotech">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center" style="vertical-align: central">
                                    <p><h3 class="gray_col" ><b>RU Infotech pvt.ltd</b></h3></p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <!--Image Upload code-->
                                
                                <title>Change Profile</title>
                                <script src="dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
                                <script src="dist_files/jquery.form.js"></script>
                                <link rel="stylesheet" href="dist_files/imgareaselect.css">
                                <script src="functions.js"></script>


                                <div class="">
                                    <div>
                                        <img class="img-circle" id="profile_picture" height="128" src="default.jpg"  data-holder-rendered="true" style="width: 140px; height: 140px;"/>
                                        <br><br>
                                        <a type="button" class="btn btn-primary" id="change-profile-pic">Change Profile Picture</a>
                                    </div>
                                    <div id="profile_pic_modal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3>Change Profile Picture</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="cropimage" method="post" enctype="multipart/form-data" action="change_pic.php">
                                                        <strong>Upload Image:</strong> <br><br>
                                                        <input type="file" name="profile-pic" id="profile-pic" />
                                                        <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
                                                        <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                                                        <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                                                        <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                                                        <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                                                        <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                                                        <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                                                        <input type="hidden" name="action" value="" id="action" />
                                                        <input type="hidden" name="image_name" value="" id="image_name" />

                                                        <div id='preview-profile-pic'></div>
                                                        <div id="thumbs" style="padding:5px; width:600p"></div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" id="save_crop" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--Image Upload code over-->

                            </div>
                        </div>
                    </div>
                    <br> 
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
                        <div class="">
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
    </body>
</html>


<?php
?>
<?php include './footer.php'; ?>
