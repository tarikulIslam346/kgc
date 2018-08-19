     

          @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif  

    <h2>Create Schedule</h2> 
    <hr>
 

        
<form method="POST" action="/schedule">
  @csrf

  <div class="form-group">

    <label for="tournament">Enter Tournamnet Name</label>

    <input type="text" class="form-control" id="tournament" name="tournamnet" placeholder="Enter tournament name" required>

  </div>

  <div class="form-group">

    <label for="prize_money">Prize Money(BDT)</label>

    <input type="text" class="form-control" id="prize_money" name="prize_money" placeholder="enter prize money" 
    required>

  </div>

  <div class="form-group">

    <label for="winner">Winner name</label>

    <input type="text" class="form-control" id="winner" name="winner" placeholder="enter winner name" required>

  </div>

  <div class="form-group">

  <label  for="date">Start Date</label>
 

    <input class="form-control" id="datepicker" name="start_date" placeholder="MM/DD/YYY"  type="date"required>

          
  </div>
  <div class="form-group">

  <label  for="closing_date">Closing Date</label>
 

    <input class="form-control" id="datepicker" name="closing_date" placeholder="MM/DD/YYY"  type="date" required>

          
  </div>
   
   



  <button type="submit" class="btn btn-primary  btn-large">Submit</button>

</form>


    @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $errors->first('name') }} </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     @endif













 
 

