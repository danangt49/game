@extends('adminlte::page')

@section('title', 'Bank')

@section('content_header')
    <h1>Bank List</h1>
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
                        <form action="{{url('admin/bank/store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control" name="name">
                                                @if($errors->has('name'))
                                                    <div class="error text-danger">{{$errors->first('name')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Account number</label>
                                                <input type="text" class="form-control" name="rekening">
                                                @if($errors->has('rekening'))
                                                    <div class="error text-danger">{{$errors->first('rekening')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Owner</label>
                                                <input type="text" class="form-control" name="pemilik">
                                                @if($errors->has('pemilik'))
                                                    <div class="error text-danger">{{$errors->first('pemilik')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Bank Logo</label>
                                                <div class="custom-file">
                                                    <input type="file" name="picture" class="form-control" value="" accept="image/x-png,image/gif,image/jpeg">
                                                    @if($errors->has('picture'))
                                                        <div class="error text-danger">{{$errors->first('picture')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-t-10">
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
                                                <th>Bank</th>
                                                <th>Account number</th>
                                                <th>Owner</th>
                                                <th>Bank logo</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bank as $key => $data)
                                            @php 
                                            if($data->picture == null || $data==''){
                                            $img = "<a href='".url(asset('public/asset/bank/no-image.png'))."' class='fancy-view'>
                                                    <img src=".asset('public/asset/bank/no-image.png')." width='100px' height='100px' class='center img-responsive'></a>";
                                            }else{
                                            $img = "<a href='".url(asset('public/asset/bank/'.$data->picture))."' class='fancy-view'>
                                                    <img src='".asset('public/asset/bank/'.$data->picture)."' width='100px' height='100px' class='center img-responsive'></a>";
                                            }
                                            @endphp
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->rekening}}</td>
                                                <td>{{$data->pemilik}}</td>
                                                <td>{!! $img !!}</td>
                                                <td> 
                                                    <a class="btn btn-warning btn-xs" href="{{ url('admin/bank/edit/'.$data->id)}}"><i class="fas fa-tools"></i></a>
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
    <link href="{{ asset('public/vendor/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@section('css')

@stop

@section('js')
    <script src="{{ asset('public/vendor/fancybox/source/jquery.fancybox.js') }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable();
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
                        url: "{{ url('admin/bank/delete')}}"+'/'+document_id,
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
        $(".fancy-view").fancybox({
            'autoScale'	:false,
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            helpers: {
                title: {
                    type: 'inside'
                },
                overlay : {
                    css : {
                        'background' : 'rgba(255,255,255,0.5)'
                    }
                }
            }
        });
  </script>
@stop
