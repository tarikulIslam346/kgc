
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
<section>

        <div class="container">

            <div class="row">

                <div class="col-md-12 _r_dynamic_video_back">

                    <h2 class="tect-center">Create Video Link</h2>



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

    </section>