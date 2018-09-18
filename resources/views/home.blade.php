@extends('layouts.master')

@section('content')
@include('layouts.slider')

 <section id="online_service">
      <div class="container">
        <div class="row">
          <div class="col-md-12 _r_kgc_content_head">
            <h1 class="_r_kgc_content_head_title">Our Online Service</h1>
            <hr class="_r_kgc_hr">
               @if(isset($online_servive))
            <h1 class="_r_kgc_content_head_body">{!!$online_servive->home_online_text !!}</h1>
            @endif
          </div>
        </div>
        <div class="row">
         @if(isset($buttons))
          @foreach($buttons as $button)
          <div class="col-md-4 _r_kgc_content_body animated fadeInUp">
            <a href="{{$button->home_button_link}}">
              <button type="button" class="btn btn-outline-secondary btn-block"> {{$button->home_button_name}} </button>
              
            </a>
          </div>
          @endforeach
          @endif
        </div>
      </div>
</section>  
<section id="upcomming_tournament">
      <div class="container">
        
          <div class="row">
            <div class="col-md-12 _r_kgc_content_head">
              <h1 class="_r_kgc_content_head_title">upcomming tournament</h1>
              <hr class="_r_kgc_hr">
            </div>
          </div>
          <div class="row" style="height: 450px;">
            @if(isset($schedule))
         
              <div class="col-md-4 _r_kgc_countdown_tournament">
                  <div class="_r_kgc_countdown_tournament_wrap">
                    <img src="/logos/{{$schedule->tournament_logo}}"> 
                  <div class="_r_kgc_countdown_title">
                    <p class="_r_kgc_tname">{{$schedule->tournament}}</p>
                    <p class="_r_kgc_tdate">{{\Carbon\Carbon::parse($schedule->start_date)->format('F d')}} - {{\Carbon\Carbon::parse($schedule->closing_date)->format('F d')}} , {{\Carbon\Carbon::parse($schedule->start_date)->format('Y')}}</p>
                  </div>
                  <p id="sc_date" style="display:none;">{{\Carbon\Carbon::parse($schedule->start_date)->format('F d Y')}}</p>
                  <div id="_r_kgc_timer">
                    <div id="days"></div>
                    <div id="hours"></div>
                    <div id="minutes"></div>
                    <div id="seconds"></div>
                  </div>
                  </div>
              </div>
              @else
                 <div class="col-md-4 _r_kgc_countdown_tournament">
                  <div class="_r_kgc_countdown_tournament_wrap">
                    <img src="/img/logo.png"> 
                   
                  <div class="_r_kgc_countdown_title">
                    <h1 class="_r_kgc_tname">No Upcoming Tournament</h1>
                    <p class="_r_kgc_tdate">0/0/0</p>
                  </div>
                  </div>
                  
              </div>

   
              @endif

              <div class="col-md-8">
                  <div class="scrollbar" id="style-8">
                  <div class=" _r_kgc_countdown_table_wrap">
                  @if(isset($schedules))
                  @foreach($schedules as $recent)
              
                  <div class="row _r_kgc_countdown_row_deco">
                    <div class="col-md-4 _r_kgc_countdown_table_img">
                      <img src="logos/{{$recent->tournament_logo}}">
                    </div>
                    <div class="col-md-8">
                      <p class="_r_kgc_tbl_name">{{$recent->tournament}}</p>
                      <p class="_r_kgc_tbl_date">{{\Carbon\Carbon::parse($recent->start_date)->format('F d ,Y')}}</p>
                    </div>
                  </div>
                  @endforeach
                  @else
                   <div class="row _r_kgc_countdown_row_deco">
                    <div class="col-md-4 _r_kgc_countdown_table_img">
                      <img src="img/logo.png">
                    </div>
                    <div class="col-md-8">
                      <p class="_r_kgc_tbl_name">No Upcoming Tournament</p>
                      <p class="_r_kgc_tbl_date">0/0/0</p>
                    </div>
                  </div>

                  @endif
      
                </div>
                  
                
              </div>
              </div>
            </div>
     </div>
 </section>
@include('layouts.footer')





@endsection