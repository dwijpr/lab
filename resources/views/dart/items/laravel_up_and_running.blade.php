@extends('layout.dart')

@section('_content')
<div class="text-center">
    <h1>Love beautiful code? We do too.</h1>
    <p class="lead">
        The PHP Framework For Web Artisans
    </p>
    <div class="text-left">
        {!! view('item.macbook', [
            'content' => view('dart.items.laravel.content')->render()
        ])->render() !!}
    </div>
</div>
@endsection
