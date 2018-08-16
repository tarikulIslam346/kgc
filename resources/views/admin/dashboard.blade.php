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
                    <li id="showmenu">Create Nav Item</li>
                    <li id="showmenu1">Create Sub Nav Item</li>
                    <li id="showmenu2">Create Layout</li>
                    <li id="showmenu3">Create Menu</li>
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

                        @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif

                      <form action="/create_menu" method="POST">
                       @csrf
                         <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">Add Menu Title Here</span>
                           </div>

                           <input type="text" class="form-control" name="name" placeholder="Title">

                           <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>


                         </div>
                         @if($errors->has('name'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <p>{{ $errors->first('name') }} </p>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                           @endif


                        
                       </form>





                       <table class="table table-striped table-dark">
                         <thead>
                           <tr>
                             <th>Navigation name</th>
                             <th>Show / Hide</th>
                             <th>Edit Navigation Name</th>
                             <th>Delete</th>
                           </tr>
                         </thead>
                       <tbody>


                        @if(isset($menus))
                         @foreach($menus as $menu)
                           <tr>
                             <td>{{ $menu->name }}</td>
                             <td>
                                 <form method="POST" action="/show_menu/ {{ $menu->id }}">
                                               @csrf

                                               @if($menu->confirmed == 1)

                                               <input checked data-toggle="toggle" name="show" type="checkbox" >
                                               @else
                                               <input  data-toggle="toggle" name="show" type="checkbox" >
                                               @endif

                                              <button type="submit" class="btn btn-small _r_show_menu"><i class="fa fa-check"></i></button>

                                    </form>
                               </td>
                              <td>
                                 <form method="POST" action="/update_menu/ {{ $menu->id }}">
                                       @csrf

                                     <div class="row">
                                     <div class="col-md-6">
                                     <input type="text" class="form-control" name="name" id="name" required>

                                   </div>
                                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                   </div>
                                   </form>
                               </td>
                               <td>
                               <a href="/delete_menu/{{ $menu->id }}" class="btn btn-danger"><i class="fa fa-minus-square"></i>
                               </a>
                             </td>
                           </tr>
                           @endforeach
                           @endif
                         </tbody>
                       </table>
                     </div>
                    </div>
                    <!---Menu create ----->                  
                  </div>
                  <div class="menu1" style="display: none;">
                    <!---SubMenu create ----->  
                    <!---SubMenu create ----->
                   <div class="card">
                    <div class="card-body">
                       @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif

                      <form action="/create_submenu" method="POST">
                       @csrf
                         <div class="input-group mb-3">
                           <div class="input-group-prepend">
                               <span class="input-group-text">Add Submenu title here</span>
                           </div>

                           <input type="text" class="form-control" name="name" placeholder="Title">

                           <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                         </div>
                       </form>
                       <table class="table table-striped table-dark">
                         <thead>
                           <tr>
                             <th>Navigation Subitem name</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                             <th>Edit Navigation Subitem name</th>

                             <th> Selected Layout</th>
                            
                           </tr>
                         </thead>
                       <tbody>
                        @if(isset($submenus))
                         @foreach($submenus as $submenu)
                           <tr>
                             <td>{{ $submenu->name }}</td>

                              <td>
                                 <form method="POST" action="/update_submenu/ {{ $submenu->id }}">
                                       @csrf
                                     <div class="row">
                                       <div class="col-md-6">
                                         <input type="text" class="form-control" name="name" id="name" required>
                                       </div>
                                       <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                     </div>
                                   </form>
                               </td>
                                @php
                                  $var =  \App\LayoutChoice::select('choice')->where('submenu_id',$submenu->id )->get();
                                 @endphp
                                 @foreach($var as $v)
                               <td>
                                 <!-- selected layout goes here-->
                                 {{$v->choice}}
                                
                               </td>
                               @endforeach
                           </tr>
                           @endforeach
                           @endif
                         </tbody>
                       </table>
                     </div>
                   </div>
                   <!---SubMenu create ----->   
                  </div>

                  <div class="menu2" style="display: none;">
                   <!---Layout create ----->  
                    
                    
                     

                      <div class="card">
                     <div class="card-body">


                      <form action="/layout" method="POST">
                        @csrf

                     
                          


                          <label for="Layout catagory">Layout catagory</label>

                            <select class="custom-select custom-select-sm" name="choice">
                              <option selected>select layout </option>
                               @if(isset($layouts))                                       
                               @foreach($layouts as $layout)
                                  <option value="{{$layout->layout_name}}">{{$layout->layout_name}}</option>
                                @endforeach
                              @endif
                            </select>


                          
                        

                      

                        <label for="My Layout Name">Sub navigation item</label>

                         <select class="custom-select custom-select-sm" name="submenu_id">
                              <option selected>select layout </option>
                              @if(isset($submenus))                                       
                                @foreach($submenus as $sub)
                                   <option value="{{$sub->id}}">{{$sub->name}}</option>
                                @endforeach
                              @endif
                        </select>
                          
                        
                        
                        
                        <button type="submit" class="btn btn primary" name="Submit" >
                          <i class="fa fa-plus"></i>
                        </button>

                      </form>

                  {{--     @if(isset($layouts) )
                      @foreach($layouts as $layout)
                      @if($layout->layout_name == "Heigher Commitee")
                      @include('admin.heighercommitee')
                      @endif
                      @endforeach

                      @endif --}}
                      
                     

                      </div>
                    </div>
                           
                      
                    
                     
                    <!---Layout create ----->    
                  </div>

                  <div class="menu3" style="display: none;">
                   <div class="card">
                     <div class="card-body">

                      <form action="/nav" method="POST">
                        @csrf

                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationServer01">Nav catagory</label>
                            <select class="custom-select custom-select-sm" name="menu">
                              <option selected>select nav catagory</option>
                              @if(isset($menus))
                                @foreach($menus as $menu)
                                  <option value="{{$menu->name}}">{{$menu->name}}</option>
                                @endforeach
                              @endif
                            </select>
                          
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationServer02">Nav Sub catagory</label>

                          <!-- Material unchecked -->
<!-- Default checked -->           
                                
                                  @if(isset($submenus))
                                  @foreach($submenus as $submenu)
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="{{$submenu->name}}" name="submenulist[]" value="{{$submenu->name}}">
                                      <label class="custom-control-label" for="{{$submenu->name}}">{{$submenu->name}}</label>
                                  </div>
                           
                                    
                                  @endforeach
                                @endif
                                 
                                
                          
                           
                          </div>
                        </div>
                        <input type="submit" class="btn btn primary" name="Submit" value="Send">
                      </form>
                      <br>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <p>**Do not add same Nav Sub catagory in multiple Nav catagory** </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      



                       <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th>Navigation Item</th>
                              
                              <th> Navigation subitem</th>
                            </tr>
                          </thead>
                        <tbody>


                         @if(isset($nav))
                          @foreach($nav as $n)
                            <tr>
                              <td>{{ $n->menu}}</td>

                              
                              
                               <td>
                                @for($i=0;$i<count( $n->submenulist);$i++)
                                {{$n->submenulist[$i]}} ,
                                  @endfor
                                 
                                {{--    <form method="POST" action="/show_menu/ {{ $menu->id }}">
                                                @csrf

                                                @if($menu->confirmed == 1)

                                                <input checked data-toggle="toggle" name="show" type="checkbox" >
                                                @else
                                                <input  data-toggle="toggle" name="show" type="checkbox" >
                                                @endif

                                               <button type="submit" class="btn btn-small"><i class="fa fa-check"></i></button>
                       
                                     </form>  --}}
                                </td>
                              
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>

                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<!--designe-->

@endsection