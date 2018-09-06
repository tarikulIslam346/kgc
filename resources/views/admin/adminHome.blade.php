                         @if(session('content_success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('content_success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif
                   {{--       <nav class="navbar navbar-expand-sm _r_kgc_create_pageManu">
                              <ul class="navbar-nav">
                                  <div class="col-md-3 _r_kgc_grid" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_navbar_1"> Show Nav Table</li></div>
                                  <div class="col-md-3 _r_kgc_grid" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_navbar_2"> Add/Edit Nav Name</li></div>
                                  <div class="col-md-3 _r_kgc_grid" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_navbar_3"> Add/Edit Nav Image</li></div>
                                  <div class="col-md-3 _r_kgc_grid"><li class="nav-item text-center" id="_r_navbar_4"> Add/Edit Nav Content</li></div>
                              </ul>
                            </nav> --}}
                       
  <form action="/change_online_service" method="POST">
                       @csrf
                         <div class="form-group">
                           
                               <label for="notice">Add Online Service Details</span>
                          

                           <textarea placeholder="Write Your Speech Here" id="home_online_text" name="home_online_text" class="form-control">
                             
                           </textarea>
                            </div>

                           <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button><br>
                         
                       </form>
                       @include('layouts.errors')


                          <table class="table table-striped table-bordered table-hover Regular shadow">

         <thead style="background-color:#ccffd9;">

                           <tr>
                             <th>Online Service</th>
            
                            

                             <th>Delete</th>
                             
                            
                           </tr>
                         </thead>
                       <tbody>
                          @if(isset($online_content ))
                         @foreach($online_content as $oc)
                        <tr>
                            <td>{!! $oc->home_online_text  !!}</td>

                             

                            <td><a href="/delete_online_content/{{ $oc->id }}" class="btn btn-danger" ><i class="fa fa-minus-square"></i></a></td>
                        </tr>
                         @endforeach
                         @endif


                      
                         </tbody>
                        
                      </table>



        <script>
            tinymce.init({ 
                selector:'#home_online_text',
   
                 visual: false,
                  browser_spellcheck: true,
                  toolbar: 'undo redo | styleselect | bold italic | link image | fontsizeselect |blockquote',
                    
  fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt'

                
  
              
            });
        </script>
