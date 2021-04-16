@extends('adminlte::page')

@section('title', 'Match')
@section('content_header')
    <h1>Edit Match</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/matches-update/'.$matches->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ROOM ID<span class="text-danger">*</span></label>
                            <input type="text" name="room" class="form-control" value="{{ $matches->room }}">
                            @if($errors->has('room'))
                                <div class="error text-danger">{{$errors->first('room')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password ROOM<span class="text-danger">*</span></label>
                            <input type="text" name="room_password" class="form-control" value="{{ $matches->room_password }}">
                            @if($errors->has('room_password'))
                                <div class="error text-danger">{{$errors->first('room_password')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Game</label>
                            <select name="game_id" class="form-control" required>
                                @foreach($data_game as $game)
                                    <option value="{{ $game->id }}" {{ $game->id  == $game->game_id ? 'selected' : ''}}>{{$game->title}}</option>
                                    {{-- <option value="{{$game->id}}">{{$game->title}}</option> --}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Match Name</label>
                            <input type="text" name="match_name" class="form-control" value="{{ $matches->match_name}}">
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
                            <input type="text" name="kill" class="form-control" value="{{ $matches->kill}}">
                            @if($errors->has('kill'))
                                <div class="error text-danger">{{$errors->first('kill')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fee</label>
                            <input type="text" name="fee" class="form-control" value="{{ $matches->fee}}">
                            @if($errors->has('fee'))
                                <div class="error text-danger">{{$errors->first('fee')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Maps</label>
                            <input type="text" name="maps" class="form-control" value="{{ $matches->maps}}">
                            @if($errors->has('maps'))
                                <div class="error text-danger">{{$errors->first('maps')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Players</label>
                            <input type="text" name="players" class="form-control" value="{{ $matches->players}}">
                            @if($errors->has('players'))
                                <div class="error text-danger">{{$errors->first('players')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Link Youtube</label>
                            <input type="text" name="link" class="form-control" value="{{ $matches->link}}">
                            @if($errors->has('link'))
                                <div class="error text-danger">{{$errors->first('link')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Prize</label>
                            <input type="text" name="prize" class="form-control" value="{{ $matches->prize}}">
                            @if($errors->has('prize'))
                                <div class="error text-danger">{{$errors->first('prize')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Team</label>
                            <select class="form-control" name="team">
                            <option value="SOLO" <?php if ($matches->team=="SOLO"): ?>selected<?php endif; ?>>SOLO</option>
                            <option value="DUO" <?php if ($matches->team=="DUO"): ?>selected<?php endif; ?>>DUO</option>
                            <option value="SQUAD" <?php if ($matches->team=="SQUAD"): ?>selected<?php endif; ?>>SQUAD</option>
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
                            <option value="TPP" <?php if ($matches->mode=="TPP"): ?>selected<?php endif; ?>>TPP</option>
                            <option value="FPP" <?php if ($matches->mode=="FPP"): ?>selected<?php endif; ?>>FPP</option>
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
                            <option value="Free" <?php if ($matches->match_type=="Free"): ?>selected<?php endif; ?>>Free</option>
                            <option value="Paid" <?php if ($matches->match_type=="Paid"): ?>selected<?php endif; ?>>Paid</option>
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
                            <input type="hidden" name="picturelama" class="form-control" value="{{$matches->picture}}">
                            @if($errors->has('picture'))
                                <div class="error text-danger">{{$errors->first('picture')}}</div>
                            @endif
                            <br/>
                                <span>Image Max 2 MB .png or .jpg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status<span class="text-danger">*</span></label>
                            <select class="form-control" name="status">
                            <option value="deactive" <?php if ($matches->status=="deactive"): ?>selected<?php endif; ?>>Deactive</option>
                            <option value="active" <?php if ($matches->status=="active"): ?>selected<?php endif; ?>>Active</option>
                            <option value="complete" <?php if ($matches->status=="complete"): ?>selected<?php endif; ?>>Complete</option>
                            <option value="upcoming" <?php if ($matches->status=="upcoming"): ?>selected<?php endif; ?>>Upcoming</option>
                            </select>
                            @if($errors->has('status')) 
                                <div class="error text-danger">{{$errors->first('status')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" id="ckeditor"> {{ $matches->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="form-group">
                    <button type="submit" name="button" class="btn btn-primary">Update</button>
                    <a href="{{ url('admin/matches')}}">
                    <button type="button" class="btn btn-danger">Back</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready( function () {
            $( "#datepicker" ).datepicker({
                format: 'mm-dd-yyyy'
            });
        });

        var url = "{{ url('/ckfinder/ckfinder.html')}}";
        CKEDITOR.replace('ckeditor',{
            filebrowserBrowseUrl: url,
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
  </script>
@stop
