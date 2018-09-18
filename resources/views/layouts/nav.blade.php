  <header id="_r-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
           <nav id="_r-main-nav">
              <div class="_r-brand-logo">
                  <ul class="_r-brand-logo-wrap _r_ul_deco">
                      <li><a class="_r-main-logo" href="#">Rzs Logo</a></li>
                      <li class="_r-mobile-menu"><i class="fas fa-bars"></i></li>
                      <li class="_r-mobile-menu-cross"><i class="fas fa-times"></i></li>
                  </ul>
              </div>

             <ul class="_r-menu-item _r-left-menu-item _r_ul_deco">
                 <li><a href="/" style="font-size: 12px;font-family: 'Comfortaa', cursive;">
                  <br>{{strtoupper('Home')}}</a></li>
                 
                

                 @php
                   $count = 0;

                 @endphp

                 @if (isset($menus))

                 @foreach($menus as $menu)

                  @if($count == 2)
                    @break

                  @endif
                   <li class="_r_abc"><a href="/nav/{{$menu->id}}/{{$menu->name}}" style="font-size: 12px;font-family: 'Comfortaa', cursive;">
                    <br>{{ strtoupper($menu->name) }}</a></li>
                  

                
                  @php
                    $count++;
                  @endphp

                 @endforeach
                 @endif
                 
                 <li><a href="/show_schedule" style="font-size: 12px;font-family: 'Comfortaa', cursive;">
                  <br>{{strtoupper('tournament')}}</a></li>
                   <li><a href="/galary" style="font-size: 12px;font-family: 'Comfortaa', cursive;">
                  <br>{{strtoupper('gallery')}}</a></li>
                   <li><a href="/contact" style="font-size: 12px;font-family: 'Comfortaa', cursive;">
                  <br>{{strtoupper('Contact Us')}}</a></li>

               
                 
             </ul>
             
            <ul class="_r-menu-item _r-right-menu-item _r_ul_deco">


                <li id="_r_extra_menu_show"><a class="_r-all-wings" href="#" ><i class="fas fa-th"></i></a></li>
                 <div class="_r_extra_menu" style="display: none;">

                  
                    @if (isset($menus))

                   @foreach($menus as $menu)
                   @if($count >=3) @continue   @endif
                   
                    <li>{{strtoupper($menu->name)}}</li>

                  @endforeach
                  @endif

                
                    
                </div>
             </ul>
             @if(\Auth::check())
             <ul style="margin: auto;">
                 <li style="color:#fff;"><a href="/dashboard" >{{strtoupper(\Auth::user()->name)}}</a>
                 <a href="/destroy" type="button" class="btn btn-success"><i class="fa fa-ship"></i>Logout</a>
                 </li>
             </ul>
             @endif

            </nav>
          </div>
        </div>
      </div>
    </header>