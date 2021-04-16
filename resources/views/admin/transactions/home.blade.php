@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
    <h1>List Transaksi</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <p>Welcome to this Transactions admin panel.</p>
                    </div> --}}
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                <h5 class="mb-0">
                                    Sewa <i class="fas fa-shopping-bag"></i>
                                </h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <h5 class="mb-0">
                                    Beli <i class="fas fa-money-bill-wave"></i>
                                </h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <h5 class="mb-0">
                                    Pinjam <i class="fas fa-shopping-basket"></i>
                                </h5>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-inverse" id="sewa_datatable">
                                            <thead>
                                                <tr>
                                                    <th width="10px">No</th>
                                                    <th>Nama Member</th>
                                                    <th>Judul Buku</th>
                                                    <th width="100px">Tanggal Sewa</th>
                                                    <th width="100px">Keterangan</th>
                                                    <th>Berakhir Pada</th>
                                                    <th>Status<th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{date('d F Y', strtotime($value->created_at))}}</td>
                                                    <td>{{$value->status}}</td>
                                                    <?php
                                                    $tgl=$value->created_at;
                                                    $expired=date('d F Y',strtotime('+7 day', strtotime($tgl)));
                                                        ?>
                                                    <td>{{$expired}}</td>
                                                    <?php
                                                        if($expired == 'not-expired')
                                                        {
                                                            $expirede = 'not-expired';
                                                        }else{
                                                        $expirede = 'expired';
                                                        }
                                                    ?>
                                                    <td>{{$expirede}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-inverse" id="beli_datatable">
                                            <thead>
                                                <tr>
                                                    <th width="10px">Id</th>
                                                    <th>Nama Member</th>
                                                    <th>Judul Buku</th>
                                                    <th>Tanggal Beli</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{date('d F Y', strtotime($value->created_at))}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-inverse" id="pinjam_datatable">
                                            <thead>
                                                <tr>
                                                    <th width="10px">Id</th>
                                                    <th>Nama Member</th>
                                                    <th>Judul Buku</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Keterangan</th>
                                                    <th>Berakhir Pada</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->title}}</td>
                                                    <td>{{date('d F Y', strtotime($value->created_at))}}</td>
                                                    <td>{{$value->status}}</td>
                                                    <?php
                                                        $tgl=$value->created_at;
                                                        $expired=date('d F Y',strtotime('+7 day', strtotime($tgl)));
                                                    ?>
                                                    <td>{{$expired}}</td>
                                                    <?php
                                                        if($expired == 'not-expired')
                                                        {
                                                            $expirede = 'not-expired';
                                                        }else{
                                                        $expirede = 'expired';
                                                        }
                                                    ?>
                                                    <td>{{$expirede}}</td>
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#sewa_datatable').DataTable();
            $('#beli_datatable').DataTable();
            $('#pinjam_datatable').DataTable();
        });
    </script>
@stop
