var command = args[0];
if (command == 'delete') {
    var id = args[1];
    if (!id) {
        output('Please describe your ToDo ID 2<sup>nd</sup> argument');
    } else {
        $.ajax({
            type: 'DELETE',
            url: "/todo/" + id,
            async: false,
            success: function(data) {
                if (data.success) {
                    output('ToDo deleted!');
                } else {
                    output('Error deleting ToDo: ' + data.message);
                }
            }
        });
    }
} else if (command == 'create') {
    var desc = args[1];
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
        $.ajax({
            type: 'POST',
            url: "/todo",
            data: {
                desc: desc
            },
            async: false,
            success: function(data) {
                if (data.success) {
                    output('ToDo created!');
                } else {
                    output('Error creating ToDo: ' + data.message);
                }
            }
        });
    }
} else if (!command || command == 'id') {
    $.ajax({
        type: 'GET',
        url: "/todo",
        data: {
            options: command
        },
        async: false,
        success: function(data) {
            output(data.view);
        }
    });
}
