<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{ Html::style('font-awesome/4.7.0/css/font-awesome.css') }}
        @include('layout.font')
        <style>
        @include('layout.base.style')
        @yield('style')
        </style>
    </head>
    <body>
        @yield('content')
        <script>
        @yield('script')
        </script>
    </body>
</html>
