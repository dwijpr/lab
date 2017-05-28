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
            <div class="command-wrapper">
                <textarea
                    class="command"
                    spellcheck="false"
                    rows="1"
                    style="
                        position: relative;
                        width: 100%;
                        background: #222;
                        word-break: break-all;
                        outline: none;
                        border: none;
                        resize: none;
                        padding: 0;
                        padding-left: 16px;
                    "
                ></textarea>
                <i
                    class="fa fa-chevron-right"
                ></i>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
$(function() {
@include('terminal.script')
});
@endsection
