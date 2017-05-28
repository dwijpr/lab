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
        output("GNU bash, version 4.3.42(5)-release (x86_64-pc-msys)");
        output("These shell commands are defined internally.  Type `help' to see this list.");
        output("Type `help name' to find out more about the function `name'.");
        output("Use `info bash' to find out more about the shell in general.");
        output("Use `man -k' or `info' to find out more about commands not in this list.");
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
