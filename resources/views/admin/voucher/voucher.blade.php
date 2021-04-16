@extends('adminlte::page')

@section('title', 'Voucher')

@section('content_header')
    <h1>List Voucher</h1>
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
                        <form action="{{url('admin/voucher')}}" method="POST">
                          {{ csrf_field() }}
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label>Voucher Name</label>
                                              <input type="text" class="form-control" name="title">
                                              @if($errors->has('title'))
                                                  <div class="error text-danger">{{$errors->first('title')}}</div>
                                              @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Voucher amount</label>
                                                <input type="text" class="form-control" name="count" id="count" maxlength="4">
                                                @if($errors->has('count'))
                                                    <div class="error text-danger">{{$errors->first('count')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Expired</label>
                                                <input type="text" class="form-control" id="datepicker" name="expired_at">
                                                @if($errors->has('expired_at'))
                                                    <div class="error text-danger">{{$errors->first('expired_at')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Voucher</label>
                                                <select class="form-control select2" name="jenis" id="jenis" required>
                                                    <option value="">Select</option>
                                                    @foreach($jenis as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->jenis}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('jenis'))
                                                    <div class="error text-danger">{{$errors->first('jenis')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nominal Token</label>
                                                <input type="text" class="form-control" name="nominal" id="nominal" readonly="true" placeholder="Nominal Voucher" required >
                                                @if($errors->has('nominal'))
                                                    <div class="error text-danger">{{$errors->first('nominal')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-t-20">
                                        <button class="btn btn-primary submit-btn btn-sm" type="submit"> Generate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="laravel_datatable">
                                   <thead>
                                      <tr>
                                         <th width="10px">No</th>
                                         <th>Voucher Name</th>
                                         <th>Voucher Code</th>
                                         <th>Nominal Token</th>
                                         <th>Status</th>
                                         <th>Expired</th>
                                         <th width="20%">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($data_voucher as $key => $voucher)
                                     <tr>
                                       <td>{{$key+1}}</td>
                                       <td>{{$voucher->title}}</td>
                                       <td>{{$voucher->code}}</td>
                                       <td>{{$voucher->nominal}}</td>
                                        <td>
                                        @if( $voucher->used == 'false')
                                            @if($voucher->expired_at > $date )
                                                <span class="badge bg-primary">Not Used</span></span>
                                            @else
                                                <span class="badge bg-danger">Expired</span>
                                            @endif
                                        @elseif($voucher->used =='true')
                                            @if($voucher->expired_at > $date )
                                                <span class="badge bg-success">Used</span>
                                            @else
                                                <span class="badge bg-danger">Expired</span>
                                            @endif
                                        @else
                                            <span class="badge bg-danger">Expired</span>
                                        @endif
                                       </td>
                                      <td>{{date('d-m-Y', strtotime($voucher->expired_at))}}</td>
                                      <td> <a class="btn btn-warning btn-xs" href="{{ url('admin/voucher/edit/'.$voucher->id)}}"><i class="fas fa-tools"></i></a>
                                        <button data-id="{{ $voucher->id }}" class="btn-xs btn btn-danger delete-voucher"><i class="fas fa-trash-restore"></i></button></td>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready( function () {
        $('#laravel_datatable').DataTable();

        $("#count").keypress(function(data){
            if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
                return false;
            }
        });
    
        $( "#datepicker" ).datepicker({
            format: 'mm-dd-yyyy'
        });

        
        $('body').on('click', '.delete-voucher', function () {
            var csrf_token = "{{ csrf_token() }}";
            var document_id = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "You will be delete this item ?",
                type: "warning",
                confirmButtonText: "Yes, delete",
                showCancelButton: true
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('admin/voucher/delete')}}"+'/'+document_id,
                        type: "POST",
                        data: {
                            '_method': 'GET',
                            '_token': csrf_token
                        },
                        success: function(){
                            swal(
                                    'Success',
                                    'Destroy Data <b style="color:green;">Success</b> button!',
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
        
        $('#jenis').change(function(){
            var id      = $('#jenis').val();
            $.ajax({
                type : "POST",
                url : "{{ url('admin/voucher/getJenisVoucher') }}",
                dataType : "json",
                data :  {
                    "id":  id,
                    "_token": "{{ csrf_token() }}"
                },
                success	: function(data){
                    $("#nominal").val(data.nominal);
                }
            });
        });
        $(".select2").select2();
    });
</script>
@stop