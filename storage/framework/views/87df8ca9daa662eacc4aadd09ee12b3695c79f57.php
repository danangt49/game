

<?php $__env->startSection('title', 'Modul'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Add Modul</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(url('admin/modul-store')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Name Modul</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama')); ?>">
                            <?php if($errors->has('nama')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('nama')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">URL Modul</label>
                            <input type="text" name="url_modul" class="form-control" value="<?php echo e(old('url_modul')); ?>">
                                <?php if($errors->has('url_modul')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('url_modul')); ?></div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Save</button>
                        <a href="<?php echo e(url('admin/modul')); ?>">
                        <button type="button" class="btn btn-danger">Back</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/admin/modul/create.blade.php ENDPATH**/ ?>