@extends('adminlte::page')

@section('title', 'Article')

@section('content_header')
    <h1>Edit Article</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/blog-update/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2"> 
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#konten" data-toggle="tab">Content</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#meta" data-toggle="tab">Meta SEO</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#keyword" data-toggle="tab">Keywords</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#author" data-toggle="tab">Author</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="konten">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="judul" class="form-control" value="{{ $blog->judul }}">
                                                @if($errors->has('judul'))
                                                    <div class="error text-danger">{{$errors->first('judul')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">Blog Category</label>
                                             <div class="col-sm-10">
                                                <select class="form-control" name="kategori" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($kategori as $key=>$value)
                                                    <option value="{{$value->id}}" {{ $value->id  == $blog->kategori ? 'selected' : '' }} >{{ $value->kategori }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('kategori'))
                                                    <div class="error text-danger">{{$errors->first('kategori')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="konten" class="col-sm-2 col-form-label">Text Content</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="konten" class="form-control" id="ckeditor">{{ $blog->konten }}</textarea>
                                                @if($errors->has('konten'))
                                                    <div class="error text-danger">{{$errors->first('konten')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="caption" class="col-sm-2 col-form-label">Caption & Images</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="caption" class="form-control" value="{{ $blog->caption }}">
                                                @if($errors->has('caption'))
                                                <div class="error text-danger">{{$errors->first('caption')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Image:<span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <div class="border-2 border-dashed rounded-md mt-3 pt-4">
                                                    <div class="flex flex-wrap px-4">
                                                        <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail">
                                                                @empty($blog->gambar)
                                                                    <img src="{{ asset('public/asset/logo/no-image.png') }}" alt="gambar" width="100" height="80"/>
                                                                @else
                                                                    <img src="{{ asset('public/asset/blog/'.$blog->gambar.'') }}" alt="gambar" width="100" height="80" />
                                                                @endempty
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                                            <div class="mt-2">
                                                                <span class="btn btn-primary submit-btn text-white btn-file">
                                                                    <span class="fileinput-new">Select Logo</span>
                                                                    <span class="fileinput-exists">Change </span>
                                                                    <input type="file" name="image">
                                                                </span>
                                                                <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                                    <input type="hidden"  class="input w-full mt-2" name="imagelama" value="{{ $blog->gambar }}">
                                                            </div>
                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="meta">
                                        <div class="form-group row">
                                            <label for="meta_deskripsi" class="col-sm-2 col-form-label">Meta Description<br><span>max 300 chars</span></label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="meta_deskripsi" class="form-control" rows="5" id="meta_deskripsi"> {{ $blog->meta_deskripsi }}</textarea>
                                                @if($errors->has('meta_deskripsi'))
                                                <div class="error text-danger">{{$errors->first('meta_deskripsi')}}</div> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="keyword">
                                        <div class="form-group row">
                                            <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keywords<br><span>max 300 chars</span></label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="meta_keyword" class="form-control" rows="5" id="meta_keyword"> {{ $blog->meta_keyword }}</textarea>
                                                @if($errors->has('meta_keyword'))
                                                    <div class="error text-danger">{{$errors->first('meta_keyword')}}</div> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="author">
                                        <div class="form-group row">
                                            <label for="penulis" class="col-sm-2 col-form-label">Author</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="penulis" class="form-control" value="{{ $blog->penulis }}" readonly>
                                                @if($errors->has('penulis'))
                                                <div class="error text-danger">{{$errors->first('penulis')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                      
                                         <div class="form-group row">
                                            <label for="penulis" class="col-sm-2 col-form-label">Show Author</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="show_penulis" id="show_penulis" data-toggle="toggle" checked>
                                                <input class="form-control" name="statusshow_penulis" id="statusshow_penulis" type="hidden" readonly value="true">
                                            </div>
                                        </div>
                                  
                                        <div class="form-group row">
                                            <label for="penulis" class="col-sm-2 col-form-label">Publish</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="publish" id="publish" data-toggle="toggle" checked>
                                                <input class="form-control" name="statuspublish" id="statuspublish" type="hidden" readonly value="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Update</button>
                        <a href="{{ url('admin/blog') }}">
                            <button type="button" class="btn btn-danger">Back</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
       <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">  
@stop

@section('js')
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.js') }}"  ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready( function () {
            $(function() {
                $('#show_penulis').change(function() {
                $('#statusshow_penulis').val($(this).prop('checked'))
                })
            });
        });
        $(document).ready( function () {
            $(function() {
                $('#publish').change(function() {
                $('#statuspublish').val($(this).prop('checked'))
                })
            });
        });
        var url = "{{ url('/ckfinder/ckfinder.html') }}";
        CKEDITOR.replace('ckeditor',{
            filebrowserBrowseUrl: url,
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
@stop
