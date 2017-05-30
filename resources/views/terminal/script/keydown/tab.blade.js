e.preventDefault();
var command = commandInput.val();
var parts = command.split(/\s+/);
var program = parts[0];
var args = [];
for (var i = 0;i < parts.length;i++) {
    if (i != 0) {
        args.push(parts[i]);
    }
}
var completion = args[args.length - 1];
if (completion == undefined) {
    break;
}
$.ajax({
    type: 'POST',
    url: "/terminal",
    data: {
        list: true,
        directory: directory.toString()
    },
    async: false,
    success: function(data) {
        var items = data.items;
        for (var i = 0;i < items.length;i++) {
            var pattern = new RegExp(completion);
            var result = items[i].name.search(pattern);
            var found = result == 0;
            if (found) {
                commandInput.val(program + ' ' + items[i].name);
                break;
            }
        }
    }
});
