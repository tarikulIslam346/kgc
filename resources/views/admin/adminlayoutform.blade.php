@extends('layouts.master')

@section('content')

<!--designe--> 
   @if(isset($choices))
       @foreach($choices as $choice)
        

<section id="_r_speech_form">
    <div class="container-fluid">
      @if($choice->choice == "Message")

          @if(session('status'))
                        <div class="alert alert-success">
                         {{ session('status') }} Message Upload
                          </div> 
                         @endif

                
                 

                  <form action="/heigher/{{$choice->submenu_id}}" method="POST" enctype="multipart/form-data">

                      @csrf



                   <div class="row justify-content-md-center">
                       <div class="col-md-2 _r_first_row_deco">
                          <div class="_r_committee_member upload-icon">
                               <img id="singleImageId">
                           </div>
                           <label> Insert Image
                               <input type="file" name="avatar" id="single-file-input" required>
                           </label>
                           <input type="text" name="name" placeholder="Name" class="_r_input_deco" required>
                           <input type="text" name="title" placeholder="Position" class="_r_input_deco" required>
                       </div>
                   </div>
                   <div class="row justify-content-md-center">
                       <div class="col-md-10">
                            <textarea placeholder="Write Your Speech Here" id="message_text" name="description"></textarea>
                       </div>
                   </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                      </form>
                      
                  


                  
                   </div> 
                   @endif

                     @if($choice->choice == "Image")

          

                        @if(session('status'))
                        <div class="alert alert-success">
                         {{ session('status') }}
                          </div> 
                         @endif

                  <form action="/image/{{$choice->submenu_id}}" method="POST" enctype="multipart/form-data">

                      @csrf

            <div class="container-fluid">
                            <div class="row" id="_r_committee_member">
                                <div class="col-md-9 _r_section_body_right">
                                    <h1 class="text-center" style="padding-bottom: 30px">Committee Members Image</h1>
                                    <div class="row justify-content-md-center">
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
                                    </div>
                                    <div class="row _r_bottom mytbody"></div>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="_r_add_button float-right"><i class="fa fa-plus add_row"></i></div>
                                      </div>
                                      <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary float-left" style="margin-top:10px">Submit</button>
                                      </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                  
                    
                       
                      </form>








                     
                   
                   @endif
                    @if($choice->choice == "Text")

                    @if(session('status'))
                        <div class="alert alert-success">
                         {{ session('status') }}
                          </div> 
                         @endif

                
                 

                  <form action="/text/{{$choice->submenu_id}}" method="POST">

                      @csrf



             
                   <div class="row justify-content-md-center">
                       <div class="col-md-10">
                            <textarea placeholder="Write Your Speech Here" id="message_text" name="details"></textarea>
                       </div>
                   </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                      </form>
                   {{--    @endforeach --}}
                  


                  
                   </div> 
                   @endif
                      

<a href ="/dashboard" class="btn btn-primary">Go back</a>



    </div>
    
</section>
 
                
                   @endforeach
                   @endif

                


               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <p> {{ $error }}</p>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                       
                @endforeach
                   
               @endif



                                 
            <script>
            tinymce.init({ 
                selector:'#message_text',
                  body_class: 'my_class',
                 theme: 'modern',
                    width: 600,
                    height: 300,
                    plugins: [
                      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                      'save table contextmenu directionality emoticons template paste textcolor'
                    ],
                    content_css: 'css/content.css',
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  
               
              
            });
        </script>

  



 
        

                   
       
             

<!--designe-->

@endsection


