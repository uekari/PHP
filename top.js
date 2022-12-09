// 上部menuの固定

$(function () {
    var menu = $('#menu'),
        offset = menu.offset();
    $(window).scroll(function () {
        if ($(window).scrollTop() > offset.top) {
            menu.addClass('fixed');
        } else {
            menu.removeClass('fixed');
        }
    });
});