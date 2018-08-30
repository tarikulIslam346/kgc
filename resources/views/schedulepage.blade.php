@extends('layouts.master')

@section('content')


  <div class="container box">
   
   <div class="panel panel-default">
    <div class="panel-heading">Find Tournament</div>
    <div class="panel-body">
     <div class="input-group mb-3">
       <div class="input-group-prepend">
        <input class="form-control" type="date"/>
      <input type="text" name="search"  id="text" class="form-control" placeholder="Search Customer Data" />
      <button id="search" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
    </div>
     </div>

    {{--  <div class="table-responsive"> --}}
      {{-- <h3 align="center">Total Data : <span id="total_records"></span></h3> --}}
{{--       <table class="table table-striped table-bordered" style="border:none;">
       <thead>
        <tr>
         <th>Date</th>
         <th>Touranment</th>
         <th>Prize Money</th>
         <th>Winner</th>
        
        </tr>
       </thead>
       <tbody>
       </tbody>
      </table> --}}
    {{--  </div> --}}
    <div class="row">
      <div class="col-sm">
        Date
      </div>
      <div class="col-md">
        Touranment
      </div>
    
      <div class="col-sm">
        Winner
      </div>
    </div>
    <div  id="list">
    </div>



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