$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var terminal = $("#terminal");
var commandTemplate = $(".command");
var directory = {
    segments: ['/'],
    change: function(dest) {
        if (dest == '..' && this.segments.length > 1) {
            this.segments.pop();
        } else if (dest == '.') {
        } else if (dest != '..') {
            this.segments.push(dest);
        }
        readme();
    },
    toString: function() {
        return (this.segments.join('/') + '/').replace(/\/\/+/g, '/');
    }
};
var token = '{{ csrf_token() }}';

function output(value) {
    var div = $("<div></div>");
    div.html(value);
    terminal.append(div);
}

function readme() {
    $.ajax({
        type: 'POST',
        url: "terminal/readme",
        data: {
            directory: directory.toString()
        },
        async: false,
        success: function(data) {
            if (data.exists) {
                output(data.view);
            }
        }
    });
}

function unknownCommand(command) {
    var text = `
        Sorry, I can't understand 
        <b class='text-danger'>` + command + `</b>
        :(
        <br>
        try <span class="text-info">help</span>
    `;
    output(text);
}

<?php
$programs = [
    'help'  => 'Display this information',
    'todo'  => 'list of todo',
    'pwd'   => 'Print the name of the current working directory',
    'ls'    => 'Display directory stack',
    'cd'    => 'Change the shell working directory',
    'play'  => 'Run multimedia file, like video or audio file',
    'mkdir' => 'Create directory',
    'code'  => 'Code Editor',
];
?>

function executeCommand(command) {
    var programs = <?=json_encode(array_keys($programs))?>;
    var parts = command.match(/[^\s"']+|"([^"]*)"|'([^']*)'/g);
    var args = [];
    for (var i = 0;i < parts.length;i++) {
        if (i == 0) {
            var program = parts[i];
        } else {
            args.push(parts[i]);
        }
    }
    switch (program) {
        @foreach ($programs as $program => $desc)
        case '{{ $program}}':
            @include('terminal.script.program.'.$program);
            break;
        @endforeach
        default:
            if ([
                'git'
                , 'docker-compose'
                , 'laravel'
                , 'php'
            ].indexOf(program) != -1) {
                @include('terminal.script.program.cli');
            } else {
                unknownCommand(command);
            }
    }
}

function Command() {
    var command = commandTemplate.clone();
    var commandInput = command.find(".command-input");
    terminal.append(command);
    autosize(commandInput);
    commandInput.keydown(function(e) {
        switch (e.key) {
            case 'Tab':
                @include('terminal.script.keydown.tab')
                break;
            case 'Enter':
                e.preventDefault();
                executeCommand($(this).val());
                new Command();
                break;
            case 'l':
                if (e.ctrlKey) {
                    e.preventDefault();
                    terminal.html("");
                    new Command();
                }
                break;
        }
    });
    commandInput.focus();
}

readme();
new Command();
