@extends('layout.app')

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Lab</a></li>
    <li><a href="{{ url('/dart') }}">Dart</a></li>
    <li class="active">Notes</li>
</ol>
@endsection

@section('_content')
<h1>Notes</h1>
<ul>
    <li>
        <h2>
            Create local assets
            -
            mapping from layouts
        </h2>
        <ul>
            <li>
            </li>
            <li>
                Install <i>get</i>Bootstrap
                <i class="fa fa-check text-success"></i>
            </li>
            <li>
                Install laravelcollective HTML &amp; Form
                <i class="fa fa-check text-success"></i>
            </li>
            <li>
                Install font awesome
                <i class="fa fa-check text-success"></i>
            </li>
            <li>
                font
                <i class="fa fa-check text-success"></i>
            </li>
        </ul>
    </li>
    <li>
        <h2>Create Dart - to list all notes</h2>
        <table>
            <tr>
                <td style="vertical-align: top;">
                    <ul>
                        <b>Features</b>
                        <li>
                            Attached to source based system
                        </li>
                        <li>Frontend Management Viewable</li>
                        <li>Blade Content Format</li>
                    </ul>
                </td>
                <td style="vertical-align: top;">
                    <ul>
                        <b>ToDo</b>
                        <li>
                        </li>
                        <li>
                            Implement SQLite
                        </li>
                        <li>
                            Nested Extend Layout
                            <i class="fa fa-check text-success"></i>
                        </li>
                        <li>
                            Dart Index
                            <i class="fa fa-check text-success"></i>
                        </li>
                        <li>
                            Create new Github account
                            <i class="fa fa-check text-success"></i>
                        </li>
                        <li>
                            Sample data structure for files storage
                            <i class="fa fa-check text-success"></i>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </li>
</ul>
@endsection
