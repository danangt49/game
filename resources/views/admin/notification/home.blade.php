@extends('adminlte::page')

@section('title', 'Notification')

@section('content_header')
    <h1>Notification</h1>
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    {{session('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('admin/notification/update')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tittle</label>
                                                    <input type="hidden" readonly="true" class="form-control" name="id" id="id" value="{{ $data->id }}" placeholder="ID">
                                                    <input type="text" name="title" class="form-control" id="title" value="{{ $data->title }}">
                                                    @if($errors->has('title')) 
                                                        <div class="error text-danger">{{$errors->first('title')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <textarea type="text" name="message" class="form-control" rows="5" id="message"> {{ $data->message }}</textarea>
                                                    @if($errors->has('message')) 
                                                        <div class="error text-danger">{{$errors->first('message')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input type="text" name="url" class="form-control" id="url" value="{{ $data->url}}">
                                                    @if($errors->has('url')) 
                                                        <div class="error text-danger">{{$errors->first('url')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="picture" class="form-control" value="" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="picturelama" class="form-control" value="{{ $data->picture}}" accept="image/x-png,image/gif,image/jpeg">
                                                        <input type="hidden" name="urlpicturelama" class="form-control" value="{{ $data->picture_url}}" accept="image/x-png,image/gif,image/jpeg">
                                                        @if($errors->has('picture'))
                                                            <div class="error text-danger">{{$errors->first('picture')}}</div>
                                                        @endif
                                                        <br/>
                                                        <span>Image Max 2 MB .png or .jpg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-20">
                                            <button type="submit" name="button" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
@stop
