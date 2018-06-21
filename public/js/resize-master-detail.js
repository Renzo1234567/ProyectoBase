$(document).ready(function() {
    $('#main-nav').removeClass('fixed-top');

    var w = $(window).height();
    var n = $('#main-nav').outerHeight();

    var h = w - n - 10; //window 100% - main-nav - 2 (margin top)

    $('#item-list').height(h);
    $('#item-detail').height(h - 60); // menos padding
});