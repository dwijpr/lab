@extends('layout.dart')

@section('head')
{{ Html::style('/highlight/styles/monokai-sublime.css') }}
{{ Html::script('/highlight/highlight.pack.js') }}
{{ Html::script(
    '/highlight/highlightjs-line-numbers.js/'
    .'1.1.0/src/highlightjs-line-numbers.js'
) }}
<script>
    hljs.initHighlightingOnLoad();
    hljs.initLineNumbersOnLoad();
</script>
@endsection

@section('style')
@parent
@include('code.style')
@endsection

@section('_content')
<div class="text-center">
    {{ Html::image('/img/logo-composer-transparent.png') }}
    <h1>
        Dependency Manager for PHP
    </h1>
</div>
{!! view('code.view', [
    'path' => 'composer.sh'
])->render() !!}
@endsection