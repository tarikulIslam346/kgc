@extends('layouts.master')

@section('content')

<section class="_r_sector_wrap" id="about_us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <img src="/img/s4.jpeg" alt="New York" style="width: 100%; height: 450px">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div id="wrapper">
                  <div class="first">
                    <dl id="ticker-1">
                      <dt>News ticker</dt>
                        <dd>A news ticker (sometimes referred to as a &quot;crawler&quot;) resides in the lower third of the television screen space on television news networks dedicated to presenting headlines or minor pieces of news.</dd>
                  
                      <dt>Scoreboard style</dt>
                        <dd>It may also refer to a long, thin scoreboard-style display seen around the front of some offices or public buildings.</dd>
                  
                      <dt>Mohammad Imran</dt>
                        <dd>Since the growth in usage of the World Wide Web, news tickers have largely syndicated news posts from the websites of the broadcasting services which produce the broadcasts.</dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
            <div class="row _r_section_body">
              <div class="col-md-3">
                @include('pagenav')
              </div>

                <div class="col-md-9 _r_section_speech_body_right">
                  <h1 class="text-center" style="padding-bottom: 30px">Sub Menu Name</h1>
                    @if(isset($h))
                           @foreach($h as $hf)
                  <div class="row justify-content-md-center">
                      <div class="col-md-4 _r_top">
                      
                            <img src="{{ Storage::disk('local')->url($hf->heading) }}"/>
                              
                            
                            <br>
                          
                          <h5 class="text-center">{{$hf->name}}</h5>
                          <p class="text-center">{{$hf->title}}</p>
                      </div>
                  </div>
                  <div class="row _r_bottom">
                      <div class="col-md-12">
                    
                          
                            <p>{{$hf->description}}</p>
                              
                             
                          
                      </div>
                  </div>
                  @endforeach
                  @endif
              </div>


              {{-- <div class="col-md-9 _r_section_speech_body_right">
                <h1 class="text-center" style="padding-bottom: 30px">Sub Menu Name</h1>
              
                <div class="row _r_bottom">
                  <div class="col-md-12">
                    @if(isset($h))
                    @foreach($h as $hf)
                    <img src="{{ Storage::disk('local')->url($hf->heading) }}"/>
                    <br>
                    <p>{{ $hf->paragraph }}</p>
                    @endforeach
                    @endif
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
  {{--   <script>
      $(document).ready(function(){
        $('#loadcontent').click(function(){
           console.log($(this).attr('href'));
          $.get($(this).attr('href'),function(data){
            console.log(data);

          });

        })
        

      });
    </script> --}}



@endsection