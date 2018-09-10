                 

                      <form action="#" method="POST">
                       @csrf
                         <div class="form-group">
                           
                               <label for="notice">Add Contact Details here</span>
                          

                           <textarea placeholder="Write Your Speech Here" id="contact_text" name="notice" class="form-control">
                             
                           </textarea>
                            </div>

                           <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button><br>
                         
                       </form>

                           @include('layouts.errors')
      
                     


        <script>
            tinymce.init({ 
                selector:'#contact_text'
  
              
            });
        </script>