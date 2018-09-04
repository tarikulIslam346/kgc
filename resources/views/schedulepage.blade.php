@extends('layouts.master')

@section('content')




<section class="_r_kgc_schedule">
  <div class="container">
    <div class="row _r_kgc_schedule_search">
      <div class="col-md-6">
        <div class="_r_kgc_schedule_search_wrap">
          <p>Find a Tournament</p>
         <div class="input-group-prepend">
         {{--  <input class="form-control" type="date"/> --}}
            <input type="text" name="search"  id="text" class="form-control" placeholder="Search Customer Data" />
            <button id="search" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="_r_kgc_schedule_show_wrap"> -->
      <div class="row _r_kgc_schedule_show">
        <div class="col-md-4"><p>DATE</p></div>
        <div class="col-md-4"><p>TOURNAMENT</p></div>
        <div class="col-md-4"><p>WINNER</p></div>
      </div>
    <!-- </div> -->

    <div  id="list"style="padding-bottom:20px;padding-top:20px;">
  </div>
</section>

  <!-- <div class="container box"  style="margin-top:60px;"> -->
   
   <!-- <div class="panel panel-default"> -->
    <!-- <div class="panel-heading">Find Tournament</div> -->
    <!-- <div class="panel-body"> -->
     <!-- <div class="input-group mb-3">
       <div class="input-group-prepend">
       {{--  <input class="form-control" type="date"/> --}}
          <input type="text" name="search"  id="text" class="form-control" placeholder="Search Customer Data" />
          <button id="search" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
        </div>
     </div> -->


    <!-- <div class="row" style="margin-top:60px;">
      <div class="container">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div> -->

    <!-- <div  id="list"style="border-bottom:2px solid; padding-bottom:20px;padding-top:20px;">

    </div>
     {{-- <h3 style='color:#03a9f4;'>Full schedule</h3>

        <hr style='background-color:lightgreen'>
 --}} -->


    <!-- </div>     -->
   <!-- </div> -->
  <!-- </div> -->


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