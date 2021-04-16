@extends('adminlte::page')

@section('title', 'Province')

@section('content_header')
    <h1>Province List</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Province</th>
                                {{-- <th width="20%">Kabupaten</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($province as $key => $data)
                            @php $kategori= Applib::getCityID($data->id_kabkota); @endphp
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->nama_propinsi}}</td>
                                {{-- <td>{{$kategori}}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
