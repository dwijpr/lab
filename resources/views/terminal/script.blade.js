var cursor = 0;
var command = "";
var terminal = $("#terminal");

String.prototype.insert = function (index, string) {
    if (index > 0)
        return this.substring(0, index) + string + this.substring(index, this.length);
    else
        return string + this;
};

function setCharAt(str, index, chr) {
    if (index > str.length - 1) return str;
    return str.substr(0, index) + chr + str.substr(index + 1);
}

function draw(callback) {
    var html = "";
    var i = 0;
    while (i < command.length) {
        html = html + command[i];
        if (i + 1 == cursor) {
            html = html + "<i style='color: white;' class='fa fa-i-cursor'></i>";
        }
        i++;
    }
    if (cursor == 0) {
        html = "<i style='color: white;' class='fa fa-i-cursor'></i>" + html;
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
            if (cursor < 0) {
                cursor = 0;
            }
            command = setCharAt(command, cursor, '');
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
