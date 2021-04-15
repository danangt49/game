@extends('adminlte::page')

@section('title', 'Nominal')

@section('content_header')
    <h1>List Nominal</h1>
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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('admin/nominal/store')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <input type="text" class="form-control" name="nominal" id="nominal">
                                                    @if($errors->has('nominal'))
                                                        <div class="error text-danger">{{$errors->first('nominal')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <button class="btn btn-primary submit-btn btn-sm" type="submit">ADD</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="laravel_datatable">
                                            <thead>
                                                <tr>
                                                    <th width="10px">No</th>
                                                    <th>Nominal</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($nominal as $key => $data)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$data->nominal}}</td>
                                                    <td> 
                                                        <a class="btn btn-warning btn-xs" href="{{ url('admin/nominal/edit/'.$data->id)}}"><i class="fas fa-tools"></i></a>
                                                        <button data-id="{{ $data->id }}" class="btn-xs btn btn-danger delete-data"><i class="fas fa-trash-restore"></i></button>
                                                    </td>
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
    </div>
@stop
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@section('css')

@stop
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
@section('js')
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable();
        });

        $(document).ready( function () {
            $("#nominal").keypress(function(data){
                if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
                    return false;
                }
            })
        });
  
        $('body').on('click', '.delete-data', function () {
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
                        url: "{{ url('admin/nominal/delete')}}"+'/'+document_id,
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
