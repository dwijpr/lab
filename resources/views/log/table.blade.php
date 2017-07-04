<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>IP</th>
            <th>Time</th>
            <th>Agent</th>
            <th>Host</th>
            <th>URI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->ip }}</td>
                <td>{{ date('Y-m-d H:i:s', $log->time) }}</td>
                <td>{{ dump(parse_user_agent($log->agent)) }}</td>
                <td>{{ $log->host }}</td>
                <td>{{ $log->uri }}</td>
            </tr>
        @endforeach
    </tbody>
</table>