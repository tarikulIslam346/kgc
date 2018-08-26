@extends('layouts.master')

@section('content')

 @if(isset($schedulename))
         @foreach($schedulename as $schedule)


 				<h3>{{$schedule->tournament}}</h3>
              @endforeach

               
           @endif
      <hr>


<table class="table table-striped table-dark">
         <thead>
           <tr>
             <th>Pos</th>
             {{-- <th>Update Pos</th> --}}
              <th>Name</th>
             {{--  <th>Update Winner Name</th> --}}
              <th>To PAR</th>
              <th>HOLE</th>

              <th>TODAY</th>
              <th>R1</th>
              <th>R2</th>
              <th>R3</th>
              <th>R4</th>
              <th>Total</th>
              <th>Earnings</th>
              <th>HFH RANKING</th>
             

           
           </tr>
         </thead>
       <tbody>


        @if(isset($scheduleDetails))
         @foreach($scheduleDetails as $scheduleDetail)
           <tr>
             <td>{{ $scheduleDetail->pos }}</td>
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
            <td>{{ $scheduleDetail->name}}</td>
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
            <td>{{ $scheduleDetail->to_par}}  </td>
            {{-- <td> --}}
 {{--        	<form method="POST" action="/update_prize/{{ $schedule->id }}">
		                           @csrf

                 <div class="row">
                 <div class="col-md-6">
                 <input type="text" class="form-control" name="prize_money" id="prize_money" required>

               </div>
               <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
               </div>
		    </form> --}}
           {{--  </td> --}}
             <td>{{ $scheduleDetail->hole }}  </td>
              <td>{{ $scheduleDetail->today }}  </td>
            <td>{{ $scheduleDetail->r1 }}  </td>
             <td>{{ $scheduleDetail->r2 }}  </td>
             <td>{{ $scheduleDetail->r3 }}  </td>
              <td>{{ $scheduleDetail->r4 }}  </td>
              <td>{{$scheduleDetail->r1 +$scheduleDetail->r2+$scheduleDetail->r3+$scheduleDetail->r4}}</td>
              <td>{{ $scheduleDetail->earnings }}  </td>
              @if($scheduleDetail->hfh_ranking == null || $scheduleDetail->hfh_ranking == 0)
              <td> ----- </td>
              @else <td> {{ $scheduleDetail->hfh_ranking }} </td>
              @endif
              
            
            
           </tr>
             

              @endforeach

               
           @endif
         </tbody>
       </table>


@endsection