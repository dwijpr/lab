<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        {{ Html::favicon('img/erlenmeyer.png') }}
        {{ Html::style('font-awesome/4.7.0/css/font-awesome.css') }}
        {{ Html::style('bootstrap/3.3.7/dist/css/bootstrap.css') }}
        @include('layout.font')
        @yield('head')
        <style>
        @include('layout.base.style')
        @yield('style')
        </style>
    </head>
    <body>
        @yield('content')
        <div id="footer" class="text-center" style="
            background: white;
            position: fixed;
            width: 100%;
            bottom: 0px;
            padding-bottom: 16px;
            font-weight: normal;
        ">
            <hr style="margin-top: 0px;">
            <a href="{{ url('/') }}">
                {{ config('app.name') }}&copy;{{ date('Y') }}
            </a>
        </div>
        {{ Html::script('/js/jquery-1.12.4.js') }}
        <script>
        @yield('script')
        </script>
    </body>
</html>
