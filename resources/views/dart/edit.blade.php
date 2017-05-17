@extends('layout.app')

@section('content')
{{ Form::open([
    'url' => 'dart/'.$dart->id,
    'method' => 'patch',
]) }}
    {{ Form::text('title', $dart->title, [
        'autofocus' => true,
    ]) }}
{{ Form::close() }}
@endsection