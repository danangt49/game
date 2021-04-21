

<?php $__env->startSection('title', 'Banner'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Edit Banner</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-wrapper">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(url('admin/banner/update/'.$banner->id)); ?>" method="POST" enctype="multipart/form-data">            
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($banner->name); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Slide</label>
                                <select class="form-control" name="slide">
                                    <option value="yes" <?php if ($banner->slide=="yes"): ?>selected<?php endif; ?>>Yes</option>
                            <option value="no" <?php if ($banner->slide=="no"): ?>selected<?php endif; ?>>No</option>
                                </select>
                                <?php if($errors->has('slide')): ?> 
                                    <div class="error text-danger"><?php echo e($errors->first('slide')); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Publish</label><br/>
                                <input type="checkbox" name="publish" id="publish" data-toggle="toggle" <?php echo e($banner->publish == 'true' ? 'checked' : ''); ?> >
                                <input class="form-control" name="statuspublish" id="statuspublish" type="hidden" readonly value="<?php echo e($banner->publish); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="picture" class="form-control" value="<?php echo e($banner->picture); ?>">
                                <input type="hidden" name="picturelama" class="form-control" value="<?php echo e($banner->picture); ?>">
                            </div>
                        </div>
                    </div>
                   <div class="card-footer text-muted">
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a href="<?php echo e(url('admin/banner')); ?>">
                            <button type="button" class="btn btn-danger">Back</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script> 
        $(function() {
            $('#publish').change(function() {
                $('#statuspublish').val($(this).prop('checked'))
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/admin/banner/editbanner.blade.php ENDPATH**/ ?>