@extends('layouts.master')

@section('content')

<section class="_r_sector_wrap" id="about_us">

  @if(isset($menus))
  @foreach($menus as $menu)


          <img src="/menu_images/{{$menu->menu_img}}" alt="New York" style="width: 100%; height: 450px">

            @endforeach

  @endif

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12" style="padding: 0">
                <div id="wrapper">
                  <div class="first">
                    <dl id="ticker-1">
                      @if(isset($notices))
                      @foreach($notices as $notice)
                     <dt>{{\Carbon\Carbon::parse($notice->created_at)->format('F d ')}}</dt>
                        <dd>{!!$notice->notice!!}</dd>
                  
          
                       
                        @endforeach
                         @endif
                    </dl>
                  </div>
                </div>
              </div>
            </div>
            <div class="row _r_section_body">
              <div class="col-md-3" style="background-color: gray">
                @include('pagenav')
              </div>

                <div class="col-md-9 _r_section_speech_body_right">


                   @if(isset($h))
                           @foreach($h as $hf)

                          
                 
                        <div class=" _r_section_body_right">

                                    
                                    <div class="row justify-content-md-center">

                                        <div class="col-md-4 _r_top">
                                            <img src="{{ Storage::url( $hf->heading ) }}"
                                            
                                            />
                                         
                                            <h5 class="text-center">{{ $hf->name }}</h5>
                                            
                                        </div>
                                        <div class="col-md-12 _r_top">
                                            <p class="text-center">
                                              {!! $hf->description !!};


                                            </p> 
                                        </div>
                                    </div>
                                </div>
                      
                        
                      </div>
                  </div>
                
         
                  @endforeach
                  @else
                    @if(isset($menus))
                   @foreach($menus as $menu)


                  <p> {!!$menu->menu_details !!}</p>

                  @endforeach

                  @endif

                                  
                  

                  @endif
                 
  

                   @if(isset($image))
                           @foreach($image as $img)

                          
                 
                        <div class=" _r_section_body_right">

                                    
                                    <div class="row justify-content-md-center">

                                        <div class="col-md-4 _r_top">
                                            <img src="/images/{{ $img->img_url[0] }}"/>
                                            <h5 class="text-center">{{ $img->name[0] }}</h5>
                                            <h5 class="text-center">{{ $img->title[0] }}</h5>
                                     
                                        </div>
                                    </div>
                                   
                                   
                                   
                                    
                                    <div class="row _r_bottom">
                                        @for($i=1 ; $i< count($img->img_url); $i++)
                                     
                                    
                                        <div class="col-md-4">
                                          
                                            <img src="/images/{{ $img->img_url[$i] }}"/>
                                            <h5 class="text-center">{{ $img->name[$i] }}</h5>
                                             <h5 class="text-center">{{ $img->title[$i] }}</h5>
                                           
                                           
                                        </div>
                                         @endfor
                                          
                               
                                        
                                    </div>
                                    
                                </div>

                        
                         
                      
                  
                        
                      </div>
                  </div>
                
           
                  @endforeach
                      @else
{{--                     @if(isset($menus))
  @foreach($menus as $menu)


           <p> {!!$menu->menu_details !!}</p>

            @endforeach

  @endif --}}

                  @endif

                  @if(isset($text))
                           @foreach($text as $page)

                          
                 
                        <div class=" _r_section_body_right">

                                    
                                    <div class="row justify-content-md-center">

                                       
                                        <div class="col-md-12 _r_top">
                                            <p class="text-center">
                                              {!! $page->details !!};


                                            </p> 
                                        </div>
                                    </div>
                                </div>
                           
                        
                      </div>
                  </div>
                
         
                  @endforeach
                      @else

{{--                     @if(isset($menus))
  @foreach($menus as $menu)


           <p> {!!$menu->menu_details !!}</p>

            @endforeach

  @endif --}}

                  @endif
              </div>


         
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('layouts.footer')




@endsection