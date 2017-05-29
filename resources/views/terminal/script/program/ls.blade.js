$.ajax({
    type: 'POST',
    url: "/terminal",
    data: {
        directory: directory
    },
    async: false,
    success: function(data) {
        output(data.view);
    }
});
