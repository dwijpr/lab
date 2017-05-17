@extends('layout.app')

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Lab</a></li>
    <li><a href="{{ url('/dart') }}">Dart</a></li>
    <li class="active">{{ $dart->title }}</li>
</ol>
@endsection

@section('_content')
<h1>{{$dart->title}}</h1>
@yield('__content')
@endsection
