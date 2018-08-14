@extends('layouts.master')

@section('content')

<!--designe--> 
<section id="_r_speech_form">
    <div class="container-fluid">

                   @if(isset($choices))
                    @foreach($choices as $choice)

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
                   @endif


                    @if($choice->choice == "Image")

                  <form action="/image/{{$choice->submenu_id}}" method="POST" enctype="multipart/form-data">

                      @csrf



                   <div class="row justify-content-md-center">
                       <div class="col-md-2 _r_first_row_deco">
                          <div class="_r_committee_member upload-icon">
                               <img id="singleImageId">
                           </div>
                           <label> Insert Image
                               <input type="file" name="avatar[]" id="single-file-input">
                           </label>
                           <input type="text" name="name[]" placeholder="Name" class="_r_input_deco">
                           <input type="text" name="title[]" placeholder="Position" class="_r_input_deco">
                           
                       </div>
                   </div>
                   <div class="row justify-content-md-center">
                  
                       <div class="col-md-2 _r_first_row_deco">
                          <div class="_r_committee_member upload-icon">
                               <img id="singleImageId">
                           </div>
                           <label> Insert Image
                               <input type="file" name="avatar[]" id="single-file-input">
                           </label>
                           <input type="text" name="name[]" placeholder="Name" class="_r_input_deco">
                           <input type="text" name="title[]" placeholder="Position" class="_r_input_deco">
                           
                       </div>
                
                  
                  
                       <div class="col-md-2 _r_first_row_deco">
                          <div class="_r_committee_member upload-icon">
                               <img id="singleImageId">
                           </div>
                           <label> Insert Image
                               <input type="file" name="avatar[]" id="single-file-input">
                           </label>
                           <input type="text" name="name[]" placeholder="Name" class="_r_input_deco">
                           <input type="text" name="title[]" placeholder="Position" class="_r_input_deco">
                           
                       </div>
                    </div>
                  
                  
                    
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                      </form>
                   
                   @endif
                   @endforeach
                   @endif
                   </div> 
                      





    </div>
</section>
                   
       
             

<!--designe-->

@endsection


