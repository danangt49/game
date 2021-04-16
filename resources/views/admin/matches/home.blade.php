@extends('adminlte::page')

@section('title', 'Match')

@section('content_header')
    <h1>Match List</h1>
@stop

@section('content')
    <div class="col-md-6">
        <a href="{{ url('admin/matches-create') }}" class="btn btn-primary"><i class="fas fa-plus-square"> ADD</i></a>
    </div>
    <hr>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            {{session('success')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Game</th>
                            <th>Match Name</th>
                            <th>Room ID/Pass</th>
                            <th>Match Schedule</th>
                            <th>Total Players</th>
                            <th>Prize</th>
                            <th>Fee</th>
                            <th>Match Mode</th>
                            <th>Status</th>
                            <th width="120px">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
   <!-- <div id="dlg" class="easyui-dialog" title="list match" style="width:900px;height:400px; padding:5px;" data-options="closed:true">-->
			<!--<div id="list_match"></div>-->
   <!-- </div>-->
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/JSONmatches') }}",
                columns: [
                    { data: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'title', name: 'game' },
                    { data: 'match_name', name: 'matches' },
                    { data: 'room', name: 'room' },
                    { data: 'match_schedule', name: 'match_schedule' },
                    { data: 'players', name: 'players' },
                    { data: 'prize', name: 'prize' },
                    { data: 'fee', name: 'fee' },
                    { data: 'mode', name: 'mode' },
                    { data: 'status', render: function(data)
                        {
                            if(data == 'deactive' ){
                                return '<span class="text-danger">Deactive</span>';
                            }else if(data == 'active'){
                                return '<span class="text-primary">Active</span>';
                            }else if(data == 'complete'){  
                                return '<span class="text-success">Complete</span>';
                            }else{  
                                return '<span class="text-warning">Upcoming</span>';
                            }
                        }
                    },
                    {data: 'action', name: 'Aksi', orderable: false, searchable: false}
                ]
            });
        });

        $('body').on('click', '.delete', function () {
            var csrf_token = "{{ csrf_token() }}";
            var document_id = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "You will be delete this item ?",
                type: "warning",
                confirmButtonText: "Yes, delete",
                showCancelButton: true
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('admin/matches-delete')}}" + '/' + document_id,
                        type: "POST",
                        data: {
                            '_method': 'GET',
                            '_token': csrf_token
                        },
                        success: function(){
                            swal(
                                'Success',
                                'Destroy Data <b style="color:green;">Success</b> button!',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            swal({
                                title: 'Opps...',
                                text: 'Error',
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your stay here :)',
                        'error'
                    )
                }
            })
        });
        $('body').on('click', '.score-match', function () {
            $("#dlg2").dialog('open');
            var csrf_token = "{{ csrf_token() }}";
            var document_id = $(this).data("id");
            $.ajax({
                url: "{{ url('admin/matches-score')}}",
                type: "POST",
                data: {
                    'id' : document_id,
                    '_token': csrf_token
                },
                success: function(data){
                    $("#list_score").html(data);
                    $(".detail").val('');
                },
            });
        });
  </script>
@stop
