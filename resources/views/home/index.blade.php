@extends('layout.base')

@section('style')
@include('home.style')
@endsection

@section('content')
<div id="cmd" class="nokey" data-mode="insert" style="
    width: 100%;
"></div>
<div id="info">
    mode: <span class="mode"></span>
</div>
@endsection

@section('script')
@include('home.script')
@endsection