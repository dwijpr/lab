<?php
$todos = [
    [
        'title' => '<b>cd</b> upper directory',
        'done'  => false,
    ],
    [
        'title' => 'Implement <b>cd</b> command',
        'done'  => true,
    ],
    [
        'title' => 'ctrl + l to clear screen',
        'done'  => true,
    ],
    [
        'title' => 'List ToDo using variable',
        'done'  => true,
    ],
    [
        'title' => 'Implement <b>pwd</b> command',
        'done'  => true,
    ],
    [
        'title' => 'Connecting drive D: PC to jinny',
        'done'  => true,
    ],
    [
        'title' => 'Implement <b>ls</b> command',
        'done'  => true,
    ],
    [
        'title' => 'Refactor executeCommand()',
        'done'  => true,
    ],
    [
        'title' => 'Refactor command cannot be processed',
        'done'  => true,
    ],
];
?>

var text = `
<ul>
    @foreach ($todos as $todo)
    <li>
        {!! $todo['title'] !!}
        @if ($todo['done'])
            <i class="fa fa-check text-success"></i>
        @endif
    </li>
    @endforeach
</ul>
`;
output(text);
