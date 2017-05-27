var cursor = 0;
var command = "";
var terminal = $("#terminal");
var cursorTemplate = "<i style='color: white;' class='fa fa-i-cursor'></i>";

String.prototype.insert = function (index, string) {
    if (index > 0) {
        return this.substring(0, index)
            + string + this.substring(index, this.length);
    }
    else {
        return string + this;
    }
};

String.prototype.removeChar = function (index) {
    if (index > this.length - 1) {
        return this;
    }
    return this.substr(0, index) + this.substr(index + 1);
};

function draw(callback) {
    var html = "";
    var i = 0;
    while (i < command.length) {
        var char = command[i];
        if (char == ' ') {
            char = '&nbsp;';
        }
        html = html + char;
        if (i + 1 == cursor) {
            html = html + cursorTemplate;
        }
        i++;
    }
    if (cursor == 0) {
        html = cursorTemplate + html;
    }
    terminal.find(".command").html(html);
}

$(document).keydown(function(e) {
    switch (e.key) {
        case 'ArrowRight':
            cursor = cursor + 1;
            if (cursor >= command.length) {
                cursor = command.length;
            }
            draw();
            break;
        case 'ArrowLeft':
            cursor = cursor - 1;
            if (cursor < 0) {
                cursor = 0;
            }
            draw();
            break;
        case 'Backspace':
            cursor = cursor - 1;
            command = command.removeChar(cursor);
            if (cursor < 0) {
                cursor = 0;
            }
            draw();
            break;
    }
});

$(document).keypress(function(e) {
    command = command.insert(cursor, e.key);
    cursor = cursor + 1;
    draw();
});

draw();
