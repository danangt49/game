@extends('adminlte::page')

@section('title', 'Edit Jenis Voucher')

@section('content_header')
    <h1>Edit Jenis Voucher</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/setting-voucher/update/'.$voucher->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Voucher</label>
                                <input type="text" class="form-control" name="title" value="{{$voucher->jenis}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" class="form-control" name="nominal" value="{{$voucher->nominal}}">
                            </div>
                        </div>
                    </div>
                   <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/setting-voucher') }}">
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop

@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $("#nominal").keypress(function(data){
            if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
                return false;
            }
        });
    </script>
@stop
