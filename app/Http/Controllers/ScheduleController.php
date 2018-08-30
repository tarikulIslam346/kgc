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
        
         ->orderBy('start_date', 'desc')

         ->simplePaginate(5);
          // ->orWhere('Address', 'like', '%'.$query.'%')
         // ->orWhere('City', 'like', '%'.$query.'%')
         // ->orWhere('PostalCode', 'like', '%'.$query.'%')
         // ->orWhere('Country', 'like', '%'.$query.'%')
         
      }
      else
      {
       $data = Schedule::orderBy('start_date', 'desc')
       ->simplePaginate(5);
         // ->get();
      }

      $total_row = $data->count();
      $count = 0;
      $count2 = 0;

      if($total_row > 0)
      {
       foreach($data as $row)
       {
        if($row->start_date > date("Y-m-d")){
          if($count==0){

          $count++;

        $output .= "
        <h3 style='color:#03a9f4;'>Upcomming</h3>

        <hr style='background-color:lightgreen'>";
          }

         $output .= "
     

        <div class='row'>


        <div class='col-sm'>"

        .Carbon::parse($row->start_date)->format('F d ').'-'.Carbon::parse($row->closing_date)->format('F d ')."

        </div>

         <div class='col-md'>

         <img src='/logos/".$row->tournament_logo."

         'style='height:25px;width:25px;'><a href='/schedule/".$row->id."' style='color:#03a9f4 !important;'>"

         .$row->tournament."

         </a></div>

         <div class='col-sm'>".$row->winner."</div></div><hr>
        
         ";

         

       }else{
           if($count2==0){
               $output .= "
                <h3 style='color:#03a9f4;'>Full schedule</h3>

        <hr style='background-color:lightgreen'>";
        $count2++;
               
           }

         $output .= "


        <div class='row'>

        <div class='col-sm'>"

        .Carbon::parse($row->start_date)->format('F d ').'-'.Carbon::parse($row->closing_date)->format('F d ')."

        </div>

         <div class='col-md'>

         <img src='/logos/".$row->tournament_logo."

         'style='height:25px;width:25px;'><a href='/schedule/".$row->id."' style='color:#03a9f4 !important;'>"

         .$row->tournament."

         </a></div>

         <div class='col-sm'>".$row->winner."</div></div><hr>";

       }
      
       }
      }
      else
      {
       $output =  "
       <div class='row'>

        <div class='col-sm' style='color:#03a9f4; font-size:15px;'>

        No Tournament Schedule  found
        </div>
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


          $this->validate(request(),[

      

        'front9' => 'required',
                
        'front9.*' => 'file|max:2048',

        'back9' => 'required',
                
        'back9.*' => 'file|max:2048',





      ]);
  
        $file_front9 = '' ;
        
        if(request()->hasfile('front9'))
         {

           
         
              $file_front9 = request()->file('front9')->getClientOriginalName();
               request()->file('front9')->move(public_path().'/front9/', $file_front9);  
                
               
           
         }
          // dd($file_front9 );
        $file_back9 = '' ;
        
        if(request()->hasfile('back9'))
         {

           
         
              $file_back9 = request()->file('back9')->getClientOriginalName();
               request()->file('back9')->move(public_path().'/back9/', $file_back9);  
                
               
           
         }

      ScheduleDetail::create([

        
        'front9' => $file_front9,
        'back9' => $file_back9,
        'schedule_id' => request('schedule_id')


      ]);

       // ScheduleDetail::create(request()->except('_token','Submit'));


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
