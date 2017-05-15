@extends('layout.app')

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Lab</a></li>
    <li><a href="{{ url('/dart') }}">Dart</a></li>
    <li class="active">{{ $dart->title }}</li>
</ol>
@endsection

@section('_content')
<h1>Web Artisan</h1>
<blockquote>
    <p>
        The PHP Framework For <u>Web Artisan</u>s
    </p>
    <footer>
        <cite>
            <a href="https://laravel.com/" target="_blank"
            >https://laravel.com</a>
        </cite>
        15 May 2017
    </footer>
</blockquote>
<blockquote>
    <p>
        <span class="bg-warning">artisan</span>
        <span class="bg-muted">/ar&middot;ti&middot;san/</span>
        <i class="text-danger" style="border-bottom: 1px dotted red;">n</i>
        orang yang ahli membuat barang kerajinan tangan
    </p>
    <footer>
        <cite>
            <a href="http://kbbi.web.id/artisan" target="_blank">
                http://kbbi.web.id/artisan
            </a>
        </cite> 15 May 2017
    </footer>
</blockquote>
@endsection