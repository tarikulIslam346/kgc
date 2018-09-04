      
      
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
     {{--    	<form method="POST" action="/update_prize/{{ $schedule->id }}">
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
