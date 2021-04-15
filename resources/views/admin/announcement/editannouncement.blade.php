@extends('adminlte::page')

@section('title', 'Announcement')

@section('content_header')
    <h1>Edit Announcement</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/announcement/update/'.$announ->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="">Message</label>
                                <textarea type="text" name="message" class="form-control"> {{ $announ->message }}</textarea>
                                @if($errors->has('message'))
                                    <div class="error text-danger">{{$errors->first('message')}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/announcement') }}">
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
