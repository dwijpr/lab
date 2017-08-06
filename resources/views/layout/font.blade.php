<?php
    $raleway = [
        '100' => 'Thin',
        '200' => 'ExtraLight',
        '300' => 'Light',
        '400' => [
            'normal' => 'Regular',
            'italic' => 'Italic',
        ],
        '500' => 'Medium',
        '600' => 'SemiBold',
        '700' => 'Bold',
        '800' => 'ExtraBold',
        '900' => 'Black',
    ];
?>
<style>
@foreach ($raleway as $weight => $font)
    <?php
        $_font = is_array($font)?$font['normal']:$font;
        $_fontItalic = is_array($font)?$font['italic']:($font.'Italic');
    ?>
    @font-face {
        font-family: 'Raleway';
        src: url({{ asset(
            '/font/Raleway/Raleway-'.$_font.'.ttf'
        ) }});
        font-weight: {{ $weight }};
    }
    @font-face {
        font-family: 'Raleway';
        src: url({{ asset(
            '/font/Raleway/Raleway-'.$_fontItalic.'.ttf'
        ) }});
        font-weight: {{ $weight }};
        font-style: italic;
    }
@endforeach
</style>


<?php
    $ubuntuMono = [
        '400' => [
            'normal' => 'R',
            'italic' => 'RI',
        ],
        '700' => [
            'normal' => 'B',
            'italic' => 'BI',
        ],
    ];
?>
<style>
@foreach ($ubuntuMono as $weight => $font)
    <?php
        $_font = is_array($font)?$font['normal']:$font;
        $_fontItalic = is_array($font)?$font['italic']:($font.'Italic');
    ?>
    @font-face {
        font-family: 'UbuntuMono';
        src: url({{ asset(
            '/font/ubuntu-font-family-0.83/UbuntuMono-'.$_font.'.ttf'
        ) }});
        font-weight: {{ $weight }};
    }
    @font-face {
        font-family: 'UbuntuMono';
        src: url({{ asset(
            '/font/ubuntu-font-family-0.83/UbuntuMono-'.$_fontItalic.'.ttf'
        ) }});
        font-weight: {{ $weight }};
        font-style: italic;
    }
@endforeach
</style>

<?php
    $SourceCodePro = [
        '200' => [
            'normal' => 'ExtraLight',
        ],
        '300' => [
            'normal' => 'Light',
        ],
        '400' => [
            'normal' => 'Regular',
        ],
        '500' => [
            'normal' => 'Medium',
        ],
        '600' => [
            'normal' => 'SemiBold',
        ],
        '700' => [
            'normal' => 'Bold',
        ],
        '800' => [
            'normal' => 'ExtraBold',
        ],
        '900' => [
            'normal' => 'Black',
        ],
    ];
?>
<style>
@foreach ($SourceCodePro as $weight => $font)
    <?php
        $_font = is_array($font)?$font['normal']:$font;
    ?>
    @font-face {
        font-family: 'SourceCodePro';
        src: url({{ asset(
            '/font/Source_Code_Pro/SourceCodePro-'.$_font.'.ttf'
        ) }});
        font-weight: {{ $weight }};
    }
@endforeach
</style>

<style>
    @font-face {
        font-family: 'qalammajeed';
        src: url({{ asset(
            '/font/qalammajeed.ttf'
        ) }});
    }
</style>
