@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul>
                @foreach ($files as $file)
                    <li>
                        <a href="{{ url('/code/'.$file->basename) }}">
                            {{ $file->basename }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
