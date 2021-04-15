@extends('adminlte::page')

@section('title', 'Banner')

@section('content_header')
    <h1>Banner</h1>
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
                        <form action="{{url('admin/banner/store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name">
                                                @if($errors->has('name'))
                                                    <div class="error text-danger">{{$errors->first('name')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Publish</label><br/>
                                                <input type="checkbox" name="publish" id="publish" data-toggle="toggle" checked>
                                                <input class="form-control" name="statuspublish" id="statuspublish" type="hidden" readonly value="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="picture">
                                                @if($errors->has('picture'))
                                                    <div class="error text-danger">{{$errors->first('picture')}}</div>
                                                @endif
                                                <br/>
                                                <span>Banner size (760x460) .png or .jpg</span>
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
                                                <th width="5%">No</th>
                                                <th width="30%">Name</th>
                                                <th width="15%">Publish</th>
                                                <th width="25%">Image</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_banner as $key => $banner)
                                            @php 
                                            if($banner->publish == 'false'){
                                                $stt = "<span class='badge badge-danger'>Not Active</span>";
                                            }else{
                                                $stt = "<span class='badge badge-success'>Active</span>";
                                            }
                                            if($banner->picture == null || $banner==''){
                                                $img = "<a href='".url(asset('public/asset/banner/no-image.png'))."' class='fancy-view'>
                                                        <img src=".asset('public/asset/banner/no-image.png')." width='100px' height='100px' class='center img-responsive'></a>";
                                            }else{
                                                $img = "<a href='".url(asset('public/asset/banner/'.$banner->picture))."' class='fancy-view'>
                                                        <img src='".asset('public/asset/banner/'.$banner->picture)."' width='100px' height='100px' class='center img-responsive'></a>";
                                            }
                                            @endphp
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$banner->name}}</td>
                                                <td>{!! $stt !!}</td>
                                                <td>{!! $img !!}</td>                           
                                                <td>
                                                        <a class="btn btn-warning btn-xs" href="{{ url('admin/banner/edit/'.$banner->id)}}"><i class="fas fa-tools"></i></a>
                                                        <button data-id="{{ $banner->id }}" class="btn-xs btn btn-danger delete-banner"><i class="fas fa-trash-restore"></i></button>
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


@section('css')
    <link href="{{ asset('public/vendor/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">  
@stop

@section('js')
    <script src="{{ asset('public/vendor/fancybox/source/jquery.fancybox.js') }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
     
        $(document).ready( function () {
            $('#laravel_datatable').DataTable();

            $(function() {
                $('#publish').change(function() {
                    $('#statuspublish').val($(this).prop('checked'))
                })
            });
        });

        $('body').on('click', '.delete-banner', function () {
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
                        url: "{{ url('admin/banner/delete')}}"+'/'+ document_id,
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
