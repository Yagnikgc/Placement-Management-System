$(document).ready(function () {
    var numItems = $("li.fancyTab").length;

    if (numItems == 12) {
        $("li.fancyTab").width("8.3%");
    }
    if (numItems == 11) {
        $("li.fancyTab").width("9%");
    }
    if (numItems == 10) {
        $("li.fancyTab").width("10%");
    }
    if (numItems == 9) {
        $("li.fancyTab").width("11.1%");
    }
    if (numItems == 8) {
        $("li.fancyTab").width("12.5%");
    }
    if (numItems == 7) {
        $("li.fancyTab").width("14.2%");
    }
    if (numItems == 6) {
        $("li.fancyTab").width("16.666666666666667%");
    }
    if (numItems == 5) {
        $("li.fancyTab").width("20%");
    }
    if (numItems == 4) {
        $("li.fancyTab").width("25%");
    }
    if (numItems == 3) {
        $("li.fancyTab").width("33.3%");
    }
    if (numItems == 2) {
        $("li.fancyTab").width("50%");
    }
});

$(window).load(function () {
    $(".fancyTabs").each(function () {
        var highestBox = 0;
        $(".fancyTab a", this).each(function () {
            if ($(this).height() > highestBox)
                highestBox = $(this).height();
        });

        $(".fancyTab a", this).height(highestBox);
    });
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
});