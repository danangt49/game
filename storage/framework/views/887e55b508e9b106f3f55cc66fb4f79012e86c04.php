<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title_prefix', config('adminlte.title_prefix', '')); ?>
<?php echo $__env->yieldContent('title', config('adminlte.title', 'AdminLTE 3')); ?>
<?php echo $__env->yieldContent('title_postfix', config('adminlte.title_postfix', '')); ?></title>
    <?php if(! config('adminlte.enabled_laravel_mix')): ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/overlayScrollbars/css/OverlayScrollbars.css')); ?>">
     <!--<link rel="stylesheet" href="<?php echo e(asset('public/vendor/easyui/themes/material/easyui.css')); ?>"  >-->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/easyui/themes/icon.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" >

    <?php echo $__env->make('adminlte::plugins', ['type' => 'css'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('adminlte_css_pre'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/adminlte/dist/css/adminlte.css')); ?>">

    <?php echo $__env->yieldContent('adminlte_css'); ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php endif; ?>
</head>
<body class="<?php echo $__env->yieldContent('classes_body'); ?>" <?php echo $__env->yieldContent('body_data'); ?>>

<?php echo $__env->yieldContent('body'); ?>

<?php if(! config('adminlte.enabled_laravel_mix')): ?>
<script src="<?php echo e(asset('public/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/vendor/easyui/jquery.easyui.min.js')); ?>"></script>

<?php echo $__env->make('adminlte::plugins', ['type' => 'js'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('adminlte_js'); ?>
<?php else: ?>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php endif; ?>

</body>
</html>
<?php /**PATH /home/conan/Music/hiu/vendor/jeroennoten/laravel-adminlte/src/../resources/views/master.blade.php ENDPATH**/ ?>