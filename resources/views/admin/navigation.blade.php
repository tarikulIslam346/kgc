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
                                 
                              
                                </td>
                              
                            </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>