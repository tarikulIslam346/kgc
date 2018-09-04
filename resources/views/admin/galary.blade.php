



<section>
  <div class="alert  alert-danger fade show Regular shadow" role="alert">
                               Add more than four buttons when insert for the first time
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
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

          <h2 class="tect-center">Create Dynamic Button</h2>

          <form method="POST" action="/create_button">
            @csrf
          <table class="table table-responsive table-bordered" style="border:none">
          <tr class="mybutton"></tr>

          <tr style="border: none">
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td colspan="2" style="border: none; text-align: center">

            <button type="button" class="add_button btn btn-primary" ><i class="fa fa-plus-square" style="font-size: 14px"></i>Increament
            </button>
            <button type="submit" class="btn btn-secondary btn-large">Add Button</button>
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




  </section>