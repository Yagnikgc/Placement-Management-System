$(document).ready(function () {
    var tmp = 1, tmp1 = 0;
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
    $('#txt_enroll_num').keyup(function () {
        var tmp_enroll_num = document.getElementById("txt_enroll_num").value;
        if (!(/^[0-9]{15}$/.test(tmp_enroll_num))) {
            tmp++;
            $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html("<span class='fa fa-exclamation text-danger'> Invalid Enrollment Number</span>");
        } else {
            $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html("");
        }
    });
    $('#txt_enroll_num').focusout(function () {
        var tmp_enroll_num = document.getElementById("txt_enroll_num").value;
        $.ajax({
            url: "CityFetch.php",
            method: "post",
            data: {enroll_num: tmp_enroll_num},
            success: function (data)
            {
                $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html(data);
                var count_child = $('#error_txt_enroll_num').children().length;
                if (count_child == 0) {
                    tmp = 0;
                } else {
                    tmp++;
                }
            }
        });
    });
    $('#txt_fname').keyup(function () {
        var tmp_fname = document.getElementById("txt_fname").value;
        if (!(/^[a-zA-Z]+$/.test(tmp_fname))) {
            tmp++;
            $("#txt_fname").parent().children('#error_txt_fname').html("<span class='fa fa-exclamation text-danger'> Invalid First Name</span>");
        } else {
            $("#txt_fname").parent().children('#error_txt_fname').html("");
        }
    });
    $('#txt_mname').keyup(function () {
        var tmp_mname = document.getElementById("txt_mname").value;
        if (!(/^[a-zA-Z]+$/.test(tmp_mname))) {
            tmp++;
            $("#txt_mname").parent().children('#error_txt_mname').html("<span class='fa fa-exclamation text-danger'> Invalid Middle Name</span>");
        } else {
            $("#txt_mname").parent().children('#error_txt_mname').html("");
        }
    });
    $('#txt_lname').keyup(function () {
        var tmp_lname = document.getElementById("txt_lname").value;
        if (!(/^[a-zA-Z]+$/.test(tmp_lname))) {
            tmp++;
            $("#txt_lname").parent().children('#error_txt_lname').html("<span class='fa fa-exclamation text-danger'> Invalid Last Name</span>");
        } else {
            $("#txt_lname").parent().children('#error_txt_lname').html("");
        }
    });
    $('#txt_add').focusout(function () {
        var tmp_add = document.getElementById("txt_add").value;
        if (tmp_add === '') {
            tmp++;
            $("#txt_add").parent().children('#error_txt_add').html("<span class='fa fa-exclamation text-danger'> Address is required</span>");
        } else {
            $("#txt_add").parent().children('#error_txt_add').html("");
        }
    });
    $('#dd_state').focusout(function () {
        var tmp_state = document.getElementById("dd_state").value;
        if (tmp_state === '') {
            tmp++;
            $("#dd_state").parent().children('#error_dd_state').html("<span class='fa fa-exclamation text-danger'> Choose State</span>");
        } else {
            $("#dd_state").parent().children('#error_dd_state').html("");
        }
    });
    $('#dd_city').focusout(function () {
        var tmp_city = document.getElementById("dd_city").value;
        if (tmp_city === '') {
            tmp++;
            $("#dd_city").parent().children('#error_dd_city').html("<span class='fa fa-exclamation text-danger'> Choose City</span>");
        } else {
            $("#dd_city").parent().children('#error_dd_city').html("");
        }
    });
    $('#txt_pincode').keyup(function () {
        var tmp_pincode = document.getElementById("txt_pincode").value;
        if (!(/^[0-9]{6}$/.test(tmp_pincode))) {
            tmp++;
            $("#txt_pincode").parent().children('#error_txt_pincode').html("<span class='fa fa-exclamation text-danger'> Invalid Pincode</span>");
        } else {
            $("#txt_pincode").parent().children('#error_txt_pincode').html("");
        }
    });
    $('#txt_contact').keyup(function () {
        var tmp_contact = document.getElementById("txt_contact").value;
        if (!(/^[0-9]{10}$/.test(tmp_contact))) {
            tmp++;
            $("#txt_contact").parent().children('#error_txt_contact').html("<span class='fa fa-exclamation text-danger'> Invalid Contact number</span>");
        } else {
            $("#txt_contact").parent().children('#error_txt_contact').html("");
        }
    });
    $('#txt_bday').focusout(function () {
        var tmp_bday = document.getElementById("txt_bday").value;
        if (tmp_bday === '') {
            tmp++;
            $("#txt_bday").parent().children('#error_txt_bday').html("<span class='fa fa-exclamation text-danger'> Select your Birthdate</span>");
        } else {
            $("#txt_bday").parent().children('#error_txt_bday').html("");
        }
    });
    $(document).on('click', '#tab1', function () {
        tmp = 1;
        var tmp_enroll_num = document.getElementById("txt_enroll_num").value;
        var tmp_fname = document.getElementById("txt_fname").value;
        var tmp_mname = document.getElementById("txt_mname").value;
        var tmp_lname = document.getElementById("txt_lname").value;
        var tmp_add = document.getElementById("txt_add").value;
        var tmp_state = document.getElementById("dd_state").value;
        var tmp_city = document.getElementById("dd_city").value;
        var tmp_pincode = document.getElementById("txt_pincode").value;
        var tmp_contact = document.getElementById("txt_contact").value;
        var tmp_bday = document.getElementById("txt_bday").value;

        if (tmp_enroll_num === '') {
            tmp++;
            $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html("<span class='fa fa-exclamation text-danger'> Please Enter Enrollment Number</span>");
        } else if (!(/^[0-9]{15}$/.test(tmp_enroll_num))) {
            tmp++;
            $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html("<span class='fa fa-exclamation text-danger'> Invalid Enrollment Number</span>");
        } else {
            $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html("");
            $.ajax({
                url: "CityFetch.php",
                method: "post",
                data: {enroll_num: tmp_enroll_num},
                success: function (data)
                {
                    $("#txt_enroll_num").parent().children('#error_txt_enroll_num').html(data);
                    var count_child = $('#error_txt_enroll_num').children().length;
                    if (count_child === 1) {
                        tmp++;
                    }
                }
            });
        }

        if (tmp_fname === '') {
            tmp++;
            $("#txt_fname").parent().children('#error_txt_fname').html("<span class='fa fa-exclamation text-danger'> Please Enter First Name</span>");
        } else if (!(/^[a-zA-Z]+$/.test(tmp_fname))) {
            tmp++;
            $("#txt_fname").parent().children('#error_txt_fname').html("<span class='fa fa-exclamation text-danger'> Invalid First Name</span>");
        } else {
            $("#txt_fname").parent().children('#error_txt_fname').html("");
        }

        if (tmp_mname === '') {
            tmp++;
            $("#txt_mname").parent().children('#error_txt_mname').html("<span class='fa fa-exclamation text-danger'> Please Enter Middle Name</span>");
        } else if (!(/^[a-zA-Z]+$/.test(tmp_fname))) {
            tmp++;
            $("#txt_mname").parent().children('#error_txt_mname').html("<span class='fa fa-exclamation text-danger'> Invalid Middle Name</span>");
        } else {
            $("#txt_mname").parent().children('#error_txt_mname').html("");
        }

        if (tmp_lname === '') {
            tmp++;
            $("#txt_lname").parent().children('#error_txt_lname').html("<span class='fa fa-exclamation text-danger'> Please Enter Last Name</span>");
        } else if (!(/^[a-zA-Z]+$/.test(tmp_fname))) {
            tmp++;
            $("#txt_lname").parent().children('#error_txt_lname').html("<span class='fa fa-exclamation text-danger'> Invalid Last Name</span>");
        } else {
            $("#txt_lname").parent().children('#error_txt_lname').html("");
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
        } else {
            $("#txt_pincode").parent().children('#error_txt_pincode').html("");
        }

        if (tmp_contact === '') {
            tmp++;
            $("#txt_contact").parent().children('#error_txt_contact').html("<span class='fa fa-exclamation text-danger'> Please Enter Contact number</span>");
        } else if (!(/^[0-9]{10}$/.test(tmp_contact))) {
            tmp++;
            $("#txt_contact").parent().children('#error_txt_contact').html("<span class='fa fa-exclamation text-danger'> Invalid Contact number</span>");
        } else {
            $("#txt_contact").parent().children('#error_txt_contact').html("");
        }

        if (tmp_bday === '') {
            tmp++;
            $("#txt_bday").parent().children('#error_txt_bday').html("<span class='fa fa-exclamation text-danger'> Select your Birthdate</span>");
        } else {
            $("#txt_bday").parent().children('#error_txt_bday').html("");
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

    $("#txt_ssc").focusout(function () {
        var tmp_ssc = document.getElementById("txt_ssc").value;
        if (tmp_ssc === '') {
            tmp1++;
            $("#txt_ssc").parent().children('#error_txt_ssc').html("<span class='fa fa-exclamation text-danger'> Please Enter SSC percentage</span>");
        } else if (tmp_ssc > 100 || tmp_ssc < 0) {
            tmp1++;
            $("#txt_ssc").parent().children('#error_txt_ssc').html("<span class='fa fa-exclamation text-danger'> Invalid percantege</span>");
        } else {
            tmp1 = 0;
            $("#txt_ssc").parent().children('#error_txt_ssc').html("");
        }
    });

    $("#txt_hsc").focusout(function () {
        var tmp_hsc = document.getElementById("txt_hsc").value;
        if (tmp_hsc === '') {
            tmp1++;
            $("#txt_hsc").parent().children('#error_txt_hsc').html("<span class='fa fa-exclamation text-danger'> Please Enter HSC percentage</span>");
        } else if (tmp_hsc > 100 || tmp_hsc < 0) {
            tmp1++;
            $("#txt_hsc").parent().children('#error_txt_hsc').html("<span class='fa fa-exclamation text-danger'> Invalid percantege</span>");
        } else {
            tmp1 = 0;
            $("#txt_hsc").parent().children('#error_txt_hsc').html("");
        }
    });

    $('#txt_cgpa').focusout(function () {
        var tmp_cgpa = document.getElementById("txt_cgpa").value;
        if (tmp_cgpa === '') {
            tmp1++;
            $("#txt_cgpa").parent().children('#error_txt_cgpa').html("<span class='fa fa-exclamation text-danger'> Please Enter CGPA</span>");
        } else if (tmp_cgpa > 10 || tmp_cgpa < 0) {
            tmp1++;
            $("#txt_cgpa").parent().children('#error_txt_cgpa').html("<span class='fa fa-exclamation text-danger'> Invalid CGPA</span>");
        } else {
            tmp1 = 0;
            $("#txt_cgpa").parent().children('#error_txt_cgpa').html("");
        }
    });
    $('#txt_sgpa').focusout(function () {
        var tmp_sgpa = document.getElementById("txt_sgpa").value;
        if (tmp_sgpa === '') {
            tmp1++;
            $("#txt_sgpa").parent().children('#error_txt_sgpa').html("<span class='fa fa-exclamation text-danger'> Please Enter SGPA</span>");
        } else if (tmp_sgpa > 10 || tmp_sgpa < 0) {
            tmp1++;
            $("#txt_sgpa").parent().children('#error_txt_sgpa').html("<span class='fa fa-exclamation text-danger'> Invalid SGPA</span>");
        } else {
            tmp1 = 0;
            $("#txt_sgpa").parent().children('#error_txt_sgpa').html("");
        }
    });
    $('#txt_kt').focusout(function () {
        var tmp_kt = document.getElementById("txt_kt").value;
        if (tmp_kt === '') {
            tmp1++;
            $("#txt_kt").parent().children('#error_txt_kt').html("<span class='fa fa-exclamation text-danger'> Please Enter Number of KT's</span>");
        } else if (tmp_kt < 0) {
            tmp1++;
            $("#txt_kt").parent().children('#error_txt_kt').html("<span class='fa fa-exclamation text-danger'> Invalid Number of KT's</span>");
        } else {
            tmp1 = 0;
            $("#txt_kt").parent().children('#error_txt_kt').html("");
        }
    });
    $("#txt_reason").focusout(function () {
        var tmp_reason = document.getElementById("txt_reason").value;
        if (tmp_reason === '') {
            tmp1++;
            $('#err_txt_reason').html("<span class='fa fa-exclamation text-danger'> Please specify the reason.</span>");
        } else {
            tmp1 = 0;
            $('#err_txt_reason').html("");
        }
    });
    $(document).on('click', '#tab2', function () {
        tmp1 = 0;
        var tmp_ssc = document.getElementById("txt_ssc").value;
        var tmp_hsc = document.getElementById("txt_hsc").value;
        var tmp_cgpa = document.getElementById("txt_cgpa").value;
        var tmp_sgpa = document.getElementById("txt_sgpa").value;
        var tmp_kt = document.getElementById("txt_kt").value;
        var tmp_reason = document.getElementById("txt_reason").value;

        if (tmp_reason === '') {
            tmp1++;
            $('#err_txt_reason').html("<span class='fa fa-exclamation text-danger'> Please specify the reason.</span>");
        } else {
            tmp1 = 0;
            $('#err_txt_reason').html("");
        }

        if (tmp_hsc === '') {
            tmp1++;
            $("#txt_hsc").parent().children('#error_txt_hsc').html("<span class='fa fa-exclamation text-danger'> Please Enter HSC percentage</span>");
        } else if (tmp_hsc > 100 || tmp_hsc < 0) {
            tmp1++;
            $("#txt_hsc").parent().children('#error_txt_hsc').html("<span class='fa fa-exclamation text-danger'> Invalid percantege</span>");
        } else {
            tmp1 = 0;
            $("#txt_hsc").parent().children('#error_txt_hsc').html("");
        }

        if (tmp_ssc === '') {
            tmp1++;
            $("#txt_ssc").parent().children('#error_txt_ssc').html("<span class='fa fa-exclamation text-danger'> Please Enter SSC percentage</span>");
        } else if (tmp_ssc > 100 || tmp_ssc < 0) {
            tmp1++;
            $("#txt_ssc").parent().children('#error_txt_ssc').html("<span class='fa fa-exclamation text-danger'> Invalid percantege</span>");
        } else {
            tmp1 = 0;
            $("#txt_ssc").parent().children('#error_txt_ssc').html("");
        }

        if (tmp_cgpa === '') {
            tmp1++;
            $("#txt_cgpa").parent().children('#error_txt_cgpa').html("<span class='fa fa-exclamation text-danger'> Please Enter CGPA</span>");
        } else if (tmp_cgpa > 10 || tmp_cgpa < 0) {
            tmp1++;
            $("#txt_cgpa").parent().children('#error_txt_cgpa').html("<span class='fa fa-exclamation text-danger'> Invalid CGPA</span>");
        } else {
            tmp1 = 0;
            $("#txt_cgpa").parent().children('#error_txt_cgpa').html("");
        }

        if (tmp_sgpa === '') {
            tmp1++;
            $("#txt_sgpa").parent().children('#error_txt_sgpa').html("<span class='fa fa-exclamation text-danger'> Please Enter SGPA</span>");
        } else if (tmp_sgpa > 10 || tmp_sgpa < 0) {
            tmp1++;
            $("#txt_sgpa").parent().children('#error_txt_sgpa').html("<span class='fa fa-exclamation text-danger'> Invalid SGPA</span>");
        } else {
            tmp1 = 0;
            $("#txt_sgpa").parent().children('#error_txt_sgpa').html("");
        }

        if (tmp_kt === '') {
            tmp1++;
            $("#txt_kt").parent().children('#error_txt_kt').html("<span class='fa fa-exclamation text-danger'> Please Enter Number of KT's</span>");
        } else if (tmp_kt < 0) {
            tmp1++;
            $("#txt_kt").parent().children('#error_txt_kt').html("<span class='fa fa-exclamation text-danger'> Invalid Number of KT's</span>");
        } else {
            tmp1 = 0;
            $("#txt_kt").parent().children('#error_txt_kt').html("");
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
    $('.btn-toggle').on('click', function () {
        var check_pms = "NULL";
        $(this).find('.btn').toggleClass('active');
        if ($(this).find('.btn-primary').length > 0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }
        $(this).find('.btn').toggleClass('btn-default');
        if ($("#btn_yes").hasClass("active")) {
            $("#div_reason").removeClass("hide_div");
            $("#div_tech").addClass("hide_div");
        } else if ($("#btn_no").hasClass("active")) {
            $("#div_reason").addClass("hide_div");
            $("#div_tech").removeClass("hide_div");
        }

        if ($("#btn_yes").hasClass("btn-primary")) {
            check_pms = "Yes";
        } else {
            check_pms = "No";
        }
        document.getElementById("check_pms").value = check_pms;
    });
    $('#btn_send_otp').on('click', function () {
        var mail = document.getElementById("txt_mail").value;
        var tmp_fname = document.getElementById("txt_fname").value;
        var tmp_lname = document.getElementById("txt_lname").value;
        var tmp_mobile = $("#txt_contact").val();
        var userName = tmp_fname + " " + tmp_lname;
        if (mail === '') {
            document.getElementById("btn_verify_otp").disabled = true;
        } else {
            document.getElementById("btn_verify_otp").disabled = false;
        }
        $.ajax({
            url: "generate_otp.php",
            method: "post",
            data: {mail_id: mail, uName: userName, uType: "Student", Mobile: tmp_mobile},
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
        if (passwd != "" && passwd == confPwd && imgUpload != "") {
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
        return false;
    });
});