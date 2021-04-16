
<?php $__env->startSection('main'); ?>
    <section class="inner-hero bg_img" data-background="<?php echo e(asset('public/website/assets/images/list-games/inner-hero.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title"><?php echo e($data); ?></h2>
                    <ul class="page-list">
                        <li><a href="<?php echo e(url('/game-pc')); ?>">Home</a></li>
                        <li><?php echo Str::limit($title,50); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
     <section class="pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header text-center has--bg">
                        <div class="header-image"><img src="<?php echo e(asset('public/website/assets/images/elements/header-el.png')); ?>" alt="image"></div>
                        <h2 class="section-title"><?php echo e($title); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row mb-none-40">
                <div class="col-lg-8">
                    <?php if(isset($blog)): ?>
                    <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div id="blog" class="post-card style--two mb-40">
                        <div class="post-card__thumb">
                            <img src="<?php echo e(asset('public/asset/blog/'.$item->gambar)); ?>" alt="image">
                        </div>
                        <div class="post-card__content">
                            <h3 class="post-card__title mb-3"><a href="<?php echo e(url('news/'.$item->kategori.'/'.$item->slug.'')); ?>"><?php echo e($item->judul); ?></a></h3>
                            <p><?php echo Str::limit($item->konten,190); ?></p>
                            <a href="<?php echo e(url('news/'.$item->kategori.'/'.$item->slug.'')); ?>">Read More</a></p>
                        </div>
                    </div>
                    &nbsp;
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <nav>
                                <ul class="pagination justify-content-center align-items-center">
                                    <?php echo e($blog->render()); ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-5">
                    <div class="sidebar">
                        <?php if(!empty($search)): ?>
                        <div class="widget">
                            <h3 class="widget__title">Search</h3>
                            <form class="widget__search">
                                <input type="search" name="widget-search" placeholder="Enter your Search Content" class="form-control">
                                <button type="submit"></i> search</button>
                            </form>
                        </div>
                        <?php endif; ?>
                        <div class="widget">
                            <h3 class="widget__title">Populer Posts</h3>
                            <div class="small-post-slider">
                                <?php $__currentLoopData = $populer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="post-item">
                                    <div class="post-item__thumb"><img src="<?php echo e(asset('public/asset/blog/'.$item->gambar)); ?>" alt="image"></div>
                                    <div class="post-item__content">
                                        <h3><a href="<?php echo e(url('news/'.$item->kategori.'/'.$item->slug.'')); ?>"><?php echo e($item->judul); ?></a></h3>
                                        <ul class="post-item__meta mt-2">
                                            <li><span></i><?php echo e(date('d-M-Y', strtotime($item->created_at))); ?></span></li>
                                            <li></i> <span><?php echo e($item->penulis); ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                      
                        <div class="widget">
                            <h3 class="widget__title">Categories</h3>
                            <ul class="category-list">
                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(url('news/'.$item->_slug.'')); ?>">
                                        <span class="caption"><?php echo e($item->kategori); ?></span>
                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- <div class="widget">-->
                        <!--    <h3 class="widget__title">Featured Tags</h3>-->
                        <!--    <div class="tags-list">-->
                        <!--        <a href="#0">HUNTING</a>-->
                        <!--        <a href="#0">SOFTWARE</a>-->
                        <!--        <a href="#0">APPS</a>-->
                        <!--        <a href="#0">ANDROID</a>-->
                        <!--        <a href="#0">UX DESIGN</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/website/pc/blog.blade.php ENDPATH**/ ?>