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
 <section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center has--bg">
                    <div class="header-image"><img src="{{ asset('public/website/assets/images/elements/header-el.png')}}" alt="image"></div>
                    <h2 class="section-title">{{ $data1 }}</h2>
                    <p>Tournament game online se indonesia. Raih kemenangan dan berkesempatan masuk ke dunia esports</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="matches-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="all-matches-tab" data-toggle="tab" href="#all-matches" role="tab" aria-controls="all-matches" aria-selected="true">SEMUA</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="upcoming-matches-tab" data-toggle="tab" href="#upcoming-matches" role="tab" aria-controls="upcoming-matches" aria-selected="false">AKTIF</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="latest-result-tab" data-toggle="tab" href="#latest-result" role="tab" aria-controls="latest-result" aria-selected="false">SELESAI</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all-matches" role="tabpanel">
                         
                        <div class="single-matches-box">
                            <div class="row align-items-center">
                                @foreach ($all as $data)
                                <div class="col-lg-4 col-md-4" style="padding-top: 30px;">
                                    <div class="matches-team">
                                        <h3><a href="{{url('schedule/'.$data->slug.'')}}">{{$data->match_name}}</a></h3>
                                        <img src="{{asset('public/asset/game/'.$data->picture)}}" alt="image">
                                        <span class="date-time"> Tanggal : {{date('d-M-Y', strtotime($data->match_schedule))}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="upcoming-matches" role="tabpanel">
                        <div class="single-matches-box">
                            <div class="row align-items-center">
                                @foreach ($upcoming as $data)
                                <div class="col-lg-4 col-md-4" style="padding-top: 30px;">
                                    <div class="matches-team">
                                        <h3><a href="{{url('schedule/'.$data->slug.'')}}">{{$data->match_name}}</a></h3>
                                        <img src="{{asset('public/asset/game/'.$data->picture)}}" alt="image">
                                        <span class="date-time"> Tanggal : {{date('d-M-Y', strtotime($data->match_schedule))}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="latest-result" role="tabpanel">
                        <div class="single-matches-box">
                            <div class="row align-items-center">
                               @foreach ($complete as $data)
                                <div class="col-lg-4 col-md-4" style="padding-top: 30px;">
                                    <div class="matches-team">
                                        <h3><a href="{{url('schedule/'.$data->slug.'')}}">{{$data->match_name}}</a></h3>
                                        <img src="{{asset('public/asset/game/'.$data->picture)}}" alt="image">
                                        <span class="date-time"> Tanggal : {{date('d-M-Y', strtotime($data->match_schedule))}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="top-team-area pb-70">-->
<!--    <div class="container">-->
<!--        <div class="section-title">-->
<!--            <span class="sub-title">Team</span>-->
<!--            <h2>Top ranking team</h2>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-2 col-md-8 col-sm-8">-->
<!--                <div class="single-top-team-item">-->
<!--                    <img src="assets/images/jadwal-tour/top-team-img/team1.png" alt="image">-->
<!--                    <h3><a href="#">Fierce</a></h3>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
@endsection