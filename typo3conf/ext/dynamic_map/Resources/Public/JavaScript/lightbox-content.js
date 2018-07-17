$('a.lightbox-link').click(function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    $(id).show(300);
    $('a.close-btn').click(function (e) {
        e.preventDefault();
        var id = $(this).data('dynamicmap');
        $(id).hide(300);
    });

});