$.ajax({
    type: 'POST',
    url: "/todo",
    data: {
        directory: directory.toString()
    },
    async: false,
    success: function(data) {
        output(data.view);
    }
});
