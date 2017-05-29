var version = {
    release: 0,
    major: 0,
    minor: 2,
    toString: function() {
        return this.release + '.' + this.major + '.' + this.minor;
    }
};
var text = `
<span class="text-primary">jinny</span> version ` + version.toString() + `
<br><br>
list of available commands:
<br><br>
<table>
    @foreach($programs as $program => $desc)
    <tr>
        <td style="padding-right: 8px;"><b>{{ $program }}</b></td>
        <td>- {{ $desc }}</td>
    </tr>
    @endforeach
</table>
`;
output(text);
