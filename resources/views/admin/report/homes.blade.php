@extends('adminlte::page')

@section('title', 'Player')

@section('content_header')
    <h1>Rank Player</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2"> 
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#ff" data-toggle="tab">FREE FIRE</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pubg" data-toggle="tab">PUBG</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="ff">
                                <div class="table-responsive">
                                    <table class="table table-inverse table-striped" id="ff2_datatable">
                                        <h3>SQUAD RANK PLAYER</h3>
                                        <hr/>
                                        <thead>
                                            <tr>
                                                <th width="10px">No</th>
                                                <th>Player</th>
                                                <th>Tournament</th>
                                                <th width="100px">Kill</th>
                                                <th>Status<th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ff as $key => $value)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->match_name}}</td>
                                                <td>{{$value->kill}}</td>
                                                <td>{{$value->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="pubg">
                                <div class="table-responsive">
                                    <table class="table table-inverse table-striped" id="pubg2_datatable">
                                        <h3>SQUAD RANK PLAYER</h3>
                                        <hr/>
                                        <thead>
                                            <tr>
                                                <th width="10px">No</th>
                                                <th>Player</th>
                                                <th>Tournament</th>
                                                <th width="100px">Kill</th>
                                                <th>Status<th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pubg as $key => $value)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$value->name}}</td>
                                                <td>{{$value->match_name}}</td>
                                                <td>{{$value->kill}}</td>
                                                <td>{{$value->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#ff2_datatable').DataTable();
            $('#pubg2_datatable').DataTable();
        });
    </script>
@stop