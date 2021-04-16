@extends('adminlte::page')

@section('title', 'SUB FAQ')

@section('content_header')
    <h1>SUB FAQ</h1>
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
                            <form action="{{url('admin/faqanswer/faqstore')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required>
                                                    @if($errors->has('title'))
                                                        <div class="error text-danger">{{$errors->first('title')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Parent Category</label>
                                                    <select name="faqcategory_id" class="form-control" required>
                                                        <option value="">Select Category</option>
                                                        @foreach($data_faqcategory as $category)
                                                        <option value="{{$category->id}}">{{$category->nama_kategori}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" class="form-control" name="deskripsi" required>
                                                    @if($errors->has('deskripsi'))
                                                        <div class="error text-danger">{{$errors->first('deskripsi')}}</div>
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
                                                    <th width="5%">No</th>
                                                    <th width="20%">Category</th>
                                                    <th width="20%">Title</th>
                                                    <th width="35%">Description</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data_faq as $key => $subfaq)
                                                @php $kategori= Applib::getFaqCategoryID($subfaq->faqcategory_id); @endphp
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$kategori}}</td>
                                                    <td>{{$subfaq->title}}</td>
                                                    <td>{{$subfaq->deskripsi}}</td>
                                                    <td>
                                                        <a class="btn btn-warning btn-xs" href="{{ url('admin/faqanswer/edit/'.$subfaq->id)}}"><i class="fas fa-tools"></i></a>
                                                        <button data-id="{{ $subfaq->id }}" class="btn-xs btn btn-danger delete-subfaq"><i class="fas fa-trash-restore"></i></button>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
@section('js')
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable();
        });
    
        $('body').on('click', '.delete-subfaq', function () {
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
                        url: "{{ url('admin/faqanswer/delete')}}"+'/'+document_id,
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
