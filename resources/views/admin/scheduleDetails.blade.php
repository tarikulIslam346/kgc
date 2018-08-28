        @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif  

    <h2>Insert Schedule details</h2> 
    <hr>
 

{{-- @foreach($schedules as $schedule)   --}}      
<form method="POST" action="/schedule_details" enctype="multipart/form-data">
  @csrf


      <div class="row">
      <div class="col-md-4 _r_col_deco">
        <label for="My Layout Name">Select Schedule Name</label>
      </div>
      <div class="col-md-8 _r_select_deco">
        <select class="custom-select custom-select-sm" name="schedule_id">
              <option selected>select layout </option>
              @if(isset($schedules))                                       
              @foreach($schedules as $schedule)
             <option value="{{$schedule->id}}">{{$schedule->tournament}}</option>
          @endforeach
        @endif
        </select>
      </div>
    </div>

  <div class="form-group">

    <label for="front9">Enter front9 file(.pdf file)</label>

    <input type="file" id="front9" name="front9" placeholder="Enter position" >

  </div>
  <div class="form-group">

    <label for="back9">Enter front9 file(.pdf file)</label>

    <input type="file" id="back9" name="back9" placeholder="Enter position" >

  </div>



  <button type="submit" class="btn btn-primary  btn-large">Submit</button>

</form>


  {{--   @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $errors->first('name') }} </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     @endif --}}