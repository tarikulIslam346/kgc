                                               @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif

                            <nav class="navbar navbar-expand-sm bg-primary" style="margin-bottom:20px;padding: 10px;">
                              <ul class="navbar-nav" style="width: 100%">
                                <!-- <div class="row"> -->
                                  <div class="col-md-3" style="border-right: 2px solid;"><li class="nav-item text-center" id="_r_navbar_1"> Show Nav Table</li></div>
                                  <div class="col-md-3" style="border-right: 2px solid;"><li class="nav-item text-center" id="_r_navbar_2"> Add/Edit Nav Name</li></div>
                                  <div class="col-md-3" style="border-right: 2px solid;"><li class="nav-item text-center" id="_r_navbar_3"> Add/Edit Nav Image</li></div>
                                  <div class="col-md-3"><li class="nav-item text-center" id="_r_navbar_4"> Add/Edit Nav Content</li></div>
                                <!-- </div> -->
                              </ul>
                            </nav>

                        <table class="table table-striped table-bordered table-hover Regular shadow" id="_r_show_nav_1" style="display: none;">
                          
                        <thead style="background-color:#ccffd9;">
                        
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
                           <input type="text" class="form-control" name="name" placeholder="Title" required>
                           <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                         </div>
                          @include('layouts.errors')
                       </form>



                        <table class="table table-striped table-bordered table-hover Regular shadow">
         <thead style="background-color:#ccffd9;">
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

                        <form   method="POST" action="/add_menu_img"  enctype="multipart/form-data">
                          @csrf
                           {{-- <div class="file-field">
                              <div class="btn btn-primary btn-sm float-left">
                                  <span>Choose file</span>
                                  <input type="file" name="menu_img">
                              </div>
                              <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload your file">
                              </div>
                          </div> --}}
                        {{--    <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"  name="menu_img">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                            </div> --}}
                          <div class="form-group">
                          <label for="menu_img">Select New Image</h5>
                          <input type="file" name="menu_img">
                          </div>
                      

                        <div class="row">
                          <div class="col-md-12">
                            <h5>Select Menu for Edit Image</h5>
                            <select  class="form-control"   name="menu_id">
                                  
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

                          @include('layouts.errors')






                       </div>

                       <div id="_r_show_nav_4" style="display: none;">
                         <form   method="POST" action="/add_description" >
                          @csrf
                           
                          <div class="form-group">
                          <label for="menu_details">Select New Image</h5>
                          <<textarea placeholder="Write Your Speech Here" id="menu_text"  class="form-control"  name="menu_details"></textarea>
                          </div>
                      

                        <div class="row">
                          <div class="col-md-12">
                            <h5>Select Menu for Insert Description</h5>
                            <select  class="form-control"   name="menu_id">
                                  
                                  <option selected>select menu </option>
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

                          @include('layouts.errors')





                       </div>



                          
        <script>
            tinymce.init({ 
                selector:'#menu_text'
  
              
            });
        </script>