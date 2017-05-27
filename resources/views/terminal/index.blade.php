@extends('layout.base')

@section('style')
@include('terminal.style')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-md-offset-2">
            <div
                id="terminal"
                style="padding-top: 48px;"
            >
                <div class="head">
                    <i class='fa fa-chevron-right'></i>
                </div>
                <div class="command"
                ></div>
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
