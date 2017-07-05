@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table">
                    @foreach ($logs_grouped as $current_ip => $logs)
                        <tr class="header">
                            <td>
                                <b>{{ $current_ip }}</b>
                            </td>
                            <td>{{ dump($ips[$current_ip]) }}</td>
                            <td class="text-right">
                                <span class="badge">
                                    {{ count($logs) }}
                                </span>
                            </td>
                            <td>
                                <i class="fa fa-chevron-down"></i>
                            </td>
                        </tr>
                        <tr style="display: none;">
                            <td colspan="3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Agent</th>
                                            <th>Host</th>
                                            <th>URI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('log.table')
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
$(function() {
    @include('log.script')
});
@endsection
