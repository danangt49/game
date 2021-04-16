<?php $__env->startSection('main'); ?>
<section class="inner-hero bg_img" data-background="<?php echo e(asset('public/website/assets/images/list-games/inner-hero.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title"><?php echo e($title); ?></h2>
                <ul class="page-list">
                    <li><a href="<?php echo e(url('/game-mobile')); ?>">Home</a></li>
                    <li><?php echo e($data1); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="pt-120 pb-120 position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center has--bg">
                    <div class="header-image"><img src="<?php echo e(asset('public/website/assets/images/elements/header-el.png')); ?>" alt="image"></div>
                    <h2 class="section-title"><?php echo e($title); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-wrapper">
                    <div class="section-header text-center">
                        <h2 class="section-title"><?php echo $konten; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/website/mobile/fullwitdh.blade.php ENDPATH**/ ?>