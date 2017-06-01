@extends('layout.base')

@section('style')
@include('terminal.style')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div id="terminal"></div>
        </div>
    </div>
</div>
<div class="template">
    <div class="command">
        <textarea class="command-input" spellcheck="false" rows="1"></textarea>
        <i class="fa fa-terminal"></i>
    </div>
    <audio class="play-audio" controls>
        <source>
        Your browser does not support the audio element.
    </audio>
</div>
@endsection

@section('script')
$(function() {
@include('terminal.script')
});
@endsection
