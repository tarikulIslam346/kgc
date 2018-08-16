@extends('layouts.master')

@section('content')

<!--designe--> 
   @if(isset($choices))
       @foreach($choices as $choice)
        

<section id="_r_speech_form">
    <div class="container-fluid">
      @if($choice->choice == "Message")

                
                 

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
                           <textarea placeholder="Write Your Speech Here" name="description" required></textarea>
                       </div>
                   </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                      </form>
                   {{--    @endforeach --}}
                  


                  
                   </div> 
                   @endif

                     @if($choice->choice == "Image")

          

                        {{--  @if(session('success'))
                        <div class="alert alert-success">
                         {{ session('success') }}
                          </div> 
                         @endif --}}

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
                                   {{--  <input type="text" name="member_position" placeholder="Position" class="_r_input_deco"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row _r_bottom mytbody"></div>
                            <div class="_r_add_button"><i class="fa fa-plus add_row"></i></div>
                        </div>
                    </div>
                </div>



                      <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
                  
                    
                       
                      </form>








                     
                   
                   @endif
                      





    </div>
</section>
 
                
                   @endforeach
                   @endif

  



 
        

                   
       
             

<!--designe-->

@endsection


