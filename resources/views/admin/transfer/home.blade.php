@extends('adminlte::page')

@section('title', 'Payment confirmation')

@section('content_header')
    <h1>Payment Confirmation List</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-inverse table-striped table-bordered" id="konfirm_datatable">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Code</th>
                                        <th>Member Name</th>
                                        <th>Destination Bank</th>
                                        <th>Nominal</th>
                                        <th>Payment Date</th>
                                        <th>Image</th>
                                        <th width="25%">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                    @php 
                                    if($value->status == 0){
                                        $stt = "<span class='label label-warning label-inline'>Not Confirmation</span>";
                                    }else{
                                        $stt = "<span class='label label-success label-inline'>Confirmation</span>";
                                    }
                                    $sttchange = $value->status =='0' ? "<button class='btn btn-danger btn-sm changestatus' data-id='".$value->id."' data-data='1'  data-toggle='tooltip' title='Tidak Aktif'><span  class='fa fa-ban' title='Tidak Aktif'></span></button>":"<a class='btn btn-success btn-sm changestatus' data-id='".$value->id."'  data-data='0' data-toggle='tooltip' title='Aktif'><span  class='fa fa-check' title='Aktif'></span></a>";
                                    @endphp
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->code}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->bank}}</td>
                                        <td>{{$value->nominal}}</td>
                                        <td>{{date('d F Y', strtotime($value->created_at))}}</td>
                                        <td>
                                        @if($value->image == null || $value->image =='')
                                            <a href="{{ asset('public/asset/transfer/no-image.png') }}" class="fancy-view"><img src="{{ asset('public/asset/transfer/no-image.png') }}" width="100px" height="100px" class="center img-responsive"></a>
                                        @else
                                            <a href="{{ asset('public/asset/transfer/'.$value->image) }}" class='fancy-view'><img src="{{ asset('public/asset/transfer/'.$value->image) }}" width="100px" height="100px" class="center img-responsive"></a>
                                        @endif
                                        </td>
                                        <td>{!! $stt !!}</td>
                                        <td> 
                                            {!! $sttchange !!}
                                        </td>
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
@stop

@section('css')
    <link href="{{ asset('public/vendor/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
    <script src="{{ asset('public/vendor/fancybox/source/jquery.fancybox.js') }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#konfirm_datatable').DataTable();
        });
        $('body').on('click', '.changestatus', function () {
            var csrf_token    = "{{ csrf_token() }}";
            var document_id   = $(this).data("id");
            var document_data = $(this).data("data");
            swal({
                title: "Are you sure?",
                text: "You will be Confirm this data ?",
                type: "warning",
                confirmButtonText: "Yes, Confirm",
                showCancelButton: true
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('admin/confirmation/status') }}"+'/'+ document_id +'/'+ document_data,
                        type: "POST",
                        data: {
                            '_method': 'GET',
                            '_token': csrf_token
                        },
                        success: function(){
                            swal(
                                'Success',
                                'Confirm Data <b style="color:green;">Success</b> button!',
                                'success'
                            ).then(function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            swal({
                                title: 'Opps...',
                                text: 'Error',
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    swal(
                    'Cancelled',
                    'Your stay here :)',
                    'error'
                    )
                }
            })
        });

        $(".fancy-view").fancybox({
            'autoScale'	:false,
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            helpers: {
                title: {
                    type: 'inside'
                },
                overlay : {
                    css : {
                        'background' : 'rgba(255,255,255,0.5)'
                    }
                }
            }
        });
    </script>
@stop
