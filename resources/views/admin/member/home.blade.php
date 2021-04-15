@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>List Member</h1>
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
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Token</th>
                        <!--<th>Action</th>-->
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
                ajax: "{{ url('admin/JSON-member') }}",
                columns: [
                    { data: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'name', name: 'name' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'is_admin', render: function(data)
                        {
                            if(data ==1 ){
                                return '<span class="badge bg-success">Admin</span>';
                            }else{
                                return '<span class="badge bg-danger">Member</span>';
                            }
                        }
                    },
                    { data: 'token', name: 'Token' }
                    // {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        });
    </script>
@stop
