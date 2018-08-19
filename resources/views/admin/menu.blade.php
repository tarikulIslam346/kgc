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