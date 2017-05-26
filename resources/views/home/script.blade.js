var mode = "command";
var cursor = {x: 0, y: 0};
var text = [""];
var container = $("#cmd");

$(document).keyup(function() {
    container.addClass("nokey");
})

$(document).keydown(function(e) {
    container.removeClass("nokey");
    if (mode == "insert") {
        if (e.key == '[' && e.ctrlKey) {
            setMode("command");
        } else {
            switch(e.key) {
                case 'Enter':
                    updateCursor('down');
                    break;
                case 'Backspace':
                    text[cursor.y] = setCharAt(
                        text[cursor.y], cursor.x - 1, ''
                    );
                    updateCursor('left');
                    break;
                case 'ArrowRight':
                    updateCursor('right');
                    break;
                case 'ArrowLeft':
                    updateCursor('left');
                    break;
                case 'Alt':
                case 'Shift':
                case 'Control':
                case 'ArrowDown':
                case 'ArrowUp':
                    break;
                default:
                    text[cursor.y] = text[cursor.y].insert(
                        cursor.x, e.key
                    );
                    updateCursor('right');
            }
        }
    } else if (mode == "command") {
        switch (e.key) {
            case 'a':
                setMode("insert");
                break;
            case 'i':
                setMode("insert");
                updateCursor('left');
                break;
            case 'h':
                updateCursor('left');
                break;
            case 'l':
                updateCursor('right');
                break;
        }
    }
    container.html(toHtml(text));
});

setMode(mode);
container.html(toHtml(text));
