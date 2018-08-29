                                               @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif

                            <nav class="navbar navbar-expand-sm bg-dark">
                              <ul class="navbar-nav" style="width: 100%">
                                <!-- <div class="row"> -->
                                  <div class="col-md-3"><li class="nav-item text-center" id="_r_navbar_1"> Show Nav Table</li></div>
                                  <div class="col-md-3"><li class="nav-item text-center" id="_r_navbar_2"> Add/Edit Nav Name</li></div>
                                  <div class="col-md-3"><li class="nav-item text-center" id="_r_navbar_3"> Add/Edit Nav Image</li></div>
                                  <div class="col-md-3"><li class="nav-item text-center" id="_r_navbar_4"> Add/Edit Nav Content</li></div>
                                <!-- </div> -->
                              </ul>
                            </nav>

                        <table class="table table-striped table-dark" id="_r_show_nav_1" style="display: none;">
                         <thead>
                           <tr>
                             <th>Navigation name</th>
                             <th>Show / Hide</th>
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
                               <a href="/delete_menu/{{ $menu->id }}" class="btn btn-danger"><i class="fa fa-minus-square"></i>
                               </a>
                             </td>
                           </tr>
                           @endforeach
                           @endif
                         </tbody>
                       </table>

                      

                       <div id="_r_show_nav_2" style="display: none;">

                        <form action="/create_menu" method="POST">
                       @csrf
                         <div class="input-group mb-3" >
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



                         <table class="table table-striped table-dark"">
                         <thead>
                           <tr>
                             <th>Navigation name</th>
                             <th>Edit Navigation Name</th>
                           </tr>
                         </thead>
                       <tbody>


                        @if(isset($menus))
                         @foreach($menus as $menu)
                           <tr>
                             <td>{{ $menu->name }}</td>
                             
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
                           </tr>
                           @endforeach
                           @endif
                         </tbody>
                       </table>
                       </div>





                       


                       <div id="_r_show_nav_3" style="display: none;">

                        <form method="POST" action="/add_menu_img"  enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                          <label for="menu_img">Select New Image</h5>
                          <input type="file" name="menu_img">
                          </div>
                      

                        <div class="row">
                          <div class="col-md-12">
                            <h5>Select Menu for Edit Image</h5>
                            <select name="menu_id">
                                  
                                  <option selected>select layout </option>
                                  @if(isset($menus))                                       
                                  @foreach($menus as $menu)
                                 <option value="{{$menu->id}}">{{$menu->name}}</option>
                                  @endforeach
                                  @endif
                            
                             
                            </select>
                          </div>
                        </div>
                          <button type="submit" class="btn btn-primary  btn-large">Submit</button>

                          </form>
                           @if($errors->has('menu_img'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <p>{{ $errors->first('menu_img') }} </p>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                           @endif



                       </div>

                       <div id="_r_show_nav_4" style="display: none;">


                       </div>