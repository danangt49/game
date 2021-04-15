@extends('layouts.website.app')
@php
    $baca=$detail['hits']; 
    Applib::updatehitsblog($detail->id,$baca);
@endphp
@section('main')
<section class="inner-hero bg_img" data-background="{{ asset('public/website/assets/images/list-games/inner-hero.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="page-list">
                    <li><a href="{{ url('/game-mobile') }}">Home</a></li>
                    <li>{{ $title }}</li>
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
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png')}}" alt="image"></div>
                    
                    <img src="{{asset('public/asset/blog/'.$detail->gambar)}}" alt="image">
                    <p>{!! $detail->konten !!}</p>
                </div>
            </div>
        </div>
        <!-- row end -->
        <div class="row justify-content-center mt-50">
            <div class="col-lg-10">
                <div class="author">
                    <div class="author__thumb">
                        <img src="{{asset('public/website/assets/images/icon/author.png')}}" alt="author">
                    </div>
                    <div class="author__content">
                        <span class="top-title">About Author</span>
                        <h2 class="name mb-3">{{ $detail->penulis }}</h2>
                        <p><time datetime="{{date('d-m-Y', strtotime($detail->created_at))}}">{{date('d-m-Y', strtotime($detail->created_at))}}</time></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection