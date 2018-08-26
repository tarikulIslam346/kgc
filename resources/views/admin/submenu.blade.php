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

                          @if($errors->has('name'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <p>{{ $errors->first('name') }} </p>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                           @endif
                       <table class="table table-striped table-dark">
                         <thead>
                           <tr>
                             <th>Navigation Subitem name</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                             <th>Edit Navigation Subitem name</th>

                            

                             <th>Delete</th>
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

                            <td>
                               <a href="/delete_submenu/{{ $submenu->id  }}" class="btn btn-danger"><i class="fa fa-minus-square"></i>
                               </a>
                             </td>
                                @php
                                  $var =  \App\LayoutChoice::select('choice')
                                            ->where('submenu_id',$submenu->id )->get();
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