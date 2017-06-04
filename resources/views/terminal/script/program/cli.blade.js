(function () {
    $.ajax({
        type: 'POST',
        url: "/terminal/cli",
        async: false,
        data: {
            directory: directory.toString(),
            command: command,
        },
        success: function(response) {
            if (response.success) {
                output(response.output);
            } else {
                output("error executing command: " + command);
            }
        }
    });
})();