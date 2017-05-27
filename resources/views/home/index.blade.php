@extends('layout.base')

@section('style')
@include('home.style')
@endsection

@section('content')
<div
    id="cmd"
    class="nokey"
    style="
        width: 100%;
    "
></div>
<div id="info">
    mode: <span class="mode"></span>
    <div class="pull-right">
        <div class="saved-command" style="margin-right: 32px;"></div>
    </div>
</div>
@endsection

@section('script')
$(function() {
@include('home.script.function')
@include('home.script')
});
@endsection