@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Islam</h1>
            <hr>
            <ul>
                <li>
                    <a href="{{ url('/islam/arab') }}">Arab Quran</a>
                </li>
                <li>
                    <a href="{{ url('/islam/quran') }}">Quran</a>
                </li>
                <li>
                    <a href="{{ url('/islam/shalat') }}">Shalat</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
