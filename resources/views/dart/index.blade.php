@extends('layout.app')

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Lab</a></li>
    <li class="active">Dart</li>
</ol>
@endsection

@section('_content')
    <ul>
        @foreach ($darts as $dart)
            <li>
                <a href="{{ url('/dart/'.$dart->key) }}">
                    {{ $dart->key }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
