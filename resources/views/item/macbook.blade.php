<div
    class="hidden-xs"
    style="
        width: 100%;
    "
>
    <div style="
        margin: 0 auto;
        width: 694px;
        height: 384px;
        padding: 40px 97px 53px;
        background: url({{ asset('/img/macbook.png') }});
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    ">
        <div style="
            padding: 4px;
            width: 100%;
            height: 100%;
            overflow: auto;
        ">
            {!! $content !!}
        </div>
    </div>
</div>

<div
    class="visible-xs"
>
    {!! $content !!}
</div>
