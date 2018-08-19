@extends('layouts.master')

@section('content')

<!--designe-->
<section class="_r_dashboard">
      <div class="_r_dashboard_wrap">
        <div class="container-fluid">
          <div class="row _r_row_wrap">
            <div class="col-md-2 _r_col_wrap">
              <div class="text-center _r_logo">
                <img src="/img/logo.png">
              </div>
              <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon bg-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="mr-auto">
                    <li id="showmenu" active >Create Nav Item</li>
                    <li id="showmenu1">Create Sub Nav Item</li>
                    
                  {{--  @if($name == 'submenu')
                   
                         <li id="showmenu1" active>Create Sub Nav Item</li>
                         @endif --}}

                    <li id="showmenu2">Create Layout</li>
                    <li id="showmenu3">Create Menu</li>
                    <li id="showmenu4">Schedule</li>
                    <li id="showmenu5">Show Schedule</li>
                  </ul>
                </div>
              </nav>
            </div>
            <div class="col-md-10">
              <div class="row _r_dashboard_right">
                <div class="col-md-12">
                  <div class="menu" style="display: none;">

                   <!-- Menu create -->
                   <div class="card">
                    <div class="card-body">

                       @include('admin.menu')
                     </div>
                    </div>
                    <!---Menu create ----->                  
                  </div>
                  <div class="menu1" style="display: none;">
                    <!---SubMenu create ----->  
                    <!---SubMenu create ----->
                   <div class="card">
                    <div class="card-body">
                        @include('admin.submenu')
                     </div>
                   </div>
                   <!---SubMenu create ----->   
                  </div>

                <div class="menu2" style="display: none;">
                   <!---Layout create ----->  
                  
                    <div class="card">
                     <div class="card-body">
                      
                      @include('admin.createlayout')
                      
                     
                      </div>
                    </div>
                     
                    <!---Layout create ----->    
                  </div>

                  <div class="menu3" style="display: none;">
                   <div class="card">
                     <div class="card-body">

                      @include('admin.navigation')

                      </div>

                    </div>
                  </div>
                  <div class="menu4" style="display: none;">

                   <!-- Scedule create -->
                   <div class="card">
                    <div class="card-body">
                     @include('admin.schedule')

                      </div>
                    </div>
                     <!-- Scedule create -->               
                  </div>
                   <div class="menu5" style="display: none;">

                   <!-- Green fee create -->
                   <div class="card">
                    <div class="card-body">
                      @include("admin.show_schedule")

                      </div>
                    </div>
                    <!---Green fee create ----->                  
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<!--designe-->

<style>
.menu2 ._r_submenu_style{
    padding-bottom: 40px;
}
.menu2 ._r_col_deco{
    background-color: #111;
    color: #fff;
    padding: 5px 15px;
}

.menu2 ._r_col_deco label{
    margin-bottom: 0px;
}

.menu2 ._r_select_deco select{
   border-radius: 0;
    height: 34px;
}

.menu2 ._r_select_deco{
   padding-left: 0;
}

.menu2 ._r_sub_button{
   padding-bottom: 20px;
   border-bottom: 2px solid #000;
}
</style>

@endsection