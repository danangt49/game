@extends('adminlte::page')

@section('title', 'Edit Voucher')

@section('content_header')
    <h1>Edit Voucher</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/voucher/update/'.$voucher->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Voucher Name</label>
                                <input type="text" class="form-control" name="title" value="{{$voucher->title}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Voucher Code</label>
                                <input type="text" class="form-control" name="code" value="{{$voucher->code}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nominal Token</label>
                                <input type="text" class="form-control" name="nominal" id="nominal" value="{{$voucher->nominal}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Expired</label>
                                <input type="text" class="form-control" id="datepicker" name="expired_at" value="{{$voucher->expired_at}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Used</label><br/>
                                <input type="checkbox" name="status" id="status" data-toggle="toggle" {{ $voucher->used === 'true' ? 'checked' : '' }} >
                                <input class="form-control" name="used" id="used" type="hidden" readonly value="{{ $voucher->used }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/voucher') }}">
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
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop

@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $("#nominal").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });

    $(document).ready( function () {
        $( "#datepicker" ).datepicker({
            format: 'mm-dd-yyyy'
        });
    });

    $(document).ready( function () {
        $(function() {
            $('#status').change(function() {
            $('#used').val($(this).prop('checked'))
            })
        });
    });
    </script>
@stop
