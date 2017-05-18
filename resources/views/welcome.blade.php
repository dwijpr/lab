@extends('layout.base')

@section('style')
@include('welcome.style')
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif
    <div class="content">
        <div class="title m-b-md">
            {{-- {{ config('app.name') }} --}}
            {{ Html::image('/img/lab.gif') }}
        </div>
        <div class="links">
            <a href="{{ url('/dart') }}">Dart</a>
            <a href="{{ url('/code') }}">Code</a>
            <a href="https://github.com/owlpre/lab" target="_blank">GitHub</a>
        </div>
    </div>
</div>
@endsection
