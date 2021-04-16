@extends('layouts.website.page')
@section('main')
<section class="inner-hero bg_img" data-background="{{ asset('public/website/assets/images/list-games/inner-hero.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">{{ $data }}</h2>
                <ul class="page-list">
                    <li><a href="{{ url('/game-pc') }}">Home</a></li>
                    <li>{{ $data }}</li>
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
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png')}}" alt="image"></div>
                    <h2 class="section-title">List Mobile Games</h2>
                </div>
            </div>
        </div>
        <div class="row mb-none-40">
            @foreach ($listgame as $data)
            <div class="col-lg-4 mb-500  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                <div class="game-card">
                    <div class="game-card__thumb">
                        <a href="#"><img src="{{ asset('public/asset/game/'.$data->picture )}}" alt="image"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
