@extends('adminlte::page')

@section('title', 'Page')

@section('content_header')
    <h1>Add Page</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/page-store') }}" method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Page Name</label>
                            <input type="text" name="nama_laman" class="form-control" value="{{ old('nama_laman') }}">
                            @if($errors->has('nama_laman'))
                                <div class="error text-danger">{{$errors->first('nama_laman')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Page Content</label>
                            <textarea type="text" name="konten" class="form-control" id="ckeditor">{{ old('konten') }}</textarea>
                                @if($errors->has('konten'))
                                <div class="error text-danger">{{$errors->first('konten')}}</div>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                            <option value="2">Not Publish</option>
                            <option value="1">Publish</option>
                            </select>
                            @if($errors->has('status')) 
                                <div class="error text-danger">{{$errors->first('status')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Position</label>
                            <input type="text" name="posisi" class="form-control" id="posisi" value="{{ old('posisi') }}">
                            @if($errors->has('posisi'))
                                <div class="error text-danger">{{$errors->first('posisi')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Layout</label>
                            <select class="form-control" name="layout">
                            <option value="fullwitdh">Full Width</option>
                            <option value="home">Home</option>
                            </select>
                            @if($errors->has('layout')) 
                                <div class="error text-danger">{{$errors->first('layout')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Meta Keywords</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="5">{{ old('meta_keyword') }}</textarea>
                                @if($errors->has('meta_keyword'))
                                <div class="error text-danger">{{$errors->first('meta_keyword')}}</div>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea type="text" name="meta_deskripsi" class="form-control" rows="5">{{ old('meta_deskripsi') }}</textarea>
                            @if($errors->has('meta_deskripsi'))
                            <div class="error text-danger">{{$errors->first('meta_deskripsi')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Save</button>
                        <a href="{{ url('admin/page') }}">
                        <button type="button" class="btn btn-danger">Back</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop 

@section('js')
    <script type="text/javascript" src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() { 
            $("#posisi").keypress(function(data){
                if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
                    return false;
                }
            });
        });
  
        var url = "{{ url('/ckfinder/ckfinder.html') }}";
        CKEDITOR.replace('ckeditor',{
            filebrowserBrowseUrl: url,
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
  </script>
@stop
