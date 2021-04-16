@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User Configuration Dashboard</h1>
@stop

@section('content')
    <h1>Edit User</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/member-update/'.$user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            @if ($errors->has('name'))
                            <div class="error text-danger">{{$errors->first('name')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                            @if ($errors->has('email'))
                            <div class="error text-danger">{{$errors->first('email')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Token</label>
                            <input type="text" name="token" class="form-control" value="{{ $user->token }}" required>
                            @if ($errors->has('token'))
                            <div class="error text-danger">{{$errors->first('token')}}</div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer text-muted">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" name="button" class="btn btn-primary">Save</button>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <button type="button" name="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fab fa-ethereum"></i> Top Up Token Here</button>
                </div>
                </div>
            </div>
        </div>
            </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Top Up Token</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{ url('admin/member-topup/'.$user->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Insert your Token Code</label>
                            <input type="text" name="topup" value="" class="form-control" required>
                            @if ($errors->has('topup'))
                            <div class="error text-danger">{{$errors->first('topup')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@stop
