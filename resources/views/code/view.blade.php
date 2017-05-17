<?php
    $content = Storage::get('/code/'.$path);
    $extension = pathinfo($path)['extension'];
?>
<div class="editor-wrapper">
    <div class="editor">
        <div class="header">
            {{ $path }}
            <!--
            <div class="pull-right">
                <a href="{{ url('/code') }}" class="btn btn-danger">
                    <i class="fa fa-close"></i>
                </a>
            </div>
            -->
        </div>
        <div class="content">
            <pre><code class="{{ $extension }}">{!! $content !!}</code></pre>
        </div>
    </div>
</div>
