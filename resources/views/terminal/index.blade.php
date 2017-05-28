@extends('layout.base')

@section('style')
@include('terminal.style')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div
            style="
                padding-top: 64px;
            "
            class="col-sm-12 col-md-8 col-md-offset-2"
        >
            <div id="terminal"></div>
        </div>
    </div>
</div>
<div class="template">
    <div class="command">
        <textarea
            class="command-input"
            spellcheck="false"
            rows="1"
        ></textarea>
        <i
            class="fa fa-terminal"
        ></i>
    </div>
</div>
@endsection

@section('script')
$(function() {
@include('terminal.script')
});
@endsection
