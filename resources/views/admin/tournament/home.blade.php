@extends('adminlte::page')

@section('title', 'Tournament')

@section('content_header')
    <h1>Tournament List</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>User</th>
                            <th>Game</th>
                            <th>Match</th>
                            <th>Mode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script>

        $(document).ready( function () {
            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/JSON-tournament') }}",
                columns: [
                    { data: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'name', name: 'name' },
                    { data: 'title', name: 'title' },
                    { data: 'match_name', name: 'match_name' },
                    { data: 'mode', name: 'mode' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });

  </script>
@stop
