@foreach ($items as $item)
    @if ($item->isDir)
        <b class="text-info">{{ $item->name }}</b>/
    @else
        {{ $item->name }}
    @endif
    <br>
@endforeach
