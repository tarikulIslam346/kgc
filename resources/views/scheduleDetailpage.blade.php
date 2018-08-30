@extends('layouts.master')

@section('content')

 @if(isset($schedulename))
         @foreach($schedulename as $schedule)


 				<h3>{{$schedule->tournament}}</h3>
        <img src="/logos/{{$schedule->tournament_logo}}"/> 
              @endforeach

               
           @endif
      <hr>


<table class="table table-striped table-dark">
         <thead>
           <tr>
             <th>Front9</th>
             {{-- <th>Update Pos</th> --}}
              <th>Back9</th>
 
             

           
           </tr>
         </thead>
       <tbody>


        @if(isset($scheduleDetails))
         @foreach($scheduleDetails as $scheduleDetail)
           <tr>
             <td><a href="/front9/{{ $scheduleDetail->front9 }}">File 1</a></td>
  
            <td><a href="/back9/{{ $scheduleDetail->back9 }}">File 2</a></td>
 
              
            
            
           </tr>
             

              @endforeach

               
           @endif
         </tbody>
       </table>
       @include('layouts.footer')


@endsection