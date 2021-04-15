@extends('adminlte::page')

@section('title', 'Game Category')

@section('content_header')
    <h1>Game Category</h1>
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
                           
                            <div class="table-responsive">
                                <table class="table table-bordered" id="laravel_datatable">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="60%">Game Category</th>
                                            <th width="15%">Image</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_category as $key => $category)
                                        @php 
                                        if($category->category_picture == null || $category==''){
                                        $img = "<a href='".url(asset('public/asset/category/no-image.png'))."' class='fancy-view'>
                                                <img src=".asset('public/asset/category/no-image.png')." width='100px' height='100px' class='center img-responsive'></a>";
                                        }else{
                                            $img = "<a href='".url(asset('public/asset/category/'.$category->category_picture))."' class='fancy-view'>
                                                <img src='".asset('public/asset/category/'.$category->category_picture)."' width='100px' height='100px' class='center img-responsive'></a>";
                                        }
                                        @endphp
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{!! $img !!}</td>
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="{{ url('admin/category/edit/'.$category->id)}}"><i class="fas fa-tools"></i></a>
                                                <!--<button data-id="{{ $category->id }}" class="btn-xs btn btn-danger delete-category"><i class="fas fa-trash-restore"></i></button>-->
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
@stop

@section('css')
    <link href="{{ asset('public/vendor/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

@section('js')
    <script src="{{ asset('public/vendor/fancybox/source/jquery.fancybox.js') }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable();
        });
  
        // $('body').on('click', '.delete-category', function () {
        //     var csrf_token = "{{ csrf_token() }}";
        //     var document_id = $(this).data("id");
        //     swal({
        //         title: "Are you sure?",
        //         text: "You will be delete this item ?",
        //         type: "warning",
        //         confirmButtonText: "Yes, delete",
        //         showCancelButton: true
        //     })
        //     .then((result) => {
        //         if (result.value) {
        //             $.ajax({
        //                 url: "{{ url('admin/category/delete')}}"+'/'+document_id,
        //                 type: "POST",
        //                 data: {
        //                     '_method': 'GET',
        //                     '_token': csrf_token
        //                 },
        //                 success: function(){
        //                     swal(
        //                         'Success',
        //                         'Destroy Data <b style="color:green;">Success</b> button!',
        //                         'success'
        //                     ).then(function() {
        //                         location.reload();
        //                     });
        //                 },
        //                 error: function() {
        //                     swal({
        //                         title: 'Opps...',
        //                         text: 'Error',
        //                         type: 'error',
        //                         timer: '1500'
        //                     })
        //                 }
        //             });
        //         } else if (result.dismiss === 'cancel') {
        //             swal(
        //             'Cancelled',
        //             'Your stay here :)',
        //             'error'
        //             )
        //         }
        //     })
        // });
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
