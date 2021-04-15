@extends('layouts.website.app')
@section('main')
<section class="inner-hero bg_img" data-background="{{ asset('public/website/assets/images/list-games/inner-hero.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">{{ $data1 }}</h2>
                <ul class="page-list">
                    <li><a href="{{ url('/game-mobile') }}">Home</a></li>
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
                    <p>Jika Anda memiliki pertanyaan atau pertanyaan umum, kami siap membantu. Lengkapi formulir di bawah ini dan kami akan menghubungi Anda kembali secepatnya.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-wrapper">
                    <div class="section-header text-center">
                        <span class="section-sub-title">ADA PERTANYAAN?</span>
                    </div>
                    <div class="accordion cmn-accordion" id="faqAcc-one">
                        @foreach($data_faq as $data)
                            <div class="card">
                                <div class="card-header" id="h-1">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <img src="{{ asset('public/website/assets/images/icon/question-icon.png')}}" alt="image" class="mr-3">{{$data->title}}
                                    </button>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="h-1" data-parent="#faqAcc-one">
                                    <div class="card-body">
                                        <p>{{$data->deskripsi}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection