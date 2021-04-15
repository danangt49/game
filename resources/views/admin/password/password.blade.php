@extends('adminlte::page')

@section('title', 'Password')

@section('content_header')
    <h1>Change Password</h1>
@stop
@section('content')
<div class="page-wrapper">
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('admin/password')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="hidden" readonly="true" class="form-control" name="id" id="id" placeholder="ID">
                                                <input type="password" class="form-control" name="password_lama" id="password">
                                                @if($errors->has('password_lama'))
                                                    <div class="error text-danger">{{$errors->first('password_lama')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" name="password_baru" id="password_baru">
                                                @if($errors->has('password_baru'))
                                                    <div class="error text-danger">{{$errors->first('password_baru')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" class="form-control" name="confirm_password_baru" id="confirm_password_baru">
                                                @if($errors->has('confirm_password_baru'))
                                                    <div class="error text-danger">{{$errors->first('confirm_password_baru')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-t-20">
                                        <button class="btn btn-primary submit-btn btn-sm" type="submit">Change Password</button>
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
  <script>
    $(document).ready( function () {
        $('#laravel_datatable').DataTable();
    });
  </script>
@stop
