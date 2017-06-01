(function () {
    if (!args[0]) {
        output('Provide the filename in the 2<sup>nd</sup> argument');
        return;
    }
    var target = args[0].replace(/^'(.*)'$/, '$1');
    var audio = $('.template .play-audio').clone();
    audio.find('source').attr(
        'src', '/terminal/data' + directory.toString() + target
    );
    terminal.append(audio);
})();
