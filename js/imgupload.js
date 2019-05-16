$("#profileImage").click(function (e) {
    $("#imageUpload").click();
});

function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#profileImage').attr('src',
                window.URL.createObjectURL(uploader.files[0]));
    }
}

$("#imageUpload").change(function () {
    var file = $('#imageUpload').val();
    var exts = ['jpg', 'jpeg', 'png'];
    // first check if file field has any value
    if (file) {
        // split file name at dot
        var get_ext = file.split('.');
        // reverse name to check extension
        get_ext = get_ext.reverse();
        // check file type is valid as given in 'exts' array
        if ($.inArray(get_ext[0].toLowerCase(), exts) > -1) {
            $('#profile-container').parent().children('#err_img_upload').html("");
            fasterPreview(this);
        } else {
            $('#profile-container').parent().children('#err_img_upload').html("<span class='fa fa-exclamation text-danger'> Invalid File type. Please upload an Image.</span>");
        }
    }
});