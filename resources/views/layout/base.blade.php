<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{ Html::style('font-awesome/4.7.0/css/font-awesome.css') }}
        {{ Html::style('bootstrap/3.3.7/dist/css/bootstrap.css') }}
        @include('layout.font')
        <style>
        @include('layout.base.style')
        @yield('style')
        </style>
    </head>
    <body>
        @yield('content')
        <div class="text-center" style="padding-top: 32px;font-weight: normal;">
            <a href="{{ url('/') }}">
                {{ config('app.name') }}&copy;{{ date('Y') }}
            </a>
        </div>
        <script>
        @yield('script')
        </script>
    </body>
</html>
