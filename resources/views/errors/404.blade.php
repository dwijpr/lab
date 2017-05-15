@extends('layout.base')

@section('style')
@include('welcome.style')
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ 404 }}
        </div>
    </div>
</div>
@endsection
