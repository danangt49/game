@extends('adminlte::page')

@section('title', 'ads')

@section('content_header')
    <h1>Edit Ads</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/ads/update/'.$ads->id)}}" method="POST" enctype="multipart/form-data">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="picture" class="form-control" value="{{$ads->picture}}">
                                <input type="hidden" name="picturelama" class="form-control" value="{{$ads->picture}}">
                            </div>
                        </div>
                    </div>
                   <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/ads') }}">
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
@stop