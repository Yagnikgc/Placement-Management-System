$(document).ready(function () {
    function shakeText(selector) {
        $(selector).addClass("shake-horizontal shake-constant");
        setTimeout(function () {
            $(selector).removeClass("shake-horizontal shake-constant");
        }, 400);
    }
    function removeBorder(selector) {
        $(selector).css({"border": "1px solid #999"});
    }
    $("#txt_stipend_amt").keyup(function () {
        removeBorder($(this));
    });
    $("#txt_bond_period").keyup(function () {
        removeBorder($(this));
    });
    $("#txt_num_req_stud").keyup(function () {
        removeBorder($(this));
    });
    $("#txt_reg_close_date").keyup(function () {
        removeBorder($(this));
    });
    $('#next_button_2').click(function () {
        var flag_1 = 0;
        var currentDate = new Date();
        var curDate = currentDate.getDate();
        var curMonth = currentDate.getMonth() + 1;
        var curYear = currentDate.getFullYear();
        var fullDate = curYear + "-" + curMonth + "-" + curDate;

        var txt_stipend_amt = $("#txt_stipend_amt").val();
        var txt_bond_period = $("#txt_bond_period").val();
        var txt_num_req_stud = $("#txt_num_req_stud").val();
        var txt_reg_close_date = $("#txt_reg_close_date").val();

        if (txt_stipend_amt == "" || txt_stipend_amt < 0) {
            flag_1++;
            $("#txt_stipend_amt").css({"border": "1.5px solid red"});
            shakeText("#txt_stipend_amt");
        }
        if (txt_bond_period == "" || txt_stipend_amt < 0) {
            flag_1++;
            $("#txt_bond_period").css({"border": "1.5px solid red"});
            shakeText("#txt_bond_period");
        }
        if (txt_num_req_stud == "" || txt_stipend_amt < 0) {
            flag_1++;
            $("#txt_num_req_stud").css({"border": "1.5px solid red"});
            shakeText("#txt_num_req_stud");
        }
        if (txt_reg_close_date == "" || new Date(fullDate) > new Date(txt_reg_close_date)) {
            flag_1++;
            $("#txt_reg_close_date").css({"border": "1.5px solid red"});
            shakeText("#txt_reg_close_date");
        }
        if (flag_1 == 0) {
            $('#o_1').removeClass('is-active');
            $('#o_3').removeClass('is-active');
            $('#o_2').addClass('is-active');

            $('#step_1').removeClass('animate-in is-showing');
            $('#step_3').removeClass('animate-in is-showing');
            $('#step_2').addClass('animate-in is-showing');
        }
    });

    $("#txt_min_cgpa").keyup(function () {
        removeBorder($(this));
    });
    $("#txt_min_sgpa").keyup(function () {
        removeBorder($(this));
    });
    $("#txt_backlog_allowed").keyup(function () {
        removeBorder($(this));
    });
    $("#txt_num_round").keyup(function () {
        removeBorder($(this));
    });
    $('#next_button_3').click(function () {
        var flag_1 = 0;
        var txt_min_cgpa = $("#txt_min_cgpa").val();
        var txt_min_sgpa = $("#txt_min_sgpa").val();
        var txt_backlog_allowed = $("#txt_backlog_allowed").val();
        var txt_num_round = $("#txt_num_round").val();

        if (txt_min_cgpa == "" || txt_min_cgpa < 0 || txt_min_cgpa > 10) {
            flag_1++;
            $("#txt_min_cgpa").css({"border": "1.5px solid red"});
            shakeText("#txt_min_cgpa");
        }
        if (txt_min_sgpa == "" || txt_min_sgpa < 0 || txt_min_sgpa > 10) {
            flag_1++;
            $("#txt_min_sgpa").css({"border": "1.5px solid red"});
            shakeText("#txt_min_sgpa");
        }
        if (txt_backlog_allowed == "" || txt_backlog_allowed < 0) {
            flag_1++;
            $("#txt_backlog_allowed").css({"border": "1.5px solid red"});
            shakeText("#txt_backlog_allowed");
        }
        if (txt_num_round == "" || txt_num_round < 0) {
            flag_1++;
            $("#txt_num_round").css({"border": "1.5px solid red"});
            shakeText("#txt_num_round");
        }

        if (flag_1 == 0) {
            $.ajax({
                url: "../CityFetch.php",
                method: "post",
                data: {num_of_rounds: txt_num_round},
                success: function (data)
                {
                    $('#div_rounds').html(data);
                }
            });
            $('#o_1').removeClass('is-active');
            $('#o_2').removeClass('is-active');
            $('#o_3').addClass('is-active');

            $('#step_1').removeClass('animate-in is-showing');
            $('#step_2').removeClass('animate-in is-showing');
            $('#step_3').addClass('animate-in is-showing');
        }
    });

    $('#previous_button_1').click(function () {
        $('#o_2').removeClass('is-active');
        $('#o_3').removeClass('is-active');
        $('#o_1').addClass('is-active');

        $('#step_2').removeClass('animate-in is-showing');
        $('#step_3').removeClass('animate-in is-showing');
        $('#step_1').addClass('animate-in is-showing');
    });

    $('#previous_button_2').click(function () {
        $('#o_1').removeClass('is-active');
        $('#o_3').removeClass('is-active');
        $('#o_2').addClass('is-active');

        $('#step_3').removeClass('animate-in is-showing');
        $('#step_1').removeClass('animate-in is-showing');
        $('#step_2').addClass('animate-in is-showing');
    });
});