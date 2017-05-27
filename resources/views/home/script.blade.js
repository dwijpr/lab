var mode = "command";
var cursor = {x: 0, y: 0};
var text = [""];
var container = $("#cmd");
var savedCommand = "";

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
                    var command = commandDetected();
                    updateCursor('down');
                    if (command) {
                        executeCommand(command);
                    }
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
            case 'd':
                if (savedCommand == "d") {
                    deleteLine();
                } else {
                    saveCommand("d");
                }
                break;
            case 'a':
                setMode("insert");
                break;
            case 'j':
                updateCursor('down');
                break;
            case 'k':
                updateCursor('up');
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
    container.html(toHtml());
});

setMode(mode);
container.html(toHtml());

setMode("insert");
type("                 _..__.          .__.._");
type("               .^\"-.._ '-(\\__/)-' _..-\"^.");
type("                      '-.' oo '.-'");
type("                         `-..-'  fsc ");
type("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
type("");
setMode("command");
$(document).trigger({type: 'keydown'});
$(document).trigger({type: 'keyup'});
