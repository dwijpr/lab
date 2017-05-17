@extends('layout.dart')

@section('_content')
<div class="text-center">
    {{ Html::image('/img/logo-composer-transparent5.png') }}
    <h1>
        Dependency Manager for PHP
    </h1>
</div>
<p class="lead">
    ... is a tool for dependency management in PHP. It allows you to
    declare the libraries your project depends on and it will manage
    (install/update) them for you.
</p>
<code>
    <pre>
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
    </pre>
</code>
@endsection