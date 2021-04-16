@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1>Edit Nominal</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/nominal/update/'.$nominal->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="text" class="form-control" name="nominal" id="nominal" value="{{$nominal->nominal}}">
                        </div>
                        </div>
                    </div>
                   <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="{{ url('admin/nominal') }}">
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
<script>
    $(document).ready( function () {
        $("#nominal").keypress(function(data){
            if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
                return false;
            }
        })
    });
</script>
@stop
