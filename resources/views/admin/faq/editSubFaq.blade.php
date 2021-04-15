@extends('adminlte::page')

@section('title', 'Sub FAQ')

@section('content_header')
    <h1>Edit SUBFAQ</h1>
@stop

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/faqanswer/update/'.$subfaq->id)}}" method="POST">            
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$subfaq->title}}" required>
                                        @if($errors->has('title'))
                                            <div class="error text-danger">{{$errors->first('title')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent Category</label>
                                        <select name="faqcategory_id" class="form-control" required>
                                            @foreach($data_faqcategory as $category)
                                                <option value="{{ $category->id }}" {{ $subfaq->faqcategory_id  == $category->id ? 'selected' : ''}}>{{$category->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="deskripsi" value="{{$subfaq->deskripsi}}" required>
                                        @if($errors->has('deskripsi'))
                                            <div class="error text-danger">{{$errors->first('deskripsi')}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                           <div class="card-footer text-muted">
                                <div class="form-group">
                                    <button type="submit" name="button" class="btn btn-primary">Update</button>
                                    <a href="{{ url('admin/faqanswer') }}">
                                        <button type="button" class="btn btn-danger">  Back</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
