@extends('layouts.master')

@section('content')


<section class="_r_dynamic_button">

        <div class="container" style="padding:20px;">

        			@php
        				$count = 0;
        			@endphp
       

               <div class="row" style="padding:20px">

               	@if(isset($g_btns))

                	@foreach($g_btns as $g_btn)


                	     	@php
            					$count++;
            				@endphp

                	@endforeach
                	

                	@if($count>4)

                	@foreach($g_btns as $g_btn)

                	
                     
                		<div class="col-md-3" style="padding:10px">
                	

                  			<a href="{{$g_btn->button_link}}" class="btn btn-outline-secondary btn-block">{{ $g_btn->button_name}}</a>

                    

                			</div>
                	
                	
					@endforeach
              
            	 

                	@endif
             
       
          
                
                    @endif

               </div>

          


        </div>

    </section>
    @include('galary.vedio')
    @include('layouts.footer')



@endsection