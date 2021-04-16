@extends('layouts.website.page')
@section('main')
<section class="inner-hero bg_img" data-background="{{ asset('public/website/assets/images/list-games/inner-hero.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">{{ $data1 }}</h2>
                <ul class="page-list">
                    <li><a href="{{ url('/game-pc') }}">Home</a></li>
                    <li>{{ $data1 }}</li>
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
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png')}}" alt="image"></div>
                    <h2 class="section-title">{{ $data1 }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-wrapper">
                    <div class="section-header text-center">
                        <h2 class="section-title">{!! $konten !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection