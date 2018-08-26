                      @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif

                      <form action="/create_notice" method="POST">
                       @csrf
                         <div class="form-group">
                           
                               <label for="notice">Add Notice here</span>
                          

                           <textarea placeholder="Write Your Speech Here" id="notice_text" name="notice" class="form-control">
                             
                           </textarea>
                            </div>

                           <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button><br>
                         
                       </form>

                          @if($errors->has('name'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <p>{{ $errors->first('name') }} </p>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                           @endif
                       <table class="table table-striped table-dark">
                         <thead>
                           <tr>
                             <th>Notice</th>

                             <!-- {{-- <th>Delete</th> --}} -->
                            {{--  <th>Edit</th> --}}

                            

                             <th>Delete</th>
                             
                            
                           </tr>
                         </thead>
                       <tbody>
                          @if(isset($notices))
                         @foreach($notices as $notice)
                        <tr>
                            <td>{!! $notice->notice !!}</td>
                            <td><a href="/delete_notice/{{ $notice->id }}" class="btn btn-danger"><i class="fa fa-minus-square"></i></td>
                        </tr>
                         @endforeach
                         @endif
                      
                         </tbody>
                        
                      </table>


        <script>
            tinymce.init({ 
                selector:'#notice_text'
  
              
            });
        </script>