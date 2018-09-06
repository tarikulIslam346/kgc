@extends('layouts.master')

@section('content')


<section class="_r_dynamic_button">
    

        <div class="container">
            <div class="row">
                <div class="col-md-12 _r_kgc_content_head">
                  <h1 class="_r_kgc_content_head_title">Image Album shareable Link</h1>
                  <hr class="_r_kgc_hr">
                </div>
            </div>
           <div class="row">
            @if(isset($g_btns))

                @foreach($g_btns as $g_btn)

                    <div class="col-md-3" style="padding:10px">
                        <a href="{{$g_btn->button_link}}" class="btn btn-outline-secondary btn-block">{{ $g_btn->button_name}}</a>
                    </div>

                @endforeach
                @endif
           </div>
        </div>

    </section>
      @include('galary.image')
     @include('galary.vedio')
    
     @include('layouts.footer')



@endsection