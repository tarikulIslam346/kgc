<table class="table table-striped table-dark">
         <thead>
           <tr>
             <th>fornt9</th>
             {{-- <th>Update Pos</th> --}}
              <th>back9</th>
           
              <th>Delete</th>

           
           </tr>
         </thead>
       <tbody>


        @if(isset($scheduleDetails))
         @foreach($scheduleDetails as $scheduleDetail)
           <tr>
             <td><a href="/front9/{{ $scheduleDetail->front9 }}">File 1</a></td>
             {{-- <td> --}}
		{{-- 	 	<form method="POST" action="/update_tournament/{{ $schedule->id }}">
			                           @csrf

                     <div class="row">
                     <div class="col-md-6">
                     <input type="text" class="form-control" name="tournament" id="winner" required>

                   </div>
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                   </div>
			    </form> --}}
        {{--     </td> --}}
            <td><a href="/back9/{{ $scheduleDetail->back9 }}">File 2</a></td>
             {{-- <td> --}}
		{{-- 	 	<form method="POST" action="/update_winner/{{ $schedule->id }}">
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

               
           @endif
         </tbody>
       </table>