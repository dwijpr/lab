var command = args[0];
var desc = args[1];
if (command == 'create') {
    if (!desc) {
        output('Please describe your ToDo using 2<sup>nd</sup> argument');
    } else {
        if (
            (desc[0] == '"' || desc[0] == "'")
            &&
            desc[0] == desc[desc.length - 1]
        ) {
            desc = desc.substr(1);
            desc = desc.slice(0, -1);
        }
        output(desc);
    }
} else if (!command) {
    $.ajax({
        type: 'GET',
        url: "/todo",
        data: {
            directory: directory.toString()
        },
        async: false,
        success: function(data) {
            output(data.view);
        }
    });
}
