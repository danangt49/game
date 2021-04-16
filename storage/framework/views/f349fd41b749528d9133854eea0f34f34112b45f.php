<?php $__env->startSection('main'); ?>
<section class="inner-hero bg_img" data-background="<?php echo e(asset('public/website/assets/images/list-games/inner-hero.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title"><?php echo e($data); ?></h2>
                <ul class="page-list">
                    <li><a href="<?php echo e(url('/game-mobile')); ?>">Home</a></li>
                    <li><?php echo e($data); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-120 pb-120 position-relative overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center has--bg">
                    <div class="header-image"><img src="<?php echo e(asset('public/website/assets/images/elements/header-el.png')); ?>" alt="image"></div>
                    <h2 class="section-title">Hubungi</h2>
                    <p>Jika Anda memiliki pertanyaan atau pertanyaan umum, kami siap membantu. Lengkapi formulir di bawah ini dan kami akan menghubungi Anda kembali secepatnya.</p>
                </div>
            </div>
        </div>
        <!--<div class="row">-->
        <!--    <div class="col-lg-6">-->
        <!--        <div class="contact-form-wrapper">-->
        <!--            <form class="contact-form" id="contact_form_submit">-->
        <!--                <div class="form-group">-->
        <!--                    <label>Nama</label>-->
        <!--                    <input type="text" name="name" id="name" placeholder="Enter Your Full Name" class="form-control style--two">-->
        <!--                </div>-->
        <!--                <div class="form-group">-->
        <!--                    <label>Email</label>-->
        <!--                    <input type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control style--two">-->
        <!--                </div>-->
        <!--                <div class="form-group">-->
        <!--                    <label>Pesan</label>-->
        <!--                    <textarea class="form-control style--two" placeholder="Enter Your Message" id="message" name="message"></textarea>-->
        <!--                </div>-->
        <!--                <div class="form-group">-->
        <!--                    <div class="custom-control custom-checkbox mr-sm-2">-->
        <!--                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">-->
        <!--                        <label class="custom-control-label" for="customControlAutosizing">Saya setuju untuk menerima email, buletin, dan pesan promosi</label>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div>-->
        <!--                    <button type="submit" class="submit-btn">Kirim</button>-->
        <!--                </div>-->
        <!--            </form>-->
        <!--        </div>-->
        <!--    </div>-->
            <div class="col-lg-12 offset-lg-1 mt-lg-0 mt-5">
                <div class="contact-content-wrapper">
                    <h2>Ada pertanyaan?</h2>
                    <p>Ada pertanyaan tentang pembayaran atau paket harga? Kami punya jawaban!</p>
                    <div class="row mt-50 mb-none-30">
                        <div class="col-lg-12 mb-30">
                            <div class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="icon">
                                        <i class="las la-envelope"></i>
                                    </i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Email</h3>
                                    <a href="#"><?php echo e($email); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-30">
                            <div class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="icon">
                                       <i class="las la-phone"></i>
                                    </i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Telepon</h3>
                                    <p><a href="#"><?php echo e($telp); ?></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-30">
                            <div class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="las la-map-marker-alt"></i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Alamat</h3>
                                    <p><?php echo e($alamat); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/conan/Music/hiu/resources/views/website/mobile/contact.blade.php ENDPATH**/ ?>