<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e($setting->title); ?></title>
    <link rel="icon" href="<?php echo e(asset('public/asset/img/favicon.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('public/website/assets-landingpage/css/bootstrap-5.0.5-alpha.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/website/assets-landingpage/css/main.css')); ?>">
</head>

<body>
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('public/asset/img/'.$setting->logo)); ?>" class="center img-responsive">
        </div>
    </header>
    <section id="landingpage" class="landingpage-section">
        <div class="container">
            <div class="row">
                <div class="landingpage-slider-wrapper">
                    <div class="landingpage-active">
                        <div class="row justify-content-md-center">
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blok ">
                                <a href="<?php echo e(url('/'.$item->category_slug.'')); ?>">
                                    <div class="single-landingpage text-center mb-30">
                                        <div class="landingpage-img mb-50">
                                            <img src="<?php echo e(asset('public/asset/category/'.$item->category_picture)); ?>" style="margin-top:20px;width:50%;height:50%" alt="pc">
                                        </div>
                                        <div class="landingpage-info">
                                            <h5><?php echo e($item->category_name); ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <footer class="footer">
        <div class="anticheat-logo">
            <img src="<?php echo e(asset('public/website/assets-landingpage/images/antc.png')); ?>" style="margin-bottom:50px;width: 30px">
            <img src="<?php echo e(asset('public/asset/img/'.$setting->logo)); ?>" style="margin-bottom:50px;width: 50px">
        </div>
    </footer>
</html><?php /**PATH /home/conan/Music/hiu/resources/views/website/landingpage.blade.php ENDPATH**/ ?>