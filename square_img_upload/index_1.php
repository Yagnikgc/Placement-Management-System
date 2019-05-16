<?php
include('header.php');
include_once("db_connect.php");
?>

<title>Change Profile</title>
<script src="dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="dist_files/jquery.form.js"></script>
<link rel="stylesheet" href="dist_files/imgareaselect.css">
<script src="functions.js"></script>

<div class="container">
    <h2>Change Profile Picture</h2>		

    <div>
        <img class="img-circle" id="profile_picture" height="128" src="default.jpg"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="bmiit.jpg"/>
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
                        <div id="thumbs" style="padding:5px; width:600px"></div>
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