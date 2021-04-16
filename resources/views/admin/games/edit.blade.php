@extends('adminlte::page')

@section('title', 'Game')

@section('content_header')
    <h1>Edit Game</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/games-update/'.$games->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $games->title }}">
                            @if($errors->has('title'))
                                <div class="error text-danger">{{$errors->first('title')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Game Category</label>
                            <select class="form-control select2" name="category_id" required>
                            @foreach($kategori as $value)
                            <option value="{{ $value->id }}" {{ $value->id  == $games->category_id ? 'selected' : ''}}>{{$value->category_name}}</option>
                            @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="error text-danger">{{$errors->first('category_id')}}</div>
                            @endif
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image" >Image:<span class="text-danger">*</span></label>
                            <div class="border-2 border-dashed rounded-md ">
                                <div class="flex flex-wrap ">
                                    <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            @empty($games->picture)
                                                <img src="{{ asset('public/asset/logo/no-image.png') }}" alt="picture" width="100" height="80"/>
                                            @else
                                                <img src="{{ asset('public/asset/game/'.$games->picture) }}"  alt="picture" width="100" height="80" />
                                            @endempty
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail mb-2 "></div>
                                        <div class="mt-0">
                                            <span class="btn btn-primary submit-btn text-white btn-file">
                                                <span class="fileinput-new">Select Image</span>
                                                <span class="fileinput-exists">Change </span>
                                                <input type="file" name="picture" accept="image/x-png,image/gif,image/jpeg">
                                            </span>
                                            <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                            <input type="hidden"  class="input w-full mt-2" name="picturelama" value="{{ $games->picture }}">
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
                            <textarea type="text" name="description" class="form-control" id="ckeditor"> {{ $games->description }}</textarea>
                            @if($errors->has('description'))
                            <div class="error text-danger">{{$errors->first('description')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  
            <div class="card-footer text-muted">
                <div class="form-group">
                    <button type="submit" name="button" class="btn btn-primary">Update</button>
                    <a href="{{ url('admin/games') }}">
                        <button type="button" class="btn btn-danger">Back</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
<link href="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
@stop

@section('js')
<script src="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.js') }}"  ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        var url = "{{ url('/ckfinder/ckfinder.html') }}";
        CKEDITOR.replace('ckeditor',{
            filebrowserBrowseUrl: url,
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
@stop
