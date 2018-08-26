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
<form method="POST" action="/schedule_details">
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

    <label for="pos">Enter Position</label>

    <input type="text" class="form-control" id="pos" name="pos" placeholder="Enter position" >

  </div>

  <div class="form-group">

    <label for="name">Enter winner name</label>

    <input type="text" class="form-control" id="name" name="name" placeholder="enter name" 
    >

  </div>

  <div class="form-row">
    <div class="col">

  

    <label for="to_par">To PAR</label>

    <input type="text" class="form-control" id="to_par" name="to_par" placeholder="enter to_par" >

  </div>

<div class="col">
  

  <label  for="hole">Hole Count</label>
 

    <input class="form-control" id="hole" name="hole" placeholder="hole no"  type="text">

          
  </div>
  <div class="col">

  <label  for="today">Today</label>
 

    <input class="form-control" id="today" name="today" placeholder="today"  type="text" >

          
  </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="r1">R1</label>
      <input type="number" class="form-control" placeholder="0" name="r1"  id="r1">
    </div>
    <div class="col">
      <label for="r2">R2</label>
      <input type="number" class="form-control" placeholder="0" name="r2"  id="r2">

    </div>
    <div class="col">
      <label for="r3">R3</label>
      <input type="number" class="form-control" placeholder="0" name="r3"  id="r2">

    </div>
    <div class="col">
      <label for="r4">R4</label>
      <input type="number" class="form-control" placeholder="0" name="r4"  id="r2">

    </div>
  </div>
  <div class="form-row">
{{--     <div class="col">
      <label for="total">Total</label>
      <input type="number" class="form-control" placeholder="100" name="total"  id="total">
    </div> --}}
    <div class="col">
      <label for="earnings">Earnings</label>
      <input type="text" class="form-control" placeholder="$" name="earnings"  id="earnings">

    </div>
    <div class="col">
      <label for="hfh_ranking">HFH RANK</label>
      <input type="number" class="form-control" placeholder="0" name="hfh_ranking"  id="hfh_ranking">

    </div>

  </div><br>
   
   



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