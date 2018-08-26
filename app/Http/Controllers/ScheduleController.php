<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Schedule;
use App\ScheduleDetail;

class ScheduleController extends Controller
{
    //
    public function index(){

    	return view('schedulepage');
    }
    /***************************/

 
    /***************************/
    public function search(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Schedule::where('tournament', 'like', '%'.$query.'%')
        
         ->orderBy('id', 'desc')

         ->simplePaginate(5);
          // ->orWhere('Address', 'like', '%'.$query.'%')
         // ->orWhere('City', 'like', '%'.$query.'%')
         // ->orWhere('PostalCode', 'like', '%'.$query.'%')
         // ->orWhere('Country', 'like', '%'.$query.'%')
         
      }
      else
      {
       $data = Schedule::orderBy('id', 'desc')
       ->simplePaginate(5);
         // ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= "<div class='row'>
        <div class='col-sm'>".Carbon::parse($row->start_date)->format('F d ').'-'.Carbon::parse($row->closing_date)->format('F d ')."</div>
         <div class='col-sm' style='background-color:red;'><a href='/schedule/".$row->id."'>"
         .$row->tournament."
         </a></div>
    
         <div class='col-sm' >".$row->prize_money."</div>
         <div class='col-sm'>".$row->winner."</div></div>";
      
       }
      }
      else
      {
       $output =  "
       <div class='row'>
        <div class='col-sm'>No Data Found</div>
       </div>
       ";
      }
      $data = array(
       'table_data'  => $output,
       // 'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function delete_schedule($id){

       Schedule::destroy($id);
        return redirect('/dashboard')->with('success','Schedule  deleted succesfully');



    }

     public function details_store(){

       ScheduleDetail::create(request()->except('_token','Submit'));


       return redirect('/dashboard')->with('success','Schedule details created succesfully');
     }

    public function delete_schedule_details($id){
     
     ScheduleDetail::destroy($id);

          return redirect('/dashboard')->with('success','Schedule details deleted succesfully');

    }
     public function show_details( $id){

         $scheduleDetails =  ScheduleDetail::where('schedule_id',$id)->get();
         $schedulename =  Schedule::where('id',$id)->get();

         return view('scheduleDetailpage',compact('scheduleDetails','schedulename'));


     }



}
