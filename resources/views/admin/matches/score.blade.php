@extends('adminlte::page')

@section('title', 'Match')

@section('content_header')
    <h1>Match Score Detail</h1>
@stop

@section('content')
  {{-- <div class="card-body">
    <div class="table-responsive">
      @csrf
        <table class="table table-inverse table-striped table-bordered" id="sample_editable_1">
            <thead>
            <tr>
                <th>Game id</th>
                <th>Username</th>
                <th>Place</th>
                <th>Place Point</th>
                <th>Killed</th>
                <th>Kill Win</th>
                <th>Win Prize</th>
                <th>Bonus</th>
                <th>Total Win</th>
                <th>Refund</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as  => $db1)
                <tr>
                    <td>{{ $db1->gameid }}</td>
                    <td>{{ $db1->name }}</td>
                    <td>{{ $db1->place }}</td>
                    <td>{{ $db1->place_point }}</td>
                    <td>{{ $db1->killed }}</td>
                    <td>{{ $db1->kill_win }}</td>
                    <td>{{ $db1->win_prize }}</td>
                    <td>{{ $db1->bonus }}</td>
                    <td>{{ $db1->total }}</td>
                    <td>{{ $db1->refund }}</td>
                    <td>
                      <a class="btn btn-warning btn-xs" href="{{ url('admin/matches/edit/'.$db1->id)}}"><i class="fas fa-tools"></i></a>
                      <button data-id="{{ $db1->id }}" class="btn-xs btn btn-danger delete-faq"><i class="fas fa-trash-restore"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div> --}}



  <div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{url('admin/matches/score/update/')}}" method="POST">            
                {{ csrf_field() }}
                @foreach($data as $db1)
                <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Game ID</label>
                          <input type="text" name="gameid" class="form-control" value="{{ $db1->gameid}}" disabled>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Place</label>
                          <input type="text" name="place" class="form-control" value="{{ $db1->place}}">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Place Point</label>
                          <input type="text" name="place_point" class="form-control" value="{{ $db1->place_point}}">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Killed</label>
                          <input type="text" name="killed" class="form-control" value="{{ $db1->killed}}">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Kill Win</label>
                          <input type="text" name="kill_win" class="form-control" value="{{ $db1->kill_win}}">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Win Prize</label>
                          <input type="text" name="win_prize" class="form-control" value="{{ $db1->win_prize}}">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Total</label>
                          <input type="text" name="total" class="form-control" value="{{ $db1->total}}">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                          <label>Refund</label>
                          <input type="text" name="refund" class="form-control" value="{{ $db1->refund}}">
                      </div>
                    </div>
                </div>
                @endforeach

                <div class="m-t-20">
                    <button class="btn btn-primary submit-btn" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
@stop

@section('css')

@stop

@section('js')
 

@stop
