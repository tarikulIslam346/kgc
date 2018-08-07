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
                 <li><a href="/"><br>{{strtoupper('Home')}}</a></li>
                 <li><a href="#"><br>{{strtoupper('About us')}}</a></li>
                 <li><a href="#"><br>{{strtoupper('Commitee')}}</a></li>
                 @if (isset($menus))
                 @foreach($menus as $menu)
                  <li><a href="#"><br>{{strtoupper($menu->name)}}</a></li>

                 @endforeach
                 @endif
             </ul>
             
             <ul class="_r-menu-item _r-right-menu-item _r_ul_deco">
                 <li><a class="_r-all-wings" href="#"><i class="fas fa-th"></i></a></li>
             </ul>
             @if(\Auth::check())
             <ul style="margin: auto;">
                 <li style="color:#fff;"><a href="/dashboard" >{{strtoupper(\Auth::user()->name)}}</a>
                 <a href="/destroy" type="button" class="btn btn-success">Logout</a>
                 </li>
             </ul>
             @endif

            </nav>
          </div>
        </div>
      </div>
    </header>