

<?php $__env->startSection('title', 'Setting'); ?>

<?php $__env->startSection('content_header'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(url('admin/setting/update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                <h3>Website Configuration</h3>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary submit-btn btn-sm" type="submit">Save</button>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2"> 
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#situs" data-toggle="tab">Site</a></li>
                                <li class="nav-item"><a class="nav-link" href="#kontak" data-toggle="tab">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="#meta" data-toggle="tab">Meta</a></li>
                                <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">Image</a></li>
                                <li class="nav-item"><a class="nav-link" href="#sosial-media" data-toggle="tab">Social Media</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="situs">
                                    <div class="form-group row">
                                        <label for="website" class="col-sm-2 col-form-label">URL HOMPAGE</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control input w-full mt-2" name="id" id="id" value="<?php echo e($data->id); ?>" placeholder="ID" readonly="true" >
                                            <input type="text" name="website" class="form-control" value="<?php echo e($data->website); ?>">
                                            <?php if($errors->has('website')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('website')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Site Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="<?php echo e($data->nama); ?>">
                                            <?php if($errors->has('nama')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('nama')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slogan" class="col-sm-2 col-form-label">Slogan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="slogan" class="form-control" value="<?php echo e($data->slogan); ?>">
                                            <?php if($errors->has('slogan')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('slogan')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi_situs" class="col-sm-2 col-form-label">Site Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="deskripsi_situs" class="form-control" rows="5" id="deskripsi_situs"> <?php echo e($data->deskripsi_situs); ?></textarea>
                                            <?php if($errors->has('deskripsi_situs')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('alamat')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="kontak">
                                    <div class="form-group row">
                                        <label for="telepon" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="telepon" class="form-control" value="<?php echo e($data->telepon); ?>">
                                            <?php if($errors->has('telepon')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('telepon')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="alamat" class="form-control" rows="5" id="alamat"> <?php echo e($data->alamat); ?></textarea>
                                            <?php if($errors->has('alamat')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('alamat')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email_website" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email_website" name="email_website" class="form-control" value="<?php echo e($data->email_website); ?>">
                                            <?php if($errors->has('email_website')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('email_website')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="meta">
                                    <div class="form-group row">
                                        <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keywords  <br><span>max 300 chars</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="meta_keyword" class="form-control" rows="5" id="meta_keyword"> <?php echo e($data->meta_keyword); ?></textarea>
                                            <?php if($errors->has('meta_keyword')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('meta_keyword')); ?></div> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_deskripsi" class="col-sm-2 col-form-label">Meta Description <br><span>max 160 chars</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="meta_deskripsi" class="form-control" rows="5" id="meta_deskripsi"> <?php echo e($data->meta_deskripsi); ?></textarea>
                                            <?php if($errors->has('meta_deskripsi')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('meta_deskripsi')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="image">
                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label" >Logo:<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <div class="border-2 border-dashed rounded-md mt-3 pt-4">
                                                <div class="flex flex-wrap px-4">
                                                    <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <?php if(empty($data->logo)): ?>
                                                                <img src="<?php echo e(asset('public/asset/logo/no-image.png')); ?>" alt="Logo" width="100" height="80"/>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/asset/img/logo.png')); ?>"  alt="Logo" width="100" height="80" />
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                                        <div class="mt-10">
                                                            <span class="btn btn-primary submit-btn text-white btn-file">
                                                                <span class="fileinput-new">Select Logo</span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="logo">
                                                            </span>
                                                            <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                            <input type="hidden"  class="input w-full mt-2" name="logolama" value="<?php echo e($data->logo); ?>">

                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="icon" class="col-sm-2 col-form-label" >Icon:<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <div class="border-2 border-dashed rounded-md mt-3 pt-4">
                                                <div class="flex flex-wrap px-4">
                                                    <div class="fileinput fileinput-new input w-full mt-2" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <?php if(empty($data->favicon)): ?>
                                                                <img src="<?php echo e(asset('public/asset/logo/no-image.png')); ?>" alt="Favicon" width="100" height="80"/>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/asset/img/favicon.png')); ?>"  alt="Favicon" width="100" height="80" />
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail mb-7 "></div>
                                                        <div class="mt-10">
                                                            <span class="btn btn-primary submit-btn text-white btn-file">
                                                                <span class="fileinput-new">Select Icon</span>
                                                                <span class="fileinput-exists">Change </span>
                                                                <input type="file" name="favicon">
                                                            </span>
                                                            <a href="javascript:;" class="button btn btn-danger ddanger-btn text-white fileinput-exists" data-dismiss="fileinput">Remove </a>
                                                            <input type="hidden"  class="input w-full mt-2" name="faviconlama" value="<?php echo e($data->favicon); ?>">

                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sosial-media">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="facebook" class="form-control" value="<?php echo e($data->facebook); ?>">
                                            <?php if($errors->has('facebook')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('facebook')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="twitter" class="form-control" value="<?php echo e($data->twitter); ?>">
                                            <?php if($errors->has('twitter')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('twitter')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="instagram" class="form-control" value="<?php echo e($data->instagram); ?>">
                                            <?php if($errors->has('instagram')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('instagram')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Youtube</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="youtube" class="form-control" value="<?php echo e($data->youtube); ?>">
                                            <?php if($errors->has('youtube')): ?>
                                                <div class="error text-danger"><?php echo e($errors->first('youtube')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet"  />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/vendor/bootstrap-fileinput/bootstrap-fileinput.js')); ?>"  ></script>
    <script type="text/javascript">
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/game/resources/views/admin/setting/home.blade.php ENDPATH**/ ?>