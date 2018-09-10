<nav class="navbar navbar-expand-sm _r_kgc_create_pageManu">
                              <ul class="navbar-nav">
                                  <div class="col-md-4 _r_kgc_gallery" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_gallery_1"> Create Share Button</li></div>
                                  <div class="col-md-4 _r_kgc_gallery" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_gallery_2"> Create Image Gallery</li></div>
                                  <div class="col-md-4 _r_kgc_gallery" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_gallery_3"> Create Video Gallery</li></div>
                              </ul>
                            </nav>



                      


<div id="_r_gallery_body_1" style="display: none;">

                           @if(session('btn_success'))
                            <div class="alert  alert-success fade show Regular shadow" role="alert">
                               {{ session('btn_success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif


                       @if(session('btn_delete'))
                            <div class="alert  alert-danger fade show Regular shadow" role="alert">
                               {{ session('btn_delete') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif

                            @include('layouts.errors')


   <div class="container">



      <div class="row">



        <div class="col-md-12 _r_dynamic_button_back">

          <form method="POST" action="/create_button">
            @csrf
          <table class="table table-responsive table-bordered" style="border:none">
          <tr class="mybutton"></tr>

          <tr style="border: none">
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="2" style="border: none; text-align: center">

            <button type="button" class="add_button btn btn-primary" ><i class="fa fa-plus-square" style="font-size: 14px"></i>
            </button>
            <button type="submit" class="btn btn-secondary btn-large">Submit</button>
           </td>
          </tr>
         </table>

       </form>



        </div>

        <table class="table table-striped table-bordered table-hover Regular shadow">

         <thead style="background-color:#ccffd9;">

                           <tr>
                             <th>Button name</th>
                             <th>Button Link</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                            {{--  <th>Edit</th> --}}

                            

                             <th>Delete</th>
                             
                            
                           </tr>
                         </thead>
                       <tbody>
                          @if(isset($galary_btn ))
                         @foreach($galary_btn as $g_b)
                        <tr>
                            <td>{{ $g_b->button_name }}</td>

                             <td>{{ $g_b->button_link}}</td>

                            <td><a href="/delete_galary_btn/{{ $g_b->id }}" class="btn btn-danger" ><i class="fa fa-minus-square"></i></td>
                        </tr>
                         @endforeach
                         @endif

                         </tbody>
                        
                      </table>

{{ $galary_btn->links() }}

      </div>
    </div>
</div>

<div id="_r_gallery_body_2" style="display: none;">
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
                                        <!-- <button type="button" class="btn btn-primary float-right _r_add_button" style="margin-top:10px"><i class="fa fa-plus add_gallery"></i></button> -->
                                        <button type="button" class=" btn btn-primary float-right add_gallery" ><i class="fa fa-plus-square" style="font-size: 14px"></i></button>
                                        <!-- <div class="_r_add_button float-right"><i class="fa fa-plus add_gallery" style="background-color: red; width: 200px;height: 22px"></i></div> -->
                                      </div>
                                      <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary float-left">Submit</button>
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
                      

</div>

<div id="_r_gallery_body_3" style="display: none;">
  
                             @if(session('vedio_success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('vedio_success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @endif
                            @if(session('vedio_delete'))
                            <div class="alert  alert-danger fade show " role="alert">
                               {{ session('vedio_delete') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @endif

        <div class="container">

            <div class="row">

                <div class="col-md-12 _r_dynamic_video_back">



          <form method="POST" action="/create_vedio">
            @csrf
                    <table class="table table-responsive table-bordered" style="border:none">

                        <tr class="myvideo"></tr>

                        <tr style="border: none">

                            <td style="border:none"></td>

                           <td colspan="2" style="border: none; text-align: center">

                            <button type="button" class="add_video btn btn-primary" ><i class="fa fa-plus-square" style="font-size: 14px"></i></button>
                          

                             <button type="submit" class="btn btn-secondary" >Add Vedio</button>

                          </td>

                    

                        </tr>

                      </table>
                  </form>


                       <table class="table table-striped table-bordered table-hover Regular shadow">

                            <thead style="background-color:#ccffd9;">

                           <tr>
                             
                             <th>Vedio Link</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                            {{--  <th>Edit</th> --}}

                            

                             <th>Delete</th>
                             
                            
                           </tr>
                         </thead>
                       <tbody>
                          @if(isset($galary_vedio))
                         @foreach($galary_vedio as $g_v)
                        <tr>
                            

                             <td>{{ $g_v->link}}</td>

                            <td><a href="/delete_galary_vedio/{{ $g_v->id }}" class="btn btn-danger" ><i class="fa fa-minus-square"></i></a></td>
                        </tr>

                         @endforeach
                         @endif


                      
                         </tbody>
                         </table>
                        {{--  {{ $galary_vedio->links() }} --}}
                        

                </div>
            </div>
        </div>

</div>