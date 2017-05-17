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
<div class="editor-wrapper">
    <div class="editor">
        <div class="header">
            {{ $path }}
            <div class="pull-right">
                <button class="btn btn-danger">
                    <i class="fa fa-close"></i>
                </button>
            </div>
        </div>
        <div class="content">
            <pre><code class="js">{!! $content !!}</code></pre>
        </div>
    </div>
</div>
@endsection
