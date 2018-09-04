        @if(session('success'))
                            <div class="alert  alert-success fade show" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif  

                           @include('layouts.errors')

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
        <select class="custom-select custom-select-sm" id="sc_text" name="schedule_id">
              <option selected>select layout </option>
              @if(isset($schedules))                                       
              @foreach($schedules as $schedule)
             <option value="{{$schedule->id}}">{{$schedule->tournament}}</option>
          @endforeach
        @endif
        </select>
      </div>
    </div>

 {{-- <div class="form-group">

    <label for="front9">Enter front9 file(.pdf file)</label>

    <input type="file" id="front9" name="front9" placeholder="Enter position" >

  </div>
  <div class="form-group">

    <label for="back9">Enter front9 file(.pdf file)</label>

    <input type="file" id="back9" name="back9" placeholder="Enter position" >

  </div>



  <button type="submit" class="btn btn-primary  btn-large">Submit</button> --}}
     <div  id="list"style="padding-bottom:20px;padding-top:20px;">

    </div>

  <table class="table table-responsive table-bordered" style="border:none">

        <tr>

            <th class="text-center">Date</th>

            <th class="text-center">Front 9</th>

            <th class="text-center">Back 9</th>

            <th class="text-center">Remove</th>

        </tr>

        <tr class="mytbody">

            

        </tr>

        <tr style="border: none">

            <td style="border: none"></td>

            <td style="border: none"></td>

             <td style="border: none; text-align: center">

                <button type="button" class="add_schedule" style="width: 100%;background-color: green;border: none;color: #fff; line-height: 35px"><i class="fa fa-plus-square" style="font-size: 28px"></i></button>

            </td>

            <td style="border: none" class="tbl-width-show">

                <button style="width: 100%;background-color: green;border: none;color: #fff; line-height: 35px">Submit</button>

            </td>



        </tr>

    </table>

</form>


  {{--   @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $errors->first('name') }} </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     @endif --}}
     @include('layouts.errors');

<script>
 // $(document).ready(function(){

 $(document).on('change','#sc_text',function(){


   var id = $(this).val();

    //console.log('/schedule_date_range/'+id);

     $.get( '/schedule_date_range/' + id,  function (data) {

        console.log(data);
        $('#list').append("Starting date :  &nbsp;"+data.start_date+"  &nbsp; Closing date :  "+data.closing_date);


     });
 });
//});
</script>
