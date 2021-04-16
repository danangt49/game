

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_body'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo e(url('admin/games')); ?>">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-gamepad"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Games</span>
                                    <span class="info-box-number"><?php echo e($game); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo e(url('admin/matches')); ?>">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Matches</span>
                                    <span class="info-box-number"><?php echo e($match); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo e(url('admin/member')); ?>">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number"><?php echo e($user); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo e(url('admin/confirmation')); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Transfer</span>
                                    <span class="info-box-number"><?php echo e($transfer); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Members Activity Table</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="aktivitasuser">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Members</th>
                                        <th>Activity</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>

        $(document).ready( function () {
            $('#aktivitasuser').DataTable({
                ordering:true,
                processing: true,
                serverSide: true,
                ajax:{
                    url : "<?php echo e(url('admin/JSONaktivitas')); ?>",
                    type: "post",
                    data: {
                        '_token':'<?php echo e(csrf_token()); ?>'
                    }
                }
            });
        }); 

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/admin/home.blade.php ENDPATH**/ ?>