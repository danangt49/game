@extends('adminlte::page')

@section('title', 'Banner')

@section('content_header')
    <h1>Edit Banner</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/banner/update/'.$banner->id)}}" method="POST" enctype="multipart/form-data">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$banner->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Slide</label>
                                <select class="form-control" name="slide">
                                    <option value="up" <?php if ($banner->slide=="up"): ?>selected<?php endif; ?>>Up</option>
                                    <option value="down" <?php if ($banner->slide=="down"): ?>selected<?php endif; ?>>Down</option>
                                </select>
                                @if($errors->has('slide')) 
                                    <div class="error text-danger">{{$errors->first('slide')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Publish</label><br/>
                                <input type="checkbox" name="publish" id="publish" data-toggle="toggle" {{ $banner->publish == 'true' ? 'checked' : '' }} >
                                <input class="form-control" name="statuspublish" id="statuspublish" type="hidden" readonly value="{{ $banner->publish }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="picture" class="form-control" value="{{$banner->picture}}">
                                <input type="hidden" name="picturelama" class="form-control" value="{{$banner->picture}}">
                            </div>
                        </div>
                    </div>
                   <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/banner') }}">
                            <button type="button" class="btn btn-danger">Back</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">  
@stop

@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script> 
        $(function() {
            $('#publish').change(function() {
                $('#statuspublish').val($(this).prop('checked'))
            })
        });
    </script>
@stop