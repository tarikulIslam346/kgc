
  <!-- Material Design for Bootstrap fonts and icons -->
  {{--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"> --}}

    <!-- Material Design for Bootstrap CSS -->
   {{--  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" > --}}


{{-- 
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" ></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" ></script>
    <script>$(document).ready(function() { $('form').bootstrapMaterialDesign(); });</script> --}}

@if(session('success'))
                    <div class="alert  alert-success fade show" role="alert">
                       {{ session('success') }} 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                          
                   @endif  



                             <nav class="navbar navbar-expand-sm _r_kgc_create_pageManu">
                              <ul class="navbar-nav">
                                 <!-- <li id="showmenu5" onclick="setStyle('showmenu5', 'menu5')">Show Schedule</li> -->
                                  <div class="col-md-3 _r_kgc_grid_se" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_shedule_1"> Create Schedule</li></div>
                                  <div class="col-md-3 _r_kgc_grid_se" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_shedule_2"> Add/Show Schedule</li></div>
                                  <div class="col-md-3 _r_kgc_grid_se" style="border-right: 2px solid #fff;"><li class="nav-item text-center" id="_r_shedule_3"> Insert Schedule Details</li></div>
                                  <div class="col-md-3 _r_kgc_grid_se"><li class="nav-item text-center" id="_r_shedule_4"> Schedule Details</li></div>
                              </ul>
                            </nav>






    <div id="_r_show_shedule_1" style="display: none;">
 
                <form method="POST" action="/schedule" enctype="multipart/form-data">
                  @csrf

   {{--                  <div class="form-group">
    <label for="exampleInputEmail1" class="bmd-label-floating">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1">
    <span class="bmd-help">We'll never share your email with anyone else.</span>
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1" class="bmd-label-floating">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div> --}}
                  
                   <div class="row">
                      <div class="col-md-6 card">
                           <div class="form-group">
                            <label for="tournament" class="bmd-label-floating"><b>Enter Tournamnet Name</b></label>
                            <input type="text" class="form-control" id="tournament" name="tournament" placeholder="Enter tournament name" required>
                          </div>
                      </div>
                      <div class="col-md-6 card" style="display:flex">
                          <div class="form-group" style="margin:auto">
                            <label for="tournament_logo"><b>Enter Tournamnet logo</b><sub>(.png file require)</sub></label>
                            <input type="file" id="tournament_logo" name="tournament_logo" placeholder="Enter tournament logo" required>
                          </div>
                      </div>
                  </div>

<hr>
                  
                  <div class="row">
                      <div class="col-md-4 card">
                          <div class="form-group">
                            <label for="winner"><b>Winner name</b></label>
                            <input type="text" class="form-control" id="winner" name="winner" placeholder="enter winner name" >
                          </div>
                      </div>
                      <div class="col-md-4 card">
                          <div class="form-group">
                            <label  for="date"><b>Start Date</b></label>
                            <input class="form-control" id="datepicker" name="start_date" placeholder="MM/DD/YYY"  type="date"required>
                          </div>
                      </div>
                      <div class="col-md-4 card">
                          <div class="form-group">
                            <label  for="closing_date"><b>Closing Date</b></label>
                            <input class="form-control" id="datepicker" name="closing_date" placeholder="MM/DD/YYY"  type="date" required>
                          </div>
                      </div>
                  </div>


                  <div class="row justify-content-md-center">
                      <div class="col-md-1">
                          <button type="submit" class="btn btn-primary  btn-large">Submit</button>
                      </div>
                  </div>

                </form>


                @if($errors->has('name'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{ $errors->first('name') }} </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                 @endif   </div>
    <div id="_r_show_shedule_2" style="display: none;">
          
  @if(session('success'))
                            <div class="alert  alert-success fade show Regular shadow" role="alert">
                               {{ session('success') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                                  
                           @endif  
<table class="table table-striped table-bordered table-hover Regular shadow">
         <thead style="background-color:#ccffd9;">
           <tr>
             <th>Tournament name</th>
             <th>Update Name</th>
              <th>Winner</th>
              <th>Update Winner Name</th>
              <th>Tournament Logo</th>
              {{-- <th>Update Prize Money</th> --}}
              <th>Schedule Deuration</th>
               <th>Delete</th>
           
           </tr>
         </thead>
       <tbody>


        @if(isset($schedules) && count($schedules)>0)
         @foreach($schedules as $schedule)
           <tr>
             <td style="border-radius:5px 5px solid black;">{{ $schedule->tournament }}</td>
             <td>
        <form method="POST" action="/update_tournament/{{ $schedule->id }}">
                                 @csrf

                     <div class="row">
                     <div class="col-md-6">
                     <input type="text" class="form-control" name="tournament" id="winner" required>

                   </div>
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                   </div>
          </form>
            </td>
            <td>{{ $schedule->winner }}</td>
             <td>
        <form method="POST" action="/update_winner/{{ $schedule->id }}">
                                 @csrf

                     <div class="row">
                     <div class="col-md-6">
                     <input type="text" class="form-control" name="winner" id="winner" required>

                   </div>
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                   </div>
          </form>
            </td>
            <td><img src="/logos/{{ $schedule->tournament_logo}}" style="width:50px;height:50px;border-radius:25px ;"/>  </td>
            {{-- <td> --}}
     {{--     <form method="POST" action="/update_prize/{{ $schedule->id }}">
                               @csrf

                 <div class="row">
                 <div class="col-md-6">
                 <input type="text" class="form-control" name="prize_money" id="prize_money" required>

               </div>
               <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
               </div>
        </form> --}}
          {{--   </td> --}}
            <td>{{ \Carbon\Carbon::parse($schedule->start_date)->format('F d ') }} - 
              {{ \Carbon\Carbon::parse($schedule->closing_date )->format('F d ')}} </td>

               <td>
                   <a href="/delete_schedule/{{ $schedule->id}}" class="btn btn-danger"><i class="fa fa-minus-square"></i>
                               </a>
                             </td>
            
           </tr>
             

              @endforeach
              @else
              <tr>
              <td colspan="7">No schedule</td>
               </tr>

               
              @endif
         </tbody>
       </table>
       {{$schedules->links()}}


         @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>{{ $errors->first('name') }} </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     @endif
    </div>



    <div id="_r_show_shedule_3" style="display: none;">
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
      <div class="col-md-2 _r_col_deco">
        <label for="My Layout Name">Select Schedule Name</label>
      </div>
      <div class="col-md-10 _r_select_deco">
        <select class="custom-select custom-select-sm" id="sc_text" name="schedule_id">
              <option selected>select Tournament </option>
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

    </div>

    <div id="_r_show_shedule_4" style="display: none;">
      <table class="table table-striped table-bordered table-hover Regular shadow">
         <thead style="background-color:#ccffd9;">
           <tr>
            <th> date</th>
             <th> Tournament  Name</th> 
             <th>fornt9</th>
             
              <th>back9</th>
           
              <th>Delete</th>

           
           </tr>
         </thead>
       <tbody>


        @if(isset($scheduleDetails) && count($scheduleDetails)>0)
         @foreach($scheduleDetails as $scheduleDetail)
           <tr>
             <td>{{ $scheduleDetail->date}}</td>
             @php
             $var = \App\Schedule::select('tournament')->where('id',$scheduleDetail->schedule_id)->first();
             @endphp
              <td>{{ $var->tournament }}</td> 

             <td><a href="/front9/{{ $scheduleDetail->front9 }}"style="color:black !important;">{{ $scheduleDetail->front9 }}</a></td>
             {{-- <td> --}}
    {{--    <form method="POST" action="/update_tournament/{{ $schedule->id }}">
                                 @csrf

                     <div class="row">
                     <div class="col-md-6">
                     <input type="text" class="form-control" name="tournament" id="winner" required>

                   </div>
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                   </div>
          </form> --}}
        {{--     </td> --}}
            <td><a href="/back9/{{ $scheduleDetail->back9 }}"style="color:black !important;">{{ $scheduleDetail->back9 }}</a></td>
             {{-- <td> --}}
    {{--    <form method="POST" action="/update_winner/{{ $schedule->id }}">
                                 @csrf

                     <div class="row">
                     <div class="col-md-6">
                     <input type="text" class="form-control" name="winner" id="winner" required>

                   </div>
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                   </div>
          </form> --}}
           {{--  </td> --}}
             <td>
                   <a href="/{{ $scheduleDetail->id}}/schedule/details" class="btn btn-danger"><i class="fa fa-minus-square"></i>
                               </a>
                             </td>
      
            
           </tr>
             

              @endforeach
              @else
              <tr><td colspan="3">No schedule details</td></tr>

               
           @endif
         </tbody>
       </table>
       {{$scheduleDetails->links()}}
    </div>

