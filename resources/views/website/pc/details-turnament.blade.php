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
<section class="pt-120 pb-120 bg_img">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center has--bg">
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png')}}" alt="image"></div>
                    <h2 class="section-title">Detail Pertandingan</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12 offset-lg-1 mt-lg-0 mt-5">
            <div class="contact-content-wrapper">
                   <h2 class="section-title">{{ $match->match_name }}</h2>
                    <div class="header-image"><img src="{{ asset('public/asset/game/'.$match->picture.'')}}" alt="image"></div>
                    <div class="row mt-50 mb-none-30">
                        <div class="col-lg-12 mb-30">
                            <div class="contact-item">
                                <div class="contact-item__content">
                                    <h3 class="title">Deskripsi</h3>
                                    <p><a href="#">{!! $match->description !!}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <div id="detail" class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="icon">
                                        <i class="las la-calendar"></i>
                                    </i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Tanggal</h3>
                                    <p>{{date('d-M-Y', strtotime($match->match_schedule))}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <div id="detail" class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="las la-tag"></i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Biaya</h3>
                                    <p>{{ $match->fee }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <div id="detail" class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="las la-map"></i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Maps</h3>
                                    <p>{{ $match->maps }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <div id="detail" class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="las la-users"></i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Total Player</h3>
                                    <p>{{ $match->players }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <div id="detail" class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="las la-map-marker-alt"></i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Tipe</h3>
                                    <p>{{ $match->match_type }}</p>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 mb-30">
                            <div id="detail" class="contact-item">
                                <div class="contact-item__icon">
                                    <i class="las la-trophy"></i>
                                </div>
                                <div class="contact-item__content">
                                    <h3 class="title">Total Hadiah</h3>
                                    <p>{{ $match->prize }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--<div class="row justify-content-between">-->
        <!--    <div class="col-lg-6">-->
        <!--        <div class="section-header style--two">-->
        <!--            <h2 class="section-title">{{ $match->match_name}}</h2>-->
        <!--            <div class="header-image"><img src="{{ asset('public/asset/game/'.$match->picture.'')}}" alt="image"></div>-->
        <!--        </div>-->
        <!--        <p>Tanggal Turnament : {{ $match->match_schedule}}</p>-->
        <!--        <p>Deskripsi : {!! $match->description !!}</p>-->
        <!--        <p>Biaya : {{ $match->fee }}</p>-->
        <!--        <p>Tipe : {{ $match->match_type }}</p>-->
        <!--        <p>Total Player : {{ $match->players }}</p>-->
        <!--        <p><i class="lab la-users"> Total Hadiah : {{ $match->prize}}</i></p>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</section>
@endsection