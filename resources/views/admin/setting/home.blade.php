@extends('adminlte::page')

@section('title', 'Setting')

@section('content_header')
   
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            {{session('success')}}
        </div>
    @endif

    <form action="{{ url('admin/setting/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                <h3>Website Configuration</h3>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary submit-btn btn-sm" type="submit">Save</button>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2"> 
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#situs" data-toggle="tab">Site</a></li>
                                <li class="nav-item"><a class="nav-link" href="#kontak" data-toggle="tab">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="#meta" data-toggle="tab">Meta</a></li>
                                <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">Image</a></li>
                                <li class="nav-item"><a class="nav-link" href="#sosial-media" data-toggle="tab">Social Media</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="situs">
                                    <div class="form-group row">
                                        <label for="website" class="col-sm-2 col-form-label">URL HOMPAGE</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control input w-full mt-2" name="id" id="id" value="{{ $data->id }}" placeholder="ID" readonly="true" >
                                            <input type="text" name="website" class="form-control" value="{{ $data->website }}">
                                            @if($errors->has('website'))
                                                <div class="error text-danger">{{$errors->first('website')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Site Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
                                            @if($errors->has('nama'))
                                                <div class="error text-danger">{{$errors->first('nama')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slogan" class="col-sm-2 col-form-label">Slogan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="slogan" class="form-control" value="{{ $data->slogan }}">
                                            @if($errors->has('slogan'))
                                                <div class="error text-danger">{{$errors->first('slogan')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi_situs" class="col-sm-2 col-form-label">Site Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="deskripsi_situs" class="form-control" rows="5" id="deskripsi_situs"> {{ $data->deskripsi_situs }}</textarea>
                                            @if($errors->has('deskripsi_situs'))
                                                <div class="error text-danger">{{$errors->first('alamat')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="kontak">
                                    <div class="form-group row">
                                        <label for="telepon" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="telepon" class="form-control" value="{{ $data->telepon }}">
                                            @if($errors->has('telepon'))
                                                <div class="error text-danger">{{$errors->first('telepon')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="alamat" class="form-control" rows="5" id="alamat"> {{ $data->alamat }}</textarea>
                                            @if($errors->has('alamat'))
                                                <div class="error text-danger">{{$errors->first('alamat')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email_website" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email_website" name="email_website" class="form-control" value="{{ $data->email_website }}">
                                            @if($errors->has('email_website'))
                                                <div class="error text-danger">{{$errors->first('email_website')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="meta">
                                    <div class="form-group row">
                                        <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keywords  <br><span>max 300 chars</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="meta_keyword" class="form-control" rows="5" id="meta_keyword"> {{ $data->meta_keyword }}</textarea>
                                            @if($errors->has('meta_keyword'))
                                                <div class="error text-danger">{{$errors->first('meta_keyword')}}</div> 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_deskripsi" class="col-sm-2 col-form-label">Meta Description <br><span>max 160 chars</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="meta_deskripsi" class="form-control" rows="5" id="meta_deskripsi"> {{ $data->meta_deskripsi }}</textarea>
                                            @if($errors->has('meta_deskripsi'))
                                                <div class="error text-danger">{{$errors->first('meta_deskripsi')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image">
                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label" >Logo:<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <div class="border-2 border-dashed rounded-md mt-3 pt-4">
                                                <div class="flex flex-wrap px-4">
                                                    <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            @empty($data->logo)
                                                                <img src="{{ asset('public/asset/logo/no-image.png') }}" alt="Logo" width="100" height="80"/>
                                                            @else
                                                                <img src="{{ asset('public/asset/img/logo.png') }}"  alt="Logo" width="100" height="80" />
                                                            @endempty
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                                        <div class="mt-10">
                                                            <span class="btn btn-primary submit-btn text-white btn-file">
                                                                <span class="fileinput-new">Select Logo</span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="logo">
                                                            </span>
                                                            <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                            <input type="hidden"  class="input w-full mt-2" name="logolama" value="{{ $data->logo }}">

                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="icon" class="col-sm-2 col-form-label" >Icon:<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <div class="border-2 border-dashed rounded-md mt-3 pt-4">
                                                <div class="flex flex-wrap px-4">
                                                    <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            @empty($data->favicon)
                                                                <img src="{{ asset('public/asset/logo/no-image.png') }}" alt="Favicon" width="100" height="80"/>
                                                            @else
                                                                <img src="{{ asset('public/asset/img/favicon.png') }}"  alt="Favicon" width="100" height="80" />
                                                            @endempty
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                                        <div class="mt-10">
                                                            <span class="btn btn-primary submit-btn text-white btn-file">
                                                                <span class="fileinput-new">Select Icon</span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="favicon">
                                                            </span>
                                                            <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                            <input type="hidden"  class="input w-full mt-2" name="faviconlama" value="{{ $data->favicon }}">

                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sosial-media">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="facebook" class="form-control" value="{{ $data->facebook }}">
                                            @if($errors->has('facebook'))
                                                <div class="error text-danger">{{$errors->first('facebook')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="twitter" class="form-control" value="{{ $data->twitter }}">
                                            @if($errors->has('twitter'))
                                                <div class="error text-danger">{{$errors->first('twitter')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="instagram" class="form-control" value="{{ $data->instagram }}">
                                            @if($errors->has('instagram'))
                                                <div class="error text-danger">{{$errors->first('instagram')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Youtube</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="youtube" class="form-control" value="{{ $data->youtube }}">
                                            @if($errors->has('youtube'))
                                                <div class="error text-danger">{{$errors->first('youtube')}}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link href="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"  />
@stop

@section('js')
    <script src="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.js') }}"  ></script>
    <script type="text/javascript">
    
    </script>
@stop
