@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit Bank</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/bank/update/'.$bank->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" name="name" value="{{$bank->name}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Account number</label>
                                <input type="text" class="form-control" name="rekening" value="{{$bank->rekening}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Owner</label>
                                <input type="text" class="form-control" name="pemilik" value="{{$bank->pemilik}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bank Logo</label>
                                <input type="file" name="picture" class="form-control" value="{{$bank->picture}}">
                                <input type="hidden" name="picturelama" class="form-control" value="{{$bank->picture}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/bank') }}">
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
@stop

@section('js')
@stop
