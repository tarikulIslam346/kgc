                @if(session('error'))
                            <div class="alert  alert-danger fade show" role="alert">
                               {{ session('error') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                           @endif

                <form action="/nav" method="POST">
                        @csrf

                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationServer01">Nav catagory</label>
                            <select class="custom-select custom-select-sm" name="menu" required>
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
                                    @if($submenu->menu_id == null)
                                      <input type="checkbox" class="custom-control-input" 
                                      id="{{$submenu->name}}" name="submenulist[]" 
                                      value="{{$submenu->id}}">
                                      <label class="custom-control-label" for="{{$submenu->name}}">{{$submenu->name}}</label>
                                      @endif
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

                      



                   <table class="table table-striped table-bordered table-hover Regular shadow">
         <thead style="background-color:#ccffd9;">
                            <tr>
                              <th>Navigation Item</th>
                              
                              <th> Navigation subitem</th>
                            </tr>
                          </thead>
                        <tbody>
                          @if(isset($menus))
                           @foreach($menus as $m)
                            <tr>
                             

                              <td>{{ $m->name}}</td>

                        {{--  @if(isset($nav)) --}}
                        <td>
                          @foreach($m->submenus as $submenu)
                            

                              
                              
                               
                                {{-- @for($i=0;$i<count( $n->submenulist);$i++) --}}
                                 <i class="fa fa-th"></i> {{$submenu->name}} 
                              {{--     @endfor --}}
                                 
                              
                              
                              
                           
                            @endforeach
                              </td>
                           
                               </tr>
                                  @endforeach
                            @endif
                          </tbody>
</table>