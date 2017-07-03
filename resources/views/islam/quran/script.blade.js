function checkAnswers() {
    var score = 0;
    var next = false;
    $(".question").each(function () {
        var el = $(this);
        if (next == true) {
            el.focus();
            next = 0;
        }
        var answer = el.val();
        var trueAnswer = el.data('answer');
        var group = el.closest('.form-group');
        if (answer != '') {
            if (answer == trueAnswer) {
                group.removeClass("has-error");
                group.addClass("has-success");
                if ($(this).is(":focus") && next == false) {
                    next = true;
                }
                score++;
            } else {
                group.removeClass("has-success");
                group.addClass("has-error");
            }
        } else {
            group.removeClass("has-success");
            group.removeClass("has-error");
        }
    });
    $(".score").html(score);
    $(".score").closest(".btn").removeClass("btn-default");
    $(".score").closest(".btn").removeClass("btn-danger");
    $(".score").closest(".btn").removeClass("btn-warning");
    $(".score").closest(".btn").removeClass("btn-primary");
    $(".score").closest(".btn").removeClass("btn-success");
    var total = $(".question").length;
    var percentage = score/total;
    if (score == 0 ) {
        $(".score").closest(".btn").addClass("btn-default");
    } else if (percentage <= 0.25) {
        $(".score").closest(".btn").addClass("btn-danger");
    } else if (percentage <= 0.5) {
        $(".score").closest(".btn").addClass("btn-warning");
    } else if (percentage <= 0.75) {
        $(".score").closest(".btn").addClass("btn-primary");
    } else {
        $(".score").closest(".btn").addClass("btn-success");
    }
};

$(".btn-title").click(function () {
    $(".ar-title").toggle();
});
$(".btn-look").click(function () {
    var el = $(this);
    var group = el.closest('.form-group');
    var input = group.find('input');
    input.val(input.data('answer'));
    input.focus();
});
$(".btn-delete").click(function () {
    var el = $(this);
    var group = el.closest('.form-group');
    var input = group.find('input');
    input.val('');
    input.focus();
});
$("#main-menu .btn-action").click(function () {
    $(".action-hidden").toggle();
});
$("#main-menu .btn-check").click(function () {
    checkAnswers();
});
$("#main-menu .btn-reset").click(function () {
    $(".question").val('');
});
$("#main-menu .btn-fill").click(function () {
    $(".question").each(function () {
        var el = $(this);
        var trueAnswer = el.data('answer');
        el.val(trueAnswer);
    });
});
$(".question").keydown(function (e) {
    switch (e.which) {
        case 13:
            checkAnswers();
        break;
        case 9:
            var nav = $(this).closest(".form-group");
            if (e.shiftKey) {
                nav = nav.prev();
            } else {
                nav = nav.next();
            }
            nav = $(nav);
            var item = nav.find(".question");
            if (!nav.length) {
                nav = $(this).closest(".sura-wrapper");
                if (e.shiftKey) {
                    nav = nav.prev();
                } else {
                    nav = nav.next();
                }
                nav = $(nav);
                if (e.shiftKey) {
                    item = $(nav.find(".question")[
                        nav.find(".question").length - 1
                    ]);
                } else {
                    item = $(nav.find(".question")[0]);
                }
            }
            item.focus();
            e.preventDefault();
        break;
    }
});
$(".total-question").html($(".question").length);
$("#main-menu .btn-action").click();
$("#main-menu .btn-title").click();
