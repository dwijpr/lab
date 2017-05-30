if (!args[0]) {
    output("please provide directory name");
    break;
}
$.ajax({
    type: 'POST',
    url: "/terminal",
    data: {
        onlyDir: true,
        directory: directory.toString()
    },
    async: false,
    success: function(data) {
        var found = false;
        var dest = args[0];
        var directories = data.items;
        for (var i = 0;i < directories.length;i++) {
            if (dest == directories[i].name) {
                directory.change(dest);
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
