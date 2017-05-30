@if (count($items))
<ul>
    @foreach ($items as $todo)
    <li>
        {!! $todo['title'] !!}
        @if ($todo['done'])
            <i class="fa fa-check text-success"></i>
        @endif
    </li>
    @endforeach
</ul>
@else
No ToDo Found! Start by creating one
@endif
