<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Schedule;

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

         ->simplePaginate(3);
          // ->orWhere('Address', 'like', '%'.$query.'%')
         // ->orWhere('City', 'like', '%'.$query.'%')
         // ->orWhere('PostalCode', 'like', '%'.$query.'%')
         // ->orWhere('Country', 'like', '%'.$query.'%')
         
      }
      else
      {
       $data = Schedule::orderBy('id', 'desc')
       ->simplePaginate(3);
         // ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.Carbon::parse($row->start_date)->format('F d ').'-'.Carbon::parse($row->closing_date)->format('F d ').'</td>
         <td>'.$row->tournament.'</td>
    
         <td>'.$row->prize_money.'</td>
         <td>'.$row->winner.'</td>
        </tr>
        ';
      
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       // 'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



}
