<?php
include('header.php');
include_once("db_connect.php");
?>

<title>Change Profile</title>
<script src="dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="dist_files/jquery.form.js"></script>
<link rel="stylesheet" href="dist_files/imgareaselect.css">
<script src="functions.js"></script>

<?php
$err_msg = '';
if (isset($_POST['btn_update'])) {
    $fname = $_POST['txt_fname'];
    $lname = $_POST['txt_lname'];
    $email = $_POST['txt_email'];
    $uname = $_POST['txt_uname'];
    date_default_timezone_set('Asia/Kolkata');
    $change_date = date("Y-m-d");
    $pwd = MD5($_POST['txt_passwd']);
    $con_pwd = MD5($_POST['txt_conf_pwd']);
    $status = "active";

    // Get image name
    $image = $data['admin_image'];

    if ($con && $fname != '' && $lname != '' && $email != '' && $uname != '' && $pwd != '' && $con_pwd != '') {
        if ($pwd == $con_pwd) {
            $q = $con->prepare("INSERT INTO `tbl_admin_data` "
                    . "(`f_name`, `l_name`, `Email`, `username`, `password`, `admin_image`, `change_date`, `status`) "
                    . "VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");

            $q->bind_param("ssssssss", $fname, $lname, $email, $uname, $pwd, $image, $change_date, $status);
            if ($q->execute()) {
                $q = $con->prepare("UPDATE `tbl_admin_data` "
                        . "set status=? "
                        . "where admin_id=?");
                $stats = "deactive";
                $old_id = $data['admin_id'];
                $q->bind_param("si", $stats, $old_id);
                $q->execute();
            }
            $err_msg = '';
        } else {
            $err_msg = '<span class="text-danger"><i class="fa fa-exclamation"></i> Password doesn`t match.</span>';
        }
    } else {
        echo '<script>alert("Invalid input\nPlease enter required details.");</script>';
    }
}
$con = new mysqli("localhost", "root", "", "db_pms");
$q = $con->prepare("select * from tbl_admin_data where status=?");
$param = "active";
$q->bind_param("s", $param);
$q->execute();
$k = $q->get_result();
$data = $k->fetch_assoc();
?>

<div class="container">
    <div class="col-md-3">
        <h2 style="padding-left: 2%" class="gray_col">Edit Profile</h2>
        <div>
            <img class="img-circle" id="profile_picture" height="128" src="images/Admin_Images/<?php echo $data['admin_image']; ?>"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="bmiit.jpg"/>
            <br><br>
            <a type="button" class="btn btn-primary" id="change-profile-pic">Change Profile Picture</a>
        </div>
    </div>
    <div class="col-md-9 personal-info">
        <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
            <hr style=" display: block;
                margin-top: 2em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 3px;">
            <h3>Personal info</h3>
            <div class="form-group">
                <label class="col-lg-3 control-label">First name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="txt_fname" required value='<?php echo $data['f_name']; ?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Last name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="txt_lname" required value='<?php echo $data['l_name']; ?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="email" name="txt_email" required value='<?php echo $data['Email']; ?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Username:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="txt_uname" required value='<?php echo $data['username']; ?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" name="txt_passwd" required placeholder="New Password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Confirm password:</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" name="txt_conf_pwd" required placeholder="Confirm Password">
                    <?php echo $err_msg; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary " name="btn_update" value="Save Changes">
                    <span></span>
                    <input type="reset" class="btn btn-default" value="Cancel">
                </div>
            </div>
        </form>
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
                        <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="<?php echo $data['admin_id']; ?>" />
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
<script>
    $(document).ready(function () {
        $('#profile_pic_modal').on('hidden.bs.modal', function () {
            document.location.reload();
        });
    });
</script>
<?php include './footer.php'; ?>