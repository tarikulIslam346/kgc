@extends('layouts.master')

@section('content')



  <div class="container box"  style="margin-top:60px;">
   
   <div class="panel panel-default">
    <div class="panel-heading">Find Tournament</div>
    <div class="panel-body">
     <div class="input-group mb-3">
       <div class="input-group-prepend">
       {{--  <input class="form-control" type="date"/> --}}
      <input type="text" name="search"  id="text" class="form-control" placeholder="Search Customer Data" />
      <button id="search" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
    </div>
     </div>


    <div class="row" style="margin-top:60px;">
      <div class="col-sm" style="background-color: grey; box-shadow: 2px 2px;color:lightgreen;">
        Date
      </div>
      <div class="col-md"style="background-color: grey; box-shadow: 2px 2px;color:lightgreen;">
        Touranment
      </div>
    
      <div class="col-sm"style="background-color: grey; box-shadow: 2px 2px;color:lightgreen;">
        Winner
      </div>
    </div>

    <div  id="list"style="border-bottom:2px solid; padding-bottom:20px;padding-top:20px;">

    </div>
     {{-- <h3 style='color:#03a9f4;'>Full schedule</h3>

        <hr style='background-color:lightgreen'>
 --}}


    </div>    
   </div>
  </div>


<script>
$(document).ready(function(){
 fetch_customer_data();
 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"/schedule_search",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#list').html(data.table_data);
    // $('#total_records').text(data.total_data);
   }
  })
 }
 $(document).on('click', '#search', function(){
  var query = $('#text').val();
  fetch_customer_data(query);
 });
});
</script>
@include('layouts.footer')

@endsection