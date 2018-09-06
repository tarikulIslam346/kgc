                          @if(session('home_btn_success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('home_btn_success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif
   <div class="container">



      <div class="row">



        <div class="col-md-12 _r_dynamic_button_back">

          <h2 class="tect-center">Create Home Page Service Button</h2>
          <hr>

          <form method="POST" action="/create_home_button">
            @csrf
          <table class="table table-responsive table-bordered" style="border:none">
          <tr class="myHomebutton"></tr>

          <tr style="border: none">
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="2" style="border: none; text-align: center">

            <button type="button" class="add_home_button btn btn-primary" ><i class="fa fa-plus-square" style="font-size: 14px"></i>Increament
            </button>
            <button type="submit" class="btn btn-secondary btn-large">Add Button</button>
           </td>
          </tr>
         </table>

       </form>
       @include("layouts.errors")

       <hr>
                        <table class="table table-striped table-bordered table-hover Regular shadow">
         <thead style="background-color:#ccffd9;">
                           <tr>
                             <th>Home Button name</th>

                              <th>Home Button link</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                            {{--  <th>Edit</th> --}}

                            

                             <th>Delete</th>
                             
                            
                           </tr>
                         </thead>
                       <tbody>
                          @if(isset($home_buttons))
                         @foreach($home_buttons as $home_button)
                        <tr>
                          <td>{{ $home_button->home_button_name }}</td>
                            <td>{{ $home_button->home_button_link }}</td>
                            <td><a href="/delete_home_button/{{ $home_button->id }}" class="btn btn-danger"><i class="fa fa-minus-square"></i></td>
                        </tr>
                         @endforeach
                         @endif
                      
                         </tbody>
                        
                      </table>
                      {{$home_buttons->links()}}



        </div>
      </div>
    </div>