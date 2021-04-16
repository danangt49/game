<?php
    $baca=$detail['hits']; 
    Applib::updatehitsblog($detail->id,$baca);
?>
<?php $__env->startSection('main'); ?>
<section class="inner-hero bg_img" data-background="<?php echo e(asset('public/website/assets/images/list-games/inner-hero.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="page-list">
                    <li><a href="<?php echo e(url('/game-pc')); ?>">Home</a></li>
                    <li><?php echo Str::limit($title,20); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="blog-details pb-120">
    <div class="container">
        <div class="row justify-content-center border-bottom pb-5">
            <div class="col-lg-10 mt-50">
                <div class="blog-details__content">
                    <div class="header-image"><img src="<?php echo e(asset('public/website/assets/images/elements/header-el.png')); ?>" alt="image"></div>
                    
                    <img src="<?php echo e(asset('public/asset/blog/'.$detail->gambar)); ?>" alt="image">
                    <p><?php echo $detail->konten; ?></p>
                </div>
            </div>
        </div>
        <!-- row end -->
        <div class="row justify-content-center mt-50">
            <div class="col-lg-8">
                <div class="author">
                    <div class="author__thumb">
                        <img src="<?php echo e(asset('public/website/assets/images/icon/author.png')); ?>" alt="author">
                    </div>
                    <div class="author__content">
                        <span class="top-title">Penulis</span>
                        <h5 class="name"><?php echo e($detail->penulis); ?></h5>
                        <p><time datetime="<?php echo e(date('d-m-Y', strtotime($detail->created_at))); ?>"><?php echo e(date('d-m-Y', strtotime($detail->created_at))); ?></time></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/website/pc/blog-detail.blade.php ENDPATH**/ ?>