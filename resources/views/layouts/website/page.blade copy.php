<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- site favicon -->
    <link rel="icon" href="{{ asset('public/asset/img/favicon.png') }}">
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
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="las la-arrow-up"></i>
        </span>
    </div>
    <div class="page-wrapper">
        <div class="modal fade" id="loginModal" tabindex="1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-transparent">
                    <div class="modal-body">
                        <div class="account-area">
                            <h3 class="title mb-4">{{ $website }}</h3>
                            <form class="account-form">
                                <div class="form-group">
                                    <label>Your Email </label>
                                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p>Forgot your password? <a href="#0">recover password</a></p>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="cmn-btn">Sign IN</button>
                                </div>
                            </form>         
                            <div class="or-devider mt-5"><span>OR</span></div>
                            <div class="text-center mt-4">
                                <p>Sign up with your work email</p>
                                <a href="#0" class="google-btn mt-4 mb-3"><img src="{{ asset('public/website/assets/images/icon/google.png')}}" alt="image">Sign Up with Google</a>
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
                            <h3 class="title mb-4">Let's get started</h3>
                            <div class="text-center mt-4">
                                <a href="#0" class="google-btn mt-4 mb-3"><img src="{{ asset('public/website/assets/images/icon/google.png') }}" alt="image">Sign Up with Google</a>
                            </div>
                            <div class="or-devider mt-4"><span>OR</span></div>
                            <p class="text-center mt-2 mb-4">Sign up with your work email</p>
                            <form class="account-form">
                                <div class="form-group">
                                    <label>Your Email </label>
                                    <input type="email" name="login_email" placeholder="Enter Your Email" class="form-control">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="cmn-btn">Try It Now</button>
                                </div>
                            </form>
                            <p class="text-center mt-3">Already have an account?<a href="#0" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header class="header">
            <div class="header__bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-xl align-items-center">
                        <a class="site-logo site-title" href="{{ $website }}"><img src="{{ asset('public/asset/img/'.$logo.'') }}" style="width: 220px;" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu-toggle"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @php $public_menu = Applib::WebMenu(4); @endphp
                            @if($public_menu)
                            <ul class="navbar-nav main-menu ml-auto">
                                <li>
                                    <a href="{{ url('/game-pc') }}">Home</a>
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
                                    <li class="menu_has_children">
                                        <a href="#">
                                            {{ $menu['label'] }}
                                        </a>
                                        <ul class="sub-menu">
                                            @foreach( $menu['child'] as $child )
                                            @if($menu->role == 0)
                                                    <li><a href="{{ $website.'/'.$child['link'] }}" >{{ ucwords($child['label']) }}</a></li>
                                                @else
                                                    <li><a href="{{ $child['link'] }}" >{{ ucwords($child['label']) }} </a></li>
                                                @endif
                                                @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                            <div class="nav-right">
                                <a href="#0" data-toggle="modal" data-target="#loginModal">join now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        @yield('main')

        <footer class="footer-section bg_img" data-background="{{ asset('public/website/assets/images/elements/footer.png') }}">
            <div class="container">
                <div class="row footer-top mb-none-50">
                    <div class="col-lg-7 col-sm-7 mb-50">
                        <a href="{{ $website }}" class="logo d-flex align-items-center">
                            <img src="{{ asset('public/asset/img/'.$logo.'') }}" alt="logo" width="500px">
                        </a>
                        &nbsp;
                        <p>{{$deskripsi_web}}</p>
                    </div>
                    <div class="col-lg-3 col-sm-7 mb-50">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">GAMES</h3>
                            @php $link_menu = Applib::WebMenu(5); @endphp
                            @if($link_menu)
                                <ul class="short-links">
                                    @foreach($link_menu as $menu)
                                        <li>
                                            @if($menu->role == 0)
                                                <a href="{{ $website.'/'.$menu['link'] }}">{{ $menu['label'] }}</a>
                                            @else
                                                <a href="{{ $website.'/'.$menu['link'] }}">{{ $menu['label'] }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-7 mb-50">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">HELP CENTER</h3>
                            @php $about_menu = Applib::WebMenu(6); @endphp
                            @if($about_menu)
                            <ul class="short-links">
                                @foreach($about_menu as $menu)
                                    <li>
                                        @if($menu->role == 0)
                                            <a href="{{ $website.'/'.$menu['link'] }}">{{ $menu['label'] }}</a>
                                        @else
                                            <a href="{{ $website.'/'.$menu['link'] }}">{{ $menu['label'] }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row footer-bottom align-items-center">
                    <div class="col-lg-7 col-md-6 text-md-left text-center">
                        <p class="copy-right-text">Copyright &copy; <script>document.write(new Date().getFullYear());</script> All Rights Reserved By <a href="#0">{{ $situs }}</a></p>
                    </div>
                    <div class="col-lg-5 col-md-6 mt-md-0 mt-3">
                        <ul class="social-links justify-content-md-end justify-content-center">
                            <li><a href="{{ $twitter }}"><i class="lab la-twitter"></i></a></li>
                            <li><a href="{{ $facebook }}"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="{{ $instagram }}"><i class="lab la-instagram"></i></a></li>
                            <li><a href="{{ $youtube }}"><i class="lab la-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('public/website/assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/vendor/lightcase.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/vendor/TweenMax.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/contact.js') }}"></script>
    <!--<script src="http://rexbd.net/html/sporcia/demo/assets/js/vendor/jquery.paroller.min.js"></script>-->
    <script src="{{ asset('public/website/assets/js/app.js') }}"></script>
</body>

</html>