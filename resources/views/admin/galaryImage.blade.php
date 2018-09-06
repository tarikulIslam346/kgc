        @if(session('img_success'))
                            <div class="alert  alert-success fade show " role="alert">
                               {{ session('img_success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif
                 @if(session('delete_img'))
                            <div class="alert  alert-danger fade show " role="alert">
                               {{ session('delete_img') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif
    <form action="/create_image" method="POST" enctype="multipart/form-data">

                      @csrf

            <div class="container-fluid">
                            <div class="row" id="_r_committee_member">
                                <div class="col-md-9 _r_section_body_right">
                                    <h1 class="text-center" style="padding-bottom: 30px">Tournament Gallery Image</h1>
                                    {{-- <div class="row justify-content-md-center">
                                        <div class="col-md-4 _r_top">
                                            <div class="_r_wrap_col">
                                                <div class="_r_committee_member upload-icon">
                                                <img id="multiImageId">
                                            </div>
                                            <label> Insert Image
                                                <input type="file" name="filename[]" id="multi-file-input">
                                            </label>
                                            <input type="text" name="name[]" placeholder="Name" class="_r_input_deco">
                                            <input type="text" name="title[]" placeholder="Position" class="_r_input_deco">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row _r_bottom myGallery"></div>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="_r_add_button float-right"><i class="fa fa-plus add_gallery" style="background-color: red; width: 200px"></i></div>
                                      </div>
                                      <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary float-left" style="margin-top:10px">Submit</button>
                                      </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                  
                    
                       
                      </form>
                      @include("layouts.errors")


                         <table class="table table-striped table-bordered table-hover Regular shadow">

         <thead style="background-color:#ccffd9;">

                           <tr>
                             <th>Image</th>
                             <th>Button Link</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                            {{--  <th>Edit</th> --}}

                            

                             <th>Delete</th>
                             
                            
                           </tr>
                         </thead>
                       <tbody>
                          @if(isset($galary_img ))
                         @foreach($galary_img as $g_img)
                        <tr>
                            <td>{{ $g_img->img_url}}</td>

                             <td><img src="/galleryimages/{{ $g_img->img_url}}" style="width:50px;height:50px;"></td>

                            <td><a href="/delete_galary_img/{{ $g_img->id }}" class="btn btn-danger" ><i class="fa fa-minus-square"></i></td>
                        </tr>
                         @endforeach
                         @endif


                      
                         </tbody>
                           {{$galary_img->links()}}
                        
                      </table>
                      
