@extends('layouts.master')

@section('content')

<!--designe-->
<section class="_r_dashboard">
      <div class="_r_dashboard_wrap">
        <div class="container-fluid">
          <div class="row _r_row_wrap">
            <div class="col-md-2 _r_col_wrap">
              <div class="text-center _r_logo">
                <img src="img/logo.png">
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

                    <!---Menu create ----->
                    <div class="card">
                     <div class="card-body">
                      
                       <form action="/create_menu" method="POST">
                        @csrf
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Add menu title here</span>
                            </div>

                            <input type="text" class="form-control" name="name" placeholder="Title">

                            <button type="submit" class="btn btn-success" style="border-radius:25px;"><i class="fa fa-plus"></i></button>


                          </div>
                          @if($errors->has('name'))
                            <div class="alert alert-primary" role="alert">{{ $errors->first('name')}} 
                            </div>                           
                            @endif 
                        </form>

                      
                           
                      
                    
                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th>Navigation name</th>
                              <th>Delete</th>
                              <th> Edit</th>
                              <th> Show</th>
                            </tr>
                          </thead>
                        <tbody>


                         @if(isset($menus))
                          @foreach($menus as $menu)
                            <tr>
                              <td>{{ $menu->name }}</td>
                              <td>
                                <a href="/delete_menu/{{ $menu->id }}" class="btn btn-primary"><i class="fa fa-minus-square"></i>
                                </a>
                              </td>
                               <td>
                                  <form method="POST" action="/update_menu/ {{ $menu->id }}">
                                        @csrf

                                      <div class="row">
                                      <div class="form-group col-md-4">
                                      <input type="text" class="form-control" name="name" id="name" required>
                                     
                                    </div>
                                    </div>

                                    <button type="submit" class="btn btn-small btn-success"><i class="fa fa-edit"></i>Edit</button>
                                    </form>
                                </td>
                                <td>
                                  <form method="POST" action="/show_menu/ {{ $menu->id }}">
                                                @csrf

                                                @if($menu->confirmed == 1)

                                                <input checked data-toggle="toggle" name="show" type="checkbox" >
                                                @else
                                                <input  data-toggle="toggle" name="show" type="checkbox" >
                                                @endif

                                               <button type="submit" class="btn btn-small">Ok</button>
                       
                                     </form>
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
                    <div class="card">
                     <div class="card-body">
                      
                       <form action="/create_submenu" method="POST">
                        @csrf
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Add Submenu title here</span>
                            </div>

                            <input type="text" class="form-control" name="name" placeholder="Title">

                            <button type="submit" class="btn btn-success" style="border-radius:25px;"><i class="fa fa-plus"></i></button>
                          </div> 
                        </form>

                      
                           
                      
                    
                        <table class="table  table-striped table-dark">
                          <thead>
                            <tr>
                              <th>Navigation Subitem name</th>
                              {{-- <th>Delete</th> --}}
                              <th> Edit</th>
                              {{-- <th> Show</th> --}}
                            </tr>
                          </thead>
                        <tbody>


                         @if(isset($submenus))
                          @foreach($submenus as $menu)
                            <tr>
                              <td>{{ $menu->name }}</td>
                        
                               <td>
                                  <form method="POST" action="/update_submenu/ {{ $menu->id }}">
                                        @csrf

                                      <div class="row">
                                      <div class="form-group col-md-4">
                                      <input type="text" class="form-control" name="name" id="name" required>
                                     
                                    </div>
                                    </div>

                                    <button type="submit" class="btn btn-small btn-success"><i class="fa fa-edit"></i>Edit</button>
                                    </form>
                                </td>
                      
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

                            <select class="custom-select custom-select-sm" name="layout_name">
                              <option selected>select layout </option>
                               @if(isset($layouts))                                       
                               @foreach($layouts as $layout)
                                  <option value="{{$layout->layout_name}}">{{$layout->layout_name}}</option>
                                @endforeach
                              @endif
                            </select>


                          
                        

                      

                        <label for="My Layout Name">My Layout Name</label>
                          <input type="text" class="form-control" name="choice" >
                          
                        
                        
                        
                        <button type="submit" class="btn btn primary" name="Submit" >
                          <i class="fa fa-plus"></i>
                        </button>
                      </form>

                      @if(isset($name) && ($name == "heigher commitee"))
                      <h1>heigher commitee</h1>

                     <form class="form-inline">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                        </div>

                        <div class="form-check mb-2 mr-sm-2">
                          <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                          <label class="form-check-label" for="inlineFormCheck">
                            Remember me
                          </label>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                      </form>
                      @endif
                      
                      @if(isset($layoutchoices))
                      <ul class="list-group">
                        <li class="list-group-item active">Layout name You choice</li>
                        @foreach($layoutchoices as $layout)
                        <li class="list-group-item" style="color:black;">
                          {{$layout->choice}}
                          ({{$layout->name}})</li>
                          @endforeach
                      
                      </ul>
                      @endif

                      </div>
                    </div>
                           
                      
                    
                     
                    <!---Layout create ----->    
                  </div>

                  <div class="menu3" style="display: none;">
                   <div class="card">
                     <div class="card-body">
                      <form action="/" method="POST">

                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationServer01">Nav catagory</label>
                            <select class="custom-select custom-select-sm" name="menu">
                              <option selected>select nav catagory</option>
                              @if(isset($menus))
                                @foreach($menus as $menu)
                                  <option value="{{$menu->id}}">{{$menu->name}}</option>
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
                                      <input type="checkbox" class="custom-control-input" id="{{$submenu->name}}">
                                      <label class="custom-control-label" for="{{$submenu->name}}">{{$submenu->name}}</label>
                                  </div>
                           
                                    
                                  @endforeach
                                @endif
                                 
                                
                                
                                {{-- @if(isset($submenus))
                                  @foreach($submenus as $submenu)
                                    <input type="checkbox" value="{{$submenu->name}}">{{$submenu->name}}
                                  @endforeach
                                @endif --}}
                           
                          </div>
                        </div>
                        <input type="submit" class="btn btn primary" name="Submit" value="Send">
                      </form>

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