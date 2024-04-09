<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use DB;
use App\Models\StudentMarks;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function MarkAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        
        return view('backend.marks.marks_add',$data);
    }
    public function StoreStudentMark(Request $request){
        $studentcount = $request->student_id;
        if($studentcount){
            for($i = 0;$i<count($studentcount);$i++){
                $data = New StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->mark = $request->mark[$i];

                $data->save();
            }
        }
        $notificaation = array(
            'message'=>'Mark inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notificaation);
    }
    public function MarkEdit(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        
        return view('backend.marks.marks_edit',$data);
    }

    public function MarkEditGetStudent(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;
        
        $getStudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();

        return response()->json($getStudent);
    }
    public function MarkUpdateGetStudent(Request $request){
        StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();

        $studentcount = $request->student_id;
        if($studentcount){
            for($i = 0;$i<count($studentcount);$i++){
                $data = New StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->mark = $request->mark[$i];

                $data->save();
            }
        }
        $notificaation = array(
            'message'=>'Mark updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notificaation);
    }
}
