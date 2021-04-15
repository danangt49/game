@extends('adminlte::page')

@section('title', 'Game')

@section('content_header')
    <h1>Game List</h1>
@stop

@section('content')
    <div class="col-md-6">
        <a href="games-create" class="btn btn-primary"><i class="fas fa-plus-square"> ADD</i></a>
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
                        <th>Image</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
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
                ajax: "{{ url('admin/JSONgames') }}",
                columns: [
                    { data: 'id', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                    },
                    { data: 'title', name: 'title' },
                    { data: 'picture', render: function(data)
                        {
                            if(data ==null || data=="" ){
                                return '<img src="{{ asset("public/asset/gane/default.png")}}" width="90px" height="80px" />';
                            }else{
                                return '<img src="{{ asset("public/asset/game")}}/'+ data +'" width="90px" height="80px" />';
                            }
                        }
                    },
                    // { data: 'statusgame', render: function(data)
                    //   {
                    //       if(data ==0 ){
                    //         return '<span class="badge badge-success">Active</span>';
                    //       }else{
                    //         return '<span class="badge badge-danger">Not Active</span>';
                    //       }
                    //     }
                    // },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
        $('body').on('click', '.delete-game', function () {
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
                        url: "{{ url('admin/games-delete')}}" + '/' + document_id,
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
  </script>
@stop
