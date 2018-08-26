                 @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif
                <form action="/layout" method="POST">
                        @csrf

                        <div class="container-fluid">
                          <div class="row _r_submenu_style">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4 _r_col_deco">
                                <label for="My Layout Name">Select Submenu</label>
                              </div>
                              <div class="col-md-8 _r_select_deco">
                                <select class="custom-select custom-select-sm" name="submenu_id">
                                      <option selected>select layout </option>
                                      @if(isset($submenus))                                       
                                      @foreach($submenus as $sub)
                                     <option value="{{$sub->id}}">{{$sub->name}}</option>
                                  @endforeach
                                @endif
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4 _r_col_deco">
                                <label for="Layout catagory">Select Layout</label>
                              </div>
                              <div class="col-md-8 _r_select_deco">
                                <select class="custom-select custom-select-sm" name="choice">
                                  <option selected>select layout </option>
                                   @if(isset($layouts))                                       
                                   @foreach($layouts as $layout)
                                  <option value="{{$layout->layout_name}}">{{$layout->layout_name}}</option>
                                @endforeach
                              @endif
                            </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        <!-- <div class="container-fluid"> -->
                          <div class="row _r_sub_button">
                            <div class="col-md-10">
                              <button type="submit" class="btn btn-primary pull-right" name="Submit" >submit</button>
                            </div>
                          </div>
                        <!-- </div> -->


                      </form>

                        <div class="row" style="padding-top: 30px">
                        <div class="col-md-2">
                          <img src="/img/img_paragraph.png" style="width: 100%">
                          <p>Image With Text</p>
                        </div>

                        <div class="col-md-2">
                          <img src="/img/committee_layout.png" style="width: 100%">
                          <p>Committee Image</p>
                        </div>
                      </div>
                      <!-- </div> -->