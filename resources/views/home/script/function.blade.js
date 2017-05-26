
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

function toHtml(text) {
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
        lines[lines.length - 1] =
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
        case 'down':
            cursor.y = cursor.y + 1;
            if (text[cursor.y] == undefined) {
                text[cursor.y] = "";
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
