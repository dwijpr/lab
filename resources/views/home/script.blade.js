$(function() {
    var mode = "command";
    var cursor = [0, 0];
    var text = [""];
    var cmd = $("#cmd");

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
        if (value == 'command' && cursor[0] == 0) {
            updateCursor('left');
        }
    }

    function toHtml(text) {
        var lines = [];
        var matchCursor = false;
        console.log('text', text, 'cursor', cursor);
        for (var i = 0;i < text.length;i++) {
            var line = "";
            for (var _i = 0;_i < text[i].length;_i++) {
                var char = text[i][_i];
                if (char == ' ') {
                    char = '&nbsp;';
                }
                if (i == cursor[1] && _i == cursor[0] - 1) {
                    char = "<span class='cursor'>"+char+"</span>";
                    matchCursor = true;
                }
                line = line + char;
            }
            lines[i] = line;
        }
        var html = "";
        console.log('matchCursor', matchCursor);
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
                cursor[1] = cursor[1] + 1;
                if (text[cursor[1]] == undefined) {
                    text[cursor[1]] = "";
                    cursor[0] = 0;
                }
                break;
            case 'right':
                cursor[0] = cursor[0] + 1;
                if (cursor[0] > text[cursor[1]].length) {
                    cursor[0] = text[cursor[1]].length;
                }
                break;
            case 'left':
                cursor[0] = cursor[0] - 1;
                if (
                    mode == 'command' && text[cursor[1]].length && cursor[0] < 1
                ) {
                    cursor[0] = 1;
                } else if (cursor[0] < 0) {
                    cursor[0] = 0;
                }
                break;
        }
    }

    $(document).keyup(function() {
        $("#cmd").addClass("nokey");
    })

    $(document).keydown(function(e) {
        $("#cmd").removeClass("nokey");
        if (mode == "insert") {
            if (e.key == '[' && e.ctrlKey) {
                setMode("command");
            } else {
                switch(e.key) {
                    case 'Enter':
                        updateCursor('down');
                        break;
                    case 'Backspace':
                        console.log(cursor);
                        text[cursor[1]] = setCharAt(
                            text[cursor[1]], cursor[0] - 1, ''
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
                        text[cursor[1]] = text[cursor[1]].insert(
                            cursor[0], e.key
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
        cmd.html(toHtml(text));
    });

    setMode(mode);
    cmd.html(toHtml(text));
});