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

function unknownCommand(command) {
    var text = `
        Sorry, I can't understand 
        <b class='text-danger'>` + command + `</b>
        :(
    `;
    output(text);
}

function executeCommand(command) {
    var commands = [
        'help', 'todo', 'ls'
    ];
    if (commands.indexOf(command) != -1) {
        switch (command) {
            case 'help':
                @include('terminal.script.command.help');
                break;
            case 'todo':
                @include('terminal.script.command.todo');
                break;
            case 'ls':
                @include('terminal.script.command.ls');
                break;
        }
    } else {
        unknownCommand(command);
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
