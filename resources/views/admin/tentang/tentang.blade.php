@extends('adminlte::page')

@section('title', 'Tentang')

@section('content_header')
    <h1>Tentang</h1>
@stop
@section('content')
<div class="page-wrapper">
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                {{session('success')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('admin/tentang/store')}}" method="POST">
                          {{ csrf_field() }}
                            <div class="card">
                                <div class="card-body">
                                  <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Organisasi</label>
                                        <input type="hidden" readonly="true" class="form-control" name="id" id="id" value="{{ $data_tentang->id }}" placeholder="ID">
                                        <input type="text" name="nama_organisasi" class="form-control" id="nama_organisasi" value="{{ $data_tentang->nama_organisasi }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea type="text" name="deskripsi" class="form-control" rows="5" id="deskripsi"> {{ $data_tentang->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $data_tentang->alamat }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Telpon</label>
                                        <input type="text" name="no_telp" class="form-control" id="no_telp" value="{{ $data_tentang->no_telp}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control datepiker" id="email" value="{{ $data_tentang->email }}">
                                    </div>
                                </div>
                                  <div class="m-t-20">
                                      <button class="btn btn-primary submit-btn btn-sm" type="submit">Save</button>
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
