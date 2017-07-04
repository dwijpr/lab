@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            @include('log.table')
        </div>
    </div>
</div>
@endsection
