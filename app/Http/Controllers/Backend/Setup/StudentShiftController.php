<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;
class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }
    public function ShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }
    public function ShiftStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save(); 
        $notification = array(
            'message'=>'shift inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function ShiftEdit($id){
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',compact('editData'));
    }
    public function ShiftUpdate(Request $request,$id){
        $data = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id

        ]);
        $data->name = $request->name;
        $data->save();

        $notificaation = array(
            'message'=>'Student shift update successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift.view')->with($notificaation);
    }
    public function ShiftDelete($id){
        $data = StudentShift::find($id);
        $data->delete();
        $notificaation = array(
            'message'=>'Student shift delete successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.shift.view')->with($notificaation);
    }
}
