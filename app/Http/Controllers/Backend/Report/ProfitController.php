<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;

class ProfitController extends Controller
{
    public function ProfitView(){
        return view('backend.report.profit.profit_view');
    }
    public function ProfitGetWis(Request $request){
        
    	 
    	$student_fee = AccountStudentFee::sum('amount');

    	

    	$total_cost = $student_fee;
    	$profit = $student_fee;  
    	  
    	 $html['thsource']  = '<th>Student Fee</th>';
    	 $html['thsource'] .= '<th>Total Cost</th>';
    	 $html['thsource'] .= '<th>Profit </th>';
    	 $html['thsource'] .= '<th>Note</th>';

    	 $color = 'success';
    	 $html['tdsource']  = '<td>'.$student_fee.'</td>';
    	 $html['tdsource']  .= '<td>'.$total_cost.'</td>';
    	 $html['tdsource']  .= '<td>'.$profit.'</td>';
    	 $html['tdsource'] .='<td>';
    	 	$html['tdsource'] .= '</td>';
    	
    	return response()->json(@$html); 
    }
}
