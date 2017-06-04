(function () {
    var name = args[0];
    if (!name) {
        output("missing operand");
        return;
    }
    $.ajax({
        type: 'POST',
        url: "/terminal/mkdir",
        async: false,
        data: {
            directory: directory.toString(),
            name: name
        },
        success: function(response) {
            if (response.success) {
                output("directory "+ name + " successfully created!");
            } else {
                console.log(response.error);
                output("error creating directory " + response.error);
            }
        }
    });
})();
