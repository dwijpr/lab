function setCharAt(str, index, chr) {
    if (index > str.length - 1) return str;
    return str.substr(0, index) + chr + str.substr(index + 1);
}

String.prototype.insert = function (index, string) {
    if (index > 0)
        return this.substring(0, index) + string + this.substring(index, this.length);
    else
        return string + this;
};

function type(string) {
    for (var i = 0;i < string.length;i++) {
        text[cursor.y] = text[cursor.y].insert(
            cursor.x, string[i]
        );
        updateCursor('right');
    }
    updateCursor('down');
}

function executeCommand(command) {
    if (command == 'help') {
        type("Dwi Lab, version 0.0.1");
        type("This is a command line interface basic command");
        type("list of available commands:");
        type("- help");
        type("- todo");
        type("----------------------------------------------------------");
    }
    if (command == 'todo') {
        type("----------------------------------------------------------");
        type("|                  ToDo, version 0.0.1                   |");
        type("----------------------------------------------------------");
        type("1. Refactor Code");
        type("----------------------------------------------------------");
    }
}

function commandDetected() {
    var line = text[cursor.y];
    var n = line.search(/> /);
    if (n != -1) {
        return line.replace("> ", '');
    }
    return false;
}

function deleteLine() {
    if (text.length > 1) {
        text.splice(cursor.y, 1);
        if (text[cursor.y] == undefined) {
            cursor.y = cursor.y - 1;
        } else if (text[cursor.y].length) {
            cursor.x = 1;
        }
    } else {
        text[0] = "";
    }
    saveCommand("");
}

function saveCommand(value) {
    savedCommand = value;
    $("#info .saved-command").text(savedCommand);
}

function setMode(value) {
    mode = value;
    $("#info .mode").text(mode);
    $("#cmd").removeClass("mode-insert");
    $("#cmd").removeClass("mode-command");
    $("#cmd").addClass("mode-"+mode);
    if (value == 'command' && cursor.x == 0) {
        updateCursor('left');
    }
}

function toHtml() {
    var lines = [];
    var matchCursor = false;
    for (var i = 0;i < text.length;i++) {
        var line = "";
        for (var _i = 0;_i < text[i].length;_i++) {
            var char = text[i][_i];
            if (char == ' ') {
                char = '&nbsp;';
            }
            if (i == cursor.y && _i == cursor.x - 1) {
                char = "<span class='cursor'>"+char+"</span>";
                matchCursor = true;
            }
            line = line + char;
        }
        lines[i] = line;
    }
    var html = "";
    if (!matchCursor) {
        var char = '&nbsp;';
        if (mode == 'insert') {
            char = '';
        }
        lines[cursor.y] =
            "<span class='cursor'>"+char+"</span>"
            +lines[lines.length - 1];
    }
    for (var i = 0;i < lines.length;i++) {
        html = html + lines[i] + "<br>";
    }
    return html;
}

function updateCursor(direction) {
    switch (direction) {
        case 'up':
            cursor.y = cursor.y - 1;
            if (cursor.y < 0) {
                cursor.y = 0;
            }
            if (text[cursor.y].length) {
                if (cursor.x == 0) {
                    cursor.x = 1;
                } else if (!(cursor.x <= text[cursor.y].length)) {
                    cursor.x = text[cursor.y].length;
                }
            } else if (!text[cursor.y].length) {
                cursor.x = 0;
            }
            break;
        case 'down':
            cursor.y = cursor.y + 1;
            if (text[cursor.y] == undefined) {
                if (mode == 'insert') {
                    text[cursor.y] = "";
                    cursor.x = 0;
                } else if (mode == 'command') {
                    cursor.y = text.length - 1;
                }
            }
            if (text[cursor.y].length) {
                if (cursor.x <= text[cursor.y].length) {
                    cursor.x = cursor.x;
                } else if (cursor.x > text[cursor.y].length) {
                    cursor.x = text[cursor.y].length;
                } else {
                    cursor.x = 1;
                }
            } else {
                cursor.x = 0;
            }
            break;
        case 'right':
            cursor.x = cursor.x + 1;
            if (cursor.x > text[cursor.y].length) {
                cursor.x = text[cursor.y].length;
            }
            break;
        case 'left':
            cursor.x = cursor.x - 1;
            if (
                mode == 'command' && text[cursor.y].length && cursor.x < 1
            ) {
                cursor.x = 1;
            } else if (cursor.x < 0) {
                cursor.x = 0;
            }
            break;
    }
}
