@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @yield('breadcrumb')
            @yield('_content')
        </div>
    </div>
</div>
@endsection