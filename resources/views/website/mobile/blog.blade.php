@extends('layouts.website.app')
@section('main')
    <section class="inner-hero bg_img" data-background="{{ asset('public/website/assets/images/list-games/inner-hero.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">{{ $data }}</h2>
                    <ul class="page-list">
                        <li><a href="{{ url('/game-mobile') }}">Home</a></li>
                        <li>{!! Str::limit($title,50) !!}</li>
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
                        <h2 class="section-title">{{ $title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-none-40">
                <div class="col-lg-8">
                    @isset($blog)
                    @foreach ($blog as $item)
                    <div id="blog" class="post-card style--two mb-40">
                        <div class="post-card__thumb">
                            <img src="{{ asset('public/asset/blog/'.$item->gambar)}}" alt="image">
                        </div>
                        <div class="post-card__content">
                            <h3 class="post-card__title mb-3"><a href="{{ url('article/'.$item->kategori.'/'.$item->slug.'') }}">{{$item->judul}}</a></h3>
                            <p>{!! Str::limit($item->konten,190) !!}</p>
                            <a href="{{ url('article/'.$item->kategori.'/'.$item->slug.'') }}">Read More</a></p>
                        </div>
                    </div>
                    &nbsp;
                    @endforeach
                    @endisset
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <nav>
                                <ul class="pagination justify-content-center align-items-center">
                                    {{ $blog->render() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-5">
                    <div class="sidebar">
                        @if(!empty($search))
                        <div class="widget">
                            <h3 class="widget__title">Search</h3>
                            <form class="widget__search">
                                <input type="search" name="widget-search" placeholder="Enter your Search Content" class="form-control">
                                <button type="submit"></i> search</button>
                            </form>
                        </div>
                        @endif
                        <div class="widget">
                            <h3 class="widget__title">Populer Posts</h3>
                            <div class="small-post-slider">
                                @foreach($populer as $item)
                                <div class="post-item">
                                    <div class="post-item__thumb"><img src="{{asset('public/asset/blog/'.$item->gambar)}}" alt="image"></div>
                                    <div class="post-item__content">
                                        <h3><a href="{{ url('article/'.$item->kategori.'/'.$item->slug.'') }}">{{$item->judul}}</a></h3>
                                        <ul class="post-item__meta mt-2">
                                            <li><span></i>{{date('d-M-Y', strtotime($item->created_at)) }}</span></li>
                                            <li></i> <span>{{ $item->penulis }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                      
                        <div class="widget">
                            <h3 class="widget__title">Categories</h3>
                            <ul class="category-list">
                                @foreach($kategori as $item)
                                <li>
                                    <a href="{{ url('article/'.$item->_slug.'') }}">
                                        <span class="caption">{{ $item->kategori }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- <div class="widget">-->
                        <!--    <h3 class="widget__title">Featured Tags</h3>-->
                        <!--    <div class="tags-list">-->
                        <!--        <a href="#0">HUNTING</a>-->
                        <!--        <a href="#0">SOFTWARE</a>-->
                        <!--        <a href="#0">APPS</a>-->
                        <!--        <a href="#0">ANDROID</a>-->
                        <!--        <a href="#0">UX DESIGN</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection