@extends('layout.app')

@section('style')
    <style>
        @font-face {
            font-family: 'qalammajeed';
            src: url({{ asset(
                '/font/qalammajeed.ttf'
            ) }});
        }
        .ar-mark {
            display: inline-block;
            width: 24px;
            margin-left: 12px;
            margin-right: -4px;
        }
        .title {
            overflow: auto;
        }
        .word {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <!--
            <div class="title">
                <h1>
                    {{ $ayas->first()->sura->translation() }}
                    &nbsp;
                    <span
                        class="pull-right"
                        dir="rtl"
                        lang="ar"
                        style="
                            font-family: qalammajeed;
                            font-size: 48px;
                        "
                    >{!! clean($ayas->first()->sura->ar) !!}</span>
                </h1>
                <hr>
            </div>
            -->
            @foreach ($ayas as $aya)
                <div
                    dir="rtl"
                    lang="ar"
                    style="
                        font-family: qalammajeed;
                        font-size: 48px;
                    "
                >{!! clean($aya->text) !!}</div>
                <hr>
                <audio controls>
                    <source src="{{ asset(
                        '/audio/alquran/' . $aya->sura->translation() . '/' .
                        sprintf('%03d', $aya->sura_id) .
                        sprintf('%03d', $aya->aya_id) .
                        '.mp3'
                    ) }}" type="">
                </audio>
                <hr>
                <div>{{ $aya->terjemahan }}</div>
                <hr>
                <div>{{ $aya->jalalayn }}</div>
                <hr>
                <div
                    dir="rtl"
                    lang="ar"
                >
                    @foreach ($aya->words as $word)
                        <div
                            class="word"
                            style="
                                display: inline-block;
                                border-left: 1px solid #ddd;
                            "
                        >
                            <div class="content" style="visibility: visible;">
                                <span
                                    dir="rtl"
                                    lang="ar"
                                    style="
                                        display: inline-block;
                                        font-family: qalammajeed;
                                        font-size: 48px;
                                    "
                                >
                                    {{ $word->ar }}
                                </span>
                                <hr>
                                {{ $word->tr }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
            @endforeach
            <nav aria-label="Page navigation">
                <ul class="pager">
                    <li>
                        {!! $aya->prev() !!}
                    </li>
                    <li>
                        {!! $aya->next() !!}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection 

@section('script')
<script>
    $(function () {
        $(".word").click(function () {
            var el = $(this).find(".content");
            var visibility = el.css("visibility");
            if (visibility == 'hidden') {
                el.css("visibility", "visible");
            } else {
                el.css("visibility", "hidden");
            }
        });
    });
</script>
@endsection
