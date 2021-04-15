<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="icon" type="image/png" href="{{ asset('public/website/assets/images/favicon.png') }}" sizes="16x16">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/vendor/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/line-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/vendor/nice-select.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/vendor/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/vendor/lightcase.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/vendor/slick.css') }}">
   <link rel="stylesheet" href="{{ asset('public/website/assets/css/main.css') }}">
</head>

<body>
    <div class="preloader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!-- prealoader end -->

    <!-- scroll-to-top start -->
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="icon">
                <img src="{{ asset('public/website/assets/images/icon/panah.png') }}">
            </i>
        </span>
    </div>
    <!-- scroll-to-top end -->

    <!-- page-wrapper start -->
    <div class="page-wrapper">
        <!-- login modal -->
        <div class="modal fade" id="loginModal" tabindex="1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-transparent">
                    <div class="modal-body">
                        <div class="account-area">
                            <h3 class="title mb-4">{{$deskripsi}}</h3>
                            <form class="account-form" method="POST" action="{{ route('login') }}">
                                <div class="form-group">
                                    <label>Your Email </label>
                                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="cmn-btn">SIGN IN</button>
                                </div>
                            </form>
                            <div class="text-center mt-4">
                                <p>Don't have an account? <a href="#0" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="signupModal" tabindex="1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-transparent">
                    <div class="modal-body">
                        <div class="account-area">
                            <h3 class="title mb-4">Register</h3>
                            <div class="text-center mt-4">
                                <a href="#0" class="google-btn mt-4 mb-3"><img src="{{ asset('public/website/assets/images/icon/google.png') }}" alt="image">Sign Up with Google</a>
                            </div>
                            <form  method="POST" action="{{ route('register') }}" class="account-form">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input type="password-confirm" name="password_confirmation" placeholder="Enter Your Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Referal Code</label>
                                    <input type="text" name="referal_code" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="cmn-btn">Register</button>
                                </div>
                            </form>
                            <p class="text-center mt-3">Already have an account?<a href="#0" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header-section start  -->
        <header class="header">
            <div class="header__bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-xl align-items-center">
                        <a class="site-logo site-title" href="{{ $website }}"><img src="{{ asset('public/website/assets/images/'.$logo.'') }}" style="width: 220px;" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu-toggle"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @php $public_menu = Applib::WebMenu(1); @endphp
                            @if($public_menu)
                            <ul class="navbar-nav main-menu ml-auto">
                                <li class="menu_has_children">
                                    <a href="{{ $website }}">Home</a>
                                </li>
                                @foreach($public_menu as $menu)
                                @if( $menu['child']->count() == 0 )
                                <li>
                                    @if($menu->role == 0)
                                    <a href="{{ $website.'/'.$menu['link'] }}">{{ $menu['label'] }}</a>
                                    @else
                                    <a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                                    @endif
                                </li>
                                @else
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="faq.html">faq</a></li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                            <div class="nav-right">
                                <a href="#0" data-toggle="modal" data-target="#loginModal">join now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- header__bottom end -->
        </header>

        <section class="hero bg_img" data-background="{{ asset('public/website/assets/images/bg/hero.png') }}">
            <div class="hero__shape">
                <img src="{{ asset('public/website/assets/images/elements/hero/shape.png') }}" alt="image">
            </div>

            <footer class="footer-section bg_img" data-background="{{ asset('public/website/assets/images/elements/footer.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="subscribe-area">
                                <div class="obj"><img src="{{ asset('public/website/assets/images/elements/subscribe.png') }}" alt="image"></div>
                                <div class="subscribe-content">
                                    <h2 class="title">Find Out About New Games!</h2>
                                    <p>Subscribe to get updated on future game releases</p>
                                    <p></p>
                                    <form class="subscribe-form">
                                        <input type="email" name="subscribe_email" id="subscribe_email" placeholder="Enter Your Email">
                                        <button type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row footer-top mb-none-50">
                        <div class="col-lg-3 col-sm-6 mb-50">
                            <div class="footer-widget">
                                <h3 class="footer-widget__title">ABOUT</h3>
                                <ul class="short-links">
                                    <li><a href="#0">About Us</a></li>
                                    <li><a href="#0">Contact Us</a></li>
                                    <li><a href="#0">Customer Reviews</a></li>
                                    <li><a href="#0">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <!-- footer-widget end -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-50">
                            <div class="footer-widget">
                                <h3 class="footer-widget__title">MY ACCOUNT</h3>
                                <ul class="short-links">
                                    <li><a href="#0">Manage Your Account</a></li>
                                    <li><a href="#0">Account Varification</a></li>
                                    <li><a href="#0">Safety & Security</a></li>
                                </ul>
                            </div>
                            <!-- footer-widget end -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-50">
                            <div class="footer-widget">
                                <h3 class="footer-widget__title">HELP CENTER</h3>
                                <ul class="short-links">
                                    <li><a href="#0">Help centre</a></li>
                                    <li><a href="#0">FAQ</a></li>
                                    <li><a href="#0">Quick Start Guide</a></li>
                                    <li><a href="#0">Tutorials</a></li>
                                </ul>
                            </div>
                            <!-- footer-widget end -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-50">
                            <div class="footer-widget">
                                <h3 class="footer-widget__title">LEGAL INFO</h3>
                                <ul class="short-links">
                                    <li><a href="#0">Security</a></li>
                                    <li><a href="#0">Terms of Service</a></li>
                                    <li><a href="#0">Become Affiliate</a></li>
                                    <li><a href="#0">Complaints Policy</a></li>
                                </ul>
                            </div>
                            <!-- footer-widget end -->
                        </div>
                    </div>
                    <!-- footer-top end -->
                    <div class="row footer-bottom align-items-center">
                        <div class="col-lg-7 col-md-6 text-md-left text-center">
                            <p class="copy-right-text">Copyright © 2020.All Rights Reserved By <a href="#0">OPHELA</a></p>
                        </div>
                        <div class="col-lg-5 col-md-6 mt-md-0 mt-3">
                            <ul class="social-links justify-content-md-end justify-content-center">
                                <li><a href="#0"><i class="lab la-facebook-f"></i></a></li>
                                <li><a href="#0"><i class="lab la-twitter"></i></a></li>
                                <li><a href="#0"><i class="lab la-pinterest-p"></i></a></li>
                                <li><a href="#0"><i class="lab la-google-plus"></i></a></li>
                                <li><a href="#0"><i class="lab la-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer section end -->
    </div>
    <!-- page-wrapper end -->
    <!-- jQuery library -->
     <script src="{{ url('public/website/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <!-- bootstrap js -->
     <script src="{{ url('public/website/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <!-- custom select js -->
     <script src="{{ url('public/website/assets/js/vendor/jquery.nice-select.min.js')}}"></script>
    <!-- lightcase js -->
     <script src="{{ url('public/website/assets/js/vendor/lightcase.js')}}"></script>
    <!-- wow js -->
     <script src="{{ url('public/website/assets/js/vendor/wow.min.js')}}"></script>
    <!-- slick slider js -->
     <script src="{{ url('public/website/assets/js/vendor/slick.min.js')}}"></script>
     <script src="{{ url('public/website/assets/js/vendor/TweenMax.min.js')}}"></script>
    <!-- contact js -->
     <script src="{{ url('public/website/assets/js/contact.js')}}"></script>
     <script src="{{ url('http://rexbd.net/html/sporcia/demo/assets/js/vendor/jquery.paroller.min.js')}}"></script>
    <!-- custom js -->
     <script src="{{ url('public/website/assets/js/app.js')}}"></script>
</body>

</html>