$(document).ready(function () {
    var tmp = 1, tmp1 = 1;
    $('#myTabContent div#tabBody-0').show();
    $('#myTabContent div#tabBody-1').hide();
    $('#myTabContent div#tabBody-2').hide();

    /*to actually disable clicking the bootstrap tab, as noticed in comments by user3067524*/
    $('.nav li').not('.active').find('a').removeAttr("data-toggle");
    $(document).on('click', '#tab0', function () {
        if (!$('#fancyTabWidget > ul >li').eq(0).hasClass('active'))
        {
            $('#fancyTabWidget > ul >li').eq(0).addClass('active');
            $('#fancyTabWidget > ul >li').eq(1).removeClass('active');
            $('#fancyTabWidget > ul >li').eq(2).removeClass('active');
        }
        $('#myTabContent div#tabBody-0').show();
        $('#myTabContent div#tabBody-1').hide();
        $('#myTabContent div#tabBody-2').hide();
    });

    $('#txt_cmp_name').focusout(function () {
        var tmp_cmp_name = document.getElementById("txt_cmp_name").value;
        if (tmp_cmp_name === '') {
            tmp++;
            $("#txt_cmp_name").parent().children('#error_txt_cmp_name').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            tmp = 0;
            $("#txt_cmp_name").parent().children('#error_txt_cmp_name').html("");
        }
    }).keyup(function () {
        var tmp_cmp_name = document.getElementById("txt_cmp_name").value;
        if (tmp_cmp_name === '') {
            tmp++;
            $("#txt_cmp_name").parent().children('#error_txt_cmp_name').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            tmp = 0;
            $("#txt_cmp_name").parent().children('#error_txt_cmp_name').html("");
        }
    });

    $('#txt_cmp_reg_num').focusout(function () {
        var tmp_cmp_reg_num = document.getElementById("txt_cmp_reg_num").value;
        if (tmp_cmp_reg_num === '') {
            tmp++;
            $("#txt_cmp_reg_num").parent().children('#error_txt_cmp_reg_num').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            tmp = 0;
            $("#txt_cmp_reg_num").parent().children('#error_txt_cmp_reg_num').html("");
        }
    }).keyup(function () {
        var tmp_cmp_reg_num = document.getElementById("txt_cmp_reg_num").value;
        if (tmp_cmp_reg_num === '') {
            tmp++;
            $("#txt_cmp_reg_num").parent().children('#error_txt_cmp_reg_num').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            tmp = 0;
            $("#txt_cmp_reg_num").parent().children('#error_txt_cmp_reg_num').html("");
        }
    });

    $('#txt_cmp_reg_date').focusout(function () {
        var tmp_cmp_reg_date = document.getElementById("txt_cmp_reg_date").value;
        if (tmp_cmp_reg_date === '') {
            tmp++;
            $("#txt_cmp_reg_date").parent().children('#error_txt_cmp_reg_date').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            tmp = 0;
            $("#txt_cmp_reg_date").parent().children('#error_txt_cmp_reg_date').html("");
        }
    });

    $('#txt_add').focusout(function () {
        var tmp_add = document.getElementById("txt_add").value;
        if (tmp_add === '') {
            tmp++;
            $("#txt_add").parent().children('#error_txt_add').html("<span class='fa fa-exclamation text-danger'> Address is required</span>");
        } else {
            tmp = 0;
            $("#txt_add").parent().children('#error_txt_add').html("");
        }
    });
    $('#dd_state').focusout(function () {
        var tmp_state = document.getElementById("dd_state").value;
        if (tmp_state === '') {
            tmp++;
            $("#dd_state").parent().children('#error_dd_state').html("<span class='fa fa-exclamation text-danger'> Choose State</span>");
        } else {
            tmp = 0;
            $("#dd_state").parent().children('#error_dd_state').html("");
        }
    });
    $('#dd_city').focusout(function () {
        var tmp_city = document.getElementById("dd_city").value;
        if (tmp_city === '') {
            tmp++;
            $("#dd_city").parent().children('#error_dd_city').html("<span class='fa fa-exclamation text-danger'> Choose City</span>");
        } else {
            tmp = 0;
            $("#dd_city").parent().children('#error_dd_city').html("");
        }
    });
    $('#txt_pincode').keyup(function () {
        var tmp_pincode = document.getElementById("txt_pincode").value;
        if (!(/^[0-9]{6}$/.test(tmp_pincode))) {
            tmp++;
            $("#txt_pincode").parent().children('#error_txt_pincode').html("<span class='fa fa-exclamation text-danger'> Invalid Pincode</span>");
        } else
        {
            tmp = 0;
            $("#txt_pincode").parent().children('#error_txt_pincode').html("");
        }
    });
    $('#txt_url').keyup(function () {
        var tmp_url = document.getElementById("txt_url").value;
        if (tmp_url == '') {
            tmp++;
            $("#txt_url").parent().children('#error_txt_url').html("<span class='fa fa-exclamation text-danger'> Please enter url</span>");
        } else if (!ValidateUrl(tmp_url)) {
            tmp++;
            $("#txt_url").parent().children('#error_txt_url').html("<span class='fa fa-exclamation text-danger'> Invalid url.</span>");
        } else {
            tmp = 0;
            $("#txt_url").parent().children('#error_txt_url').html("");
        }
    });

    $(document).on('click', '#tab1', function () {
        tmp = 1;
        var tmp_cmp_name = document.getElementById("txt_cmp_name").value;
        var tmp_cmp_reg_num = document.getElementById("txt_cmp_reg_num").value;
        var tmp_cmp_reg_date = document.getElementById("txt_cmp_reg_date").value;
        var tmp_add = document.getElementById("txt_add").value;
        var tmp_state = document.getElementById("dd_state").value;
        var tmp_city = document.getElementById("dd_city").value;
        var tmp_pincode = document.getElementById("txt_pincode").value;
        var tmp_url = document.getElementById("txt_url").value;

        if (tmp_cmp_name === '') {
            tmp++;
            $("#txt_cmp_name").parent().children('#error_txt_cmp_name').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            $("#txt_cmp_name").parent().children('#error_txt_cmp_name').html("");
        }

        if (tmp_cmp_reg_num === '') {
            tmp++;
            $("#txt_cmp_reg_num").parent().children('#error_txt_cmp_reg_num').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            $("#txt_cmp_reg_num").parent().children('#error_txt_cmp_reg_num').html("");
        }

        if (tmp_cmp_reg_date === '') {
            tmp++;
            $("#txt_cmp_reg_date").parent().children('#error_txt_cmp_reg_date').html("<span class='fa fa-exclamation text-danger'> Required.</span>");
        } else {
            $("#txt_cmp_reg_date").parent().children('#error_txt_cmp_reg_date').html("");
        }

        if (tmp_add === '') {
            tmp++;
            $("#txt_add").parent().children('#error_txt_add').html("<span class='fa fa-exclamation text-danger'> Please Enter Address</span>");
        } else {
            $("#txt_add").parent().children('#error_txt_add').html("");
        }

        if (tmp_state === '') {
            tmp++;
            $("#dd_state").parent().children('#error_dd_state').html("<span class='fa fa-exclamation text-danger'> Choose State</span>");
        } else {
            $("#dd_state").parent().children('#error_dd_state').html("");
        }

        if (tmp_city === '') {
            tmp++;
            $("#dd_city").parent().children('#error_dd_city').html("<span class='fa fa-exclamation text-danger'> Choose City</span>");
        } else {
            $("#dd_city").parent().children('#error_dd_city').html("");
        }

        if (tmp_pincode === '') {
            tmp++;
            $("#txt_pincode").parent().children('#error_txt_pincode').html("<span class='fa fa-exclamation text-danger'> Please Enter Pincode</span>");
        } else if (!(/^[0-9]{6}$/.test(tmp_pincode))) {
            tmp++;
            $("#txt_pincode").parent().children('#error_txt_pincode').html("<span class='fa fa-exclamation text-danger'> Invalid Pincode</span>");
        } else
        {
            $("#txt_pincode").parent().children('#error_txt_pincode').html("");
        }

        if (tmp_url === '') {
            tmp++;
            $("#txt_url").parent().children('#error_txt_url').html("<span class='fa fa-exclamation text-danger'> Please Enter url.</span>");
        } else if (!ValidateUrl(tmp_url)) {
            tmp++;
            $("#txt_url").parent().children('#error_txt_url').html("<span class='fa fa-exclamation text-danger'> Invalid url.</span>");
        } else {
            $("#txt_url").parent().children('#error_txt_url').html("");
        }

        if (tmp === 1) {
            if (!$('#fancyTabWidget > ul >li').eq(1).hasClass('active'))
            {
                $('#fancyTabWidget > ul >li').eq(1).addClass('active');
                $('#fancyTabWidget > ul >li').eq(0).removeClass('active');
                $('#fancyTabWidget > ul >li').eq(2).removeClass('active');
            }
            $('#myTabContent div#tabBody-0').hide();
            $('#myTabContent div#tabBody-1').show();
            $('#myTabContent div#tabBody-2').hide();
        }
    });

    $("#txt_ceo_name").keyup(function () {
        var tmp_ceo_name = document.getElementById("txt_ceo_name").value;
        if (tmp_ceo_name === '') {
            tmp1++;
            $("#txt_ceo_name").parent().children('#error_txt_ceo_name').html("<span class='fa fa-exclamation text-danger'> Please enter Name</span>");
        } else {
            $("#txt_ceo_name").parent().children('#error_txt_ceo_name').html("");
        }
    });

    $("#txt_comp_mob_num").keyup(function () {
        var tmp_comp_mob_num = document.getElementById("txt_comp_mob_num").value;
        if (tmp_comp_mob_num === '') {
            tmp1++;
            $("#txt_comp_mob_num").parent().children('#error_txt_comp_mob_num').html("<span class='fa fa-exclamation text-danger'> Please Contact Number</span>");
        } else if (!(/^[0-9]{10}$/.test(tmp_comp_mob_num))) {
            tmp1++;
            $("#txt_comp_mob_num").parent().children('#error_txt_comp_mob_num').html("<span class='fa fa-exclamation text-danger'> Invalid Contact Number</span>");
        } else {
            $("#txt_comp_mob_num").parent().children('#error_txt_comp_mob_num').html("");
        }
    });

    $('#txt_comp_email').keyup(function () {
        var tmp_comp_email = document.getElementById("txt_comp_email").value;
        if (tmp_comp_email === '') {
            tmp1++;
            $("#txt_comp_email").parent().children('#error_txt_comp_email').html("<span class='fa fa-exclamation text-danger'> Please Enter E-mail address.</span>");
        } else if (!ValidateEmail(tmp_comp_email)) {
            tmp1++;
            $("#txt_comp_email").parent().children('#error_txt_comp_email').html("<span class='fa fa-exclamation text-danger'> Invalid E-mail address.</span>");
        } else {
            $("#txt_comp_email").parent().children('#error_txt_comp_email').html("");
        }
    });

    $("#txt_hr_name").keyup(function () {
        var tmp_hr_name = document.getElementById("txt_hr_name").value;
        if (tmp_hr_name === '') {
            tmp1++;
            $("#txt_hr_name").parent().children('#error_txt_hr_name').html("<span class='fa fa-exclamation text-danger'> Please enter Name</span>");
        } else {
            $("#txt_hr_name").parent().children('#error_txt_hr_name').html("");
        }
    });

    $("#txt_hr_mob_num").keyup(function () {
        var tmp_hr_mob_num = document.getElementById("txt_hr_mob_num").value;
        if (tmp_hr_mob_num === '') {
            tmp1++;
            $("#txt_hr_mob_num").parent().children('#error_txt_hr_mob_num').html("<span class='fa fa-exclamation text-danger'> Please Contact Number</span>");
        } else if (!(/^[0-9]{10}$/.test(tmp_hr_mob_num))) {
            tmp1++;
            $("#txt_hr_mob_num").parent().children('#error_txt_hr_mob_num').html("<span class='fa fa-exclamation text-danger'> Invalid Contact Number</span>");
        } else {
            $("#txt_hr_mob_num").parent().children('#error_txt_hr_mob_num').html("");
        }
    });

    $('#txt_hr_email').keyup(function () {
        var tmp_hr_email = document.getElementById("txt_hr_email").value;
        if (tmp_hr_email === '') {
            tmp1++;
            $("#txt_hr_email").parent().children('#error_txt_hr_email').html("<span class='fa fa-exclamation text-danger'> Please Enter E-mail address.</span>");
        } else if (!ValidateEmail(tmp_hr_email)) {
            tmp1++;
            $("#txt_hr_email").parent().children('#error_txt_hr_email').html("<span class='fa fa-exclamation text-danger'> Invalid E-mail address.</span>");
        } else {
            $("#txt_hr_email").parent().children('#error_txt_hr_email').html("");
        }
    });

    function ValidateEmail(mail_id) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail_id))
        {
            return (true);
        }
        return (false);
    }
    function ValidateUrl(url) {
        regexp = /^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/;
        if (regexp.test(url))
        {
            return (true);
        }
        return (false);
    }

    function checkbox_check_event() {
        var ind = 0;
        $('#checkboxes').children().each(function () {
            ind = ind + 1;
            $('#checkboxes').children().eq(ind).children().children().children().change(function () {
                if (!$(this).hasClass("active")) {
                    $(this).addClass("active");
                } else {
                    $(this).removeClass("active");
                }
            });
        });
    }

    checkbox_check_event();

    $(document).on('click', '#tab2', function () {
        tmp1 = 0;
        var tmp_ceo_name = document.getElementById("txt_ceo_name").value;
        var tmp_comp_mob_num = document.getElementById("txt_comp_mob_num").value;
        var tmp_comp_email = document.getElementById("txt_comp_email").value;
        var tmp_hr_name = document.getElementById("txt_hr_name").value;
        var tmp_hr_mob_num = document.getElementById("txt_hr_mob_num").value;
        var tmp_hr_email = document.getElementById("txt_hr_email").value;
        //var tech_list = document.getElementsByName("tech_list").value;

        /*if(tech_list==''){
         tmp1++;
         $("#error_tech_list").html("<span class='fa fa-exclamation text-danger'> Please choose technology.</span>");
         }else{
         $("#error_tech_list").html("");
         }*/

        var index = 0;
        var num_checked = 0;
        $('#checkboxes').children().each(function () {
            index = index + 1;
            if (index <= 7) {
                if ($('#checkboxes').children().eq(index).children().children().children().hasClass("active")) {
                    num_checked++;
                }
            }
        });

        if (tmp_ceo_name === '') {
            tmp1++;
            $("#txt_ceo_name").parent().children('#error_txt_ceo_name').html("<span class='fa fa-exclamation text-danger'> Please Enter CEO Name</span>");
        } else {
            $("#txt_ceo_name").parent().children('#error_txt_ceo_name').html("");
        }

        if (tmp_comp_mob_num === '') {
            tmp1++;
            $("#txt_comp_mob_num").parent().children('#error_txt_comp_mob_num').html("<span class='fa fa-exclamation text-danger'> Please Enter Mobile number</span>");
        } else if (!(/^[0-9]{10}$/.test(tmp_comp_mob_num))) {
            tmp1++;
            $("#txt_comp_mob_num").parent().children('#error_txt_comp_mob_num').html("<span class='fa fa-exclamation text-danger'> Invalid percantege</span>");
        } else {
            $("#txt_comp_mob_num").parent().children('#error_txt_comp_mob_num').html("");
        }

        if (tmp_comp_email === '') {
            tmp1++;
            $("#txt_comp_email").parent().children('#error_txt_comp_email').html("<span class='fa fa-exclamation text-danger'> Please Enter E-mail address</span>");
        } else if (!ValidateEmail(tmp_comp_email)) {
            tmp1++;
            $("#txt_comp_email").parent().children('#error_txt_comp_email').html("<span class='fa fa-exclamation text-danger'> Invalid E-mail</span>");
        } else {
            $('#txt_mail').val("Email ID : " + tmp_comp_email);
            $("#txt_comp_email").parent().children('#error_txt_comp_email').html("");
            var mail = document.getElementById("txt_comp_email").value;
            var tmp_cmp_name = document.getElementById("txt_cmp_name").value;
            if (mail === '') {
                document.getElementById("btn_verify_otp").disabled = true;
            } else {
                document.getElementById("btn_verify_otp").disabled = false;
            }
            $.ajax({
                url: "generate_otp.php",
                method: "post",
                data: {'mail_id': mail, 'uName': tmp_cmp_name, 'uType': "Company", 'Mobile': tmp_hr_mob_num},
                success: function (data)
                {
                    $('#error_txt_comp_email').html(data);
                }
            });
        }

        if (tmp_hr_name === '') {
            tmp1++;
            $("#txt_hr_name").parent().children('#error_txt_hr_name').html("<span class='fa fa-exclamation text-danger'> Please enter Name</span>");
        } else {
            $("#txt_hr_name").parent().children('#error_txt_hr_name').html("");
        }

        if (tmp_hr_mob_num === '') {
            tmp1++;
            $("#txt_hr_mob_num").parent().children('#error_txt_hr_mob_num').html("<span class='fa fa-exclamation text-danger'> Please Contact Number</span>");
        } else if (!(/^[0-9]{10}$/.test(tmp_hr_mob_num))) {
            tmp1++;
            $("#txt_hr_mob_num").parent().children('#error_txt_hr_mob_num').html("<span class='fa fa-exclamation text-danger'> Invalid Contact Number</span>");
        } else {
            $("#txt_hr_mob_num").parent().children('#error_txt_hr_mob_num').html("");
        }

        if (tmp_hr_email === '') {
            tmp1++;
            $("#txt_hr_email").parent().children('#error_txt_hr_email').html("<span class='fa fa-exclamation text-danger'> Please Enter E-mail address.</span>");
        } else if (!ValidateEmail(tmp_hr_email)) {
            tmp1++;
            $("#txt_hr_email").parent().children('#error_txt_hr_email').html("<span class='fa fa-exclamation text-danger'> Invalid E-mail address.</span>");
        } else {
            $("#txt_hr_email").parent().children('#error_txt_hr_email').html("");
        }

        if (num_checked == 0) {
            tmp1++;
            $("#error_tech_list").html("<span class='fa fa-exclamation text-danger'> Please choose technology.</span>");
        } else {
            $("#error_tech_list").html("");
        }

        if (tmp1 === 0) {
            $('#fancyTabWidget > ul >li').eq(0).removeClass('active');
            $('#fancyTabWidget > ul >li').eq(1).removeClass('active');
            $('#fancyTabWidget > ul >li').eq(2).addClass('active');

            $('#myTabContent div#tabBody-0').hide();
            $('#myTabContent div#tabBody-1').hide();
            $('#myTabContent div#tabBody-2').show();
        }
    });

    $('#dd_city').change(function () {
        $("#dd_city").parent().children('#error_dd_city').html("");
    });

    $('#dd_state').change(function () {
        $("#dd_state").parent().children('#error_dd_state').html("");
        var val = $(this).val();
        $.ajax({
            url: "CityFetch.php",
            method: "post",
            data: {"dd_state": val},
            success: function (data)
            {
                $('#dd_city').html(data);
            }
        });
    });

    $('#btn_send_otp').on('click', function () {
        var mail = document.getElementById("txt_comp_email").value;
        var tmp_cmp_name = document.getElementById("txt_cmp_name").value;
        $.ajax({
            url: "generate_otp.php",
            method: "post",
            data: {mail_id: mail, uName: tmp_cmp_name},
            success: function (data)
            {
                $('#err_validate_email').html(data);
            }
        });
    });

    $("#btn_verify_otp").on('click', function () {
        var otp = document.getElementById("txt_otp").value;
        var hidden_otp = document.getElementById("hidden_otp").value;
        if (otp === '') {
            $('#err_validate_otp').html("<span class='fa fa-exclamation text-danger'> Please enter OTP</span>");
        } else if (otp === hidden_otp) {
            $('#err_validate_otp').html("<span class='fa fa-check-circle text-success'> OTP successfully verified.</span>");
            $("#div_registration").removeClass("hide_div");
        } else {
            $('#err_validate_otp').html("<span class='fa fa-exclamation text-danger'> Invalid OTP. Please enter valid OTP.</span>");
        }
    });

    $('#txt_passwd').keyup(function () {
        var pswd = $(this).val();
        //validate the length
        if (pswd.length < 8) {
            $('#length').removeClass('valid fa fa-check').addClass('invalid fa fa-close');
        } else {
            $('#length').removeClass('invalid fa fa-close').addClass('valid fa fa-check');
        }
//validate letter
        if (pswd.match(/[a-z]/)) {
            $('#letter').removeClass('invalid fa fa-close').addClass('valid fa fa-check');
        } else {
            $('#letter').removeClass('valid fa fa-check').addClass('invalid fa fa-close');
        }

//validate capital letter
        if (pswd.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid fa fa-close').addClass('valid fa fa-check');
        } else {
            $('#capital').removeClass('valid fa fa-check').addClass('invalid fa fa-close');
        }

//validate number
        if (pswd.match(/\d/)) {
            $('#number').removeClass('invalid fa fa-close').addClass('valid fa fa-check');
        } else {
            $('#number').removeClass('valid fa fa-check').addClass('invalid fa fa-close');
        }
    }).focus(function () {
        $('#pswd_info').show();
    }).blur(function () {
        $('#pswd_info').hide();
    });

    $("#btn_register").click(function (e) {
        var passwd = document.getElementById("txt_passwd").value;
        var confPwd = document.getElementById("txt_conf_passwd").value;
        var imgUpload = document.getElementById("imageUpload").files.length;
        if (passwd == "") {
            $("#txt_passwd").parent().children("#err_txt_passwd").html("<span class='fa fa-exclamation text-danger'> Password doesn't match.</span>");
            e.preventDefault();
        } else {
            $("#txt_passwd").parent().children("#err_txt_passwd").html("");
        }

        if (passwd === confPwd) {
            $("#txt_conf_passwd").parent().children("#err_txt_conf_passwd").html("");
        } else {
            $("#txt_conf_passwd").parent().children("#err_txt_conf_passwd").html("<span class='fa fa-exclamation text-danger'> Password doesn't match.</span>");
            e.preventDefault();
        }
        if (imgUpload == 0) {
            $("#err_img_upload").html("<span class='fa fa-exclamation text-danger'> Click above & upload your image</span>");
            e.preventDefault();
        } else {
            $("#imageUpload").parent().children("#err_img_upload").html("");
        }
        if (passwd != "" && passwd == confPwd && imgUpload != 0) {
            swal({
                title: "Good job!",
                text: "Registered Successfully !",
                type: "success",
                confirmButtonColor: '#e2a4c4',
            }, function () {
                $("#btn_register").click();
                window.location.assign("index.php");
            });
        }
    });
});