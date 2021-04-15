@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/categorymenu/update/'.$category->id)}}" method="POST">            
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="nama" class="form-control" value="{{ $category->kategori }}">
                        @if($errors->has('nama'))
                            <div class="error text-danger">{{$errors->first('nama')}}</div>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Type</label>
                          <select class="form-control" name="parent">
                            <option value="1" <?php if ($category->parent=="1"): ?>selected<?php endif; ?>>Blog</option>
                          </select>
                          @if($errors->has('parent')) 
                              <div class="error text-danger">{{$errors->first('parent')}}</div>
                          @endif
                        </div>
                    </div>
                  </div>
                  <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Update</button>
                        <a href="{{ url('admin/categorymenu') }}">
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
    
@stop

@section('js')

@stop
