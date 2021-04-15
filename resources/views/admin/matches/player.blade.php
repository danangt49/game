@extends('adminlte::page')

@section('title', 'Match')

@section('content_header')
    <h1>Match Score Detail</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                {{session('success')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Game</th>
                                <th>Match Name</th>
                                <th>Room ID/Pass</th>
                                <th>Match Schedule</th>
                                <th>Total Players</th>
                                <th>Prize</th>
                                <th>Per Kill</th>
                                <th>Fee</th>
                                <th>Match Mode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_detail as  $key => $data_d)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data_d->title }}</td>
                                <td>{{ $data_d->match_name }}</td>
                                <td>{{ $data_d->room }}</td>
                                <td>{{ $data_d->match_schedule }}</td>
                                <td>{{ $data_d->players }}</td>
                                <td>{{ $data_d->prize }}</td>
                                <td>{{ $data_d->kill }}</td>
                                <td>{{ $data_d->fee }}</td>
                                <td>{{ $data_d->mode }}</td>
                                <td>
                                    @if($data_d->status == 'deactive' )
                                        <span class="text-danger">Deactive</span>
                                    @elseif($data_d->status == 'active')
                                        <span class="text-primary">Active</span>
                                    @elseif($data_d->status == 'complete')  
                                        <span class="text-success">Complete</span>
                                    @else
                                        <span class="text-warning">Upcoming</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="laravel_datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Match Name</th>
                            <th>Username</th>
                            <th>Place</th>
                            <th>Place Point</th>
                            <th>Killed</th>
                            <th>Kill Win</th>
                            <th>Win Prize</th>
                            <th>Bonus</th>
                            <th>Total Win</th>
                            <th>Refund</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as  $key => $db1)
                               
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $db1->match_name }}</td>
                                <td>{{ $db1->username }}</td>
                                <td>{{ $db1->place }}</td>
                                <td>{{ $db1->place_point }}</td>
                                <td>{{ $db1->killed }}</td>
                                <td>{{ $db1->kill_win }}</td>
                                <td>{{ $db1->win_prize }}</td>
                                <td>{{ $db1->bonus }}</td>
                                <td>{{ $db1->total }}</td>
                                <td>{{ $db1->refund }}</td> 
                                <td>
                                <button type="button" data-id="{{ $db1->id }}" id="editScore" class="btn-xs btn btn-success" data-toggle="modal" data-target="#edit-modal"><i class="fas fa-search"></I></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="edit-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" align="center"><b>Edit Score</b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="tampil_data"></div>
                        </div>
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

        $('#laravel_datatable').DataTable();
        $('#detail_datatable').DataTable();

        $('body').on('click', '#editScore', function () {
            var csrf_token = "{{ csrf_token() }}";
            var document_id = $(this).data("id");
            $.ajax({
                url: "{{ url('admin/matches-score')}}/"+document_id,
                type: "GET",
                success: function(data){
                $("#tampil_data").html(data);
                },
            });
        });
        
    });
        

</script>
@stop