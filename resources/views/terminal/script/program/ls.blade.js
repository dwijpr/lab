$.ajax({
    type: 'POST',
    url: "/terminal",
    data: {
        directory: directory.toString()
    },
    async: false,
    success: function(data) {
        output(data.view);
    }
});
