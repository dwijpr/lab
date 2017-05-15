@extends('layout.app')

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Lab</a></li>
    <li class="active">Dart</li>
</ol>
@endsection

@section('_content')
    @if ($error)
        <h1 class="text-center text-danger">
            Data Error!
            {{ Form::open([
                'url' => '/dart/sync',
                'style' => 'display: inline-block;',
            ]) }}
            <button class="btn btn-primary btn-lg">
                Sync
            </button>
            {{ Form::close() }}
        </h1>
    @else
    <ul>
        @foreach ($darts as $dart)
            <li>
                <a href="{{ url('/dart/'.$dart->key) }}">
                    {{ $dart->title }}
                </a>
            </li>
        @endforeach
    </ul>
    @endif
@endsection
