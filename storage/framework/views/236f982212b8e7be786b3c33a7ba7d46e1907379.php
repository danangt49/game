

<?php $__env->startSection('title', 'Modul'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Modul List</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-6">
        <a href="<?php echo e(url('admin/modul-create')); ?>" class="btn btn-primary"><i class="fas fa-plus-square"> ADD</i></a>
    </div>
    <hr>
    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Name Modul</th>
                            <th>URL Modul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(url('admin/json-modul')); ?>",
                columns: [
                    { data: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'nama', name: 'nama' },
                    { data: 'url_modul', name: 'url_modul' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $('body').on('click', '.delete-modul', function () {
            var csrf_token = "<?php echo e(csrf_token()); ?>";
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
                        url: "<?php echo e(url('admin/modul-delete')); ?>" + '/' + document_id,
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
     </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/admin/modul/home.blade.php ENDPATH**/ ?>