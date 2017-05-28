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
<br>
list of available commands:
<ul>
    <li>
        <b>help</b>
        - showing this information
    </li>
    <li>
        <b>todo</b>
        - list of todo
    </li>
    <li>
        <b>ls</b>
        - print out current directory items
    </li>
</ul>
`;
output(text);
