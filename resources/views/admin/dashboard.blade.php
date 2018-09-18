@extends('layouts.master')

@section('content')


<!--designe-->
<section class="_r_dashboard">
      <div class="_r_dashboard_wrap">
        <div class="container-fluid">
          <div class="row _r_row_wrap">
            <div class="col-md-2 _r_col_wrap">
              <!-- <div class="text-center _r_logo">
                <img src="/img/logo.png">
              </div> -->
              <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon bg-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                  <ul class="mr-auto">
                    <li id="showmenu" onclick="setStyle('showmenu', 'menu')">Create Nav Item</li>
                    <li id="showmenu1" onclick="setStyle('showmenu1', 'menu1')">Create Sub Nav Item</li>
                    <li id="showmenu2" onclick="setStyle('showmenu2', 'menu2')">Create Layout</li>
                    <li id="showmenu3" onclick="setStyle('showmenu3', 'menu3')">Create Menu</li>
                    <li id="showmenu4" onclick="setStyle('showmenu4', 'menu4')">Schedule</li>
              {{--       <li id="showmenu5" onclick="setStyle('showmenu5', 'menu5')">Show Schedule</li> --}}
                    <!-- <li id="showmenu6" onclick="setStyle('showmenu6', 'menu6')">Insert Schedule Details</li> -->
                    <!-- <li id="showmenu7" onclick="setStyle('showmenu7', 'menu7')">Show Schedule Details</li> -->
                    <li id="showmenu8" onclick="setStyle('showmenu8', 'menu8')">Create Notice</li>
                    <li id="showmenu9" onclick="setStyle('showmenu9', 'menu9')">Create Gallery Page</li>
                     <!--<li id="showmenu10" onclick="setStyle('showmenu10', 'menu10')">Create Gallery Vedio</li>-->
                     <!--<li id="showmenu11" onclick="setStyle('showmenu11', 'menu11')">Create Gallery Image</li>-->
                     <li id="showmenu12" onclick="setStyle('showmenu12', 'menu12')">Homepage</li> 
                     <li id="showmenu13" onclick="setStyle('showmenu13', 'menu13')">Edit Contact Us</li>
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
                   
                     
                       
                  <div class="menu8" style="display: none;">

                   <!-- show_schedule -->
                   <div class="card">
                    <div class="card-body">
                      @include("admin.notice")

                      </div>
                    </div>
                    <!---show_schedule ----->                  
                  </div>
                   <div class="menu9" style="display: none;">

                   <!-- gallary-->
                   <div class="card">
                    <div class="card-body">

                      @include("admin.galary")

                      </div>
                    </div>
                    <!---gallary ----->                  
                  </div>
                   <div class="menu10" style="display: none;">

                   <!-- gallary-->
                   <div class="card">
                    <div class="card-body">

                      @include("admin.vedio")

                      </div>
                    </div>
                    <!---gallary ----->                  
                  </div>
                    <div class="menu11" style="display: none;">

                   <!-- gallary-->
                   <div class="card">
                    <div class="card-body">

                      @include("admin.galaryImage")

                      </div>
                    </div>
                    <!---gallary ----->                  
                  </div>
                  <div class="menu12" style="display: none;">

                   <!-- gallary-->
                   <div class="card">
                    <div class="card-body">

                      @include("admin.adminHome")

                      </div>
                    </div>
                    <!---gallary ----->                  
                  </div>
                    <div class="menu13" style="display: none;">

                   <!-- gallary-->
                   <div class="card">
                    <div class="card-body">

                      @include("admin.contact")

                      </div>
                    </div>
                    <!---gallary ----->                  
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



@endsection

