@extends('adminlte::page')

@section('title', 'Player')

@section('content_header')
    <h1>LEADERBOARD GAMES</h1>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header p-2"> 
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#ff" data-toggle="tab">FREE FIRE</a></li>
            <li class="nav-item"><a class="nav-link" href="#pubg" data-toggle="tab">PUBG</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="ff">
              <div class="table-responsive">
                <table class="table table-inverse table-striped table-bordered" id="fftable">
                  <h3>LEADERBOARD PLAYER</h3>
                  <hr/>
                  <thead>
                      <tr>
                        <th width="10px">Rank</th>
                        <th>Player Name</th>
                        <th width="100px">Point</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($ff as $key => $data)
                    @php $username= Applib::getUsername($data->user_id); @endphp
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$username}}</td>
                      <td>{{$data->sum}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="pubg">
              <div class="table-responsive">
                <table class="table table-inverse table-striped table-bordered" id="pubgtable">
                  <h3>LEADERBOARD PLAYER</h3>
                  <hr/>
                  <thead>
                      <tr>
                        <th width="10px">Rank</th>
                        <th>Player Name</th>
                        <th width="100px">Point</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($pubg as $key => $data)
                    @php $username= Applib::getUsername($data->user_id); @endphp
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$username}}</td>
                      <td>{{$data->sum}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
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
<script type="text/javascript">
    $(document).ready( function () {
        $('#fftable').DataTable();
        $('#pubgtable').DataTable();
    });
</script>
@stop