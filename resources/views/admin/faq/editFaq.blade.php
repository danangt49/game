@extends('adminlte::page')

@section('title', 'Edit FAQ')

@section('content_header')
    <h1>Edit FAQ</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/faq/update/'.$faq->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$faq->title}}" required>
                                        @if($errors->has('title'))
                                            <div class="error text-danger">{{$errors->first('title')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="5" name="deskripsi" required>{{$faq->deskripsi}}</textarea>
                                        @if($errors->has('deskripsi'))
                                            <div class="error text-danger">{{$errors->first('deskripsi')}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="form-group">
                                    <button type="submit" name="button" class="btn btn-primary">Update</button>
                                    <a href="{{ url('admin/faq') }}">
                                        <button type="button" class="btn btn-danger">  Back</button>
                                    </a>
                                </div>
                            </div>
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
    <script> console.log('Hi!'); </script>
@stop
