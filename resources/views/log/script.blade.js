$("tr.header").click(function () {
    var el = $(this);
    var next = el.next();
    if (next.is(":visible")) {
        next.hide();
    } else {
        next.show();
    }
});
