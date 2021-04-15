@extends('adminlte::page')

@section('match_name', 'Match')

@section('content_header')
    <h1>Add Match</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/matches-store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Game</label>
                            <select name="game_id" class="form-control" required>
                                <option value="">Select game</option>
                                @foreach($data_game as $game)
                                    <option value="{{$game->id}}">{{$game->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Match Name</label>
                            <input type="text" name="match_name" class="form-control" value="{{ old('match_name') }}">
                            @if($errors->has('match_name'))
                                <div class="error text-danger">{{$errors->first('match_name')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Match Schedule</label>
                            <input type="text" class="form-control" id="datepicker" name="match_schedule">
                            @if($errors->has('match_schedule'))
                                <div class="error text-danger">{{$errors->first('match_schedule')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Per kill</label>
                            <input type="text" name="kill" class="form-control" id="kill" value="{{ old('kill') }}">
                            @if($errors->has('kill'))
                                <div class="error text-danger">{{$errors->first('kill')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fee</label>
                            <input type="text" name="fee" class="form-control" id="fee" value="{{ old('fee') }}">
                            @if($errors->has('fee'))
                                <div class="error text-danger">{{$errors->first('fee')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Maps</label>
                            <input type="text" name="maps" class="form-control" value="{{ old('maps') }}">
                            @if($errors->has('maps'))
                                <div class="error text-danger">{{$errors->first('maps')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Players</label>
                            <input type="text" name="players" class="form-control" value="{{ old('players') }}">
                            @if($errors->has('players'))
                                <div class="error text-danger">{{$errors->first('players')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Link Youtube</label>
                            <input type="text" name="link" class="form-control" value="{{ old('link') }}">
                            @if($errors->has('link'))
                                <div class="error text-danger">{{$errors->first('link')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Prize</label>
                            <input type="text" name="prize" class="form-control" id="prize" value="{{ old('prize') }}">
                            @if($errors->has('prize'))
                                <div class="error text-danger">{{$errors->first('prize')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Team</label>
                            <select class="form-control" name="team">
                            <option value="SOLO">SOLO</option>
                            <option value="DUO">DUO</option>
                            <option value="SQUAD">SQUAD</option>
                            </select>
                            @if($errors->has('team')) 
                                <div class="error text-danger">{{$errors->first('team')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mode</label>
                            <select class="form-control" name="mode">
                            <option value="TPP">TPP</option>
                            <option value="FPP">FPP</option>
                            </select>
                            @if($errors->has('mode')) 
                                <div class="error text-danger">{{$errors->first('mode')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Match Type</label>
                            <select class="form-control" name="match_type">
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
                            </select>
                            @if($errors->has('match_type')) 
                                <div class="error text-danger">{{$errors->first('match_type')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Image</label>
                            <div class="custom-file">
                            <input type="file" name="picture" class="form-control" value="" accept="image/x-png,image/gif,image/jpeg">
                            @if($errors->has('picture'))
                                <div class="error text-danger">{{$errors->first('picture')}}</div>
                            @endif
                            <br/>
                                <span>Image Max 2 MB .png or .jpg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" id="ckeditor"> {{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
                <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Save</button>
                        <a href="{{ url('admin/matches') }}">
                        <button type="button" class="btn btn-danger">Back</button>
                        </a>
                    </div>
                </div>
            </form>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
 
 $(document).ready( function () {
    $( "#datepicker" ).datepicker({
        format: 'mm-dd-yyyy'
    });

    $("#kill").keypress(function(data){
      if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
        return false;
      }
    });
    $("#fee").keypress(function(data){
      if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
        return false;
      }
    });
    $("#prize").keypress(function(data){
      if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
        return false;
      }
    });
});
    var url = "{{ url('/ckfinder/ckfinder.html') }}";
    CKEDITOR.replace('ckeditor',{
      filebrowserBrowseUrl: url,
      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
    
  </script>
@stop
