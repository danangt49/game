@extends('adminlte::page')

@section('title', 'Game')

@section('content_header')
    <h1>Add Game</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/games-store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <div class="error text-danger">{{$errors->first('title')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Game Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="{{ old('category_name') }}">Pilih Kategori</option>
                                @foreach($kategori as $key=>$value)
                                <option value="{{$value->id}}">{{$value->category_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="error text-danger">{{$errors->first('category_id')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="picture" >Image:<span class="text-danger">*</span></label>
                            <div class="border-2 border-dashed rounded-md ">
                                <div class="flex flex-wrap ">
                                    <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="{{ asset('public/asset/logo/no-image.png') }}" alt="picture" width="100" height="80"/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                        <div class="mt-0">
                                            <span class="btn btn-primary submit-btn text-white btn-file">
                                                <span class="fileinput-new">Select Image</span>
                                                <span class="fileinput-exists">Change </span>
                                                <input type="file" name="picture" accept="image/x-png,image/gif,image/jpeg">
                                            </span>
                                            <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                        </div>
                                        @if($errors->has('picture'))
                                            <div class="error text-danger">{{$errors->first('picture')}}</div>
                                        @endif
                                        <div class="text-xs text-gray-600 mt-2">Image Max 2 MB .png or .jpg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" id="ckeditor"> {{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                <div class="error text-danger">{{$errors->first('description')}}</div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="form-group">
                    <button type="submit" name="button" class="btn btn-primary">Save</button>
                    <a href="{{ url('moduls') }}">
                    <button type="button" class="btn btn-danger">Back</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
<link href="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"  />
@stop

@section('js')
    <script src="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.js') }}"  ></script>
    <script type="text/javascript" src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        var url = "{{ url('/ckfinder/ckfinder.html') }}";
        CKEDITOR.replace('ckeditor',{
            filebrowserBrowseUrl: url,
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
@stop
