<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;
class StudentFeeCategoryController extends Controller
{
    public function ViewFee(){
        $data['allData'] = StudentFeeCategory::all();
        return view('backend.setup.feecategory.view_fee',$data);
    }
    public function FeeCategoryAdd(){

        return view('backend.setup.feecategory.add_feecategory');
    }
    public function FeeCategoryStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_fee_categories,name',
        ]);
        $data = new StudentFeeCategory();
        $data->name = $request->name;
        $data->save(); 
        $notification = array(
            'message'=>'fee inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.fee.view')->with($notification);
    }
    public function FeeCategoryDelete($id){
        $data = StudentFeeCategory::find($id);
        $data->delete();
        $notificaation = array(
            'message'=>'Student fee category delete successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.fee.view')->with($notificaation);
    }
    public function FeeCategoryEdit($id){
        $editData = StudentFeeCategory::find($id);
        return view('backend.setup.feecategory.edit_fee_category',compact('editData'));
    }
    public function FeeCategoryUpdate(Request $request,$id){
        $data = StudentFeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_fee_categories,name,'.$data->id

        ]);
        $data->name = $request->name;
        $data->save();

        $notificaation = array(
            'message'=>'Student fee category update successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.fee.view')->with($notificaation);
    }
}
