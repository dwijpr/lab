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
<hr>
<h2 id="installation">Installation</h2>
{!! view('code.view', [
    'path' => 'laravel.sh'
])->render() !!}
<hr>
<h2 id="resource-controller">Resource Controller</h2>
<h3>Actions Handled By Resource Controller</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Verb</th>
            <th>URI</th>
            <th>Action</th>
            <th>Route Name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>GET</td>
            <td>
                /photos
            </td>
            <td>index</td>
            <td>photos.index</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/photos/create</td>
            <td>create</td>
            <td>photos.create</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/photos</td>
            <td>store</td>
            <td>photos.store</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/photos/{photo}</td>
            <td>show</td>
            <td>photos.show</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/photos/{photo}/edit</td>
            <td>edit</td>
            <td>photos.edit</td>
        </tr>
        <tr>
            <td>PUT/PATCH</td>
            <td>/photos/{photo}</td>
            <td>update</td>
            <td>photos.update</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/photos/{photo}</td>
            <td>destroy</td>
            <td>photos.destroy</td>
        </tr>
    </tbody>
</table>
@endsection
