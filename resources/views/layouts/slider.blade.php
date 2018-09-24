   <!-- slider -->
    <div id="home" style="position:relative">
      <div id="demo" class="carousel slide" data-ride="carousel">
          <!-- The slideshow -->
          <div class="carousel-inner">
              @php $count = 0; @endphp
              @if(isset($slides))
              @foreach($slides as $slide)
              @php
                $count = $count+1;
              @endphp
            <div class="carousel-item  <?php if($count==1){?>active<?php }?>">
            <div class="_r_kgc_sliderOverlay"></div>
              <img src="/slider/{{$slide->slider_image}}" alt="Los Angeles">
              <div class="_r_kgc_sliderContent">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12 text-center">
                            <h2 class="animated fadeInLeft">{{$slide->title}}</h2>
                            <h5 class="animated fadeInUp">{{$slide->sub_title}}</h5>
                            <p class="animated fadeInUp"><a href="{{$slide->link}}" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>

          <!-- Indicators -->
          <ul class="carousel-indicators">
            @for($i=0;$i<$count;$i++)
            <li data-target="#demo" data-slide-to="{{$i}}" class="<?php if($i==0){?>active<?php }?>"></li>
            @endfor
          </ul>
      </div>
        <div class="container-fluid" style="position: absolute;bottom: -115px;width:100%">
            <div class="row _r_kgc_curve_row">
                <div class="col-md-2 _r_kgc_curve_col">
                    <div class="_r_kgc_curve_wrap">
                        <svg width="40px" height="100%" viewBox="0 0 247 390" style="padding-bottom:65px">
                            <path id="wheel" d="M123.359,79.775l0,120.843" style="fill:none;stroke:#36454F;stroke-width:10px"/>
                            
                            <path id="mouse" d="M236.717,123.359c0,-62.565 -50.794,-113.359 -113.358,-113.359c-62.565,0 -113.359,50.794 -113.359,113.359l0,143.237c0,62.565 50.794,113.359 113.359,113.359c62.564,0 113.358,-50.794 113.358,-113.359l0,-143.237Z" style="fill:none;stroke:#36454F;stroke-width:10px;"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider -->
    
    
    
    
  