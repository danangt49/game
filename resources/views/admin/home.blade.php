@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_body')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('admin/games') }}">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-gamepad"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Games</span>
                                    <span class="info-box-number">{{$game}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('admin/matches') }}">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Matches</span>
                                    <span class="info-box-number">{{$match}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('admin/member') }}">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number">{{$user}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ url('admin/confirmation') }}">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Transfer</span>
                                    <span class="info-box-number">{{$transfer}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Members Activity Table</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="aktivitasuser">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Members</th>
                                        <th>Activity</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>

        $(document).ready( function () {
            $('#aktivitasuser').DataTable({
                ordering:true,
                processing: true,
                serverSide: true,
                ajax:{
                    url : "{{ url('admin/JSONaktivitas') }}",
                    type: "post",
                    data: {
                        '_token':'{{csrf_token()}}'
                    }
                }
            });
        }); 

    </script>
@stop
