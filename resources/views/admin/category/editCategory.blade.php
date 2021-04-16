@extends('adminlte::page')

@section('title', 'Game Category')

@section('content_header')
    <h1>Edit Game Category</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">  
            <div class="card-body">
                <form action="{{ url('admin/category/update/'.$category->id)}}" method="POST" enctype="multipart/form-data">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Game Category</label>
                                <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="category_picture" class="form-control" value="{{$category->category_picture}}">
                                <input type="hidden" name="picturelama" class="form-control" value="{{$category->category_picture}}">
                                <br/>
                                    <span>Image Max 2 MB .png or .jpg</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug Category</label>
                                <input type="text" name="category_slug" class="form-control" value={{$category->category_slug}}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    @foreach($categories as $cate)
                                        <option value="{{$cate->id}}" {{ $cate->id == $category->parent_id ? 'selected' : ''}}>{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/category') }}">
                                <button type="button" class="btn btn-danger">  Back</button>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
