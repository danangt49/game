@extends('adminlte::page')
@section('title', 'category')

@section('content_header')
    <h1>Add category</h1>
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
                      <form action="{{url('admin/categorymenu/store')}}" method="POST">
                          {{ csrf_field() }}
                          <div class="card">
                              <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                                        @if($errors->has('nama'))
                                            <div class="error text-danger">{{$errors->first('nama')}}</div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="">Type</label>
                                          <select class="form-control" name="parent">
                                            <option value="1">Blog</option> 
                                          </select>
                                          @if($errors->has('parent')) 
                                              <div class="error text-danger">{{$errors->first('parent')}}</div>
                                          @endif
                                        </div>
                                    </div>
                                  </div>
                                  <div class="m-t-20">
                                      <button class="btn btn-primary submit-btn btn-sm" type="submit">Save</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-inverse table-striped table-bordered" id="laravel_datatable">
                                   <thead>
                                      <tr>
                                         <th width="5%">No</th>
                                         <th width="15%">Category Name</th>
                                         <th width="15%">URL</th>
                                         <th width="15%">Type</th>
                                         <th width="20%">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($data as $key => $category)
                                     @php 
                                      if($category->_parent =='1'){
                                        $pr ="<p>Blog</p>";
                                      }else{
                                        $pr ="<p>no</p>";
                                      }
                                     @endphp
                                     <tr>
                                       <td>{{$key+1}}</td>
                                       <td>{{$category->kategori}}</td>
                                       <td>{{$category->_slug}}</td>
                                       <td>{!! $pr !!}</td>
                                       <td>
                                            <a class="btn btn-warning btn-xs" href="{{ url('admin/categorymenu/edit/'.$category->id)}}"><i class="fas fa-tools"></i></a>
                                            <button data-id="{{ $category->id }}" class="btn-xs btn btn-danger delete-category"><i class="fas fa-trash-restore"></i></button>
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

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
  <script>
     
  $(document).ready( function () {
    $('#laravel_datatable').DataTable();
  });

  $('body').on('click', '.delete-category', function () {
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
                  url: "{{ url('admin/categorymenu/delete')}}"+'/'+ document_id,
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
