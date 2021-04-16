

<?php $__env->startSection('title', 'Page'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Edit Page</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(url('admin/page-update/'.$page->id)); ?>" method="POST"  enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Page Name</label>
                            <input type="text" name="nama_laman" class="form-control" value="<?php echo e($page->nama_laman); ?>">
                            <?php if($errors->has('nama_laman')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('nama_laman')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Page Content</label>
                            <textarea type="text" name="konten" class="form-control" id="ckeditor"><?php echo e($page->konten); ?></textarea>
                                <?php if($errors->has('konten')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('konten')); ?></div>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option value="2" <?php if ($page->status=="2"): ?>selected<?php endif; ?>>Not Publish</option>
                                <option value="1" <?php if ($page->status=="1"): ?>selected<?php endif; ?>>Publish</option>
                            </select>
                            <?php if($errors->has('status')): ?> 
                                <div class="error text-danger"><?php echo e($errors->first('status')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Position</label>
                            <input type="text" name="posisi" class="form-control" id="posisi" value="<?php echo e($page->posisi); ?>">
                            <?php if($errors->has('posisi')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('posisi')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Layout</label>
                            <select class="form-control" name="layout">
                                <option value="pc" <?php if ($page->layout=="pc"): ?>selected<?php endif; ?>>PC</option>
                                <option value="mobile" <?php if ($page->layout=="mobile"): ?>selected<?php endif; ?>>MOBILE</option>
                            </select>
                            <?php if($errors->has('layout')): ?> 
                                <div class="error text-danger"><?php echo e($errors->first('layout')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Meta Keywords</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="5"><?php echo e($page->meta_keyword); ?></textarea>
                                <?php if($errors->has('meta_keyword')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('meta_keyword')); ?></div>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea type="text" name="meta_deskripsi" class="form-control" rows="5"><?php echo e($page->meta_deskripsi); ?></textarea>
                                <?php if($errors->has('meta_deskripsi')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('meta_deskripsi')); ?></div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Update</button>
                        <a href="<?php echo e(url('admin/page')); ?>">
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
    <script type="text/javascript" src="<?php echo e(asset('public/vendor/ckeditor/ckeditor.js')); ?>"></script>
    <script>
        $(document).ready(function() { 
            $("#posisi").keypress(function(data){
                if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
                    return false;
                }
            });
        });
        var url = "<?php echo e(url('/ckfinder/ckfinder.html')); ?>";
        CKEDITOR.replace('ckeditor',{
            filebrowserBrowseUrl: url,
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/admin/page/edit.blade.php ENDPATH**/ ?>