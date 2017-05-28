$.fn.selectRange = function(start, end) {
    if(end === undefined) {
        end = start;
    }
    return this.each(function() {
        if('selectionStart' in this) {
            this.selectionStart = start;
            this.selectionEnd = end;
        } else if(this.setSelectionRange) {
            this.setSelectionRange(start, end);
        } else if(this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};

var terminal = $("#terminal");
var commandTemplate = $(".command");

function output(value) {
    var div = $("<div></div>");
    div.html(value);
    terminal.append(div);
}

function executeCommand(command) {
    if (command == 'help') {
        output("Web CLI ~ version 0.0.1");
    } else {
        output(command + " - command cannot be processed");
    }
}

function Command() {
    var command = commandTemplate.clone();
    var commandInput = command.find(".command-input");
    terminal.append(command);
    autosize(commandInput);
    commandInput.keydown(function(e) {
        switch (e.key) {
            case 'Enter':
                e.preventDefault();
                executeCommand($(this).val());
                new Command();
                break;
        }
    });
    commandInput.focus();
    console.log(commandInput, commandInput.val());
}

new Command();
