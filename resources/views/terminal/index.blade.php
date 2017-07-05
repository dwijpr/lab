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
<div
    style="
        position: fixed;
        top: 0px;
        left: 0px;
        height: 100vh;
        width: 100vw;
        overflow: auto;
        display: none;
    "
    id="code"
></div>
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
<div style="
    position: absolute;
    bottom: 0px;
    width: 100%;
    background: #333;
">
    <h4
        class="text-right"
        style="padding-right: 16px;"
    >
        <a href="http://github.com/dwijpr" target="_blank">
            <i class="fa fa-github"></i>
        </a>
        <a href="http://www.linkedin.com/in/dwiprabowo" target="_blank">
            <i class="fa fa-linkedin"></i>
        </a>
    </h4>
</div>
@endsection

@section('script')
$(function() {
@include('terminal.script')
});
@endsection
