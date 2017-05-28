@foreach ($items as $item)
    @if ($item->isDir)
        <b class="text-info">{{ $item->name }}/</b>
    @else
    @endif
    <br>
@endforeach
