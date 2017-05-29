if (!args[0]) {
    output("please provide directory name");
    break;
}
$.ajax({
    type: 'POST',
    url: "/terminal",
    data: {
        onlyDir: true,
        directory: directory
    },
    async: false,
    success: function(data) {
        var found = false;
        for (var i = 0;i < data.directories.length;i++) {
            if (args[0] == data.directories[i].name) {
                directory = directory + args[0] + '/';
                found = true;
                break;
            }
        }
        if (!found) {
            output(
                "Couldn't find <span class='text-info'>" + args[0]
                + "</span> directory"
            );
        }
    }
});
