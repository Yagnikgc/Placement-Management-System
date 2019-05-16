$(document).ready(function () {
    $("#btn_send").click(function () {
        var mail_id = $("#txt_email").val();
        $("#loader").show();
        $('#main').hide();
        $.ajax({
            url: "/PlacementManagementSystem/forget_password.php",
            method: "post",
            data: {'mail_id_forget_pwd': mail_id},
            success: function (data)
            {
                $('#err_validate_email').html(data);
                $('#div_mail_id').html("<h4>Mail Id : " + mail_id.toUpperCase() + "</h4>");
                var check_status = $('#err_validate_email').children().hasClass('bg-success');
                $("#loader").hide();
                $('#main').show();
                if (check_status === true) {
                    $('#err_validate_otp').html(data);
                    swal({
                        title: "Password changed successfully.",
                        text: "Check your mail for new password.",
                        type: "success",
                        confirmButtonColor: '#e2a4c4',
                    });
                }
            }
        });
    });
});
  