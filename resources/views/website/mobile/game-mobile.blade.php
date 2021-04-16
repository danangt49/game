@extends('layouts.website.app')
@section('main')
<section class="hero bg_img" data-background="{{ asset('public/website/assets/images/bg/featured.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero__content">
                    <span class="hero__sub-title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">{{ $slogan }}</span>
                    <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">{{ $title }}</h2>
                    <p class=" wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">{{ $deskripsi_web }}</p>
                    <!--<a href="#" class="cmn-btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">Download now</a>-->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="featured-game-thumb text-center">
                    <img src="{{ asset('public/website/assets/images/list-games/hiubiz.png') }}" alt="image">
                    <p class="mt-3 mb-3">TERSEDIA DI</p>
                    <div class="d-flex flex-wrap justify-content-center">
                        <a href="#0"><img src="{{ asset('public/website/assets/images/list-games/google-btn.png') }}" alt="image" class="mr-3"></a>
                        <a href="#0"><img src="{{ asset('public/website/assets/images/list-games/apple-btn.png') }}" alt="image" class="ml-3"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-120 pb-120 position-relative overflow-hidden">
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-header text-center has--bg">
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png')}}" alt="image"></div>
                    <h2 class="section-title">Game Mobile</h2>
                </div>
            </div>
        </div>
        <div class="row mb-none-40">
            @foreach ($game as $data)
            <div class="col-lg-4 mb-500  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                <div class="game-card">
                    <div class="game-card__thumb">
                        <a href="{{ url('game-mobile/'.$data->slug.'') }}"><img src="{{ asset('public/asset/game/'.$data->picture )}}" alt="image"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="pt-120 pb-120 position-relative">
    <div class="bg-el"><img src="{{ asset('public/website/assets/images/bg/bg-001.png')}}" alt="image"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="section-header text-center has--bg">
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png') }}" alt="image"></div>
                    <h2 class="section-title">Video Hiu</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="trailer-slider">
                    <div class="single-slide">
                        <div class="trailer">
                            <div class="trailer__thumb">
                                <img src="{{ asset('public/website/assets/images/bg/bg-yt.jpg') }}" alt="image">
                                <a href="{{ $youtube }}" data-rel="lightcase:myCollection" class="play-icon" data-animation="zoomIn" data-delay=".3s"><i class="fas flaticon-fire"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-header has--bg style--two">
                    <div class="header-image style--two"><img src="{{ asset('public/website/assets/images/elements/header-el-4.png')}}" alt="image"></div>
                    <span class="section-sub-title">Postingan Terakhir</span>
                    <h2 class="section-title">News</h2>
                </div>
                <a href="{{ url('article') }}" class="cmn-btn">Lihat Semua</a>
            </div>
            <div class="col-lg-8 mt-lg-0 mt-5">
                <div class="blog-slider">
                    @isset($blog)
                        @foreach ($blog as $item)
                            <div id="mobile" class="post-card">
                                <div class="post-card__thumb">
                                    <img src="{{asset('public/asset/blog/'.$item->gambar)}}" alt="image">
                                </div>
                                <div class="post-card__content">
                                    <span class="date">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
                                    <h3><a href="{{ url('article/'.$item->kategori.'/'.$item->slug.'') }}">{!! Str::limit($item->judul,50) !!}</a></h3>
                                    <div class="post-author mt-3">
                                        <div class="post-author__thumb">
                                            <img src="{{asset('public/website/assets/images/icon/author.png')}}" alt="image">
                                        </div>
                                        <a class="post-author__name">{{ $item->penulis }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>
@endsection