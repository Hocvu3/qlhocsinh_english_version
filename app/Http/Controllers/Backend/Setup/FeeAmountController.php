<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\StudentYear;
use App\Models\StudentFeeCategory;
use App\Models\StudentClass;
class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);
    }

    public function AddFeeAmount(){
        $data['fee_categories'] = StudentFeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',$data);
    }

    public function StoreFeeAmount(Request $request){
        $countClass = count($request->class_id);
        if($countClass!=null){
            for($i=0;$i<$countClass;$i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            }
        }
        $notificaation = array(
            'message'=>'Fee amount inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('fee.amount.view')->with($notificaation);
    }
    public function EditFeeAmount($fee_category_id){
        $data['editData'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        $data['fee_categories'] = StudentFeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount',$data);
    }
    public function UpdateFeeAmount(Request $request,$fee_category_id){
        if($request->class_id==NULL){
            $notificaation = array(
                'message'=>'Sorry you do not select any class amount',
                'alert-type'=>'error'
            );
            return redirect()->route('fee.amount.edit',$fee_category_id)->with($notificaation);
        }else{
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
                for($i=0;$i<$countClass;$i++){
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();

                }
                $notificaation = array(
                    'message'=>'Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('fee.amount.view',$fee_category_id)->with($notificaation);
        }
        //end method
    }
    public function DetailFeeAmount($fee_category_id){
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount',$data);

    }
}
