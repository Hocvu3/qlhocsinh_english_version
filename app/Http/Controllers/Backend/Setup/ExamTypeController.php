<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
class ExamTypeController extends Controller
{
    public function ViewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);

    }
    public function AddExamType(){
        return view('backend.setup.exam_type.add_exam_type');
    }
    public function StoreExamType(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:exam_types,name',
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=>'exam type inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view');
    }
    public function EditExamType($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('editData'));
    }
    public function UpdateExamType(Request $request,$id){
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id

        ]);
        $data->name = $request->name;
        $data->save();

        $notificaation = array(
            'message'=>'Exam type update successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notificaation);
    }
    public function DeleteExamType($id){
        $data = ExamType::find($id);
        $data->delete();
        $notificaation = array(
            'message'=>'Exam type delete successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('exam.type.view')->with($notificaation);
    }
}
