@extends('layout.base')

@section('style')
@parent
@include('layout.app.style')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @yield('_content')
        </div>
    </div>
</div>
@yield('breadcrumb')
@endsection