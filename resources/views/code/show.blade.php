@extends('layout.base')

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

@section('content')
{!! view('code.view', [
    'path' => $path
])->render() !!}
@endsection
