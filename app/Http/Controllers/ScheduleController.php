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
      <p style='border-bottom: 2px solid #10417e;color: #252525;font-size: 18px;font-weight: 600;'>Upcomming Tournament</p>";
          }

         $output .= "
     

         
        <div class='row' style='font-weight: 400;color: #222b3b;margin-bottom: 20px;padding: 15px 0px;'>
            <div class='col-md-3'><p style='font-size:  13px;margin-top: 53px;'>".Carbon::parse($row->start_date)->format('F d ').'- '.Carbon::parse($row->closing_date)->format('F d ')."</p></div>

            <div class='col-md-5' style='text-align: center;'>
              <img src='/logos/".$row->tournament_logo." 'style='height:50px;width:50px;padding-bottom:10px'>
                  <p><a href='/schedule/".$row->id." ' style='color: #0b3f7e !important;font-size: 20px;font-weight: 600;'>" .$row->tournament."</a></p>
            </div>

            <div class='col-md-4'>".$row->winner."</div>
         </div>
        
         ";

         

       }else{
           if($count2==0){
               $output .= "
               <p style='border-bottom: 2px solid #10417e;color: #252525;font-size: 18px;font-weight: 600;'>Full schedule</p>";
        $count2++;
               
           }

         $output .= "


        
       <div class='row' style='font-weight: 400;color: #222b3b;margin-bottom: 20px;padding: 15px 0px;'>
            <div class='col-md-3' style=''><p style='font-size:  13px;margin-top: 53px;'>".Carbon::parse($row->start_date)->format('F d ').'- '.Carbon::parse($row->closing_date)->format('F d ')."</p></div>

            <div class='col-md-5' style='text-align: center;'>
              <img src='/logos/".$row->tournament_logo." 'style='height:50px;width:50px;padding-bottom:10px'>
                  <p><a href='/schedule/".$row->id." ' style='color: #0b3f7e !important;font-size: 20px;font-weight: 600;'>" .$row->tournament."</a></p>
            </div>

            <div class='col-md-4'>".$row->winner."</div>
         </div>

         <hr>";

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


    public function schedule_date_range($id){


       $s = Schedule::find($id);


      return response()->json($s);

  
    }

    public function delete_schedule($id){

        $schedule= Schedule::where('id',$id)->get();
    
        $image_path = '';

         foreach( $schedule as $s){

            $image_path = public_path()."/logos/$s->tournament_logo";  // Value is not URL but directory file path
        
        }

         \File::delete([
                    $image_path
                ]);

       Schedule::destroy($id);

       $scheduleDetails = ScheduleDetail::select('id')->where('schedule_id',$id)->get();
       
       foreach($scheduleDetails as $scheduleDetail)

      $this->delete_schedule_details($scheduleDetail->id);
     
       
       //ScheduleDetail::where('schedule_id',$id)->delete();

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

          foreach(request()->file('front9') as $pdf){

           
         
              $file_front9 = $pdf->getClientOriginalName();
               $pdf->move(public_path().'/front9/', $file_front9);  
               $data_front9[] = $file_front9 ;   
             }
                
               
           
         }
         
        $file_back9 = '' ;
        
        if(request()->hasfile('back9'))
         {

           
             foreach(request()->file('back9') as $pdf){

           
         
              $file_back9 = $pdf->getClientOriginalName();
               $pdf->move(public_path().'/back9/', $file_back9);  
               $data_back9[] = $file_back9 ;   
             }
                
               
           
         }
          // dd($date);

    foreach(request('date') as $s_date){ 

        $date[] = $s_date ;
      }
      

        for($i=0;$i<count($data_front9);$i++){

          // $data[] = $data_fornt9[$i];
            $schedule = new ScheduleDetail;
             


      $schedule->date = $date[$i];
    

        
       $schedule->front9 = $data_front9[$i];

        $schedule->back9 = $data_back9[$i];

     
        $schedule->schedule_id = request('schedule_id');

        $schedule->save();
      
    }
  

       return redirect('/dashboard')->with('success','Schedule details created succesfully');
     }

    public function delete_schedule_details($id){

        $schedule= ScheduleDetail::where('id',$id)->get();
    
        $image_path = '';

         foreach( $schedule as $s){
          
            $image_path = public_path()."/front9/$s->front9";  // Value is not URL but directory file path
        
        }

         \File::delete([
                    $image_path
                ]);

        $image_path = '';

         foreach( $schedule as $s){
          
            $image_path = public_path()."/back9/$s->back9";  // Value is not URL but directory file path
        
        }

         \File::delete([
                    $image_path
                ]);
     
     
     ScheduleDetail::destroy($id);

          return redirect('/dashboard')->with('success','Schedule details deleted succesfully');

    }
     public function show_details( $id){

         $scheduleDetails =  ScheduleDetail::where('schedule_id',$id)->get();
         $schedulename =  Schedule::where('id',$id)->get();

         return view('scheduleDetailpage',compact('scheduleDetails','schedulename'));


     }



}
