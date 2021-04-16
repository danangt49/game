<?php $__env->startSection('main'); ?>
<section class="inner-hero bg_img" data-background="<?php echo e(asset('public/website/assets/images/list-games/inner-hero.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title"><?php echo e($data1); ?></h2>
                <ul class="page-list">
                    <li><a href="<?php echo e(url('/game-pc')); ?>">Home</a></li>
                    <li><?php echo e($data1); ?></li>
                    <li><?php echo e($data2); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-120 pb-120 position-relative overflow-hidden">
    <div class="container">
        <div class="matches-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="all-matches-tab" data-toggle="tab" href="#all-matches" role="tab" aria-controls="all-matches" aria-selected="true">JADWAL</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="latest-result-tab" data-toggle="tab" href="#latest-result" role="tab" aria-controls="latest-result" aria-selected="false">SELESAI</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="top-player-tab" data-toggle="tab" href="#top-player" role="tab" aria-controls="top-player" aria-selected="true">TOP PLAYER</a>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all-matches" role="tabpanel">
                    <div class="container">
                        <div class="row mb-none-40">
                            <?php if(isset($all)): ?>
                            <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 mb-500  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                                <div class="game-card">
                                    <div class="game-card__thumb">
                                        <img src="<?php echo e(asset('public/asset/game/'.$data->picture)); ?>" alt="image">
                                        <h4 style="padding-left:10px;"><?php echo e($data->match_name); ?></h4>
                                        <span style="padding-left:10px;"><p><?php echo $data->description; ?></p></span>
                                        <p style="padding-left:10px;"><i class="las la-calendar"></i> Tanggal : <?php echo e(date('d-M-Y', strtotime($data->match_schedule))); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-map"></i> Maps : <?php echo e($data->maps); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-users"></i> Total Player : <?php echo e($data->players); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-map-marker-alt"></i> Mode : <?php echo e($data->mode); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-tag"></i> Biaya : <?php echo e($data->fee); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-trophy"></i> Total Hadiah : <?php echo e($data->prize); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <nav>
                                        <ul class="pagination justify-content-center align-items-center">
                                            <?php echo e($all->render()); ?>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="latest-result" role="tabpanel">
                    <div class="container">
                        <div class="row mb-none-40">
                            <?php if(isset($complete)): ?>
                            <?php $__currentLoopData = $complete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 mb-500  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                                <div class="game-card">
                                    <div class="game-card__thumb">
                                        <img src="<?php echo e(asset('public/asset/game/'.$data->picture)); ?>" alt="image">
                                        <h2 style="padding-left:10px;"><?php echo e($data->match_name); ?></h2> 
                                        <span style="padding-left:10px;"><p><?php echo $data->description; ?></p></span>
                                        <p style="padding-left:10px;"><i class="las la-calendar"></i> Tanggal : <?php echo e(date('d-M-Y', strtotime($data->match_schedule))); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-map"></i> Maps : <?php echo e($data->maps); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-users"></i> Total Player : <?php echo e($data->players); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-map-marker-alt"></i> Tipe : <?php echo e($data->match_type); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-tag"></i> Biaya : <?php echo e($data->fee); ?></p>
                                        <p style="padding-left:10px;"><i class="las la-trophy"></i> Total Hadiah : <?php echo e($data->prize); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <nav>
                                        <ul class="pagination justify-content-center align-items-center">
                                            <?php echo e($complete->render()); ?>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="top-player" role="tabpanel">
                    <div class="single-matches-box">
                        <div class="row align-items-center" style="padding-left:10px;">
                            <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $username= Applib::getUsername($data->user_id); ?>
                            <div class="col-lg-12 mb-30" style="padding-top: 20px;">
                                <div id="detail" class="contact-item">
                                    <div class="contact-item__icon">
                                        <i class="las la-trophy"></i>
                                    </div>
                                    <div class="contact-item__content" >
                                        <h3 class="title" ><?php echo e($username); ?></h3>
                                        <p>Point : <?php echo e($data->sum); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/website/pc/games.blade.php ENDPATH**/ ?>