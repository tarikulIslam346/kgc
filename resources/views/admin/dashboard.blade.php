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

                      
                           
                      
                    
                        <table class="table table-dark">
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

                                                <input checked data-toggle="toggle" name="show" type="checkbox" >
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

                      
                           
                      
                    
                        <table class="table table-dark">
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
                            {{--   <td>
                                <a href="/delete_menu/{{ $menu->id }}" class="btn btn-primary"><i class="fa fa-minus-square"></i>
                                </a>
                              </td> --}}
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
                                {{-- <td>
                                  <form method="POST" action="/show_menu/ {{ $menu->id }}">
                                                @csrf

                                                <input checked data-toggle="toggle" name="show" type="checkbox" >
                                               <button type="submit" class="btn btn-small">Ok</button>
                       
                                     </form>
                                </td> --}}
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
                   <p>3 Div</p>
                  </div>

                  <div class="menu3" style="display: none;">
                   <p>4 Div</p>
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