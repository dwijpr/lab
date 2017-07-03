(function () {
    var file = args[0];
    if (!file) {
        output("file not found!");
        return;
    }
    $.ajax({
        type: 'POST',
        url: "terminal/code",
        async: false,
        data: {
            directory: directory.toString(),
            file: file
        },
        success: function(data) {
            $("#code").show();
            $("#code").html("<pre>" + data.content + "</pre>");
        }
    });
})();