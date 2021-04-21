

<?php $__env->startSection('match_name', 'Match'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Add Match</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(url('admin/matches-store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Game</label>
                            <select name="game_id" class="form-control" required>
                                <option value="">Select game</option>
                                <?php $__currentLoopData = $data_game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($game->id); ?>"><?php echo e($game->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Match Name</label>
                            <input type="text" name="match_name" class="form-control" value="<?php echo e(old('match_name')); ?>">
                            <?php if($errors->has('match_name')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('match_name')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Match Schedule</label>
                            <input type="text" class="form-control" id="datepicker" name="match_schedule">
                            <?php if($errors->has('match_schedule')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('match_schedule')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Per kill</label>
                            <input type="text" name="kill" class="form-control" id="kill" value="<?php echo e(old('kill')); ?>">
                            <?php if($errors->has('kill')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('kill')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fee</label>
                            <input type="text" name="fee" class="form-control" id="fee" value="<?php echo e(old('fee')); ?>">
                            <?php if($errors->has('fee')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('fee')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Maps</label>
                            <input type="text" name="maps" class="form-control" value="<?php echo e(old('maps')); ?>">
                            <?php if($errors->has('maps')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('maps')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Players</label>
                            <input type="text" name="players" class="form-control" value="<?php echo e(old('players')); ?>">
                            <?php if($errors->has('players')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('players')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Link Youtube</label>
                            <input type="text" name="link" class="form-control" value="<?php echo e(old('link')); ?>">
                            <?php if($errors->has('link')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('link')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Prize</label>
                            <input type="text" name="prize" class="form-control" id="prize" value="<?php echo e(old('prize')); ?>">
                            <?php if($errors->has('prize')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('prize')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Team</label>
                            <select class="form-control" name="team">
                            <option value="SOLO">SOLO</option>
                            <option value="DUO">DUO</option>
                            <option value="SQUAD">SQUAD</option>
                            </select>
                            <?php if($errors->has('team')): ?> 
                                <div class="error text-danger"><?php echo e($errors->first('team')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mode</label>
                            <select class="form-control" name="mode">
                            <option value="TPP">TPP</option>
                            <option value="FPP">FPP</option>
                            </select>
                            <?php if($errors->has('mode')): ?> 
                                <div class="error text-danger"><?php echo e($errors->first('mode')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Match Type</label>
                            <select class="form-control" name="match_type">
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
                            </select>
                            <?php if($errors->has('match_type')): ?> 
                                <div class="error text-danger"><?php echo e($errors->first('match_type')); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Image</label>
                            <div class="custom-file">
                            <input type="file" name="picture" class="form-control" value="" accept="image/x-png,image/gif,image/jpeg">
                            <?php if($errors->has('picture')): ?>
                                <div class="error text-danger"><?php echo e($errors->first('picture')); ?></div>
                            <?php endif; ?>
                            <br/>
                                <span>Image Max 2 MB .png or .jpg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" id="ckeditor"> <?php echo e(old('description')); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
                <div class="card-footer text-muted">
                    <div class="form-group">
                        <button type="submit" name="button" class="btn btn-primary">Save</button>
                        <a href="<?php echo e(url('admin/matches')); ?>">
                        <button type="button" class="btn btn-danger">Back</button>
                        </a>
                    </div>
                </div>
            </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" charset="utf-8"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo e(asset('public/vendor/ckeditor/ckeditor.js')); ?>"></script>
<script>
 
 $(document).ready( function () {
    $( "#datepicker" ).datepicker({
        format: 'mm-dd-yyyy'
    });

    $("#kill").keypress(function(data){
      if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
        return false;
      }
    });
    $("#fee").keypress(function(data){
      if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
        return false;
      }
    });
    $("#prize").keypress(function(data){
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/admin/matches/create.blade.php ENDPATH**/ ?>