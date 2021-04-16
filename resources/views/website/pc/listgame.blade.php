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
<section class="pt-120 pb-120 position-relative overflow-hidden">
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-group">
                    <select class="form-control select2" name="list" id="list" required>
                        <option value="">Pilih</option>
                        @foreach($game as $key=>$value)
                        <option value="{{$value->id}}">{{$value->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-120 pb-120 position-relative overflow-hidden">
    <div class="container">
        <div class="matches-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="all-matches-tab" data-toggle="tab" href="#all-matches" role="tab" aria-controls="all-matches" aria-selected="true">JADWAL</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="top-matches-tab" data-toggle="tab" href="#top-matches" role="tab" aria-controls="top-matches" aria-selected="false">TOP PLAYER</a>
            </li>
            <!--<li class="nav-item" role="presentation">-->
            <!--    <a class="nav-link" id="top-team-tab" data-toggle="tab" href="#top-team" role="tab" aria-controls="top-team" aria-selected="false">TOP TEAM</a>-->
            <!--</li>-->
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all-matches" role="tabpanel">
                    <div class="single-matches-box">
                        <div class="row align-items-center">
                            @foreach ($matches as $data)
                            <div class="col-lg-4 col-md-4" style="padding-top: 30px;">
                                <div class="matches-team">
                                    <h3>{{$data->match_name}}</h3>
                                    <img src="{{asset('public/asset/game/'.$data->picture)}}" alt="image">
                                    <span class="date-time"> Tanggal : {{date('d-M-Y', strtotime($data->match_schedule))}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="top-matches" role="tabpanel">
                    <div class="single-matches-box">
                        <div class="row align-items-center">
                            @foreach ($top as $data)
                            <div class="col-lg-6 mb-30">
                                <div id="detail" class="contact-item">
                                    <div class="contact-item__icon">
                                        <i class="icon">
                                            <i class="las la-trophy"></i>
                                        </i>
                                    </div>
                                    <div class="contact-item__content">
                                        <h3 class="title">{{$data->in_game_name}}</h3>
                                        <p>{{ $data->total }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('css')
@stop

@section('js')
    <script>
       <script>
        $(document).ready(function(){
            $('#list').change(function(){
              var id_data = $('#list').val();
              $.ajax({
                type : "POST",
                url : "{{ url('/jsongame') }}",
                data :  {
                  "id_data":  id_data,
                  "_method": "GET",
                  "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                  $("#all-matches").html(data);
                }
              });
            });
            
            $('#list').change(function(){
              var id_data = $('#list').val();
              $.ajax({
                type : "POST",
                url : "{{ url('/jsonplayer') }}",
                data :  {
                  "id_data":  id_data,
                  "_method": "GET",
                  "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                  $("#top-matches").html(data);
                }
              });
            });
            
            // $('#list').change(function(){
            //   var id_data = $('#list').val();
            //   $.ajax({
            //     type : "POST",
            //     url : "{{ url('/jsonteam') }}",
            //     data :  {
            //       "id_data":  id_data,
            //       "_method": "GET",
            //       "_token": "{{ csrf_token() }}"
            //     },
            //     success: function (data) {
            //       $("#top-team").html(data);
            //     }
            //   });
            // });
            $('.select2').select2() 
        }); 
  </script>
  </script>
@stop