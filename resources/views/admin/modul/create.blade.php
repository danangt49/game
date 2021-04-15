@extends('adminlte::page')

@section('title', 'Modul')

@section('content_header')
    <h1>Add Modul</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/modul-store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Name Modul</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                            @if($errors->has('nama'))
                                <div class="error text-danger">{{$errors->first('nama')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">URL Modul</label>
                            <input type="text" name="url_modul" class="form-control" value="{{ old('url_modul') }}">
                                @if($errors->has('url_modul'))
                                <div class="error text-danger">{{$errors->first('url_modul')}}</div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Save</button>
                        <a href="{{ url('admin/modul') }}">
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

@stop
